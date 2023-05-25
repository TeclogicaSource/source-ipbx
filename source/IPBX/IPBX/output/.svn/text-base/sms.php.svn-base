<?php
function sms($id_cliente,$id_noticia) {
exec("sudo /etc/asterisk/modulo/sms.sh ${id_cliente} ${id_noticia}");
}

sms($_REQUEST['cliente'],$_REQUEST['noticia']);
?>

