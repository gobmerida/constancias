<!--Autor 
Edgar Carrizalez
C.I. V-19.352.988
Correo: edg.sistemas@gmail.com
-->

<?php
	include("../connect/conexion.php");
	$pass=$_POST['pass'];
	$pass=md5($pass);
	mysql_select_db("constancias",$con);
	
	$sql=mysql_query("SELECT *
					  FROM usuario
					  WHERE clave='$pass'", $con) or die (mysql_error());

	$row = mysql_fetch_array($sql);
	
		
	if($pass==$row['clave']){
			ini_set("session.cookie_lifetime","7200");
			ini_set("session.gc_maxlifetime","7200");
			session_start();
			$_SESSION['user_cons']=$row['nom_ape'];
			$_SESSION['pass']=$pass;
			$_SESSION['tipo']=$row['tipo'];
			//~ header("location: ../index.php?msg=1");
			header("location: ../");
		}
	
	if($pass!=$row['clave']){
		header("location: ../index.php?error=1");
	}

?>

