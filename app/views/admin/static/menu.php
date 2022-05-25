<body class="nav-md">

  <div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href= "<?php echo base_url(); ?>index.php" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>Zurcher</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src= "<?php echo base_url() . 'assets/uploads/' . $info->username . '.jpg';?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenue,</span>
                        <h2><?php echo $info->fullName; ?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="glyphicon glyphicon-home"></i> Etudiant <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><?php echo anchor('admin/liste', 'Liste Des Etudiants', 'class="link-class"') ?>
                                    </li>
                                    <li><?php echo anchor('admin/insert', 'Ajouter un etudiant', 'class="link-class"') ?>
                                    </li>
                                    <li><a href="#"> Ajouter Plusieur etudiants</a>
                                    </li>
                                </ul>
                            </li>


                            <li><a><i class="fa fa-users"></i> Enseignant <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#"> Ajouter Professeur</a>
                                    </li>
                                    <li><a href="#">Professeur par Cours</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-briefcase"></i> Cours <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Ajouter Cours</a>
                                    </li>
                                    <li><a href="#">Liste des cours</a>
                                    </li>
                                    <li><a href="#">Professeur par cours</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-money"></i> Finance <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-dashboard "></i> Emploi du temps <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Comptabilité <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-book"></i> Bibliothèque <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-ambulance"></i> Transport <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Configuration</h3>
                        <ul class="nav side-menu">

                            <li><a><i class="fa fa-windows"></i> Paneau <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="<?php echo base_url();?>index.php/admin/system">Configuration </a>
                                    </li>
                                    <li><a href="<?php echo base_url();?>index.php/admin/users">Gestion des utilisateurs </a>
                                    </li>
                                    <li><a href="<?php echo base_url();?>index.php/admin/export">Test dynamic table </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li><a><i class="fa fa-laptop"></i> Statistiques <span class="label label-success pull-right">Coming Soon</span></a> -->
                            <!-- </li> -->
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Configuration" href="<?php echo base_url();?>index.php/admin/system">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="plein_ecran">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Vérouiller">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Déconnecter" href="<?php echo base_url();?>index.php/student/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
