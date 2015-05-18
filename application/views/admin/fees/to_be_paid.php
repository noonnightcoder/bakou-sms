<div class="main">
    
    <div class="main-inner">

        <div class="container"> 

          <div class="row">

            <div class="span12">

                <div class="widget">

                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Fee Collections / To Be Paid</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">        

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Due Date</th>
                                <th>Student Name</th>
                                <th>Fee Type</th>
                                <th>Last Amount</th>
                                <th>Last Discount Percentage</th>
                                <th>Last Discount Amount</th>
                                <th>Last Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $res){ ?>
                            <tr>
                                <td><?php echo $res['due_date']; ?></td>
                                <td><?php echo $res['fullname']; ?></td>
                                <td><?php echo $res['fee_type']; ?></td>
                                <td><?php echo $res['amount']; ?></td>
                                <td><?php echo $res['discount_percentage']; ?></td>
                                <td><?php echo $res['discount_amount']; ?></td>
                                <td><?php echo $res['last_amount']; ?></td>
                            </tr>
                            <?php } ?>  
                            </tbody>
                        </table>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget --> 

            </div> <!-- /spa12 -->

          </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->                 
                    