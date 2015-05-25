<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/students">Students</a> / History</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_student_type = array('' => "Select");
                        foreach ($student_types as $row)
                        {
                          $options_student_type[$row['id']] = $row['student_type'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/students/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal" enctype="multipart/form-data">
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
                                  echo '<label for="manufacture_id" class="control-label">Student Type</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('student_type_id', $options_student_type, $result['student_type_id'], 'class="span2" readonly="readonly"');
                                  echo '</div>';
                                echo '</div>';
                                ?>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">ID Number</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="student_id_number" name="student_id_number" value="<?php echo $result['student_id_number']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Registered Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp2" data-date="<?php echo $result['registered_date']; ?>" data-date-format="yyyy-mm-dd">
                                            <input name="registered_date" class="span2" size="16" type="text" value="<?php echo $result['registered_date']; ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Current Photo</label>
                                    <div class="controls">
                                        <img src='<?php echo $result['photo']; ?>' width='150px' height='150px' />
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname" name="fullname" value="<?php echo $result['fullname']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname in Khmer</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname_in_khmer" name="fullname_in_khmer" value="<?php echo $result['fullname_in_khmer'];; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Sex</label>
                                    <div class="controls">
                                        <select id="sex" name="sex" readonly="readonly">
                                            <option value="Male" <?php if($result['sex'] == 'Male'){ ?> selected="selected" <?php } ?>>Male</option>
                                            <option value="Female" <?php if($result['sex'] == 'Female'){ ?> selected="selected" <?php } ?>>Female</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Birthday</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2000-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="birthday" class="span2" size="16" type="text" value="<?php echo $result['birthday'];; ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                        <!-- <input type="text" class="span6" id="birthday" name="birthday" value="<?php //echo set_value('birthday'); ?>"> -->
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Place of Birth</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="birthplace" readonly="readonly"><?php echo $result['birthplace']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Address</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="address" readonly="readonly"><?php echo $result['address']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 1</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone1" name="phone1" value="<?php echo $result['phone1']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 2</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone2" name="phone2" value="<?php echo $result['phone2']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_description" name="student_description" readonly="readonly"><?php echo $result['student_description'];; ?></textarea>
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
                        <h3>History</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#admission" data-toggle="tab">Admission</a></li>
                                <li><a href="#service" data-toggle="tab">Additional Service</a></li>
                                <li><a href="#book" data-toggle="tab">Purchasing Book</a></li>
                                <li><a href="#transportation" data-toggle="tab">Transportation</a></li>
                                <li><a href="#library" data-toggle="tab">Library</a></li>
                            </ul>
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="admission">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Admission Date</th>
                                            <th>Faculty</th>
                                            <th>Department</th>
                                            <th>Class</th>
                                            <th>Effective From</th>
                                            <th>End</th>
                                            <th>Amount</th>
                                            <th>Discount Percentage</th>
                                            <th>Discount Amount</th>
                                            <th>Last Amount</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php foreach($admissions as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['admission_date']; ?></td>
                                            <td><?php echo $row['faculty_name']; ?></td>
                                            <td><?php echo $row['department_name']; ?></td>
                                            <td><?php echo $row['class_name']; ?></td>
                                            <td><?php echo $row['effective_from']; ?></td>
                                            <td><?php echo $row['effective_end']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['discount_percentage']; ?></td>
                                            <td><?php echo $row['discount_amount']; ?></td>
                                            <td><?php echo $row['last_amount']; ?></td>
                                            <td><?php echo ($row['status'] == 1) ? 'On Processing' : 'In Active'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>

                                <div class="tab-pane " id="service">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Service Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                        <?php foreach($services as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['payment_date']; ?></td>
                                            <td><?php echo $row['service_name']; ?></td>
                                            <td><?php echo $row['service_description']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                
                                <div class="tab-pane " id="book">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Purchased Date</th>
                                            <th>Subject</th>
                                            <th>Book Name</th>
                                            <th>Amount</th>
                                            <th>Discount Percentage</th>
                                            <th>Discount Amount</th>
                                            <th>Last Amount</th>
                                        </tr>
                                        <?php foreach($books as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['purchased_date']; ?></td>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['book_name']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['discount_percentage']; ?></td>
                                            <td><?php echo $row['discount_amount']; ?></td>
                                            <td><?php echo $row['last_amount']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                
                                <div class="tab-pane " id="transportation">    
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Route Name</th>
                                            <th>Vehicle Brand</th>
                                            <th>ID Number</th>
                                            <th>Amount</th>
                                            <th>Discount Percentage</th>
                                            <th>Discount Amount</th>
                                            <th>Last Amount</th>
                                            <th>Effective From</th>
                                            <th>Effective End</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php foreach($vehicles as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['payment_date']; ?></td>
                                            <td><?php echo $row['route_name']; ?></td>
                                            <td><?php echo $row['vehicle_brand']; ?></td>
                                            <td><?php echo $row['vehicle_identity_number']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['discount_percentage']; ?></td>
                                            <td><?php echo $row['discount_amount']; ?></td>
                                            <td><?php echo $row['last_amount']; ?></td>
                                            <td><?php echo $row['effective_from']; ?></td>
                                            <td><?php echo $row['effective_end']; ?></td>
                                            <td><?php echo ($row['status'] == 1) ? 'On Processing' : 'In Active'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                
                                <div class="tab-pane " id="library">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Amount</th>
                                            <th>Discount Percentage</th>
                                            <th>Discount Amount</th>
                                            <th>Last Amount</th>
                                            <th>Effective From</th>
                                            <th>Effective End</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php foreach($vehicles as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['payment_date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['discount_percentage']; ?></td>
                                            <td><?php echo $row['discount_amount']; ?></td>
                                            <td><?php echo $row['last_amount']; ?></td>
                                            <td><?php echo $row['effective_from']; ?></td>
                                            <td><?php echo $row['effective_end']; ?></td>
                                            <td><?php echo ($row['status'] == 1) ? 'On Processing' : 'In Active'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
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
                    