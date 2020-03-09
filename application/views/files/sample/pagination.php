<?php 
$this->load->view("template/header"); 
?>




<!--<select id="sel">
    <option value="10">
        1
    </option>
    <option value="20">
        20
    </option>
</select>-->
<!--<div id="load"></div>-->
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
<?php //echo $this->table->generate($records); ?>

<?php $this->load->view("template/footer"); ?>



<script>
    $(document).ready(function(){
       //$("#load").load("<?php echo site_url();    ?>/sample/pagination/pages/"+ $("#sel").val());
    });
    </script>