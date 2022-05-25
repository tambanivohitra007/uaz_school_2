<!-- Large modal -->
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

            <div class="form-group">

              <div id="avatar-view" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                <?php
                  $path = base_url('assets/id_card/' . $student->student_id . '.jpg');
                  if (is_file($path)){
                ?>
                <img src= "<?php echo base_url("assets/images/profile.png");  ?>" alt="Avatar">
                <?php
                  } else {
                ?>
                <img src= "<?php echo $path; ?>" alt="Avatar">
                <?php
                  }
                ?>
              </div>
            </div>

        </div>

        <div class="col-md-9 col-sm-9 col-xs-12" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Information</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Cours</a>
                </li>
                <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Finance</a>
                </li> -->
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <table class="display table-striped responsive-utilities jambo_table">
                    <tr>
                      <td><strong>Nom et Prénoms: </strong> </td>
                      <td> <?php echo $student->student_nom . ', ' . $student->student_prenom ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Sexe: </strong> </td>
                      <td>
                        <?php
                          ($student->sex == 0) ? $gendre = 'Masculin' : $gendre = 'Féminin';
                          echo $gendre;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Faculté: </strong> </td>
                      <td> <?php echo $student->etude_envisage ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Date et lieu de Naissance: </strong> </td>
                      <td> <?php echo $student->dateNaissance . ' à ' . $student->lieuNaissance ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Adresse: </strong> </td>
                      <td> <?php echo $student->student_adresse ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone: </strong> </td>
                      <td> <?php echo $student->student_tel ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Religion: </strong> </td>
                      <td> <?php echo $student->religion ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Endroit: </strong> </td>
                      <td>
                        <?php
                          ($student->externe == 0) ? $emp = 'Interne' : $emp = 'Externe';
                          echo $emp;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Nationalité: </strong> </td>
                      <td> <?php echo $student->nationalite ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Etat civil: </strong> </td>
                      <td>
                        <?php
                          switch ($student->etat_civil) {
                            case 0:
                              $etat = 'Célibataire';
                              break;
                            case 1:
                              $etat = 'Marié(e)';
                              break;
                            case 2:
                              $etat = 'Veuf(ve)';
                            case 3:
                              $etat = 'Divorcé(e)';
                            default:
                              break;
                          }
                          echo $etat;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Noms du conjoint: </strong> </td>
                      <td> <?php echo $student->nom_conjoint ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Nombre d'enfants: </strong> </td>
                      <td> <?php echo $student->nb_enfant ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Noms du père: </strong> </td>
                      <td> <?php echo $student->father_name ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Profession du père: </strong> </td>
                      <td> <?php echo $student->father_prof ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Noms de la mère: </strong> </td>
                      <td> <?php echo $student->mother_name ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Profession de la mère: </strong> </td>
                      <td> <?php echo $student->mother_prof ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Adresse des parents: </strong> </td>
                      <td> <?php echo $student->parent_adresse ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone des parents: </strong> </td>
                      <td> <?php echo $student->parent_tel ?> </td>
                    </tr>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <!-- table2 -->
                  <table id="table_cours" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="headings">
                                <th>ID</th>
                                <th>SIGLE </th>
                                <th>Titre du cours </th>
                                <th>Crédits </th>
                                <th>Factulté </th>
                            </tr>
                        </thead>
                        <tfoot class="headings">
                          <tr>
                              <th>ID </th>
                              <th>SIGLE</th>
                              <th>TITRE</th>
                              <th>CREDITS</th>
                              <th>FACULTE</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php

                            foreach ($list  as $objet) {
                                echo '<tr>';
                                echo '<td>' . $objet['id_cours'] . '</td>';
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
                        <th> Détail </th>
                        <th> Montant (Ar) </th>
                        <th> Remarque </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($finance != null) { ?>
                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->detail;?></td>
                        <td id="credit"><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant * $finance->total_credit;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->detail;?></td>
                        <td id="concours"><?php if($finance->semester > 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->detail;?></td>
                        <td id="inscription"><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->detail;?></td>
                        <td id="admission"><?php if($finance->semester > 1  && $finance->new_student != 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->detail;?></td>
                        <td id="yearbook"><?php if($finance->semester > 1  && $finance->new_student != 1) echo '0'; else echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->detail;?></td>
                        <td id="assurance"><?php if($finance->semester > 1  && $finance->new_student != 1) echo '0'; else  echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->montant;?></td>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->remarque;?></td>
                      </tr>

                      <tr>
                        <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->detail;?></td>
                        <td id="voyage_etude"><?php if($finance->semester > 1) echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->montant; else echo '0';?></td>
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
                        <td id="depot"><?php if($finance->semester > 1  && $finance->new_student != 1 || $finance->residence == 1) echo '0'; else  echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;?></td>
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
  "language": {
      "lengthMenu": "Afficher _MENU_ enregistrements par page",
      "zeroRecords": "Rien trouvé - Désolé",
      "info": "Montrer page _PAGE_ sur _PAGES_",
      "infoEmpty": "Pas d'enregistrements disponible",
      "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
      "paginate": {
        "last": "Dernier",
        "first": "Premier",
        "previous": "Précédent",
        "next": "Suivant"
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
        total + ' crédits'
      );
  }
  });
});

</script>
