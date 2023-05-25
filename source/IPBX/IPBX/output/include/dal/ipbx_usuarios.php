<?php
$dalTableipbx_usuarios = array();
$dalTableipbx_usuarios["id_usuario"] = array("type"=>3,"varname"=>"id_usuario");
$dalTableipbx_usuarios["name"] = array("type"=>200,"varname"=>"name");
$dalTableipbx_usuarios["accountcode"] = array("type"=>200,"varname"=>"accountcode");
$dalTableipbx_usuarios["call-limit"] = array("type"=>2,"varname"=>"call_limit");
$dalTableipbx_usuarios["callgroup"] = array("type"=>200,"varname"=>"callgroup");
$dalTableipbx_usuarios["callerid"] = array("type"=>200,"varname"=>"callerid");
$dalTableipbx_usuarios["context"] = array("type"=>200,"varname"=>"context");
$dalTableipbx_usuarios["pickupgroup"] = array("type"=>200,"varname"=>"pickupgroup");
$dalTableipbx_usuarios["secret"] = array("type"=>200,"varname"=>"secret");
$dalTableipbx_usuarios["allow"] = array("type"=>200,"varname"=>"allow");
$dalTableipbx_usuarios["id_horario"] = array("type"=>3,"varname"=>"id_horario");
	$dalTableipbx_usuarios["id_usuario"]["key"]=true;
$dal_info["ipbx_usuarios"]=&$dalTableipbx_usuarios;

?>