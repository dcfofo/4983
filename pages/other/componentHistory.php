<!-- Filename: componentHistory.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: Searches the database for fault and rectification history -->
<!-- for the entered serial number (SN). For Shop Registry - COMP 4983 Project application.-->
<!-- Bugs:
	 - Need to finish the isset function for showing the panel contents.
	 -   -->
<!-- Notes:
	 -  -->


<?php
    if(empty($_SESSION))
        session_start(); 
    if(!isset($_SESSION['user']))
        header("location: login.php");
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
   	// 	header("Location: login.php");
   	// 	exit;
?>

<?php include '../inc/header.php';?>

<body id="search-history-body">
<?php include '../inc/navbar.php';?>

<div class="closed-items" id="closed-items">
  <div class="container">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">            	
      	<!-- <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Panel header</h4> -->
      	<div class="input-group col-xs-3">
      	    <input type="text" class="form-control" placeholder="Enter Serial #">
      	    <div class="input-group-btn">
      	        <button class="btn btn-primary" type='submit' name="search_sn" id="search_sn"><i class="glyphicon glyphicon-search"></i></button>
      	        <!-- <button class="btn btn-primary"><i class="glyphicon glyphicon-wrench"></i></button> -->
      	    </div>
      	</div>
      </div>
    
    <!-- START COMPONENTHISTORY.PHP -->
    <?php 
    require('../inc/connect_to_DB.php');

    $sql = "SELECT DISTINCT c.Comp_name, c.NSN, c.SN, CF543.Control_no, l.Date_closed, l.Log_closed_by
            FROM COMPONENT c, LOG l, CF543, TECHNICIAN
            WHERE l.Control_no=CF543.Control_no
            AND CF543.SN=c.SN
            AND TECHNICIAN.Shop='{$shop}'
            AND l.Shop= '{$shop}'
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
    	if (isset($search_sn)) {
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
    }
    $_SESSION['search-history-count'] = $count-1;
    mysqli_close($connection);
    ?>  
    </div>
  </div>
</div>    
<?php include '../inc/custom-js.php';?>
<?php include '../inc/footer.php';?>
</body>
</html>
<!-- END COMPONENTHISTORY.PHP
