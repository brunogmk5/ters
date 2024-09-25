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
<title>update</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>
<li><a href="players.php">players</a></li>

<li><a href="addEvent.php">Add Events</a></li>
<li><a href="events.php">Events</a></li>


<li><a href="subscription.php">subscription</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<table border="0" align="center">

<h3 align="center">Update events.</h3>
<table border="0" align="center">
<form action="updateEvent.php" method="POST">
<tr><td> 
id
</td> <td>
<input type="text" name="id" required="required" class="form-control" value=" <?php if(isset($_GET['idu'])){echo $_GET['idu'];}?>" ><br></td></tr>
<tr><td> 
name<br></td><td>
<input type="text" name="name" required="required" class="form-control"value=" <?php if(isset($_GET['name'])){echo $_GET['name'];}?>"><br></td></tr>
<tr><td> 
Venue<br></td><td>
<input type="text" name="venue" required="required" class="form-control"value=" <?php if(isset($_GET['venue'])){echo $_GET['venue'];}?>"><br></td></tr>
<tr><td> 
start<br></td><td>
<input type="date" name="start" required="required" class="form-control"  value=" <?php if(isset($_GET['start'])){echo $_GET['start'];}?>"><br></td></tr>
 <tr><td>
end<br></td><td>
<input type="date" name="end" required="required" class="form-control"><br></td></tr>
 <tr><td>
Description<br></td><td>
<textarea name="description" rows="7" class="form-control"  value=" <?php if(isset($_GET['description'])){echo $_GET['description'];}?>">
 </textarea>
<tr><td> 
 </td><td>
<input type="SUBMIT" name="update" value="UPDATE" class="btn btn-success"><br></td></tr>
</form></table>

<?php

include 'connect.php';
if(isset($_REQUEST['update'])){
//fields for department
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$venue=$_REQUEST['venue'];
$start=$_REQUEST['start'];
$description=$_REQUEST['description'];
$end=$_REQUEST['end'];
$querry="UPDATE `events` SET `id`='$id',`name`='$name',`venue`='$venue',`start`='$start',`end`='$end',`description`='description' WHERE id='$id'";
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