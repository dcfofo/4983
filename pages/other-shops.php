<!-- Filename: other-shops.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Displays the inventory items of the selected shop in Shop Registry - COMP 4983 Project application.-->
<!-- Bugs/Notes:  
    - Why does get work but not post when passing the shop variable name?? -->


<?php
    if(empty($_SESSION))
        session_start();
    if(!isset($_SESSION['user']))
        header("location: ../pages/login.php");
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
    //  header("Location: login.php");
    //  exit;
?>

<!-- CREATE VARIABLE FOR SHOP NAME -->
<?php
    //echo "<h1>The current shop is: " . $_GET["shop"] . "</h1>";
    if($_GET['shop'] === 'alse_shop')
        $shop = 'ALSE Shop'; 
    elseif($_GET['shop'] === 'avs_labs')
        $shop = 'AVS Labs';
    elseif($_GET['shop'] === 'component_shop')
        $shop = 'Component Shop';
    else
        $shop = 'Engine Bay';
?>
<!-- END VARIABLE CREATION -->

<!-- COUNT # OFINVENTORY ITEMS -->
<?php
require('../inc/connect_to_DB.php');
$sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
        FROM COMPONENT c, LOG l, CF543, TECHNICIAN
        WHERE l.Control_no=CF543.Control_no
        AND CF543.SN=c.SN
        AND TECHNICIAN.Shop='{$shop}'
        AND l.Shop= '{$shop}'
        -- AND l.Date_closed IS NOT NULL
        AND In_shop = 1
        ORDER BY c.NSN";
$result = $connection->query($sql)
          or die("Failed to query tables. " . mysqli_error());
if (is_null($result)){
    $count=0;
}
else{
    $count=1;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $count++;
    }
}
$_SESSION['other-shops-count'] = $count-1;
mysqli_close($connection);
?>
<!-- END COUNT -->

<!-- START OTHERSHOPS.PHP -->
<?php include '../inc/header.php';?>

  <body id="other-shops-body">
  <?php include '../inc/navbar.php';?>

    <div class="closed-items" id="closed-items">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><?php echo"{$shop}";?> Inventory
              <span class="badge pull-right hidden-xs"><?php echo"{$_SESSION['other-shops-count']}";?>                
              </span>
            </div>

              <?php 
              require('../inc/connect_to_DB.php');

              $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
                      FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                      WHERE l.Control_no=CF543.Control_no
                      AND CF543.SN=c.SN
                      AND TECHNICIAN.Shop='{$shop}'
                      AND l.Shop= '{$shop}'
                      -- AND l.Date_closed IS NOT NULL
                      AND In_shop = 1
                      ORDER BY c.NSN";

              $result = $connection->query($sql)
                        or die("Failed to query tables. " . mysqli_error());

              if (is_null($result))
              {
                  echo "No outstanding items.";
              }
              else
              {   
                  echo "<div class='col-md-13'>";
                      echo "<table class='table table-striped'>";
                          echo "<thead>";
                              echo"<tr>";
                                  echo "<th class='col-md-1'>#</th>";
                                  echo "<th class='col-md-2'>NSN</th>";
                                  echo "<th class='col-md-3'>Name</th>";
                                  echo "<th class='col-md-1'>Serial #</th>";
                                  echo "<th class='col-md-1'>Control #</th>";
                                  echo "<th class='col-md-2'>Date Closed</th>";
                                  echo "<th class='col-md-3'>Closed By</th>";
                              echo "</tr>";
                          echo "</thead>";
                          echo "<tbody>";
                          $count=1;
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                  {
                         echo "<tr>";                     
                             echo "<td>$count</td>";
                             echo "<td>". $row['NSN'] ."</td>";
                             echo "<td>". $row['Comp_name'] ."</td>";
                             echo "<td>". $row['SN'] ."</td>";
                             echo "<td>". $row['Control_no'] ."</td>";
                             echo "<td>". $row['Date_closed'] ."</td>";
                             echo "<td>". $row['Log_closed_by'] ."</td>";
                         echo "</tr>";
                      $count++;
                  }
                          echo "</tbody>";
                      echo "</table>";
                  echo "</div>";
              }
              $_SESSION['other-shops-count'] = $count-1;
              mysqli_close($connection);
              ?>  
            </div>
          </div>
        </div>    
<?php include '../inc/custom-js.php';?>
<?php include '../inc/footer.php';?>
  </body>
</html>
<!-- END OTHERSHOPS.PHP