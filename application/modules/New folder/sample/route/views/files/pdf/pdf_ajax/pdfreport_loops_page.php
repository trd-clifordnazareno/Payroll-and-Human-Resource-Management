


<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row" style="border-bottom: 5px solid #000;"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                    LOCATIONS</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    MATERIAL</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    TOTAL LOOPS</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                    TIMESTAMP</th>
                                               </tr>
                                        </thead>
                                        
                                       
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        
                                            <?php

foreach($data as $data){
    


                                            
                                            echo "<tr class='odd'>";
                                            echo "<td class='  sorting_1'> $data->DSClientCode </td>";
                                            echo "<td> $data->DSMaterial </td>";
                                            echo "<td> $data->total_loops</td>";
                                            echo "<td> $start &nbsp - &nbsp $end</td>";
                                            
                                            echo "</tr>";
                                            
                                            
                                                                 
                                }

?>
                                            
                                            
                                        </tbody>
</div>
                                            
                                </div>
    