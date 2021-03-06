<div class="main">
    
    <div class="main-inner">

        <div class="container">

        <div class="row">
        <div class="span12">

                <div class="widget widget-plain">

                    <div class="widget-content">

                        <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-large btn-success btn-support-ask">Add New</a> 

                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span12 -->
         </div> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Academics</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/academics" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="radiobtns">Academic Name: </label>                                            
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
                                <th>Academic Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="td-actions">Action</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?> 
                            <tr>
                                <td><?php echo $res['academic_name']; ?></td>
                                <td><?php echo $res['start_date']; ?></td>
                                <td><?php echo $res['end_date']; ?></td>
                                <td><?php echo $res['academic_description']; ?></td>
                                <td><?php echo ($res['status'] == 1) ? 'On Processing' : 'Inactive'; ?></td>
                                <td class="td-actions">
                                    <a href="<?php echo base_url(); ?>index.php/admin/academic_programs/<?php echo $res['id']; ?>"><button class="btn btn-info">Academic Program</button></a>
                                    <a href="<?php echo base_url(); ?>index.php/admin/academics/update/<?php echo $res['id']; ?>"><button class="btn btn-success">Update</button></a>
                                    <a onclick="confirm_delete('admin/academics/delete/<?php echo $res['id']; ?>')"><button class="btn btn-danger">Remove</button></a>
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
                    