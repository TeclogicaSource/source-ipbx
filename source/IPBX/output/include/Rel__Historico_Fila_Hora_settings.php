<?php

//	field labels
$fieldLabelsRel__Historico_Fila_Hora = array();
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Hora"] = "Hora";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Agent_Disp"] = "Média de Agentes Disponíveis";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["AgentesPausa"] = "Média de Agentes Pausa";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Chamadas_Atendidas"] = "Total de chamadas atendidas";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Chamadas_Abandonadas"] = "Total de chamadas Abandonadas";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Mes"] = "Mes";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Agent_Disp_Maior"] = "Maior qtd. de agentes Disponíveis";
$fieldLabelsRel__Historico_Fila_Hora["Portuguese(Brazil)"]["Agent_Pausa_Maior"] = "Maior qtd. de Agentes Pausados";


$tdataRel__Historico_Fila_Hora=array();
	$tdataRel__Historico_Fila_Hora[".NumberOfChars"]=80; 
	$tdataRel__Historico_Fila_Hora[".ShortName"]="Rel__Historico_Fila_Hora";
	$tdataRel__Historico_Fila_Hora[".OwnerID"]="";
	$tdataRel__Historico_Fila_Hora[".OriginalTable"]="v_rel_hist_fila_data_hora";
	$tdataRel__Historico_Fila_Hora[".NCSearch"]=true;
	

$tdataRel__Historico_Fila_Hora[".shortTableName"] = "Rel__Historico_Fila_Hora";
$tdataRel__Historico_Fila_Hora[".dataSourceTable"] = "Rel. Historico Fila Hora";
$tdataRel__Historico_Fila_Hora[".nSecOptions"] = 0;
$tdataRel__Historico_Fila_Hora[".nLoginMethod"] = 1;
$tdataRel__Historico_Fila_Hora[".recsPerRowList"] = 1;	
$tdataRel__Historico_Fila_Hora[".tableGroupBy"] = "1";
$tdataRel__Historico_Fila_Hora[".dbType"] = 0;
$tdataRel__Historico_Fila_Hora[".mainTableOwnerID"] = "";
$tdataRel__Historico_Fila_Hora[".moveNext"] = 1;

$tdataRel__Historico_Fila_Hora[".listAjax"] = false;

	$tdataRel__Historico_Fila_Hora[".audit"] = false;

	$tdataRel__Historico_Fila_Hora[".locking"] = false;
	
$tdataRel__Historico_Fila_Hora[".listIcons"] = true;

$tdataRel__Historico_Fila_Hora[".exportTo"] = true;

$tdataRel__Historico_Fila_Hora[".printFriendly"] = true;


$tdataRel__Historico_Fila_Hora[".showSimpleSearchOptions"] = false;

$tdataRel__Historico_Fila_Hora[".showSearchPanel"] = true;


$tdataRel__Historico_Fila_Hora[".isUseAjaxSuggest"] = true;


$tdataRel__Historico_Fila_Hora[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Historico_Fila_Hora[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRel__Historico_Fila_Hora[".isUseTimeForSearch"] = false;





$tdataRel__Historico_Fila_Hora[".isUseInlineJs"] = $tdataRel__Historico_Fila_Hora[".isUseInlineAdd"] || $tdataRel__Historico_Fila_Hora[".isUseInlineEdit"];

$tdataRel__Historico_Fila_Hora[".allSearchFields"] = array();

$tdataRel__Historico_Fila_Hora[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Historico_Fila_Hora[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Hora[".allSearchFields"][] = "Fila";	
}
$tdataRel__Historico_Fila_Hora[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataRel__Historico_Fila_Hora[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Hora[".allSearchFields"][] = "Ano";	
}
$tdataRel__Historico_Fila_Hora[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataRel__Historico_Fila_Hora[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Hora[".allSearchFields"][] = "Mes";	
}


$tdataRel__Historico_Fila_Hora[".isDynamicPerm"] = true;

	

$tdataRel__Historico_Fila_Hora[".isDisplayLoading"] = true;

$tdataRel__Historico_Fila_Hora[".isResizeColumns"] = false;


$tdataRel__Historico_Fila_Hora[".createLoginPage"] = true;


 	

$tdataRel__Historico_Fila_Hora[".noRecordsFirstPage"] = true;




$gstrOrderBy = "order by 1 , 2 desc, 3 desc, 4";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Historico_Fila_Hora[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Historico_Fila_Hora[".orderindexes"] = array();
$tdataRel__Historico_Fila_Hora[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$tdataRel__Historico_Fila_Hora[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),
            '%Y')");
$tdataRel__Historico_Fila_Hora[".orderindexes"][] = array(3, (0 ? "ASC" : "DESC"), "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),
            '%m')");
$tdataRel__Historico_Fila_Hora[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "hr_periodo");

$tdataRel__Historico_Fila_Hora[".sqlHead"] = "select log.Fila AS Fila,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%Y') AS Ano,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%m') AS Mes,      log.hr_periodo AS Hora,      round(avg(floor(log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS 'Agent.Disp',      round(max(floor(log.ag_logados_maior))) AS 'Agent.Disp.Maior',      round(max(floor(log.ag_pausados_maior))) AS 'Agent.Pausa.Maior',      round(avg(floor(log.ag_pausados_media))) AS AgentesPausa,      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))))) AS 'Chamadas Atendidas',      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))))) AS 'Chamadas Abandonadas'";

$tdataRel__Historico_Fila_Hora[".sqlFrom"] = "from      log_fila_agente_consolidada log";

$tdataRel__Historico_Fila_Hora[".sqlWhereExpr"] = "";

$tdataRel__Historico_Fila_Hora[".sqlTail"] = "group by log.Fila , log.hr_periodo , 3 , 2";



	$tableKeys=array();
	$tdataRel__Historico_Fila_Hora[".Keys"]=$tableKeys;

	
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
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "log.Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Fila"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%Y')";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Historico_Fila_Hora["Ano"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="01";
	$fdata["LookupValues"][]="02";
	$fdata["LookupValues"][]="03";
	$fdata["LookupValues"][]="04";
	$fdata["LookupValues"][]="05";
	$fdata["LookupValues"][]="06";
	$fdata["LookupValues"][]="07";
	$fdata["LookupValues"][]="08";
	$fdata["LookupValues"][]="09";
	$fdata["LookupValues"][]="10";
	$fdata["LookupValues"][]="11";
	$fdata["LookupValues"][]="12";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%m')";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			
									$tdataRel__Historico_Fila_Hora["Mes"]=$fdata;
	
//	Hora
	$fdata = array();
	$fdata["strName"] = "Hora";
	$fdata["ownerTable"] = "log_fila_agente_consolidada";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora";
		$fdata["FullName"]= "log.hr_periodo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Historico_Fila_Hora["Hora"]=$fdata;
	
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
		$fdata["FullName"]= "round(avg(floor(log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media))))";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Agent.Disp"]=$fdata;
	
//	Agent.Disp.Maior
	$fdata = array();
	$fdata["strName"] = "Agent.Disp.Maior";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Maior qtd. de agentes Disponíveis"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agent_Disp_Maior";
		$fdata["FullName"]= "round(max(floor(log.ag_logados_maior)))";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Agent.Disp.Maior"]=$fdata;
	
//	Agent.Pausa.Maior
	$fdata = array();
	$fdata["strName"] = "Agent.Pausa.Maior";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Maior qtd. de Agentes Pausados"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agent_Pausa_Maior";
		$fdata["FullName"]= "round(max(floor(log.ag_pausados_maior)))";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Agent.Pausa.Maior"]=$fdata;
	
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
		$fdata["FullName"]= "round(avg(floor(log.ag_pausados_media)))";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["AgentesPausa"]=$fdata;
	
//	Chamadas Atendidas
	$fdata = array();
	$fdata["strName"] = "Chamadas Atendidas";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total de chamadas atendidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Chamadas_Atendidas";
		$fdata["FullName"]= "round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0))))))";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Chamadas Atendidas"]=$fdata;
	
//	Chamadas Abandonadas
	$fdata = array();
	$fdata["strName"] = "Chamadas Abandonadas";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total de chamadas Abandonadas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Chamadas_Abandonadas";
		$fdata["FullName"]= "round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0))))))";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Chamadas Abandonadas"]=$fdata;

	
$tables_data["Rel. Historico Fila Hora"]=&$tdataRel__Historico_Fila_Hora;
$field_labels["Rel__Historico_Fila_Hora"] = &$fieldLabelsRel__Historico_Fila_Hora;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Historico Fila Hora"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Historico Fila Hora"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto707=array();
$proto707["m_strHead"] = "select";
$proto707["m_strFieldList"] = "log.Fila AS Fila,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%Y') AS Ano,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%m') AS Mes,      log.hr_periodo AS Hora,      round(avg(floor(log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS 'Agent.Disp',      round(max(floor(log.ag_logados_maior))) AS 'Agent.Disp.Maior',      round(max(floor(log.ag_pausados_maior))) AS 'Agent.Pausa.Maior',      round(avg(floor(log.ag_pausados_media))) AS AgentesPausa,      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))))) AS 'Chamadas Atendidas',      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))))) AS 'Chamadas Abandonadas'";
$proto707["m_strFrom"] = "from      log_fila_agente_consolidada log";
$proto707["m_strWhere"] = "";
$proto707["m_strOrderBy"] = "order by 1 , 2 desc, 3 desc, 4";
$proto707["m_strTail"] = "group by log.Fila , log.hr_periodo , 3 , 2";
$proto708=array();
$proto708["m_sql"] = "";
$proto708["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto708["m_column"]=$obj;
$proto708["m_contained"] = array();
$proto708["m_strCase"] = "";
$proto708["m_havingmode"] = "0";
$proto708["m_inBrackets"] = "0";
$proto708["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto708);

$proto707["m_where"] = $obj;
$proto710=array();
$proto710["m_sql"] = "";
$proto710["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto710["m_column"]=$obj;
$proto710["m_contained"] = array();
$proto710["m_strCase"] = "";
$proto710["m_havingmode"] = "0";
$proto710["m_inBrackets"] = "0";
$proto710["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto710);

$proto707["m_having"] = $obj;
$proto707["m_fieldlist"] = array();
						$proto712=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "log"
));

$proto712["m_expr"]=$obj;
$proto712["m_alias"] = "Fila";
$obj = new SQLFieldListItem($proto712);

$proto707["m_fieldlist"][]=$obj;
						$proto714=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%Y')"
));

$proto714["m_expr"]=$obj;
$proto714["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto714);

$proto707["m_fieldlist"][]=$obj;
						$proto716=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%m')"
));

$proto716["m_expr"]=$obj;
$proto716["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto716);

$proto707["m_fieldlist"][]=$obj;
						$proto718=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_periodo",
	"m_strTable" => "log"
));

$proto718["m_expr"]=$obj;
$proto718["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto718);

$proto707["m_fieldlist"][]=$obj;
						$proto720=array();
			$proto721=array();
$proto721["m_functiontype"] = "SQLF_CUSTOM";
$proto721["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg(floor(log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))"
));

$proto721["m_arguments"][]=$obj;
$proto721["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto721);

$proto720["m_expr"]=$obj;
$proto720["m_alias"] = "'Agent.Disp'";
$obj = new SQLFieldListItem($proto720);

$proto707["m_fieldlist"][]=$obj;
						$proto723=array();
			$proto724=array();
$proto724["m_functiontype"] = "SQLF_CUSTOM";
$proto724["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "max(floor(log.ag_logados_maior))"
));

$proto724["m_arguments"][]=$obj;
$proto724["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto724);

$proto723["m_expr"]=$obj;
$proto723["m_alias"] = "'Agent.Disp.Maior'";
$obj = new SQLFieldListItem($proto723);

$proto707["m_fieldlist"][]=$obj;
						$proto726=array();
			$proto727=array();
$proto727["m_functiontype"] = "SQLF_CUSTOM";
$proto727["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "max(floor(log.ag_pausados_maior))"
));

$proto727["m_arguments"][]=$obj;
$proto727["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto727);

$proto726["m_expr"]=$obj;
$proto726["m_alias"] = "'Agent.Pausa.Maior'";
$obj = new SQLFieldListItem($proto726);

$proto707["m_fieldlist"][]=$obj;
						$proto729=array();
			$proto730=array();
$proto730["m_functiontype"] = "SQLF_CUSTOM";
$proto730["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg(floor(log.ag_pausados_media))"
));

$proto730["m_arguments"][]=$obj;
$proto730["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto730);

$proto729["m_expr"]=$obj;
$proto729["m_alias"] = "AgentesPausa";
$obj = new SQLFieldListItem($proto729);

$proto707["m_fieldlist"][]=$obj;
						$proto732=array();
			$proto733=array();
$proto733["m_functiontype"] = "SQLF_CUSTOM";
$proto733["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))))"
));

$proto733["m_arguments"][]=$obj;
$proto733["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto733);

$proto732["m_expr"]=$obj;
$proto732["m_alias"] = "'Chamadas Atendidas'";
$obj = new SQLFieldListItem($proto732);

$proto707["m_fieldlist"][]=$obj;
						$proto735=array();
			$proto736=array();
$proto736["m_functiontype"] = "SQLF_CUSTOM";
$proto736["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))))"
));

$proto736["m_arguments"][]=$obj;
$proto736["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto736);

$proto735["m_expr"]=$obj;
$proto735["m_alias"] = "'Chamadas Abandonadas'";
$obj = new SQLFieldListItem($proto735);

$proto707["m_fieldlist"][]=$obj;
$proto707["m_fromlist"] = array();
												$proto738=array();
$proto738["m_link"] = "SQLL_MAIN";
			$proto739=array();
$proto739["m_strName"] = "log_fila_agente_consolidada";
$proto739["m_columns"] = array();
$proto739["m_columns"][] = "Fila";
$proto739["m_columns"][] = "dt_periodo";
$proto739["m_columns"][] = "hr_periodo";
$proto739["m_columns"][] = "ag_logados_menor";
$proto739["m_columns"][] = "ag_logados_maior";
$proto739["m_columns"][] = "ag_logados_media";
$proto739["m_columns"][] = "ag_pausados_menor";
$proto739["m_columns"][] = "ag_pausados_maior";
$proto739["m_columns"][] = "ag_pausados_media";
$proto739["m_columns"][] = "ag_atendendo_menor";
$proto739["m_columns"][] = "ag_atendendo_maior";
$proto739["m_columns"][] = "ag_atendendo_media";
$proto739["m_columns"][] = "ag_discando_menor";
$proto739["m_columns"][] = "ag_discando_maior";
$proto739["m_columns"][] = "ag_discando_media";
$proto739["m_columns"][] = "soma_atendimento";
$proto739["m_columns"][] = "soma_espera";
$proto739["m_columns"][] = "qtd_atendimento";
$proto739["m_columns"][] = "qtd_abandono";
$proto739["m_columns"][] = "qtd_sla_espera";
$proto739["m_columns"][] = "qtd_sla_atendimento";
$proto739["m_columns"][] = "qtd_sla_operacao";
$obj = new SQLTable($proto739);

$proto738["m_table"] = $obj;
$proto738["m_alias"] = "log";
$proto740=array();
$proto740["m_sql"] = "";
$proto740["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto740["m_column"]=$obj;
$proto740["m_contained"] = array();
$proto740["m_strCase"] = "";
$proto740["m_havingmode"] = "0";
$proto740["m_inBrackets"] = "0";
$proto740["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto740);

$proto738["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto738);

$proto707["m_fromlist"][]=$obj;
$proto707["m_groupby"] = array();
												$proto742=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "log"
));

$proto742["m_column"]=$obj;
$obj = new SQLGroupByItem($proto742);

$proto707["m_groupby"][]=$obj;
												$proto744=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_periodo",
	"m_strTable" => "log"
));

$proto744["m_column"]=$obj;
$obj = new SQLGroupByItem($proto744);

$proto707["m_groupby"][]=$obj;
												$proto746=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "3"
));

$proto746["m_column"]=$obj;
$obj = new SQLGroupByItem($proto746);

$proto707["m_groupby"][]=$obj;
												$proto748=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto748["m_column"]=$obj;
$obj = new SQLGroupByItem($proto748);

$proto707["m_groupby"][]=$obj;
$proto707["m_orderby"] = array();
												$proto750=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "1"
));

$proto750["m_column"]=$obj;
$proto750["m_bAsc"] = 1;
$proto750["m_nColumn"] = 1;
$obj = new SQLOrderByItem($proto750);

$proto707["m_orderby"][]=$obj;					
												$proto752=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "2 "
));

$proto752["m_column"]=$obj;
$proto752["m_bAsc"] = 0;
$proto752["m_nColumn"] = 2;
$obj = new SQLOrderByItem($proto752);

$proto707["m_orderby"][]=$obj;					
												$proto754=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "3 "
));

$proto754["m_column"]=$obj;
$proto754["m_bAsc"] = 0;
$proto754["m_nColumn"] = 3;
$obj = new SQLOrderByItem($proto754);

$proto707["m_orderby"][]=$obj;					
												$proto756=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "4"
));

$proto756["m_column"]=$obj;
$proto756["m_bAsc"] = 1;
$proto756["m_nColumn"] = 4;
$obj = new SQLOrderByItem($proto756);

$proto707["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto707);

$queryData_Rel__Historico_Fila_Hora = $obj;
$tdataRel__Historico_Fila_Hora[".sqlquery"] = $queryData_Rel__Historico_Fila_Hora;



?>
