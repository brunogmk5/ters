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
<li><a href="subscription.php">subscription</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">
<!--
<div class="container" id="login">
<h2 align="center">Team</h2>

<form action="match.php" method="POST" class="form-control">
Level<br>
<input type="text" name="level" required="required" class="form-control"/><br>
Weight<br>
<input type="text" name="weight" required="required" class="form-control"/><br>
<input type="SUBMIT" name="submit" value="Go"required="required" class="btn btn-success"/>
</form><br>
0784934638
</div>
-->
</div><div class="container"  style="background-color:white">
<?php
include'connect.php';
$querry="SELECT  `weight`, `level`,`id` FROM `players` WHERE 1";
if(isset($_REQUEST['submit'])){
$level=$_REQUEST['level'];
$weight=$_REQUEST['weight'];
$querry="SELECT  `weight`, `level`,`id` FROM `players` WHERE  `level`='$level' and `weight`='$weight'";
}
/*if(isset($_SESSION['level'])){
	$level=$_SESSION['level'];
	$querry="SELECT  `weight`, `level` FROM `players` WHERE  level='$level' ";

}*/

$result=$conn->query($querry);
echo mysqli_affected_rows($conn);
$myarray=$result->fetch_assoc();
shuffle($myarray);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>weight</th><th>level</th><th>id</th></tr>';
if($result){
while($query_row=$result->fetch_assoc()){
	
$weight=$query_row['weight'];
$level=$query_row['level'];
$id=$query_row['id'];
echo '<tr>';
echo '<td>';
echo $weight;
echo '</td>';
echo '<td>';
echo $level;
echo '</td>';
echo '<td>';
echo $id;
echo '</td>';
echo '<tr>';
}
echo '</table>';

}
else
echo  mysqli_error($conn);
echo '</form>';
mysqli_close($conn);
?>

<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
</div>
<div id="footer">

</div>

</body>
</html>