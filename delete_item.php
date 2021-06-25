<?php
include('db.php');
$id=$_POST['itm'];
// $name=$_POST['i_name'];
// $amt=$_POST['price'];
// $qty=$_POST['stock'];
// $name="sadhvi";
// $amt="Rs.30";

$sql="DELETE FROM `stationary` WHERE item_id='".$id."'";
if ($conn->query($sql) === TRUE) 
{
  echo "<script>window.open('add_qty.php','_self')</script>";
} 
else 
{
 echo "Error: " . $sql . "<br>" . $conn->error;
 // echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
 echo "<meta http-equiv='Refresh' content='3; URL=add_qty.php'>";
}

$conn->close();

?>