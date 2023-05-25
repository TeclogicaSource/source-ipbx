<?php

//	field labels
$fieldLabelsHor_rio = array();
$fieldLabelsHor_rio["Portuguese(Brazil)"]=array();
$fieldLabelsHor_rio["Portuguese(Brazil)"]["idt_agenda"] = "Idt Agenda";
$fieldLabelsHor_rio["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsHor_rio["Portuguese(Brazil)"]["Numero"] = "Numero";
$fieldLabelsHor_rio["Portuguese(Brazil)"]["idt_custo"] = "Idt Custo";


$tdataHor_rio=array();
	$tdataHor_rio[".NumberOfChars"]=80; 
	$tdataHor_rio[".ShortName"]="Hor_rio";
	$tdataHor_rio[".OwnerID"]="";
	$tdataHor_rio[".OriginalTable"]="agenda";
	$tdataHor_rio[".NCSearch"]=true;
	

$tdataHor_rio[".shortTableName"] = "Hor_rio";
$tdataHor_rio[".dataSourceTable"] = "Horarios";
$tdataHor_rio[".nSecOptions"] = 0;
$tdataHor_rio[".nLoginMethod"] = 1;
$tdataHor_rio[".recsPerRowList"] = 1;	
$tdataHor_rio[".tableGroupBy"] = "0";
$tdataHor_rio[".dbType"] = 0;
$tdataHor_rio[".mainTableOwnerID"] = "";
$tdataHor_rio[".moveNext"] = 1;

$tdataHor_rio[".listAjax"] = false;

	$tdataHor_rio[".audit"] = false;

	$tdataHor_rio[".locking"] = false;
	
$tdataHor_rio[".listIcons"] = true;

$tdataHor_rio[".exportTo"] = true;

$tdataHor_rio[".printFriendly"] = true;


$tdataHor_rio[".showSimpleSearchOptions"] = false;

$tdataHor_rio[".showSearchPanel"] = true;


$tdataHor_rio[".isUseAjaxSuggest"] = true;



// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataHor_rio[".arrKeyFields"][] = "idt_agenda";

// use datepicker for search panel
$tdataHor_rio[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataHor_rio[".isUseTimeForSearch"] = false;





$tdataHor_rio[".isUseInlineJs"] = $tdataHor_rio[".isUseInlineAdd"] || $tdataHor_rio[".isUseInlineEdit"];

$tdataHor_rio[".allSearchFields"] = array();

$tdataHor_rio[".globSearchFields"][] = "idt_agenda";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_agenda", $tdataHor_rio[".allSearchFields"]))
{
	$tdataHor_rio[".allSearchFields"][] = "idt_agenda";	
}
$tdataHor_rio[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdataHor_rio[".allSearchFields"]))
{
	$tdataHor_rio[".allSearchFields"][] = "Nome";	
}
$tdataHor_rio[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdataHor_rio[".allSearchFields"]))
{
	$tdataHor_rio[".allSearchFields"][] = "Numero";	
}
$tdataHor_rio[".globSearchFields"][] = "idt_custo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_custo", $tdataHor_rio[".allSearchFields"]))
{
	$tdataHor_rio[".allSearchFields"][] = "idt_custo";	
}


$tdataHor_rio[".isDynamicPerm"] = true;

	

$tdataHor_rio[".isDisplayLoading"] = true;

$tdataHor_rio[".isResizeColumns"] = false;


$tdataHor_rio[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataHor_rio[".strOrderBy"] = $gstrOrderBy;
	
$tdataHor_rio[".orderindexes"] = array();

$tdataHor_rio[".sqlHead"] = "SELECT idt_agenda,   Nome,   Numero,   idt_custo";

$tdataHor_rio[".sqlFrom"] = "FROM agenda";

$tdataHor_rio[".sqlWhereExpr"] = "";

$tdataHor_rio[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agenda";
	$tdataHor_rio[".Keys"]=$tableKeys;

	
//	idt_agenda
	$fdata = array();
	$fdata["strName"] = "idt_agenda";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Idt Agenda"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agenda";
		$fdata["FullName"]= "idt_agenda";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataHor_rio["idt_agenda"]=$fdata;
	
//	Nome
	$fdata = array();
	$fdata["strName"] = "Nome";
	$fdata["ownerTable"] = "agenda";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Nome";
		$fdata["FullName"]= "Nome";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataHor_rio["Nome"]=$fdata;
	
//	Numero
	$fdata = array();
	$fdata["strName"] = "Numero";
	$fdata["ownerTable"] = "agenda";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Numero";
		$fdata["FullName"]= "Numero";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataHor_rio["Numero"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Idt Custo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataHor_rio["idt_custo"]=$fdata;

	
$tables_data["Horarios"]=&$tdataHor_rio;
$field_labels["Horarios"] = &$fieldLabelsHor_rio;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Horarios"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Horarios"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto126=array();
$proto126["m_strHead"] = "SELECT";
$proto126["m_strFieldList"] = "idt_agenda,   Nome,   Numero,   idt_custo";
$proto126["m_strFrom"] = "FROM agenda";
$proto126["m_strWhere"] = "";
$proto126["m_strOrderBy"] = "";
$proto126["m_strTail"] = "";
$proto127=array();
$proto127["m_sql"] = "";
$proto127["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto127["m_column"]=$obj;
$proto127["m_contained"] = array();
$proto127["m_strCase"] = "";
$proto127["m_havingmode"] = "0";
$proto127["m_inBrackets"] = "0";
$proto127["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto127);

$proto126["m_where"] = $obj;
$proto129=array();
$proto129["m_sql"] = "";
$proto129["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto129["m_column"]=$obj;
$proto129["m_contained"] = array();
$proto129["m_strCase"] = "";
$proto129["m_havingmode"] = "0";
$proto129["m_inBrackets"] = "0";
$proto129["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto129);

$proto126["m_having"] = $obj;
$proto126["m_fieldlist"] = array();
						$proto131=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto131["m_expr"]=$obj;
$proto131["m_alias"] = "";
$obj = new SQLFieldListItem($proto131);

$proto126["m_fieldlist"][]=$obj;
						$proto133=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto133["m_expr"]=$obj;
$proto133["m_alias"] = "";
$obj = new SQLFieldListItem($proto133);

$proto126["m_fieldlist"][]=$obj;
						$proto135=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto135["m_expr"]=$obj;
$proto135["m_alias"] = "";
$obj = new SQLFieldListItem($proto135);

$proto126["m_fieldlist"][]=$obj;
						$proto137=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto137["m_expr"]=$obj;
$proto137["m_alias"] = "";
$obj = new SQLFieldListItem($proto137);

$proto126["m_fieldlist"][]=$obj;
$proto126["m_fromlist"] = array();
												$proto139=array();
$proto139["m_link"] = "SQLL_MAIN";
			$proto140=array();
$proto140["m_strName"] = "agenda";
$proto140["m_columns"] = array();
$proto140["m_columns"][] = "idt_agenda";
$proto140["m_columns"][] = "Nome";
$proto140["m_columns"][] = "Numero";
$proto140["m_columns"][] = "idt_custo";
$obj = new SQLTable($proto140);

$proto139["m_table"] = $obj;
$proto139["m_alias"] = "";
$proto141=array();
$proto141["m_sql"] = "";
$proto141["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto141["m_column"]=$obj;
$proto141["m_contained"] = array();
$proto141["m_strCase"] = "";
$proto141["m_havingmode"] = "0";
$proto141["m_inBrackets"] = "0";
$proto141["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto141);

$proto139["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto139);

$proto126["m_fromlist"][]=$obj;
$proto126["m_groupby"] = array();
$proto126["m_orderby"] = array();
$obj = new SQLQuery($proto126);

$queryData_Hor_rio = $obj;
$tdataHor_rio[".sqlquery"] = $queryData_Hor_rio;



?>
