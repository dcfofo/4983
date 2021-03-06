<!-- Filename: login-process.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Query's a data base for the entered username and password and, on success, --> 
<!-- redirects the user to opened.php. For Shop Registry - COMP 4983 Project application.-->
<!-- Bugs/Notes:  -->


<?php
	if(empty($_SESSION)) // if the session not yet started 
	   session_start();

	if(!isset($_POST['submit'])) { // if the form not yet submitted
	   header("Location: ../pages/login.php");
	   exit; 
	}
?>

<?php
	// Create session variables to be used 
	// $_SESSION['user'] = $_POST['user'];
	// $_SESSION['pass'] = $_POST['pass'];

	require_once('../inc/connect_to_DB.php');

	$username = $_POST['user'];
	$password = $_POST['pass'];	
	// to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	// If using encrypted password:
	// $hashed_password = "SELECT Password 
	// 		FROM TECHNICIAN 
	// 		WHERE Username = '$username'
	// 		LIMIT 1";
	// if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
	//    header("location:opened.php");
	//    // echo "Password verified!";
	// }


	// query the DB for the username and password in the html form
	$sql = "SELECT * 
			FROM TECHNICIAN 
			WHERE Username = '$username'
			-- AND Password = '$password'				
			LIMIT 1";

	$result = $connection->query($sql)
		or die("Failed to query database " . mysqli_error());
		// $result = mysql_query($sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$_SESSION['user'] = $row['Username'];
	$_SESSION['Shop'] = $row['Shop'];
	$_SESSION['logged_in'] = False;
	$hashed_password = $row['Password'];

	if ($username == "" && $password == "") 
	{
		//echo '$("#alert").html("Must enter a valid username and password.")';
		// $_SESSION['invalid_login'] = True;
		echo "<script>
			alert('Must enter a valid username and password.');
			window.location.href='../pages/login.php';
			</script>";
	}
	elseif ($row['Username'] == $username && $password == $hashed_password && $password == "") 
	{		
		header("location: ../pages/newPass.php");
		// echo "<script>
		// 	alert('Please enter a password.');
		// 	window.location.href='login.php';
		// 	</script>";
	}
	// elseif ($row['Username'] == $username && $row['Password'] == $password)
	// elseif (hash_equals($hashed_password, crypt($password, $hashed_password)))
	elseif (password_verify($password, $hashed_password))
	{
		$_SESSION['logged_in'] = True;
		header("location: ../pages/opened.php");
	}
	else 
	{
		// echo '$("#alert").html("Invalid login combination. Please try again.")';
		echo "<script>
			alert('Invalid login combination. Please try again.');
			window.location.href='../pages/login.php';
			</script>";
	}
	mysqli_close($connection);
?>