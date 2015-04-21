<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/noticeboards">Noticeboards</a></h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/noticeboards/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                <?php
                                    //flash messages
                                    if(isset($flash_message)){
                                        if(@$flash_message == TRUE)
                                        {
                                          echo '<div class="alert alert-success">';
                                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                            echo '<strong>Well done!</strong> updated with success.';
                                          echo '</div>';       
                                        }else{
                                          echo '<div class="alert">';
                                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
                                          echo '</div>';          
                                        }
                                    }
                                ?>
                                <?php 
                                    //form validation
                                    echo validation_errors(); 
                                ?>
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Title</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="notice_title" name="notice_title" value="<?php echo $result['notice_title']; ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="notice_description" name="notice_description"><?php echo $result['notice_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Start Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="start_date" class="span2" size="16" type="text" value="<?php echo $result['start_date']; ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Time Start</label>
                                    <div class="controls">
                                        <select name="hour1" class="form-control">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
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
                                        </select>
                                        <select name="minute1" class="form-control">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
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
                                            <option value="00">24</option>
                                            <option value="01">25</option>
                                            <option value="02">26</option>
                                            <option value="03">27</option>
                                            <option value="04">28</option>
                                            <option value="05">29</option>
                                            <option value="06">30</option>
                                            <option value="07">31</option>
                                            <option value="08">32</option>
                                            <option value="09">33</option>
                                            <option value="10">34</option>
                                            <option value="11">35</option>
                                            <option value="12">36</option>
                                            <option value="13">37</option>
                                            <option value="14">38</option>
                                            <option value="15">39</option>
                                            <option value="16">40</option>
                                            <option value="17">41</option>
                                            <option value="18">42</option>
                                            <option value="19">43</option>
                                            <option value="20">44</option>
                                            <option value="21">45</option>
                                            <option value="22">46</option>
                                            <option value="23">47</option>
                                            <option value="09">48</option>
                                            <option value="10">49</option>
                                            <option value="11">50</option>
                                            <option value="12">51</option>
                                            <option value="13">52</option>
                                            <option value="14">53</option>
                                            <option value="15">54</option>
                                            <option value="16">55</option>
                                            <option value="17">56</option>
                                            <option value="18">57</option>
                                            <option value="19">58</option>
                                            <option value="20">59</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">End Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp4" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="end_date" class="span2" size="16" type="text" value="<?php echo $result['end_date']; ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">End Time</label>
                                    <div class="controls">
                                        <select name="hour2" class="form-control">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
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
                                        </select>
                                        <select name="minute2" class="form-control">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
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
                                            <option value="00">24</option>
                                            <option value="01">25</option>
                                            <option value="02">26</option>
                                            <option value="03">27</option>
                                            <option value="04">28</option>
                                            <option value="05">29</option>
                                            <option value="06">30</option>
                                            <option value="07">31</option>
                                            <option value="08">32</option>
                                            <option value="09">33</option>
                                            <option value="10">34</option>
                                            <option value="11">35</option>
                                            <option value="12">36</option>
                                            <option value="13">37</option>
                                            <option value="14">38</option>
                                            <option value="15">39</option>
                                            <option value="16">40</option>
                                            <option value="17">41</option>
                                            <option value="18">42</option>
                                            <option value="19">43</option>
                                            <option value="20">44</option>
                                            <option value="21">45</option>
                                            <option value="22">46</option>
                                            <option value="23">47</option>
                                            <option value="09">48</option>
                                            <option value="10">49</option>
                                            <option value="11">50</option>
                                            <option value="12">51</option>
                                            <option value="13">52</option>
                                            <option value="14">53</option>
                                            <option value="15">54</option>
                                            <option value="16">55</option>
                                            <option value="17">56</option>
                                            <option value="18">57</option>
                                            <option value="19">58</option>
                                            <option value="20">59</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button> 
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    