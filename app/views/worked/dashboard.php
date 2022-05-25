<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Liste des étudiants</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher...">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button">Go! </button>
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

                            <h3>Total Etudiants</h3>
                            <p>Durant le premier semestre</p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-male"></i>
                            </div>
                            <div class="count"><?php echo $countMale; ?></div>

                            <h3>Total Masculin</h3>
                            <p>Durant le premier semestre</p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-female"></i>
                            </div>
                            <div class="count"><?php echo $countFemale; ?></div>

                            <h3>Total Féminin</h3>
                            <p>Durant le premier semestre</p>
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
                                      <h3>Liste des étudiants <small>avec leur Travail Manuel</small></h3>
                                  </div>
                                  <div class="col-md-6">
                                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="x_content">
                                <table id="table" class="table table-striped projects responsive-utilities jambo_table">
                                    <thead>
                                        <tr>

                                            <th style="width: 10%">ID</th>
                                            <th>Noms et Prénoms de l'étudiant</th>
                                            <th>Work education</th>
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          foreach ($list  as $objet) {
                                              echo '<tr>';
                                              echo '<td>' .  $objet['student_id'] . '</td>';
                                              echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';
                                              echo '<td>' . $objet['work_ed'] .'</td>';
                                        ?>
                                              <td><a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/worked/popup/<?php echo $objet['student_id']; ?>');" class="btn btn-warning btn-xs" id="voir"><i class="fa fa-eye"></i> Voir et Ajouter worked </a></td>
                                        <?php
                                              echo '</tr>';
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
                         "language": {
                             "lengthMenu": "Afficher _MENU_ enregistrements par page",
                             "zeroRecords": "Rien trouvé - Désolé",
                             "info": "Montrer page _PAGE_ sur _PAGES_",
                             "infoEmpty": "Pas d'enregistrements disponible",
                             "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
                             "sSearch": "Rechercher: ",
                             "paginate": {
                               "last": "Dernier",
                               "first": "Premier",
                               "previous": "Précédent",
                               "next": "Suivant"
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

                  	</script>
                    <!-- (Ajax Modal)-->
                    <div class="modal fade modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_ajax">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Université Adventiste Zurcher</h4>
                              </div>

                              <div class="modal-body" style="height:500px; overflow:auto;">
                              </div>

                              <!-- <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div> -->
                          </div>
                      </div>
                    </div>

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
                                      url: "<?php echo site_url('departement/finalized'); ?>" + $text,
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

                                    //window.location = "<?php echo base_url(); ?>" + "index.php/departement";
                                    // $('.'+ row).attr('disabled', 'disabled');
                                    //$('.source').attr('disabled', 'disabled');
                              });

                        </script>
