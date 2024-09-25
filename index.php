
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>login page</title>
<head>



<div class="container" style="background-color:#FFFFFF">
<img src="images/logo.png" width="1140px" height="100px">
<body style="background-color:#cdeeff">
<div class="col-xs-4">
</div>
<div class="col-xs-4">

<form action="index.php" method="POST">
<h2 align="center">Please Login Here</h2>

<br>Enter Username<br>
<input type="text" name="username" required="required" class="form-control" placeholder="Enter username"><br>
Password<br>
<input type="password" name="password" required="required" class="form-control" placeholder="Enter password"><br>
<input type="submit" name="submit" value="login"class="btn btn-success"><br><br>
</form>

<?php
//Login to the system submission to make attendence
include 'connect.php';;
session_start();
if(isset($_REQUEST['submit'])){
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$querry="SELECT `username`, `password`,`position` FROM `staff` where password='$password' and username='$username'";
$result=$conn->query($querry)or die(mysql_error());
$count=0;
if($result){
while($query_row=$result->fetch_assoc() ){
$count=1;
$_SESSION['username']=$query_row['username'];
$_SESSION['position']=$query_row['position'];

if($_SESSION['position']=='Admin'){
header( 'Location:addUsers.php' ) ;
}
else if($_SESSION['position']=='User'){
header( 'Location:addEvent.php' ) ;
}else{
	echo 'Invalid username or Password';
}
}
echo 'Enter a valid username and Password';
}else{
die(mysql_error());	
}
}

?>
<h4>Are you a player? <a href="plogin.php">click here</a></a><br>
<h4>If you want to register? <a href="addPlayers.php">click here</a></a><br>

</div>
<div class="col-xs-4">
</div>
</div>
<div id="footer">
<p><br>
<h6 align="center">Designed by Regis</h2>
</p>
</div>
</div>
</div>
</body>
</html>
