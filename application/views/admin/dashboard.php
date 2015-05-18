<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Noticeboard</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> <i class="icon-file"></i>
              <h3> Comments</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="messages_layout">
                <?php $order=1; ?>
                <?php foreach($comments as $comment){ ?>
                <?php if($order % 2) { ?>
                <li class="from_user left"> <a href="#" class="avatar"><img src="<?php echo base_url(); ?>attachments/index.png" width='50px' height='50px'/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Anonymous</a> <span class="time"><?php echo $comment['created_date']; ?></span></div>
                    <div class="text"><b><?php echo $comment['subject_name']; ?></b>: <?php echo $comment['comments']; ?></div>
                  </div>
                </li>
                <?php }else{ ?>
                <li class="by_myself right"><a href="#" class="avatar"><img src="<?php echo base_url(); ?>attachments/index.png" width='50px' height='50px'/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Anonymous</a> <span class="time"><?php echo $comment['created_date']; ?></span></div>
                    <div class="text"><b><?php echo $comment['subject_name']; ?></b>: <?php echo $comment['comments']; ?></div>
                  </div>
                </li>
                <?php } // end if-else ?>
                <?php $order++; } ?>
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span6">
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> <i class="icon-signal"></i>
              <h3> Area Chart Example</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
              <!-- /area-chart --> 
            </div>
            <!-- /widget-content --> 
          </div>
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

