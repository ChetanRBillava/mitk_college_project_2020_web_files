<?php
include('db.php');
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$branch=$_POST['branch'];
$guardian_name=$_POST['guardian_name'];
$guardian_phone=$_POST['guardian_phone'];
$guardian_email=$_POST['guardian_email'];
// $sslc_percent=$_POST['sslc_percent'];
// $puc_percent=$_POST['puc_percent'];
// $student_status=$_POST['student_status'];
$student_type=$_POST['sud_type'];
$join_date=$_POST['join_date'];


$sql="UPDATE `hostel` SET `student_name`='".$name."',`email`='".$email."',`phone_no`='".$phone."',`address`='".$address."',`branch`='".$branch."',`guardian_name`='".$guardian_name."',`guardian_phone`='".$guardian_phone."',`guardian_email`='".$guardian_email."',`student_type`='".$student_type."',`join_date`='".$join_date."' WHERE email='".$email."'";
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