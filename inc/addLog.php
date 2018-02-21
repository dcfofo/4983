<!-- Filename: addLog.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs/Notes:  
	 - error control - make sure unputs not null.
	 -  -->
<!-- Notes: $row = $result->fetch_assoc(); will give allresults of query. Then $row['column name'] to reference it.
	 -  -->


<?php
	session_start();
?>


<?php
    require('connect_to_DB.php');
    //echo "Connected to DB. <br><br>";

    if (isset($_POST['add'])) {

    	//echo "Get request successful.<br><br>";
    	// Local variables
		$Control_no = $_POST['Control_no'];
		$SN = $_POST['SN'];
		$Fault = $_POST['Fault'];

		// Session variables
		$Shop = $_SESSION['Shop'];

	
		// to prevent mysql injection
		$Control_no = stripcslashes($Control_no);
		$Control_no = mysqli_real_escape_string($connection, $Control_no);
		$SN = stripcslashes($SN);
		$SN = mysqli_real_escape_string($connection, $SN);
		$Fault = stripcslashes($Fault);
		$Fault = mysqli_real_escape_string($connection, $Fault);
		
		// ERROR HANDLING
		// --------------------------------------------------------------------
		// Make sure fields arrent empty
		if ($Control_no == "" || $SN == "" || $Fault == "") {
			echo "<script>
			alert('Must fill in all fields.');
			window.location.href='../pages/opened.php';
			</script>";
			exit;
		}
		// Check if control# already exists
		$test1 = "SELECT * 
				FROM CF543 
				WHERE Control_no = '$Control_no'";
		$result1 = $connection->query($test1);		
		if ( $result1->num_rows > 0 ) {
			echo "<script>
			alert('Control #: " . $Control_no . " already exists.');
			window.location.href='../pages/opened.php';
			</script>";
			exit;
		}

		// Ensure the entered serial # is in the system
		$test2 = "SELECT * 
				FROM COMPONENT 
				WHERE SN = '$SN'";
		$result2 = $connection->query($test2);
		if ($result2->num_rows < 1) {
		// if ($connection->query($test2) !== TRUE) {
			echo "<script>
			alert('Serial #: " . $SN . " does not exist.');
			window.location.href='../pages/opened.php';
			</script>";
			exit;
		} 
		// --------------------------------------------------------------------
	
		$sql = "INSERT INTO LOG(Shop, Control_no, In_shop) 
		VALUES('$Shop', '$Control_no', 0);";
		$sql .= "INSERT INTO CF543(Control_no, Fault, SN) 
		VALUES('$Control_no', '$Fault', '$SN');";

		if ($connection->multi_query($sql) === TRUE) {
		    echo "<script>
			alert('Item added to log.');
			window.location.href='../pages/opened.php';
			</script>";
		} 
		else {
		   // echo "Error: " . $sql . "<br>" . $connection->error;
		    echo "<script>
			alert('Error: " . $sql . "<br>" . $connection->error . "');
			window.location.href='../pages/opened.php';
			</script>";
		}
		$connection->close();
		// header("Location: opened.php");
	}
?>