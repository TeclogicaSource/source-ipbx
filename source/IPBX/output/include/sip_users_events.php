<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{


//**********  Adiciona na tabela voicemail o correio de voz do usuário  ************
global $conn;
$strSQLInsert = "insert into voicemail_users (customer_id, context, mailbox, password, fullname) values ('ipbx','default','".$values["name"]."','".$values["name"]."','".$values["callerid"]."')";
db_exec($strSQLInsert,$conn);

//**********  Altera valor do callgroup  ************
global $conn;
$strSQLInsert = "update sip_users set callgroup='".$values["pickupgroup"]."' where name='".$values["name"]."'";
db_exec($strSQLInsert,$conn);

//**********  Altera valor do mailbox  ************
global $conn;
$strSQLInsert = "update sip_users set mailbox='".$values["name"]."@default' where name='".$values["name"]."'";
db_exec($strSQLInsert,$conn);


//**********  Altera ramal autorizado  ************
global $conn;
$strSQLInsert = "update ramal_autorizado set flg_disp=0 where ramal=".$values["name"];
db_exec($strSQLInsert,$conn);

exec('/usr/bin/sudo /usr/bin/gen_button.sh');


//**********  inserir  dados no sip additional ou detalhamento ************
global $conn;
$strSQLInsert = "insert into sip_users_additional (name) values ('".$values["name"]."')";
db_exec($strSQLInsert,$conn);

//**********  inserir  dados no desvio ************
global $conn;
$strSQLInsert = "insert into desvios (ramal) values ('".$values["name"]."')";
db_exec($strSQLInsert,$conn);

//**********  Redireciona para a pagina de inicio  ************
header("Location: sip_users_list.php");
exit();


;
} // function AfterAdd
$arrEventTables["AfterAdd"]="sip_users";
















































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
global $conn;
$strSQLInsert = "update ramal_autorizado set flg_disp=1 where ramal=".$deleted_values["name"];
db_exec($strSQLInsert,$conn);


exec('/usr/bin/sudo /usr/bin/gen_button.sh');

// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="sip_users";

















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{



exec('/usr/bin/sudo /usr/bin/gen_button.sh');



//**********  Altera valor do callgroup  ************
global $conn;
$strSQLInsert = "update sip_users set callgroup='".$values["pickupgroup"]."' where name='".$values["name"]."'";
db_exec($strSQLInsert,$conn);

//**********  Redireciona para a pagina de inicio  ************
header("Location: sip_users_list.php");
exit();

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="sip_users";










































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
$arrEventTables["BeforeDelete"]="sip_users";


































?>