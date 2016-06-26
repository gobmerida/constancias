<?php
	session_start();
	if (!isset($_SESSION['cedula']) || $_SESSION['tipo'] !="general" ){ 
	header("location: ../index2.php");
	}
?>
