<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastHour24 = $visitorData->getLastHour24();
$lastHourUnique24 = $visitorData->getLastHourUnique24();

 ?>

<script>
 var barChartData = {
            labels: [
                "<?php echo Date('H:i', strtotime("-23 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-22 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-21 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-20 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-19 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-18 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-17 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-16 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-15 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-14 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-13 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-12 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-11 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-10 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-9 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-8 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-7 hours")); ?>",
                "<?php echo Date('H:i', strtotime("-6 hours")); ?>",
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
                    <?php echo count($lastHourUnique24[1]);?>,
                    <?php echo count($lastHourUnique24[2]);?>, 
                    <?php echo count($lastHourUnique24[3]);?>,
                    <?php echo count($lastHourUnique24[4]);?>,
                    <?php echo count($lastHourUnique24[5]);?>,
                    <?php echo count($lastHourUnique24[6]);?>,
                    <?php echo count($lastHourUnique24[7]);?>,
                    <?php echo count($lastHourUnique24[8]);?>,
                    <?php echo count($lastHourUnique24[9]);?>,
                    <?php echo count($lastHourUnique24[10]);?>,
                    <?php echo count($lastHourUnique24[11]);?>,
                    <?php echo count($lastHourUnique24[12]);?>, 
                    <?php echo count($lastHourUnique24[13]);?>,
                    <?php echo count($lastHourUnique24[14]);?>,
                    <?php echo count($lastHourUnique24[15]);?>,
                    <?php echo count($lastHourUnique24[16]);?>,
                    <?php echo count($lastHourUnique24[17]);?>,
                    <?php echo count($lastHourUnique24[18]);?>,
                    <?php echo count($lastHourUnique24[19]);?>,
                    <?php echo count($lastHourUnique24[20]);?>,
                    <?php echo count($lastHourUnique24[21]);?>,
                    <?php echo count($lastHourUnique24[22]);?>, 
                    <?php echo count($lastHourUnique24[23]);?>,
                    <?php echo count($lastHourUnique24[24]);?>,
                    ]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    data: [
                    <?php echo count($lastHour24[1]);?>,
                    <?php echo count($lastHour24[2]);?>, 
                    <?php echo count($lastHour24[3]);?>,
                    <?php echo count($lastHour24[4]);?>,
                    <?php echo count($lastHour24[5]);?>,
                    <?php echo count($lastHour24[6]);?>,
                    <?php echo count($lastHour24[7]);?>,
                    <?php echo count($lastHour24[8]);?>,
                    <?php echo count($lastHour24[9]);?>,
                    <?php echo count($lastHour24[10]);?>,
                    <?php echo count($lastHour24[11]);?>,
                    <?php echo count($lastHour24[12]);?>, 
                    <?php echo count($lastHour24[13]);?>,
                    <?php echo count($lastHour24[14]);?>,
                    <?php echo count($lastHour24[15]);?>,
                    <?php echo count($lastHour24[16]);?>,
                    <?php echo count($lastHour24[17]);?>,
                    <?php echo count($lastHour24[18]);?>,
                    <?php echo count($lastHour24[19]);?>,
                    <?php echo count($lastHour24[20]);?>,
                    <?php echo count($lastHour24[21]);?>,
                    <?php echo count($lastHour24[22]);?>, 
                    <?php echo count($lastHour24[23]);?>,
                    <?php echo count($lastHour24[24]);?>,
                    ]
                }
            ]

        }

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>

