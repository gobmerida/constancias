<?php
	include("connect/conexion.php");
	require 'Classes/PHPMailer/PHPMailerAutoload.php';
	/*function hora()
	{
		date_default_timezone_set("America/Caracas");
		$hora=date("h:i:s a" );
		return ($hora);
	}*/
	function fecha()
	{
		date_default_timezone_set("America/Caracas");
		$fecha=date("Y-m-d");
		return($fecha);
	}
	if (isset($_POST["cedula"])){
		$sql_user="SELECT cedula FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
		$rs_user=mysql_query($sql_user)or die(mysql_error());
		$num_user=mysql_num_rows($rs_user);
		if ($num_user === 1) echo "<script>alert('Cédula ya registrada en el sistema');window.location='index2.php';</script>";

		$sql_datos="SELECT obr_cedula, cuenta FROM tac_obreros WHERE obr_cedula='".$_POST["cedula"]."'";
		$rs_datos=mysql_query($sql_datos)or die(mysql_error());
		$num_datos=mysql_num_rows($rs_datos);
		if ($num_datos !== 1) echo "<script>alert('Cedula no se encuentra en la base de datos de empleados');window.location='index2.php';</script>";
		$row_datos= mysql_fetch_array($rs_datos);
		if ($row_datos["cuenta"] === $_POST["cuenta"]) {
			$sql="INSERT INTO usuarios_new VALUES(NULL, '".$_POST["cedula"]."', '".md5($_POST["clave"])."', '".$_POST["correo"]."', 'obrero','".fecha()."')";
			$rs=mysql_query($sql) or die (mysql_error());
			include("enviar_correo.php");
	
		}

		else echo "<script>alert('datos de cuenta no validos');window.location='index.php';</script>";


	}

?>