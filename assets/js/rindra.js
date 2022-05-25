/**
 * @summary     Customized
 * @description hack smartWizard, hack Datatable, Take subjects ...
 * @version     1.0
 * @file        rindra.js
 * @author      Rindra Razafinjatovo
 * @contact     rindra.it@gmail.com
 * @copyright   Copyright 2016 Rindra Razafinjatovo.

 */
var graduated_okey = 0;
var new_student_okey = 0;
var daysSince = 0;

$(document).ready(function () {
    // Smart Wizard
    $('#wizard').smartWizard({
      labelNext: 'Suivant',
      labelPrevious: 'Précédent',
      labelFinish: 'Terminer',
      keyNavigation: false,
      hideButtonsOnDisabled: true,
      onLeaveStep:leaveAStepCallback,
      // enableFinishButton: false, // makes finish button enabled always
      // hideButtonsOnDisabled: true //
      onFinish: onFinishCallback
    });


    function onFinishCallback(objs, context) {
        //window.location = "http://localhost/uaz_school/index.php/student/logout";
    }

    function getValue(){
     test = document.getElementById("anarana");
      $('#NomFinal').text("salama tsika rehetra e");

    }

    function leaveAStepCallback(obj, context){
      //calculate all fees
      var credit = total * ecolage;

      if (document.getElementById('interne').checked) {
        var dortoir = dormitory;
        var refectoire = cafetariat;
      }
      else {
        var dortoir = 0;
        var refectoire = 0;
      }

      //calculer retard inscription
      var initialDate = new Date(2016, 3, 20);
      var now = Date.now();
      var difference = now - initialDate;
      var millisecondsPerDay = 24 * 60 * 60 * 1000;
      // daysSince = Math.floor(difference / millisecondsPerDay);
      daysSince = 0;
      $('#retard').text(daysSince * retard_montant + ' Ar');
      var test = daysSince * retard_montant;

      //for laboratoire informatique et lab_langue
      var table = $('#table2').DataTable();
      var temp_info = 0;
      var temp_langue = 0;
      count_lab_info = 0;
      count_lab_langue = 0;

      table
          .column( 5 )
          .data()
          .each( function ( value, index ) {
            if (value == 1)
              count_lab_info++;
            else if (value == 2)
              count_lab_langue++;
            else if (index == null){
              temp_info = 0;
              temp_langue = 0;
            }
            else {
            }
            temp_info = lab_info * count_lab_info;
            temp_langue = lab_langue * count_lab_langue;
            // lab_langue = lab_langue * count_lab_langue;
            // console.log( count_lab_info + ', ' + temp_langue );
          } );


      //for graduation
      if (document.getElementById('graduated').checked){
        var frais_graduation = graduation;
        var encadrement = soutenance;
        var fraisdepot = 0;
        var adm = 0;
        graduated_okey = 1;
          $('#gradue').text('Oui');
      }
      else {
        var frais_graduation = 0;
        var adm = 0;
        var fraisdepot = 0;
        var encadrement = 0;
        graduated_okey = 0;
        $('#gradue').text('Non');
      }

      //for new student
      if (document.getElementById('new_student').checked && document.getElementById('interne').checked){
        var adm = admission;
        var fraisdepot = static_depot;
        var depot_medical = static_medical;
        new_student_okey = 1;
        $('#newStudent').text('Oui');
        // console.log('ok be izany');
      }
      else if (document.getElementById('new_student').checked) {
        var adm = admission;
        // var assur = static_assurance;
        var assur = 0;
        var depot_medical = 0;
        var fraisdepot = 0;
        new_student_okey = 1;
        $('#newStudent').text('Oui');
        // console.log('TENA OKEY KOSA KOU');
      }
      else if (document.getElementById('interne').checked) {
        var depot_medical = static_medical;
        new_student_okey = 0;
      }
      else {
        var adm = 0;
        var fraisdepot = 0;
        var depot_medical = 0;
        new_student_okey = 0;
        $('#newStudent').text('Non');
      }

      var concours = 0;

      var total1 = credit + concours + inscription + adm + yearbook + assurance_montant
      + voyage_etude + dortoir + refectoire + fraisdepot + frais_generaux + frais_graduation
      + temp_info + temp_langue + test + depot_medical + encadrement;

      //test if all values are correct
      console.log(
        'credit: ' + credit + ', ' +
        'concours: ' + concours + ', ' +
        'inscription: ' + inscription + ', ' +
        'admission: ' + adm + ', ' +
        'yearbook: ' + yearbook + ', ' +
        'assurance: ' + assurance + ', ' +
        'voyage_etude: ' + voyage_etude + ', ' +
        'dortoir: ' + dortoir + ', ' +
        'refectoire: ' + refectoire + ', ' +
        'depot: ' + fraisdepot + ', ' +
        'frais_generaux: ' + frais_generaux + ', ' +
        'frais_graduation: ' + frais_graduation + ', ' +
        'temp_info: ' + temp_info + ', ' +
        'temp_langue: ' + temp_langue + ', ' +
        'retard: ' + test + ', ' +
        'medical: ' + depot_medical + ', ' +
        'soutenance: ' + encadrement);

      // prix credits obtenu
      $('#credit').text(credit + ' Ar');
      //prix concours
      $('#concours').text(concours + ' Ar');
      //prix inscription
      $('#inscription').text(inscription + ' Ar');
      //prix admission
      $('#admission').text(adm + ' Ar');
      //prix yearbook
      $('#yearbook').text(yearbook + ' Ar');
      //prix assurance
      $('#assurance').text(assurance + ' Ar');
      //prix voyage d'étude
      $('#voyage_etude').text(voyage_etude + ' Ar');
      //prix dortoir
      $('#dortoir').text(dortoir + ' Ar');
      //prix réfectoire
      $('#refectoire').text(refectoire + ' Ar');
      //prix dépot pour dortoir
      $('#depot').text(fraisdepot + ' Ar');
      //prix graduation
      $('#frais_graduation').text(frais_graduation + ' Ar');
      //prix frais généraux
      $('#frais_generaux').text(frais_generaux + ' Ar');
      //prix dépot médepot médical
      $('#medical').text(depot_medical + ' Ar');
      //prix encadrement et soutenance
      $('#soutenance').text(encadrement + ' Ar');
      //total
      $('#totalTuition').text(total1 + ' Ar');
      $('#totalTuition2').text(total1 + ' Ar');

      //get input from stp1 to the final step
      $('#student_idF').text($('#student_id').val());
      $('#nomF').text($('#nom').val());
      $('#prenomF').text($('#prenom').val());
      $('#adresseF').text($('#adresse').val());

      //for gender
      var gender = "masculin";

      if ($('#male').hasClass('active'))
        gender = 'masculin';
      else if ($('#female').hasClass('active'))
        gender = 'féminin';

      $('#sexeF').text(gender);

      //for Residency
      if (document.getElementById('interne').checked) { var dortoir = "interne";}
      else { var dortoir = "externe"}

      $('#lab_info').text(temp_info + ' Ar');
      $('#lab_langue').text(temp_langue + ' Ar');
      //for others
      $('#yearLevel').text($('input[name=YearCheck]:checked').val());

      $('#endroitF').text(dortoir);
      $('#dateNaissanceF').text($('#date_naissance').val());
      $('#lieuNaissanceF').text($('#lieu_naissance').val());
      $('#telF').text($('#student_tel').val());

      //information additionnelle
      $('#religionF').text($('#religion').val());
      $('#nationaliteF').text($('#nationalite').val());
      $('#pays_origineF').text($('#pays_origine').val());
      $('#num_cinF').text($('#cin').val());
      $('#cin_date_delivreF').text($('#cin_date_delivre').val());
      $('#cin_regionF').text($('#cin_region').val());
      $('#num_visaF').text($('#num_visa').val());
      $('#etude_envisageF').text($('#etude_envisage').find(":selected").text());
      $('#etude_optionF').text($('#etude_option').val());

      //Etat civil
      $('#etatF').text($('#etat_civil').find(":selected").text());
      $('#nom_conjointF').text($('#nom_conjoint').val());
      $('#nb_enfantF').text($('#nb_enfant').val());

      //parents
      $('#father_nameF').text($('#father_name').val());
      $('#father_profF').text($('#father_prof').val());
      $('#mother_nameF').text($('#mother_name').val());
      $('#mother_profF').text($('#mother_prof').val());
      $('#parent_adresseF').text($('#parent_adresse').val());
      $('#parent_telF').text($('#parent_tel').val());

      //Personne à contacter
      $('#pers_contact_nameF').text($('#pers_contact_name').val());
      $('#pers_adresseF').text($('#pers_adresse').val());
      $('#pers_telF').text($('#pers_tel').val());

      //sponsors
      $('#sponsor_nomF').text($('#sponsor_nom').val());
      $('#sponsor_prenomF').text($('#sponsor_prenom').val());
      $('#sponsor_adresseF').text($('#sponsor_adresse').val());
      $('#sponsor_telF').text($('#sponsor_tel').val());
      $('#sponsor_dure_fF').text($('#sponsor_dure_f').val());

      //finance
      $('#payment').text(total1);
      $('#modePayment').text($('input[name=plan]:checked').val());

      switch ($('input[name=plan]:checked').val()) {
        case 'A':
          $('#datePayment').text(plan_A.type_A); $('#amount_pay_1').text(total1);
          $('#datePayment2').text(""); $('#amount_pay_2').text(0);
          $('#datePayment3').text(""); $('#amount_pay_3').text(0);
          $('#datePayment4').text(""); $('#amount_pay_4').text(0);
          break;
        case 'B':
          $('#datePayment').text(plan_B.TYPE_B_1); $('#amount_pay_1').text(total1 * 0.75);
          $('#datePayment2').text(plan_B.TYPE_B_2); $('#amount_pay_2').text(total1 * 0.25);
          $('#datePayment3').text(""); $('#amount_pay_3').text(0);
          $('#datePayment4').text(""); $('#amount_pay_4').text(0);
          break;
        case 'C':
          $('#datePayment').text(plan_C.TYPE_C_1); $('#amount_pay_1').text(total1 * 0.5);
          $('#datePayment2').text(plan_C.TYPE_C_2); $('#amount_pay_2').text(total1 * 0.5);
          $('#datePayment3').text(""); $('#amount_pay_3').text(0);
          $('#datePayment4').text(""); $('#amount_pay_4').text(0);
          break;
        case 'D':
          $('#datePayment').text(plan_D.TYPE_D_1); $('#amount_pay_1').text(total1 * 0.4);
          $('#datePayment2').text(plan_D.TYPE_D_2); $('#amount_pay_2').text(total1 * 0.3);
          $('#datePayment3').text(plan_D.TYPE_D_3); $('#amount_pay_3').text(total1 * 0.3);
          $('#datePayment4').text(""); $('#amount_pay_4').text(0);
          break;
        case 'E':
          $('#datePayment').text(plan_E.TYPE_E_1); $('#amount_pay_1').text(total1 * 0.25);
          $('#datePayment2').text(plan_E.TYPE_E_2); $('#amount_pay_2').text(total1 * 0.25);
          $('#datePayment3').text(plan_E.TYPE_E_3); $('#amount_pay_3').text(total1 * 0.25);
          $('#datePayment4').text(plan_E.TYPE_E_4); $('#amount_pay_4').text(total1 * 0.25);
          break;
        default:
          $('#datePayment').text("A NEGOCIER"); $('#amount_pay_1').text(0);
          $('#datePayment2').text(""); $('#amount_pay_2').text(0);
          $('#datePayment3').text(""); $('#amount_pay_3').text(0);
          $('#datePayment4').text(""); $('#amount_pay_4').text(0);
          break;

      }

      return context.fromStep; // to continue navigation
  }
});
