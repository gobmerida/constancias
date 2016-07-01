<?php
session_start();
include("connect/conexion.php");
	if (isset($_POST["clavea"])) {
		$sql="SELECT clave FROM usuarios_new WHERE cedula='21182164'";
		$rs=mysql_query($sql) or die(mysql_error());
		$row= mysql_fetch_array($rs);
		if ($row["clave"] == md5($_POST["clavea"])) {
			$sql2="UPDATE usuarios_new SET clave='".md5($_POST["clave"])."' WHERE cedula='".$_SESSION["cedula"]."'";
			$rs2=mysql_query($sql2);
			echo "<script>alert('Se ha cambiado la contraseña');window.location='index2.php';</script>";
		}
		else echo "<script>alert('La contraseña actual es incorrecta');window.location='index2.php';</script>";
	}
?>