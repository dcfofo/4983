<!-- Filename: searchHistory.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description:  -->
<!-- -->
<!-- Bugs:
   - The count doesnt work unless refresh the page. Session variable?
   -   -->
<!-- Notes:
   -  -->


<?php
if(empty($_SESSION))
	session_start();
$SN = $_POST['SN_search'];
?>

<!-- COUNT # OFINVENTORY ITEMS -->
<?php
require('../inc/connect_to_DB.php');
 $sql = "SELECT  DISTINCT CF543.Control_no, CF543.Fault, CF543.Fix, l.Date_closed, c.Comp_name
        FROM COMPONENT c, LOG l, CF543
        WHERE l.Control_no=CF543.Control_no
        AND CF543.SN=c.SN
        AND c.SN = '$SN'
        AND l.Date_closed IS NOT NULL
        ORDER BY l.Date_closed DESC;";
        $result = $connection->query($sql);
if (is_null($result)){
    $count=0;
}
else{
    $count=1;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $count++;
    }
}
$_SESSION['SN-search-count'] = $count-1;
mysqli_close($connection);
?>


<!-- START SEARCHHISTORY.PHP -->
<?php include '../inc/header.php';?>
<?php include '../inc/custom-js.php';?>
<body id="searchHistory-body">
<?php include '../inc/navbar.php';?>

<?php
// ERROR HANDLING
// ----------------------------------------------------------------------------

// Check if control# already exists
require('../inc/connect_to_DB.php');
$test1 = "SELECT * 
          FROM COMPONENT 
          WHERE SN = '$SN'";
$result1 = $connection->query($test1);    
if ( $result1->num_rows < 1 ) {
  echo "<div class='container'><div class='well'><strong>Please enter a valid serial number.</strong></div></div>";
  exit;
}
// Check for empty input (redundant)
// if ($SN == "") {
//   // if (isset($_SERVER["HTTP_REFERER"])) {
//   //        header("Location: " . $_SERVER["HTTP_REFERER"]);
//   //    }
//   echo "<div class='container'><div class='well'><strong>Please enter a valid serial number.</strong></div></div>";
//   exit;
// }
// ----------------------------------------------------------------------------
?>
<div class="SN-history" id="SN-history">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><?php echo"<strong>{$SN}</strong>";?> Component History</strong>
          <span class="badge pull-right hidden-xs"><?php echo"{$_SESSION['SN-search-count']}";?>  
          </span>
        </div>

          <?php 
          if (isset($_POST['searchHistory'])) {
            require('../inc/connect_to_DB.php');

            // to prevent mysql injection            	
          	$SN = stripcslashes($SN);
          	$SN = mysqli_real_escape_string($connection, $SN);
          	// echo "Serial #:" . $SN; 

        	  $sql = "SELECT  DISTINCT CF543.Control_no, CF543.Fault, CF543.Fix, l.Date_closed, c.Comp_name
        	  		  FROM COMPONENT c, LOG l, CF543
        	  		  WHERE l.Control_no=CF543.Control_no
        	  		  AND CF543.SN=c.SN
        	  		  AND c.SN = '$SN'
        	  		  AND l.Date_closed IS NOT NULL
        	  		  ORDER BY l.Date_closed DESC;";

			      $result = $connection->query($sql);

            if (is_null($result))
              {
                  echo "<div class='well'><h1>No outstanding items.</h1></div>";
              }
              else
              {   
                echo "<div class='col-md-13'>";
                    echo "<table class='table table-striped'>";
                        echo "<thead>";
                            echo"<tr>";
                            	  echo "<th class='col-md-1'>#</th>";                              	  
                                echo "<th class='col-md-1'>Control #</th>";
                                echo "<th class='col-md-2'>Name</th>";
                                echo "<th class='col-md-3'>Fault</th>";
                                echo "<th class='col-md-3'>Fix</th>";
                                echo "<th class='col-md-2'>Date Closed</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $count=1;
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                  {
                    echo "<tr>";                     
                      echo "<td>$count</td>";
                        echo "<td>". $row['Control_no'] ."</td>";
                        echo "<td>". $row['Comp_name'] ."</td>";
                        echo "<td>". $row['Fault'] ."</td>";
                        echo "<td>". $row['Fix'] ."</td>";
                        echo "<td>". $row['Date_closed'] ."</td>";
                    echo "</tr>";
                    $count++;
                  }
                        echo "</tbody>";
                        echo "</table>";
                echo "</div>";
                $_SESSION['SN-search-count'] = $count-1;
            	  }
                mysqli_close($connection);
          	  }
              ?>  
        </div>
      </div>
    </div>    
<?php include '../inc/footer.php';?>
</body>
</html>
<!-- END SEARCHHISTORY.PHP -->

