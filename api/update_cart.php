<?php
include('db.php');
$cartID=$_POST['cartID'];
$qty=$_POST['qty'];
$sql="UPDATE `cart` SET `quantity`='".$qty."' WHERE cart_id='".$cartID."'";
if ($conn->query($sql) === TRUE) {
	$response['code']=200;
	$response['message']="Updated  successfully";
	echo json_encode($response);
} else {
	$response['code']=201;
	$response['message']="Error while updating";
	echo json_encode($response);
}
$conn->close()
?>