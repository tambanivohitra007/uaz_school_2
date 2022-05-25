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

                                                <th style="width: 10%">ID</th>
                                                <th>NOM ET PRENOMS</th>
                                                <th style="width: 10%">ECOLAGE</th>
                                                <th style="width: 40%">PAIEMENT</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              foreach ($listStd  as $objet) {
                                                  echo '<tr>';
                                                  echo '<td>' .  $objet['student_id'] . '</td>';
                                                  echo '<td>' . $objet['student_nom'] .  $objet['student_prenom'] . '</td>';
                                                  $credit = $objet['total_credit'];
                                                  $total = $credit * 13000 + $objet['total_payment'];
                                                  echo '<td>' .  $total . '</td>';
                                                  echo '<td>' . $objet['date_payment_1'] . ', ' . $objet['date_payment_2'] . ', ' . $objet['date_payment_3'] . ', ' . $objet['date_payment_4']  . '</td>';
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
