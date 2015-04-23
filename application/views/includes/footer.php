<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/base.js"></script>
<script src="<?php echo base_url(); ?>assets/js/faq.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script>
    /*$(document).on("click", ".alert", function(e) {
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
                alert("Confirm result: "+result);
        });
    });*/
    
    function confirm_delete(url){
        bootbox.confirm("Are you sure to do this?", function(result) {
            if(result)
                location.href = '<?php echo base_url(); ?>index.php/' + url;
        });
    }
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?php echo base_url(); ?>assets/js/base.js"></script> 
<script>   
    // for date picker
    $(function(){
        $('#dp3').datepicker();
    });
    
    $(function(){
        $('#dp4').datepicker();
    });
    
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                  ]

    }

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                  ]

    }    

    $(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      selectable: false,
      selectHelper: true,
      select: function(start, end, allDay) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            //true // make the event "stick"
            false
          );
        }
        calendar.fullCalendar('unselect');
      },
      editable: false,
      events: 
      [
        <?php if(isset($notices)) { ?>
        <?php foreach($notices as $notice){ ?>
        {
          title: '<?php echo $notice['notice_title'];?>',
          start: new Date(<?php echo date('Y',strtotime($notice['start_date']));?>, <?php echo date('m',strtotime($notice['start_date'])) -1;?>, <?php echo date('d',strtotime($notice['start_date']));?>),
          //start: new Date(y, m, 28),
          end: new Date(<?php echo date('Y',strtotime($notice['end_date']));?>, <?php echo date('m',strtotime($notice['end_date'])) -1;?>, <?php echo date('d',strtotime($notice['end_date']));?>),
          //end: new Date(y, m, 29),
          url: '<?php echo base_url(); ?>index.php/admin/noticeboards/detail/<?php echo $notice['id']; ?>'
        },
        <?php } ?>  
        <?php } ?>
      ]
    });
    });
</script><!-- /Calendar -->
    
    <script>

    $(function () {
        
        $('.faq-list').goFaq ();

    });

    </script>
    
</body>
</html>