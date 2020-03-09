<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Locationcode</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Clientscode</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Material</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Create CSV</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr><th rowspan="1" colspan="1">Locationcode</th>
                                                <th rowspan="1" colspan="1">Clientscode</th>
                                                <th rowspan="1" colspan="1">Material</th>
                                                <th rowspan="1" colspan="1">Create CSV</th>
                                            </tr>
                                        </tfoot>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php
                                                
                                                foreach($data as $data){
                                                    
                                                    echo "<tr>";
                                                    ///////
                                                    /*echo "<td>" . $data->location_code;
                                                    echo "<td>" . $data->clients_code;
                                                    echo "<td>" . $data->filename;
                                                    ?><td><a href="<?php echo site_url();    ?>/reports/reports/create_csv_client_per_loc/<?php echo $data->location_code . "/" . $data->clients_code . "/" . $data->filename_code . "/" . $startdate. "/" . $enddate;   ?>"><button>Go to its Playlist</button></a></td><?php
                                                    echo "</tr>";*/
                                                   echo "<td>" . $data->DSClientCode;
                                                    echo "<td>" . $data->DSLocationCode;
                                                    echo "<td>" . $data->DSMaterial;
                                                    echo "<td>" . $data->Timestamp;
                                                }
                                                
                                                ?>
                                                
                                                
                                                <!--tables-->
                                            <!--</tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                            -->    </div>