
<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo $this->lang->line('title_table'); ?></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Cours</h2>
                                    <ul class="nav navbar-right panel_toolbox">

                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <table id="table" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th><?php echo $this->lang->line('sigle'); ?>: <?php echo $this->lang->line('title_course'); ?></th>
                                                <th style="width: 15%"><?php echo $this->lang->line('credit'); ?></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              // foreach ($list  as $objet) {
                                              //     echo '<tr>';
                                              //     echo '<td><strong>' . $objet['Sigle'] . '</strong>, ' . $objet['title'] .'</td>';
                                              //     echo '<td>' .  $objet['nb_crd'] . '</td>';
                                              //
                                              //     if ($objet['semester'] == 1) {
                                              //       $activate = $this->lang->line("deactivate");
                                              //       $btn = 'danger';
                                              //     }
                                              //     else {
                                              //       $activate = $this->lang->line("activate");
                                              //       $btn = 'info';
                                              //     }
                                              //     echo '<td>' .  '<a href="#" onclick="update(' . $objet['id_cours'] . ', ' . $objet['semester'] . ');" class="btn btn-' . $btn . ' btn-sm btn-icon icon-left" id="voir"> <i class="fa fa-spin"> </i>' . $activate . '  </a></td>';
                                              //     echo '</tr>';
                                              // }
                                            ?>
                                        </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>

               <script>

                   $(document).ready(function() {

                     var table = $('#table').DataTable( {
                      // "bProcessing": true,
		                  //  "bServerSide": true,

                          "ajax": '<?php echo base_url('departement/data'); ?>',
                          'iDisplayLength': 10,
                          "sPaginationType": "full_numbers",
                          "language": {
                              "lengthMenu": "<?php echo $this->lang->line('length_menu'); ?>",
                              "zeroRecords": "<?php echo $this->lang->line('zero_rec'); ?>",
                              "info": "<?php echo $this->lang->line('info'); ?>",
                              "infoEmpty": "<?php echo $this->lang->line('info_empty'); ?>",
                              "infoFiltered": "<?php echo $this->lang->line('info_filtered'); ?>",
                              "sSearch": "<?php echo $this->lang->line('search'); ?>: ",
                              "paginate": {
                                "last": "<?php echo $this->lang->line('paginate_last'); ?>",
                                "first": "<?php echo $this->lang->line('paginate_first'); ?>",
                                "previous": "<?php echo $this->lang->line('paginate_prev'); ?>",
                                "next": "<?php echo $this->lang->line('paginate_next'); ?>"
                              }
                            },
                          deferRender:    true,
                          scrollCollapse: true,
                          scroller:       true,
                          stateSave:      true

                    } );
                    // $('<button id="refresh">Refresh</button>').appendTo('div.dataTables_filter');
                 } );

                 var check = 0;
                 function update(id_cours, sem){
                   if (sem == 1) chek = 0;
                   else check = 1;
                    var test = "<?php echo base_url('departement/getJson'); ?>";
                 }

                 function reload(id_cours, sem){

                   var data = '<?php echo base_url('departement/updateCours'); ?>/' + id_cours + '/' + sem;

                      $.ajax({
                         method : 'get',
                         url    : data,
                         success: function(response){
                            $('#table').DataTable().ajax.reload(null, false);
                        }
                     })

                 }
               </script>
