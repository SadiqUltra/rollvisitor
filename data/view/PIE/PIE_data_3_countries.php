<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php 
$visitorData = new VisitorData();
$countryAll = $visitorData->getCountryAll();
?>

<script>
        var pieData = [
                {
                    value: <?php echo $countryAll[0]["COUNT(country)"]; ?>,
                    color: "#F38630"
                },
                {
                    value: <?php echo $countryAll[1]["COUNT(country)"]; ?>,
                    color: "#F55252"
                },
                {
                    value: <?php echo $countryAll[2]["COUNT(country)"]; ?>,
                    color: "#69D2E7"
                }

            ];

                
                
</script>