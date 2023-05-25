<?php













// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


// Remove arquivos de audio.
$dst_for_arq=substr($deleted_values["arq_audio"], -3)."gsm";
exec('/usr/bin/sudo /bin/rm -f /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$dst_for_arq.'"');
$dst_msg_arq=substr($deleted_values["arq_audio"], -3)."gsm";
exec('/usr/bin/sudo /bin/rm -f /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$dst_msg_arq.'"');


//**********  deleta dados na tabela de filas  ************
global $conn;
$strSQLInsert = "delete from queue_table where name='".$deleted_values["nm_fila"]."'";
db_exec($strSQLInsert,$conn);


// Chamada externa para popular tela da secretária.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');

;
} // function AfterDelete
$arrEventTables["AfterDelete"]="cc_receptivo_filas";













































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{

//**********  Verifica se existe agente nesta fila ************
global $conn;
$strSQLExists = "select * from cc_receptivo_agentes where id_fila='".$deleted_values["id_filas"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message="Existe agentes nesta fila, favor remover os agentes da fila.";
   $retorno=false;
}
else
{
	$retorno=true;
}

if ($retorno){
	//**********  Verifica  se a fila  esta cadastrada no menu de atendimento  ************
	global $conn;
	$strSQLExists = "select * from cc_menu_atend_item where rdb_opcao='Fila' and id_cod_gen=".$deleted_values["id_filas"];
	$rsExists = db_query($strSQLExists,$conn);
	$data=db_fetch_array($rsExists);
	if($data)
	{
		$message="Não é possivel remover a fila ".$deleted_values["nm_fila"].", esta sendo utilizanda no menu de atendimento.";
		$retorno=false;
	}
	else
	{
		$retorno=true;
	}
}

// Retorna informação para o usuário
return $retorno;


;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_receptivo_filas";













































// After record added
function AfterAdd(&$values,&$keys,$inline)
{


//Inserir dados na tabela de filas 
global $conn;
if ($values["gravacao"] == 1)	{
	$strSQLInsert = "insert into queue_table (name, strategy, timeout, monitor_format) values ('".$values["nm_fila"]."','".$values["estrategia"]."','".$values['tp_toques']."', 'gsm')";
}else	{
	$strSQLInsert = "insert into queue_table (name, strategy, timeout) values ('".$values["nm_fila"]."','".$values["estrategia"]."', '".$values['tp_toques']."')";
}
db_exec($strSQLInsert,$conn);


// Update MaxLen (tamanho da fila da tabela queue_table)
$updateMaxLen = "update queue_table set maxlen=".$values['maxlen']." where name='".$values["nm_fila"]."'";
db_exec($updateMaxLen,$conn);

// Update MaxLen (tamanho da fila da tabela queue_table)
$updateWrapUpTime = "update queue_table set wrapuptime=".$values['wrapuptime']." where name='".$values["nm_fila"]."'";
db_exec($updateWrapUpTime,$conn);


if ($values["arq_audio"] != ""){

	//Executa conversão para arquivo de audio GSM.
	$arq_dst=("Fila_for_".$values["id_filas"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'"');
	$arq_wav=("Fila_for_".$values["id_filas"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_wav.'"');

	//Atualiza nome do arquivo de audio no banco de dados
	global $conn;
	$strSQLInsert = "update cc_receptivo_filas set arq_audio='".$arq_wav."' where id_filas='".$values["id_filas"]."'";
	db_exec($strSQLInsert,$conn);
}


if ($values["arq_mesg"] != ""){

	//Executa conversão para arquivo de audio GSM.
	$arq_msg_dst=("Fila_msg_".$values["id_filas"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_msg_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_msg_dst.'"');
	$arq_msg_wav=("Fila_msg_".$values["id_filas"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_msg_wav.'"');

	//Atualiza nome do arquivo de audio no banco de dados 
	global $conn;
	$strSQLInsert = "update cc_receptivo_filas set arq_mesg='".$arq_msg_wav."' where id_filas='".$values["id_filas"]."'";
	db_exec($strSQLInsert,$conn);
}

// Chamada externa para popular tela da secretária.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="cc_receptivo_filas";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


//**********  altera dados na tabela de filas  ************
global $conn;
$strSQLInsert = "update queue_table set name='".$values["nm_fila"]."' , timeout='".$values['tp_toques']."' where name='".$oldvalues["nm_fila"]."'";
db_exec($strSQLInsert,$conn);

//**********  altera dados na tabela de filas  ************
global $conn;
$strSQLInsert = "update queue_table set strategy='".$values["estrategia"]."' where name='".$values["nm_fila"]."'";
db_exec($strSQLInsert,$conn);

//**********  altera dados na tabela de filas  ************
global $conn;
if ($values["gravacao"] == 1){
	$strSQLInsert = "update queue_table set monitor_format='gsm' where name='".$values["nm_fila"]."'";
}else{
	$strSQLInsert = "update queue_table set monitor_format=null where name='".$values["nm_fila"]."'";
}
db_exec($strSQLInsert,$conn);


if ($values["arq_audio"] != ""){

	//Executa conversão para arquivo de audio GSM.
	$arq_dst=("Fila_for_".$values["id_filas"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_dst.'"');
	$arq_wav=("Fila_for_".$values["id_filas"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_audio"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_wav.'"');

	//Atualiza nome do arquivo de audio no banco de dados
	global $conn;
	$strSQLInsert = "update cc_receptivo_filas set arq_audio='".$arq_wav."' where id_filas='".$values["id_filas"]."'";
	db_exec($strSQLInsert,$conn);
}


if ($values["arq_mesg"] != ""){

	//Executa conversão para arquivo de audio GSM.
	$arq_msg_dst=("Fila_msg_".$values["id_filas"].".gsm");
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_msg_dst.'" resample -ql');
	exec('/usr/bin/sudo /usr/bin/sox /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" -r 8000 /var/lib/asterisk/sounds/pt_BR/media/gsm/"'.$arq_msg_dst.'"');
	$arq_msg_wav=("Fila_msg_".$values["id_filas"].".wav");
	exec('/usr/bin/sudo /bin/mv /var/lib/asterisk/sounds/pt_BR/media/"'.$values["arq_mesg"].'" /var/lib/asterisk/sounds/pt_BR/media/"'.$arq_msg_wav.'"');

	//Atualiza nome do arquivo de audio no banco de dados 
	global $conn;
	$strSQLInsert = "update cc_receptivo_filas set arq_mesg='".$arq_msg_wav."' where id_filas='".$values["id_filas"]."'";
	db_exec($strSQLInsert,$conn);
}

// Update MaxLen (tamanho da fila da tabela queue_table)
$updateMaxLen = "update queue_table set maxlen=".$values['maxlen']." where name='".$values["nm_fila"]."'";
db_exec($updateMaxLen,$conn);

// Update MaxLen (tamanho da fila da tabela queue_table)
$updateWrapUpTime = "update queue_table set wrapuptime=".$values['wrapuptime']." where name='".$values["nm_fila"]."'";
db_exec($updateWrapUpTime,$conn);

// Chamada externa para popular tela da secretária.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');



;
} // function AfterEdit
$arrEventTables["AfterEdit"]="cc_receptivo_filas";








































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


// Verifica se o arquivo que esta sendo inserido é arquivo wav.
$wrk_str=strtolower(substr($values["arq_mesg"], -3)); 

if ( $wrk_str == "wav" || $values["arq_mesg"] == "" ){
	$retorno=true;
}else{
	$message="Arquivo de audio invalido, favor adicionar somente arquivos WAV.";
	$retorno=false;
}  
	


if ($retorno) {
	// Verifica se o arquivo que esta sendo inserido é arquivo wav.
	$wrk_str=strtolower(substr($values["arq_audio"], -3)); 

	if ( $wrk_str == "wav" || $values["arq_audio"] == "" ){
		$retorno=true;
	}else{
		$message="Arquivo de audio invalido, favor adicionar somente arquivos WAV.";
		$retorno=false;
	}  
}	

if ($retorno) {
	//**********  Verifica se o nome da fila é unico  ************
	global $conn;
	$strSQLExists = "select * from cc_receptivo_filas where nm_fila='".$values["nm_fila"]."'";
	$rsExists = db_query($strSQLExists,$conn);
	$data=db_fetch_array($rsExists);
	if($data)
	{
		$message="Nome de fila [".$values["nm_fila"]."] ja existe, favor alterar o nome.";
		$retorno=false;
	}
	else
	{
		$retorno=true;
	}
}

return $retorno;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="cc_receptivo_filas";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{


//**********  Verifica se o nome da fila é unico  ************
global $conn;
$strSQLExists = "select * from cc_receptivo_filas where nm_fila='".$values["nm_fila"]."' and id_filas <> '".$oldvalues["id_filas"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
	{
		$message="Nome de fila [".$values["nm_fila"]."] ja existe, favor alterar o nome.";
		return false;
	}
else
	{	
		if ($values['tp_excedido']) {
			if($values['acao_tp_excedido']) {
				return true;
			} else {
				$message = '<font color=red> Por favor, escolha um desvio para o tempo excedido. </font>';
				return false;
			}
		}
		return true;
	}

;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="cc_receptivo_filas";































?>