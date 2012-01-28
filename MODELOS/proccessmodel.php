<?php

	error_reporting(E_ALL);

	include('config_database.php');	
	include('check_data.php');
	define('URL_SERVER_2','//rociolourdes.hostoi.com/');
	define('IMAGES_URL_2','img/');
	define('PPAL_URL_2', 'ppal/');
	define('COMPOSITE_URL_2', 'composite/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);

$first_name = ((isset($_REQUEST['first_name']) && ($_REQUEST['first_name'] != ''))?$_REQUEST['first_name']:false);
$last_name = ((isset($_REQUEST['last_name_2']) && ($_REQUEST['last_name_2'] != ''))?$_REQUEST['last_name_2']:false);
$gender = ((isset($_REQUEST['sex']) && ($_REQUEST['sex'] != ''))?$_REQUEST['sex']:false);
$age = ((isset($_REQUEST['age']) && ($_REQUEST['age'] != ''))?$_REQUEST['age']:false);
$height = ((isset($_REQUEST['height']) && ($_REQUEST['height'] != ''))?$_REQUEST['height']:false);
$bust = (isset($_REQUEST['bust'])?$_REQUEST['bust']:false);
$waist1 = (isset($_REQUEST['waist1'])?$_REQUEST['waist1']:false);
$hips = (isset($_REQUEST['hips'])?$_REQUEST['hips']:false);
$shoe_size = ((isset($_REQUEST['shoe_size']) && ($_REQUEST['shoe_size'] != ''))?$_REQUEST['shoe_size']:false);
$hair_color = ((isset($_REQUEST['hair_color']) && ($_REQUEST['hair_color'] != ''))?$_REQUEST['hair_color']:false);
$eyes_color = ((isset($_REQUEST['eyes_color']) && ($_REQUEST['eyes_color'] != ''))?$_REQUEST['eyes_color']:false);
$collar = (isset($_REQUEST['collar'])?$_REQUEST['collar']:false);
$chest = (isset($_REQUEST['chest'])?$_REQUEST['chest']:false);
$waist2 = (isset($_REQUEST['waist2'])?$_REQUEST['waist2']:false);

$type_model = ((isset($_REQUEST['category']) && ($_REQUEST['category'] != ''))?$_REQUEST['category']:false);

$name_ppal_photo = ((isset($_REQUEST['foto_book']) && ($_REQUEST['foto_book'] != ''))?$_REQUEST['foto_book']:false);
$file_ppal_photo = ((isset($_FILES['foto_book']['tmp_name']) && ($_FILES['foto_book']['tmp_name'] != ''))?$_FILES['foto_book']['tmp_name']:false);

$name_composite = ((isset($_REQUEST['composite']) && ($_REQUEST['composite'] != ''))?$_REQUEST['composite']:false);
$file_composite = ((isset($_FILES['composite']['tmp_name']) && ($_FILES['composite']['tmp_name'] != ''))?$_FILES['composite']['tmp_name']:false);

$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';
$resultTotal['modelos'] = array();
$resultTotal['datos'] = array();
$resultTotal['videos'] = array();
$resultTotal['photos']= array();

$activados=array();
$desactivados=array();

$textProccessKO = '';
$textProccessOK = '';

$act_date = mktime();

/*
$result = mysql_query(sprintf("INSERT INTO models_log VALUES ('','%s','%s','%s')",
                        mysql_real_escape_string($requestType),
                        mysql_real_escape_string(json_encode($_REQUEST)),
						mysql_real_escape_string($act_date)   
                ));  

*/

if($requestType){
	switch($requestType){
		case 'addModel':
			if ($first_name && $last_name && $gender && $height && $shoe_size && $hair_color && $eyes_color && $type_model){
				if ($file_ppal_photo){
					if ($file_composite){
						if ((($gender=='female') && ($bust!='') &&($waist1!='') && ($hips!=''))||(($gender=='male')&& ($collar!='') && ($chest!='') && ($waist2!=''))){
						
							$waist_general=$waist1.' '.$waist2;
							
							$t_fich_ppal = explode('.',$_FILES['foto_book']['name']);
							$f_archive_ppal= '1Plano_'.$act_date.'.'. array_pop($t_fich_ppal);
							$f_name_ppal = 'photo_' . $act_date;
							$t_fich_composite = explode('.',$_FILES['composite']['name']);
							$f_archive_composite = 'composite_'.$act_date.'.'.array_pop($t_fich_composite);
							$f_name_composite = 'composite_' . $act_date;
							
							
							if ((saveFich('foto_book',PPAL_URL_2,$f_archive_ppal))&&(saveFich('composite',COMPOSITE_URL_2,$f_archive_composite))){
								
								$resultQuery = mysql_query(sprintf("INSERT INTO models_model VALUES ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
									mysql_real_escape_string($first_name),
									mysql_real_escape_string($last_name),
									mysql_real_escape_string($gender),
									mysql_real_escape_string($age),
									mysql_real_escape_string($shoe_size),
									mysql_real_escape_string($hair_color),
									mysql_real_escape_string($eyes_color),
									mysql_real_escape_string($height),
									mysql_real_escape_string($bust),
									mysql_real_escape_string($hips),
									mysql_real_escape_string(trim($waist_general)),
									mysql_real_escape_string($collar),
									mysql_real_escape_string($chest),
									mysql_real_escape_string($type_model),
									mysql_real_escape_string($act_date),
									mysql_real_escape_string(1)   										
								));  
								if ($resultQuery){
									//BUSCAR EL MODEL_ID (buscar la ultima insercion que ha habido en models_model
									$resultModel = mysql_query("SELECT id FROM models_model ORDER BY add_date DESC");
									$num_cols1 = mysql_affected_rows();
									if ($num_cols1>0){
										$cont=1;
										for($j=0;$j<$num_cols1;$j++){
											if ($j==0){
												$rowModel = mysql_fetch_assoc($resultModel);
											}
										}
									}
									$model_id = $rowModel['id'];
									$resultPpalQuery = mysql_query(sprintf("INSERT INTO models_ppal VALUES ('','%s','%s','%s','%s','%s')",
										mysql_real_escape_string($model_id),
										mysql_real_escape_string($f_name_ppal),
										mysql_real_escape_string($f_archive_ppal),
										mysql_real_escape_string($act_date),
										mysql_real_escape_string(1)   										
									));  
									if ($resultPpalQuery){//IMAGEN PPAL
										$resultCompositeQuery = mysql_query(sprintf("INSERT INTO models_composite VALUES ('','%s','%s','%s','%s','%s')",
											mysql_real_escape_string($model_id),
											mysql_real_escape_string($f_name_composite),
											mysql_real_escape_string($f_archive_composite),
											mysql_real_escape_string($act_date),
											mysql_real_escape_string(1)   										
										));  
										if ($resultCompositeQuery){
											$textProccessOK = ' Se ha insertado correctamente.';
											$resultTotal['res']='SUCCESS'; 
											$resultTotal['mensaje'] = $textProccessOK;	
										}else{
											$textProccessKO = 'No se ha podido guardar el composite de la modelo en la base de datos.';
											$resultTotal['res']='ERROR'; 
											$resultTotal['mensaje'] = $textProccessKO;
										}
									}else{
										$textProccessKO = 'No se ha podido guardar la imagen principal de la modelo en la base de datos.';
										$resultTotal['res']='ERROR'; 
										$resultTotal['mensaje'] = $textProccessKO;
									}
									/* echo $model_id;
									exit(); */
								}else{
									$textProccessKO = 'No se han podido guardar los datos de la modelo en la base de datos.';
									$resultTotal['res']='ERROR'; 
									$resultTotal['mensaje'] = $textProccessKO;
								}
							}else{
								$textProccessKO = ' Ha habido un problema con la carga de los ficheros.';
								$resultTotal['res']='ERROR'; 
								$resultTotal['mensaje'] = $textProccessKO;
							}
						}else{
							$textProccessKO = ' Faltan datos.';
							$resultTotal['res']='ERROR'; 
							$resultTotal['mensaje'] = $textProccessKO;
						}
					}else{
						$textProccessKO = ' No se ha cargado el archivo del composite.';
						$resultTotal['res']='ERROR'; 
						$resultTotal['mensaje'] = $textProccessKO;
					}
				}else{
					$textProccessKO = ' No se ha cargado el archivo de la imagen principal.';
					$resultTotal['res']='ERROR'; 
					$resultTotal['mensaje'] = $textProccessKO;
				}
			}else{
				$textProccessKO = ' Todos los campos son obligatorios.';
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje'] = $textProccessKO;
			}
		break;
		case 'updateModel':
		break;
	}
}

//echo json_encode($resultTotal);
include 'addmodel.php';
exit();
?>