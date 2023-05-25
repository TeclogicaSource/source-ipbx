<?php
$strTableName="ipbx_ramais";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ramais";

$gstrOrderBy="ORDER BY name";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "name");
$gsqlHead="SELECT id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op";
$gsqlFrom="FROM ipbx_ramais";
$gsqlWhereExpr="(name <> \"admin\")";
$gsqlTail="";

include(getabspath("include/ipbx_ramais_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ramais;

include(getabspath("include/ipbx_ramais_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>