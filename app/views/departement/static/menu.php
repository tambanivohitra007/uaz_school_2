<!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> <?php echo $this->lang->line('std_section'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo site_url('departement');?>"><?php echo $this->lang->line('menu_dash'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('departement/inscription');?>"><?php echo $this->lang->line('menu_enrolled'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('departement/list_etudiant');?>"><?php echo $this->lang->line('menu_liste'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('departement/cours');?>"><?php echo $this->lang->line('menu_cours'); ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-gear"></i> <?php echo $this->lang->line('config_section'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        </li>
                                        <li><a href="<?php echo site_url('departement/profile');?>">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <p href="#"><i class="glyphicon glyphicon-king"></i> Analyste développeur: <i href="#">rindra.it</i> </p>

                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
