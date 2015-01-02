<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastHourPrevious6 = $visitorData->getLastHourPrevious6();
$lastHour6 = $visitorData->getLastHour6();
 ?>


<script>
var lineChartData = {
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
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                data: [
                <?php echo count($lastHourPrevious6[1]);?>,
                <?php echo count($lastHourPrevious6[2]);?>, 
                <?php echo count($lastHourPrevious6[3]);?>,
                <?php echo count($lastHourPrevious6[4]);?>,
                <?php echo count($lastHourPrevious6[5]);?>,
                <?php echo count($lastHourPrevious6[6]);?>,
                ]
            },
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
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

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>
