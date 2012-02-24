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
	
	$model_id = (isset($_REQUEST['model_id'])&&($_REQUEST['model_id']))?$_REQUEST['model_id']:false;
	
	$model_type='';
	
	$letter='';

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
</head>

<body>

<div id="header">
	<h1>
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
	</h1>
    <ul id="menu">
    	<li><a id="women" href="women.php" class="selected_menu" >Women</a></li>
        <li><a id="men" href="men.php">Men</a></li>
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
	<div id="model_selected" class="menu">
		<? 
			if ($model_id){
		?>
		<div id="book">
			<?
				$resultModel4 = mysql_query("SELECT * FROM models_model WHERE id = '" . $model_id . "'");
				$num_cols4 = mysql_affected_rows();
			
				if ($num_cols4>0){
					for($j=0;$j<$num_cols4;$j++){
						$row4 = mysql_fetch_assoc($resultModel4);
						$model_type = $row4['model_type'] ;
						$letter = substr($row4['first_name'],0,1);
			?>
			<h2 id="m_name"><label id="l_<?= $model_id ?>"><?= $row4['first_name'] ?><strong><?= $row4['last_name'] ?></strong></label></h2>
			<dl id="m_data">
				<dt>Height:</dt>
				<dd><?= $row4['height'] ?></dd>
				<?
					if ($row4['gender']=='female'){
				?>
				<dt>Bust:</dt>
				<dd><?= $row4['bust'] ?></dd>
				<?
					}
					if ($row4['gender']=='male'){
						if ($row4['collar']!=''){
				?>
				<dt>Collar:</dt>
				<dd><?= $row4['collar'] ?></dd>
				<?
						}
				?>
				<dt>Chest:</dt>
				<dd><?= $row4['chest'] ?></dd>
				<?
					}
				?>
				<dt>Hips:</dt>
				<dd><?= $row4['hips'] ?></dd>
				<dt>Waist:</dt>
				<dd><?= $row4['waist'] ?></dd>
				<dt>Shoe size:</dt>
				<dd><?= $row4['shoe_size']  ?></dd>
				<dt>Eye color:</dt>
				<dd><?= $row4['eyes_color'] ?></dd>
				<dt>Hair color:</dt>
				<dd><?= $row4['hair_color'] ?></dd>
				</dl>
				<?
						}
					}

					$resultVideos = mysql_query("SELECT * FROM models_youtube WHERE model_id = '" . $model_id . "' AND active=1 ORDER BY add_date DESC");
					$num_cols5 = mysql_affected_rows();
				
					if ($num_cols5>0){
				?>
				<h3 class="videos">Videos</h3>
					<ul id="listavideos">
				<?
						for($j=0;$j<$num_cols5;$j++){
							$row5 = mysql_fetch_assoc($resultVideos);
				?>
				<li><a id="v_<?= $model_id ?>" href="<?= $row5['url_youtube'] ?>"><img src="<?= IMAGES_URL ?>thumbnail_video.gif" alt="<?= $row5['video_name'] ?>" /><?= $row5['video_name'] ?></a></li>
				<?
						}
				?>
				</ul>
				<?
					}
				?>
			
					
			<h3 class="composite">
				<?
					$resultComposite = mysql_query("SELECT * FROM models_composite WHERE model_id = '" . $model_id . "' AND active=1");
					$num_cols6 = mysql_affected_rows();
				
					if ($num_cols6>0){
						for($j=0;$j<$num_cols6;$j++){
							$row6 = mysql_fetch_assoc($resultComposite);
				?>
				<a href="<?= COMPOSITE_URL . $row6['url_composite'] ?>">Donwload/Composite</a>
				<?
						}
					}
				?>
			</h3>

		</div>
		<div id="galeria">
			<ul id="pikame" class="jcarousel-skin-pika">
				<?
					$resultPhotos = mysql_query("SELECT * FROM models_photos WHERE model_id = '" . $model_id . "' AND active=1 ORDER BY add_date DESC");
					$num_cols7 = mysql_affected_rows();
				
					if ($num_cols7>0){
						for($j=0;$j<$num_cols7;$j++){
							$row7 = mysql_fetch_assoc($resultPhotos);
				?>
				<li><a href="print.php?model_id=<?= $model_id ?>&photo_id=<?= $row7['id'] ?>" title="Click aquí para imprimir esta fotografía" target="_blank"><img src="<?= MINI_URL . $row7['url_thumbnail'] ?>" ref="<?= BOOK_URL . $row7['url_photo'] ?>" alt=""/></a></li>
				<?
						}
					}
				?>
			</ul>
		</div>
        <a href="javascript:history.back(1)" id="backfrombook">Back</a>
    </div>
	<?
		}
	?>
</div>

<div id="footer">
	<p>&copy;2012 Isabel Navarro Model Management</p>
    <ul>
        <li><a href="https://twitter.com/#!/IsabelNavarroMo" title="Isabel Navarro Model Management at Twitter"><img src="img/icon_twitter.png" alt="at Twitter" /></a></li>
        <li><a href="http://www.facebook.com/IsabelNavarroModelManagement" title="Isabel Navarro Model Management at Facebook"><img src="img/icon_facebook.png" alt="at Facebook" /></a></li>
    	<li>powered by <a  title="LILIJIMENEZ">LILIJIMENEZ</a></li>
	</ul>
</div>
<script type="text/javascript" src="js/scripts.js?v=4"></script> 
<script type="text/javascript">
	var model_type = '<?= isset($row4['model_type'])?$row4['model_type']:'' ?>';
	if (model_type!=''){
		$('#menu li a').removeClass('selected_menu');
		$('#menu li #'+model_type).addClass('selected_menu');
	}
		
</script>
</body>
</html>