<!DOCTYPE html>
<html lang="es">
<head>
	<title>Crear Usuarios Empleados</title>
	<meta charset="UTF-8">
</head>
<?php
include("connect/conexion.php");
require 'Classes/PHPMailer/PHPMailerAutoload.php';
?>
<body>
	<center>
		<h3 class="n">Crear Usuarios Empleados</h3><br>
		<br>
		<form name="formulario" action="registrar_empleados.php" method="POST">
			Cedula:<br> <input type="text" name="cedula" id="" autocomplete=off required minlength="2"><br>
			Cuantro ultimos digitos de la cuenta nomina:<br> <input type="text" name="cuenta" id="" autocomplete=off required minlength="2"><br>
			Correo:<br> <input type="email" name="correo" id="correo" autocomplete=off required><br>
			Confirmar correo:<br> <input type="email" name="correo2" id="correo2" autocomplete=off required><br>
			Clave:<br> <input type="password" name="clave" id="clave" autocomplete=off required><br>
			Confirmar Clave:<br> <input type="password" name="clave2" id="clave2" autocomplete=off required><br>
			<input type="reset" value="Limpiar">
			<input type="submit" value="Registrarse">
			<div id="suggestions"></div>
		</form><br>
		<center><span style='font-weight:bold'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='../index2.php'>Inicio</a>

	<script>
		(function(){
			var correo = formulario.correo;
			var correo2 = formulario.correo2;
			var clave = formulario.clave;
			var clave2 = formulario.clave2;
			var validar= function validar(e) {
			var formulario = document.formulario;
			if (correo.value != correo2.value) {
				alert("los correos no coinciden vuelva a introducirlos");
				e.preventDefault()
			}
			if (clave.value != clave2.value) {
				alert("las contraseñas no coinciden vuelva a introducirlas");
				e.preventDefault()
			}
			largopass = formulario.usuario_user.value.length;
        	 if(largopass < 5){
                  alert("El usuario debe ser al menos de 5 caracteres.");
                  formulario.usuario_user.focus();
                  e.preventDefault()
         	}
		}

		formulario.addEventListener("submit", validar);
		})();
	</script>
</body>
</html>
<?php
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

		$sql_datos="SELECT * FROM tac_empleados WHERE e_cedula='".$_POST["cedula"]."'";
		$rs_datos=mysql_query($sql_datos)or die(mysql_error());
		$num_datos=mysql_num_rows($rs_datos);
		if ($num_datos !== 1) echo "<script>alert('Cedula no se encuentra en la base de datos de empleados');window.location='registrar_empleados.php';</script>";
		$row_datos= mysql_fetch_array($rs_datos);
		if ($row_datos["cuenta"] === $_POST["cuenta"]) {
			$sql="INSERT INTO usuarios_new VALUES(NULL, '".$_POST["cedula"]."', '".md5($_POST["clave"])."', '".$_POST["correo"]."', 'general','".fecha()."')";
			$rs=mysql_query($sql) or die (mysql_error());

		
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "dinformatica.rrhh@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "infor2014";
		//Set who the message is to be sent from
		$mail->setFrom('dinformarica.rrhh@gmail.com', 'Departamento de Informatica de la D.E.P.P.  de Recursos Humanos del Estado Mérida');
		//Set an alternative reply-to address
		$mail->addReplyTo('dinformarica.rrhh@gmail.com', 'Departamento de Informatica de la D.E.P.P.  de Recursos Humanos del Estado Mérida');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["correo"], $row["e_nomap"]);
		//Set the subject line
		$mail->Subject = 'Cuenta creada sistema de constancias';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = 'Se ha registrado exitosamente en el sistema de generacion de constancias, su contraseña es: '.$_POST["clave"]. ' Por favor no responda este correo ya q es generado automaticamente por el sistema';
		$mail->AltBody = 'probandosss';
		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}

			echo "<script>alert('Registrado exitosamente');</script>";

		}
		else echo "<script>alert('datos de cuenta no validos');window.location='registrar_empleados.php';</script>";
		
	}

?>