<?php
include('db.php');
$email=$_GET['email'];
$response=array();


$sql="SELECT * FROM payment WHERE email='".$email."' && payment_for='hostel_rent' ";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['pid']=$row['pid'];
		$response[$i]['orderid']=$row['orderid'];
      	$response[$i]['email']=$row['email'];
      	$response[$i]['payment_for']=$row['payment_for'];
		$response[$i]['trans_detail']=$row['trans_detail'];
      	$response[$i]['trans_type']=$row['trans_type'];
      	$response[$i]['trans_date']=$row['trans_date'];
		$response[$i]['total_amt']=$row['total_amt'];
      	$response[$i]['trans_status']=$row['trans_status'];
      
		$i++;
	}
	echo json_encode($response);
}
else {
	echo json_encode('No data found');
}

?>