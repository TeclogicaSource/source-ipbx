<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{


// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';
generateFopData();
// Chamada externa para popular tela da secret�ria.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_painel_op";









































// After record added
function AfterAdd(&$values,&$keys,$inline)
{


// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';
generateFopData();
// Chamada externa para popular tela da secret�ria.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_painel_op";



































?>