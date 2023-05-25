<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclusуo das interfaces de geraчуo
include './include/teclogica/funcoes_gerais.php';

// Backup
backupNow($values["id_bkp"]);

//Pagina padrуo do servidor
header("Location: Restore_list.php");
exit();

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_backup";













































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


$message = "Aguarde enquando o backup щ realizado.";
return true;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_backup";




































?>