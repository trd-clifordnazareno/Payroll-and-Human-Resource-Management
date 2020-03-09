<?php $this->load->view("template/header"); ?>
<button class="btn btn-primary btn-sm" first-name="<?php echo $data->location_code;   ?>" data-toggle="modal" data-target="#myModal" style="font-size: xx-small; background-color: #281672;">
					click
				</button>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"><!--style="width: 860px; margin-left: -60px;"-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div><center><div id="con"><input class="form-control" id="fname" style="
    width: 100px;
    margin-top: 10px;
    "></div></center>
      <div class="modal-body">
        <form id="profileForm" style="table-layout: fixed;border-collapse: collapse;z-index: -1;position:relative;margin-top: -100%;">
            Location Code : <!--<input class="form-control" name="firstname" value="" placeholder="firstname" id="fname" disabled>-->
       </form>
      </div>
        
        <!--<video width="850" height="500" autoplay loop style="margin-left: 26px;"><!--oncontextmenu="return false;"-->
       <!--<source src="http://localhost/rmn/js/Rmni Buwan Ng Wika 2017.mp4" type="video/mp4" >
       </video>-->
        <!--<div id="con"></div>-->
        <div class="modal-footer" style="margin-top: -30px;">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal" id="close_modal">Close</button>-->
        <button type="button" class="btn btn-primary" id="btnsv">click</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("template/footer"); ?>




<script>
$('#myModal').on('show.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
  var firstname=$(opener).attr('first-name');

//set what we got to our form
  $('#profileForm').find('[name="firstname"]').val(firstname);
   
});
</script>

<script>
    
    $(document).ready(function(){
        $("#btnsv").click(function(){
            datas = {
                data : $("#fname").val(),
                ajax : 1
            };
            $.ajax({
                url : "<?php echo site_url();    ?>/playlist/playlist/modalshow/",
                type : "post",
                data : datas,
                success : function(msg){
                    $("#con").html(msg);
                }
            });   
        });
    });
    
    
    </script>

    <script>
         
        </script>