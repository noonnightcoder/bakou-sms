<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Step 1 of 7 -> Student Personal Info</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="progress progress-striped active">
                            <div class="bar" style="width:0%;"></div>
                        </div>
                        <?php
                        $options_student_type = array('' => "Select");
                        foreach ($student_types as $row)
                        {
                          $options_student_type[$row['id']] = $row['student_type'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/admission" method="post" id="edit-profile" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                <?php
                                    //flash messages
                                    if(isset($flash_message)){
                                        if(@$flash_message == TRUE)
                                        {
                                          echo '<div class="alert alert-success">';
                                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                            echo '<strong>Well done!</strong> created with success.';
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
                                
                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Student Type</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('student_type_id', $options_student_type, set_value('student_type_id'), 'class="span2"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Registered Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp2" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="registered_date" class="span2" size="16" type="text" value="<?php echo date("Y-m-d"); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">ID Number</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="student_id_number" name="student_id_number" value="<?php echo set_value('student_id_number'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Photo</label>
                                    <div class="controls">
                                        <input type="file" class="span6" id="photo" name="photo" >
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname in Khmer</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname_in_khmer" name="fullname_in_khmer" value="<?php echo set_value('fullname_in_khmer'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Sex</label>
                                    <div class="controls">
                                        <select id="sex" name="sex">
                                            <option value="Male" <?php if(set_value('sex') == 'Male'){ ?> selected="selected" <?php } ?>>Male</option>
                                            <option value="Female" <?php if(set_value('sex') == 'Female'){ ?> selected="selected" <?php } ?>>Female</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Birthday</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2000-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="birthday" class="span2" size="16" type="text" value="<?php echo set_value('birthday'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                        <!-- <input type="text" class="span6" id="birthday" name="birthday" value="<?php //echo set_value('birthday'); ?>"> -->
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Place of Birth</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="birthplace"><?php echo set_value('birthplace'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                         
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Address</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="address"><?php echo set_value('address'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 1</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone1" name="phone1" value="<?php echo set_value('phone1'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 2</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone2" name="phone2" value="<?php echo set_value('phone2'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_description" name="student_description"><?php echo set_value('student_description'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save, and go to step 2</button> 
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
                    