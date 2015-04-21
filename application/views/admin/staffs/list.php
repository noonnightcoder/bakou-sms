<div class="main">
    
    <div class="main-inner">

        <div class="container">

        <div class="row">
        <div class="span12">

                <div class="widget widget-plain">

                    <div class="widget-content">

                        <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-large btn-success btn-support-ask">Add New</a> 
                        <a href="<?php echo site_url("admin").'/positions'; ?>" class="btn btn-large btn-info btn-support-ask">Show Position</a>
                        
                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span12 -->
         </div> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Staffs</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/staffs" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="radiobtns">Staff Name: </label>                                            
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
                                <th>Fullname</th>
                                <th>Khmer</th>
                                <th>Position</th>
                                <th>Birthday</th>
                                <th>Sex</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th class="td-actions">Action</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?> 
                            <tr>
                                <td><?php echo $res['fullname']; ?></td>
                                <td><?php echo $res['fullname_in_khmer']; ?></td>
                                <td><?php echo $res['position']; ?></td>
                                <td><?php echo $res['birthday']; ?></td>
                                <td><?php echo $res['sex']; ?></td>
                                <td><?php echo $res['phone1']; ?></td>
                                <td><?php echo $res['phone2']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><?php echo $res['staff_description']; ?></td>
                                <td class="td-actions">
                                    <a href="<?php echo base_url(); ?>index.php/admin/staffs/update/<?php echo $this->uri->segment(3).'/'.$res['id']; ?>"><button class="btn btn-success">Update</button></a>
                                    <a href="<?php echo base_url(); ?>index.php/admin/staffs/delete/<?php echo $this->uri->segment(3).'/'.$res['id']; ?>"><button class="btn btn-danger">Remove</button></a>
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
                    