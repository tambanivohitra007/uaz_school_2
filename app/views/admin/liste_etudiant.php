<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="">
      <div class="x_panel form-horizontal form-label-left">
        <div class="clearfix"></div>

        <div class="x_title">
           <h2>Liste des Etudiants <small> (etudiants)</small></h2>

           <div class="clearfix"></div>
       </div>

       <div class="x_content">

           <table id="tableEtudiant" class="table table-striped responsive-utilities jambo_table">
               <thead>
                   <tr class="headings">

                       <th class="column-title">ID </th>
                       <th class="column-title">Noms </th>
                       <th class="column-title">Prénoms </th>
                       <th class="column-title">Sexe </th>
                       <th class="column-title">Faculté </th>
                       <th class="column-title no-link last"><span class="nobr">Action</span>
                       </th>
                       <th class="bulk-actions" colspan="7">
                           <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                       </th>
                   </tr>
               </thead>
               <tfoot>
                 <tr>
                     <th>ID</th>
                     <th>Noms</th>
                     <th>Prénoms</th>
                     <th>Sexe</th>
                     <th>Faculté</th>
                     <th>Action</th>
                 </tr>
               </tfoot>

               <tbody>
                <?php

                  foreach ($list  as $objet) {
                      echo '<tr>';
                      echo '<td>' . $objet['student_id'] . '</td>';
                      echo '<td>' . $objet['student_nom'] . '</td>';
                      echo '<td>' . $objet['student_prenom'] . '</td>';

                      if ($objet['sex'] == 0) $sex = 'Masculin';
                      else $sex = 'Féminin';
                      echo '<td>' . $sex . '</td>';
                      echo '<td>' . $objet['etude_envisage'] . '</td>';

                      // echo '<td><a href="' . base_url() . "index.php/student/detail/" . $objet['student_id'] . '" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                      // <a href="' . base_url() . "index.php/student/detail/" . $objet['student_id'] . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View </a>
                      // </td>';

                      echo '<td>
                      <ul class="nav navbar-right panel_toolbox">
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                  <li><a href="'. $link . $objet['student_id'] . '">Detail</a>
                                  </li>
                                  <li><a href="'. base_url() . "index.php/admin/edit/" . $objet['student_id'] . '">Editer</a>
                                  </li>
                              </ul>
                          </li>
                          <li><a class="close-link" href="'. base_url() . "index.php/admin/delete/" . $objet['student_id'] . '"><i class="fa fa-close"></i></a>
                          </li>
                      </ul>
                      </td>';
                      echo '</tr>';
                  }

                ?>

                </tbody>
              </table>
             </div>
         </div>
     </div>
     <!-- <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->

     <!-- bootstrap progress js -->
     <script src="<?php echo base_url();?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- Datatables -->
    <script src= "<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>

    <!-- libraries to used for table exportation -->
    <script src= "<?php echo base_url(); ?>assets/js/datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables/js/buttons.print.min.js"></script>


    <script>


      var asInitVals = new Array();
      $(document).ready(function () {
          var oTable = $('#tableEtudiant').dataTable({
              "oLanguage": {
                  "sSearch": "Search all columns:"
              },
              'iDisplayLength': 10,
              // "dom": 'T<"clear">lfrtip',
              "dom": 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ],

              initComplete: function () {
                  this.api().columns(4).every( function () {
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
              }
          });
          $("tfoot input").keyup(function () {
              /* Filter on the column based on the index of this element's parent <th> */
              oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
          });
          $("tfoot input").each(function (i) {
              asInitVals[i] = this.value;
          });
          $("tfoot input").focus(function () {
              if (this.className == "search_init") {
                  this.className = "";
                  this.value = "";
              }
          });
          $("tfoot input").blur(function (i) {
              if (this.value == "") {
                  this.className = "search_init";
                  this.value = asInitVals[$("tfoot input").index(this)];
              }
          });
      });

    </script>
