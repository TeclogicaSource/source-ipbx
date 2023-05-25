<?php

//	field labels
$fieldLabelsipbx_interf_fxs = array();
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["board"] = "Placa";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_fxs["Portuguese(Brazil)"]["khomp_interf"] = "Interface Khomp (Número)";


$tdataipbx_interf_fxs=array();
	$tdataipbx_interf_fxs[".NumberOfChars"]=80; 
	$tdataipbx_interf_fxs[".ShortName"]="ipbx_interf_fxs";
	$tdataipbx_interf_fxs[".OwnerID"]="";
	$tdataipbx_interf_fxs[".OriginalTable"]="ipbx_interf_fxs";
	$tdataipbx_interf_fxs[".NCSearch"]=true;
	

$tdataipbx_interf_fxs[".shortTableName"] = "ipbx_interf_fxs";
$tdataipbx_interf_fxs[".dataSourceTable"] = "ipbx_interf_fxs";
$tdataipbx_interf_fxs[".nSecOptions"] = 0;
$tdataipbx_interf_fxs[".nLoginMethod"] = 1;
$tdataipbx_interf_fxs[".recsPerRowList"] = 1;	
$tdataipbx_interf_fxs[".tableGroupBy"] = "0";
$tdataipbx_interf_fxs[".dbType"] = 0;
$tdataipbx_interf_fxs[".mainTableOwnerID"] = "";
$tdataipbx_interf_fxs[".moveNext"] = 1;

$tdataipbx_interf_fxs[".listAjax"] = true;

	$tdataipbx_interf_fxs[".audit"] = true;

	$tdataipbx_interf_fxs[".locking"] = false;
	
$tdataipbx_interf_fxs[".listIcons"] = true;
$tdataipbx_interf_fxs[".inlineEdit"] = true;



$tdataipbx_interf_fxs[".delete"] = true;

$tdataipbx_interf_fxs[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_fxs[".showSearchPanel"] = true;


$tdataipbx_interf_fxs[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_fxs[".rowHighlite"] = true;

$tdataipbx_interf_fxs[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_fxs[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_fxs[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_fxs[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_fxs[".isUseTimeForSearch"] = false;




$tdataipbx_interf_fxs[".useDetailsPreview"] = true;	

$tdataipbx_interf_fxs[".isUseInlineAdd"] = true;

$tdataipbx_interf_fxs[".isUseInlineEdit"] = true;
$tdataipbx_interf_fxs[".isUseInlineJs"] = $tdataipbx_interf_fxs[".isUseInlineAdd"] || $tdataipbx_interf_fxs[".isUseInlineEdit"];

$tdataipbx_interf_fxs[".allSearchFields"] = array();



$tdataipbx_interf_fxs[".isDynamicPerm"] = true;

	
$tdataipbx_interf_fxs[".isVerLayout"] = true;

$tdataipbx_interf_fxs[".isDisplayLoading"] = true;

$tdataipbx_interf_fxs[".isResizeColumns"] = false;


$tdataipbx_interf_fxs[".createLoginPage"] = true;


 	
	$tdataipbx_interf_fxs[".subQueriesSupAccess"] = true;




$tdataipbx_interf_fxs[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_fxs[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_fxs[".orderindexes"] = array();

$tdataipbx_interf_fxs[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   khomp_interf";

$tdataipbx_interf_fxs[".sqlFrom"] = "FROM ipbx_interf_fxs";

$tdataipbx_interf_fxs[".sqlWhereExpr"] = "";

$tdataipbx_interf_fxs[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_fxs[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_interf_fxs["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "dsc_interf";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["dsc_interf"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["id_central"]=$fdata;
	
//	board
	$fdata = array();
	$fdata["strName"] = "board";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Placa"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="0";
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
	$fdata["LookupValues"][]="10";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "board";
		$fdata["FullName"]= "board";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["board"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Tempo Chamada (s)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="30";
	$fdata["LookupValues"][]="45";
	$fdata["LookupValues"][]="60";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_chamada";
		$fdata["FullName"]= "tp_chamada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["tp_chamada"]=$fdata;
	
//	khomp_interf
	$fdata = array();
	$fdata["strName"] = "khomp_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxs";
		$fdata["Label"]="Interface Khomp (Número)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "khomp_interf";
		$fdata["FullName"]= "khomp_interf";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxs["khomp_interf"]=$fdata;

	
$tables_data["ipbx_interf_fxs"]=&$tdataipbx_interf_fxs;
$field_labels["ipbx_interf_fxs"] = &$fieldLabelsipbx_interf_fxs;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_fxs"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_canais";
	$detailsTablesData["ipbx_interf_fxs"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_canais"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_canais"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp"	
		, "sqlFrom"=>"FROM ipbx_canais"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["ipbx_interf_fxs"][$dIndex]["masterKeys"][]="id_interf";
		$detailsTablesData["ipbx_interf_fxs"][$dIndex]["detailKeys"][]="id_interf";


	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_fxs"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_fxs"][$mIndex] = array(
		  "mDataSourceTable"=>"central"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "central"
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
		$masterTablesData["ipbx_interf_fxs"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_fxs"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2610=array();
$proto2610["m_strHead"] = "SELECT";
$proto2610["m_strFieldList"] = "id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   khomp_interf";
$proto2610["m_strFrom"] = "FROM ipbx_interf_fxs";
$proto2610["m_strWhere"] = "";
$proto2610["m_strOrderBy"] = "";
$proto2610["m_strTail"] = "";
$proto2611=array();
$proto2611["m_sql"] = "";
$proto2611["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2611["m_column"]=$obj;
$proto2611["m_contained"] = array();
$proto2611["m_strCase"] = "";
$proto2611["m_havingmode"] = "0";
$proto2611["m_inBrackets"] = "0";
$proto2611["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2611);

$proto2610["m_where"] = $obj;
$proto2613=array();
$proto2613["m_sql"] = "";
$proto2613["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2613["m_column"]=$obj;
$proto2613["m_contained"] = array();
$proto2613["m_strCase"] = "";
$proto2613["m_havingmode"] = "0";
$proto2613["m_inBrackets"] = "0";
$proto2613["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2613);

$proto2610["m_having"] = $obj;
$proto2610["m_fieldlist"] = array();
						$proto2615=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2615["m_expr"]=$obj;
$proto2615["m_alias"] = "";
$obj = new SQLFieldListItem($proto2615);

$proto2610["m_fieldlist"][]=$obj;
						$proto2617=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2617["m_expr"]=$obj;
$proto2617["m_alias"] = "";
$obj = new SQLFieldListItem($proto2617);

$proto2610["m_fieldlist"][]=$obj;
						$proto2619=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2619["m_expr"]=$obj;
$proto2619["m_alias"] = "";
$obj = new SQLFieldListItem($proto2619);

$proto2610["m_fieldlist"][]=$obj;
						$proto2621=array();
			$obj = new SQLField(array(
	"m_strName" => "board",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2621["m_expr"]=$obj;
$proto2621["m_alias"] = "";
$obj = new SQLFieldListItem($proto2621);

$proto2610["m_fieldlist"][]=$obj;
						$proto2623=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2623["m_expr"]=$obj;
$proto2623["m_alias"] = "";
$obj = new SQLFieldListItem($proto2623);

$proto2610["m_fieldlist"][]=$obj;
						$proto2625=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2625["m_expr"]=$obj;
$proto2625["m_alias"] = "";
$obj = new SQLFieldListItem($proto2625);

$proto2610["m_fieldlist"][]=$obj;
						$proto2627=array();
			$obj = new SQLField(array(
	"m_strName" => "khomp_interf",
	"m_strTable" => "ipbx_interf_fxs"
));

$proto2627["m_expr"]=$obj;
$proto2627["m_alias"] = "";
$obj = new SQLFieldListItem($proto2627);

$proto2610["m_fieldlist"][]=$obj;
$proto2610["m_fromlist"] = array();
												$proto2629=array();
$proto2629["m_link"] = "SQLL_MAIN";
			$proto2630=array();
$proto2630["m_strName"] = "ipbx_interf_fxs";
$proto2630["m_columns"] = array();
$proto2630["m_columns"][] = "id_interf";
$proto2630["m_columns"][] = "dsc_interf";
$proto2630["m_columns"][] = "id_central";
$proto2630["m_columns"][] = "board";
$proto2630["m_columns"][] = "id_tp_interf";
$proto2630["m_columns"][] = "tp_chamada";
$proto2630["m_columns"][] = "khomp_interf";
$obj = new SQLTable($proto2630);

$proto2629["m_table"] = $obj;
$proto2629["m_alias"] = "";
$proto2631=array();
$proto2631["m_sql"] = "";
$proto2631["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2631["m_column"]=$obj;
$proto2631["m_contained"] = array();
$proto2631["m_strCase"] = "";
$proto2631["m_havingmode"] = "0";
$proto2631["m_inBrackets"] = "0";
$proto2631["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2631);

$proto2629["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2629);

$proto2610["m_fromlist"][]=$obj;
$proto2610["m_groupby"] = array();
$proto2610["m_orderby"] = array();
$obj = new SQLQuery($proto2610);

$queryData_ipbx_interf_fxs = $obj;
$tdataipbx_interf_fxs[".sqlquery"] = $queryData_ipbx_interf_fxs;



?>
