<?php defined('ACCESS') or die("403 Forbidden");?>
<!-- line Chart-->
<div id="line_chart_jQueryAJAX">
<div  class="widget">
    <div class="widget-header">

        <i class="icon-bar-chart"></i>
        <!-- Change Icon -->
<?php if(!$from_api){ echo'         
        <h3>Line Chart
                <select id = "line_chart">
                    <option value="6h">6 hours</option>
                    <option value="24h">24 hours</option>
                    <option value="7d">7 days</option>
                    <option value="6m">6 months</option>
            </select>
            </h3>
<script>
$(document).ready(function(){
  $("#line_chart").change(function(){
    $("#line_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=line&line=" + $("#line_chart").val());
  });
});
</script>
';}?>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"  >
        <canvas id="area-chart" class="chart-holder" width="538" height="250">
        </canvas>
        <!-- /line-chart -->
    </div>
    <!-- /widget-content -->
</div>
<!-- /widget -->
                    <!-- /line Chart-->


    <script src="js/chart.min.js" type="text/javascript"></script>
    <script src="js/jquery-1.7.2.min.js"></script>
<?php include_once('data/view/LINE/LINE_data_6_hours.php'); ?>

<script>
$(document).ready(function(){
  $("#line_chart").change(function(){
    $("#line_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=line&line=" + $('#line_chart').val());
  });
});
</script>