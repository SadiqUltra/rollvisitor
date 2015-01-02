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

/*
|==============================================================================|
|1. In rollvisitor Folder Create Any File With .php Extension                  |
|2. Add require_once 'api.php';                                                |
|3. Then Use rollvisitor_api() function                                        |
|                                                                              |
|------------------------------------------------------------------------------|
|                                                                              |
|   bool rollvisitor_api(String $view,mixed $number/default, String $unite)    |
|                                                                              |
|   String $view = BAR, LINE, PIE or FLAG                                      |
|   String $number = 6, 7, 24, 3 or default                                    |
|   String $unite = days, months, hours, countries                             |
|                                                                              |
|------------------------------------------------------------------------------|
|==============================================================================|
*/

require_once 'api.php';

//|---------------------------------bar-Chart----------------------------------|

//To show Bar chart uncomment the line bellow
//rollvisitor_api('BAR', '6', 'hours');

//To show Bar chart uncomment the line bellow
//rollvisitor_api('BAR', '24', 'hours');

//To show Bar chart uncomment the line bellow
//rollvisitor_api('BAR', '7', 'days');

//To show Bar chart uncomment the line bellow
//rollvisitor_api('BAR', '6', 'months');

//|---------------------------------Line-Chart---------------------------------|

//To show Line chart uncomment the line bellow
//rollvisitor_api('LINE', '6', 'hours');

//To show Line chart uncomment the line bellow
//rollvisitor_api('LINE', '24', 'hours');

//To show Line chart uncomment the line bellow
//rollvisitor_api('LINE', '7', 'days');

//To show Line chart uncomment the line bellow
//rollvisitor_api('LINE', '6', 'months');

//|---------------------------------Pie-Chart----------------------------------|

//To show Pie chart uncomment the line bellow
//rollvisitor_api('PIE', '3', 'countries');

//|----------------------------Countries'-flag---------------------------------|

//To show Countries flag uncomment the line bellow
//rollvisitor_api('FLAG', 'default');

//To show Dashboard uncomment the line bellow
//rollvisitor_api('dashBoard', 'default');


/*
 +----------------------------------------------------------------------------+
|                Example:   This example code loads countries' flag            |
 +----------------------------------------------------------------------------+
#File: rollvisitor/example-api-application.php

<?php 

	require_once 'api.php';

	rollvisitor_api('FLAG', 'default');

?>

 +----------------------------------------------------------------------------+
|              End of File: rollvisitor/example-api-application.php            |
 +----------------------------------------------------------------------------+
*/

?>
