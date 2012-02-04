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
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
	</h1>
    <ul id="menu">
    	<li><a id="women" href="women.php">Women</a></li>
        <li><a id="men" href="men.php">Men</a></li>
        <li><a id="special_booking" href="special_booking.php">Special booking</a></li>
        <li><a id="become_a_model" href="become_a_model.php" class="selected_menu">Become a model</a></li>
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
	<div id="menu_become_a_model" class="menus">
		<h2><span>Cómo</span> ser modelo / <span>Become</span> a model</h2>
		<p id="email_ok" style="display:<?=  (isset($ok)&&($ok!=''))?'block':'none' ?>"><?= (isset($ok)&&($ok!=''))?$ok:'' ?></p>
		<p id="email_ko" style="display:<?=  (isset($ko)&&($ko!=''))?'block':'none' ?>"><?= (isset($ko)&&($ko!=''))?$ko:'' ?></p>
		<form class="adjuntos" action="proccess.php" method="POST" ENCTYPE="multipart/form-data">
			<div class="container_formdatos">
				<div class="coldatos col1">
					<div>
						<label for=""><strong>Nombre /</strong> First Name</label>
						<input type="text" id="first_name" name="first_name"  value="<?=  (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['first_name'])&&($_REQUEST['first_name']!=''))?$_REQUEST['first_name']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Dirección /</strong> Address</label>
						<input type="text" id="address" name="address"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['address'])&&($_REQUEST['address']!=''))?$_REQUEST['address']:'' )?>"/>
					</div>
					<div>
						<label for=""></label>
						<input type="text" id="address_cont" name="address_cont" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['address_cont'])&&($_REQUEST['address_cont']!=''))?$_REQUEST['address_cont']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Tel. /</strong> Phone Number</label>
						<input type="text" id="phone_number" name="phone_number" maxlength="9" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['phone_number'])&&($_REQUEST['phone_number']!=''))?$_REQUEST['phone_number']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Móvil /</strong> Mobile</label>
						<input type="text" id="mobile" name="mobile" maxlength="9" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['mobile'])&&($_REQUEST['mobile']!=''))?$_REQUEST['mobile']:'') ?>"/>
					</div>
					<div>
						<span class="gender">Gender</span>
						<input type="radio" id="female" name="sex" value="female"  <?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['sex'])&&($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female'))?'checked="ckecked"':'') ?>/>
						<label for="" class="nobullet"><strong>Female</strong></label>
						<input type="radio" id="male" name="sex" value="male" <?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['sex'])&&($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male'))?'checked="ckecked"':'') ?>/>
						<label for="" class="nobullet"><strong>Male</strong></label>
					</div>
					<div>
						<label for=""><strong>Edad /</strong> Age</label>
						<input type="text" id="age" name="age" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['age'])&&($_REQUEST['age']!=''))?$_REQUEST['age']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Altura /</strong> Height</label>
						<input type="text" id="height" name="height" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['height'])&&($_REQUEST['height']!=''))?$_REQUEST['height']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Pecho /</strong> Bust</label>
						<input type="text" id="bust" name="bust"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['bust'])&&($_REQUEST['bust']!=''))?$_REQUEST['bust']:'') ?>"  <?= (isset($ok)&&($ok!=''))?'':(isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female')?'':'disabled="disabled"'):'') ?>/>
					</div>
					<div>
						<label for=""><strong>Pecho /</strong> Chest</label>
						<input type="text" id="chest" name="chest"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['chest'])&&($_REQUEST['chest']!=''))?$_REQUEST['chest']:'') ?>"  <?= (isset($ok)&&($ok!=''))?'':(isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male')?'':'disabled="disabled"'):'') ?>/>
					</div>
				</div>
				<div class="coldatos col2">
					<div>
						<label for=""><strong>Apellido /</strong> Last Name</label>
						<input type="text" id="last_name" name="last_name" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['last_name'])&&($_REQUEST['last_name']!=''))?$_REQUEST['last_name']:'') ?>" />
					</div>
					<div>
						<label for=""><strong>C.P. /</strong> Zip Code</label>
						<input type="text" id="zip_code" name="zip_code" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['zip_code'])&&($_REQUEST['zip_code']!=''))?$_REQUEST['zip_code']:'') ?>"  />
					</div>
					<div>
						<label for=""><strong>Ciudad /</strong>City</label>
						<input type="text" id="city" name="city" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['city'])&&($_REQUEST['city']!=''))?$_REQUEST['city']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Provincia /</strong> State</label>
						<input type="text" id="the_state" name="the_state" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['the_state'])&&($_REQUEST['the_state']!=''))?$_REQUEST['the_state']:'')?>"/>
					</div>
					<div>
						<label for="">E-mail</label>
						<input type="text" id="email" name="email"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['email'])&&($_REQUEST['email']!=''))?$_REQUEST['email']:'') ?>"/>
					</div>
					<div>
						<label for=""><strong>Pelo /</strong> Hair Color</label>
						<input type="text" id="hair_color" name="hair_color"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['hair_color'])&&($_REQUEST['hair_color']!=''))?$_REQUEST['hair_color']:'' )?>"/>
					</div>
					<div>
						<label for=""><strong>Ojos /</strong> Eyes Color</label>
						<input type="text" id="eyes_color" name="eyes_color"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['eyes_color'])&&($_REQUEST['eyes_color']!=''))?$_REQUEST['eyes_color']:'' )?>"/>
					</div>
					<div>
						<label for=""><strong>Cintura</strong> / Waist</label>
						<input type="text" id="waist" name="waist"  value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['waist'])&&($_REQUEST['waist']!=''))?$_REQUEST['waist']:'' )?>" />
					</div>
					<div>
						<label for=""><strong>Cadera /</strong> Hips</label>
						<input type="text" id="hips" name="hips" value="<?= (isset($ok)&&($ok!=''))?'':((isset($_REQUEST['hips'])&&($_REQUEST['hips']!=''))?$_REQUEST['hips']:'') ?>" />
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
</div>

<div id="footer">
	<p>&copy;2012 Isabel Navarro Model Management</p>
    <ul>
        <!-- <li><a  title="Isabel Navarro Model Management at Twitter"><img src="img/icon_twitter.png" alt="at Twitter" /></a></li> -->
        <li><a href="http://www.facebook.com/pages/Isabel-Navarro-Model-Management/133070660058118" title="Isabel Navarro Model Management at Facebook"><img src="img/icon_facebook.png" alt="at Facebook" /></a></li>
    	<li>powered by <a  title="LILIJIMENEZ">LILIJIMENEZ</a></li>
	</ul>
</div>

</body>
</html>