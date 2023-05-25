<?php
$strTableName="ldap";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ldap";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ldap,   nm_usuario,   email,   name,   dt_atualizacao,   chave,   name2";
$gsqlFrom="FROM ldap";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ldap_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ldap;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>