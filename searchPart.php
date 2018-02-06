<?php
//require_once('connect_to_DB.php');
if(empty($_SESSION)) // if the session not yet started 
   session_start();
?>

<?php
	require_once('connect_to_DB.php');

	if (isset($_POST['search_submit'])) {

		// $searchField = $_POST['search_field'];
		// $searchValue = $_POST['search_value'];

		// to prevent mysql injection
		$lname = $_POST['lname'];
		$lname = stripcslashes($lname);
		$lname = mysqli_real_escape_string($connection, $lname);

		$sql = "SELECT *
				FROM TECH_QUALS
				WHERE Lname = '$lname'";
	
		// $sql = "SELECT *
		// 		FROM TECH_QUALS
		// 		WHERE $search_field = '$search_value'";
		$result = $connection->query($sql);
		
		// Filter search by all selected filters
		// $sql = "SELECT Lname, Fname
		// 		FROM TECHNICIAN
		// 		WHERE Auth_lvl='$Auth_lvl' AND Rank='$Rank' AND Code='$Code' AND Lname='$Lname'";
		// $result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table border='1'>";
		    echo "<th>Code</th><th>Trade</th><th>System</th><th>Level</th>";
		    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		    { 
		      	echo "<tr>";
		      	$code = $row['Code'];$trade = $row['Trade'];$system = $row['System'];$auth_lvl = $row['Auth_lvl'];
		      	echo "<td>". $row['Code'] . "</td>";
		      	echo "<td>". $row['Trade'] . "</td>";
		      	echo "<td>". $row['System'] . "</td>";
		      	echo "<td>". $row['Auth_lvl'] . "</td>";
		      	echo "</tr>";
		    }
		    echo "</table>";
		} 
		else {
		    echo $search_field;
		    echo $search_value;
		    echo "0 results";
		}
		//$connection->close();
	}
?>