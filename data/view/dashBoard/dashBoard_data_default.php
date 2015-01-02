<?php defined('ACCESS') or die("403 Forbidden"); ?>
<?php include_once('class/VisitorData.class.php'); ?>

<?php

$visitorData = new VisitorData();
$pageAll = $visitorData->getPageAll();
$pageCount = count($pageAll);
for ($i=0; $i < $pageCount; $i++) { 
	echo 	'<tr>
				<td><a href="'.$pageAll[$i]["page"].'">'.$pageAll[$i]["page"].'</a></td>
			 	<td>'.$pageAll[$i]["COUNT(page)"].'</td>
			 <tr>';
}
?>
