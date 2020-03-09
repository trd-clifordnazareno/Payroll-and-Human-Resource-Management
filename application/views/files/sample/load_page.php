<?php

if($this->uri->rsegment(3) != NULL){
    $this->load->view("template/header"); 
}
else if($this->uri->rsegment(2) != NULL && $this->uri->rsegment(3) == NULL){
    $this->load->view("template/header"); 
}

?>
<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th></tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th></tr>
                                        </tfoot>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php

foreach($records->result() as $data){
    
        echo "<tr>";
        echo "<td>" . $data->location_code . "</td>";
         echo "<td>" . $data->location_name . "</td>";
          echo "<td>" . $data->location_id . "</td>";
        echo "</tr>";
   
}

?>
                                        </tbody></table></div>
                                </div>
<div style="margin-left:100px;">
<?php echo $this->pagination->create_links(); ?>
</div>
<?php
if($this->uri->rsegment(3) != NULL){
    $this->load->view("template/footer"); 
}
else if($this->uri->rsegment(2) != NULL){
    $this->load->view("template/footer"); 
}
?>