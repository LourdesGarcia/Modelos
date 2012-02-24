<?
	//error_reporting(E_ALL);
	include('../config_database.php');	
	define('URL_WEB','//www.rociolourdes.hostoi.com/');
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . '../img/');
	define('INTRO_URL',URL_SERVER . '../intro/');
	define('URL_ADMIN',URL_SERVER . 'admin/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management: Gestor de contenidos</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="../css/styles.css?v=2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script> 
</head>

<body id="administrador">

<div id="cabecera">
    	<a href="<?= URL_WEB ?>index.php"><img src="../img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	<li class="active"><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
	<h2>Administración de imágenes de entrada al sitio</h2>
	<p>Desde este panel puede activar o desactivar imágenes para la intro del sitio web y añadir nuevas. La última imagen añadida será la primera mostrada.</p>
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
    <form action="proccessintro.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Añadir Imágen</legend>
            <input name="add_intro" id="add_archivo_intro" type="file" />
			<input type="hidden" name="request_type" id="request_type" value='addIntro' />
            <input name="enviar" value="Enviar" type="submit" />
    	</fieldset>
    </form>
    <form action="proccessintro.php" method="POST" ENCTYPE="multipart/form-data">
    	<fieldset>
        	<legend>Imágenes existentes</legend>
			<ul class="rotabanner">
				<?
					$resultIntro1 = mysql_query("SELECT * FROM models_intro ORDER BY selectedOrder");
					$num_cols1 = mysql_affected_rows();
					if ($num_cols1>0){
						$cont=1;
						for($j=0;$j<$num_cols1;$j++){
							$row1 = mysql_fetch_assoc($resultIntro1);
				?>
              	<li>Imagen mostrada Nº <?= $cont?>: <input name="<?= $row1['photo_name'] ?>" type="radio" value="activar" <?= ($row1['active']==1)?'checked="checked"':'' ?> />Activar  ó <input name="<?= $row1['photo_name'] ?>" type="radio" value="desactivar" <?= ($row1['active']==0)?'checked="checked"':'' ?>/>Desactivar <input name="<?= $row1['photo_name'] ?>" type="checkbox" value="borrar"/>Borrar <input id="selectedOrder" style="font-size:16px;width:77px;" type="text" value="<?= ($row1['selectedOrder']=='2147483647')?'':$row1['selectedOrder'] ?>" name="order_<?= $row1['id'] ?>" maxlength="9" />
                	<img src="<?= INTRO_URL . $row1['url_photo'] ?>" width="500"/>
				</li>
				<?
							$cont++;
						}
					}
				?>
            </ul>
			<input type="hidden" name="request_type" id="request_type" value="updateIntro" />
        	<input name="actualizar" type="submit" value="Actualizar" />
		</fieldset>
    </form>
</div>


</body>
</html>