<!-- Need to deal with the case where user enters nothing and presses enter -->
<!-- When user enters name and hits enter nothing happens -->

<!DOCTYPE html>
<html>
<body>
<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','danny','danny','Deployment_Planner');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");

$sql = "SELECT * 
        FROM TECHNICIAN 
        WHERE Lname = '". $q ."'";

$result = $con->query($sql)
          or die("Failed to query TECHNICIAN table " . mysqli_error());

if (is_null($result))
{
    echo "Must enter a valid Surname";
}
else if ($result->num_rows === 1) 
{   
    echo "<table class='table'>
    <tr>
    <th>Lastname</th>
    <th>Firstname</th>
    <th>Rank</th>
    <th>Secton</th>
    <th>Level</th>
    </tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
    {
        echo "<tr>";
        echo "<td>" . $row['Lname'] . "</td>";
        echo "<td>" . $row['Fname'] . "</td>";
        echo "<td>" . $row['Rank'] . "</td>";
        echo "<td>" . $row['Section'] . "</td>";
        echo "<td>" . $row['Auth_lvl'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else 
{
    echo "Surname does not exist";
}

mysqli_close($con);
?>
</body>
</html>