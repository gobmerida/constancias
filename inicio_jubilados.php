<?php 
include("session/sesion4.php");
include("connect/conexion.php");
include("script_php/a_fe.php");
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema de Constancias y Recibos de Pagos Empleados</title>
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

	<?php 
		$sql="SELECT * FROM c_jp WHERE jp_cedula='".$_SESSION["cedula"]."'";
		$rs= mysql_query($sql) or die(mysql_error());
		$row= mysql_fetch_array($rs);
		
	?>

	<div class="container">
			<div id="main" class="table-responsive">
				<h4 style="display: inline-block">Bienvenido(a): <?php echo $row["jp_nomap"]; ?></h4> <a href="session/cerrar_sesion.php">Cerrar Sesión</a>
				<table class="table table-striped table-condensed">
				  <thead>
				  		<th><center>Cédula</center></th>
				  		
				  		<th><center>Tipo</center></th>
				  		<th><center>Nomina</center></th>

				  </thead>
				  <tbody>
				  	<tr>
					  	<td><center><?php echo $row["jp_cedula"]; ?></center></td>
					  	
					  	<td><center><?php echo $row["jp_cargo"]; ?></center></td>
					  	<td><center><?php echo $row["jp_tiponom"]; ?></center></td>
				  	</tr>
				  </tbody>
				</table>
			</div>
	</div>
		<center>
		</center>
		<center>
		<a class='btn btn-info' href="cambio_clave.php"><span class="glyphicon glyphicon-lock"></span> Cambiar Clave</a> <br><br>
		</center>
		<div class="container-fluid">
			<div class="col-md-6">
				<center>
				
				<?php
					$sql3="SELECT fecha_constancia FROM verificar_empleados WHERE cedula='".$_SESSION["cedula"]."' ORDER BY id DESC LIMIT 1";
					$rs3= mysql_query($sql3) or die(mysql_error());
					$num3= mysql_num_rows($rs3);
				?>
					<div class="container-fluid">
						<div class="panel panel-default">
							  		<div class="panel-heading">Constancias</div>
							  			<div class="panel-body">
								  			<?php if ($num3 != 0) {
							  				$row3=mysql_fetch_array($rs3);
							  				$fecha_de = a_fecha($row3["fecha_constancia"]);
							  				echo '<a class="btn btn-success" href="ultima_jubilados.php"><span class="glyphicon glyphicon-save"></span> Ultima constancia Generada</a> Fecha: '.$fecha_de.'<br><br>';
							  			} ?>
								  			<form action="constancia3.php" method="POST">
								    			<button class='btn btn-primary' id="boton"><span class="glyphicon glyphicon-save"></span> Generar Constancia de Trabajo</button>
										  	</form>
							  			</div>

										
						</div>
					</div>
								</div>
				</center>
			<div class="col-md-6">
				<div class="panel panel-default">
					  		<div class="panel-heading">Recibos de Pago</div>
					  			<div class="panel-body">
					    			Próximamente
					  			</div>
				</div>
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