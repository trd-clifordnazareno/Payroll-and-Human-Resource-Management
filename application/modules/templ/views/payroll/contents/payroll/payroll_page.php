<?php $this->load->view("templ/payroll/template/header");    ?>


<div class="box-header" style="margin-top: -30px;">
              <h3 class="box-title"><?php echo $header_title;   ?></h3>
            </div>
<div class="box box-primary">
            <!--<div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>-->
            <div class="box-body">
              

                
                
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
                        <div class="col-md-4"></div>
                      </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="save" style="margin-left:30px;">Submit</button>
                </div>
                
                
                
                
            </div>
            <!-- /.box-body -->
          </div>

<div id="child"></div>
<?php $this->load->view("templ/payroll/template/footer");    ?>




<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            from : $("#from").val(), 
                                            to : $("#to").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/payroll_sheet/ajax_method/payroll_rec",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#child").html(msg);
                                                //alert("<?php echo $loc_codesgmt;   ?>");
                                            }
                                        });
                                    });
                                });
                                </script>