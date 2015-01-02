<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastHour6 = $visitorData->getLastHour6();
$lastHourUnique6 = $visitorData->getLastHourUnique6();

 ?>

<script>
 var barChartData = {
            labels: [
                "<?php echo Date('H:i', strtotime("-5 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-4 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-3 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-2 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-1 hours")); ?>",
                "<?php echo date('H:i'); ?>"
            ],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    data: [
                    <?php echo count($lastHourUnique6[1]);?>,
                    <?php echo count($lastHourUnique6[2]);?>, 
                    <?php echo count($lastHourUnique6[3]);?>,
                    <?php echo count($lastHourUnique6[4]);?>,
                    <?php echo count($lastHourUnique6[5]);?>,
                    <?php echo count($lastHourUnique6[6]);?>,
                    ]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    data: [
                    <?php echo count($lastHour6[1]);?>,
                    <?php echo count($lastHour6[2]);?>, 
                    <?php echo count($lastHour6[3]);?>,
                    <?php echo count($lastHour6[4]);?>,
                    <?php echo count($lastHour6[5]);?>,
                    <?php echo count($lastHour6[6]);?>,
                    ]
                }
            ]

        }

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>

