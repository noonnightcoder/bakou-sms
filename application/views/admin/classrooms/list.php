<div class="main">
    <div class="main-inner">
        <div class="container">

        <div class="row">
        <div class="span12">

                <div class="widget widget-plain">

                    <div class="widget-content">
                        <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add/<?php echo $this->uri->segment(3); ?>" class="btn btn-large btn-success btn-support-ask">Add New</a>
                        <a target="_blank" href="<?php echo site_url("admin").'/classroom_types'; ?>" class="btn btn-large btn-info btn-support-ask">Show Classroom Type</a>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span12 -->
         </div> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Classrooms</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/classrooms/<?php echo $this->uri->segment(3); ?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="radiobtns">Classroom Name: </label>                                            
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
                                <th>Classroom Name</th>
                                <th>Type</th>
                                <th>Number of Student</th>
                                <th>Description</th>
                                <th class="td-actions">Action</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?> 
                            <tr>
                                <td><?php echo $res['classroom_name']; ?></td>
                                <td><?php echo $res['classroom_type']; ?></td>
                                <td><?php echo $res['number_of_student']; ?></td>
                                <td><?php echo $res['classroom_description']; ?></td>
                                <td class="td-actions">
                                    <a href="<?php echo base_url(); ?>index.php/admin/classrooms/update/<?php echo $this->uri->segment(3).'/'.$res['id']; ?>"><button class="btn btn-success">Update</button></a>
                                    <!-- <a href="<?php //echo base_url(); ?>index.php/admin/classrooms/delete/<?php //echo $this->uri->segment(3).'/'.$res['id']; ?>"><button class="btn btn-danger">Remove</button></a> -->
                                    <a onclick="confirm_delete('admin/classrooms/delete/<?php echo $this->uri->segment(3).'/'.$res['id']; ?>')"><button class="btn btn-danger">Remove</button></a>
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
                    