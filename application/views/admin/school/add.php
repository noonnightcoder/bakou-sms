<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>School</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/school/add" method="post" id="edit-profile" class="form-horizontal" enctype="multipart/form-data">
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
                                    <label class="control-label" for="firstname">School Name</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_name" name="school_name" value="<?php echo set_value('school_name'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 1</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_phone1" name="school_phone1" value="<?php echo set_value('school_phone1'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 2</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_phone2" name="school_phone2" value="<?php echo set_value('school_phone2'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fax</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_fax" name="school_fax" value="<?php echo set_value('school_fax'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Email</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_email" name="school_email" value="<?php echo set_value('school_email'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Website</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="school_website" name="school_website" value="<?php echo set_value('school_website'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Logo</label>
                                    <div class="controls">
                                        <input type="file" class="span6" id="school_logo" name="school_logo" value="<?php echo set_value('school_logo'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Address</label>
                                    <div class="controls">
                                        <textarea class="span6" id="school_address" name="school_address"><?php echo set_value('school_address'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="school_description" name="school_description"><?php echo set_value('school_description'); ?></textarea>
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
                    