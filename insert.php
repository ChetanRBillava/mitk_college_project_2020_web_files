<?php
include('db.php');
$name=$_POST['item_name'];
$amt=$_POST['item_amt'];
$qty=$_POST['item_qty'];
// $name="sadhvi";
// $amt="Rs.30";

$sql="INSERT INTO `stationary`(`item_name`, `item_amount`, `quantity`) VALUES ('".$name."','".$amt."', '$qty')";
if ($conn->query($sql) === TRUE) 
{
  echo json_encode(['code'=>200, 'msg'=>"Item inserted"]);
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();

?>