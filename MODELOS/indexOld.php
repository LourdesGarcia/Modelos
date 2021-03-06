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
    	<a ><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
	</h1>
    <ul id="menu">
    	<li><a id="women" class="selected_menu">Women</a></li>
        <li><a id="men">Men</a></li>
        <li><a id="special_booking">Special booking</a></li>
        <li><a id="become_a_model">Become a model</a></li>
        <li><a id="contact">Contact</a></li>
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
	<div id="menu_intro" class="menus" style="display:block">
		<div class="models_intro">
			<ul>
				<?
					$resultIntroi = mysql_query("SELECT * FROM models_intro WHERE active=1 ORDER BY add_date DESC");
					$num_colsi = mysql_affected_rows();
				
					if ($num_colsi>0){
						for($m=0;$m<$num_colsi;$m++){
							$rowi = mysql_fetch_assoc($resultIntroi);
				?>
				<li id="model_<?= $rowi['id'] ?>">
					<img src="<?= INTRO_URL . $rowi['url_photo'] ?>" alt="p_<?= $rowi['id'] ?>" />
				</li>
				<?
						}
					}
				?>
			</ul>
		</div>
		<a id="saltar_intro">SALTAR INTRO</a>
	</div>
	<div id="menu_models" class="menus" style="display:block">

		<div class="models_guide">
			<ul id="primerplano">
				<?
					$resultModels = mysql_query("SELECT m.id as id, p.url_photo as url_photo, m.first_name as first_name, m.last_name as last_name  FROM models_model m, models_ppal p WHERE m.model_type = 'women' AND m.active=1 AND m.id=p.model_id AND p.active=1 ORDER BY m.first_name");
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
	<div id="menu_become_a_model" class="menus" style="display:none">
		<h2><span>Cómo</span> ser modelo / <span>Become</span> a model</h2>
		<form class="adjuntos" action="proccess.php" method="POST" ENCTYPE="multipart/form-data">
			<div class="container_formdatos">
				<div class="coldatos col1">
					<div>
						<label for=""><strong>Nombre /</strong> First Name</label>
						<input type="text" id="first_name" name="first_name"/>
					</div>
					<div>
						<label for=""><strong>Dirección /</strong> Address</label>
						<input type="text" id="address" name="address"/>
					</div>
					<div>
						<label for=""></label>
						<input type="text" id="address_cont" name="address_cont" />
					</div>
					<div>
						<label for=""><strong>Tel. /</strong> Phone Number</label>
						<input type="text" id="phone_number" name="phone_number"maxlength="9"/>
					</div>
					<div>
						<label for=""><strong>Móvil /</strong> Mobile</label>
						<input type="text" id="mobile" name="mobile" maxlength="9"/>
					</div>
					<div>
						<span class="gender">Gender</span>
						<input type="radio" id="female" name="sex" value="female"/>
						<label for="" class="nobullet"><strong>Female</strong></label>
						<input type="radio" id="male" name="sex" value="male" />
						<label for="" class="nobullet"><strong>Male</strong></label>
					</div>
					<div>
						<label for=""><strong>Edad /</strong> Age</label>
						<input type="text" id="age" name="age" />
					</div>
					<div>
						<label for=""><strong>Altura /</strong> Height</label>
						<input type="text" id="height" name="height" />
					</div>
					<div>
						<label for=""><strong>Pecho /</strong> Bust</label>
						<input type="text" id="bust" name="bust"/>
					</div>
					<div>
						<label for=""><strong>Cintura</strong> / Waist</label>
						<input type="text" id="waist1" name="waist1" />
					</div>
					<div>
						<label for=""><strong>Cadera /</strong> Hips</label>
						<input type="text" id="hips" name="hips"  />
					</div>
				</div>
				<div class="coldatos col2">
					<div>
						<label for=""><strong>Apellido /</strong> Last Name</label>
						<input type="text" id="last_name" name="last_name"  />
					</div>
					<div>
						<label for=""><strong>C.P. /</strong> Zip Code</label>
						<input type="text" id="zip_code" name="zip_code" />
					</div>
					<div>
						<label for=""><strong>Ciudad /</strong>City</label>
						<input type="text" id="city" name="city"/>
					</div>
					<div>
						<label for=""><strong>Provincia /</strong> State</label>
						<input type="text" id="the_state" name="the_state"/>
					</div>
					<div>
						<label for="">E-mail</label>
						<input type="text" id="email" name="email"/>
					</div>
					<div>
						<label for=""><strong>Pelo /</strong> Hair Color</label>
						<input type="text" id="hair_color" name="hair_color" />
					</div>
					<div>
						<label for=""><strong>Ojos /</strong> Eyes Color</label>
						<input type="text" id="eyes_color" name="eyes_color"/>
					</div>
					<div>
						<label for=""><strong>Cuello /</strong> Collar</label>
						<input type="text" id="collar" name="collar"/>
					</div>
					<div>
						<label for=""><strong>Pecho /</strong> Chest</label>
						<input type="text" id="chest" name="chest"/>
					</div>
					<div>
						<label for=""><strong>Cintura /</strong> Waist</label>
						<input type="text" id="waist2" name="waist2" />
					</div>
				</div>
			</div>
			<div  class="adjuntos bloqueAdjuntos" >
				<div>
					<label for=""><strong>Adjuntar foto de cara /</strong> Attach a headshot photo:</label>
					<input type="file" id="headshot_photo" name="headshot_photo" size=30 maxlength=200> 
					<input type="hidden" name="MAX_FILE_SIZE"  value=100000 />
				</div>
				<div>
					<label for=""><strong>Adjuntar foto de cuerpo entero /</strong> Attach a full length photo:</label>
					<input type="file" id="full_length_photo" name="full_length_photo" size=30 maxlength=200> 
					<input type="hidden" name="MAX_FILE_SIZE"  value=100000 />
				</div>
				<div class="agree">
					<input type="checkbox" id="checkLB" />
					<label for="" class="nobullet"><strong>Estoy de acuerdo de ser contactado por ISABEL NAVARRO Model Management /</strong> I agree to be contacted by ISABEL NAVARRO Model Management</label>
					<input type="hidden" name="request_type" id="request_type" value='submitForm' />
					<!--<input type="button" class="submitButton" value="SUBMIT"/>-->
					<button type="submit" class="submitButton" value="SUBMIT">Submit</button>
				</div>
			</div>
		</form>
		<div id="requirements">
            <div class="spanish">
                <h3>REQUISITOS:</h3>
                <p>MUJERES<br />Edades desde 16: 1.75 m mínimo.<br />HOMBRES<br />Edades desde 16: 1.80 m mínimo.</p>
                <p>Por favor enviar polaroids que muestren cara y cuerpo entero. No usar maquillaje, imágenes con luz natural en exterior con vestuario básico.</p>
                <p>El tamaño máximo de las dos imágenes debe ser de 2MB.<br />Sólo si cumples con los requisitos te contactaremos.</p>
            </div>
            <div class="english">
                <h3>REQUIREMENTS:</h3>
                <p>WOMEN<br />Ages  UP 16: 1.75 m Minimum.<br />MEN<br />Ages UP 16: 1.80 m Minimum.</p>
                <p>Please provide polaroids that show very clear headshot and full length images.<br />No makeup, shot outside with natural light and in a basic color top and bottom.</p>
                <p>The size of both photographs must not exceed 2MB.<br />Our agency will contact you only if you match our requirements.</p>
            </div>
        </div>
	</div>
	<div id="menu_contact" class="menus" style="display:none">
		<p>Príncipe de Vergara 90, 1°D<br />Madrid<br />28006 (Spain)</p>
		<p><span>T.</span>  +34 915 633 042<br />
			<span>M.</span> +34 651 422 161<br />
			<span>Fax</span> +34 915 630 339</p>
		<p><span>INFORMATION</span></p>
		<p><strong>Fashion</strong><br /><a href="mailto:models@isabelnavarro.net">models@isabelnavarro.net</a></p>
		<p><strong>Commercial</strong><br /><a href="mailto:casting@isabelnavarro.net">casting@isabelnavarro.net</a></p>
		<p><strong>Scouting</strong><br /><a href="isabel@isabelnavarro.net">isabel@isabelnavarro.net</a></p>
	</div>
	<div id="model_selected" class="menu" style="display:none">
		<div id="book">
			<h2 id="m_name"><label id="l_2"><strong></strong></label></h2>
			<dl id="m_data">
			</dl>

			<h3 class="videos">Videos</h3>
			<ul id="listavideos">
			</ul>
					
			<h3 class="composite"><a href="">Donwload/Composite</a></h3>

		</div>
		<div id="galeria">
			<ul id="pikame" class="jcarousel-skin-pika">
			</ul>
		</div>
        <a href="#" id="backfrombook">Back</a>
	</div>
    <ul id="alfabeto" style="display:none">
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