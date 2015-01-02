<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastDay7 = $visitorData->getByday(7, false);
$lastDayPrevious7 = $visitorData->getByday('Previous7', false);
?>


<script>
var lineChartData = {
        labels: [
                "<?php echo Date('D', strtotime("-6 days")); ?>",
                "<?php echo Date('D', strtotime("-5 days")); ?>",
                "<?php echo Date('D', strtotime("-4 days")); ?>",
                "<?php echo Date('D', strtotime("-3 days")); ?>",
                "<?php echo Date('D', strtotime("-2 days")); ?>",
                "<?php echo Date('D', strtotime("-1 days")); ?>",
                "<?php echo date('D'); ?>",
            ],
        datasets: [
            {
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                data: [
                    <?php echo count($lastDayPrevious7[1]);?>,
                    <?php echo count($lastDayPrevious7[2]);?>, 
                    <?php echo count($lastDayPrevious7[3]);?>,
                    <?php echo count($lastDayPrevious7[4]);?>,
                    <?php echo count($lastDayPrevious7[5]);?>,
                    <?php echo count($lastDayPrevious7[6]);?>,
                    <?php echo count($lastDayPrevious7[7]);?>,
                    ]
            },
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                data: [
                    <?php echo count($lastDay7[1]);?>,
                    <?php echo count($lastDay7[2]);?>, 
                    <?php echo count($lastDay7[3]);?>,
                    <?php echo count($lastDay7[4]);?>,
                    <?php echo count($lastDay7[5]);?>,
                    <?php echo count($lastDay7[6]);?>,
                    <?php echo count($lastDay7[7]);?>,
                    ]
            }
        ]

    }

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>
