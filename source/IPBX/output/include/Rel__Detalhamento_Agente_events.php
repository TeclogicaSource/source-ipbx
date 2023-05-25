<?php













































function Rel__Detalhamento_Agente_Snippet1(&$params)
{
// Put your code here.
// echo "Teste:[".round($page_totaltp_espera_avg,2)."]";

;
}




































// Report page: Before SQL query
function BeforeQueryReport(&$strWhereClause)
{


// Recalcula ultimo dia
if ( !is_null($strWhereClause) || !empty($strWhereClause)){
	global $conn;
	$strSQLInsert = "call p_proc_calculo_detalhado_agentes;";
	db_exec($strSQLInsert,$conn);
}

;
} // function BeforeQueryReport
$arrEventTables["BeforeQueryReport"]="Rel. Detalhamento Agente";











?>