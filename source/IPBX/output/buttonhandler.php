<?php
include("include/dbcommon.php");
$params = (array)my_json_decode(postvalue('params'));
$buttId = $params['buttId'];

// proccess table events
if($buttId=='New_Button')
{	
	include("include/conf_sala_variables.php");
	include("include/conf_sala_settings.php");	
	buttonHandler_New_Button($params);		
}
if($buttId=='New_Button2')
{	
	include("include/ipbx_plano_disc_variables.php");
	include("include/ipbx_plano_disc_settings.php");	
	buttonHandler_New_Button2($params);		
}
if($buttId=='___')
{	
	include("include/ipbx_pesquisa_ura_rev_variables.php");
	include("include/ipbx_pesquisa_ura_rev_settings.php");	
	buttonHandler____($params);		
}
if($buttId=='_v_')
{	
	include("include/ipbx_pesquisa_ura_rev_variables.php");
	include("include/ipbx_pesquisa_ura_rev_settings.php");	
	buttonHandler__v_($params);		
}
if($buttId=='REMOVER_RAMAL')
{	
	include("include/ipbx_ramais_variables.php");
	include("include/ipbx_ramais_settings.php");	
	buttonHandler_REMOVER_RAMAL($params);		
}
if($buttId=='New_Button1')
{	
	include("include/diag_ipbx_variables.php");
	include("include/diag_ipbx_settings.php");	
	buttonHandler_New_Button1($params);		
}
if($buttId=='New_Button3')
{	
	include("include/diag_ipbx_variables.php");
	include("include/diag_ipbx_settings.php");	
	buttonHandler_New_Button3($params);		
}
if($buttId=='New_Button4')
{	
	include("include/diag_ipbx_variables.php");
	include("include/diag_ipbx_settings.php");	
	buttonHandler_New_Button4($params);		
}
if($buttId=='New_Button5')
{	
	include("include/timeout_variables.php");
	include("include/timeout_settings.php");	
	buttonHandler_New_Button5($params);		
}
if($buttId=='New_Button6')
{	
	include("include/timeout_variables.php");
	include("include/timeout_settings.php");	
	buttonHandler_New_Button6($params);		
}
if($buttId=='New_Button7')
{	
	include("include/diag_ipbx_variables.php");
	include("include/diag_ipbx_settings.php");	
	buttonHandler_New_Button7($params);		
}
if($buttId=='New_Button8')
{	
	include("include/central_variables.php");
	include("include/central_settings.php");	
	buttonHandler_New_Button8($params);		
}
if($buttId=='New_Button9')
{	
	include("include/central_variables.php");
	include("include/central_settings.php");	
	buttonHandler_New_Button9($params);		
}
if($buttId=='Atualizar_Ramais1')
{	
	include("include/ldap_variables.php");
	include("include/ldap_settings.php");	
	buttonHandler_Atualizar_Ramais1($params);		
}
if($buttId=='Restaurar_Backup')
{	
	include("include/Restore_variables.php");
	include("include/Restore_settings.php");	
	buttonHandler_Restaurar_Backup($params);		
}
if($buttId=='New_Button10')
{	
	include("include/ipbx_sincronismo_variables.php");
	include("include/ipbx_sincronismo_settings.php");	
	buttonHandler_New_Button10($params);		
}
if($buttId=='New_Button11')
{	
	include("include/ipbx_ramais_variables.php");
	include("include/ipbx_ramais_settings.php");	
	buttonHandler_New_Button11($params);		
}

// proccess non table events
// create table and non table handlers

function buttonHandler_New_Button($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Contabilização de envios.
$contabiliza=0;

// Put your code here.
//$result["txt"] = $params["txt"]." world!";

// Busca existencia de correios para enviar.
global $conn;
$result_acesso = mysql_query("select * from parametros where nome like 'Acesso_Conference'");

// Requisita informação para a construção do correio (numero de acesso)
while ($linha_acesso = mysql_fetch_assoc($result_acesso)){
   if ( $linha_acesso['nome'] == 'Acesso_Conference' ){
      $acesso_conference = $linha_acesso['valor'];}
}


// Para cada item selecionado, envia correio para a reunião.
foreach($keys as $idx=>$val){


   //Inicializa variaveis
	$conferencia=$val["id_conf"];

	$result_convidado = mysql_query("select * from conf_sala_convidado where id_conf = ".$conferencia);
	$result_sala = mysql_query("select date_format(dt_conferencia, '%d/%m/%Y') as dt_conferencia, hr_inicio, hr_fim, nm_sala, senha, dsc_sala, flg_rec from conf_sala where id_conf = ".$conferencia);

	// Requer as informações da sala de conferencia
	while ($linha_sala = mysql_fetch_assoc($result_sala)){

		// Requer as informações dos convidados.
		while ($linha = mysql_fetch_assoc($result_convidado)){

			// Define os usuários que receberão correio.
			if ($linha['nm_convidado_interno'] != ''){
				$mail=$linha['nm_convidado_interno'];
			}else{
				$mail=$linha['e-mail'];  
			}
			
			$dia_conferencia=$linha_sala['dt_conferencia'];
			$hora_conferencia=$linha_sala['hr_inicio'];
			$hora_fim_conferencia=$linha_sala['hr_fim'];
			$nome_sala=$linha_sala['nm_sala'];
			$senha=$linha_sala['senha'];
			$descricao=$linha_sala['dsc_sala'];
			$flg_grava=$linha_sala['flg_rec'];
			

			// **********  Send simple email  ************
			$email=$mail;
			$from="ipbxconference@teclogica.com.br";
			
$msg="
Prezado usuário, 

Você está recebendo um convite para a reunião que se realizará no dia ".$dia_conferencia.", com horário agendado para
iniciar as ".$hora_conferencia." até ".$hora_fim_conferencia." em uma sala de conferência de voz (instruções abaixo).
\n
Descrição:
".$descricao."

-----------------------------------------------------------------------------
Informações para acesso a sala de conferencia.

Identificador: ".$conferencia."
Nome da sala: ".$nome_sala."
Inicio: ".$dia_conferencia." ".$hora_conferencia."
";

if ($senha){
	$msg.="Senha: ".$senha."
";
}
if ($flg_grava){
   $msg.="ATENÇÃO: A conferencia será gravada."."
";
}

$msg.="
-----------------------------------------------------------------------------

Ligar para ".$acesso_conference.", fornecer o número identificador da conferência e a senha, caso solicitado, no horário especificado.
Aviso: E-mail enviado automaticamente, favor nao responder a este correio. Obrigado.

Sistema de agendamento de conferencia - IPBX.";

			$subject="Reunião sala ".$nome_sala;
			runner_mail(array('to' => $email, 'subject' => $subject, 'body' => $msg, 'from'=>$from));
			$contabiliza=1;
			$result_acesso = mysql_query("update conf_sala set status='Correios enviados' where id_conf=".$conferencia);
		}
	}
}

$result["txt"]=$contabiliza;   ;
	echo my_json_encode($result);
}
function buttonHandler_New_Button2($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
//$result["txt"] = $params["txt"]." world!";

// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Inclusão das interfaces de geração
include_once './include/teclogica/gerador_interf.php';

if ($params["txt"] != "CANCELA"){


	// Geração do plano de discagem.
	geraPlanoDiscagem();

	//Geração interfaces entrada
	geraEntradasInterface();
	generateFopData();
	// Geração de interfaces de saida
	geraSaidaInterface();

	// Deleta avisos de mensagem
	deleteMensagem();

	// Chamada externa para popular tela da secretária.
	exec('/usr/bin/sudo /usr/bin/gen_button.sh');

	// Mensagem de suscesso
	$result["txt"] = "Configurações Efetuadas.";

}else{
	$result["txt"] = "Operação cancelada.";
}
;
	echo my_json_encode($result);
}
function buttonHandler____($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler__v_($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_REMOVER_RAMAL($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	
MYSQL_QUERY("update ipbx_ramais set accountcode = NULL, callgroup=NULL, context=6, allow='alaw', grava_chamada=NULL, tp_ramal='RAMAL', pickupgroup=NULL, id_pesquisa=NULL, desvio=NULL,desvio_ddr=NULL,id_saida=NULL, transbordo=NULL, id_interf=NULL, ident_interf=NULL where name = 1005");



$result["txt"] = $params["txt"]." world!";


;
	echo my_json_encode($result);
}
function buttonHandler_New_Button1($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	header("Location: http://www.google.com.br");;
	echo my_json_encode($result);
}
function buttonHandler_New_Button3($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button4($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	$keys = array();
if ($params["txt"] != "CANCELA"){
	$result["txt"] = "Configurações Efetuadas.";

}else{
	$result["txt"] = "Operação cancelada.";
}
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button5($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button6($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button7($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	$keys['hahah'] = 'gabriel';

$result['txt'] = $params['txt'] . ' adad';;
	echo my_json_encode($result);
}
function buttonHandler_New_Button8($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button9($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
$result["txt"] = $params["txt"]." world!";
;
	echo my_json_encode($result);
}
function buttonHandler_Atualizar_Ramais1($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
global $conn;
mysql_query("update ipbx_ramais ir set callerid = (select l.nm_usuario from ldap l where l.name = ir.name limit 1), mail = (select l.email from ldap l where l.name = ir.name limit 1) where ir.callerid is null or ir.callerid = ''");
$result["txt"] = "Ramais atualizados!";;
	echo my_json_encode($result);
}
function buttonHandler_Restaurar_Backup($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Inicializa variaveis
$id_bkp="";
$result["txt"] = "Adquirindo informações do restore.";

// Para cada item selecionado, envia correio para a reunião.
foreach($keys as $idx=>$val){
   //Inicializa variaveis
	$id_bkp=$val["id_bkp"];
	print_r($keys);
	//$data=$val["dt_backup"];
}


if ($params["txt"] != "CANCELA"){
	if (count($keys) == 1){

		// Restaurar arquivos
		restoreNow($id_bkp);

		// Chamada externa para popular tela da secretária.
		exec('/usr/bin/sudo /usr/bin/gen_button.sh');

		// Mensagem para restauração
		$result["txt"] = "Recuperação concluída.";
	}else{
		$result["txt"] = 'Por favor, escolha um backup ';
	}	
}







;
	echo my_json_encode($result);
}
function buttonHandler_New_Button10($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Put your code here.
//exec('sudo -tt ./include/teclogica/promover_producao.sh');
exec('/var/www/html/include/teclogica/promover_producao.sh 1> /tmp/promover.log 2> promover.err');

$result["txt"] = "Sincronização efetuada";
;
	echo my_json_encode($result);
}
function buttonHandler_New_Button11($params) 
{
	global $strTableName;
	$result = array();
	$keys = array();
	// if sended array of keys
	if (postvalue('keys'))
	{
		$postKeys = (array)my_json_decode(postvalue('keys'));
		
		$tKeysNamesArr = GetTableKeys($strTableName);
		
		if (postvalue('isManyKeys'))
		{
			foreach ($postKeys as $ind=>$value)
			{
				$keys[$ind] = array();
				$recKeyArr = explode('&', $value);
				for($j=0;$j<count($tKeysNamesArr);$j++)
				{
					$keys[$ind][$tKeysNamesArr[$j]] = $recKeyArr[$j];
				}
			}
		}
		else
		{			
			$recKeyArr = explode('&', $postKeys[0]);
			for($j=0;$j<count($tKeysNamesArr);$j++)
			{
				$keys[$tKeysNamesArr[$j]] = $recKeyArr[$j];
			}
		}				
	}
	
	// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Inclusão das interfaces de geração
include_once './include/teclogica/gerador_interf.php';

if ($params["txt"] != "CANCELA"){

	foreach($keys as $idx=>$val){

		//Inicializa variaveis
		$ramal=$val["id"];

		//alteração do ramal no banco de dados.
		global $conn;
		mysql_query("update ipbx_ramais set secret= '". geradorSenha(8) ."', mail = NULL, callerid = NULL, accountcode = NULL, callgroup=NULL, context=6, allow='alaw', grava_chamada=NULL, tp_ramal='RAMAL', pickupgroup=NULL, id_pesquisa=NULL, desvio=NULL,desvio_ddr=NULL,id_saida=NULL, transbordo=NULL, id_interf=NULL, ident_interf=NULL where id =".$ramal);
      mysql_query("delete from voicemail_users where mailbox in (select name from ipbx_ramais  where id=".$ramal.")");
		mysql_query("delete from ipbx_ugmembers where UserName in (select name from ipbx_ramais  where id=".$ramal.")");
		mysql_query("delete from conf_sala where name = (select name from ipbx_ramais  where id=".$ramal.")");
		// Chamada externa para popular tela da secretária.
		exec('/usr/bin/sudo /usr/bin/gen_button.sh');
		// Mensagem de suscesso
		//$result["txt"] = "update ipbx_ramais set accountcode = NULL, callgroup=NULL, context=6, allow='alaw', grava_chamada=NULL, tp_ramal='RAMAL', pickupgroup=NULL, id_pesquisa=NULL, desvio=NULL,desvio_ddr=NULL,id_saida=NULL, transbordo=NULL, id_interf=NULL, ident_interf=NULL where id =".$ramal;
	}
   // Retorno do comando 
	$result["txt"] = "Configurações Efetuadas.";

}else{
	$result["txt"] = "Operação cancelada.";
}

generateFopData();;
	echo my_json_encode($result);
}
?>