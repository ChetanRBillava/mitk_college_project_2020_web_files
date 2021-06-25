<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";
include('db.php');
$orderid="MITK".date("Ymd").rand(50,500);
$email=$_POST['email'];
$payment_for=$_POST['payment_for'];
$trans_detail=$_POST['trans_detail'];
$trans_type=$_POST['trans_type'];
$trans_otp=$_POST['trans_otp'];
date_default_timezone_set('Asia/Kolkata');
//$trans_date= date('d/m/Y h:i:s a', time());
$trans_date= $_POST['trans_date'];
$total_amt=$_POST['total_amt'];
if($trans_type == 'offline'){
    $trans_status='not paid';
}
else{
    $trans_status='paid';
}
$sql="INSERT INTO `payment`( `orderid`, `email`, `payment_for`, `trans_detail`, `trans_type`, `trans_date`,`total_amt`, `trans_status`,`otp`,`verified`) VALUES ('".$orderid."','".$email."','".$payment_for."', '".$trans_detail."','".$trans_type."','".$trans_date."', '".$total_amt."', '".$trans_status."', '".$trans_otp."', 'false')";
if ($conn->query($sql) === TRUE) {
$sql="SELECT * FROM `register` WHERE email = '".$email."' ";
$result=$conn->query($sql);
if($result->num_rows > 0 )
	{
		while ($row=$result->fetch_assoc()) 
			{		  $name=$row['name'];
                      $guardian_name=$row['guardian_name'];
                      $guardian_phone=$row['guardian_phone'];
                      $guardian_email=$row['guardian_email'];
			}
	}
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
$mail->addAddress($guardian_email, "Name");
$mail->isHTML(true);
$mail->Subject = "Regarding payment";
$mail->Body = "<b>Dear Sir/Madam : ".$guardian_name."<br>  <br>   Your son/daughter ".$name." has paid <br>amount of Rs:".$total_amt."  for  ".$payment_for." for ".$trans_detail." on date & time ".$trans_date."<br> Thanking you. <br><br>From :office@mitk.com, <br> For Info Call: 9008765447.</b>";
try {
    $mail->send();
	$response['code']=200;
	$response['message']="Payment saved and email sent for guardians";
    if($payment_for == 'Stationary items'){
        $sql="DELETE from `cart` WHERE email='".$email."'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode($response);
        }
    }
    else{
        echo json_encode($response);
    }
} catch (Exception $e) {
	$response['code']=201;
	$response['message']=['msg'=>"Mailer Error: " . $mail->ErrorInfo];
	echo json_encode($response);
}
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
	$response['code']=202;
	$response['message']="Payment not done";
	echo json_encode($response);
}
$conn->close();
?>