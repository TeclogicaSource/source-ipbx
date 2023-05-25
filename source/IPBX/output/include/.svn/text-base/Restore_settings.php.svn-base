<?php

//	field labels
$fieldLabelsRestore = array();
$fieldLabelsRestore["Portuguese(Brazil)"]=array();
$fieldLabelsRestore["Portuguese(Brazil)"]["id_bkp"] = "Identificação";
$fieldLabelsRestore["Portuguese(Brazil)"]["dt_backup"] = "Data";
$fieldLabelsRestore["Portuguese(Brazil)"]["dsc_backup"] = "Descrição Backup";
$fieldLabelsRestore["Portuguese(Brazil)"]["nom_arq"] = " Nome do arquivo";


$tdataRestore=array();
	$tdataRestore[".NumberOfChars"]=80; 
	$tdataRestore[".ShortName"]="Restore";
	$tdataRestore[".OwnerID"]="";
	$tdataRestore[".OriginalTable"]="ipbx_backup";
	$tdataRestore[".NCSearch"]=true;
	

$tdataRestore[".shortTableName"] = "Restore";
$tdataRestore[".dataSourceTable"] = "Restore";
$tdataRestore[".nSecOptions"] = 0;
$tdataRestore[".nLoginMethod"] = 1;
$tdataRestore[".recsPerRowList"] = 1;	
$tdataRestore[".tableGroupBy"] = "0";
$tdataRestore[".dbType"] = 0;
$tdataRestore[".mainTableOwnerID"] = "";
$tdataRestore[".moveNext"] = 1;

$tdataRestore[".listAjax"] = true;

	$tdataRestore[".audit"] = true;

	$tdataRestore[".locking"] = false;
	
$tdataRestore[".listIcons"] = true;
$tdataRestore[".edit"] = true;



$tdataRestore[".delete"] = true;

$tdataRestore[".showSimpleSearchOptions"] = false;

$tdataRestore[".showSearchPanel"] = true;


$tdataRestore[".isUseAjaxSuggest"] = true;

$tdataRestore[".rowHighlite"] = true;

$tdataRestore[".delFile"] = true;

// button handlers file names
$tdataRestore[".buttonHandlers_list"][] = "buttonevent_Restaurar_Backup";

// start on load js handlers








// end on load js handlers



$tdataRestore[".arrKeyFields"][] = "id_bkp";

// use datepicker for search panel
$tdataRestore[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRestore[".isUseTimeForSearch"] = false;






$tdataRestore[".isUseInlineJs"] = $tdataRestore[".isUseInlineAdd"] || $tdataRestore[".isUseInlineEdit"];

$tdataRestore[".allSearchFields"] = array();

$tdataRestore[".globSearchFields"][] = "dsc_backup";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_backup", $tdataRestore[".allSearchFields"]))
{
	$tdataRestore[".allSearchFields"][] = "dsc_backup";	
}


$tdataRestore[".isDynamicPerm"] = true;

	

$tdataRestore[".isDisplayLoading"] = true;

$tdataRestore[".isResizeColumns"] = false;


$tdataRestore[".createLoginPage"] = true;


 	




$tdataRestore[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRestore[".strOrderBy"] = $gstrOrderBy;
	
$tdataRestore[".orderindexes"] = array();

$tdataRestore[".sqlHead"] = "SELECT id_bkp,   dt_backup,   dsc_backup,   nom_arq";

$tdataRestore[".sqlFrom"] = "FROM ipbx_backup";

$tdataRestore[".sqlWhereExpr"] = "";

$tdataRestore[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_bkp";
	$tdataRestore[".Keys"]=$tableKeys;

	
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
			
											$tdataRestore["id_bkp"]=$fdata;
	
//	dt_backup
	$fdata = array();
	$fdata["strName"] = "dt_backup";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 135;
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
			$tdataRestore["dt_backup"]=$fdata;
	
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
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataRestore["dsc_backup"]=$fdata;
	
//	nom_arq
	$fdata = array();
	$fdata["strName"] = "nom_arq";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]=" Nome do arquivo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "nom_arq";
		$fdata["FullName"]= "nom_arq";
					$fdata["UploadFolder"]="/ipbxbackup/"; 
		$fdata["Absolute"] = true;
	$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataRestore["nom_arq"]=$fdata;

	
$tables_data["Restore"]=&$tdataRestore;
$field_labels["Restore"] = &$fieldLabelsRestore;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Restore"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Restore"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2150=array();
$proto2150["m_strHead"] = "SELECT";
$proto2150["m_strFieldList"] = "id_bkp,   dt_backup,   dsc_backup,   nom_arq";
$proto2150["m_strFrom"] = "FROM ipbx_backup";
$proto2150["m_strWhere"] = "";
$proto2150["m_strOrderBy"] = "";
$proto2150["m_strTail"] = "";
$proto2151=array();
$proto2151["m_sql"] = "";
$proto2151["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2151["m_column"]=$obj;
$proto2151["m_contained"] = array();
$proto2151["m_strCase"] = "";
$proto2151["m_havingmode"] = "0";
$proto2151["m_inBrackets"] = "0";
$proto2151["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2151);

$proto2150["m_where"] = $obj;
$proto2153=array();
$proto2153["m_sql"] = "";
$proto2153["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2153["m_column"]=$obj;
$proto2153["m_contained"] = array();
$proto2153["m_strCase"] = "";
$proto2153["m_havingmode"] = "0";
$proto2153["m_inBrackets"] = "0";
$proto2153["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2153);

$proto2150["m_having"] = $obj;
$proto2150["m_fieldlist"] = array();
						$proto2155=array();
			$obj = new SQLField(array(
	"m_strName" => "id_bkp",
	"m_strTable" => "ipbx_backup"
));

$proto2155["m_expr"]=$obj;
$proto2155["m_alias"] = "";
$obj = new SQLFieldListItem($proto2155);

$proto2150["m_fieldlist"][]=$obj;
						$proto2157=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_backup",
	"m_strTable" => "ipbx_backup"
));

$proto2157["m_expr"]=$obj;
$proto2157["m_alias"] = "";
$obj = new SQLFieldListItem($proto2157);

$proto2150["m_fieldlist"][]=$obj;
						$proto2159=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_backup",
	"m_strTable" => "ipbx_backup"
));

$proto2159["m_expr"]=$obj;
$proto2159["m_alias"] = "";
$obj = new SQLFieldListItem($proto2159);

$proto2150["m_fieldlist"][]=$obj;
						$proto2161=array();
			$obj = new SQLField(array(
	"m_strName" => "nom_arq",
	"m_strTable" => "ipbx_backup"
));

$proto2161["m_expr"]=$obj;
$proto2161["m_alias"] = "";
$obj = new SQLFieldListItem($proto2161);

$proto2150["m_fieldlist"][]=$obj;
$proto2150["m_fromlist"] = array();
												$proto2163=array();
$proto2163["m_link"] = "SQLL_MAIN";
			$proto2164=array();
$proto2164["m_strName"] = "ipbx_backup";
$proto2164["m_columns"] = array();
$proto2164["m_columns"][] = "id_bkp";
$proto2164["m_columns"][] = "dt_backup";
$proto2164["m_columns"][] = "dsc_backup";
$proto2164["m_columns"][] = "nom_arq";
$obj = new SQLTable($proto2164);

$proto2163["m_table"] = $obj;
$proto2163["m_alias"] = "";
$proto2165=array();
$proto2165["m_sql"] = "";
$proto2165["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2165["m_column"]=$obj;
$proto2165["m_contained"] = array();
$proto2165["m_strCase"] = "";
$proto2165["m_havingmode"] = "0";
$proto2165["m_inBrackets"] = "0";
$proto2165["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2165);

$proto2163["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2163);

$proto2150["m_fromlist"][]=$obj;
$proto2150["m_groupby"] = array();
$proto2150["m_orderby"] = array();
$obj = new SQLQuery($proto2150);

$queryData_Restore = $obj;
$tdataRestore[".sqlquery"] = $queryData_Restore;



?>
