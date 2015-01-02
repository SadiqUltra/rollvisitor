<?php defined('ACCESS') or die("403 Forbidden");?>
    <?php require 'data/view/PIE/PIE_data_3_countries.php'; ?>
    <script src="js/chart.min.js" type="text/javascript"></script>
<div class="widget">
    <div class="widget-header">
        <i class="icon-bar-chart"></i>
        <?php if(!$from_api) echo' <h3>
            Pie Chart </h3>';?>
            
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
    <?php echo '<div style="color:#F38630"> '.$countryAll[0]["country"].'</div>'; ?>
    <?php echo '<div style="color:#F55252"> '.$countryAll[1]["country"].'</div>'; ?>
    <?php echo '<div style="color:#69D2E7"> '.$countryAll[2]["country"].'</div>'; ?>
        <canvas id="pie-chart" class="chart-holder" width="538" height="250">

        </canvas>
        <!-- /pie-chart -->
    </div>
    <!-- /widget-content -->
</div>
<!-- /widget -->

<script type="text/javascript">
    var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);
</script>



