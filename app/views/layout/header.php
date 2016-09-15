<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 	<title>Se Aposenta</title>
 	<meta name="theme-color" content="#4D004D">
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 	<?php // BOOTSTRAP 3.5 ?>
 	<!-- bootstrap -->
	<script type="text/javascript" src="<?php echo $_urlSite; ?>views/files/js/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo $_urlSite; ?>views/files/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo $_urlSite; ?>views/files/bootstrap/js/bootstrap.min.js"></script>

	<?php // JS PRINCIPAL ?>
	<script src="<?php echo $_urlSite; ?>views/files/js/script.js"></script>

	<?php // css Prinicipal ?>
	<link rel="stylesheet" href="<?php echo $_urlSite; ?>views/files/css/style.css">

	<?php if($view_logado == true){ ?>
	<script type="text/javascript">
		$(function () {
			$('.field_ponto').attr('disabled',false);
		});
	</script>
	<?php }else{ ?>
	<script type="text/javascript">
		$(function () {
			$('.field_ponto').attr('disabled','disabled');
		});
	</script>	
	<?php } ?>
	
</head>
<body>