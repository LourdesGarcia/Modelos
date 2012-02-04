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
        <li><a id="men" href="men.php" class="selected_menu">Men</a></li>
        <li><a id="special_booking" href="special_booking.php">Special booking</a></li>
        <li><a id="become_a_model" href="become_a_model.php">Become a model</a></li>
        <li><a id="contact" href="contact.php">Contact</a></li>
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
	<div id="menu_models" class="menus">
		<div class="models_guide">
			<ul id="primerplano">
				<?
					$resultModels = mysql_query("SELECT m.id as id, p.url_photo as url_photo, m.first_name as first_name, m.last_name as last_name  FROM models_model m, models_ppal p WHERE m.model_type = 'men' AND m.active=1 AND m.id=p.model_id AND p.active=1 ORDER BY m.first_name");
					$num_cols = mysql_affected_rows();
				
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultModels);
				?>
				<li id="model_<?= $row['id'] ?>">
					<a id="link_model_<?= $row['id'] ?>">
						<img id="im_<?= $row['id'] ?>" src="<?= PPAL_URL . $row['url_photo'] ?>" alt="<?= $row['first_name'] ?>_<?= $row['last_name'] ?>" />
						<strong><?= strtoupper($row['first_name']) ?> <?= strtoupper($row['last_name']) ?></strong>
					</a>
				</li>
				<?
						}
					}
				?>
			</ul>
		</div>
	</div>
    <ul id="alfabeto">
    	<li><a id="all" class="selected_letter">ALL</a></li>
        <li><a >A</a></li>
        <li><a >B</a></li>
        <li><a >C</a></li>
        <li><a >D</a></li>
        <li><a >E</a></li>
        <li><a >F</a></li>
        <li><a >G</a></li>
        <li><a >H</a></li>
        <li><a >I</a></li>
        <li><a >J</a></li>
        <li><a >K</a></li>
        <li><a >L</a></li>
        <li><a >M</a></li>
        <li><a >N</a></li>
        <li><a >O</a></li>
        <li><a >P</a></li>
        <li><a >Q</a></li>
        <li><a >R</a></li>
        <li><a >S</a></li>
        <li><a >T</a></li>
        <li><a >U</a></li>
        <li><a >V</a></li>
        <li><a >W</a></li>
        <li><a >X</a></li>
        <li><a >Y</a></li>
        <li><a >Z</a></li>
    </ul>
   
</div>

<div id="footer">
	<p>&copy;2011 Isabel Navarro Model Management</p>
    <ul>
        <!-- <li><a  title="Isabel Navarro Model Management at Twitter"><img src="img/icon_twitter.png" alt="at Twitter" /></a></li> -->
        <li><a href="http://www.facebook.com/pages/Isabel-Navarro-Model-Management/133070660058118" title="Isabel Navarro Model Management at Facebook"><img src="img/icon_facebook.png" alt="at Facebook" /></a></li>
    	<li>powered by <a  title="LILIJIMENEZ">LILIJIMENEZ</a></li>
	</ul>
</div>

</body>
</html>