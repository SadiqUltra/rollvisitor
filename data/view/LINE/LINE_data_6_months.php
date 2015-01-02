<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$lastMonth6 = $visitorData->getByMonth(6, false);
$lastMonth6 = $visitorData->dataFilter($lastMonth6, 'referer', $_GET['email']);
$lastMonthPrevious6 = $visitorData->getByMonth('Previous6', false);
$lastMonthPrevious6 = $visitorData->dataFilter($lastMonthPrevious6, 'referer', $_GET['email']);

 ?>   

<script>
var lineChartData = {
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
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                data: [
                    <?php echo ($lastMonthPrevious6[1]);?>,
                    <?php echo ($lastMonthPrevious6[2]);?>, 
                    <?php echo ($lastMonthPrevious6[3]);?>,
                    <?php echo ($lastMonthPrevious6[4]);?>,
                    <?php echo ($lastMonthPrevious6[5]);?>,
                    <?php echo ($lastMonthPrevious6[6]);?>,
                    ]
            },
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
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

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
</script>