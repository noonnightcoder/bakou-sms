<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/library">Library</a></h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_subject = array('' => "Select");
                        foreach ($subjects as $row)
                        {
                          $options_subject[$row['id']] = $row['subject_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/library/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
                            <fieldset>
                                
                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('subject_id', $options_subject, $result['subject_id'], 'class="span2" readonly="readonly"');
                                  echo '</div>';
                                echo '</div>';
                                ?>

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Book Name</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="book_name" name="book_name" value="<?php echo $result['book_name']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">ISBN</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="isbn" name="isbn" value="<?php echo $result['isbn']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Author</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="author" name="author" value="<?php echo $result['author']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Edition</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="edition" name="edition" value="<?php echo $result['edition']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Publisher</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="publisher" name="publisher" value="<?php echo $result['publisher']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Copy</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="copy" name="copy" value="<?php echo $result['copy']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Book Position</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="book_position" name="book_position" value="<?php echo $result['book_position']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Shelf No</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="shelf_no" name="shelf_no" value="<?php echo $result['shelf_no']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price" name="price" value="<?php echo $result['price']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="book_description" name="book_description" readonly="readonly"><?php echo $result['book_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    