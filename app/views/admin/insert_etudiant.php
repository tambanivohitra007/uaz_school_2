<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="">
      <div class="x_panel form-horizontal form-label-left">

        <ul class="nav navbar-left">
          <a class="btn btn-default" href= "<?php echo base_url() ?>index.php/admin/liste">
            <i class="fa fa-chevron-circle-left"> </i> Retour
          </a>
        </ul>

        <div class="clearfix"></div>

        <div class="x_title">
          <h2>Ajout de nouvel étudiant</small></h2>
          <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>


        <div class="x_content">

          <?php
          $file = base_url() . 'index.php/admin/insert_etudiant';
          echo form_open( $file, array('target'=>'_top' , 'enctype' => 'multipart/form-data'));
          ?>

          <div class="form-group">
           <label lass="control-label col-md-3 col-sm-3 col-xs-12" for="Image"></label>
           <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"></div>
           <div class="avatar-view col-md-3 col-sm-3 col-xs-12 form-group" title="Change the avatar">

             <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar" id="blah">
           </div>
          </div>

          <!-- changer profile -->
          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permission"><span class="required"></span>
           </label>

           <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
           <div class="fileUpload btn btn-primary btn-sm">
               <span>Changer Profile</span>
               <input type="file" name="userfile" accept="image/jpg" class="upload"  id="imgInp">
           </div>
          </div>

          <!-- Etude -->
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etude_envisage">Etude envisagé: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" id="etude_envisage" name="etude_envisage">
                      <option>Choisir</option>
                      <option value="1">Théologie</option>
                      <option value="2">Gestion</option>
                      <option value="3">Informatique</option>
                      <option value="4">Sciences infirmières</option>
                      <option value="5">Education</option>
                      <option value="6">Langue</option>
                      <option value="7">Institut de langue</option>
                  </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" id="etude_option" name="etude_option" class="form-control col-md-7 col-xs-12" placeholder="Options" >
              </div>
          </div>

          <script type="text/javascript">
            $(document).ready( function ()
            {
              /* we are assigning change event handler for select box */
            	/* it will run when selectbox options are changed */
            	$('#etude_envisage').change(function()
            	{
            		/* setting currently changed option value to option variable */
            		var option;
                // switch ($('#etude_envisage').val()) {
                //   case 1: option = '<?php echo $last_insert_id[0]['student_id'] + 1; ?>'; break;
                //   case 2: option = '<?php echo $last_insert_id[1]['student_id'] + 1; ?>'; break;
                //   case 3: option = '<?php echo $last_insert_id[2]['student_id'] + 1; ?>'; break;
                //   case 4: option = '<?php echo $last_insert_id[3]['student_id'] + 1; ?>'; break;
                //   case 6: option = '<?php echo $last_insert_id[4]['student_id'] + 1; ?>'; break;
                //   default:
                //
                // }

                if ($('#etude_envisage').val() == 1) option = '<?php echo $last_insert_id[0]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 2) option = '<?php echo $last_insert_id[1]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 3) option = '<?php echo $last_insert_id[2]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 4) option = '<?php echo $last_insert_id[3]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 5) option = '<?php echo $last_insert_id[4]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 6) option = '<?php echo $last_insert_id[5]['student_id'] + 1; ?>';
                else if ($('#etude_envisage').val() == 7) option = '<?php echo $last_insert_id[5]['student_id'] + 1; ?>';
            		/* setting input box value to selected option value */
            		$('#student_id').val(option);
            	});
            });
          </script>
          <!-- identification -->
          <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Identification:
             </label>

             <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
               <input type="text" id="student_id" class="form-control has-feedback-left" name="student_id" placeholder="Identification">
               <span class="fa fa-arrow-circle-right form-control-feedback left" aria-hidden="true"></span>
             </div>
          </div>

          <!-- Nom et prenoms -->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_nom">Nom et Prénoms:
               </label>
               <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                 <input type="text" class="form-control has-feedback-left" id="student_nom" name="student_nom" placeholder="Votre Noms">
                 <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                 <input type="text" class="form-control has-feedback-left" id="student_prenom" name="student_prenom" placeholder="Votre Prénoms">
                 <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
               </div>
           </div>

           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender: </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <div id="gender" class="btn-group" data-toggle="buttons">
                       <label id="male" class="btn btn-default active"  data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                           <input type="radio" name="sex" value="Masculin" > &nbsp; Masculin &nbsp;
                       </label>
                       <label id="female" class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                           <input type="radio" name="sex" value="Féminin" > Féminin
                       </label>
                   </div>
               </div>
           </div>

           <!-- address -->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_adresse">Adresse: <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="text" id="student_adresse" name="student_adresse" required="required" class="form-control col-md-7 col-xs-12" placeholder="Votre Adresse" >
               </div>
           </div>


           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endroit">Endroit: <span class="required">*</span>
             </label>
             <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="radio">
                   <label>
                       <input type="radio" id="interne" name="endroit" class="flat" name="iCheck" checked="" value="0"> Interne
                   </label>
               </div>
               <div class="radio">
                   <label>
                       <input type="radio" id="externe" name="endroit" class="flat" name="iCheck"  accept=""> Externe
                   </label>
               </div>
             </div>
           </div>

           <!-- date et lieu de naissance -->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Date et Lieu de Naissance:
               </label>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input id="date_naissance" class="date-picker form-control has-feedback-left" type="date" name="dateNaissance" placeholder="Date de Naissance">
                   <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input id="lieu_naissance" type="text" name="lieuNaissance" class="form-control col-md-7 col-xs-12" placeholder="Lieu de Naissance">
               </div>
           </div>

           <!-- téléphone et religion -->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone et Religion: <span class="required">*</span>
               </label>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input id="student_tel" class="form-control has-feedback-left" required="required" type="text" placeholder="Téléphone" name="student_tel" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                   <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input id="religion" type="text" name="religion" class="form-control col-md-7 col-xs-12" placeholder="Religion">
               </div>
           </div>

           <!-- téléphone et religion -->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Etat civil:
               </label>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <select class="form-control" name="etat_civil" id="etat_civil">
                       <option>Choisir</option>
                       <option value="0">Célibaire</option>
                       <option value="1">Marié(e)</option>
                       <option value="2">Veuf(ves)</option>
                       <option value="3">Divorcé(e)</option>
                   </select>
               </div>
           </div>

           <!-- Nom du conjoint et nombre d'enfants-->
           <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom conjoint:
               </label>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input class="date-picker form-control has-feedback-left" id="nom_conjoint" type="text" name="nom_conjoint" placeholder="Nom et Prénoms du conjoint(e)">
                   <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                   <input type="number" id="nb_enfant" name="nbEnfant" min="0" max="10" class="form-control col-md-7 col-xs-12" placeholder="nombre d'enfants">
               </div>
           </div>
           <br>
           <hr>

           <!-- père -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Père:
             </label>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id = "father_name" name="father_name" class="form-control col-md-7 col-xs-12" placeholder="Nom du père">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="father_prof" name="father_prof" class="form-control col-md-7 col-xs-12" placeholder="Profession">
             </div>
           </div>

           <!-- mère -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Mère:
             </label>

             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="mother_name" name="mother_name" class="form-control col-md-7 col-xs-12" placeholder="Nom de la mère">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="mother_prof" name="mother_prof"  class="form-control col-md-7 col-xs-12" placeholder="Profession">
             </div>
           </div>

           <!-- Adresse et téléphone -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Adresse et Tel:
             </label>

             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="parent_adresse" name="parent_adresse" class="form-control col-md-7 col-xs-12" placeholder="Adresse">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="parent_tel" name="parent_tel" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="Téléphone" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                 <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
             </div>
           </div>

           <!-- Autre information -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationalité:
             </label>

             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="nationalite" name="nationalite" class="form-control col-md-7 col-xs-12" placeholder="Nationalité">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="pays_origine" name="pays_origine" class="form-control col-md-7 col-xs-12" placeholder="Pays d'origine">
             </div>
           </div>

           <!-- CIN INFO -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">CIN:
             </label>

             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="num_cin" name="num_cin" class="form-control col-md-7 col-xs-12" placeholder="Numéro CIN" data-inputmask="'mask' : '9999999999999999'">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="date" id="cin_date_delivre" name="cin_date"  class="date-picker form-control has-feedback-left" placeholder="Date de Délivrance" >
                 <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Région:
             </label>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="cin_region" name="cin_region"  class="form-control col-md-7 col-xs-12" placeholder="Région">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="num_visa" name="num_visa"  class="form-control col-md-7 col-xs-12" placeholder="Votre Numéro VISA">
             </div>

           </div>


           <br>
           <hr>
           <!-- Personne à contacter info -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du contact:</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="pers_contact_name" name="pers_contact_name" class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">adresse du contact:</label>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="pers_adresse" name="pers_contact_adresse" class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="pers_tel" name="pers_contact_tel" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="Téléphone" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                 <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
             </div>
           </div>

           <br>
           <hr>
           <!-- Sponsors -->
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du sponsors:</label>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="sponsor_nom" name="sponsor_nom"  class="form-control col-md-7 col-xs-12" placeholder=" Nom du sponsors">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text"  id="sponsor_prenom" name="sponsor_prenom" class="form-control col-md-7 col-xs-12" placeholder=" Prénoms du sponsors" >
             </div>
           </div>

           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">adresse du sponsors:</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="sponsor_adresse" name="sponsor_adresse"  class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter">
             </div>
           </div>

           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone du Sponsors:</label>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="sponsor_tel" name="sponsor_tel"  class="form-control col-md-7 col-xs-12" placeholder=" Téléphone"  data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="text" id="sponsor_dure_f" name="sponsor_duree"  class="form-control col-md-7 col-xs-12" placeholder=" Durée du financement">
             </div>
           </div>

           <div class="ln_solid"></div>
           <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                   <button type="submit" class="btn btn-success" name="submit">Enregistrer</button>
               </div>
           </div>

           <?php echo form_close(); ?>

        </div>

      </div>


    <div class="col-md-12 col-sm-12 col-xs-12">
    </div>

    <script type="text/javascript">
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>

    <script type="text/javascript">
      document.getElementById("imgInp").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
      };
    </script>
