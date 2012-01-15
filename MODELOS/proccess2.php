<?php

error_reporting(E_ALL);

include('config_database.php');
include('check_data.php');
define('SET_IMAGES_URL','my_images/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);

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
$type_model = ((isset($_REQUEST['type']) && ($_REQUEST['type'] != ''))?$_REQUEST['type']:false);
$name_headshot_photo = ((isset($_REQUEST['headshot_photo']) && ($_REQUEST['headshot_photo'] != ''))?$_REQUEST['headshot_photo']:false);
$name_full_length_photo = ((isset($_REQUEST['full_length_photo']) && ($_REQUEST['full_length_photo'] != ''))?$_REQUEST['full_length_photo']:false);

$file_headshot_photo = ((isset($_FILES['headshot_photo']['tmp_name']) && ($_FILES['headshot_photo']['tmp_name'] != ''))?$_FILES['headshot_photo']['tmp_name']:false);
$file_full_length_photo = ((isset($_FILES['full_length_photo']['tmp_name']) && ($_FILES['full_length_photo']['tmp_name'] != ''))?$_FILES['full_length_photo']['tmp_name']:false);

 
$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';
$resultTotal['modelos'] = array();
$resultTotal['datos'] = array();
$resultTotal['videos'] = array();
$resultTotal['photos']= array();

$act_date = mktime();

$result = mysql_query(sprintf("INSERT INTO models_log VALUES ('','%s','%s','%s')",
                        mysql_real_escape_string($requestType),
                        mysql_real_escape_string(json_encode($_REQUEST)),
						mysql_real_escape_string($act_date)   
                ));  


if($requestType){
	switch($requestType){
		case 'submitForm':
			if ($first_name && $last_name && $address && $phone_number && $mobile && $gender && $age && $height && $zip_code && $city && $the_state && $email && $hair_color && $eyes_color && $file_headshot_photo&& $file_full_length_photo && $type_model){
				if (checkEmail($email)){
					if (is_numeric($mobile)){
						if (is_numeric($phone_number)){
							if (is_numeric($zip_code)){
								if ((($gender=='female') && ($bust!='') &&($waist1!='') && ($hips!=''))||(($gender=='male')&& ($collar!='') && ($chest!='') && ($waist2!=''))){
									$address_total = $address.' '.$address_cont;
									$waist_general=$waist1.' '.$waist2;
									
									$t_fich1 = explode('.',$_FILES['headshot_photo']['name']);
									$f_name1 = 'book_'.$act_date.'.'. array_pop($t_fich1);
									$t_fich2 = explode('.',$_FILES['full_length_photo']['name']);
									$f_name2 = 'mini_'.$act_date.'.'.array_pop($t_fich2);
									
							
									
									if ((saveFich('headshot_photo',SET_IMAGES_URL,$f_name1))&&(saveFich('full_length_photo',SET_IMAGES_URL,$f_name2))){
									
										
										$resultQuery = mysql_query(sprintf("INSERT INTO models_model VALUES ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
										//first_name,last_name,address,zip_code,city,phone_number,the_state,mobile,email,gender,age,hair_color,eyes_color,height,bust,hips,waist,collar,chest,url_headshot_photo,url_full_length_photo,model_type,add_date
												mysql_real_escape_string($first_name),
												mysql_real_escape_string($last_name),
												mysql_real_escape_string($address_total),
												mysql_real_escape_string($zip_code),
												mysql_real_escape_string($city),
												mysql_real_escape_string($phone_number),
												mysql_real_escape_string($the_state),
												mysql_real_escape_string($mobile),
												mysql_real_escape_string($email),
												mysql_real_escape_string($gender),
												mysql_real_escape_string($age),
												mysql_real_escape_string($hair_color),
												mysql_real_escape_string($eyes_color),
												mysql_real_escape_string($height),
												mysql_real_escape_string($bust),
												mysql_real_escape_string($hips),
												mysql_real_escape_string(trim($waist_general)),
												mysql_real_escape_string($collar),
												mysql_real_escape_string($chest),
												mysql_real_escape_string(SET_IMAGES_URL.$f_name1),
												mysql_real_escape_string(SET_IMAGES_URL.$f_name2),
												mysql_real_escape_string($type_model),
												mysql_real_escape_string($act_date)   
										));  
										if ($resultQuery){
											$resultTotal['res']='SUCCESS'; 
											$resultTotal['mensaje']= 'OK';
										}else{
											$resultTotal['res']='ERROR'; 
											$resultTotal['mensaje']= utf8_encode('- No se ha podido enviar el correo. Por favor, inténtalo de nuevo.');
										}
									}else{
										$resultTotal['res']='ERROR'; 
										$resultTotal['mensaje']= utf8_encode('Ha habido un problema con la carga de los ficheros.');
									}
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
	}
}

echo json_encode($resultTotal);
if(($requestType=="submitForm")&&($resultTotal['res']=='SUCCESS')){
	header('Location: http://www.rociolourdes.hostoi.com/index2.php');
}
?>
