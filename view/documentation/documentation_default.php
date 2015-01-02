<?php

/*************************************************************
 * Roll Visitor
 * @Author name: A. S. M. Sadiqul Islam
 * @Author name: Khalid Bin Zunaid Apu
 * @Creation Date: July 2014
 * @Website Url: http://rollvisitor.com
 * @Version: 1.0.0
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright (C) 2014 - RollVisitor System Inc.
 * 
 */

?>

<div class="widget" style="height: 100%; width : 205%">
    <div class="widget-header" >
        <i class="icon-list-alt"></i>
        <h3> API Documentation</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
    <h2>Add this script </h2><br>
    <p>
	    <li>At the end of your html code add this script.</li>
	    <li>Then rollvisitor will show analitics of you website.</li>
	    <li>You can add this script in only index/home page or all page of your site.</li>
	</p><br>
<textarea rows="7" style="Width : 100% ;">
<?php

echo 
'												<!-- Roll Visitor -->
<script>
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "'.ROLLVISITIR_URL.'?roll=self&page_link="+location.href+"&referer="+document.referrer, true);
	xmlhttp.send();
</script>
												<!-- Roll Visitor -->';
?>
</textarea>
<?php  

if(strpos($_SERVER['HTTP_REFERER'], 'install.php') !== false ){
 echo '<h1>Congratulation! Roll Visitor System</h1>';  
}

?>
<?php echo '
<h4>Click on charts icon to show all charts.<br>
Click on dashboard icon to show all visitor of pages.</h4><br>

<h2>To Show a Single One</h2><br>
Go To<br>
<a href="'.ROLLVISITIR_URL.'?ajax=bar" target="_blank">'.ROLLVISITIR_URL.'?ajax=bar</a> For Bar Chart <br>
<a href="'.ROLLVISITIR_URL.'?ajax=line" target="_blank">'.ROLLVISITIR_URL.'?ajax=line</a> For Line Chart <br>
<a href="'.ROLLVISITIR_URL.'?ajax=pie" target="_blank">'.ROLLVISITIR_URL.'?ajax=pie</a> For Pie Chart <br>
<a href="'.ROLLVISITIR_URL.'?ajax=country" target="_blank">'.ROLLVISITIR_URL.'?ajax=country</a> For Country Flag <br>
<a href="'.ROLLVISITIR_URL.'?view=dashboard" target="_blank">'.ROLLVISITIR_URL.'?view=dashboard</a> For Dashboard <br>
';?>

<h2>Advanced : See in rollvisitor/api-doc.php</h2><br>
<small>File: api-doc.php</small><br>
<?php
highlight_file('api-doc.php');
?>


    </div>
    <!-- /widget-content -->
</div>
<!-- /widget -->

