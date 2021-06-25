<?php
include('db.php');
$sql3="SELECT * FROM `register` WHERE email='sadhviah@gmail.com'";
$result3=$conn->query($sql3);
if($result3->num_rows > 0 )
  {
  while ($row3=$result3->fetch_assoc()) 
    {
      $name=$row3['name'];
      $email=$row3['email'];
      $phone=$row3['phone'];
      $address=$row3['address'];
      $branch=$row3['branch'];
      $guardian_name=$row3['guardian_name'];
      $guardian_phone=$row3['guardian_phone'];
      $guardian_email=$row3['guardian_email'];
      //$sslc_percent=$row3['sslc_percent'];
      //$puc_percent=$row3['puc_percent'];
      $student_status=$row3['student_status'];
      $student_type=$row3['student_type'];
    }
  }
echo $student_type;
 $sad='hostelite'   ;              
if($student_type == $sad)
{
$sql2="INSERT INTO `hostel`(`student_name`, `email`, `phone_no`, `address`, `branch`, `guardian_name`, `guardian_phone`, `guardian_email`, `student_type`, `status`) VALUES ('".$name."', '".$email."', '".$phone."', '".$address."', '".$branch."', '".$guardian_name."', '".$guardian_phone."', '".$guardian_email."', '".$student_type."',0)"; 
if($conn->query($sql2) === TRUE)
{
  echo "success";
}
else
{
  echo json_encode(['code'=>'200', 'msg'=>"hostel student data not inserted. "]);
  
   echo "Error: " . $sql2 . "<br>" . $conn->error;
}
// echo json_encode(['code'=>'200', 'msg'=>"done"]);
}




?>