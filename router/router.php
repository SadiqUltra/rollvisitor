<?php

/*************************************************************
 * Roll Visitor
 * @Author name: A. S. M. Sadiqul Islam & Khalid Ibn Zinnah Apu
 * @Creation Date: July 2014
 * @Website Url: http://rollvisitor.com
 * @Version: 1.0.0
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright (C) 2014 - RollVisitor System Inc.
 * 
 */

 $router_view = array(
		"default" => "charts",
		"chart" => "charts",
		"dashboard" => "dashBoard",
		"documentation" => "documentation",
	);
 $router_chart = array(
 		"bar" => "router_bar",
 		"line" => "router_line",
 		"pie" => "router_pie",
 		"country" => "router_flag",
 	);
 $router_bar = array(
		"default" => "BAR_default",
		"6h" => "BAR_6_hours",
		"24h" => "BAR_24_hours",
		"7d" => "BAR_7_days",
		"6m" => "BAR_6_months",
	);
 $router_pie = array(
		"default" => "PIE_3_countries",
	);
 $router_flag = array(
		"default" => "FLAG_default",
	);
 $router_line = array(
		"default" => "LINE_default",
		"6h" => "LINE_6_hours",
		"24h" => "LINE_24_hours",
		"7d" => "LINE_7_days",
		"6m" => "LINE_6_months",
	);
 $router_ajax = array(
 		"bar" => "BAR",
 		"line" => "LINE",
 		"pie" => "PIE",
 		"country" => "FLAG",
 	);
$router_roll = array(
 		"get" => "GET",
 		"post" => "POST",
 		"self" => "POST",
 	);

if (isset($_GET['roll']) && !empty($_GET['roll']) && array_key_exists($_GET['roll'], $router_roll) ) {
	require 'rollvisitor_sql_insert.php';
}elseif (isset($_GET['ajax']) && !empty($_GET['ajax']) && array_key_exists($_GET['ajax'], $router_ajax) ) {
	 $vv_chart = $$router_chart[$_GET['ajax']];	

	if(isset($_GET[$_GET['ajax']]) && !empty($_GET[$_GET['ajax']]) && array_key_exists($_GET[$_GET['ajax']], $router_bar) ){
			require 'view/'.$router_ajax[$_GET['ajax']].'/'.$vv_chart[$_GET[$_GET['ajax']]].'.php';
	}else{
		require 'view/'.$router_ajax[$_GET['ajax']].'/'.$vv_chart['default'].'.php';
	}
	
}elseif (isset($_GET['view']) && !empty($_GET['view']) && array_key_exists($_GET['view'], $router_view) ){
	require 'view/'.$router_view[$_GET['view']].'.php';
	
}else{
	require 'view/'.$router_view['default'].'.php';
}
?>
