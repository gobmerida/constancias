<?php
	include("../connect/conexion.php");
	$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
	$rs_user=mysql_query($sql_user)or die(mysql_error());
	$num=mysql_num_rows($rs_user);
	echo $num;
		
?>