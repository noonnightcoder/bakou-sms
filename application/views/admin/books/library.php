<div class="main">
    
    <div class="main-inner">

        <div class="container">

        <div class="row">
        <div class="span12">

                <div class="widget widget-plain">

                    <div class="widget-content">

                        <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-large btn-success btn-support-ask">Add New Book</a>
                        <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/return" class="btn btn-large btn-danger btn-support-ask">Return Book</a>
                        <a target="_blank" href="<?php echo site_url("admin").'/memberships'; ?>" class="btn btn-large btn-info btn-support-ask">Show Membership</a>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span12 -->
         </div> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Library</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_subject = array('' => "Select");
                        foreach ($subjects as $row)
                        {
                          $options_subject[$row['id']] = $row['subject_name'];
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>index.php/admin/library" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="radiobtns">Book Name: </label>                                            
                                <div class="controls">
                                   <div class="input-append">
                                      <input class="span2 m-wrap" id="appendedInputButton" type="text" name="search" value="<?php echo @$search; ?>">
                                      <button class="btn" type="submit">Search</button>
                                    </div>
                                </div>  <!-- /controls -->          
                            </div> <!-- /control-group -->
                            <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('subject_id', $options_subject, @$subject_id, 'class="span2"');
                                    echo '<button class="btn" type="submit">Search</button>';
                                  echo '</div>';
                                echo '</div>';
                            ?>
                        </form>         

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Book Name</th>
                                <th>ISBN</th>
                                <th>Author</th>
                                <th>Edition</th>
                                <th>Book Position</th>
                                <th>Shelf Number</th>
                                <th>Price</th>
                                <th>Copy</th>
                                <th class="td-actions">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?>
                            <tr>
                                <td><?php echo $res['subject_name']; ?></td>
                                <td><?php echo $res['book_name']; ?></td>
                                <td><?php echo $res['isbn']; ?></td>
                                <td><?php echo $res['author']; ?></td>
                                <td><?php echo $res['edition']; ?></td>
                                <td><?php echo $res['book_position']; ?></td>
                                <td><?php echo $res['shelf_no']; ?></td>
                                <td><?php echo $res['price']; ?></td>
                                <td><?php echo $res['copy']; ?></td>
                                <td class="td-actions">
                                    <a href="<?php echo base_url(); ?>index.php/admin/library/borrow/<?php echo $res['id']; ?>"><button class="btn btn-warning">Lend</button></a>
                                    <a href="<?php echo base_url(); ?>index.php/admin/books/detail/<?php echo $res['id']; ?>"><button class="btn btn-info">Detail</button></a>
                                    <a href="<?php echo base_url(); ?>index.php/admin/library/update/<?php echo $res['id']; ?>"><button class="btn btn-success">Update</button></a>
                                    <a onclick="confirm_delete('admin/library/delete/<?php echo $res['id']; ?>')"><button class="btn btn-danger">Remove</button></a>
                                </td>
                            </tr>
                            <?php } ?>  
                            </tbody>
                        </table>
                        <?php echo '<div class="pagination widget-content">'.$this->pagination->create_links().'</div>'; ?>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->                 
                    