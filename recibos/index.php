<?php
	require_once('fpdf17/fpdf.php');
	require_once('FPDI-1.5.2/fpdi.php');
	require_once('../connect/conexion.php');

	extract($_POST);

	if ($cod=='EM' || $cod=='OS' || $cod=='BE' || $cod=='OF') {
		$archivo=$per."".$cod;
	}else{
		$archivo=$cod;
	}

	if ($cod=='JA' || $cod=='JB' || $cod=='JE' || $cod=='JH' || $cod=='JI' || $cod=='JM' || $cod=='JO' || $cod=='JP' || $cod=='JU' || $cod=='PE' || $cod=='PG' || $cod=='PS') {
		
		$query="select * from pdfJ where cedula = '$ci'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);

		$pdf = new FPDI();

		$paginas=$pdf->setSourceFile('pdf/'.$mes.'/'.$archivo.'.pdf');
		$pagina=$row[2];


		$templateId=$pdf->importPage($pagina);

		$size=$pdf->getTemplateSize($templateId);


		if($size['w'] > $size['h'])
		{
			$pdf->AddPage('L',array($size['w'],$size['h']));
		}else {
			$pdf->AddPage('P',array($size['w'],$size['h']));
		}
		$pdf->useTemplate($templateId);


		$pdf->Output('Rcibo.pdf','D');

	}elseif ($cod=='EM' || $cod=='CO' ) {

		$query="select * from pdf$cod where cedula = '$ci'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);

		$pdf = new FPDI();

		$paginas=$pdf->setSourceFile('pdf/'.$mes.'/'.$archivo.'.pdf');
		$pagina=$row[0];


		$templateId=$pdf->importPage($pagina);

		$size=$pdf->getTemplateSize($templateId);


		if($size['w'] > $size['h'])
		{
			$pdf->AddPage('L',array($size['w'],$size['h']));
		}else {
			$pdf->AddPage('P',array($size['w'],$size['h']));
		}
		$pdf->useTemplate($templateId);


		$pdf->Output('Rcibo.pdf','D');

	}elseif ($cod=='OS' || $cod=='BE' || $cod=='OF') {

		$query="select * from pdf$cod where cedula = '$ci'";
		$result = mysql_query($query);
		$row1 = mysql_fetch_array($result);

		$pdf = new FPDI();

		$paginas=$pdf->setSourceFile('pdf/'.$mes.'/'.$archivo.'.pdf');
		$pagina=$row1[0];


		$templateId=$pdf->importPage($pagina);

		$size=$pdf->getTemplateSize($templateId);


		if($size['w'] > $size['h'])
		{
			$pdf->AddPage('L',array($size['w'],$size['h']));
		}else {
			$pdf->AddPage('P',array($size['w'],$size['h']));
		}
		$pdf->useTemplate($templateId);


		$pdf->Output('Rcibo.pdf','D');
	}elseif ($cod=='EC' || $cod=='PO' || $cod=='BO' || $cod=='EF') {

		$query="select * from pdfEM where cedula = '$ci'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);

		$pdf = new FPDI();

		$paginas=$pdf->setSourceFile('pdf/'.$mes.'/'.$per.'EM.pdf');
		$pagina=$row[0];


		$templateId=$pdf->importPage($pagina);

		$size=$pdf->getTemplateSize($templateId);


		if($size['w'] > $size['h'])
		{
			$pdf->AddPage('L',array($size['w'],$size['h']));
		}else {
			$pdf->AddPage('P',array($size['w'],$size['h']));
		}
		$pdf->useTemplate($templateId);


		$pdf->Output('Rcibo.pdf','D');

	}
	

	
	
?>
