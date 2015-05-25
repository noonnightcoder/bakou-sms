<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Step 5 of 7 -> Transportation</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="progress progress-striped active">
                            <div class="bar" style="width:68%;"></div>
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
                        
                        $options_transport = array('' => "Select");
                        foreach ($transports as $row)
                        {
                          $options_transport[$row['id']] = $row['route_name'];
                        }
                        
                        $options_vehicle = array('' => "Select");
                        if(isset($vehicles))
                        {
                            foreach ($vehicles as $row)
                            {
                              $options_vehicle[$row['id']] = $row['vehicle_brand'].' ('.$row['vehicle_identity_number'].')';
                            }
                        }
                        
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/admission/transportation/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <input type="hidden" class="span6" id="required" name="required" value="1">
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
                                    <label class="control-label" for="firstname">Skip this step?</label>
                                    <div class="controls">
                                        <a href="<?php echo base_url(); ?>index.php/admin/admission/library/<?php echo $this->uri->segment(4); ?>"><b>Yes, skip</b></a>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Transports</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('transport_id', $options_transport, set_value('transport_id'), $js);
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                <?php
                                if(isset($vehicles))
                                {
                                    echo '<div class="control-group">';
                                      echo '<label for="manufacture_id" class="control-label">Vehicle</label>';
                                      echo '<div class="controls">';
                                        echo form_dropdown('vehicle_id', $options_vehicle, set_value('vehicle_id'), 'class="span6"');
                                      echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                                
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
                                    <label class="control-label" for="firstname">Payment Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp2" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="payment_date" class="span2" size="16" type="text" value="<?php echo set_value('payment_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
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
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_vehicle_description" name="student_vehicle_description"><?php echo set_value('student_vehicle_description'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Register, and go to step 6</button> 
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
                    