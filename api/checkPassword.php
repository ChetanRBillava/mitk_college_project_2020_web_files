<?php
include('db.php');
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$response=array();
$body=array();


$sql="SELECT * FROM login WHERE email='".$email."' && pswd='".$pwd."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$response['code']=200;
	$response['message']="Credentials matched Successfully";
	echo json_encode($response);
}
else{
	$response['code']=201;
	$response['message']="Wrong Password";
	echo json_encode($response);
}

?>