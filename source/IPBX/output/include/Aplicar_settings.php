<?php

//	field labels
$fieldLabelsAplicar = array();
$fieldLabelsAplicar["Portuguese(Brazil)"]=array();
$fieldLabelsAplicar["Portuguese(Brazil)"]["id_bkp"] = "Identificação";
$fieldLabelsAplicar["Portuguese(Brazil)"]["dt_backup"] = "Data";
$fieldLabelsAplicar["Portuguese(Brazil)"]["dsc_backup"] = "Descrição Backup";


$tdataAplicar=array();
	$tdataAplicar[".NumberOfChars"]=80; 
	$tdataAplicar[".ShortName"]="Aplicar";
	$tdataAplicar[".OwnerID"]="";
	$tdataAplicar[".OriginalTable"]="ipbx_backup";
	$tdataAplicar[".NCSearch"]=true;
	

$tdataAplicar[".shortTableName"] = "Aplicar";
$tdataAplicar[".dataSourceTable"] = "Aplicar";
$tdataAplicar[".nSecOptions"] = 0;
$tdataAplicar[".nLoginMethod"] = 1;
$tdataAplicar[".recsPerRowList"] = 1;	
$tdataAplicar[".tableGroupBy"] = "0";
$tdataAplicar[".dbType"] = 0;
$tdataAplicar[".mainTableOwnerID"] = "";
$tdataAplicar[".moveNext"] = 1;

$tdataAplicar[".listAjax"] = false;

	$tdataAplicar[".audit"] = false;

	$tdataAplicar[".locking"] = false;
	
$tdataAplicar[".listIcons"] = true;




$tdataAplicar[".showSimpleSearchOptions"] = false;

$tdataAplicar[".showSearchPanel"] = true;


$tdataAplicar[".isUseAjaxSuggest"] = true;

$tdataAplicar[".rowHighlite"] = true;

$tdataAplicar[".delFile"] = true;

// button handlers file names
$tdataAplicar[".buttonHandlers_list"][] = "buttonevent_Aplicar";

// start on load js handlers








// end on load js handlers



$tdataAplicar[".arrKeyFields"][] = "id_bkp";

// use datepicker for search panel
$tdataAplicar[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataAplicar[".isUseTimeForSearch"] = false;






$tdataAplicar[".isUseInlineJs"] = $tdataAplicar[".isUseInlineAdd"] || $tdataAplicar[".isUseInlineEdit"];

$tdataAplicar[".allSearchFields"] = array();



$tdataAplicar[".isDynamicPerm"] = true;

	

$tdataAplicar[".isDisplayLoading"] = true;

$tdataAplicar[".isResizeColumns"] = false;


$tdataAplicar[".createLoginPage"] = true;


 	




$tdataAplicar[".pageSize"] = 20;

$gstrOrderBy = "ORDER BY dt_backup DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataAplicar[".strOrderBy"] = $gstrOrderBy;
	
$tdataAplicar[".orderindexes"] = array();
$tdataAplicar[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "dt_backup");

$tdataAplicar[".sqlHead"] = "SELECT id_bkp,  dt_backup,  dsc_backup";

$tdataAplicar[".sqlFrom"] = "FROM ipbx_backup";

$tdataAplicar[".sqlWhereExpr"] = "";

$tdataAplicar[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_bkp";
	$tdataAplicar[".Keys"]=$tableKeys;

	
//	id_bkp
	$fdata = array();
	$fdata["strName"] = "id_bkp";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_bkp";
		$fdata["FullName"]= "id_bkp";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataAplicar["id_bkp"]=$fdata;
	
//	dt_backup
	$fdata = array();
	$fdata["strName"] = "dt_backup";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_backup";
		$fdata["FullName"]= "dt_backup";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataAplicar["dt_backup"]=$fdata;
	
//	dsc_backup
	$fdata = array();
	$fdata["strName"] = "dsc_backup";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]="Descrição Backup"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_backup";
		$fdata["FullName"]= "dsc_backup";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataAplicar["dsc_backup"]=$fdata;

	
$tables_data["Aplicar"]=&$tdataAplicar;
$field_labels["Aplicar"] = &$fieldLabelsAplicar;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Aplicar"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Aplicar"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto525=array();
$proto525["m_strHead"] = "SELECT";
$proto525["m_strFieldList"] = "id_bkp,  dt_backup,  dsc_backup";
$proto525["m_strFrom"] = "FROM ipbx_backup";
$proto525["m_strWhere"] = "";
$proto525["m_strOrderBy"] = "ORDER BY dt_backup DESC";
$proto525["m_strTail"] = "";
$proto526=array();
$proto526["m_sql"] = "";
$proto526["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto526["m_column"]=$obj;
$proto526["m_contained"] = array();
$proto526["m_strCase"] = "";
$proto526["m_havingmode"] = "0";
$proto526["m_inBrackets"] = "0";
$proto526["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto526);

$proto525["m_where"] = $obj;
$proto528=array();
$proto528["m_sql"] = "";
$proto528["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto528["m_column"]=$obj;
$proto528["m_contained"] = array();
$proto528["m_strCase"] = "";
$proto528["m_havingmode"] = "0";
$proto528["m_inBrackets"] = "0";
$proto528["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto528);

$proto525["m_having"] = $obj;
$proto525["m_fieldlist"] = array();
						$proto530=array();
			$obj = new SQLField(array(
	"m_strName" => "id_bkp",
	"m_strTable" => "ipbx_backup"
));

$proto530["m_expr"]=$obj;
$proto530["m_alias"] = "";
$obj = new SQLFieldListItem($proto530);

$proto525["m_fieldlist"][]=$obj;
						$proto532=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_backup",
	"m_strTable" => "ipbx_backup"
));

$proto532["m_expr"]=$obj;
$proto532["m_alias"] = "";
$obj = new SQLFieldListItem($proto532);

$proto525["m_fieldlist"][]=$obj;
						$proto534=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_backup",
	"m_strTable" => "ipbx_backup"
));

$proto534["m_expr"]=$obj;
$proto534["m_alias"] = "";
$obj = new SQLFieldListItem($proto534);

$proto525["m_fieldlist"][]=$obj;
$proto525["m_fromlist"] = array();
												$proto536=array();
$proto536["m_link"] = "SQLL_MAIN";
			$proto537=array();
$proto537["m_strName"] = "ipbx_backup";
$proto537["m_columns"] = array();
$proto537["m_columns"][] = "id_bkp";
$proto537["m_columns"][] = "dt_backup";
$proto537["m_columns"][] = "dsc_backup";
$obj = new SQLTable($proto537);

$proto536["m_table"] = $obj;
$proto536["m_alias"] = "";
$proto538=array();
$proto538["m_sql"] = "";
$proto538["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto538["m_column"]=$obj;
$proto538["m_contained"] = array();
$proto538["m_strCase"] = "";
$proto538["m_havingmode"] = "0";
$proto538["m_inBrackets"] = "0";
$proto538["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto538);

$proto536["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto536);

$proto525["m_fromlist"][]=$obj;
$proto525["m_groupby"] = array();
$proto525["m_orderby"] = array();
												$proto540=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_backup",
	"m_strTable" => "ipbx_backup"
));

$proto540["m_column"]=$obj;
$proto540["m_bAsc"] = 0;
$proto540["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto540);

$proto525["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto525);

$queryData_Aplicar = $obj;
$tdataAplicar[".sqlquery"] = $queryData_Aplicar;



?>
