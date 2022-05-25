$(document).ready(function () {
  // Attach a submit handler to the form
  $("#submit").click(function(){

    // Get some values from elements on the page:
    var $form = $( this ),
      url = $form.attr( "action" );
    var finalTable = $('#finalTable').DataTable();

    var resultat = '';

    for (var i = 0; i < finalTable.rows().data().length; i++) {
      var dataFin = finalTable.rows(i).data();
      resultat += dataFin[0][0] + "," + dataFin[0][3] + ":";
      //console.log(dataFin[0][0] + "," + dataFin[0][3]);
    }

    // var dortoir = 0;
    // if (document.getElementById('interne').checked) {
    //   dortoir = 0;
    // }
    // else {
    //   dortoir = 1;
    // }

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/student/finalized",
      dataType: 'text',
      data: {
        test: 'okey'
        // student_id: $('#student_idF').text(),
        // student_nom: $('#nomF').text(),
        // student_prenom: $('#prenomF').text(),
        // student_sex: $('#sexeF').text(),
        // dateNaissance: $('#dateNaissanceF').text(),
        // lieuNaissance: $('#lieuNaissanceF').text(),
        // student_tel: $('#telF').text(),
        // religion: $('#religionF').text()
        // etat_civil: $('#etat_civil option:selected').val()
        // nom_conjoint: $('#nom_conjointF').text(),
        // nb_enfant: $('#nb_enfantF').text(),
        // father_name: $('#father_nameF').text(),
        // father_prof: $('#father_profF').text(),
        // mother_namer: $('#mother_nameF').text(),
        // mother_prof: $('#mother_profF').text(),
        // parent_adresse: $('#parent_adresseF').text(),
        // parent_tel: $('#parent_telF').text(),
        // nationalite: $('#nationaliteF').text(),
        // num_cin: $('#num_cinF').text(),
        // pays_origine: $('#pays_origineF').text(),
        // cin_date_delivre: $('#cin_date_delivreF').text(),
        // cin_region: $('#cin_regionF').text(),
        // num_visa: $('#num_visaF').text(),
        // pers_contact_name: $('#pers_contact_nameF').text(),
        // pers_adresse: $('#pers_adresseF').text(),
        // pers_tel: $('#pers_telF').text(),
        // etude_envisage: $('#etude_envisageF').text(),
        // etude_option: $('#etude_option').text(),
        // sponsor_nom: $('#sponsor_nomF').text(),
        // sponsor_prenom: $('#sponsor_prenomF').text(),
        // sponsor_tel: $('#sponsor_telF').text(),
        // sponsor_adresse: $('#sponsor_adresseF').text(),
        // sponsor_dure_f: $('#sponsor_dure_fF').text(),
        // endroit: dortoir,
        // cours: resultat,
        // date: $.now()

      },
      cache:false,
      success:
          function(data){
            console.log(data);
          }
    });

  //  window.location = "http://localhost/uaz_school/index.php/student/logout";

  });
});
