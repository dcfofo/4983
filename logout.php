<!-- Filename: logout.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Logs the user out and redirects to login.php -->
<!-- For Shop Registry - COMP 4983 Project application.-->
<!-- Bugs/Notes:  -->


<?php
	session_start();
	session_unset();
	session_destroy();
	
	header("Location: login.php");
?>