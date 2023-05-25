<?php


































// Report page: Before display
function BeforeShowReport(&$xt,&$templatefile)
{

/*
echo "--------- Teste -----------";
echo $xt[xt_vars][global_totalReceb__avg]."<>";
echo "--------- Teste -----------";

echo $xt->getvar("global_totalReceb__avg");
exit;

print_r($xt->xt_vars);
exit;
print_r($xt);
exit;
*/

$MediaRecebidas=$xt->getvar("global_totalReceb__avg");
$xt->assign("global_totalReceb__avg", round($MediaRecebidas,2));

$MediaAtendida=$xt->getvar("global_totalAtend__avg");
$xt->assign("global_totalAtend__avg", round($MediaAtendida,2));

$MediaAbandono=$xt->getvar("global_totalAband__avg");
$xt->assign("global_totalAband__avg", round($MediaAbandono,2));
;
} // function BeforeShowReport
$arrEventTables["BeforeShowReport"]="Rel Produtividade da Fila";















































// Report page: Before SQL query
function BeforeQueryReport(&$strWhereClause)
{


// Recalcula ultimo dia
if ( !is_null($strWhereClause) || !empty($strWhereClause)){
	global $conn;
	$strSQLInsert = "call p_proc_calculo_v_produt_filas;";
	db_exec($strSQLInsert,$conn);
}

;
} // function BeforeQueryReport
$arrEventTables["BeforeQueryReport"]="Rel Produtividade da Fila";











?>