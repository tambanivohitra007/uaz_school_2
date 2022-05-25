<!-- Large modal -->
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

            <div class="form-group">

              <div id="avatar-view" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                <?php
                  $path= base_url() . 'assets/id_card/' . $student->student_id . '.jpg';

                  if (file_exists($path)){
                ?>
                <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar">
                <?php
                  } else {
                ?>
                <img src= "<?php echo base_url() . "assets/id_card/" . $student->student_id . '.jpg' ?>" alt="Avatar">
                <?php
                  }
                ?>
                <br>
              </div>
            </div>
            <ul class="list-unstyled user_data">
              <?php
                $total_credit = 0;
                $nb_credit = 0;
                  foreach ($list as $value) {
                    $nb_credit++;
                    $total_credit += $value['nb_crd'];
                  }
               ?>
              <li class="m-top-xs">
                Numéro matricule: <i class="fa fa-external-link user-profile-icon"></i>
                <?php echo $student->student_id; ?>
              </li>
              <li>Nombre de cours: <span class="label label-primary"><?php echo $nb_credit; ?></span> </li>
              <li>Total crédit: <span class="label label-warning"><?php echo $total_credit; ?></span> </li>
              <li></li>
            </ul>

        </div>

        <div class="col-md-9 col-sm-9 col-xs-12" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Information</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false"><?php echo $this->lang->line('course'); ?></a>
                </li>
                <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Finance</a>
                </li> -->
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <table class="display table-striped responsive-utilities jambo_table">
                    <tr>
                      <td><strong><?php echo $this->lang->line('nom'); ?>: </strong> </td>
                      <td> <?php echo $student->student_nom . ', ' . $student->student_prenom ?> </td>
                    </tr>
                    <tr>
                      <td><strong><?php echo $this->lang->line('sex'); ?>: </strong> </td>
                      <td>
                        <?php
                          ($student->sex == 0) ? $gendre = 'Masculin' : $gendre = 'Féminin';
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
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <!-- table2 -->
                  <table id="table_cours" class="display table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <!-- <th>ID</th> -->
                                <th><?php echo $this->lang->line('sigle'); ?> </th>
                                <th><?php echo $this->lang->line('title_course'); ?> </th>
                                <th><?php echo $this->lang->line('credit'); ?> </th>
                                <th><?php echo $this->lang->line('department'); ?> </th>
                            </tr>
                        </thead>
                        <tfoot class="headings">
                          <tr>
                            <!-- <th>ID</th> -->
                            <th><?php echo $this->lang->line('sigle'); ?> </th>
                            <th><?php echo $this->lang->line('title_course'); ?> </th>
                            <th><?php echo $this->lang->line('credit'); ?> </th>
                            <th><?php echo $this->lang->line('department'); ?> </th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php

                            foreach ($list  as $objet) {
                                echo '<tr>';
                                // echo '<td>' . $objet['id_cours'] . '</td>';
                                echo '<td>' . $objet['Sigle'] . '</td>';
                                echo '<td>' . $objet['title'] . '</td>';
                                echo '<td>' . $objet['nb_crd'] . '</td>';
                                echo '<td>' . $objet['dep_desc'] . '</td>';
                                echo '</tr>';
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <table id="tableFinance" class="table table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th> <?php echo $this->lang->line('detail'); ?> </th>
                        <th> <?php echo $this->lang->line('amount'); ?> (Ar) </th>
                        <th> <?php echo $this->lang->line('remark'); ?> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($finance != null) {
                        ?>
                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->detail;?></td>
                        <td id="credit"><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant * $finance->total_credit;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->detail;?></td>
                        <td id="concours"><?php if($finance->semester == 1 && $finance->new_student != 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->detail;?></td>
                        <td id="inscription"><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->detail;?></td>
                        <td id="admission"><?php if($finance->semester == 1 && $finance->new_student != 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->detail;?></td>
                        <td id="yearbook"><?php if($finance->semester > 1 && $finance->new_student != 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->detail;?></td>
                        <td id="assurance"><?php if($finance->semester > 1 && $finance->new_student != 1) echo '0'; else  echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->detail;?></td>
                        <td id="voyage_etude"><?php if($finance->semester == 1) echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->montant; else echo '0';?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->detail;?></td>
                        <td id="dortoir"><?php if($finance->residence == 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->detail;?></td>
                        <td id="refectoire"><?php if($finance->residence == 1) echo '0'; else  echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->detail;?></td>
                        <td id="depot"><?php if($finance->semester == 1 && $finance->new_student != 1 || $finance->residence == 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->detail;?></td>
                        <td id="frais_generaux"><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->detail;?></td>
                        <td id="frais_graduation"><?php if($finance->graduated != 1) echo '0'; else  echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->detail;?></td>
                        <td id="lab_info"><?php if($finance->lab_info > 0) echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->montant * $finance->lab_info; else echo '0';?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->detail;?></td>
                        <td id="lab_langue"><?php if($finance->lab_langue > 0) echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->montant * $finance->lab_langue; else echo '0';?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->detail;?></td>
                        <td id="retard"><?php if($finance->retard > 0) echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->montant * $finance->retard; else echo '0';?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->detail;?></td>
                        <td id="medical"><?php if($finance->semester == 1 && $finance->residence == 0) echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->montant; else echo '0';?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->remarque;?></td>
                      </tr>

                    </tbody>
                  </table>

                  <div class="col-md-9">
                      <form class="form-horizontal form-label-left">
                          <div class="form-group">
                              <label><strong>TOTAL A PAYER (en Ariary)</strong> </label>
                              <?php
                                $ecolage = $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant;
                                $lab_info = $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->montant;
                                $lab_langue = $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->montant;
                                $graduation = $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->montant;
                                $admission = $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;
                                $assurance = $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->montant;
                                $depot_dortoir = $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;
                                $yearbook = $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;
                                $retard = $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->montant;
                               ?>
                               <h3 id="payment" class="btn-danger payment">
                                 <?php
                                 if ($finance->residence == 0)
                                   echo $finance->total_payment + ($finance->total_credit * $ecolage) +
                                   ($finance->lab_info * $lab_info ) + ($finance->lab_langue * $lab_langue) +
                                   ($finance->graduated * $graduation) + (($admission + $assurance + $depot_dortoir + $yearbook) *
                                   $finance->new_student) + ($retard * $finance->retard);
                                 else
                                 echo $finance->total_payment + ($finance->total_credit * $ecolage) +
                                 ($finance->lab_info * $lab_info ) + ($finance->lab_langue * $lab_langue) +
                                 ($finance->graduated * $graduation) + (($admission + $assurance + $yearbook) *
                                 $finance->new_student) + ($retard * $finance->retard);
                                 ?>
                               </h3>
                          </div>
                          <div class="form-group">
                              <label><strong>MODE DE PAIEMENT</strong></label>
                                <h3 id="modePayment" class="btn-danger payment"><?php echo $finance->plan; ?></h3>
                          </div>

                          <div class="form-group">
                              <label><strong>DATE DE PAIEMENT</strong></label>
                                <h4 class="payment">1. <strong><span id="amount_pay_1"> <?php echo $finance->amount_pay_1; ?> </span> Ar</strong> Avant le: <strong><span id="datePayment"><?php echo $finance->date_payment_1; ?></span></strong></h4>
                                <h4 class="payment">2. <strong><span id="amount_pay_2"> <?php echo $finance->amount_pay_2; ?> </span> Ar</strong> Avant le: <strong><span id="datePayment2"><?php echo $finance->date_payment_2; ?></span></strong></h4>
                                <h4 class="payment">3. <strong><span id="amount_pay_3"> <?php echo $finance->amount_pay_3; ?> </span> Ar</strong> Avant le: <strong><span id="datePayment3"><?php echo $finance->date_payment_3; ?></span></strong></h4>
                                <h4 class="payment">4. <strong><span id="amount_pay_4"> <?php echo $finance->amount_pay_4; ?> </span> Ar</strong> Avant le: <strong><span id="datePayment4"><?php echo $finance->date_payment_4; ?></span></strong></h4>
                                <!-- <h4 class="payment">#5 <span id="amount_pay_5"> </span> Avant le: <strong><span id="datePayment5"></span></strong></h4> -->
                          </div>
                      </form>
                  </div>
                </div>

                <?php }; ?>
            </div>
        </div>

          <div class="col-md-9 col-sm-9 col-xs-12">

          </div>


<!-- finish large modal -->

<!-- Datatables -->
<script src= "<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatable.hack.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

$('#table_cours').DataTable({
  "paging": false,
  "searching": false,
  "info": false,
  "language": {
      "lengthMenu": "<?php echo $this->lang->line('length_menu'); ?>",
      "zeroRecords": "<?php echo $this->lang->line('zero_rec'); ?>",
      "info": "<?php echo $this->lang->line('info'); ?>",
      "infoEmpty": "<?php echo $this->lang->line('info_empty'); ?>",
      "infoFiltered": "<?php echo $this->lang->line('info_filtered'); ?>",
      "paginate": {
        "last": "<?php echo $this->lang->line('paginate_last'); ?>",
        "first": "<?php echo $this->lang->line('paginate_first'); ?>",
        "previous": "<?php echo $this->lang->line('paginate_prev'); ?>",
        "next": "<?php echo $this->lang->line('paginate_next'); ?>"
      }
  },

  "footerCallback": function (row, data, start, end, display){
    var api = this.api(), data;

    var intVal = function (i) {
      return typeof i === 'string' ?
        i.replace(/[\$,]/g, '')*1 :
        typeof i === 'number' ?
          i : 0;
    };

    // Total over all pages
  total = api.column( 3 ).data()
      .reduce( function (a, b) {
          return intVal(a) + intVal(b);
      }, 0 );

      $( api.column( 3 ).footer() ).html(
        total
      );
  }
  });
});

</script>
