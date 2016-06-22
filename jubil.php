<?php
include("./connect/conexion.php");

$search = $_POST['cedula_jub'];
$query_services = mysql_query("SELECT * FROM c_jp WHERE jp_cedula like '" . $search . "%' ORDER BY jp_cedula DESC", $con);
$ijp=0;
while($row_services=mysql_fetch_array($query_services)){
	$cedula=$row_services['jp_cedula'];
	$cod = $row_services['jp_cod'];
	$persona="V.- ".$row_services['jp_cedula']." ".$row_services['jp_nomap']." - (".$row_services['jp_cod'].")";
	echo "<div class='suggest-element'><a href='constancia.php?cedula_jub=$cedula&&jp_cod=$cod'>$persona</a></div>";
	$ijp=$ijp+1;
}
if($ijp=='0'){
	echo "<center>No hay (Jubilado/Pensionado) con esta cédula</center>";
}
echo "<br>";



	require 'Classes/PHPMailer/PHPMailerAutoload.php';
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
$mail->Username = "ale.ran92@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "al1022_36";
//Set who the message is to be sent from
$mail->setFrom('ale.ran92@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('ale.ran92@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('ale_ran5@outlook.com', 'John Doe');
//Set the subject line
$mail->Subject = 'prueba';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'probandosss';
//Attach an image file
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
