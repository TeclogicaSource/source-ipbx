<?php















// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

$values["id_saida"]=trim($values["id_saida"]);

if (strlen($values["secret"]) >= 8 || $oldvalues["secret"] == $values["secret"]){
   if ($values["tp_ramal"] == 'RAMAL'){
		if (($values["allow"] != '') || ( $values["allow"] == '' && $values["ident_interf"] != '')){
			return true;	
		}else{
			$message="<font color=red> Favor identificar no campo Codec qual o tipo que irá trabalhar.</font>";
		}
   }else{
		return true;
	}
}else{
	$message="<font color=red>Favor informar uma senha maior ou igual a 8 dígitos </font>";
	return false;
}


;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_ramais";











































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


//**********  Verifica  se o Ramal  esta cadastrado no menu de atenedimento  ************
global $conn;
$strSQLExists = "select * from cc_menu_atend_item where rdb_opcao='Ramal' and id_cod_gen=".$deleted_values["name"];
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message="Não é possivel remover o ramal ".$deleted_values["name"].", ramal esta sendo utilizando no menu de atendimento.";
   return false;
}
else
{
	return true;
}

;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="ipbx_ramais";















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


//**********  Adiciona na tabela voicemail o correio de voz do usuário  ************
global $conn;
$strSQLInsert = "delete from voicemail_users where mailbox='".$deleted_values["name"]."'";
db_exec($strSQLInsert,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "delete from cadeado where ramal=".$deleted_values["name"];
db_exec($strSQLInsert,$conn);



//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "delete from desvios where ramal=".$deleted_values["name"];
db_exec($strSQLInsert,$conn);



//**********  Insert a record into another table  ************
/*
global $conn;
$strSQLInsert = "update ramal_autorizado set flg_disp=1 where ramal=".$deleted_values["name"];
db_exec($strSQLInsert,$conn);
*/

// Chamada externa para popular tela da secretária.
exec('/usr/bin/sudo /usr/bin/gen_button.sh');

;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_ramais";

















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclusão das interfaces de geração
include_once './include/teclogica/funcoes_gerais.php';

// Inclusão das interfaces de geração
include_once './include/teclogica/gerador_interf.php';

// Será utilizado comunicação com o banco de dados
global $conn;

// Alterar o valor do grupo de chamadas
$strSQLInsert = "update ipbx_ramais set callgroup='".$values["pickupgroup"]."' where name='".$values["name"]."'";
db_exec($strSQLInsert,$conn);

// Adiciona na tabela voicemail o correio de voz do usuário
//$strSQLInsert = "insert into voicemail_users (customer_id, context, mailbox, password, fullname) values ('ipbx','default','".$values["name"]."','".$values["name"]."','".$values["callerid"]."')";

$strSQLExists = "select * from voicemail_users where mailbox='".$values["name"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
   // Caso o cadastro exista realiza a atualização do cadastro
	$strSQLInsert = "update voicemail_users set customer_id ='ipbx', context ='default', mailbox ='".$values["name"]."', password ='".$values["name"]."',  fullname='".$values["callerid"]."', email = '".$values['mail']."' where mailbox = '".$values["name"]."'";
	db_exec($strSQLInsert,$conn);

	// Altera valor do mailbox
	global $conn;
	$strSQLInsert = "update ipbx_ramais set mailbox='".$values["name"]."@default' where name='".$values["name"]."'";
	db_exec($strSQLInsert,$conn);
}
else
{
	// Adiciona na tabela voicemail o correio de voz do usuário
	global $conn;
	$strSQLInsert = "insert into voicemail_users (customer_id, context, mailbox, password, fullname, email) values ('ipbx','default','".$values["name"]."','".$values["name"]."','".$values["callerid"]."','".$values["mail"]."')";
	db_exec($strSQLInsert,$conn);

	// Altera valor do mailbox
	global $conn;
	$strSQLInsert = "update ipbx_ramais set mailbox='".$values["name"]."@default' where name='".$values["name"]."'";
	db_exec($strSQLInsert,$conn);
}




// Caso o tipo do ramal for diferente de ramal, 
if ( $values["tp_ramal"] != "RAMAL" || $values["id_interf"] != "") {

  global $conn;
  $strSQLInsert = "update ipbx_ramais set allow = '' where name='".$values["name"]."'";
  db_exec($strSQLInsert,$conn);

}


// Recriar ramais de usuários.
geraSaidaInterface();
generateFopData();
//Geração interfaces entrada
geraEntradasInterface();

// Pedido para gerar provisionamento
geraProvisionamento ();

// Chamada externa para popular tela da secretária.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh &');



//**********  Redireciona para a pagina de inicio  ************
header("Location: ipbx_ramais_list.php");
exit();
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_ramais";












































































?>