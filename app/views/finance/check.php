
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

    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/images/favicon.png");?>" />

    <link href="<?php echo base_url("assets/fonts/css/font-awesome.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/animate.min.css");?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url("assets/css/custom.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/icheck/flat/green.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/flag-icon.min.css");?>" rel="stylesheet">


    <script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
  </head>

  <body class="nav-md" style="background:#172D44; background-image: url('<?php echo base_url();?>assets/images/logo.png'); background-repeat: no-repeat; background-attachment: fixed; background-position: 50% 20%;; background-size: 500px 500px;">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
          <div class="mid_center">
                <h3>Rechercher un étudiant</h3>
                <?php echo form_open(site_url('liste/detail')); ?>
                  <div class="col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <?php
                              $attributes = array(
                                'id' => 'login_username',
                                'class' => 'form-control',
                                'placeholder' => 'N° 30012',
                                'required autofocus' => NULL
                              );
                              echo form_input('id_num', '', $attributes);
                        ?>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Rechercher</button>
                        </span>
                    </div>
                  </div>
                </form>
              </div>
            <div class="text-center">
                <?php
                    if (!empty($list)) {
                    echo '<div>
                        <div>
                            <img class="avt" src="'. base_url() . 'assets/id_card/' . $list->student_id . '.jpg' . '" alt="Avatar" title="Change the avatar">
                        </div>
                        </div>';
                    echo '<h2>' . $list->noms . ' </h2>';
                        if (!empty($list->credits))
                            echo '<h2 class="error-number green">' . $list->credits .' credits </h2>';
                        else echo '<h2 class="error-number red"> pas encore inscrit </h2>';
                    }
                                
                ?>              
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
  </body>
</html>