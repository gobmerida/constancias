<?php
	include("../connect/conexion.php");
	$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
	$rs_user=mysql_query($sql_user)or die(mysql_error());
	$num=mysql_num_rows($rs_user);
	if ($num == 1) {
		echo "ci1";
	}

	$sql_datos="SELECT e_cedula, cuenta FROM tac_empleados WHERE e_cedula='".$_POST["cedula"]."'";
	$rs_datos=mysql_query($sql_datos)or die(mysql_error());
	$num_datos=mysql_num_rows($rs_datos);
	$num_datos;
	if ($num_datos != 1) {
		echo "ci2";
	}
		
?>