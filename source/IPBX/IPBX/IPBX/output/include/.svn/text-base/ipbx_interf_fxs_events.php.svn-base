<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclusуo das rotinas
include_once './include/teclogica/funcoes_gerais.php';
include_once './include/teclogica/gerador_interf.php';


// Atualiza interfaces FXS
sincronizaFXS($values["id_interf"], $values["board"]);

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface FXS.");




;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_fxs";









































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

include_once './include/teclogica/funcoes_gerais.php';
include_once './include/teclogica/gerador_interf.php';

/*
global $conn;
$sql = "select MAX(id_interf) as id from ipbx_interf;";
$query = mysql_query($sql) or die(mysql_error());
$result = mysql_fetch_array($query) or die(mysql_error());

sincronizaFXS($result[0], $values["board"]);
*/

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface FXS.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_fxs";
















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/funcoes_gerais.php';

// Conexуo com o banco de dados
global $conn;

// Alteraчуo do ipbx_canais
$delete_ipbx_canais = mysql_query("delete from ipbx_canais where id_interf = ".$deleted_values["id_interf"]);

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface E1.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_fxs";

































?>