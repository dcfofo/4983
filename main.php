<!-- Instead of jquery, could attach a href in each nav tab?? or put a header redirect in the jquery?? -->
<!-- EXAMPLE1: clickon open items in navber to take to opened.php -->
<!-- <li><a id="open-items-nav" href="opened.php">Open Items</a></li> -->

<!-- EXAMPLE2 -->
<?php
   // header("Location: your url");
   // exit;
?>

<?php
    //include 'connect_to_DB.php';
    if(empty($_SESSION)) // if the session not yet started 
        session_start(); 
    if(!isset($_SESSION['user']))
        header("location: login.php");
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
    //  header("Location: login.php");
    //  exit;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shop Registry</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/custom-stylesheet.css">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS. Need this for bootstrap. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript. Need this for bootstrap. -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="main-body">

      <?php include 'navbar.php';?>
    
      <div class="open-items" id="open-items">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">OUTSTANDING ITEMS</div>
            <?php include 'opened.php';?>      
          </div>
        </div>
      </div>
  
      <div class="closed-items" id="closed-items">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">SHOP INVENTORY</div>
            <?php include 'closed.php';?>            
          </div>
        </div>
      </div>    
  
      <div class="shops" id="shops">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">SHOPS</div>
            <?php 
            // include 'other-shops.php';
            ?>            
          </div>
        </div>
      </div>

      <div class="component-history" id="component-history">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">COMPONENT HISTORY</div>
            <?php 
            // include 'xxx.php';
            ?>          
          </div>
        </div>
      </div>

  </body>
</html>