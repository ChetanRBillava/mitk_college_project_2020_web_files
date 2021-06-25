<?php
include('shopkeeper_header.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopkeeper portal</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

<link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Shopkeeper Dashboard</h1>
                    </div>
                </div>
            </div>
           
        </div>

           
<div class="content mt-3">
    <div class="col-lg-12">
        <div class="card bg-flat-color-1 text-light">
            <div class="card-body">
                <div class="h4 m-0">Orders</div>

                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 100%; height: 5px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead style="color: blue; background-color: white">
                        <tr>
                            <th scope="col"><center>Item name</center></th>
                            <th scope="col"><center>Item amount</center></th>
                        </tr>
                    </thead>
                    <tbody style="color: white;">

                        <?php
                        include('db.php');
                        $sql="SELECT * FROM stationary";
                        $res=$conn->query($sql);
                        if($res->num_rows >0){
                            $i=0;
                            while ($row=$res->fetch_assoc()) {
                                $item_name=$row['item_name'];
                                $item_amount=$row['item_amount'];
                            ?>
                            <tr>
                                <td><center><?php echo $item_name; ?></center></td>
                                <td><center><?php echo $item_amount; ?></center></td>
                            </tr>
                            <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.col-->        

           
            
           

            


</body>

</html>