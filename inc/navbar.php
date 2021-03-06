<!-- Filename: navbar.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs/Notes:  
    -  -->


<?php
  if(empty($_SESSION))
    session_start(); 
?>

<nav class="navbar navbar-fixed-top navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand fa fa-home" href="opened.php">Shop Registry</a> -->
          <!-- Can add class="navbar-brand" to <a> -->
          <a href="../pages/opened.php">
            <img class="fa fa-home" alt="Brand" src="../images/1.png" height="48" width="120">
          </a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- OPEN ITEMS TAB -->
            <li <?php echo ($page == 'opened') ? 'class="active"' : '';?>><a id="opem-items-nav" href="opened.php">Open Items</a></li>
            <!-- <li><a id="open-items-nav" href="#">Open Items</a></li> -->
            <!-- CLOSED ITEMS TAB -->
            <li <?php echo ($page == 'closed') ? 'class="active"' : '';?>><a id="closed-items-nav" href="../pages/closed.php">Shop Inventory</a></li>
            <!-- <li><a id="closed-items-nav" href="#">Closed Items</a></li> -->
            <li <?php echo ($page == 'log') ? 'class="active"' : '';?>><a id="log-history-nav" href="../pages/logHistory.php">Shop Log</a></li>
            <!-- SHOPS DROPDOWN LIST -->
            <li class="dropdown <?php echo ($page == 'other') ? 'active' : '';?>">
              <a id="shops-nav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shops <span class="caret"></span></a>
              <!-- MAKE THIS SELECT INSTEAD OF UL?? -->
              <ul class="dropdown-menu"s>
              	<li  <?php echo ($_SESSION['Shop'] == 'ALSE Shop') ? 'class="active"' : '';?>><a id="alse-shop-nav" href="<?php echo ($_SESSION['Shop'] == 'ALSE Shop') ? '../pages/closed.php' : '../pages/other-shops.php?shop=alse_shop';?>">ALSE Shop</a></li>
                <!-- <li><a id="alse-shop-nav" href="#">ALSE Shop</a></li>  -->    
                <li  <?php echo ($_SESSION['Shop'] == 'AVS Labs') ? 'class="active"' : '';?>><a id="avs-labs-nav" href="<?php echo ($_SESSION['Shop'] == 'AVS Labs') ? '../pages/closed.php' : '../pages/other-shops.php?shop=avs_labs';?>">AVS Labs</a></li>
                <!-- <li><a id="avs-labs-nav" href="#">AVS Labs</a></li> -->   
                <li  <?php echo ($_SESSION['Shop'] == 'Component Shop') ? 'class="active"' : '';?>><a id="component-shop-nav" href="<?php echo ($_SESSION['Shop'] == 'Component Shop') ? '../pages/closed.php' : '../pages/other-shops.php?shop=component_shop';?>">Component Shop</a></li>
                <!-- <li><a id="component-shop-nav" href="#">Component Shop</a></li> -->
                <!-- <li role="separator" class="divider"></li> -->
              	<li  <?php echo ($_SESSION['Shop'] == 'Engine Bay') ? 'class="active"' : '';?>><a id="engine-bay-nav" href="<?php echo ($_SESSION['Shop'] == 'Engine Bay') ? '../pages/closed.php' : '../pages/other-shops.php?shop=engine_bay';?>">Engine Bay</a></li>
                <!-- <li><a id="engine-bay-nav" href="#">Engine Bay</a></li> -->                 
              </ul>
            </li>
            <!-- MANAGE PARTS DROPDOWN LIST -->
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Parts <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Add Item</a></li>
                <li><a href="#">Remove Item</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li> -->
            <!-- COMPONENT HISTORY TAB -->
            <!-- <li><a id="component-history-nav" href="../pages/componentHistory.php">Component History</a></li> -->
            <!-- <li><a id="component-history-nav" href="#">Component History</a></li> -->
          </ul>

          <!-- SEARCH PART INPUT AND BUTTON -->
<!--           <form class="navbar-form navbar-left" action="../pages/searchPart.php">
            <div class="input-group">
              <input type="text" class="form-control" name="NSN_search" id="NSN_search" placeholder="Find NSN">
              <div class="input-group-btn">
                <button class="btn btn-default" name="searchPart" id="searchPart" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form> -->
          <!-- OPTIONAL BUTTONS -->
          <!-- <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button> -->
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter NSN">
            </div>
            <button type="submit" class="btn btn-default">Find Part</button>                        
          </form> -->
          <!-- SEARCH COMPONENT HISTORY -->
          <form class="navbar-form navbar-left" action="../pages/searchHistory.php" method='post'>
            <div class="input-group">
              <input type="text" class="form-control" name="SN_search" id="SN_search" placeholder="SN History">
              <div class="input-group-btn">
                <button class="btn btn-default" name="searchHistory" id="searchHistory" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
            <!-- OPTIONAL BUTTONs -->
            <!-- <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button> -->
            <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter SN">
            </div>
            <button type="submit" class="btn btn-default">Search History</button>
            </form> -->
          
          <!-- LOGOUT BUTTON -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown <?php echo ($page == 'help') ? 'active' : '';?>">
              <a id="shops-nav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'] . "@" .  $_SESSION['Shop']; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu"s>
                <li <?php echo ($page == 'help') ? 'class="active"' : '';?>><a href="../pages/help.php" class="tablinks">Help</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../inc/logout.php" class="tablinks"><strong>Logout</strong></a></li>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
