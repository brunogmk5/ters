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
<script type="text/javascript" src="printer.js"></script>
<title>match Generator</title>
<head>


<div class="container"  style="background-color:white">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li ><a href="index.php">Home</a></li>

<li><a href="events.php">Events</a></li>
<li><a href="subscription.php">subscription</a></li>
<li class="active"><a href="matchGenerator.php">matchGenerator</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">
<div class="row">

<div class="col-xs-12">
<form action="information.php"  method="POST"><br>
<div class="col-xs-2">
Sex<select name='sex' class="form-control"><option>Male</option><option>Female</option></select>
</div>
<div class="col-xs-2">
Min Weight<br>
<input type="number" name="minweight" required="required" class="form-control">
</div>
<div class="col-xs-2">
Max  Weight<br>
<input type="number" name="maxweight" required="required" class="form-control"><br>
</div>
<div class="col-xs-1">
Min Age<br>
<input type="number" name="minage" required="required" class="form-control">
</div>
<div class="col-xs-1">
Max Age<br>
<input type="number" name="maxage" required="required" class="form-control"><br>
</div>
<div class="col-xs-2">
Event Id<br>
<input type="number" name="event_id" required="required" class="form-control"><br>
</div>
<div class="col-xs-2">
<br>
<input type="SUBMIT" name="generate" value="Generate"required="required" class="btn btn-danger"><br>
</div>
</form>

</div>

<h2 align="left">&nbsp&nbsp&nbsp&nbspSearch Initial Teams</h1><hr>
<div class="col-xs-12">
<form action="matchGenerator.php"  method="POST"><br>
<div class="col-xs-2">
Sex<select name='sex' class="form-control"><option>Male</option><option>Female</option></select>
</div>
<div class="col-xs-2">
Min Weight<br>
<input type="number" name="minweight" required="required" class="form-control">
</div>
<div class="col-xs-2">
Max  Weight<br>
<input type="number" name="maxweight" required="required" class="form-control"><br>
</div>
<div class="col-xs-1">
Min Age<br>
<input type="number" name="minage" required="required" class="form-control">
</div>
<div class="col-xs-1">
Max Age<br>
<input type="number" name="maxage" required="required" class="form-control"><br>
</div>
<div class="col-xs-2">
Event Id<br>
<input type="number" name="event_id" required="required" class="form-control"><br>
</div>
<div class="col-xs-2">
<br>
<input type="SUBMIT" name="search" value="Search"required="required" class="btn btn-danger"><br>
</div>
</form>
</div>
</div>
<div id="toPrint">

<?php
include'connect.php';
$querry="SELECT `tid`, `home`, `away`,`comment`,`name` FROM `teams`,events 
                          WHERE `teams`.`event_id`=`teams`.`event_id`";
echo '<h3>Brackets:';
$comment="All Groups</h3>";
if(isset($_REQUEST['search'])){
	$sex=$_REQUEST['sex'];
	$min_weight=$_REQUEST['minweight'];
	$max_weight=$_REQUEST['maxweight'];
	$min_age=$_REQUEST['minage'];
	$max_age=$_REQUEST['maxage'];
	$event_id=$_REQUEST['event_id'];
	$eventid=$_REQUEST['event_id'];
	$comment='Wgt: '.$min_weight.'-' .$max_weight.' Age: '.$min_age.'-'.$max_age.' Sex: '.$sex.' Event: '.$event_id;
	$querry="SELECT `tid`, `home`, `away`,`comment`,`name` FROM `teams`,events 
                          WHERE `teams`.`event_id`=`teams`.`event_id` and `comment`='$comment'";
}
$result=$conn->query($querry);
echo $comment.'</h3>';
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>tid</th><th>Blue</th><th> Red </th><th>comment</th><th>Event Name</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$tid=$query_row['tid'];
$home=$query_row['home'];
$away=$query_row['away'];
$comment=$query_row['comment'];
$event=$query_row['name'];
echo '<tr>';
echo '<td>';
echo $tid;
echo '</td>';

echo '<td>';
echo getRealNames($conn,$home);
echo '</td>';

echo '<td>';
echo getRealNames($conn,$away);
echo '</td>';

echo '<td>';
echo $comment;
echo '</td>';

echo '<td>';
echo $event;
echo '</td>';
echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';
///get data

function getRealNames($conn,$id){
	$querry="SELECT * FROM `players` WHERE id='$id'";
	$result=$conn->query($querry)->fetch_assoc() ;
	return $result['firstname'].' '.$result['lastname'];
}
?>
</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>