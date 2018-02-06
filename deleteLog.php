<!-- Filename: deleteLog.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs:
	 -   -->
<!-- NOTES: 
	 -  -->


<?php
	session_start();
?>

<?php
	require('connect_to_DB.php');

	if (isset($_POST['delete'])) {

		$Control_no = $_GET['Control_no'];
		// echo "Control #: " . $Control_no;
	
		// to prevent mysql injection
		$Control_no = stripcslashes($Control_no);
		$Control_no = mysqli_real_escape_string($connection, $Control_no);

		$sql = "DELETE
				FROM LOG
				WHERE Control_no = '$Control_no'";
	
		if ($connection->query($sql) === TRUE) {
		    // echo "Log deleted.";
		 	echo "<script>
			alert('Log deleted.');
			window.location.href='closed.php';
			</script>";
		} 
		else {
			// echo "Error deleting log.";
		 	echo "<script>
			alert('Error deleting log.');
			window.location.href='closed.php';
			</script>";
		}
		$connection->close();
	}
?>