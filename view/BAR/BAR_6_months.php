<?php defined('ACCESS') or die("403 Forbidden");?>
<!--Bar Chart-->
<div id="bar_chart_jQueryAJAX">
<div class="widget">
    <div class="widget-header">
        <i class="icon-bar-chart"></i>
<?php if(!$from_api){ echo' 
        <h3> Bar Chart 
            <select id = "bar_chart">
                <option value="6m">6 months</option>
                <option value="6h">6 hours</option>
                <option value="24h">24 hours</option>
                <option value="7d">7 days</option>
            </select>
        </h3>
<script>
$(document).ready(function(){
  $("#bar_chart").change(function(){
    $("#bar_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=bar&bar=" + $("#bar_chart").val());
  }); 
});
</script>
';}?>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        <canvas id="bar-chart" class="chart-holder" width="538" height="250">
        </canvas>
        <!-- /bar-chart -->
    </div>
    <!-- /widget-content -->
</div> 
</div>
<!-- /widget -->
                    <!--Bar Chart-->

    <script src="js/chart.min.js" type="text/javascript"></script>
    <script src="js/jquery-1.7.2.min.js"></script>
    <?php require 'data/view/BAR/BAR_data_6_months.php'; ?>

    <script>
$(document).ready(function(){
  $("#bar_chart").change(function(){
    $("#bar_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=bar&bar=" + $('#bar_chart').val());
  });
  
});
</script>




