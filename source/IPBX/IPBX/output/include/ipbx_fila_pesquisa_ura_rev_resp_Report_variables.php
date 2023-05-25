<?php
$strTableName="Rel. Pesquisa Reversa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_fila_pesquisa_ura_rev_resp";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_resp_pesq,   dt_criado,   dsc_pesquisa,   dsc_mensagem,   nm_telefone,   id_cliente,   resp_usuario,   dt_resp,   id_pesquisa,   nr_ordem,   txt_resp";
$gsqlFrom="FROM ipbx_fila_pesquisa_ura_rev_resp";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_fila_pesquisa_ura_rev_resp_Report_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_fila_pesquisa_ura_rev_resp_Report;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>