<?
	error_reporting(E_ALL);
	include('config_database.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Listado inicial de modelos</title>
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>-->
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/scripts.js"></script> 
	<link rel="stylesheet" href="css/styles.css?v=2" type="text/css"/>
  </head>
  <body style="background-color: white">
	<div id="menu">
		<a id="women" class="selected_menu">WOMEN</a><a id="men">MEN</a><a id="special_booking">SPECIA BOOKING</a>
	</div>
	<div id="wrapper">
		<div id="menu_women" class="menus" style="display:block">
			<div class="models_guide">
				<ul>
					<?
						$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = 'women' ORDER BY first_name");
						$num_cols = mysql_affected_rows();
					
						if ($num_cols>0){
							for($i=0;$i<$num_cols;$i++){
								$row = mysql_fetch_assoc($resultModels);
					?>
						<li><label>Nombre: <?= strtoupper(utf8_encode($row['first_name'])) ?></label><br><label>Apellido: <?= strtoupper(utf8_encode($row['last_name'])) ?></label><br><label>Direccion: <?= utf8_encode($row['address']) ?></label>
							<br><label>Codigo postal: <?= utf8_encode($row['zip_code']) ?></label><br><label>Ciudad: <?= utf8_encode($row['city']) ?></label><br><label>Telefono: <?= $row['phone_number'] ?></label>
							<br><label>Pais: <?= utf8_encode($row['the_state']) ?></label><br><label>Movil: <?= $row['mobile'] ?></label><br><label>Email: <?= utf8_encode($row['email']) ?></label>
							<br><label>Genero: <?= utf8_encode($row['gender']) ?></label><br><label>Edad: <?= utf8_encode($row['age']) ?></label><br><label>Color de pelo: <?= utf8_encode($row['hair_color']) ?></label>
							<br><label>Color de ojos: <?= utf8_encode($row['eyes_color']) ?></label><br><label>Altura: <?= utf8_encode($row['height']) ?></label><br><label>Pecho (mujer): <?= utf8_encode($row['bust']) ?></label>
							<br><label>Caderas (mujer): <?= utf8_encode($row['hips']) ?></label><br><label>Cintura: <?= utf8_encode($row['waist']) ?></label><br><label>Cuello (hombre): <?= utf8_encode($row['collar']) ?></label>
							<br><label>Pecho (hombre): <?= utf8_encode($row['chest']) ?></label><br><label>Url imagen de cara: <?= utf8_encode($row['url_headshot_photo']) ?></label><br><label>Url imagen de cuerpo entero: <?= utf8_encode($row['url_full_length_photo']) ?></label>
							<br><label>Tipo de modelo: <?= utf8_encode($row['model_type']) ?></label><br>
						</li>
						<br />
					<?
							}
						}
					?>
				</ul>
			</div>
		</div>
		<div id="menu_men" class="menus" style="display:none">
			<div class="models_guide">
				<ul>
					<?
						$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = 'men' ORDER BY first_name");
						$num_cols = mysql_affected_rows();
					
						if ($num_cols>0){
							for($i=0;$i<$num_cols;$i++){
								$row = mysql_fetch_assoc($resultModels);
					?>
						<li><label>Nombre: <?=  strtoupper(utf8_encode($row['first_name'])) ?></label><br><label>Apellido: <?=  strtoupper(utf8_encode($row['last_name'])) ?></label><br><label>Direccion: <?= utf8_encode($row['address']) ?></label>
							<br><label>Codigo postal: <?= utf8_encode($row['zip_code']) ?></label><br><label>Ciudad: <?= utf8_encode($row['city']) ?></label><br><label>Telefono: <?= $row['phone_number'] ?></label>
							<br><label>Pais: <?= utf8_encode($row['the_state']) ?></label><br><label>Movil: <?= $row['mobile'] ?></label><br><label>Email: <?= utf8_encode($row['email']) ?></label>
							<br><label>Genero: <?= utf8_encode($row['gender']) ?></label><br><label>Edad: <?= utf8_encode($row['age']) ?></label><br><label>Color de pelo: <?= utf8_encode($row['hair_color']) ?></label>
							<br><label>Color de ojos: <?= utf8_encode($row['eyes_color']) ?></label><br><label>Altura: <?= utf8_encode($row['height']) ?></label><br><label>Pecho (mujer): <?= utf8_encode($row['bust']) ?></label>
							<br><label>Caderas (mujer): <?= utf8_encode($row['hips']) ?></label><br><label>Cintura: <?= utf8_encode($row['waist']) ?></label><br><label>Cuello (hombre): <?= utf8_encode($row['collar']) ?></label>
							<br><label>Pecho (hombre): <?= utf8_encode($row['chest']) ?></label><br><label>Url imagen de cara: <?= utf8_encode($row['url_headshot_photo']) ?></label><br><label>Url imagen de cuerpo entero: <?= utf8_encode($row['url_full_length_photo']) ?></label>
							<br><label>Tipo de modelo: <?= utf8_encode($row['model_type']) ?></label><br>
						</li>
						<br />
					<?
							}
						}
					?>
				</ul>
			</div>
		</div>
		<div id="menu_special_booking" class="menus" style="display:none">
			<div class="models_guide">
				<ul>
					<?
						$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = 'special_booking' ORDER BY first_name");
						$num_cols = mysql_affected_rows();
					
						if ($num_cols>0){
							for($i=0;$i<$num_cols;$i++){
								$row = mysql_fetch_assoc($resultModels);
					?>
						<li><label>Nombre: <?=  strtoupper(utf8_encode($row['first_name'])) ?></label><br><label>Apellido: <?=  strtoupper(utf8_encode($row['last_name'])) ?></label><br><label>Direccion: <?= utf8_encode($row['address']) ?></label>
							<br><label>Codigo postal: <?= utf8_encode($row['zip_code']) ?></label><br><label>Ciudad: <?= utf8_encode($row['city']) ?></label><br><label>Telefono: <?= $row['phone_number'] ?></label>
							<br><label>Pais: <?= utf8_encode($row['the_state']) ?></label><br><label>Movil: <?= $row['mobile'] ?></label><br><label>Email: <?= utf8_encode($row['email']) ?></label>
							<br><label>Genero: <?= utf8_encode($row['gender']) ?></label><br><label>Edad: <?= utf8_encode($row['age']) ?></label><br><label>Color de pelo: <?= utf8_encode($row['hair_color']) ?></label>
							<br><label>Color de ojos: <?= utf8_encode($row['eyes_color']) ?></label><br><label>Altura: <?= utf8_encode($row['height']) ?></label><br><label>Pecho (mujer): <?= utf8_encode($row['bust']) ?></label>
							<br><label>Caderas (mujer): <?= utf8_encode($row['hips']) ?></label><br><label>Cintura: <?= utf8_encode($row['waist']) ?></label><br><label>Cuello (hombre): <?= utf8_encode($row['collar']) ?></label>
							<br><label>Pecho (hombre): <?= utf8_encode($row['chest']) ?></label><br><label>Url imagen de cara: <?= utf8_encode($row['url_headshot_photo']) ?></label><br><label>Url imagen de cuerpo entero: <?= utf8_encode($row['url_full_length_photo']) ?></label>
							<br><label>Tipo de modelo: <?= utf8_encode($row['model_type']) ?></label><br>
						</li>
						<br />
					<?
							}
						}
					?>
				</ul>
			</div>
		</div>
		<div id="models_selection">
			<ul>
				<li><a id="all" class="selected_letter"> ALL </a></li><li><a> A </a></li><li><a> B </a></li><li><a> C </a></li><li><a> D </a></li><li><a> E </a></li><li><a> F </a></li><li><a> G </a></li><li><a> H </a></li><li><a> I </a></li><li><a> J </a></li><li><a> K </a></li><li><a> L </a></li><li><a> M </a></li><li><a> N </a></li><li><a> O </a></li><li><a> P </a></li><li><a> Q </a></li><li><a> R </a></li><li><a> S </a></li><li><a> T </a></li><li><a> U </a></li><li><a> V </a></li><li><a> W </a></li><li><a> X </a></li><li><a> Y </a></li><li><a> Z </a></li>
			</ul>
		</div>
	  </div>
  </body>
</html>