
<?php
session_start();
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User'){
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
<title>delete</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">


<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">delete </h2>
<table border="0" align="center">

<div class="container"  style="background-color:white">
    <!--Row with three equal columns-->
    <div class="row">
        <div class="col-md-3"><!--Column left--></div>
        <div class="col-md-6"><form action="delete.php" method="POST">
    <div class="form-group">
        <label for="input Id">id</label>
        <input type="text" name="id" value='<?php if(isset($_GET['idd'])){echo $_GET['idd']; }?>'class="form-control" id="inputfirstname" placeholder="id">
    </div>
    <button type="submit" name="delete" class="btn btn-primary">delete</button>
</form>


</div></div>

        <div class="col-md-3"><!--Column right--></div>
    </div>

</body>
</html>
<?php
include 'connect.php';

if(isset($_REQUEST['delete'])){
	$id=$_REQUEST['id'];
$querryd="DELETE FROM `events` WHERE id=$id";	
$resultd=$conn->query($querryd);	
if(!$resultd){
echo "please try another pin";
}else{
	echo"thank u";
	header("location:events.php");
}
}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>
