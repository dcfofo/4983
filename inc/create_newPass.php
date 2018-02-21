<!-- Filename:create_newPAss.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs/Notes:  -->


<?php
	if(empty($_SESSION)) // if the session not yet started 
	   session_start();

	// if(!isset($_POST['submit_pass'])) { // if the form not yet submitted
	//    header("Location: newPass.php");
	//    exit; 
	// }
?>

<?php 
	require('connect_to_DB.php');
	// include($_SERVER['DOCUMENT_ROOT'].'/4983/connect_to_DB.php');

	$username = $_SESSION['user'];	
	$new_pass_1 = $_POST['new_pass_1'];
	$new_pass_2 = $_POST['new_pass_2'];	
	// to prevent mysql injection
	$new_pass_1 = stripcslashes($new_pass_1);
	$new_pass_2 = stripcslashes($new_pass_2);
	$new_pass_1 = mysqli_real_escape_string($connection, $new_pass_1);
	$new_pass_2 = mysqli_real_escape_string($connection, $new_pass_2);

	// Query database and set session variables for the user
	$sql = "SELECT * 
			FROM TECHNICIAN 
			WHERE Username = '$username'
			LIMIT 1";

	$result = $connection->query($sql)
		or die("Failed to query database " . mysqli_error());
		// $result = mysql_query($sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$_SESSION['user'] = $row['Username'];
	$_SESSION['Shop'] = $row['Shop'];

	if ($new_pass_1 == "" || $new_pass_2 == "") 
	{
		echo "<script>
			alert('Must enter password twice.');
			window.location.href='../pages/newPass.php';
			</script>";
	}
	elseif ($new_pass_1 !== $new_pass_2) 
	{	
		echo "<script>
			alert('Passwords do not match.');
			window.location.href='../pages/newPass.php';
			</script>";
	}
	elseif (strlen($new_pass_1) < 4 || strlen($new_pass_1) > 12) 
	{	
		echo "<script>
			alert('Password must be 4-12 characters in length.');
			window.location.href='../pages/newPass.php';
			</script>";
	}
	elseif ($new_pass_1 === $new_pass_2) 
	{
		// $hashed_password = crypt($new_pass_1);
		$hashed_password = password_hash($new_pass_1, PASSWORD_DEFAULT);

		$sql = "UPDATE TECHNICIAN 
				SET Password = '$hashed_password'
				-- SET Password = '$new_pass_1'
				WHERE Username = '$username';";
		$result = $connection->query($sql)
			or die("Failed to update password - " . mysqli_error());
		$_SESSION['logged_in'] = True;
		header("location:../pages/opened.php");
	}
	else 
	{
		echo "<script>
			alert('Invalid password combination. Please try again.');
			window.location.href='../pages/login.php';
			</script>";
	}

	mysqli_close($connection);
?>