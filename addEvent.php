<?php

session_start();
if($_SESSION['position']=='Admin'|| $_SESSION['position']=='User'){
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
<title>addEvent</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>
<li><a href="players.php">players</a></li>

<li class="active"><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>
<li><a href="matchGenerator.php">matchGenerator</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Events Registration form </h2>
<div class="row">
<div class="col-xs-3">

</div>
<div class="col-xs-6">
<form action="addEvent.php" method="POST">
Id<br>
<input type="text" name="id" required="required" class="form-control"><br>
Name<br>
<input type="text" name="name" required="required" class="form-control"><br>
Venue<br>
<input type="text" name="venue" required="required" class="form-control"><br>
Start<input type="date" name="start" required="required" >
End<input type="date" name="end" required="required" ><br>
Enter Description
<textarea name="description" rows="7" class="form-control">
 </textarea>
<input type="SUBMIT" name="submit1" value="add"required="required" class="btn btn-success"><br>
</div>
<div class="col-xs-3">

</div>
</form>
</div>
<?php
include 'connect.php';
if(isset($_REQUEST['submit1'])){
//fields for department
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$venue=$_REQUEST['venue'];
$start=$_REQUEST['start'];
$end=$_REQUEST['end'];
$description=$_REQUEST['description'];

$querry="INSERT INTO `events`(`id`, `name`,`venue`, `start`, `end`,`description`)
                      VALUES ('$id','$name','$venue','$start','$end','$description')";
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