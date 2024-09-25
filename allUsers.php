<?php

session_start();
if($_SESSION['position']=='Admin'){
}
else{
header( 'Location:index.php' ) ;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>All users</title>
<head>


<div class="container"  style="background-color:white">
<img src="images/logo.png" width="1140px" height="100px">
<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>
<li><a href="addUsers.php">Add Users</a></li>
<li class="active"><a href="allUsers.php">Staffs</a></li>
<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>
<li><a href="matchGenerator.php">matchGenerator</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">
<div>
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="#">Search</a>
</div>
<div>
<form action="allusers.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">staffs</h1>
<?php
include'connect.php';
$querry="SELECT  `firstname`, `lastname`, `username`, `password`, `position` FROM `staff`";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `firstname`, `lastname`, `username`, `password`, `position` FROM `staff` WHERE firstname='$search' or username='$search' or lastname='$search' ";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>First Name</th><th>Last  Name</th><th>Username</th><th>Position</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$firstname=$query_row['firstname'];
$lastname=$query_row['lastname'];
$username=$query_row['username'];
$position=$query_row['position'];

echo '<tr>';
echo '<td>';
echo $firstname;
echo '</td>';
echo '<td>';
echo $lastname;
echo '</td>';
echo '<td>';
echo $username;
echo '</td>';
echo '<td>';
echo $position;
echo '</td>';
echo '<td>';
echo '<a href='."updateStaff.php?username=$username&firstname=$firstname&lastname=$lastname".'>'.'Update&nbsp'.'</a>';
echo '<a href='."updateStaff.php?usernamed=$username".'>'.'&nbspRemove'.'</a><br>';
echo '</td>';
echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';

?>
</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>