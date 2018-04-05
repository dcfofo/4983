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

<!-- COUNT # OF CLOSED ITEMS (Only counts total # of entries, not the filtered amount)-->
<?php 
// require('../inc/connect_to_DB.php');
// $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
//         FROM COMPONENT c, LOG l, CF543, TECHNICIAN
//         WHERE l.Control_no=CF543.Control_no
//         AND CF543.SN=c.SN
//         AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
//         AND l.Shop= '{$_SESSION['Shop']}'
//         AND l.Date_closed IS NOT NULL
//         ORDER BY c.NSN";
// $result = $connection->query($sql)
//           or die("Failed to query tables. " . mysqli_error());
// if (is_null($result)){
//     $count=0;
// }
// else{
//     $count=1;
//     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
//         $count++;
//     }
// }
// $_SESSION['log-count'] = $count-1;
// mysqli_close($connection);
?>  
<!-- END COUNT -->

<!-- START CLOSED.PHP -->
<?php include '../inc/header.php';?>
<body id="log-items-body">
<?php $page = 'log'; include '../inc/navbar.php';?>

      <div class="log-items" id="log-items">
        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading log-filter">
              <div class="input-group pull-left col-xs-2">
                  <h5><?php echo"{$_SESSION['Shop']}";?> Log  </h5>
              </div>
              <!-- Badge with # of entries in the log -->
              <!-- <div class="input-group pull-right">                  
                  <h5 class="badge hidden-xs"><?php echo"{$_SESSION['log-count']}";?></h5>
              </div> -->
              <!-- <form action="../pages/logHistory.php"> -->

              <!-- Input for start and end dates -->
              <form action="<?php echo $_SERVER['PHP_SELF'];?>">
              <div class="input-group col-xs-2 pull-right count">
                  <input type="text" class="form-control filter-box"  name="end_date" id="end_date" placeholder="End Date">
                  <div class="input-group-btn">
                      <button class="btn btn-primary" type='submit' name="filter_submit"><i class="glyphicon glyphicon-search"></i></button>
                      <button class="btn btn-success" type="submit" name="show_all"><i class="glyphicon glyphicon-list-alt"></i></button> 
                  </div>
              </div>
              <div class="input-group-button col-xs-2 pull-right">
                  <input type="text" class="form-control filter-box" name="start_date" id="start_date" placeholder="Start Date">
              </div>
              </form>
              <div class="input-group pull-right">
                  <h5>Filter:  </h5>
              </div>
            </div>

              <?php 
              $start_date = $_GET['start_date'];
              $end_date = $_GET['end_date'];
              require('../inc/connect_to_DB.php');
             
              if (isset($_GET['filter_submit'])) {

                    if ($start_date == "" || $end_date == "") {
                    echo "<script>alert('Must enter start and end date.');</script>";
                    echo "<script>window.location.href='../pages/logHistory.php';</script>";
                    }
                    if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $start_date)) {
                       echo "<script>
                       alert('Invalid input for start date. Enter: YYYY-MM-DD.');
                       window.location.href='../pages/logHistory.php';
                       </script>"; 
                    }
                    if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $end_date)) {
                       echo "<script>
                       alert('Invalid input for end date. Enter: YYYY-MM-DD.');
                       window.location.href='../pages/logHistory.php';
                       </script>"; 
                    }
                    if( strtotime($start_date) > strtotime($end_date) ) {
                       echo "<script>
                       alert('Invalid date input.');
                       window.location.href='../pages/logHistory.php';
                       </script>";
                    }         
                    if ($start_date !== "" && $end_date !== "") {
                      $end_date .= " 23:59:59";
                      $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, 
                              l.Date_closed, l.Log_closed_by
                               FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                               WHERE l.Control_no=CF543.Control_no
                               AND CF543.SN=c.SN
                               AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
                               AND l.Shop= '{$_SESSION['Shop']}'
                               AND l.Date_closed IS NOT NULL
                               AND Date_closed 
                                  BETWEEN TIMESTAMP('$start_date') AND TIMESTAMP('$end_date')
                               ORDER BY l.Date_closed DESC";                   
                    }
              }
              elseif (isset($_GET['search_all'])) {
                   $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, 
                          l.Date_closed, l.Log_closed_by
                          FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                          WHERE l.Control_no=CF543.Control_no
                          AND CF543.SN=c.SN
                          AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
                          AND l.Shop= '{$_SESSION['Shop']}'
                          AND l.Date_closed IS NOT NULL
                          ORDER BY l.Date_closed DESC";
              }
              else {   
                  $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, 
                          l.Date_closed, l.Log_closed_by
                          FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                          WHERE l.Control_no=CF543.Control_no
                          AND CF543.SN=c.SN
                          AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
                          AND l.Shop= '{$_SESSION['Shop']}'
                          AND l.Date_closed IS NOT NULL
                          ORDER BY l.Date_closed DESC";
              }
                  $result = $connection->query($sql)
                        or die("Failed to query tables. " . mysqli_error());
                  if (is_null($result)) {
                      echo "No log entries.";
                  }

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
                          echo "<form class='form-inline' method='post' action='../inc/deleteLog.php?Control_no={$row['Control_no']}'>";                 
                          echo "<td>$count</td>";
                          echo "<td>". $row['NSN'] ."</td>";
                          echo "<td>". $row['Comp_name'] ."</td>";
                          echo "<td>". $row['SN'] ."</td>";
                          echo "<td>". $row['Control_no'] ."</td>";
                          echo "<td>". $row['Date_closed'] ."</td>";
                          echo "<td>". $row['Log_closed_by'] ."</td>";
                      echo "</form>";
                      echo "</tr>";
                      $count++;
                  }
                          echo "</tbody>";
                      echo "</table>";
                  echo "</div>";
              //$_SESSION['log-count'] = $count-1;
              mysqli_close($connection);
              ?>  
            </div>
          </div>
        </div>  

<?php include '../inc/custom-js.php';?>
<?php include '../inc/footer.php';?>
  </body>
</html>
<!-- END CLOSED.PHP