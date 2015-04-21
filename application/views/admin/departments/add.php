<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/departments/<?php echo $this->uri->segment(4); ?>">Departments</a></h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/departments/add/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Department Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="department_name" name="department_name" value="<?php echo set_value('department_name'); ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Phone Line 1</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="department_phone1" name="department_phone1" value="<?php echo set_value('department_phone1'); ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Phone Line 2</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="department_phone2" name="department_phone2" value="<?php echo set_value('department_phone2'); ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Fax</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="department_fax" name="department_fax" value="<?php echo set_value('department_fax'); ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Description</label>
                                        <div class="controls">
                                            <textarea class="span6" id="department_description" name="department_description"><?php echo set_value('department_description'); ?></textarea>
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save</button> 
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
                    