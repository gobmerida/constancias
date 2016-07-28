<?php
	$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
	$rs_user=mysql_query($sql_user)or die(mysql_error());
	$num_user=mysql_num_rows($rs_user);
	if ($num_user === 1) echo "<script>alert('Cédula ya registrada en el sistema');window.location='index2.php';</script>";
		
		
?>