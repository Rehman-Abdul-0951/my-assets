<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot password</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">

<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">

                <h2 class="font-bold">Forgot password</h2>
                <div class="row">

                    <div class="col-lg-12">
                        <form class="m-t" role="form" method="post" action="<?php echo base_url();?>index.php/Login_Controller/reset_password" id="myform">
                            <div class="form-group">
                                <select class="form-control" name="type">
                                   <option value="">Select Type</option> 
                                   <option value="admin">Admin</option>
                                   <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Username</label><span style="color: red;">&nbsp;*</span>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username Here" required="">
                            </div>

                            <div class="form-group">
                                <label>Enter New Password</label><span style="color: red;">&nbsp;*</span>
                                <input type="password" name="password" class="form-control" placeholder="Enter Your New Password" id="pass" required="">
                            </div>

                            <div class="form-group">
                                <label>Re type Password</label><span style="color: red;">&nbsp;*</span>
                                <input type="Password" name="password2" class="form-control" placeholder="Confirm Your New Password" required="">
                            </div>

                            <button type="submit" id="save" class="btn btn-primary block full-width m-b">Forgot</button>

                             <a href="<?php echo base_url();?>index.php/Login_Controller/index">Back to Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center><p class="m-t"> <small>Copyright © 2018 <b>iBirds Software Services Pvt. Ltd.</b> All rights reserved.</small></p></center>
</div>
</body>
</html>
  <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
    $("#myform").validate({
        rules:{
            type:{
                required:true,
            },
             username:{
                required:true,
            },
            password:{
                required:true,
                minlength: 4,
            },
            password2:{
                required:true,
                minlength: 4,
                equalTo: "#pass",
            }
        },
    });
</script>
