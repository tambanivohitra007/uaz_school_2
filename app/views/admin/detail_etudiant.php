<div class="right_col" role="main">
  <div class="">
      <div class="clearfix"></div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h3>Information sur l'étudiant <small>(Détail)</small></h3>
            <ul class="nav navbar-left">
              <a class="btn btn-default" href= "<?php echo base_url() ?>index.php/admin/liste">
                <i class="fa fa-chevron-circle-left"> </i> Retour
              </a>
            </ul>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
          <div class="avatar-view" id="avatar-view" title="Change the avatar">
              <img src= "<?php echo base_url() . "assets/id_card/" . $student->student_id . ".jpg" ?>" alt="Avatar">
          </div>
          <h2 class="title"> <b>Identification:</b><i class="excerpt"> <?php echo $student->student_id; ?></i></h2>
          <h6 class="excerpt"><b>Nom: </b><?php echo $student->student_nom; ?></h6>
          <h6 class="excerpt"> <b>Prénoms: </b> <?php echo $student->student_prenom; ?> </h6>
          <h6 class="excerpt"> <b>Sexe: </b>
          <?php
            if ($student->sex == '0') echo 'Masculin';
            else echo 'Féminin';
          ?></h6>
          <h6 class="excerpt"> <b>Adresse: </b> <?php echo $student->student_adresse; ?></h6>
          <h6 class="excerpt"> <b>Date de Naissance: </b> <?php echo $student->dateNaissance; ?></h6>
          <h6 class="excerpt"> <b>Lieu de Naissance: </b> <?php echo $student->lieuNaissance; ?></h6>
          <h6 class="excerpt"> <b>Téléphone: </b> <?php echo $student->student_tel; ?></h6>
          <h6 class="excerpt"> <b>Religion: </b> <?php echo $student->religion; ?></h6>
        </div>
          <!-- Detail form -->
          <div class="col-md-9 col-sm-9 col-xs-12">
              <ul class="list-unstyled timeline">

                  <li>
                      <div class="block">
                          <div class="tags">
                              <a href="" class="tag">
                                  <span>Information</span>
                              </a>
                          </div>
                          <div class="block_content" id="parents">

                            <h2 class="title"> <b>Etat Civil:</b><i class="excerpt">
                              <?php
                                if ($student->etat_civil == 0) echo $etat_civil = 'Célibataire';
                                else $etat_civil = 'Marié(e)';
                              ?></i></h2>
                            <h6 class="excerpt"><b>Nom du conjoint: </b><?php echo $student->nom_conjoint; ?></h6>
                            <h6 class="excerpt"><b>Nombre d'enfant: </b> <?php echo $student->nb_enfant; ?> </h6>
                            <h6 class="excerpt"> <b>Etude envisagé: </b> <?php echo $student->etude_envisage; ?></h6>
                            <h6 class="excerpt"><b>Option: </b> <?php echo $student->etude_option; ?> </h6>
                          </div>
                      </div>
                  </li>

                  <li>
                      <div class="block">
                          <div class="tags">
                              <a href="" class="tag">
                                  <span>Parents</span>
                              </a>
                          </div>
                          <div class="block_content" id="parents">
                            <h2 class="title"> <b>Nom du père:</b><i class="excerpt"> <?php echo $student->father_name; ?></i></h2>
                            <h6 class="excerpt"><b>Profession: </b><?php echo $student->father_prof; ?></h6>
                            <h6 class="excerpt"><b>Nom de la mère: </b> <?php echo $student->mother_name; ?> </h6>
                            <h6 class="excerpt"> <b>Profession: </b> <?php echo $student->mother_prof; ?></h6>
                            <h6 class="excerpt"><b>Adresse des parents: </b> <?php echo $student->parent_adresse; ?> </h6>
                            <h6 class="excerpt"> <b>Téléphone: </b> <?php echo $student->parent_tel; ?></h6>
                          </div>
                      </div>
                  </li>
                  <li>
                      <div class="block">
                          <div class="tags">
                              <a href="" class="tag">
                                  <span>Autres</span>
                              </a>
                          </div>
                          <div class="block_content" id="autre">
                            <h2 class="title"> <b>Nationalité:</b><i class="excerpt"> <?php echo $student->nationalite; ?></i></h2>
                            <h6 class="excerpt"><b>Numéro CIN: </b><?php echo $student->num_cin; ?></h6>
                            <h6 class="excerpt"><b>Date de délivrance: </b> <?php echo $student->cin_date_delivre; ?> </h6>
                            <h6 class="excerpt"> <b>Région: </b> <?php echo $student->cin_region; ?></h6>
                            <h6 class="excerpt"><b>Numéro VISA: </b> <?php echo $student->num_visa; ?> </h6>
                            <h6 class="excerpt"> <b>Pays d'origine: </b> <?php echo $student->pays_origine; ?></h6>
                          </div>
                      </div>
                  </li>

                  <li>
                      <div class="block">
                          <div class="tags">
                              <a href="" class="tag">
                                  <span>Contact</span>
                              </a>
                          </div>
                          <div class="block_content" id="persone">
                            <h2 class="title"> <b>Nom à contacter:</b><i class="excerpt"> <?php echo $student->pers_contact_name; ?></i></h2>
                            <h6 class="excerpt"><b>Adresse: </b><?php echo $student->pers_adresse; ?></h6>
                            <h6 class="excerpt"><b>Téléphone: </b> <?php echo $student->pers_tel; ?> </h6>
                          </div>
                      </div>
                  </li>

                  <li>
                      <div class="block">
                          <div class="tags">
                              <a href="" class="tag">
                                  <span>Sponsors</span>
                              </a>
                          </div>
                          <div class="block_content" id="persone">
                            <h2 class="title"> <b>Nom du sponsors:</b><i class="excerpt"> <?php echo $student->sponsor_nom; ?></i></h2>
                            <h6 class="excerpt"><b>Prénoms du sponsors: </b><?php echo $student->sponsor_prenom; ?></h6>
                            <h6 class="excerpt"><b>Adresse: </b> <?php echo $student->sponsor_adresse; ?> </h6>
                            <h6 class="excerpt"><b>Téléphone: </b> <?php echo $student->sponsor_tel; ?> </h6>
                            <h6 class="excerpt"><b>Durée de financement: </b> <?php echo $student->sponsor_dure_f; ?> </h6>
                          </div>
                      </div>
                  </li>

              </ul>
            </div>
            <!-- end of Detail form -->
        </div>
      </div>
    </div>
</div>
