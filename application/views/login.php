<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <!-- <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.png"> -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        .err{
            color: red;
           display: none;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
             <!--    <img src="<?php echo base_url(); ?>assets/images/logo.png" height="130px" width="120px" style="margin-top: -25px;"/> -->
            </div>
            <h3>Welcome to Login</h3>
            <?php if($success = $this->session->flashdata('insert')) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $success; ?></strong>
                </div>
            <?php } ?>
            <form class="m-t" role="form" method="post" action="<?php echo base_url();?>index.php/Login_Controller/login" >
                <div class="form-group">
                    <select class="form-control" name="type" id="type">
                        <option value="">--Select Type--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                     <span class="err" id="err">User Type is Required</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" id="user" placeholder="Email">
                    <span class="err" id="err1">Username is Required</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
                    <span class="err" id="err2">Password is Required</span>
                </div>
                <button type="submit" id="login" class="btn btn-primary block full-width m-b">Login</button>

                 <a href="<?php echo base_url('index.php/Login_Controller/forgot_password'); ?>"><small>Forgot password?</small></a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
         $("#login").click(function(){
            flag = true;
             if($("#type").val() == ""){
                $("#err").show();
                flag = false;
            }else{
                $("#err").hide();
            }
            if($("#user").val() == ""){
                $("#err1").show();
                flag = false;
            }else{
                $("#err1").hide();
            }
            if($("#pass").val() == ""){
                $("#err2").show();
                flag = false;
            }else{
                $("#err2").hide();
            }
            return flag;
        
        });  
    </script>
</body>

</html>