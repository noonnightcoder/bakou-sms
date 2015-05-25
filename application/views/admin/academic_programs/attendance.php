<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/academic_programs/<?php echo $this->uri->segment(4); ?>">Academic Programs</a> / Attendance</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_subject = array('' => "Select");
                        foreach ($all_subjects as $row)
                        {
                          $options_subject[$row['id']] = $row['subject_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/academic_programs/attendance/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                <?php
                                    //flash messages
                                    if(isset($flash_message)){
                                        if(@$flash_message == TRUE)
                                        {
                                          echo '<div class="alert alert-success">';
                                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                            echo '<strong>Well done!</strong> marked absence with success.';
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
                                    echo form_dropdown('academic_program_subject_id', $options_subject, set_value('academic_program_subject_id'), 'class="span6"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="absent_date" class="span2" size="16" type="text" value="<?php echo set_value('absent_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Session</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="session" name="session" value="<?php echo set_value('session'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <?php foreach($all_students as $row){ ?>
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname"><?php echo $row['fullname']; ?></label>
                                    <div class="controls">
                                        <input type="checkbox" name="student_id[]" value="<?php echo $row['student_id']; ?>" > Absence                                        
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                <?php } ?>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Mark Absence</button> 
                                    <button class="btn" type="reset">Cancel</button>
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
                    