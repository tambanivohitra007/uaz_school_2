<div class="right_col" role="main">
<div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h2>Administration <small> Profile</small></h2>

                  <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="form-horizontal form-label-left" id="profile">
                    <?php

                    foreach ($edit_data as $row) {

                      $file = base_url() . 'index.php/admin/update_profile/admin';
                      echo form_open( $file, array('target'=>'_top' , 'enctype' => 'multipart/form-data'));
                     ?>
                     <div class="form-group has-feedback">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullName">Nom: <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                           <input type="text" id="fullName" required="required" name="fullName" class="form-control col-md-7 col-xs-12" autofocus=""
                             value="<?php echo $row['fullName']; ?>">
                       </div>
                     </div>
                     <div class="form-group has-feedback">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Pseudo: <span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="username" required="required" name="username" class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['username']; ?>">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">email:
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                             <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['email']; ?>">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permission">Permission: <span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="number" id="permission" name="permission" required="required" class="form-control col-md-7 col-xs-12"
                               value="<?php echo $row['permission']; ?>">
                         </div>
                     </div>

                      <!-- Current avatar -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permission">Photo de profil: <span class="required">*</span>
                        </label>
                        <div class="avatar-profil col-md-3 col-sm-3 col-xs-12" title="Change the avatar">
                          <?php
                              echo '<img src="' . base_url() . 'assets/uploads/' . $row['username'] . '.jpg" alt="avatar-profil" id="blah">';

                          ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permission"><span class="required"></span>
                        </label>

                        <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                        <div class="fileUpload btn btn-primary btn-sm">
                            <span>Changer Profile</span>
                            <input type="file" name="userfile" accept="image/jpg" class="upload"  id="imgInp">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success" name="submit">Enregistrer</button>
                          </div>
                      </div>

                      <?php echo form_close();
                        # code...
                      }
                    ?>
                    </div>

              </div>
          </div>
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

<script type="text/javascript">
  document.getElementById("imgInp").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
  };
</script>
