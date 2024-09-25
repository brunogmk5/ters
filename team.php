<?php
session_start();
/*
session_start();
if($_SESSION['position']=='Admin'){
}
else{
header( 'Location:index.php' ) ;
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>HEALTH PROVIDER DETAILS</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.png" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="events.php">Events</a></li>
<li><a href="subscription.php">subscription</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">
<div id="login">
<h2 align="center">Team</h2>
<table border="0" align="center">
<form action="match.php" method="POST">
<tr><td>
Level<br>
<td/>
<input type="text" name="level" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Weight<br>
<td/>
<input type="text" name="weight" required="required" class="form-control"><br>
</td></tr>
<td>
<input type="SUBMIT" name="submit" value="Go"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>


</div>
<?php
include'connect.php';
shuffle();
$number=shuffle();
while($query)
?>
</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>