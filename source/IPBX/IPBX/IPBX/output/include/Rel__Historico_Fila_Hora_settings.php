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
$tdataRel__Historico_Fila_Hora[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataRel__Historico_Fila_Hora[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Hora[".allSearchFields"][] = "Mes";	
}
$tdataRel__Historico_Fila_Hora[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataRel__Historico_Fila_Hora[".allSearchFields"]))
{
	$tdataRel__Historico_Fila_Hora[".allSearchFields"][] = "Ano";	
}


$tdataRel__Historico_Fila_Hora[".isDynamicPerm"] = true;

	

$tdataRel__Historico_Fila_Hora[".isDisplayLoading"] = true;

$tdataRel__Historico_Fila_Hora[".isResizeColumns"] = false;


$tdataRel__Historico_Fila_Hora[".createLoginPage"] = true;


 	

$tdataRel__Historico_Fila_Hora[".noRecordsFirstPage"] = true;




$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Historico_Fila_Hora[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Historico_Fila_Hora[".orderindexes"] = array();

$tdataRel__Historico_Fila_Hora[".sqlHead"] = "SELECT Fila,  DATE_FORMAT(`Data`, '%m') AS Mes,  DATE_FORMAT(`Data`, '%Y') AS Ano,  Hora,  round(avg(`Agent.Disp`)) AS `Agent.Disp`,  round(avg(AgentesPausa)) AS AgentesPausa,  round(sum(`Chamadas Atendidas`)) AS `Chamadas Atendidas`,  round(sum(`Chamadas Abandonadas`)) AS `Chamadas Abandonadas`";

$tdataRel__Historico_Fila_Hora[".sqlFrom"] = "FROM v_rel_hist_fila_data_hora";

$tdataRel__Historico_Fila_Hora[".sqlWhereExpr"] = "";

$tdataRel__Historico_Fila_Hora[".sqlTail"] = "GROUP BY Fila, Hora, Mes, Ano";



	$tableKeys=array();
	$tdataRel__Historico_Fila_Hora[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_hist_fila_data_hora";
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
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Fila"]=$fdata;
	
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
		$fdata["FullName"]= "DATE_FORMAT(`Data`, '%m')";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			
									$tdataRel__Historico_Fila_Hora["Mes"]=$fdata;
	
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
		$fdata["FullName"]= "DATE_FORMAT(`Data`, '%Y')";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Historico_Fila_Hora["Ano"]=$fdata;
	
//	Hora
	$fdata = array();
	$fdata["strName"] = "Hora";
	$fdata["ownerTable"] = "v_rel_hist_fila_data_hora";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora";
		$fdata["FullName"]= "Hora";
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
		$fdata["FullName"]= "round(avg(`Agent.Disp`))";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Hora["Agent.Disp"]=$fdata;
	
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
		$fdata["FullName"]= "round(avg(AgentesPausa))";
						$fdata["Index"]= 6;
	
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
		$fdata["FullName"]= "round(sum(`Chamadas Atendidas`))";
						$fdata["Index"]= 7;
	
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
		$fdata["FullName"]= "round(sum(`Chamadas Abandonadas`))";
						$fdata["Index"]= 8;
	
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










$proto601=array();
$proto601["m_strHead"] = "SELECT";
$proto601["m_strFieldList"] = "Fila,  DATE_FORMAT(`Data`, '%m') AS Mes,  DATE_FORMAT(`Data`, '%Y') AS Ano,  Hora,  round(avg(`Agent.Disp`)) AS `Agent.Disp`,  round(avg(AgentesPausa)) AS AgentesPausa,  round(sum(`Chamadas Atendidas`)) AS `Chamadas Atendidas`,  round(sum(`Chamadas Abandonadas`)) AS `Chamadas Abandonadas`";
$proto601["m_strFrom"] = "FROM v_rel_hist_fila_data_hora";
$proto601["m_strWhere"] = "";
$proto601["m_strOrderBy"] = "";
$proto601["m_strTail"] = "GROUP BY Fila, Hora, Mes, Ano";
$proto602=array();
$proto602["m_sql"] = "";
$proto602["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto602["m_column"]=$obj;
$proto602["m_contained"] = array();
$proto602["m_strCase"] = "";
$proto602["m_havingmode"] = "0";
$proto602["m_inBrackets"] = "0";
$proto602["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto602);

$proto601["m_where"] = $obj;
$proto604=array();
$proto604["m_sql"] = "";
$proto604["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto604["m_column"]=$obj;
$proto604["m_contained"] = array();
$proto604["m_strCase"] = "";
$proto604["m_havingmode"] = "0";
$proto604["m_inBrackets"] = "0";
$proto604["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto604);

$proto601["m_having"] = $obj;
$proto601["m_fieldlist"] = array();
						$proto606=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_hist_fila_data_hora"
));

$proto606["m_expr"]=$obj;
$proto606["m_alias"] = "";
$obj = new SQLFieldListItem($proto606);

$proto601["m_fieldlist"][]=$obj;
						$proto608=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(`Data`, '%m')"
));

$proto608["m_expr"]=$obj;
$proto608["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto608);

$proto601["m_fieldlist"][]=$obj;
						$proto610=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(`Data`, '%Y')"
));

$proto610["m_expr"]=$obj;
$proto610["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto610);

$proto601["m_fieldlist"][]=$obj;
						$proto612=array();
			$obj = new SQLField(array(
	"m_strName" => "Hora",
	"m_strTable" => "v_rel_hist_fila_data_hora"
));

$proto612["m_expr"]=$obj;
$proto612["m_alias"] = "";
$obj = new SQLFieldListItem($proto612);

$proto601["m_fieldlist"][]=$obj;
						$proto614=array();
			$proto615=array();
$proto615["m_functiontype"] = "SQLF_CUSTOM";
$proto615["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg(`Agent.Disp`)"
));

$proto615["m_arguments"][]=$obj;
$proto615["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto615);

$proto614["m_expr"]=$obj;
$proto614["m_alias"] = "Agent.Disp";
$obj = new SQLFieldListItem($proto614);

$proto601["m_fieldlist"][]=$obj;
						$proto617=array();
			$proto618=array();
$proto618["m_functiontype"] = "SQLF_CUSTOM";
$proto618["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "avg(AgentesPausa)"
));

$proto618["m_arguments"][]=$obj;
$proto618["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto618);

$proto617["m_expr"]=$obj;
$proto617["m_alias"] = "AgentesPausa";
$obj = new SQLFieldListItem($proto617);

$proto601["m_fieldlist"][]=$obj;
						$proto620=array();
			$proto621=array();
$proto621["m_functiontype"] = "SQLF_CUSTOM";
$proto621["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(`Chamadas Atendidas`)"
));

$proto621["m_arguments"][]=$obj;
$proto621["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto621);

$proto620["m_expr"]=$obj;
$proto620["m_alias"] = "Chamadas Atendidas";
$obj = new SQLFieldListItem($proto620);

$proto601["m_fieldlist"][]=$obj;
						$proto623=array();
			$proto624=array();
$proto624["m_functiontype"] = "SQLF_CUSTOM";
$proto624["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(`Chamadas Abandonadas`)"
));

$proto624["m_arguments"][]=$obj;
$proto624["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto624);

$proto623["m_expr"]=$obj;
$proto623["m_alias"] = "Chamadas Abandonadas";
$obj = new SQLFieldListItem($proto623);

$proto601["m_fieldlist"][]=$obj;
$proto601["m_fromlist"] = array();
												$proto626=array();
$proto626["m_link"] = "SQLL_MAIN";
			$proto627=array();
$proto627["m_strName"] = "v_rel_hist_fila_data_hora";
$proto627["m_columns"] = array();
$proto627["m_columns"][] = "Fila";
$proto627["m_columns"][] = "Periodo";
$proto627["m_columns"][] = "Data";
$proto627["m_columns"][] = "Hora";
$proto627["m_columns"][] = "Agent.Disp";
$proto627["m_columns"][] = "AgentesPausa";
$proto627["m_columns"][] = "Chamadas Atendidas";
$proto627["m_columns"][] = "Chamadas Abandonadas";
$obj = new SQLTable($proto627);

$proto626["m_table"] = $obj;
$proto626["m_alias"] = "";
$proto628=array();
$proto628["m_sql"] = "";
$proto628["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto628["m_column"]=$obj;
$proto628["m_contained"] = array();
$proto628["m_strCase"] = "";
$proto628["m_havingmode"] = "0";
$proto628["m_inBrackets"] = "0";
$proto628["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto628);

$proto626["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto626);

$proto601["m_fromlist"][]=$obj;
$proto601["m_groupby"] = array();
												$proto630=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_hist_fila_data_hora"
));

$proto630["m_column"]=$obj;
$obj = new SQLGroupByItem($proto630);

$proto601["m_groupby"][]=$obj;
												$proto632=array();
						$obj = new SQLField(array(
	"m_strName" => "Hora",
	"m_strTable" => "v_rel_hist_fila_data_hora"
));

$proto632["m_column"]=$obj;
$obj = new SQLGroupByItem($proto632);

$proto601["m_groupby"][]=$obj;
												$proto634=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Mes"
));

$proto634["m_column"]=$obj;
$obj = new SQLGroupByItem($proto634);

$proto601["m_groupby"][]=$obj;
												$proto636=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Ano"
));

$proto636["m_column"]=$obj;
$obj = new SQLGroupByItem($proto636);

$proto601["m_groupby"][]=$obj;
$proto601["m_orderby"] = array();
$obj = new SQLQuery($proto601);

$queryData_Rel__Historico_Fila_Hora = $obj;
$tdataRel__Historico_Fila_Hora[".sqlquery"] = $queryData_Rel__Historico_Fila_Hora;



?>
