<?php

//	field labels
$fieldLabelsdiag_ipbx = array();
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]=array();
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["dt_timeout"] = " Data do Timeout";
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["ip_address"] = " Endereço IP";
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["timeout"] = " Timeout";


$tdatadiag_ipbx=array();
	$tdatadiag_ipbx[".NumberOfChars"]=80; 
	$tdatadiag_ipbx[".ShortName"]="diag_ipbx";
	$tdatadiag_ipbx[".OwnerID"]="";
	$tdatadiag_ipbx[".OriginalTable"]="timeout";
	$tdatadiag_ipbx[".NCSearch"]=true;
	

$tdatadiag_ipbx[".shortTableName"] = "diag_ipbx";
$tdatadiag_ipbx[".dataSourceTable"] = "diag_ipbx";
$tdatadiag_ipbx[".nSecOptions"] = 0;
$tdatadiag_ipbx[".nLoginMethod"] = 1;
$tdatadiag_ipbx[".recsPerRowList"] = 1;	
$tdatadiag_ipbx[".tableGroupBy"] = "0";
$tdatadiag_ipbx[".dbType"] = 0;
$tdatadiag_ipbx[".mainTableOwnerID"] = "";
$tdatadiag_ipbx[".moveNext"] = 1;

$tdatadiag_ipbx[".listAjax"] = true;

	$tdatadiag_ipbx[".audit"] = true;

	$tdatadiag_ipbx[".locking"] = false;
	
$tdatadiag_ipbx[".listIcons"] = true;




$tdatadiag_ipbx[".showSimpleSearchOptions"] = false;

$tdatadiag_ipbx[".showSearchPanel"] = true;


$tdatadiag_ipbx[".isUseAjaxSuggest"] = true;

$tdatadiag_ipbx[".rowHighlite"] = true;

$tdatadiag_ipbx[".delFile"] = true;

// button handlers file names
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button1";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button3";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button4";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button7";

// start on load js handlers








// end on load js handlers



$tdatadiag_ipbx[".arrKeyFields"][] = "dt_timeout";

// use datepicker for search panel
$tdatadiag_ipbx[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatadiag_ipbx[".isUseTimeForSearch"] = false;






$tdatadiag_ipbx[".isUseInlineJs"] = $tdatadiag_ipbx[".isUseInlineAdd"] || $tdatadiag_ipbx[".isUseInlineEdit"];

$tdatadiag_ipbx[".allSearchFields"] = array();



$tdatadiag_ipbx[".isDynamicPerm"] = true;

	

$tdatadiag_ipbx[".isDisplayLoading"] = true;

$tdatadiag_ipbx[".isResizeColumns"] = false;


$tdatadiag_ipbx[".createLoginPage"] = true;


 	




$tdatadiag_ipbx[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY dt_timeout DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatadiag_ipbx[".strOrderBy"] = $gstrOrderBy;
	
$tdatadiag_ipbx[".orderindexes"] = array();
$tdatadiag_ipbx[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "dt_timeout");

$tdatadiag_ipbx[".sqlHead"] = "SELECT dt_timeout,  ip_address,  timeout";

$tdatadiag_ipbx[".sqlFrom"] = "FROM timeout";

$tdatadiag_ipbx[".sqlWhereExpr"] = "";

$tdatadiag_ipbx[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="dt_timeout";
	$tdatadiag_ipbx[".Keys"]=$tableKeys;

	
//	dt_timeout
	$fdata = array();
	$fdata["strName"] = "dt_timeout";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Data do Timeout"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_timeout";
		$fdata["FullName"]= "dt_timeout";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["dt_timeout"]=$fdata;
	
//	ip_address
	$fdata = array();
	$fdata["strName"] = "ip_address";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Endereço IP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_address";
		$fdata["FullName"]= "ip_address";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["ip_address"]=$fdata;
	
//	timeout
	$fdata = array();
	$fdata["strName"] = "timeout";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Timeout"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "timeout";
		$fdata["FullName"]= "timeout";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["timeout"]=$fdata;

	
$tables_data["diag_ipbx"]=&$tdatadiag_ipbx;
$field_labels["diag_ipbx"] = &$fieldLabelsdiag_ipbx;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["diag_ipbx"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["diag_ipbx"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1986=array();
$proto1986["m_strHead"] = "SELECT";
$proto1986["m_strFieldList"] = "dt_timeout,  ip_address,  timeout";
$proto1986["m_strFrom"] = "FROM timeout";
$proto1986["m_strWhere"] = "";
$proto1986["m_strOrderBy"] = "ORDER BY dt_timeout DESC";
$proto1986["m_strTail"] = "";
$proto1987=array();
$proto1987["m_sql"] = "";
$proto1987["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1987["m_column"]=$obj;
$proto1987["m_contained"] = array();
$proto1987["m_strCase"] = "";
$proto1987["m_havingmode"] = "0";
$proto1987["m_inBrackets"] = "0";
$proto1987["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1987);

$proto1986["m_where"] = $obj;
$proto1989=array();
$proto1989["m_sql"] = "";
$proto1989["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1989["m_column"]=$obj;
$proto1989["m_contained"] = array();
$proto1989["m_strCase"] = "";
$proto1989["m_havingmode"] = "0";
$proto1989["m_inBrackets"] = "0";
$proto1989["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1989);

$proto1986["m_having"] = $obj;
$proto1986["m_fieldlist"] = array();
						$proto1991=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_timeout",
	"m_strTable" => "timeout"
));

$proto1991["m_expr"]=$obj;
$proto1991["m_alias"] = "";
$obj = new SQLFieldListItem($proto1991);

$proto1986["m_fieldlist"][]=$obj;
						$proto1993=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_address",
	"m_strTable" => "timeout"
));

$proto1993["m_expr"]=$obj;
$proto1993["m_alias"] = "";
$obj = new SQLFieldListItem($proto1993);

$proto1986["m_fieldlist"][]=$obj;
						$proto1995=array();
			$obj = new SQLField(array(
	"m_strName" => "timeout",
	"m_strTable" => "timeout"
));

$proto1995["m_expr"]=$obj;
$proto1995["m_alias"] = "";
$obj = new SQLFieldListItem($proto1995);

$proto1986["m_fieldlist"][]=$obj;
$proto1986["m_fromlist"] = array();
												$proto1997=array();
$proto1997["m_link"] = "SQLL_MAIN";
			$proto1998=array();
$proto1998["m_strName"] = "timeout";
$proto1998["m_columns"] = array();
$proto1998["m_columns"][] = "dt_timeout";
$proto1998["m_columns"][] = "ip_address";
$proto1998["m_columns"][] = "timeout";
$obj = new SQLTable($proto1998);

$proto1997["m_table"] = $obj;
$proto1997["m_alias"] = "";
$proto1999=array();
$proto1999["m_sql"] = "";
$proto1999["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1999["m_column"]=$obj;
$proto1999["m_contained"] = array();
$proto1999["m_strCase"] = "";
$proto1999["m_havingmode"] = "0";
$proto1999["m_inBrackets"] = "0";
$proto1999["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1999);

$proto1997["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1997);

$proto1986["m_fromlist"][]=$obj;
$proto1986["m_groupby"] = array();
$proto1986["m_orderby"] = array();
												$proto2001=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_timeout",
	"m_strTable" => "timeout"
));

$proto2001["m_column"]=$obj;
$proto2001["m_bAsc"] = 0;
$proto2001["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto2001);

$proto1986["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1986);

$queryData_diag_ipbx = $obj;
$tdatadiag_ipbx[".sqlquery"] = $queryData_diag_ipbx;



?>
