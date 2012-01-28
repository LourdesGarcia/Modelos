<?php

//error_reporting(E_ALL);

include('config_database.php');
include('check_data.php');
define('URL_SERVER_2','//rociolourdes.hostoi.com/');
define('VIDEOS_URL_2','youtube/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);

$name_video = ((isset($_REQUEST['titulo']) && ($_REQUEST['titulo'] != ''))?$_REQUEST['titulo']:false);
$url_video = ((isset($_REQUEST['url']) && ($_REQUEST['url'] != ''))?$_REQUEST['url']:false);
$model_id = ((isset($_REQUEST['model_id']) && ($_REQUEST['model_id'] != ''))?$_REQUEST['model_id']:false);

$name_add_photo = ((isset($_REQUEST['add_intro']) && ($_REQUEST['add_intro'] != ''))?$_REQUEST['add_intro']:false);

$file_add_photo = ((isset($_FILES['add_intro']['tmp_name']) && ($_FILES['add_intro']['tmp_name'] != ''))?$_FILES['add_intro']['tmp_name']:false);


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
		case 'addVideos':
			if ($model_id){
				if ($name_video && $url_video){
					$resultQuery = mysql_query(sprintf("INSERT INTO models_youtube VALUES ('','%s','%s','%s','%s','%s')",
						mysql_real_escape_string($model_id),
						mysql_real_escape_string($name_video . ' ' . $act_date),
						mysql_real_escape_string($url_video),
						mysql_real_escape_string($act_date),  
						mysql_real_escape_string(1)
					));  
					if ($resultQuery){
						$textProccessOK = 'Se ha guardado la url del vídeo correctamente.';
						$resultTotal['res']='SUCCESS'; 
						$resultTotal['mensaje'] = $textProccessOK;
					}else{
						$resultTotal['res']='ERROR'; 
						$textProccessKO = 'No se ha podido guardar en la base de datos.';
						$resultTotal['mensaje'] = $textProccessKO;
					}
				}else{
					$resultTotal['res']='ERROR'; 
					$textProccessKO = ' Falta el nombre y/o la url del vídeo.';
					$resultTotal['mensaje'] = $textProccessKO;
				}
			}else{
				$resultTotal['res']='ERROR'; 
				$textProccessKO = ' Falta el identificador de la modelo.';
				$resultTotal['mensaje'] = $textProccessKO;
			}
		break;
		case 'updateVideos':
			foreach($_REQUEST as $k => $val){
				$pos = strpos($k,'video_');
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
				$queryAct = mysql_query("UPDATE models_youtube SET active = 1 WHERE id IN (" . $namesAct . ") AND active = 0");
					//echo "UPDATE models_youtube SET active = 1 WHERE model_id IN (" . $namesAct . ") AND active = 0";
					//exit();
				if ($queryAct){
					$cont--;
				}
			}
			if (!empty($desactivados)){
				$namesDes = implode(',',$desactivados);
				$queryDes =  mysql_query("UPDATE models_youtube SET active = 0 WHERE id IN (" . $namesDes . ") AND active = 1");
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
include 'videosmodel.php';
exit();
?>
