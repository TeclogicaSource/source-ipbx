<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{



if ($values["arq_audio"] != ""){
	//Executa conversão para arquivo de audio GSM.
	$arq_dst=("uraRev_".$values["id_ipbx_ura_rev_msg"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/uraReversa/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/uraReversa/gsm/"'.$arq_dst.'"');
	$arq_wav=("uraRev_".$values["id_ipbx_ura_rev_msg"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$arq_wav.'"');

	//**********  Atualiza nome do arquivo de audio no banco de dados  ************
	global $conn;
	$strSQLInsert = "update ipbx_ura_rev_msg set arq_audio='".$arq_wav."' where id_ipbx_ura_rev_msg='".$values["id_ipbx_ura_rev_msg"]."'";
	db_exec($strSQLInsert,$conn);
}

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_ura_rev_msg";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{



if ($values["arq_audio"] != ""){
	//Executa conversão para arquivo de audio GSM.
	$arq_dst=("uraRev_".$values["id_ipbx_ura_rev_msg"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/uraReversa/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/uraReversa/gsm/"'.$arq_dst.'"');
	$arq_wav=("uraRev_".$values["id_ipbx_ura_rev_msg"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/uraReversa/"'.$arq_wav.'"');

	//**********  Atualiza nome do arquivo de audio no banco de dados  ************
	global $conn;
	$strSQLInsert = "update ipbx_ura_rev_msg set arq_audio='".$arq_wav."' where id_ipbx_ura_rev_msg='".$values["id_ipbx_ura_rev_msg"]."'";
	db_exec($strSQLInsert,$conn);
}

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_ura_rev_msg";











































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Remove arquivo de audio.
$pos=strlen($deleted_values["arq_audio"]);
$dst_arq=substr($deleted_values["arq_audio"], 0, $pos - 3)."gsm";
exec('/usr/bin/sudo /bin/rm -f /var/lib/asterisk/sounds/pt_BR/uraReversa/gsm/"'.$dst_arq.'"');
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_ura_rev_msg";

































?>