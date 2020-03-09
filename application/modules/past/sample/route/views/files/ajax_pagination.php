<html>
<head>
    <title>Ajax JQuery Pagination in Codeigniter using Bootstrap</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <select id="sel">
    <option value="3">
        1
    </option>
    <option value="20">
        20
    </option>
</select>
 <div class="container box">
  <h3 align="center">Ajax JQuery Pagination in Codeigniter using Bootstrap</h3>
  <div align="right" id="pagination_link"></div>
  <div class="table-responsive" id="country_table"></div>
 </div>
</body>
</html>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo site_url(); ?>/ajax_pagination/pagination/"+page+"/"+$("#sel").val(),
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
