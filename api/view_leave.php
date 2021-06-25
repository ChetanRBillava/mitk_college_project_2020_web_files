<?php
include('db.php');
$email=$_GET['email'];
$response=array();
$body=array();
$sql="SELECT * FROM attendence WHERE email='".$email."' ";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$body[$i]['applied_on']=$row['applied_on'];
		$body[$i]['leave_type']=$row['leave_type'];
		$body[$i]['leave_from']=$row['leave_from'];
		$body[$i]['leave_till']=$row['leave_till'];
		$body[$i]['return_date']=$row['return_date'];
      	$body[$i]['reason']=$row['reason'];
      	$body[$i]['leave_status']=$row['leave_status'];
		$i++;
	}
	$response['code']=200;
	$response['data']=json_encode($body);
	echo json_encode($response);
}
else
{
	$response['code']=201;
	$response['data']="No leaves yet";
	$response['email']=$email;
	echo json_encode($response);
}
?>