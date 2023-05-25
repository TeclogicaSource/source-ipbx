<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface SIP.");
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_sip";











































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface VONO.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_sip";












































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface VONO.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_sip";


















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

$values = array_map('trim', $values);
//**********  Check if specific record exists  ************
if ($values['flg_logon_remoto'] !== $oldvalues['flg_logon_remoto']) {
	if ($values['flg_logon_remoto'] == 1) {
		global $conn;
		$strSQLExists = "SELECT SUM(IFNULL(flg_logon_remoto, 0)) logon FROM ipbx_interf";
		$rsExists = db_query($strSQLExists,$conn);
		$data=db_fetch_array($rsExists);
		if ($data['logon'] == 1) {
			$message = "N�o � poss�vel ativar o logon remoto se outro j� estiver em uso.";
			return false;
		} else {
			return true;
		}
	}
} 

return true;
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_interf_sip";









































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
		$message = "N�o � poss�vel ativar o logon remoto se outro j� estiver em uso. " . $data['login'];
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
$arrEventTables["BeforeAdd"]="ipbx_interf_sip";




































?>