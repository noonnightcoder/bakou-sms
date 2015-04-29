<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/vehicles/<?php echo $this->uri->segment(4); ?>">Vehicles</a> / Update Membership</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/vehicles/update/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Vehicle brand</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="vehicle_brand" name="vehicle_brand" value="<?php echo $result['vehicle_brand']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Identity Number</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="vehicle_identity_number" name="vehicle_identity_number" value="<?php echo $result['vehicle_identity_number']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Capacity</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="vehicle_capacity" name="vehicle_capacity" value="<?php echo $result['vehicle_capacity']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Driver</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="driver_name" name="driver_name" value="<?php echo $result['driver_name']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Driver Contact</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="driver_contact" name="driver_contact" value="<?php echo $result['driver_contact']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="vehicle_description" name="vehicle_description" readonly="readonly"><?php echo $result['vehicle_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->
            
            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Membership</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="tabbable">				
                            <ul class="nav nav-tabs">
                                <li><a href="#membership" data-toggle="tab">Membership</a></li>
                                <li class="active"><a href="#newmember" data-toggle="tab">Update Member</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane" id="membership">
                                    <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Effective From</th>
                                        <th>Effective End</th>
                                        <th>Description</th>
                                        <th class="td-actions">Action</th>
                                    </tr>
                                    <?php foreach($memberships as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['effective_from']; ?></td>
                                        <td><?php echo $row['effective_end']; ?></td>
                                        <td><?php echo $row['student_vehicle_description']; ?></td>
                                        <td class="td-actions">
                                        <a href="<?php echo base_url(); ?>index.php/admin/memberships/detail/<?php echo $row['id']; ?>"><button class="btn btn-info">Detail</button></a>
                                        <a href="<?php echo base_url(); ?>index.php/admin/vehicles/update_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>"><button class="btn btn-success">Update</button></a>
                                        <a onclick="confirm_delete('admin/vehicles/delete_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')"><button class="btn btn-danger">Remove</button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>
                                </div>

                                <div class="tab-pane active" id="newmember">
                                    <?php
                                    $options_student = array('' => "Select");
                                    foreach ($students as $row)
                                    {
                                      $options_student[$row['id']] = $row['fullname'];
                                    }
                                    ?>
                                    <form action="<?php echo base_url(); ?>index.php/admin/vehicles/update_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                          echo '<label for="manufacture_id" class="control-label">Student Name</label>';
                                          echo '<div class="controls">';
                                            echo form_dropdown('student_id', $options_student, $member['student_id'], 'class="span2"');
                                          echo '</div>';
                                        echo '</div>';
                                        ?>
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Amount (USD)</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="amount" name="amount" value="<?php echo $member['amount']; ?>">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Effective From</label>
                                            <div class="controls">
                                                <div class="input-append date" id="dp3" data-date="<?php echo $member['effective_from']; ?>" data-date-format="yyyy-mm-dd">
                                                    <input name="effective_from" class="span2" size="16" type="text" value="<?php echo $member['effective_from']; ?>" readonly>
                                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Effective End</label>
                                            <div class="controls">
                                                <div class="input-append date" id="dp4" data-date="<?php echo $member['effective_end']; ?>" data-date-format="yyyy-mm-dd">
                                                    <input name="effective_end" class="span2" size="16" type="text" value="<?php echo $member['effective_end']; ?>" readonly>
                                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Description</label>
                                            <div class="controls">
                                                <textarea class="span6" id="student_vehicle_description" name="student_vehicle_description"><?php echo $member['student_vehicle_description']; ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Save</button> 
                                            <button class="btn">Cancel</button>
                                        </div> <!-- /form-actions -->
                                        
                                    </fieldset>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    