<?php
include('db.php');
$email=$_POST['email'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$branch=$_POST['branch'];
$guardian_name=$_POST['guardian_name'];
$guardian_phone=$_POST['guardian_phone'];
$guardian_email=$_POST['guardian_email'];
$sslc_percent=$_POST['sslc_percent'];
$puc_percent=$_POST['puc_percent'];
$student_status=$_POST['student_status'];
$student_type=$_POST['student_type'];
$sql="UPDATE `register` SET `name`='".$name."',`phone`=$phone,`address`='".$address."',`branch`='".$branch."',`guardian_name`='".$guardian_name."',`guardian_phone`=$guardian_phone,`guardian_email`='".$guardian_email."',`sslc_percent`='".$sslc_percent."',`puc_percent`='".$puc_percent."',`student_status`='".$student_status."',`student_type`='".$student_type."' WHERE email='".$email."'";
if ($conn->query($sql) === TRUE) {
  echo json_encode("Updated  successfully");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
//	echo json_encode("error");
}
$conn->close()
?>