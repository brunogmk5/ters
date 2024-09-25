
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Players</title>
<head>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Player Registration Form</h2>
<table border="0" align="center">

<form action="addPlayers.php" method="POST">
<tr><td>
Enter id<br>
<td/>
<input type="text" name="id" required="required" class="form-control"><br>
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
Club<br>
<td/>
<input type="text" name="club" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Weight<br>
<td/>
<input type="text" name="weight" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Age<br>
<td/>
<input type="text" name="age" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Sex<br>
<td/>
<select name="sex" class="form-control"> <option>Male</option><option>Female</option></select >
</td></tr><br>
<tr><td>
Level<br>
<td/>
<br><input type="text" name="level" required="required" class="form-control"><br>
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
<input type="SUBMIT" name="submit1" value="submit"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['submit1'])){
//fields for department
$id=$_REQUEST['id'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
$club=$_REQUEST['club'];
$weight=$_REQUEST['weight'];
$age=$_REQUEST['age'];
$level=$_REQUEST['level'];
$sex=$_REQUEST['sex'];

include 'connect.php';;
if($password==$password2){
$querry="INSERT INTO `players`(`firstname`, `lastname`, `id`, `club`, `weight`, `age`, `level`, `sex`,`password`)
                     VALUES ('$firstname','$lastname','$id','$club','$weight','$age','$level','$sex','$password')";
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
}
header("location:events.php");	
}

?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>