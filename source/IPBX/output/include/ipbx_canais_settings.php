<?php

//	field labels
$fieldLabelsipbx_canais = array();
$fieldLabelsipbx_canais["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["id_canal"] = "Canal";
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["canal"] = "Canal";
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["dsc_interf"] = "Descrição Canal";
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["rdz_interf"] = "Rdz Interf";
$fieldLabelsipbx_canais["Portuguese(Brazil)"]["flg_disp"] = "Flg Disp";


$tdataipbx_canais=array();
	$tdataipbx_canais[".NumberOfChars"]=80; 
	$tdataipbx_canais[".ShortName"]="ipbx_canais";
	$tdataipbx_canais[".OwnerID"]="";
	$tdataipbx_canais[".OriginalTable"]="ipbx_canais";
	$tdataipbx_canais[".NCSearch"]=true;
	

$tdataipbx_canais[".shortTableName"] = "ipbx_canais";
$tdataipbx_canais[".dataSourceTable"] = "ipbx_canais";
$tdataipbx_canais[".nSecOptions"] = 0;
$tdataipbx_canais[".nLoginMethod"] = 1;
$tdataipbx_canais[".recsPerRowList"] = 1;	
$tdataipbx_canais[".tableGroupBy"] = "0";
$tdataipbx_canais[".dbType"] = 0;
$tdataipbx_canais[".mainTableOwnerID"] = "";
$tdataipbx_canais[".moveNext"] = 1;

$tdataipbx_canais[".listAjax"] = true;

	$tdataipbx_canais[".audit"] = true;

	$tdataipbx_canais[".locking"] = false;
	
$tdataipbx_canais[".listIcons"] = true;
$tdataipbx_canais[".inlineEdit"] = true;



$tdataipbx_canais[".delete"] = true;

$tdataipbx_canais[".showSimpleSearchOptions"] = false;

$tdataipbx_canais[".showSearchPanel"] = true;


$tdataipbx_canais[".isUseAjaxSuggest"] = true;

$tdataipbx_canais[".rowHighlite"] = true;

$tdataipbx_canais[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_canais[".arrKeyFields"][] = "id_canal";

// use datepicker for search panel
$tdataipbx_canais[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataipbx_canais[".isUseTimeForSearch"] = false;






$tdataipbx_canais[".isUseInlineEdit"] = true;
$tdataipbx_canais[".isUseInlineJs"] = $tdataipbx_canais[".isUseInlineAdd"] || $tdataipbx_canais[".isUseInlineEdit"];

$tdataipbx_canais[".allSearchFields"] = array();



$tdataipbx_canais[".isDynamicPerm"] = true;

	

$tdataipbx_canais[".isDisplayLoading"] = true;

$tdataipbx_canais[".isResizeColumns"] = false;


$tdataipbx_canais[".createLoginPage"] = true;


 	




$tdataipbx_canais[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_canais[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_canais[".orderindexes"] = array();

$tdataipbx_canais[".sqlHead"] = "SELECT id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp";

$tdataipbx_canais[".sqlFrom"] = "FROM ipbx_canais";

$tdataipbx_canais[".sqlWhereExpr"] = "";

$tdataipbx_canais[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_canal";
	$tdataipbx_canais[".Keys"]=$tableKeys;

	
//	id_canal
	$fdata = array();
	$fdata["strName"] = "id_canal";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Canal"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_canal";
		$fdata["FullName"]= "id_canal";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_canais["id_canal"]=$fdata;
	
//	canal
	$fdata = array();
	$fdata["strName"] = "canal";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Canal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "canal";
		$fdata["FullName"]= "canal";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_canais["canal"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_canais["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Descrição Canal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "dsc_interf";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_canais["dsc_interf"]=$fdata;
	
//	rdz_interf
	$fdata = array();
	$fdata["strName"] = "rdz_interf";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Rdz Interf"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "rdz_interf";
		$fdata["FullName"]= "rdz_interf";
						$fdata["Index"]= 5;
	 $fdata["DateEditType"]=13; 
			
											$tdataipbx_canais["rdz_interf"]=$fdata;
	
//	flg_disp
	$fdata = array();
	$fdata["strName"] = "flg_disp";
	$fdata["ownerTable"] = "ipbx_canais";
		$fdata["Label"]="Flg Disp"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "flg_disp";
		$fdata["FullName"]= "flg_disp";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_canais["flg_disp"]=$fdata;

	
$tables_data["ipbx_canais"]=&$tdataipbx_canais;
$field_labels["ipbx_canais"] = &$fieldLabelsipbx_canais;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_canais"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_canais"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="ipbx_interf_fxs";
	$masterTablesData["ipbx_canais"][$mIndex] = array(
		  "mDataSourceTable"=>"ipbx_interf_fxs"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "ipbx_interf_fxs"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["ipbx_canais"][$mIndex]["masterKeys"][]="id_interf";
		$masterTablesData["ipbx_canais"][$mIndex]["detailKeys"][]="id_interf";

$mIndex = 2-1;
			$strOriginalDetailsTable="ipbx_interf_gsm";
	$masterTablesData["ipbx_canais"][$mIndex] = array(
		  "mDataSourceTable"=>"ipbx_interf_gsm"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "ipbx_interf_gsm"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["ipbx_canais"][$mIndex]["masterKeys"][]="id_interf";
		$masterTablesData["ipbx_canais"][$mIndex]["detailKeys"][]="id_interf";

$mIndex = 3-1;
			$strOriginalDetailsTable="ipbx_interf_fxo";
	$masterTablesData["ipbx_canais"][$mIndex] = array(
		  "mDataSourceTable"=>"ipbx_interf_fxo"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "ipbx_interf_fxo"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 0
		, "previewOnEdit" => 0
		, "previewOnView" => 0
	);	
		$masterTablesData["ipbx_canais"][$mIndex]["masterKeys"][]="id_interf";
		$masterTablesData["ipbx_canais"][$mIndex]["detailKeys"][]="id_interf";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2852=array();
$proto2852["m_strHead"] = "SELECT";
$proto2852["m_strFieldList"] = "id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp";
$proto2852["m_strFrom"] = "FROM ipbx_canais";
$proto2852["m_strWhere"] = "";
$proto2852["m_strOrderBy"] = "";
$proto2852["m_strTail"] = "";
$proto2853=array();
$proto2853["m_sql"] = "";
$proto2853["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2853["m_column"]=$obj;
$proto2853["m_contained"] = array();
$proto2853["m_strCase"] = "";
$proto2853["m_havingmode"] = "0";
$proto2853["m_inBrackets"] = "0";
$proto2853["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2853);

$proto2852["m_where"] = $obj;
$proto2855=array();
$proto2855["m_sql"] = "";
$proto2855["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2855["m_column"]=$obj;
$proto2855["m_contained"] = array();
$proto2855["m_strCase"] = "";
$proto2855["m_havingmode"] = "0";
$proto2855["m_inBrackets"] = "0";
$proto2855["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2855);

$proto2852["m_having"] = $obj;
$proto2852["m_fieldlist"] = array();
						$proto2857=array();
			$obj = new SQLField(array(
	"m_strName" => "id_canal",
	"m_strTable" => "ipbx_canais"
));

$proto2857["m_expr"]=$obj;
$proto2857["m_alias"] = "";
$obj = new SQLFieldListItem($proto2857);

$proto2852["m_fieldlist"][]=$obj;
						$proto2859=array();
			$obj = new SQLField(array(
	"m_strName" => "canal",
	"m_strTable" => "ipbx_canais"
));

$proto2859["m_expr"]=$obj;
$proto2859["m_alias"] = "";
$obj = new SQLFieldListItem($proto2859);

$proto2852["m_fieldlist"][]=$obj;
						$proto2861=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_canais"
));

$proto2861["m_expr"]=$obj;
$proto2861["m_alias"] = "";
$obj = new SQLFieldListItem($proto2861);

$proto2852["m_fieldlist"][]=$obj;
						$proto2863=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_canais"
));

$proto2863["m_expr"]=$obj;
$proto2863["m_alias"] = "";
$obj = new SQLFieldListItem($proto2863);

$proto2852["m_fieldlist"][]=$obj;
						$proto2865=array();
			$obj = new SQLField(array(
	"m_strName" => "rdz_interf",
	"m_strTable" => "ipbx_canais"
));

$proto2865["m_expr"]=$obj;
$proto2865["m_alias"] = "";
$obj = new SQLFieldListItem($proto2865);

$proto2852["m_fieldlist"][]=$obj;
						$proto2867=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_disp",
	"m_strTable" => "ipbx_canais"
));

$proto2867["m_expr"]=$obj;
$proto2867["m_alias"] = "";
$obj = new SQLFieldListItem($proto2867);

$proto2852["m_fieldlist"][]=$obj;
$proto2852["m_fromlist"] = array();
												$proto2869=array();
$proto2869["m_link"] = "SQLL_MAIN";
			$proto2870=array();
$proto2870["m_strName"] = "ipbx_canais";
$proto2870["m_columns"] = array();
$proto2870["m_columns"][] = "id_canal";
$proto2870["m_columns"][] = "canal";
$proto2870["m_columns"][] = "id_interf";
$proto2870["m_columns"][] = "dsc_interf";
$proto2870["m_columns"][] = "rdz_interf";
$proto2870["m_columns"][] = "flg_disp";
$obj = new SQLTable($proto2870);

$proto2869["m_table"] = $obj;
$proto2869["m_alias"] = "";
$proto2871=array();
$proto2871["m_sql"] = "";
$proto2871["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2871["m_column"]=$obj;
$proto2871["m_contained"] = array();
$proto2871["m_strCase"] = "";
$proto2871["m_havingmode"] = "0";
$proto2871["m_inBrackets"] = "0";
$proto2871["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2871);

$proto2869["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2869);

$proto2852["m_fromlist"][]=$obj;
$proto2852["m_groupby"] = array();
$proto2852["m_orderby"] = array();
$obj = new SQLQuery($proto2852);

$queryData_ipbx_canais = $obj;
$tdataipbx_canais[".sqlquery"] = $queryData_ipbx_canais;



?>
