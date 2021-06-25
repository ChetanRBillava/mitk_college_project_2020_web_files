<?php
include('db.php');
$response=array();
$sql="SELECT * FROM admission";
$res=$conn->query($sql);
if($res->num_rows >0){
	$i=0;
	while ($row=$res->fetch_assoc()) {
		$response[$i]['admission_id']=$row['admission_id'];
		$response[$i]['for_year']=$row['for_year'];
      	$response[$i]['amount']=$row['amount'];
		$i++;
	}
	echo json_encode($response);
}

?>