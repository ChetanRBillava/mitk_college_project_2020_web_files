<?php
include('db.php');
$email=$_GET['email'];
//$email = "sadh@gmail.com";
$response=array();
$sql="SELECT * FROM register WHERE email='".$email."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['name']=$row['name'];
		$response[$i]['gender']=$row['gender'];
		$response[$i]['sem']=$row['sem'];
		$response[$i]['email']=$row['email'];
      	$response[$i]['phone']=$row['phone'];
      	$response[$i]['address']=$row['address'];
		$response[$i]['branch']=$row['branch'];
      	$response[$i]['guardian_name']=$row['guardian_name'];
      	$response[$i]['guardian_phone']=$row['guardian_phone'];
		$response[$i]['guardian_email']=$row['guardian_email'];
      	$response[$i]['sslc_percent']=$row['sslc_percent'];
      	$response[$i]['puc_percent']=$row['puc_percent'];
		$response[$i]['student_status']=$row['student_status'];
		$response[$i]['student_type']=$row['student_type'];
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