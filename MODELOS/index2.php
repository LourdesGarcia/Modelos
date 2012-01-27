<?
	error_reporting(E_ALL);
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
<script type="text/javascript" src="js/scripts2.js"></script> 
<link rel="stylesheet" href="css/styles2.css" type="text/css"/>
</head>

<body>

<div id="header2">
	<div id="menu_set_model" class="menus" style="display:block">
		<form class="adjuntos" action="proccess2.php" method="POST" ENCTYPE="multipart/form-data">
			<div class="container_formdatos2">
				<div class="coldatos col1">
					<div>
						<label for="">Nombre / First Name:</label>
						<input type="text" id="first_name" name="first_name"/>
					</div>
					<div>
						<label for="">Dirección / Address:</label>
						<input type="text" id="address" name="address"/>
					</div>
					<div>
						<label for=""></label>
						<input type="text" id="address_cont" name="address_cont" />
					</div>
					<div>
						<label for="">Tel. / Phone Number</label>
						<input type="text" id="phone_number" name="phone_number"maxlength="9"/>
					</div>
					<div>
						<label for="">Móvil / Mobile</label>
						<input type="text" id="mobile" name="mobile" maxlength="9"/>
					</div>
					<div>
						<span class="gender">Gender:</span>
						<label for="" class="nobullet">Female</label>
						<input type="radio" id="female" name="sex" value="female"/>
						<label for="" class="nobullet">Male</label>
						<input type="radio" id="male" name="sex" value="male" />
					</div>
					<div>
						<label for="">Edad / Age:</label>
						<input type="text" id="age" name="age" />
					</div>
					<div>
						<label for="">Altura / Height:</label>
						<input type="text" id="height" name="height" />
					</div>
					<div>
						<label for="">Pecho / Bust:</label>
						<input type="text" id="bust" name="bust"/>
					</div>
					<div>
						<label for="">Cintura / Waist:</label>
						<input type="text" id="waist1" name="waist1" />
					</div>
					<div>
						<label for="">Cadera / Hips:</label>
						<input type="text" id="hips" name="hips"  />
					</div>
				</div>
				<div class="coldatos col2">
					<div>
						<span class="type_model">Tipo de Modelo / Model Type:</span>
						<label for="" class="nobullet">Women</label>
						<input type="radio" id="women" name="type" value="women"/>
						<label for="" class="nobullet">Men</label>
						<input type="radio" id="men" name="type" value="men" />
						<label for="" class="nobullet">Special Booking</label>
						<input type="radio" id="special_booking" name="type" value="special_booking" />
					</div>
					<div>
						<label for="">Apellido / Last Name:</label>
						<input type="text" id="last_name" name="last_name"  />
					</div>
					<div>
						<label for="">C.P. / Zip Code:</label>
						<input type="text" id="zip_code" name="zip_code" />
					</div>
					<div>
						<label for="">Ciudad /City:</label>
						<input type="text" id="city" name="city"/>
					</div>
					<div>
						<label for="">Provincia / State:</label>
						<input type="text" id="the_state" name="the_state"/>
					</div>
					<div>
						<label for="">E-mail:</label>
						<input type="text" id="email" name="email"/>
					</div>
					<div>
						<label for="">Pelo / Hair Color:</label>
						<input type="text" id="hair_color" name="hair_color" />
					</div>
					<div>
						<label for="">Ojos / Eyes Color:</label>
						<input type="text" id="eyes_color" name="eyes_color"/>
					</div>
					<div>
						<label for="">Cuello / Collar:</label>
						<input type="text" id="collar" name="collar"/>
					</div>
					<div>
						<label for="">Pecho / Chest:</label>
						<input type="text" id="chest" name="chest"/>
					</div>
					<div>
						<label for="">Cintura / Waist:</label>
						<input type="text" id="waist2" name="waist2" />
					</div>
				</div>
			</div>
			<div  class="adjuntos" >
				<div>
					<label for="">Adjuntar foto de cara / Attach a headshot photo:</label>
					<input type="file" id="headshot_photo" name="headshot_photo" size=45 maxlength=200> 
					<input type="hidden" name="MAX_FILE_SIZE"  value=100000 />
				</div>
				<div>
					<label for="">Adjuntar foto de cuerpo entero / Attach a full length photo:</label>
					<input type="file" id="full_length_photo" name="full_length_photo" size=45 maxlength=200> 
					<input type="hidden" name="MAX_FILE_SIZE"  value=100000 />
				</div>
				<div>
					<input type="hidden" name="request_type" id="request_type" value='submitForm' />
					<button type="submit" class="submitButton" value="SUBMIT"/>
				</div>
			</div>
		</form>
	</div>

</div>


</body>
</html>
