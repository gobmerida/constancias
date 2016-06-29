<?php
	include("connect/conexion.php");
	$sql="SELECT * FROM verificar_empleados WHERE verificar='".$_POST["verificar"]."'";
	$rs= mysql_query($sql) or die(mysql_error());
	$num= mysql_num_rows($rs);
	if ($num !== 1) echo "<script>alert('Codigo Invalido');window.location='index2.php';</script>";
	$row= mysql_fetch_array($rs);
	$sql1="SELECT * FROM c_actividades WHERE id_actividad='".$row["actividad"]."'";
	$rs1= mysql_query($sql1) or die(mysql_error());
	$row1= mysql_fetch_array($rs1);

	$sql2="SELECT tipo FROM usuarios_new WHERE cedula='".$row["cedula"]."'";
	$rs2= mysql_query($sql2) or die(mysql_error());
	$row2= mysql_fetch_array($rs2);

	

	echo 'Detalles del Código de Verificación: '.$row["verificar"].''. '<br>';
	echo 'Fecha de generacion de constancia: '.$row["fecha_constancia"].'';

	if ($row2["tipo"] == 'empleado' || $row2["tipo"] == 'obrero'){
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
							  	<td>Fecha de Ingreso:</td> 	
							  	<td>'.$row["fechaing"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Dependencia:</td> 	
							  	<td>'.$row1["actividad"].'</td>
						  	</tr>
						  	<tr>
							  	<td>Sueldo:</td> 	
							  	<td>'.$row["sueldo"].'</td>
						  	</tr>
		
						  </tbody>
						</table>
					</div>
					<a class="btn btn-info" href="index2.php">Salir</a>
			</div>';
		if ($row["cesta"]== 1) {

		echo "<br>Adicional percibe un monto mensual de <b>TRECE MIL DOSCIENTOS SETENTA Y CINCO BOLIVARES CON CERO CÉNTIMOS (Bs. 13.275.00),</b> por concepto de Bono
			de Alimentación, de conformidad con lo establecido en el Artículo 5 de la Ley de Alimentación Para los Trabajadores, el cual es acreditado mediante
			tarjeta electrónica o ticket alimentación.";
		}
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
							  	<td>Sueldo:</td> 	
							  	<td>'.$row["sueldo"].'</td>
						  	</tr>
		
						  </tbody>
						</table>
					</div>
					<a class="btn btn-info" href="index2.php">Salir</a>
			</div>';
	}
?>