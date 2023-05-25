<?php
$dalTableconf_sala_convidado = array();
$dalTableconf_sala_convidado["id_convidado"] = array("type"=>3,"varname"=>"id_convidado");
$dalTableconf_sala_convidado["id_conf"] = array("type"=>200,"varname"=>"id_conf");
$dalTableconf_sala_convidado["nm_convidado"] = array("type"=>200,"varname"=>"nm_convidado");
$dalTableconf_sala_convidado["e-mail"] = array("type"=>200,"varname"=>"e_mail");
$dalTableconf_sala_convidado["nm_convidado_interno"] = array("type"=>200,"varname"=>"nm_convidado_interno");
	$dalTableconf_sala_convidado["id_convidado"]["key"]=true;

$dal_info["Tables__conf_sala_convidado"] = &$dalTableconf_sala_convidado;
?>