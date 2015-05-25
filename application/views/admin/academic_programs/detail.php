<div class="main">
    
    <div class="main-inner">

        <div class="container">

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3><a href="<?php echo base_url(); ?>index.php/admin/academic_programs/<?php echo $this->uri->segment(4); ?>">Academic Programs</a> / Detail</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <?php
                        $options_class = array('' => "Select");
                        foreach ($classes as $row)
                        {
                          $options_class[$row['id']] = 'Faculty: '.$row['faculty_name'].' Department: '.$row['department_name'].' Class: '.$row['class_name'];
                        }
                        ?>
                        <form id="edit-profile" class="form-horizontal">
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
                                <?php
                                echo '<div class="control-group">';
                                  echo '<label for="manufacture_id" class="control-label">Class</label>';
                                  echo '<div class="controls">';
                                    echo form_dropdown('class_id', $options_class, $result['class_id'], 'class="span6" readonly="readonly"');
                                  echo '</div>';
                                echo '</div>';
                                ?>

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Description</label>
                                    <div class="controls">
                                        <textarea class="span6" id="academic_program_description" name="academic_program_description" readonly="readonly"><?php echo $result['academic_program_description']; ?></textarea>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Full Price (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="full_program_price" name="full_program_price" value="<?php echo $result['full_program_price']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->
                                
                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Start Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp3" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="start_date" class="span2" size="16" type="text" value="<?php echo $result['start_date']; ?>" readonly="readonly">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">End Date</label>
                                    <div class="controls">
                                        <div class="input-append date" id="dp4" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                                            <input name="end_date" class="span2" size="16" type="text" value="<?php echo $result['end_date']; ?>" readonly="readonly">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Semester</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_semester" name="number_of_semester" value="<?php echo $result['number_of_semester']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price Per Semester (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_semester" name="price_per_semester" value="<?php echo $result['price_per_semester']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Term</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_term" name="number_of_term" value="<?php echo $result['number_of_term']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price per Term (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_term" name="price_per_term" value="<?php echo $result['price_per_term']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Number of Month</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="number_of_month" name="number_of_month" value="<?php echo $result['number_of_month']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                                <div class="control-group">                                         
                                    <label class="control-label" for="firstname">Price per Month (USD)</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="price_per_month" name="price_per_month" value="<?php echo $result['price_per_month']; ?>" readonly="readonly">
                                    </div> <!-- /controls -->               
                                </div> <!-- /control-group -->

                            </fieldset>
                        </form>

                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->
            
            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Timetable</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="tabbable">				
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#timetable" data-toggle="tab">Timetable</a></li>
                                <li><a href="#newsubject" data-toggle="tab">Add New Subject</a></li>
                                <li><a href="#subjects" data-toggle="tab">Subjects</a></li>
                                <li><a href="#students" data-toggle="tab">Students</a></li>
                                <li><a href="#markabsence" data-toggle="tab">Mark Absence</a></li>
                                <li><a href="#absences" data-toggle="tab">Absences</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="timetable">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>SUNDAY</td>
                                            <td>
                                            <?php foreach($sunday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['sunday_time_start'].' - '.$row['sunday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                        <!-- <a href="<?php //echo base_url(); ?>index.php/admin/academic_programs/delete_subject/<?php //echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>"><i class="icon-trash"></i> Delete</a>-->
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MONDAY</td>
                                            <td>
                                            <?php foreach($monday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['monday_time_start'].' - '.$row['monday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TUESDAY</td>
                                            <td>
                                            <?php foreach($tuesday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['tuesday_time_start'].' - '.$row['tuesday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>    
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>WEDNESDAY</td>
                                            <td>
                                            <?php foreach($wednesday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['wednesday_time_start'].' - '.$row['wednesday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>THURSDAY</td>
                                            <td>
                                            <?php foreach($thursday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['thursday_time_start'].' - '.$row['thursday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>FRIDAY</td>
                                            <td>
                                            <?php foreach($friday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['friday_time_start'].' - '.$row['friday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SATURDAY</td>
                                            <td>
                                            <?php foreach($saturday_subjects as $row){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"><i class="icon-calendar icon-white"></i> <?php echo $row['subject_name'].' ('.$row['saturday_time_start'].' - '.$row['saturday_time_end'].') by '.$row['fullname']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')">Remove</a>
                                                    </li>
                                                </ul>
                                            </div><br/>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="tab-pane " id="newsubject">
                                    <?php
                                    $options_subject = array('' => "Select");
                                    foreach ($subjects as $row)
                                    {
                                      $options_subject[$row['id']] = $row['subject_name'];
                                    }
                                    
                                    $options_staff = array('' => "Select");
                                    foreach ($staffs as $row)
                                    {
                                      $options_staff[$row['id']] = $row['fullname'];
                                    }
                                    ?>
                                    <form action="<?php echo base_url(); ?>index.php/admin/academic_programs/detail/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
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
                                        <?php
                                        echo '<div class="control-group">';
                                          echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                          echo '<div class="controls">';
                                            echo form_dropdown('subject_id', $options_subject, set_value('subject_id'), 'class="span6""');
                                          echo '</div>';
                                        echo '</div>';
                                        ?>
                                        
                                        <?php
                                        echo '<div class="control-group">';
                                          echo '<label for="manufacture_id" class="control-label">Taught By</label>';
                                          echo '<div class="controls">';
                                            echo form_dropdown('taught_by', $options_staff, set_value('taught_by'), 'class="span6""');
                                          echo '</div>';
                                        echo '</div>';
                                        ?>

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Number of Session</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="number_of_session" name="number_of_session" value="<?php echo set_value('number_of_session'); ?>">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Monday</label>
                                            <div class="controls">
                                                <select name="monday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="monday">Monday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="mon_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="mon_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="mon_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="mon_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                            
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Tuesday</label>
                                            <div class="controls">
                                                <select name="tuesday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="tuesday">Tuesday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="tue_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="tue_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="tue_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="tue_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Wednesday</label>
                                            <div class="controls">
                                                <select name="wednesday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="wednesday">Wednesday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="wed_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="wed_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="wed_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="wed_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Thursday</label>
                                            <div class="controls">
                                                <select name="thursday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="thursday">Thursday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="thu_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="thu_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="thu_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="thu_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Friday</label>
                                            <div class="controls">
                                                <select name="friday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="friday">Friday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="fri_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="fri_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="fri_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="fri_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Saturday</label>
                                            <div class="controls">
                                                <select name="saturday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="saturday">Saturday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="sat_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="sat_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="sat_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="sat_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Sunday</label>
                                            <div class="controls">
                                                <select name="sunday" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="sunday">Sunday</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time Start</label>
                                            <div class="controls">
                                                <select name="sun_hour1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="sun_minute1" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Time End</label>
                                            <div class="controls">
                                                <select name="sun_hour2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                                <select name="sun_minute2" class="form-control">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" for="firstname">Description</label>
                                            <div class="controls">
                                                <textarea class="span6" id="academic_program_subject_description" name="academic_program_subject_description"><?php echo set_value('academic_program_subject_description'); ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Save</button> 
                                            <button class="btn">Cancel</button>
                                        </div> <!-- /form-actions -->
                                        
                                    </fieldset>
                                    </form>
                                </div>
                                <div class="tab-pane " id="subjects">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Subject</th>
                                            <th>Taught By</th>
                                            <th>Book</th>
                                            <th>Number of Session</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php 
                                            $current_subject = '';
                                            foreach($all_subjects as $row){ 
                                                
                                        ?>
                                        <?php if($current_subject != $row['subject_name']) { ?>
                                        <tr>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['book_name']; ?></td>
                                            <td><?php echo $row['number_of_session']; ?></td>
                                            <td><?php echo $row['academic_program_subject_description']; ?></td>
                                            <td><?php echo ($row['status']== 0) ? 'Not Available' : 'Available'; ?></td>
                                            <?php if($row['status'] == 1) { ?>
                                            <td><a onclick="confirm_delete('admin/academic_programs/delete_subject/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$row['id']; ?>')"><button class="btn btn-danger">Remove</button></a></td>
                                            <?php }else{ ?>
                                            <td>&nbsp;</td>
                                            <?php } ?>
                                        </tr>
                                        <?php }else{ ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><?php echo $row['book_name']; ?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } // end if ?>
                                        <?php 
                                            $current_subject = $row['subject_name'];
                                        } // end foreach
                                        ?>
                                    </table>
                                    
                                </div>
                                <div class="tab-pane " id="students">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>ID</th>
                                            <th>Fullname</th>
                                            <th>Fullname in Khmer</th>
                                            <th>Sex</th>
                                            <th>Effective From</th>
                                            <th>Effective End</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php $order_number = 1; ?>
                                        <?php foreach($all_students as $row){ ?>
                                        <tr>
                                            <td><?php echo $order_number++; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['fullname_in_khmer']; ?></td>
                                            <td><?php echo $row['sex']; ?></td>
                                            <td><?php echo $row['effective_from']; ?></td>
                                            <td><?php echo $row['effective_end']; ?></td>
                                            <td><?php echo ($row['status']== 0) ? 'Inactive' : 'In Progress'; ?></td>
                                        </tr>
                                        
                                        <?php } // end foreach ?>
                                    </table>
                                </div>
                                <div class="tab-pane " id="markabsence">
                                    <?php
                                    $options_subject = array('' => "Select");
                                    foreach ($all_subjects as $row)
                                    {
                                      $options_subject[$row['id']] = $row['subject_name'];
                                    }
                                    ?>
                                    <form action="<?php echo base_url(); ?>index.php/admin/academic_programs/attendance/<?php echo $this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" id="edit-profile" class="form-horizontal">
                                        <fieldset>
                                            <?php
                                                //flash messages
                                                if(isset($flash_message)){
                                                    if(@$flash_message == TRUE)
                                                    {
                                                      echo '<div class="alert alert-success">';
                                                        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                                        echo '<strong>Well done!</strong> marked absence with success.';
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
                                            <?php
                                            echo '<div class="control-group">';
                                              echo '<label for="manufacture_id" class="control-label">Subject</label>';
                                              echo '<div class="controls">';
                                                echo form_dropdown('academic_program_subject_id', $options_subject, set_value('academic_program_subject_id'), 'class="span6"');
                                              echo '</div>';
                                            echo '</div>';
                                            ?>

                                            <div class="control-group">                                         
                                                <label class="control-label" for="firstname">Date</label>
                                                <div class="controls">
                                                    <div class="input-append date" id="dp2" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                                        <input name="absent_date" class="span2" size="16" type="text" value="<?php echo set_value('absent_date'); ?>" readonly>
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                    </div>
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->

                                            <div class="control-group">                                         
                                                <label class="control-label" for="firstname">Session</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" id="session" name="session" value="<?php echo set_value('session'); ?>">
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->

                                            <?php foreach($all_students as $row){ ?>
                                            <div class="control-group">                                         
                                                <label class="control-label" for="firstname"><?php echo $row['fullname']; ?></label>
                                                <div class="controls">
                                                    <input type="checkbox" name="student_id[]" value="<?php echo $row['student_id']; ?>" > Absence                                        
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->
                                            <?php } ?>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Mark Absence</button> 
                                                <button class="btn" type="reset">Cancel</button>
                                            </div> <!-- /form-actions -->

                                        </fieldset>
                                    </form> 
                                </div>
                                <div class="tab-pane " id="absences">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Absent Date</th>
                                            <th>Subject Name</th>
                                            <th>Fullname</th>
                                            <th>Fullname in Khmer</th>
                                            <th>Session</th>
                                        </tr>
                                        
                                        <?php foreach($absences as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['absent_date']; ?></td>
                                            <td><?php echo $row['subject_name']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['fullname_in_khmer']; ?></td>
                                            <td><?php echo $row['session']; ?></td>
                                        </tr>
                                        
                                        <?php } // end foreach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->               
                    