<!-- page content -->
  <div class="" role="main">
      <div class="">

          <div class="clearfix"></div>

          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <h2><?php echo $student->student_nom; ?>  <small class="green"> -- <?php echo $student->student_id; ?>  </small></h2>



                <hr>
                  <div class="x_panel">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cours à Prendre</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                              <div class="x_title">

                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                      </li>

                                      <li><a href="#"><i class="fa fa-close"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div>


                              <div class="x_content">
                                  <table id="table1" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                                      <thead>
                                          <tr class="headings">
                                              <!-- <th>
                                                  CHECK
                                              </th> -->
                                              <th>ID </th>
                                              <th>SIGLE </th>
                                              <th>Titre du cours </th>
                                              <th>Crédits </th>
                                              <th>laboratoire </th>
                                              <th>Année </th>
                                              <th>Factulté </th>
                                          </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                            <!-- <th>ID </th> -->
                                            <th>ID</th>
                                            <th>SIGLE</th>
                                            <th>Titre du cours</th>
                                            <th>Crédits</th>
                                            <th>laboratoire </th>
                                            <th>Année </th>
                                            <th>Factulté</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>

                                        <?php

                                          foreach ($cours  as $objet) {
                                              echo '<tr>';
                                              echo '<td>' . $objet['id_cours'] . '</td>';
                                              echo '<td>' . $objet['Sigle'] . '</td>';
                                              echo '<td>' . $objet['title'] . '</td>';
                                              echo '<td>' . $objet['nb_crd'] . '</td>';
                                              echo '<td>' . $objet['lab'] . '</td>';
                                              echo '<td>' . $objet['yearlevel'] . '</td>';
                                              echo '<td>' . $objet['dep_desc'] . '</td>';
                                              echo '</tr>';
                                          }

                                        ?>
                                      </tbody>
                                  </table>
                                  <button id="RightMove" class="btn btn-primary">Prendre le(s) cours <span class="glyphicon glyphicon-share-alt"></span></button>
                                  <br>
                                  <br>
                                  <hr>
                                  <!-- table2 -->
                                  <table id="table2" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                                      <thead>
                                          <tr class="headings">
                                              <th>ID</th>
                                              <th>SIGLE </th>
                                              <th>Titre du cours </th>
                                              <th>Crédits </th>
                                              <th>laboratoire </th>
                                              <th>Année </th>
                                              <th>Factulté </th>
                                          </tr>
                                      </thead>

                                      <tbody>
                                        <?php

                                          foreach ($std_course  as $objet) {
                                              echo '<tr>';
                                              echo '<td>' . $objet['id_cours'] . '</td>';
                                              echo '<td>' . $objet['Sigle'] . '</td>';
                                              echo '<td>' . $objet['title'] . '</td>';
                                              echo '<td>' . $objet['nb_crd'] . '</td>';
                                              echo '<td>' . $objet['lab'] . '</td>';
                                              echo '<td>' . $objet['yearlevel'] . '</td>';
                                              echo '<td>' . $objet['dep_desc'] . '</td>';
                                              echo '</tr>';
                                          }

                                        ?>
                                      </tbody>
                                  </table>
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <button id="LeftMove" class="btn btn-danger">  Enlever <span class="glyphicon glyphicon-remove-circle"></span></button>
                              </div>

                            </div>

                        </div>
                    </div>

                    <!-- gender -->
                    <?php
                      if ($finance->graduated == 1) {
                        $no = '';
                        $yes = 'active';
                      }
                      else {
                        $no = 'active';
                        $yes = '';
                      }
                     ?>
                     <br><br>
                    <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Gradué: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label id="gradue" class="btn btn-default <?php echo $yes; ?>"  data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="graduated" value="1" > &nbsp; Oui &nbsp;
                                </label>
                                <label id="non_gradue" class="btn btn-primary <?php echo $no; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="graduated" value="0" > Non
                                </label>
                            </div>
                        </div>
                    </div>

                  </div>
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
          var finalTable = $('#table2').DataTable();

          var resultat = '';
          var crd_total = 0;
          var cntLabInfo = 0;
          var cntLabLangue = 0;

          for (var i = 0; i < finalTable.rows().data().length; i++) {
            var dataFin = finalTable.rows(i).data();
            resultat += dataFin[0][0] + "," + dataFin[0][3] + ":";

            crd_total = crd_total + parseInt(dataFin[0][3]);
          }

          var table = $('#table2').DataTable();
          var plan = "<?php echo $finance->plan; ?>";
          var total = "<?php echo $finance->total_payment; ?>";
          var checkGraduation = "<?php echo $finance->graduated; ?>";
          var checkNewStudent = "<?php echo $finance->new_student; ?>";
          var checkRetard = "<?php echo $finance->retard; ?>";

          var fee = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'ecolage'))->row()->montant;?>";
          var feeLabInfo = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_info'))->row()->montant;?>";
          var feeLabLangue = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'lab_langue'))->row()->montant;?>";
          var feeGraduation = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'graduation_fee'))->row()->montant;?>";
          var feeAdmission = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'admission_fee'))->row()->montant;?>";
          var feeAssurance = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'assurance'))->row()->montant;?>";
          var feeYearbook = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'yearbook'))->row()->montant;?>";
          var feeDepot = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'depot_fee'))->row()->montant;?>";
          var feeRetard = "<?php echo $this->db->get_where('fee_struct' , array('type' =>'inscription_retard'))->row()->montant;?>";
          var tuition = 0;
          var _graduated = 0;
          var totalWithGr = 0;
          var tmp_info = 0;
          var tmp_langue = 0;

          table
              .column( 4 )
              .data()
              .each( function ( value, index ) {
                if (value == 1)
                  cntLabInfo++;
                else if (value == 2)
                  cntLabLangue++;
                else if (index == null){
                  tmp_info = 0;
                  tmp_langue = 0;
                }
                else {
                }
                tmp_info = feeLabInfo * cntLabInfo;
                tmp_langue = feeLabLangue * cntLabLangue;
              } );

          var grand_total = parseInt(total) + parseInt(fee * crd_total) + parseInt(tmp_info) + (parseInt(feeGraduation * checkGraduation)) +
          parseInt(tmp_langue) + ((parseInt(feeAdmission) + parseInt(feeAssurance) + parseInt(feeYearbook) +
          parseInt(feeDepot)) * checkNewStudent) + (parseInt(feeRetard) * checkRetard);

          console.log(grand_total);
          var plan_pay = {
            TYPE_A: 0,
            TYPE_B: 0,
            TYPE_C: 0,
            TYPE_D: 0,
            TYPE_E: 0
          };

          switch (plan) {
            case 'A':
              plan_pay.type_A = grand_total;
              break;
            case 'B':
              plan_pay.type_A = grand_total * 0.75;
              plan_pay.type_B = grand_total * 0.25;
              break;
            case 'C':
              plan_pay.type_A = grand_total * 0.5;
              plan_pay.type_B = grand_total * 0.5;
              break;
            case 'D':
              plan_pay.type_A = grand_total * 0.4;
              plan_pay.type_B = grand_total * 0.3;
              plan_pay.type_C = grand_total * 0.3;
              break;
            case 'E':
              plan_pay.type_A = grand_total * 0.25;
              plan_pay.type_B = grand_total * 0.25;
              plan_pay.type_C = grand_total * 0.25;
              plan_pay.type_D = grand_total * 0.25;
              break;
            default:

          }

          if ($('#gradue').hasClass('active'))
            _graduated = 1;
          else if ($('#non_gradue').hasClass('active'))
            _graduated = 0;

          totalWithGr = parseInt(total) - (feeGraduation * _graduated);

          $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "academic/checkCourse",
            dataType: 'text',
            data: {
              cours: resultat,
              student_id: '<?php echo $student->student_id; ?>',
              total_credit: crd_total,
              amount_pay_1: plan_pay.type_A,
              amount_pay_2: plan_pay.type_B,
              amount_pay_3: plan_pay.type_C,
              amount_pay_4: plan_pay.type_D,
              lab_info: cntLabInfo,
              lab_langue: cntLabLangue,
              graduated: _graduated,
              total_payment: total

            },
            cache:false,
            success:
                function(data){
                  console.log(data);
                }
          });
          window.location = "<?php echo site_url('academic/inscription'); ?>";
        }
      </script>
