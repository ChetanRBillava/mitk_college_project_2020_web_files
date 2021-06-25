<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
include('db.php');
$email=$_POST['email'];
$pswd="MITK".date("Ymd").rand(50,500);

$sql="INSERT INTO `login`(`email`, `pswd`) VALUES ('".$email."','".$pswd."')";
$mail = new PHPMailer(true);
				$mail->isSMTP();                                   
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPAuth = true;                             
				$mail->Username = "testm7987@gmail.com";                 
				$mail->Password = "testm@1234";                           
				$mail->SMTPSecure = "tls";                           
				$mail->Port = 587;                                   

				$mail->From = "testm7987@gmail.com";
				$mail->FromName = "Test Mail";

				$mail->addAddress($email, "Recepient Name");

				$mail->isHTML(true);

				$mail->Subject = "Subject Text";
				$mail->Body = "<i>Your login credentials are</i><br>Email:".$email."<br>Password:".$pswd;

				try {
				    $mail->send();
				    #echo json_encode(['code'=>'200', 'msg'=>"hostel student data inserted."]);
if ($conn->query($sql) === TRUE) {
	$sql1="UPDATE `register` SET `status`=1 WHERE email='".$email."'";
	if ($conn->query($sql1) === TRUE){
		$sql3="SELECT * FROM `register` WHERE email='".$email."'";
		$result3=$conn->query($sql3);
		if($result3->num_rows > 0 ){
			while ($row3=$result3->fetch_assoc()) {
				$name=$row3['name'];
				$gender=$row3['gender'];
				$sem=$row3['sem'];
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
		if($student_type == 'Hostelite'){
			$sql2="INSERT INTO `hostel`(`student_name`,`gender`,`sem`, `email`, `phone_no`, `address`, `branch`, `guardian_name`, `guardian_phone`, `guardian_email`, `student_type`, `status`) VALUES ('".$name."', '".$gender."', '".$sem."', '".$email."', '".$phone."', '".$address."', '".$branch."', '".$guardian_name."', '".$guardian_phone."', '".$guardian_email."', '".$student_type."',0)";	
			if($conn->query($sql2) === TRUE){
				echo json_encode(['code'=>'200', 'msg'=>"hostel student data inserted."]);
			}
			else
			{
				echo json_encode(['code'=>'200', 'msg'=>"hostel student data not inserted. "]);
			}
			// echo json_encode(['code'=>'200', 'msg'=>"done"]);
		}
		else
		{
			echo json_encode(['code'=>'200', 'msg'=>"Localite student added successfully"]);
		}
	}
}
else
{
	echo json_encode(['code'=>'400','mail'=>$email ,'msg'=>" Error: " . $sql . "<br>" . $conn->error]);
}
				} catch (Exception $e) {
				    echo json_encode(['code'=>'200', 'msg'=>"Mailer Error: " . $mail->ErrorInfo]);
				}
?>
