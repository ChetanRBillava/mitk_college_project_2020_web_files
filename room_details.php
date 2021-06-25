<?php
include('header.php');
include('db.php');
$room_id=$_POST['room_id'];
$room_num=$_POST['room_num'];
    
?>
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br><br><br>




                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Room: <?php echo $room_num; ?></strong>
                            </div>
                            <div class="card-body">
                        
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Branch</th>
                                            <th scope="col">Phone No.</th>
                                            <th scope="col">Guardian Phone No.</th>
                                            <th scope="col">Joining date</th>\
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $sql="SELECT * FROM hostel WHERE room_id='".$room_id."'";
									$result=$conn->query($sql);
									if($result->num_rows > 0 )
									{
										while ($row=$result->fetch_assoc()) 
										{
                                            
                                            $student_name=$row['student_name'];
                                            $branch=$row['branch'];
                                            $phone_no=$row['phone_no'];
                                            $guardian_phone=$row['guardian_phone'];
                                            $join_date=$row['join_date'];
											?>

										<tr>
                                            <td><center><?php echo $student_name; ?></center></td>
                                            <td><center><?php echo $branch; ?></center></td>
                                            <td><center><?php echo $phone_no; ?></center></td>
                                            <td><center><?php echo $guardian_phone; ?></center></td>
                                            <td><center><?php echo $join_date; ?></center></td>
                                       	</tr>

											<?php
										}
									}
                                    else{?>

										<tr>
                                            <td colspan="5" rowspan="2"><center><H1>No Students found</H1></center></td>
                                       	</tr>

											<?php
                                    }
                                    ?>

<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
</div>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                   


<script src="js1/jquery.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/jquery.waypoints.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>
  <script src="js1/jquery.animateNumber.min.js"></script>
  <script src="js1/jquery.mb.YTPlayer.min.js"></script>
  <script src="js1/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js1/main.js"></script>

<!-- <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>  -->
<?php
include('footer.php');
?> 