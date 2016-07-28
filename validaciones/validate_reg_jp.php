<?php
	$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
	$rs_user=mysql_query($sql_user)or die(mysql_error());
	$num_user=mysql_num_rows($rs_user);
	
	$sql_datos="SELECT jp_cedula, cuenta FROM c_jp WHERE jp_cedula='".$_POST["cedula"]."'";
	$rs_datos=mysql_query($sql_datos)or die(mysql_error());
	$num_datos=mysql_num_rows($rs_datos);
?>