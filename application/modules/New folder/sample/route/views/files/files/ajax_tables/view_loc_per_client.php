<?php $this->load->view('template/header'); ?>
<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Locationcode</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Location</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Name</th>
                                            
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr><th rowspan="1" colspan="1">Locationcode</th>
                                                <th rowspan="1" colspan="1">Location</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                            </tr>
                                        </tfoot>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php
                                                
                                                foreach($data as $data){
                                                    
                                                    echo "<tr>";
                                                    ///////
                                                    echo "<td>" . $data->location_code . "</br>";
                                                    echo "<td>" . $data->location_name . "</br>";
                                                    ?><td><a href="<?php echo site_url();    ?>/view_running_status/view_running_status/get_location/<?php echo $data->location_code;   ?>"><button>Go to its Playlist</button></a></td><?php
                                                    echo "</tr>";
                                                   
                                                }
                                                
                                                ?>
                                                
                                                
                                                <!--tables-->
                                            <!--</tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                            -->    </div>
<?php $this->load->view('template/footer'); ?>