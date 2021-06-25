<?php
include('db.php');
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$response=array();
$body=array();


$sql="UPDATE login SET pswd='".$pwd."' WHERE email='".$email."' ";
$res=$conn->query($sql);
if ($conn->query($sql) === TRUE) {
	$response['code']=200;
	$response['message']="Password updated Successfully";
	echo json_encode($response);
}
else{
	$response['code']=201;
	$response['message']="Password Not Updated";
	echo json_encode($response);
}

?>