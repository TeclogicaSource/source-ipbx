<?php
$strTableName="Rel. Ura Reversa - Enfileiramento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_fila_ura_rev";

$gstrOrderBy="ORDER BY dt_criado DESC, id_cliente, nm_tentativas";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(11, (0 ? "ASC" : "DESC"), "dt_criado");
$g_orderindexes[] = array(15, (1 ? "ASC" : "DESC"), "id_cliente");
$g_orderindexes[] = array(12, (1 ? "ASC" : "DESC"), "nm_tentativas");
$gsqlHead="SELECT id_ura_rev,  nm_tel1,  DATE(DATE_FORMAT(dt_tel1 ,'%Y-%m-%d')) AS busca_dt_tel1,  dt_tel1,  nm_tel2,  DATE(DATE_FORMAT(dt_tel2 ,'%Y-%m-%d')) AS busca_dt_tel2,  dt_tel2,  nm_tel3,  DATE(DATE_FORMAT(dt_tel3 ,'%Y-%m-%d')) AS busca_dt_tel3,  dt_tel3,  dt_criado,  nm_tentativas,  case resp_usuario when 1 then 'RESPONDIDO' end AS resp_usuario,  case ult_status when 0 then \"RESPONDIDO\" when 1 then \"OCUPADO/NAO ATENDE\" when 2 then \"SEM RESPOSTA\" when 3 then \"USUARIO DESLIGOU\" end AS ult_status,  id_cliente,  case flg_proc when 0 then \"EM FILA\" when 1 then \"PROCESSANDO\" when 2 then \"AGUARDANDO TERMINO\" when 3 then \"AGUARDANDO ENVIO\" when 4 then \"ENVIADO\" end AS flg_proc";
$gsqlFrom="FROM ipbx_fila_ura_rev";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Ura_Reversa___Enfileiramento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Ura_Reversa___Enfileiramento;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>