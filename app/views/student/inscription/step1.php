<div id="step-1" class="form-horizontal form-label-left">
  <div class="x_content">

    <!-- images -->

      <!-- <label lass="control-label col-md-3 col-sm-3 col-xs-12" for="Image"></label> -->
      <!-- <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"></div> -->
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
      </div>

<div class="col-md-9 col-sm-9 col-xs-12">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">profile</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Information personnelle</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Information nationale</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Contact et Sponsors</a>
              </li>
          </ul>
          <div id="myTabContent" class="tab-content">

              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                <!-- identification -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Identification:
                    </label>

                    <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                      <input type="text" id="student_id" class="form-control has-feedback-left" name="identification" placeholder="Identification" disabled="disabled" value="<?php echo $student->student_id; ?>">
                      <span class="fa fa-arrow-circle-right form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>

                 <!-- Nom et prenoms -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom et Prénoms:
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nom" name="nom" placeholder="Votre Noms" value="<?php echo $student->student_nom; ?>" required="">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="prenom" name="prenom" placeholder="Votre Prénoms" value="<?php echo $student->student_prenom; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                  </div>

                  <!-- gender -->
                  <?php
                    if ($student->sex == 1) {
                      $male = '';
                      $female = 'active';
                    }
                    else {
                      $male = 'active';
                      $female = '';
                    }
                   ?>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender: </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                              <label id="male" class="btn btn-default <?php echo $male; ?>"  data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="Masculin" > &nbsp; Masculin &nbsp;
                              </label>
                              <label id="female" class="btn btn-primary <?php echo $female; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="Féminin" > Féminin
                              </label>
                          </div>
                      </div>
                  </div>

                  <!-- address -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Adresse">Adresse d'origine: <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="adresse" name="adresse" required="required" class="form-control col-md-7 col-xs-12" placeholder="Votre Adresse" value="<?php echo $student->student_adresse; ?>">
                      </div>
                  </div>

                  <!-- EndroiT -->

                  <?php
                    if ($student->externe == 1) {
                      $checked = array(
                        'interne' => '',
                        'externe' => 'checked'
                      );
                    }
                    else {
                      $checked = array(
                        'interne' => 'checked',
                        'externe' => ''
                      );
                    }
                  ?>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Résidence actuelle: <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="radio">
                            <label>
                                <input type="radio" id="interne" class="flat" <?php echo $checked['interne']; ?> name="iCheck"> Interne
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" id="externe" class="flat" <?php echo $checked['externe']; ?> name="iCheck"> Externe
                            </label>
                        </div>
                      </div>
                    </div>

                    <!-- Etude -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etude_envisage">Etude envisagé: <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" id="etude_envisage" disabled="">
                                <option>Choisir</option>
                                <option <?php if ($student->etude_envisage == "Théologie") echo 'selected'; ?> value="Théologie">Théologie</option>
                                <option <?php if ($student->etude_envisage == "Gestion") echo 'selected'; ?> value="Gestion">Gestion</option>
                                <option <?php if ($student->etude_envisage == "Informatique") echo 'selected'; ?> value="Informatique">Informatique</option>
                                <option <?php if ($student->etude_envisage == "Science Infirmières") echo 'selected'; ?> value="Sciences infirmières">Sciences infirmières</option>
                                <option <?php if ($student->etude_envisage == "Communication") echo 'selected'; ?> value="Communication">Communication</option>
                                <option <?php if ($student->etude_envisage == "Langue") echo 'selected'; ?> value="Langue">Langue</option>
                                <option <?php if ($student->etude_envisage == "Cours Préparatoire") echo 'selected'; ?> value="Cours Préparatoire">Cours préparatoire</option>
                                <option <?php if ($student->etude_envisage == "Institut de langue") echo 'selected'; ?> value="Institut de langue">Institut de langue</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" id="etude_option" name="etude_option" class="form-control col-md-7 col-xs-12" placeholder="Options" <?php echo $student->etude_option; ?>>
                        </div>
                    </div>

                  <!-- date et lieu de naissance -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date et Lieu de Naissance:
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="date_naissance" class="date-picker form-control has-feedback-left" type="date" name="dateNaissance" placeholder="Date de Naissance" value="<?php echo $student->dateNaissance; ?>" disabled="">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="lieu_naissance" type="text" name="lieuNaissance" class="form-control col-md-7 col-xs-12" placeholder="Lieu de Naissance" value="<?php echo $student->lieuNaissance; ?>" disabled="">
                      </div>
                  </div>

                  <!-- téléphone et religion -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone et Religion: <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="student_tel" class="form-control has-feedback-left" required="required" type="text" placeholder="Téléphone" name="tel" value="<?php echo $student->student_tel; ?>" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'" required="">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="religion" type="text" name="religion" class="form-control col-md-7 col-xs-12" placeholder="Religion" value="<?php echo $student->religion; ?>">
                      </div>
                  </div>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <!-- état civil -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Etat civil:
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <select class="form-control" name="etat_civil" id="etat_civil">
                            <option>Choisir</option>
                            <option <?php if ($student->etat_civil == 0) echo 'selected'; ?> value="0">Célibataire</option>
                            <option <?php if ($student->etat_civil == 1) echo 'selected'; ?> value="1">Marié(e)</option>
                        </select>
                    </div>
                </div>

                <!-- Nom du conjoint et nombre d'enfants-->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom conjoint et Nombre d'enfant(s):
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input class="date-picker form-control has-feedback-left" id="nom_conjoint" type="text" name="nomConjoint" placeholder="Nom et Prénoms du conjoint(e)" <?php if ($student->etat_civil == 1) { echo ''; echo $student->nom_conjoint; } else { echo 'selected';} ; ?>>
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="number" id="nb_enfant" name="nbEnfant" min="0" max="10" class="form-control col-md-7 col-xs-12" placeholder="nombre d'enfants" value="<?php echo $student->nb_enfant; ?>">
                    </div>
                </div>
                <br>
                <!-- père -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Père et son Profession:
                  </label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id = "father_name" name="father" class="form-control col-md-7 col-xs-12" placeholder="Nom du père" value="<?php echo $student->father_name; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="father_prof" name="fatherProf" class="form-control col-md-7 col-xs-12" placeholder="Profession" value="<?php echo $student->father_prof; ?>">
                  </div>
                </div>

                <!-- mère -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mère et sa Profession:
                  </label>

                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="mother_name" name="mother" class="form-control col-md-7 col-xs-12" placeholder="Nom de la mère" value="<?php echo $student->mother_name; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="mother_prof" name="motherProf"  class="form-control col-md-7 col-xs-12" placeholder="Profession" value="<?php echo $student->mother_prof; ?>">
                  </div>
                </div>

                <!-- Adresse et téléphone -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Adresse et Télephone des parents:
                  </label>

                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="parent_adresse" name="parentAdresse" class="form-control col-md-7 col-xs-12" placeholder="Adresse" value="<?php echo $student->parent_adresse; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="parent_tel" name="parentTel" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="Téléphone" value="<?php echo $student->parent_tel; ?>" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <!-- Autre information -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationalité et Pays:
                  </label>

                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="nationalite" name="nationalite" class="form-control col-md-7 col-xs-12" placeholder="Nationalité" value="<?php echo $student->nationalite; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="pays_origine" name="pays_origine" class="form-control col-md-7 col-xs-12" placeholder="Pays d'origine" value="<?php echo $student->pays_origine; ?>">
                  </div>
                </div>

                <!-- CIN INFO -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">CIN et Date de délivrance:
                  </label>

                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="cin" name="cin" class="form-control col-md-7 col-xs-12" placeholder="Numéro CIN" value="<?php echo $student->num_cin; ?>" data-inputmask="'mask' : '9999999999999999'">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="date" id="cin_date_delivre" name="cin_date"  class="date-picker form-control has-feedback-left" placeholder="Date de Délivrance" value="<?php echo $student->cin_date_delivre; ?>">
                      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Région et Numéro VISA:
                  </label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="cin_region" name="cin_region"  class="form-control col-md-7 col-xs-12" placeholder="Région" value="<?php echo $student->cin_region; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" id="num_visa" name="num_visa"  class="form-control col-md-7 col-xs-12" placeholder="Votre Numéro VISA" value="<?php echo $student->num_visa; ?>">
                  </div>

                </div>

                <br>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                        <!-- Personne à contacter info -->
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du contact:</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pers_contact_name" name="pers_contact_name" class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter" value="<?php echo $student->pers_contact_name; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">adresse et téléphone du contact:</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="pers_adresse" name="pers_contact_adresse" class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter" value="<?php echo $student->pers_adresse; ?>">
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="pers_tel" name="pers_contact_tel" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="Téléphone" value="<?php echo $student->pers_tel; ?>" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                        <!-- Sponsors -->
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom et Prénoms du sponsors:</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="sponsor_nom" name="sponsor_nom"  class="form-control col-md-7 col-xs-12" placeholder=" Nom du sponsors" value="<?php echo $student->sponsor_nom; ?>">
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text"  id="sponsor_prenom" name="sponsor_prenom" class="form-control col-md-7 col-xs-12" placeholder=" Prénoms du sponsors" value="<?php echo $student->sponsor_prenom; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">adresse du sponsors:</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="sponsor_adresse" name="sponsor_adresse"  class="form-control col-md-7 col-xs-12" placeholder=" Nom à contacter" value="<?php echo $student->sponsor_adresse; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone et durée de financement du Sponsors:</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="sponsor_tel" name="sponsor_tel"  class="form-control col-md-7 col-xs-12" placeholder=" Téléphone" value="<?php echo $student->sponsor_tel; ?>" data-inputmask="'mask' : '999 99 999 99 - 999 99 999 99'">
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="sponsor_dure_f" name="sponsor_duree"  class="form-control col-md-7 col-xs-12" placeholder=" Durée du financement" <?php echo $student->sponsor_dure_f; ?>>
                          </div>
                        </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- input_mask -->
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
    <!-- /input mask -->
