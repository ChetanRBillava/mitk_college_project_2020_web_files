<?php
include('db.php');
$email=$_GET['email'];
//$email = "sadh@gmail.com";
$response=array();
$sql="SELECT * FROM hostel WHERE email='".$email."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['student_name']=$row['student_name'];
		$response[$i]['email']=$row['email'];
      	$response[$i]['status']=$row['status'];
		$response[$i]['join_date']=$row['join_date'];
		$response[$i]['room_id']=$row['room_id'];
		$response[$i]['room_num']=$row['room_num'];
		$response[$i]['room_rent']=$row['room_rent'];
		$i++;

	}
	echo json_encode($response);
}
else
{
	echo ($email);
	echo json_encode("No student found for the inserted emailid ");
}
?>