<?php
session_start();
//if($_SESSION['position']=='Admin'){
//}
//else{
//header( 'Location:index.php' ) ;
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>update player</title>
<head>


<div class="container" Style="background-color:WHITE">
<img src="images/logo.png" width="1180px" height="100px">


<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>

<li><a href="addPlayers.php">Add players</a></li>
<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Update Player info.</h2>
<table border="0" align="center">


<form action="updatePlayer.php" method="POST">
<tr><td>
Enter id<br>
<td/>
<input type="text" name="id" required="required" class="form-control" value=" <?php if(isset($_GET['idu'])){echo $_GET['idu'];}?>"><br>
</td></tr>
<tr><td>
Firstname<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control" value=" <?php if(isset($_GET['firstname'])){echo $_GET['firstname'];}?>"><br>
</td></tr>
<tr><td>
Lastname<br>
<td/>
<input type="text" name="lastname" required="required" class="form-control" value=" <?php if(isset($_GET['lastname'])){echo $_GET['lastname'];}?>"><br>
</td></tr>

<tr><td>
Club<br>
<td/>
<input type="text" name="club" required="required" class="form-control" value=" <?php if(isset($_GET['club'])){echo $_GET['club'];}?>"><br>
</td></tr>

<tr><td>
Weight<br>
<td/>
<input type="text" name="weight" required="required" class="form-control" value=" <?php if(isset($_GET['weight'])){echo $_GET['weight'];}?>"><br>
</td></tr>

<tr><td>
Age<br>
<td/>
<input type="text" name="age" required="required" class="form-control" value=" <?php if(isset($_GET['age'])){echo $_GET['age'];}?>"><br>
</td></tr>

<tr><td>
Sex<br>
<td/>
<select name="sex" class="form-control"> <option>Male</option><option>Female</option></select >
</td></tr><br>
<tr><td>
Level<br>
<td/>
<br><input type="text" name="level" required="required" class="form-control" value=" <?php if(isset($_GET['level'])){echo $_GET['level'];}?>"><br>
</td></tr>

<tr><td>
Password<br>
<td/>
<input type="password" name="password1" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Re-type Password<br>
<td/>
<input type="password" name="password2" required="required" class="form-control"><br>
</td></tr>
<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="Update"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php

include 'connect.php';
if(isset($_GET['idd'])){
if(isset($_SESSION['player_id'])){
$id=trim($_SESSION['player_id']);
$querry="delete from players WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:index.php' ) ;
}
}
if(isset($_GET['idd'])&&$_SESSION['position']){
$id=$_GET['idd'];
$querry="delete from players WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:players.php' ) ;
}
if(isset($_REQUEST['submit1'])){
//fields for department
$id=trim($_REQUEST['id']);
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
$club=$_REQUEST['club'];
$weight=$_REQUEST['weight'];
$age=$_REQUEST['age'];
$level=$_REQUEST['level'];
$sex=$_REQUEST['sex'];

if($password==$password2){
$querry="UPDATE `players` SET `firstname`='$firstname',`lastname`='$lastname',`club`='$club',`weight`='$weight',`age`='$age',`level`='$level',`password`='$password',`sex`='$sex' WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else
echo "Querry run successifully";
}
else{
echo "Password does not match";
}}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>