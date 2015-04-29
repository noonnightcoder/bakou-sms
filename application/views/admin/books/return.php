<div class="main">
    
    <div class="main-inner">

        <div class="container">

        <div class="row">
        <div class="span12">

                <div class="widget widget-plain">

                    <div class="widget-content">

                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span12 -->
         </div> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/library">Library</a> / Return Book</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        
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
                        </form>         

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Book Name</th>
                                <th>Borrower</th>
                                <th>Start Date</th>
                                <th>Return Date</th>
                                <th class="td-actions">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?>
                            <tr>
                                <td><?php echo $res['subject_name']; ?></td>
                                <td><?php echo $res['book_name']; ?></td>
                                <td><?php echo $res['fullname']; ?></td>
                                <td><?php echo $res['start_date']; ?></td>
                                <td><?php echo $res['return_date']; ?></td>
                                <td class="td-actions">
                                    <a onclick="confirm_delete('admin/library/return/<?php echo $res['id']; ?>')"><button class="btn btn-danger">Return</button></a>
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
                    