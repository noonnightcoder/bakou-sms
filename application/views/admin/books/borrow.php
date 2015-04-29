<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/library">Library</a> / Borrow Book</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_subject = array('' => "Select");
                        foreach ($subjects as $row)
                        {
                          $options_subject[$row['id']] = $row['subject_name'];
                        }
                        ?>
                        <?php
                        $options_student = array('' => "Select");
                        foreach ($students as $row)
                        {
                          $options_student[$row['student_id']] = $row['fullname'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/library/borrow/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                
                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('subject_id', $options_subject, $result['subject_id'], 'class="span2" readonly="readonly"');
                                  echo '</div>';
                                echo '</div>';
                                ?>

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Book Name</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="book_name" name="book_name" value="<?php echo $result['book_name']; ?>" readonly="readonly">
                                        <input type="hidden" name="book_id" value="<?php echo $result['id']; ?>" >
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Copy</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="copy" name="copy" value="<?php echo $result['copy']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price" name="price" value="<?php echo $result['price']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Borrower</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('student_id', $options_student, set_value('student_id'), 'class="span2"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Start Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="start_date" class="span2" size="16" type="text" value="<?php echo set_value('start_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Return Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp4" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="return_date" class="span2" size="16" type="text" value="<?php echo set_value('return_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                <?php if($result['copy'] > 0){ ?>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Borrow</button> 
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->
                                <?php }else{ ?>
                                <div class="alert alert-block">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Warning!</strong> This book can not be lend.
                                </div>
                                <?php } ?>
                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    