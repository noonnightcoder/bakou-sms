<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/library">Library</a></h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_subject = array('' => "Select");
                        foreach ($subjects as $row)
                        {
                          $options_subject[$row['id']] = $row['subject_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/library/add" method="post" id="edit-profile" class="form-horizontal">
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
                                  echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('subject_id', $options_subject, set_value('subject_id'), 'class="span2"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Book Name</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="book_name" name="book_name" value="<?php echo set_value('book_name'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">ISBN</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="isbn" name="isbn" value="<?php echo set_value('isbn'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Author</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="author" name="author" value="<?php echo set_value('author'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Edition</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="edition" name="edition" value="<?php echo set_value('edition'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Publisher</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="publisher" name="publisher" value="<?php echo set_value('publisher'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Copy</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="copy" name="copy" value="<?php echo set_value('copy'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Book Position</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="book_position" name="book_position" value="<?php echo set_value('book_position'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Shelf No</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="shelf_no" name="shelf_no" value="<?php echo set_value('shelf_no'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price" name="price" value="<?php echo set_value('price'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="book_description" name="book_description"><?php echo set_value('book_description'); ?></textarea>
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
                    