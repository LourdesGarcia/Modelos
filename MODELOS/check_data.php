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
	
	
	/*function form_mail($sPara, $sAsunto, $sTexto, $sDe)
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
	}*/
	
	function form_mail($sPara, $sAsunto, $sTexto, $sDe,$first_name ,$last_name ,$address, $address_cont , $phone_number , $mobile , $gender, $age,$height , $zip_code, $city , $the_state , $email , $hair_color , $eyes_color , $file_headshot_photo, $file_full_length_photo,$bust, $waist1,$hips,$collar,$waist2,$chest)
		{ 
		$bHayFicheros = 0; 
		$sCabeceraTexto = ""; 
		$sAdjuntos = "";

		if ($sDe)$sCabeceras = "From:".$sDe."\n"; 
		else $sCabeceras = ""; 
		$sCabeceras .= "MIME-version: 1.0\n"; 
		
		
		$sTexto = $sTexto."\n Nombre: ".$first_name;
		$sTexto = $sTexto."\n Apellido: ".$last_name;
		$sTexto = $sTexto."\n Número de telefono: ".$phone_number;
		$sTexto = $sTexto."\n Móvil: ".$mobile;
		$sTexto = $sTexto."\n Género: ".$gender;
		$sTexto = $sTexto."\n Edad: " . $age;
		$sTexto = $sTexto."\n Dirección: ".$address." ".$address_cont;
		$sTexto = $sTexto."\n Código Postal: ".$zip_code;
		$sTexto = $sTexto."\n Ciudad: ".$city;
		$sTexto = $sTexto."\n Provincia: ".$the_state;
		$sTexto = $sTexto."\n Email: ".$email;
		$sTexto = $sTexto."\n Color de pelo: ".$hair_color;
		$sTexto = $sTexto."\n Color de ojos: ".$eyes_color;
		$sTexto = $sTexto."\n Altura: ".$height;

		if ($gender=='female'){
			$sTexto = $sTexto."\n Pecho: ".$bust;
			$sTexto = $sTexto."\n Cintura: ".$waist1;
			$sTexto = $sTexto."\n Cadera: ".$hips;
		}else{
			$sTexto = $sTexto."\n Cuello: ".$collar;
			$sTexto = $sTexto."\n Cintura: ".$waist2;
			$sTexto = $sTexto."\n Pecho: ".$chest;
		}

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

	function saveFich($nameFich,$ruta_destino,$fich_name)
	{
		if ($_FILES[$nameFich]['error']) {
          /*switch ($_FILES[$nameFich]['error']){
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
			}*/
			return false;
		}
		else {
		//echo $_FILES[$nameFich]['tmp_name'].'/'.$_FILES[$nameFich]['name'].','.$ruta_destino.$fich_name;
		
			//	move_uploaded_file($_FILES[$nameFich]['tmp_name'].'/'.$_FILES[$nameFich]['name'], $ruta_destino.$fich_name);
			//if ((isset($_FILES[$nameFich]['name'])&&($_FILES[$nameFich]['error'] == UPLOAD_ERR_OK))) {
				return (copy($_FILES[$nameFich]['tmp_name'], $ruta_destino.$fich_name));
			//}
		} 
	}


?>