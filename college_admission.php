<?php
include('header.php');
include('db.php');
?>
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    
<!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registered students Details:</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pid</th>
                                            <th>Orderid</th>
                                            <th>Email</th>
                                            <th>Payment For</th>
                                            <th>Trans detail</th>
                                            <th>Trans type</th>
                                            <th>Trans date</th>
                                            <th>Total amt</th>
                                            <th>Trans status</th>
                                           
                                        </tr>
                                    </thead>
<?php
$sql="SELECT * FROM `payment` where payment_for='Admission fee'";
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
                                            <td><?php echo $pid; ?></td>
                                            <td><?php echo $orderid; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $payment_for; ?></td>
                                            <td><?php echo $trans_detail; ?></td>
                                            <td><?php echo $trans_type; ?></td>
                                            <td><?php echo $trans_date; ?></td>
                                            <td><?php echo $total_amt; ?></td>
                                            <td><?php echo $trans_status; ?></td>
                                            <!-- <td><div>
<button class="btn btn-outline-success btn-sm" onclick="acpt('<?php echo $email; ?>')" >Accept</button>
<button class="btn btn-outline-danger btn-sm"  > Reject<span>&nbsp</span></button></div></td> -->
                                        </tr>
                                    </tbody>
	<?php
	}
}
?>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function acpt(email){
      $.ajax({
           type: "POST",
           url: 'send_mail.php',
           dataType:'json',
           data:{email:email},
           success:function(data) {
             if (data.code == "200")
             {
             	alert(data.msg);
             	window.location.reload();
             }
             else
             {
             	alert(data.msg);
             }
             }

		   });
		 }
</script>
                                   
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

  <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>

    <?php
    //include('footer.php');
    ?>