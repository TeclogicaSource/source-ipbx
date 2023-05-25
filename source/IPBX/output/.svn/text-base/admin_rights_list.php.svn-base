<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/admin_rights_variables.php");


$gsqlHead="select `name` ";
$gsqlFrom="from `ipbx_ramais`";
$gsqlWhereExpr="";
$gsqlTail="";
// $gstrSQL = "SELECT TableName,   GroupID,   AccessMask  FROM ipbx_ugrights ";
$gstrSQL = gSQLWhere("");


if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!IsAdmin())
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"." <a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	return;
}

include('include/xtempl.php');
include('classes/runnerpage.php');
include('classes/listpage.php');
include('classes/rightspage.php');
$xt = new Xtempl();



$options = array();
//array of params for classes
$options["pageType"] = PAGE_LIST;
$options["id"] = postvalue("id") ? postvalue("id") : 1;
$options["mode"] = RIGHTS_PAGE;
$options['xt'] = &$xt;
$nonAdminTablesRightsArr=array();
$nonAdminTablesArr=array();
$nonAdminTablesArr[] = array("agenda","Contatos Externos");
$nonAdminTablesRightsArr["agenda"]=array();
$nonAdminTablesArr[] = array("centrocusto","Centro de Custo");
$nonAdminTablesRightsArr["centrocusto"]=array();
$nonAdminTablesArr[] = array("cdr","Ligações");
$nonAdminTablesRightsArr["cdr"]=array();
$nonAdminTablesArr[] = array("horario","Horário ligações (Saída)");
$nonAdminTablesRightsArr["horario"]=array();
$nonAdminTablesArr[] = array("contrato_trad","Linha Tradicional");
$nonAdminTablesRightsArr["contrato_trad"]=array();
$nonAdminTablesArr[] = array("contrato_voip","Linha VOIP");
$nonAdminTablesRightsArr["contrato_voip"]=array();
$nonAdminTablesArr[] = array("contrato_gsm","Linha GSM");
$nonAdminTablesRightsArr["contrato_gsm"]=array();
$nonAdminTablesArr[] = array("cadencias","Cadências");
$nonAdminTablesRightsArr["cadencias"]=array();
$nonAdminTablesArr[] = array("VONO","VONO");
$nonAdminTablesRightsArr["VONO"]=array();
$nonAdminTablesArr[] = array("ipbx_audit","Auditoria");
$nonAdminTablesRightsArr["ipbx_audit"]=array();
$nonAdminTablesArr[] = array("sms_celulares","Celulares");
$nonAdminTablesRightsArr["sms_celulares"]=array();
$nonAdminTablesArr[] = array("sms_noticias","Notícias");
$nonAdminTablesRightsArr["sms_noticias"]=array();
$nonAdminTablesArr[] = array("sms_grupo","Grupo");
$nonAdminTablesRightsArr["sms_grupo"]=array();
$nonAdminTablesArr[] = array("cc_receptivo_filas","Filas");
$nonAdminTablesRightsArr["cc_receptivo_filas"]=array();
$nonAdminTablesArr[] = array("cc_menu_atend","Menu de Atendimento");
$nonAdminTablesRightsArr["cc_menu_atend"]=array();
$nonAdminTablesArr[] = array("cc_menu_atend_item","Item de menu");
$nonAdminTablesRightsArr["cc_menu_atend_item"]=array();
$nonAdminTablesArr[] = array("Graf. Atendimento","Atendimento");
$nonAdminTablesRightsArr["Graf. Atendimento"]=array();
$nonAdminTablesArr[] = array("Graf. Atendimento (Mensal)","Atendimento (Mensal)");
$nonAdminTablesRightsArr["Graf. Atendimento (Mensal)"]=array();
$nonAdminTablesArr[] = array("parametros","Parametros");
$nonAdminTablesRightsArr["parametros"]=array();
$nonAdminTablesArr[] = array("Graf. Custo Trad","Custo Linha Tradicional");
$nonAdminTablesRightsArr["Graf. Custo Trad"]=array();
$nonAdminTablesArr[] = array("Graf. Custo Voip","Custo Linha Voip");
$nonAdminTablesRightsArr["Graf. Custo Voip"]=array();
$nonAdminTablesArr[] = array("Graf. Minutagem Trad","Minutagem Tradicional");
$nonAdminTablesRightsArr["Graf. Minutagem Trad"]=array();
$nonAdminTablesArr[] = array("Graf. Minutagem Voip","Minutagem Voip");
$nonAdminTablesRightsArr["Graf. Minutagem Voip"]=array();
$nonAdminTablesArr[] = array("conf_sala","Sala de Conferência");
$nonAdminTablesRightsArr["conf_sala"]=array();
$nonAdminTablesArr[] = array("conf_sala_convidado","Convite da Conferência");
$nonAdminTablesRightsArr["conf_sala_convidado"]=array();
$nonAdminTablesArr[] = array("ipbx_gravacoes","Gravações");
$nonAdminTablesRightsArr["ipbx_gravacoes"]=array();
$nonAdminTablesArr[] = array("Graf. Lig. Discadas","Graf. Lig. Discadas");
$nonAdminTablesRightsArr["Graf. Lig. Discadas"]=array();
$nonAdminTablesArr[] = array("ldap","Ldap");
$nonAdminTablesRightsArr["ldap"]=array();
$nonAdminTablesArr[] = array("timeout","Timeout");
$nonAdminTablesRightsArr["timeout"]=array();
$nonAdminTablesArr[] = array("central","Interfaces");
$nonAdminTablesRightsArr["central"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_vono","Interfaces Vono");
$nonAdminTablesRightsArr["ipbx_interf_vono"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_fxs","Interfaces FXS");
$nonAdminTablesRightsArr["ipbx_interf_fxs"]=array();
$nonAdminTablesArr[] = array("ipbx_canais","Canais");
$nonAdminTablesRightsArr["ipbx_canais"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_e1","Interfaces E1");
$nonAdminTablesRightsArr["ipbx_interf_e1"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_gsm","Interfaces GSM");
$nonAdminTablesRightsArr["ipbx_interf_gsm"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_mslync","Interfaces MS-LYNC");
$nonAdminTablesRightsArr["ipbx_interf_mslync"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_sip","Interfaces SIP");
$nonAdminTablesRightsArr["ipbx_interf_sip"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_voxip","Interfaces VOXIP");
$nonAdminTablesRightsArr["ipbx_interf_voxip"]=array();
$nonAdminTablesArr[] = array("ipbx_plano_disc","Plano de Discagem");
$nonAdminTablesRightsArr["ipbx_plano_disc"]=array();
$nonAdminTablesArr[] = array("ipbx_ramais","Ipbx Ramais");
$nonAdminTablesRightsArr["ipbx_ramais"]=array();
$nonAdminTablesArr[] = array("ipbx_grupo_captura","Grupo de Captura");
$nonAdminTablesRightsArr["ipbx_grupo_captura"]=array();
$nonAdminTablesArr[] = array("ipbx_desv_prefix","Desvio por prefixo");
$nonAdminTablesRightsArr["ipbx_desv_prefix"]=array();
$nonAdminTablesArr[] = array("ipbx_desv_prefix_item","Item do grupo de prefixo");
$nonAdminTablesRightsArr["ipbx_desv_prefix_item"]=array();
$nonAdminTablesArr[] = array("ipbx_call_back","Call Back");
$nonAdminTablesRightsArr["ipbx_call_back"]=array();
$nonAdminTablesArr[] = array("ipbx_conf_grav","Configurações");
$nonAdminTablesRightsArr["ipbx_conf_grav"]=array();
$nonAdminTablesArr[] = array("ipbx_rcv_fax","FAX Recebidos");
$nonAdminTablesRightsArr["ipbx_rcv_fax"]=array();
$nonAdminTablesArr[] = array("ipbx_tx_fax","FAX Enviado");
$nonAdminTablesRightsArr["ipbx_tx_fax"]=array();
$nonAdminTablesArr[] = array("ipbx_send_fax","FAX Envio");
$nonAdminTablesRightsArr["ipbx_send_fax"]=array();
$nonAdminTablesArr[] = array("ipbx_conf_fax","Configuração");
$nonAdminTablesRightsArr["ipbx_conf_fax"]=array();
$nonAdminTablesArr[] = array("ipbx_backup","Backup");
$nonAdminTablesRightsArr["ipbx_backup"]=array();
$nonAdminTablesArr[] = array("Restore","Restore");
$nonAdminTablesRightsArr["Restore"]=array();
$nonAdminTablesArr[] = array("ipbx_ura_rev_conf","Configuração");
$nonAdminTablesRightsArr["ipbx_ura_rev_conf"]=array();
$nonAdminTablesArr[] = array("ipbx_ura_rev_inbound","Inbound");
$nonAdminTablesRightsArr["ipbx_ura_rev_inbound"]=array();
$nonAdminTablesArr[] = array("ipbx_ura_rev_outbound","Outbound");
$nonAdminTablesRightsArr["ipbx_ura_rev_outbound"]=array();
$nonAdminTablesArr[] = array("ipbx_ura_rev_msg","Mensagem");
$nonAdminTablesRightsArr["ipbx_ura_rev_msg"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_callman","Interfaces CallManager (Cisco)");
$nonAdminTablesRightsArr["ipbx_interf_callman"]=array();
$nonAdminTablesArr[] = array("ipbx_tarifa_vc2","Tarifa VC2");
$nonAdminTablesRightsArr["ipbx_tarifa_vc2"]=array();
$nonAdminTablesArr[] = array("Graf. Centro de custo","Gráfico - Centro De Custo");
$nonAdminTablesRightsArr["Graf. Centro de custo"]=array();
$nonAdminTablesArr[] = array("Graf. Custo GSM","Graf. Custo GSM");
$nonAdminTablesRightsArr["Graf. Custo GSM"]=array();
$nonAdminTablesArr[] = array("Graf. Minutagem GSM","Minutagem GSM");
$nonAdminTablesRightsArr["Graf. Minutagem GSM"]=array();
$nonAdminTablesArr[] = array("Rel. Abandonos","Abandonos");
$nonAdminTablesRightsArr["Rel. Abandonos"]=array();
$nonAdminTablesArr[] = array("Rel. Atendimento","Atendimento");
$nonAdminTablesRightsArr["Rel. Atendimento"]=array();
$nonAdminTablesArr[] = array("Rel. Bilhetagem","Bilhetagem");
$nonAdminTablesRightsArr["Rel. Bilhetagem"]=array();
$nonAdminTablesArr[] = array("Rel. Detalhado - Centro de custo","Detalhado - Centro De Custo");
$nonAdminTablesRightsArr["Rel. Detalhado - Centro de custo"]=array();
$nonAdminTablesArr[] = array("Rel. Lig Custo por tronco","Sintético custo por interface");
$nonAdminTablesRightsArr["Rel. Lig Custo por tronco"]=array();
$nonAdminTablesArr[] = array("Rel. Lig. Discadas","Discadas");
$nonAdminTablesRightsArr["Rel. Lig. Discadas"]=array();
$nonAdminTablesArr[] = array("Rel. Recebidas","Recebidas");
$nonAdminTablesRightsArr["Rel. Recebidas"]=array();
$nonAdminTablesArr[] = array("Rel. Simplificado - Centro de custo","Simplificado - Centro De Custo");
$nonAdminTablesRightsArr["Rel. Simplificado - Centro de custo"]=array();
$nonAdminTablesArr[] = array("Graf. Chamadas sem atendimento","Chamadas Sem Atendimento");
$nonAdminTablesRightsArr["Graf. Chamadas sem atendimento"]=array();
$nonAdminTablesArr[] = array("ipbx_pesquisa_ura_rev","Ipbx Pesquisa Ura Rev");
$nonAdminTablesRightsArr["ipbx_pesquisa_ura_rev"]=array();
$nonAdminTablesArr[] = array("Rel. Pesquisa","Pesquisa");
$nonAdminTablesRightsArr["Rel. Pesquisa"]=array();
$nonAdminTablesArr[] = array("Rel. Ura Reversa - Enfileiramento","Rel. Ura Reversa - Enfileiramento");
$nonAdminTablesRightsArr["Rel. Ura Reversa - Enfileiramento"]=array();
$nonAdminTablesArr[] = array("Rel. Pesquisa Reversa","Pesquisa Reversa");
$nonAdminTablesRightsArr["Rel. Pesquisa Reversa"]=array();
$nonAdminTablesArr[] = array("diag_ipbx","Diagnóstico");
$nonAdminTablesRightsArr["diag_ipbx"]=array();
$nonAdminTablesArr[] = array("ipbx_horario_desv_ramais","Ipbx Horario Desv Ramais");
$nonAdminTablesRightsArr["ipbx_horario_desv_ramais"]=array();
$nonAdminTablesArr[] = array("ipbx_horario_desv","Ipbx Horario Desv");
$nonAdminTablesRightsArr["ipbx_horario_desv"]=array();
$nonAdminTablesArr[] = array("ipbx_dt_especifica_feriado","Ipbx Dt Especifica Feriado");
$nonAdminTablesRightsArr["ipbx_dt_especifica_feriado"]=array();
$nonAdminTablesArr[] = array("cc_receptivo_filas_horario_desv_ramais","Cc Receptivo Filas Horario Desv Ramais");
$nonAdminTablesRightsArr["cc_receptivo_filas_horario_desv_ramais"]=array();
$nonAdminTablesArr[] = array("cc_receptivo_filas_horario_desv","Cc Receptivo Filas Horario Desv");
$nonAdminTablesRightsArr["cc_receptivo_filas_horario_desv"]=array();
$nonAdminTablesArr[] = array("ipbx_sincronismo","Ipbx Sincronismo");
$nonAdminTablesRightsArr["ipbx_sincronismo"]=array();
$nonAdminTablesArr[] = array("ipbx_ldap_conf","Ipbx Ldap Conf");
$nonAdminTablesRightsArr["ipbx_ldap_conf"]=array();
$nonAdminTablesArr[] = array("personal_info","Personal Info");
$nonAdminTablesRightsArr["personal_info"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_fxo","Interface FXO");
$nonAdminTablesRightsArr["ipbx_interf_fxo"]=array();
$nonAdminTablesArr[] = array("ipbx_painel_op","Ipbx Painel Op");
$nonAdminTablesRightsArr["ipbx_painel_op"]=array();
$nonAdminTablesArr[] = array("Rel. Centro de custo","Rel. Centro de custo");
$nonAdminTablesRightsArr["Rel. Centro de custo"]=array();
$nonAdminTablesArr[] = array("v_contatos","Contatos");
$nonAdminTablesRightsArr["v_contatos"]=array();
$nonAdminTablesArr[] = array("ipbx_disp_mobile","Aprovação de dispositivos");
$nonAdminTablesRightsArr["ipbx_disp_mobile"]=array();
$nonAdminTablesArr[] = array("cc_tipos_pausa","Cadastro Pausa");
$nonAdminTablesRightsArr["cc_tipos_pausa"]=array();
$nonAdminTablesArr[] = array("ipbx_interf_sip_generica","Interface SIP Genérica");
$nonAdminTablesRightsArr["ipbx_interf_sip_generica"]=array();
$nonAdminTablesArr[] = array("cc_agentes_fila","Agentes Fila");
$nonAdminTablesRightsArr["cc_agentes_fila"]=array();
$nonAdminTablesArr[] = array("cc_agentes","Agentes");
$nonAdminTablesRightsArr["cc_agentes"]=array();
$nonAdminTablesArr[] = array("Rel. Cham Detalhada","Cham Detalhada");
$nonAdminTablesRightsArr["Rel. Cham Detalhada"]=array();
$nonAdminTablesArr[] = array("Rel Produtividade da Fila","Rel Produtividade da Fila");
$nonAdminTablesRightsArr["Rel Produtividade da Fila"]=array();
$nonAdminTablesArr[] = array("Rel. Detalhamento Agente","Rel. Detalhamento Agente");
$nonAdminTablesRightsArr["Rel. Detalhamento Agente"]=array();
$nonAdminTablesArr[] = array("Graf. Perfil Tempo de espera por dia","Perfil Tempo De Espera Por Dia");
$nonAdminTablesRightsArr["Graf. Perfil Tempo de espera por dia"]=array();
$nonAdminTablesArr[] = array("Graf. Historico fila data","Graf. Historico fila data");
$nonAdminTablesRightsArr["Graf. Historico fila data"]=array();
$nonAdminTablesArr[] = array("Graf. Historico fila hora","Graf. Historico fila hora");
$nonAdminTablesRightsArr["Graf. Historico fila hora"]=array();
$nonAdminTablesArr[] = array("Rel. Historico Fila Data","Rel. Historico Fila Data");
$nonAdminTablesRightsArr["Rel. Historico Fila Data"]=array();
$nonAdminTablesArr[] = array("Rel. Historico Fila Hora","Rel. Historico Fila Hora");
$nonAdminTablesRightsArr["Rel. Historico Fila Hora"]=array();
$nonAdminTablesArr[] = array("cc_receptivo_filas_atend","Cc Receptivo Filas Atend");
$nonAdminTablesRightsArr["cc_receptivo_filas_atend"]=array();
$nonAdminTablesArr[] = array("Graf. perfil atendimento","Graf. perfil atendimento");
$nonAdminTablesRightsArr["Graf. perfil atendimento"]=array();
$nonAdminTablesArr[] = array("Rel. Produt filas grupo por data","Rel. Produt filas grupo por data");
$nonAdminTablesRightsArr["Rel. Produt filas grupo por data"]=array();
$nonAdminTablesArr[] = array("Rel. Produt filas grupo por mes","Rel. Produt filas grupo por mes");
$nonAdminTablesRightsArr["Rel. Produt filas grupo por mes"]=array();
$nonAdminTablesArr[] = array("Rel. Perf. Tempo Espera","Rel. Perf. Tempo Espera");
$nonAdminTablesRightsArr["Rel. Perf. Tempo Espera"]=array();
$nonAdminTablesArr[] = array("Rel. Produt. Agentes Dia","Produt. Agentes Dia");
$nonAdminTablesRightsArr["Rel. Produt. Agentes Dia"]=array();
$nonAdminTablesArr[] = array("Rel. Disponibilidade Agente","Rel. Disponibilidade Agente");
$nonAdminTablesRightsArr["Rel. Disponibilidade Agente"]=array();
$nonAdminTablesArr[] = array("ipbx_provisionamento","Provisionamento");
$nonAdminTablesRightsArr["ipbx_provisionamento"]=array();
$nonAdminTablesArr[] = array("blacklist","Bloqueio de telefones indesejados (blacklist)");
$nonAdminTablesRightsArr["blacklist"]=array();
$nonAdminTablesArr[] = array("Rel. Desvios Chamadas","Rel. Desvios Chamadas");
$nonAdminTablesRightsArr["Rel. Desvios Chamadas"]=array();
$nonAdminTablesArr[] = array("ipbx_ugmembers","Ipbx Ugmembers");
$nonAdminTablesRightsArr["ipbx_ugmembers"]=array();

$options["nonAdminTablesArr"] = $nonAdminTablesArr;
$options["nonAdminTablesRightsArr"] = $nonAdminTablesRightsArr;


$pageObject = ListPage::createListPage($strTableName, $options);
$buttonHandlers = array();
 // add button events if exist
$pageObject->addButtonHandlers($buttonHandlers);
// prepare code for build page
$pageObject->prepareForBuildPage();

// show page depends of mode
$pageObject->showPage();
	//$xt->assign_loopsection("grid_row",$rowinfo);
	


?>
