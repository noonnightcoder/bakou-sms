<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/students">Students</a> / Add New Admission</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $js = 'onChange="this.form.submit()" class="span6"';
                        
                        $options_academic_program = array('' => "Select");
                        foreach ($academic_programs as $row)
                        {
                          $options_academic_program[$row['id']] = 'Faculty: '.$row['faculty_name'].' Department: '.$row['department_name'].' Class: '.$row['class_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/admission/<?php echo $this->uri->segment(3); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                  echo '<label for="manufacture_id" class="control-label">Academic Program</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('academic_program_id', $options_academic_program, set_value('academic_program_id'), $js);
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                <?php if(isset($result)) { ?>
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="academic_program_description" name="academic_program_description" readonly="readonly"><?php echo $result['academic_program_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Full Price (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="full_program_price" name="full_program_price" value="<?php echo $result['full_program_price']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Start Date</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="start_date" name="start_date" value="<?php echo $result['start_date']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">End Date</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="end_date" name="end_date" value="<?php echo $result['end_date']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Semester</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_semester" name="number_of_semester" value="<?php echo $result['number_of_semester']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price per Semester (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_semester" name="price_per_semester" value="<?php echo $result['price_per_semester']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Term</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_term" name="number_of_term" value="<?php echo $result['number_of_term']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price per Term (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_term" name="price_per_term" value="<?php echo $result['price_per_term']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Month</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_month" name="number_of_month" value="<?php echo $result['number_of_month']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price per Month (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_month" name="price_per_month" value="<?php echo $result['price_per_month']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                <?php } ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Amount (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="amount" name="amount" value="<?php echo set_value('amount'); ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Effective From</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="effective_from" class="span2" size="16" type="text" value="<?php echo set_value('effective_from'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Effective End</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp4" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="effective_end" class="span2" size="16" type="text" value="<?php echo set_value('effective_end'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_academic_program_description" name="student_academic_program_description"><?php echo set_value('student_academic_program_description'); ?></textarea>
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
                    