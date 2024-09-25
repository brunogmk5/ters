<?php
 
require_once('connect.php');
if(isset($_REQUEST['generate'])){
	$sex=$_REQUEST['sex'];
	$min_weight=$_REQUEST['minweight'];
	$max_weight=$_REQUEST['maxweight'];
	$min_age=$_REQUEST['minage'];
	$max_age=$_REQUEST['maxage'];
	$eventid=$_REQUEST['event_id'];
	addData($conn,$sex,$min_weight,$max_weight,$min_age,$max_age,$eventid);
	header('location:matchGenerator.php');
}
function getSpecificData($conn,$id){
$querry="SELECT  `weight`, `level`,`id` FROM `players` WHERE  `id`='$id'";
$result=$conn->query($querry);
if($result){
$query_row=$result->fetch_assoc();
$weight=$query_row['weight'];
$level=$query_row['level'];
$id=$query_row['id'];

return $id;
}
else
echo  mysqli_error($conn);
}

//data shuffling
function getShuffledData($conn,$sex,$min_weight,$max_weight,$min_age,$max_age,$eventid){
$querry="SELECT  `players`.`id` as id FROM `players`,`subscription`
                WHERE  sex='$sex' and `players`.`weight` BETWEEN $min_weight and $max_weight 
                and age BETWEEN $min_age and $max_age and `players`.`id`=`player_id` and `event_id`='$eventid'";

$result=$conn->query($querry);
$num=mysqli_affected_rows($conn);

$ids=array($num);
if($result){
	$i=0;
while($query_row=$result->fetch_assoc()){	
//echo $query_row['id'].'<br>';
$ids[$i]=$query_row['id'];
$i++;
}
shuffle($ids);
}
else{
echo  mysqli_error($conn);
}
return $ids;
}

//addding shuffled data
function addData($conn,$sex,$min_weight,$max_weight,$min_age,$max_age,$eventid){
	
	$ids=getShuffledData($conn,$sex,$min_weight,$max_weight,$min_age,$max_age,$eventid);
	$comment='Wgt: '.$min_weight.'-' .$max_weight.' Age: '.$min_age.'-'.$max_age.' Sex: '.$sex.' Event: '.$eventid;
	if(sizeof($ids)%2==1){
		 echo $ids[sizeof($ids)]='100';
	}
	
	for($i=0;$i<sizeof($ids)-1;$i++){
		
		$home=$ids[$i];
		$away=$ids[$i+1];
		$test=$i+1;
	    
		echo $home.' and '.$away.'<br>';
		$querry="INSERT INTO `teams`(`home`, `away`, `comment`,`event_id`) 
	                         VALUES ('$home','$away','$comment','$eventid')";
        $i=$i+1;
		$result=$conn->query($querry);
             if($result){
           }
	     else{
           echo  mysqli_error($conn);
          }
       }
    }
    
?>