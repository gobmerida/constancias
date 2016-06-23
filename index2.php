<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistemas de Constancias y Recibos de Pagos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
		      	<a class="navbar-brand" href="#">RRHH</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav">
			        <li class="active inicio"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="#" class="empleados">Empleados</a></li>
			        <li><a href="#" class="obreros">Obreros</a></li>
			        <li><a href="#" class="jubilados">Jubilados</a></li>
			        <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Verificar Constancia<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				           	<li><a href="#">Empleados</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="#">Obreros</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="#">Jubilados o Pensionados</a></li>
				        </ul>
			        </li>
			        <li><a href="#">Ayuda</a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
			<img src="img/header3.png" class="img-responsive" alt="">
			</div>
		
	</header>
	<div class="container">
			<div class="" id="main">
				
			</div>
	</div>
	<br>
	<br>
	<footer class="boot">
		<br>
		<br>
		<div class="container ">
			<b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
		</div>
		<br>
	</footer>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magicslideshow.js"></script>
	<script>
		$(function(){
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
			$(".funciones").click(function(){
				$("#main").load("funciones.html");
			});
			$(".myv").click(function(){
				$("#main").load("myv.html");
			});
			$(".objetivos").click(function(){
				$("#main").load("objetivos.html");
			});
		});
			
	</script>
</body>
</html>