<?php

//	field labels
$fieldLabelsipbx_backup = array();
$fieldLabelsipbx_backup["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_backup["Portuguese(Brazil)"]["id_bkp"] = "Identificação";
$fieldLabelsipbx_backup["Portuguese(Brazil)"]["dt_backup"] = "Data";
$fieldLabelsipbx_backup["Portuguese(Brazil)"]["dsc_backup"] = "Descrição Backup";
$fieldLabelsipbx_backup["Portuguese(Brazil)"]["nom_arq"] = " Nome do arquivo";


$tdataipbx_backup=array();
	$tdataipbx_backup[".NumberOfChars"]=80; 
	$tdataipbx_backup[".ShortName"]="ipbx_backup";
	$tdataipbx_backup[".OwnerID"]="";
	$tdataipbx_backup[".OriginalTable"]="ipbx_backup";
	$tdataipbx_backup[".NCSearch"]=true;
	

$tdataipbx_backup[".shortTableName"] = "ipbx_backup";
$tdataipbx_backup[".dataSourceTable"] = "ipbx_backup";
$tdataipbx_backup[".nSecOptions"] = 0;
$tdataipbx_backup[".nLoginMethod"] = 1;
$tdataipbx_backup[".recsPerRowList"] = 1;	
$tdataipbx_backup[".tableGroupBy"] = "0";
$tdataipbx_backup[".dbType"] = 0;
$tdataipbx_backup[".mainTableOwnerID"] = "";
$tdataipbx_backup[".moveNext"] = 1;

$tdataipbx_backup[".listAjax"] = true;

	$tdataipbx_backup[".audit"] = true;

	$tdataipbx_backup[".locking"] = false;
	
$tdataipbx_backup[".listIcons"] = true;




$tdataipbx_backup[".showSimpleSearchOptions"] = false;

$tdataipbx_backup[".showSearchPanel"] = true;


$tdataipbx_backup[".isUseAjaxSuggest"] = true;

$tdataipbx_backup[".rowHighlite"] = true;

$tdataipbx_backup[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_backup[".arrKeyFields"][] = "id_bkp";

// use datepicker for search panel
$tdataipbx_backup[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_backup[".isUseTimeForSearch"] = false;






$tdataipbx_backup[".isUseInlineJs"] = $tdataipbx_backup[".isUseInlineAdd"] || $tdataipbx_backup[".isUseInlineEdit"];

$tdataipbx_backup[".allSearchFields"] = array();



$tdataipbx_backup[".isDynamicPerm"] = true;

	

$tdataipbx_backup[".isDisplayLoading"] = true;

$tdataipbx_backup[".isResizeColumns"] = false;


$tdataipbx_backup[".createLoginPage"] = true;


 	




$tdataipbx_backup[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_backup[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_backup[".orderindexes"] = array();

$tdataipbx_backup[".sqlHead"] = "SELECT id_bkp,   dt_backup,   dsc_backup,   nom_arq";

$tdataipbx_backup[".sqlFrom"] = "FROM ipbx_backup";

$tdataipbx_backup[".sqlWhereExpr"] = "";

$tdataipbx_backup[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_bkp";
	$tdataipbx_backup[".Keys"]=$tableKeys;

	
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
			
											$tdataipbx_backup["id_bkp"]=$fdata;
	
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
	
			
											$tdataipbx_backup["dt_backup"]=$fdata;
	
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
	
											$tdataipbx_backup["dsc_backup"]=$fdata;
	
//	nom_arq
	$fdata = array();
	$fdata["strName"] = "nom_arq";
	$fdata["ownerTable"] = "ipbx_backup";
		$fdata["Label"]=" Nome do arquivo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nom_arq";
		$fdata["FullName"]= "nom_arq";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_backup["nom_arq"]=$fdata;

	
$tables_data["ipbx_backup"]=&$tdataipbx_backup;
$field_labels["ipbx_backup"] = &$fieldLabelsipbx_backup;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_backup"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_backup"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1912=array();
$proto1912["m_strHead"] = "SELECT";
$proto1912["m_strFieldList"] = "id_bkp,   dt_backup,   dsc_backup,   nom_arq";
$proto1912["m_strFrom"] = "FROM ipbx_backup";
$proto1912["m_strWhere"] = "";
$proto1912["m_strOrderBy"] = "";
$proto1912["m_strTail"] = "";
$proto1913=array();
$proto1913["m_sql"] = "";
$proto1913["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1913["m_column"]=$obj;
$proto1913["m_contained"] = array();
$proto1913["m_strCase"] = "";
$proto1913["m_havingmode"] = "0";
$proto1913["m_inBrackets"] = "0";
$proto1913["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1913);

$proto1912["m_where"] = $obj;
$proto1915=array();
$proto1915["m_sql"] = "";
$proto1915["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1915["m_column"]=$obj;
$proto1915["m_contained"] = array();
$proto1915["m_strCase"] = "";
$proto1915["m_havingmode"] = "0";
$proto1915["m_inBrackets"] = "0";
$proto1915["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1915);

$proto1912["m_having"] = $obj;
$proto1912["m_fieldlist"] = array();
						$proto1917=array();
			$obj = new SQLField(array(
	"m_strName" => "id_bkp",
	"m_strTable" => "ipbx_backup"
));

$proto1917["m_expr"]=$obj;
$proto1917["m_alias"] = "";
$obj = new SQLFieldListItem($proto1917);

$proto1912["m_fieldlist"][]=$obj;
						$proto1919=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_backup",
	"m_strTable" => "ipbx_backup"
));

$proto1919["m_expr"]=$obj;
$proto1919["m_alias"] = "";
$obj = new SQLFieldListItem($proto1919);

$proto1912["m_fieldlist"][]=$obj;
						$proto1921=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_backup",
	"m_strTable" => "ipbx_backup"
));

$proto1921["m_expr"]=$obj;
$proto1921["m_alias"] = "";
$obj = new SQLFieldListItem($proto1921);

$proto1912["m_fieldlist"][]=$obj;
						$proto1923=array();
			$obj = new SQLField(array(
	"m_strName" => "nom_arq",
	"m_strTable" => "ipbx_backup"
));

$proto1923["m_expr"]=$obj;
$proto1923["m_alias"] = "";
$obj = new SQLFieldListItem($proto1923);

$proto1912["m_fieldlist"][]=$obj;
$proto1912["m_fromlist"] = array();
												$proto1925=array();
$proto1925["m_link"] = "SQLL_MAIN";
			$proto1926=array();
$proto1926["m_strName"] = "ipbx_backup";
$proto1926["m_columns"] = array();
$proto1926["m_columns"][] = "id_bkp";
$proto1926["m_columns"][] = "dt_backup";
$proto1926["m_columns"][] = "dsc_backup";
$proto1926["m_columns"][] = "nom_arq";
$obj = new SQLTable($proto1926);

$proto1925["m_table"] = $obj;
$proto1925["m_alias"] = "";
$proto1927=array();
$proto1927["m_sql"] = "";
$proto1927["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1927["m_column"]=$obj;
$proto1927["m_contained"] = array();
$proto1927["m_strCase"] = "";
$proto1927["m_havingmode"] = "0";
$proto1927["m_inBrackets"] = "0";
$proto1927["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1927);

$proto1925["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1925);

$proto1912["m_fromlist"][]=$obj;
$proto1912["m_groupby"] = array();
$proto1912["m_orderby"] = array();
$obj = new SQLQuery($proto1912);

$queryData_ipbx_backup = $obj;
$tdataipbx_backup[".sqlquery"] = $queryData_ipbx_backup;



?>
