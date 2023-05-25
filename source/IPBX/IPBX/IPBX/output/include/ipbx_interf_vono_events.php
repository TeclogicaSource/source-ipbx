<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface VONO.");
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_vono";









































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface VONO.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_vono";
















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{



// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface VONO.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_vono";
















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

	//$values["id_chamada"]=trim($values["id_chamada"]);
	return true;

;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_interf_vono";































?>