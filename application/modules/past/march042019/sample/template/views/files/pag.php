<!--<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Pagination using Jquery, PHP, Ajax and MySQL</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head> -->
<?php $this->load->view("template/header");	 ?> 
      <body>  
	  <div>
	  <select id='sel'>
	  <option value='1'>
	  1
	  </option>
	  <option value='2'>
	  2
	  </option>
	  <option value='3'>
	  3
	  </option>
	  </select>
	  </div>
           <div class="container">  
                <h3 align="center">Make Pagination using Jquery, PHP, Ajax and MySQL</h3><br />  
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div>  
      </body>  
 <!--</html>  -->
 <?php $this->load->view("template/footer");	 ?> 
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"http://192.168.254.106/rmn/other_page_header/pagination.php?x="+$('#sel').val(),  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  