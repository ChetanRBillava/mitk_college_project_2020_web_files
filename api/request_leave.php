<?php
include('db.php');
$email=$_POST['email'];
$leave_type=$_POST['leave_type'];
$leave_from=$_POST['leave_from'];
$leave_till=$_POST['leave_till'];
$return_date=$_POST['return_date'];
$reason=$_POST['reason'];


$applied_on=date("Y/m/d");
$leave_status='Not Aproved';

$sql="INSERT INTO `attendence`(`email`,`applied_on`, `leave_type`, `leave_from`, `leave_till`, `return_date`, `reason`, `leave_status`) VALUES ('".$email."','".$applied_on."','".
$leave_type."','".$leave_from."','".$leave_till."','".$return_date."','".$reason."', '".$leave_status."')";

if ($conn->query($sql) === TRUE) {
	$response['code']=200;
	$response['message']="Leave request sent";
	echo json_encode($response);
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
	$response['code']=201;
	$response['message']="Leave request not sent";
	echo json_encode($response);
}

$conn->close()
?>