<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Conexуo.
global $conn;

//  Busca Interface
$query = mysql_query('select name, callerid, ipbx_interf.board as board, ident_interf as interf 
from ipbx_ramais, ipbx_interf 
where 
ipbx_interf.id_interf = ipbx_ramais.id_interf and 
name = ' .$values['name']) or die(mysql_error());

$result = mysql_fetch_assoc($query);

if($result) {
   mysql_query("update cc_agentes set interface = 'khomp/b{$result['board']}c{$result['interf']}' where name = '{$values['name']}'");
        //fputs($socket, "Channel: khomp/b{$result['board']}c{$result['interf']}/$origem\r\n\r\n");
} else {
        mysql_query("update cc_agentes set interface = 'SIP/{$values['name']}' where name = '{$values['name']}'");
        //fputs($socket, "Channel: SIP/$origem\r\n\r\n");
}


;
} // function AfterAdd
$arrEventTables["AfterAdd"]="cc_agentes";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Conexуo.
global $conn;

//  Busca Interface
$query = mysql_query('select name, callerid, ipbx_interf.board as board, ident_interf as interf 
from ipbx_ramais, ipbx_interf 
where 
ipbx_interf.id_interf = ipbx_ramais.id_interf and 
name = ' .$values['name']) or die(mysql_error());

$result = mysql_fetch_assoc($query);

if($result) {
   mysql_query("update cc_agentes set interface = 'khomp/b{$result['board']}c{$result['interf']}' where name = '{$values['name']}'");
        //fputs($socket, "Channel: khomp/b{$result['board']}c{$result['interf']}/$origem\r\n\r\n");
} else {
        mysql_query("update cc_agentes set interface = 'SIP/{$values['name']}' where name = '{$values['name']}'");
        //fputs($socket, "Channel: SIP/$origem\r\n\r\n");
}

// Retira os espaчos do nome do usuario
$values['nm_agente'] = trim($values['nm_agente']);

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="cc_agentes";








































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


//Verifica se o Agente ja esta cadastrado
global $conn;
$strSQLExists = "select * from cc_agentes where upper(nm_agente)=upper('{$values['nm_agente']}')";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
   $message="Usuсrio jс cadastrado.";
	return false;
}
else
{
	// Realiza a limpeza do nome do agente
	$values['nm_agente'] = trim($values['nm_agente']);
   return true;
}



// Garantir o retorno da alteraчуo
return true;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="cc_agentes";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{


//Verifica se o Agente ja esta cadastrado
global $conn;
$strSQLExists = "select * from cc_agentes where upper(nm_agente)=upper('{$values['nm_agente']}')";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
   if ($oldvalues["nm_agente"] == $values["nm_agente"]){
		// Retira os espaчos do nome do usuario
		$values['nm_agente'] = trim($values['nm_agente']);
	  return true;
   }else{
     $message="Usuсrio jс cadastrado.";
  	  return false;
	}
}
else
{
	// Retira os espaчos do nome do usuario
	$values['nm_agente'] = trim($values['nm_agente']);
   return true;
}

// Retira os espaчos do nome do usuario
$values['nm_agente'] = trim($values['nm_agente']);

// Garantir o retorno da alteraчуo
return true;
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="cc_agentes";











































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


// Aчуo de agentes
include_once './include/teclogica/actions_agents.php';

//global $conn;

$dados=mysql_query("SELECT crf.nm_fila as nm_fila FROM cc_agentes ca, cc_agentes_fila caf, cc_receptivo_filas crf
WHERE ca.idt_agentes = caf.idt_agentes AND caf.id_filas = crf.id_filas AND upper(ca.nm_agente) = upper('{$deleted_values['nm_agente']}')");

while ($logados=mysql_fetch_assoc($dados)){   
	acaoDeslogar($deleted_values["nm_agente"],$logados["nm_fila"]);
}


return true;
;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_agentes";















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


;
} // function AfterDelete
$arrEventTables["AfterDelete"]="cc_agentes";

































?>