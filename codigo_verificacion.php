<?php

do {
		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=9; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada

		for($i=0;$i<$numerodeletras;$i++)
		{
	    	$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
		}
		$sql="SELECT verificar FROM verificar_empleados";
		$rs=mysql_query($sql) or die(mysql_error());
		while (($row=mysql_fetch_array($rs)) && ($cadena !="")) {
			if (($row["verificar"]==$cadena)) $cadena="";
					
		}
	

} while ($cadena=="");

?>