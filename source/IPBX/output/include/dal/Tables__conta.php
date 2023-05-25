<?php
$dalTableconta = array();
$dalTableconta["id_conta"] = array("type"=>3,"varname"=>"id_conta");
$dalTableconta["idt_custo"] = array("type"=>3,"varname"=>"idt_custo");
$dalTableconta["origem"] = array("type"=>200,"varname"=>"origem");
$dalTableconta["destino"] = array("type"=>200,"varname"=>"destino");
$dalTableconta["duracao"] = array("type"=>3,"varname"=>"duracao");
$dalTableconta["custo"] = array("type"=>5,"varname"=>"custo");
$dalTableconta["calldate"] = array("type"=>135,"varname"=>"calldate");
$dalTableconta["uniqueid"] = array("type"=>200,"varname"=>"uniqueid");
$dalTableconta["id_interf"] = array("type"=>3,"varname"=>"id_interf");
$dalTableconta["id_contrato"] = array("type"=>3,"varname"=>"id_contrato");
$dalTableconta["mes_referencia"] = array("type"=>3,"varname"=>"mes_referencia");
$dalTableconta["ano_referencia"] = array("type"=>3,"varname"=>"ano_referencia");
	$dalTableconta["id_conta"]["key"]=true;

$dal_info["Tables__conta"] = &$dalTableconta;
?>