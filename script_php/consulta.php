<!--Autor 
Edgar Carrizalez
C.I. V-19.3522.988
Correo: edg.sistemas@gmail.com
-->

<?php
header("Content-Type:text/html;charset=utf-8");
$h="localhost";
$u="root";
$p="12345678956";
$con=mysql_connect($h,$u,$p) or die (mysql_error());
mysql_select_db("constancias",$con) or die (mysql_error());
mysql_query("SET NAMES 'utf8'");

function con_emp($cedula_b){
	$emp_sql = "SELECT * FROM t_empleados WHERE e_cedula='$cedula_b'";
	$emp_query = mysql_query($emp_sql,$con) or die (mysql_error());
	return $emp_row = mysql_fetch_array($emp_query);
}
?>
