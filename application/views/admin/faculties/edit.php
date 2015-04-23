<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/faculties">Faculties</a> / Update</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/faculties/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                        <label class="control-label" for="firstname">Faculty Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="faculty_name" name="faculty_name" value="<?php echo $result['faculty_name']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Phone Line 1</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="faculty_phone1" name="faculty_phone1" value="<?php echo $result['faculty_phone1']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Phone Line 2</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="faculty_phone2" name="faculty_phone2" value="<?php echo $result['faculty_phone2']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Fax</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="faculty_fax" name="faculty_fax" value="<?php echo $result['faculty_fax']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">Description</label>
                                        <div class="controls">
                                            <textarea class="span6" id="faculty_description" name="faculty_description"><?php echo $result['faculty_description']; ?></textarea>
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
                    