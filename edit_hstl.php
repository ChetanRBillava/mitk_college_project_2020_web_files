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
                                <strong class="card-title">Add Students</strong>
                            </div>
                            <div class="card-body">
                        
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Branch</th>
                                            <th scope="col">Gaurdian Name</th>
                                            <th scope="col">Gaurdian Phone</th>
                                            <th scope="col">Gaurdian Email</th>
                                            <th scope="col">Student type</th>
                                            <th scope="col">Join Date</th>
                                            <th scope="col">Hostel Room Number</th>
                                            <th scope="col">Room Rent</th>
                                            <th scope="col">Edit </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

									$sql="SELECT * FROM `hostel`";
									$result=$conn->query($sql);
									if($result->num_rows > 0 )
									{
										while ($row=$result->fetch_assoc()) 
										{
											$name=$row['student_name'];
                      $email=$row['email'];
                      $phone=$row['phone_no'];
                      $address=$row['address'];
                      $branch=$row['branch'];
                      $guardian_name=$row['guardian_name'];
                      $guardian_phone=$row['guardian_phone'];
                      $guardian_email=$row['guardian_email'];
                      $student_type=$row['student_type'];
                      $join_date=$row['join_date'];
                      $room_num=$row['room_num'];
                      $room_rent=$row['room_rent'];
											
											?>

											                   <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $branch; ?></td>
                                            <td><?php echo $guardian_name; ?></td>
                                            <td><?php echo $guardian_phone; ?></td>
                                            <td><?php echo $guardian_email; ?></td>
                                            <td><?php echo $student_type; ?></td>
                                            <td><?php echo $join_date; ?></td>
                                            <td><?php echo $room_num; ?></td>
                                            <td><?php echo $room_rent; ?></td>
                                            <td>
<i class="fa fa-pencil" style="color:green;"  onclick="edit('<?php echo $email; ?>')"></i>
	
		<i class="fa fa-trash" style="color:red;" onclick="del('<?php echo $email; ?>')"></i>                                            	
                                            </td>
                                       		 </tr>

											<?php
										}
									}
                                    ?>

<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
</div>


<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function edit(email){
      $.ajax({
           type: "POST",
           url: 'hostel_edit.php',
           dataType:'json',
           data:{email:email},
           success:function(data) {
             if (data.code == "200")
             {
             	//alert(data.name);
             	//window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Edit</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='edithostel.php' method='POST'><div class='form-group'><label for='name'>Name:</label><input type='text' class='form-control' id='name' name='name' value="+data.name+"></div><div class='form-group'><label for='name'>Email:</label><input type='text' class='form-control' id='email' name='email' value="+data.email+"></div><div class='form-group'><label for='price'>Phone:</label><input type='text' class='form-control' id='phone'  name='phone' value="+data.phone+"></div><div class='form-group'><label for='price'>Address:</label><input type='text' class='form-control' id='address'  name='address' value="+data.address+"></div><div class='form-group'><label for='price'>Branch:</label><input type='text' class='form-control' id='branch'  name='branch' value="+data.branch+"></div><div class='form-group'><label for='price'>Gaurdian Name:</label><input type='text' class='form-control' id='guardian_name'  name='guardian_name' value="+data.gaurd_name+"></div><div class='form-group'><label for='price'>Gaurdian Phone:</label><input type='text' class='form-control' id='guardian_phone'  name='guardian_phone' value="+data.gaurd_phone+"></div><div class='form-group'><label for='price'>Gaurdian Email:</label><input type='text' class='form-control' id='guardian_email'  name='guardian_email' value="+data.guard_emil+"></div><div class='form-group'><label for='price'>Student Type:</label><input type='text' class='form-control' id='sud_type'  name='sud_type' value="+data.stype+"></div><div class='form-group'><label for='price'>Joining Date:</label><input type='text' class='form-control' id='join_date'  name='join_date' value="+data.jdate+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>Save changes</button></div></div></div></form></div>");
	
    $('#exampleModalCenter').modal('show');

             }
             else
             {
             	alert(data.msg);
             }
             }

		   });
		 }


function del(email){
      $.ajax({
           type: "POST",
           url: 'hostel_edit.php',
           dataType:'json',
           data:{email:email},
           success:function(data) {
             if (data.code == "200")
             {
                //alert(data.name);
                //window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Delete</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='del_hostel.php' method='POST'><div class='form-group'><label for='name'>Are you sure you want to delete "+data.name+"?</label><input type='hidden' class='form-control' id='email' name='email' value="+data.email+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>delete</button></div></div></div></form></div>");
    
    $('#exampleModalCenter').modal('show');

             }
             else
             {
                alert(data.msg);
             }
             }

           });
         }
</script> 

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