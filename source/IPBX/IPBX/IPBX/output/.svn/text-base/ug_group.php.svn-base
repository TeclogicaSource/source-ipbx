<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 


if(!@$_SESSION["UserID"])
{ 
	return;
}
if(!IsAdmin())
{
	return;
}






if(@$_GET["a"]=="add")
{
	$sql ="insert into `ipbx_uggroups` (Label) values ('".db_addslashes(postvalue("name"))."')";
	db_exec($sql,$conn);
	$sql = "select max(GroupID) from `ipbx_uggroups`";
	$rs=db_query($sql,$conn);
	$data=db_fetch_numarray($rs);
	echo "ok";
	echo $data[0];
}

if(postvalue("a")=="del")
{
	$sql ="delete from `ipbx_uggroups` where GroupID=".(postvalue("id")+0);
	db_exec($sql,$conn);
	$sql ="delete from `ipbx_ugrights` where GroupID=".(postvalue("id")+0);
	db_exec($sql,$conn);
	$sql ="delete from `ipbx_ugmembers` where GroupID=".(postvalue("id")+0);
	db_exec($sql,$conn);
	echo "ok";
}


if(postvalue("a")=="rename")
{
	$sql ="update `ipbx_uggroups` set Label='".db_addslashes(postvalue("name"))."' where GroupID=".(postvalue("id")+0);
	db_exec($sql,$conn);
	echo "ok";
}
