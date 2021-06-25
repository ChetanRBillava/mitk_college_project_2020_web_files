<?php
include('db.php');
$email=$_GET['email'];
$response=array();
$sql="SELECT * FROM attendence WHERE email='".$email."'";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['email']=$row['email'];
		$response[$i]['applied_on']=$row['applied_on'];
      	$response[$i]['leave_type']=$row['leave_type'];
      	$response[$i]['leave_till']=$row['leave_till'];
      	$response[$i]['return_date']=$row['return_date'];
		$response[$i]['reason']=$row['reason'];
      	$response[$i]['leave_status']=$row['leave_status'];
		$i++;
	}
	echo json_encode($response);
}
else {
	echo json_encode('No data found');
}

?>