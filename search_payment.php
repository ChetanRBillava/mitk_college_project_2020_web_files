<?php
include('header.php');
include('db.php');
$email=0;
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

<div class="card">
    <div class="card-header">
         <strong>Payment Details</strong>
    </div>
    <div class="card-body card-block">
    <form method="POST" >
        <div class="form-group">
            <label for="name" class=" form-control-label">Email</label>
            <input type="email" id="email" name="email" class="form-control">
            <span class="help-block">Enter the item name you want to search!</span>
        </div>

        <div class="card-footer">
            <button type="submit" name="submit12" id="submit12" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit</button>
            <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset</button>
        </div>
    </form>
   
<?php
$email=$_POST['email'];

?>
<br>

        
                        
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Orderid</th>
                                            <th>Email</th>
                                            <th>Payment For</th>
                                            <th>Trans detail</th>
                                            <th>Trans type</th>
                                            <th>Trans date</th>
                                            <th>Total amt</th>
                                            <th>Trans status</th>
                                            <th>Edit</th>
                                           
                                        </tr>
                                    </thead><tbody>
<?php

$sql="SELECT * FROM `payment` where email='".$email."'";
$result=$conn->query($sql);
if($result->num_rows > 0 )
{
    while ($row=$result->fetch_assoc()) 
    {
        $pid=$row['pid'];
        $orderid=$row['orderid'];
        $email=$row['email'];
        $payment_for=$row['payment_for'];
        $trans_detail=$row['trans_detail'];
        $trans_type=$row['trans_type'];
        $trans_date=$row['trans_date'];
        $total_amt=$row['total_amt'];
        $trans_status=$row['trans_status'];
        ?>

                                    <tbody>
                                        <tr>
                                            <!-- <td><?php echo $pid; ?></td> -->
                                            <td><?php echo $orderid; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $payment_for; ?></td>
                                            <td><?php echo $trans_detail; ?></td>
                                            <td><?php echo $trans_type; ?></td>
                                            <td><?php echo $trans_date; ?></td>
                                            <td><?php echo $total_amt; ?></td>
                                            <td><?php echo $trans_status; ?></td>
                                            <td>
<i class="fa fa-pencil" style="color:green;" id="edit" onclick="edit('<?php echo $orderid; ?>')"></i>
    
        <i class="fa fa-trash" style="color:red;" onclick="del('<?php echo $orderid; ?>')"></i></td>
                                        </tr>
                                    </tbody>
    <?php
    }
}
?>
<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
</div>


<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function edit(orderid){
      $.ajax({
           type: "POST",
           url: 'edit_pay.php',
           dataType:'json',
           data:{orderid:orderid},
           success:function(data) {
             if (data.code == "200")
             {
                //alert(data.name);
                //window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Edit</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='edit_payment.php' method='POST'><div class='form-group'><label for='name'>Order Id:</label><input type='text' class='form-control' id='orderid' name='orderid' value="+data.orderid+" readonly></div><div class='form-group'><label for='name'>Payment for:</label><input type='text' class='form-control' id='payment_for' name='payment_for' value="+data.payment_for+"></div><div class='form-group'><label for='name'>Transaction Detail:</label><input type='text' class='form-control' id='trans_detail' name='trans_detail' value="+data.trans_detail+"></div><div class='form-group'><label for='price'>Transaction type:</label><input type='text' class='form-control' id='trans_type'  name='trans_type' value="+data.trans_type+"></div><div class='form-group'><label for='price'>Total Amount:</label><input type='text' class='form-control' id='total_amt'  name='total_amt' value="+data.total_amt+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>Save changes</button></div></div></div></form></div>");
    
    $('#exampleModalCenter').modal('show');

             }
             else
             {
                alert(data.msg);
             }
             }

           });
         }


function del(orderid){
      $.ajax({
           type: "POST",
           url: 'edit_pay.php',
           dataType:'json',
           data:{orderid:orderid},
           success:function(data) {
             if (data.code == "200")
             {
                //alert(data.name);
                //window.location.reload();
$('#exampleModalCenter').empty();
$("#exampleModalCenter").append("<div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Delete</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><form action='delete_payment.php' method='POST'><div class='form-group'><label for='name'>Are you sure you want to delete "+data.orderid+"?</label><input type='hidden' class='form-control' id='orderid' name='orderid' value="+data.orderid+"></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' id='editsub' name='editsub' class='btn btn-primary'>delete</button></div></div></div></form></div>");
    
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
    <?php
    include('footer.php');
    ?>