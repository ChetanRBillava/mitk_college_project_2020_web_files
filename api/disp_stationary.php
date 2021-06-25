<?php
include('db.php');
$response=array();
$sql="SELECT * FROM stationary";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['item_id']=$row['item_id'];
		$response[$i]['name']=$row['item_name'];
      	$response[$i]['amount']=$row['item_amount'];
      	$response[$i]['quantity']=$row['quantity'];
		$i++;
	}
	echo json_encode($response);
}

?>