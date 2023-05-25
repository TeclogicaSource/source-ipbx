<?php
$strTableName="Rel. URA Reversa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev";

$gstrOrderBy="ORDER BY dt_criado DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (0 ? "ASC" : "DESC"), "dt_criado");
$gsqlHead="SELECT id_ura_rev,  nm_telefone,  id_msg,  dt_criado,  nm_tentativas,  case ult_status when 0 then \"Respondido\" when 1 then \"Ocupado/Não atende\" when 2 then \"Sem Resposta\" when 3 then \"Usuario Desligou\" end AS ult_status,  resp_usuario,  dt_resp,  id_cliente";
$gsqlFrom="FROM ipbx_ura_rev";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Acompanhamento_URA_Reversa_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Acompanhamento_URA_Reversa;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>