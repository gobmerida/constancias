<?php
header("Content-Type:text/html;charset=utf-8");
$h="localhost";
$u="root";
$p="102236";
$con=mysql_connect($h,$u,$p) or die (mysql_error());
mysql_select_db("constancias",$con) or die (mysql_error());
mysql_query("SET NAMES 'utf8'");
?>
