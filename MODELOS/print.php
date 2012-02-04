<?php

	include('config_database.php');
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . 'img/');
	define('BOOK_URL',URL_SERVER . 'book/');
	define('MINI_URL',URL_SERVER . 'mini/');
	define('PPAL_URL',URL_SERVER . 'ppal/');
	define('COMPOSITE_URL',URL_SERVER . 'composite/');
	define('INTRO_URL',URL_SERVER . 'intro/');
	
	$model_id = (isset($_REQUEST['model_id'])&&($_REQUEST['model_id']))?$_REQUEST['model_id']:false;
	$photo_id = (isset($_REQUEST['photo_id'])&&($_REQUEST['photo_id']))?$_REQUEST['photo_id']:false;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="css/print.css" rel="stylesheet" media="all" type="text/css" />
</head>

<body>

<div id="header">
	<h1>
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /></a>
	</h1>
    <a href="javascript:window.print()" id="print"><img src="img/click-here-to-print.jpg" alt="print this page" id="print-button" /></a>
</div>

<div id="container">
	<div id="book">
		<?
			if ($model_id){
				$resultModel = mysql_query("SELECT * FROM models_model WHERE id = '" . $model_id . "'");
				$num_cols = mysql_affected_rows();
			
				if ($num_cols>0){
					for($j=0;$j<$num_cols;$j++){
						$row = mysql_fetch_assoc($resultModel);
		?>
    	<h2><?= $row['first_name'] ?><strong><?=   $row['last_name'] ?></strong></h2>
        <dl>
            <dt>Height:</dt>
				<dd><?= $row['height'] ?></dd>
				<?
					if ($row['gender']=='female'){
				?>
				<dt>Bust:</dt>
				<dd><?= $row['bust'] ?></dd>
				<?
					}
					if ($row['gender']=='male'){
						if ($row['collar']!=''){
				?>
				<dt>Collar:</dt>
				<dd><?= $row['collar'] ?></dd>
				<?
						}
				?>
				<dt>Chest:</dt>
				<dd><?= $row['chest'] ?></dd>
				<?
					}
				?>
				<dt>Hips:</dt>
				<dd><?= $row['hips'] ?></dd>
				<dt>Waist:</dt>
				<dd><?= $row['waist'] ?></dd>
				<dt>Shoe size:</dt>
				<dd><?= $row['shoe_size']  ?></dd>
				<dt>Eye color:</dt>
				<dd><?= $row['eyes_color'] ?></dd>
				<dt>Hair color:</dt>
				<dd><?= $row['hair_color'] ?></dd>
        </dl>
		<?
					}
				}
			}
		?>
    </div>
    <div id="galeria">
		<? if ($photo_id){
			$resultPhotos = mysql_query("SELECT url_photo FROM models_photos WHERE id = '" . $photo_id . "' AND model_id='" . $model_id . "' AND active=1");
			$num_cols2 = mysql_affected_rows();
			if ($num_cols2>0){
				for($j=0;$j<$num_cols2;$j++){
					$row2 = mysql_fetch_assoc($resultPhotos);
		?>
    	<img src="<?=  BOOK_URL . $row2['url_photo'] ?>" />
		<? 	
					}
				}
			}
		?>
    </div>
</div>

<div id="footer">
	<p class="left">&copy;2012 Isabel Navarro Model Management</p>
	<p class="right">Príncipe de Vergara, 90 1°D 28006 - Madrid (Spain)<br />
    	T. +34 915 633 042 - M. +34 651 422 161<br />
        models@isabelnavarro.net</p>
</div>




<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script>
    $("#print").click(function () {
      $("#print").remove();
    });
</script>
</body>
</html>
<?  exit();?>