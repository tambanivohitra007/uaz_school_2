<!-- page content -->
  <div class="" role="main" id="main">
      <div class="">

          <div class="clearfix"></div>

          <div class="row">

              <div class="col-md-4 col-sm-4 col-xs-12">

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
                  <table>
                    <tr>
                      <td><strong>ID: </strong> </td>
                      <td> <?php echo $student->student_id?> </td>
                    </tr>
                    <tr>
                      <td><strong>Nom: </strong> </td>
                      <td> <?php echo $student->student_nom?> </td>
                    </tr>
                    <tr>
                      <td><strong>Prénoms: </strong> </td>
                      <td> <?php echo $student->student_prenom?> </td>
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
                      <td><strong>Adresse: </strong> </td>
                      <td> <?php echo $student->student_adresse ?> </td>
                    </tr>
                  </table>
                  <hr>
              </div>

              <div class="col-md-8 col-sm-8 col-xs-12">


                <table class="display table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                        <th style="width: 40%"><h4>Information Personelle</h4></th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Date et lieu de Naissance: </strong> </td>
                      <td> <?php echo $student->dateNaissance . ' à ' . $student->lieuNaissance ?> </td>
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
                      <td><strong>Résidence: </strong> </td>
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

                  </tbody>
                </table>

                <br>


                <table class="display table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                        <th style="width: 40%"><h4>Parents</h4></th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Père: </strong> </td>
                      <td><?php echo $student->father_name; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Profession (Père): </strong> </td>
                      <td><?php echo $student->father_prof; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Mère: </strong> </td>
                      <td><?php echo $student->mother_name; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Profession (Mère): </strong> </td>
                      <td><?php echo $student->mother_prof; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Adresse des parents: </strong> </td>
                      <td><?php echo $student->parent_adresse; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone des parents: </strong> </td>
                      <td><?php echo $student->parent_tel; ?></td>
                    </tr>
                  </tbody>
                </table>

                <br>

                <table class="display table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                        <th style="width: 40%"><h4>Personne à contacter</h4></th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Nom de la Personne: </strong> </td>
                      <td><?php echo $student->pers_contact_name; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Adresse: </strong> </td>
                      <td><?php echo $student->pers_adresse; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone: </strong> </td>
                      <td><?php echo $student->pers_tel; ?></td>
                    </tr>
                  </tbody>
                </table>

                <br>

                <table class="display table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                        <th style="width: 40%"><h4>Sponsoring</h4></th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Nom du Sponsors: </strong> </td>
                      <td><?php echo $student->sponsor_nom . ', ' . $student->sponsor_prenom; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Adresse: </strong> </td>
                      <td><?php echo $student->sponsor_adresse; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone: </strong> </td>
                      <td><?php echo $student->sponsor_tel; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <br>
              </div>
              </div>
          </div>
          <hr>
          <button class="btn btn-primary pull-right" onclick='$("#main").print();'><i class="fa fa-print"></i> Imprimer information</button>
      </div>

      </div>
      <!-- /page content -->
      <!-- Datatables -->
      <script src="<?php echo base_url();?>assets/js/datatables/js/jquery.dataTables.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatable.hack.js"></script>
      <script type="text/JavaScript" src="<?php echo base_url();?>assets/js/jquery.print.js"></script>

      <script type="text/javascript">


        function printThis(){

        }
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
