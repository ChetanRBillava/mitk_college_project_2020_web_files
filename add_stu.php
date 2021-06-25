<?php
session_start();
include('db.php');
$usn=$_POST['usn'];
$pswd=$_POST['pass'];

$sql="INSERT INTO `login`(`USN`, `pswd`) VALUES ('".$usn."','".$pswd."')";

if ($conn->query($sql) === TRUE) 
{
echo json_encode(['code'=>'200', 'msg'=>"done"]);
}
else
{
echo json_encode(['code'=>'400', 'msg'=>"not done"]);
}
?>