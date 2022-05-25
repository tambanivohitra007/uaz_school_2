<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $this->lang->line('user_profile'); ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $this->lang->line('user_report'); ?></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo   $path= base_url() . 'assets/id_card/' . $student->student_id . '.jpg'; ?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $student->student_nom . ' ' . $student->student_prenom; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $student->student_adresse; ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $student->etude_envisage; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <?php echo $student->student_id; ?>
                        </li>
                      </ul>

                      <a class="btn btn-success disabled"><i class="fa fa-edit m-right-xs"></i><?php echo $this->lang->line('edit'); ?></a>
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2><?php echo $this->lang->line('activity'); ?></h2>
                        </div>
                        <div class="col-md-6">

                        </div>
                      </div>


                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('recap'); ?></a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?php echo $this->lang->line('cours'); ?></a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><?php echo $this->lang->line('profile'); ?></a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages list-unstyled">

                              <?php

                              $note = 0;
                              $credit = 0;
                                foreach ($summary as $value) {

                                  $note += $value['total_note'];
                                  $credit += $value['total_credit'];

                                  $cours_reussi = $this->db->query('select count(id_cours) as isa from std_inscription where student_id = ' . $student->student_id . ' and session_id = ' . $value["session_id"] . ' and grade >= 10')->row();

                                  $cours_a_refaire = $this->db->query('select count(id_cours) as isa from std_inscription where student_id = ' . $student->student_id . ' and session_id = ' . $value["session_id"] . ' and grade < 10')->row();

                                  $majeur = $this->db->query('select sum(grade*credit)/sum(credit) as moyenne_majeur from std_inscription where student_id = ' . $student->student_id . ' and session_id = ' . $value["session_id"] . ' and grade >= 10 and cours_category = 1')->row();

                                  echo '<li>
                                    <div class="message_wrapper">
                                      <h4 class="heading">' . $value['session'] . '</h4>
                                      <blockquote class="message"><strong>' . $this->lang->line('total_credit') . ':</strong> ' . $value['total_credit'] . ' </blockquote>
                                      <blockquote class="message"><strong> ' . $this->lang->line('gpa_sem') . ':</strong> ' . number_format($value['moyenne_sem'] , 2) . '</blockquote>
                                      <blockquote class="message"><strong> ' . $this->lang->line('gpa_maj') . ':</strong>: ' . number_format($majeur->moyenne_majeur, 2) . '</blockquote>
                                      <blockquote class="message"><strong> ' . $this->lang->line('nb_cours_r') . ':</strong>: ' . $cours_reussi->isa . '</blockquote>
                                      <blockquote class="message"><strong> ' . $this->lang->line('nb_cours_a_r') . ':</strong>: ' . $cours_a_refaire->isa . '</blockquote>
                                      <br />
                                      <span class="label label-warning" style="font-size: 16px;font-weight:bold">' . $this->lang->line('gpa_cumul') . ': ' . number_format($note / $credit, 2) . '</span>

                                    </div>
                                  </li>';
                                }



                               ?>


                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table id="cours_table" style="width:100%" class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Sigle: Titre</th>
                                  <th>Crédit</th>
                                  <th>Note</th>
                                  <th>Catégorie</th>
                                  <th>Session</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th>Sigle: Titre</th>
                                  <th>Crédit</th>
                                  <th>Note</th>
                                  <th>Catégorie</th>
                                  <th>Session</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <?php

                                  // foreach ($student_course as $key => $value) {
                                  //   $label = $value['cours_category'] == 0 ? 'warning' : 'success';
                                  //   $category = $value['cours_category'] == 0 ? 'général' : 'majeur';
                                  //
                                  //   // echo $value['semester'] . ' ' . $value['year'];
                                  //
                                  //   echo '<tr>
                                  //     <td>' . $value['id_cours'] . '</td>
                                  //     <td>' . $value['Sigle'] . ': ' . $value['title_cours']  . '</td>
                                  //     <td>' . $value['credit'] . '</td>
                                  //     <td>' . $value['grade'] . '</td>
                                  //     <td><span class="label label-' . $label . '">' . $category . '</span></td>
                                  //   </tr>';
                                  // }

                                  ?>


                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="table table-hover">
                              <tr>
                                <td><strong><?php echo $this->lang->line('nom'); ?>: </strong> </td>
                                <td> <?php echo $student->student_nom . ', ' . $student->student_prenom ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('sex'); ?>: </strong> </td>
                                <td>
                                  <?php
                                    ($student->sex == 1) ? $gendre = 'Masculin' : $gendre = 'Féminin';
                                    echo $gendre;
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('department'); ?>: </strong> </td>
                                <td> <?php echo $student->etude_envisage ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('birth'); ?>: </strong> </td>
                                <td> <?php echo $student->dateNaissance . ' à ' . $student->lieuNaissance ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('address'); ?>: </strong> </td>
                                <td> <?php echo $student->student_adresse ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('tel'); ?>: </strong> </td>
                                <td> <?php echo $student->student_tel ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('religion'); ?>: </strong> </td>
                                <td> <?php echo $student->religion ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('residence'); ?>: </strong> </td>
                                <td>
                                  <?php
                                    ($student->externe == 0) ? $emp = 'Interne' : $emp = 'Externe';
                                    echo $emp;
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('nationality'); ?>: </strong> </td>
                                <td> <?php echo $student->nationalite ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('status'); ?>: </strong> </td>
                                <td>
                                  <?php
                                    switch ($student->etat_civil) {
                                      case 0:
                                        $etat = $this->lang->line('single');
                                        break;
                                      case 1:
                                        $etat = $this->lang->line('maried');
                                        break;
                                      case 2:
                                        $etat = $this->lang->line('widow');
                                      case 3:
                                        $etat = $this->lang->line('divorced');
                                      default:
                                        break;
                                    }
                                    echo $etat;
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('spouse'); ?>: </strong> </td>
                                <td> <?php echo $student->nom_conjoint ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('children_name'); ?>: </strong> </td>
                                <td> <?php echo $student->nb_enfant ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('father_name'); ?>: </strong> </td>
                                <td> <?php echo $student->father_name ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('father_prof'); ?>: </strong> </td>
                                <td> <?php echo $student->father_prof ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('mother_name'); ?>: </strong> </td>
                                <td> <?php echo $student->mother_name ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('mother_prof'); ?>: </strong> </td>
                                <td> <?php echo $student->mother_prof ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('parent_adress'); ?>: </strong> </td>
                                <td> <?php echo $student->parent_adresse ?> </td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $this->lang->line('parent_tel'); ?>: </strong> </td>
                                <td> <?php echo $student->parent_tel ?> </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script type="text/javascript">

            var data = '<?php echo base_url('departement/data_course/') . '/' . $student->student_id; ?>';
            // console.log(data);
              $(document).ready(function() {
                $('#cours_table').DataTable( {
                  "ajax": data,
                  'iDisplayLength': 10,
                  "sPaginationType": "full_numbers",
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
                    },
                  // deferRender:    true,
                  // scrollCollapse: true,
                  // scroller:       true,
                  // stateSave:      true,
                  columns : [
                    { data: 'id_cours' },
                    { data: 'title' },
                    { data: 'credit' },
                    { data: 'grade' },
                    { data: 'category' },
                    { data: 'session_name' }
                  ],
                  order: [[5, 'asc']],
                  rowGroup: {
                    dataSrc: 'session_name'
                  },
                  columnDefs: [
                      {
                          "targets": [ 5 ],
                          "visible": false,
                          "searchable": false
                      }
                  ]
                } );
              } );
          </script>
