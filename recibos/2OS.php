<?php

# incluimos la libreria fdpf
# http://www.fpdf.org/
require_once('fpdf17/fpdf.php');
# incluimos la libreria fpdi
# http://www.setasign.com/products/fpdi/about/
require_once('FPDI-1.5.2/fpdi.php');

require_once('../connect/conexion.php');

extract($_GET);
$query="select * from pdfoOS where cedula = '$p'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

# inicializamos el objeto
$pdf = new FPDI();
# definimos el archivo pdf a leer. Nos devuel el numero de paginas
$paginas=$pdf->setSourceFile('pdf/'.$q.'/2OS.pdf');
$pagina=$row[0];
# importamos cada una de las paginas
$templateId=$pdf->importPage($pagina);
# obtenemos el temaño de cada hoja
$size=$pdf->getTemplateSize($templateId);

// create a page definiendo el formato y tamaños
if($size['w'] > $size['h'])
{
	$pdf->AddPage('L',array($size['w'],$size['h']));
}else {
	$pdf->AddPage('P',array($size['w'],$size['h']));
}
$pdf->useTemplate($templateId);

# devolvemos el documento
$pdf->Output();
?>
