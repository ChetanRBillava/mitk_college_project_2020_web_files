<?php
include('db.php');
include('header.php');



$sql="SELECT * FROM register";
$res=$conn->query($sql);
$studentCount = $res->num_rows;

$sql="SELECT * FROM hostel";
$res=$conn->query($sql);
$hostelStudentCount = $res->num_rows;

$sql="SELECT * FROM rooms";
$res=$conn->query($sql);
$roomsCount = $res->num_rows;

$sql="SELECT * FROM stationary";
$res=$conn->query($sql);
$stationaryCount = $res->num_rows;


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
<div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-1 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $studentCount; ?></div>
                <div> Total Students</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">students enrolled in college.</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-3 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $hostelStudentCount; ?></div>
                <div>Total Students in Hostel</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">students enrolled in hostel</small>
                <br>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-4 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $roomsCount; ?></div>
                <div>Total Rooms in hostel</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Total number of rooms in both the hostels combined</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-2 text-light">
            <div class="card-body">
                <div class="h4 m-0"><?php echo $stationaryCount; ?></div>
                <div>Stationary Items</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">No of stationary items</small>
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
