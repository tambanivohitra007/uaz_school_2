<div id="step-2">
    <!-- page content -->
      <div class="" role="main">
          <div class="">

              <div class="clearfix"></div>

              <div class="row">
                <div class="form-group">
                  <h3 class="control-label col-md-12 col-sm-12 col-xs-12">Etat actuel <span class="red"><strong> (IMPORTANT)</strong></span></h3>

                  <div class="radio">
                    <label>
                        <input type="checkbox" name="graduated" id="graduated" value="0" data-parsley-mincheck="2" required class="flat" /> Gradué
                    </label>
                    <label>
                        <input type="checkbox" name="old_student" id="old_student" value="0" data-parsley-mincheck="2" required class="flat" disabled="" checked=""/> ancien étudiant
                    </label>
                    <label>
                        <input type="checkbox" name="new_student" id="new_student" value="0" data-parsley-mincheck="2" required class="flat" disabled=""/> Nouvel étudiant
                    </label>
                  </div>

                </div>
                <div class="form-group">
                    <h3 class="control-label col-md-12 col-sm-12 col-xs-12">Année d'étude <span class="red"><strong> (IMPORTANT)</strong></span></h3>
                    <div class="radio">
                        <label>
                            <input type="radio" class="flat" checked name="YearCheck" value="1"> 1ère année
                        </label>

                        <label>
                            <input type="radio" class="flat" name="YearCheck" value="2"> 2ème année
                        </label>

                        <label>
                            <input type="radio" class="flat" name="YearCheck" value="3"> 3ème année
                        </label>

                        <label>
                            <input type="radio" class="flat" name="YearCheck" value="4"> 4ème année
                        </label>
                    </div>
                    <br>
                </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Cours à prendre <small> 2me semestre:</small> <strong class="red">Veuillez sélectionner les cours que vous voulez prendre</strong></h2>

                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Settings 1</a>
                                          </li>
                                          <li><a href="#">Settings 2</a>
                                          </li>
                                      </ul>
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
                                          <th>Année </th>
                                          <th>Crédits </th>
                                          <th>laboratoire </th>
                                          <th>Faculté </th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                        <!-- <th>ID </th> -->
                                        <th>ID </th>
                                        <th>SIGLE</th>
                                        <th>TITRE</th>
                                        <th>ANNEE</th>
                                        <th>CREDITS</th>
                                        <th>LAB </th>
                                        <th>FACULTE</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>

                                    <?php

                                      foreach ($list  as $objet) {
                                          echo '<tr>';
                                          // echo '<td class="a-center ">
                                          //     <input type="checkbox" class="flat" name="table_records[]" value =' . $objet['id_cours'] . '>
                                          // </td>';
                                          echo '<td>' . $objet['id_cours'] . '</td>';
                                          echo '<td>' . $objet['Sigle'] . '</td>';
                                          echo '<td>' . $objet['title'] . '</td>';
                                          echo '<td>' . $objet['yearlevel'] . '</td>';
                                          echo '<td>' . $objet['nb_crd'] . '</td>';
                                          echo '<td>' . $objet['lab'] . '</td>';
                                          echo '<td>' . $objet['dep_desc'] . '</td>';
                                          echo '</tr>';
                                      }

                                    ?>
                                  </tbody>
                              </table>
                              <button id="RightMove" class="btn btn-primary">Prendre le(s) cours sélectionné(s)<span class="glyphicon glyphicon-share-alt"></span></button>
                              <br>
                              <br>
                              <hr>
                              <!-- table2 -->
                              <table id="table2" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                                  <thead>
                                      <tr class="headings">
                                          <!-- <th>
                                              <input type="checkbox" class="tableflat">
                                          </th> -->
                                          <th>ID</th>
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
                                        <th>
                                            ID
                                        </th>
                                        <th>SIGLE </th>
                                        <th>Titre du cours </th>
                                        <th>Année </th>
                                        <th class="total">Crédits </th>
                                        <th>laboratoire </th>
                                        <th>Factulté </th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  </tbody>
                              </table>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <button id="LeftMove" class="btn btn-danger">  Enlever le(s) cours sélectionné(s) <span class="glyphicon glyphicon-remove-circle"></span></button>
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
</div>
