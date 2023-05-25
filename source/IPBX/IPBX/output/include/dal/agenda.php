<?php
$dalTableagenda = array();
$dalTableagenda["idt_agenda"] = array("type"=>3,"varname"=>"idt_agenda");
$dalTableagenda["Nome"] = array("type"=>200,"varname"=>"Nome");
$dalTableagenda["Numero"] = array("type"=>200,"varname"=>"Numero");
$dalTableagenda["idt_custo"] = array("type"=>3,"varname"=>"idt_custo");
$dalTableagenda["tp_retorno"] = array("type"=>3,"varname"=>"tp_retorno");
$dalTableagenda["solicitante"] = array("type"=>200,"varname"=>"solicitante");
$dalTableagenda["empresa"] = array("type"=>200,"varname"=>"empresa");
	$dalTableagenda["idt_agenda"]["key"]=true;
$dal_info["agenda"]=&$dalTableagenda;

?>