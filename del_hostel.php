<?php
include('db.php');
$email=$_POST['email'];


$sql="DELETE FROM `hostel` WHERE email='".$email."'";
if ($conn->query($sql) === TRUE) 
{
  echo "<script>window.open('edit_hstl.php','_self')</script>";
} 
else 
{
 echo "Error: " . $sql . "<br>" . $conn->error;
 // echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
 echo "<meta http-equiv='Refresh' content='3; URL=edit_hstl.php'>";
}

$conn->close();

?>