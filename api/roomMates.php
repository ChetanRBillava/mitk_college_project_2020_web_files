<?php
include('db.php');
$email=$_POST['email'];
$room_id=$_POST['room_id'];
//$email = "sadh@gmail.com";
$response=array();
$body=array();
$sql="SELECT * FROM hostel WHERE room_id='".$room_id."' and email!='".$email."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$body[$i]['student_name']=$row['student_name'];
		$body[$i]['phone_no']=$row['phone_no'];
		$body[$i]['join_date']=$row['join_date'];
		$i++;

	}
	$response['code']=200;
	$response['message']="Roommates found";
	$response['data']=json_encode($body);
	echo json_encode($response);
}
else
{
	$response['code']=201;
	$response['message']="Roommates not found";
	echo json_encode($response);
}
?>