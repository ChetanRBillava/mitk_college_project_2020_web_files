<?php
include('db.php');
$email=$_GET['email'];
$response=array();
$body=array();


$sql="SELECT * FROM payment WHERE email='".$email."'  ORDER BY pid DESC";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$body[$i]['pid']=$row['pid'];
		$body[$i]['orderid']=$row['orderid'];
      	$body[$i]['payment_for']=$row['payment_for'];
		$body[$i]['trans_detail']=$row['trans_detail'];
      	$body[$i]['trans_type']=$row['trans_type'];
      	$body[$i]['trans_date']=$row['trans_date'];
		$body[$i]['total_amt']=$row['total_amt'];
      	$body[$i]['trans_status']=$row['trans_status'];
      	$body[$i]['otp']=$row['otp'];
      
		$i++;
	}
	$response['code']=200;
	$response['message']="Payment history found";
	$response['data']=json_encode($body);
	echo json_encode($response);
}
else{
	$response['code']=201;
	$response['message']="No Payment history found";
	echo json_encode($response);
}

?>