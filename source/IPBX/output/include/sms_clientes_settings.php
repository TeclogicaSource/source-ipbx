<?php

//	field labels
$fieldLabelssms_clientes = array();
$fieldLabelssms_clientes["Portuguese(Brazil)"]=array();
$fieldLabelssms_clientes["Portuguese(Brazil)"]["id_cliente"] = "Identificação";
$fieldLabelssms_clientes["Portuguese(Brazil)"]["Nome"] = "Nome";


$tdatasms_clientes=array();
	$tdatasms_clientes[".NumberOfChars"]=80; 
	$tdatasms_clientes[".ShortName"]="sms_clientes";
	$tdatasms_clientes[".OwnerID"]="";
	$tdatasms_clientes[".OriginalTable"]="sms_clientes";
	$tdatasms_clientes[".NCSearch"]=true;
	

$tdatasms_clientes[".shortTableName"] = "sms_clientes";
$tdatasms_clientes[".dataSourceTable"] = "sms_clientes";
$tdatasms_clientes[".nSecOptions"] = 0;
$tdatasms_clientes[".nLoginMethod"] = 1;
$tdatasms_clientes[".recsPerRowList"] = 1;	
$tdatasms_clientes[".tableGroupBy"] = "0";
$tdatasms_clientes[".dbType"] = 0;
$tdatasms_clientes[".mainTableOwnerID"] = "";
$tdatasms_clientes[".moveNext"] = 1;

$tdatasms_clientes[".listAjax"] = false;

	$tdatasms_clientes[".audit"] = false;

	$tdatasms_clientes[".locking"] = false;
	
$tdatasms_clientes[".listIcons"] = true;
$tdatasms_clientes[".edit"] = true;

$tdatasms_clientes[".exportTo"] = true;


$tdatasms_clientes[".delete"] = true;

$tdatasms_clientes[".showSimpleSearchOptions"] = false;

$tdatasms_clientes[".showSearchPanel"] = true;


$tdatasms_clientes[".isUseAjaxSuggest"] = true;

$tdatasms_clientes[".rowHighlite"] = true;


// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasms_clientes[".arrKeyFields"][] = "id_cliente";

// use datepicker for search panel
$tdatasms_clientes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasms_clientes[".isUseTimeForSearch"] = false;






$tdatasms_clientes[".isUseInlineJs"] = $tdatasms_clientes[".isUseInlineAdd"] || $tdatasms_clientes[".isUseInlineEdit"];

$tdatasms_clientes[".allSearchFields"] = array();

$tdatasms_clientes[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdatasms_clientes[".allSearchFields"]))
{
	$tdatasms_clientes[".allSearchFields"][] = "Nome";	
}


$tdatasms_clientes[".isDynamicPerm"] = true;

	

$tdatasms_clientes[".isDisplayLoading"] = true;

$tdatasms_clientes[".isResizeColumns"] = false;


$tdatasms_clientes[".createLoginPage"] = true;


 	




$tdatasms_clientes[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasms_clientes[".strOrderBy"] = $gstrOrderBy;
	
$tdatasms_clientes[".orderindexes"] = array();

$tdatasms_clientes[".sqlHead"] = "SELECT id_cliente,   Nome";

$tdatasms_clientes[".sqlFrom"] = "FROM sms_clientes";

$tdatasms_clientes[".sqlWhereExpr"] = "";

$tdatasms_clientes[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_cliente";
	$tdatasms_clientes[".Keys"]=$tableKeys;

	
//	id_cliente
	$fdata = array();
	$fdata["strName"] = "id_cliente";
	$fdata["ownerTable"] = "sms_clientes";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_cliente";
		$fdata["FullName"]= "id_cliente";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_clientes["id_cliente"]=$fdata;
	
//	Nome
	$fdata = array();
	$fdata["strName"] = "Nome";
	$fdata["ownerTable"] = "sms_clientes";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Nome";
		$fdata["FullName"]= "Nome";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_clientes["Nome"]=$fdata;

	
$tables_data["sms_clientes"]=&$tdatasms_clientes;
$field_labels["sms_clientes"] = &$fieldLabelssms_clientes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sms_clientes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sms_clientes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto113=array();
$proto113["m_strHead"] = "SELECT";
$proto113["m_strFieldList"] = "id_cliente,   Nome";
$proto113["m_strFrom"] = "FROM sms_clientes";
$proto113["m_strWhere"] = "";
$proto113["m_strOrderBy"] = "";
$proto113["m_strTail"] = "";
$proto114=array();
$proto114["m_sql"] = "";
$proto114["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto114["m_column"]=$obj;
$proto114["m_contained"] = array();
$proto114["m_strCase"] = "";
$proto114["m_havingmode"] = "0";
$proto114["m_inBrackets"] = "0";
$proto114["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto114);

$proto113["m_where"] = $obj;
$proto116=array();
$proto116["m_sql"] = "";
$proto116["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto116["m_column"]=$obj;
$proto116["m_contained"] = array();
$proto116["m_strCase"] = "";
$proto116["m_havingmode"] = "0";
$proto116["m_inBrackets"] = "0";
$proto116["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto116);

$proto113["m_having"] = $obj;
$proto113["m_fieldlist"] = array();
						$proto118=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cliente",
	"m_strTable" => "sms_clientes"
));

$proto118["m_expr"]=$obj;
$proto118["m_alias"] = "";
$obj = new SQLFieldListItem($proto118);

$proto113["m_fieldlist"][]=$obj;
						$proto120=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "sms_clientes"
));

$proto120["m_expr"]=$obj;
$proto120["m_alias"] = "";
$obj = new SQLFieldListItem($proto120);

$proto113["m_fieldlist"][]=$obj;
$proto113["m_fromlist"] = array();
												$proto122=array();
$proto122["m_link"] = "SQLL_MAIN";
			$proto123=array();
$proto123["m_strName"] = "sms_clientes";
$proto123["m_columns"] = array();
$proto123["m_columns"][] = "id_cliente";
$proto123["m_columns"][] = "Nome";
$obj = new SQLTable($proto123);

$proto122["m_table"] = $obj;
$proto122["m_alias"] = "";
$proto124=array();
$proto124["m_sql"] = "";
$proto124["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto124["m_column"]=$obj;
$proto124["m_contained"] = array();
$proto124["m_strCase"] = "";
$proto124["m_havingmode"] = "0";
$proto124["m_inBrackets"] = "0";
$proto124["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto124);

$proto122["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto122);

$proto113["m_fromlist"][]=$obj;
$proto113["m_groupby"] = array();
$proto113["m_orderby"] = array();
$obj = new SQLQuery($proto113);

$queryData_sms_clientes = $obj;
$tdatasms_clientes[".sqlquery"] = $queryData_sms_clientes;



?>
