<?php 
include("session/sesion4.php");
include("connect/conexion.php");
include("script_php/a_fe.php");
include("script_php/meses.php");
$q=date('m');
extract($_POST);
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
					    			<form action="" method="post">
					  				<label for="">Mes</label>
					    			<select name="q" id="" onchange = "this.form.submit()">
					    				<option value="0">-- Seleccionar --</option>
					    				<option value="01">Enero</option>
					    				<option value="02">Febrero</option>
					    				<option value="03">Marzo</option>
					    				<option value="04">Abril</option>
					    				<option value="05">Mayo</option>
					    				<option value="06">Junio</option>
					    				<option value="07">Julio</option>
					    				<option value="08">Agosto</option>
					    				<option value="09">Septiembre</option>
					    				<option value="10">Octubre</option>
					    				<option value="11">Noviembre</option>
					    				<option value="12">Diciembre</option>
					    			</select>
					  			</form>

					  			<h3><?php mes($q); ?></h3>
					  			<?php 
					  				$cod=explode('-', $row['jp_cod']);
					  				if ($q>date('m')) {
					  					echo '<p class="bg-danger">Aun no se han generado ricibos</p>';
					  				}else{
					  					if (isset($q)) { ?>
					  				 	<form action="recibos/index.php" method="post">
					  						<table class="table table-striped">
						  				 	<tr>
						  				 		<td>Recibo de pago</td>
						  				 		<td>
						  				 			<input type="hidden" value="<?php echo $row["jp_cedula"] ?>" name="ci">
						  				 			<input type="hidden" value="<?php echo $q; ?>" name="mes">
						  				 			<input type="hidden" value="<?php echo $cod[0]; ?>" name="cod">
						  				 			<button type="submit" class='btn btn-primary' id="boton"><span class="glyphicon glyphicon-save"></span> Descargar</button>
						  				 		</td>
						  				 	</tr>
					  				 	</table>
					  					</form>
					  				<?php } ?>
					  					
					  				<?php } ?>
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