<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Step 3 of 7 -> Add New Admission</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="progress progress-striped active">
                            <div class="bar" style="width:34%;"></div>
                        </div>
                        
                        <?php if($promotion != NULL){ ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Promotion! <?php echo $promotion['promotion_name']; ?></h4>
                            <h5>Discount Percentage: <?php echo $promotion['discount_percentage']; ?> %</h5>
                            <h5>Discount Amount: <?php echo $promotion['discount_amount']; ?> USD</h5>
                            <h5>Effective From: <?php echo $promotion['effective_from']; ?></h5>
                            <h5>Effective End: <?php echo $promotion['effective_end']; ?></h5>
                            <h5>Description: <?php echo $promotion['promotion_description']; ?></h5>
                        </div>
                        <?php } ?>              
                        <?php
                        $js = 'onChange="this.form.submit()" class="span6"';
                        
                        $options_academic_program = array('' => "Select");
                        foreach ($academic_programs as $row)
                        {
                          $options_academic_program[$row['id']] = 'Faculty: '.$row['faculty_name'].' Department: '.$row['department_name'].' Class: '.$row['class_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/admission/admission/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                    <label class="control-label" for="firstname">Admission Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp2" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="admission_date" class="span2" size="16" type="text" value="<?php echo set_value('admission_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
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
                                
                                <?php if($promotion != NULL){ ?>
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Discount Percentage</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="discount_percentage" name="discount_percentage" value="<?php echo $promotion['discount_percentage']; ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Discount Amount (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="discount_amount" name="discount_amount" value="<?php echo $promotion['discount_amount']; ?>">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                <?php } ?>
                                

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Effective From</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="<?php echo date("Y-m-01"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="effective_from" class="span2" size="16" type="text" value="<?php echo set_value('effective_from'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Effective End</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp4" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="effective_end" class="span2" size="16" type="text" value="<?php echo set_value('effective_end'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Additional Services</label>
                                    <div class="controls">
                                        <select id="example-post" name="service_id[]" multiple="multiple">
                                            <?php foreach($services as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['service_name'].' -> '.$row['service_price']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_academic_program_description" name="student_academic_program_description"><?php echo set_value('student_academic_program_description'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save, and go to step 4</button> 
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
                    