
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>addsubscription</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>

<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>
<li><a href="subscription.php">subscription</a></li>
<li><a href="matchGenerator.php">matchGenerator</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">addsubscription</h2>
<table border="0" align="center">

<form action="addSubscription.php" method="POST">
<tr><td>
player_id<br>
<td/>
<input type="text" name="player_id" required="required" class="form-control" value=" <?php if(isset($_GET['player_id'])){echo $_GET['player_id'];}?>"><br>
</td></tr>
<tr><td>
events<br>
<td/>
<input type="text" name="events" required="required" class="form-control"><br>
</td></tr>
<tr><td>
date<br>
<td/>
<input type="date" name="date" required="required" class="form-control"><br>
</td></tr>
<tr><td>
<input type="SUBMIT" name="submit1" value="Add"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
include 'connect.php';
if(isset($_REQUEST['submit1'])){
//fields for department
$player_id=$_REQUEST['player_id'];
$events=$_REQUEST['events'];
$date=$_REQUEST['date'];
$querry="INSERT INTO `subscription`( `player_id`, `events`, `date`,`Vs`)
                     VALUES ('$player_id','$events','$date','$Vs')";
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