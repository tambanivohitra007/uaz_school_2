<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo $this->lang->line('title_stat'); ?></h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('search'); ?>">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button"><?php echo $this->lang->line('go_button'); ?> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- top tiles -->
                <div class="row tile_tiles">

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count"><?php echo $countInscrit; ?></div>

                            <h3><?php echo $this->lang->line('inscrit'); ?></h3>
                            <p><?php echo $beforeLastID->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-th-list"></i>
                            </div>
                            <div class="count"><?php echo $countNInscrit; ?></div>

                            <h3><?php echo $this->lang->line('non_inscrit'); ?></h3>
                            <p><?php echo $beforeLastID->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="glyphicon glyphicon-chevron-up"></i>
                            </div>
                            <div class="count green" id="countApp"><?php echo $countApp; ?></div>

                            <h3><?php echo $this->lang->line('approved'); ?></h3>
                            <p><?php echo $beforeLastID->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="glyphicon glyphicon-chevron-down"></i>
                            </div>
                            <div class="count red" id="countNApp"><?php echo $countNApp; ?></div>

                            <h3><?php echo $this->lang->line('non_approved'); ?></h3>
                            <p><?php echo $beforeLastID->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>


                    <!-- pour le semestre courant -->

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count"><?php echo $selectedCountInscrit; ?></div>

                            <h3><?php echo $this->lang->line('inscrit'); ?></h3>
                            <p class="red"><?php echo $selectedId->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-th-list"></i>
                            </div>
                            <div class="count"><?php echo $selectedCountNInscrit; ?></div>

                            <h3><?php echo $this->lang->line('non_inscrit'); ?></h3>
                            <p class="red"><?php echo $selectedId->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="glyphicon glyphicon-chevron-up"></i>
                            </div>
                            <div class="count green" id="countApp"><?php echo $selectedCountApp; ?></div>

                            <h3><?php echo $this->lang->line('approved'); ?></h3>
                            <p class="red"><?php echo $selectedId->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="glyphicon glyphicon-chevron-down"></i>
                            </div>
                            <div class="count red" id="countNApp"><?php echo $selectedCountNApp; ?></div>

                            <h3><?php echo $this->lang->line('non_approved'); ?></h3>
                            <p class="red"><?php echo $selectedId->semester . ' ' . $beforeLastID->year ?></p>
                        </div>
                    </div>
                </div>
                <!-- /top tiles -->
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->lang->line('title_table'); ?></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div id="parent">

                                  <table id="table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th style="width: 10%">ID</th>
                                                <th><?php echo $this->lang->line('nom'); ?></th>
                                                <th>Status</th>
                                                <th>Academique</th>
                                                <th>Finance</th>
                                                <th>WorkEd</th>
                                                <th>Registrar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              foreach ($list  as $objet) {
                                                  echo '<tr>';
                                                  echo '<td class="student_id">' .  $objet['student_id'] . '</td>';
                                                  echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';

                                                  if ($objet['app_dean'] == 0)
                                                    echo '<td><button type="button" id="' . $objet['student_id'] . '"class="btn btn-warning btn-xs" id="status">Enrolling...</button></td>';
                                                  else echo '<td><button type="button" id="' . $objet['student_id'] . '"class="btn btn-success btn-xs" id="status">Continued</button></td>';
                                                  $url = site_url('departement/popup'. $objet['student_id']);

                                                  // to trace student inscription

                                                  if ($objet['app_academic'] == 0) echo '<td><button class="btn btn-warning btn-xs glyphicon glyphicon-pencil" aria-hidden="true"></button></td>';
                                                  else echo '<td><button class="btn btn-success btn-xs glyphicon glyphicon-ok" aria-hidden="true"></button></td>';

                                                  if ($objet['app_finance'] == 0) echo '<td><button class="btn btn-warning btn-xs glyphicon glyphicon-pencil" aria-hidden="true"></button></td>';
                                                  else echo '<td><button class="btn btn-success btn-xs glyphicon glyphicon-ok" aria-hidden="true"></button></td>';

                                                  if ($objet['app_worked'] == 0) echo '<td><button class="btn btn-warning btn-xs glyphicon glyphicon-pencil" aria-hidden="true"></button></td>';
                                                  else echo '<td><button class="btn btn-success btn-xs glyphicon glyphicon-ok" aria-hidden="true"></button></td>';

                                                  if ($objet['app_registrar'] == 0) echo '<td><button class="btn btn-warning btn-xs glyphicon glyphicon-pencil" aria-hidden="true"></button></td>';
                                                  else echo '<td><button class="btn btn-success btn-xs glyphicon glyphicon-ok" aria-hidden="true"></button></td>';

                                            ?>
                                                <td>
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/departement/popup/<?php echo $objet['student_id']; ?>');" class="btn btn-danger btn-xs" id="voir"><i class="fa fa-eye"></i> <?php echo $this->lang->line('see'); ?> </a>
                                                    <?php
                                                      if ($objet['app_dean'] == 0){
                                                    ?>
                                                    <a href="#" onclick="showModalEdit('<?php echo base_url();?>index.php/departement/popupEdit/<?php echo $objet['student_id']; ?>');" class="btn btn-default btn-xs <?php echo $objet['student_id']; ?>" id="editer"><i class="fa fa-edit"></i> <?php echo $this->lang->line('btn_edit'); ?> </a>
                                                    <button type="button" class="btn btn-info btn-xs source <?php echo $objet['student_id']; ?>"><i class="fa fa-check-circle-o"></i> <?php echo $this->lang->line('btn_approved'); ?> </button>
                                                    <?php
                                                      }
                                                      else {

                                                      }
                                                    ?>
                                                  </td>
                                                  </tr>
                                            <?php
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

                   <script>
                       $(document).ready(function() {

                       $('#table').DataTable( {
                         'iDisplayLength': 10,
                         "sPaginationType": "full",
                         "autoWidth": true,
                         "language": {
                             "lengthMenu": "<?php echo $this->lang->line('length_menu'); ?>",
                             "zeroRecords": "<?php echo $this->lang->line('zero_rec'); ?>",
                             "info": "<?php echo $this->lang->line('info'); ?>",
                             "infoEmpty": "<?php echo $this->lang->line('info_empty'); ?>",
                             "infoFiltered": "<?php echo $this->lang->line('info_filtered'); ?>",
                             "sSearch": "<?php echo $this->lang->line('search'); ?>: ",
                             "paginate": {
                               "last": "<?php echo $this->lang->line('paginate_last'); ?>",
                               "first": "<?php echo $this->lang->line('paginate_first'); ?>",
                               "previous": "<?php echo $this->lang->line('paginate_prev'); ?>",
                               "next": "<?php echo $this->lang->line('paginate_next'); ?>"
                             }
                         }
                     } );
                     } );
                   </script>

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
                                  <h4 class="modal-title">Université Adventiste Zurcher</h4>
                              </div>

                              <div class="modal-body" style="height:550px; overflow:auto;">

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


                              var x = $('#countApp').val();
                              var y = $('#countNApp').text();

                              $(".source").click(function() {

                                var $row = $(this).closest("tr");    // Find the row
                                var $text = $row.find(".student_id").text();
                                x++;
                                y--;

                                $('#'+$text).removeClass('btn btn-warning btn-xs').addClass('btn btn-success btn-xs').html('Continued');
                                $('#countApp').text(x);
                                $('#countNApp').text(y);

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
                                  url: "<?php echo base_url(); ?>" + "index.php/departement/finalized/" + $text,
                                  dataType: 'text',
                                  data: { approuved: 1 },
                                  cache:false,
                                  success:
                                      function(data){
                                        console.log(data);
                                      }
                                });

                                // console.log('ok be zany ity');
                                //window.location = "<?php echo base_url(); ?>" + "index.php/departement";
                                // $('.'+ row).attr('disabled', 'disabled');
                                //$('.source').attr('disabled', 'disabled');
                              });

                        </script>
