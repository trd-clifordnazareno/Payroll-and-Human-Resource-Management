

<div >
    <div class="box-header">
                                    <h3 class="box-title">Clients Information Files</h3>                                    
                                </div>
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Client Name</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Client Product</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Video File ID</th>
                                                </thead>
                                        
                                        
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php

                                            foreach($data as $data){
                                                ?><tr class="odd"><?php
                                            echo "<td>" . $data->client_name . "</td>";
                                            echo "<td>" . $data->client_product . "</td>";
                                            echo "<td>" . $data->video_file_id . "</td>";
                                            ?></tr><?php
                                            }

                                        ?>
                                        
                                    </tbody>       
                                            
                                            
                                    
                                </div>
</div>
    
    
    

                           
                                
            
                   