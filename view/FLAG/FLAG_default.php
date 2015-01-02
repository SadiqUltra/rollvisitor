<?php defined('ACCESS') or die("403 Forbidden");?>
<link href="css/flags16.css" rel="stylesheet" type="text/css">
<link href="css/flags32.css" rel="stylesheet" type="text/css">

<?php require 'data/view/FLAG/FLAG_data_countries.php'; ?>

<style type="text/css">
	ul { font-family: "Lato","Helvetica Neue",Helvetica,Arial,sans-serif; }
	ul.f16 { max-width: 320px; display: inline-block; vertical-align: top; font-size: 12px; }
	ul.f32 { display: inline-block; }
	.f16 .flag, .f32 .flag { width: auto; clear: right; }
	.f16 .flag { padding-left: 24px; }
	.f32 .flag { padding-left: 44px; }
	.f16 abbr, .f16 i { display: inline-block; width: 24px; }
	.f32 abbr, .f32 i { display: inline-block; width: 32px; line-height: 32px; vertical-align: bottom; }
	.f16 i { margin-left: -48px; margin-right: 24px; color: silver; }
	.f32 i { margin-left: -76px; margin-right: 44px; color: silver; }
	.flag.deprecated { color: silver; }
	.flag.island { color: navy; }
</style>


<div class="widget">
        <?php if(!$from_api) { echo '
    <div class="widget-header" >
        <i class="icon-bar-chart"></i>
        <h3> Countries'."'".'Flag </h3> 
    </div>'
        ;}?>
    <!-- /widget-header -->
    <div <?php if(!$from_api) { echo 'class="widget-content" style="overflow: scroll; height: 320px;"';}?>>
		<ul class="f32" style="width : 100%;">
			<?php for ($i=0; $i < NUM_COUNTRY_SHOW; $i++) { if(empty($countryAll[$i]['country']) ) continue; ?>
		 		  <abbr style="margin-left : 90px;"><?php echo  $countries[$countryAll[$i]['country']]; ?></abbr><li class= <?php echo  "\"flag ".strtolower($countries[$countryAll[$i]['country']])."\""; ?>> <?php echo  $countryAll[$i]['country']; ?></li>
		 		  <abbr style="color: #F764AB; margin-rigth : 70%;" ><?php echo $countryAll[$i]["COUNT(country)"]; ?></abbr> 
		 	 <br/>
			<?php } ?>
		</ul>
    </div>
    <!-- /widget-content -->
</div>
<!-- /widget -->

