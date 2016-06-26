<?php
	include("../connect/conexion.php");
	$pass=$_POST['clave'];
	$pass=md5($pass);
	mysql_select_db("constancias",$con);
	
	$sql=mysql_query("SELECT *
					  FROM usuarios_new
					  WHERE cedula='".$_POST["cedula"]."'", $con) or die (mysql_error());
	$num=mysql_num_rows($sql);
	if ($num !== 1) echo "<script>alert('Cédula Incorrecta');window.location='../index2.php';</script>";

	$row = mysql_fetch_array($sql);
	
		
	if($pass==$row['clave']){
			ini_set("session.cookie_lifetime","7200");
			ini_set("session.gc_maxlifetime","7200");
			session_start();
			$_SESSION['cedula']=$row['cedula'];
			$_SESSION['pass']=$pass;
			$_SESSION['tipo']=$row['tipo'];
			header("location: ../hola.php");
		}
	else echo "<script>alert('Clave Invalida');window.location='../index2.php';</script>";	
	
	

?>

