<!-- Filename: closed.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Displays respective users' inventory items in Shop Registry - COMP 4983 Project application.-->
<!-- Bugs/Notes:  -->


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

<!-- COUNT # OF CLOSED ITEMS -->
<?php 
require('connect_to_DB.php');
$sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
        FROM COMPONENT c, LOG l, CF543, TECHNICIAN
        WHERE l.Control_no=CF543.Control_no
        AND CF543.SN=c.SN
        AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
        AND l.Shop= '{$_SESSION['Shop']}'
        AND l.Date_closed IS NOT NULL
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
$_SESSION['closed-count'] = $count-1;
mysqli_close($connection);
?>  
<!-- END COUNT -->

<!-- START CLOSED.PHP -->
<?php include 'header.php';?>
  <body id="open-items-body">
      <?php include 'navbar.php';?>

      <div class="closed-items" id="closed-items">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><?php echo"{$_SESSION['Shop']}";?> Inventory<span class="badge pull-right hidden-xs"><?php echo"{$_SESSION['closed-count']}";?></span></div>

              <?php 
              require('connect_to_DB.php');

              $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
                      FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                      WHERE l.Control_no=CF543.Control_no
                      AND CF543.SN=c.SN
                      AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
                      AND l.Shop= '{$_SESSION['Shop']}'
                      AND l.Date_closed IS NOT NULL
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
                                  echo "<th class='col-md-1'></th>";
                              echo "</tr>";
                          echo "</thead>";
                          echo "<tbody>";
                          $count=1;
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                  {
                      echo "<tr>"; 
                          echo "<form class='form-inline' method='post' action='deleteLog.php?Control_no={$row['Control_no']}'>";                    
                          echo "<td>$count</td>";
                          echo "<td>". $row['NSN'] ."</td>";
                          echo "<td>". $row['Comp_name'] ."</td>";
                          echo "<td>". $row['SN'] ."</td>";
                          echo "<td>". $row['Control_no'] ."</td>";
                          echo "<td>". $row['Date_closed'] ."</td>";
                          echo "<td>". $row['Log_closed_by'] ."</td>";
                          echo "<td><button type='submit' class='btn btn-sm btn-danger' name='delete' id='delete'>Remove</button></td>";
                      echo "</form>";
                      echo "</tr>";
                      $count++;
                  }
                          echo "</tbody>";
                      echo "</table>";
                  echo "</div>";
              }
              //$_SESSION['closed-count'] = $count-1;
              mysqli_close($connection);
              ?>  
            </div>
          </div>
        </div>  

<?php include 'custom-js.php';?>
<?php include 'footer.php';?>
  </body>
</html>
<!-- END CLOSED.PHP -->