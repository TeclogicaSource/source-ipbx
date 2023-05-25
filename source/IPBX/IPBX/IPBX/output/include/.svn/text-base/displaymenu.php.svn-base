<?php
	
	global $pageObject;
	$pageType = "";
	if(isset($pageObject))
		$pageType = $pageObject->pageType;
		
	$xt = new Xtempl();
	if(array_key_exists("custom1",$menuparams) && $menuparams["custom1"]=="horizontal")
	{
		$xt->assign("horizontal_typemenu",true);//horizontal type menu
		$xt->assign("tophorizontal_item",true);//top item for horizontal menu
		$xt->assign("simplehorizontal_item",true);//simple item for horizontal menu
		$horiz=true;
	}	
	else{
		$xt->assign("vertical_typemenu",true);//vertical type menu
		$xt->assign("topvertical_item",true);//top item for vertical menu
		$xt->assign("simplevertical_item",true);//simple item for vertical menu
		$horiz=false;
	}
		
	// create menu nodes arr
	$menuNodes = array();
	$menuNode = array();
	$menuNode["name"] = "Painel de Operações";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "1";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "./fop2/index.html";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "External";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "NewWindow";					 
	// set title		
			$menuNode["title"] = "Painel de Operações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Configurações Pessoais";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "2";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "personal_info";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configurações Pessoais";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Central Telefônica";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "3";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Central Telefônica";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "4";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "central";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Interfaces";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "5";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_plano_disc";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Plano de Discagem";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Menu de Atendimento";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "6";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Menu de Atendimento";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "7";
	$menuNode["parent"] = "6";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_desv_prefix";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Desvio por prefixo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "8";
	$menuNode["parent"] = "6";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "cc_menu_atend";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Menu de Atendimento";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Ramais";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "9";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_ramais";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Ramais";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Dispositivos Móveis";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "10";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_disp_mobile";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Dispositivos Móveis";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Painel de Operações";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "11";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_painel_op";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Painel de Operações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Desvios Programados";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "12";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Desvios Programados";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Dias e horários específicos";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "13";
	$menuNode["parent"] = "12";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_horario_desv";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Dias e horários específicos";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Feriados";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "14";
	$menuNode["parent"] = "12";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_dt_especifica_feriado";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Feriados";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Agenda";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "15";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Agenda";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "16";
	$menuNode["parent"] = "15";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_call_back";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Call Back";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Lista de contatos";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "17";
	$menuNode["parent"] = "15";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "v_contatos";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Lista de contatos";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Telefones Corporativos";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "18";
	$menuNode["parent"] = "15";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "agenda";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Telefones Corporativos";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Contratos";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "19";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Contratos";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Contrato Tradicional";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "20";
	$menuNode["parent"] = "19";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "contrato_trad";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Contrato Tradicional";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Contrato VOIP";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "21";
	$menuNode["parent"] = "19";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "contrato_voip";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Contrato VOIP";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Contrato GSM";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "22";
	$menuNode["parent"] = "19";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "contrato_gsm";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Contrato GSM";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatórios";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "23";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatórios";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Custo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "24";
	$menuNode["parent"] = "23";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório Simplificado Centro de Custo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "25";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Simplificado - Centro de custo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório Simplificado Centro de Custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório Detalhado Centro de Custo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "26";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Detalhado - Centro de custo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório Detalhado Centro de Custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório Sintético Custo por Interface";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "27";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Lig Custo por tronco";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório Sintético Custo por Interface";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório custo de chamadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "28";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Bilhetagem";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório custo de chamadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório Mês / Centro de custo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "29";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Centro de custo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório Mês / Centro de custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico - Centro de Custo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "30";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Centro de custo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico - Centro de Custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Custo Linha Tradicional";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "31";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Custo Trad";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Custo Linha Tradicional";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Custo Linha VONO";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "32";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Custo Voip";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Custo Linha VONO";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Custo Linha GSM";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "33";
	$menuNode["parent"] = "24";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Custo GSM";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Custo Linha GSM";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Chamadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "34";
	$menuNode["parent"] = "23";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Chamadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório chamadas Discadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "35";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Lig. Discadas";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório chamadas Discadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório chamadas Recebidas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "36";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Recebidas";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório chamadas Recebidas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico Ligações Discadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "37";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Lig. Discadas";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico Ligações Discadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Minutagem Tradicional";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "38";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Minutagem Trad";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Minutagem Tradicional";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Minutagem VONO";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "39";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Minutagem Voip";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Minutagem VONO";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Minutagem GSM";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "40";
	$menuNode["parent"] = "34";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Minutagem GSM";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Minutagem GSM";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "41";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_grupo_captura";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Grupo de Captura";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gravações";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "42";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gravações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "43";
	$menuNode["parent"] = "42";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_conf_grav";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configurações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Acesso as Gravações";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "44";
	$menuNode["parent"] = "42";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_gravacoes";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Acesso as Gravações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "45";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "centrocusto";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Centro de Custo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Horários";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "46";
	$menuNode["parent"] = "3";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "horario";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Horários";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Call Center";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "47";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Call Center";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Configuração de Filas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "48";
	$menuNode["parent"] = "47";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configuração de Filas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "49";
	$menuNode["parent"] = "48";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "cc_receptivo_filas";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Filas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "50";
	$menuNode["parent"] = "48";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "cc_agentes";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Agentes";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "51";
	$menuNode["parent"] = "48";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "cc_tipos_pausa";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Cadastro Pausa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Desvio de Filas (Horários)";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "52";
	$menuNode["parent"] = "48";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "cc_receptivo_filas_horario_desv";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Desvio de Filas (Horários)";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Pesquisa";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "53";
	$menuNode["parent"] = "48";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_pesquisa_ura_rev";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Pesquisa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Monitoramento";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "54";
	$menuNode["parent"] = "47";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Monitoramento";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Painel Gestor";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "55";
	$menuNode["parent"] = "54";
	$menuNode["style"] = "";
	$menuNode["href"] = "./dashipbx/";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "External";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "NewWindow";					 
	// set title		
			$menuNode["title"] = "Painel Gestor";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Painel Agente";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "56";
	$menuNode["parent"] = "54";
	$menuNode["style"] = "";
	$menuNode["href"] = "./dashipbx/MonitorAgent.html";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "External";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "NewWindow";					 
	// set title		
			$menuNode["title"] = "Painel Agente";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatórios";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "57";
	$menuNode["parent"] = "47";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatórios";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório detalhado das chamadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "58";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Cham Detalhada";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório detalhado das chamadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório chamadas abandonadas";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "59";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Abandonos";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório chamadas abandonadas";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Detalhamento do Agente";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "60";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Detalhamento Agente";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Detalhamento do Agente";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Histórico Fila por Hora";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "61";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Historico Fila Hora";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Histórico Fila por Hora";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Histórico Fila por Data";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "62";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Historico Fila Data";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Histórico Fila por Data";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Produtividade do Agente";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "63";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Produt. Agentes";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Produtividade do Agente";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Produtividade da Fila";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "64";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel Produtividade da Fila";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Produtividade da Fila";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Produtividade por grupo de fila e data";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "65";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Produt filas grupo por data";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Produtividade por grupo de fila e data";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório de Produtividade por grupo de fila e mes";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "66";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Produt filas grupo por mes";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório de Produtividade por grupo de fila e mes";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório Detalhado das chamadas por fila e agente";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "67";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Atendimento";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório Detalhado das chamadas por fila e agente";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Relatório do Perfil do Tempo de Espera";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "68";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Perf. Tempo Espera";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Relatório do Perfil do Tempo de Espera";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Dados da pesquisa de satisfação";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "69";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Pesquisa";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Dados da pesquisa de satisfação";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de chamadas não atendidas por agente";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "70";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Chamadas sem atendimento";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de chamadas não atendidas por agente";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico Histórico fila hora";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "71";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Historico fila hora";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico Histórico fila hora";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico Histórico fila data";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "72";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Historico fila data";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico Histórico fila data";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de perfil do tempo de espera";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "73";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Perfil Tempo de espera por dia";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de perfil do tempo de espera";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico do perfil do tempo de atendimento";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "74";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. perfil atendimento";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico do perfil do tempo de atendimento";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Atendimento e Abandonadas por dia";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "75";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Atendimento";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Atendimento e Abandonadas por dia";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gráfico de Atendimento e Abandonadas por Mês";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "76";
	$menuNode["parent"] = "57";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Graf. Atendimento (Mensal)";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Chart";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gráfico de Atendimento e Abandonadas por Mês";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "77";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "conf_sala";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Sala de Conferência";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "FAX";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "78";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "FAX";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Envio de FAX";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "79";
	$menuNode["parent"] = "78";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_send_fax";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Envio de FAX";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "80";
	$menuNode["parent"] = "78";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_rcv_fax";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "FAX Recebidos";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "FAX Enviados";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "81";
	$menuNode["parent"] = "78";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_tx_fax";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "FAX Enviados";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "82";
	$menuNode["parent"] = "78";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_conf_fax";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configuração";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Gestão SMS";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "83";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Gestão SMS";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "84";
	$menuNode["parent"] = "83";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "sms_grupo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Grupo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "85";
	$menuNode["parent"] = "83";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "sms_celulares";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Celulares";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "86";
	$menuNode["parent"] = "83";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "sms_noticias";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Notícias";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Ura Reversa";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "87";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Ura Reversa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Pesquisa";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "88";
	$menuNode["parent"] = "87";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_pesquisa_ura_rev";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Pesquisa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Monitoramento URA reversa";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "89";
	$menuNode["parent"] = "87";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Ura Reversa - Enfileiramento";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Monitoramento URA reversa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Respostas da URA Reversa";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "90";
	$menuNode["parent"] = "87";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Rel. Pesquisa Reversa";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Report";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Respostas da URA Reversa";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Configuração";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "91";
	$menuNode["parent"] = "87";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configuração";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "92";
	$menuNode["parent"] = "91";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_ura_rev_inbound";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Inbound";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "93";
	$menuNode["parent"] = "91";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_ura_rev_outbound";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Outbound";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "94";
	$menuNode["parent"] = "91";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_ura_rev_conf";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configuração";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Configurações";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "95";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configurações";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "96";
	$menuNode["parent"] = "95";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_audit";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Auditoria";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Backup";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "97";
	$menuNode["parent"] = "95";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Backup";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "98";
	$menuNode["parent"] = "97";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_backup";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "Add";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Backup";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "99";
	$menuNode["parent"] = "97";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "Restore";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Restore";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "LDAP";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "100";
	$menuNode["parent"] = "95";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "LDAP";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Usuários LDAP";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "101";
	$menuNode["parent"] = "100";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ldap";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Usuários LDAP";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Configurações LDAP";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "102";
	$menuNode["parent"] = "100";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_ldap_conf";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Configurações LDAP";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Painel de Controle";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "103";
	$menuNode["parent"] = "95";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Painel de Controle";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Parâmetros do Sistema";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "104";
	$menuNode["parent"] = "103";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "parametros";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Parâmetros do Sistema";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Sincronismo";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "105";
	$menuNode["parent"] = "103";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_sincronismo";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Sincronismo";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Conf. IP e Diagnóstico";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "106";
	$menuNode["parent"] = "103";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "diag_ipbx";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Conf. IP e Diagnóstico";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Tarifação";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "107";
	$menuNode["parent"] = "103";
	$menuNode["style"] = "";
	$menuNode["href"] = "";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Group";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Tarifação";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "108";
	$menuNode["parent"] = "107";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "ipbx_tarifa_vc2";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Tarifa VC2";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Vono";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "109";
	$menuNode["parent"] = "107";
	$menuNode["style"] = "";
	$menuNode["href"] = "mypage.htm";
	$menuNode["params"] = "";
	$menuNode["table"] = "VONO";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "None";					 
	// set title		
			$menuNode["title"] = "Vono";
	$menuNodes[] = $menuNode;	
	
	$menuNode = array();
	$menuNode["name"] = "Ajuda";
	$menuNode["nameType"] = "Text";
	$menuNode["id"] = "110";
	$menuNode["parent"] = "0";
	$menuNode["style"] = "";
	$menuNode["href"] = "/ajuda/";
	$menuNode["params"] = "";
	$menuNode["table"] = "";
	$menuNode["type"] = "Leaf";
	$menuNode["linkType"] = "External";
	$menuNode["pageType"] = "List";
	$menuNode["openType"] = "NewWindow";					 
	// set title		
			$menuNode["title"] = "Ajuda";
	$menuNodes[] = $menuNode;	
	
	
	// need to predefine vars
	$nullParent = NULL;
	$rootInfoArr = array("id"=>0, "href"=>"");
	// create treeMenu instance
	$menuRoot = new MenuItem($rootInfoArr, $menuNodes, $nullParent);
	// call xtempl assign, set session params
	$menuRoot->setMenuSession();
	$menuRoot->assignMenuAttrsToTempl($xt);
	$menuRoot->setCurrMenuElem($xt);
	$menuRoot->clearMenuSession();
	
	$xt->assign("mainmenu_block",true);
	$rOrder = $xt->getReadingOrder();
	
	$mainmenu=array();
	if(isEnableSection508()) 
	{
		$mainmenu["begin"]="<a name=\"skipmenu\"></a>";
	}
//	Javascript code for menu on page
	$menumessages = "window.TEXT_EXPAND_ALL = '".jsreplace("Abrir Menu")."';\r\n";
	$menumessages.= "window.TEXT_COLLAPSE_ALL = '".jsreplace("Fechar Menu")."';\r\n";
	$mainmenu["end"]='
	<script type="text/javascript" language="javascript" src="include/jquery.dropshadow.js"></script>';
		$mainmenu["end"] .= '<script>'.$menumessages.
	'	flag = 0;menu1 = null;ul = null;';
	if($horiz)
	{
		//	Horizontal menu
		$mainmenu["end"].='if($("div.Gmenu").length)
				Gmenu("'.$rOrder.'");';
	}	
	else
	{
			//	Vertical menu variant 1
		$mainmenu["end"].='if($("div.Vmenu1").length)
			Vmenu1("'.$rOrder.'");
		';
	}
	$mainmenu["end"].='</script>';
	
	$countLinks=0;
	$countGroups=0;
	foreach($menuRoot->children as $ind=>$val)
	{
		if($val->showAsLink)
			$countLinks++;			
		if ($val->showAsGroup)
			$countGroups++;			
	}
	if(($pageType == PAGE_MENU) || $countLinks>1 || $countGroups>0)
	{
		$xt->assignbyref("mainmenu_block",$mainmenu);
		$xt->assign("mainmenustyle_block",true);
		$xt->assign("mainmenuiestyle_block",true);
		if(isset($menuparams["quickjump"]))
			$xt->display("mainmenu_quickjump.htm");
		elseif(array_key_exists("custom1",$menuparams) && $menuparams["custom1"]=="horizontal")
			$xt->display("mainmenu_horiz.htm");
		else
			$xt->display("mainmenu.htm");
	}
	//for add ao delete &nbsp; 
?>
