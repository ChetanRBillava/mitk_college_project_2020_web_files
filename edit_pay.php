<?php
session_start();
include('db.php');
$orderid=$_POST['orderid'];

$sql="SELECT * FROM `payment` WHERE orderid= '".$orderid."' ";

$result=$conn->query($sql);
if($result->num_rows > 0 )
	{
		while ($row=$result->fetch_assoc()) 
			{

				// $pid=$row['pid'];
		        $orderid=$row['orderid'];
		        $email=$row['email'];
		        $payment_for=$row['payment_for'];
		        $trans_detail=$row['trans_detail'];

		        $trans_detail1 = str_replace(' ', '_', $trans_detail);

		        $trans_type=$row['trans_type'];
		        $trans_date=$row['trans_date'];
		        $total_amt=$row['total_amt'];
		        $trans_status=$row['trans_status'];
			}
	
echo json_encode(['code'=>200, 'orderid'=>"$orderid", 'payment_for'=>"$payment_for", 'trans_detail'=>"$trans_detail1", 'trans_type'=>"$trans_type", 'total_amt'=>"$total_amt"]);
}
else
{
echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

?>
