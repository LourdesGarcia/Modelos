<?php

//error_reporting(E_ALL);

include('config_database.php');
include('check_data.php');
define('URL_SERVER_2','//rociolourdes.hostoi.com/');
define('BOOK_URL_2','book/');
define('MINI_URL_2','mini/');
define('URL_ADMIN_2', URL_SERVER_2 . 'admin/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);


$model_id = ((isset($_REQUEST['model_id']) && ($_REQUEST['model_id'] != ''))?$_REQUEST['model_id']:false);

$name_add_book = ((isset($_REQUEST['big']) && ($_REQUEST['big'] != ''))?$_REQUEST['big']:false);

$file_add_book = ((isset($_FILES['big']['tmp_name']) && ($_FILES['big']['tmp_name'] != ''))?$_FILES['big']['tmp_name']:false);

$name_add_mini = ((isset($_REQUEST['thumbnail']) && ($_REQUEST['thumbnail'] != ''))?$_REQUEST['thumbnail']:false);

$file_add_mini = ((isset($_FILES['thumbnail']['tmp_name']) && ($_FILES['thumbnail']['tmp_name'] != ''))?$_FILES['thumbnail']['tmp_name']:false);


$activados=array();
$desactivados=array();

$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';


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
		case 'addPhotos':
			if ($model_id){
				if ($file_add_book && $file_add_mini){
					
					$t_fich_book = explode('.',$_FILES['big']['name']);
					$f_name_big = 'book_' . $act_date;
					$f_archive_big= 'book_'.$act_date.'.'.array_pop($t_fich_book);
					$t_fich_mini = explode('.',$_FILES['thumbnail']['name']);
					$f_name_mini = 'mini_' . $act_date;
					$f_archive_mini= 'mini_'.$act_date.'.'.array_pop($t_fich_mini);
					$f_name_photo = 'photo_' . $act_date;
					$bigOK = saveFich('big',BOOK_URL_2,$f_archive_big);
					$thumbnailOK=saveFich('thumbnail',MINI_URL_2,$f_archive_mini);
					if ($bigOK && $thumbnailOK){
						$resultQuery = mysql_query(sprintf("INSERT INTO models_photos VALUES ('','%s','%s','%s','%s','%s','%s')",
							mysql_real_escape_string($model_id),
							mysql_real_escape_string($f_name_photo),
							mysql_real_escape_string($f_archive_big),
							mysql_real_escape_string($f_archive_mini),
							mysql_real_escape_string($act_date),
							mysql_real_escape_string(1)
						));  
						if ($resultQuery){
							$textProccessOK = 'Se ha guardado el archivo correctamente.';
							$resultTotal['res']='SUCCESS'; 
							$resultTotal['mensaje'] = $textProccessOK;
						}else{
							$resultTotal['res']='ERROR'; 
							$textProccessKO = 'No se ha podido guardar en la base de datos.';
							$resultTotal['mensaje'] = $textProccessKO;
						}
					}else{
						$resultTotal['res']='ERROR'; 
						$textProccessKO = ' No se ha podido guardar el archivo en el servidor.';
						$resultTotal['mensaje'] = $textProccessKO;
					}
				}else{
					$resultTotal['res']='ERROR'; 
					$textProccessKO = ' Debes cargar los dos archivos.';
					$resultTotal['mensaje'] = $textProccessKO;
				}
			}else{
				$resultTotal['res']='ERROR'; 
				$textProccessKO = ' Falta el identificador de modelo.';
				$resultTotal['mensaje'] = $textProccessKO;
			}
		break;
		case 'updatePhotos':
			foreach($_REQUEST as $k => $val){
				$pos = strpos($k,'photo_');
				if ($pos === false){	
				}else{
					$video_array = explode('_',$k);
					if ($val=='activar'){
						array_push($activados, $video_array[1]);
					}else{
						if ($val=='desactivar'){
							array_push($desactivados,$video_array[1]);	
						}
					}
				}
			}
			$queryDes='';
			$queryAct='';
			$namesAct='';
			$namesDes='';
			$OK='';
			$cont=0;
			if (!empty($activados)){
				$cont++;
			}
			if (!empty($desactivados)){
				$cont++;
			}
			if (!empty($activados)){
				$namesAct = implode(',',$activados);
				$queryAct = mysql_query("UPDATE models_photos SET active = 1 WHERE id IN (" . $namesAct . ") AND active = 0");
				if ($queryAct){
					$cont--;
				}
			}
			if (!empty($desactivados)){
				$namesDes = implode(',',$desactivados);
				$queryDes =  mysql_query("UPDATE models_photos SET active = 0 WHERE id IN (" . $namesDes . ") AND active = 1");
				if ($queryDes){
					$cont--;
				}
			}
			if ($cont!=0){
				$textProccessKO = ' No se han podido realizar los cambios.';
				$resultTotal['res']='ERROR'; 
				$resultTotal['mensaje'] = $textProccessKO;
			}else{
				$textProccessOK = ' Se han realizado los cambios correctamente.';
				$resultTotal['res']='SUCCESS'; 
				$resultTotal['mensaje'] = $textProccessOK;	
			}
		break;
	}
}

//echo json_encode($resultTotal);
include 'photosmodel.php';
exit();
?>
