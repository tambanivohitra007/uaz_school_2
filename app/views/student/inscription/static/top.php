
<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <!-- page content -->
            <div class="" role="main">

              <!-- top navigation -->
                          <div>

                              <div class="nav_menu">
                                  <nav class="" role="navigation">
                                      <ul class="nav navbar-nav navbar-right">
                                          <li class="">
                                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                                  <img src="<?php echo $path ?>" alt=""><?php echo $student->student_nom . ', ' . $student->student_prenom; ?>
                                                  <span class=" fa fa-angle-down"></span>
                                              </a>
                                              <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                                  <li><a href="<?php echo site_url('student/logout');?>" class="deconnexion"><i class="fa fa-sign-out pull-right"></i> Déconnecter</a>
                                                  </li>
                                              </ul>
                                          </li>
                                      </ul>
                                  </nav>
                              </div>

                          </div>
              <!-- /top navigation -->


                              <div class="">
                                  <div class="clearfix"></div>

                                  <div class="row">

                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <div class="x_panel">
                                              <div class="x_title">
                                                  <h2>Inscription en Ligne </h2>
                                                  <ul class="nav navbar-right panel_toolbox">
                                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                      </li>

                                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                      </li>
                                                  </ul>
                                                  <div class="clearfix"></div>
                                              </div>
                                              <div class="x_content">
