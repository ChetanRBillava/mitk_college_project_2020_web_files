<?php
include('db.php');
$response=array();

$name=$_POST['name'];
$gender=$_POST['gender'];
$sem=$_POST['sem'];
$email=$_POST['email'];
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


$sql="INSERT INTO `register`(`name`,`gender`,`sem`, `email`, `phone`, `address`, `branch`, `guardian_name`, `guardian_phone`, `guardian_email`, `sslc_percent`, `puc_percent`, `student_status`, `student_type`, `status`) VALUES ('".$name."', '".$gender."', '".$sem."', '".$email."', $phone, '".$address."','".$branch."', '".$guardian_name."',$guardian_phone, '".$guardian_email."', '".$sslc_percent."', '".$puc_percent."', '".$student_status."', '".$student_type."',0)";


if ($conn->query($sql) === TRUE) {
  $response['code']=200;
  $response['message']="Registered Successfully";
  echo json_encode($response);
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
 $response['code']=201;
 $response['message']="Failed to register";
 echo json_encode($response);
}

$conn->close()
?>