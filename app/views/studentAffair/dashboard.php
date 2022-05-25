<?php

  include "/static/header.php";
  include "/static/menu.php";
  include "/static/top.php"

?>


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
                                    <input type="text" class="form-control" placeholder="Rechercher..." disabled="">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" disabled="">Go! </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- top tiles -->
                    <?php
                      $session_id = $this->db->select_max('session_id')->get('session')->row()->session_id;

                      $semester = $this->db->get_where('session' , array('session_id' =>$session_id))->row()->semester . ' ' .
                      $this->db->get_where('session' , array('session_id' =>$session_id))->row()->year;

                    ?>
                <div class="row tile_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-institution"></i>
                            </div>
                            <div class="count green"><?php echo $countAllStd; ?></div>

                            <h3>Etudiants inscrits</h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-male"></i>
                            </div>
                            <div class="count"><?php echo $countOffCampus; ?></div>

                            <h3>Total Externe</h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <div class="count"><?php echo $countOnCampus; ?></div>

                            <h3>Total Interne</h3>
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
                                      <h3>Liste des étudiants <small>*</small></h3>
                                  </div>
                                  <div class="col-md-6">
                                      <div id="reportrange" class="pull-right">
                                          <!-- <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> -->
                                          <select class="form-control" name="headerFilter">
                                            <option>Colonne...</option>
                                            <option>Noms et Prénoms de l'étudiant</option>
                                            <option>Sexe</option>
                                            <option>Filière</option>
                                            <option>Résidence</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="x_content">

                                <table id="table" class="table table-striped responsive-utilities jambo_table">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Noms et Prénoms</th>
                                            <th>Sexe</th>
                                            <th>Religion</th>
                                            <th>Telephone</th>
                                            <th>Filière</th>
                                            <th>Résidence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <th>ID</th>
                                        <th>Noms et Prénoms</th>
                                        <th>Sexe</th>
                                        <th>Religion</th>
                                        <th>Telephone</th>
                                        <th>Filière</th>
                                        <th>Résidence</th>
                                        <th>Action</th>
                                      </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                          foreach ($list  as $objet) {
                                              echo '<tr>';
                                              echo '<td>' .  $objet['student_id'] . '</td>';
                                              echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';

                                              if ($objet['sex'] == 0) $sex = 'Masculin'; else $sex = 'Féminin';
                                              echo '<td>' . $sex .'</td>';

                                              echo '<td>' .  $objet['religion'] . '</td>';
                                              echo '<td>' .  $objet['student_tel'] . '</td>';
                                              echo '<td>' .  $objet['etude_envisage'] . '</td>';

                                              if ($objet['externe'] == 0) $residence = 'Interne'; else $residence = 'Externe';
                                              echo '<td>' . $residence .'</td>';
                                        ?>
                                              <td><a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/studentAffair/popup/<?php echo $objet['student_id']; ?>');" class="btn btn-success btn-xs" id="voir"><i class="icon-magnifier"></i> Voir détail </a></td>
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

                function setFilter(x){
                  this.api().columns(x).every( function () {
                      var column = this;
                      var select = $('<select class="form-control"><option value=""></option></select>')
                          .appendTo( $(column.footer()).empty() )
                          .on( 'change', function () {
                              var val = $.fn.dataTable.util.escapeRegex(
                                  $(this).val()
                              );

                              column
                                  .search( val ? '^'+val+'$' : '', true, false )
                                  .draw();
                          } );
                      column.data().unique().sort().each( function ( d, j ) {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      } );
                  } );
                }
                   var asInitVals = new Array();

                   var x = [2, 3, 5, 6];
                   $(document).ready(function () {

                       var oTable = $('#table').DataTable({
                           "oLanguage": {
                               "sSearch": "Rechercher:"
                           },
                           'iDisplayLength': 10,
                           // "dom": 'T<"clear">lfrtip',
                           "dom": 'Bfrtip',
                          //  buttons: [
                          //      'copyHtml5',
                          //      'excelHtml5',
                          //      'csvHtml5',
                          //      'pdfHtml5',
                          //      'print',
                          //  ],
                          buttons: [
                              {
                                  extend: 'print',
                                  text: 'Imprimer',
                                  exportOptions: {
                                      columns: [ 0, ':visible'  ]
                                  }
                              },
                              {
                                  extend: 'copyHtml5',
                                  text: 'Copier',
                                  exportOptions: {
                                      columns: [ 0, ':visible' ]
                                  }
                              },
                              {
                                  extend: 'excelHtml5',
                                  text: 'Exporter dans Excel',
                                  exportOptions: {
                                      columns: ':visible'
                                  }
                              },
                              {
                                  extend: 'pdfHtml5',
                                  text: 'Exporter en PDF',
                                  exportOptions: {
                                      columns: [ 0, 1, 2, 5 ]
                                  }
                              },
                              {
                                  extend: 'colvis',
                                  text: 'Colonne...'

                              }

                          ],

                           initComplete: function () {
                               this.api().columns(x).every( function () {
                                   var column = this;
                                   var select = $('<select class="form-control"><option value=""></option></select>')
                                       .appendTo( $(column.footer()).empty() )
                                       .on( 'change', function () {
                                           var val = $.fn.dataTable.util.escapeRegex(
                                               $(this).val()
                                           );

                                           column
                                               .search( val ? '^'+val+'$' : '', true, false )
                                               .draw();
                                       } )
                                   column.data().unique().sort().each( function ( d, j ) {
                                       select.append( '<option value="'+d+'">'+d+'</option>' )
                                   } );
                               } );
                           }
                       });

                       oTable.columns( [ 3,4 ] ).visible( false, false );
                       oTable.columns.adjust().draw( false );
                   });

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

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
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

                    </script>



<?php  include "/static/footer.php" ?>
