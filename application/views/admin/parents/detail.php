<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/parents/<?php echo $this->uri->segment(4); ?>">Parents</a></h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/parents/update/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Relationship</label>
                                    <div class="controls">
                                        <select id="relationship" name="relationship" disabled="disabled">
                                            <option value="Father" <?php if($result['relationship'] == 'Father'){ ?> selected="selected" <?php } ?>>Father</option>
                                            <option value="Mother" <?php if($result['relationship'] == 'Mother'){ ?> selected="selected" <?php } ?>>Mother</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname" name="fullname" value="<?php echo $result['fullname']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname in Khmer</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname_in_khmer" name="fullname_in_khmer" value="<?php echo $result['fullname_in_khmer']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Birthday</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2000-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="birthday" class="span2" size="16" type="text" value="<?php echo $result['birthday']; ?>" readonly="readonly">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                        <!-- <input type="text" class="span6" id="birthday" name="birthday" value="<?php //echo set_value('birthday'); ?>"> -->
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Sex</label>
                                    <div class="controls">
                                        <select id="sex" name="sex" disabled="disabled">
                                            <option value="Male" <?php if($result['sex'] == 'Male'){ ?> selected="selected" <?php } ?>>Male</option>
                                            <option value="Female" <?php if($result['sex'] == 'Female'){ ?> selected="selected" <?php } ?>>Female</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Profession</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="profession" name="profession" value="<?php echo $result['profession']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Address</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="address" readonly="readonly"><?php echo $result['address']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 1</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone1" name="phone1" value="<?php echo $result['phone1']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 2</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone2" name="phone2" value="<?php echo $result['phone2']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="parent_description" name="parent_description" readonly="readonly"><?php echo $result['parent_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    