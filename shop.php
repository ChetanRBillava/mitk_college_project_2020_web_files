<?php
session_start();
include('db.php');
$email=$_POST['email'];
$pswd=$_POST['pswd'];

$sql="SELECT `email`, `password` FROM `shopLogin` WHERE email='".$email."' && password='".$pswd."' ";
$result=$conn->query($sql);
$count = mysqli_num_rows($result);
if($count == 1) 
{
$_SESSION['login']=$email;
echo json_encode(['code'=>200, 'msg'=>"done"]);
}
else
{
echo json_encode(['code'=>400, 'msg'=>"notdone"]);
}

?>