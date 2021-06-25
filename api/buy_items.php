<?php
include('db.php');
$email=$_GET['email'];
$itemname=$_GET['itemname'];
$qty=$_GET['quant'];
$amount=$_GET['amount'];

// $sql1="SELECT `item_name`, `item_amount` FROM `stationary` WHERE item_name='".$itemname."'";
// $res=$conn->query($sql1);
// if($res->num_rows >0){
// 	while ($row=$res->fetch_assoc()) {
// 		$amt=$row['item_amount'];
// 	}
// }	

$sql="INSERT INTO `pay_item`(`email`, `item_name`, `no_items`, `total_amt`, `status`) VALUES ('".$email."', '".$itemname."','".$qty."', '".$amount."', '1')";
if ($conn->query($sql) === TRUE) 
{
  echo json_encode("payment successfull");
} 
else 
{
 // echo "Error: " . $sql . "<br>" . $conn->error;
	echo json_encode("Your your payment not confirmed");
}

$conn->close()
?>