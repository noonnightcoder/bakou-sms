<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/memberships">Membership</a> / Purchase Book</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        
                        <form action="<?php echo base_url(); ?>index.php/admin/memberships/purchase/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                <?php
                                    //flash messages
                                    if(isset($flash_message)){
                                        if(@$flash_message == TRUE)
                                        {
                                          echo '<div class="alert alert-success">';
                                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                            echo '<strong>Well done!</strong> purchased with success.';
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
                                    <label class="control-label" for="firstname">Books</label>
                                    <div class="controls">
                                        <select id="example-post" name="book_id[]" multiple="multiple">
                                            <?php foreach($result as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['subject_name'].' -> '.$row['book_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Purchased Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                            <input name="purchased_date" class="span2" size="16" type="text" value="<?php echo set_value('start_date'); ?>" readonly>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_book_purchase_description" name="student_book_purchase_description"><?php echo set_value('student_book_purchase_description'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Purchase</button> 
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
                    