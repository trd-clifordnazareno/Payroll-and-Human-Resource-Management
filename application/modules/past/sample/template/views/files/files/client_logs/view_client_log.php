<?php $this->load->view('template/header'); ?>

    
 <div class="container box">
     <select id="sel" style="margin-top: 10px; margin-bottom:  10px; ">
        
        
       <?php for($i = 1;$i<100;$i++) : ?>
            <option value=<?php echo $i; ?>><?php echo $i; ?></option>;
        <?php   endfor ; ?>
        
        
        
    </select>
     
  <div class="table-responsive" id="country_table"></div>
  
  <div align="right" id="pagination_link"></div>
  
 </div>

<?php $this->load->view('template/footer'); ?>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo site_url(); ?>/display_client_ogin_logs/display_client_login/pagination/"+page+"/"+$("#sel").val(),
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });

});
</script>
