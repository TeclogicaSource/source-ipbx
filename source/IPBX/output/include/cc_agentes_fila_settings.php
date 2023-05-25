<?php

//	field labels
$fieldLabelscc_agentes_fila = array();
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]=array();
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]["idt_agentes_fila"] = "Identificação";
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]["id_filas"] = "Filas";
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]["penalidade"] = "Penalidade";
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]["idt_agentes"] = "Agente";
$fieldLabelscc_agentes_fila["Portuguese(Brazil)"]["flg_req_aux"] = "Requisitar Auxilio";


$tdatacc_agentes_fila=array();
	$tdatacc_agentes_fila[".NumberOfChars"]=80; 
	$tdatacc_agentes_fila[".ShortName"]="cc_agentes_fila";
	$tdatacc_agentes_fila[".OwnerID"]="";
	$tdatacc_agentes_fila[".OriginalTable"]="cc_agentes_fila";
	$tdatacc_agentes_fila[".NCSearch"]=true;
	

$tdatacc_agentes_fila[".shortTableName"] = "cc_agentes_fila";
$tdatacc_agentes_fila[".dataSourceTable"] = "cc_agentes_fila";
$tdatacc_agentes_fila[".nSecOptions"] = 0;
$tdatacc_agentes_fila[".nLoginMethod"] = 1;
$tdatacc_agentes_fila[".recsPerRowList"] = 1;	
$tdatacc_agentes_fila[".tableGroupBy"] = "0";
$tdatacc_agentes_fila[".dbType"] = 0;
$tdatacc_agentes_fila[".mainTableOwnerID"] = "";
$tdatacc_agentes_fila[".moveNext"] = 1;

$tdatacc_agentes_fila[".listAjax"] = false;

	$tdatacc_agentes_fila[".audit"] = true;

	$tdatacc_agentes_fila[".locking"] = false;
	
$tdatacc_agentes_fila[".listIcons"] = true;
$tdatacc_agentes_fila[".inlineEdit"] = true;



$tdatacc_agentes_fila[".delete"] = true;

$tdatacc_agentes_fila[".showSimpleSearchOptions"] = false;

$tdatacc_agentes_fila[".showSearchPanel"] = true;


$tdatacc_agentes_fila[".isUseAjaxSuggest"] = true;

$tdatacc_agentes_fila[".rowHighlite"] = true;

$tdatacc_agentes_fila[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_agentes_fila[".arrKeyFields"][] = "idt_agentes_fila";

// use datepicker for search panel
$tdatacc_agentes_fila[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_agentes_fila[".isUseTimeForSearch"] = false;





$tdatacc_agentes_fila[".isUseInlineAdd"] = true;

$tdatacc_agentes_fila[".isUseInlineEdit"] = true;
$tdatacc_agentes_fila[".isUseInlineJs"] = $tdatacc_agentes_fila[".isUseInlineAdd"] || $tdatacc_agentes_fila[".isUseInlineEdit"];

$tdatacc_agentes_fila[".allSearchFields"] = array();



$tdatacc_agentes_fila[".isDynamicPerm"] = true;

	

$tdatacc_agentes_fila[".isDisplayLoading"] = true;

$tdatacc_agentes_fila[".isResizeColumns"] = false;


$tdatacc_agentes_fila[".createLoginPage"] = true;


 	




$tdatacc_agentes_fila[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_agentes_fila[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_agentes_fila[".orderindexes"] = array();

$tdatacc_agentes_fila[".sqlHead"] = "SELECT idt_agentes_fila,   idt_agentes,   id_filas,   penalidade,   flg_req_aux";

$tdatacc_agentes_fila[".sqlFrom"] = "FROM cc_agentes_fila";

$tdatacc_agentes_fila[".sqlWhereExpr"] = "";

$tdatacc_agentes_fila[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agentes_fila";
	$tdatacc_agentes_fila[".Keys"]=$tableKeys;

	
//	idt_agentes_fila
	$fdata = array();
	$fdata["strName"] = "idt_agentes_fila";
	$fdata["ownerTable"] = "cc_agentes_fila";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agentes_fila";
		$fdata["FullName"]= "idt_agentes_fila";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes_fila["idt_agentes_fila"]=$fdata;
	
//	idt_agentes
	$fdata = array();
	$fdata["strName"] = "idt_agentes";
	$fdata["ownerTable"] = "cc_agentes_fila";
		$fdata["Label"]="Agente"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agentes";
		$fdata["FullName"]= "idt_agentes";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes_fila["idt_agentes"]=$fdata;
	
//	id_filas
	$fdata = array();
	$fdata["strName"] = "id_filas";
	$fdata["ownerTable"] = "cc_agentes_fila";
		$fdata["Label"]="Filas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_filas";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_fila";
				$fdata["LookupTable"]="cc_receptivo_filas";
	$fdata["LookupOrderBy"]="nm_fila";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_filas";
		$fdata["FullName"]= "id_filas";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_agentes_fila["id_filas"]=$fdata;
	
//	penalidade
	$fdata = array();
	$fdata["strName"] = "penalidade";
	$fdata["ownerTable"] = "cc_agentes_fila";
		$fdata["Label"]="Penalidade"; 
			$fdata["FieldType"]= 3;
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
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "penalidade";
		$fdata["FullName"]= "penalidade";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_agentes_fila["penalidade"]=$fdata;
	
//	flg_req_aux
	$fdata = array();
	$fdata["strName"] = "flg_req_aux";
	$fdata["ownerTable"] = "cc_agentes_fila";
		$fdata["Label"]="Requisitar Auxilio"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "flg_req_aux";
		$fdata["FullName"]= "flg_req_aux";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes_fila["flg_req_aux"]=$fdata;

	
$tables_data["cc_agentes_fila"]=&$tdatacc_agentes_fila;
$field_labels["cc_agentes_fila"] = &$fieldLabelscc_agentes_fila;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_agentes_fila"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_agentes_fila"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="cc_agentes";
	$masterTablesData["cc_agentes_fila"][$mIndex] = array(
		  "mDataSourceTable"=>"cc_agentes"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "cc_agentes"
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
		$masterTablesData["cc_agentes_fila"][$mIndex]["masterKeys"][]="idt_agentes";
		$masterTablesData["cc_agentes_fila"][$mIndex]["detailKeys"][]="idt_agentes";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1581=array();
$proto1581["m_strHead"] = "SELECT";
$proto1581["m_strFieldList"] = "idt_agentes_fila,   idt_agentes,   id_filas,   penalidade,   flg_req_aux";
$proto1581["m_strFrom"] = "FROM cc_agentes_fila";
$proto1581["m_strWhere"] = "";
$proto1581["m_strOrderBy"] = "";
$proto1581["m_strTail"] = "";
$proto1582=array();
$proto1582["m_sql"] = "";
$proto1582["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1582["m_column"]=$obj;
$proto1582["m_contained"] = array();
$proto1582["m_strCase"] = "";
$proto1582["m_havingmode"] = "0";
$proto1582["m_inBrackets"] = "0";
$proto1582["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1582);

$proto1581["m_where"] = $obj;
$proto1584=array();
$proto1584["m_sql"] = "";
$proto1584["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1584["m_column"]=$obj;
$proto1584["m_contained"] = array();
$proto1584["m_strCase"] = "";
$proto1584["m_havingmode"] = "0";
$proto1584["m_inBrackets"] = "0";
$proto1584["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1584);

$proto1581["m_having"] = $obj;
$proto1581["m_fieldlist"] = array();
						$proto1586=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agentes_fila",
	"m_strTable" => "cc_agentes_fila"
));

$proto1586["m_expr"]=$obj;
$proto1586["m_alias"] = "";
$obj = new SQLFieldListItem($proto1586);

$proto1581["m_fieldlist"][]=$obj;
						$proto1588=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agentes",
	"m_strTable" => "cc_agentes_fila"
));

$proto1588["m_expr"]=$obj;
$proto1588["m_alias"] = "";
$obj = new SQLFieldListItem($proto1588);

$proto1581["m_fieldlist"][]=$obj;
						$proto1590=array();
			$obj = new SQLField(array(
	"m_strName" => "id_filas",
	"m_strTable" => "cc_agentes_fila"
));

$proto1590["m_expr"]=$obj;
$proto1590["m_alias"] = "";
$obj = new SQLFieldListItem($proto1590);

$proto1581["m_fieldlist"][]=$obj;
						$proto1592=array();
			$obj = new SQLField(array(
	"m_strName" => "penalidade",
	"m_strTable" => "cc_agentes_fila"
));

$proto1592["m_expr"]=$obj;
$proto1592["m_alias"] = "";
$obj = new SQLFieldListItem($proto1592);

$proto1581["m_fieldlist"][]=$obj;
						$proto1594=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_req_aux",
	"m_strTable" => "cc_agentes_fila"
));

$proto1594["m_expr"]=$obj;
$proto1594["m_alias"] = "";
$obj = new SQLFieldListItem($proto1594);

$proto1581["m_fieldlist"][]=$obj;
$proto1581["m_fromlist"] = array();
												$proto1596=array();
$proto1596["m_link"] = "SQLL_MAIN";
			$proto1597=array();
$proto1597["m_strName"] = "cc_agentes_fila";
$proto1597["m_columns"] = array();
$proto1597["m_columns"][] = "idt_agentes_fila";
$proto1597["m_columns"][] = "idt_agentes";
$proto1597["m_columns"][] = "id_filas";
$proto1597["m_columns"][] = "penalidade";
$proto1597["m_columns"][] = "flg_req_aux";
$obj = new SQLTable($proto1597);

$proto1596["m_table"] = $obj;
$proto1596["m_alias"] = "";
$proto1598=array();
$proto1598["m_sql"] = "";
$proto1598["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1598["m_column"]=$obj;
$proto1598["m_contained"] = array();
$proto1598["m_strCase"] = "";
$proto1598["m_havingmode"] = "0";
$proto1598["m_inBrackets"] = "0";
$proto1598["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1598);

$proto1596["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1596);

$proto1581["m_fromlist"][]=$obj;
$proto1581["m_groupby"] = array();
$proto1581["m_orderby"] = array();
$obj = new SQLQuery($proto1581);

$queryData_cc_agentes_fila = $obj;
$tdatacc_agentes_fila[".sqlquery"] = $queryData_cc_agentes_fila;



?>
