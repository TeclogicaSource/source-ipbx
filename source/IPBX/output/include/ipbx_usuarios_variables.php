<?php
$strTableName="ipbx_usuarios";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_usuarios";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_usuario,   name,   accountcode,   `call-limit`,   callgroup,   callerid,   context,   pickupgroup,   secret,   allow,   id_horario";
$gsqlFrom="FROM ipbx_usuarios";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_usuarios_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_usuarios;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>