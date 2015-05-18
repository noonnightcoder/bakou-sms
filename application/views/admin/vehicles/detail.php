<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/vehicles/<?php echo $this->uri->segment(4); ?>">Vehicles</a> / Detail</h3>
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
                                <li class="active"><a href="#membership" data-toggle="tab">Membership</a></li>
                                <li><a href="#newmember" data-toggle="tab">Add New Member</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="membership">
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
                                        <a href="<?php echo base_url(); ?>index.php/admin/vehicles/detail_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>"><button class="btn btn-info">Detail</button></a>
                                        <a href="<?php echo base_url(); ?>index.php/admin/vehicles/update_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>"><button class="btn btn-success">Update</button></a>
                                        <a onclick="confirm_delete('admin/vehicles/delete_membership/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')"><button class="btn btn-danger">Remove</button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </table>
                                </div>

                                <div class="tab-pane " id="newmember">
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
                                    
                                    <form action="<?php echo base_url(); ?>index.php/admin/vehicles/detail/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                            <label class="control-label" for="firstname">Student Name</label>
                                            <div class="controls">
                                                <select id="example-post" name="student_id[]" multiple="multiple">
                                                    <?php foreach($students as $row) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
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
                    