<?php
require_once('get_ipaddress.php');

if(!empty(IP_API_USER) && !empty(IP_API_KEY)) {

$locationstr="http://api.locatorhq.com/?user=".IP_API_USER."%20&key=".IP_API_KEY."%20&ip=";
$locationstr = $locationstr.$database->getIpaddress()."&format=xml";

//loading the xml file directly from the website
$xml = simplexml_load_file($locationstr); 

$database->setLongitude( $xml->longitude );
$database->setLatitude( $xml->latitude );
$database->setCountryName( $xml->countryName );

}
?>