<?php

/**
* getLookupMainTableSettings - tests whether the lookup link exists between the tables
*
*  returns array with ProjectSettings class for main table if the link exists in project settings.
*  returns NULL otherwise
*/
function getLookupMainTableSettings($lookupTable, $mainTableShortName, $mainField, $desiredPage = "")
{
	global $lookupTableLinks;
	if(!isset($lookupTableLinks[$lookupTable]))
		return null;
	if(!isset($lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField]))
		return null;
	$arr = &$lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField];
	$effectivePage = $desiredPage;
	if(!isset($arr[$effectivePage]))
	{
		$effectivePage = PAGE_EDIT;
		if(!isset($arr[$effectivePage]))
		{
			if($desiredPage == "" && 0 < count($arr))
			{
				$effectivePage = $arr[0];
			}
			else
				return null;
		}
	}
	return new ProjectSettings($arr[$effectivePage]["table"], $effectivePage);
}

/** 
* $lookupTableLinks array stores all lookup links between tables in the project
*/
function InitLookupLinks()
{
	global $lookupTableLinks;

	$lookupTableLinks = array();

	$lookupTableLinks["centrocusto"]["agenda.idt_custo"]["edit"] = array("table" => "agenda", "field" => "idt_custo", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-F_LOCAL_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-F_LOCAL_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-M_LOCAL_VC1_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-M_LOCAL_VC1_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-M_VC2_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-M_VC2_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-F_LDN_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-F_LDN_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-F_LDI_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-F_LDI_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-M_LDI_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-M_LDI_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_trad.F-M_VC3_CAD"]["edit"] = array("table" => "contrato_trad", "field" => "F-M_VC3_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.F-F_VONO_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "F-F_VONO_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.F-F_NVONO_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "F-F_NVONO_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.F-M_VC1_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "F-M_VC1_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.F-M_VC2VC3_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "F-M_VC2VC3_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.LDI_FIXO_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "LDI_FIXO_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_voip.LDI_MOVEL_CAD"]["edit"] = array("table" => "contrato_voip", "field" => "LDI_MOVEL_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_gsm.VC1_CAD"]["edit"] = array("table" => "contrato_gsm", "field" => "VC1_CAD", "page" => "edit");
	$lookupTableLinks["cadencias"]["contrato_gsm.VC2VC3_CAD"]["edit"] = array("table" => "contrato_gsm", "field" => "VC2VC3_CAD", "page" => "edit");
	$lookupTableLinks["sms_grupo"]["sms_celulares.id_grupo"]["edit"] = array("table" => "sms_celulares", "field" => "id_grupo", "page" => "edit");
	$lookupTableLinks["sms_grupo"]["sms_noticias.id_grupo"]["edit"] = array("table" => "sms_noticias", "field" => "id_grupo", "page" => "edit");
	$lookupTableLinks["estrategia_fila"]["cc_receptivo_filas.estrategia"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "estrategia", "page" => "edit");
	$lookupTableLinks["cc_receptivo_filas_horario_desv"]["cc_receptivo_filas.id_desvio"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "id_desvio", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_receptivo_filas.acao_falta_agente"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "acao_falta_agente", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_receptivo_filas.acao_tp_excedido"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "acao_tp_excedido", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_receptivo_filas.acao_fr_horario"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "acao_fr_horario", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_receptivo_filas.id_name_gestor"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "id_name_gestor", "page" => "edit");
	$lookupTableLinks["cc_receptivo_logout_estat"]["cc_receptivo_filas.id_logout"]["edit"] = array("table" => "cc_receptivo_filas", "field" => "id_logout", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_menu_atend.ramal_acesso"]["edit"] = array("table" => "cc_menu_atend", "field" => "ramal_acesso", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_menu_atend.destino"]["edit"] = array("table" => "cc_menu_atend", "field" => "destino", "page" => "edit");
	$lookupTableLinks["ipbx_fluxograma"]["cc_menu_atend.id_fluxo"]["edit"] = array("table" => "cc_menu_atend", "field" => "id_fluxo", "page" => "edit");
	$lookupTableLinks["v_cc_menu_atend_opcao"]["cc_menu_atend_item.id_cod_gen"]["edit"] = array("table" => "cc_menu_atend_item", "field" => "id_cod_gen", "page" => "edit");
	$lookupTableLinks["ipbx_desv_prefix"]["cc_menu_atend_item.prefixo"]["edit"] = array("table" => "cc_menu_atend_item", "field" => "prefixo", "page" => "edit");
	$lookupTableLinks["v_cc_menu_atend_opcao"]["cc_menu_atend_item.rdb_opcao"]["edit"] = array("table" => "cc_menu_atend_item", "field" => "rdb_opcao", "page" => "edit");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Graf__Atendimento.Fila"]["search"] = array("table" => "Graf. Atendimento", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Atendimento__Mensal_.Fila"]["search"] = array("table" => "Graf. Atendimento (Mensal)", "field" => "Fila", "page" => "search");
	$lookupTableLinks["ldap"]["conf_sala_convidado.nm_convidado_interno"]["edit"] = array("table" => "conf_sala_convidado", "field" => "nm_convidado_interno", "page" => "edit");
	$lookupTableLinks["ipbx_gravacoes"]["ipbx_gravacoes.tp_gravacao"]["edit"] = array("table" => "ipbx_gravacoes", "field" => "tp_gravacao", "page" => "edit");
	$lookupTableLinks["v_ldap_avaiable_names"]["ldap.name"]["edit"] = array("table" => "ldap", "field" => "name", "page" => "edit");
	$lookupTableLinks["v_ldap_avaiable_names"]["ldap.name2"]["edit"] = array("table" => "ldap", "field" => "name2", "page" => "edit");
	$lookupTableLinks["contrato_voip"]["ipbx_interf_vono.id_contrato"]["edit"] = array("table" => "ipbx_interf_vono", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_vono.codec"]["edit"] = array("table" => "ipbx_interf_vono", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_vono.piloto"]["edit"] = array("table" => "ipbx_interf_vono", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["contrato_trad"]["ipbx_interf_e1.id_contrato"]["edit"] = array("table" => "ipbx_interf_e1", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_e1.piloto"]["edit"] = array("table" => "ipbx_interf_e1", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["contrato_gsm"]["ipbx_interf_gsm.id_contrato"]["edit"] = array("table" => "ipbx_interf_gsm", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_gsm.piloto"]["edit"] = array("table" => "ipbx_interf_gsm", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_mslync.codec"]["edit"] = array("table" => "ipbx_interf_mslync", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_mslync.piloto"]["edit"] = array("table" => "ipbx_interf_mslync", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_sip.codec"]["edit"] = array("table" => "ipbx_interf_sip", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_sip.piloto"]["edit"] = array("table" => "ipbx_interf_sip", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["contrato_trad"]["ipbx_interf_voxip.id_contrato"]["edit"] = array("table" => "ipbx_interf_voxip", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_voxip.codec"]["edit"] = array("table" => "ipbx_interf_voxip", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_voxip.piloto"]["edit"] = array("table" => "ipbx_interf_voxip", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["ipbx_plano_disc.id_interf_1"]["edit"] = array("table" => "ipbx_plano_disc", "field" => "id_interf_1", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["ipbx_plano_disc.id_interf_2"]["edit"] = array("table" => "ipbx_plano_disc", "field" => "id_interf_2", "page" => "edit");
	$lookupTableLinks["centrocusto"]["ipbx_ramais.accountcode"]["edit"] = array("table" => "ipbx_ramais", "field" => "accountcode", "page" => "edit");
	$lookupTableLinks["ipbx_contextos"]["ipbx_ramais.context"]["edit"] = array("table" => "ipbx_ramais", "field" => "context", "page" => "edit");
	$lookupTableLinks["horario"]["ipbx_ramais.id_horario"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_horario", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["ipbx_ramais.id_interf"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_interf", "page" => "edit");
	$lookupTableLinks["ipbx_canais"]["ipbx_ramais.ident_interf"]["edit"] = array("table" => "ipbx_ramais", "field" => "ident_interf", "page" => "edit");
	$lookupTableLinks["ipbx_grupo_captura"]["ipbx_ramais.pickupgroup"]["edit"] = array("table" => "ipbx_ramais", "field" => "pickupgroup", "page" => "edit");
	$lookupTableLinks["ipbx_pesquisa_ura_rev"]["ipbx_ramais.id_pesquisa"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_pesquisa", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_ramais.desvio_ddr"]["edit"] = array("table" => "ipbx_ramais", "field" => "desvio_ddr", "page" => "edit");
	$lookupTableLinks["ipbx_horario_desv"]["ipbx_ramais.id_desvio"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_desvio", "page" => "edit");
	$lookupTableLinks["ipbx_painel_op"]["ipbx_ramais.id_painel_op"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_painel_op", "page" => "edit");
	$lookupTableLinks["ipbx_provisionamento"]["ipbx_ramais.id_provis"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_provis", "page" => "edit");
	$lookupTableLinks["ipbx_lang"]["ipbx_ramais.id_lang"]["edit"] = array("table" => "ipbx_ramais", "field" => "id_lang", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_call_back.name"]["edit"] = array("table" => "ipbx_call_back", "field" => "name", "page" => "edit");
	$lookupTableLinks["v_cc_menu_atend_opcao"]["ipbx_call_back.id_cod_gen"]["edit"] = array("table" => "ipbx_call_back", "field" => "id_cod_gen", "page" => "edit");
	$lookupTableLinks["v_cc_menu_atend_opcao"]["ipbx_call_back.rdb_opcao"]["edit"] = array("table" => "ipbx_call_back", "field" => "rdb_opcao", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["ipbx_call_back.interface"]["edit"] = array("table" => "ipbx_call_back", "field" => "interface", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["ipbx_ura_rev_conf.id_interf"]["edit"] = array("table" => "ipbx_ura_rev_conf", "field" => "id_interf", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_callman.codec"]["edit"] = array("table" => "ipbx_interf_callman", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_callman.piloto"]["edit"] = array("table" => "ipbx_interf_callman", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["conta"]["Gr_fico___Centro_de_custo.Mes"]["search"] = array("table" => "Graf. Centro de custo", "field" => "Mes", "page" => "search");
	$lookupTableLinks["conta"]["Gr_fico___Centro_de_custo.Ano"]["search"] = array("table" => "Graf. Centro de custo", "field" => "Ano", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Abandonos.Fila"]["search"] = array("table" => "Rel. Abandonos", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Atendimento.Fila"]["search"] = array("table" => "Rel. Atendimento", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Atendimento.Agente"]["search"] = array("table" => "Rel. Atendimento", "field" => "Agente", "page" => "search");
	$lookupTableLinks["centrocusto"]["Centro_de_custo.Centro de custos"]["search"] = array("table" => "Rel. Bilhetagem", "field" => "Centro de custos", "page" => "search");
	$lookupTableLinks["conta"]["Centro_de_custo.mes_referencia"]["search"] = array("table" => "Rel. Bilhetagem", "field" => "mes_referencia", "page" => "search");
	$lookupTableLinks["conta"]["Centro_de_custo.ano_referencia"]["search"] = array("table" => "Rel. Bilhetagem", "field" => "ano_referencia", "page" => "search");
	$lookupTableLinks["centrocusto"]["Discadas___Centro_de_custo.dsc_centro_cust"]["search"] = array("table" => "Rel. Detalhado - Centro de custo", "field" => "dsc_centro_cust", "page" => "search");
	$lookupTableLinks["conta"]["Lig_Custo_por_tronco.Origem"]["search"] = array("table" => "Rel. Lig Custo por tronco", "field" => "Origem", "page" => "search");
	$lookupTableLinks["conta"]["Lig_Custo_por_tronco.Mes"]["search"] = array("table" => "Rel. Lig Custo por tronco", "field" => "Mes", "page" => "search");
	$lookupTableLinks["conta"]["Lig_Custo_por_tronco.Ano"]["search"] = array("table" => "Rel. Lig Custo por tronco", "field" => "Ano", "page" => "search");
	$lookupTableLinks["ipbx_interf"]["Lig_Custo_por_tronco.Interface"]["search"] = array("table" => "Rel. Lig Custo por tronco", "field" => "Interface", "page" => "search");
	$lookupTableLinks["centrocusto"]["Simplificado.dsc_centro_cust"]["search"] = array("table" => "Rel. Simplificado - Centro de custo", "field" => "dsc_centro_cust", "page" => "search");
	$lookupTableLinks["conta"]["Simplificado.Mes"]["search"] = array("table" => "Rel. Simplificado - Centro de custo", "field" => "Mes", "page" => "search");
	$lookupTableLinks["conta"]["Simplificado.Ano"]["search"] = array("table" => "Rel. Simplificado - Centro de custo", "field" => "Ano", "page" => "search");
	$lookupTableLinks["ipbx_interf"]["Simplificado.dsc_interf"]["search"] = array("table" => "Rel. Simplificado - Centro de custo", "field" => "dsc_interf", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Chamadas_sem_atendimento.Agentes"]["search"] = array("table" => "Graf. Chamadas sem atendimento", "field" => "Agentes", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas"]["Chamadas_sem_atendimento.Fila"]["search"] = array("table" => "Graf. Chamadas sem atendimento", "field" => "Fila", "page" => "search");
	$lookupTableLinks["centrocusto"]["personal_info.accountcode"]["edit"] = array("table" => "personal_info", "field" => "accountcode", "page" => "edit");
	$lookupTableLinks["ipbx_contextos"]["personal_info.context"]["edit"] = array("table" => "personal_info", "field" => "context", "page" => "edit");
	$lookupTableLinks["horario"]["personal_info.id_horario"]["edit"] = array("table" => "personal_info", "field" => "id_horario", "page" => "edit");
	$lookupTableLinks["ipbx_interf"]["personal_info.id_interf"]["edit"] = array("table" => "personal_info", "field" => "id_interf", "page" => "edit");
	$lookupTableLinks["ipbx_canais"]["personal_info.ident_interf"]["edit"] = array("table" => "personal_info", "field" => "ident_interf", "page" => "edit");
	$lookupTableLinks["ipbx_grupo_captura"]["personal_info.pickupgroup"]["edit"] = array("table" => "personal_info", "field" => "pickupgroup", "page" => "edit");
	$lookupTableLinks["ipbx_pesquisa_ura_rev"]["personal_info.id_pesquisa"]["edit"] = array("table" => "personal_info", "field" => "id_pesquisa", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["personal_info.desvio_ddr"]["edit"] = array("table" => "personal_info", "field" => "desvio_ddr", "page" => "edit");
	$lookupTableLinks["ipbx_horario_desv"]["personal_info.id_desvio"]["edit"] = array("table" => "personal_info", "field" => "id_desvio", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_fxo.piloto"]["edit"] = array("table" => "ipbx_interf_fxo", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["contrato_trad"]["ipbx_interf_fxo.id_contrato"]["edit"] = array("table" => "ipbx_interf_fxo", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["ipbx_painel_op_privs"]["ipbx_painel_op.privilegios"]["edit"] = array("table" => "ipbx_painel_op", "field" => "privilegios", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_painel_op.usuarios"]["edit"] = array("table" => "ipbx_painel_op", "field" => "usuarios", "page" => "edit");
	$lookupTableLinks["queue_table"]["ipbx_painel_op.fila"]["edit"] = array("table" => "ipbx_painel_op", "field" => "fila", "page" => "edit");
	$lookupTableLinks["conta"]["Rel__Centro_de_custo.Mes"]["search"] = array("table" => "Rel. Centro de custo", "field" => "Mes", "page" => "search");
	$lookupTableLinks["conta"]["Rel__Centro_de_custo.Ano"]["search"] = array("table" => "Rel. Centro de custo", "field" => "Ano", "page" => "search");
	$lookupTableLinks["centrocusto"]["v_contatos.idt_custo"]["edit"] = array("table" => "v_contatos", "field" => "idt_custo", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_disp_mobile.name"]["edit"] = array("table" => "ipbx_disp_mobile", "field" => "name", "page" => "edit");
	$lookupTableLinks["contrato_trad"]["ipbx_interf_sip_generica.id_contrato"]["edit"] = array("table" => "ipbx_interf_sip_generica", "field" => "id_contrato", "page" => "edit");
	$lookupTableLinks["codecs"]["ipbx_interf_sip_generica.codec"]["edit"] = array("table" => "ipbx_interf_sip_generica", "field" => "codec", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["ipbx_interf_sip_generica.piloto"]["edit"] = array("table" => "ipbx_interf_sip_generica", "field" => "piloto", "page" => "edit");
	$lookupTableLinks["cc_receptivo_filas"]["cc_agentes_fila.id_filas"]["edit"] = array("table" => "cc_agentes_fila", "field" => "id_filas", "page" => "edit");
	$lookupTableLinks["ipbx_ramais"]["cc_agentes.name"]["edit"] = array("table" => "cc_agentes", "field" => "name", "page" => "edit");
	$lookupTableLinks["v_rel_detalhado_chamadas"]["Rel_Chamada_Detalhada.Fila"]["search"] = array("table" => "Rel. Cham Detalhada", "field" => "Fila", "page" => "search");
	$lookupTableLinks["v_rel_detalhado_chamadas"]["Rel_Chamada_Detalhada.Agente"]["search"] = array("table" => "Rel. Cham Detalhada", "field" => "Agente", "page" => "search");
	$lookupTableLinks["v_produt_filas"]["Rel_Produtividade_da_Fila.Fila"]["search"] = array("table" => "Rel Produtividade da Fila", "field" => "Fila", "page" => "search");
	$lookupTableLinks["v_rel_detalhado_agentes"]["Rel__Detalhamento_Agente.Fila"]["search"] = array("table" => "Rel. Detalhamento Agente", "field" => "Fila", "page" => "search");
	$lookupTableLinks["v_rel_detalhado_agentes"]["Rel__Detalhamento_Agente.Agente"]["search"] = array("table" => "Rel. Detalhamento Agente", "field" => "Agente", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Graf_per__temp_espera_por_dia.Fila"]["search"] = array("table" => "Graf. Perfil Tempo de espera por dia", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Graf__Historico_fila_data.Fila"]["search"] = array("table" => "Graf. Historico fila data", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Graf__Historico_fila_hora.Fila"]["search"] = array("table" => "Graf. Historico fila hora", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Rel__Historico_Fila_Data.Fila"]["search"] = array("table" => "Rel. Historico Fila Data", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Rel__Historico_Fila_Hora.Fila"]["search"] = array("table" => "Rel. Historico Fila Hora", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Graf__perfil_atendimento.Fila"]["search"] = array("table" => "Graf. perfil atendimento", "field" => "Fila", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas"]["Rel__Produt_filas_grupo_por_data.nm_grupo"]["search"] = array("table" => "Rel. Produt filas grupo por data", "field" => "nm_grupo", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas"]["Rel__Produt_filas_grupo_por_mes.nm_grupo"]["search"] = array("table" => "Rel. Produt filas grupo por mes", "field" => "nm_grupo", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Rel__Perf__Tempo_Espera.Fila"]["search"] = array("table" => "Rel. Perf. Tempo Espera", "field" => "Fila", "page" => "search");
	$lookupTableLinks["v_rel_produt_agente_dia"]["Rel__Produt_Agentes_Dia.fila"]["search"] = array("table" => "Rel. Produt. Agentes Dia", "field" => "fila", "page" => "search");
	$lookupTableLinks["v_rel_produt_agente_dia"]["Rel__Produt_Agentes_Dia.Agente"]["search"] = array("table" => "Rel. Produt. Agentes Dia", "field" => "Agente", "page" => "search");
	$lookupTableLinks["v_rel_disp_agente"]["Rel__Disponibilidade_Agente.agente"]["search"] = array("table" => "Rel. Disponibilidade Agente", "field" => "agente", "page" => "search");
	$lookupTableLinks["cc_receptivo_filas_atend"]["Rel__Disponibilidade_Agente.Fila"]["search"] = array("table" => "Rel. Disponibilidade Agente", "field" => "Fila", "page" => "search");
	$lookupTableLinks["centrocusto"]["Rel__Desvios_Chamadas.accountcode"]["search"] = array("table" => "Rel. Desvios Chamadas", "field" => "accountcode", "page" => "search");
	$lookupTableLinks["ipbx_ramais"]["ipbx_ugmembers.UserName"]["edit"] = array("table" => "ipbx_ugmembers", "field" => "UserName", "page" => "edit");
	$lookupTableLinks["ipbx_uggroups"]["ipbx_ugmembers.GroupID"]["edit"] = array("table" => "ipbx_ugmembers", "field" => "GroupID", "page" => "edit");
}

?>