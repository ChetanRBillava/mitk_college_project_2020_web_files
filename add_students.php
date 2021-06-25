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
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Semester</th>
                                            <th>Branch</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Guardian Name</th>
                                            <th>Guardian Phone</th>
                                            <th>Guardian Email</th>
                                            <th>SSSLC Percent</th>
                                            <th>PUC Percent</th>
                                            <th>Student Stay</th>
                                            <th>student Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
<?php
$sql="SELECT * FROM `register` WHERE status=0";
$result=$conn->query($sql);
if($result->num_rows > 0 )
{
	while ($row=$result->fetch_assoc()) 
	{
		$name=$row['name'];
		$gender=$row['gender'];
		$sem=$row['sem'];
        $email=$row['email'];
        $phone=$row['phone'];
		$address=$row['address'];
		$branch=$row['branch'];
		$guardian_name=$row['guardian_name'];
		$guardian_phone=$row['guardian_phone'];
		$guardian_email=$row['guardian_email'];
		$sslc_percent=$row['sslc_percent'];
		$puc_percent=$row['puc_percent'];
		$student_status=$row['student_status'];
		$student_type=$row['student_type'];
		?>

									<tbody>
                                        <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php echo $sem; ?></td>
                                            <td><?php echo $branch; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $guardian_name; ?></td>
                                            <td><?php echo $guardian_phone; ?></td>
                                            <td><?php echo $guardian_email; ?></td>
                                            <td><?php echo $sslc_percent; ?></td>
                                            <td><?php echo $puc_percent; ?></td>
                                            <td><?php echo $student_status; ?></td>
                                            <td><?php echo $student_type; ?></td>
                                            <td><div>
<button class="btn btn-outline-success btn-sm" onclick="acpt('<?php echo $email; ?>')" >Accept</button>
<button class="btn btn-outline-danger btn-sm"  > Reject<span>&nbsp</span></button></div></td>
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

  

    <?php
    include('footer.php');
    ?>