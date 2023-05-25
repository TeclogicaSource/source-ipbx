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










$proto1895=array();
$proto1895["m_strHead"] = "SELECT";
$proto1895["m_strFieldList"] = "id_bkp,   dt_backup,   dsc_backup,   nom_arq";
$proto1895["m_strFrom"] = "FROM ipbx_backup";
$proto1895["m_strWhere"] = "";
$proto1895["m_strOrderBy"] = "";
$proto1895["m_strTail"] = "";
$proto1896=array();
$proto1896["m_sql"] = "";
$proto1896["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1896["m_column"]=$obj;
$proto1896["m_contained"] = array();
$proto1896["m_strCase"] = "";
$proto1896["m_havingmode"] = "0";
$proto1896["m_inBrackets"] = "0";
$proto1896["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1896);

$proto1895["m_where"] = $obj;
$proto1898=array();
$proto1898["m_sql"] = "";
$proto1898["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1898["m_column"]=$obj;
$proto1898["m_contained"] = array();
$proto1898["m_strCase"] = "";
$proto1898["m_havingmode"] = "0";
$proto1898["m_inBrackets"] = "0";
$proto1898["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1898);

$proto1895["m_having"] = $obj;
$proto1895["m_fieldlist"] = array();
						$proto1900=array();
			$obj = new SQLField(array(
	"m_strName" => "id_bkp",
	"m_strTable" => "ipbx_backup"
));

$proto1900["m_expr"]=$obj;
$proto1900["m_alias"] = "";
$obj = new SQLFieldListItem($proto1900);

$proto1895["m_fieldlist"][]=$obj;
						$proto1902=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_backup",
	"m_strTable" => "ipbx_backup"
));

$proto1902["m_expr"]=$obj;
$proto1902["m_alias"] = "";
$obj = new SQLFieldListItem($proto1902);

$proto1895["m_fieldlist"][]=$obj;
						$proto1904=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_backup",
	"m_strTable" => "ipbx_backup"
));

$proto1904["m_expr"]=$obj;
$proto1904["m_alias"] = "";
$obj = new SQLFieldListItem($proto1904);

$proto1895["m_fieldlist"][]=$obj;
						$proto1906=array();
			$obj = new SQLField(array(
	"m_strName" => "nom_arq",
	"m_strTable" => "ipbx_backup"
));

$proto1906["m_expr"]=$obj;
$proto1906["m_alias"] = "";
$obj = new SQLFieldListItem($proto1906);

$proto1895["m_fieldlist"][]=$obj;
$proto1895["m_fromlist"] = array();
												$proto1908=array();
$proto1908["m_link"] = "SQLL_MAIN";
			$proto1909=array();
$proto1909["m_strName"] = "ipbx_backup";
$proto1909["m_columns"] = array();
$proto1909["m_columns"][] = "id_bkp";
$proto1909["m_columns"][] = "dt_backup";
$proto1909["m_columns"][] = "dsc_backup";
$proto1909["m_columns"][] = "nom_arq";
$obj = new SQLTable($proto1909);

$proto1908["m_table"] = $obj;
$proto1908["m_alias"] = "";
$proto1910=array();
$proto1910["m_sql"] = "";
$proto1910["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1910["m_column"]=$obj;
$proto1910["m_contained"] = array();
$proto1910["m_strCase"] = "";
$proto1910["m_havingmode"] = "0";
$proto1910["m_inBrackets"] = "0";
$proto1910["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1910);

$proto1908["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1908);

$proto1895["m_fromlist"][]=$obj;
$proto1895["m_groupby"] = array();
$proto1895["m_orderby"] = array();
$obj = new SQLQuery($proto1895);

$queryData_Restore = $obj;
$tdataRestore[".sqlquery"] = $queryData_Restore;



?>
