<?php

//date_default_timezone_set(TIME_ZONE_SET);

$format = '%Y-%m-%d %H:%M:%S'; 
$database->setDatetime( strftime($format) );

?>