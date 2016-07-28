<?php
	$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
	$rs_user=mysql_query($sql_user)or die(mysql_error());
	$num_user=mysql_num_rows($rs_user);
	if ($num_user === 1) echo "<script>alert('Cédula ya registrada en el sistema');window.location='index2.php';</script>";

	$sql_datos="SELECT obr_cedula, cuenta FROM tac_obreros WHERE obr_cedula='".$_POST["cedula"]."'";
	$rs_datos=mysql_query($sql_datos)or die(mysql_error());
	$num_datos=mysql_num_rows($rs_datos);
?>