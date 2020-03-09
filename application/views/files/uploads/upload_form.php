<?php $this->load->view('template/header'); ?>
<h1>Upload Form</h1>
<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" id="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" id="upload"/>





</br>
</br>
</br>

<div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="userfile">
                                            <button id="upload">upload</button>
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>

<?php $this->load->view('template/footer'); ?>

<script>
                                $(document).ready(function(){
                                    $("#upload").click(function(){
                                        var datas = {
                                            userfile : $("#userfile").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/upload/do_upload",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>