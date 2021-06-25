<?php
include('db.php');

$rno=$_POST['rno'];
$forS=$_POST['forS'];
$rtype=$_POST['rtype'];
$rent=$_POST['rent'];
$cap=$_POST['cap'];

$sql="INSERT INTO `rooms`(`room_num`, `forGender`, `rent`, `type`, `status`, `max_capacity`, `current_count`) 
VALUES ('".$rno."', '".$forS."', $rent, '".$rtype."', 'Available', '".$cap."', '0')";
if ($conn->query($sql) === TRUE) 
{
  echo json_encode(['code'=>200, 'msg'=>"Room added"]);
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();

?>