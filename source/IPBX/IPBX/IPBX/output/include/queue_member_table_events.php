<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Informa ao asterisk que o usuário foi pausado / despausado.
exec ('nohup /usr/bin/sudo /etc/asterisk/modulo/workaround_fila.sh &');

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="queue_member_table";











































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


// Remove usuário da fila
exec ('/usr/bin/sudo /usr/sbin/asterisk -rx "queue remove member '.$deleted_values["interface"].' from '.$deleted_values["queue_name"].'"');

// Informa ao asterisk que o usuário foi pausado / despausado.
exec ('nohup /usr/bin/sudo /etc/asterisk/modulo/workaround_fila.sh &');

// Quando deslogar o usuário, retira a informação de quantidade de ligações
global $conn;
$strSQLInsert = "update sip_users set `call-limit`=1 where name='".$deleted_values["ramal"]."'";
db_exec($strSQLInsert,$conn);

;
} // function AfterDelete
$arrEventTables["AfterDelete"]="queue_member_table";

























































// List page: Before record processed
function BeforeProcessRowList(&$data)
{

if (substr_count($data['interface'], '/') > 1) {
	$data['Ramal'] = 'Agente remoto';
}

return true;
;
} // function BeforeProcessRowList
$arrEventTables["BeforeProcessRowList"]="queue_member_table";






















?>