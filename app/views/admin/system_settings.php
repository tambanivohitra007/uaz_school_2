<div class="right_col" role="main">
<div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h2>Administration <small> Panneau de configuration</small></h2>

                  <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <br />

                    <?php
                      $hidden = array(
                        'id' => "panneau",
                        'class' => "form-horizontal form-label-left"
                      );
                      $file = base_url() . 'index.php/admin/system_settings';
                      echo form_open( $file, $hidden);
                     ?>

                    <div class="form-group has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="system_name">Nom du système: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            <input type="text" id="system_name" required="required" name="system_name" class="form-control col-md-7 col-xs-12"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?>">
                        </div>
                    </div>

                      <div class="form-group has-feedback">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="system_title">Titre du système: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="fa fa-credit-card form-control-feedback right" aria-hidden="true"></span>
                              <input type="text" id="system_title" required="required" name="system_title" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adresse">Adresse: <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="fa fa-paperclip form-control-feedback right" aria-hidden="true"></span>
                              <input type="text" id="adresse" name="adresse" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $this->db->get_where('settings' , array('type' =>'adresse'))->row()->description;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_office">Téléphone du bureau: <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                              <input type="text" id="phone_office" name="phone_office" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $this->db->get_where('settings' , array('type' =>'phone_office'))->row()->description;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_mobile">Téléphone portable: <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                              <input type="text" id="phone_mobile" name="phone_mobile" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $this->db->get_where('settings' , array('type' =>'phone_mobile'))->row()->description;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email: <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                              <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $this->db->get_where('settings' , array('type' =>'email'))->row()->description;?>">
                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success" name="submit" id="update">Enregistrer</button>
                          </div>
                      </div>

                  <?php echo form_close(); ?>
              </div>
          </div>
      </div>
  </div>

  <script>
  // assumes you're using jQuery
  $('document').ready(function() {
  <?php if($this->session->flashdata('flash_message')){ ?>
    new PNotify({
      type: 'success',
    title: 'Information',
    text: '<?php echo $this->session->flashdata('flash_message'); ?>',
    nonblock: {
        nonblock: true,
        nonblock_opacity: .2
    }
    });
  });
  <?php } ?>
</script>
