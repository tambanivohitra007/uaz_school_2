<?php

  include "/static/header.php";
  include "/static/menu.php";
  include "/static/top.php"

?>


<!-- page content -->
 <div class="right_col" role="main">
     <div class="">
         <div class="page-title">
             <div class="title_left">
                 <h3>INTRODUCTION</h3>
             </div>

         </div>
         <div class="clearfix"></div>

         <div class="row">

             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel" style="height:600px;">
                     <div class="x_title">
                         <h2>Manuel de l'étudiant</h2>
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

                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                         <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                             <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">ACADEMIQUE</a>
                             </li>
                             <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">FINANCES</a>
                             </li>
                             <li role="presentation" class=""><a href="#tab_content3" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">VIE ESTUDIANTINE</a>
                             </li>
                             <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">DISCIPLINE</a>
                             </li>
                             <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">INTERNAT</a>
                             </li>
                         </ul>
                         <div id="myTabContent" class="tab-content">
                             <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                               <!-- start accordion -->
                                  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                      <div class="panel">
                                          <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              <h4 class="panel-title">Bulletin Académique</h4>
                                          </a>
                                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                              <div class="panel-body">

                                                  Le Bulletin décrit les programmes académiques de l'Université, et définit les exigences qui y sont associées afin de vous permettre
                                                  d'atteindre vos objectifs académiques. Il contient également la règlementation de l'Université associé aux activités académiques.
                                                  Des copies du bulletin sont déposées à la bibliothèque.

                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel">
                                          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              <h4 class="panel-title">Bibliothèque</h4>
                                          </a>
                                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">

                                                  La <strong>Bibliothèque</strong> de l'Université contient quelques <strong>15.000</strong> ouvrages en français aussi bien qu'en anglais.
                                                  En plus des livres, elle offre une variété de Magazines divers. Elle est un lieu d'activité constante, et tous sont encouragés à en faire usage
                                                  maximum, d'autant plus tout le monde n'est pas en mesure de s'acheter des livres pour sa propre bibliothèque. Il faut donc profiter de s'enrichir
                                                  académiquement durant le séjour à l'Université. Pour les heures d'ouverture, ainsi que le règlement général de la Bibiothèque, voir la bibliothécaire.

                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel">
                                          <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              <h4 class="panel-title">Présence en Classe</h4>
                                          </a>
                                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                              <div class="panel-body">

                                                  Les étudiants sont fortement encouragés à faire preuve en tout temps de présence en clase, et ce, de manière régulière et ponctuelle. Ce comportement
                                                  permettra de mieux comprendre les sujets présentés, et, par voie de conséquence d'avoir une meilleure réussite. D'autre part, tout étudiant qui
                                                  accumulerait 15% ou plus d'absence dans un cours, quelles qu'en soient les raisons, devra se retirer de ce cours, qu'il devra reprendre plus tard.

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- end of accordion -->
                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                 <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                 <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

<?php  include "/static/footer.php" ?>
