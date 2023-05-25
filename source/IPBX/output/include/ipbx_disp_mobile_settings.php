<?php

//	field labels
$fieldLabelsipbx_disp_mobile = array();
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["id_idm"] = "Identificação dispositivo";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["id_dispositivo"] = "Dispositivo";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["dsc_dispositivo"] = "Descrição do dispositivo";
$fieldLabelsipbx_disp_mobile["Portuguese(Brazil)"]["Telefone"] = "Telefone autorizado";


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

$tdataipbx_disp_mobile[".exportTo"] = true;


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





$tdataipbx_disp_mobile[".isUseInlineAdd"] = true;

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

$tdataipbx_disp_mobile[".sqlHead"] = "SELECT id_idm,   name,   id_dispositivo,   dsc_dispositivo,   Telefone";

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
	
//	Telefone
	$fdata = array();
	$fdata["strName"] = "Telefone";
	$fdata["ownerTable"] = "ipbx_disp_mobile";
		$fdata["Label"]="Telefone autorizado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone";
		$fdata["FullName"]= "Telefone";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_disp_mobile["Telefone"]=$fdata;

	
$tables_data["ipbx_disp_mobile"]=&$tdataipbx_disp_mobile;
$field_labels["ipbx_disp_mobile"] = &$fieldLabelsipbx_disp_mobile;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_disp_mobile"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_disp_mobile"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1662=array();
$proto1662["m_strHead"] = "SELECT";
$proto1662["m_strFieldList"] = "id_idm,   name,   id_dispositivo,   dsc_dispositivo,   Telefone";
$proto1662["m_strFrom"] = "FROM ipbx_disp_mobile";
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
	"m_strName" => "id_idm",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1667["m_expr"]=$obj;
$proto1667["m_alias"] = "";
$obj = new SQLFieldListItem($proto1667);

$proto1662["m_fieldlist"][]=$obj;
						$proto1669=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1669["m_expr"]=$obj;
$proto1669["m_alias"] = "";
$obj = new SQLFieldListItem($proto1669);

$proto1662["m_fieldlist"][]=$obj;
						$proto1671=array();
			$obj = new SQLField(array(
	"m_strName" => "id_dispositivo",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1671["m_expr"]=$obj;
$proto1671["m_alias"] = "";
$obj = new SQLFieldListItem($proto1671);

$proto1662["m_fieldlist"][]=$obj;
						$proto1673=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_dispositivo",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1673["m_expr"]=$obj;
$proto1673["m_alias"] = "";
$obj = new SQLFieldListItem($proto1673);

$proto1662["m_fieldlist"][]=$obj;
						$proto1675=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "ipbx_disp_mobile"
));

$proto1675["m_expr"]=$obj;
$proto1675["m_alias"] = "";
$obj = new SQLFieldListItem($proto1675);

$proto1662["m_fieldlist"][]=$obj;
$proto1662["m_fromlist"] = array();
												$proto1677=array();
$proto1677["m_link"] = "SQLL_MAIN";
			$proto1678=array();
$proto1678["m_strName"] = "ipbx_disp_mobile";
$proto1678["m_columns"] = array();
$proto1678["m_columns"][] = "id_idm";
$proto1678["m_columns"][] = "name";
$proto1678["m_columns"][] = "id_dispositivo";
$proto1678["m_columns"][] = "dsc_dispositivo";
$proto1678["m_columns"][] = "Telefone";
$obj = new SQLTable($proto1678);

$proto1677["m_table"] = $obj;
$proto1677["m_alias"] = "";
$proto1679=array();
$proto1679["m_sql"] = "";
$proto1679["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1679["m_column"]=$obj;
$proto1679["m_contained"] = array();
$proto1679["m_strCase"] = "";
$proto1679["m_havingmode"] = "0";
$proto1679["m_inBrackets"] = "0";
$proto1679["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1679);

$proto1677["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1677);

$proto1662["m_fromlist"][]=$obj;
$proto1662["m_groupby"] = array();
$proto1662["m_orderby"] = array();
$obj = new SQLQuery($proto1662);

$queryData_ipbx_disp_mobile = $obj;
$tdataipbx_disp_mobile[".sqlquery"] = $queryData_ipbx_disp_mobile;



?>
