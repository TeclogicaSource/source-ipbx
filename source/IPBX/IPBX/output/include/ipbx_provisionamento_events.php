<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{


// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

// Ser� utilizado comunica��o com o banco de dados
global $conn;

// Pedido para gerar provisionamento
geraProvisionamento ();
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_provisionamento";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

// Ser� utilizado comunica��o com o banco de dados
global $conn;


// Pedido para gerar provisionamento
geraProvisionamento ();
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_provisionamento";






























?>