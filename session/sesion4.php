<?php
	session_start();
	if (!isset($_SESSION['cedula']) || $_SESSION['tipo'] !="jp"){ 
	header("location: ./index.php");
	}
?>