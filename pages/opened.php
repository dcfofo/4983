<!-- Filename: opened.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Displays open (outstanding) inventory items for 
     Shop Registry - COMP 4983 Project application.-->
<!-- Notes: For _POST to work, need method="post" inside the form. 
     Do not need this if using _GET.  -->
<!-- BUGS: 
     - Fix buttons so they line up at right of panel body.maybe put 
     a panel body inside of each row.
     - Tidy up error handling (what happens if no open items)
     -                                                                       -->


<?php
    //include 'connect_to_DB.php';
    if(empty($_SESSION)) // if the session not yet started 
        session_start(); 
    if(!isset($_SESSION['user']))
        header("location: ../pages/login.php");
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
    //  header("Location: login.php");
    //  exit;
?>

<!-- COUNT # OF OPEN ITEMS -->
<?php 
require('../inc/connect_to_DB.php');
$sql = "SELECT DISTINCT CF543.Control_no, c.Comp_name, c.NSN, c.SN, l.Date_in
        FROM COMPONENT c, LOG l, CF543, TECHNICIAN
        WHERE l.Control_no=CF543.Control_no
        AND CF543.SN=c.SN
        AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
        AND l.Shop= '{$_SESSION['Shop']}'
        AND l.Date_closed IS  NULL";
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
$_SESSION['open-count'] = $count-1;
mysqli_close($connection);
?>
<!-- END COUNT -->

<!-- START OPENED.PHP -->
<?php include '../inc/header.php';?>

  <body id="open-items-body clearfix">
      
      <?php $page = 'opened'; include '../inc/navbar.php';?>

      <div class="open-items" id="open-items">
        <div class="container">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Outstanding Items
                <span class="badge pull-right hidden-xs"><?php echo"{$_SESSION['open-count']}";?></span></div>

                <?php 
                require('../inc/connect_to_DB.php');

                $sql = "SELECT DISTINCT CF543.Control_no, c.Comp_name, c.NSN, c.SN, l.Date_in
                        FROM COMPONENT c, LOG l, CF543, TECHNICIAN
                        WHERE l.Control_no=CF543.Control_no
                        AND CF543.SN=c.SN
                        AND TECHNICIAN.Shop='{$_SESSION['Shop']}'
                        AND l.Shop= '{$_SESSION['Shop']}'
                        AND l.Date_closed IS  NULL
                        ORDER BY  l.Date_in";

                $result = $connection->query($sql)
                          or die("Failed to query tables. " . mysqli_error());

                if (is_null($result))
                {
                    echo "No outstanding items.";
                }
                else
                {   
                    echo "<div class='col-md-14'>";
                        echo "<table class='table table-striped'>";
                            echo "<thead>";
                                echo"<tr>";
                                    echo "<th class='col-md-1'>#</th>";
                                    echo "<th class='col-md-1'>Control #</th>";
                                    echo "<th class='col-md-2'>Name</th>";
                                    echo "<th class='col-md-2'>NSN</th>";
                                    echo "<th class='col-md-1'>Serial #</th>";
                                    echo "<th class='col-md-2'>Date Received</th>";
                                    echo "<th class='col-md-3'>Fix</th>";
                                    echo "<th class='col-md-1'></th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $count=1;
                    // $_SESSION['Control_numbers'] = array();
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                    {
                        // $_SESSION['Control_numbers'][] = $row['Control_no'];
                        echo "<tr>";
                            // Pass $Control_no to closeLog.php so it can reference the current row.
                            echo "<form class='form-inline' method='post' action='../inc/closeLog.php?Control_no={$row['Control_no']}'>";                     
                                 echo "<td>$count</td>";
                                 echo "<td>". $row['Control_no'] ."</td>"; 
                                 echo "<td>". $row['Comp_name'] ."</td>";
                                 echo "<td>". $row['NSN'] ."</td>";
                                 echo "<td>". $row['SN'] ."</td>";
                                 echo "<td>". $row['Date_in'] ."</td>";                               
                                 echo "<td><input class='form-control mr-sm-2' type='text' name='Fix' id='Fix' placeholder='Fix'></td>";
                                 echo "<td><button type='submit' name='close' id='close' class='btn btn-sm btn-success pull-right'>Close</button></td>";
                            echo "</form>";
                        echo "</tr>";
                        $count++;                        
                    }
                            // echo "<tr>";
                            // echo "<td>Add Item</td>";
                            // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='Control #''></td>";
                            // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='Name'></td>";
                            // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='NSN'></td>";
                            // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='SN'></td>";
                            // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='Date Received'></td>";
                            // echo "<td></td>";
                            // echo "<td><button type='button' class='btn btn-sm btn-primary'>Add</button></td>";               
                            // echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                    echo "</div>";
                }
                //$_SESSION['open-count'] = $count-1;
                mysqli_close($connection);
                ?>  
              </div>
              <?php
              echo "<div class='panel panel-default'>";
              echo "<div class='panel-heading'>Add Item</div>";
                        // echo "<table class='table table-striped'>";
                        // ---------------------------------------------
                        // echo "<thead>";
                        //         echo"<tr>";
                        //             echo "<th class='col-md-1'></th>";
                        //             echo "<th class='col-md-1'></th>";
                        //             echo "<th class='col-md-2'></th>";
                        //             echo "<th class='col-md-2'></th>";
                        //             echo "<th class='col-md-2'></th>";
                        //             echo "<th class='col-md-2'></th>";
                        //             echo "<th class='col-md-2'></th>";
                        //             echo "<th class='col-md-1'></th>";
                        //         echo "</tr>";
                        //     echo "</thead>";
                        // ---------------------------------------------
                        // echo "<tbody>";
                        //echo "<tr>";
                                // echo "<td></td>";
                                // echo "<td><input class='form-control mr-sm-1' type='text' placeholder='Control #''></td>";
                                // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='SN'></td>";
                                // echo "<td><input class='form-control mr-sm-2' type='text' placeholder='Fault'></td>";
                                // echo "<td></td>";
                                // echo "<td><button type='button' class='btn btn-sm btn-primary'>Add</button></td>";
                                // href='addLog.php?Control_no=Control_no&SN=SN&Fault=Fault 
                        //echo "</tr>";
                      // echo "</tbody>";
                  // echo "</table>";
                        // ------------------------------------------------------------------------------------
                        echo "<div class='panel-body'>";
                        echo "<form class='form-inline' method='post' action='../inc/addLog.php'>";
                          echo "<div class='form-group'>";
                            echo "<input class='form-control mr-sm-1 add' type='text' placeholder='Control #' id='Control_no' name='Control_no'>";
                          echo "</div>";
                          echo "<div class='form-group'>";
                            echo "<input class='form-control mr-sm-2 add' type='text' placeholder='SN' id='SN' name='SN'>";
                          echo "</div>";
                          echo "<div class='form-group'>";
                            echo "<input class='form-control mr-sm-2 add' type='text' placeholder='Fault' id='Fault' name='Fault'>";
                            // echo '<textarea class="form-control" rows="1" placeholder="Fault" id="Fault" name="Fault"></textarea>';
                          echo "</div>";
                          echo "<td><button id='add' name='add' type='submit' class='btn btn-sm btn-primary pull-right'>Add</button></td>";
                        echo "</form>";
                        echo "</div>";
                        // -----------------------------------------------------------------------------------
              echo "</div>";
              echo "</div>";
              ?>
            </div>
          </div>
<?php include '../inc/custom-js.php';?>
<?php include '../inc/footer.php';?>
</body>
</html>
<!-- END OPENED.PHP -->

                        