<?php

//	field labels
$fieldLabelsRel_Historico_fila_data = array();
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]=array();
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["Agent_Disp"] = "Agent.Disp";
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["AgentesPausa"] = "Agentes Pausa";
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["Chamadas_Atendidas"] = "Chamadas Atendidas";
$fieldLabelsRel_Historico_fila_data["Portuguese(Brazil)"]["Chamadas_Abandonadas"] = "Chamadas Abandonadas";


$tdataRel_Historico_fila_data=array();
	$tdataRel_Historico_fila_data[".NumberOfChars"]=80; 
	$tdataRel_Historico_fila_data[".ShortName"]="Rel_Historico_fila_data";
	$tdataRel_Historico_fila_data[".OwnerID"]="";
	$tdataRel_Historico_fila_data[".OriginalTable"]="v_rel_hist_fila_data";
	$tdataRel_Historico_fila_data[".NCSearch"]=true;
	

$tdataRel_Historico_fila_data[".shortTableName"] = "Rel_Historico_fila_data";
$tdataRel_Historico_fila_data[".dataSourceTable"] = "Rel Historico fila data";
$tdataRel_Historico_fila_data[".nSecOptions"] = 0;
$tdataRel_Historico_fila_data[".nLoginMethod"] = 1;
$tdataRel_Historico_fila_data[".recsPerRowList"] = 1;	
$tdataRel_Historico_fila_data[".tableGroupBy"] = "0";
$tdataRel_Historico_fila_data[".dbType"] = 0;
$tdataRel_Historico_fila_data[".mainTableOwnerID"] = "";
$tdataRel_Historico_fila_data[".moveNext"] = 1;

$tdataRel_Historico_fila_data[".listAjax"] = false;

	$tdataRel_Historico_fila_data[".audit"] = false;

	$tdataRel_Historico_fila_data[".locking"] = false;
	
$tdataRel_Historico_fila_data[".listIcons"] = true;

$tdataRel_Historico_fila_data[".exportTo"] = true;

$tdataRel_Historico_fila_data[".printFriendly"] = true;


$tdataRel_Historico_fila_data[".showSimpleSearchOptions"] = false;

$tdataRel_Historico_fila_data[".showSearchPanel"] = true;


$tdataRel_Historico_fila_data[".isUseAjaxSuggest"] = true;


$tdataRel_Historico_fila_data[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel_Historico_fila_data[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel_Historico_fila_data[".isUseTimeForSearch"] = false;





$tdataRel_Historico_fila_data[".isUseInlineJs"] = $tdataRel_Historico_fila_data[".isUseInlineAdd"] || $tdataRel_Historico_fila_data[".isUseInlineEdit"];

$tdataRel_Historico_fila_data[".allSearchFields"] = array();

$tdataRel_Historico_fila_data[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel_Historico_fila_data[".allSearchFields"]))
{
	$tdataRel_Historico_fila_data[".allSearchFields"][] = "Fila";	
}
$tdataRel_Historico_fila_data[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataRel_Historico_fila_data[".allSearchFields"]))
{
	$tdataRel_Historico_fila_data[".allSearchFields"][] = "Data";	
}
$tdataRel_Historico_fila_data[".globSearchFields"][] = "Agent.Disp";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agent.Disp", $tdataRel_Historico_fila_data[".allSearchFields"]))
{
	$tdataRel_Historico_fila_data[".allSearchFields"][] = "Agent.Disp";	
}
$tdataRel_Historico_fila_data[".globSearchFields"][] = "AgentesPausa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("AgentesPausa", $tdataRel_Historico_fila_data[".allSearchFields"]))
{
	$tdataRel_Historico_fila_data[".allSearchFields"][] = "AgentesPausa";	
}


$tdataRel_Historico_fila_data[".isDynamicPerm"] = true;

	

$tdataRel_Historico_fila_data[".isDisplayLoading"] = true;

$tdataRel_Historico_fila_data[".isResizeColumns"] = false;


$tdataRel_Historico_fila_data[".createLoginPage"] = true;


 	

$tdataRel_Historico_fila_data[".noRecordsFirstPage"] = true;




$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel_Historico_fila_data[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel_Historico_fila_data[".orderindexes"] = array();

$tdataRel_Historico_fila_data[".sqlHead"] = "SELECT Fila,   `Data`,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";

$tdataRel_Historico_fila_data[".sqlFrom"] = "FROM v_rel_hist_fila_data";

$tdataRel_Historico_fila_data[".sqlWhereExpr"] = "";

$tdataRel_Historico_fila_data[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel_Historico_fila_data[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
									$tdataRel_Historico_fila_data["Fila"]=$fdata;
	
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
			
									$tdataRel_Historico_fila_data["Data"]=$fdata;
	
//	Agent.Disp
	$fdata = array();
	$fdata["strName"] = "Agent.Disp";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
				$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agent_Disp";
		$fdata["FullName"]= "`Agent.Disp`";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataRel_Historico_fila_data["Agent.Disp"]=$fdata;
	
//	AgentesPausa
	$fdata = array();
	$fdata["strName"] = "AgentesPausa";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
		$fdata["Label"]="Agentes Pausa"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "AgentesPausa";
		$fdata["FullName"]= "AgentesPausa";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataRel_Historico_fila_data["AgentesPausa"]=$fdata;
	
//	Chamadas Atendidas
	$fdata = array();
	$fdata["strName"] = "Chamadas Atendidas";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Atendidas";
		$fdata["FullName"]= "`Chamadas Atendidas`";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
									$tdataRel_Historico_fila_data["Chamadas Atendidas"]=$fdata;
	
//	Chamadas Abandonadas
	$fdata = array();
	$fdata["strName"] = "Chamadas Abandonadas";
	$fdata["ownerTable"] = "v_rel_hist_fila_data";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chamadas_Abandonadas";
		$fdata["FullName"]= "`Chamadas Abandonadas`";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
									$tdataRel_Historico_fila_data["Chamadas Abandonadas"]=$fdata;

	
$tables_data["Rel Historico fila data"]=&$tdataRel_Historico_fila_data;
$field_labels["Rel_Historico_fila_data"] = &$fieldLabelsRel_Historico_fila_data;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel Historico fila data"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel Historico fila data"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto450=array();
$proto450["m_strHead"] = "SELECT";
$proto450["m_strFieldList"] = "Fila,   `Data`,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";
$proto450["m_strFrom"] = "FROM v_rel_hist_fila_data";
$proto450["m_strWhere"] = "";
$proto450["m_strOrderBy"] = "";
$proto450["m_strTail"] = "";
$proto451=array();
$proto451["m_sql"] = "";
$proto451["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto451["m_column"]=$obj;
$proto451["m_contained"] = array();
$proto451["m_strCase"] = "";
$proto451["m_havingmode"] = "0";
$proto451["m_inBrackets"] = "0";
$proto451["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto451);

$proto450["m_where"] = $obj;
$proto453=array();
$proto453["m_sql"] = "";
$proto453["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto453["m_column"]=$obj;
$proto453["m_contained"] = array();
$proto453["m_strCase"] = "";
$proto453["m_havingmode"] = "0";
$proto453["m_inBrackets"] = "0";
$proto453["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto453);

$proto450["m_having"] = $obj;
$proto450["m_fieldlist"] = array();
						$proto455=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto455["m_expr"]=$obj;
$proto455["m_alias"] = "";
$obj = new SQLFieldListItem($proto455);

$proto450["m_fieldlist"][]=$obj;
						$proto457=array();
			$obj = new SQLField(array(
	"m_strName" => "Data",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto457["m_expr"]=$obj;
$proto457["m_alias"] = "";
$obj = new SQLFieldListItem($proto457);

$proto450["m_fieldlist"][]=$obj;
						$proto459=array();
			$obj = new SQLField(array(
	"m_strName" => "Agent.Disp",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto459["m_expr"]=$obj;
$proto459["m_alias"] = "";
$obj = new SQLFieldListItem($proto459);

$proto450["m_fieldlist"][]=$obj;
						$proto461=array();
			$obj = new SQLField(array(
	"m_strName" => "AgentesPausa",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto461["m_expr"]=$obj;
$proto461["m_alias"] = "";
$obj = new SQLFieldListItem($proto461);

$proto450["m_fieldlist"][]=$obj;
						$proto463=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Atendidas",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto463["m_expr"]=$obj;
$proto463["m_alias"] = "";
$obj = new SQLFieldListItem($proto463);

$proto450["m_fieldlist"][]=$obj;
						$proto465=array();
			$obj = new SQLField(array(
	"m_strName" => "Chamadas Abandonadas",
	"m_strTable" => "v_rel_hist_fila_data"
));

$proto465["m_expr"]=$obj;
$proto465["m_alias"] = "";
$obj = new SQLFieldListItem($proto465);

$proto450["m_fieldlist"][]=$obj;
$proto450["m_fromlist"] = array();
												$proto467=array();
$proto467["m_link"] = "SQLL_MAIN";
			$proto468=array();
$proto468["m_strName"] = "v_rel_hist_fila_data";
$proto468["m_columns"] = array();
$proto468["m_columns"][] = "Fila";
$proto468["m_columns"][] = "Data";
$proto468["m_columns"][] = "Agent.Disp";
$proto468["m_columns"][] = "AgentesPausa";
$proto468["m_columns"][] = "Chamadas Atendidas";
$proto468["m_columns"][] = "Chamadas Abandonadas";
$obj = new SQLTable($proto468);

$proto467["m_table"] = $obj;
$proto467["m_alias"] = "";
$proto469=array();
$proto469["m_sql"] = "";
$proto469["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto469["m_column"]=$obj;
$proto469["m_contained"] = array();
$proto469["m_strCase"] = "";
$proto469["m_havingmode"] = "0";
$proto469["m_inBrackets"] = "0";
$proto469["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto469);

$proto467["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto467);

$proto450["m_fromlist"][]=$obj;
$proto450["m_groupby"] = array();
$proto450["m_orderby"] = array();
$obj = new SQLQuery($proto450);

$queryData_Rel_Historico_fila_data = $obj;
$tdataRel_Historico_fila_data[".sqlquery"] = $queryData_Rel_Historico_fila_data;



?>
