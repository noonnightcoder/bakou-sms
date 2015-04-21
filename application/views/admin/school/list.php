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
                        <h3>School</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/school" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="radiobtns">School Name: </label>                                            
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
                            <tr><th>School_name</th><th>School_address</th><th>School_phone1</th><th>School_phone2</th><th>School_fax</th><th>School_email</th><th>School_website</th><th>School_logo</th><th>School_description</th><th class="td-actions">Action</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?> 
                                <tr>
                                    <td><?php echo $res['school_name']; ?></td>
                                    <td><?php echo $res['school_address']; ?></td>
                                    <td><?php echo $res['school_phone1']; ?></td>
                                    <td><?php echo $res['school_phone2']; ?></td>
                                    <td><?php echo $res['school_fax']; ?></td>
                                    <td><?php echo $res['school_email']; ?></td>
                                    <td><?php echo $res['school_website']; ?></td>
                                    <td><?php echo $res['school_logo']; ?></td>
                                    <td><?php echo $res['school_description']; ?></td>
                                    <td class="td-actions">
                                       <a href="<?php echo base_url(); ?>index.php/admin/school/update/<?php echo $res['id']; ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
                                       <a href="<?php echo base_url(); ?>index.php/admin/school/delete/<?php echo $res['id']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
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
                    