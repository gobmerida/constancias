<?php
	session_start();
	if (!isset($_SESSION['cedula']) || $_SESSION['tipo'] !="empleado"){ 
	header("location: ./index.php");
	}
?>
