<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{



// Inclusуo das interfaces de geraчуo
include './include/teclogica/funcoes_gerais.php';

if ($values["nome"] == "ramais.inicio" ){
	//Rotina de atualizaчуo de ramais
	atualizaRamais();
}
if ($values["nome"] == "ramais.fim" ){
	//Rotina de atualizaчуo de ramais
	atualizaRamais();
}

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="parametros";













































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{


return true;
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="parametros";































?>