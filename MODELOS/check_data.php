<?php

	function checkEmail($email){
		// Primero, checamos que solo haya un símbolo @, y que los largos sean correctos
	  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)){
			// correo inválido por número incorrecto de caracteres en una parte, o número incorrecto de símbolos @
		return false;
	  }
	  // se divide en partes para hacerlo más sencillo
	  $email_array = explode("@", $email);
	  $local_array = explode(".", $email_array[0]);
	  for ($i = 0; $i < sizeof($local_array); $i++){
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
		  return false;
		}
	  } 
	  // se revisa si el dominio es una IP. Si no, debe ser un nombre de dominio válido
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])){ 
			 $domain_array = explode(".", $email_array[1]);
			 if (sizeof($domain_array) < 2) {
				return false; // No son suficientes partes o secciones para se un dominio
			 }
			 for ($i = 0; $i < sizeof($domain_array); $i++)	{
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
				   return false;
				}
			 }
		}
		return true;
	}
	
	
	function form_mail($sPara, $sAsunto, $sTexto, $sDe)
		{ 
		$bHayFicheros = 0; 
		$sCabeceraTexto = ""; 
		$sAdjuntos = "";

		if ($sDe)$sCabeceras = "From:".$sDe."\n"; 
		else $sCabeceras = ""; 
		$sCabeceras .= "MIME-version: 1.0\n"; 
		foreach ($_REQUEST as $sNombre => $sValor) 
		$sTexto = $sTexto."\n".$sNombre." = ".$sValor;

		foreach ($_FILES as $vAdjunto)
		{ 
		if ($bHayFicheros == 0)
		{ 
		$bHayFicheros = 1; 
		$sCabeceras .= "Content-type: multipart/mixed;"; 
		$sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";

		$sCabeceraTexto = "----_Separador-de-mensajes_--\n"; 
		$sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n"; 
		$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";

		$sTexto = $sCabeceraTexto.$sTexto; 
		} 
		if ($vAdjunto["size"] > 0)
		{ 
		$sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n"; 
		$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";; 
		$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n"; 
		$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";

		$oFichero = fopen($vAdjunto["tmp_name"], 'r'); 
		$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"])); 
		$sAdjuntos .= chunk_split(base64_encode($sContenido)); 
		fclose($oFichero); 
		} 
		}

		if ($bHayFicheros) 
		$sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n"; 
		return(mail($sPara, $sAsunto, $sTexto, $sCabeceras)); 
	}
	

	/*
	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Prueba Modelos</title>
		</head>
		<body>
			<p></p>
		</body>
		</html>';
	*/
	
/*	function saveFich($nameFich1, $nameFich2, $file1, $file2)
	{
		if ($_FILES[$nameFich1]['error']) {
          switch ($_FILES[$nameFich1]['error']){
                   case 1: // UPLOAD_ERR_INI_SIZE
                   echo"El archivo sobrepasa el limite autorizado por el servidor(archivo php.ini) !";
                   break;
                   case 2: // UPLOAD_ERR_FORM_SIZE
                   echo "El archivo sobrepasa el limite autorizado en el formulario HTML !");
                   break;
                   case 3: // UPLOAD_ERR_PARTIAL
                   echo "El envio del archivo ha sido suspendido durante la transferencia!";
                   break;
                   case 4: // UPLOAD_ERR_NO_FILE
                   echo "El archivo que ha enviado tiene un tamaño nulo !");
                   break;
			}
		}
		else {
			if ((isset($_FILES[$nameFich1]['name'])&&($_FILES[$nameFich1]['error'] == UPLOAD_ERR_OK)) {
				$ruta_destino = '/var/www/archivos/';
				move_uploaded_file($_FILES[$nameFich1]['tmp_name'], $ruta_destino.$_FILES[$nameFich1]['name']);
			}
		} 
	}

	/*
	function form_mail($sPara, $sAsunto, $sTexto, $sDe, $nameFich1, $nameFich2, $file1, $file2){
		
	}	 */
	
?>