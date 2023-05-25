<?php

//	field labels
$fieldLabelsRel__Historico_Fila = array();
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Hora"] = "Hora";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Chamadas_Atendidas"] = "Chamadas Atendidas";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Chamadas_Abandonadas"] = "Chamadas Abandonadas";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["Agent_Disp"] = "Agent.Disp";
$fieldLabelsRel__Historico_Fila["Portuguese(Brazil)"]["AgentesPausa"] = "Agentes Pausa";


$tdataRel__Historico_Fila=array();
	$tdataRel__Historico_Fila[".NumberOfChars"]=80; 
	$tdataRel__Historico_Fila[".ShortName"]="Rel__Historico_Fila";
	$tdataRel__Historico_Fila[".OwnerID"]="";
	$tdataRel__Historico_Fila[".OriginalTable"]="v_rel_hist_fila";
	$tdataRel__Historico_Fila[".NCSearch"]=true;
	

$tdataRel__Historico_Fila[".shortTableName"] = "Rel__Historico_Fila";
$tdataRel__Historico_Fila[".dataSourceTable"] = "Rel. Historico Fila";
$tdataRel__Historico_Fila[".nSecOptions"] = 0;
$tdataRel__Historico_Fila[".nLoginMethod"] = 1;
$tdataRel__Historico_Fila[".recsPerRowList"] = 1;	
$tdataRel__Historico_Fila[".tableGroupBy"] = "0";
$tdataRel__Historico_Fila[".dbType"] = 0;
$tdataRel__Historico_Fila[".mainTableOwnerID"] = "";
$tdataRel__Historico_Fila[".moveNext"] = 1;

$tdataRel__Historico_Fila[".listAjax"] = false;

	$tdataRel__Historico_Fila[".audit"] = false;

	$tdataRel__Historico_Fila[".locking"] = false;
	
$tdataRel__Historico_Fila[".listIcons"] = true;

$tdataRel__Historico_Fila[".exportTo"] = true;

$tdataRel__Historico_Fila[".printFriendly"] = true;


$tdataRel__Historico_Fila[".showSimpleSearchOptions"] = false;

$tdataRel__Historico_Fila[".showSearchPanel"] = true;


$tdataRel__Historico_Fila[".isUseAjaxSuggest"] = true;


$tdataRel__Historico_Fila[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Historico_Fila[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Historico_Fila[".isUseTimeForSearch"] = false;





$tdataRel__Historico_Fila[".isUseInlineJs"] = $tdataRel__Historico_Fila[".isUseInlineAdd"] || $tdataRel__Historico_Fila[".isUseInlineEdit"];

$tdataRel__Historico_Fila[".allSearchFields"] = array();

$tdataRel__Historico_Fila[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Historico_Fila[".allSearchFields"]))
{
	$tdataRel__Historico_Fila[".allSearchFields"][] = "Fila";	
}
$tdataRel__Historico_Fila[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataRel__Historico_Fila[".allSearchFields"]))
{
	$tdataRel__Historico_Fila[".allSearchFields"][] = "Data";	
}
$tdataRel__Historico_Fila[".globSearchFields"][] = "Hora";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Hora", $tdataRel__Historico_Fila[".allSearchFields"]))
{
	$tdataRel__Historico_Fila[".allSearchFields"][] = "Hora";	
}


$tdataRel__Historico_Fila[".isDynamicPerm"] = true;

	

$tdataRel__Historico_Fila[".isDisplayLoading"] = true;

$tdataRel__Historico_Fila[".isResizeColumns"] = false;


$tdataRel__Historico_Fila[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Historico_Fila[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Historico_Fila[".orderindexes"] = array();

$tdataRel__Historico_Fila[".sqlHead"] = "SELECT Fila,   `Data`,   Hora,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";

$tdataRel__Historico_Fila[".sqlFrom"] = "FROM v_rel_hist_fila";

$tdataRel__Historico_Fila[".sqlWhereExpr"] = "";

$tdataRel__Historico_Fila[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Historico_Fila[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_hist_fila";
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
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila["Fila"]=$fdata;
	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "v_rel_hist_fila";
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
						$tdataRel__Historico_Fila["Data"]=$fdata;
	
//	Hora
	$fdata = array();
	$fdata["strName"] = "Hora";
	$fdata["ownerTable"] = "v_rel_hist_fila";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora";
		$fdata["FullName"]= "Hora";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Historico_Fila["Hora"]=$fdata;
	
//	Agent.Disp
	$fdata = array();
	$fdata["strName"] = "Agent.Disp";
	$fdata["ownerTable"] = "v_rel_hist_fila";
				$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agent_Disp";
		$fdata["FullName"]= "`Agent.Disp`";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila["Agent.Disp"]=$fdata;
	
//	AgentesPausa
	$fdata = array();
	$fdata["strName"] = "AgentesPausa";
	$fdata["ownerTable"] = "v_rel_hist_fila";
		$fdata["Label"]="Agentes Pausa"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "AgentesPausa";
		$fdata["FullName"]= "AgentesPausa";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila["AgentesPausa"]=$fdata;
	
//	Chamadas Atendidas
	$fdata = array();
	$fdata["strName"] = "Chamadas Atendidas";
	$fdata["ownerTable"] = "v_rel_hist_fila";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Atendidas";
		$fdata["FullName"]= "`Chamadas Atendidas`";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila["Chamadas Atendidas"]=$fdata;
	
//	Chamadas Abandonadas
	$fdata = array();
	$fdata["strName"] = "Chamadas Abandonadas";
	$fdata["ownerTable"] = "v_rel_hist_fila";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Abandonadas";
		$fdata["FullName"]= "`Chamadas Abandonadas`";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Historico_Fila["Chamadas Abandonadas"]=$fdata;

	
$tables_data["Rel. Historico Fila"]=&$tdataRel__Historico_Fila;
$field_labels["Rel__Historico_Fila"] = &$fieldLabelsRel__Historico_Fila;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Historico Fila"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Historico Fila"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto412=array();
$proto412["m_strHead"] = "SELECT";
$proto412["m_strFieldList"] = "Fila,   `Data`,   Hora,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";
$proto412["m_strFrom"] = "FROM v_rel_hist_fila";
$proto412["m_strWhere"] = "";
$proto412["m_strOrderBy"] = "";
$proto412["m_strTail"] = "";
$proto413=array();
$proto413["m_sql"] = "";
$proto413["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto413["m_column"]=$obj;
$proto413["m_contained"] = array();
$proto413["m_strCase"] = "";
$proto413["m_havingmode"] = "0";
$proto413["m_inBrackets"] = "0";
$proto413["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto413);

$proto412["m_where"] = $obj;
$proto415=array();
$proto415["m_sql"] = "";
$proto415["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto415["m_column"]=$obj;
$proto415["m_contained"] = array();
$proto415["m_strCase"] = "";
$proto415["m_havingmode"] = "0";
$proto415["m_inBrackets"] = "0";
$proto415["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto415);

$proto412["m_having"] = $obj;
$proto412["m_fieldlist"] = array();
						$proto417=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_hist_fila"
));

$proto417["m_expr"]=$obj;
$proto417["m_alias"] = "";
$obj = new SQLFieldListItem($proto417);

$proto412["m_fieldlist"][]=$obj;
						$proto419=array();
			$obj = new SQLField(array(
	"m_strName" => "Data",
	"m_strTable" => "v_rel_hist_fila"
));

$proto419["m_expr"]=$obj;
$proto419["m_alias"] = "";
$obj = new SQLFieldListItem($proto419);

$proto412["m_fieldlist"][]=$obj;
						$proto421=array();
			$obj = new SQLField(array(
	"m_strName" => "Hora",
	"m_strTable" => "v_rel_hist_fila"
));

$proto421["m_expr"]=$obj;
$proto421["m_alias"] = "";
$obj = new SQLFieldListItem($proto421);

$proto412["m_fieldlist"][]=$obj;
						$proto423=array();
			$obj = new SQLField(array(
	"m_strName" => "Agent.Disp",
	"m_strTable" => "v_rel_hist_fila"
));

$proto423["m_expr"]=$obj;
$proto423["m_alias"] = "";
$obj = new SQLFieldListItem($proto423);

$proto412["m_fieldlist"][]=$obj;
						$proto425=array();
			$obj = new SQLField(array(
	"m_strName" => "AgentesPausa",
	"m_strTable" => "v_rel_hist_fila"
));

$proto425["m_expr"]=$obj;
$proto425["m_alias"] = "";
$obj = new SQLFieldListItem($proto425);

$proto412["m_fieldlist"][]=$obj;
						$proto427=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Atendidas",
	"m_strTable" => "v_rel_hist_fila"
));

$proto427["m_expr"]=$obj;
$proto427["m_alias"] = "";
$obj = new SQLFieldListItem($proto427);

$proto412["m_fieldlist"][]=$obj;
						$proto429=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Abandonadas",
	"m_strTable" => "v_rel_hist_fila"
));

$proto429["m_expr"]=$obj;
$proto429["m_alias"] = "";
$obj = new SQLFieldListItem($proto429);

$proto412["m_fieldlist"][]=$obj;
$proto412["m_fromlist"] = array();
												$proto431=array();
$proto431["m_link"] = "SQLL_MAIN";
			$proto432=array();
$proto432["m_strName"] = "v_rel_hist_fila";
$proto432["m_columns"] = array();
$proto432["m_columns"][] = "Fila";
$proto432["m_columns"][] = "Data";
$proto432["m_columns"][] = "Hora";
$proto432["m_columns"][] = "Agent.Disp";
$proto432["m_columns"][] = "AgentesPausa";
$proto432["m_columns"][] = "Chamadas Atendidas";
$proto432["m_columns"][] = "Chamadas Abandonadas";
$obj = new SQLTable($proto432);

$proto431["m_table"] = $obj;
$proto431["m_alias"] = "";
$proto433=array();
$proto433["m_sql"] = "";
$proto433["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto433["m_column"]=$obj;
$proto433["m_contained"] = array();
$proto433["m_strCase"] = "";
$proto433["m_havingmode"] = "0";
$proto433["m_inBrackets"] = "0";
$proto433["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto433);

$proto431["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto431);

$proto412["m_fromlist"][]=$obj;
$proto412["m_groupby"] = array();
$proto412["m_orderby"] = array();
$obj = new SQLQuery($proto412);

$queryData_Rel__Historico_Fila = $obj;
$tdataRel__Historico_Fila[".sqlquery"] = $queryData_Rel__Historico_Fila;



?>
