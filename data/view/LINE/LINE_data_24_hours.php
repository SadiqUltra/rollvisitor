<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastHourPrevious24 = $visitorData->getLastHourPrevious24();
$lastHour24 = $visitorData->getLastHour24();
 ?>

<script>
var lineChartData = {
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
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                data: [
                    <?php echo count($lastHourPrevious24[1]);?>,
                    <?php echo count($lastHourPrevious24[2]);?>, 
                    <?php echo count($lastHourPrevious24[3]);?>,
                    <?php echo count($lastHourPrevious24[4]);?>,
                    <?php echo count($lastHourPrevious24[5]);?>,
                    <?php echo count($lastHourPrevious24[6]);?>,
                    <?php echo count($lastHourPrevious24[7]);?>,
                    <?php echo count($lastHourPrevious24[8]);?>,
                    <?php echo count($lastHourPrevious24[9]);?>,
                    <?php echo count($lastHourPrevious24[10]);?>,
                    <?php echo count($lastHourPrevious24[11]);?>,
                    <?php echo count($lastHourPrevious24[12]);?>, 
                    <?php echo count($lastHourPrevious24[13]);?>,
                    <?php echo count($lastHourPrevious24[14]);?>,
                    <?php echo count($lastHourPrevious24[15]);?>,
                    <?php echo count($lastHourPrevious24[16]);?>,
                    <?php echo count($lastHourPrevious24[17]);?>,
                    <?php echo count($lastHourPrevious24[18]);?>,
                    <?php echo count($lastHourPrevious24[19]);?>,
                    <?php echo count($lastHourPrevious24[20]);?>,
                    <?php echo count($lastHourPrevious24[21]);?>,
                    <?php echo count($lastHourPrevious24[22]);?>, 
                    <?php echo count($lastHourPrevious24[23]);?>,
                    <?php echo count($lastHourPrevious24[24]);?>,
                    ]
            },
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
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

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>
