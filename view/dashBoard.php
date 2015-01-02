<!DOCTYPE html>
<?php defined('ACCESS') or die("403 Forbidden"); ?>
<html lang="en">
<head>
 <meta charset="utf-8">
    <title>Dashboard - Roll Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a><a class="brand" href="index.php">Roll Visitor</a>
                
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    
                    <li class="active"><a href="?view=dashboard"><i class="icon-list-alt"></i><span>Dashboard</span> </a>
                    
                    <li><a href="?view=chart"><i class="icon-bar-chart"></i><span>Charts</span> </a>
                    </li>
                    </li>
                    <li><a href="?view=documentation"><i class="icon-facetime-video"></i><span>Documentation</span>
                    </a></li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->

    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div>
                            <?php require 'view/dashBoard/dashBoard_default.php';?>
                        </div>
                    </div>
                    <!-- /span6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
    
    <div class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                       <center>Powered by <a href="http://rollvisitor.com"><strong> Roll Visitor</strong></a>.<center>
                    </div>
                    <!-- /span12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-inner -->
    </div>
    <!-- /footer -->
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/excanvas.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/base.js"></script>
    
    
<script>
$(document).ready(function(){

  $("#line_chart").change(function(){
    $("#line_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=line&line=" + $('#line_chart').val());
  });

  $("#bar_chart").change(function(){
    $("#bar_chart_jQueryAJAX").load("<?php echo ROLLVISITIR_URL;?>" + "/?ajax=bar&bar=" + $('#bar_chart').val());
  });

});
</script>
</body>
</html>
