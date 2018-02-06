<!-- Filename: closeLog.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs/Notes:  
	 - Why doesnt _POST work with Control_no?
	 -  -->
<!-- Notes: 
	 -  -->


<?php
	session_start();
?>


<?php
	require('connect_to_DB.php');

	if (isset($_POST['close'])) {

		$Username = $_SESSION['user'];		
		$Control_no = $_GET['Control_no'];
		// $Control_no = $_SESSION['Control_no'];
		// $Control_no = $_SESSION['Control_numbers'][1];
		$Fix = $_POST['Fix'];
		// Date_closed filled automarically by TIMESTAMP
	
		// ERROR HANDLING
		// --------------------------------------------------------------------

		// To prevent mysql injection
		$Username = stripcslashes($Username);
		$Username = mysqli_real_escape_string($connection, $Username);
		$Control_no = stripcslashes($Control_no);
		$Control_no = mysqli_real_escape_string($connection, $Control_no);
		$Fix = stripcslashes($Fix);
		$Fix = mysqli_real_escape_string($connection, $Fix);

		// Ensure Fix description is not empty	
		if ( $Fix === "") {
			echo "<script>
			alert('Must enter the fix details.');
			window.location.href='opened.php';
			</script>";
			exit;
		}
		// --------------------------------------------------------------------

		$sql = "UPDATE LOG
				SET Log_closed_by= '$Username'
				WHERE LOG.Control_no = '$Control_no';";
		$sql.= "UPDATE CF543
				SET Fix = '$Fix'
				WHERE CF543.Control_no = '$Control_no';";

		echo "Username is:  " . $Username . "<br><br>";
		echo "Control_no is:  " . $Control_no . "<br><br>";
		echo "Fix is:  " . $Fix . "<br><br>";

		if ($connection->multi_query($sql) === TRUE) {
		 	// echo "<script>
			// alert('Log closed.');
			// window.location.href='opened.php';
			// </script>";
			// echo "Multi query successfull. <br><br>";
			header("Location: opened.php");
		} 
		else {
		    echo "<script>
			alert('Error closing log.');
			window.location.href='opened.php';
			</script>";
			//echo "Error closing log. <br><br>";
		}
		$connection->close();
	}
?>