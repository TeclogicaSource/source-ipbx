<?php
ini_set("display_errors","1");
ini_set("display_startup_errors","1");
include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
include("include/reportfunctions.php");

if(postvalue("name")=="password")
{
	if(postvalue("password")==$WRAdminPagePassword)
	{
		$_SESSION["WRAdmin"]=true;
		echo "OK";
	}
	else
	{
		unset($_SESSION["WRAdmin"]);
		echo "ERROR";
	}
	exit();
}

if(!isWRAdmin())
{
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: webreport.php?message=expired");
	return;
}

$arr = my_json_decode(postvalue("output"));
db_exec("delete from webreport_admin",$conn);
foreach($arr as $val)
{
	db_exec("insert into webreport_admin (tablename,db_type,group_name) values ('".db_addslashes($val["table"])."','".$val["db_type"]."','".db_addslashes($val["group"])."')",$conn);
}
echo "OK";
?>