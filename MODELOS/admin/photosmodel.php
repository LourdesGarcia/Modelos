<?
	//error_reporting(E_ALL);
	include('config_database.php');	
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . 'img/');
	define('BOOK_URL',URL_SERVER . 'book/');
	define('MINI_URL',URL_SERVER . 'mini/');
	define('URL_ADMIN',URL_SERVER . 'admin/');

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
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	 <li><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li><a href="setmodel.php">Modificar modelos</a></li>
		<li class="active"><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
		<?
	$resultModel1 = mysql_query("SELECT first_name, last_name FROM models_model WHERE id='" . $_REQUEST['model_id'] . "'");
		$num_cols1 = mysql_affected_rows();
		if ($num_cols1>0){
			$cont=1;
			for($j=0;$j<$num_cols1;$j++){
				$rowModel = mysql_fetch_assoc($resultModel1);
	?>
	<h2>Gestión de galería de Fotos de <?= strtoupper($rowModel['first_name'])?> <?= strtoupper($rowModel['last_name']) ?></h2>
	<?
			}
		}
	?>
	<div id="ok" style="display:<?=  (isset($textProccessOK)&&($textProccessOK!=''))?'block':'none' ?>">
    	<div>
    		<p><?=  (isset($textProccessOK)&&($textProccessOK!=''))?$textProccessOK:'' ?></p>
    	</div>
    </div>
    <div id="ko" style="display:<?=  (isset($textProccessKO)&&($textProccessKO!=''))?'block':'none' ?>">
    	<div>
            <p><?=  (isset($textProccessKO)&&($textProccessKO!=''))?$textProccessKO:'' ?></p>
    	</div>
    </div>
	<p>Desde este panel puede activar o desactivar imágenes para las galerías de los books y añadir nuevas. La última imagen añadida será la primera mostrada.</p>
    <form action="proccessphotos.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Añadir Imágen</legend>
            <p>Las imágenes deben tener una versión en tamaño grande y otra reducida que se muestra en el carrusel. Seleccione los ficheros y pulse el botón Enviar para guardar las imágenes en el servidor.</p>
            <ul class="rotabanner">
            	<li>
                    <label for="big">Imagen grande</label>
                    <input name="big" type="file" />
				</li>
                <li>
                    <label for="thumbnail">Imagen reducida</label>
                    <input name="thumbnail" type="file" />
            	</li>
            </ul>
			<input type="hidden" name="model_id" id="model_id" value="<?= $_REQUEST['model_id'] ?>" />
			<input type="hidden" name="request_type" id="request_type" value="addPhotos" />
            <input name="enviar" value="Enviar" type="submit" />
    	</fieldset>
    </form>
    <form action="proccessphotos.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Imágenes existentes</legend>
            <p>Listado de imágenes existentes en el book de la modelo. Puede activar o desactivar su visualización seleccionando la opción de cada foto y pulsando finalmente el botón Actualizar</p>
            <ul class="rotabanner">
			<?
				$resultPhotos= mysql_query("SELECT * FROM models_photos WHERE model_id = '" . $_REQUEST['model_id']. "' ORDER BY add_date DESC");
					$num_cols = mysql_affected_rows();
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultPhotos);
				?>
              	<li><img src="<?= MINI_URL . $row['url_thumbnail'] ?>" /><input name="photo_<?= $row['id'] ?>" type="radio" value="activar" <?= ($row['active']==1)?'checked="checked"':'' ?> />Activar  ó <input name="photo_<?= $row['id'] ?>" type="radio" value="desactivar" <?= ($row['active']==0)?'checked="checked"':'' ?> />Desactivar</li>
            <?
					}
				}
			?>
			</ul>
			<input type="hidden" name="model_id" id="model_id" value="<?= $_REQUEST['model_id'] ?>" />
			<input type="hidden" name="request_type" id="request_type" value="updatePhotos" />
        	<input name="actualizar" type="submit" value="Actualizar" />
		</fieldset>
    </form>
</div>


</body>
</html>