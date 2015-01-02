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

defined('ACCESS') or die('403 forbidden');
require_once('config.php');
include_once('class/MysqlDatabase.class.php'); 
	$database = new MysqlDatabase();




/* Uncomment this area for external web page 
if(empty($_POST['page_link'])) die();
*/

	if(empty($_GET['page_link'])) die;


if (! $_GET['page_link'] === $_SERVER['HTTP_REFERER']) die ();
//if ( $_GET['page_link'] === $_GET['referer']) die ();

//if (! $_POST['page_link'] === $_SERVER['HTTP_REFERER']) die ();

require_once('data/tracker/time.php');
require_once('data/tracker/ip_api.php');
require_once('data/tracker/get_ipaddress.php');
	
	
		$database->setPage($_GET['page_link']);
		$database->setReferer($_GET['referer']);

/* Uncomment this area for external web page
	$database->setPage($_POST['page_link']);
	$database->setReferer($_POST['referer']);

*/

$database->insertIntoDb();
?>
