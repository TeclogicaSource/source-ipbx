<?php

//	field labels
$fieldLabelsGraf__Agentes = array();
$fieldLabelsGraf__Agentes["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Agentes["Portuguese(Brazil)"]["Filas"] = "Filas";
$fieldLabelsGraf__Agentes["Portuguese(Brazil)"]["DATA"] = "DATA";
$fieldLabelsGraf__Agentes["Portuguese(Brazil)"]["Status"] = "Status";
$fieldLabelsGraf__Agentes["Portuguese(Brazil)"]["Status2"] = "Status2";


$tdataGraf__Agentes=array();
	$tdataGraf__Agentes[".ShortName"]="Graf__Agentes";
	$tdataGraf__Agentes[".OwnerID"]="";
	$tdataGraf__Agentes[".OriginalTable"]="cc_receptivo_graf_agentes";
	$tdataGraf__Agentes[".NCSearch"]=true;
	
	$tdataGraf__Agentes[".ChartRefreshTime"] = 0;

$tdataGraf__Agentes[".shortTableName"] = "Graf__Agentes";
$tdataGraf__Agentes[".dataSourceTable"] = "Graf. Agentes";
$tdataGraf__Agentes[".nSecOptions"] = 0;
$tdataGraf__Agentes[".nLoginMethod"] = 1;
$tdataGraf__Agentes[".recsPerRowList"] = 1;	
$tdataGraf__Agentes[".tableGroupBy"] = "1";
$tdataGraf__Agentes[".dbType"] = 0;
$tdataGraf__Agentes[".mainTableOwnerID"] = "";
$tdataGraf__Agentes[".moveNext"] = 1;

$tdataGraf__Agentes[".listAjax"] = false;

	$tdataGraf__Agentes[".audit"] = false;

	$tdataGraf__Agentes[".locking"] = false;
	
$tdataGraf__Agentes[".listIcons"] = true;




$tdataGraf__Agentes[".showSimpleSearchOptions"] = false;

$tdataGraf__Agentes[".showSearchPanel"] = true;


$tdataGraf__Agentes[".isUseAjaxSuggest"] = true;


$tdataGraf__Agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Agentes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Agentes[".isUseTimeForSearch"] = false;





$tdataGraf__Agentes[".isUseInlineJs"] = $tdataGraf__Agentes[".isUseInlineAdd"] || $tdataGraf__Agentes[".isUseInlineEdit"];

$tdataGraf__Agentes[".allSearchFields"] = array();

$tdataGraf__Agentes[".globSearchFields"][] = "Filas";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Filas", $tdataGraf__Agentes[".allSearchFields"]))
{
	$tdataGraf__Agentes[".allSearchFields"][] = "Filas";	
}


$tdataGraf__Agentes[".isDynamicPerm"] = true;

	

$tdataGraf__Agentes[".isDisplayLoading"] = true;

$tdataGraf__Agentes[".isResizeColumns"] = false;


$tdataGraf__Agentes[".createLoginPage"] = true;


 	



$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Agentes[".orderindexes"] = array();

$tdataGraf__Agentes[".sqlHead"] = "SELECT DATE_FORMAT(calldate,'%m-%Y') AS `DATA`,  Filas,  round(sum(status)) AS Status,  round(sum(status2)) AS Status2";

$tdataGraf__Agentes[".sqlFrom"] = "FROM cc_receptivo_graf_agentes";

$tdataGraf__Agentes[".sqlWhereExpr"] = "";

$tdataGraf__Agentes[".sqlTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), Filas";



	$tableKeys=array();
	$tdataGraf__Agentes[".Keys"]=$tableKeys;

	
//	DATA
	$fdata = array();
	$fdata["strName"] = "DATA";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATA";
		$fdata["FullName"]= "DATE_FORMAT(calldate,'%m-%Y')";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Agentes["DATA"]=$fdata;
	
//	Filas
	$fdata = array();
	$fdata["strName"] = "Filas";
	$fdata["ownerTable"] = "cc_receptivo_graf_agentes";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Filas";
		$fdata["FullName"]= "Filas";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Agentes["Filas"]=$fdata;
	
//	Status
	$fdata = array();
	$fdata["strName"] = "Status";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Status";
		$fdata["FullName"]= "round(sum(status))";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Agentes["Status"]=$fdata;
	
//	Status2
	$fdata = array();
	$fdata["strName"] = "Status2";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Status2";
		$fdata["FullName"]= "round(sum(status2))";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Agentes["Status2"]=$fdata;

$tdataGraf__Agentes[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Agentes</attr>
</attr>
<attr value="chart_type">
	<attr value="type">combined</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Status</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">Filas</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">3CB371</attr>
	<attr value="scolor12">3CB371</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Chart Title</attr>

<attr value="foot">Legend Title</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">true</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">2</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">DATA</attr>
		<attr value="label">DATA</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Filas</attr>
		<attr value="label">Filas</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Status</attr>
		<attr value="label">Status</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">Status2</attr>
		<attr value="label">Status2</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">DATA</attr>
<attr value="short_table_name">Graf__Agentes</attr>
</attr>

</chart>';
	
$tables_data["Graf. Agentes"]=&$tdataGraf__Agentes;
$field_labels["Graf__Agentes"] = &$fieldLabelsGraf__Agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Agentes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Agentes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "DATE_FORMAT(calldate,'%m-%Y') AS `DATA`,  Filas,  round(sum(status)) AS Status,  round(sum(status2)) AS Status2";
$proto0["m_strFrom"] = "FROM cc_receptivo_graf_agentes";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), Filas";
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m-%Y')"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Filas",
	"m_strTable" => "cc_receptivo_graf_agentes"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$proto10=array();
$proto10["m_functiontype"] = "SQLF_CUSTOM";
$proto10["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(status)"
));

$proto10["m_arguments"][]=$obj;
$proto10["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto10);

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "Status";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$proto13=array();
$proto13["m_functiontype"] = "SQLF_CUSTOM";
$proto13["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(status2)"
));

$proto13["m_arguments"][]=$obj;
$proto13["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto13);

$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "Status2";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "cc_receptivo_graf_agentes";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "calldate";
$proto16["m_columns"][] = "Filas";
$proto16["m_columns"][] = "status";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_alias"] = "";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto19=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m-%Y')"
));

$proto19["m_column"]=$obj;
$obj = new SQLGroupByItem($proto19);

$proto0["m_groupby"][]=$obj;
												$proto21=array();
						$obj = new SQLField(array(
	"m_strName" => "Filas",
	"m_strTable" => "cc_receptivo_graf_agentes"
));

$proto21["m_column"]=$obj;
$obj = new SQLGroupByItem($proto21);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

$queryData_Graf__Agentes = $obj;
$tdataGraf__Agentes[".sqlquery"] = $queryData_Graf__Agentes;



?>
