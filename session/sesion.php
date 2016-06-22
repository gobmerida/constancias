<!--Autor 
Edgar Carrizalez
C.I. V-19.3522.988
Correo: edg.sistemas@gmail.com
-->

<?php
	session_start();
	if (!isset($_SESSION['user_cons'])){ 
	header("location: ../index.php");
	}
?>
