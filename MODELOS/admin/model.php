<?
	//error_reporting(E_ALL);
	include('../config_database.php');
	define('URL_WEB','//www.rociolourdes.hostoi.com/');	
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . '../img/');
	define('PPAL_URL',URL_SERVER . '../ppal/');
	define('COMPOSITE_URL',URL_SERVER . '../composite/');
	define('URL_ADMIN',URL_SERVER . 'admin/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management: Gestor de contenidos</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script> 
</head>
<body id="administrador">
<script type="text/javascript" >
jQuery(document).ready(function() {
	jQuery("input[name='sex']").live('click', function(e){
			var otroOp = jQuery("input[name='sex']:checked").attr('id');
			if (otroOp=="male"){
				//jQuery('#bust').val('');
				jQuery('#bust').attr('disabled','disabled');
				jQuery("#chest").removeAttr('disabled');
				jQuery("#collar").removeAttr('disabled');
			}else{
				if (otroOp=="female"){
					//jQuery('#chest').val('');
					jQuery("#chest").attr('disabled','disabled');
					//jQuery('#collar').val('');
					jQuery("#collar").attr('disabled','disabled');
					jQuery("#bust").removeAttr('disabled');
				}
			}
	});
	
});
</script>
<div id="cabecera">
    	<a href="<?= URL_WEB ?>index.php"><img src="../img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	<li><a href="intro.php">Gestión página inicio</a></li>
    	<li><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li class="active"><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
	<?
	$resultModel1 = mysql_query("SELECT * FROM models_model WHERE id='" . $_REQUEST['model_id'] . "'");
		$num_cols1 = mysql_affected_rows();
		if ($num_cols1>0){
			$cont=1;
			for($j=0;$j<$num_cols1;$j++){
				$rowModel = mysql_fetch_assoc($resultModel1);
	?>
	<h2><?= strtoupper($rowModel['first_name'])?> <?= strtoupper($rowModel['last_name']) ?> </h2>
	<p>A continuación se muestran los datos existentes para la modelo. Modifique los que desee y pulse al botón Enviar para guardar los cambios.</p>
    <div id="ok" style="display:<?=  (isset($textProccessOK)&&($textProccessOK!=''))?'block':'none' ?>">
    	<div>
    		<p><?=  (isset($textProccessOK)&&($textProccessOK!=''))?$textProccessOK:'' ?></p>
    	</div>
    </div>
    <div id="ko" style="display:<?=  (isset($textProccessKO)&&($textProccessKO!=''))?'block':'none' ?>">
    	<div>
            <p><?=  (isset($textProccessKO)&&($textProccessKO!=''))?$textProccessKO:'' ?></p>
    	</div>
    </div>
	<div id="menu_become_a_model" class="menus">
		<form class="adjuntos" action="proccessmodel.php" method="POST" ENCTYPE="multipart/form-data">
            <fieldset>
                <legend>Datos</legend>
                <div class="container_formdatos">
                    <div style="margin-bottom:10px;">
                        <span class="gender">Categoría</span>
                        <input type="radio" id="women" name="category" value="women" <?= ($rowModel['model_type']=='women')?'checked="ckecked"':'' ?>/>
                        <label for="" class="nobullet"><strong>Women</strong></label>
                        <input type="radio" id="men" name="category" value="men" <?= ($rowModel['model_type']=='men')?'checked="ckecked"':'' ?> />
                        <label for="" class="nobullet"><strong>Men</strong></label>
                        <input type="radio" id="special" name="category" value="special_booking"  <?= ($rowModel['model_type']=='special_booking')?'checked="ckecked"':'' ?> />
                        <label for="" class="nobullet"><strong>Special bookings</strong></label>
                    </div>
                    <div class="coldatos col1">
                        <div>
                            <label for=""><strong>Nombre /</strong> First Name</label>
                            <input type="text" id="first_name" name="first_name" value="<?= $rowModel['first_name'] ?>"/>
                        </div>
						<div>
							<label for=""><strong>Apellido /</strong> Last Name</label>
                            <input type="text" id="last_name_2" name="last_name_2" value="<?= $rowModel['last_name'] ?>" />
                        </div>
                        <div>
                            <span class="gender">Gender</span>
                            <input type="radio" id="female" name="sex" value="female" <?= ($rowModel['gender']=='female')?'checked="ckecked"':'' ?> />
                            <label for="" class="nobullet"><strong>Female</strong></label>
                            <input type="radio" id="male" name="sex" value="male"  <?= ($rowModel['gender']=='male')?'checked="ckecked"':'' ?>  />
                            <label for="" class="nobullet"><strong>Male</strong></label>
                        </div>
                        <div>
                            <label for=""><strong>Altura /</strong> Height</label>
                            <input type="text" id="height" name="height" value="<?=$rowModel['height'] ?>"  />
                        </div>
						<div>
                            <label for=""><strong>Cuello /</strong> Collar</label>
                            <input type="text" id="collar" name="collar" value="<?= $rowModel['gender']=='male'?$rowModel['collar']:'' ?>" <?= ($rowModel['gender']=='male')?'':'disabled="disabled"' ?>/>
                        </div>
                        <div>
                            <label for=""><strong>Pecho /</strong> Chest</label>
                            <input type="text" id="chest" name="chest" value="<?= $rowModel['gender']=='male'?$rowModel['chest']:'' ?>" <?= ($rowModel['gender']=='male')?'':'disabled="disabled"' ?>/>
                        </div> 
                        <div>
                            <label for=""><strong>Pecho /</strong> Bust</label>
                            <input type="text" id="bust" name="bust" value="<?= $rowModel['gender']=='female'?$rowModel['bust']:'' ?>" <?= ($rowModel['gender']=='female')?'':'disabled="disabled"' ?>/>
                        </div>
                        <div>
                            <label for=""><strong>Cintura /</strong> Waist</label>
                            <input type="text" id="waist" name="waist" value="<?= $rowModel['waist'] ?>" />
                        </div>
                        <div>
                            <label for=""><strong>Cadera /</strong> Hips</label>
                            <input type="text" id="hips" name="hips" value="<?= $rowModel['hips'] ?>" />
                        </div>
						<div>
                            <label for=""><strong>Talla pie /</strong> Shoe size</label>
                            <input type="text" id="shoe_size" name="shoe_size" value="<?= $rowModel['shoe_size'] ?>" />
                        </div>
                        <div>
                            <label for=""><strong>Pelo /</strong> Hair Color</label>
                            <input type="text" id="hair_color" name="hair_color" value="<?= $rowModel['hair_color'] ?>" />
                        </div>
                        <div>
                            <label for=""><strong>Ojos /</strong> Eyes Color</label>
                            <input type="text" id="eyes_color" name="eyes_color" value="<?=  $rowModel['eyes_color'] ?>"/>
                        </div>
                        <div>
                            <label for=""><strong>Foto book</strong></label>
                            <input name="foto_book" type="file"/>
                        </div>
                        <div>
                            <label for=""><strong>Composite</strong></label>
                            <input name="composite" type="file" />
                        </div>
                    </div>
					<?		
							}	
						}
					?>
					 <div class="coldatos col2">
						<?
							$resultPpal = mysql_query("SELECT url_photo FROM models_ppal WHERE model_id='" . $_REQUEST['model_id'] . "' AND active = 1");
								$num_cols1 = mysql_affected_rows();
								if ($num_cols1>0){
									$cont=1;
									for($j=0;$j<$num_cols1;$j++){
										$rowPpal = mysql_fetch_assoc($resultPpal);
						?>
                    	<p style="color: #999999; font-size: 11px;">
                        Mostrar modelo:<br /><input name="estadomodelo" type="radio" value="activar" <?= ($rowModel['active']==1)?'checked="ckecked"':'' ?> />Activar  ó <input name="estadomodelo" type="radio" value="desactivar" <?= ($rowModel['active']==0)?'checked="ckecked"':'' ?> />Desactivar</p>
                    	<img src="<?= PPAL_URL . $rowPpal['url_photo'] ?>" class="alignCenter" />
						<?
								}
							}
						?>
					</div>
                </div>     
                <div class="agree">
					<input type="hidden" name="model_id" id="model_id" value='<?= $_REQUEST['model_id'] ?>' />
                    <input type="hidden" name="request_type" id="request_type" value='setModel' />
                    <button type="submit" class="submitButton" value="SUBMIT">Enviar</button>
                </div>
            </fieldset>    
		</form>
	</div>
</div>


</body>
</html>