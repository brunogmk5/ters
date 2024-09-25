<?php
include 'connect.php';

if(isset($_GET['no'])){
$no=$_GET['no'];
$querry="DELETE FROM `subscription` WHERE no='$no'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
header('location:subscription.php');
}
}
?>