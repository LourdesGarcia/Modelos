<?php

//error_reporting(E_ALL);

include('../config_database.php');
include('../check_data.php');
define('URL_SERVER_2','//rociolourdes.hostoi.com/');
define('INTRO_URL_2','../intro/');
define('URL_ADMIN_2', URL_SERVER_2 . 'admin/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);

$name_add_photo = ((isset($_REQUEST['add_intro']) && ($_REQUEST['add_intro'] != ''))?$_REQUEST['add_intro']:false);

$file_add_photo = ((isset($_FILES['add_intro']['tmp_name']) && ($_FILES['add_intro']['tmp_name'] != ''))?$_FILES['add_intro']['tmp_name']:false);


$activados=array();
$desactivados=array();
$borrados=array();

$resultTotal = array();
$resultTotal['res']='ERROR'; 
$resultTotal['mensaje']='Tipo indefinido.';
$resultTotal['type']='';


$textProccessKO = '';
$textProccessOK = '';

$act_date = mktime();


if($requestType){
	switch($requestType){
		case 'addIntro':
			if ($file_add_photo){
				$t_fich = explode('.',$_FILES['add_intro']['name']);
				$f_name = 'intro_' . $act_date;
				$f_archive= 'intro_'.$act_date.'.'.array_pop($t_fich);
				if (saveFich('add_intro',INTRO_URL_2,$f_archive)){
					$resultQuery = mysql_query(sprintf("INSERT INTO models_intro VALUES ('','%s','%s','%s','%s')",
						mysql_real_escape_string($f_name),
						mysql_real_escape_string($f_archive),
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
				$textProccessKO = ' No se ha cargado ningún archivo.';
				$resultTotal['mensaje'] = $textProccessKO;
			}
		break;
		case 'updateIntro':
			foreach($_REQUEST as $k => $val){
				$pos = strpos($k,'intro_');
				if ($pos === false){	
				}else{
					if ($val=='activar'){
						array_push($activados,"'" . $k . "'");
					}else{
						if ($val=='desactivar'){
							array_push($desactivados,"'" . $k . "'");	
						}
					}
				}
				if ($val=='borrar'){
					array_push($borrados,"'" . $k . "'");	
				}
			}
			$queryDes='';
			$queryAct='';
			$namesAct='';
			$namesDes='';
			$namesRmv='';
			$queryRmv='';
			$OK='';
			$cont=0;
			if (!empty($activados)){
				$cont++;
			}
			if (!empty($desactivados)){
				$cont++;
			}
			if (!empty($borrados)){
				$cont++;
			}
			if (!empty($activados)){
				$namesAct = implode(',',$activados);
				$queryAct = mysql_query("UPDATE models_intro SET active = 1 WHERE photo_name IN (" . $namesAct . ") AND active = 0");
				if ($queryAct){
					$cont--;
				}
			}
			if (!empty($desactivados)){
				$namesDes = implode(',',$desactivados);
				$queryDes =  mysql_query("UPDATE models_intro SET active = 0 WHERE photo_name IN (" . $namesDes . ") AND active = 1");
				if ($queryDes){
					$cont--;
				}
			}
			if (!empty($borrados)){
				$namesRmv = implode(',',$borrados);
				$queryRmv =  mysql_query("DELETE FROM models_intro WHERE photo_name IN (" . $namesRmv . ")");
				if ($queryRmv){
					$cont--;
				}
			}
				
			foreach($_REQUEST as $k2 => $val2){
				$pos2 = strpos($k2,'order_');
				if ($pos2 === false){	
				}else{
					$order_array = explode('_',$k2);
					if ($val2!=''){
						$queryOrder =  mysql_query("UPDATE models_intro SET selectedOrder = " . $val2 . " WHERE id IN (" . $order_array[1] . ")");
					}else{
						$queryOrder =  mysql_query("UPDATE models_intro SET selectedOrder = '2147483647' WHERE id IN (" . $order_array[1] . ")");
					}
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
include 'intro.php';
exit();
?>
