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
<title>updateStaff</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

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
<table border="0" align="center">

<h3 align="center">Update Staff Info.</h3>
<table border="0" align="center">
<form action="updateStaff.php" method="POST">
<tr><td> 
Username
</td> <td>
<input type="text" name="username" required="required" class="form-control" value=" <?php if(isset($_GET['username'])){echo $_GET['username'];}?>" ><br></td></tr>
<tr><td> 
Firstname<br></td><td>
<input type="text" name="firstname" required="required" class="form-control"value=" <?php if(isset($_GET['firstname'])){echo $_GET['firstname'];}?>"><br></td></tr>
<tr><td> 
Lastname<br></td><td>
<input type="text" name="lastname" required="required" class="form-control"  value=" <?php if(isset($_GET['lastname'])){echo $_GET['lastname'];}?>"><br></td></tr>
 <td>
Password</td><td>
<input type="password" name="password1" required="required" class="form-control"><br></td></tr>

<tr><td> 
Re-type Password</td><td>
<input type="password" name="password2" required="required" class="form-control"><br></td></tr>

<tr><td> 
Position</td><td>
<select name="position" class="form-control"> <option>Choose your Position</option><option>User</option><option>Admin</option></select ><br>

<tr><td> </td><td>
<input type="SUBMIT" name="update" value="UPDATE" class="btn btn-success"><br></td></tr>
</form></table>

<?php
include 'connect.php';;
if(isset($_GET['usernamed'])){
$username=$_GET['usernamed'];
$querry="delete from staff WHERE username='$username'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:allUsers.php' ) ;
}
	
if(isset($_REQUEST['update'])){
//fields for department
$username=$_REQUEST['username'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
$position=$_REQUEST['position'];



if($password==$password2){
$querry="UPDATE `staff` SET `firstname`='$firstname',`lastname`='$lastname',`password`='$password',`position`='$position',`password`='$password' WHERE username='$username'";
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