<?php

//	field labels
$fieldLabelscc_receptivo_agentes = array();
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]=array();
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["id_agente"] = "Login";
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["nm_agente"] = "Nome Agente";
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["penalidade"] = "Penalidade";
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["id_fila"] = "Fila";
$fieldLabelscc_receptivo_agentes["Portuguese(Brazil)"]["id_cc_rec_agentes"] = "ID";


$tdatacc_receptivo_agentes=array();
	$tdatacc_receptivo_agentes[".NumberOfChars"]=80; 
	$tdatacc_receptivo_agentes[".ShortName"]="cc_receptivo_agentes";
	$tdatacc_receptivo_agentes[".OwnerID"]="";
	$tdatacc_receptivo_agentes[".OriginalTable"]="cc_receptivo_agentes";
	$tdatacc_receptivo_agentes[".NCSearch"]=true;
	

$tdatacc_receptivo_agentes[".shortTableName"] = "cc_receptivo_agentes";
$tdatacc_receptivo_agentes[".dataSourceTable"] = "cc_receptivo_agentes";
$tdatacc_receptivo_agentes[".nSecOptions"] = 0;
$tdatacc_receptivo_agentes[".nLoginMethod"] = 1;
$tdatacc_receptivo_agentes[".recsPerRowList"] = 1;	
$tdatacc_receptivo_agentes[".tableGroupBy"] = "0";
$tdatacc_receptivo_agentes[".dbType"] = 0;
$tdatacc_receptivo_agentes[".mainTableOwnerID"] = "";
$tdatacc_receptivo_agentes[".moveNext"] = 1;

$tdatacc_receptivo_agentes[".listAjax"] = true;

	$tdatacc_receptivo_agentes[".audit"] = true;

	$tdatacc_receptivo_agentes[".locking"] = false;
	
$tdatacc_receptivo_agentes[".listIcons"] = true;
$tdatacc_receptivo_agentes[".inlineEdit"] = true;



$tdatacc_receptivo_agentes[".delete"] = true;

$tdatacc_receptivo_agentes[".showSimpleSearchOptions"] = false;

$tdatacc_receptivo_agentes[".showSearchPanel"] = true;


$tdatacc_receptivo_agentes[".isUseAjaxSuggest"] = true;

$tdatacc_receptivo_agentes[".rowHighlite"] = true;

$tdatacc_receptivo_agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_receptivo_agentes[".arrKeyFields"][] = "id_cc_rec_agentes";

// use datepicker for search panel
$tdatacc_receptivo_agentes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_receptivo_agentes[".isUseTimeForSearch"] = false;





$tdatacc_receptivo_agentes[".isUseInlineAdd"] = true;

$tdatacc_receptivo_agentes[".isUseInlineEdit"] = true;
$tdatacc_receptivo_agentes[".isUseInlineJs"] = $tdatacc_receptivo_agentes[".isUseInlineAdd"] || $tdatacc_receptivo_agentes[".isUseInlineEdit"];

$tdatacc_receptivo_agentes[".allSearchFields"] = array();



$tdatacc_receptivo_agentes[".isDynamicPerm"] = true;

	

$tdatacc_receptivo_agentes[".isDisplayLoading"] = true;

$tdatacc_receptivo_agentes[".isResizeColumns"] = false;


$tdatacc_receptivo_agentes[".createLoginPage"] = true;


 	




$tdatacc_receptivo_agentes[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_receptivo_agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_receptivo_agentes[".orderindexes"] = array();

$tdatacc_receptivo_agentes[".sqlHead"] = "SELECT id_cc_rec_agentes,   id_agente,   nm_agente,   penalidade,   senha,   id_fila";

$tdatacc_receptivo_agentes[".sqlFrom"] = "FROM cc_receptivo_agentes";

$tdatacc_receptivo_agentes[".sqlWhereExpr"] = "";

$tdatacc_receptivo_agentes[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_cc_rec_agentes";
	$tdatacc_receptivo_agentes[".Keys"]=$tableKeys;

	
//	id_cc_rec_agentes
	$fdata = array();
	$fdata["strName"] = "id_cc_rec_agentes";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
		$fdata["Label"]="ID"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_cc_rec_agentes";
		$fdata["FullName"]= "id_cc_rec_agentes";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_receptivo_agentes["id_cc_rec_agentes"]=$fdata;
	
//	id_agente
	$fdata = array();
	$fdata["strName"] = "id_agente";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
		$fdata["Label"]="Login"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_agente";
		$fdata["FullName"]= "id_agente";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_agentes["id_agente"]=$fdata;
	
//	nm_agente
	$fdata = array();
	$fdata["strName"] = "nm_agente";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
		$fdata["Label"]="Nome Agente"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_agente";
		$fdata["FullName"]= "nm_agente";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_agentes["nm_agente"]=$fdata;
	
//	penalidade
	$fdata = array();
	$fdata["strName"] = "penalidade";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
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
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_agentes["penalidade"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=5";
			$fdata["EditParams"].= " size=5";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_agentes["senha"]=$fdata;
	
//	id_fila
	$fdata = array();
	$fdata["strName"] = "id_fila";
	$fdata["ownerTable"] = "cc_receptivo_agentes";
		$fdata["Label"]="Fila"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_filas";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_fila";
				$fdata["LookupTable"]="cc_receptivo_filas";
	$fdata["LookupOrderBy"]="estrategia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_fila";
		$fdata["FullName"]= "id_fila";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_agentes["id_fila"]=$fdata;

	
$tables_data["cc_receptivo_agentes"]=&$tdatacc_receptivo_agentes;
$field_labels["cc_receptivo_agentes"] = &$fieldLabelscc_receptivo_agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_receptivo_agentes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_receptivo_agentes"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="cc_receptivo_filas";
	$masterTablesData["cc_receptivo_agentes"][$mIndex] = array(
		  "mDataSourceTable"=>"cc_receptivo_filas"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "cc_receptivo_filas"
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
		$masterTablesData["cc_receptivo_agentes"][$mIndex]["masterKeys"][]="id_filas";
		$masterTablesData["cc_receptivo_agentes"][$mIndex]["detailKeys"][]="id_fila";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2345=array();
$proto2345["m_strHead"] = "SELECT";
$proto2345["m_strFieldList"] = "id_cc_rec_agentes,   id_agente,   nm_agente,   penalidade,   senha,   id_fila";
$proto2345["m_strFrom"] = "FROM cc_receptivo_agentes";
$proto2345["m_strWhere"] = "";
$proto2345["m_strOrderBy"] = "";
$proto2345["m_strTail"] = "";
$proto2346=array();
$proto2346["m_sql"] = "";
$proto2346["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2346["m_column"]=$obj;
$proto2346["m_contained"] = array();
$proto2346["m_strCase"] = "";
$proto2346["m_havingmode"] = "0";
$proto2346["m_inBrackets"] = "0";
$proto2346["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2346);

$proto2345["m_where"] = $obj;
$proto2348=array();
$proto2348["m_sql"] = "";
$proto2348["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2348["m_column"]=$obj;
$proto2348["m_contained"] = array();
$proto2348["m_strCase"] = "";
$proto2348["m_havingmode"] = "0";
$proto2348["m_inBrackets"] = "0";
$proto2348["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2348);

$proto2345["m_having"] = $obj;
$proto2345["m_fieldlist"] = array();
						$proto2350=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cc_rec_agentes",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2350["m_expr"]=$obj;
$proto2350["m_alias"] = "";
$obj = new SQLFieldListItem($proto2350);

$proto2345["m_fieldlist"][]=$obj;
						$proto2352=array();
			$obj = new SQLField(array(
	"m_strName" => "id_agente",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2352["m_expr"]=$obj;
$proto2352["m_alias"] = "";
$obj = new SQLFieldListItem($proto2352);

$proto2345["m_fieldlist"][]=$obj;
						$proto2354=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_agente",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2354["m_expr"]=$obj;
$proto2354["m_alias"] = "";
$obj = new SQLFieldListItem($proto2354);

$proto2345["m_fieldlist"][]=$obj;
						$proto2356=array();
			$obj = new SQLField(array(
	"m_strName" => "penalidade",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2356["m_expr"]=$obj;
$proto2356["m_alias"] = "";
$obj = new SQLFieldListItem($proto2356);

$proto2345["m_fieldlist"][]=$obj;
						$proto2358=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2358["m_expr"]=$obj;
$proto2358["m_alias"] = "";
$obj = new SQLFieldListItem($proto2358);

$proto2345["m_fieldlist"][]=$obj;
						$proto2360=array();
			$obj = new SQLField(array(
	"m_strName" => "id_fila",
	"m_strTable" => "cc_receptivo_agentes"
));

$proto2360["m_expr"]=$obj;
$proto2360["m_alias"] = "";
$obj = new SQLFieldListItem($proto2360);

$proto2345["m_fieldlist"][]=$obj;
$proto2345["m_fromlist"] = array();
												$proto2362=array();
$proto2362["m_link"] = "SQLL_MAIN";
			$proto2363=array();
$proto2363["m_strName"] = "cc_receptivo_agentes";
$proto2363["m_columns"] = array();
$proto2363["m_columns"][] = "id_cc_rec_agentes";
$proto2363["m_columns"][] = "id_agente";
$proto2363["m_columns"][] = "nm_agente";
$proto2363["m_columns"][] = "penalidade";
$proto2363["m_columns"][] = "senha";
$proto2363["m_columns"][] = "id_fila";
$obj = new SQLTable($proto2363);

$proto2362["m_table"] = $obj;
$proto2362["m_alias"] = "";
$proto2364=array();
$proto2364["m_sql"] = "";
$proto2364["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2364["m_column"]=$obj;
$proto2364["m_contained"] = array();
$proto2364["m_strCase"] = "";
$proto2364["m_havingmode"] = "0";
$proto2364["m_inBrackets"] = "0";
$proto2364["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2364);

$proto2362["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2362);

$proto2345["m_fromlist"][]=$obj;
$proto2345["m_groupby"] = array();
$proto2345["m_orderby"] = array();
$obj = new SQLQuery($proto2345);

$queryData_cc_receptivo_agentes = $obj;
$tdatacc_receptivo_agentes[".sqlquery"] = $queryData_cc_receptivo_agentes;



?>
