<?php
include('db.php');
$email=$_POST['email'];
$pswd=$_POST['pswd'];
//echo $usn;

$sql="SELECT * FROM `login` WHERE  email='".$email."' && pswd='".$pswd."'";
$res=$conn->query($sql);
//echo $res;
 if($res->num_rows > 0)
// // if(mysqli_query($conn, $sql))
        {	
                $response['code']=200;
                $response['message']="Successful";
                echo json_encode($response);
        }
        else
        {
                $response['code']=201;
                $response['message']="Failure";
                echo json_encode($response);
        }

$conn->close()
?>