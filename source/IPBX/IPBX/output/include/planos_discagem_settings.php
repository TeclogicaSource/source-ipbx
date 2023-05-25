<?php

//	field labels
$fieldLabelsplanos_discagem = array();
$fieldLabelsplanos_discagem["Portuguese(Brazil)"]=array();
$fieldLabelsplanos_discagem["Portuguese(Brazil)"]["id_plano"] = "Id Plano";
$fieldLabelsplanos_discagem["Portuguese(Brazil)"]["DDD"] = "DDD";
$fieldLabelsplanos_discagem["Portuguese(Brazil)"]["id_tronco"] = "Tronco de Saída";
$fieldLabelsplanos_discagem["Portuguese(Brazil)"]["id_regiao"] = "Id Regiao";


$tdataplanos_discagem=array();
	$tdataplanos_discagem[".NumberOfChars"]=80; 
	$tdataplanos_discagem[".ShortName"]="planos_discagem";
	$tdataplanos_discagem[".OwnerID"]="";
	$tdataplanos_discagem[".OriginalTable"]="planos_discagem";
	$tdataplanos_discagem[".NCSearch"]=true;
	

$tdataplanos_discagem[".shortTableName"] = "planos_discagem";
$tdataplanos_discagem[".dataSourceTable"] = "planos_discagem";
$tdataplanos_discagem[".nSecOptions"] = 0;
$tdataplanos_discagem[".nLoginMethod"] = 1;
$tdataplanos_discagem[".recsPerRowList"] = 1;	
$tdataplanos_discagem[".tableGroupBy"] = "0";
$tdataplanos_discagem[".dbType"] = 0;
$tdataplanos_discagem[".mainTableOwnerID"] = "";
$tdataplanos_discagem[".moveNext"] = 1;

$tdataplanos_discagem[".listAjax"] = false;

	$tdataplanos_discagem[".audit"] = true;

	$tdataplanos_discagem[".locking"] = false;
	
$tdataplanos_discagem[".listIcons"] = true;
$tdataplanos_discagem[".edit"] = true;
$tdataplanos_discagem[".inlineEdit"] = true;



$tdataplanos_discagem[".delete"] = true;

$tdataplanos_discagem[".showSimpleSearchOptions"] = false;

$tdataplanos_discagem[".showSearchPanel"] = true;


$tdataplanos_discagem[".isUseAjaxSuggest"] = true;

$tdataplanos_discagem[".rowHighlite"] = true;

$tdataplanos_discagem[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataplanos_discagem[".arrKeyFields"][] = "id_plano";

// use datepicker for search panel
$tdataplanos_discagem[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataplanos_discagem[".isUseTimeForSearch"] = false;





$tdataplanos_discagem[".isUseInlineAdd"] = true;

$tdataplanos_discagem[".isUseInlineEdit"] = true;
$tdataplanos_discagem[".isUseInlineJs"] = $tdataplanos_discagem[".isUseInlineAdd"] || $tdataplanos_discagem[".isUseInlineEdit"];

$tdataplanos_discagem[".allSearchFields"] = array();



$tdataplanos_discagem[".isDynamicPerm"] = true;

	

$tdataplanos_discagem[".isDisplayLoading"] = true;

$tdataplanos_discagem[".isResizeColumns"] = false;


$tdataplanos_discagem[".createLoginPage"] = true;


 	




$tdataplanos_discagem[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataplanos_discagem[".strOrderBy"] = $gstrOrderBy;
	
$tdataplanos_discagem[".orderindexes"] = array();

$tdataplanos_discagem[".sqlHead"] = "SELECT id_plano,   DDD,   id_tronco,   id_regiao";

$tdataplanos_discagem[".sqlFrom"] = "FROM planos_discagem";

$tdataplanos_discagem[".sqlWhereExpr"] = "";

$tdataplanos_discagem[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_plano";
	$tdataplanos_discagem[".Keys"]=$tableKeys;

	
//	id_plano
	$fdata = array();
	$fdata["strName"] = "id_plano";
	$fdata["ownerTable"] = "planos_discagem";
		$fdata["Label"]="Id Plano"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_plano";
		$fdata["FullName"]= "id_plano";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataplanos_discagem["id_plano"]=$fdata;
	
//	DDD
	$fdata = array();
	$fdata["strName"] = "DDD";
	$fdata["ownerTable"] = "planos_discagem";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DDD";
		$fdata["FullName"]= "DDD";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataplanos_discagem["DDD"]=$fdata;
	
//	id_tronco
	$fdata = array();
	$fdata["strName"] = "id_tronco";
	$fdata["ownerTable"] = "planos_discagem";
		$fdata["Label"]="Tronco de Saída"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_tronco";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_tronco";
				$fdata["LookupTable"]="troncos";
	$fdata["LookupOrderBy"]="dsc_tronco";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tronco";
		$fdata["FullName"]= "id_tronco";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataplanos_discagem["id_tronco"]=$fdata;
	
//	id_regiao
	$fdata = array();
	$fdata["strName"] = "id_regiao";
	$fdata["ownerTable"] = "planos_discagem";
		$fdata["Label"]="Id Regiao"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_regiao";
		$fdata["FullName"]= "id_regiao";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
											$tdataplanos_discagem["id_regiao"]=$fdata;

	
$tables_data["planos_discagem"]=&$tdataplanos_discagem;
$field_labels["planos_discagem"] = &$fieldLabelsplanos_discagem;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["planos_discagem"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["planos_discagem"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="plano_discagem_regiao";
	$masterTablesData["planos_discagem"][$mIndex] = array(
		  "mDataSourceTable"=>"plano_discagem_regiao"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "plano_discagem_regiao"
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
		$masterTablesData["planos_discagem"][$mIndex]["masterKeys"][]="id_regiao";
		$masterTablesData["planos_discagem"][$mIndex]["detailKeys"][]="id_regiao";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1113=array();
$proto1113["m_strHead"] = "SELECT";
$proto1113["m_strFieldList"] = "id_plano,   DDD,   id_tronco,   id_regiao";
$proto1113["m_strFrom"] = "FROM planos_discagem";
$proto1113["m_strWhere"] = "";
$proto1113["m_strOrderBy"] = "";
$proto1113["m_strTail"] = "";
$proto1114=array();
$proto1114["m_sql"] = "";
$proto1114["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1114["m_column"]=$obj;
$proto1114["m_contained"] = array();
$proto1114["m_strCase"] = "";
$proto1114["m_havingmode"] = "0";
$proto1114["m_inBrackets"] = "0";
$proto1114["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1114);

$proto1113["m_where"] = $obj;
$proto1116=array();
$proto1116["m_sql"] = "";
$proto1116["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1116["m_column"]=$obj;
$proto1116["m_contained"] = array();
$proto1116["m_strCase"] = "";
$proto1116["m_havingmode"] = "0";
$proto1116["m_inBrackets"] = "0";
$proto1116["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1116);

$proto1113["m_having"] = $obj;
$proto1113["m_fieldlist"] = array();
						$proto1118=array();
			$obj = new SQLField(array(
	"m_strName" => "id_plano",
	"m_strTable" => "planos_discagem"
));

$proto1118["m_expr"]=$obj;
$proto1118["m_alias"] = "";
$obj = new SQLFieldListItem($proto1118);

$proto1113["m_fieldlist"][]=$obj;
						$proto1120=array();
			$obj = new SQLField(array(
	"m_strName" => "DDD",
	"m_strTable" => "planos_discagem"
));

$proto1120["m_expr"]=$obj;
$proto1120["m_alias"] = "";
$obj = new SQLFieldListItem($proto1120);

$proto1113["m_fieldlist"][]=$obj;
						$proto1122=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tronco",
	"m_strTable" => "planos_discagem"
));

$proto1122["m_expr"]=$obj;
$proto1122["m_alias"] = "";
$obj = new SQLFieldListItem($proto1122);

$proto1113["m_fieldlist"][]=$obj;
						$proto1124=array();
			$obj = new SQLField(array(
	"m_strName" => "id_regiao",
	"m_strTable" => "planos_discagem"
));

$proto1124["m_expr"]=$obj;
$proto1124["m_alias"] = "";
$obj = new SQLFieldListItem($proto1124);

$proto1113["m_fieldlist"][]=$obj;
$proto1113["m_fromlist"] = array();
												$proto1126=array();
$proto1126["m_link"] = "SQLL_MAIN";
			$proto1127=array();
$proto1127["m_strName"] = "planos_discagem";
$proto1127["m_columns"] = array();
$proto1127["m_columns"][] = "id_plano";
$proto1127["m_columns"][] = "DDD";
$proto1127["m_columns"][] = "id_tronco";
$proto1127["m_columns"][] = "id_regiao";
$obj = new SQLTable($proto1127);

$proto1126["m_table"] = $obj;
$proto1126["m_alias"] = "";
$proto1128=array();
$proto1128["m_sql"] = "";
$proto1128["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1128["m_column"]=$obj;
$proto1128["m_contained"] = array();
$proto1128["m_strCase"] = "";
$proto1128["m_havingmode"] = "0";
$proto1128["m_inBrackets"] = "0";
$proto1128["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1128);

$proto1126["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1126);

$proto1113["m_fromlist"][]=$obj;
$proto1113["m_groupby"] = array();
$proto1113["m_orderby"] = array();
$obj = new SQLQuery($proto1113);

$queryData_planos_discagem = $obj;
$tdataplanos_discagem[".sqlquery"] = $queryData_planos_discagem;



?>
