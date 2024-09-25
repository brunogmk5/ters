<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>players login page</title>
<head>



<div class="container" style="background-color:#FFFFFF">
<img src="images/logo.png" width="1140px" height="100px">
<body style="background-color:#cdeeff">
<div class="col-xs-4">
</div>
<div class="col-xs-4">

<form action="plogin.php" method="POST">
<h2 align="center">players</h2>

<br>id<br>
<input type="text" name="id" required="required" class="form-control" placeholder="Enter id"><br>
password<br>
<input type="password" name="password" required="required" class="form-control" placeholder="Enter password"><br>
<input type="submit" name="submit" value="login"class="btn btn-success"><br><br>
</form>

<?php
//Login to the system submission to make attendence
session_start(); 
include 'connect.php'; 
if(isset($_REQUEST['submit'])){
$id=$_REQUEST['id'];
$password=$_REQUEST['password'];
$querry="SELECT id,password from players WHERE id='$id' and password='$password'";

	$resultl=$conn->query($querry);
	if($resultl){
	while($row=$resultl->fetch_assoc()){
		$id=$row['id'];
	    $password=$row['password'];
		$_SESSION['player_id']=$id;
	
		header("location:MyAccount.php");	
	}
	echo 'Invalid username or password';
	}else {
  echo  mysqli_error($conn);
}

}
?>
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