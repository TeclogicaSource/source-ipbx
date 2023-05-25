<?php

//	field labels
$fieldLabelsipbx_disp_mobile = array();
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["id_idm"] = "Identificação dispositivo";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["id_dispositivo"] = "Dispositivo";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["dsc_dispositivo"] = "Descrição do dispositivo";


$tdataipbx_disp_mobile=array();
	$tdataipbx_disp_mobile[".NumberOfChars"]=80; 
	$tdataipbx_disp_mobile[".ShortName"]="ipbx_disp_mobile";
	$tdataipbx_disp_mobile[".OwnerID"]="";
	$tdataipbx_disp_mobile[".OriginalTable"]="ipbx_disp_mobile";
	$tdataipbx_disp_mobile[".NCSearch"]=true;
	

$tdataipbx_disp_mobile[".shortTableName"] = "ipbx_disp_mobile";
$tdataipbx_disp_mobile[".dataSourceTable"] = "ipbx_disp_mobile";
$tdataipbx_disp_mobile[".nSecOptions"] = 0;
$tdataipbx_disp_mobile[".nLoginMethod"] = 1;
$tdataipbx_disp_mobile[".recsPerRowList"] = 1;	
$tdataipbx_disp_mobile[".tableGroupBy"] = "0";
$tdataipbx_disp_mobile[".dbType"] = 0;
$tdataipbx_disp_mobile[".mainTableOwnerID"] = "";
$tdataipbx_disp_mobile[".moveNext"] = 1;

$tdataipbx_disp_mobile[".listAjax"] = false;

	$tdataipbx_disp_mobile[".audit"] = true;

	$tdataipbx_disp_mobile[".locking"] = false;
	
$tdataipbx_disp_mobile[".listIcons"] = true;
$tdataipbx_disp_mobile[".inlineEdit"] = true;



$tdataipbx_disp_mobile[".delete"] = true;

$tdataipbx_disp_mobile[".showSimpleSearchOptions"] = false;

$tdataipbx_disp_mobile[".showSearchPanel"] = true;


$tdataipbx_disp_mobile[".isUseAjaxSuggest"] = true;

$tdataipbx_disp_mobile[".rowHighlite"] = true;

$tdataipbx_disp_mobile[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_disp_mobile[".arrKeyFields"][] = "id_idm";

// use datepicker for search panel
$tdataipbx_disp_mobile[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_disp_mobile[".isUseTimeForSearch"] = false;






$tdataipbx_disp_mobile[".isUseInlineEdit"] = true;
$tdataipbx_disp_mobile[".isUseInlineJs"] = $tdataipbx_disp_mobile[".isUseInlineAdd"] || $tdataipbx_disp_mobile[".isUseInlineEdit"];

$tdataipbx_disp_mobile[".allSearchFields"] = array();



$tdataipbx_disp_mobile[".isDynamicPerm"] = true;

	

$tdataipbx_disp_mobile[".isDisplayLoading"] = true;

$tdataipbx_disp_mobile[".isResizeColumns"] = false;


$tdataipbx_disp_mobile[".createLoginPage"] = true;


 	




$tdataipbx_disp_mobile[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_disp_mobile[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_disp_mobile[".orderindexes"] = array();

$tdataipbx_disp_mobile[".sqlHead"] = "SELECT id_idm,   name,   id_dispositivo,   dsc_dispositivo";

$tdataipbx_disp_mobile[".sqlFrom"] = "FROM ipbx_disp_mobile";

$tdataipbx_disp_mobile[".sqlWhereExpr"] = "";

$tdataipbx_disp_mobile[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_idm";
	$tdataipbx_disp_mobile[".Keys"]=$tableKeys;

	
//	id_idm
	$fdata = array();
	$fdata["strName"] = "id_idm";
	$fdata["ownerTable"] = "ipbx_disp_mobile";
		$fdata["Label"]="Identificação dispositivo"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_idm";
		$fdata["FullName"]= "id_idm";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_disp_mobile["id_idm"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "ipbx_disp_mobile";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,' - ',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "callerid <> '' and tp_ramal = 'RAMAL'";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_disp_mobile["name"]=$fdata;
	
//	id_dispositivo
	$fdata = array();
	$fdata["strName"] = "id_dispositivo";
	$fdata["ownerTable"] = "ipbx_disp_mobile";
		$fdata["Label"]="Dispositivo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_dispositivo";
		$fdata["FullName"]= "id_dispositivo";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_disp_mobile["id_dispositivo"]=$fdata;
	
//	dsc_dispositivo
	$fdata = array();
	$fdata["strName"] = "dsc_dispositivo";
	$fdata["ownerTable"] = "ipbx_disp_mobile";
		$fdata["Label"]="Descrição do dispositivo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_dispositivo";
		$fdata["FullName"]= "dsc_dispositivo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=40";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_disp_mobile["dsc_dispositivo"]=$fdata;

	
$tables_data["ipbx_disp_mobile"]=&$tdataipbx_disp_mobile;
$field_labels["ipbx_disp_mobile"] = &$fieldLabelsipbx_disp_mobile;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_disp_mobile"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_disp_mobile"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1409=array();
$proto1409["m_strHead"] = "SELECT";
$proto1409["m_strFieldList"] = "id_idm,   name,   id_dispositivo,   dsc_dispositivo";
$proto1409["m_strFrom"] = "FROM ipbx_disp_mobile";
$proto1409["m_strWhere"] = "";
$proto1409["m_strOrderBy"] = "";
$proto1409["m_strTail"] = "";
$proto1410=array();
$proto1410["m_sql"] = "";
$proto1410["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1410["m_column"]=$obj;
$proto1410["m_contained"] = array();
$proto1410["m_strCase"] = "";
$proto1410["m_havingmode"] = "0";
$proto1410["m_inBrackets"] = "0";
$proto1410["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1410);

$proto1409["m_where"] = $obj;
$proto1412=array();
$proto1412["m_sql"] = "";
$proto1412["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1412["m_column"]=$obj;
$proto1412["m_contained"] = array();
$proto1412["m_strCase"] = "";
$proto1412["m_havingmode"] = "0";
$proto1412["m_inBrackets"] = "0";
$proto1412["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1412);

$proto1409["m_having"] = $obj;
$proto1409["m_fieldlist"] = array();
						$proto1414=array();
			$obj = new SQLField(array(
	"m_strName" => "id_idm",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1414["m_expr"]=$obj;
$proto1414["m_alias"] = "";
$obj = new SQLFieldListItem($proto1414);

$proto1409["m_fieldlist"][]=$obj;
						$proto1416=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1416["m_expr"]=$obj;
$proto1416["m_alias"] = "";
$obj = new SQLFieldListItem($proto1416);

$proto1409["m_fieldlist"][]=$obj;
						$proto1418=array();
			$obj = new SQLField(array(
	"m_strName" => "id_dispositivo",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1418["m_expr"]=$obj;
$proto1418["m_alias"] = "";
$obj = new SQLFieldListItem($proto1418);

$proto1409["m_fieldlist"][]=$obj;
						$proto1420=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_dispositivo",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1420["m_expr"]=$obj;
$proto1420["m_alias"] = "";
$obj = new SQLFieldListItem($proto1420);

$proto1409["m_fieldlist"][]=$obj;
$proto1409["m_fromlist"] = array();
												$proto1422=array();
$proto1422["m_link"] = "SQLL_MAIN";
			$proto1423=array();
$proto1423["m_strName"] = "ipbx_disp_mobile";
$proto1423["m_columns"] = array();
$proto1423["m_columns"][] = "id_idm";
$proto1423["m_columns"][] = "name";
$proto1423["m_columns"][] = "id_dispositivo";
$proto1423["m_columns"][] = "dsc_dispositivo";
$obj = new SQLTable($proto1423);

$proto1422["m_table"] = $obj;
$proto1422["m_alias"] = "";
$proto1424=array();
$proto1424["m_sql"] = "";
$proto1424["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1424["m_column"]=$obj;
$proto1424["m_contained"] = array();
$proto1424["m_strCase"] = "";
$proto1424["m_havingmode"] = "0";
$proto1424["m_inBrackets"] = "0";
$proto1424["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1424);

$proto1422["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1422);

$proto1409["m_fromlist"][]=$obj;
$proto1409["m_groupby"] = array();
$proto1409["m_orderby"] = array();
$obj = new SQLQuery($proto1409);

$queryData_ipbx_disp_mobile = $obj;
$tdataipbx_disp_mobile[".sqlquery"] = $queryData_ipbx_disp_mobile;



?>
