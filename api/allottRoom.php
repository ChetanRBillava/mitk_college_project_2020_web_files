<?php
include('db.php');
$email=$_POST['email'];
$old_room_id=$_POST['old_room_id'];
$old_room_num=$_POST['old_room_num'];
$room_id=$_POST['room_id'];
$room_num=$_POST['room_num'];
$room_rent=$_POST['room_rent'];
$response=array();
$body=array();

if($old_room_id != null){
    $upd="UPDATE rooms SET current_count = current_count-1 WHERE room_id='".$old_room_id."' ";
    $res=$conn->query($upd);
}

$sql="UPDATE hostel SET room_id='".$room_id."', room_num='".$room_num."', room_rent='".$room_rent."' WHERE email='".$email."' ";
$res=$conn->query($sql);
if ($conn->query($sql) === TRUE) {
    $upd="UPDATE rooms SET current_count = current_count+1 WHERE room_id='".$room_id."' ";
    if ($conn->query($upd) === TRUE) {
    
        $upd2="SELECT * FROM rooms WHERE room_id='".$room_id."' ";
        $res2=$conn->query($upd2);
        if($res2->num_rows >0){
            while ($row=$res2->fetch_assoc()){
                if ($row['current_count'] == $row['max_capacity']){
                    $upd3="UPDATE rooms SET status = 'Not Available' WHERE room_id='".$room_id."' ";
                    $res3=$conn->query($upd3);
                    if ($conn->query($upd3) === TRUE) {
                        $response['code']=200;
                        $response['message']="Room Allotted Successfully";
                        echo json_encode($response);
                    }
                    else{
                        $response['code']=201;
                        $response['message']="Something went wrong";
                        echo json_encode($response);
                    }
                }
                else{
                    $response['code']=200;
                    $response['message']="Room Allotted Successfully";
                    echo json_encode($response);
                }

            }
        }
        
    }
    else{
        $response['code']=201;
        $response['message']="Failed to allot the room";
        echo json_encode($response);
    }
}
else{
	$response['code']=202;
	$response['message']="Something went wrong";
	echo json_encode($response);
}



?>