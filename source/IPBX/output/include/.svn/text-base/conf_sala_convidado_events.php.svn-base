<?php
























































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


if ((($values["nm_convidado"] == '')||($values["e-mail"] == ''))&&($values["nm_convidado_interno"] == '')){
   $message = "Informar nome do convidado e correio eletrônico.";
	return false;
}else{
	return true;
}


;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="conf_sala_convidado";




































?>