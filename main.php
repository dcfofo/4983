<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Main page</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="personal-information">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DPlan
            <!-- <img alt="Brand" src="images/" height="30" width="45"> -->
          </a>
        </div>

        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a id="personal-information-nav" href="#">Personal Information</a></li>
            <li><a id="qualifications-nav" href="#">Qualifications</a></li>
            <li class="dropdown">
              <a id="admin" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a id="add-user-nav" href="#">Add User</a></li>
                <li><a id="delete-user-nav" href="#">Delete User</a></li>
                <li role="separator" class="divider"></li>
                <li><a id="search-user-nav" href="#">Search User</a></li>               
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    
      <div class="personal-info" id="personal-info">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Personal Information</div>           
          </div>
        </div>
      </div>
  
      <div class="qualifications" id="qualifications">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Qualifications</div>            
          </div>
        </div>
      </div>    
  
      <div class="search-user" id="search-user">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
            <form>          
              <input name="users" id="users" placeholder="Enter Surname">
              <input type="button" id="usersb" name="usersb" value="Search" onclick="showUser(document.getElementById('users').value)">
            </form>
            </div>
            <br>
            <div id="search_result"><b></b></div>
          </div>
        </div>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/active-script.js"></script>
    <script>
    document.getElementById("personal-info").style.display = "none";
    document.getElementById("qualifications").style.display = "none";
    document.getElementById("search-user").style.display = "none";
      $("#qualifications-nav").click(function(){
        $("#personal-info").hide()
        $("#search-user").hide()
          $("#qualifications").show();
      });
      $("#personal-information-nav").click(function(){
        $("#qualifications").hide()
        $("#search-user").hide()
          $("#personal-info").show();
      });
      $("#search-user-nav").click(function(){
        $("#qualifications").hide()
        $("#personal-info").hide()
          $("#search-user").show();
      });
      function showUser(str) {
          if (str == "") {
              document.getElementById("search_result").innerHTML = "";
              return;
          } else { 
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("search_result").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET","getuser.php?q="+str,true);
              xmlhttp.send();
          }
      }
    </script>
  </body>
</html>