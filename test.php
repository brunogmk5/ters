
<?php
$data=[1,2,3,6,9,2,8];
for($i=0;$i<sizeof($data);$i++){
	$test=$i+1;
	if($test==sizeof($data)){
	   $data[$test]=67;
	}
	echo $data[$i].' and '.$data[($i+1)].'<br>';
   $i=$i+1;
}	
?>