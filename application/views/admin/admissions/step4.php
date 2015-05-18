<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Step 4 of 7 -> Purchase Book</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="progress progress-striped active">
                            <div class="bar" style="width:51%;"></div>
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
                        <form action="<?php echo base_url(); ?>index.php/admin/admission/purchase/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                    <label class="control-label" for="firstname">Required?</label>
                                    <div class="controls">
                                        <input type="checkbox" class="span6" id="photo" name="required" value="1" checked="checked" />
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
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
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="student_book_purchase_description" name="student_book_purchase_description"><?php echo set_value('student_book_purchase_description'); ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Purchase, and go to step 5</button> 
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
                    