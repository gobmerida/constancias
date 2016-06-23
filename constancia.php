<!--Autor 
Edgar Carrizalez
C.I. V-19.352.988
Correo: edg.sistemas@gmail.com
-->
<?php
include("./script_php/conver.php");
include("./script_php/script_fecha.php");
include("./script_php/a_fe.php");
include("./script_php/condicion.php");
include("./connect/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<title>.:Constancia:.</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<link rel="stylesheet" href="./css/cons.css" type="text/css"/>
	<link rel="stylesheet" href="css/imprimir.css" type="text/css"/ media="print">
	<style>
		.sello {
	position: absolute;

	z-index: -1;

	}
	</style>
</head>

<body>
<!--
	 <a href="javascript:history.back()">texto</a>
-->
<div id='panel'>
	<a href="./"><img src='./media/volver.png' width='50px'></a><br>
	<a href='javascript:window.print(); void 0;'><img src="./media/Printer.png" width="50px"></a><br>
</div>
	<?php
	if(array_key_exists('cedula_emp',$_GET)){
		
		$ced=$_GET['cedula_emp'];
		$emp_sql = "SELECT * FROM t_empleados WHERE e_cedula='$ced'";
		$emp_query = mysql_query($emp_sql,$con) or die (mysql_error());
		$emp_row = mysql_fetch_array($emp_query);
		
		//~ if()
		
		$dia_hoy = date("d");
		$dia_hoy_lt = numtoletras($dia_hoy);
		
		$mes_hoy = date("m");
		$mes_hoy_lt = mes($mes_hoy);
		
		$y=date("Y");
		
		if($emp_row['e_cedula']==""){
			header("location:index.php?error=2");
		}
		
		$sueldo_integral=$emp_row['e_sueldo'];
		list($suel,$deci) = explode(".",$sueldo_integral);
		$sueldo_integral_let=numtoletras($sueldo_integral);
		$sueldo_integral_let_dec=numtoletras($deci);
		$sueldo_integral=number_format($sueldo_integral,2,",", ".");
		$cedula_emple = number_format($emp_row['e_cedula'], 2, ",", ".");
		list($cedula_empleado,$deci) = explode(",",$cedula_emple);
		$fecha_de = a_fecha($emp_row['e_fechaing']);
		$fijo_contratado=tipo_n($emp_row['e_codigo']);
		// Aqui para cambiar la nacionalidad
		echo "<div id='constancia'>
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
		Por medio de la presente que el (la) ciudadano (a) <b>$emp_row[e_nomap],</b> títular de la cédula de identidad Nº <b>V. $cedula_empleado,</b> presta
		sus servicios como: <b>$emp_row[e_cargo] ($fijo_contratado),</b> adscrito (a): <b>$emp_row[e_dependencia],</b> devengando un
		 sueldo mensual de: <b>$sueldo_integral_let BOLIVARES CON $sueldo_integral_let_dec CÉNTIMOS (Bs. $sueldo_integral).</b> Bajo el código: <b>$emp_row[e_codigo].</b>";
		if(array_key_exists('ct_emp',$_GET)){
			echo " Adicional percibe un monto mensual de <b>SIETE MIL NOVECIENTOS SESENTA Y CINCO BOLIVARES CON CERO CÉNTIMOS (Bs. 7.965.00),</b> por concepto de Bono
			de Alimentación, de conformidad con lo establecido en el Artículo 5 de la Ley de Alimentación Para los Trabajadores, el cual es acreditado mediante
			tarjeta electrónica o ticket alimentación.
			";
		}
		if(!array_key_exists('ct_emp',$_GET)){
			echo "<br><br><br><br>";
		}
		echo "</p>
		<center>Fecha de ingreso: <b>$fecha_de</b></center>
		<p class='cons'>Constancia que se expide a solicitud de parte interesada para <b>FINES PERSONALES,</b> en la ciudad de Mérida a los <b>$dia_hoy_lt ($dia_hoy)</b>
		días del mes de <b>$mes_hoy_lt</b> de <b>$y.</b></p>
		
			<img src='img/sello1.png' alt='sello'/ class='sello'>
		<br><br><br><br><br><br><br><br>
		<p align='center'><b><br>LCDO. MIGUEL ANGEL RINCON FIGUEROA<br>DIRECTOR ESTADAL DEL PODER POPULAR<br>DE RECURSOS HUMANOS DE LA GOBERNACIÓN DEL ESTADO MÉRIDA<br>
		Designado según decreto Nº 400-1 de fecha 11/10/2013<br>Gaceta Extraordinaria de la misma fecha</b></p>
		<p><span class='peq'>EMP/&nbsp;&nbsp;&nbsp;/</span>
		<center><i><b>\"Independencia, Patria Socialista... Viviremos y Venceremos\"</b></i></center>
		<center><span class='peque'>Calle 23 entre Av, 3 y 4 frente a la Plaza Bolívar, Palacio de Gobierno, Planta Baja, Dirección de Recursos Humanos de la Gobernación del
		Estado Mérida Teléfono: 0274-2528596/2524770/2512054 fax. 2528709 / Rif. G20000156-9</span></center>
		</p>
		</div>";
	}
	if(array_key_exists('cedula_jub',$_GET)){
		
		$ced=$_GET['cedula_jub'];
		$jp_cod=$_GET['jp_cod'];
		$jp_sql = "SELECT * FROM c_jp WHERE jp_cedula='$ced' and jp_cod='$jp_cod'";
		$jp_query = mysql_query($jp_sql,$con) or die (mysql_error());
		$jp_row = mysql_fetch_array($jp_query);
		
		//~ if()
		
		$dia_hoy = date("d");
		$dia_hoy_lt = numtoletras($dia_hoy);
		
		$mes_hoy = date("m");
		$mes_hoy_lt = mes($mes_hoy);
		
		$y=date("Y");
		
		if($jp_row['jp_cedula']==""){
			header("location:index.php?error=2");
		}
		
		$sueldo_integral=$jp_row['jp_sueldo'];
		list($suel,$deci) = explode(".",$sueldo_integral);
		$sueldo_integral_let=numtoletras($sueldo_integral);
		$sueldo_integral_let_dec=numtoletras($deci);
		$sueldo_integral=number_format($sueldo_integral,2,",", ".");
		$cedula_emple = number_format($jp_row['jp_cedula'], 2, ",", ".");
		list($cedula_empleado,$deci) = explode(",",$cedula_emple);
		// Aqui para cambiar la nacionalidad
		echo "<div id='constancia'>
		<br>
		<img src='./media/logo_emp.png' width='450px' height='80px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src='./media/consumo.png' width='50px'><br><br><br>
		<center class='mas'><b>CONSTANCIA</b></center>
		<br><p align='center'>
		<b>EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS
		HUMANOS DE LA GOBERNACION DEL ESTADO BOLIVARIANO DE MÉRIDA</b></p>
		<br><br>
		<center class='mas'><b>HACE CONSTAR</b></center>
		<br>
		<p class='cons'>
		Por medio de la presente que el (la) ciudadano (a) <b>$jp_row[jp_nomap],</b> títular de la cédula de identidad Nº <b>V. $cedula_empleado,</b> pertenece a la 
		nómina <b>$jp_row[jp_cargo] ($jp_row[jp_tiponom])</b> de la Gobernación del Estado Mérida, bajo el código: <b>$jp_row[jp_cod]</b> devengando una
		 asignación mensual de: <b>$sueldo_integral_let BOLIVARES CON $sueldo_integral_let_dec CÉNTIMOS (Bs. $sueldo_integral).</b>";
		echo "</p>
		<br>
		<p class='cons'>Constancia que se expide a solicitud de parte interesada para <b>FINES PERSONALES,</b> en la ciudad de Mérida a los <b>$dia_hoy_lt ($dia_hoy)</b>
		días del mes de <b>$mes_hoy_lt</b> de <b>$y.</b></p>
		<br><br><br><br><br>
		<p align='center'><b>LCDO. MIGUEL ANGEL RINCON FIGUEROA<br>DIRECTOR ESTADAL DEL PODER POPULAR<br>DE RECURSOS HUMANOS DE LA GOBERNACIÓN DEL ESTADO MÉRIDA<br>
		Designado según decreto Nº 400-1 de fecha 11/10/2013<br>Gaceta Extraordinaria de la misma fecha</b></p>
		<p><span class='peq'>JUB/&nbsp;&nbsp;&nbsp;/</span>
		<center><i><b>\"Independencia, Patria Socialista... Viviremos y Venceremos\"</b></i></center>
		<center><span class='peque'>Calle 23 entre Av, 3 y 4 frente a la Plaza Bolívar, Palacio de Gobierno, Planta Baja, Dirección de Recursos Humanos de la Gobernación del
		Estado Mérida Teléfono: 0274-2528596/2524770/2512054 fax. 2528709 / Rif. G20000156-9</span></center>
		</p>
		</div>";
	}
	if(array_key_exists('cedula_obr',$_GET)){
		
		$ced=$_GET['cedula_obr'];
		$obr_sql = "SELECT * FROM t_obreros WHERE obr_cedula='$ced'";
		$obr_query = mysql_query($obr_sql,$con) or die (mysql_error());
		$obr_row = mysql_fetch_array($obr_query);
		
		//~ if()
		
		$dia_hoy = date("d");
		$dia_hoy_lt = numtoletras($dia_hoy);
		
		$mes_hoy = date("m");
		$mes_hoy_lt = mes($mes_hoy);
		
		$y=date("Y");
		
		if($obr_row['obr_cedula']==""){
			header("location:index.php?error=2");
		}
		
		$sueldo_integral=$obr_row['obr_sueldo'];
		list($suel,$deci) = explode(".",$sueldo_integral);
		$sueldo_integral_let=numtoletras($sueldo_integral);
		$sueldo_integral_let_dec=numtoletras($deci);
		$sueldo_integral=number_format($sueldo_integral,2,",", ".");
		$cedula_emple = number_format($obr_row['obr_cedula'], 2, ",", ".");
		list($cedula_empleado,$deci) = explode(",",$cedula_emple);
		$fecha_de = a_fecha($obr_row['obr_fechaing']);
		$fijo_contratado=tipo_n($obr_row['obr_cod']);
		// Aqui para cambiar la nacionalidad
		echo "<div id='constancia'>
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
		Por medio de la presente que el (la) ciudadano (a) <b>$obr_row[obr_nomap],</b> títular de la cédula de identidad Nº <b>V. $cedula_empleado,</b> presta
		sus servicios como: <b>$obr_row[obr_cargo] ($fijo_contratado),</b> adscrito (a): <b>$obr_row[obr_dependencia],</b> devengando un
		 sueldo mensual de: <b>$sueldo_integral_let BOLIVARES CON $sueldo_integral_let_dec CÉNTIMOS (Bs. $sueldo_integral).</b> Bajo el código: <b>$obr_row[obr_cod].</b>";
		if(array_key_exists('ct_obr',$_GET)){
			echo " Adicional percibe un monto mensual de <b>SIETE MIL NOVECIENTOS SESENTA Y CINCO BOLIVARES CON CERO CÉNTIMOS (Bs. 7.965.00),</b> por concepto de Bono
			de Alimentación, de conformidad con lo establecido en el Artículo 5 de la Ley de Alimentación Para los Trabajadores, el cual es acreditado mediante
			tarjeta electrónica o ticket alimentación.
			";
		}
		if(!array_key_exists('ct_obr',$_GET)){
			echo "<br><br><br><br>";
		}
		echo "</p>
		<br>
		<center>Fecha de ingreso: <b>$fecha_de</b></center>
		<p class='cons'>Constancia que se expide a solicitud de parte interesada para <b>FINES PERSONALES,</b> en la ciudad de Mérida a los <b>$dia_hoy_lt ($dia_hoy)</b>
		días del mes de <b>$mes_hoy_lt</b> de <b>$y.</b></p>
		<br><br><br><br><br>
		<p align='center'><b>LCDO. MIGUEL ANGEL RINCON FIGUEROA<br>DIRECTOR ESTADAL DEL PODER POPULAR<br>DE RECURSOS HUMANOS DE LA GOBERNACIÓN DEL ESTADO MÉRIDA<br>
		Designado según decreto Nº 400-1 de fecha 11/10/2013<br>Gaceta Extraordinaria de la misma fecha</b></p>
		<p><span class='peq'>OBR/&nbsp;&nbsp;&nbsp;/</span>
		<center><i><b>\"Independencia, Patria Socialista... Viviremos y Venceremos\"</b></i></center>
		<center><span class='peque'>Calle 23 entre Av, 3 y 4 frente a la Plaza Bolívar, Palacio de Gobierno, Planta Baja, Dirección de Recursos Humanos de la Gobernación del
		Estado Mérida Teléfono: 0274-2528596/2524770/2512054 fax. 2528709 / Rif. G20000156-9</span></center>
		</p>
		</div>";
	}
	?>
	
</body>

</html>
