<div id="message_area">
  <div class="panel-body noPad">
      <table class="table table-bordered">
          <?php
          foreach ($data1 as $key) {
            echo "<tr>";
            echo "<td>" . $key['emp_code'] . "</td>";
            //echo "</tr>";
          }

           ?>
      </table>
</div>
<?php

echo $this->pagination->create_links();
 ?>
</div>
