<?php
$strTableName="sms_noticias";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sms_noticias";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_noticia,  dsc_noticia,  id_grupo,  status,  dt_enviado,  Concat('<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>') AS `Envio de notícias`";
$gsqlFrom="FROM sms_noticias";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sms_noticias_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sms_noticias;

include(getabspath("include/sms_noticias_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>