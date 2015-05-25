<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/memberships">Membership</a> / Student Detail</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/students/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Current Photo</label>
                                    <div class="controls">
                                        <img src='<?php echo $student['photo']; ?>' width='150px' height='150px' />
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname" name="fullname" value="<?php echo $student['fullname']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Fullname in Khmer</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="fullname_in_khmer" name="fullname_in_khmer" value="<?php echo $student['fullname_in_khmer'];; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Sex</label>
                                    <div class="controls">
                                        <select id="sex" name="sex" disabled="disabled">
                                            <option value="Male" <?php if($student['sex'] == 'Male'){ ?> selected="selected" <?php } ?>>Male</option>
                                            <option value="Female" <?php if($student['sex'] == 'Female'){ ?> selected="selected" <?php } ?>>Female</option>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Birthday</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2000-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="birthday" class="span2" size="16" type="text" value="<?php echo $student['birthday'];; ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                        <!-- <input type="text" class="span6" id="birthday" name="birthday" value="<?php //echo set_value('birthday'); ?>"> -->
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Place of Birth</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="birthplace" readonly="readonly"><?php echo $student['birthplace']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Address</label>
                                    <div class="controls">
                                        <textarea class="span6" id="address" name="address" readonly="readonly"><?php echo $student['address']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 1</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone1" name="phone1" value="<?php echo $student['phone1']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Phone Line 2</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="phone2" name="phone2" value="<?php echo $student['phone2']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_description" name="student_description" readonly="readonly"><?php echo $student['student_description'];; ?></textarea>
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
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/memberships">Membership</a> / Membership Detail</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="tabbable">				
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#membership" data-toggle="tab">Membership</a></li>
                                <li><a href="#history" data-toggle="tab">History</a></li>
                                <li><a href="#purchase" data-toggle="tab">Purchase</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="membership">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Effective From</th>
                                        <th>Effective End</th>
                                        <th>Description</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $result['effective_from']; ?></td>
                                        <td><?php echo $result['effective_end']; ?></td>
                                        <td><?php echo $result['student_library_description']; ?></td>
                                    </tr>
                                </table>    
                                </div>
                                <div class="tab-pane " id="history">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Subject</th>
                                            <th>Book Name</th>
                                            <th>Start Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php foreach($return_books as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['book_name']; ?></td>
                                            <td><?php echo $row['start_date']; ?></td>
                                            <td><?php echo $row['return_date']; ?></td>
                                            <td><?php echo ($row['status']==0) ? 'Return' : 'On Borrowing'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    
                                </div>
                                <div class="tab-pane " id="purchase">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Purchased Date</th>
                                            <th>Subject</th>
                                            <th>Book Name</th>
                                            <th>Price</th>
                                            <th>Discount Percentage</th>
                                            <th>Discount Amount</th>
                                            <th>Last Amount</th>
                                            <th>Description</th>
                                        </tr>
                                        <?php foreach($purchase_books as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['purchased_date']; ?></td>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['book_name']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['discount_percentage']; ?></td>
                                            <td><?php echo $row['discount_amount']; ?></td>
                                            <td><?php echo $row['last_amount']; ?></td>
                                            <td><?php echo $row['student_book_purchase_description']; ?></td>
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
                    