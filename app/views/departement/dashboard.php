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

                            <h3>Total <?php echo $this->lang->line('total_std'); ?></h3>
                            <p><?php echo $this->lang->line('enrolled_first'); ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-male"></i>
                            </div>
                            <div class="count"><?php echo $countMale; ?></div>

                            <h3>Total <?php echo $this->lang->line('total_male'); ?></h3>
                            <p><?php echo $this->lang->line('enrolled_first'); ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-female"></i>
                            </div>
                            <div class="count"><?php echo $countFemale; ?></div>

                            <h3>Total <?php echo $this->lang->line('total_femaile'); ?></h3>
                            <p><?php echo $this->lang->line('enrolled_first'); ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-briefcase"></i>
                            </div>
                            <div class="count red"><?php echo $countDep; ?></div>

                            <h3>Total <?php echo $dep; ?></h3>
                            <p><?php echo $this->lang->line('enrolled_first'); ?></p>
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
                                      <h3><?php echo $this->lang->line('title_graph'); ?></h3>
                                  </div>
                                  <div class="col-md-6">
                                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="x_content">
                                  <div class="demo-container" style="height:250px">
                                      <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>


                <!-- Datatables -->
                   <script src= "<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
                   <script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>

                   <script type="text/javascript">
                    	function showAjaxModal(url)
                    	{
                    		$('#modal_ajax').modal('show', {backdrop: 'false'});
                    		$.ajax({
                    			url: url,
                    			success: function(response)
                    			{
                    				$('#modal_ajax .modal-body').html(response);
                    			}
                    		});
                    	}

                      function showModalEdit(url){
                        $('#modal_edit').modal('show', {backdrop: 'false'});
                        $.ajax({
                          url: url,
                          success: function(response){
                            $('#modal_edit .modal-body').html(response);
                          }
                        });
                      }
                  	</script>
                    <!-- (Ajax Modal)-->
                    <div class="modal fade modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_ajax">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Université Adventiste Zurcher</h4>
                              </div>

                              <div class="modal-body" style="height:400px; overflow:auto;">



                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- Ajax modal for editing courses taken -->
                    <!-- <?php echo form_open(); ?> -->
                    <div class="modal fade modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_edit">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Université Adventiste Zurcher - Détail sur l'étudiant</h4>
                              </div>

                              <div class="modal-body" style="height:550px; overflow:auto;">

                              </div>

                              <div class="modal-footer">
                                <div class="btn-group">
                                  <a href="<?php echo site_url("department"); ?>" type="button" class="btn btn-success">Enregistrer</a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- <?php echo form_close(); ?> -->
                    <script type="text/javascript">
                            $(function () {
                                    before_close: function PNotify() {
                                        PNotify.update({
                                            title: PNotify.options.title + " - Enjoy your Stay",
                                            before_close: null
                                        });

                                        PNotify.queueRemove();
                                        return false;
                                    }
                                });

                              function updated(){

                              }

                              $(".source").click(function() {
                                var $row = $(this).closest("tr");    // Find the row
                                var $text = $row.find(".student_id").text();

                                    //row = table.row( this ).data()[0];
                                    //var student_id;

                                    $('#'+$text).removeClass('btn btn-warning btn-xs').addClass('btn btn-success btn-xs').html('Continued');

                                    var myBtn = document.getElementsByClassName($text);
                                    $('.'+ $text).remove();
                                    //$('#'+$text).removeClass('.'+$text).addClass('btn btn-success btn-xs').html('Continued');

                                    if ($('#'+$text).hasClass('btn-success'))
                                    {
                                      new PNotify({
                                          title: 'Approval',
                                          type: 'success',
                                          text: 'Approuvé avec success!! ' + $text,
                                          nonblock: {
                                              nonblock: true,
                                              nonblock_opacity: .2
                                          }
                                      });
                                    }

                                    // andrana ajax alefa any @bd
                                    $.ajax({
                                      type: "POST",
                                      url: "<?php echo site_url("/departement/finalized/"); ?>" +  $text,
                                      dataType: 'text',
                                      data: {
                                        approuved: 1
                                      },
                                      cache:false,
                                      success:
                                          function(data){
                                            console.log(data);
                                          }
                                    });

                                    //window.location = "<?php echo site_url('/departement'); ?>" ;
                                    // $('.'+ row).attr('disabled', 'disabled');
                                    //$('.source').attr('disabled', 'disabled');
                              });

                        </script>

                        <!-- flot js -->
                            <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.pie.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.orderBars.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.time.min.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/date.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.spline.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.stack.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/curvedLines.js"></script>
                            <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.js"></script>

                            <!-- flot -->

                            <script>
                                //random data
                                var d1 = [
                                [2010, 29], [2011, 192], [2013, 223], [2014, 76], [2015, 123], [2016, 94], [2017, 80]
                            ];

                                //flot options
                                var options = {
                                    series: {
                                        curvedLines: {
                                            apply: true,
                                            active: true,
                                            monotonicFit: true
                                        }
                                    },
                                    colors: ["#26B99A"],
                                    grid: {
                                        borderWidth: {
                                            top: 0,
                                            right: 0,
                                            bottom: 1,
                                            left: 1
                                        },
                                        borderColor: {
                                            bottom: "#7F8790",
                                            left: "#7F8790"
                                        }
                                    }
                                };
                                var plot = $.plot($("#placeholder3xx3"), [{
                                    label: "Registrations",
                                    data: d1,
                                    lines: {
                                        fillColor: "rgba(150, 202, 89, 0.12)"
                                    },
                                    points: {
                                        fillColor: "#fff"
                                    }
                                        }], options);
                            </script>
                            <!-- /flot -->
