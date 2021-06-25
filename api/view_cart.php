<?php
include('db.php');
$email=$_GET['email'];
//$email = "sadh@gmail.com";
$response=array();
$body=array();
$sql="SELECT cart.cart_id as cart_id, cart.item_id as item_id, stationary.item_name as item_name, 
stationary.item_amount as item_amount, cart.quantity as quantity, cart.status as status, cart.created_at as created_at
 FROM cart, stationary WHERE cart.email='".$email."' and cart.item_id = stationary.item_id";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$body[$i]['cart_id']=$row['cart_id'];
		$body[$i]['item_id']=$row['item_id'];
		$body[$i]['item_name']=$row['item_name'];
		$body[$i]['item_amount']=$row['item_amount'];
		$body[$i]['quantity']=$row['quantity'];
      	$body[$i]['status']=$row['status'];
      	$body[$i]['created_at']=$row['created_at'];
		$i++;
	}
	$response['code']=200;
	$response['data']=json_encode($body);
	echo json_encode($response);
}
else
{
	$response['code']=201;
	$response['data']="Cart is empty";
	echo json_encode($response);
}
?>