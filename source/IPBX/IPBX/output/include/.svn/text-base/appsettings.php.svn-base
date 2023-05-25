<?php
$dDebug=false;
$dSQL="";

$bSubqueriesSupported=true;

$tables_data=array();
$field_labels=array();

//	custom labels
$custom_labels=array();
$custom_labels["Portuguese(Brazil)"] = array();

define("FORMAT_NONE","");
define("FORMAT_DATE_SHORT","Short Date");
define("FORMAT_DATE_LONG","Long Date");
define("FORMAT_DATE_TIME","Datetime");
define("FORMAT_TIME","Time");
define("FORMAT_CURRENCY","Currency");
define("FORMAT_PERCENT","Percent");
define("FORMAT_HYPERLINK","Hyperlink");
define("FORMAT_EMAILHYPERLINK","Email Hyperlink");
define("FORMAT_FILE_IMAGE","File-based Image");
define("FORMAT_DATABASE_IMAGE","Database Image");
define("FORMAT_DATABASE_FILE","Database File");
define("FORMAT_FILE","Document Download");
define("FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("FORMAT_PHONE_NUMBER","Phone Number");
define("FORMAT_NUMBER","Number");
define("FORMAT_HTML","HTML");
define("FORMAT_CHECKBOX","Checkbox");
define("FORMAT_MAP","Map");
define("FORMAT_CUSTOM","Custom");

define("EDIT_FORMAT_NONE","");
define("EDIT_FORMAT_TEXT_FIELD","Text field");
define("EDIT_FORMAT_TEXT_AREA","Text area");
define("EDIT_FORMAT_PASSWORD","Password");
define("EDIT_FORMAT_DATE","Date");
define("EDIT_FORMAT_TIME","Time");
define("EDIT_FORMAT_RADIO","Radio button");
define("EDIT_FORMAT_CHECKBOX","Checkbox");
define("EDIT_FORMAT_DATABASE_IMAGE","Database image");
define("EDIT_FORMAT_DATABASE_FILE","Database file");
define("EDIT_FORMAT_FILE","Document upload");
define("EDIT_FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("EDIT_FORMAT_HIDDEN","Hidden field");
define("EDIT_FORMAT_READONLY","Readonly");

define("EDIT_DATE_SIMPLE",0);
define("EDIT_DATE_SIMPLE_DP",11);
define("EDIT_DATE_DD",12);
define("EDIT_DATE_DD_DP",13);

define("MODE_ADD",0);
define("MODE_EDIT",1);
define("MODE_SEARCH",2);
define("MODE_LIST",3);
define("MODE_PRINT",4);
define("MODE_VIEW",5);
define("MODE_INLINE_ADD",6);
define("MODE_INLINE_EDIT",7);
define("MODE_EXPORT",8);

define("LOGIN_HARDCODED",0);
define("LOGIN_TABLE",1);

define("SECURITY_NONE",-1);
define("SECURITY_HARDCODED", 0);
define("SECURITY_TABLE", 1);

define("ADVSECURITY_ALL",0);
define("ADVSECURITY_VIEW_OWN",1);
define("ADVSECURITY_EDIT_OWN",2);
define("ADVSECURITY_NONE",3);

define("ACCESS_LEVEL_ADMIN","Admin");
define("ACCESS_LEVEL_ADMINGROUP","AdminGroup");
define("ACCESS_LEVEL_USER","User");
define("ACCESS_LEVEL_GUEST","Guest");

define("nDATABASE_MySQL",0);
define("nDATABASE_Oracle",1);
define("nDATABASE_MSSQLServer",2);
define("nDATABASE_Access",3);
define("nDATABASE_PostgreSQL",4);
define("nDATABASE_Informix",5);
define("nDATABASE_SQLite3",6);
define("nDATABASE_DB2",7);

define("ADD_SIMPLE",0);
define("ADD_INLINE",1);
define("ADD_ONTHEFLY",2);
define("ADD_MASTER",3);

define("titTABLE",0);
define("titVIEW",1);
define("titREPORT",2);
define("titCHART",3);

// for report lib
define("REPORT_STEPPED", 0);
define("REPORT_BLOCK", 1);
define("REPORT_OUTLINE", 2);
define("REPORT_ALIGN", 3);
define("REPORT_TABULAR", 6);

define("TOTAL_NONE", -1);
define("TOTAL_MAX", 0);
define("TOTAL_AVG", 1);
define("TOTAL_SUM", 3);
define("TOTAL_MIN", 4);

define("LIST_SIMPLE",0);
define("LIST_LOOKUP",1);
define("LIST_DETAILS",3);
define("LIST_AJAX",4);
define("RIGHTS_PAGE", 5);
define("MEMBERS_PAGE", 6);

define("DP_POPUP",0);
define("DP_INLINE",1);
define("DP_NONE",2);

define("SEARCH_SIMPLE",0);
define("SEARCH_LOAD_CONTROL",1);

define("LCT_DROPDOWN",0);
define("LCT_AJAX",1);
define("LCT_LIST",2);
define("LCT_CBLIST",3);

define("LT_LISTOFVALUES",0);
define("LT_LOOKUPTABLE",1);

$wr_is_standalone=false;


$strLeftWrapper="`";
$strRightWrapper="`";

$cLoginTable				= "ipbx_ramais";
$cUserNameField			= "name";
$cPasswordField			= "secret";
$cUserGroupField			= "name";
$cEmailField			= "";

$cUserNameFieldType			= 200;
$cPasswordFieldType			= 200;
$cEmailFieldType			= 200;
								$cUserNameFieldType			= 200;
																																																																																																																																																																																												$cPasswordFieldType			= 200;
																																																																																																																																																																																						
$gPermissionsRefreshTime=0;
$gPermissionsRead=false;

$nDBType=0;

$useAJAX = true;
$suggestAllContent = true;

$strLastSQL="";

$includes_js=array();
$includes_jsreq=array();
$includes_css=array();

$mlang_messages=array();
$mlang_charsets=array();

// table captions
$tableCaptions = array();
$tableCaptions["Portuguese(Brazil)"]=array();
$tableCaptions["Portuguese(Brazil)"]["agenda"] = "Contatos Externos";
$tableCaptions["Portuguese(Brazil)"]["centrocusto"] = "Centro de Custo";
$tableCaptions["Portuguese(Brazil)"]["cdr"] = "Ligações";
$tableCaptions["Portuguese(Brazil)"]["admin_rights"] = "Permissions";
$tableCaptions["Portuguese(Brazil)"]["horario"] = "Horário ligações (Saída)";
$tableCaptions["Portuguese(Brazil)"]["admin_members"] = "Assign users to groups";
$tableCaptions["Portuguese(Brazil)"]["admin_users"] = "Add/Edit users";
$tableCaptions["Portuguese(Brazil)"]["contrato_trad"] = "Linha Tradicional";
$tableCaptions["Portuguese(Brazil)"]["contrato_voip"] = "Linha VOIP";
$tableCaptions["Portuguese(Brazil)"]["contrato_gsm"] = "Linha GSM";
$tableCaptions["Portuguese(Brazil)"]["cadencias"] = "Cadências";
$tableCaptions["Portuguese(Brazil)"]["VONO"] = "VONO";
$tableCaptions["Portuguese(Brazil)"]["ipbx_audit"] = "Auditoria";
$tableCaptions["Portuguese(Brazil)"]["sms_celulares"] = "Celulares";
$tableCaptions["Portuguese(Brazil)"]["sms_noticias"] = "Notícias";
$tableCaptions["Portuguese(Brazil)"]["sms_grupo"] = "Grupo";
$tableCaptions["Portuguese(Brazil)"]["cc_receptivo_filas"] = "Filas";
$tableCaptions["Portuguese(Brazil)"]["cc_menu_atend"] = "Menu de Atendimento";
$tableCaptions["Portuguese(Brazil)"]["cc_menu_atend_item"] = "Item de menu";
$tableCaptions["Portuguese(Brazil)"]["Graf__Atendimento"] = "Atendimento";
$tableCaptions["Portuguese(Brazil)"]["Graf__Atendimento__Mensal_"] = "Atendimento (Mensal)";
$tableCaptions["Portuguese(Brazil)"]["parametros"] = "Parametros";
$tableCaptions["Portuguese(Brazil)"]["Graf__Custo_Voip"] = "Custo Linha Voip";
$tableCaptions["Portuguese(Brazil)"]["Graf__Custo_Trad"] = "Custo Linha Tradicional";
$tableCaptions["Portuguese(Brazil)"]["Graf__Minutagem_Voip"] = "Minutagem Voip";
$tableCaptions["Portuguese(Brazil)"]["Graf__Minutagem_Trad"] = "Minutagem Tradicional";
$tableCaptions["Portuguese(Brazil)"]["conf_sala"] = "Sala de Conferência";
$tableCaptions["Portuguese(Brazil)"]["conf_sala_convidado"] = "Convite da Conferência";
$tableCaptions["Portuguese(Brazil)"]["ipbx_gravacoes"] = "Gravações";
$tableCaptions["Portuguese(Brazil)"]["Graf__Lig__Discadas"] = "Graf. Lig. Discadas";
$tableCaptions["Portuguese(Brazil)"]["ldap"] = "Ldap";
$tableCaptions["Portuguese(Brazil)"]["timeout"] = "Timeout";
$tableCaptions["Portuguese(Brazil)"]["central"] = "Interfaces";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_vono"] = "Interfaces Vono";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_fxs"] = "Interfaces FXS";
$tableCaptions["Portuguese(Brazil)"]["ipbx_canais"] = "Canais";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_e1"] = "Interfaces E1";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_gsm"] = "Interfaces GSM";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_mslync"] = "Interfaces MS-LYNC";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_sip"] = "Interfaces SIP";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_voxip"] = "Interfaces VOXIP";
$tableCaptions["Portuguese(Brazil)"]["ipbx_plano_disc"] = "Plano de Discagem";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ramais"] = "Ipbx Ramais";
$tableCaptions["Portuguese(Brazil)"]["ipbx_grupo_captura"] = "Grupo de Captura";
$tableCaptions["Portuguese(Brazil)"]["ipbx_desv_prefix"] = "Desvio por prefixo";
$tableCaptions["Portuguese(Brazil)"]["ipbx_desv_prefix_item"] = "Item do grupo de prefixo";
$tableCaptions["Portuguese(Brazil)"]["ipbx_call_back"] = "Call Back";
$tableCaptions["Portuguese(Brazil)"]["ipbx_conf_grav"] = "Configurações";
$tableCaptions["Portuguese(Brazil)"]["ipbx_rcv_fax"] = "FAX Recebidos";
$tableCaptions["Portuguese(Brazil)"]["ipbx_tx_fax"] = "FAX Enviado";
$tableCaptions["Portuguese(Brazil)"]["ipbx_send_fax"] = "FAX Envio";
$tableCaptions["Portuguese(Brazil)"]["ipbx_conf_fax"] = "Configuração";
$tableCaptions["Portuguese(Brazil)"]["ipbx_backup"] = "Backup";
$tableCaptions["Portuguese(Brazil)"]["Restore"] = "Restore";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ura_rev_conf"] = "Configuração";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ura_rev_inbound"] = "Inbound";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ura_rev_outbound"] = "Outbound";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ura_rev_msg"] = "Mensagem";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_callman"] = "Interfaces CallManager (Cisco)";
$tableCaptions["Portuguese(Brazil)"]["ipbx_tarifa_vc2"] = "Tarifa VC2";
$tableCaptions["Portuguese(Brazil)"]["Graf__Centro_de_custo"] = "Gráfico - Centro De Custo";
$tableCaptions["Portuguese(Brazil)"]["Graf__Custo_GSM"] = "Graf. Custo GSM";
$tableCaptions["Portuguese(Brazil)"]["Graf__Minutagem_GSM"] = "Minutagem GSM";
$tableCaptions["Portuguese(Brazil)"]["Rel__Abandonos"] = "Abandonos";
$tableCaptions["Portuguese(Brazil)"]["Rel__Atendimento"] = "Atendimento";
$tableCaptions["Portuguese(Brazil)"]["Rel__Bilhetagem"] = "Bilhetagem";
$tableCaptions["Portuguese(Brazil)"]["Rel__Detalhado___Centro_de_custo"] = "Detalhado - Centro De Custo";
$tableCaptions["Portuguese(Brazil)"]["Rel__Lig_Custo_por_tronco"] = "Sintético custo por interface";
$tableCaptions["Portuguese(Brazil)"]["Rel__Lig__Discadas"] = "Discadas";
$tableCaptions["Portuguese(Brazil)"]["Rel__Recebidas"] = "Recebidas";
$tableCaptions["Portuguese(Brazil)"]["Rel__Simplificado___Centro_de_custo"] = "Simplificado - Centro De Custo";
$tableCaptions["Portuguese(Brazil)"]["Graf__Chamadas_sem_atendimento"] = "Chamadas Sem Atendimento";
$tableCaptions["Portuguese(Brazil)"]["ipbx_pesquisa_ura_rev"] = "Ipbx Pesquisa Ura Rev";
$tableCaptions["Portuguese(Brazil)"]["Rel__Pesquisa"] = "Pesquisa";
$tableCaptions["Portuguese(Brazil)"]["Rel__Ura_Reversa___Enfileiramento"] = "Rel. Ura Reversa - Enfileiramento";
$tableCaptions["Portuguese(Brazil)"]["Rel__Pesquisa_Reversa"] = "Pesquisa Reversa";
$tableCaptions["Portuguese(Brazil)"]["diag_ipbx"] = "Diagnóstico";
$tableCaptions["Portuguese(Brazil)"]["ipbx_horario_desv_ramais"] = "Ipbx Horario Desv Ramais";
$tableCaptions["Portuguese(Brazil)"]["ipbx_horario_desv"] = "Ipbx Horario Desv";
$tableCaptions["Portuguese(Brazil)"]["ipbx_dt_especifica_feriado"] = "Ipbx Dt Especifica Feriado";
$tableCaptions["Portuguese(Brazil)"]["cc_receptivo_filas_horario_desv_ramais"] = "Cc Receptivo Filas Horario Desv Ramais";
$tableCaptions["Portuguese(Brazil)"]["cc_receptivo_filas_horario_desv"] = "Cc Receptivo Filas Horario Desv";
$tableCaptions["Portuguese(Brazil)"]["ipbx_sincronismo"] = "Ipbx Sincronismo";
$tableCaptions["Portuguese(Brazil)"]["ipbx_ldap_conf"] = "Ipbx Ldap Conf";
$tableCaptions["Portuguese(Brazil)"]["personal_info"] = "Personal Info";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_fxo"] = "Interface FXO";
$tableCaptions["Portuguese(Brazil)"]["ipbx_painel_op"] = "Ipbx Painel Op";
$tableCaptions["Portuguese(Brazil)"]["Rel__Centro_de_custo"] = "Rel. Centro de custo";
$tableCaptions["Portuguese(Brazil)"]["v_contatos"] = "Contatos";
$tableCaptions["Portuguese(Brazil)"]["ipbx_disp_mobile"] = "Aprovação de dispositivos";
$tableCaptions["Portuguese(Brazil)"]["cc_agentes"] = "Agentes";
$tableCaptions["Portuguese(Brazil)"]["cc_tipos_pausa"] = "Cadastro Pausa";
$tableCaptions["Portuguese(Brazil)"]["ipbx_interf_sip_generica"] = "Interface SIP Genérica";
$tableCaptions["Portuguese(Brazil)"]["cc_agentes_fila"] = "Agentes Fila";
$tableCaptions["Portuguese(Brazil)"]["Rel__Cham_Detalhada"] = "Cham Detalhada";
$tableCaptions["Portuguese(Brazil)"]["Rel_Produtividade_da_Fila"] = "Rel Produtividade da Fila";
$tableCaptions["Portuguese(Brazil)"]["Rel__Detalhamento_Agente"] = "Rel. Detalhamento Agente";
$tableCaptions["Portuguese(Brazil)"]["Graf__Perfil_Tempo_de_espera_por_dia"] = "Perfil Tempo De Espera Por Dia";
$tableCaptions["Portuguese(Brazil)"]["Graf__Historico_fila_data"] = "Graf. Historico fila data";
$tableCaptions["Portuguese(Brazil)"]["Rel__Historico_Fila_Data"] = "Rel. Historico Fila Data";
$tableCaptions["Portuguese(Brazil)"]["Graf__Historico_fila_hora"] = "Graf. Historico fila hora";
$tableCaptions["Portuguese(Brazil)"]["Rel__Historico_Fila_Hora"] = "Rel. Historico Fila Hora";
$tableCaptions["Portuguese(Brazil)"]["cc_receptivo_filas_atend"] = "Cc Receptivo Filas Atend";
$tableCaptions["Portuguese(Brazil)"]["Graf__perfil_atendimento"] = "Graf. perfil atendimento";
$tableCaptions["Portuguese(Brazil)"]["Rel__Produt_filas_grupo_por_data"] = "Rel. Produt filas grupo por data";
$tableCaptions["Portuguese(Brazil)"]["Rel__Produt_filas_grupo_por_mes"] = "Rel. Produt filas grupo por mes";
$tableCaptions["Portuguese(Brazil)"]["Rel__Produt__Agentes"] = "Rel. Produt. Agentes";
$tableCaptions["Portuguese(Brazil)"]["Rel__Perf__Tempo_Espera"] = "Rel. Perf. Tempo Espera";

$arrEventTables=array();
$blockAlienEvents=true;

$mlang_defaultlang="Portuguese(Brazil)";


$conn=db_connect();
if(!@$_SESSION["UserID"])
{
	$allowGuest=guestHasPermissions();
	$scriptname=$_SERVER["PHP_SELF"];
	$pos=strrpos($scriptname,"/");
	if($pos!==FALSE)
		$scriptname=substr($scriptname,$pos+1);
	if($allowGuest && $scriptname!="login.php" && $scriptname!="remind.php" && $scriptname!="register.php")
	{
		$_SESSION["UserID"]="Guest";
		$_SESSION["GroupID"]="<Guest>";
		$_SESSION["AccessLevel"]=ACCESS_LEVEL_GUEST;
		$auditObj = GetAuditObject();
		if($auditObj)
			$auditObj->LogLogin();
		if(function_exists("AfterSuccessfulLogin"))
		{			
			$dummy=array();
			AfterSuccessfulLogin("","",$dummy);
		}
	}
}

//	old  menu support
//	deprecated
//	remove after version 5.2
$menuTablesArr = array();
$menuTablesArr[] = array("shortTName"=>"personal_info","dataSourceTName"=>"personal_info","nType"=>1);
$menuTablesArr[] = array("shortTName"=>"central","dataSourceTName"=>"central","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_plano_disc","dataSourceTName"=>"ipbx_plano_disc","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_desv_prefix","dataSourceTName"=>"ipbx_desv_prefix","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"cc_menu_atend","dataSourceTName"=>"cc_menu_atend","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_ramais","dataSourceTName"=>"ipbx_ramais","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_disp_mobile","dataSourceTName"=>"ipbx_disp_mobile","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_painel_op","dataSourceTName"=>"ipbx_painel_op","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_horario_desv","dataSourceTName"=>"ipbx_horario_desv","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_dt_especifica_feriado","dataSourceTName"=>"ipbx_dt_especifica_feriado","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_call_back","dataSourceTName"=>"ipbx_call_back","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"v_contatos","dataSourceTName"=>"v_contatos","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"agenda","dataSourceTName"=>"agenda","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"contrato_trad","dataSourceTName"=>"contrato_trad","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"contrato_voip","dataSourceTName"=>"contrato_voip","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"contrato_gsm","dataSourceTName"=>"contrato_gsm","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"Simplificado","dataSourceTName"=>"Rel. Simplificado - Centro de custo","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Discadas___Centro_de_custo","dataSourceTName"=>"Rel. Detalhado - Centro de custo","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Lig_Custo_por_tronco","dataSourceTName"=>"Rel. Lig Custo por tronco","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Centro_de_custo","dataSourceTName"=>"Rel. Bilhetagem","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Centro_de_custo","dataSourceTName"=>"Rel. Centro de custo","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Gr_fico___Centro_de_custo","dataSourceTName"=>"Graf. Centro de custo","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Custo","dataSourceTName"=>"Graf. Custo Trad","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Custo_Voip","dataSourceTName"=>"Graf. Custo Voip","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Custo_GSM","dataSourceTName"=>"Graf. Custo GSM","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Lig__Discadas","dataSourceTName"=>"Rel. Lig. Discadas","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Recebidas","dataSourceTName"=>"Rel. Recebidas","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Liga__es_discadas","dataSourceTName"=>"Graf. Lig. Discadas","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Minutagem","dataSourceTName"=>"Graf. Minutagem Trad","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Minutagem_Voip","dataSourceTName"=>"Graf. Minutagem Voip","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Minutos_GSM","dataSourceTName"=>"Graf. Minutagem GSM","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"ipbx_grupo_captura","dataSourceTName"=>"ipbx_grupo_captura","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_conf_grav","dataSourceTName"=>"ipbx_conf_grav","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_gravacoes","dataSourceTName"=>"ipbx_gravacoes","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"centrocusto","dataSourceTName"=>"centrocusto","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"horario","dataSourceTName"=>"horario","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"cc_receptivo_filas","dataSourceTName"=>"cc_receptivo_filas","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"cc_agentes","dataSourceTName"=>"cc_agentes","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"cc_tipos_pausa","dataSourceTName"=>"cc_tipos_pausa","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"cc_receptivo_filas_horario_desv","dataSourceTName"=>"cc_receptivo_filas_horario_desv","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_pesquisa_ura_rev","dataSourceTName"=>"ipbx_pesquisa_ura_rev","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"Rel_Chamada_Detalhada","dataSourceTName"=>"Rel. Cham Detalhada","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Abandonos","dataSourceTName"=>"Rel. Abandonos","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Detalhamento_Agente","dataSourceTName"=>"Rel. Detalhamento Agente","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Historico_Fila_Hora","dataSourceTName"=>"Rel. Historico Fila Hora","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Historico_Fila_Data","dataSourceTName"=>"Rel. Historico Fila Data","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Produt__Agentes","dataSourceTName"=>"Rel. Produt. Agentes","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel_Produtividade_da_Fila","dataSourceTName"=>"Rel Produtividade da Fila","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Produt_filas_grupo_por_data","dataSourceTName"=>"Rel. Produt filas grupo por data","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Produt_filas_grupo_por_mes","dataSourceTName"=>"Rel. Produt filas grupo por mes","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Atendimento","dataSourceTName"=>"Rel. Atendimento","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Perf__Tempo_Espera","dataSourceTName"=>"Rel. Perf. Tempo Espera","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Rel__Pesquisa_Historico","dataSourceTName"=>"Rel. Pesquisa","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"Chamadas_sem_atendimento","dataSourceTName"=>"Graf. Chamadas sem atendimento","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Historico_fila_hora","dataSourceTName"=>"Graf. Historico fila hora","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Historico_fila_data","dataSourceTName"=>"Graf. Historico fila data","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf_per__temp_espera_por_dia","dataSourceTName"=>"Graf. Perfil Tempo de espera por dia","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__perfil_atendimento","dataSourceTName"=>"Graf. perfil atendimento","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Graf__Atendimento","dataSourceTName"=>"Graf. Atendimento","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"Atendimento__Mensal_","dataSourceTName"=>"Graf. Atendimento (Mensal)","nType"=>3);
$menuTablesArr[] = array("shortTName"=>"conf_sala","dataSourceTName"=>"conf_sala","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_send_fax","dataSourceTName"=>"ipbx_send_fax","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_rcv_fax","dataSourceTName"=>"ipbx_rcv_fax","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_tx_fax","dataSourceTName"=>"ipbx_tx_fax","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_conf_fax","dataSourceTName"=>"ipbx_conf_fax","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"sms_grupo","dataSourceTName"=>"sms_grupo","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"sms_celulares","dataSourceTName"=>"sms_celulares","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"sms_noticias","dataSourceTName"=>"sms_noticias","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_pesquisa_ura_rev","dataSourceTName"=>"ipbx_pesquisa_ura_rev","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"Rel__Ura_Reversa___Enfileiramento","dataSourceTName"=>"Rel. Ura Reversa - Enfileiramento","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"ipbx_fila_pesquisa_ura_rev_resp_Report","dataSourceTName"=>"Rel. Pesquisa Reversa","nType"=>2);
$menuTablesArr[] = array("shortTName"=>"ipbx_ura_rev_inbound","dataSourceTName"=>"ipbx_ura_rev_inbound","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_ura_rev_outbound","dataSourceTName"=>"ipbx_ura_rev_outbound","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_ura_rev_conf","dataSourceTName"=>"ipbx_ura_rev_conf","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_audit","dataSourceTName"=>"ipbx_audit","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_backup","dataSourceTName"=>"ipbx_backup","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"Restore","dataSourceTName"=>"Restore","nType"=>1);
$menuTablesArr[] = array("shortTName"=>"ldap","dataSourceTName"=>"ldap","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_ldap_conf","dataSourceTName"=>"ipbx_ldap_conf","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"parametros","dataSourceTName"=>"parametros","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"ipbx_sincronismo","dataSourceTName"=>"ipbx_sincronismo","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"diag_ipbx","dataSourceTName"=>"diag_ipbx","nType"=>1);
$menuTablesArr[] = array("shortTName"=>"ipbx_tarifa_vc2","dataSourceTName"=>"ipbx_tarifa_vc2","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"VONO","dataSourceTName"=>"VONO","nType"=>0);


$isGroupSecurity = true;

?>
