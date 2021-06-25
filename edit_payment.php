<?php
include('db.php');
$orderid=$_POST['orderid'];
$email=$_POST['email'];
$payment_for=$_POST['payment_for'];
$trans_detail=$_POST['trans_detail'];
$trans_type=$_POST['trans_type'];

// date_default_timezone_set('Asia/Kolkata');
// $trans_date= date('m/d/Y h:i:s a', time());
$total_amt=$_POST['total_amt'];
$trans_status='success';

$sql="UPDATE `payment` SET `payment_for`='".$payment_for."',`trans_detail`='".$trans_detail."',`trans_type`='".$trans_type."',`total_amt`='".$total_amt."' WHERE orderid='".$orderid."'";
if ($conn->query($sql) === TRUE) 
{
  echo "<script>window.open('search_payment.php','_self')</script>";
} 
else 
{
 echo "Error: " . $sql . "<br>" . $conn->error;
 // echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
echo "<meta http-equiv='Refresh' content='3; URL=search_payment.php'>";
}

$conn->close();

?>