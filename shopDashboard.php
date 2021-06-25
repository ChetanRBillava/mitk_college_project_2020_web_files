<?php
include('db.php');
include('shopkeeper_header.php');


$sql="SELECT * FROM stationary";
$res=$conn->query($sql);
$stationaryCount = $res->num_rows;

$sql="SELECT * FROM payment where payment_for = 'Stationary items'";
$res=$conn->query($sql);
$orderCount = $res->num_rows;

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

           
<div class="content mt-3">

    <div class="col-md-6 col-lg-5">
        <div class="card bg-flat-color-2 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $stationaryCount; ?></div>
                <div>Stationary Items</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">No. of stationary items</small>
            </div>
        </div>
    </div>
    <!--/.col-->
         

           

            
    <div class="col-md-6 col-lg-5">
        <div class="card bg-flat-color-3 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $orderCount; ?></div>
                <div>Order Count</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Total number of orders received</small>
            </div>
        </div>
    </div>
    <!--/.col-->
         

           
            
           

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php
    include('footer.php');
    ?>

</body>

</html>
