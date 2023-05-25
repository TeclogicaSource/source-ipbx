<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclusуo das rotinas
include_once './include/teclogica/funcoes_gerais.php';
include_once './include/teclogica/gerador_interf.php';


// Atualiza interfaces FXS
sincronizaFXO($values["id_interf"], $values["board"]);

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada na interface FXO.");

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_fxo";











































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
insereMensagem("Alteraчуo realizada na interface FXO.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_fxo";

































?>