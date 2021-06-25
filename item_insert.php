<?php
include('db.php');

$iname=$_POST['iname'];
$iamnt=$_POST['iamnt'];

$sql="INSERT INTO `stationary`(`item_name`, `item_amount`, `quantity`) 
VALUES ('".$iname."', '".$iamnt."', 50)";
if ($conn->query($sql) === TRUE) 
{
  echo json_encode(['code'=>200, 'msg'=>"Item added"]);
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();

?>