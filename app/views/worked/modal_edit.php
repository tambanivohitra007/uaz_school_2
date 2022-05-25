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
                <h3>Work education</h3>
              </div>
              <br>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Worked prise par l'étudiant: </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <?php echo $std_worked[0]['work_ed'] ; ?>
                </div>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Selectionner worked: </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" id="selection">
                        <?php
                          echo '<option value="' . $std_worked[0]['work_ed'] . '">' . $this->db->get_where('work_education' , array('short_code' => $std_worked[0]['work_ed']))->row()->worked_desc . '</option>';
                          foreach ($listWorked as $value) {
                            echo '<option value=' . $value['short_code'] . '>' . $value['worked_desc'] . '</option>';
                          }
                         ?>
                    </select>
                </div>
              </div>
                <br><br><br><br>
              <div class="form-group">
                <div class="modal-footer">
                  <div class="btn-group">
                    <button type="button" onclick="updated();" class="btn btn-success">Enregistrer</button>
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
            url: "<?php echo base_url(); ?>" + "index.php/worked/updateWorked",
            dataType: 'text',
            data: {
              student_id: '<?php echo $student->student_id; ?>',
              worked: $('#selection').val()
            },
            cache:false,
            success:
                function(data){
                  console.log(data);
                }
          });

          window.location = "<?php echo base_url(); ?>" + "index.php/worked/dashboard";
        }
      </script>

      <!-- select2 -->
        <script src="<?php echo base_url();?>assets/js/select/select2.full.js"></script>
        <script type="text/javascript">
        </script>
