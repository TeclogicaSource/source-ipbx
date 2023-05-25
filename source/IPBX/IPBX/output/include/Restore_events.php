<?php













// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Realiza restore
removebackupNOW($deleted_values["id_bkp"]);


;
} // function AfterDelete
$arrEventTables["AfterDelete"]="Restore";






























































// View page: Before display
function BeforeShowView(&$xt,&$templatefile,&$values)
{

// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Realiza restore
restoreNow($values["FieldName"]);
;
} // function BeforeShowView
$arrEventTables["BeforeShowView"]="Restore";



























// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

$file = $_FILES['value_nom_arq_1'];

$format = substr($file['name'], -10, 10);

if($format !== 'tar.gz.gpg') {
	$message = '<font color="red">São aceitos apenas arquivos criptografados no formato .tar.gz.gpg </font>';
	return false;
}

return true;

;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="Restore";















































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

//**********  Insert a record into another table  ************
global $conn;
$query = mysql_query('SELECT MAX(`id_bkp`) FROM `ipbx_backup`');
$result = mysql_fetch_array($query);
$strSQLInsert = "UPDATE `ipbx_backup` SET `nom_arq` = 'backup_sist_ipx_".$result[0].".tar.gz.gpg' WHERE `id_bkp` = ".$result[0];
db_exec($strSQLInsert,$conn);
system("sudo mv /ipbxbackup/{$_FILES['value_nom_arq_1']['name']} '/ipbxbackup/backup_sist_ipx_$result[0].tar.gz.gpg'");



// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="Restore";



































?>