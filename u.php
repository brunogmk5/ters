<?php
session_start();
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User'){
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
<title>Health Providers</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>
<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<table border="0" align="center">

<h3 align="center">Update subsc Info.</h3>
<table border="0" align="center">
<form action="updateSubscription.php" method="POST">
<tr><td> 
player_id
</td> <td>
<input type="text" name="player_id" required="required" class="form-control" value=" <?php if(isset($_GET['player_id'])){echo $_GET['player_id'];}?>" ><br></td></tr>
<tr><td> 
events<br></td><td>
<input type="text" name="events" required="required" class="form-control"value=" <?php if(isset($_GET['events'])){echo $_GET['events'];}?>"><br></td></tr> 
<tr><td>
date<br></td><td>
<input type="date" name="date" required="required" class="form-control"><br></td></tr>
<tr><td>
Vs<br></td><td>
<input type="text" name="Vs" required="required" class="form-control" value=" <?php if(isset($_GET['Vs'])){echo $_GET['Vs'];}?>"><br></td><td>
</td></tr> 
</td><td>
<input type="SUBMIT" name="update" value="UPDATE" class="btn btn-success"><br></td></tr>
</form></table>

<?php
include 'connect.php';;
if(isset($_GET['idd'])){
$player_id=$_GET['idd'];
$querry="delete from subscription WHERE `player_id`='$player_id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:subscription.php' ) ;
}
	
if(isset($_REQUEST['update'])){
//fields for department
$player_id=$_REQUEST['player_id'];
$events=$_REQUEST['events'];
$date=$_REQUEST['date'];
$Vs=$_REQUEST['Vs'];
$querry="UPDATE `subscription` SET `player_id`='$player_id',`events`='$events',`date`='$date',`Vs`='$Vs' WHERE `player_id`=$player_id";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else
echo "Querry run successifully";
}

?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>