<?
	//error_reporting(E_ALL);
	include('../config_database.php');	
	define('URL_WEB','//www.rociolourdes.hostoi.com/');
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . '../img/');
	define('VIDEOS_URL',URL_SERVER . '../youtube/');
	define('URL_ADMIN', URL_SERVER . '../admin/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management: Gestor de contenidos</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head> 

<body id="administrador">

<div id="cabecera">
		<a href="<?= URL_WEB ?>index.php"><img src="../img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	<li><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li class="active"><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
	<h2>Listado de modelos de la agencia</h2>
	<p>Desde este listado puede modificar los datos de modelos de la agencia que ya aparecen en la página web. Para editar los datos de un modelo pulse sobre el nombre de la modelo.</p>
    <fieldset>
        <legend>Women</legend>
        <ol>
			<?
				$resultModels = mysql_query("SELECT id, first_name, last_name  FROM models_model WHERE model_type = 'women' ORDER BY first_name");
					$num_cols = mysql_affected_rows();
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultModels);
			?>
        	<li><a id="<?= $row['id'] ?>"  href="model.php?model_id=<?= $row['id'] ?>"><?= strtoupper($row['first_name']) ?> <?= strtoupper($row['last_name']) ?></a></li>
			<?
					}
				}
			?>
        </ol>
	</fieldset>
    
    <fieldset>
        <legend>Men</legend>
        <ol>
        	<?
				$resultModels = mysql_query("SELECT id, first_name, last_name  FROM models_model WHERE model_type = 'men' ORDER BY first_name");
					$num_cols = mysql_affected_rows();
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultModels);
			?>
        	<li><a id="<?= $row['id'] ?>"  href="model.php?model_id=<?= $row['id'] ?>"><?= strtoupper($row['first_name']) ?> <?= strtoupper($row['last_name']) ?></a></li>
			<?
					}
				}
			?>
        </ol>
	</fieldset>
    
    <fieldset>
        <legend>Special bookings</legend>
        <ol>
        	<?
				$resultModels = mysql_query("SELECT id, first_name, last_name  FROM models_model WHERE model_type = 'special_booking' ORDER BY first_name");
					$num_cols = mysql_affected_rows();
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultModels);
			?>
        	<li><a id="<?= $row['id'] ?>"  href="model.php?model_id=<?= $row['id'] ?>"><?= strtoupper($row['first_name']) ?> <?= utf8_encode($row['last_name']) ?></a></li>
			<?
					}
				}
			?>
        </ol>
	</fieldset>
    
</div>


</body>
</html>