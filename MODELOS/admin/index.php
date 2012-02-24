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
    	<li><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
	<h2>Bienvenido al panel de Administración de ISABEL NAVARRO. Model management</h2>
	<p>Desde este panel puedes gestionar todos los contenidos del sitio web. Usa el menú de la izquierda para acceder a cada una de las secciones.</p>
</div>


</body>
</html>