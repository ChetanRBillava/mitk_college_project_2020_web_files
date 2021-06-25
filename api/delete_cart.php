<?php
include('db.php');
$cartID=$_POST['cartID'];
$sql="DELETE from `cart` WHERE cart_id='".$cartID."'";
if ($conn->query($sql) === TRUE) {
	$response['code']=200;
	$response['message']="Deleted  successfully";
	echo json_encode($response);
} else {
	$response['code']=201;
	$response['message']="Error while deleting";
	echo json_encode($response);
}
$conn->close()
?>