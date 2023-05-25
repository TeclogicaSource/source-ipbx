<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{



//Executa conversão para arquivo de audio GSM

if ($values["arq_audio"] != ""){
	$arq_dst=("Menu_".$values["id_menu"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'"');
	$arq_wav=("Menu_".$values["id_menu"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_wav.'"');
}

// Atualiza nome do arquivo de audio no banco de dados
if ($values["arq_audio"] != ""){
	global $conn;
	$strSQLInsert = "update cc_menu_atend set arq_audio='".$arq_wav."' where id_menu='".$values["id_menu"]."'";
	db_exec($strSQLInsert,$conn);
}



;
} // function AfterAdd
$arrEventTables["AfterAdd"]="cc_menu_atend";
















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{




// Remove arquivo de audio.
$pos=strlen($deleted_values["arq_audio"]);
$dst_arq=substr($deleted_values["arq_audio"], 0, $pos - 3)."gsm";
exec('/usr/bin/sudo /bin/rm -f /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$dst_arq.'"');

//**********  Deleta opções de menu  ************
global $conn;
$strSQLInsert = "delete from cc_menu_atend_item where id_menu = '".$deleted_values["id_menu"]."'";
db_exec($strSQLInsert,$conn);


;
} // function AfterDelete
$arrEventTables["AfterDelete"]="cc_menu_atend";

















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


if ($values["arq_audio"] != ""){
	//Executa conversão para arquivo de audio GSM.
	$arq_dst=("Menu_".$values["id_menu"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'"');
	$arq_wav=("Menu_".$values["id_menu"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_wav.'"');

	//**********  Atualiza nome do arquivo de audio no banco de dados  ************
	global $conn;
	$strSQLInsert = "update cc_menu_atend set arq_audio='".$arq_wav."' where id_menu='".$values["id_menu"]."'";
	db_exec($strSQLInsert,$conn);
}

//**********  Verifica se o menu deletado utiliza um ramal de acesso  ************
/*
if ($oldvalues["ramal_acesso"] != ""){
	global $conn;
	$strSQLInsert = "update ramal_autorizado set flg_disp=1 where ramal=".$oldvalues["ramal_acesso"];
	db_exec($strSQLInsert,$conn);
}

if ($values["ramal_acesso"] != ""){
	global $conn;
	$strSQLInsert = "update ramal_autorizado set flg_disp=0 where ramal=".$values["ramal_acesso"];
	db_exec($strSQLInsert,$conn);
}
*/

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="cc_menu_atend";








































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


// Verifica se o arquivo que esta sendo inserido é arquivo wav.
$wrk_str=strtolower(substr($values["arq_audio"], -3)); 

if ( $wrk_str == "wav" || $values["arq_audio"] == "" ){
	return true;
}else{
	$message="Arquivo de audio invalido, favor adicionar somente arquivos WAV.";
	return false;
}  
	

	
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="cc_menu_atend";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{



// Verifica se o arquivo que esta sendo inserido é arquivo wav.
$wrk_str=strtolower(substr($values["arq_audio"], -3)); 

if ( $wrk_str == "wav" || $values["arq_audio"] == "" ){
   
	return true;
}else{
   $message="Arquivo de audio invalido, favor adicionar somente arquivos WAV.";
   return false;
}  


;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="cc_menu_atend";











































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from cc_menu_atend_item where rdb_opcao='Menu' and id_cod_gen='".$deleted_values["id_menu"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message="Menu sendo utilizado por outro menu, favor verificar itens de submenu";	
	return false;
}
else
{
	return true;
}





;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_menu_atend";


































?>