<?php
session_start();
include('db.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopkeeper Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark" style="background-color: #6ba578d1!important;">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="shopLogin.php">
                        <h1><b style="color: white;">Shopkeeper Login</b></h1>
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pswd" id="pswd" class="form-control" placeholder="Password">
                        </div>
                                <!--<div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>-->
                                <button type="submit" name="submit" id="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="register-link m-t-15 text-center">
                                   <a href="index.php"> Login as admin ?</a>
                                </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script type="text/javascript">

     $('#submit').click(function(e){
        e.preventDefault();
       
        var email = $("#email").val();
        var pswd = $("#pswd").val();
   if (email == "" && pswd == "")
     {
       alert('enter data');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "shop.php",
            dataType: "json",
            data: {email:email, pswd:pswd},
            success : function(data){
                if (data.code == "200"){
                
                  window.location = "shopDashboard.php";
                } 
                else {
                    
                // html("<div class='alert alert-success' id='alert'><p>error </p></div>");
                   alert('Please enter the valid info ');
                }
            }
        });
          }

       });
</script>  

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>