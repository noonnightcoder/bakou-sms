<div class="main">
    
    <div class="main-inner">

        <div class="container"> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Fee Collections / Paid</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <form action="<?php echo base_url(); ?>index.php/admin/fees/<?php echo $this->uri->segment(3); ?>" method="post" class="form-horizontal">
                            <div class="control-group">                                         
                                <label class="control-label" for="firstname">Start Date</label>
                                <div class="controls">
                                    <div class="input-append date" id="dp3" data-date="<?php echo date("Y-m-01"); ?>" data-date-format="yyyy-mm-dd">
                                        <input name="start_date" class="span2" size="16" type="text" value="<?php echo @$start_date; ?>" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div> <!-- /controls -->               
                            </div> <!-- /control-group -->
                            <div class="control-group">                                         
                                <label class="control-label" for="firstname">End Date</label>
                                <div class="controls">
                                    <div class="input-append date" id="dp4" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                        <input name="end_date" class="span2" size="16" type="text" value="<?php echo @$end_date; ?>" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div> <!-- /controls -->               
                            </div> <!-- /control-group -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div> <!-- /form-actions -->
                        </form>         

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Payment Date</th>
                                <th>Student Name</th>
                                <th>Student Type</th>
                                <th>Fee Type</th>
                                <th>Amount (USD)</th>
                                <th>Discount Percentage</th>
                                <th>Discount Amount (USD)</th>
                                <th>Last Amount (USD)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $total_amount = 0;
                                $total_discount_amount = 0;
                                $total_last_amount = 0;
                            ?>
                            <?php foreach($result as $res){ ?>
                            <?php 
                                $total_amount += $res['amount'];
                                $total_discount_amount += $res['discount_amount'];
                                $total_last_amount += $res['last_amount'];
                            ?>    
                            <tr>
                                <td><?php echo $res['payment_date']; ?></td>
                                <td><?php echo $res['fullname']; ?></td>
                                <td><?php echo $res['student_type']; ?></td>
                                <td><?php echo $res['fee_type']; ?></td>
                                <td><?php echo $res['amount']; ?></td>
                                <td><?php echo $res['discount_percentage']; ?></td>
                                <td><?php echo $res['discount_amount']; ?></td>
                                <td><?php echo $res['last_amount']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4">Total:</td>
                                <td><?php echo $total_amount; ?></td>
                                <td>&nbsp;</td>
                                <td><?php echo $total_discount_amount; ?></td>
                                <td><?php echo $total_last_amount; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->                 
                    