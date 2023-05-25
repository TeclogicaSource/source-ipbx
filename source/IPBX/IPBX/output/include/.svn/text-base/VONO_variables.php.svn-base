<?php
$strTableName="VONO";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="VONO";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_vono,   CODLOCALIDADE,   LOCALIDADE,   MUNICIPIO,   ESTADO,   PREFIXO";
$gsqlFrom="FROM VONO";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/VONO_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_VONO;

include(getabspath("include/VONO_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>