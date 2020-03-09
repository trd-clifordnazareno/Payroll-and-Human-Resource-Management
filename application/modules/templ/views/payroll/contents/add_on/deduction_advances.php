<?php $this->load->view("templ/payroll/template/header");    ?>


<div class="box-header" style="margin-top: -30px;">
              <h3 class="box-title"><?php echo $header_title;   ?></h3>
            </div>
<div class="box box-primary">
            <!--<div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>-->
            <div class="box-body">
              

                
                
                <div id="child"></div>
                <div id="parent">
                    <div class="container-fluid">

                      <div class="row">
                        <div class="col-md-5"><div class="form-group">
                                    <label>Date From:</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="date" class="form-control pull-right" id="from">
                                    </div>
                                    <!-- /.input group -->
                                  </div></div>
                        <div class="col-md-5"><div class="form-group">
                                    <label>Date To:</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="date" class="form-control pull-right" id="to">
                                    </div>
                                    <!-- /.input group -->
                                  </div></div>
                          <div class="form-group">
                          <label>Empolyees</label>
            <select class="form-control" id="emp_id">
                    <?php
                
                foreach($employee as $data){
                    ?><option value="<?php echo $data->emp_code;    ?>"><?php echo $data->emp_name;    ?></option><?php
                }
                
                
                ?>
                      
                      
                    
                  </select>
                          </div>
                          <div class="form-group">
            <label>Item Name</label>
            <select class="form-control" id="item_name">
                    <option value="sss">SSS</option>
                    <option value="pag-ibig">Pag-Ibig</option>
                    <option value="phil-health">Phil-Health</option>
                    <option value="others">Others</option>
                  </select>
                          </div>
                <div class="form-group">
                  <label for="">Amount</label>
                  <input type="text" class="form-control" id="amount">
                </div>
                <div class="form-group">
                  <label for="">Amount To Deduct</label>
                  <input type="text" class="form-control" id="amount_to_deduct">
                </div>
                          
                          
                          
                          
                          <div class="form-group">
            <label>Condition</label>
            <select class="form-control" id="deduction_condition">
                    <option value="1">Default</option>
                    <option value="2">26-10</option>
                    <option value="3">11-25</option>
                  </select>
                          </div>
                          
                          
                          
                          
                          
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="save" style="margin-left:30px;">Submit</button>
                </div>
                        <div class="col-md-4"></div>
                      </div>
                    </div>

                </div>
                </div>
            
                
                
                
                
            </div>
			<div id="add_on_panel"></div>
            <!-- /.box-body -->
            <!--<form action="" method="Get">
            <input type="date" name="date">
            <input type="submit" value="click" name="but">
            </form>-->
            <?php
            
            /*if(isset($_GET['but'])){
                echo "ok";
            }*/            
            
            ?>
          


<?php $this->load->view("templ/payroll/template/footer");    ?>




<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        if($("#deduction_condition").val() == "1"){
                                            ///
                                                        var datas = {
                                                        from : $("#from").val(), 
                                                        to : $("#to").val(),
                                                        item_name : $("#item_name").val(),
                                                        amount : $("#amount").val(),
                                                        amount_to_deduct : $("#amount_to_deduct").val(),
                                                        emp_id : $("#emp_id").val(),
                                                        deduction_condition : "1",

                                                        ajax : '1'
                                                    };
                                                    $.ajax({
                                                        url : "<?php echo site_url();   ?>/admin/deduction_advances/request/deduction_advances",
                                                        type : "post",
                                                        data : datas,
                                                        success : function(msg){
                                                            $("#child").html(msg);
                                                            //alert("<?php echo $loc_codesgmt;   ?>");
                                                        }
                                                    });
                                            ///
                                        }else if($("#deduction_condition").val() == "2"){
                                            ///
                                                        var datas = {
                                                        from : $("#from").val(), 
                                                        to : $("#to").val(),
                                                        item_name : $("#item_name").val(),
                                                        amount : $("#amount").val(),
                                                        amount_to_deduct : $("#amount_to_deduct").val(),
                                                        emp_id : $("#emp_id").val(),
                                                        deduction_condition : "2",

                                                        ajax : '1'
                                                    };
                                                    $.ajax({
                                                        url : "<?php echo site_url();   ?>/admin/deduction_advances/request/deduction_advances",
                                                        type : "post",
                                                        data : datas,
                                                        success : function(msg){
                                                            $("#child").html(msg);
                                                            //alert("<?php echo $loc_codesgmt;   ?>");
                                                        }
                                                    });
                                            ///
                                        }else if($("#deduction_condition").val() == "3"){
                                            ///
                                                        var datas = {
                                                        from : $("#from").val(), 
                                                        to : $("#to").val(),
                                                        item_name : $("#item_name").val(),
                                                        amount : $("#amount").val(),
                                                        amount_to_deduct : $("#amount_to_deduct").val(),
                                                        emp_id : $("#emp_id").val(),
                                                        deduction_condition : "3",

                                                        ajax : '1'
                                                    };
                                                    $.ajax({
                                                        url : "<?php echo site_url();   ?>/admin/deduction_advances/request/deduction_advances",
                                                        type : "post",
                                                        data : datas,
                                                        success : function(msg){
                                                            $("#child").html(msg);
                                                            //alert("<?php echo $loc_codesgmt;   ?>");
                                                        }
                                                    });
                                            ///
                                        }else{
                                            alert(0);
                                        }exit;
                                        
                                    });
                                });
                                </script>
								<script>
                                    $(document).ready(function(){
                                      $("#add_on_panel").load("<?php echo base_url();    ?>/admin/deduction_advances/request/get_all_deduction_advances");
                                    });
                                </script>