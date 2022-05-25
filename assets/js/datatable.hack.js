/**
 * @summary     Customized
 * @description hack smartWizard, hack Datatable, Take subjects ...
 * @version     1.0
 * @file        rindra.js
 * @author      Rindra Razafinjatovo
 * @contact     rindra.it@gmail.com
 * @copyright   Copyright 2016 Rindra Razafinjatovo.

 */

$(document).ready(function() {
$('#table1').DataTable( {

  initComplete: function () {
      this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="form-control"><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );

                  column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

          column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
      } );
  },
  "pagingType": "full_numbers",
  "language": {
      "lengthMenu": "Afficher _MENU_ enregistrements par page",
      "zeroRecords": "Rien trouvé - Désolé",
      "info": "Montrer page _PAGE_ sur _PAGES_",
      "infoEmpty": "Pas d'enregistrements disponible",
      "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
      "sSearch": "Rechercher: ",
      "paginate": {
        "last": "Dernier",
        "first": "Premier",
        "previous": "Précédent",
        "next": "Suivant"
      }
  }
} );

$('#table2').DataTable({
"paging": false,
"language": {
    "lengthMenu": "Afficher _MENU_ enregistrements par page",
    "zeroRecords": "Rien trouvé - Désolé",
    "info": "Montrer page _PAGE_ sur _PAGES_",
    "infoEmpty": "Pas d'enregistrements disponible",
    "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
    "sSearch": "Rechercher: ",
    "paginate": {
      "last": "Dernier",
      "first": "Premier",
      "previous": "Précédent",
      "next": "Suivant"
    }
},

"footerCallback": function (row, data, start, end, display){
  var api = this.api(), data;

  var intVal = function (i) {
    return typeof i === 'string' ?
      i.replace(/[\$,]/g, '')*1 :
      typeof i === 'number' ?
        i : 0;
  };

  // Total over all pages
total = api.column( 4 ).data()
    .reduce( function (a, b) {
        return intVal(a) + intVal(b);
    }, 0 );

    $( api.column( 4 ).footer() ).html(
      total + ' crédits'
    );
}
});

$('#finalTable').DataTable({
  "paging": false,
  "language": {
      "lengthMenu": "Afficher _MENU_ enregistrements par page",
      "zeroRecords": "Rien trouvé - Désolé",
      "info": "Montrer page _PAGE_ sur _PAGES_",
      "infoEmpty": "Pas d'enregistrements disponible",
      "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
      "sSearch": "Rechercher: ",
      "paginate": {
        "last": "Dernier",
        "first": "Premier",
        "previous": "Précédent",
        "next": "Suivant"
      }
  },

"footerCallback": function (row, data, start, end, display){
  var api = this.api(), data;

  var intVal = function (i) {
    return typeof i === 'string' ?
      i.replace(/[\$,]/g, '')*1 :
      typeof i === 'number' ?
        i : 0;
  };

  // Total over all pages
total = api.column( 4 ).data()
    .reduce( function (a, b) {
        return intVal(a) + intVal(b);
    }, 0 );

    $( api.column( 4 ).footer() ).html(
      total + ' crédits'
    );
}
});

$('#tableFinance').DataTable({
"paging": false
});

$('#tableFinance2').DataTable({
"paging": false
});

var t1 = $('#table1');
var t2 = $('#table2');
t1.on('click', 'tbody tr' ,function() {
   $(this).toggleClass('selected');
});
t2.on('click', 'tbody tr' ,function() {
   $(this).toggleClass('selected');
});

var table = $('#table2').DataTable();
var table2 = $('#table1').DataTable();
var finalTable = $('#finalTable').DataTable();
var tableFinance = $('#tableFinance').DataTable();
var tableFinance2 = $('#tableFinance2').DataTable();

$('#LeftMove').on('click',function () {
  var data = table.rows('.selected').data();

  table2.rows.add(data).draw();
  table.rows('.selected').remove().draw(false);

  // console.log(table.rows().data());
  var data2 = table.rows().data();
  var dataFinance = tableFinance.rows().data();

  finalTable.rows().remove().draw(false);
  finalTable.rows.add(data2).draw();

  tableFinance2.rows().remove().draw(true);
  tableFinance2.rows.add(dataFinance).draw();
  });

  $('#RightMove').on('click',function () {

  var data2 = table2.rows('.selected').data();
  var dataFinance = tableFinance.rows().data();

  table.rows.add(data2).draw();
  table2.rows('.selected').remove().draw(false);

  //console.log(table.rows().data());
  var data2 = table.rows().data();
  finalTable.rows().remove().draw(false);
  finalTable.rows.add(data2).draw();

  tableFinance2.rows().remove().draw(true);
  tableFinance2.rows.add(dataFinance).draw();
});

} );
