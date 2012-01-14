<?
	error_reporting(E_ALL);
	include('config_database.php');
	define('IMAGES_URL','http://rociolourdes.hostoi.com/img/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/scripts.js"></script> 
<link rel="stylesheet" href="css/styles.css?v=3" type="text/css"/>
</head>

<body>

<div id="header">
	<h1>
    	<a ><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
	</h1>
    <ul id="menu">
    	<li><a id="women" class="selected_menu">Women</a></li>
        <li><a id="men">Men</a></li>
        <li><a id="special_booking">Special bookings</a></li>
        <li><a id="become_a_model">Become a model</a></li>
        <li><a id="contact">Contact</a></li>
    </ul>
   <!-- <form id="modelselector" action="" method="get">
        <label for="find_a_model">Find a model</label>
        <select name="find_a_model" id="find_a_model">
            <option>Find a model</option>
            <option>Alejandra Morales</option>
            <option>Alejandra Guilmant</option>
            <option>Alex Grace</option>
            <option>Bambi Northwood-Blyth</option>
        </select>
        <span>
        	<input name="ir" type="submit" value="Ir" />
		</span>
    </form>
	-->
	<div id="modelselector">
		<label for="find_a_model">Find a model</label>
		<select name="find_a_model" id="find_a_model">
			<option selected>FIND A MODEL</option>
			<option value="women">WOMEN</option>
			<?
				$resultModels1 = mysql_query("SELECT * FROM models_model WHERE model_type = 'women' ORDER BY first_name");
				$num_cols1 = mysql_affected_rows();
			
				if ($num_cols1>0){
					for($j=0;$j<$num_cols1;$j++){
						$row1 = mysql_fetch_assoc($resultModels1);
			?>
			<option value="m_<?= $row1['id'] ?>"><?= utf8_encode($row1['first_name']) ?> <?= utf8_encode($row1['last_name']) ?></option>
			<?
					}
				}
			?>
			<option value="men">MEN</option>
			<?
				$resultModels2 = mysql_query("SELECT * FROM models_model WHERE model_type = 'men' ORDER BY first_name");
				$num_cols2 = mysql_affected_rows();
			
				if ($num_cols2>0){
					for($k=0;$k<$num_cols2;$k++){
						$row2 = mysql_fetch_assoc($resultModels2);
			?>
			<option value="m_<?= $row2['id'] ?>"><?= utf8_encode($row2['first_name']) ?> <?= utf8_encode($row2['last_name']) ?></option>
			<?
					}
				}
			?>
			<option value="special_booking">SPECIAL BOOKING</option>
			<?
				$resultModels3 = mysql_query("SELECT * FROM models_model WHERE model_type = 'special_booking' ORDER BY first_name");
				$num_cols3 = mysql_affected_rows();
			
				if ($num_cols3>0){
					for($j=0;$j<$num_cols3;$j++){
						$row3 = mysql_fetch_assoc($resultModels3);
			?>
			<option value="m_<?= $row3['id'] ?>"><?= utf8_encode($row3['first_name']) ?> <?= utf8_encode($row3['last_name']) ?></option>
			<?
					}
				}
			?>
		</select>
	</div>
</div>

<div id="container">
	<!-- listado de modelos: BOC -->
	<div id="menu_models" class="menus" style="display:block">
		<div class="models_guide">
			<ul id="primerplano">
				<?
					$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = 'women' ORDER BY first_name");
					$num_cols = mysql_affected_rows();
				
					if ($num_cols>0){
						for($i=0;$i<$num_cols;$i++){
							$row = mysql_fetch_assoc($resultModels);
				?>
				<li id="model_<?= $row['id'] ?>">
					<a id="link_model_<?= $row['id'] ?>">
						<img src="<?= utf8_encode($row['url_headshot_photo']) ?>" alt="<?= utf8_encode($row['first_name']) ?>_<?= utf8_encode($row['last_name']) ?>" />
						<strong><?= strtoupper(utf8_encode($row['first_name'])) ?> <?= strtoupper(utf8_encode($row['last_name'])) ?></strong>
					</a>
				</li>
				<?
						}
					}
				?>
			</ul>
		</div>
	</div>
	<div id="menu_become_a_model" class="menus" style="display:none">
		<div class="container_formdatos">
			<div class="coldatos col1">
				<div>
					<label for="">Nombre / First Name:</label>
					<input type="text" id="first_name" />
				</div>
				<div>
					<label for="">Dirección / Address:</label>
					<input type="text" id="address" />
				</div>
				<div>
					<label for=""></label>
					<input type="text" id="address_cont" />
				</div>
				<div>
					<label for="">Tel. / Phone Number</label>
					<input type="text" id="phone_number"  maxlength="9"/>
				</div>
				<div>
					<label for="">Móvil / Mobile</label>
					<input type="text" id="mobile"  maxlength="9"/>
				</div>
				<div>
					<span class="gender">Gender:</span>
					<label for="" class="nobullet">Female</label>
					<input type="radio" id="female" name="sex" />
					<label for="" class="nobullet">Male</label>
					<input type="radio" id="male" name="sex" />
				</div>
				<div>
					<label for="">Edad / Age:</label>
					<input type="text" id="age" />
				</div>
				<div>
					<label for="">Altura / Height:</label>
					<input type="text" id="height" />
				</div>
				<div>
					<label for="">Pecho / Bust:</label>
					<input type="text" id="bust"/>
				</div>
				<div>
					<label for="">Cintura / Waist:</label>
					<input type="text" id="waist1" />
				</div>
				<div>
					<label for="">Cadera / Hips:</label>
					<input type="text" id="hips" />
				</div>
			</div>
			<div class="coldatos col2">
				<div>
					<label for="">Apellido / Last Name:</label>
					<input type="text" id="last_name" />
				</div>
				<div>
					<label for="">C.P. / Zip Code:</label>
					<input type="text" id="zip_code" />
				</div>
				<div>
					<label for="">Ciudad /City:</label>
					<input type="text" id="city" />
				</div>
				<div>
					<label for="">Provincia / State:</label>
					<input type="text" id="the_state" />
				</div>
				<div>
					<label for="">E-mail:</label>
					<input type="text" id="email" />
				</div>
				<div>
					<label for="">Pelo / Hair Color:</label>
					<input type="text" id="hair_color" />
				</div>
				<div>
					<label for="">Ojos / Eyes Color:</label>
					<input type="text" id="eyes_color" />
				</div>
				<div>
					<label for="">Cuello / Collar:</label>
					<input type="text" id="collar" />
				</div>
				<div>
					<label for="">Pecho / Chest:</label>
					<input type="text" id="chest" />
				</div>
				<div>
					<label for="">Cintura / Waist:</label>
					<input type="text" id="waist2" />
				</div>
			</div>
		</div>
		<div class="adjuntos">
			<div>
				<label for="">Adjuntar foto de cara / Attach a headshot photo:</label>
				<input type="file" id="headshot_photo" name="headshot_photo" size=45 maxlength=40> 
			</div>
			<div>
				<label for="">Adjuntar foto de cuerpo entero / Attach a full length photo:</label>
				<input type="file" id="full_length_photo" name="full_length_photo" size=45 maxlength=40> 
			</div>
			<div>
				<input type="checkbox" id="checkLB" />
				<label for="" class="nobullet">Estoy de acuerdo de ser contactado por ISABEL NAVARRO Model Management / I agree to be contacted by ISABEL NAVARRO Model Management</label>
				<input type="hidden" name="request_type" id="request_type" value='submitForm' />
				<input type="button" class="submitButton" value="SUBMIT"/>
			</div>
		</div>
	</div>
	<div id="menu_contact" class="menus" style="display:none">
		<p>DATOS DE CONTACTO</p>
	</div>
	<div id="model_selected" class="menu" style="display:none">
		<div id="data_model"></div>
		<div id="youtube_model"></div>
		<div id="big_photo"></div>
		<div id="photos_model"><ul></ul></div>
	</div>
    <!-- listado de modelos: EOC -->
    <!-- filtro listado de modelos: BOC -->
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
    <!-- filtro listado de modelos: EOC -->
</div>

<div id="footer">
	<p>&copy;2011 Isabel Navarro Model Management</p>
    <ul>
        <li><a  title="Isabel Navarro Model Management at Twitter"><img src="img/icon_twitter.png" alt="at Twitter" /></a></li>
        <li><a  title="Isabel Navarro Model Management at Facebook"><img src="img/icon_facebook.png" alt="at Twitter" /></a></li>
    	<li>powered by <a  title="LILIJIMENEZ">LILIJIMENEZ</a></li>
	</ul>
</div>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<!-- the mousewheel plugin - optional to provide mousewheel support -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<!-- Llamada de elementos a ejecutar a la carga de la pagina -->
<script type="text/javascript" src="js/callingtostage.js"></script>
</body>
</html>
