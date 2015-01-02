<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

 
<?php 
$visitorData = new VisitorData();
$tmp6 = $visitorData->getByMonth(6, false);//dataFilter2($subject, $columnName, $data, $columnName2, $data2, $strict)
$lastMonth6=  $visitorData->dataFilter($tmp6, 'referer', $_GET['email']);
$lastMonthUnique6 = $visitorData->dataFilter2($tmp6, 'referer', $_GET['email'], 'page', $_GET['barno'], true);

// print_r($tmp6);

 ?>

<script>
 var barChartData = {
            labels: [
                "<?php echo Date('M', strtotime("-5 months")); ?>",
                "<?php echo Date('M', strtotime("-4 months")); ?>",
                "<?php echo Date('M', strtotime("-3 months")); ?>",
                "<?php echo Date('M', strtotime("-2 months")); ?>",
                "<?php echo Date('M', strtotime("-1 months")); ?>",
                "<?php echo date('M'); ?>"
            ],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    data: [
                    <?php echo ($lastMonthUnique6[1]);?>,
                    <?php echo ($lastMonthUnique6[2]);?>, 
                    <?php echo ($lastMonthUnique6[3]);?>,
                    <?php echo ($lastMonthUnique6[4]);?>,
                    <?php echo ($lastMonthUnique6[5]);?>,
                    <?php echo ($lastMonthUnique6[6]);?>,
                    ]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    data: [
                    <?php echo ($lastMonth6[1]);?>,
                    <?php echo ($lastMonth6[2]);?>, 
                    <?php echo ($lastMonth6[3]);?>,
                    <?php echo ($lastMonth6[4]);?>,
                    <?php echo ($lastMonth6[5]);?>,
                    <?php echo ($lastMonth6[6]);?>,
                    ]
                }
            ]

        }

var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>