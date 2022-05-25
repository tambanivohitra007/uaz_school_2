<!-- page content -->
  <div class="" role="main">
      <div class="">

          <div class="clearfix"></div>

          <div class="row">

              <div class="col-md-3 col-sm-3 col-xs-12">

                <hr>

                  <div class="form-group">

                    <div id="avatar-view" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                      <?php
                        $path= base_url() . 'assets/images/id_card/' . $student->student_id . '.jpg';
                        if (file_exists($path)){
                      ?>
                      <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar">
                      <?php
                        } else {
                      ?>
                      <img src= "<?php echo base_url() . "assets/images/id_card/" . $student->student_id . '.jpg' ?>" alt="Avatar">
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                  <br>
              </div>

              <div class="col-md-9 col-sm-9 col-xs-12">
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
                </table>
              </div>

              <br>
              </div>
              </div>
              <div class="form-group">
                <h3>Détail et Mode de paiement</h3>
              </div>
              <br>

              <div class="form-group col-md-12 col-sm-12 col-xs-12">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Information financière</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Modification</a>
                          </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <table id="tableFinance" class="table table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th> Détail </th>
                                  <th> Montant (Ar) </th>
                                  <th> Remarque </th>
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
                                            ($finance->graduated * $graduation) + ($retard * $finance->retard);
                                          else
                                          echo $finance->total_payment + ($finance->total_credit * $ecolage) +
                                          ($finance->lab_info * $lab_info ) + ($finance->lab_langue * $lab_langue) +
                                          ($finance->graduated * $graduation) + ($retard * $finance->retard);
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
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <div class="form-group">
                              <label class="mode col-md-6"><strong>choisir le mode de paiement: </strong></label>

                              <div class="user">
                                <select class="select2_group form-control col-md-6" name="mode_payment" id="mode_payment" onchange="myFunction()">
                                  <option value="A">PLAN A - 100%</option>
                                  <option value="B">PLAN B - 75%, 25%</option>
                                  <option value="C">PLAN C - 50%, 50%</option>
                                  <option value="D">PLAN D - 40%, 30%, 30%</option>
                                  <option value="E">PLAN E - 25%, 25%, 25%, 25%</option>
                                  <option value="F">PLAN F - Négociation</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="form-group col-md-6">
                                <label for="">Date du Paiement 1</label>
                                <input type="text" class="form-control" id="datepicker" placeholder="">
                                <label for="">montant 1</label>
                                <input type="text" class="form-control" id="montant1" placeholder="">
                              </div>
                            </div>

                             <div class="form-group">
                               <div class="form-group col-md-6">
                                 <label for="">Date du Paiement 2</label>
                                 <input type="text" class="form-control" id="datepicker2" placeholder="">
                                 <label for="">montant 2</label>
                                 <input type="text" class="form-control" id="montant2" placeholder="">
                               </div>
                             </div>

                             <div class="form-group">
                               <div class="form-group col-md-6">
                                 <label for="">Date du Paiement 3</label>
                                 <input type="text" class="form-control" id="datepicker3" placeholder="">
                                 <label for="">montant 3</label>
                                 <input type="text" class="form-control" id="montant3" placeholder="">
                               </div>
                             </div>

                             <div class="form-group">
                               <div class="form-group col-md-6">
                                 <label for="">Date du Paiement 4</label>
                                 <input type="text" class="form-control" id="datepicker4" placeholder="">
                                 <label for="">montant 4</label>
                                 <input type="text" class="form-control" id="montant4" placeholder="">
                               </div>
                             </div>


                            <script type="text/javascript">

                            </script>

                          </div>
                      </div>
                  </div>

              </div>

              <?php }; ?>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="modal-footer">
                  <div class="btn-group">
                    <button type="button" onclick="updated();" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer les modifications</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>

              <br />
              <br />
              <br />

          </div>
      </div>

      </div>
      <!-- /page content -->
      <!-- Datatables -->
      <script src="<?php echo base_url();?>assets/js/datatables/js/jquery.dataTables.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatable.hack.js"></script>

      <script type="text/javascript">

        function updated(){


          $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/finance/updateFinance",
            dataType: 'text',
            data: {
              student_id: '<?php echo $student->student_id; ?>',
              plan: $('#mode_payment').val(),
              date_payment_1: $('#datepicker').val(),
              date_payment_2: $('#datepicker2').val(),
              date_payment_3: $('#datepicker3').val(),
              date_payment_4: $('#datepicker4').val(),
              date_payment_5: $('#datepicker5').val(),
              amount_pay_1: $('#montant1').val(),
              amount_pay_2: $('#montant2').val(),
              amount_pay_3: $('#montant3').val(),
              amount_pay_4: $('#montant4').val()
            },
            cache:false,
            success:
                function(data){
                  console.log(data);
                }
          });

          window.location = "<?php echo base_url(); ?>" + "index.php/finance/dashboard";
        }
      </script>

      <!-- select2 -->
        <script src="<?php echo base_url();?>assets/js/select/select2.full.js"></script>
        <script type="text/javascript">

          var _total = $('#payment').val();

          $(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker2" ).datepicker();
            $( "#datepicker3" ).datepicker();
            $( "#datepicker4" ).datepicker();
            $( "#datepicker5" ).datepicker();
          });

          function myFunction() {
            if(document.getElementById('mode_payment').value == "A") { //100%
               $("#datepicker").datepicker('setDate', '04/22/2016');
               $("#datepicker2").datepicker('setDate', '');
               $("#datepicker3").datepicker('setDate', '');
               $("#datepicker4").datepicker('setDate', '');

               //pour chaque montant
               $('#montant1').val(5620000);
            }
            if(document.getElementById('mode_payment').value == "B") { //75%, 25%
                $("#datepicker").datepicker('setDate', '04/22/2016');
                $("#datepicker2").datepicker('setDate', '07/1/2016');
                $("#datepicker3").datepicker('setDate', '');
                $("#datepicker4").datepicker('setDate', '');
            }
            if(document.getElementById('mode_payment').value == "C") { //50%, 50%
                $("#datepicker").datepicker('setDate', '04/22/2016');
                $("#datepicker2").datepicker('setDate', '05/20/2016');
                $("#datepicker3").datepicker('setDate', '');
                $("#datepicker4").datepicker('setDate', '');
            }
            if(document.getElementById('mode_payment').value == "D") { //40%, 30%, 30%
                $("#datepicker").datepicker('setDate', '04/22/2016');
                $("#datepicker2").datepicker('setDate', '05/20/2016');
                $("#datepicker3").datepicker('setDate', '07/1/2016');
                $("#datepicker4").datepicker('setDate', '');
            }
            if(document.getElementById('mode_payment').value == "E") { //25%, 25%, 25%, 25%
                $("#datepicker").datepicker('setDate', '04/22/2016');
                $("#datepicker2").datepicker('setDate', '05/13/2016');
                $("#datepicker3").datepicker('setDate', '06/10/2016');
                $("#datepicker4").datepicker('setDate', '07/1/2016');
            }
          }
        </script>
