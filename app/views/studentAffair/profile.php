<?php

  include "/static/header.php";
  include "/static/menu.php";
  include "/static/top.php"

?>

<div class="right_col" role="main">
<div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- start x_panel -->
          <div class="x_panel">
              <div class="x_title">
                  <h2>Département <small> Profile</small></h2>

                  <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="form-horizontal form-label-left" id="profile">
                    <?php

                    foreach ($edit_data as $row) {

                      $file = base_url() . 'index.php/studentAffair/update_profile';
                      echo form_open( $file, array('target'=>'_top' , 'enctype' => 'multipart/form-data'));
                     ?>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="id" name="id" class="form-control col-md-7 col-xs-12" readonly="readonly"
                               value="<?php echo $row['head_id']; ?>">
                         </div>
                     </div>
                     <div class="form-group has-feedback">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="head_name">Nom: <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                           <input type="text" id="head_name" required="required" name="head_name" class="form-control col-md-7 col-xs-12" autofocus=""
                             value="<?php echo $row['head_name']; ?>">
                       </div>
                     </div>

                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">email:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['email']; ?>">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="position" name="position"  class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['position']; ?>">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="departement">Département:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-briefcase form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="departement" name="departement" class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['departement']; ?>">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permission">permission:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="number" id="permission" name="permission" class="form-control col-md-7 col-xs-12" disabled=""
                               value="<?php echo $row['permission']; ?>">
                         </div>
                     </div>
                      <!-- Current avatar -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo_de_profil">Photo de profil:
                        </label>
                        <div class="avatar-profil col-md-3 col-sm-3 col-xs-12" title="Change the avatar">
                          <?php
                              echo '<img src="' . base_url() . 'assets/uploads/head/' . $row['head_id'] . '.jpg" alt="avatar-profil" id="blah">';
                          ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="file" name="userfile" accept="image/*" value="Changer Profile"  id="imgInp">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-primary" name="enregistrer">Mettre à jour le Profile</button>
                          </div>
                      </div>
                      <?php echo form_close();
                      }
                    ?>
                    </div>
              </div>
          </div>

          <!-- end panel -->

          <!-- start x_panel -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Département <small> Mot de passe</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="form-horizontal form-label-left" id="profile">
                      <?php

                      foreach ($edit_data as $row) {

                        $file = base_url() . 'index.php/studentAffair/update_profile';
                        $attribute = array(
                          'id' => 'myForm',
                          'novalidate' => ''
                        );
                        echo form_open( $file, $attribute);
                       ?>
                       <!-- <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Mot de passe courant:
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                               <input type="password" id="current_password"required="required"  name="current_password" class="form-control col-md-7 col-xs-12">
                           </div>
                       </div> -->
                       <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Mot de passe courant:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" name="current_password" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>
                       <!-- <div class="form-group has-feedback">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">Nouveau mot de passe: <span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                             <input type="password" id="new_password" required="required" data-validate-length="6,8" name="new_password" class="form-control col-md-7 col-xs-12" autofocus="">
                         </div>
                       </div>

                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirmation du mot de passe:
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                               <input type="password" id="confirm_password" name="confirm_password" data-validate-linked="password" class="form-control col-md-7 col-xs-12">
                           </div>
                       </div> -->

                       <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password" type="password" name="new_password" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="confirm_password" type="password" name="confirm_password" data-validate-linked="new_password" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-warning" name="update" id="udpateq">Mettre à jour le mot de passe</button>
                            </div>
                        </div>
                        <?php echo form_close();
                        }
                      ?>
                      </div>
                </div>
            </div>

            <!-- end panel -->
      </div>
  </div>
  <!-- form validation -->
  <!-- <script src="<?php echo base_url();?>assets/js/custom.js"></script> -->
  <script src="<?php echo base_url();?>assets/js/validator/validator.js"></script>
  <script src="<?php echo base_url();?>assets/js/validator/additional-methods.js"></script>
<script type="text/javascript">
      $('form')
          .on('blur', 'input[required], input.optional, select.required', validator.checkField)
          .on('change', 'select.required', validator.checkField)
          .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required')
          .on('keyup blur', 'input', function () {
              validator.checkField.apply($(this).siblings().last()[0]);
          });

      $('form').submit(function (e) {
        e.preventDefault();
        var submit = true;
        var test = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });

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


<script>
  $(function () {
    var count = "<?php echo $this->session->flashdata('flash_message') ?>";

    if ( count == 1){
      new PNotify({ title: "Confirmation", type: "success", text: "Le mot de passe a été mis à jour avec succès!", nonblock: { nonblock: true } });
    }
    else if( count == 2) {
      new PNotify({ title: "Avertissement", type: "danger", text: "Désolé! Votre mot de passe est incorrecte!", nonblock: { nonblock: true } });
    }
  });
</script>

<?php  include "/static/footer.php" ?>
