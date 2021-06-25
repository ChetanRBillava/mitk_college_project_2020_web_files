<?php
session_start();
include('db.php');
$mail=$_POST['email'];

$sql="SELECT * FROM `hostel` WHERE email='".$mail."' ";

$result=$conn->query($sql);
if($result->num_rows > 0 )
	{
		while ($row=$result->fetch_assoc()) 
			{

					  $name=$row['student_name'];
					  $name1 = str_replace(' ', '_', $name);
                      $email=$row['email'];
                      $phone=$row['phone_no'];
                      $address=$row['address'];
                      $address1 = str_replace(' ', '_', $address);
                      $branch=$row['branch'];
                      $guardian_name=$row['guardian_name'];
                      $guardian_name = str_replace(' ', '_', $guardian_name);
                      $guardian_phone=$row['guardian_phone'];
                      $guardian_email=$row['guardian_email'];
                      //$sslc_percent=$row3['sslc_percent'];
                      //$puc_percent=$row3['puc_percent'];
                      //$student_status=$row3['student_status'];
                      $student_type=$row['student_type'];
                      $join_date=$row['join_date'];								

			}
	
echo json_encode(['code'=>200, 'name'=>"$name1", 'email'=>"$email", 'phone'=>"$phone", 'address'=>"$address1", 'branch'=>"$branch", 'gaurd_name'=>"$guardian_name", 'gaurd_phone'=>"$guardian_phone", 'guard_emil'=>"$guardian_email", 'stype'=>"$student_type", 'jdate'=>"$join_date"]);
}
else
{
echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

?>
