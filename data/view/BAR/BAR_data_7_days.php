<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastDay7 = $visitorData->getByday(7, false);
$lastDayUnique7 = $visitorData->getByday(7, true);

 ?>

<script>
 var barChartData = {
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
                    data: [
                    <?php echo count($lastDayUnique7[1]);?>,
                    <?php echo count($lastDayUnique7[2]);?>, 
                    <?php echo count($lastDayUnique7[3]);?>,
                    <?php echo count($lastDayUnique7[4]);?>,
                    <?php echo count($lastDayUnique7[5]);?>,
                    <?php echo count($lastDayUnique7[6]);?>,
                    <?php echo count($lastDayUnique7[7]);?>,
                    ]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
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

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>
