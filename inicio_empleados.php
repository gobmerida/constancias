<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema de Constancias y Recibos de Pagos Empleados</title>
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
			        <li class="active"><a href="inicio_empleados.php">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="#" class="empleados">Generar Constancia</a></li>
			        <li><a href="#" class="obreros">Ultima constancia generada</a></li>
			        <li><a href="#" class="jubilados">Recibos de Pago</a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
			<img src="img/header3.png" class="img-responsive" alt="">
			</div>
		
	</header>

	<div class="container">
			<div id="main" class="table-responsive">
				<h4 style="display: inline-block">Bienvenido(a): Nombre </h4> <a href="session/cerrar_sesion.php">Cerrar Sesión</a>
				<table class="table table-striped table-condensed">
				  <thead>
				  		<th>Cédula</th>
				  		
				  		<th>Cargo</th>
				  		<th>Dependencia</th>
				  		<th>Correo</th>
				  		<th>Tipo</th>
				  		<th>Fecha de Registro</th>

				  </thead>
				  <tbody>
				  	<tr>
					  	<td>cedula</td>
					  	
					  	<td>car</td>
					  	<td>depe</td>
					  	<td>corr</td>
					  	<td>Empleado</td>
					  	<td>fecha</td>
				  	</tr>
				  </tbody>
				</table>
			</div>
	</div>
		<center>
		</center>
		<center>
			<a class='btn btn-info' href="constancia1.php">Cambiar Clave</a> <br><br>
		</center>
		<div class="container-fluid">
			<div class="col-md-6">
				<center>

					<div class="container-fluid">
						<div class="panel panel-default">
							  		<div class="panel-heading">Constancias</div>
							  			<div class="panel-body">
							  			<a class='btn btn-success' href="">Ultima constancia Generada</a> Fecha:<br><br>
							    			<a class='btn btn-primary' href="constancia1.php">Generar Constancia de Trabajo</a>
							    			
							  			</div>
						</div>
					</div>
								</div>
				</center>
			<div class="col-md-6">
				<div class="panel panel-default">
					  		<div class="panel-heading">Recibos de Pago</div>
					  			<div class="panel-body">
					    			Panel content
					  			</div>
				</div>
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

			$(".empleados").click(function(){
				$("#main").load("login_empleados.php");
			});
			$(".obreros").click(function(){
				$("#main").load("login_obreros.php");
			});
			$(".jubilados").click(function(){
				$("#main").load("login_jubilados.php");
			});
			
		});
			
	</script>
</body>
</html>