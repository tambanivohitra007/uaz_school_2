<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Université Adventiste Zurcher </title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

    <script type="text/javascript">

        idleTimer = null;
        idleState = false;
        idleWait = 120000;

        (function ($) {

            $(document).ready(function () {

                $('*').bind('mousemove keydown scroll', function () {

                    clearTimeout(idleTimer);

                    if (idleState == true) {
                        // Reactivated event
                    }

                    idleState = false;

                    idleTimer = setTimeout(function () {

                        // Idle Event
                        window.setTimeout(function(){
                            document.location.reload(true);
                          }, 1000);

                        idleState = true; }, idleWait);
                });

                $("body").trigger("mousemove");

            });
        }) (jQuery)
    </script>
</head>

<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url();?>index.php/departement" class="site_title"><i class="glyphicon glyphicon-education"></i> <span> Zurcher </span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url() . 'assets/uploads/head/' . $head_id . '.jpg';?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenue,</span>
                            <h2><?php echo $head_name; ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />
