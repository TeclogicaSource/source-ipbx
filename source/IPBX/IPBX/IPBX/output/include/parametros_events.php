<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{



// Inclus�o das interfaces de gera��o
include './include/teclogica/funcoes_gerais.php';

if ($values["nome"] == "ramais.inicio" ){
	//Rotina de atualiza��o de ramais
	atualizaRamais();
}
if ($values["nome"] == "ramais.fim" ){
	//Rotina de atualiza��o de ramais
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