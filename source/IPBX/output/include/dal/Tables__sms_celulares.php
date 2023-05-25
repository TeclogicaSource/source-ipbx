<?php
$dalTablesms_celulares = array();
$dalTablesms_celulares["id_celular"] = array("type"=>3,"varname"=>"id_celular");
$dalTablesms_celulares["dsc_nome"] = array("type"=>200,"varname"=>"dsc_nome");
$dalTablesms_celulares["telefone"] = array("type"=>200,"varname"=>"telefone");
$dalTablesms_celulares["id_grupo"] = array("type"=>3,"varname"=>"id_grupo");
	$dalTablesms_celulares["id_celular"]["key"]=true;

$dal_info["Tables__sms_celulares"] = &$dalTablesms_celulares;
?>