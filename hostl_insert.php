<?php
include('db.php');

$name=$_POST['name'];
$gen=$_POST['gen'];
$sem=$_POST['sem'];
$email=$_POST['email'];
$phone=$_POST['no'];
$address=$_POST['addr'];
$branch=$_POST['branch'];
$guardian_name=$_POST['guardian_name'];
$guardian_phone=$_POST['guardian_phone'];
$guardian_email=$_POST['guardian_email'];
//$sslc_percent=$_POST['sslc_percent'];
//$puc_percent=$_POST['puc_percent'];
$student_type=$_POST['stu_type'];
			

$sql="INSERT INTO `hostel`(`student_name`,`gender`,`sem`, `email`, `phone_no`, `address`, `branch`, `guardian_name`, `guardian_phone`, `guardian_email`, `student_type`, `status`) VALUES ('".$name."', '".$gen."', '".$sem."', '".$email."', '".$phone."', '".$address."', '".$branch."', '".$guardian_name."', '".$guardian_phone."', '".$guardian_email."', '".$student_type."',0)";
if ($conn->query($sql) === TRUE) 
{
  echo json_encode(['code'=>200, 'msg'=>"student inserted"]);
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();

?>