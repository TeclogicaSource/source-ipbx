<?php

//	field labels
$fieldLabelsipbx_conf_grav = array();
$fieldLabelsipbx_conf_grav["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_conf_grav["Portuguese(Brazil)"]["id_conf"] = "Identificação";
$fieldLabelsipbx_conf_grav["Portuguese(Brazil)"]["tp_reter_grav"] = "Manter gravações por (mês)";
$fieldLabelsipbx_conf_grav["Portuguese(Brazil)"]["pasta"] = "Local para gravação (Exemplo: /tmp/)";


$tdataipbx_conf_grav=array();
	$tdataipbx_conf_grav[".NumberOfChars"]=80; 
	$tdataipbx_conf_grav[".ShortName"]="ipbx_conf_grav";
	$tdataipbx_conf_grav[".OwnerID"]="";
	$tdataipbx_conf_grav[".OriginalTable"]="ipbx_conf_grav";
	$tdataipbx_conf_grav[".NCSearch"]=true;
	

$tdataipbx_conf_grav[".shortTableName"] = "ipbx_conf_grav";
$tdataipbx_conf_grav[".dataSourceTable"] = "ipbx_conf_grav";
$tdataipbx_conf_grav[".nSecOptions"] = 0;
$tdataipbx_conf_grav[".nLoginMethod"] = 1;
$tdataipbx_conf_grav[".recsPerRowList"] = 1;	
$tdataipbx_conf_grav[".tableGroupBy"] = "0";
$tdataipbx_conf_grav[".dbType"] = 0;
$tdataipbx_conf_grav[".mainTableOwnerID"] = "";
$tdataipbx_conf_grav[".moveNext"] = 1;

$tdataipbx_conf_grav[".listAjax"] = true;

	$tdataipbx_conf_grav[".audit"] = true;

	$tdataipbx_conf_grav[".locking"] = false;
	
$tdataipbx_conf_grav[".listIcons"] = true;
$tdataipbx_conf_grav[".inlineEdit"] = true;



$tdataipbx_conf_grav[".delete"] = true;

$tdataipbx_conf_grav[".showSimpleSearchOptions"] = false;

$tdataipbx_conf_grav[".showSearchPanel"] = true;


$tdataipbx_conf_grav[".isUseAjaxSuggest"] = true;

$tdataipbx_conf_grav[".rowHighlite"] = true;

$tdataipbx_conf_grav[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_conf_grav[".arrKeyFields"][] = "id_conf";

// use datepicker for search panel
$tdataipbx_conf_grav[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_conf_grav[".isUseTimeForSearch"] = false;






$tdataipbx_conf_grav[".isUseInlineEdit"] = true;
$tdataipbx_conf_grav[".isUseInlineJs"] = $tdataipbx_conf_grav[".isUseInlineAdd"] || $tdataipbx_conf_grav[".isUseInlineEdit"];

$tdataipbx_conf_grav[".allSearchFields"] = array();



$tdataipbx_conf_grav[".isDynamicPerm"] = true;

	

$tdataipbx_conf_grav[".isDisplayLoading"] = true;

$tdataipbx_conf_grav[".isResizeColumns"] = false;


$tdataipbx_conf_grav[".createLoginPage"] = true;


 	




$tdataipbx_conf_grav[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_conf_grav[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_conf_grav[".orderindexes"] = array();

$tdataipbx_conf_grav[".sqlHead"] = "SELECT id_conf,   tp_reter_grav,   pasta";

$tdataipbx_conf_grav[".sqlFrom"] = "FROM ipbx_conf_grav";

$tdataipbx_conf_grav[".sqlWhereExpr"] = "";

$tdataipbx_conf_grav[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_conf";
	$tdataipbx_conf_grav[".Keys"]=$tableKeys;

	
//	id_conf
	$fdata = array();
	$fdata["strName"] = "id_conf";
	$fdata["ownerTable"] = "ipbx_conf_grav";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_conf";
		$fdata["FullName"]= "id_conf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_conf_grav["id_conf"]=$fdata;
	
//	tp_reter_grav
	$fdata = array();
	$fdata["strName"] = "tp_reter_grav";
	$fdata["ownerTable"] = "ipbx_conf_grav";
		$fdata["Label"]="Manter gravações por (mês)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_reter_grav";
		$fdata["FullName"]= "tp_reter_grav";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_conf_grav["tp_reter_grav"]=$fdata;
	
//	pasta
	$fdata = array();
	$fdata["strName"] = "pasta";
	$fdata["ownerTable"] = "ipbx_conf_grav";
		$fdata["Label"]="Local para gravação (Exemplo: /tmp/)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "pasta";
		$fdata["FullName"]= "pasta";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_conf_grav["pasta"]=$fdata;

	
$tables_data["ipbx_conf_grav"]=&$tdataipbx_conf_grav;
$field_labels["ipbx_conf_grav"] = &$fieldLabelsipbx_conf_grav;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_conf_grav"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_conf_grav"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2001=array();
$proto2001["m_strHead"] = "SELECT";
$proto2001["m_strFieldList"] = "id_conf,   tp_reter_grav,   pasta";
$proto2001["m_strFrom"] = "FROM ipbx_conf_grav";
$proto2001["m_strWhere"] = "";
$proto2001["m_strOrderBy"] = "";
$proto2001["m_strTail"] = "";
$proto2002=array();
$proto2002["m_sql"] = "";
$proto2002["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2002["m_column"]=$obj;
$proto2002["m_contained"] = array();
$proto2002["m_strCase"] = "";
$proto2002["m_havingmode"] = "0";
$proto2002["m_inBrackets"] = "0";
$proto2002["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2002);

$proto2001["m_where"] = $obj;
$proto2004=array();
$proto2004["m_sql"] = "";
$proto2004["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2004["m_column"]=$obj;
$proto2004["m_contained"] = array();
$proto2004["m_strCase"] = "";
$proto2004["m_havingmode"] = "0";
$proto2004["m_inBrackets"] = "0";
$proto2004["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2004);

$proto2001["m_having"] = $obj;
$proto2001["m_fieldlist"] = array();
						$proto2006=array();
			$obj = new SQLField(array(
	"m_strName" => "id_conf",
	"m_strTable" => "ipbx_conf_grav"
));

$proto2006["m_expr"]=$obj;
$proto2006["m_alias"] = "";
$obj = new SQLFieldListItem($proto2006);

$proto2001["m_fieldlist"][]=$obj;
						$proto2008=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_reter_grav",
	"m_strTable" => "ipbx_conf_grav"
));

$proto2008["m_expr"]=$obj;
$proto2008["m_alias"] = "";
$obj = new SQLFieldListItem($proto2008);

$proto2001["m_fieldlist"][]=$obj;
						$proto2010=array();
			$obj = new SQLField(array(
	"m_strName" => "pasta",
	"m_strTable" => "ipbx_conf_grav"
));

$proto2010["m_expr"]=$obj;
$proto2010["m_alias"] = "";
$obj = new SQLFieldListItem($proto2010);

$proto2001["m_fieldlist"][]=$obj;
$proto2001["m_fromlist"] = array();
												$proto2012=array();
$proto2012["m_link"] = "SQLL_MAIN";
			$proto2013=array();
$proto2013["m_strName"] = "ipbx_conf_grav";
$proto2013["m_columns"] = array();
$proto2013["m_columns"][] = "id_conf";
$proto2013["m_columns"][] = "tp_reter_grav";
$proto2013["m_columns"][] = "pasta";
$obj = new SQLTable($proto2013);

$proto2012["m_table"] = $obj;
$proto2012["m_alias"] = "";
$proto2014=array();
$proto2014["m_sql"] = "";
$proto2014["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2014["m_column"]=$obj;
$proto2014["m_contained"] = array();
$proto2014["m_strCase"] = "";
$proto2014["m_havingmode"] = "0";
$proto2014["m_inBrackets"] = "0";
$proto2014["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2014);

$proto2012["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2012);

$proto2001["m_fromlist"][]=$obj;
$proto2001["m_groupby"] = array();
$proto2001["m_orderby"] = array();
$obj = new SQLQuery($proto2001);

$queryData_ipbx_conf_grav = $obj;
$tdataipbx_conf_grav[".sqlquery"] = $queryData_ipbx_conf_grav;



?>
