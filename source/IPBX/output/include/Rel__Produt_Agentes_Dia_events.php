<?php



































// Report page: Before SQL query
function BeforeQueryReport(&$strWhereClause)
{


// Recalcula ultimo dia
if ( !is_null($strWhereClause) || !empty($strWhereClause)){
	global $conn;
	$strSQLInsert = "call p_proc_calculo_produt_agente_dia;";
	db_exec($strSQLInsert,$conn);
}

;
} // function BeforeQueryReport
$arrEventTables["BeforeQueryReport"]="Rel. Produt. Agentes Dia";











?>