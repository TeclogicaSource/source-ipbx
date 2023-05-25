<?php

//	field labels
$fieldLabelsipbx_grupo_captura = array();
$fieldLabelsipbx_grupo_captura["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_grupo_captura["Portuguese(Brazil)"]["id_captura"] = "Identificação";
$fieldLabelsipbx_grupo_captura["Portuguese(Brazil)"]["dsc_grupo"] = "Descrição do Grupo";


$tdataipbx_grupo_captura=array();
	$tdataipbx_grupo_captura[".NumberOfChars"]=80; 
	$tdataipbx_grupo_captura[".ShortName"]="ipbx_grupo_captura";
	$tdataipbx_grupo_captura[".OwnerID"]="";
	$tdataipbx_grupo_captura[".OriginalTable"]="ipbx_grupo_captura";
	$tdataipbx_grupo_captura[".NCSearch"]=true;
	

$tdataipbx_grupo_captura[".shortTableName"] = "ipbx_grupo_captura";
$tdataipbx_grupo_captura[".dataSourceTable"] = "ipbx_grupo_captura";
$tdataipbx_grupo_captura[".nSecOptions"] = 0;
$tdataipbx_grupo_captura[".nLoginMethod"] = 1;
$tdataipbx_grupo_captura[".recsPerRowList"] = 1;	
$tdataipbx_grupo_captura[".tableGroupBy"] = "0";
$tdataipbx_grupo_captura[".dbType"] = 0;
$tdataipbx_grupo_captura[".mainTableOwnerID"] = "";
$tdataipbx_grupo_captura[".moveNext"] = 1;

$tdataipbx_grupo_captura[".listAjax"] = true;

	$tdataipbx_grupo_captura[".audit"] = true;

	$tdataipbx_grupo_captura[".locking"] = false;
	
$tdataipbx_grupo_captura[".listIcons"] = true;
$tdataipbx_grupo_captura[".edit"] = true;



$tdataipbx_grupo_captura[".delete"] = true;

$tdataipbx_grupo_captura[".showSimpleSearchOptions"] = false;

$tdataipbx_grupo_captura[".showSearchPanel"] = true;


$tdataipbx_grupo_captura[".isUseAjaxSuggest"] = true;

$tdataipbx_grupo_captura[".rowHighlite"] = true;

$tdataipbx_grupo_captura[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_grupo_captura[".arrKeyFields"][] = "id_captura";

// use datepicker for search panel
$tdataipbx_grupo_captura[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_grupo_captura[".isUseTimeForSearch"] = false;






$tdataipbx_grupo_captura[".isUseInlineJs"] = $tdataipbx_grupo_captura[".isUseInlineAdd"] || $tdataipbx_grupo_captura[".isUseInlineEdit"];

$tdataipbx_grupo_captura[".allSearchFields"] = array();



$tdataipbx_grupo_captura[".isDynamicPerm"] = true;

	

$tdataipbx_grupo_captura[".isDisplayLoading"] = true;

$tdataipbx_grupo_captura[".isResizeColumns"] = false;


$tdataipbx_grupo_captura[".createLoginPage"] = true;


 	




$tdataipbx_grupo_captura[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_grupo_captura[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_grupo_captura[".orderindexes"] = array();

$tdataipbx_grupo_captura[".sqlHead"] = "SELECT id_captura,   dsc_grupo";

$tdataipbx_grupo_captura[".sqlFrom"] = "FROM ipbx_grupo_captura";

$tdataipbx_grupo_captura[".sqlWhereExpr"] = "";

$tdataipbx_grupo_captura[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_captura";
	$tdataipbx_grupo_captura[".Keys"]=$tableKeys;

	
//	id_captura
	$fdata = array();
	$fdata["strName"] = "id_captura";
	$fdata["ownerTable"] = "ipbx_grupo_captura";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_captura";
		$fdata["FullName"]= "id_captura";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_grupo_captura["id_captura"]=$fdata;
	
//	dsc_grupo
	$fdata = array();
	$fdata["strName"] = "dsc_grupo";
	$fdata["ownerTable"] = "ipbx_grupo_captura";
		$fdata["Label"]="Descrição do Grupo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_grupo";
		$fdata["FullName"]= "dsc_grupo";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_grupo_captura["dsc_grupo"]=$fdata;

	
$tables_data["ipbx_grupo_captura"]=&$tdataipbx_grupo_captura;
$field_labels["ipbx_grupo_captura"] = &$fieldLabelsipbx_grupo_captura;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_grupo_captura"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_grupo_captura"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2323=array();
$proto2323["m_strHead"] = "SELECT";
$proto2323["m_strFieldList"] = "id_captura,   dsc_grupo";
$proto2323["m_strFrom"] = "FROM ipbx_grupo_captura";
$proto2323["m_strWhere"] = "";
$proto2323["m_strOrderBy"] = "";
$proto2323["m_strTail"] = "";
$proto2324=array();
$proto2324["m_sql"] = "";
$proto2324["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2324["m_column"]=$obj;
$proto2324["m_contained"] = array();
$proto2324["m_strCase"] = "";
$proto2324["m_havingmode"] = "0";
$proto2324["m_inBrackets"] = "0";
$proto2324["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2324);

$proto2323["m_where"] = $obj;
$proto2326=array();
$proto2326["m_sql"] = "";
$proto2326["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2326["m_column"]=$obj;
$proto2326["m_contained"] = array();
$proto2326["m_strCase"] = "";
$proto2326["m_havingmode"] = "0";
$proto2326["m_inBrackets"] = "0";
$proto2326["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2326);

$proto2323["m_having"] = $obj;
$proto2323["m_fieldlist"] = array();
						$proto2328=array();
			$obj = new SQLField(array(
	"m_strName" => "id_captura",
	"m_strTable" => "ipbx_grupo_captura"
));

$proto2328["m_expr"]=$obj;
$proto2328["m_alias"] = "";
$obj = new SQLFieldListItem($proto2328);

$proto2323["m_fieldlist"][]=$obj;
						$proto2330=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_grupo",
	"m_strTable" => "ipbx_grupo_captura"
));

$proto2330["m_expr"]=$obj;
$proto2330["m_alias"] = "";
$obj = new SQLFieldListItem($proto2330);

$proto2323["m_fieldlist"][]=$obj;
$proto2323["m_fromlist"] = array();
												$proto2332=array();
$proto2332["m_link"] = "SQLL_MAIN";
			$proto2333=array();
$proto2333["m_strName"] = "ipbx_grupo_captura";
$proto2333["m_columns"] = array();
$proto2333["m_columns"][] = "id_captura";
$proto2333["m_columns"][] = "dsc_grupo";
$obj = new SQLTable($proto2333);

$proto2332["m_table"] = $obj;
$proto2332["m_alias"] = "";
$proto2334=array();
$proto2334["m_sql"] = "";
$proto2334["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2334["m_column"]=$obj;
$proto2334["m_contained"] = array();
$proto2334["m_strCase"] = "";
$proto2334["m_havingmode"] = "0";
$proto2334["m_inBrackets"] = "0";
$proto2334["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2334);

$proto2332["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2332);

$proto2323["m_fromlist"][]=$obj;
$proto2323["m_groupby"] = array();
$proto2323["m_orderby"] = array();
$obj = new SQLQuery($proto2323);

$queryData_ipbx_grupo_captura = $obj;
$tdataipbx_grupo_captura[".sqlquery"] = $queryData_ipbx_grupo_captura;



?>
