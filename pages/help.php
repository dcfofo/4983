<!-- Filename: help.php -->
<!-- Author: Danny Ford -->
<!-- Date: 30-Jan-2018 -->
<!-- Description: -->
<!-- Bugs/Notes:  -->


<?php
    if(empty($_SESSION)) // if the session not yet started 
        session_start(); 
    if(!isset($_SESSION['user']))
        header("location: login.php");
    // if(!isset($_POST['submit'])) { // if the form not yet submitted
    //  header("Location: login.php");
    //  exit;
?>

<!-- START CLOSED.PHP -->
<?php include '../inc/header.php';?>
<body id="closed-items-body">
<?php $page = 'help'; include '../inc/navbar.php';?>

<div class="help" id="help">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Open Items</h4></div><br>
            	<div class="container">
            		<p>This page contains a list of all outstanding items in the users' shop. Entries are ordered by date received, with newer entries at the bottom of the list. </p>
					<h4>Closing Outstanding Items </h4>
					<p>To remove an item from this list, a user must enter the fix details and select the close button. This will remove the item from this list and add it to the shop inventory list in the Shop Inventory tab.</p>
					<h4>Adding Items </h4>
					<p>To add an item to the list of outstanding items, a user must fill in the control number, serial number and fault of the component and select the Add button. <br>The control number is unique and the serial number must be a valid number that exists in the database.</p>
					<!-- <ul>
						<li>sdfasfas</li>
					</ul> -->
            	</div><br>
            <div class="panel-heading"><h4>Shop Inventory</h4></div><br>
            	<div class="container">
            		<p>This page contains a list of all items in the shops' inventory. Entries are ordered by Nato Stock Number.</p>
					<h4>Removing Items From Inventory </h4>
					<p>To remove an item from inventory, simply select the remove button. The user will be prompted for confirmation before the entry is removed. <br>Upon removal, the item is removed from the inventory list but remains in the shops log in the Shop Log tab.</p>
            	</div><br>
            <div class="panel-heading"><h4>Shop Log</h4></div><br>
            	<div class="container">
            		<p>This page contains a list of all items that have been processed through the shop, i.e. items that have been added to the list of outstanding items, added to the shops' inventory. <br>Items are listed by date, with newer entries at the top. Items cannot be removed from the log.</p>
					<h4>Filtering the Log </h4>
					<p>By default, this page lists all items in the log. To filter the list, the user must enter a start date and an end date in the following format; YYYY-MM-DD, and select the search button. <br>This will display a list of log entries between, and including, the entered dates. To view the full list, select the green List button.</p>
            	</div><br>
            <div class="panel-heading"><h4>Shops Dropdown Menu</h4></div><br>
            	<div class="container">
            		<p>This dropdown menu displays a list of second line maintenance shops within 14 AMS. It only includes shops that repair aircraft components, i.e. it does not include NDT Shop, ACS Shop, or ARO. Selecting a shop from this list will display a page with a list of that shops inventory. The users' shop will be highlighted in the list and when selected will direct the <br>user to the Shop Inventory tab.</p>
            	</div><br>
            <div class="panel-heading"><h4>SN History Search Box</h4></div><br>
            	<div class="container">
            		<p>Entering a valid serial number in this search box will display a list of fault and rectification history for the entered SN. The results are ordered by date, with the newest entries at the <br>top of the page.</p>
            	</div><br>
            <div class="panel-heading"><h4>User Dropdown Menu</h4></div><br>
            	<div class="container">
            		<p>This menu includes this help page, and a Logout button.</p>
            	</div><br>
        </div>
    </div>
</div>
<?php include '../inc/custom-js.php';?>
<?php include '../inc/footer.php';?>
</body>
</html>