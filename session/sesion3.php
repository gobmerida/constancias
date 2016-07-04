<?php
	session_start();
	if (!isset($_SESSION['cedula']) || $_SESSION['tipo'] !="obrero"){ 
	header("location: ./index.php");
	}
?>