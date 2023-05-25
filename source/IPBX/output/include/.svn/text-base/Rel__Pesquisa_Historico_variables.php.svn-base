<?php
$strTableName="Rel. Pesquisa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_pesquisa_ura_rev_resp";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_resp_pesq,   dsc_pesquisa,   dsc_mensagem,   nm_telefone,   nm_ramal,   usuario,   resp_usuario,   dt_resp,   id_pesquisa,   nr_ordem,   txt_resp";
$gsqlFrom="FROM ipbx_pesquisa_ura_rev_resp";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Pesquisa_Historico_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Pesquisa_Historico;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>