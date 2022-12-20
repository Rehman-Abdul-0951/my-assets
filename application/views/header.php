<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Managemnet</title>
    <!-- <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.png"> -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo_style.css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Ladda style -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <style>
        .logostyle{
            /*margin-left: 12%;*/
            border-radius:20%;
            margin-top: -10%;
        }
    </style>
</head>
<body class="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                        </div>
                        <div class="logo-element">
                            HM+
                        </div>
                    </li>
                    
                    
                    <li>
                        <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Room</span></a>
                    </li>
                   
                    <li  class="<?php if( uri_string() == 'Booking_Controller/index' ||  uri_string() == 'Booking_Controller/getBookingData'){ echo 'active'; } ?>">
                        <a  href="<?php echo base_url();?>index.php/Booking_Controller/getBookingData"><i class="fa fa-user"></i> <span class="nav-label">Booking</span></a>
                    </li>

                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
            <!--<form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>-->            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo base_url();?>index.php/Login_Controller/Logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>