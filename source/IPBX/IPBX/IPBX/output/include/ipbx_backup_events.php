<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include './include/teclogica/funcoes_gerais.php';

// Backup
backupNow($values["id_bkp"]);

//Pagina padr�o do servidor
header("Location: Restore_list.php");
exit();

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_backup";













































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


$message = "Aguarde enquando o backup � realizado.";
return true;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_backup";




































?>