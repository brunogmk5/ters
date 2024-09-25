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
<title>Add users</title>
<head>



<div class="container" style="background-color:white">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>
<li class="active"><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>
<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>
<li><a href="matchGenerator.php">matchGenerator</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Register Staffs</h2>
<table border="0" align="center">

<form action="addUsers.php" method="POST">
<tr><td>
Username<br>
<td/>
<input type="text" name="username" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Firstname<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Lastname<br>
<td/>
<input type="text" name="lastname" required="required" class="form-control"><br>
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
<tr><td>
Position<br>
<td/>
<select name="position" class="form-control"> <option>Choose your Position</option><option>Admin</option><option>User</option></select ><br>
</td></tr>
<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="Add"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['submit1'])){
//fields for department
$username=$_REQUEST['username'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
$position=$_REQUEST['position'];


include 'connect.php';;
if($password==$password2){
$querry="INSERT INTO `staff`( `firstname`, `lastname`, `username`, `password`, `position`)
                     VALUES ('$firstname','$lastname','$username','$password','$position')";
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