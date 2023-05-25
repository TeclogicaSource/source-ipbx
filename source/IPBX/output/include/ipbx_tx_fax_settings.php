<?php

//	field labels
$fieldLabelsipbx_tx_fax = array();
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]["id_tx_fax"] = "Identificação";
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]["nm_telefone"] = "Telefone de envio";
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]["dt_fax"] = "Data";
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]["status"] = "Status";
$fieldLabelsipbx_tx_fax["Portuguese(Brazil)"]["arq_fax"] = "Arquivo de fax";


$tdataipbx_tx_fax=array();
	$tdataipbx_tx_fax[".NumberOfChars"]=80; 
	$tdataipbx_tx_fax[".ShortName"]="ipbx_tx_fax";
	$tdataipbx_tx_fax[".OwnerID"]="";
	$tdataipbx_tx_fax[".OriginalTable"]="ipbx_tx_fax";
	$tdataipbx_tx_fax[".NCSearch"]=true;
	

$tdataipbx_tx_fax[".shortTableName"] = "ipbx_tx_fax";
$tdataipbx_tx_fax[".dataSourceTable"] = "ipbx_tx_fax";
$tdataipbx_tx_fax[".nSecOptions"] = 0;
$tdataipbx_tx_fax[".nLoginMethod"] = 1;
$tdataipbx_tx_fax[".recsPerRowList"] = 1;	
$tdataipbx_tx_fax[".tableGroupBy"] = "0";
$tdataipbx_tx_fax[".dbType"] = 0;
$tdataipbx_tx_fax[".mainTableOwnerID"] = "";
$tdataipbx_tx_fax[".moveNext"] = 1;

$tdataipbx_tx_fax[".listAjax"] = true;

	$tdataipbx_tx_fax[".audit"] = true;

	$tdataipbx_tx_fax[".locking"] = false;
	
$tdataipbx_tx_fax[".listIcons"] = true;



$tdataipbx_tx_fax[".delete"] = true;

$tdataipbx_tx_fax[".showSimpleSearchOptions"] = false;

$tdataipbx_tx_fax[".showSearchPanel"] = true;


$tdataipbx_tx_fax[".isUseAjaxSuggest"] = true;

$tdataipbx_tx_fax[".rowHighlite"] = true;

$tdataipbx_tx_fax[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_tx_fax[".arrKeyFields"][] = "id_tx_fax";

// use datepicker for search panel
$tdataipbx_tx_fax[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataipbx_tx_fax[".isUseTimeForSearch"] = false;






$tdataipbx_tx_fax[".isUseInlineJs"] = $tdataipbx_tx_fax[".isUseInlineAdd"] || $tdataipbx_tx_fax[".isUseInlineEdit"];

$tdataipbx_tx_fax[".allSearchFields"] = array();



$tdataipbx_tx_fax[".isDynamicPerm"] = true;

	

$tdataipbx_tx_fax[".isDisplayLoading"] = true;

$tdataipbx_tx_fax[".isResizeColumns"] = false;


$tdataipbx_tx_fax[".createLoginPage"] = true;


 	




$tdataipbx_tx_fax[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_tx_fax[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_tx_fax[".orderindexes"] = array();

$tdataipbx_tx_fax[".sqlHead"] = "SELECT id_tx_fax,   nm_telefone,   dt_fax,   status,   arq_fax";

$tdataipbx_tx_fax[".sqlFrom"] = "FROM ipbx_tx_fax";

$tdataipbx_tx_fax[".sqlWhereExpr"] = "";

$tdataipbx_tx_fax[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_tx_fax";
	$tdataipbx_tx_fax[".Keys"]=$tableKeys;

	
//	id_tx_fax
	$fdata = array();
	$fdata["strName"] = "id_tx_fax";
	$fdata["ownerTable"] = "ipbx_tx_fax";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tx_fax";
		$fdata["FullName"]= "id_tx_fax";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_tx_fax["id_tx_fax"]=$fdata;
	
//	nm_telefone
	$fdata = array();
	$fdata["strName"] = "nm_telefone";
	$fdata["ownerTable"] = "ipbx_tx_fax";
		$fdata["Label"]="Telefone de envio"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_telefone";
		$fdata["FullName"]= "nm_telefone";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_tx_fax["nm_telefone"]=$fdata;
	
//	dt_fax
	$fdata = array();
	$fdata["strName"] = "dt_fax";
	$fdata["ownerTable"] = "ipbx_tx_fax";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_fax";
		$fdata["FullName"]= "dt_fax";
						$fdata["Index"]= 3;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_tx_fax["dt_fax"]=$fdata;
	
//	status
	$fdata = array();
	$fdata["strName"] = "status";
	$fdata["ownerTable"] = "ipbx_tx_fax";
		$fdata["Label"]="Status"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "status";
		$fdata["FullName"]= "status";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_tx_fax["status"]=$fdata;
	
//	arq_fax
	$fdata = array();
	$fdata["strName"] = "arq_fax";
	$fdata["ownerTable"] = "ipbx_tx_fax";
		$fdata["Label"]="Arquivo de fax"; 
			$fdata["LinkPrefix"]="fax/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "arq_fax";
		$fdata["FullName"]= "arq_fax";
					$fdata["UploadFolder"]="fax"; 
		$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_tx_fax["arq_fax"]=$fdata;

	
$tables_data["ipbx_tx_fax"]=&$tdataipbx_tx_fax;
$field_labels["ipbx_tx_fax"] = &$fieldLabelsipbx_tx_fax;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_tx_fax"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_tx_fax"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2214=array();
$proto2214["m_strHead"] = "SELECT";
$proto2214["m_strFieldList"] = "id_tx_fax,   nm_telefone,   dt_fax,   status,   arq_fax";
$proto2214["m_strFrom"] = "FROM ipbx_tx_fax";
$proto2214["m_strWhere"] = "";
$proto2214["m_strOrderBy"] = "";
$proto2214["m_strTail"] = "";
$proto2215=array();
$proto2215["m_sql"] = "";
$proto2215["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2215["m_column"]=$obj;
$proto2215["m_contained"] = array();
$proto2215["m_strCase"] = "";
$proto2215["m_havingmode"] = "0";
$proto2215["m_inBrackets"] = "0";
$proto2215["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2215);

$proto2214["m_where"] = $obj;
$proto2217=array();
$proto2217["m_sql"] = "";
$proto2217["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2217["m_column"]=$obj;
$proto2217["m_contained"] = array();
$proto2217["m_strCase"] = "";
$proto2217["m_havingmode"] = "0";
$proto2217["m_inBrackets"] = "0";
$proto2217["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2217);

$proto2214["m_having"] = $obj;
$proto2214["m_fieldlist"] = array();
						$proto2219=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tx_fax",
	"m_strTable" => "ipbx_tx_fax"
));

$proto2219["m_expr"]=$obj;
$proto2219["m_alias"] = "";
$obj = new SQLFieldListItem($proto2219);

$proto2214["m_fieldlist"][]=$obj;
						$proto2221=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_telefone",
	"m_strTable" => "ipbx_tx_fax"
));

$proto2221["m_expr"]=$obj;
$proto2221["m_alias"] = "";
$obj = new SQLFieldListItem($proto2221);

$proto2214["m_fieldlist"][]=$obj;
						$proto2223=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_fax",
	"m_strTable" => "ipbx_tx_fax"
));

$proto2223["m_expr"]=$obj;
$proto2223["m_alias"] = "";
$obj = new SQLFieldListItem($proto2223);

$proto2214["m_fieldlist"][]=$obj;
						$proto2225=array();
			$obj = new SQLField(array(
	"m_strName" => "status",
	"m_strTable" => "ipbx_tx_fax"
));

$proto2225["m_expr"]=$obj;
$proto2225["m_alias"] = "";
$obj = new SQLFieldListItem($proto2225);

$proto2214["m_fieldlist"][]=$obj;
						$proto2227=array();
			$obj = new SQLField(array(
	"m_strName" => "arq_fax",
	"m_strTable" => "ipbx_tx_fax"
));

$proto2227["m_expr"]=$obj;
$proto2227["m_alias"] = "";
$obj = new SQLFieldListItem($proto2227);

$proto2214["m_fieldlist"][]=$obj;
$proto2214["m_fromlist"] = array();
												$proto2229=array();
$proto2229["m_link"] = "SQLL_MAIN";
			$proto2230=array();
$proto2230["m_strName"] = "ipbx_tx_fax";
$proto2230["m_columns"] = array();
$proto2230["m_columns"][] = "id_tx_fax";
$proto2230["m_columns"][] = "nm_telefone";
$proto2230["m_columns"][] = "dt_fax";
$proto2230["m_columns"][] = "status";
$proto2230["m_columns"][] = "arq_fax";
$obj = new SQLTable($proto2230);

$proto2229["m_table"] = $obj;
$proto2229["m_alias"] = "";
$proto2231=array();
$proto2231["m_sql"] = "";
$proto2231["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2231["m_column"]=$obj;
$proto2231["m_contained"] = array();
$proto2231["m_strCase"] = "";
$proto2231["m_havingmode"] = "0";
$proto2231["m_inBrackets"] = "0";
$proto2231["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2231);

$proto2229["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2229);

$proto2214["m_fromlist"][]=$obj;
$proto2214["m_groupby"] = array();
$proto2214["m_orderby"] = array();
$obj = new SQLQuery($proto2214);

$queryData_ipbx_tx_fax = $obj;
$tdataipbx_tx_fax[".sqlquery"] = $queryData_ipbx_tx_fax;



?>
