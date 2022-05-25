<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="">
      <div class="x_panel form-horizontal form-label-left">

        <ul class="nav navbar-left">
          <a class="btn btn-default" href= "<?php echo base_url() ?>index.php/admin/liste">
            <i class="fa fa-chevron-circle-left"> </i> Retour
          </a>
        </ul>

        <div class="clearfix"></div>

        <div class="x_title">
          <h2>Dashboard</small></h2>
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

        <div class="clearfix"></div>


        <div class="x_content">

          <!-- top tiles -->
          <div class="row tile_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                  <div class="icon"><i class="fa fa-institution"></i>
                  </div>
                  <div class="count green"><?php echo $countAllStd; ?></div>

                  <h3>Total Etudiants</h3>
                  <p>Durant le premier semestre</p>
              </div>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                  <div class="icon"><i class="fa fa-male"></i>
                  </div>
                  <div class="count"><?php echo $countMale; ?></div>

                  <h3>Total Masculin</h3>
                  <p>Durant le premier semestre</p>
              </div>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                  <div class="icon"><i class="fa fa-female"></i>
                  </div>
                  <div class="count"><?php echo $countFemale; ?></div>

                  <h3>Total Féminin</h3>
                  <p>Durant le premier semestre</p>
              </div>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                  <div class="icon"><i class="fa fa-briefcase"></i>
                  </div>
                  <div class="count red"><?php echo $countDep; ?></div>

                  <h3>Total inscrits</h3>
                  <p>Durant le premier semestre</p>
              </div>
          </div>

        </div>
      <!-- /top tiles -->


      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Activités d'admission <small>Durant les 20 années successives</small></h3>
                </div>
                <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <div class="demo-container" style="height:250px">
                    <div id="morris-line-chart" style="height: 250px;"></div>
                </div>
            </div>
        </div>
      </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
          <div class="x_title">
              <h2>Facultés</h2>
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
            <div id="graph" style="height: 250px;"></div>

      </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
          <div class="x_title">
              <h2>Masculin - Féminin</h2>
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
            <div id="gender" style="height: 250px;"></div>
      </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
          <div class="x_title">
              <h2>Total inscrits</h2>
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
            <div id="religion" style="height: 250px;"></div>
      </div>
    </div>
  </div>
</div>


                  <!-- Datatables -->
                   <script src= "<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
                   <script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>
                   <!-- morris -->
                   <script src= "<?php echo base_url(); ?>assets/js/morris/morris.min.js"></script>
                   <script src= "<?php echo base_url(); ?>assets/js/morris/raphael-min.js"></script>

                <script type="text/javascript">
                  new Morris.Donut({
                  element: 'graph',
                  data: <?php echo json_encode($faculte); ?>,
                  colors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB', '#172D44'],
                  formatter: function (x) { return x + "%"}
                  }).on('click', function(i, row){
                  console.log(i, row);
                  });

                  new Morris.Line({
                    element: 'gender',
                    data: <?php echo json_encode($rows2); ?>,
                    xkey: 'sex',
                    ykeys: ['count'],
                    labels: ['Sexe']
                  }).on('click', function(i, row){
                    console.log(i, row);
                  });
                </script>

                <script type="text/javascript">
                new Morris.Area({
                  element: 'morris-line-chart',
                  data: <?php echo json_encode($rows); ?>,
                  xkey: 'year',
                  ykeys: ['c'],
                  labels: ['Total etudiants'],
                  lineColors: ['#1ABB93']
                  });

                  new Morris.Donut({
                  element: 'religion',
                  data: <?php echo json_encode($religion); ?>,
                  colors: ['#172D44', '#26B99A', '#ACADAC', '#3498DB', '#34495E'],
                  formatter: function (x) { return x + "%"}
                  }).on('click', function(i, row){
                  console.log(i, row);
                  });
                </script>
