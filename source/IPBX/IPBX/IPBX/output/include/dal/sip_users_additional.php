<?php
$dalTablesip_users_additional = array();
$dalTablesip_users_additional["id_additional"] = array("type"=>3,"varname"=>"id_additional");
$dalTablesip_users_additional["name"] = array("type"=>200,"varname"=>"name");
$dalTablesip_users_additional["trc_piloto"] = array("type"=>200,"varname"=>"trc_piloto");
$dalTablesip_users_additional["mail"] = array("type"=>200,"varname"=>"mail");
$dalTablesip_users_additional["call_forward"] = array("type"=>200,"varname"=>"call_forward");
$dalTablesip_users_additional["flg_fax"] = array("type"=>3,"varname"=>"flg_fax");
$dalTablesip_users_additional["flg_grava"] = array("type"=>3,"varname"=>"flg_grava");
	$dalTablesip_users_additional["id_additional"]["key"]=true;
$dal_info["sip_users_additional"]=&$dalTablesip_users_additional;

?>