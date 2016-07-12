<?php
	
	$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=7; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada

		for($i=0;$i<$numerodeletras;$i++)
		{
	    	$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
		}
	$sql_cambio="UPDATE usuarios_new SET clave ='".md5($cadena)."' WHERE cedula='".$_POST["cedula"]."' ";
	$rs_cambio=mysql_query($sql_cambio) or die(mysql_error());
	//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
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
		$mail->setFrom('dinformarica.rrhh@gmail.com', 'Departamento de Informática de la D.E.P.P.  de Recursos Humanos del Estado Mérida');
		//Set an alternative reply-to address
		$mail->addReplyTo('dinformarica.rrhh@gmail.com', 'Departamento de Informática de la D.E.P.P.  de Recursos Humanos del Estado Mérida');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["correo"], 'usuario');
		//Set the subject line
		$mail->Subject = 'Recuperar Contraseña';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = 'se ha recuperado la contraseña con éxito su clave es: '.$cadena.' <br>Por favor no responda este correo ya que es generado automáticamente por el sistema';
		$mail->AltBody = 'probandosss';
		$mail->CharSet = 'UTF-8';
		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<script>alert('Ha ocuurido un error');</script>". ": " . $mail->ErrorInfo;
		} else {
		    echo "<script>alert('Se le ha enviado un correo con su contraseña');window.location='index2.php';</script>";
		}

?>