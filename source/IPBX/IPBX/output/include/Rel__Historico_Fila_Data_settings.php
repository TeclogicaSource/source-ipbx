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
$tdataRel__Historico_Fila_Data[".tableGroupBy"] = "0";
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




$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Historico_Fila_Data[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Historico_Fila_Data[".orderindexes"] = array();

$tdataRel__Historico_Fila_Data[".sqlHead"] = "SELECT Fila,   `Data`,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";

$tdataRel__Historico_Fila_Data[".sqlFrom"] = "FROM v_rel_hist_fila_data";

$tdataRel__Historico_Fila_Data[".sqlWhereExpr"] = "";

$tdataRel__Historico_Fila_Data[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Historico_Fila_Data[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
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
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Fila"]=$fdata;
	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "`Data`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Data"]=$fdata;
	
//	Agent.Disp
	$fdata = array();
	$fdata["strName"] = "Agent.Disp";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
		$fdata["Label"]="Média de Agentes Disponíveis"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Agent_Disp";
		$fdata["FullName"]= "`Agent.Disp`";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Agent.Disp"]=$fdata;
	
//	AgentesPausa
	$fdata = array();
	$fdata["strName"] = "AgentesPausa";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
		$fdata["Label"]="Média de Agentes Pausa"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "AgentesPausa";
		$fdata["FullName"]= "AgentesPausa";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["AgentesPausa"]=$fdata;
	
//	Chamadas Atendidas
	$fdata = array();
	$fdata["strName"] = "Chamadas Atendidas";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
		$fdata["Label"]="Total de chamadas Atendidas"; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Atendidas";
		$fdata["FullName"]= "`Chamadas Atendidas`";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila_Data["Chamadas Atendidas"]=$fdata;
	
//	Chamadas Abandonadas
	$fdata = array();
	$fdata["strName"] = "Chamadas Abandonadas";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
		$fdata["Label"]="Total de chamadas Abandonadas"; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Abandonadas";
		$fdata["FullName"]= "`Chamadas Abandonadas`";
						$fdata["Index"]= 6;
	
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










$proto638=array();
$proto638["m_strHead"] = "SELECT";
$proto638["m_strFieldList"] = "Fila,   `Data`,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";
$proto638["m_strFrom"] = "FROM v_rel_hist_fila_data";
$proto638["m_strWhere"] = "";
$proto638["m_strOrderBy"] = "";
$proto638["m_strTail"] = "";
$proto639=array();
$proto639["m_sql"] = "";
$proto639["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto639["m_column"]=$obj;
$proto639["m_contained"] = array();
$proto639["m_strCase"] = "";
$proto639["m_havingmode"] = "0";
$proto639["m_inBrackets"] = "0";
$proto639["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto639);

$proto638["m_where"] = $obj;
$proto641=array();
$proto641["m_sql"] = "";
$proto641["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto641["m_column"]=$obj;
$proto641["m_contained"] = array();
$proto641["m_strCase"] = "";
$proto641["m_havingmode"] = "0";
$proto641["m_inBrackets"] = "0";
$proto641["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto641);

$proto638["m_having"] = $obj;
$proto638["m_fieldlist"] = array();
						$proto643=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto643["m_expr"]=$obj;
$proto643["m_alias"] = "";
$obj = new SQLFieldListItem($proto643);

$proto638["m_fieldlist"][]=$obj;
						$proto645=array();
			$obj = new SQLField(array(
	"m_strName" => "Data",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto645["m_expr"]=$obj;
$proto645["m_alias"] = "";
$obj = new SQLFieldListItem($proto645);

$proto638["m_fieldlist"][]=$obj;
						$proto647=array();
			$obj = new SQLField(array(
	"m_strName" => "Agent.Disp",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto647["m_expr"]=$obj;
$proto647["m_alias"] = "";
$obj = new SQLFieldListItem($proto647);

$proto638["m_fieldlist"][]=$obj;
						$proto649=array();
			$obj = new SQLField(array(
	"m_strName" => "AgentesPausa",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto649["m_expr"]=$obj;
$proto649["m_alias"] = "";
$obj = new SQLFieldListItem($proto649);

$proto638["m_fieldlist"][]=$obj;
						$proto651=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Atendidas",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto651["m_expr"]=$obj;
$proto651["m_alias"] = "";
$obj = new SQLFieldListItem($proto651);

$proto638["m_fieldlist"][]=$obj;
						$proto653=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Abandonadas",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto653["m_expr"]=$obj;
$proto653["m_alias"] = "";
$obj = new SQLFieldListItem($proto653);

$proto638["m_fieldlist"][]=$obj;
$proto638["m_fromlist"] = array();
												$proto655=array();
$proto655["m_link"] = "SQLL_MAIN";
			$proto656=array();
$proto656["m_strName"] = "v_rel_hist_fila_data";
$proto656["m_columns"] = array();
$proto656["m_columns"][] = "Fila";
$proto656["m_columns"][] = "Data";
$proto656["m_columns"][] = "Agent.Disp";
$proto656["m_columns"][] = "AgentesPausa";
$proto656["m_columns"][] = "Chamadas Atendidas";
$proto656["m_columns"][] = "Chamadas Abandonadas";
$obj = new SQLTable($proto656);

$proto655["m_table"] = $obj;
$proto655["m_alias"] = "";
$proto657=array();
$proto657["m_sql"] = "";
$proto657["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto657["m_column"]=$obj;
$proto657["m_contained"] = array();
$proto657["m_strCase"] = "";
$proto657["m_havingmode"] = "0";
$proto657["m_inBrackets"] = "0";
$proto657["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto657);

$proto655["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto655);

$proto638["m_fromlist"][]=$obj;
$proto638["m_groupby"] = array();
$proto638["m_orderby"] = array();
$obj = new SQLQuery($proto638);

$queryData_Rel__Historico_Fila_Data = $obj;
$tdataRel__Historico_Fila_Data[".sqlquery"] = $queryData_Rel__Historico_Fila_Data;



?>
