<?php
include('header.php');
include('db.php');

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
                                <strong class="card-title">Rooms</strong>
                            </div>
                            <div class="card-body">
                        
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room No.</th>
                                            <th scope="col">For</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Rent</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Maximum Capacity</th>
                                            <th scope="col">Current count</th>
                                            <th scope="col">More Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

									$sql="SELECT * FROM `rooms`";
									$result=$conn->query($sql);
									if($result->num_rows > 0 )
									{
										while ($row=$result->fetch_assoc()) 
										{
                                            $room_id=$row['room_id'];
                                            $forGender=$row['forGender'];
                                            $room_num=$row['room_num'];
                                            $rent=$row['rent'];
                                            $type=$row['type'];
                                            $status=$row['status'];
                                            $max_capacity=$row['max_capacity'];
                                            $current_count=$row['current_count'];
											?>

										<tr>
                                            <td><center><?php echo $room_num; ?></center></td>
                                            <td><center><?php echo $forGender; ?></center></td>
                                            <td><center><?php echo $type; ?></center></td>
                                            <td><center><?php echo $rent; ?></center></td>
                                            <td><center><?php echo $status; ?></center></td>
                                            <td><center><?php echo $max_capacity; ?></center></td>
                                            <td><center><?php echo $current_count; ?></center></td>
                                            <td><form action="room_details.php" method="post">
                                            <input type="hidden" id="room_id" name="room_id" value=<?php echo $room_id; ?>>
                                            <input type="hidden" id="room_num" name="room_num" value=<?php echo $room_num; ?>>
                                            <center><input type="submit" value="view" name="view" class="btn btn-primary        btn-sm"></center></form></td>
                                       	</tr>

											<?php
										}
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