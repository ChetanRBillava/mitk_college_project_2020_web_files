<?php
session_start();
include('db.php');
$email=$_POST['email'];
$pswd=$_POST['pswd'];

$sql="SELECT `email`, `passwd` FROM `admin_login` WHERE email='".$email."' && passwd='".$pswd."' ";
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