<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistemas de Constancias y Recibos de Pagos</title>
	<link rel="shortcut icon" href="img/icono.png" type="image/ico" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<header>
		
			<div class="jumbotron">
			<img src="img/header4.jpg" class="img-responsive" alt="">
			</div>
		
	</header>
	<div class="container">
			<div class="" id="main">
				
			</div>
	</div>
	<br>
	<br>
	<footer class="boot">
		<br class="hidden-xs">
		
		<div class="container-fluid">
			<center>
				<b>© 2016 D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
				<br>
				
			</center>
			<br class="hidden-xs">
		</div >
		
	</footer>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magicslideshow.js"></script>
	<script>
		$(function(){
			$("#main").load("inicio.php");
			
			$(".inicio").click(function(){
				$("#main").load("inicio.php");
			});

			$(".empleados").click(function(){
				$("#main").load("login_empleados.php");
			});
			$(".obreros").click(function(){
				$("#main").load("login_obreros.php");
			});
			$(".jubilados").click(function(){
				$("#main").load("login_jubilados.php");
			});
			$(".verificar").click(function(){
				$("#main").load("verificar.php");
			});
			
		});
			
	</script>
</body>
</html>