<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Liste des Cours disponible</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Cours</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <table id="table" class="table table-striped table-bordered projects responsive-utilities jambo_table">
                                        <thead>
                                            <tr>

                                                <th style="width: 10%">ID cours</th>
                                                <th>Sigle et Titre du cours</th>
                                                <th style="width: 15%">Credits</th>
                                                <th>Laboratoire</th>
                                                <th style="width: 15%">Semestre</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              foreach ($list  as $objet) {
                                                  echo '<tr>';
                                                  echo '<td>' .  $objet['id_cours'] . '</td>';
                                                  echo '<td>' . $objet['Sigle'] . ', ' . $objet['title'] .'</td>';
                                                  echo '<td>' .  $objet['nb_crd'] . '</td>';
                                                  echo '<td>' .  $objet['lab'] . '</td>';
                                                  echo '<td>' .  $objet['semester'] . '</td>';
                                                  echo '</tr>';
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

               <script>
                   $(document).ready(function() {

                   $('#table').DataTable( {

                     'iDisplayLength': 10,
                     "sPaginationType": "full_numbers",
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
                 } );
               </script>
