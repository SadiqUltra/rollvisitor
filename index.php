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

if(file_exists('install.php')){
	header('Location: ./install.php');
}

require 'config.php';





require 'router/router.php';

?>
