<?php
include('header.php');
include('db.php');
?>
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
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered responsive">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Applied On</th>
                                            <th>Leave Type</th>
                                            <th>leave_from</th>
                                            <th>leave_till</th>
                                            <th>return_date</th>
                                            <th>reason</th>
                                            <th>leave_status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
<?php
$sql="SELECT * FROM `attendence` WHERE 1";
$result=$conn->query($sql);
if($result->num_rows > 0 )
{
	while ($row=$result->fetch_assoc()) 
	{
        $email=$row['email'];
        $appliedon=$row['applied_on'];
        $leave_type=$row['leave_type'];
		$leave_from=$row['leave_from'];
		$leave_till=$row['leave_till'];
		$return_date=$row['return_date'];
		$reason=$row['reason'];
		$leave_status=$row['leave_status'];
		?>

									<tbody>
                                        <tr> 
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $appliedon; ?></td>
                                            <td><?php echo $leave_type; ?></td>
                                            <td><?php echo $leave_from; ?></td>
                                            <td><?php echo $leave_till; ?></td>
                                            <td><?php echo $return_date; ?></td>
                                            <td><?php echo $reason; ?></td>
                                            <?php
                                            if ($leave_status != 'Approved'){
                                                ?>
                                            <td><?php echo $leave_status; ?></td>
                                            <td><div>
<button class="btn btn-outline-success btn-sm" onclick="acpt('<?php echo $email; ?>','<?php echo $appliedon; ?>')" >Accept</button>
<button class="btn btn-outline-danger btn-sm" onclick="reject('<?php echo $email; ?>','<?php echo $appliedon; ?>')"   > Reject<span>&nbsp</span></button></div></td>
                                                <?php    
                                            }
                                            else{
                                                ?>
<td colspan="2"><center><?php echo $leave_status; ?></center></td>
<?php 
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
	<?php
	}
}
?>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function acpt(email,apply){
		//alert(apply);
      $.ajax({
           type: "POST",
           url: 'hostl_approve.php',
           dataType:'json',
           data:{email:email,apply:apply},

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


	function reject(email,apply){
		//alert(apply);
      $.ajax({
           type: "POST",
           url: 'reject_leave.php',
           dataType:'json',
           data:{email:email,apply:apply},

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

  

    <?php
    include('footer.php');
    ?>