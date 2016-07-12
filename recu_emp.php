<?php
	include("connect/conexion.php");
	require 'Classes/PHPMailer/PHPMailerAutoload.php';
	/*function hora()
	{
		date_default_timezone_set("America/Caracas");
		$hora=date("h:i:s a" );
		return ($hora);

	}*/

		if (isset($_POST["cedula"])){
			if ($_SESSION["tipo"]=="empleado") {

				$sql_user="SELECT cedula, clave, correo FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
				$rs_user=mysql_query($sql_user)or die(mysql_error());
				$num_user=mysql_num_rows($rs_user);
				if ($num_user !== 1) echo "<script>alert('Cédula Invalida');window.location='index.php';</script>";
				$row_user=mysql_fetch_array($rs_user);


				$sql_datos="SELECT e_cedula, cuenta FROM tac_empleados WHERE e_cedula='".$_POST["cedula"]."'";
				$rs_datos=mysql_query($sql_datos)or die(mysql_error());
				$num_datos=mysql_num_rows($rs_datos);
				if ($num_datos !== 1) echo "<script>alert('Cédula Invalida');window.location='index.php';</script>";
				$row_datos= mysql_fetch_array($rs_datos);
				if ($row_datos["cuenta"] == $_POST["cuenta"] AND $row_user["correo"] == $_POST["correo"]) {
					include("correo_r.php");
			
				}

				else echo "<script>alert('datos de cuenta nomina o correo no validos');window.location='index2.php';</script>";
			}

			else if ($_SESSION["tipo"]=="obrero") {

				$sql_user="SELECT cedula, clave, correo FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
				$rs_user=mysql_query($sql_user)or die(mysql_error());
				$num_user=mysql_num_rows($rs_user);
				if ($num_user !== 1) echo "<script>alert('Cédula Invalida');window.location='index2.php';</script>";
				$row_user=mysql_fetch_array($rs_user);


				$sql_datos="SELECT obr_cedula, cuenta FROM tac_obreros WHERE e_cedula='".$_POST["cedula"]."'";
				$rs_datos=mysql_query($sql_datos)or die(mysql_error());
				$num_datos=mysql_num_rows($rs_datos);
				if ($num_datos !== 1) echo "<script>alert('Cédula Invalida');window.location='index.php';</script>";
				$row_datos= mysql_fetch_array($rs_datos);
				if ($row_datos["cuenta"] == $_POST["cuenta"] AND $row_user["correo"] == $_POST["correo"]) {
					include("correo_r.php");
			
				}

				else echo "<script>alert('datos de cuenta nomina o correo o correo no validos');window.location='index2.php';</script>";
			}

			else {
				$sql_user="SELECT cedula, clave, correo FROM usuarios_new WHERE cedula='".$_POST["cedula"]."'";
				$rs_user=mysql_query($sql_user)or die(mysql_error());
				$num_user=mysql_num_rows($rs_user);
				if ($num_user !== 1) echo "<script>alert('Cédula Invalida');window.location='index.php';</script>";
				$row_user=mysql_fetch_array($rs_user);


				$sql_datos="SELECT jp_cedula, cuenta FROM c_jp WHERE e_cedula='".$_POST["cedula"]."'";
				$rs_datos=mysql_query($sql_datos)or die(mysql_error());
				$num_datos=mysql_num_rows($rs_datos);
				if ($num_datos !== 1) echo "<script>alert('Cédula Invalida');window.location='index.php';</script>";
				$row_datos= mysql_fetch_array($rs_datos);
				if ($row_datos["cuenta"] == $_POST["cuenta"] AND $row_user["correo"] == $_POST["correo"]) {
					include("correo_r.php");
			
				}

				else echo "<script>alert('datos de cuenta nomina o correo o correo no validos');window.location='index.php';</script>";

			}
		


	}

?>