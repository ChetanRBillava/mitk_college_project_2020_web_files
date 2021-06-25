<?php
include('shopkeeper_header.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopkeeper portal</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

<link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Shopkeeper Dashboard</h1>
                    </div>
                </div>
            </div>
           
        </div>

           
<div class="content mt-3">
    <div class="col-lg-12">
        <div class="card bg-flat-color-1 text-light">
            <div class="card-body">
                <div class="h4 m-0">Orders</div>

                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 100%; height: 5px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead style="color: blue; background-color: white">
                        <tr>
                            <th scope="col"><center>Order ID</center></th>
                            <th scope="col"><center>Payment for</center></th>
                            <th scope="col"><center>Transaction Details</center></th>
                            <th scope="col"><center>Transaction type</center></th>
                            <th scope="col"><center>Transaction amount</center></th>
                            <th scope="col"><center>Transaction date</center></th>
                            <th scope="col"><center>OTP</center></th>
                            <th scope="col"><center>Verification status</center></th>
                        </tr>
                    </thead>
                    <tbody style="color: white;">

                        <?php
                        include('db.php');
                        $sql="SELECT * FROM payment WHERE payment_for='Stationary items'  ORDER BY pid DESC";
                        $res=$conn->query($sql);
                        if($res->num_rows >0){
                            $i=0;
                            while ($row=$res->fetch_assoc()) {
                                $orderid=$row['orderid'];
                                $payment_for=$row['payment_for'];
                                $trans_detail=$row['trans_detail'];
                                $trans_type=$row['trans_type'];
                                $trans_date=$row['trans_date'];
                                $total_amt=$row['total_amt'];
                                $otp=$row['otp'];
                                $verified=$row['verified'];
                            ?>
                            <tr>
                                <td><center><?php echo $orderid; ?></center></td>
                                <td><center><?php echo $payment_for; ?></center></td>
                                <td><center><?php echo $trans_detail; ?></center></td>
                                <td><center><?php echo $trans_type; ?></center></td>
                                <td><center><?php echo $total_amt; ?></center></td>
                                <td><center><?php echo $trans_date; ?></center></td>
                                <?php
                                if($verified == 'true'){
                                    ?>
                                    <td colspan="2"><center><h3><?php echo "Purchase verified"; ?></h3></center></td>
                                    <?php
                                }
                                else{
                                    ?><td><form action="" method="post"><center>
                                    <input type="text" id="otpinput" name="otpinput"></center>
                                    <input type="hidden" id="orderid" name="orderid" value=<?php echo $orderid; ?>>
                                    </td>
                                    <td><center><input type="submit" value="VERIFY" name="submit" style="color: blue; background-color: white"></center></td></form><?php
                                }
                                ?>
                                
                            </tr>
                            <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.col-->        

           
            
           

            


</body>

</html>
<?php

if(isset($_POST['submit'])){
$otpinput=$_POST['otpinput'];
$orderid2=$_POST['orderid'];
    $sql="SELECT * FROM payment WHERE orderid='".$orderid2."'  && otp='".$otpinput."'";
    $res=$conn->query($sql);
    if($res->num_rows >0){
        $upd="UPDATE `payment` SET `verified`='true', `trans_status`='paid' WHERE orderid='".$orderid2."'  && otp='".$otpinput."'";
        if ($conn->query($upd) === TRUE) 
        {
            ?>
            <script>alert('Purchase Verified!');</script>
            <meta http-equiv="refresh" content="2;url=shopDashboard.php" />
            <?php
        } 
        else 
        {
            ?>
            <script>alert('Something went wrong, please try again!!!');</script>
            <meta http-equiv="refresh" content="2;url=shopDashboard.php" />
            <?php
        }
    }
    else{
        ?>
        <script>alert('Please enter the valid OTP ');</script>
        <meta http-equiv="refresh" content="2;url=shopDashboard.php" />
        <?php
    }
}

?>