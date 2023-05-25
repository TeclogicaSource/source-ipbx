<?php
$strTableName="ipbx_ura_rev_msg";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev_msg";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ipbx_ura_rev_msg,   arq_audio,   opc_resp,   dsc_mensagem,   id_pesquisa,   ref0,   ref1,   ref3,   ref4,   ref5,   ref6,   ref7,   ref8,   ref9,   ref2,   nr_ordem";
$gsqlFrom="FROM ipbx_ura_rev_msg";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_ura_rev_msg_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ura_rev_msg;

include(getabspath("include/ipbx_ura_rev_msg_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>