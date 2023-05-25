<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da alteraчуo
insereMensagem("Alteraчуo realizada no plano de discagem.");
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_plano_disc";


































// Edit page: Before process
function BeforeProcessEdit(&$conn)
{


;
} // function BeforeProcessEdit
$arrEventTables["BeforeProcessEdit"]="ipbx_plano_disc";











































// List page: Before process
function BeforeProcessList(&$conn)
{


/*
// Inclusуo das interfaces de geraчуo
include_once './include/teclogica/gerador_interf.php';

// Geraчуo do plano de discagem.
geraPlanoDiscagem();
*/
;
} // function BeforeProcessList
$arrEventTables["BeforeProcessList"]="ipbx_plano_disc";













































?>