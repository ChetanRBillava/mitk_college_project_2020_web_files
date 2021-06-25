<?php
include('shopkeeper_header.php');
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


<div class="col-lg-2"></div>
 <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Quantity</strong>
                            </div>
                            <div class="card-body">
                        
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item ID</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Item Amount</th>
                                            <th scope="col">Item Quantity</th>
                                            <th scope="col">Alter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

									$sql="SELECT * FROM `stationary` WHERE 1";
									$result=$conn->query($sql);
									if($result->num_rows > 0 )
									{
										while ($row=$result->fetch_assoc()) 
										{
											$id=$row['item_id'];
											$name=$row['item_name'];
											$amt=$row['item_amount'];
											$quantity=$row['quantity'];
											
											?>

											 <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $amt; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td>
			<i class="fa fa-pencil" style="color:green;" id="edit" onclick="edit(<?php echo $id; ?>)"></i>
	
		<i class="fa fa-trash" style="color:red;" onclick="del(<?php echo $id; ?>)"></i>                                            	
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
	function edit(id){
      $.ajax({
           type: "POST",
           url: 'item_edit.php',
           dataType:'json',
           data:{id:id},
           success:function(data) {
             if (data.code == "200")
             {
             	//alert(data.name);
             	//window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Edit</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='edit_item.php' method='POST'><div class='form-group'><input type='hidden' class='form-control' id='i_id' name='i_id' value="+data.id+"></div><div class='form-group'><label for='name'>Item Name:</label><input type='text' class='form-control' id='i_name' name='i_name' value="+data.name+"></div><div class='form-group'><label for='price'>Price per qty:</label><input type='text' class='form-control' id='price'  name='price' value="+data.amount+"></div><div class='form-group'><label for='price'>In Stock:</label><input type='text' class='form-control' id='stock'  name='stock' value="+data.quantity+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>Save changes</button></div></div></div></form></div>");
	
    $('#exampleModalCenter').modal('show');

             }
             else
             {
             	alert(data.msg);
             }
             }

		   });
		 }


function del(id){
      $.ajax({
           type: "POST",
           url: 'item_edit.php',
           dataType:'json',
           data:{id:id},
           success:function(data) {
             if (data.code == "200")
             {
                //alert(data.name);
                //window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Delete</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='delete_item.php' method='POST'><div class='form-group'><label for='name'>Are you sure you want to delete "+data.name+"?</label><input type='hidden' class='form-control' id='itm' name='itm' value="+data.id+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>delete</button></div></div></div></form></div>");
    
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
                    </div>
<div class="col-lg-2"></div>


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