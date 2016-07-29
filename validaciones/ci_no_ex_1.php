<?php
	include("../connect/conexion.php");
	$sql_datos="SELECT e_cedula, cuenta FROM tac_empleados WHERE e_cedula='".$_POST["cedula"]."'";
	$rs_datos=mysql_query($sql_datos)or die(mysql_error());
	$num_datos=mysql_num_rows($rs_datos);
	echo $num_datos;
?>