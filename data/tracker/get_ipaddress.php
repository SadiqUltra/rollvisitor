<?php

	$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
	$http_x_forwarded_for= $_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote_addr = $_SERVER['REMOTE_ADDR'];
	
	if(!empty($http_client_ip)){
		$ip = $http_client_ip;
	}else if(!empty($http_x_forwarded_for)){
		$ip = $http_x_forwarded_for;
	}else{
		$ip = $remote_addr;
	}

	 $database->setIpaddress($ip);

?>
