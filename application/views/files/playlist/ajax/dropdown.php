<div class="form-group">
                                        <label>File Name:</label>
                                    <select class="form-control">
                                                <option id="load_client_adds">  </option>
                                                
                                            </select>
                                        <button id="load_adds">click</button>
                                        </div><!-- /.form group -->
<?php foreach($data as $data){
                                                    echo $data->client_name . "</br>";
                                                }    ?>
