<div id="tab">
<div class="col-xs-12 col-md-12">
        <table class="table table-condensed table-hover table-bordered">
            <thead>
            <tr>
                <th>Location Code</th>
                <th>Subject</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($get_loc as $get_loc){
                ?>
                <tr>
                <td><?php  echo $get_loc->location_code;  ?></td>
                <td><?php  echo $get_loc->location_name;  ?></td>
                 <td><?php  echo "ok";  ?></td>
               
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

