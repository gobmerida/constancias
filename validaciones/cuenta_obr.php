<?php
	include("../connect/conexion.php");
	$sql_datos="SELECT cuenta FROM tac_obreros WHERE cuenta='".$_POST["cuenta"]."' AND obr_cedula='".$_POST["cedula"]."'";
	$rs_datos=mysql_query($sql_datos)or die(mysql_error());
	$num_datos=mysql_num_rows($rs_datos);
	echo $num_datos;
?>