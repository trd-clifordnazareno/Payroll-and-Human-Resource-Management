<?php $this->load->view("template/header"); ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var_dump($data);
?>


<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Clients Activity Logs</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Client User Name</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Client Corporate Name</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Login Time</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Logout Time</th></tr>
                                        </thead>
                                        
                                        <!--<tfoot>
                                            <tr><th rowspan="1" colspan="1">UserName</th><th rowspan="1" colspan="1">Cleint Corporate Name</th><th rowspan="1" colspan="1">Login Time</th><th rowspan="1" colspan="1">Logout Time</th></tr>
                                        </tfoot>-->
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        
                                        foreach($data as $data){
                                            ?>
                                        
                                        <tr class="even">
                                                <td class="  sorting_1"><?php echo $data->client_username;    ?></td>
                                                <td class=" "><?php echo $data->client_corporate_name;    ?></td>
                                                <td class=" "><?php echo $data->login_time;    ?></td>
                                                <td class=" "><?php echo $data->logout_time;    ?></td>
                                            </tr>
                                        
                                        
                                        <?php
                                        }
                                        
                                        
                                        ?>
                                        </tbody></table></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                            
                        </div>
                    </div>

                </section>





<?php $this->load->view("template/footer"); ?>




