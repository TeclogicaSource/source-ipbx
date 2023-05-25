<?php

//	field labels
$fieldLabelsVONO = array();
$fieldLabelsVONO["Portuguese(Brazil)"]=array();
$fieldLabelsVONO["Portuguese(Brazil)"]["id_vono"] = "Id Vono";
$fieldLabelsVONO["Portuguese(Brazil)"]["CODLOCALIDADE"] = "CODLOCALIDADE";
$fieldLabelsVONO["Portuguese(Brazil)"]["LOCALIDADE"] = "LOCALIDADE";
$fieldLabelsVONO["Portuguese(Brazil)"]["MUNICIPIO"] = "MUNICIPIO";
$fieldLabelsVONO["Portuguese(Brazil)"]["ESTADO"] = "ESTADO";
$fieldLabelsVONO["Portuguese(Brazil)"]["PREFIXO"] = "PREFIXO";


$tdataVONO=array();
	$tdataVONO[".NumberOfChars"]=80; 
	$tdataVONO[".ShortName"]="VONO";
	$tdataVONO[".OwnerID"]="";
	$tdataVONO[".OriginalTable"]="VONO";
	$tdataVONO[".NCSearch"]=true;
	

$tdataVONO[".shortTableName"] = "VONO";
$tdataVONO[".dataSourceTable"] = "VONO";
$tdataVONO[".nSecOptions"] = 0;
$tdataVONO[".nLoginMethod"] = 1;
$tdataVONO[".recsPerRowList"] = 1;	
$tdataVONO[".tableGroupBy"] = "0";
$tdataVONO[".dbType"] = 0;
$tdataVONO[".mainTableOwnerID"] = "";
$tdataVONO[".moveNext"] = 1;

$tdataVONO[".listAjax"] = true;

	$tdataVONO[".audit"] = true;

	$tdataVONO[".locking"] = false;
	
$tdataVONO[".listIcons"] = true;

$tdataVONO[".exportTo"] = true;



$tdataVONO[".showSimpleSearchOptions"] = false;

$tdataVONO[".showSearchPanel"] = true;


$tdataVONO[".isUseAjaxSuggest"] = true;

$tdataVONO[".rowHighlite"] = true;

$tdataVONO[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataVONO[".arrKeyFields"][] = "id_vono";

// use datepicker for search panel
$tdataVONO[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataVONO[".isUseTimeForSearch"] = false;






$tdataVONO[".isUseInlineJs"] = $tdataVONO[".isUseInlineAdd"] || $tdataVONO[".isUseInlineEdit"];

$tdataVONO[".allSearchFields"] = array();



$tdataVONO[".isDynamicPerm"] = true;

	

$tdataVONO[".isDisplayLoading"] = true;

$tdataVONO[".isResizeColumns"] = false;


$tdataVONO[".createLoginPage"] = true;


 	




$tdataVONO[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataVONO[".strOrderBy"] = $gstrOrderBy;
	
$tdataVONO[".orderindexes"] = array();

$tdataVONO[".sqlHead"] = "SELECT id_vono,   CODLOCALIDADE,   LOCALIDADE,   MUNICIPIO,   ESTADO,   PREFIXO";

$tdataVONO[".sqlFrom"] = "FROM VONO";

$tdataVONO[".sqlWhereExpr"] = "";

$tdataVONO[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_vono";
	$tdataVONO[".Keys"]=$tableKeys;

	
//	id_vono
	$fdata = array();
	$fdata["strName"] = "id_vono";
	$fdata["ownerTable"] = "VONO";
		$fdata["Label"]="Id Vono"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_vono";
		$fdata["FullName"]= "id_vono";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataVONO["id_vono"]=$fdata;
	
//	CODLOCALIDADE
	$fdata = array();
	$fdata["strName"] = "CODLOCALIDADE";
	$fdata["ownerTable"] = "VONO";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "CODLOCALIDADE";
		$fdata["FullName"]= "CODLOCALIDADE";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataVONO["CODLOCALIDADE"]=$fdata;
	
//	LOCALIDADE
	$fdata = array();
	$fdata["strName"] = "LOCALIDADE";
	$fdata["ownerTable"] = "VONO";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "LOCALIDADE";
		$fdata["FullName"]= "LOCALIDADE";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataVONO["LOCALIDADE"]=$fdata;
	
//	MUNICIPIO
	$fdata = array();
	$fdata["strName"] = "MUNICIPIO";
	$fdata["ownerTable"] = "VONO";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "MUNICIPIO";
		$fdata["FullName"]= "MUNICIPIO";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataVONO["MUNICIPIO"]=$fdata;
	
//	ESTADO
	$fdata = array();
	$fdata["strName"] = "ESTADO";
	$fdata["ownerTable"] = "VONO";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ESTADO";
		$fdata["FullName"]= "ESTADO";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataVONO["ESTADO"]=$fdata;
	
//	PREFIXO
	$fdata = array();
	$fdata["strName"] = "PREFIXO";
	$fdata["ownerTable"] = "VONO";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "PREFIXO";
		$fdata["FullName"]= "PREFIXO";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataVONO["PREFIXO"]=$fdata;

	
$tables_data["VONO"]=&$tdataVONO;
$field_labels["VONO"] = &$fieldLabelsVONO;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["VONO"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["VONO"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3275=array();
$proto3275["m_strHead"] = "SELECT";
$proto3275["m_strFieldList"] = "id_vono,   CODLOCALIDADE,   LOCALIDADE,   MUNICIPIO,   ESTADO,   PREFIXO";
$proto3275["m_strFrom"] = "FROM VONO";
$proto3275["m_strWhere"] = "";
$proto3275["m_strOrderBy"] = "";
$proto3275["m_strTail"] = "";
$proto3276=array();
$proto3276["m_sql"] = "";
$proto3276["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3276["m_column"]=$obj;
$proto3276["m_contained"] = array();
$proto3276["m_strCase"] = "";
$proto3276["m_havingmode"] = "0";
$proto3276["m_inBrackets"] = "0";
$proto3276["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3276);

$proto3275["m_where"] = $obj;
$proto3278=array();
$proto3278["m_sql"] = "";
$proto3278["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3278["m_column"]=$obj;
$proto3278["m_contained"] = array();
$proto3278["m_strCase"] = "";
$proto3278["m_havingmode"] = "0";
$proto3278["m_inBrackets"] = "0";
$proto3278["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3278);

$proto3275["m_having"] = $obj;
$proto3275["m_fieldlist"] = array();
						$proto3280=array();
			$obj = new SQLField(array(
	"m_strName" => "id_vono",
	"m_strTable" => "VONO"
));

$proto3280["m_expr"]=$obj;
$proto3280["m_alias"] = "";
$obj = new SQLFieldListItem($proto3280);

$proto3275["m_fieldlist"][]=$obj;
						$proto3282=array();
			$obj = new SQLField(array(
	"m_strName" => "CODLOCALIDADE",
	"m_strTable" => "VONO"
));

$proto3282["m_expr"]=$obj;
$proto3282["m_alias"] = "";
$obj = new SQLFieldListItem($proto3282);

$proto3275["m_fieldlist"][]=$obj;
						$proto3284=array();
			$obj = new SQLField(array(
	"m_strName" => "LOCALIDADE",
	"m_strTable" => "VONO"
));

$proto3284["m_expr"]=$obj;
$proto3284["m_alias"] = "";
$obj = new SQLFieldListItem($proto3284);

$proto3275["m_fieldlist"][]=$obj;
						$proto3286=array();
			$obj = new SQLField(array(
	"m_strName" => "MUNICIPIO",
	"m_strTable" => "VONO"
));

$proto3286["m_expr"]=$obj;
$proto3286["m_alias"] = "";
$obj = new SQLFieldListItem($proto3286);

$proto3275["m_fieldlist"][]=$obj;
						$proto3288=array();
			$obj = new SQLField(array(
	"m_strName" => "ESTADO",
	"m_strTable" => "VONO"
));

$proto3288["m_expr"]=$obj;
$proto3288["m_alias"] = "";
$obj = new SQLFieldListItem($proto3288);

$proto3275["m_fieldlist"][]=$obj;
						$proto3290=array();
			$obj = new SQLField(array(
	"m_strName" => "PREFIXO",
	"m_strTable" => "VONO"
));

$proto3290["m_expr"]=$obj;
$proto3290["m_alias"] = "";
$obj = new SQLFieldListItem($proto3290);

$proto3275["m_fieldlist"][]=$obj;
$proto3275["m_fromlist"] = array();
												$proto3292=array();
$proto3292["m_link"] = "SQLL_MAIN";
			$proto3293=array();
$proto3293["m_strName"] = "VONO";
$proto3293["m_columns"] = array();
$proto3293["m_columns"][] = "id_vono";
$proto3293["m_columns"][] = "CODLOCALIDADE";
$proto3293["m_columns"][] = "LOCALIDADE";
$proto3293["m_columns"][] = "MUNICIPIO";
$proto3293["m_columns"][] = "ESTADO";
$proto3293["m_columns"][] = "PREFIXO";
$obj = new SQLTable($proto3293);

$proto3292["m_table"] = $obj;
$proto3292["m_alias"] = "";
$proto3294=array();
$proto3294["m_sql"] = "";
$proto3294["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3294["m_column"]=$obj;
$proto3294["m_contained"] = array();
$proto3294["m_strCase"] = "";
$proto3294["m_havingmode"] = "0";
$proto3294["m_inBrackets"] = "0";
$proto3294["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3294);

$proto3292["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3292);

$proto3275["m_fromlist"][]=$obj;
$proto3275["m_groupby"] = array();
$proto3275["m_orderby"] = array();
$obj = new SQLQuery($proto3275);

$queryData_VONO = $obj;
$tdataVONO[".sqlquery"] = $queryData_VONO;



?>
