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

                                <table id="table" class="table table-striped projects responsive-utilities jambo_table">
                                        <thead>
                                            <tr>

                                                <th style="width: 10%">SHORT_CODE</th>
                                                <th>DESCRIPTION</th>
                                                <th style="width: 10%">NOMBRE</th>
                                                <th style="width: 12%">PLACE PRISE</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              foreach ($listWorked  as $objet) {
                                                  echo '<tr>';
                                                  echo '<td>' .  $objet['short_code'] . '</td>';
                                                  echo '<td>' . $objet['worked_desc'] . '</td>';
                                                  echo '<td>' .  $objet['nb_std'] . '</td>';

                                                  $val1 = $objet['nb_std'];
                                                  $val2 = $objet['nb_left'];
                                                  if ( $val1 - $val2 > 0) $color = "btn-info"; else $color = "btn-danger";
                                                    echo '<td class="'. $color . '">' .  $objet['nb_left'] . '</td>';
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

                   $('#table').DataTable( );
                 } );
               </script>
