<?php

//	field labels
$fieldLabelsipbx_dt_especifica_feriado = array();
$fieldLabelsipbx_dt_especifica_feriado["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_dt_especifica_feriado["Portuguese(Brazil)"]["id_dt_espec"] = "Id Dt Espec";
$fieldLabelsipbx_dt_especifica_feriado["Portuguese(Brazil)"]["dsc_data"] = " Descrição";
$fieldLabelsipbx_dt_especifica_feriado["Portuguese(Brazil)"]["dt_especifica"] = " Data";


$tdataipbx_dt_especifica_feriado=array();
	$tdataipbx_dt_especifica_feriado[".NumberOfChars"]=80; 
	$tdataipbx_dt_especifica_feriado[".ShortName"]="ipbx_dt_especifica_feriado";
	$tdataipbx_dt_especifica_feriado[".OwnerID"]="";
	$tdataipbx_dt_especifica_feriado[".OriginalTable"]="ipbx_dt_especifica_feriado";
	$tdataipbx_dt_especifica_feriado[".NCSearch"]=true;
	

$tdataipbx_dt_especifica_feriado[".shortTableName"] = "ipbx_dt_especifica_feriado";
$tdataipbx_dt_especifica_feriado[".dataSourceTable"] = "ipbx_dt_especifica_feriado";
$tdataipbx_dt_especifica_feriado[".nSecOptions"] = 0;
$tdataipbx_dt_especifica_feriado[".nLoginMethod"] = 1;
$tdataipbx_dt_especifica_feriado[".recsPerRowList"] = 1;	
$tdataipbx_dt_especifica_feriado[".tableGroupBy"] = "0";
$tdataipbx_dt_especifica_feriado[".dbType"] = 0;
$tdataipbx_dt_especifica_feriado[".mainTableOwnerID"] = "";
$tdataipbx_dt_especifica_feriado[".moveNext"] = 1;

$tdataipbx_dt_especifica_feriado[".listAjax"] = false;

	$tdataipbx_dt_especifica_feriado[".audit"] = true;

	$tdataipbx_dt_especifica_feriado[".locking"] = false;
	
$tdataipbx_dt_especifica_feriado[".listIcons"] = true;
$tdataipbx_dt_especifica_feriado[".inlineEdit"] = true;



$tdataipbx_dt_especifica_feriado[".delete"] = true;

$tdataipbx_dt_especifica_feriado[".showSimpleSearchOptions"] = false;

$tdataipbx_dt_especifica_feriado[".showSearchPanel"] = true;


$tdataipbx_dt_especifica_feriado[".isUseAjaxSuggest"] = true;

$tdataipbx_dt_especifica_feriado[".rowHighlite"] = true;

$tdataipbx_dt_especifica_feriado[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_dt_especifica_feriado[".arrKeyFields"][] = "id_dt_espec";

// use datepicker for search panel
$tdataipbx_dt_especifica_feriado[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataipbx_dt_especifica_feriado[".isUseTimeForSearch"] = false;





$tdataipbx_dt_especifica_feriado[".isUseInlineAdd"] = true;

$tdataipbx_dt_especifica_feriado[".isUseInlineEdit"] = true;
$tdataipbx_dt_especifica_feriado[".isUseInlineJs"] = $tdataipbx_dt_especifica_feriado[".isUseInlineAdd"] || $tdataipbx_dt_especifica_feriado[".isUseInlineEdit"];

$tdataipbx_dt_especifica_feriado[".allSearchFields"] = array();

$tdataipbx_dt_especifica_feriado[".globSearchFields"][] = "dsc_data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_data", $tdataipbx_dt_especifica_feriado[".allSearchFields"]))
{
	$tdataipbx_dt_especifica_feriado[".allSearchFields"][] = "dsc_data";	
}
$tdataipbx_dt_especifica_feriado[".globSearchFields"][] = "dt_especifica";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_especifica", $tdataipbx_dt_especifica_feriado[".allSearchFields"]))
{
	$tdataipbx_dt_especifica_feriado[".allSearchFields"][] = "dt_especifica";	
}


$tdataipbx_dt_especifica_feriado[".isDynamicPerm"] = true;

	

$tdataipbx_dt_especifica_feriado[".isDisplayLoading"] = true;

$tdataipbx_dt_especifica_feriado[".isResizeColumns"] = false;


$tdataipbx_dt_especifica_feriado[".createLoginPage"] = true;


 	




$tdataipbx_dt_especifica_feriado[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_dt_especifica_feriado[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_dt_especifica_feriado[".orderindexes"] = array();

$tdataipbx_dt_especifica_feriado[".sqlHead"] = "SELECT id_dt_espec,   dsc_data,   dt_especifica";

$tdataipbx_dt_especifica_feriado[".sqlFrom"] = "FROM ipbx_dt_especifica_feriado";

$tdataipbx_dt_especifica_feriado[".sqlWhereExpr"] = "";

$tdataipbx_dt_especifica_feriado[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_dt_espec";
	$tdataipbx_dt_especifica_feriado[".Keys"]=$tableKeys;

	
//	id_dt_espec
	$fdata = array();
	$fdata["strName"] = "id_dt_espec";
	$fdata["ownerTable"] = "ipbx_dt_especifica_feriado";
		$fdata["Label"]="Id Dt Espec"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_dt_espec";
		$fdata["FullName"]= "id_dt_espec";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_dt_especifica_feriado["id_dt_espec"]=$fdata;
	
//	dsc_data
	$fdata = array();
	$fdata["strName"] = "dsc_data";
	$fdata["ownerTable"] = "ipbx_dt_especifica_feriado";
		$fdata["Label"]=" Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_data";
		$fdata["FullName"]= "dsc_data";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_dt_especifica_feriado["dsc_data"]=$fdata;
	
//	dt_especifica
	$fdata = array();
	$fdata["strName"] = "dt_especifica";
	$fdata["ownerTable"] = "ipbx_dt_especifica_feriado";
		$fdata["Label"]=" Data"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_especifica";
		$fdata["FullName"]= "dt_especifica";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_dt_especifica_feriado["dt_especifica"]=$fdata;

	
$tables_data["ipbx_dt_especifica_feriado"]=&$tdataipbx_dt_especifica_feriado;
$field_labels["ipbx_dt_especifica_feriado"] = &$fieldLabelsipbx_dt_especifica_feriado;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_dt_especifica_feriado"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_dt_especifica_feriado"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1662=array();
$proto1662["m_strHead"] = "SELECT";
$proto1662["m_strFieldList"] = "id_dt_espec,   dsc_data,   dt_especifica";
$proto1662["m_strFrom"] = "FROM ipbx_dt_especifica_feriado";
$proto1662["m_strWhere"] = "";
$proto1662["m_strOrderBy"] = "";
$proto1662["m_strTail"] = "";
$proto1663=array();
$proto1663["m_sql"] = "";
$proto1663["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1663["m_column"]=$obj;
$proto1663["m_contained"] = array();
$proto1663["m_strCase"] = "";
$proto1663["m_havingmode"] = "0";
$proto1663["m_inBrackets"] = "0";
$proto1663["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1663);

$proto1662["m_where"] = $obj;
$proto1665=array();
$proto1665["m_sql"] = "";
$proto1665["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1665["m_column"]=$obj;
$proto1665["m_contained"] = array();
$proto1665["m_strCase"] = "";
$proto1665["m_havingmode"] = "0";
$proto1665["m_inBrackets"] = "0";
$proto1665["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1665);

$proto1662["m_having"] = $obj;
$proto1662["m_fieldlist"] = array();
						$proto1667=array();
			$obj = new SQLField(array(
	"m_strName" => "id_dt_espec",
	"m_strTable" => "ipbx_dt_especifica_feriado"
));

$proto1667["m_expr"]=$obj;
$proto1667["m_alias"] = "";
$obj = new SQLFieldListItem($proto1667);

$proto1662["m_fieldlist"][]=$obj;
						$proto1669=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_data",
	"m_strTable" => "ipbx_dt_especifica_feriado"
));

$proto1669["m_expr"]=$obj;
$proto1669["m_alias"] = "";
$obj = new SQLFieldListItem($proto1669);

$proto1662["m_fieldlist"][]=$obj;
						$proto1671=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_especifica",
	"m_strTable" => "ipbx_dt_especifica_feriado"
));

$proto1671["m_expr"]=$obj;
$proto1671["m_alias"] = "";
$obj = new SQLFieldListItem($proto1671);

$proto1662["m_fieldlist"][]=$obj;
$proto1662["m_fromlist"] = array();
												$proto1673=array();
$proto1673["m_link"] = "SQLL_MAIN";
			$proto1674=array();
$proto1674["m_strName"] = "ipbx_dt_especifica_feriado";
$proto1674["m_columns"] = array();
$proto1674["m_columns"][] = "id_dt_espec";
$proto1674["m_columns"][] = "dsc_data";
$proto1674["m_columns"][] = "dt_especifica";
$obj = new SQLTable($proto1674);

$proto1673["m_table"] = $obj;
$proto1673["m_alias"] = "";
$proto1675=array();
$proto1675["m_sql"] = "";
$proto1675["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1675["m_column"]=$obj;
$proto1675["m_contained"] = array();
$proto1675["m_strCase"] = "";
$proto1675["m_havingmode"] = "0";
$proto1675["m_inBrackets"] = "0";
$proto1675["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1675);

$proto1673["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1673);

$proto1662["m_fromlist"][]=$obj;
$proto1662["m_groupby"] = array();
$proto1662["m_orderby"] = array();
$obj = new SQLQuery($proto1662);

$queryData_ipbx_dt_especifica_feriado = $obj;
$tdataipbx_dt_especifica_feriado[".sqlquery"] = $queryData_ipbx_dt_especifica_feriado;



?>
