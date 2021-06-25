<?php
session_start();
include('db.php');
$id=$_POST['id'];

$sql="SELECT * FROM `stationary` WHERE item_id= $id ";

$result=$conn->query($sql);
if($result->num_rows > 0 )
	{
		while ($row=$result->fetch_assoc()) 
			{
				$idq=$row['item_id'];

				$name=$row['item_name'];
				$name1 = str_replace(' ', '_', $name);
				$amt=$row['item_amount'];
				$amt1 = str_replace(' ', '_', $amt);
				$quantity=$row['quantity'];
				$quantity1 = str_replace(' ', '_', $quantity);

			}
	
echo json_encode(['code'=>200, 'id'=>"$idq", 'name'=>"$name1", 'amount'=>"$amt1", 'quantity'=>"$quantity1"]);
}
else
{
echo json_encode(['code'=>400, 'msg'=>"Error: " . $sql . "<br>" . $conn->error]);
}

?>
