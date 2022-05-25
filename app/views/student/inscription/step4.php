        <div id="step-4">
            <h2 class="StepTitle">Tous les informations</h2>
            <hr>
            <?php echo form_open('/', 'id="target"'); ?>
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

              <div class="form-group">
                <div id="avatar" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                  <?php
                    if (file_exists($path)){
                  ?>
                  <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar">
                  <?php
                    } else {
                  ?>
                  <img src= "<?php echo base_url() . "assets/images/id_card/" . $student->student_id . ".jpg" ?>" alt="Avatar">
                  <?php
                    }
                  ?>
                </div>
              </div>

              <!-- <h3 id="student_idF">...</h3> -->
              <h3>Nom: <strong id="nomF"></strong></h3>

              <ul class="list-unstyled user_data">
                  <li>
                    <h4>Prénoms: <strong id="prenomF"> </strong></h4>
                    <!-- <p id="prenomF"></p> -->
                  </li>
                  <li>
                    <p>Immatriculation: <strong id="student_idF">Immatriculation: </strong></p>
                    <!-- <p id="student_idF"></p> -->
                  </li>

                  <li>
                    <p><strong><i class="fa fa-male"> </i> Sexe: </strong></p>
                    <p id="sexeF"></p>
                  </li>

                  <li>
                    <p><strong><i class="fa fa-map-marker user-profile-icon"> </i> Adresse: </strong></p>
                    <p id="adresseF"></p>
                  </li>

                  <li>
                    <p><strong><i class="fa fa-briefcase user-profile-icon"> </i> Résidence: </strong></p>
                    <p id="endroitF"></p>
                  </li>
              </ul>
          </div>

            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content5" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content6" role="tab" id="cours-tab" data-toggle="tab" aria-expanded="false">Cours à prendre</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content7" role="tab" id="finance-tab" data-toggle="tab" aria-expanded="false">Finance</a>
                      </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content5" aria-labelledby="home-tab">

                        <!-- start accordion -->
                         <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                             <div class="panel">
                                 <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                     <h4 class="panel-title">Information académique</h4>
                                 </a>
                                 <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                     <div class="panel-body">

                                       <dl class="dl-horizontal col-md-6 col-sm-6 col-xs-12">

                                         <dt class="red">Nouvel étudiant: </dt>
                                         <dd id="newStudent">...</dd>
                                         <dt class="red">Année d'étude: </dt>
                                         <dd id="yearLevel">...</dd>
                                         <dt class="red">Gradué: </dt>
                                         <dd id="gradue">...</dd>
                                         <dt>Etude envisagé: </dt>
                                         <dd id="etude_envisageF">...</dd>
                                         <dt>option de l'étude: </dt>
                                         <dd id="etude_optionF">...</dd>
                                       </dl>

                                     </div>
                                 </div>
                             </div>
                             <div class="panel">
                                 <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     <h4 class="panel-title">Information personnelle</h4>
                                 </a>
                                 <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                     <div class="panel-body">

                                       <dl class="dl-horizontal col-md-6 col-sm-6 col-xs-12">

                                         <dt>Date de Naissance: </dt>
                                         <dd id="dateNaissanceF">...</dd>
                                         <dt>Lieu de Naissance: </dt>
                                         <dd id="lieuNaissanceF">...</dd>
                                         <dt>Téléphone: </dt>
                                         <dd id="telF">...</dd>
                                         <dt>Religion: </dt>
                                         <dd id="religionF">...</dd>
                                         <dt>Etat civil: </dt>
                                         <dd id="etatF">...</dd>
                                         <dt>Nom du conjoint(e): </dt>
                                         <dd id="nom_conjointF">...</dd>
                                         <dt>Nombre d'enfants: </dt>
                                         <dd id="nb_enfantF">...</dd>

                                         <dt>Nationalité: </dt>
                                         <dd id="nationaliteF">...</dd>
                                         <dt>Pays D'origine: </dt>
                                         <dd id="pays_origineF">...</dd>
                                         <dt>Numéro CIN: </dt>
                                         <dd id="num_cinF">...</dd>
                                         <dt>Date de délivrance: </dt>
                                         <dd id="cin_date_delivreF">...</dd>
                                         <dt>Région: </dt>
                                         <dd id="cin_regionF">...</dd>
                                         <dt>Numéro du VISA: </dt>
                                         <dd id="num_visaF">...</dd>

                                       </dl>
                                     </div>
                                 </div>
                             </div>
                             <div class="panel">
                                 <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     <h4 class="panel-title">Autre détails</h4>
                                 </a>
                                 <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                     <div class="panel-body">

                                       <dl class="dl-horizontal col-md-6 col-sm-6 col-xs-12">
                                         <dt>Noms du père: </dt>
                                         <dd id="father_nameF">...</dd>
                                         <dt>Profession du père: </dt>
                                         <dd id="father_profF">...</dd>
                                         <dt>Noms de la mère: </dt>
                                         <dd id="mother_nameF">...</dd>
                                         <dt>Profession de la mère: </dt>
                                         <dd id="mother_profF">...</dd>
                                         <dt>Téléphone des parents: </dt>
                                         <dd id="parent_telF">...</dd>
                                         <dt>Adresse des parents: </dt>
                                         <dd id="parent_adresseF">...</dd>
                                         <hr>
                                         <dt>Personne à contacter en cas d'urgence: </dt>
                                         <dd id="pers_contact_nameF">...</dd>
                                         <dt>Adresse de la personne: </dt>
                                         <dd id="pers_adresseF">...</dd>
                                         <dt>Téléphone de la personne: </dt>
                                         <dd id="pers_telF">...</dd>
                                       </dl>
                                     </div>
                                 </div>
                             </div>
                             <div class="panel">
                                 <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                     <h4 class="panel-title">Sponsors</h4>
                                 </a>
                                 <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                     <div class="panel-body">

                                       <dl class="dl-horizontal col-md-6 col-sm-6 col-xs-12">
                                         <dt>Nom du sponsors: </dt>
                                         <dd id="sponsor_nomF">...</dd>
                                         <dt>Prénoms du sponsors: </dt>
                                         <dd id="sponsor_prenomF">...</dd>
                                         <dt>Adresse du sponsors: </dt>
                                         <dd id="sponsor_adresseF">...</dd>
                                         <dt>Téléphone du sponsors: </dt>
                                         <dd id="sponsor_telF">...</dd>
                                         <dt>Durée du financement: </dt>
                                         <dd id="sponsor_dure_fF">...</dd>

                                       </dl>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- end of accordion -->
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="cours-tab">

                          <!-- start Cours à prendre -->
                          <!-- table2 -->
                          <table id="finalTable" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                              <thead>
                                  <tr class="headings">
                                      <th>
                                        ID
                                      </th>
                                      <th>SIGLE </th>
                                      <th>Titre du cours </th>
                                      <th>Année </th>
                                      <th>Crédits </th>
                                      <th>laboratoire </th>
                                      <th>Factulté </th>
                                  </tr>
                              </thead>

                              <tfoot>
                                <tr class="headings">
                                    <th>ID </th>
                                    <th>SIGLE </th>
                                    <th>Titre du cours </th>
                                    <th>Année </th>
                                    <th class="total">Crédits </th>
                                    <th>Laboratoire </th>
                                    <th>Factulté </th>
                                </tr>
                              </tfoot>
                              <tbody>

                              </tbody>
                          </table>
                          <!-- end Cours à prendre -->

                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="finance-tab">

                        <div class="col-md-6">
                            <form class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label><strong>TOTAL A PAYER (en Ariary)</strong> </label>
                                    <h3 id="payment" class="btn-danger payment"></h3>
                                </div>
                                <div class="form-group">
                                    <label><strong>MODE DE PAIEMENT</strong></label>
                                      <h3 id="modePayment" class="btn-danger payment"></h3>
                                </div>

                                <div class="form-group">
                                    <label><strong>DATE DE PAIEMENT</strong></label>
                                      <h4 class="payment">1. <strong><span id="amount_pay_1"> 0 </span> Ar</strong> Avant le: <strong><span id="datePayment"></span></strong></h4>
                                      <h4 class="payment">2. <strong><span id="amount_pay_2"> 0 </span> Ar</strong> Avant le: <strong><span id="datePayment2"></span></strong></h4>
                                      <h4 class="payment">3. <strong><span id="amount_pay_3"> 0 </span> Ar</strong> Avant le: <strong><span id="datePayment3"></span></strong></h4>
                                      <h4 class="payment">4. <strong><span id="amount_pay_4"> 0 </span> Ar</strong> Avant le: <strong><span id="datePayment4"></span></strong></h4>
                                      <!-- <h4 class="payment">#5 <span id="amount_pay_5"> </span> Avant le: <strong><span id="datePayment5"></span></strong></h4> -->
                                </div>



                            </form>
                        </div>

                        <!-- end Finance -->
                      </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
            <hr>
            <div class="form-group">
              <label for="Terminer">Cliquer ici pour terminer l'inscription. </label>
              <a class="btn btn-danger btn-lg" id="submit">
                  <i class="fa fa-send-o"></i> Terminer et Déconnecter
              </a>
            </div>

        </div>

      </div>
      <!-- End SmartWizard Content -->
    </div>
  </div>
</div>
<!-- my customized javascript -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/sendAjax.js"></script> -->
<script type="text/javascript">
$("#submit").click(function(){
  // Get some values from elements on the page:
    var $form = $( this ),
      url = $form.attr( "action" );
    var finalTable = $('#finalTable').DataTable();

    var resultat = '';

    for (var i = 0; i < finalTable.rows().data().length; i++) {
      var dataFin = finalTable.rows(i).data();
      resultat += dataFin[0][0] + "," + dataFin[0][4] + ":";
      // console.log(dataFin[0][0] + "," + dataFin[0][4]);

    }
    console.log(resultat);
     var dortoir = 0;
    if (document.getElementById('interne').checked) {
      dortoir = 0;
    }
    else {
      dortoir = 1;
    }

    var gradue = 0;
    if (document.getElementById('gradue') == "Oui") gradue = 1; else gradue = 0;

    var new_student = 0;
    if (document.getElementById('newStudent') == "Oui") new_student = 1; else new_student = 0;

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('student/finalized'); ?>",
      dataType: 'text',
      data: {
        student_id: $('#student_idF').text(),
        student_nom: $('#nomF').text(),
        student_prenom: $('#prenomF').text(),
        student_sex: $('#sexeF').text(),
        year_level: $('#yearLevel').text(),
        dateNaissance: $('#dateNaissanceF').text(),
        lieuNaissance: $('#lieuNaissanceF').text(),
        student_tel: $('#telF').text(),
        religion: $('#religionF').text(),
        etat_civil: $('#etat_civil option:selected').val(),
        nom_conjoint: $('#nom_conjointF').text(),
        nb_enfant: $('#nb_enfantF').text(),
        father_name: $('#father_nameF').text(),
        father_prof: $('#father_profF').text(),
        mother_namer: $('#mother_nameF').text(),
        mother_prof: $('#mother_profF').text(),
        parent_adresse: $('#parent_adresseF').text(),
        parent_tel: $('#parent_telF').text(),
        nationalite: $('#nationaliteF').text(),
        num_cin: $('#num_cinF').text(),
        pays_origine: $('#pays_origineF').text(),
        cin_date_delivre: $('#cin_date_delivreF').text(),
        cin_region: $('#cin_regionF').text(),
        num_visa: $('#num_visaF').text(),
        pers_contact_name: $('#pers_contact_nameF').text(),
        pers_adresse: $('#pers_adresseF').text(),
        pers_tel: $('#pers_telF').text(),
        etude_envisage: $('#etude_envisageF').text(),
        etude_option: $('#etude_option').text(),
        sponsor_nom: $('#sponsor_nomF').text(),
        sponsor_prenom: $('#sponsor_prenomF').text(),
        sponsor_tel: $('#sponsor_telF').text(),
        sponsor_adresse: $('#sponsor_adresseF').text(),
        sponsor_dure_f: $('#sponsor_dure_fF').text(),
        endroit: dortoir,
        cours: resultat,
        // finance
        graduated: graduated_okey,
        total_credit: total,
        lab_info: count_lab_info,
        lab_langue: count_lab_langue,
        sem: semesterID,
        new_student: new_student_okey,
        totalPayment: $('#payment').text() - (total * ecolage) - (lab_info * count_lab_info) -
        (lab_langue * count_lab_langue) - (graduated_okey * _graduation_fee) - (daysSince * retard_montant),
        modePayment: $('#modePayment').text(),
        amount_pay_1: $('#amount_pay_1').text(),
        amount_pay_2: $('#amount_pay_2').text(),
        amount_pay_3: $('#amount_pay_3').text(),
        amount_pay_4: $('#amount_pay_4').text(),
        date_payment_1: $('#datePayment').text(),
        date_payment_2: $('#datePayment2').text(),
        date_payment_3: $('#datePayment3').text(),
        date_payment_4: $('#datePayment4').text(),
        retard: daysSince
      },
      cache:false,
      success:
          function(data){
            console.log(data);
          }
    });

    // window.location = "<?php echo base_url(); ?>" + "index.php/student/logout";
});
</script>
