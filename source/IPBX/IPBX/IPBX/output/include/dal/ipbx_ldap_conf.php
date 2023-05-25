<?php
$dalTableipbx_ldap_conf = array();
$dalTableipbx_ldap_conf["id_ldap"] = array("type"=>3,"varname"=>"id_ldap");
$dalTableipbx_ldap_conf["tp_ldap"] = array("type"=>200,"varname"=>"tp_ldap");
$dalTableipbx_ldap_conf["flg_ativo"] = array("type"=>2,"varname"=>"flg_ativo");
$dalTableipbx_ldap_conf["dsc_conf"] = array("type"=>200,"varname"=>"dsc_conf");
$dalTableipbx_ldap_conf["port"] = array("type"=>3,"varname"=>"port");
$dalTableipbx_ldap_conf["ip_server"] = array("type"=>200,"varname"=>"ip_server");
$dalTableipbx_ldap_conf["ou_usuarios"] = array("type"=>200,"varname"=>"ou_usuarios");
$dalTableipbx_ldap_conf["filtro"] = array("type"=>200,"varname"=>"filtro");
$dalTableipbx_ldap_conf["ad_usuario"] = array("type"=>200,"varname"=>"ad_usuario");
$dalTableipbx_ldap_conf["ad_senha"] = array("type"=>200,"varname"=>"ad_senha");
$dalTableipbx_ldap_conf["ad_dominio"] = array("type"=>200,"varname"=>"ad_dominio");
$dalTableipbx_ldap_conf["flg_padrao"] = array("type"=>2,"varname"=>"flg_padrao");
	$dalTableipbx_ldap_conf["id_ldap"]["key"]=true;
$dal_info["ipbx_ldap_conf"]=&$dalTableipbx_ldap_conf;

?>