<?php

//	field labels
$fieldLabelsRel__Historico_Fila_Data = array();
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Agent_Disp"] = "Média de Agentes Disponíveis";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["AgentesPausa"] = "Média de Agentes Pausa";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Chamadas_Atendidas"] = "Total de chamadas Atendidas";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Chamadas_Abandonadas"] = "Total de chamadas Abandonadas";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Agent_Disp_Maior"] = "Maior qtd. de agentes Disponíveis";
$fieldLabelsRel__Historico_Fila_Data["Portuguese(Brazil)"]["Agent_Pausa_Maior"] = "Maior qtd. de Agentes Pausados";


$tdataRel__Historico_Fila_Data=array();
	$tdataRel__Historico_Fila_Data[".NumberOfChars"]=80; 
	$tdataRel__Historico_Fila_Data[".ShortName"]="Rel__Historico_Fila_Data";
	$tdataRel__Historico_Fila_Data[".OwnerID"]="";
	$tdataRel__Historico_Fila_Data[".OriginalTable"]="v_rel_hist_fila_data";
	$tdataRel__Historico_Fila_Data[".NCSearch"]=true;
	

$tdataRel__Historico_Fila_Data[".shortTableName"] = "Rel__Historico_Fila_Data";
$tdataRel__Historico_Fila_Data[".dataSourceTable"] = "Rel. Historico Fila Data";
$tdataRel__Historico_Fila_Data[".nSecOptions"] = 0;
$tdataRel__Historico_Fila_Data[".nLoginMethod"] = 1;
$tdataRel__Historico_Fila_Data[".recsPerRowList"] = 1;	
$tdataRel__Historico_Fila_Data[".tableGroupBy"] = "1";
$tdataRel__Historico_Fila_Data[".dbType"] = 0;
$tdataRel__Historico_Fila_Data[".mainTableOwnerID"] = "";
$tdataRel__Historico_Fila_Data[".moveNext"] = 1;

$tdataRel__Historico_Fila_Data[".listAjax"] = false;

	$tdataRel__Historico_Fila_Data[".audit"] = false;

	$tdataRel__Historico_Fila_Data[".locking"] = false;
	
$tdataRel__Historico_Fila_Data[".listIcons"] = true;

$tdataRel__Historico_Fila_Data[".exportTo"] = true;

$tdataRel__Historico_Fila_Data[".printFriendly"] = true;


$tdataRel__Historico_Fila_Data[".showSimpleSearchOptions"] = false;

$tdataRel__Historico_Fila_Data[".showSearchPanel"] = true;


$tdataRel__Historico_Fila_Data[".isUseAjaxSuggest"] = true;


$tdataRel__Historico_Fila_Data[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Historico_Fila_Data[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Historico_Fila_Data[".isUseTimeForSearch"] = false;





$tdataRel__Historico_Fila_Data[".isUseInlineJs"] = $tdataRel__Historico_Fila_Data[".isUseInlineAdd"] || $tdataRel__Historico_Fila_Data[".isUseInlineEdit"];

$tdataRel__Historico_Fila_Data[".allSearchFields"] = array();

$tdataRel__Historico_Fila_Data[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Historico_Fila_Data[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Data[".allSearchFields"][] = "Fila";	
}
$tdataRel__Historico_Fila_Data[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataRel__Historico_Fila_Data[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Data[".allSearchFields"][] = "Data";	
}


$tdataRel__Historico_Fila_Data[".isDynamicPerm"] = true;

	

$tdataRel__Historico_Fila_Data[".isDisplayLoading"] = true;

$tdataRel__Historico_Fila_Data[".isResizeColumns"] = false;


$tdataRel__Historico_Fila_Data[".createLoginPage"] = true;


 	

$tdataRel__Historico_Fila_Data[".noRecordsFirstPage"] = true;




$gstrOrderBy = "order by 1 , 2 , 3";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Historico_Fila_Data[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Historico_Fila_Data[".orderindexes"] = array();
$tdataRel__Historico_Fila_Data[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$tdataRel__Historico_Fila_Data[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "dt_periodo");
$tdataRel__Historico_Fila_Data[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media))))");

$tdataRel__Historico_Fila_Data[".sqlHead"] = "select log.Fila AS Fila,      log.dt_periodo AS Data,      floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS \"Agent.Disp\",  	floor(max(log.ag_logados_maior)) AS \"Agent.Disp.Maior\",  	floor(max(log.ag_pausados_maior)) AS \"Agent.Pausa.Maior\",      floor(avg(log.ag_pausados_media)) AS AgentesPausa,      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))) AS \"Chamadas Atendidas\",      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))) AS \"Chamadas Abandonadas\"";

$tdataRel__Historico_Fila_Data[".sqlFrom"] = "from      log_fila_agente_consolidada log";

$tdataRel__Historico_Fila_Data[".sqlWhereExpr"] = "";

$tdataRel__Historico_Fila_Data[".sqlTail"] = "group by log.Fila , log.dt_periodo";



	$tableKeys=array();
	$tdataRel__Historico_Fila_Data[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "log_fila_agente_consolidada";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Fila";
				$fdata["LookupTable"]="cc_receptivo_filas_atend";
	$fdata["LookupOrderBy"]="Fila";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "log.Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Fila"]=$fdata;
	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "log_fila_agente_consolidada";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "log.dt_periodo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Data"]=$fdata;
	
//	Agent.Disp
	$fdata = array();
	$fdata["strName"] = "Agent.Disp";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Média de Agentes Disponíveis"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Agent_Disp";
		$fdata["FullName"]= "floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media))))";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Agent.Disp"]=$fdata;
	
//	Agent.Disp.Maior
	$fdata = array();
	$fdata["strName"] = "Agent.Disp.Maior";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Maior qtd. de agentes Disponíveis"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Agent_Disp_Maior";
		$fdata["FullName"]= "floor(max(log.ag_logados_maior))";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Agent.Disp.Maior"]=$fdata;
	
//	Agent.Pausa.Maior
	$fdata = array();
	$fdata["strName"] = "Agent.Pausa.Maior";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Maior qtd. de Agentes Pausados"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Agent_Pausa_Maior";
		$fdata["FullName"]= "floor(max(log.ag_pausados_maior))";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Agent.Pausa.Maior"]=$fdata;
	
//	AgentesPausa
	$fdata = array();
	$fdata["strName"] = "AgentesPausa";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Média de Agentes Pausa"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "AgentesPausa";
		$fdata["FullName"]= "floor(avg(log.ag_pausados_media))";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["AgentesPausa"]=$fdata;
	
//	Chamadas Atendidas
	$fdata = array();
	$fdata["strName"] = "Chamadas Atendidas";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total de chamadas Atendidas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Atendidas";
		$fdata["FullName"]= "(select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0))))";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Chamadas Atendidas"]=$fdata;
	
//	Chamadas Abandonadas
	$fdata = array();
	$fdata["strName"] = "Chamadas Abandonadas";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total de chamadas Abandonadas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Abandonadas";
		$fdata["FullName"]= "(select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0))))";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Chamadas Abandonadas"]=$fdata;

	
$tables_data["Rel. Historico Fila Data"]=&$tdataRel__Historico_Fila_Data;
$field_labels["Rel__Historico_Fila_Data"] = &$fieldLabelsRel__Historico_Fila_Data;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Historico Fila Data"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Historico Fila Data"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto758=array();
$proto758["m_strHead"] = "select";
$proto758["m_strFieldList"] = "log.Fila AS Fila,      log.dt_periodo AS Data,      floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS \"Agent.Disp\",  	floor(max(log.ag_logados_maior)) AS \"Agent.Disp.Maior\",  	floor(max(log.ag_pausados_maior)) AS \"Agent.Pausa.Maior\",      floor(avg(log.ag_pausados_media)) AS AgentesPausa,      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))) AS \"Chamadas Atendidas\",      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))) AS \"Chamadas Abandonadas\"";
$proto758["m_strFrom"] = "from      log_fila_agente_consolidada log";
$proto758["m_strWhere"] = "";
$proto758["m_strOrderBy"] = "order by 1 , 2 , 3";
$proto758["m_strTail"] = "group by log.Fila , log.dt_periodo";
$proto759=array();
$proto759["m_sql"] = "";
$proto759["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto759["m_column"]=$obj;
$proto759["m_contained"] = array();
$proto759["m_strCase"] = "";
$proto759["m_havingmode"] = "0";
$proto759["m_inBrackets"] = "0";
$proto759["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto759);

$proto758["m_where"] = $obj;
$proto761=array();
$proto761["m_sql"] = "";
$proto761["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto761["m_column"]=$obj;
$proto761["m_contained"] = array();
$proto761["m_strCase"] = "";
$proto761["m_havingmode"] = "0";
$proto761["m_inBrackets"] = "0";
$proto761["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto761);

$proto758["m_having"] = $obj;
$proto758["m_fieldlist"] = array();
						$proto763=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "log"
));

$proto763["m_expr"]=$obj;
$proto763["m_alias"] = "Fila";
$obj = new SQLFieldListItem($proto763);

$proto758["m_fieldlist"][]=$obj;
						$proto765=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_periodo",
	"m_strTable" => "log"
));

$proto765["m_expr"]=$obj;
$proto765["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto765);

$proto758["m_fieldlist"][]=$obj;
						$proto767=array();
			$proto768=array();
$proto768["m_functiontype"] = "SQLF_CUSTOM";
$proto768["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))"
));

$proto768["m_arguments"][]=$obj;
$proto768["m_strFunctionName"] = "floor";
$obj = new SQLFunctionCall($proto768);

$proto767["m_expr"]=$obj;
$proto767["m_alias"] = "\"Agent.Disp\"";
$obj = new SQLFieldListItem($proto767);

$proto758["m_fieldlist"][]=$obj;
						$proto770=array();
			$proto771=array();
$proto771["m_functiontype"] = "SQLF_CUSTOM";
$proto771["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "max(log.ag_logados_maior)"
));

$proto771["m_arguments"][]=$obj;
$proto771["m_strFunctionName"] = "floor";
$obj = new SQLFunctionCall($proto771);

$proto770["m_expr"]=$obj;
$proto770["m_alias"] = "\"Agent.Disp.Maior\"";
$obj = new SQLFieldListItem($proto770);

$proto758["m_fieldlist"][]=$obj;
						$proto773=array();
			$proto774=array();
$proto774["m_functiontype"] = "SQLF_CUSTOM";
$proto774["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "max(log.ag_pausados_maior)"
));

$proto774["m_arguments"][]=$obj;
$proto774["m_strFunctionName"] = "floor";
$obj = new SQLFunctionCall($proto774);

$proto773["m_expr"]=$obj;
$proto773["m_alias"] = "\"Agent.Pausa.Maior\"";
$obj = new SQLFieldListItem($proto773);

$proto758["m_fieldlist"][]=$obj;
						$proto776=array();
			$proto777=array();
$proto777["m_functiontype"] = "SQLF_CUSTOM";
$proto777["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg(log.ag_pausados_media)"
));

$proto777["m_arguments"][]=$obj;
$proto777["m_strFunctionName"] = "floor";
$obj = new SQLFunctionCall($proto777);

$proto776["m_expr"]=$obj;
$proto776["m_alias"] = "AgentesPausa";
$obj = new SQLFieldListItem($proto776);

$proto758["m_fieldlist"][]=$obj;
						$proto779=array();
			$proto780=array();
$proto780["m_strHead"] = "select";
$proto780["m_strFieldList"] = "count(0) AS \"count(*)\"";
$proto780["m_strFrom"] = "from              cc_receptivo_filas_atend";
$proto780["m_strWhere"] = "((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))";
$proto780["m_strOrderBy"] = "";
$proto780["m_strTail"] = "";
$proto781=array();
$proto781["m_sql"] = "(cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0))";
$proto781["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0))"
));

$proto781["m_column"]=$obj;
$proto781["m_contained"] = array();
						$proto783=array();
$proto783["m_sql"] = "cc_receptivo_filas_atend.Fila = log.Fila";
$proto783["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto783["m_column"]=$obj;
$proto783["m_contained"] = array();
$proto783["m_strCase"] = "= log.Fila";
$proto783["m_havingmode"] = "0";
$proto783["m_inBrackets"] = "1";
$proto783["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto783);

			$proto781["m_contained"][]=$obj;
						$proto785=array();
$proto785["m_sql"] = "cc_receptivo_filas_atend.dt_entrada = log.dt_periodo";
$proto785["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto785["m_column"]=$obj;
$proto785["m_contained"] = array();
$proto785["m_strCase"] = "= log.dt_periodo";
$proto785["m_havingmode"] = "0";
$proto785["m_inBrackets"] = "1";
$proto785["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto785);

			$proto781["m_contained"][]=$obj;
						$proto787=array();
$proto787["m_sql"] = "cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)";
$proto787["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)"
));

$proto787["m_column"]=$obj;
$proto787["m_contained"] = array();
						$proto789=array();
$proto789["m_sql"] = "cc_receptivo_filas_atend.tp_atendimento is not null";
$proto789["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto789["m_column"]=$obj;
$proto789["m_contained"] = array();
$proto789["m_strCase"] = "is not null";
$proto789["m_havingmode"] = "0";
$proto789["m_inBrackets"] = "0";
$proto789["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto789);

			$proto787["m_contained"][]=$obj;
						$proto791=array();
$proto791["m_sql"] = "cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)";
$proto791["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto791["m_column"]=$obj;
$proto791["m_contained"] = array();
$proto791["m_strCase"] = "<> sec_to_time(0)";
$proto791["m_havingmode"] = "0";
$proto791["m_inBrackets"] = "0";
$proto791["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto791);

			$proto787["m_contained"][]=$obj;
$proto787["m_strCase"] = "";
$proto787["m_havingmode"] = "0";
$proto787["m_inBrackets"] = "1";
$proto787["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto787);

			$proto781["m_contained"][]=$obj;
$proto781["m_strCase"] = "";
$proto781["m_havingmode"] = "0";
$proto781["m_inBrackets"] = "0";
$proto781["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto781);

$proto780["m_where"] = $obj;
$proto793=array();
$proto793["m_sql"] = "";
$proto793["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto793["m_column"]=$obj;
$proto793["m_contained"] = array();
$proto793["m_strCase"] = "";
$proto793["m_havingmode"] = "0";
$proto793["m_inBrackets"] = "0";
$proto793["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto793);

$proto780["m_having"] = $obj;
$proto780["m_fieldlist"] = array();
						$proto795=array();
			$proto796=array();
$proto796["m_functiontype"] = "SQLF_COUNT";
$proto796["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto796["m_arguments"][]=$obj;
$proto796["m_strFunctionName"] = "count";
$obj = new SQLFunctionCall($proto796);

$proto795["m_expr"]=$obj;
$proto795["m_alias"] = "\"count(*)\"";
$obj = new SQLFieldListItem($proto795);

$proto780["m_fieldlist"][]=$obj;
$proto780["m_fromlist"] = array();
												$proto798=array();
$proto798["m_link"] = "SQLL_MAIN";
			$proto799=array();
$proto799["m_strName"] = "cc_receptivo_filas_atend";
$proto799["m_columns"] = array();
$proto799["m_columns"][] = "chave";
$proto799["m_columns"][] = "dt_entrada";
$proto799["m_columns"][] = "hr_entrada";
$proto799["m_columns"][] = "Fila";
$proto799["m_columns"][] = "Agente";
$proto799["m_columns"][] = "hr_atendimento";
$proto799["m_columns"][] = "hr_abandono";
$proto799["m_columns"][] = "tp_espera";
$proto799["m_columns"][] = "tp_atendimento";
$proto799["m_columns"][] = "Telefone";
$proto799["m_columns"][] = "ps_entrada";
$proto799["m_columns"][] = "ps_abandono";
$proto799["m_columns"][] = "tel_trans";
$proto799["m_columns"][] = "dsl_motiv";
$proto799["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto799);

$proto798["m_table"] = $obj;
$proto798["m_alias"] = "";
$proto800=array();
$proto800["m_sql"] = "";
$proto800["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto800["m_column"]=$obj;
$proto800["m_contained"] = array();
$proto800["m_strCase"] = "";
$proto800["m_havingmode"] = "0";
$proto800["m_inBrackets"] = "0";
$proto800["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto800);

$proto798["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto798);

$proto780["m_fromlist"][]=$obj;
$proto780["m_groupby"] = array();
$proto780["m_orderby"] = array();
$obj = new SQLQuery($proto780);

$proto779["m_expr"]=$obj;
$proto779["m_alias"] = "\"Chamadas Atendidas\"";
$obj = new SQLFieldListItem($proto779);

$proto758["m_fieldlist"][]=$obj;
						$proto802=array();
			$proto803=array();
$proto803["m_strHead"] = "select";
$proto803["m_strFieldList"] = "count(0) AS \"count(*)\"";
$proto803["m_strFrom"] = "from              cc_receptivo_filas_atend";
$proto803["m_strWhere"] = "((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))";
$proto803["m_strOrderBy"] = "";
$proto803["m_strTail"] = "";
$proto804=array();
$proto804["m_sql"] = "(cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0))";
$proto804["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0))"
));

$proto804["m_column"]=$obj;
$proto804["m_contained"] = array();
						$proto806=array();
$proto806["m_sql"] = "cc_receptivo_filas_atend.Fila = log.Fila";
$proto806["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto806["m_column"]=$obj;
$proto806["m_contained"] = array();
$proto806["m_strCase"] = "= log.Fila";
$proto806["m_havingmode"] = "0";
$proto806["m_inBrackets"] = "1";
$proto806["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto806);

			$proto804["m_contained"][]=$obj;
						$proto808=array();
$proto808["m_sql"] = "cc_receptivo_filas_atend.dt_entrada = log.dt_periodo";
$proto808["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto808["m_column"]=$obj;
$proto808["m_contained"] = array();
$proto808["m_strCase"] = "= log.dt_periodo";
$proto808["m_havingmode"] = "0";
$proto808["m_inBrackets"] = "1";
$proto808["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto808);

			$proto804["m_contained"][]=$obj;
						$proto810=array();
$proto810["m_sql"] = "cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)";
$proto810["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)"
));

$proto810["m_column"]=$obj;
$proto810["m_contained"] = array();
						$proto812=array();
$proto812["m_sql"] = "cc_receptivo_filas_atend.hr_abandono is not null";
$proto812["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto812["m_column"]=$obj;
$proto812["m_contained"] = array();
$proto812["m_strCase"] = "is not null";
$proto812["m_havingmode"] = "0";
$proto812["m_inBrackets"] = "0";
$proto812["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto812);

			$proto810["m_contained"][]=$obj;
						$proto814=array();
$proto814["m_sql"] = "cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)";
$proto814["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto814["m_column"]=$obj;
$proto814["m_contained"] = array();
$proto814["m_strCase"] = "<> sec_to_time(0)";
$proto814["m_havingmode"] = "0";
$proto814["m_inBrackets"] = "0";
$proto814["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto814);

			$proto810["m_contained"][]=$obj;
$proto810["m_strCase"] = "";
$proto810["m_havingmode"] = "0";
$proto810["m_inBrackets"] = "1";
$proto810["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto810);

			$proto804["m_contained"][]=$obj;
$proto804["m_strCase"] = "";
$proto804["m_havingmode"] = "0";
$proto804["m_inBrackets"] = "0";
$proto804["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto804);

$proto803["m_where"] = $obj;
$proto816=array();
$proto816["m_sql"] = "";
$proto816["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto816["m_column"]=$obj;
$proto816["m_contained"] = array();
$proto816["m_strCase"] = "";
$proto816["m_havingmode"] = "0";
$proto816["m_inBrackets"] = "0";
$proto816["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto816);

$proto803["m_having"] = $obj;
$proto803["m_fieldlist"] = array();
						$proto818=array();
			$proto819=array();
$proto819["m_functiontype"] = "SQLF_COUNT";
$proto819["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto819["m_arguments"][]=$obj;
$proto819["m_strFunctionName"] = "count";
$obj = new SQLFunctionCall($proto819);

$proto818["m_expr"]=$obj;
$proto818["m_alias"] = "\"count(*)\"";
$obj = new SQLFieldListItem($proto818);

$proto803["m_fieldlist"][]=$obj;
$proto803["m_fromlist"] = array();
												$proto821=array();
$proto821["m_link"] = "SQLL_MAIN";
			$proto822=array();
$proto822["m_strName"] = "cc_receptivo_filas_atend";
$proto822["m_columns"] = array();
$proto822["m_columns"][] = "chave";
$proto822["m_columns"][] = "dt_entrada";
$proto822["m_columns"][] = "hr_entrada";
$proto822["m_columns"][] = "Fila";
$proto822["m_columns"][] = "Agente";
$proto822["m_columns"][] = "hr_atendimento";
$proto822["m_columns"][] = "hr_abandono";
$proto822["m_columns"][] = "tp_espera";
$proto822["m_columns"][] = "tp_atendimento";
$proto822["m_columns"][] = "Telefone";
$proto822["m_columns"][] = "ps_entrada";
$proto822["m_columns"][] = "ps_abandono";
$proto822["m_columns"][] = "tel_trans";
$proto822["m_columns"][] = "dsl_motiv";
$proto822["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto822);

$proto821["m_table"] = $obj;
$proto821["m_alias"] = "";
$proto823=array();
$proto823["m_sql"] = "";
$proto823["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto823["m_column"]=$obj;
$proto823["m_contained"] = array();
$proto823["m_strCase"] = "";
$proto823["m_havingmode"] = "0";
$proto823["m_inBrackets"] = "0";
$proto823["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto823);

$proto821["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto821);

$proto803["m_fromlist"][]=$obj;
$proto803["m_groupby"] = array();
$proto803["m_orderby"] = array();
$obj = new SQLQuery($proto803);

$proto802["m_expr"]=$obj;
$proto802["m_alias"] = "\"Chamadas Abandonadas\"";
$obj = new SQLFieldListItem($proto802);

$proto758["m_fieldlist"][]=$obj;
$proto758["m_fromlist"] = array();
												$proto825=array();
$proto825["m_link"] = "SQLL_MAIN";
			$proto826=array();
$proto826["m_strName"] = "log_fila_agente_consolidada";
$proto826["m_columns"] = array();
$proto826["m_columns"][] = "Fila";
$proto826["m_columns"][] = "dt_periodo";
$proto826["m_columns"][] = "hr_periodo";
$proto826["m_columns"][] = "ag_logados_menor";
$proto826["m_columns"][] = "ag_logados_maior";
$proto826["m_columns"][] = "ag_logados_media";
$proto826["m_columns"][] = "ag_pausados_menor";
$proto826["m_columns"][] = "ag_pausados_maior";
$proto826["m_columns"][] = "ag_pausados_media";
$proto826["m_columns"][] = "ag_atendendo_menor";
$proto826["m_columns"][] = "ag_atendendo_maior";
$proto826["m_columns"][] = "ag_atendendo_media";
$proto826["m_columns"][] = "ag_discando_menor";
$proto826["m_columns"][] = "ag_discando_maior";
$proto826["m_columns"][] = "ag_discando_media";
$proto826["m_columns"][] = "soma_atendimento";
$proto826["m_columns"][] = "soma_espera";
$proto826["m_columns"][] = "qtd_atendimento";
$proto826["m_columns"][] = "qtd_abandono";
$proto826["m_columns"][] = "qtd_sla_espera";
$proto826["m_columns"][] = "qtd_sla_atendimento";
$proto826["m_columns"][] = "qtd_sla_operacao";
$obj = new SQLTable($proto826);

$proto825["m_table"] = $obj;
$proto825["m_alias"] = "log";
$proto827=array();
$proto827["m_sql"] = "";
$proto827["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto827["m_column"]=$obj;
$proto827["m_contained"] = array();
$proto827["m_strCase"] = "";
$proto827["m_havingmode"] = "0";
$proto827["m_inBrackets"] = "0";
$proto827["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto827);

$proto825["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto825);

$proto758["m_fromlist"][]=$obj;
$proto758["m_groupby"] = array();
												$proto829=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "log"
));

$proto829["m_column"]=$obj;
$obj = new SQLGroupByItem($proto829);

$proto758["m_groupby"][]=$obj;
												$proto831=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_periodo",
	"m_strTable" => "log"
));

$proto831["m_column"]=$obj;
$obj = new SQLGroupByItem($proto831);

$proto758["m_groupby"][]=$obj;
$proto758["m_orderby"] = array();
												$proto833=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "1"
));

$proto833["m_column"]=$obj;
$proto833["m_bAsc"] = 1;
$proto833["m_nColumn"] = 1;
$obj = new SQLOrderByItem($proto833);

$proto758["m_orderby"][]=$obj;					
												$proto835=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto835["m_column"]=$obj;
$proto835["m_bAsc"] = 1;
$proto835["m_nColumn"] = 2;
$obj = new SQLOrderByItem($proto835);

$proto758["m_orderby"][]=$obj;					
												$proto837=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "3"
));

$proto837["m_column"]=$obj;
$proto837["m_bAsc"] = 1;
$proto837["m_nColumn"] = 3;
$obj = new SQLOrderByItem($proto837);

$proto758["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto758);

$queryData_Rel__Historico_Fila_Data = $obj;
$tdataRel__Historico_Fila_Data[".sqlquery"] = $queryData_Rel__Historico_Fila_Data;



?>
