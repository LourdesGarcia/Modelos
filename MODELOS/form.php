<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>fORMULARIO USUARIOS</title>
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>-->
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/scripts.js"></script> 
	<link rel="stylesheet" href="css/styles.css" type="text/css"/>
  </head>
  <body style="background-color: white">
		<!--<form action="http://localhost/proyecto_modelos/proccess.php" method="post">-->
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
		<!--</form>-->
  </body>
</html>