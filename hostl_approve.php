<?php
session_start();
include('db.php');
$email=$_POST['email'];
$appliedon=$_POST['apply'];
$date=date("Y/m/d");

if($appliedon == $date)
{
$sql="UPDATE `attendence` SET `leave_status`='Approved' WHERE email='".$email."' && applied_on='".$appliedon."'";
if ($conn->query($sql) === TRUE)
{
	echo json_encode(['code'=>200, 'msg'=>"Leave approved."]);
}
else
{
	echo json_encode(['code'=>400, 'msg'=>"Leave rejected."]);
}
}

?>
