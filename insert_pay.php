<?php
include('db.php');

$orderid="MITK".date("Ymd").rand(50,500);
$email=$_POST['email'];
$payment_for=$_POST['payment_for'];
$trans_detail=$_POST['trans_detail'];
$trans_type=$_POST['trans_type'];

date_default_timezone_set('Asia/Kolkata');
$trans_date= date('m/d/Y h:i:s a', time());
$total_amt=$_POST['total_amt'];
$trans_status='success';


$sql="INSERT INTO `payment`( `orderid`, `email`, `payment_for`, `trans_detail`, `trans_type`, `trans_date`,`total_amt`, `trans_status`) VALUES ('".$orderid."','".$email."','".$payment_for."', '".$trans_detail."','".$trans_type."','".$trans_date."', '".$total_amt."', '".$trans_status."')";

if ($conn->query($sql) === TRUE) 
{
  echo json_encode(['code'=>200, 'msg'=>"Payment successfull"]);
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();

?>