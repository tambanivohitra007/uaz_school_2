<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3>Liste des étudiants</h3>
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
                            <div class="count green"><?php echo $totalEtudiant; ?></div>

                            <h3>Total Etudiants</h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-male"></i>
                            </div>
                            <div class="count"><?php echo $TotalMasculin; ?></div>

                            <h3>Total Masculin</h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-female"></i>
                            </div>
                            <div class="count"><?php echo $TotalFeminin; ?></div>

                            <h3>Total Féminin</h3>
                            <p><?php echo $semester; ?></p>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-dedent"></i>
                            </div>
                            <div class="count green"><?php echo $TotalInscrit; ?></div>

                            <h3>Total Inscrits</h3>
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
                                      <h3>Liste des étudiants <small>avec écolage</small></h3>
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
                                            <th>Mode</th>
                                            <th style="width: 15%">Montant (général)</th>
                                            <th>Status</th>
                                            <th style="width: 25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $fee = $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant;
                                        $feeLabInfo = $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->montant;
                                        $feeLabLangue = $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->montant;
                                        $feeGraduation = $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->montant;
                                        $admission = $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;
                                        $assurance = $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->montant;
                                        $depot_dortoir = $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;
                                        $yearbook = $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;
                                        $retard = $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->montant;

                                          foreach ($list  as $objet) {
                                            if ($objet['residence'] == 1 && $objet['new_student'] == 1) {
                                              $total = $objet['total_payment'] + ($fee * $objet['total_credit']) + ($feeLabInfo * $objet['lab_info']) +
                                              ($feeLabLangue * $objet['lab_langue'] );
                                            }
                                            else if ($objet['residence'] == 0 && $objet['new_student'] == 1) {
                                              $total = $objet['total_payment'] + ($fee * $objet['total_credit']) + ($feeLabInfo * $objet['lab_info']) +
                                              ($feeLabLangue * $objet['lab_langue']);
                                            }
                                            else {
                                              $total = $objet['total_payment'] + ($fee * $objet['total_credit']) + ($feeLabInfo * $objet['lab_info']) +
                                              ($feeLabLangue * $objet['lab_langue']) + ($feeGraduation * $objet['graduated'] + ($retard * $objet['retard']));
                                            }

                                            echo '<tr>';
                                            echo '<td class="student_id">' .  $objet['student_id'] . '</td>';
                                            echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';
                                            echo '<td>' .  $objet['plan'] . '</td>';
                                            echo '<td class="">' . $total . ' Ar </td>';

                                              if ($objet['app_finance'] == 0)
                                                echo '<td><button type="button" id="' . $objet['student_id'] . '"class="btn btn-warning btn-xs" id="status">Enrolling...</button></td>';
                                              else echo '<td><button type="button" id="' . $objet['student_id'] . '"class="btn btn-success btn-xs" id="status">Continued</button></td>';
                                        ?>
                                              <td>
                                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/finance/popup/<?php echo $objet['student_id']; ?>');" class="btn btn-danger btn-xs" id="voir"><i class="icon-magnifier"></i>  Voir </a>
                                                <?php
                                                  if ($objet['app_finance'] == 0){
                                                ?>
                                                <button type="button" class="btn btn-info btn-xs revenir <?php echo $objet['student_id']; ?>"><i class="fa fa-undo"></i> Revenir </button>
                                                <button type="button" class="btn btn-primary btn-xs source <?php echo $objet['student_id']; ?>"><i class="fa fa-check-circle-o"></i> Approuver </button>
                                                <?php
                                                  }
                                                ?>
                                              </td>
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

                              <div class="modal-body" style="height:550px; overflow:auto;">
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

                    $(".source").click(function() {
                      var $row = $(this).closest("tr");    // Find the row
                      var $text = $row.find(".student_id").text();

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


                      $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/finance/finalized/" + $text,
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
                  });

                  $(".revenir").click(function() {
                    var $row = $(this).closest("tr");
                    var $text = $row.find(".student_id").text();


                      new PNotify({
                          title: 'Undo',
                          type: 'warning',
                          text: 'L\'étudiant ' + $text + ' a été renvoyé chez le département académique.',
                          nonblock: {
                              nonblock: true,
                              nonblock_opacity: .2
                          }
                      });


                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url(); ?>" + "index.php/finance/undo/" + $text,
                          dataType: 'text',
                          data: {
                            approuved: 0
                          },
                          cache:false,
                          success:
                              function(data){
                                console.log(data);
                              }
                        });
                    });
                  </script>
