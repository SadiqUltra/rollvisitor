<?php

/*************************************************************
 * @ package Roll Visitor
 * @Author name: A. S. M. Sadiqul Islam & Khalid Ibn Zinnah Apu
 * @Creation Date: July 2014
 * @Website Url: http://rollvisitor.com
 * @Version: 1.0.0
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright (C) 2014 - RollVisitor System Inc.
 * 
 */

?>
<html>
 <meta charset="utf-8">
    <title>Installatioin - Roll Visitor</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<?php if(empty($_SERVER['HTTP_REFERER']))echo '';  ?>
<div align="center">
    <!-- /widget-header -->
    <div class="widget-content" >
		<?php
		
		if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {	
			
			$ROLLVISITIR_URL = $_SERVER['HTTP_REFERER'];
			$ROLLVISITIR_URL = str_replace('install.php', '', $ROLLVISITIR_URL);
		}
		?>
	<h2>Setup your Config.php file.<br>Fillup database name, host, username and password</h2><br>
	<h3>also ip api user and key</h3><br>
	<small>You can get free ip api key from <a href="http://locatorhq.com">locatorhq.com</a></small>
		<form action="#" method="post">
			<br>
		</form>
	</div>
	</body>
	</html>

	<?php

	$SITE_NAME = 'Roll Visitor';
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASSWORD = '';
	$DB_NAME = 'database_name';
	$DB_TABLE = 'rollvisitor_log';

	if(!empty($_POST['SITE_NAME'])) $SITE_NAME = $_POST['SITE_NAME'];
	if(!empty($_POST['DB_HOST'])) $DB_HOST = $_POST['DB_HOST'];
	if(!empty($_POST['DB_USER'])) $DB_USER = $_POST['DB_USER'];
	if(!empty($_POST['DB_PASSWORD'])) $DB_PASSWORD = $_POST['DB_PASSWORD'];
	if(!empty($_POST['DB_NAME'])) $DB_NAME = $_POST['DB_NAME'];
	if(!empty($_POST['DB_TABLE'])) $DB_TABLE = $_POST['DB_TABLE'];
	if(!empty($_POST['DB_CHARSET'])) $DB_CHARSET = $_POST['DB_CHARSET'];
	if(!empty($_POST['IP_API_USER'])) $IP_API_USER = $_POST['IP_API_USER'];
	if(!empty($_POST['IP_API_KEY'])) $IP_API_KEY = $_POST['IP_API_KEY'];



	$configSetup = "<?php
	define('SITE_NAME', '$SITE_NAME');
	//Database host name
	define('DB_HOST', '$DB_HOST');
	//Database name
	define('DB_NAME', '$DB_NAME');
	//Database user name
	define('DB_USER', '$DB_USER');
	//Database password
	define('DB_PASSWORD', '$DB_PASSWORD');
	//Database table name
	define('DB_TABLE', '$DB_TABLE');
	define('DB_CHARSET', '$DB_CHARSET');
	//IP api user
	define('IP_API_USER', '$IP_API_USER');
	//IP api key
	define('IP_API_KEY', '$IP_API_KEY');
	//Url of rollvisitor folder
	define('ROLLVISITIR_URL', '$ROLLVISITIR_URL');
	//Country flag to show
	define('NUM_COUNTRY_SHOW', 25);
?>";

if(file_exists('config.php')){
	if(!unlink('install.php')){
		die("Could not remove install.php file, permission denied!<br>You need to manually delete this file or change permission");
	}
	header('Location: ./index.php?view=documentation&install=okay');
}

if(isset($_POST['install']) && !empty($_POST['install'])){

	$sql = "CREATE TABLE IF NOT EXISTS `$DB_TABLE` (\n"
    . " `id` int(11) NOT NULL AUTO_INCREMENT,\n"
    . " `ipaddress` varchar(20) NOT NULL,\n"
    . " `datetime` datetime NOT NULL,\n"
    . " `latitude` varchar(20) NOT NULL,\n"
    . " `longitude` varchar(20) NOT NULL,\n"
    . " `country` varchar(40) NOT NULL,\n"
    . " `page` varchar(100) NOT NULL,\n"
    . " `referer` varchar(100) NOT NULL,\n"
    . " PRIMARY KEY (`id`)\n"
    . ") ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

	$db_con = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);

	if (!$db_con) {
	    die('Could not connect: ' . @mysql_error());
	}
	if (!@mysql_select_db($DB_NAME,$db_con)) {
	    die('Could not select database.Please check your database name: ' . @mysql_error());
	}
	if (!@mysql_query($sql)) {
	    die('Could not create table on this database. Please permission of this user: ' . @mysql_error());
	}
	
	@mysql_close($db_con);


	$file = 'config.php';
	if(!touch($file)){
		die ("Could not Create confiq.php file, permission denied.<br>You need to manually create this file from config-sample.php or change permission.");
	}
	file_put_contents($file, $configSetup);
	header('Location: ./index.php?view=documentation&install=okay');
}
?>

	<form action = "#" method = "POST">
		<br>
		<h3>Database Host Name  :<input type = "text" name = "DB_HOST" maxlength = "30" value = "<?php echo $DB_HOST; ?>">    
		<br><br>
		Database Username   :<input type = "text" name = "DB_USER" maxlength = "30" value = "<?php echo $DB_USER; ?>">    
		<br><br>
		Database Password   :<input type = "text" name = "DB_PASSWORD" maxlength = "30" value = "<?php echo $DB_PASSWORD; ?>">    
		<br><br>
		Database Name       :<input type = "text" name = "DB_NAME" maxlength = "30" value = "<?php echo $DB_NAME; ?>">    
		<br><br>
		Database Table Name :<input type = "text" name = "DB_TABLE" maxlength = "30" value = "<?php echo $DB_TABLE; ?>">    
		<br><br>

		IP Api User         :<input type = "text" name = "IP_API_USER" maxlength = "30" value = "<?php echo $IP_API_USER; ?>">    
		<br><br>
		IP Api Key          :<input type = "text" name = "IP_API_KEY" maxlength = "30" value = "<?php echo $IP_API_KEY; ?>">    
		<br><br>

		<input type="hidden" name ="install" value="okay">
		<input type="submit" value="Okay, done">
		</h3>
	</form>

	<div class="widget">
	    <div class="widget-header">         
	    </div>
	    <!-- /widget-content -->
	</div>
	<!-- /widget -->
</div>
