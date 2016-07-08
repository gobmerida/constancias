<!DOCTYPE html>
<style>
	.verifi {
		background: #FFF;
	}
	p {
		padding: 10px 90px;
	}
</style>
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
			<div class="jumbotron">
			<img src="img/header4.jpg" class="img-responsive" alt="">
			</div>
	</header>
<?php
	include("connect/conexion.php");
	include("script_php/condicion.php");
	include("script_php/conver.php");
	include("script_php/a_fe.php");
	$sql="SELECT * FROM verificar_empleados WHERE verificar='".$_POST["verificar"]."'";
	$rs= mysql_query($sql) or die(mysql_error());
	$num= mysql_num_rows($rs);
	if ($num !== 1) echo "<script>alert('Codigo Invalido');window.location='index.php';</script>";
	$row= mysql_fetch_array($rs);
	$sql1="SELECT * FROM c_actividades WHERE id_actividad='".$row["actividad"]."'";
	$rs1= mysql_query($sql1) or die(mysql_error());
	$row1= mysql_fetch_array($rs1);

	$sql2="SELECT tipo FROM usuarios_new WHERE cedula='".$row["cedula"]."'";
	$rs2= mysql_query($sql2) or die(mysql_error());
	$row2= mysql_fetch_array($rs2);

	$fijo_contratado=tipo_n($row['codigo']);

	$sueldo_integral=$row["sueldo"];
	list($suel,$deci) = explode(".",$sueldo_integral);
	$sueldo_integral_let=numtoletras($sueldo_integral);
	$sueldo_integral_let_dec=numtoletras($deci);
	$sueldo_integral=number_format($sueldo_integral,2,",", ".");

	$fecha_de = a_fecha($row["fechaing"]);
	$fecha_c = a_fecha($row["fecha_constancia"]);

	echo '<div class="verifi"><p>Detalles del Código de Verificación: '.$row["verificar"].''. '<br>';
	echo 'Fecha de generacion de constancia: '.$fecha_c.'.</p></div>';

	if ($row2["tipo"] == 'empleado' || $row2["tipo"] == 'obrero'){
		echo '<div class="verifi"><div class="container">
					<div id="main" class="table-responsive">
						
						<table class="table table-striped table-condensed">
						  <thead>
						  		<th colspan="2">Verificación de Datos</th>
		
						  </thead>
						  <tbody>
						  	<tr>
							  	<td>Cédula:</td> 	
							  	<td>'.$row["cedula"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Nombre:</td> 	
							  	<td>'.$row["nomap"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Cargo:</td> 	
							  	<td>'.$row["cargo"].' ('.$fijo_contratado.')</td>
						  	</tr>
						  	<tr>
							  	<td>Fecha de Ingreso:</td> 	
							  	<td>'.$fecha_de.'</td>
						  	</tr>
						  	<tr>
							  	<td>Dependencia:</td> 	
							  	<td>'.$row1["actividad"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Sueldo:</td> 	
							  	<td>'.$sueldo_integral.'</td>
						  	</tr>
		
						  </tbody>
						</table>
					</div>
				
			</div></div>';
		if ($row["cesta"]== 1) {
			
		echo "<br><div class='verifi'><p>Adicional percibe un monto mensual de <b> Bs. 13.275.00</b> por concepto de Bono
			de Alimentación, de conformidad con lo establecido en el Artículo 5 de la Ley de Alimentación Para los Trabajadores, el cual es acreditado mediante
			tarjeta electrónica o ticket alimentación.</p></div>";
		}
			echo '<br><center><a class="btn btn-info" href="index.php">Salir</a></center>';
	}
	else {
		echo '<div class="container">
					<div id="main" class="table-responsive">
						
						<table class="table table-striped table-condensed">
						  <thead>
						  		<th colspan="2">Verificación de Datos</th>
		
						  </thead>
						  <tbody>
						  	<tr>
							  	<td>Cédula:</td> 	
							  	<td>'.$row["cedula"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Nombre:</td> 	
							  	<td>'.$row["nomap"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Cargo:</td> 	
							  	<td>'.$row["cargo"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Tipo de Nomina:</td> 	
							  	<td>'.$row["actividad"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Sueldo:</td> 	
							  	<td>'.$row["sueldo"].'</td>
						  	</tr>
		
						  </tbody>
						</table>
					</div>
					<a class="btn btn-info" href="index.php">Salir</a>
			</div>';
	}
?>
</body>