
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription en Ligne </title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />
    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

</head>


<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    <div class="text-center">
                        <h1 class="error-number red">DESOLE</h1>
                        <h3><?php echo $user->student_nom . ' ' . $user->student_prenom; ?></h3>
                        <h1>Vous avez encore un solde antérieur de: <strong class="red"><?php echo $balance->balance; ?>Ar </strong>(au delà de 80.000 Ar).</h1>
                        <h3>Veuillez le régler le plus vite possible pour que vous puissiez continuer.</h3>
                        <div class="mid_center">
                            <h3>MERCI BEAUCOUP!</h3>
                            <form>
                                <div class="col-xs-12 form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default btn-lg"><a href="<?php echo site_url('student/logout');?>" class="deconnexion"><i class="fa fa-sign-out pull-right"></i> Déconnecter</a></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

        </div>
        <!-- footer content -->
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="<?php echo base_url();?>assets/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="<?php echo base_url();?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo base_url();?>assets/js/icheck/icheck.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

    <!-- /footer content -->
</body>

</html>
