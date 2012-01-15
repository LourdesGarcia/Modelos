<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isabel Navarro. Model management</title>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />
<link href="css/print.css" rel="stylesheet" media="all" type="text/css" />
</head>

<body>

<div id="header">
	<h1>
    	<img src="img/logo_isabel_navarro.jpg" alt="ISABEL NAVARRO. Model management." />
	</h1>
    <a href="javascript:window.print()" id="print"><img src="img/click-here-to-print.jpg" alt="print this page" id="print-button" /></a>
</div>

<div id="container">
	<div id="book">
    	<h2><?=  isset($_REQUEST['first_name'])?strtoupper($_REQUEST['first_name']):'' ?> <strong><?=   isset($_REQUEST['last_name'])?strtoupper($_REQUEST['last_name']):''?></strong></h2>
        <dl>
            <dt>Height:</dt>
            <dd><?= isset($_REQUEST['height'])?$_REQUEST['height']:'' ?></dd>
			<?
			if (isset($_REQUEST['gender']) && ($_REQUEST['gender'])!=''){
				if (($_REQUEST['gender']=='female')&&(isset($_REQUEST['bust']))&&($_REQUEST['bust']!='')&&(isset($_REQUEST['waist']))&&($_REQUEST['waist']!='')&&(isset($_REQUEST['hips']))&&($_REQUEST['hips']!='')){
			?>
			<dt>Bust:</dt>
            <dd><?= $_REQUEST['bust'] ?></dd>
            <dt>Waist:</dt>
            <dd><?= $_REQUEST['waist'] ?></dd>
            <dt>Hips:</dt>
            <dd><?= $_REQUEST['hips'] ?></dd>
			<?
				}
				if (($_REQUEST['gender']=='male')&&(isset($_REQUEST['collar']))&&($_REQUEST['collar']!='')&&(isset($_REQUEST['waist']))&&($_REQUEST['waist']!='')&&(isset($_REQUEST['chest']))&&($_REQUEST['chest']!='')){
			?>
			<dt>Collar:</dt>
            <dd><?= $_REQUEST['collar'] ?></dd>
            <dt>Chest:</dt>
            <dd><?= $_REQUEST['chest'] ?></dd>
            <dt>Waist:</dt>
            <dd><?= $_REQUEST['waist'] ?></dd>
			<?
				}
			}
			?>
            <dt>Eye color:</dt>
            <dd><?=  isset($_REQUEST['eyes_color'])?$_REQUEST['eyes_color']:''  ?></dd>
            <dt>Hair color:</dt>
            <dd><?=  isset($_REQUEST['hair_color'])?$_REQUEST['hair_color']:''  ?></dd>
        </dl>
    </div>
    <div id="galeria">
    	<img src="<?=  isset($_REQUEST['url_photo'])?$_REQUEST['url_photo']:''  ?>" />
    </div>
</div>

<div id="footer">
	<p>&copy;2011 Isabel Navarro Model Management</p>
	<p>Príncipe de Vergara 90, 1°D - Madrid - 28006 (Spain)</p>

    <p>T.  +34 915 633 042<br />
        M. +34 651 422 161<br />
        Fax +34 915 630 339<br />
        Fashion: models@isabelnavarro.net<br />
        Commercial: casting@isabelnavarro.net<br />
        Scouting: isabel@isabelnavarro.net</p>
</div>




<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script>
    $("#print").click(function () {
      $("#print").remove();
    });
</script>
</body>
</html>
<?  exit();?>