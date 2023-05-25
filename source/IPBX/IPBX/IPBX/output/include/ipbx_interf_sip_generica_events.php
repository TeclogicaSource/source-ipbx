<?php










// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

$values = array_map('trim', $values);
//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "SELECT SUM(IFNULL(flg_logon_remoto, 0)) logon FROM ipbx_interf";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);

if ($values['flg_logon_remoto'] == 1) {
	if($data['logon'] > 0)
	{
		$message = "Nгo й possнvel ativar o logon remoto se outro jб estiver em uso. " . $data['login'];
		return false;
	}
	else
	{
		return true;
	}
}

return true;

;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_interf_sip_generica";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

$values = array_map('trim', $values);
//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "SELECT SUM(IFNULL(flg_logon_remoto, 0)) logon FROM ipbx_interf";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);

if ($values['flg_logon_remoto'] == 1) {
	if($data['logon'] > 0)
	{
		$message = "Nгo й possнvel ativar o logon remoto se outro jб estiver em uso. " . $data['login'];
		return false;
	}
	else
	{
		return true;
	}
}

return true;

;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_interf_sip_generica";















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclusгo das interfaces de geraзгo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraзгo
insereMensagem("Alteraзгo realizada na interface SIP Genйrica.");
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_sip_generica";









































// After record added
function AfterAdd(&$values,&$keys,$inline)
{


// Inclusгo das interfaces de geraзгo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraзгo
insereMensagem("Alteraзгo realizada na interface SIP Genйrica.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_sip_generica";



































?>