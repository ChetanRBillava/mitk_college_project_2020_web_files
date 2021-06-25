<?php
include('db.php');
$email=$_GET['email'];
$response=array();
$leave=array();

$trans_date_query="SELECT * FROM payment WHERE email='".$email."' and payment_for ='Room rent'  order by pid DESC LIMIT 1";
$exec_trans_date_query=$conn->query($trans_date_query);
if($exec_trans_date_query->num_rows >0){
	while ($row=$exec_trans_date_query->fetch_assoc()) {
		$response['date']=$row['trans_date'];
	}
	$response['code']= 200;
	$response['message']= 'Last Transaction date';
}
else{
	$join_date_query="SELECT join_date FROM hostel WHERE email='".$email."'";
	$exec_join_date_query=$conn->query($join_date_query);
	if($exec_join_date_query->num_rows >0){
		while ($row=$exec_join_date_query->fetch_assoc()) {
			$response['date']=$row['join_date'];
		}
		$response['code']= 200;
		$response['message']= 'Joining date';
	}
	else{
		$response['date']= '';
		$response['code']= 201;
		$response['message']= 'No date found';
	}
}
$sql="SELECT * FROM attendence WHERE email='".$email."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$leave[$i]['leave_from']=$row['leave_from'];
		$leave[$i]['leave_till']=$row['leave_till'];
      	$leave[$i]['leave_status']=$row['leave_status'];
		$i++;
	}
}
$response['leaves']['difference'] = 1;
$response['leaves']['dates'] = json_encode($leave);
echo json_encode($response);

?>