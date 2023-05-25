<?php
$strTableName="ipbx_ldap_conf";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ldap_conf";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ldap,   tp_ldap,   flg_ativo,   dsc_conf,   port,   ip_server,   ou_usuarios,   filtro,   ad_usuario,   ad_senha,   ad_dominio,   flg_padrao";
$gsqlFrom="FROM ipbx_ldap_conf";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_ldap_conf_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ldap_conf;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>