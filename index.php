<!-- Filename: index.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Directs the user to the login page for Shop Registry - COMP 4983 Project application.-->
<!-- Bugs/Notes:  -->


<?php
	session_start();
?>

<?php
  // Function used to redirect to home.php
  header("location:pages/login.php?action");
?>