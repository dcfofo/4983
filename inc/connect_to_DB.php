<?php
    //include 'connect_to_DB.php';
    // if(empty($_SESSION)) // if the session not yet started 
    //     session_start(); 
?>

<?php
	$servername = "localhost";
	$user = "danny";
	$password = "danny";
	$dbname = "SHOP_REGISTRY";

	$connection = new mysqli($servername, $user, $password, $dbname);
	
	if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
	} 
?>