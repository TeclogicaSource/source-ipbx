<?php
function dial($origem, $destino) {

$flg01=0;
$timeout=30;
$can01="";
$cid01="";
$lnk01="";
$ext01=0;
$dur01=0;
#
$socket = fsockopen("localhost","5038", $errno, $errstr, $timeout);
if (!$socket)
{
        die("           Erro no open do socket\n");
}
fputs($socket, "Action: Login\r\n");
fputs($socket, "UserName: admin\r\n");
fputs($socket, "Secret: ast_pass\r\n\r\n");
fputs($socket, "Action: Originate\r\n");
fputs($socket, "Context: CONTATOS\r\n");
fputs($socket, "Exten: $destino\r\n");
fputs($socket, "Priority: 1\r\n");
fputs($socket, "Callerid: $origem\r\n");
fputs($socket, "WaitTime: 30\r\n");
fputs($socket, "Channel: SIP/$origem\r\n\r\n");
sleep(6);
fputs($socket, "Action: Logoff\r\n\r\n");
fclose($socket);

}
// print_r($_REQUEST);
// exit;
echo "Numero Discado: [".$_REQUEST['destino']."]";
// dial(trim($_REQUEST['origem']),trim($_REQUEST['destino']));
dial($_REQUEST['origem'],$_REQUEST['destino']);
?>
