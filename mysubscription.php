<?php
session_start();
/*
session_start();
if($_SESSION['position']=='Admin'){
}
else{
header( 'Location:index.php' ) ;
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>HEALTH PROVIDER DETAILS</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="events.php">Events</a></li>

<li class="active"><a href="subscription.php">subscription</a></li>

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
<form action="subscription.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">subscriptions</h1>
<?php
include'connect.php';
$querry="SELECT `no`, `player_id`, `event_id` FROM `subscription` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `no`, `player_id`, `event_id` FROM `subscription` WHERE  player_id='$search'";
}
if(isset($_SESSION['player_id'])){
	$pid=$_SESSION['player_id'];
	$querry="SELECT `no`, `player_id`, `event_id` FROM `subscription` WHERE  player_id='$pid'";

}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>player_id</th><th>events</th><th>date</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$player_id=$query_row['player_id'];
$event_id=$query_row['event_id'];
$no=$query_row['no'];
echo '<tr>';
echo '<td>';
echo $no;
echo '</td>';
echo '<td>';
echo $player_id;
echo '</td>';
echo '<td>';
echo $event_id;
echo '</td>';

echo '<td>';
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