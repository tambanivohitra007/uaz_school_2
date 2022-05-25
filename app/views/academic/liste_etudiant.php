<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo $this->lang->line('title_list'); ?> <?php echo "Liste des étudiants"; ?></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->lang->line('title_table_list'); ?> <?php echo "Liste des étudiants"; ?></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <table id="table" class="table table-striped projects responsive-utilities jambo_table">
                                    <thead>
                                        <tr>

                                            <th style="width: 10%">ID</th>
                                            <th><?php echo $this->lang->line('nom'); ?></th>
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          foreach ($list  as $objet) {
                                              echo '<tr>';
                                              echo '<td>' .  $objet['student_id'] . '</td>';
                                              echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';
                                        ?>
                                              <td><a href="#" onclick="showAjaxModal('<?php echo site_url("academic/popup/" . $objet['student_id']);?>')" class="btn btn-success btn-xs btn-icon icon-left" id="voir"> <i class="fa fa-spin"> </i> <?php echo $this->lang->line('see_detail'); ?> </a>
                                                <a href="<?php echo site_url("academic/list_detail/" . $objet['student_id']);?>" class="btn btn-primary btn-xs">Checklist</a></td>

                                        <?php
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
                     stateSave:      true,
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
                     }
                    } );
                 } );

                 function showAjaxModal(url)
                 {
                   $('#modal_ajax').modal('show', {backdrop: 'false'});

                   $.ajax({
                     url: url,
                     success: function(response)
                     {
                       $('#modal_ajax .modal-body').html(response);
                     }
                   });
                 }
               </script>

                   <!-- (Ajax Modal)-->
                   <div class="modal fade modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_ajax">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">

                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title"><?php echo $this->lang->line('detail_title'); ?></h4>
                             </div>

                             <div class="modal-body" style="height:500px; overflow:auto;">



                             </div>

                             <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                   </div>
