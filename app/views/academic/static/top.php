<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url() . 'assets/uploads/head/' . $head_id . '.jpg';?>" alt=""> <?php echo $head_name; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="<?php echo base_url() . 'index.php/academic/profile'?>"><i class="fa fa-user pull-right"></i>  Profile</a>
                        </li>
                        <li><a href="<?php echo base_url();?>index.php/academic/logout"><i class="fa fa-sign-out pull-right"></i>  Déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->
