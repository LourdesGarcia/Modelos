<?
	//error_reporting(E_ALL);
	include('config_database.php');	
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . 'img/');
	define('VIDEOS_URL',URL_SERVER . 'youtube/');

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
    	<img src="../img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" />
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	<li><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li class="active"><a href="videos.php">Gestionar vídeos</a></li>
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
	<h2>Gestión de galería de Vídeos de <?= strtoupper($rowModel['first_name'])?> <?= strtoupper($rowModel['last_name']) ?></h2>
	<?
			}
		}
	?>
	<p>Desde este panel puede activar o desactivar vídeos para las galerías de los books y añadir nuevos. El último imagen añadido será el primero mostrado.</p>
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
    <form action="proccessvideos.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Añadir Vídeo</legend>
            <p>Los vídeos deben tener un título no superior a 15 caracteres y un enlace a la ubicación del vídeo. Introduzca ambos datos y pulse el botón Enviar.</p>
            <ul class="rotabanner">
            	<li>
                    <label for="titulo"><strong>Título</strong></label>
                    <input type="text" maxlength="15" id="titulo" name="titulo"/>
				</li>
                <li>
                    <label for="url"><strong>Link al vídeo</strong></label>
                    <input type="text" id="url" name="url"/>
            	</li>
            </ul>
		<input type="hidden" name="model_id" id="model_id" value="<?= $_REQUEST['model_id'] ?>" />
		<input type="hidden" name="request_type" id="request_type" value="addVideos" />
        <input name="enviar" value="Enviar" type="submit" />
    	</fieldset>
    </form>
    <form action="proccessvideos.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Vídeos existentes</legend>
            <p>Listado de vídeos existentes en el book de la modelo. Puede activar o desactivar su visualización seleccionando la opción de cada vídeo y editar título y dirección pulsando finalmente el botón Actualizar</p>
            <ul class="listavideos">
				<?
				$resultVideos= mysql_query("SELECT * FROM models_youtube WHERE model_id = '" . $_REQUEST['model_id']. "' ORDER BY add_date DESC");
					$num_cols = mysql_affected_rows();
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultVideos);
				?>
            	<li>
                    <strong><?= $row['video_name'] ?></strong>
                    <ul class="rotabanner">
                        <li>
                            <label for="titulo"><strong>Título</strong></label>
                            <input type="text" maxlength="15" id="titulo" name="titulo" value="<?= $row['video_name'] ?>"/>
                        </li>
                        <li>
                            <label for="url"><strong>Link al vídeo</strong></label>
                            <input type="text" id="url"  name="url" value="<?= $row['url_youtube'] ?>"/>
                        </li>
                        <li><input name="video_<?= $row['id'] ?>" type="radio" value="activar" <?= ($row['active']==1)?'checked="checked"':'' ?> />Activar  ó <input name="video_<?= $row['id'] ?>" type="radio" value="desactivar" <?= ($row['active']==0)?'checked="checked"':'' ?>/>Desactivar</li>
                    </ul>
                </li>
				<?
						}
					}
				?>
            </ul>	
			<input type="hidden" name="model_id" id="model_id" value="<?= $_REQUEST['model_id'] ?>" />
			<input type="hidden" name="request_type" id="request_type" value="updateVideos" />
        	<input name="actualizar" type="submit" value="Actualizar" />
		</fieldset>
    </form>
</div>


</body>
</html>