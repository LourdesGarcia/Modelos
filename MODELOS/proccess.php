<?php

error_reporting(E_ALL);

include('config_database.php');
include('check_data.php');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);
//echo 'request_:'. json_encode($_REQUEST);

$first_name = ((isset($_REQUEST['first_name']) && ($_REQUEST['first_name'] != ''))?$_REQUEST['first_name']:false);
$last_name = ((isset($_REQUEST['last_name']) && ($_REQUEST['last_name'] != ''))?$_REQUEST['last_name']:false);
$address = ((isset($_REQUEST['address']) && ($_REQUEST['address'] != ''))?$_REQUEST['address']:false);
$phone_number = ((isset($_REQUEST['phone_number']) && ($_REQUEST['phone_number'] != ''))?$_REQUEST['phone_number']:false);
$mobile = ((isset($_REQUEST['mobile']) && ($_REQUEST['mobile'] != ''))?$_REQUEST['mobile']:false);
$gender = ((isset($_REQUEST['gender']) && ($_REQUEST['gender'] != ''))?$_REQUEST['gender']:false);
$age = ((isset($_REQUEST['age']) && ($_REQUEST['age'] != ''))?$_REQUEST['age']:false);
$height = ((isset($_REQUEST['height']) && ($_REQUEST['height'] != ''))?$_REQUEST['height']:false);
$bust = (isset($_REQUEST['bust'])?$_REQUEST['bust']:false);
$waist1 = (isset($_REQUEST['waist1'])?$_REQUEST['waist1']:false);
$hips = (isset($_REQUEST['hips'])?$_REQUEST['hips']:false);
$zip_code = ((isset($_REQUEST['zip_code']) && ($_REQUEST['zip_code'] != ''))?$_REQUEST['zip_code']:false);
$city = ((isset($_REQUEST['city']) && ($_REQUEST['city'] != ''))?$_REQUEST['city']:false);
$the_state = ((isset($_REQUEST['the_state']) && ($_REQUEST['the_state'] != ''))?$_REQUEST['the_state']:false);
$email = ((isset($_REQUEST['email']) && ($_REQUEST['email'] != ''))?$_REQUEST['email']:false);
$hair_color = ((isset($_REQUEST['hair_color']) && ($_REQUEST['hair_color'] != ''))?$_REQUEST['hair_color']:false);
$eyes_color = ((isset($_REQUEST['eyes_color']) && ($_REQUEST['eyes_color'] != ''))?$_REQUEST['eyes_color']:false);
$collar = (isset($_REQUEST['collar'])?$_REQUEST['collar']:false);
$chest = (isset($_REQUEST['chest'])?$_REQUEST['chest']:false);
$waist2 = (isset($_REQUEST['waist2'])?$_REQUEST['waist2']:false);
$headshot_photo = ((isset($_REQUEST['headshot_photo']) && ($_REQUEST['headshot_photo'] != ''))?$_REQUEST['headshot_photo']:false);
$full_length_photo = ((isset($_REQUEST['full_length_photo']) && ($_REQUEST['full_length_photo'] != ''))?$_REQUEST['full_length_photo']:false);

$menu_sel = ((isset($_REQUEST['menu_sel']) && ($_REQUEST['menu_sel'] != ''))?$_REQUEST['menu_sel']:false);
$letter = ((isset($_REQUEST['letter']) && ($_REQUEST['letter'] != ''))?$_REQUEST['letter']:false);
$model_id = ((isset($_REQUEST['model_id']) && ($_REQUEST['model_id'] != ''))?$_REQUEST['model_id']:false);


$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';
$resultTotal['modelos'] = array();
$resultTotal['datos'] = array();
$resultTotal['videos'] = array();
$resultTotal['photos']= array();

$act_date = mktime(0,0,0);

$result = mysql_query(sprintf("INSERT INTO models_log VALUES ('','%s','%s','%s')",
                        mysql_real_escape_string($requestType),
                        mysql_real_escape_string(json_encode($_REQUEST)),
						mysql_real_escape_string($act_date)   
                ));  


if($requestType){
	switch($requestType){
		case 'submitForm':
			if ($first_name && $last_name && $address && $phone_number && $mobile && $gender && $age && $height && $zip_code && $city && $the_state && $email && $hair_color && $eyes_color && $headshot_photo && $full_length_photo ){
				if (checkEmail($email)){
					if (is_numeric($mobile)){
						if (is_numeric($phone_number)){
							if (is_numeric($zip_code)){
								if ((($gender=='female') && ($bust!='') &&($waist1!='') && ($hips!=''))||(($gender=='male')&& ($collar!='') && ($chest!='') && ($waist2!=''))){
									$bHayFicheros = 0; 
									$sCabeceraTexto = ""; 
									$sAdjuntos = "";
									if (form_mail("rolu06@gmail.com", "asuntoo", "Los datos introducidos en el formulario son:\n\n", "poner_email@deDestino.com") ){
									}else{
										$resultTotal['res']='ERROR'; 
										$resultTotal['mensaje']= utf8_encode('- No se ha podido enviar el correo. Por favor, inténtalo de nuevo.');
									}
									$resultTotal['res']='SUCCESS'; 
									$resultTotal['mensaje']= utf8_encode('- OK!!!!!!');
								}else{
									$resultTotal['res']='ERROR'; 
									$resultTotal['mensaje']= utf8_encode('- Todos los campos son obligatorios');
								}
							}else{
								$resultTotal['res']='ERROR'; 
								$resultTotal['mensaje']= utf8_encode('- Código Postal numérico.');
							}
						}else{
							$resultTotal['res']='ERROR'; 
							$resultTotal['mensaje']= utf8_encode('- Teléfono numérico.');	
						}
					}else{
						$resultTotal['res']='ERROR'; 
						$resultTotal['mensaje']= utf8_encode('- Móvil numérico.');	
					}
				}else{
					$resultTotal['res']='ERROR'; 
					$resultTotal['mensaje']= utf8_encode('- Formato invalido de email.');
				}
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=utf8_encode('- Todos los campos son obligatorios.');
			}
		break;
		case 'showAllModels':
			if ($menu_sel){
				$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = '" . $menu_sel . "' ORDER BY first_name");
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] = utf8_encode($row['first_name']);
						$arrayAux['last_name'] = utf8_encode($row['last_name']);
						$arrayAux['url_headshot_photo'] = $row['url_headshot_photo'];
						$arrayAux['url_full_length_photo'] = $row['url_full_length_photo'];
						array_push($resultTotal['modelos'],$arrayAux);
					}
				} 
				$resultTotal['res']='SUCCESS'; 
				$resultTotal['mensaje']=utf8_encode('Se han consultado a todos los modelos de ese tipo correctamente.');
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=utf8_encode('- Falta el tipo de modelo.');
			}
		break;
		case 'showModelsByLetter':
			if ($menu_sel && $letter){
				$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = '" . $menu_sel . "' AND first_name LIKE '" . strtolower($letter) . "%' ORDER BY first_name");
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] = $row['first_name'];
						$arrayAux['last_name'] = $row['last_name'];
						$arrayAux['url_headshot_photo'] = $row['url_headshot_photo'];
						$arrayAux['url_full_length_photo'] = $row['url_full_length_photo'];
						array_push($resultTotal['modelos'],$arrayAux);
					}
				} 
				$resultTotal['res']='SUCCESS'; 
				$resultTotal['mensaje']=utf8_encode('Se han consultado a todos los modelos de ese tipo y con esa letra de inicio correctamente.');
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=utf8_encode('- Falta el tipo de modelo.');
			}
		break;
		case 'showCompleteDataModel':
			if ($model_id){
				$resultModels = mysql_query("SELECT * FROM models_model WHERE id = " . $model_id);
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] = utf8_encode($row['first_name']);
						$arrayAux['last_name'] = utf8_encode($row['last_name']);
						$arrayAux['height'] = $row['height'];
						$arrayAux['eyes_color'] = utf8_encode($row['eyes_color']);
						$arrayAux['hair_color'] = utf8_encode($row['hair_color']);
						$arrayAux['waist'] = utf8_encode($row['waist']);
						$arrayAux['gender'] = $row['gender'];
						if ($arrayAux['gender'] == 'female'){
							$arrayAux['bust'] = utf8_encode($row['bust']);
							$arrayAux['hips'] = utf8_encode($row['hips']);
						}else{
							$arrayAux['collar'] = utf8_encode($row['collar']);
							$arrayAux['chest'] = utf8_encode($row['chest']);
						}
						$arrayAux['url_headshot_photo'] = $row['url_headshot_photo'];
						$arrayAux['url_full_length_photo'] = $row['url_full_length_photo'];
						array_push($resultTotal['datos'],$arrayAux);
					}
				} 
				$resultVideos = mysql_query("SELECT * FROM models_youtube WHERE model_id = " . $model_id . " ORDER BY add_date DESC");
				$num_cols_videos = mysql_affected_rows();
				if ($num_cols_videos>0){
					$arrayAux2 = array();
					for($j=0;$j<$num_cols_videos;$j++){
						$row2 = mysql_fetch_assoc($resultVideos);
						$arrayAux2['video_name'] = utf8_encode($row2['video_name']);
						$arrayAux2['url_youtube'] = $row2['url_youtube'];
						array_push($resultTotal['videos'],$arrayAux2);
					}
				} 
				$resultPhotos = mysql_query("SELECT * FROM models_photos WHERE model_id = " . $model_id . " ORDER BY add_date DESC");
				$num_cols_photos = mysql_affected_rows();
				if ($num_cols_photos>0){
					$arrayAux3 = array();
					for($k=0;$k<$num_cols_photos;$k++){
						$row3 = mysql_fetch_assoc($resultPhotos);
						$arrayAux3['id'] = $row3['id'];
						$arrayAux3['photo_name'] = utf8_encode($row3['photo_name']);
						$arrayAux3['url_photo'] = $row3['url_photo'];
						$arrayAux3['url_thumbnail'] = $row3['url_thumbnail'];
						array_push($resultTotal['photos'],$arrayAux3);
					}
				} 
				$resultTotal['res']='SUCCESS'; 
				$resultTotal['mensaje']=$num_cols;
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=utf8_encode('- Falta el tipo de modelo.');
			}
		break;
	}
}

echo json_encode($resultTotal);
?>
