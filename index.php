<!--Autor 
Edgar Carrizalez
C.I. V-19.352.988
Correo: edg.sistemas@gmail.com
-->
<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<title>.:Generador de constancias:.</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<link rel="stylesheet" href="./css/tema.css" type="text/css"/>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script>
	// Funciones para el cambio de color de los enlances del panel 
	function color11(){
		document.getElementById("c1").style.color = "white";
	}
	function color21(){
		//~ document.getElementById("c1").style.color = "DimGray";
		document.getElementById("c1").style.color = "Black";
	}
	function color12(){
		document.getElementById("c2").style.color = "white";
	}
	function color22(){
		document.getElementById("c2").style.color = "Black";
	}
	function color13(){
		document.getElementById("c3").style.color = "white";
	}
	function color23(){
		document.getElementById("c3").style.color = "Black";
	}
	function color14(){
		document.getElementById("c4").style.color = "white";
	}
	function color24(){
		document.getElementById("c4").style.color = "Black";
	}
	function color15(){
		document.getElementById("c5").style.color = "white";
	}
	function color25(){
		document.getElementById("c5").style.color = "Black";
	}
	// Fin de las funciones 
	</script>
	<script type="text/javascript">
		// function estasImprimiendo() { alert("Inicia Impresión."); } Prueba
		// window.onbeforeprint = estasImprimiendo; Prueba
		
		// Función para ocultar las opciones del sistema
		function oc(){
			$("#empleado").fadeOut(0);
			$("#obrero").fadeOut(0);
			$("#jubilado").fadeOut(0);
			$("#actualizar").fadeOut(0);
		}
		// Función para mostrar la opción de empleados
		function m_emp(){
			$("#empleado").fadeIn(200);
			$("#obrero").fadeOut(0);
			$("#jubilado").fadeOut(0);
			$("#bienvenido").fadeOut(0);
			$("#actualizar").fadeOut(0);
			document.getElementById("cedula_emp").focus();
		}
		// Función para mostrar la oción de obreros
		function m_obr(){
			$("#empleado").fadeOut(0);
			$("#obrero").fadeIn(200);
			$("#jubilado").fadeOut(0);
			$("#bienvenido").fadeOut(0);
			$("#actualizar").fadeOut(0);
			document.getElementById("cedula_obr").focus();
		}
		// Función para mostrar la oción de jubilados
		function m_jub(){
			$("#jubilado").fadeIn(200);
			$("#obrero").fadeOut(0);
			$("#empleado").fadeOut(0);
			$("#bienvenido").fadeOut(0);
			$("#actualizar").fadeOut(0);
			document.getElementById("cedula_jub").focus();
		}
		function act(){
			$("#actualizar").fadeIn(200);
			$("#obrero").fadeOut(0);
			$("#empleado").fadeOut(0);
			$("#bienvenido").fadeOut(0);
			$("#jubilado").fadeOut(0);
			document.getElementById("root").focus();
			//~ document.getElementById("l4").style.backgroundColor = "Gainsboro";
		}
		function justNumbers(e){
		var keynum = window.event ? window.event.keyCode : e.which;
		if ((keynum == 8) || (keynum == 46))
		return true;
		return /\d/.test(String.fromCharCode(keynum));
		}
	</script>
	<script type="text/javascript">
	$(document).ready(function() {	
		$('#suggestions').fadeOut(0);
		$('#cedula_jub').keypress(function(){
			var cedula_jub = $(this).val();		
			var dataString = 'cedula_jub='+cedula_jub;
			$.ajax({
				type: "POST",
				url: "jubil.php",
				data: dataString,
				success: function(data) {
					$('#suggestions').fadeIn(1000).html(data);
					$('.suggest-element a').live('click', function(){
						var id = $(this).attr('id');
						$('#cedula_jub').val($('#'+id).attr('data'));
						$('#suggestions').fadeOut(1000);
						$('#trb_cedula').submit();
						return false;
					});              
				}
			});
		});              
	});    
	</script>
</head>

<body onload="oc()">
	
	<div id="principal_content"> <!-- Inicio del cuerpo principal -->
	<div id="encabezado"><h2 align="center">.:Generador de Constancias:.</h2></div> <!-- Encabezado del módulo -->
	<?php
if(array_key_exists('man',$_GET)){
$mante=0;
}
if(!array_key_exists('man',$_GET) and !isset($_SESSION['user_cons'])){
$mante=0;
}
if(isset($_SESSION['user_cons'])){
$mante=0;
}
	if($mante=='1'){
		echo "
		<center><img src='./media/trabajando.png' width='20%'></center>
		<h3 align='center' style='color:maroon'>EN MANTENIMIENTO</h3>
		<br><br>
		";
	}
	if(!isset($_SESSION['user_cons']) and $mante=='0'){
	?>
		<br>
		<h3 style="text-align:center;color:maroon">Iniciar Sesión</h3>
		<form action="./session/sesiones.php" method="post">
		<center><span class="cen">Contraseña</span><br>
		<input type="password" name="pass" id="pass" class="busc"><br><br>
		<input type="submit" value="Entrar" class="busc">
		</center>
		</form>
		<br>
		<br>
		<br>
		<script>
		document.getElementById("pass").focus();
		</script>
	<?php
	}
	if(isset($_SESSION['user_cons'])){
	?>
	<div id="panel"> <!-- Inicio del Panel principal del módulo-->
		<br>
		<span>Panel</span>
		<hr>
		<ul class="panel"><!-- Opciones del módulo -->
			<li onmouseover="color11()" onmouseout="color21()" onclick="m_emp()" id="l1"><a href='#' id="c1">Empleados</a></li>
			<li onmouseover="color12()" onmouseout="color22()" onclick="m_obr()" id="l2"><a href='#' id="c2">Obreros</a></li>
			<li onmouseover="color13()" onmouseout="color23()" onclick="m_jub()" id="l3"><a href='#' id="c3">Jubilados</a></li>
			<li onmouseover="color14()" onmouseout="color24()" onclick="act()" id="l4"><a href='#' id="c4">Actualizar</a></li>
			<li onmouseover="color15()" onmouseout="color25()" onclick="location.href='./session/cerrar_sesion.php'" id="l5"><a href="./session/cerrar_sesion.php" id="c5">Salir</a></li>
		</ul>
	</div> <!-- Fin del panel-->
	<div id="content"><!-- Inicio del contenido del módulo -->
		<div id="bienvenido"><br><br><br><h3 align="center">Bienvenidos al módulo generador de constancias</h3></div>
		<div id="empleado">
			<form action="constancia1.php" method="get">
			Cédula del empleado<br><input type="text" name="cedula_emp" id="cedula_emp" class="busc" autocomplete=off onkeypress="return justNumbers(event);"><br>
			Cesta ticket <input type="checkbox" name="ct_emp" id="ct_emp" value="1"><br>
			<input type="submit" value="Generar" class="busc">
			</form>
		</div>
		<div id="obrero">
			<form action="constancia.php" method="get">
			Cédula del obrero<br><input type="text" name="cedula_obr" id="cedula_obr" class="busc" autocomplete=off onkeypress="return justNumbers(event);"><br>
			Cesta ticket <input type="checkbox" name="ct_obr" id="ct_obr" value="1"><br>
			<input type="submit" value="Generar" class="busc">
			</form>
		</div>
		<div id="jubilado">
			<form action="constancia.php" method="get">
			Cédula del jubilado/pensionado<br><input type="text" name="cedula_jub" id="cedula_jub" class="busc" autocomplete=off onkeypress="return justNumbers(event);"><br>
			</form><br>
			<div id="suggestions"></div>
		</div>
		<div id="actualizar">
			<form method="post" action="./actualizar/ing_root.php">
			Ingrese clave root<br>
			<input type="password" name="root" id="root" class="busc"> <input type="submit" value="Ingresar" class="busc">
			</form>
		</div>
		</div><!-- Fin del contenido del módulo -->
	<?php
	}
	?>
		<div id="pie"><!-- Pie de página -->
			<b>Generador de Constancias<br><!--Desarrollado por el Ing. Edgar Carrizalez--></b>
		</div>
	</div>
	
</body>

</html>
<?php
	if(array_key_exists('error',$_GET) and $_GET['error']=='1'){
		echo "
		<script>
		alert('¡Clave incorrecta!');
		</script>
		";
	}
	if(array_key_exists('error',$_GET) and $_GET['error']=='2'){
		echo "
		<script>
		alert('Cédula incorrecta ó Empleado no registrado!');
		</script>
		";
	}
?>
