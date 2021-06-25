<?php
include('db.php');
$orderid=$_POST['orderid'];
// $name=$_POST['i_name'];
// $amt=$_POST['price'];
// $qty=$_POST['stock'];
// $name="sadhvi";
// $amt="Rs.30";

$sql="DELETE FROM `payment` WHERE orderid='".$orderid."'";
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