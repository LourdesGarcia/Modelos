<?
	//error_reporting(E_ALL);
	include('config_database.php');	
	define('URL_SERVER','//rociolourdes.hostoi.com/');
	define('IMAGES_URL',URL_SERVER . 'img/');
	define('PPAL_URL',URL_SERVER . 'ppal/');
	define('COMPOSITE_URL',URL_SERVER . 'composite/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management: Gestor de contenidos</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script> 
</head>
<body id="administrador">
<script type="text/javascript" >
jQuery(document).ready(function() {
	jQuery("input[name='sex']").live('click', function(e){
			var otroOp = jQuery("input[name='sex']:checked").attr('id');
			if (otroOp=="male"){
				jQuery('#bust').val('');
				jQuery('#waist1').val('');
				jQuery('#hips').val('');
				jQuery('#bust').attr('disabled','disabled');
				jQuery('#hips').attr('disabled','disabled');
				jQuery('#waist1').attr('disabled','disabled');
				jQuery("#collar").removeAttr('disabled');
				jQuery("#chest").removeAttr('disabled');
				jQuery("#waist2").removeAttr('disabled');
			}else{
				if (otroOp=="female"){
					jQuery('#collar').val('');
					jQuery('#chest').val('');
					jQuery('#waist2').val('');
					jQuery("#bust").removeAttr('disabled');
					jQuery("#hips").removeAttr('disabled');
					jQuery("#waist1").removeAttr('disabled');
					jQuery("#collar").attr('disabled','disabled');
					jQuery("#chest").attr('disabled','disabled');
					jQuery("#waist2").attr('disabled','disabled');
				}else{
					//alert('otro');
				}
			}
	});
	
});
</script>
<div id="cabecera">
    	<a href="index.php"><img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." class="floatLeft" /><span class="hide2">ISABEL NAVARRO. Model management.</span></a>
        <h1 class="floatRight">ISABEL NAVARRO. Model management.</h1>
</div>

<div id="secciones">
	<ul>
    	<li><a href="intro.php">Gestión página inicio</a></li>
    	<li class="active"><a href="addmodel.php">Añadir nuevo modelo</a></li>
    	<li><a href="setmodel.php">Modificar modelos</a></li>
		<li><a href="photos.php">Gestionar galerías de fotos</a></li>
        <li><a href="videos.php">Gestionar vídeos</a></li>
    </ul>
</div>

<div id="panelCentral">
	<h2>Añadir nuevo modelo</h2>
	<p>Complete todos los datos solicitados a continuación para dar de alta a un/a nuevo/a modelo.</p>
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
                        <input type="radio" id="women" name="category" value="women" <?= (isset($_REQUEST['category'])&&($_REQUEST['category']!='')&&($_REQUEST['category']=='women'))?'checked="ckecked"':'' ?>/>
                        <label for="" class="nobullet"><strong>Women</strong></label>
                        <input type="radio" id="men" name="category" value="men"<?= (isset($_REQUEST['category'])&&($_REQUEST['category']!='')&&($_REQUEST['category']=='men'))?'checked="ckecked"':'' ?> />
                        <label for="" class="nobullet"><strong>Men</strong></label>
                        <input type="radio" id="special" name="category" value="special_booking" <?= (isset($_REQUEST['category'])&&($_REQUEST['category']!='')&&($_REQUEST['category']=='special_booking'))?'checked="ckecked"':'' ?>/>
                        <label for="" class="nobullet"><strong>Special bookings</strong></label>
                    </div>
                    <div class="coldatos col1">
                        <div>
                            <label for=""><strong>Nombre /</strong> First Name</label>
                            <input type="text" id="first_name" name="first_name" value="<?= (isset($_REQUEST['first_name'])&&($_REQUEST['first_name']!=''))?$_REQUEST['first_name']:'' ?>"/>
                        </div>
						<div>
							<label for=""><strong>Apellido /</strong> Last Name</label>
                            <input type="text" id="last_name_2" name="last_name_2" value="<?= (isset($_REQUEST['last_name_2'])&&($_REQUEST['last_name_2']!=''))?$_REQUEST['last_name_2']:'' ?>" />
                        </div>
                        <div>
                            <span class="gender">Gender</span>
                            <input type="radio" id="female" name="sex" value="female" <?= (isset($_REQUEST['sex'])&&($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female'))?'checked="ckecked"':'' ?> />
                            <label for="" class="nobullet"><strong>Female</strong></label>
                            <input type="radio" id="male" name="sex" value="male" <?= (isset($_REQUEST['sex'])&&($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male'))?'checked="ckecked"':'' ?> />
                            <label for="" class="nobullet"><strong>Male</strong></label>
                        </div>
                        <div>
                            <label for=""><strong>Altura /</strong> Height</label>
                            <input type="text" id="height" name="height" value="<?= (isset($_REQUEST['height'])&&($_REQUEST['height']!=''))?$_REQUEST['height']:'' ?>"  />
                        </div>
                        <div>
                            <label for=""><strong>Pecho /</strong> Bust</label>
                            <input type="text" id="bust" name="bust" value="<?= (isset($_REQUEST['bust'])&&($_REQUEST['bust']!=''))?$_REQUEST['bust']:'' ?>" <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female')?'':'disabled="disabled"'):'' ?>/>
                        </div>
                        <div>
                            <label for=""><strong>Cintura /</strong> Waist</label>
                            <input type="text" id="waist1" name="waist1" value="<?= (isset($_REQUEST['waist1'])&&($_REQUEST['waist1']!=''))?$_REQUEST['waist1']:'' ?>"  <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female')?'':'disabled="disabled"'):'' ?> />
                        </div>
                        <div>
                            <label for=""><strong>Cadera /</strong> Hips</label>
                            <input type="text" id="hips" name="hips" value="<?= (isset($_REQUEST['hips'])&&($_REQUEST['hips']!=''))?$_REQUEST['hips']:'' ?>"  <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='female')?'':'disabled="disabled"'):'' ?>/>
                        </div>
						 <div>
                            <label for=""><strong>Talla pie /</strong> Shoe size</label>
                            <input type="text" id="shoe_size" name="shoe_size" value="<?= (isset($_REQUEST['shoe_size'])&&($_REQUEST['shoe_size']!=''))?$_REQUEST['shoe_size']:'' ?>" />
                        </div>
                        <div>
                            <label for=""><strong>Pelo /</strong> Hair Color</label>
                            <input type="text" id="hair_color" name="hair_color" value="<?= (isset($_REQUEST['hair_color'])&&($_REQUEST['hair_color']!=''))?$_REQUEST['hair_color']:'' ?>" />
                        </div>
                        <div>
                            <label for=""><strong>Ojos /</strong> Eyes Color</label>
                            <input type="text" id="eyes_color" name="eyes_color" value="<?= (isset($_REQUEST['eyes_color'])&&($_REQUEST['eyes_color']!=''))?$_REQUEST['eyes_color']:'' ?>"/>
                        </div>
                        <div>
                            <label for=""><strong>Cuello /</strong> Collar</label>
                            <input type="text" id="collar" name="collar" value="<?= (isset($_REQUEST['collar'])&&($_REQUEST['collar']!=''))?$_REQUEST['collar']:'' ?>"  <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male')?'':'disabled="disabled"'):'' ?>/>
                        </div>
                        <div>
                            <label for=""><strong>Pecho /</strong> Chest</label>
                            <input type="text" id="chest" name="chest" value="<?= (isset($_REQUEST['chest'])&&($_REQUEST['chest']!=''))?$_REQUEST['chest']:'' ?>"  <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male')?'':'disabled="disabled"'):''  ?>/>
                        </div>
                        <div>
                            <label for=""><strong>Cintura /</strong> Waist</label>
                            <input type="text" id="waist2" name="waist2" value="<?= (isset($_REQUEST['waist2'])&&($_REQUEST['waist2']!=''))?$_REQUEST['waist2']:'' ?>"  <?= isset($_REQUEST['sex'])?(($_REQUEST['sex']!='')&&($_REQUEST['sex']=='male')?'':'disabled="disabled"'):''  ?>/>
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
                </div>     
                <div class="agree">
                    <input type="hidden" name="request_type" id="request_type" value='addModel' />
                    <button type="submit" class="submitButton" value="SUBMIT">Enviar</button>
                </div>
            </fieldset>    
		</form>
	</div>
</div>


</body>
</html>