<?
	//error_reporting(E_ALL);
	include('config_database.php');
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . 'img/');
	define('BOOK_URL',URL_SERVER . 'book/');
	define('MINI_URL',URL_SERVER . 'mini/');
	define('PPAL_URL',URL_SERVER . 'ppal/');
	define('COMPOSITE_URL',URL_SERVER . 'composite/');
	define('INTRO_URL',URL_SERVER . 'intro/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management</title>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="js/callingtostage.js"></script>
<script type="text/javascript" src="js/jquery.pikachoose.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/jquery.cycle.lite.js"></script>
<link rel="stylesheet" href="css/styles.css?v=4" type="text/css"/>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="js/scripts.js?v=4"></script> 
</head>

<body>

<div id="header">
	<h1>
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
	</h1>
    <ul id="menu">
    	<li><a id="women" href="women.php">Women</a></li>
        <li><a id="men" href="men.php">Men</a></li>
        <li><a id="special_booking" href="special_booking.php">Special booking</a></li>
        <li><a id="become_a_model" href="become_a_model.php">Become a model</a></li>
        <li><a id="contact" href="contact.php" class="selected_menu">Contact</a></li>
    </ul>
	<div id="modelselector">
		<label for="find_a_model">Find a model</label>
		<select name="find_a_model" id="find_a_model">
			<option selected>FIND A MODEL</option>
			<!--<option value="women">WOMEN</option>-->
            <optgroup label="WOMEN">
			<?
				$resultModels1 = mysql_query("SELECT * FROM models_model WHERE model_type = 'women' AND active=1 ORDER BY first_name");
				$num_cols1 = mysql_affected_rows();
			
				if ($num_cols1>0){
					for($j=0;$j<$num_cols1;$j++){
						$row1 = mysql_fetch_assoc($resultModels1);
			?>
			<option value="m_<?= $row1['id'] ?>"><?= $row1['first_name'] ?> <?= $row1['last_name'] ?></option>
			<?
					}
				}
			?>
            </optgroup>
			<!--<option value="men">MEN</option>-->
            <optgroup label="MEN">
			<?
				$resultModels2 = mysql_query("SELECT * FROM models_model WHERE model_type = 'men' AND active=1 ORDER BY first_name");
				$num_cols2 = mysql_affected_rows();
			
				if ($num_cols2>0){
					for($k=0;$k<$num_cols2;$k++){
						$row2 = mysql_fetch_assoc($resultModels2);
			?>
			<option value="m_<?= $row2['id'] ?>"><?= $row2['first_name'] ?> <?= $row2['last_name'] ?></option>
			<?
					}
				}
			?>
            </optgroup>
			<!--<option value="special_booking">SPECIAL BOOKING</option>-->
            <optgroup label="SPECIAL BOOKING">
			<?
				$resultModels3 = mysql_query("SELECT * FROM models_model WHERE model_type = 'special_booking' AND active=1 ORDER BY first_name");
				$num_cols3 = mysql_affected_rows();
			
				if ($num_cols3>0){
					for($j=0;$j<$num_cols3;$j++){
						$row3 = mysql_fetch_assoc($resultModels3);
			?>
			<option value="m_<?= $row3['id'] ?>"><?= $row3['first_name'] ?> <?= $row3['last_name'] ?></option>
			<?
					}
				}
			?>
            </optgroup>
		</select>
	</div>
</div>

<div id="container">
	<div id="menu_contact" class="menus">
    	<h2><span>CONTACTO</span> / CONTACT</h2>
        <div class="columna">
        	<h3>Dirección / Address</h3>
            <p>Calle Príncipe de Vergara <br />90, 1°D - Madrid<br />28006 (Spain)</p>
            <p><span>T.</span>  +34 915 633 042<br />
                <span>M.</span> +34 651 422 161</p>
            <p><strong>Fashion</strong><br /><a href="mailto:models@isabelnavarro.net">models@isabelnavarro.net</a></p>
            <p><strong>Commercial</strong><br /><a href="mailto:casting@isabelnavarro.net">casting@isabelnavarro.net</a></p>
            <p><strong>Scouting</strong><br /><a href="isabel@isabelnavarro.net">isabel@isabelnavarro.net</a></p>
		</div><!-- primera columna -->
        <div class="columna">
        	<h3>Síguenos / Follow us</h3>
			<ul class="contacto_sociales">
            	<li><a href="https://www.facebook.com/IsabelNavarroModelManagement" class="facebook">isabelnavarromodelsmanagement</a></li>
				<li><a href="https://twitter.com/#!/IsabelNavarroMo" class="twitter">@isabelnavarromo</a></li>
			</ul>
		</div><!-- segunda columna -->
        <div class="mapa">
        	<iframe width="430" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps/ms?msa=0&amp;msid=215618044455572295580.0004b9824803249f5cb7d&amp;ie=UTF8&amp;t=m&amp;ll=40.438006,-3.678864&amp;spn=0.002899,0.004603&amp;z=17&amp;iwloc=0004b9826bf82dd3382cc&amp;output=embed"></iframe><br /><small>Ver <a href="http://maps.google.es/maps/ms?msa=0&amp;msid=215618044455572295580.0004b9824803249f5cb7d&amp;ie=UTF8&amp;t=m&amp;ll=40.438006,-3.678864&amp;spn=0.002899,0.004603&amp;z=17&amp;iwloc=0004b9826bf82dd3382cc&amp;source=embed" style="color:#0000FF;text-align:left">Isabel Navarro Model Management</a> en un mapa más grande</small>
		</div><!-- mapa -->
        <br class="clear" />
    </div>
</div>

<div id="footer">
	<p>&copy;2012 Isabel Navarro Model Management</p>
    <ul>
        <li><a href="https://twitter.com/#!/IsabelNavarroMo" title="Isabel Navarro Model Management at Twitter"><img src="img/icon_twitter.png" alt="at Twitter" /></a></li>
        <li><a href="http://www.facebook.com/IsabelNavarroModelManagement" title="Isabel Navarro Model Management at Facebook"><img src="img/icon_facebook.png" alt="at Facebook" /></a></li>
    	<li>powered by <a  title="LILIJIMENEZ">LILIJIMENEZ</a></li>
	</ul>
</div>

</body>
</html>