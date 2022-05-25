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

                      $file = base_url() . 'index.php/finance/update_profile';
                      echo form_open( $file, array('target'=>'_top' , 'enctype' => 'multipart/form-data'));
                     ?>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="head" name="head_id" class="form-control col-md-7 col-xs-12" readonly=""
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

                        $file = base_url() . 'index.php/finance/update_profile';
                        echo form_open( $file);
                       ?>
                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Mot de passe courant:
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                               <input type="password" id="current_password"required="required"  name="current_password" class="form-control col-md-7 col-xs-12">
                           </div>
                       </div>
                       <div class="form-group has-feedback">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">Nouveau mot de passe: <span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                             <input type="password" id="new_password" required="required" name="new_password" class="form-control col-md-7 col-xs-12" autofocus="">
                         </div>
                       </div>

                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirmation du mot de passe:
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
                               <input type="password" id="confirm_password" name="confirm_password" class="form-control col-md-7 col-xs-12">
                           </div>
                       </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-warning" name="update">Mettre à jour le mot de passe</button>
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


<script>
  // assumes you're using jQuery
  $(document).ready(function() {
  <?php if($this->session->flashdata('flash_message')){ ?>
    new PNotify({
      type: 'success',
      title: 'Information',
      text: 'Les données ont été mis à jour avec success',
      nonblock: {
        nonblock: true,
        nonblock_opacity: .2
    }
    });
  });
  <?php } ?>
</script>
