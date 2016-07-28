<?php
	include("session/sesion4.php");
	include("./script_php/fecha.php");
	include("./script_php/conver.php");
	include("./script_php/script_fecha.php");
	include("./script_php/a_fe.php");
	include("./script_php/condicion.php");
	include("./connect/conexion.php");
	include("codigo_verificacion.php");
	require_once 'Classes/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;

	$sql="SELECT * FROM verificar_empleados WHERE cedula='".$_SESSION["cedula"]."' ORDER BY id DESC LIMIT 1";
	$rs= mysql_query($sql) or die(mysql_error());
	$row= mysql_fetch_array($rs);

		$dia_hoy = date("d");
		$dia_hoy_lt = numtoletras($dia_hoy);
		
		$mes_hoy = date("m");
		$mes_hoy_lt = mes($mes_hoy);
		
		$y=date("Y");

	$sueldo_integral=$row['sueldo'];
		list($suel,$deci) = explode(".",$sueldo_integral);
		$sueldo_integral_let=numtoletras($sueldo_integral);
		$sueldo_integral_let_dec=numtoletras($deci);
		$sueldo_integral=number_format($sueldo_integral,2,",", ".");
		$cedula_emple = number_format($row['cedula'], 2, ",", ".");
		list($cedula_empleado,$deci) = explode(",",$cedula_emple);

				$html="<style>
					body{
					font-size:15px;
					font-family:'Times New Roman', Georgia, Serif;
					}
					#constancia{
					margin:0 auto;
					width:640px;
					}
					p.cons{
					text-align:justify;
					}
					.peque{
					font-size:10px;
					}
					.peq{
					font-size:11px;
					}
					.mas{
					font-size:20px;
					}
					@media print {
					#panel{display:none;}
					}
					#panel{
					position:fixed;
					margin:200px 0 0 0;
					border:solid 1px red;
					border-radius:8px;
					box-shadow: 5px 10px 15px maroon;
					/*
					background-color:Silver;
					*/
					}
					.sello {
						position: absolute;

						z-index: -1;
						height:230px;

					}
					.director {
						

					}
					#tabla {
						color: #FFF;
				
					}
				</style>

		<div id='constancia'>
		<br>
		<img src='./media/logo_emp.png' width='450px' height='80px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src='./media/consumo.png' width='50px'><br><br><br>
		<center class='mas'><b>CONSTANCIA</b></center>
		<br><p align='center'>
		<b>EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS
		HUMANOS DE LA GOBERNACION DEL ESTADO BOLIVARIANO DE MÉRIDA</b></p>
		<br>
		<center class='mas'><b>HACE CONSTAR</b></center>
		<br>
		<p class='cons'>
		Por medio de la presente que el (la) ciudadano (a) <b>$row[nomap],</b> títular de la cédula de identidad Nº <b>V. $cedula_empleado,</b> pertenece a la 
		nómina <b>$row[cargo]</b> de la Gobernación del Estado Mérida, bajo el código: <b>$row[codigo]</b> devengando una
		 asignación mensual de: <b>$sueldo_integral_let BOLIVARES CON $sueldo_integral_let_dec CÉNTIMOS (Bs. $sueldo_integral).</b>
		</p>
		<br>
		<p class='cons'>Constancia que se expide a solicitud de parte interesada para <b>FINES PERSONALES,</b> en la ciudad de Mérida a los <b>$dia_hoy_lt ($dia_hoy)</b>
		días del mes de <b>$mes_hoy_lt</b> de <b>$y.</b></p>
		<p><img src='img/sello1.png' alt='sello'/ class='sello'></p>
		<br><br><br><br><br><br><br><br><br><br>
	<p align='center' class='director'><b><br>LCDO. MIGUEL ANGEL RINCON FIGUEROA<br>DIRECTOR ESTADAL DEL PODER POPULAR<br>DE RECURSOS HUMANOS DE LA GOBERNACIÓN DEL ESTADO MÉRIDA<br>
			Designado según decreto Nº 400-1 de fecha 11/10/2013<br>Gaceta Extraordinaria de la misma fecha</b></p>
			<p><span class='peq'>Esta constancia ha sido impresa electrónicamente, los datos reflejados están sujetos a confirmación a través de: http://rrhh.merida.gob.ve, en el módulo de Verificación de Constancias, introduciendo el siguiente código de verificación: <b>$row[verificar]</b></span>
			<p><span class='peq'>JUB/&nbsp;&nbsp;&nbsp;/</span>
			<center><i><b>\"Independencia, Patria Socialista... Viviremos y Venceremos\"</b></i></center>
			<center><span class='peque'>Calle 23 entre Av, 3 y 4 frente a la Plaza Bolívar, Palacio de Gobierno, Planta Baja, Dirección de Recursos Humanos de la Gobernación del
			Estado Mérida Teléfono: 0274-2528596/2524770/2512054 fax. 2528709 / Rif. G20000156-9</span></center>
			</p>
		</div>";


				
				// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('letter');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream('ultima_constancia_jubilados_o_pensionados');

?>
