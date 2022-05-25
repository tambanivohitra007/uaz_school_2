<!-- page content -->
      <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><?php echo $this->lang->line('title_dashboard'); ?></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('search'); ?>" disabled>
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="button" disabled>Go! </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- top tiles -->
                <div class="row tile_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-institution"></i>
                            </div>
                            <div class="count green"><?php echo $countAllStd; ?></div>

                            <h3>Total <?php echo $this->lang->line('total_std') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-male"></i>
                            </div>
                            <div class="count"><?php echo $countMale; ?></div>

                            <h3>Total <?php echo $this->lang->line('total_male') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-female"></i>
                            </div>
                            <div class="count"><?php echo $countFemale; ?></div>

                            <h3>Total <?php echo $this->lang->line('total_femaile') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepTheo; ?></div>

                            <h3><?php echo $this->lang->line('theo') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepGest; ?></div>

                            <h3><?php echo $this->lang->line('gest') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepInfo; ?></div>

                            <h3><?php echo $this->lang->line('info') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepNurs; ?></div>

                            <h3><?php echo $this->lang->line('nurs') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepEduc; ?></div>

                            <h3><?php echo $this->lang->line('educ') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepComm; ?></div>

                            <h3><?php echo $this->lang->line('comm') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count green"><?php echo $countDepLang; ?></div>

                            <h3><?php echo $this->lang->line('lang') ?></h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="dashboard_graph x_panel">
                              <div class="row x_title">
                                  <div class="col-md-6">
                                      <h3>Activités d'admission <small>Durant les 20 années successives</small></h3>
                                  </div>
                                  <div class="col-md-6">
                                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="x_content">
                                  <div class="demo-container" style="height:250px">
                                      <div id="morris-line-chart" style="height: 250px;"></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>

                <!-- morris -->
                <script src= "<?php echo base_url(); ?>assets/js/morris/morris.min.js"></script>
                <script src= "<?php echo base_url(); ?>assets/js/morris/raphael-min.js"></script>

                <script type="text/javascript">
                    new Morris.Area({
                      element: 'morris-line-chart',
                      data: <?php echo json_encode($rows); ?>,
                      xkey: 'year',
                      ykeys: ['c'],
                      labels: ['Total etudiants'],
                      lineColors: ['#1ABB93']
                    });
                </script>
