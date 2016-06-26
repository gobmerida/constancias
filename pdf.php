<?php
require_once 'Classes/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
$cedula_empleado=10;
// instantiate and use the dompdf class
$html= "div id='constancia'>
		<br>
		<img src='./media/logo_emp.png' width='450px' height='80px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src='./media/consumo.png' width='50px'><br><br>
		<center class='mas'><b>CONSTANCIA</b></center>
		<br><p align='center'>
		<b>EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS
		HUMANOS DE LA GOBERNACION DEL ESTADO BOLIVARIANO DE MÉRIDA</b></p>
		<br><br>
		<center class='mas'><b>HACE CONSTAR</b></center>
		<br>
		<p class='cons'>
		Por medio de la presente que el (la) ciudadano (a) <b>sds</b> títular de la cédula de identidad Nº <b>V. $cedula_empleado,</b> presta";
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>