<div id="step-3">



    <div class="x_content">

        <div class="col-xs-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#home" data-toggle="tab">Détail financières</a>
                </li>
                <li><a href="#profile" data-toggle="tab">Mode de paiement</a>
                </li>
            </ul>
        </div>

        <div class="col-xs-10">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <p class="lead">Détail Financières</p>
                    <table id="tableFinance" class="table table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th> Détail </th>
                          <th> Montant (Ar) </th>
                          <th> Remarque </th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr class="total">
                          <th> <strong>TOTAL</strong>  </th>
                          <th id="totalTuition" width="15%"> Montant (Ar) </th>
                          <th> A payer </th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->detail;?></td>
                          <td id="credit"><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->detail;?></td>
                          <td id="concours"><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->detail;?></td>
                          <td id="inscription"><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->detail;?></td>
                          <td id="admission"><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->detail;?></td>
                          <td id="yearbook"><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'Assurance'))->row()->detail;?></td>
                          <td id="test"><?php echo $this->db->get_where('fee_struct' , array('type' =>'Assurance'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'Assurance'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->detail;?></td>
                          <td id="voyage_etude"><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->detail;?></td>
                          <td id="dortoir"><?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->detail;?></td>
                          <td id="refectoire"><?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->detail;?></td>
                          <td id="depot"><?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->detail;?></td>
                          <td id="frais_generaux"><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->detail;?></td>
                          <td id="frais_graduation"><?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->montant;?></td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->detail;?></td>
                          <td id="lab_info">0</td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->detail;?></td>
                          <td id="lab_langue">0</td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->detail;?></td>
                          <td id="retard">0</td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->detail;?></td>
                          <td id="medical">0</td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->remarque;?></td>
                        </tr>

                        <tr>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'soutenance'))->row()->detail;?></td>
                          <td id="soutenance">0</td>
                          <td><?php echo $this->db->get_where('fee_struct' , array('type' =>'soutenance'))->row()->remarque;?></td>
                        </tr>

                      </tbody>
                    </table>
                    <br><br>
                </div>
                <div class="tab-pane" id="profile">

                  <p class="lead">Mode de Paiement</p>
                  <br>
                  <div class="form-group">

                      <table class="table jambo_table" cellspacing="0">
                        <thead>
                          <tr>
                            <th width="5%"> Selection </th>
                            <th width="15%"> Mode de Paiement </th>
                            <th> Description </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php

                          //function to convert the date from finance_plan
                            function convertToDate($type){

                              $ci =& get_instance();
                              $date = DateTime::createFromFormat('Y-m-d', $ci->db->get_where('finance_plan' , array('type' => $type))->row()->payment);
                              $mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août",
                                      "Septembre", "Octobre", "Novembre", "Décembre");

                              // on extrait la date du jour
                              list($jour, $mois, $annee) = explode('-', $date->format('d-m-Y'));

                              return $jour . ' ' . $mois_fr[intval($mois)] . ', ' . $annee;
                            }

                          ?>
                          <tr>
                            <!-- if 100% payed -->
                            <th><input type="radio" class="flat" checked name="plan" value="A"></th>
                            <th>Plan A - 100% </th>
                            <th>A payer avant le <span class="red"><?php echo convertToDate('TYPE_A');?></span> </th>
                          </tr>
                          <tr>
                            <!-- if 75% and 25% plan -->
                            <th><input type="radio" class="flat" name="plan" value="B"></th>
                            <th>Plan B - 75% - 25%</th>
                            <th>75% à payer avant le <span class="red"><?php echo convertToDate('TYPE_B_1');?></span><br> 25% à payer avant le <span class="red"><?php echo convertToDate('TYPE_B_2');?></span></th>
                          </tr>
                          <tr>
                            <!-- if 50% and 50% plan -->
                            <th><input type="radio" class="flat" name="plan" value="C"></th>
                            <th>Plan C - 50% - 50% </th>
                            <th>50% à payer avant le <span class="red"><?php echo convertToDate('TYPE_C_1');?></span> <br> 50% avant <span class="red"><?php echo convertToDate('TYPE_C_2');?></span></th>
                          </tr>
                          <tr>
                            <!-- if 40% - 30% and 30% plan -->
                            <th><input type="radio" class="flat" name="plan" value="D"></th>
                            <th>Plan D - 40% - 30% - 30%</th>
                            <th>40% à payer avant le <span class="red"><?php echo convertToDate('TYPE_D_1');?></span><br> 30% à payer avant le <span class="red"><?php echo convertToDate('TYPE_D_2');?></span> <br> et 30% à payer
                            avant le <span class="red"><?php echo convertToDate('TYPE_D_3');?></span></th>
                          </tr>
                          <tr>
                            <!-- if plan is divided by 4 -->
                            <th><input type="radio" class="flat" name="plan" value="E"></th>
                            <th>Plan E - 25% - 25% - 25% - 25%</th>
                            <th>25% à payer avant le <span class="red"><?php echo convertToDate('TYPE_E_1');?></span> <br> la deuxième tranche (25%) à payer avant le <span class="red"><?php echo convertToDate('TYPE_E_2');?></span>
                            <br> la troisième tranche (25%) à payer avant le <span class="red"><?php echo convertToDate('TYPE_E_3');?></span> <br> Et la quatrième tranche (25%) à payer avant le <span class="red"><?php echo convertToDate('TYPE_E_4');?></span></th>
                          </tr>
                          <!-- <tr> -->
                            <!-- otherwise, have to make negociation -->
                            <!-- <th><input type="radio" class="flat" name="plan" value="F"></th>
                            <th>Plan F - NEGOCIATION </th>
                            <th>Avec le trésorier</th>
                          </tr> -->
                        </tbody>
                      </table>

                  </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </div>

</div>


<script type="text/javascript">

  //declaration des variables à utiliser pour calculer les montants à payer

  var semesterID = <?php echo $semesterIDFromSession;?>;
  var ecolage = <?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->semestre;?>;
  var concours = <?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()->semestre;?>;
  var inscription = <?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()->semestre;?>;
  var admission = <?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->semestre;?>;
  var yearbook = <?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->semestre;?>;
  var assurance = <?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->semestre;?>;
  var voyage_etude = <?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()->semestre;?>;
  var frais_generaux = <?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()->semestre;?>;
  var dormitory = <?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()->semestre;?>;
  var cafetariat = <?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()->semestre;?>;
  var graduation = <?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->semestre;?>;
  var lab_info = <?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->semestre;?>;
  var lab_langue = <?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->semestre;?>;
  var depot = static_depot = <?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->semestre;?>;
  var medical = static_medical = <?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()->semestre;?>;
  var soutenance = <?php echo $this->db->get_where('fee_struct' , array('type' =>'soutenance'))->row()->semestre;?>;

  var admission_montant = <?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;?>;
  var yearbook_montant = <?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;?>;
  var assurance_montant = 0;
  var depot_montant = <?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;?>;
  var retard_montant = <?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->montant;?>;

  var fee_new_student_externe = admission_montant + yearbook_montant + assurance_montant;
  var fee_new_student_interne = admission_montant + yearbook_montant + assurance_montant + depot_montant;

  //objects used for payement
  var plan_A = {
    type_A: "<?php echo convertToDate('TYPE_A');?>"
  };
  var plan_B = {
    TYPE_B_1: "<?php echo convertToDate('TYPE_B_1');?>",
    TYPE_B_2: "<?php echo convertToDate('TYPE_B_2');?>"
  };
  var plan_C = {
    TYPE_C_1: "<?php echo convertToDate('TYPE_C_1');?>",
    TYPE_C_2: "<?php echo convertToDate('TYPE_C_2');?>"
  };
  var plan_D = {
    TYPE_D_1: "<?php echo convertToDate('TYPE_D_1');?>",
    TYPE_D_2: "<?php echo convertToDate('TYPE_D_2');?>",
    TYPE_D_3: "<?php echo convertToDate('TYPE_D_3');?>"
  };
  var plan_E = {
    TYPE_E_1: "<?php echo convertToDate('TYPE_E_1');?>",
    TYPE_E_2: "<?php echo convertToDate('TYPE_E_2');?>",
    TYPE_E_3: "<?php echo convertToDate('TYPE_E_3');?>",
    TYPE_E_4: "<?php echo convertToDate('TYPE_E_4');?>"
  };

  //count labs
  var count_lab_info = 0;
  var count_lab_langue = 0;

  if (ecolage != semesterID && ecolage != 3) ecolage = 0;
  else ecolage  = <?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()-> montant;?>;

  if (concours != semesterID && concours != 4) concours = 0;
  else concours = <?php echo $this->db->get_where('fee_struct' , array('type' =>'entrance_fee'))->row()-> montant;?>;

  if (inscription != semesterID && inscription != 3) inscription = 0;
  else inscription = <?php echo $this->db->get_where('fee_struct' , array('type' =>'submission_fee'))->row()-> montant;?>;

  if (admission != semesterID && admission != 1) admission = 0;
  else admission = <?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()-> montant;?>;

  if (yearbook != semesterID) yearbook = 0;
  else yearbook = <?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()-> montant;?>;

  if (assurance == semesterID) assurance = 0;
  else assurance = <?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()-> montant;?>;

  if (voyage_etude != semesterID) voyage_etude = 0;
  else voyage_etude = <?php echo $this->db->get_where('fee_struct' , array('type' =>'field_trip'))->row()-> montant;?>;

  if (frais_generaux != semesterID && frais_generaux != 3) frais_generaux = 0;
  else frais_generaux = <?php echo $this->db->get_where('fee_struct' , array('type' =>'general_fee'))->row()-> montant;?>;

  if (dormitory != semesterID && dormitory != 3) dormitory = 0;
  else dormitory = <?php echo $this->db->get_where('fee_struct' , array('type' =>'dortoir'))->row()-> montant;?>;

  if (cafetariat != semesterID && cafetariat != 3) cafetariat = 0;
  else cafetariat = <?php echo $this->db->get_where('fee_struct' , array('type' =>'cafetariat'))->row()-> montant;?>;

  if (graduation != semesterID && graduation != 2) graduation = 0;
  else graduation = <?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()-> montant;?>;

  if (lab_info != semesterID && lab_info != 3) lab_info = 0;
  else lab_info = <?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()-> montant;?>;

  if (lab_langue != semesterID && lab_langue != 3) lab_langue = 0;
  else lab_langue = <?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()-> montant;?>;

  if (medical != semesterID && medical != 1) medical = 0;
  else medical = <?php echo $this->db->get_where('fee_struct' , array('type' =>'medical'))->row()-> montant;?>;

  if (soutenance != semesterID && soutenance != 2) soutenance = 0;
  else soutenance = <?php echo $this->db->get_where('fee_struct' , array('type' =>'soutenance'))->row()-> montant;?>;

  if (depot != semesterID) depot = 0;
  else depot = <?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()-> montant;?>;

  // var _depot = <?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()-> montant;?>;
  var _graduation_fee = <?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()-> montant;?>;
</script>
