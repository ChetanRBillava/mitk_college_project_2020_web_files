<?php
include('db.php');

$item_id=$_POST['itemid'];
$email=$_POST['email'];
$status=$_POST['status'];
$quantity=$_POST['quantity'];
$created_at=$_POST['createdDatetime'];
$updated_at=$_POST['updatedDatetime'];

$sql1="SELECT `cart_id`, `item_id`, `status`, `created_at`, `updated_at` FROM `cart` WHERE email='".$email."' && item_id=$item_id " ;
//echo $sql1;
$result=$conn->query($sql1);
$count = mysqli_num_rows($result);
//echo $count;
if($count > 0) 
{

	$sql="UPDATE `cart` SET `status`='".$status."',`quantity`='".$quantity."',`updated_at`='".$updated_at."' WHERE email='".$email."' && item_id=$item_id";
}
else
{
	$sql="INSERT INTO `cart`( `item_id`, `email`, `status`,`quantity`, `created_at`, `updated_at`) VALUES ($item_id,'".$email."','".$status."','".$quantity."','".$created_at."','".$updated_at."')";
}
if($conn->query($sql) === TRUE)
{
	$response['code']=200;
	$response['message']="Added to cart";
	echo json_encode($response);
}
else
{
//  echo "Error: " . $sql . "<br>" . $conn->error;
	$response['code']=201;
	$response['message']="Unable to add to cart";
	echo json_encode($response);
}

$conn->close()
?>