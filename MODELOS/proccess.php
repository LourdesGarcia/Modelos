<?php


include('config_database.php');
include('check_data.php');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);
//echo 'request_:'. json_encode($_REQUEST);

$first_name = ((isset($_REQUEST['first_name']) && ($_REQUEST['first_name'] != ''))?$_REQUEST['first_name']:false);
$last_name = ((isset($_REQUEST['last_name']) && ($_REQUEST['last_name'] != ''))?$_REQUEST['last_name']:false);
$address = ((isset($_REQUEST['address']) && ($_REQUEST['address'] != ''))?$_REQUEST['address']:false);
$address_cont = ((isset($_REQUEST['address_cont']) && ($_REQUEST['address_cont'] != ''))?$_REQUEST['address_cont']:false);
$phone_number = ((isset($_REQUEST['phone_number']) && ($_REQUEST['phone_number'] != ''))?$_REQUEST['phone_number']:false);
$mobile = ((isset($_REQUEST['mobile']) && ($_REQUEST['mobile'] != ''))?$_REQUEST['mobile']:false);
$gender = ((isset($_REQUEST['sex']) && ($_REQUEST['sex'] != ''))?$_REQUEST['sex']:false);
$age = ((isset($_REQUEST['age']) && ($_REQUEST['age'] != ''))?$_REQUEST['age']:false);
$height = ((isset($_REQUEST['height']) && ($_REQUEST['height'] != ''))?$_REQUEST['height']:false);
$bust = (isset($_REQUEST['bust'])?$_REQUEST['bust']:false);
$waist= (isset($_REQUEST['waist'])?$_REQUEST['waist']:false);
$hips = (isset($_REQUEST['hips'])?$_REQUEST['hips']:false);
$zip_code = ((isset($_REQUEST['zip_code']) && ($_REQUEST['zip_code'] != ''))?$_REQUEST['zip_code']:false);
$city = ((isset($_REQUEST['city']) && ($_REQUEST['city'] != ''))?$_REQUEST['city']:false);
$the_state = ((isset($_REQUEST['the_state']) && ($_REQUEST['the_state'] != ''))?$_REQUEST['the_state']:false);
$email = ((isset($_REQUEST['email']) && ($_REQUEST['email'] != ''))?$_REQUEST['email']:false);
$hair_color = ((isset($_REQUEST['hair_color']) && ($_REQUEST['hair_color'] != ''))?$_REQUEST['hair_color']:false);
$eyes_color = ((isset($_REQUEST['eyes_color']) && ($_REQUEST['eyes_color'] != ''))?$_REQUEST['eyes_color']:false);
$collar = (isset($_REQUEST['collar'])?$_REQUEST['collar']:false);
$chest = (isset($_REQUEST['chest'])?$_REQUEST['chest']:false);
$name_headshot_photo = ((isset($_REQUEST['headshot_photo']) && ($_REQUEST['headshot_photo'] != ''))?$_REQUEST['headshot_photo']:false);
$name_full_length_photo = ((isset($_REQUEST['full_length_photo']) && ($_REQUEST['full_length_photo'] != ''))?$_REQUEST['full_length_photo']:false);

$file_headshot_photo = ((isset($_FILES['headshot_photo']['tmp_name']) && ($_FILES['headshot_photo']['tmp_name'] != ''))?$_FILES['headshot_photo']['tmp_name']:false);
$file_full_length_photo = ((isset($_FILES['full_length_photo']['tmp_name']) && ($_FILES['full_length_photo']['tmp_name'] != ''))?$_FILES['full_length_photo']['tmp_name']:false);

$menu_sel = ((isset($_REQUEST['menu_sel']) && ($_REQUEST['menu_sel'] != ''))?$_REQUEST['menu_sel']:false);
$letter = ((isset($_REQUEST['letter']) && ($_REQUEST['letter'] != ''))?$_REQUEST['letter']:false);
$model_id = ((isset($_REQUEST['model_id']) && ($_REQUEST['model_id'] != ''))?$_REQUEST['model_id']:false);

/* //echo '..'.json_encode($file_headshot_photo);
echo '..'.json_encode($_FILES);

exit();
  */
 
 /* echo '--'.json_encode($_REQUEST);
 exit(); */
 
// echo '--'.$first_name.','.$last_name.','.$address.','.$address_cont.','.$phone_number.','.$mobile.','.$gender.','.$age.','.$height.','.$zip_code.','.$city.','.$the_state.','.$email.','.$hair_color.','.$eyes_color.','.$file_headshot_photo.','.$file_full_length_photo;
 
$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';
$resultTotal['modelos'] = array();
$resultTotal['datos'] = array();
$resultTotal['videos'] = array();
$resultTotal['photos']= array();
$resultTotal['composite'] = array();

$ok='';
$ko='';

/*
$act_date = mktime(0,0,0);

$result = mysql_query(sprintf("INSERT INTO models_log VALUES ('','%s','%s','%s')",
                        mysql_real_escape_string($requestType),
                        mysql_real_escape_string(json_encode($_REQUEST)),
						mysql_real_escape_string($act_date)   
                ));  
*/

if($requestType){
	switch($requestType){
		case 'submitForm':
			if ($first_name && $last_name && $address && $phone_number && $mobile && $gender && $age && $height && $zip_code && $city && $the_state && $email && $hair_color && $eyes_color && $file_headshot_photo&& $file_full_length_photo && $waist && $hips ){
				if (checkEmail($email)){
					if (is_numeric($mobile)){
						if (is_numeric($phone_number)){
							if (is_numeric($zip_code)){
								if ((($gender=='female') && ($bust!=''))||(($gender=='male') && ($chest!=''))){
									$bHayFicheros = 0; 
									$sCabeceraTexto = ""; 
									$sAdjuntos = "";
									if (form_mail("casting@isabelnavarro.net", "Become a model", "Los datos introducidos en el formulario son:\n\n", $email ,$first_name ,$last_name ,$address, $address_cont , $phone_number , $mobile , $gender, $age,$height , $zip_code, $city , $the_state , $email , $hair_color , $eyes_color , $file_headshot_photo, $file_full_length_photo,$bust,$waist,$hips,$chest)){
									//if (form_mail("rolu06@gmail.com", "Become a model", "Los datos introducidos en el formulario son:\n\n", $email ,$first_name ,$last_name ,$address, $address_cont , $phone_number , $mobile , $gender, $age,$height , $zip_code, $city , $the_state , $email , $hair_color , $eyes_color , $file_headshot_photo, $file_full_length_photo,$bust,$waist,$hips,$chest)){
									}else{
										$resultTotal['res']='ERROR'; 
										$resultTotal['mensaje']= ' No se ha podido enviar el correo. Por favor, inténtalo de nuevo.';
									}
									$resultTotal['res']='SUCCESS'; 
									$resultTotal['mensaje']= 'Muchas gracias por enviarnos tus datos.';
								}else{
									$resultTotal['res']='ERROR'; 
									$resultTotal['mensaje']= ' Todos los campos son obligatorios';
								}
							}else{
								$resultTotal['res']='ERROR'; 
								$resultTotal['mensaje']= ' Código Postal numérico.';
							}
						}else{
							$resultTotal['res']='ERROR'; 
							$resultTotal['mensaje']= ' Teléfono numérico.';	
						}
					}else{
						$resultTotal['res']='ERROR'; 
						$resultTotal['mensaje']= ' Móvil numérico.';	
					}
				}else{
					$resultTotal['res']='ERROR'; 
					$resultTotal['mensaje']= ' Formato inválido de email.';
				}
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=' Todos los campos son obligatorios.';
			}
			if ($resultTotal['res']=='ERROR'){
				$ko = $resultTotal['mensaje'];
			}else{
				$ok = $resultTotal['mensaje'];
			}
			include 'become_a_model.php';
			exit();
		break;
		/*
		case 'showAllModels':
			if ($menu_sel){
				$resultModels = mysql_query("SELECT m.id as id, p.url_photo as url_photo, m.first_name as first_name, m.last_name as last_name  FROM models_model m, models_ppal p WHERE m.model_type = '" . $menu_sel . "' AND m.id=p.model_id  AND m.active=1  AND p.active=1 ORDER BY m.first_name");
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] = $row['first_name'];
						$arrayAux['last_name'] = $row['last_name'];
						$arrayAux['url_photo'] = $row['url_photo'];
						//$arrayAux['url_headshot_photo'] = $row['url_headshot_photo'];
						//$arrayAux['url_full_length_photo'] = $row['url_full_length_photo'];
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
				$resultModels = mysql_query("SELECT m.id as id, p.url_photo as url_photo, m.first_name as first_name, m.last_name as last_name  FROM models_model m, models_ppal p WHERE m.model_type = '" . $menu_sel . "' AND m.active=1 AND m.id=p.model_id  AND p.active=1 AND first_name LIKE '" . $letter . "%' ORDER BY m.first_name");
				//$resultModels = mysql_query("SELECT * FROM models_model WHERE model_type = '" . $menu_sel . "' AND first_name LIKE '" . strtolower($letter) . "%' ORDER BY first_name");
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] =  $row['first_name'];
						$arrayAux['last_name'] =  $row['last_name'];
						$arrayAux['url_photo'] = $row['url_photo'];
						//$arrayAux['url_full_length_photo'] = $row['url_full_length_photo'];
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
				$resultModels = mysql_query("SELECT * FROM models_model WHERE id = " . $model_id . "  AND active=1");
				$num_cols = mysql_affected_rows();
				if ($num_cols>0){
					$arrayAux = array();
					for($i=0;$i<$num_cols;$i++){
						$row = mysql_fetch_assoc($resultModels);
						$arrayAux['id'] = $row['id'];
						$arrayAux['first_name'] = $row['first_name'];
						$arrayAux['last_name'] = $row['last_name'];
						$arrayAux['height'] = $row['height'];
						$arrayAux['shoe_size'] = $row['shoe_size'];
						$arrayAux['eyes_color'] = $row['eyes_color'];
						$arrayAux['hair_color'] = $row['hair_color'];
						$arrayAux['waist'] = $row['waist'];
						$arrayAux['gender'] = $row['gender'];
						if ($arrayAux['gender'] == 'female'){
							$arrayAux['bust'] = $row['bust'];
							$arrayAux['hips'] = $row['hips'];
						}else{
							$arrayAux['collar'] = $row['collar'];
							$arrayAux['chest'] = $row['chest'];
						}
						array_push($resultTotal['datos'],$arrayAux);
					}
				} 
				$resultVideos = mysql_query("SELECT * FROM models_youtube WHERE model_id = " . $model_id . " AND active=1 ORDER BY add_date DESC");
				$num_cols_videos = mysql_affected_rows();
				if ($num_cols_videos>0){
					$arrayAux2 = array();
					for($j=0;$j<$num_cols_videos;$j++){
						$row2 = mysql_fetch_assoc($resultVideos);
						$arrayAux2['video_name'] = $row2['video_name'];
						$arrayAux2['id'] = utf8_encode($row2['id']);
						$arrayAux2['url_youtube'] = $row2['url_youtube'];
						array_push($resultTotal['videos'],$arrayAux2);
					}
				} 
				$resultPhotos = mysql_query("SELECT * FROM models_photos WHERE model_id = " . $model_id . " AND active=1 ORDER BY add_date DESC");
				$num_cols_photos = mysql_affected_rows();
				if ($num_cols_photos>0){
					$arrayAux3 = array();
					for($k=0;$k<$num_cols_photos;$k++){
						$row3 = mysql_fetch_assoc($resultPhotos);
						$arrayAux3['id'] = $row3['id'];
						$arrayAux3['url_photo'] = $row3['url_photo'];
						$arrayAux3['url_thumbnail'] = $row3['url_thumbnail'];
						array_push($resultTotal['photos'],$arrayAux3);
					}
				} 
				
				$resultComposite = mysql_query("SELECT * FROM models_composite WHERE model_id = " . $model_id . " AND active=1 ORDER BY add_date DESC");
				$num_cols_composite = mysql_affected_rows();
				if ($num_cols_composite>0){
					$arrayAux4 = array();
					for($l=0;$l<$num_cols_composite;$l++){
						$row4 = mysql_fetch_assoc($resultComposite);
						$arrayAux4['id'] = $row4['id'];
						$arrayAux4['composite_name'] = $row4['composite_name'];
						$arrayAux4['url_composite'] = $row4['url_composite'];
						array_push($resultTotal['composite'],$arrayAux4);
					}
				} 
				
				$resultTotal['res']='SUCCESS'; 
				$resultTotal['mensaje']=$num_cols;
			}else{
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje']=utf8_encode('- Falta el tipo de modelo.');
			}
		break;
		*/
	}
}

echo json_encode($resultTotal);
if($requestType=="submitForm"){
	header('Location: http://www.rociolourdes.hostoi.com');
}
?>