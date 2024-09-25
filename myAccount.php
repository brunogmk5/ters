<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>players</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>
<li class="active"><a href="myAccount.php">My Profile</a></li>
<li ><a href="events.php">Events</a></li>
<li><a href="subscription.php">subscription</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">
<div>
</nav>
<h1 align="left">My Profile</h1>
<?php
session_start();
include'connect.php';
if(isset($_SESSION['player_id'])){
$search=$_SESSION['player_id'];
$querry="SELECT `id`,`firstname`, `lastname`,`club`, `weight`, `sex`, `age`, `level`, `password` FROM `players` WHERE  id='$search' ";
}else{
//header( 'Location:plogin.php' )	;
}
$result=$conn->query($querry);
echo '<table border="0" id="tableorders" class="table table-striped">';
//echo '<tr><th>id</th><th>First Name</th><th>Last  Name</th><th>Club</th><th>Weight</th><th>sex</th><th>Age</th><th>Level</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$firstname=$query_row['firstname'];
$lastname=$query_row['lastname'];
$club=$query_row['club'];
$weight=$query_row['weight'];
$sex=$query_row['sex'];
$age=$query_row['age'];
$level=$query_row['level'];

echo '<tr><td>ID</td><td>'. $id.'</td></tr>';
echo '<tr><td>First Name</td><td>'.$firstname.'</td></tr>';
echo '<tr><td>Last Name</td><td>'.$lastname.'</td></tr>';
echo '<tr><td>Club</td><td>'.$club.'</td></tr>';
echo '<tr><td>Weight</td><td>'.$club.'</td></tr>';
echo '<tr><td>Sex</td><td>'.$club.'</td></tr>';
echo '<tr><td>Age</td><td>'.$club.'</td></tr>';
echo '<tr><td>Level</td><td>'.$club.'</td></tr>';
echo '<tr><td></td><td>';
echo '<a href='."updatePlayer.php?idu=$id&firstname=$firstname&lastname=$lastname&club=$club&age=$age&weight=$weight&sex=$sex&level=$level".'>'.'Update&nbsp'.'</a>';
echo '<a href='."updatePlayer.php?idd=$id".'>'.'&nbspRemove Account'.'</a><br>';
echo '</td></tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';

?>
</div>
<div>
<div id="footer">

</div>

</body>
</html>