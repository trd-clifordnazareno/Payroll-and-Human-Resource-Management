<div id="content"> 
<div class="form-group">
    <p id="msg"></p>
     <div class="form-group">
                                        <label>Playlist Number:</label>
                                    <select class="form-control" id="playlist_number" style="height: 50px; font-size: 3rem;">
                                                <option value="<?php echo $sequence;   ?>"><?php echo $sequence;   ?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                                <option value="60">60</option>
                                                <option value="61">61</option>
                                                <option value="62">62</option>
                                                <option value="63">63</option>
                                                <option value="64">64</option>
                                                <option value="65">65</option>
                                                <option value="66">66</option>
                                                <option value="67">67</option>
                                                <option value="68">68</option>
                                                <option value="69">69</option>
                                                <option value="70">70</option>
                                                <option value="71">71</option>
                                                <option value="72">72</option>
                                                <option value="73">73</option>
                                                <option value="74">74</option>
                                                <option value="75">75</option>
                                                <option value="76">76</option>
                                                <option value="77">77</option>
                                                <option value="78">78</option>
                                                <option value="79">79</option>
                                                <option value="80">80</option>
                                                <option value="81">81</option>
                                                <option value="82">82</option>
                                                <option value="83">83</option>
                                                <option value="84">84</option>
                                                <option value="85">85</option>
                                                <option value="86">86</option>
                                                <option value="87">87</option>
                                                <option value="88">88</option>
                                                <option value="89">89</option>
                                                <option value="90">90</option>
                                                <option value="91">91</option>
                                                <option value="92">92</option>
                                                <option value="93">93</option>
                                                <option value="94">94</option>
                                                <option value="95">95</option>
                                                <option value="96">96</option>
                                                <option value="97">97</option>
                                                <option value="98">98</option>
                                                <option value="99">99</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div><!-- /.form group -->
                                        <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Client Name:</label>
                                    <select class="form-control" id="client_code" style="height: 50px; font-size: 3rem;">
                                                <option id="clients">  </option>
                                                <?php  foreach($clients as $data){
                                                    echo "<option value=$data->client_code>" . $data->client_name . "</option>";
                                                }    ?>
                                            </select>
                                        <button id="load_adds" class="btn bg-navy margin">Load Client's Adds</button>
                                        </div><!-- /.form group -->
                                        
                                        
                                        
                                        
                                        
                                        <div class="form-group">
                                        <label>File Name:</label>
                                        <select class="form-control" id="load_client_adds" style="height: 50px; font-size: 3rem;">
                                                <option>  </option>
                                                
                                            </select>
                                        </div><!-- /.form group -->
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                     <!--</div><!-- /.form group -->
                                        <!--<label>Location</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="location_code">
                                    </div><!-- /.form group -->
                                    
                                     
                                    
                                    <!--<div class="form-group">
                                        <label>Length:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="length">
                                    </div><!-- /.form group -->
                                    
                                    
                                        
                                    
                                    
                                    
                                    
                                    
                                    <div class="row">
                        <div class="col-md-6">
                            <!-- Navy tile -->
                            <div class="box box-solid bg-navy">
                                <div class="box-header" style="
    margin-bottom: 9px;
">
                                    <h3 class="box-title">Start Date:</h3>
                                </div>
                                <label><!--Start Time:--></label>   
                                <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="startdate" style="height: 50px; font-size: 3rem;" value="<?php echo date('Y-m-d'); ?>">
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <!-- Primary tile -->
                            <div class="box box-solid bg-light-blue">
                                <div class="box-header">
                                    <h3 class="box-title">Start Time:</h3>
                                </div>
                                
                                
                               <div class="form-group">
                                        <label><!--Start Date:--></label>                                         
                                        
                                        <select class="form-control" id="starttime" style="margin-top: 9px; height: 50px; font-size: 3rem;">
                                                <option value="<?php echo date('h A'); ?>"><?php echo date('h A'); ?></option>
                                                <option value="01:00">01 AM</option>
                                                <option value="02:00">02 AM</option>
                                                <option value="03:00">03 AM</option>
                                                <option value="04:00">04 AM</option>
                                                <option value="05:00">05 AM</option>
                                                <option value="06:00">06 AM</option>
                                                <option value="07:00">07 AM</option>
                                                <option value="08:00">08 AM</option>
                                                <option value="09:00">09 AM</option>
                                                <option value="10:00">10 AM</option>
                                                <option value="11:00">11 AM</option>
                                                <option value="12:00">12 PM</option>
                                                <option value="13:00">01 PM</option>
                                                <option value="14:00">02 PM</option>
                                                <option value="15:00">03 PM</option>
                                                <option value="16:00">04 PM</option>
                                                <option value="17:00">05 PM</option>
                                                <option value="18:00">06 PM</option>
                                                <option value="19:00">07 PM</option>
                                                <option value="20:00">08 PM</option>
                                                <option value="21:00">09 PM</option>
                                                <option value="22:00">10 PM</option>
                                                <option value="23:00">11 PM</option>
                                                <option value="23:59">12 AM</option>
                                            </select>
                                    </div><!-- /.form group -->
                                
                                
                                
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        
                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="row">
                        <div class="col-md-6">
                            <!-- Navy tile -->
                            <div class="box box-solid bg-navy">
                                <div class="box-header" style="
    margin-bottom: 9px;
">
                                    <h3 class="box-title">Expiry Date:</h3>
                                </div>
                                <label><!--Expiry Date:--></label>   
                                <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="expiredate" style="height: 50px; font-size: 3rem;" value="<?php echo date('Y-m-d'); ?>">
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <!-- Primary tile -->
                            <div class="box box-solid bg-light-blue">
                                <div class="box-header">
                                    <h3 class="box-title">Expiry Time:</h3>
                                </div>
                                
                                
                                <div class="form-group">
                                        <label><!--Expiry Date:--></label>                                         
                                        
                                        <select class="form-control" id="expiretime" style="margin-top: 9px; height: 50px; font-size: 3rem;">
                                            <option value="<?php echo date('h A'); ?>"><?php echo date('h A'); ?></option>
                                                 <option value="01:00">1 AM</option>
                                                <option value="02:00">2 AM</option>
                                                <option value="03:00">3 AM</option>
                                                <option value="04:00">4 AM</option>
                                                <option value="05:00">5 AM</option>
                                                <option value="06:00">6 AM</option>
                                                <option value="07:00">7 AM</option>
                                                <option value="08:00">8 AM</option>
                                                <option value="09:00">9 AM</option>
                                                <option value="10:00">10 AM</option>
                                                <option value="11:00">11 AM</option>
                                                <option value="12:00">12 PM</option>
                                                <option value="13:00">1 PM</option>
                                                <option value="14:00">2 PM</option>
                                                <option value="15:00">3 PM</option>
                                                <option value="16:00">4 PM</option>
                                                <option value="17:00">5 PM</option>
                                                <option value="18:00">6 PM</option>
                                                <option value="19:00">7 PM</option>
                                                <option value="20:00">8 PM</option>
                                                <option value="21:00">9 PM</option>
                                                <option value="22:00">10 PM</option>
                                                <option value="23:00">11 PM</option>
                                                <option value="23:59">12 AM</option>
                                            </select>
                                    </div><!-- /.form group -->
                                
                                
                                
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        
                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div>
                                     </div>
<?php //echo $segmt; this is id of location_id  ?>
<!--client_name file_name lenght start_date expiry_date-->



<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            clientname : $("#client_code").val(),
                                            filename : $("#load_client_adds").val(),
                                            //length : $("#length").val(),
                                            startdate : $("#startdate").val(),
                                            starttime : $("#starttime").val(),
                                            expiredate : $("#expiredate").val(),
                                            expiretime : $("#expiretime").val(),
                                            playlist_number : $("#playlist_number").val(),
                                            location_code : "<?php echo $segmt;   ?>",
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/playlist/playlist/add_new_content",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                              $("#content").html(msg);
                                               
                                            }
                                        });
                                    });
                                });
                                </script>
                                <script>
                                    $(document).ready(function(){
                                    $("#load_adds").click(function(){
                                        var datas = {
                                            client_code : $("#client_code").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/clients_add",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                              $("#load_client_adds").html(msg);
                                               
                                            }
                                        });
                                    });
                                });
                                    </script>
                                
                                
                                
                                
                                