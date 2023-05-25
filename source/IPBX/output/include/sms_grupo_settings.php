<?php

//	field labels
$fieldLabelssms_grupo = array();
$fieldLabelssms_grupo["Portuguese(Brazil)"]=array();
$fieldLabelssms_grupo["Portuguese(Brazil)"]["id_grupo"] = "Identificação";
$fieldLabelssms_grupo["Portuguese(Brazil)"]["nome"] = "Nome";


$tdatasms_grupo=array();
	$tdatasms_grupo[".NumberOfChars"]=80; 
	$tdatasms_grupo[".ShortName"]="sms_grupo";
	$tdatasms_grupo[".OwnerID"]="";
	$tdatasms_grupo[".OriginalTable"]="sms_grupo";
	$tdatasms_grupo[".NCSearch"]=true;
	

$tdatasms_grupo[".shortTableName"] = "sms_grupo";
$tdatasms_grupo[".dataSourceTable"] = "sms_grupo";
$tdatasms_grupo[".nSecOptions"] = 0;
$tdatasms_grupo[".nLoginMethod"] = 1;
$tdatasms_grupo[".recsPerRowList"] = 1;	
$tdatasms_grupo[".tableGroupBy"] = "0";
$tdatasms_grupo[".dbType"] = 0;
$tdatasms_grupo[".mainTableOwnerID"] = "";
$tdatasms_grupo[".moveNext"] = 1;

$tdatasms_grupo[".listAjax"] = true;

	$tdatasms_grupo[".audit"] = true;

	$tdatasms_grupo[".locking"] = false;
	
$tdatasms_grupo[".listIcons"] = true;
$tdatasms_grupo[".inlineEdit"] = true;



$tdatasms_grupo[".delete"] = true;

$tdatasms_grupo[".showSimpleSearchOptions"] = false;

$tdatasms_grupo[".showSearchPanel"] = true;


$tdatasms_grupo[".isUseAjaxSuggest"] = true;

$tdatasms_grupo[".rowHighlite"] = true;

$tdatasms_grupo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasms_grupo[".arrKeyFields"][] = "id_grupo";

// use datepicker for search panel
$tdatasms_grupo[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasms_grupo[".isUseTimeForSearch"] = false;





$tdatasms_grupo[".isUseInlineAdd"] = true;

$tdatasms_grupo[".isUseInlineEdit"] = true;
$tdatasms_grupo[".isUseInlineJs"] = $tdatasms_grupo[".isUseInlineAdd"] || $tdatasms_grupo[".isUseInlineEdit"];

$tdatasms_grupo[".allSearchFields"] = array();

$tdatasms_grupo[".globSearchFields"][] = "nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nome", $tdatasms_grupo[".allSearchFields"]))
{
	$tdatasms_grupo[".allSearchFields"][] = "nome";	
}


$tdatasms_grupo[".isDynamicPerm"] = true;

	

$tdatasms_grupo[".isDisplayLoading"] = true;

$tdatasms_grupo[".isResizeColumns"] = false;


$tdatasms_grupo[".createLoginPage"] = true;


 	




$tdatasms_grupo[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasms_grupo[".strOrderBy"] = $gstrOrderBy;
	
$tdatasms_grupo[".orderindexes"] = array();

$tdatasms_grupo[".sqlHead"] = "SELECT id_grupo,   nome";

$tdatasms_grupo[".sqlFrom"] = "FROM sms_grupo";

$tdatasms_grupo[".sqlWhereExpr"] = "";

$tdatasms_grupo[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_grupo";
	$tdatasms_grupo[".Keys"]=$tableKeys;

	
//	id_grupo
	$fdata = array();
	$fdata["strName"] = "id_grupo";
	$fdata["ownerTable"] = "sms_grupo";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_grupo";
		$fdata["FullName"]= "id_grupo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatasms_grupo["id_grupo"]=$fdata;
	
//	nome
	$fdata = array();
	$fdata["strName"] = "nome";
	$fdata["ownerTable"] = "sms_grupo";
		$fdata["Label"]="Nome"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nome";
		$fdata["FullName"]= "nome";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_grupo["nome"]=$fdata;

	
$tables_data["sms_grupo"]=&$tdatasms_grupo;
$field_labels["sms_grupo"] = &$fieldLabelssms_grupo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sms_grupo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sms_grupo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3198=array();
$proto3198["m_strHead"] = "SELECT";
$proto3198["m_strFieldList"] = "id_grupo,   nome";
$proto3198["m_strFrom"] = "FROM sms_grupo";
$proto3198["m_strWhere"] = "";
$proto3198["m_strOrderBy"] = "";
$proto3198["m_strTail"] = "";
$proto3199=array();
$proto3199["m_sql"] = "";
$proto3199["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3199["m_column"]=$obj;
$proto3199["m_contained"] = array();
$proto3199["m_strCase"] = "";
$proto3199["m_havingmode"] = "0";
$proto3199["m_inBrackets"] = "0";
$proto3199["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3199);

$proto3198["m_where"] = $obj;
$proto3201=array();
$proto3201["m_sql"] = "";
$proto3201["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3201["m_column"]=$obj;
$proto3201["m_contained"] = array();
$proto3201["m_strCase"] = "";
$proto3201["m_havingmode"] = "0";
$proto3201["m_inBrackets"] = "0";
$proto3201["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3201);

$proto3198["m_having"] = $obj;
$proto3198["m_fieldlist"] = array();
						$proto3203=array();
			$obj = new SQLField(array(
	"m_strName" => "id_grupo",
	"m_strTable" => "sms_grupo"
));

$proto3203["m_expr"]=$obj;
$proto3203["m_alias"] = "";
$obj = new SQLFieldListItem($proto3203);

$proto3198["m_fieldlist"][]=$obj;
						$proto3205=array();
			$obj = new SQLField(array(
	"m_strName" => "nome",
	"m_strTable" => "sms_grupo"
));

$proto3205["m_expr"]=$obj;
$proto3205["m_alias"] = "";
$obj = new SQLFieldListItem($proto3205);

$proto3198["m_fieldlist"][]=$obj;
$proto3198["m_fromlist"] = array();
												$proto3207=array();
$proto3207["m_link"] = "SQLL_MAIN";
			$proto3208=array();
$proto3208["m_strName"] = "sms_grupo";
$proto3208["m_columns"] = array();
$proto3208["m_columns"][] = "id_grupo";
$proto3208["m_columns"][] = "nome";
$obj = new SQLTable($proto3208);

$proto3207["m_table"] = $obj;
$proto3207["m_alias"] = "";
$proto3209=array();
$proto3209["m_sql"] = "";
$proto3209["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3209["m_column"]=$obj;
$proto3209["m_contained"] = array();
$proto3209["m_strCase"] = "";
$proto3209["m_havingmode"] = "0";
$proto3209["m_inBrackets"] = "0";
$proto3209["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3209);

$proto3207["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3207);

$proto3198["m_fromlist"][]=$obj;
$proto3198["m_groupby"] = array();
$proto3198["m_orderby"] = array();
$obj = new SQLQuery($proto3198);

$queryData_sms_grupo = $obj;
$tdatasms_grupo[".sqlquery"] = $queryData_sms_grupo;



?>
