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
	$username = $_SESSION['user'];
	$Control_no = $_POST['Control_no'];

	// Confirmation box for Remove Inventory Item ( How to exit page if confirmation not true..)
	// if (isset($_POST['delete'])) {
	// 	echo "<script>var confirmation = confirm('Please confirm deletion.');
	// 	if (!confirmation) {
	// 		window.location.href='../pages/closed.php';
	// 		exit;
	// 	}</script>";

	// }
	if (isset($_POST['delete'])) {		

		$Control_no = $_GET['Control_no'];
		// echo "Control #: " . $Control_no;
	
		// to prevent mysql injection
		$Control_no = stripcslashes($Control_no);
		$Control_no = mysqli_real_escape_string($connection, $Control_no);

		// $sql = "DELETE
		// 		FROM LOG
		// 		WHERE Control_no = '$Control_no'";
		$sql = "UPDATE LOG
				SET In_shop = 0
				WHERE Control_no = '$Control_no';";
	
		if ($connection->query($sql) === TRUE) {
		    // echo "Log deleted.";
		 	echo "<script>
			alert('Log deleted.');
			window.location.href='../pages/closed.php';
			</script>";
		} 
		else {
			// echo "Error deleting log.";
		 	echo "<script>
			alert('Error deleting log.');
			window.location.href='../pages/closed.php';
			</script>";
		}
		$connection->close();
	}
?>