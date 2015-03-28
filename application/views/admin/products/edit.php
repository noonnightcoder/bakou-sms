<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Products</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/products/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">description</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="description" name="description" value="<?php echo $result['description']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">stock</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="stock" name="stock" value="<?php echo $result['stock']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">cost_price</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="cost_price" name="cost_price" value="<?php echo $result['cost_price']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">sell_price</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="sell_price" name="sell_price" value="<?php echo $result['sell_price']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    <div class="control-group">                                         
                                        <label class="control-label" for="firstname">manufacture_id</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="manufacture_id" name="manufacture_id" value="<?php echo $result['manufacture_id']; ?>">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Update</button> 
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
                    