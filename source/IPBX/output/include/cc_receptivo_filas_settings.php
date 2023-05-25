<?php

//	field labels
$fieldLabelscc_receptivo_filas = array();
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]=array();
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["id_filas"] = "Identificação";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["nm_fila"] = "Nome da fila";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["estrategia"] = "Estratégia";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["gravacao"] = "Gravação";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["arq_audio"] = "Mens. fora período atend. (WAV)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["arq_mesg"] = "Mens. antes do atend. (WAV)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["tp_toques"] = "Tempo entre toques (segundos)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["id_desvio"] = " Desvio";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["tp_excedido"] = " Tempo máximo do usuário em fila (segundos)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["acao_falta_agente"] = " Dentro do horário e falta agente conectado";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["acao_tp_excedido"] = " Dentro do horário e Tempo máximo excedido";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["acao_fr_horario"] = " Fora do horário de atendimento";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["seg_tmo"] = "Tempo máximo da operação ";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["perc_tmo"] = "Percentual Contratado";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["seg_tma"] = "Tempo máximo do atendimento ";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["perc_tma"] = "Percentual Contratado";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["seg_tme"] = "Tempo máximo de espera";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["perc_tme"] = "Percentual Contratado";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["tx_abandono"] = "Taxa de Abandono (Percentual)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["flg_estim_do_dia"] = "Estimativa do dia";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["tp_estimativa"] = "Tempo (Min.)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["id_name_gestor"] = "Gestor da fila";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["maxlen"] = "Tamanho da fila (0 para não especificar)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["wrapuptime"] = "Tempo em segundos para o atendente entre chamadas (0 para não especificar)";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["nm_grupo"] = "Grupo de filas";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["id_logout"] = "Deslogar agentes automaticamente";
$fieldLabelscc_receptivo_filas["Portuguese(Brazil)"]["Acessos"] = "Acessos";


$tdatacc_receptivo_filas=array();
	$tdatacc_receptivo_filas[".NumberOfChars"]=80; 
	$tdatacc_receptivo_filas[".ShortName"]="cc_receptivo_filas";
	$tdatacc_receptivo_filas[".OwnerID"]="";
	$tdatacc_receptivo_filas[".OriginalTable"]="cc_receptivo_filas";
	$tdatacc_receptivo_filas[".NCSearch"]=true;
	

$tdatacc_receptivo_filas[".shortTableName"] = "cc_receptivo_filas";
$tdatacc_receptivo_filas[".dataSourceTable"] = "cc_receptivo_filas";
$tdatacc_receptivo_filas[".nSecOptions"] = 0;
$tdatacc_receptivo_filas[".nLoginMethod"] = 1;
$tdatacc_receptivo_filas[".recsPerRowList"] = 1;	
$tdatacc_receptivo_filas[".tableGroupBy"] = "0";
$tdatacc_receptivo_filas[".dbType"] = 0;
$tdatacc_receptivo_filas[".mainTableOwnerID"] = "";
$tdatacc_receptivo_filas[".moveNext"] = 1;

$tdatacc_receptivo_filas[".listAjax"] = true;

	$tdatacc_receptivo_filas[".audit"] = true;

	$tdatacc_receptivo_filas[".locking"] = false;
	
$tdatacc_receptivo_filas[".listIcons"] = true;
$tdatacc_receptivo_filas[".edit"] = true;



$tdatacc_receptivo_filas[".delete"] = true;

$tdatacc_receptivo_filas[".showSimpleSearchOptions"] = false;

$tdatacc_receptivo_filas[".showSearchPanel"] = true;


$tdatacc_receptivo_filas[".isUseAjaxSuggest"] = true;

$tdatacc_receptivo_filas[".rowHighlite"] = true;

$tdatacc_receptivo_filas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_receptivo_filas[".arrKeyFields"][] = "id_filas";

// use datepicker for search panel
$tdatacc_receptivo_filas[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_receptivo_filas[".isUseTimeForSearch"] = false;






$tdatacc_receptivo_filas[".isUseInlineJs"] = $tdatacc_receptivo_filas[".isUseInlineAdd"] || $tdatacc_receptivo_filas[".isUseInlineEdit"];

$tdatacc_receptivo_filas[".allSearchFields"] = array();

$tdatacc_receptivo_filas[".globSearchFields"][] = "nm_fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_fila", $tdatacc_receptivo_filas[".allSearchFields"]))
{
	$tdatacc_receptivo_filas[".allSearchFields"][] = "nm_fila";	
}

$tdatacc_receptivo_filas[".panelSearchFields"][] = "nm_fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_fila", $tdatacc_receptivo_filas[".allSearchFields"])) 
{
	$tdatacc_receptivo_filas[".allSearchFields"][] = "nm_fila";	
}

$tdatacc_receptivo_filas[".isDynamicPerm"] = true;

	

$tdatacc_receptivo_filas[".isDisplayLoading"] = true;

$tdatacc_receptivo_filas[".isResizeColumns"] = false;


$tdatacc_receptivo_filas[".createLoginPage"] = true;


 	




$tdatacc_receptivo_filas[".pageSize"] = 100;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_receptivo_filas[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_receptivo_filas[".orderindexes"] = array();

$tdatacc_receptivo_filas[".sqlHead"] = "SELECT id_filas,  nm_fila,  estrategia,  gravacao,  arq_audio,  arq_mesg,  tp_toques,  id_desvio,  tp_excedido,  acao_falta_agente,  acao_tp_excedido,  acao_fr_horario,  seg_tmo,  perc_tmo,  seg_tma,  perc_tma,  seg_tme,  perc_tme,  tx_abandono,  flg_estim_do_dia,  tp_estimativa,  id_name_gestor,  maxlen,  wrapuptime,  nm_grupo,  id_logout,  concat('Acesso Dashboard Diário: <a href=\"./dashboard_diario_fila/monitorGestor.php?fila=', nm_fila, '\" target=\"_blank\" >Acesse aqui</a>') AS Acessos";

$tdatacc_receptivo_filas[".sqlFrom"] = "FROM cc_receptivo_filas";

$tdatacc_receptivo_filas[".sqlWhereExpr"] = "";

$tdatacc_receptivo_filas[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_filas";
	$tdatacc_receptivo_filas[".Keys"]=$tableKeys;

	
//	id_filas
	$fdata = array();
	$fdata["strName"] = "id_filas";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_filas";
		$fdata["FullName"]= "id_filas";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_receptivo_filas["id_filas"]=$fdata;
	
//	nm_fila
	$fdata = array();
	$fdata["strName"] = "nm_fila";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Nome da fila"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_fila";
		$fdata["FullName"]= "nm_fila";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas["nm_fila"]=$fdata;
	
//	estrategia
	$fdata = array();
	$fdata["strName"] = "estrategia";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Estratégia"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="estrategia";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="dsc_estrategia";
				$fdata["LookupTable"]="estrategia_fila";
	$fdata["LookupOrderBy"]="dsc_estrategia";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "estrategia";
		$fdata["FullName"]= "estrategia";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["estrategia"]=$fdata;
	
//	gravacao
	$fdata = array();
	$fdata["strName"] = "gravacao";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Gravação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "gravacao";
		$fdata["FullName"]= "gravacao";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["gravacao"]=$fdata;
	
//	arq_audio
	$fdata = array();
	$fdata["strName"] = "arq_audio";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Mens. fora período atend. (WAV)"; 
			$fdata["LinkPrefix"]="/var/lib/asterisk/sounds/pt_BR/media/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "arq_audio";
		$fdata["FullName"]= "arq_audio";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="/var/lib/asterisk/sounds/pt_BR/media/"; 
		$fdata["Absolute"] = true;
	$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["arq_audio"]=$fdata;
	
//	arq_mesg
	$fdata = array();
	$fdata["strName"] = "arq_mesg";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Mens. antes do atend. (WAV)"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "arq_mesg";
		$fdata["FullName"]= "arq_mesg";
					$fdata["UploadFolder"]="/var/lib/asterisk/sounds/pt_BR/media/"; 
		$fdata["Absolute"] = true;
	$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["arq_mesg"]=$fdata;
	
//	tp_toques
	$fdata = array();
	$fdata["strName"] = "tp_toques";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo entre toques (segundos)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="10";
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="20";
	$fdata["LookupValues"][]="25";
	$fdata["LookupValues"][]="30";
	$fdata["LookupValues"][]="35";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_toques";
		$fdata["FullName"]= "tp_toques";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["tp_toques"]=$fdata;
	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]=" Desvio"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_desvio";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_desvio";
				$fdata["LookupTable"]="cc_receptivo_filas_horario_desv";
	$fdata["LookupOrderBy"]="id_desvio";
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desvio";
		$fdata["FullName"]= "id_desvio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["id_desvio"]=$fdata;
	
//	tp_excedido
	$fdata = array();
	$fdata["strName"] = "tp_excedido";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]=" Tempo máximo do usuário em fila (segundos)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="30";
	$fdata["LookupValues"][]="60";
	$fdata["LookupValues"][]="120";
	$fdata["LookupValues"][]="180";
	$fdata["LookupValues"][]="240";
	$fdata["LookupValues"][]="300";
	$fdata["LookupValues"][]="360";
	$fdata["LookupValues"][]="420";
	$fdata["LookupValues"][]="480";
	$fdata["LookupValues"][]="540";
	$fdata["LookupValues"][]="600";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_excedido";
		$fdata["FullName"]= "tp_excedido";
						$fdata["Index"]= 9;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["tp_excedido"]=$fdata;
	
//	acao_falta_agente
	$fdata = array();
	$fdata["strName"] = "acao_falta_agente";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]=" Dentro do horário e falta agente conectado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,'-',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "acao_falta_agente";
		$fdata["FullName"]= "acao_falta_agente";
						$fdata["Index"]= 10;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["acao_falta_agente"]=$fdata;
	
//	acao_tp_excedido
	$fdata = array();
	$fdata["strName"] = "acao_tp_excedido";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]=" Dentro do horário e Tempo máximo excedido"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name, '-', callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "acao_tp_excedido";
		$fdata["FullName"]= "acao_tp_excedido";
						$fdata["Index"]= 11;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["acao_tp_excedido"]=$fdata;
	
//	acao_fr_horario
	$fdata = array();
	$fdata["strName"] = "acao_fr_horario";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]=" Fora do horário de atendimento"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name, '-', callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "acao_fr_horario";
		$fdata["FullName"]= "acao_fr_horario";
						$fdata["Index"]= 12;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["acao_fr_horario"]=$fdata;
	
//	seg_tmo
	$fdata = array();
	$fdata["strName"] = "seg_tmo";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo máximo da operação "; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "seg_tmo";
		$fdata["FullName"]= "seg_tmo";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["seg_tmo"]=$fdata;
	
//	perc_tmo
	$fdata = array();
	$fdata["strName"] = "perc_tmo";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Percentual Contratado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "perc_tmo";
		$fdata["FullName"]= "perc_tmo";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["perc_tmo"]=$fdata;
	
//	seg_tma
	$fdata = array();
	$fdata["strName"] = "seg_tma";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo máximo do atendimento "; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "seg_tma";
		$fdata["FullName"]= "seg_tma";
						$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["seg_tma"]=$fdata;
	
//	perc_tma
	$fdata = array();
	$fdata["strName"] = "perc_tma";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Percentual Contratado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "perc_tma";
		$fdata["FullName"]= "perc_tma";
						$fdata["Index"]= 16;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["perc_tma"]=$fdata;
	
//	seg_tme
	$fdata = array();
	$fdata["strName"] = "seg_tme";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo máximo de espera"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "seg_tme";
		$fdata["FullName"]= "seg_tme";
						$fdata["Index"]= 17;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["seg_tme"]=$fdata;
	
//	perc_tme
	$fdata = array();
	$fdata["strName"] = "perc_tme";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Percentual Contratado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "perc_tme";
		$fdata["FullName"]= "perc_tme";
						$fdata["Index"]= 18;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["perc_tme"]=$fdata;
	
//	tx_abandono
	$fdata = array();
	$fdata["strName"] = "tx_abandono";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Taxa de Abandono (Percentual)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tx_abandono";
		$fdata["FullName"]= "tx_abandono";
						$fdata["Index"]= 19;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["tx_abandono"]=$fdata;
	
//	flg_estim_do_dia
	$fdata = array();
	$fdata["strName"] = "flg_estim_do_dia";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Estimativa do dia"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_estim_do_dia";
		$fdata["FullName"]= "flg_estim_do_dia";
						$fdata["Index"]= 20;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["flg_estim_do_dia"]=$fdata;
	
//	tp_estimativa
	$fdata = array();
	$fdata["strName"] = "tp_estimativa";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo (Min.)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_estimativa";
		$fdata["FullName"]= "tp_estimativa";
						$fdata["Index"]= 21;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["tp_estimativa"]=$fdata;
	
//	id_name_gestor
	$fdata = array();
	$fdata["strName"] = "id_name_gestor";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Gestor da fila"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,'-',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="callerid";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 10;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_name_gestor";
		$fdata["FullName"]= "id_name_gestor";
						$fdata["Index"]= 22;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["id_name_gestor"]=$fdata;
	
//	maxlen
	$fdata = array();
	$fdata["strName"] = "maxlen";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tamanho da fila (0 para não especificar)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "maxlen";
		$fdata["FullName"]= "maxlen";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 23;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["maxlen"]=$fdata;
	
//	wrapuptime
	$fdata = array();
	$fdata["strName"] = "wrapuptime";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Tempo em segundos para o atendente entre chamadas (0 para não especificar)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "wrapuptime";
		$fdata["FullName"]= "wrapuptime";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 24;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["wrapuptime"]=$fdata;
	
//	nm_grupo
	$fdata = array();
	$fdata["strName"] = "nm_grupo";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Grupo de filas"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_grupo";
		$fdata["FullName"]= "nm_grupo";
						$fdata["Index"]= 25;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["nm_grupo"]=$fdata;
	
//	id_logout
	$fdata = array();
	$fdata["strName"] = "id_logout";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Deslogar agentes automaticamente"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="idt_logout";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_logout";
				$fdata["LookupTable"]="cc_receptivo_logout_estat";
	$fdata["LookupOrderBy"]="dsc_logout";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_logout";
		$fdata["FullName"]= "id_logout";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 26;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_receptivo_filas["id_logout"]=$fdata;
	
//	Acessos
	$fdata = array();
	$fdata["strName"] = "Acessos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Acessos";
		$fdata["FullName"]= "concat('Acesso Dashboard Diário: <a href=\"./dashboard_diario_fila/monitorGestor.php?fila=', nm_fila, '\" target=\"_blank\" >Acesse aqui</a>')";
						$fdata["Index"]= 27;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas["Acessos"]=$fdata;

	
$tables_data["cc_receptivo_filas"]=&$tdatacc_receptivo_filas;
$field_labels["cc_receptivo_filas"] = &$fieldLabelscc_receptivo_filas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_receptivo_filas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_receptivo_filas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3132=array();
$proto3132["m_strHead"] = "SELECT";
$proto3132["m_strFieldList"] = "id_filas,  nm_fila,  estrategia,  gravacao,  arq_audio,  arq_mesg,  tp_toques,  id_desvio,  tp_excedido,  acao_falta_agente,  acao_tp_excedido,  acao_fr_horario,  seg_tmo,  perc_tmo,  seg_tma,  perc_tma,  seg_tme,  perc_tme,  tx_abandono,  flg_estim_do_dia,  tp_estimativa,  id_name_gestor,  maxlen,  wrapuptime,  nm_grupo,  id_logout,  concat('Acesso Dashboard Diário: <a href=\"./dashboard_diario_fila/monitorGestor.php?fila=', nm_fila, '\" target=\"_blank\" >Acesse aqui</a>') AS Acessos";
$proto3132["m_strFrom"] = "FROM cc_receptivo_filas";
$proto3132["m_strWhere"] = "";
$proto3132["m_strOrderBy"] = "";
$proto3132["m_strTail"] = "";
$proto3133=array();
$proto3133["m_sql"] = "";
$proto3133["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3133["m_column"]=$obj;
$proto3133["m_contained"] = array();
$proto3133["m_strCase"] = "";
$proto3133["m_havingmode"] = "0";
$proto3133["m_inBrackets"] = "0";
$proto3133["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3133);

$proto3132["m_where"] = $obj;
$proto3135=array();
$proto3135["m_sql"] = "";
$proto3135["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3135["m_column"]=$obj;
$proto3135["m_contained"] = array();
$proto3135["m_strCase"] = "";
$proto3135["m_havingmode"] = "0";
$proto3135["m_inBrackets"] = "0";
$proto3135["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3135);

$proto3132["m_having"] = $obj;
$proto3132["m_fieldlist"] = array();
						$proto3137=array();
			$obj = new SQLField(array(
	"m_strName" => "id_filas",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3137["m_expr"]=$obj;
$proto3137["m_alias"] = "";
$obj = new SQLFieldListItem($proto3137);

$proto3132["m_fieldlist"][]=$obj;
						$proto3139=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_fila",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3139["m_expr"]=$obj;
$proto3139["m_alias"] = "";
$obj = new SQLFieldListItem($proto3139);

$proto3132["m_fieldlist"][]=$obj;
						$proto3141=array();
			$obj = new SQLField(array(
	"m_strName" => "estrategia",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3141["m_expr"]=$obj;
$proto3141["m_alias"] = "";
$obj = new SQLFieldListItem($proto3141);

$proto3132["m_fieldlist"][]=$obj;
						$proto3143=array();
			$obj = new SQLField(array(
	"m_strName" => "gravacao",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3143["m_expr"]=$obj;
$proto3143["m_alias"] = "";
$obj = new SQLFieldListItem($proto3143);

$proto3132["m_fieldlist"][]=$obj;
						$proto3145=array();
			$obj = new SQLField(array(
	"m_strName" => "arq_audio",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3145["m_expr"]=$obj;
$proto3145["m_alias"] = "";
$obj = new SQLFieldListItem($proto3145);

$proto3132["m_fieldlist"][]=$obj;
						$proto3147=array();
			$obj = new SQLField(array(
	"m_strName" => "arq_mesg",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3147["m_expr"]=$obj;
$proto3147["m_alias"] = "";
$obj = new SQLFieldListItem($proto3147);

$proto3132["m_fieldlist"][]=$obj;
						$proto3149=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_toques",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3149["m_expr"]=$obj;
$proto3149["m_alias"] = "";
$obj = new SQLFieldListItem($proto3149);

$proto3132["m_fieldlist"][]=$obj;
						$proto3151=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3151["m_expr"]=$obj;
$proto3151["m_alias"] = "";
$obj = new SQLFieldListItem($proto3151);

$proto3132["m_fieldlist"][]=$obj;
						$proto3153=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_excedido",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3153["m_expr"]=$obj;
$proto3153["m_alias"] = "";
$obj = new SQLFieldListItem($proto3153);

$proto3132["m_fieldlist"][]=$obj;
						$proto3155=array();
			$obj = new SQLField(array(
	"m_strName" => "acao_falta_agente",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3155["m_expr"]=$obj;
$proto3155["m_alias"] = "";
$obj = new SQLFieldListItem($proto3155);

$proto3132["m_fieldlist"][]=$obj;
						$proto3157=array();
			$obj = new SQLField(array(
	"m_strName" => "acao_tp_excedido",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3157["m_expr"]=$obj;
$proto3157["m_alias"] = "";
$obj = new SQLFieldListItem($proto3157);

$proto3132["m_fieldlist"][]=$obj;
						$proto3159=array();
			$obj = new SQLField(array(
	"m_strName" => "acao_fr_horario",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3159["m_expr"]=$obj;
$proto3159["m_alias"] = "";
$obj = new SQLFieldListItem($proto3159);

$proto3132["m_fieldlist"][]=$obj;
						$proto3161=array();
			$obj = new SQLField(array(
	"m_strName" => "seg_tmo",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3161["m_expr"]=$obj;
$proto3161["m_alias"] = "";
$obj = new SQLFieldListItem($proto3161);

$proto3132["m_fieldlist"][]=$obj;
						$proto3163=array();
			$obj = new SQLField(array(
	"m_strName" => "perc_tmo",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3163["m_expr"]=$obj;
$proto3163["m_alias"] = "";
$obj = new SQLFieldListItem($proto3163);

$proto3132["m_fieldlist"][]=$obj;
						$proto3165=array();
			$obj = new SQLField(array(
	"m_strName" => "seg_tma",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3165["m_expr"]=$obj;
$proto3165["m_alias"] = "";
$obj = new SQLFieldListItem($proto3165);

$proto3132["m_fieldlist"][]=$obj;
						$proto3167=array();
			$obj = new SQLField(array(
	"m_strName" => "perc_tma",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3167["m_expr"]=$obj;
$proto3167["m_alias"] = "";
$obj = new SQLFieldListItem($proto3167);

$proto3132["m_fieldlist"][]=$obj;
						$proto3169=array();
			$obj = new SQLField(array(
	"m_strName" => "seg_tme",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3169["m_expr"]=$obj;
$proto3169["m_alias"] = "";
$obj = new SQLFieldListItem($proto3169);

$proto3132["m_fieldlist"][]=$obj;
						$proto3171=array();
			$obj = new SQLField(array(
	"m_strName" => "perc_tme",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3171["m_expr"]=$obj;
$proto3171["m_alias"] = "";
$obj = new SQLFieldListItem($proto3171);

$proto3132["m_fieldlist"][]=$obj;
						$proto3173=array();
			$obj = new SQLField(array(
	"m_strName" => "tx_abandono",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3173["m_expr"]=$obj;
$proto3173["m_alias"] = "";
$obj = new SQLFieldListItem($proto3173);

$proto3132["m_fieldlist"][]=$obj;
						$proto3175=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_estim_do_dia",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3175["m_expr"]=$obj;
$proto3175["m_alias"] = "";
$obj = new SQLFieldListItem($proto3175);

$proto3132["m_fieldlist"][]=$obj;
						$proto3177=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_estimativa",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3177["m_expr"]=$obj;
$proto3177["m_alias"] = "";
$obj = new SQLFieldListItem($proto3177);

$proto3132["m_fieldlist"][]=$obj;
						$proto3179=array();
			$obj = new SQLField(array(
	"m_strName" => "id_name_gestor",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3179["m_expr"]=$obj;
$proto3179["m_alias"] = "";
$obj = new SQLFieldListItem($proto3179);

$proto3132["m_fieldlist"][]=$obj;
						$proto3181=array();
			$obj = new SQLField(array(
	"m_strName" => "maxlen",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3181["m_expr"]=$obj;
$proto3181["m_alias"] = "";
$obj = new SQLFieldListItem($proto3181);

$proto3132["m_fieldlist"][]=$obj;
						$proto3183=array();
			$obj = new SQLField(array(
	"m_strName" => "wrapuptime",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3183["m_expr"]=$obj;
$proto3183["m_alias"] = "";
$obj = new SQLFieldListItem($proto3183);

$proto3132["m_fieldlist"][]=$obj;
						$proto3185=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_grupo",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3185["m_expr"]=$obj;
$proto3185["m_alias"] = "";
$obj = new SQLFieldListItem($proto3185);

$proto3132["m_fieldlist"][]=$obj;
						$proto3187=array();
			$obj = new SQLField(array(
	"m_strName" => "id_logout",
	"m_strTable" => "cc_receptivo_filas"
));

$proto3187["m_expr"]=$obj;
$proto3187["m_alias"] = "";
$obj = new SQLFieldListItem($proto3187);

$proto3132["m_fieldlist"][]=$obj;
						$proto3189=array();
			$proto3190=array();
$proto3190["m_functiontype"] = "SQLF_CUSTOM";
$proto3190["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'Acesso Dashboard Diário: <a href=\"./dashboard_diario_fila/monitorGestor.php?fila='"
));

$proto3190["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "nm_fila"
));

$proto3190["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'\" target=\"_blank\" >Acesse aqui</a>'"
));

$proto3190["m_arguments"][]=$obj;
$proto3190["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto3190);

$proto3189["m_expr"]=$obj;
$proto3189["m_alias"] = "Acessos";
$obj = new SQLFieldListItem($proto3189);

$proto3132["m_fieldlist"][]=$obj;
$proto3132["m_fromlist"] = array();
												$proto3194=array();
$proto3194["m_link"] = "SQLL_MAIN";
			$proto3195=array();
$proto3195["m_strName"] = "cc_receptivo_filas";
$proto3195["m_columns"] = array();
$proto3195["m_columns"][] = "id_filas";
$proto3195["m_columns"][] = "nm_fila";
$proto3195["m_columns"][] = "estrategia";
$proto3195["m_columns"][] = "gravacao";
$proto3195["m_columns"][] = "id_horario";
$proto3195["m_columns"][] = "arq_audio";
$proto3195["m_columns"][] = "arq_mesg";
$proto3195["m_columns"][] = "tp_toques";
$proto3195["m_columns"][] = "id_desvio";
$proto3195["m_columns"][] = "tp_excedido";
$proto3195["m_columns"][] = "acao_falta_agente";
$proto3195["m_columns"][] = "acao_tp_excedido";
$proto3195["m_columns"][] = "acao_fr_horario";
$proto3195["m_columns"][] = "ramal_remoto";
$proto3195["m_columns"][] = "seg_tmo";
$proto3195["m_columns"][] = "perc_tmo";
$proto3195["m_columns"][] = "seg_tma";
$proto3195["m_columns"][] = "perc_tma";
$proto3195["m_columns"][] = "seg_tme";
$proto3195["m_columns"][] = "perc_tme";
$proto3195["m_columns"][] = "tx_abandono";
$proto3195["m_columns"][] = "flg_estim_do_dia";
$proto3195["m_columns"][] = "tp_estimativa";
$proto3195["m_columns"][] = "id_name_gestor";
$proto3195["m_columns"][] = "maxlen";
$proto3195["m_columns"][] = "wrapuptime";
$proto3195["m_columns"][] = "nm_grupo";
$proto3195["m_columns"][] = "id_logout";
$obj = new SQLTable($proto3195);

$proto3194["m_table"] = $obj;
$proto3194["m_alias"] = "";
$proto3196=array();
$proto3196["m_sql"] = "";
$proto3196["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3196["m_column"]=$obj;
$proto3196["m_contained"] = array();
$proto3196["m_strCase"] = "";
$proto3196["m_havingmode"] = "0";
$proto3196["m_inBrackets"] = "0";
$proto3196["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3196);

$proto3194["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3194);

$proto3132["m_fromlist"][]=$obj;
$proto3132["m_groupby"] = array();
$proto3132["m_orderby"] = array();
$obj = new SQLQuery($proto3132);

$queryData_cc_receptivo_filas = $obj;
$tdatacc_receptivo_filas[".sqlquery"] = $queryData_cc_receptivo_filas;



?>
