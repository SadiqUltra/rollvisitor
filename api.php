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

define('ACCESS', 'Allowed');
require_once 'config.php';
function rollvisitor_api($view=null, $amount=null, $unite=null){
	if($amount) $amount = "_$amount";
	if($unite) $unite = "_$unite";
	$from_api = true;
	if(@require ("./view/$view/$view$amount$unite.php"))return true;
	return false;
}
?>
