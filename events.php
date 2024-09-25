
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>Events</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>

<li class="active"><a href="events.php">Events</a></li>
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
<form action="events.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">List of events</h1>
<?php
session_start();
include'connect.php';
$querry="SELECT `id`, `name`, `venue`,`start`, `end`,`description` FROM `events` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `id`, `name`,`venue`, `start`, `end`,`description` FROM `events` WHERE  name='$search' or `start`='$search' or `end`='$search' or id='$search' ";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>id</th><th>Event Name</th><th>Venue</th><th>Start</th><th>End</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$name=$query_row['name'];
$venue=$query_row['venue'];
$start=$query_row['start'];
$end=$query_row['end'];
$description=$query_row['description'];
echo '<tr>';
echo '<td>';
echo $id;
echo '</td>';
echo '<td>';
echo $name;
echo '</td>';
echo '<td>';
echo $venue;
echo '</td>';
echo '<td>';
echo $start;
echo '</td>';
echo '<td>';
echo $end;
echo '</td>';
echo '<td>';
if(isset($_SESSION['position'])){
echo '<a href='."updateEvent.php?idu=$id&name=$name&venue=$venue&description=$description".'>'.'Update&nbsp'.'</a>';
echo '<a href='."delete.php?idd=$id".'>'.'&nbspRemove'.'</a><br>';
}
echo '<a href='."subscribe.php?eid=$id".'>'.'&nbspsubscribe'.'</a><br>';
echo '</td>';
echo '<tr>';
echo '<tr><td colspan="6"><b>Description:<br></b>'.$description.'</td></tr>';
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