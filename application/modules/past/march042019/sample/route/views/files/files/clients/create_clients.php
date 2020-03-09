<?php $this->load->view("template/header"); ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<p id="msg"></p>
    <p id="msgs"></p>
<div id="content"></div>
<div class="box box-primary" style="height: 250px;">
                                <div class="box-header">
                                    <h3 class="box-title">Upload Files</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                
                                
                                    <div class="box-body">
<div class="form-group">
     
    
   
                                        <div class="form-group">
                                        <label>Client Name:</label>
                                    <select class="form-control" id="client_code" style="width: 500px;">
                                                <!--<option id="clients">  </option>-->
                                                <?php  foreach($d as $data){
                                                    echo "<option value=$data->client_code>" . $data->client_name . "</option>";
                                                }    ?>
                                            </select>
                                        </div><!-- /.form group -->
                                    
                                    
                                    
                                    <div class="form-group">
                                        <div id="upload_all"><button class="btn btn-primary btn-lg" id="saves">Save</button>
                                        </div>
                                    <div id="upload_image" style="/*margin-left: 210px;margin-top: -43px;*/">
                                        <input type="file" id="file" name="file" id="files"/>
                                       
                                        <button onclick="openWin()" class="btn btn-primary btn-lg" style="MARGIN-LEFT: 230px; margin-top: -30px;" id="open_win">Click And Drag Your Files Here</button>
                                    </div>
                                   
                                    </div><!-- /.form group -->
                                    <div>
                                            <form action="<?php echo site_url();   ?>/clients/clients/create_clients" method="post">
                                                <button class="btn btn-primary btn-lg" id="saves_new" style="margin-left: 130px;">Upload New</button>
                                            </form>
                                            </div>
                                     <button id="upload" class="btn btn-primary btn-lg" style="/*margin-top: -30px; margin-left: 90px;*/margin-top: -70px;">Save</button>
                                    
                                    
                                    <!--<div id="upload_image" style="margin-left: 590px;margin-top: -43px;">
                                        <button onclick="openWin()" class="btn btn-primary btn-lg" style="margin-top: 50px; margin-left: -590px;" id="open_windows">Open Storage</button>
                                        <button onclick="closeWin()" class="btn btn-primary btn-lg" style="margin-top: 50px;" id="close_windows">Close Storage</button>
                                        <button id="finish" class="btn btn-primary btn-lg" style="margin-top: 50px;">Finished Upload</button>
                                    </div>-->
                                    
                                    
</div>
                                    </div>
</div>
                                    <div id="table_clients" ></div>
                                    
                                    
                                    
                                    <!-- modal for pop up window -->
                                    <div id="hide_screen" class="w3-modal">
                                        <div class="w3-modal-content" style="width: 50%; margin-left: 10%; padding-top: 30px;">
                                            <div class="w3-container">
                                                <span onclick="document.getElementById('hide_screen').style.display='none'" class="w3-button w3-display-topright" id="close_win_pop">&times;</span>
                                                <p></p>
                                                <p style="padding-top: 23px;"><b style="font-size: 30px; margin-left: 10px;">Drag Your Files Here</b></p>
                                                <img src="<?php echo site_url();   ?>/js/Test-na-anskioznost.gif" style="margin-left: 390px;margin-top: -95px;padding-bottom: 5px;">
                                            </div>
                                        </div>
                                     </div>
                                    <!-- modal for pop up window -->

<?php $this->load->view("template/footer"); ?>

                                    
                                    
                                    
                                    <script type="text/javascript">
            $(document).ready(function (e) {
                $("#upload").hide();
                //$("#upload_all").hide();
               // $("#upload_image").hide();
                $("#saves").hide();
                $("#saves_new").hide();
                $("#open_win").hide();
                
                
                $("#finish").click(function(){
                    $("#upload").show();
                $("#upload_all").show();
                $("#upload_image").show();
                
                $("#open_windows").hide();
                $("#close_windows").hide();
                $("#finish").hide();
                alert("Warning ! You are about finished upload your file in your web storage.At this momment, You are not allowed to upload any more files to the server");
                });
                
                $('#upload').on('click', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: '<?php echo site_url();   ?>/playlist/playlist/upload_video', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        async: false,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                            //$("#upload_all").show();
                            //$("#upload_image").hide();
                            var datas = {
                                            
                                            client_name : $("#client_code").val(),
                                            file_name : $("#file_name").val(),
                                            files : $("#files").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/add_clients",
                                            type : "post",
                                            async: false,
                                            data : datas,
                                            success : function(msg){
                                                //alert("File Successfully Uploaded");
                                                $("#msgs").html(msg);
                                                //alert($("#file_name").val());
                                                var datas = {
                                            
                                            client_name : $("#client_code").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/table_clients",
                                            type : "post",
                                            async: false,
                                            data : datas,
                                            success : function(msg){
                                                //window.open("http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/AgilaDS/Material&fileid=4481", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=900,width=400,height=400");
    
                                                //alert($("#file_name").val());
                                                $("#table_clients").html(msg);
                                            }
                                        });
                                            }
                                        });
                        },
                        error: function () {
                            alert("x");
                            //$('#msg').html(response); // display error response from the server
                            //$("#upload_all").show();
                            //$("#upload_image").hide();
                        }
                    });
                });
            });
        </script>
    <!--</head>-->
    <!--<body>-->
        
         <script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#saves").click(function(){
                                        var datas = {
                                            
                                            client_name : $("#client_code").val(),
                                            file_name : $("#file_name").val(),
                                            files : $("#files").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/add_clients",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                alert("File Successfully Uploaded");
                                                $("#msg").html(msg);
                                                //alert($("#file_name").val());
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                <script>
    $(document).ready(function(){
       $("#contents").load("<?php echo site_url();    ?>/clients/clients/load_clients");
    });
    </script>
    
    <!--upload web -->
    
    <script>
var myWindow;

function openWin() {
    myWindow = window.open("http://192.168.254.122/nextcloud/index.php/apps/files/?dir=/AgilaDS/Material&fileid=4481", "myWindow", "width=700, height=700, left=700");
    // original // //("http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/AgilaDS/Material&fileid=4481", "myWindow", "width=700, height=700, left=700");
                            //("https://www.w3schools.com", "_blank", "width=700, height=700, left=700");
    
}

function closeWin() {
    myWindow.close();
}
</script>



<script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#saves").click(function(){
                                        var datas = {
                                            
                                            client_name : $("#client_code").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/table_clients",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                //alert($("#file_name").val());
                                                $("#table_clients").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                <script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#open_win").click(function(){
                                        $("#hide_screen").show();
                                        $("#upload").show();
                                        $("#saves_new").show();
                                        $(this).hide();
                                    });
                                });
                                </script>
                                <script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#close_win_pop").click(function(){
                                        myWindow.close();
                                    });
                                });
                                </script>
                                <script>
                                    window.onbeforeunload = function(){
                                    return 'Are you sure you want to leave?';
                                    };
                                    </script> 
                                    <script>
                                        document.getElementById("file").onchange = function() {
    //document.getElementById("form").submit();
    $("#open_win").show();
}
                                        </script>
