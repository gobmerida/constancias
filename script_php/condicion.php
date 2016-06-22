<?php
function tipo_n($tipo_c){
	list($tipo_de_nomina, $codigo_nomina) = explode("-",$tipo_c);
	if($tipo_de_nomina=='CO' or $tipo_de_nomina=='COC'){
		$nom_tip="CONTRATADO";
		return $nom_tip;
	}
	if($tipo_de_nomina=='EM' or $tipo_de_nomina=='EC' or $tipo_de_nomina=='EF' or $tipo_de_nomina=='PO' or $tipo_de_nomina=='BO'){
		$nom_tip="FIJO";
		return $nom_tip;
	}
	if($tipo_de_nomina=='BE'){
		$nom_tip="CONTRATADO";
		return $nom_tip;
	}
	if($tipo_de_nomina=='OS' or $tipo_de_nomina=='OF' or $tipo_de_nomina=='OB' or $tipo_de_nomina=='OP' or $tipo_de_nomina=='OO'){
		$nom_tip="FIJO";
		return $nom_tip;
	}
}
?>
