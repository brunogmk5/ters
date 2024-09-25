<?php
include 'connect.php';
session_start();
if(isset($_SESSION['player_id'])){

}else{
	return;
}
if(isset($_GET['eid'])){
$eid=$_GET['eid'];
$pid=$_SESSION['player_id'];
$querry="INSERT INTO `subscription`(`player_id`, `event_id`)
                             VALUES ('$pid','$eid')";
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