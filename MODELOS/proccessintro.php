<?php

error_reporting(E_ALL);

include('config_database.php');
include('check_data.php');
define('URL_SERVER_2','//rociolourdes.hostoi.com/');
define('INTRO_URL_2','intro/');

$requestType = ((isset($_REQUEST['request_type']) && ($_REQUEST['request_type'] != ''))?$_REQUEST['request_type']:false);

$name_add_photo = ((isset($_REQUEST['add_intro']) && ($_REQUEST['add_intro'] != ''))?$_REQUEST['add_intro']:false);

$file_add_photo = ((isset($_FILES['add_intro']['tmp_name']) && ($_FILES['add_intro']['tmp_name'] != ''))?$_FILES['add_intro']['tmp_name']:false);




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
					}else{
						$resultTotal['res']='ERROR'; 
						$textProccessKO = 'No se ha podido guardar en la base de datos.';
					}
				}else{
					$resultTotal['res']='ERROR'; 
					$textProccessKO = ' No se ha podido guardar el archivo en el servidor.';
				}
			}else{
				$resultTotal['res']='ERROR'; 
				$textProccessKO = ' No se ha cargado ningún archivo.';
			}
		break;
		case 'updateIntro':
			$names=array();
			$values=array();
			foreach($_REQUEST as $k => $val){
				$pos = strpos($k,'intro_');
				if ($pos === false){	
				}else{
					array_push($names,$k);
					array_push($values,$val);
				}
			}
		break;
	}
}

//echo json_encode($resultTotal);
include 'intro.php';
exit();
?>
