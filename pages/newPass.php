<!-- Filename: login.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description:  .-->
<!-- Bugs/Notes:  
     - -->

<?php
    //include 'connect_to_DB.php';
    if(empty($_SESSION)) // if the session not yet started 
        session_start(); 
    // if(!isset($_SESSION['user']))
    //     header("location: login.php");
    if ($_SESSION['logged_in'] !== False) {
        header("location: login.php");
    }
    // $_SESSION['logged_in'] = False;
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
    //  header("Location: login.php");
    //  exit;
    // session_unset();
?>

<?php include '../inc/header.php';?>
<?php 
// include 'navbar.php';
?>
    
<body>
    <br>
    <br>
    <br>
    <div class=" text-center container">
    
        <!-- Login Box Start -->
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">         
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><!-- <img class="pull-left" alt="Brand" src="images/Brand11.png" height="20" width="40"> -->
                        <strong>Create New Password</strong></div>
                </div>     

                <div class="panel-body">

                    <form name="new_pass_form" id="create_new_pass" class="form-horizontal" action="../inc/create_newPass.php" method="POST">
                        <p class="pull-left ">Enter New Password (4-12 characters)</p><br><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="new_pass_1" name="new_pass_1" type="password" class="form-control" placeholder="Password">                                   
                        </div>
                        <br>
                        <p class="pull-left ">Retype New Password</p><br><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="new_pass_2" name="new_pass_2" type="password" class="form-control" placeholder="Password">
                        </div>

                        <!-- OPTIONAL ALERT FOR INVALID PASSWORD (NOT FUNCTIONAL) -->
                        <!-- <div class="alert alert-danger" role="alert" id="alert"></div> -->                                                              

                        <div class="form-group">
                            <!-- Login Button -->
                            <div class="col-sm-12 controls">
                                <br>
                                <button id="submit_pass" name="submit_pass" type="submit" href="#" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                            </div>
                        </div>
                    </form>
                </div>                     
            </div>  
        </div>
        <!-- Login Box End -->

        <!-- Alternate Login Box -->
        <!-- <img alt="Brand" src="images/14-ams.jpg" height="260" width="220"> -->
        <!-- <h1>Shop Registry</h1> -->
        <!-- <p class="lead">14 AMS Inventory Management System</p>
        <form class="form-inline" id="login" action="login-process.php" method="post">
            <div class="form-group">
                <input class="form-control" id="user" name="user" type="text" size="20" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" id="pass" name="pass" type="password" size="20" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-info" id="submit" name="submit" value="Login">Login</button>
        </form> -->
    </div> 
</body>
</html>
