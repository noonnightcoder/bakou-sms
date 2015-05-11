<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/transport_memberships/<?php echo $this->uri->segment(4); ?>">Memberships</a> / Add New Membership</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $js = 'onChange="this.form.submit()" class="span6"';
                        
                        $options_transport = array('' => "Select");
                        foreach ($transports as $row)
                        {
                          $options_transport[$row['id']] = $row['route_name'];
                        }
                        
                        $options_student = array('' => "Select");
                        foreach ($students as $row)
                        {
                          $options_student[$row['id']] = $row['fullname'];
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
                        <form action="<?php echo base_url(); ?>index.php/admin/transports/add_membership" method="post" id="edit-profile" class="form-horizontal">
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
                                  echo '<label for="manufacture_id" class="control-label">Student</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('student_id', $options_student, set_value('student_id'), 'class="span6"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
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
                                        <textarea class="span6" id="student_vehicle_description" name="student_vehicle_description"><?php echo set_value('student_vehicle_description'); ?></textarea>
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
                    