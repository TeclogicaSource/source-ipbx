<?php

//	field labels
$fieldLabelsipbx_horario_desv = array();
$fieldLabelsipbx_horario_desv["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_horario_desv["Portuguese(Brazil)"]["id_desvio"] = "Id Desvio";
$fieldLabelsipbx_horario_desv["Portuguese(Brazil)"]["dsc_desvio"] = " Descrição";


$tdataipbx_horario_desv=array();
	$tdataipbx_horario_desv[".NumberOfChars"]=80; 
	$tdataipbx_horario_desv[".ShortName"]="ipbx_horario_desv";
	$tdataipbx_horario_desv[".OwnerID"]="";
	$tdataipbx_horario_desv[".OriginalTable"]="ipbx_horario_desv";
	$tdataipbx_horario_desv[".NCSearch"]=true;
	

$tdataipbx_horario_desv[".shortTableName"] = "ipbx_horario_desv";
$tdataipbx_horario_desv[".dataSourceTable"] = "ipbx_horario_desv";
$tdataipbx_horario_desv[".nSecOptions"] = 0;
$tdataipbx_horario_desv[".nLoginMethod"] = 1;
$tdataipbx_horario_desv[".recsPerRowList"] = 1;	
$tdataipbx_horario_desv[".tableGroupBy"] = "0";
$tdataipbx_horario_desv[".dbType"] = 0;
$tdataipbx_horario_desv[".mainTableOwnerID"] = "";
$tdataipbx_horario_desv[".moveNext"] = 1;

$tdataipbx_horario_desv[".listAjax"] = false;

	$tdataipbx_horario_desv[".audit"] = true;

	$tdataipbx_horario_desv[".locking"] = false;
	
$tdataipbx_horario_desv[".listIcons"] = true;
$tdataipbx_horario_desv[".edit"] = true;



$tdataipbx_horario_desv[".delete"] = true;

$tdataipbx_horario_desv[".showSimpleSearchOptions"] = false;

$tdataipbx_horario_desv[".showSearchPanel"] = true;


$tdataipbx_horario_desv[".isUseAjaxSuggest"] = true;

$tdataipbx_horario_desv[".rowHighlite"] = true;

$tdataipbx_horario_desv[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_horario_desv[".arrKeyFields"][] = "id_desvio";

// use datepicker for search panel
$tdataipbx_horario_desv[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_horario_desv[".isUseTimeForSearch"] = false;




$tdataipbx_horario_desv[".useDetailsPreview"] = true;	


$tdataipbx_horario_desv[".isUseInlineJs"] = $tdataipbx_horario_desv[".isUseInlineAdd"] || $tdataipbx_horario_desv[".isUseInlineEdit"];

$tdataipbx_horario_desv[".allSearchFields"] = array();

$tdataipbx_horario_desv[".globSearchFields"][] = "dsc_desvio";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_desvio", $tdataipbx_horario_desv[".allSearchFields"]))
{
	$tdataipbx_horario_desv[".allSearchFields"][] = "dsc_desvio";	
}


$tdataipbx_horario_desv[".isDynamicPerm"] = true;

	

$tdataipbx_horario_desv[".isDisplayLoading"] = true;

$tdataipbx_horario_desv[".isResizeColumns"] = false;


$tdataipbx_horario_desv[".createLoginPage"] = true;


 	
	$tdataipbx_horario_desv[".subQueriesSupAccess"] = true;




$tdataipbx_horario_desv[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_horario_desv[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_horario_desv[".orderindexes"] = array();

$tdataipbx_horario_desv[".sqlHead"] = "SELECT id_desvio,   dsc_desvio";

$tdataipbx_horario_desv[".sqlFrom"] = "FROM ipbx_horario_desv";

$tdataipbx_horario_desv[".sqlWhereExpr"] = "";

$tdataipbx_horario_desv[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_desvio";
	$tdataipbx_horario_desv[".Keys"]=$tableKeys;

	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "ipbx_horario_desv";
		$fdata["Label"]="Id Desvio"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desvio";
		$fdata["FullName"]= "id_desvio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_horario_desv["id_desvio"]=$fdata;
	
//	dsc_desvio
	$fdata = array();
	$fdata["strName"] = "dsc_desvio";
	$fdata["ownerTable"] = "ipbx_horario_desv";
		$fdata["Label"]=" Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_desvio";
		$fdata["FullName"]= "dsc_desvio";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_horario_desv["dsc_desvio"]=$fdata;

	
$tables_data["ipbx_horario_desv"]=&$tdataipbx_horario_desv;
$field_labels["ipbx_horario_desv"] = &$fieldLabelsipbx_horario_desv;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_horario_desv"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_horario_desv_ramais";
	$detailsTablesData["ipbx_horario_desv"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_horario_desv_ramais"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_horario_desv_ramais"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_desvio_prog,   id_desvio,   diasemana,   txt_referencia,   hr_inicio_01,   hr_fim_01,   dsv_01,   hr_inicio_02,   hr_fim_02,   dsv_02,   hr_inicio_03,   hr_fim_03,   dsv_03,   hr_inicio_04,   hr_fim_04,   dsv_04"	
		, "sqlFrom"=>"FROM ipbx_horario_desv_ramais"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["ipbx_horario_desv"][$dIndex]["masterKeys"][]="id_desvio";
		$detailsTablesData["ipbx_horario_desv"][$dIndex]["detailKeys"][]="id_desvio";


	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_horario_desv"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1677=array();
$proto1677["m_strHead"] = "SELECT";
$proto1677["m_strFieldList"] = "id_desvio,   dsc_desvio";
$proto1677["m_strFrom"] = "FROM ipbx_horario_desv";
$proto1677["m_strWhere"] = "";
$proto1677["m_strOrderBy"] = "";
$proto1677["m_strTail"] = "";
$proto1678=array();
$proto1678["m_sql"] = "";
$proto1678["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1678["m_column"]=$obj;
$proto1678["m_contained"] = array();
$proto1678["m_strCase"] = "";
$proto1678["m_havingmode"] = "0";
$proto1678["m_inBrackets"] = "0";
$proto1678["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1678);

$proto1677["m_where"] = $obj;
$proto1680=array();
$proto1680["m_sql"] = "";
$proto1680["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1680["m_column"]=$obj;
$proto1680["m_contained"] = array();
$proto1680["m_strCase"] = "";
$proto1680["m_havingmode"] = "0";
$proto1680["m_inBrackets"] = "0";
$proto1680["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1680);

$proto1677["m_having"] = $obj;
$proto1677["m_fieldlist"] = array();
						$proto1682=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "ipbx_horario_desv"
));

$proto1682["m_expr"]=$obj;
$proto1682["m_alias"] = "";
$obj = new SQLFieldListItem($proto1682);

$proto1677["m_fieldlist"][]=$obj;
						$proto1684=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_desvio",
	"m_strTable" => "ipbx_horario_desv"
));

$proto1684["m_expr"]=$obj;
$proto1684["m_alias"] = "";
$obj = new SQLFieldListItem($proto1684);

$proto1677["m_fieldlist"][]=$obj;
$proto1677["m_fromlist"] = array();
												$proto1686=array();
$proto1686["m_link"] = "SQLL_MAIN";
			$proto1687=array();
$proto1687["m_strName"] = "ipbx_horario_desv";
$proto1687["m_columns"] = array();
$proto1687["m_columns"][] = "id_desvio";
$proto1687["m_columns"][] = "dsc_desvio";
$obj = new SQLTable($proto1687);

$proto1686["m_table"] = $obj;
$proto1686["m_alias"] = "";
$proto1688=array();
$proto1688["m_sql"] = "";
$proto1688["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1688["m_column"]=$obj;
$proto1688["m_contained"] = array();
$proto1688["m_strCase"] = "";
$proto1688["m_havingmode"] = "0";
$proto1688["m_inBrackets"] = "0";
$proto1688["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1688);

$proto1686["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1686);

$proto1677["m_fromlist"][]=$obj;
$proto1677["m_groupby"] = array();
$proto1677["m_orderby"] = array();
$obj = new SQLQuery($proto1677);

$queryData_ipbx_horario_desv = $obj;
$tdataipbx_horario_desv[".sqlquery"] = $queryData_ipbx_horario_desv;



?>
