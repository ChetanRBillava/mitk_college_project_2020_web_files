<?php
include('db.php');
$gender=$_POST['gender'];
$response=array();
$body=array();
$sql="SELECT * FROM rooms WHERE forGender='".$gender."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$body[$i]['room_id']=$row['room_id'];
		$body[$i]['room_num']=$row['room_num'];
		$body[$i]['forGender']=$row['forGender'];
		$body[$i]['rent']=$row['rent'];
		$body[$i]['type']=$row['type'];
      	$body[$i]['status']=$row['status'];
      	$body[$i]['max_capacity']=$row['max_capacity'];
      	$body[$i]['current_count']=$row['current_count'];
		$i++;
	}
	$response['code']=200;
	$response['message']="Rooms found";
	$response['data']=json_encode($body);
	echo json_encode($response);
}
else{

	$response['code']=201;
	$response['message']="No rooms found";
	echo json_encode($response);
}
?>