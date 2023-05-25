<?php

//	field labels
$fieldLabelsplano_discagem_regiao = array();
$fieldLabelsplano_discagem_regiao["Portuguese(Brazil)"]=array();
$fieldLabelsplano_discagem_regiao["Portuguese(Brazil)"]["id_regiao"] = "Id Regiao";
$fieldLabelsplano_discagem_regiao["Portuguese(Brazil)"]["regiao"] = "Região";
$fieldLabelsplano_discagem_regiao["Portuguese(Brazil)"]["id_tronco"] = "Tronco de saída padrão";
$fieldLabelsplano_discagem_regiao["Portuguese(Brazil)"]["tp_destino"] = "Destino";


$tdataplano_discagem_regiao=array();
	$tdataplano_discagem_regiao[".NumberOfChars"]=80; 
	$tdataplano_discagem_regiao[".ShortName"]="plano_discagem_regiao";
	$tdataplano_discagem_regiao[".OwnerID"]="";
	$tdataplano_discagem_regiao[".OriginalTable"]="plano_discagem_regiao";
	$tdataplano_discagem_regiao[".NCSearch"]=true;
	

$tdataplano_discagem_regiao[".shortTableName"] = "plano_discagem_regiao";
$tdataplano_discagem_regiao[".dataSourceTable"] = "plano_discagem_regiao";
$tdataplano_discagem_regiao[".nSecOptions"] = 0;
$tdataplano_discagem_regiao[".nLoginMethod"] = 1;
$tdataplano_discagem_regiao[".recsPerRowList"] = 1;	
$tdataplano_discagem_regiao[".tableGroupBy"] = "0";
$tdataplano_discagem_regiao[".dbType"] = 0;
$tdataplano_discagem_regiao[".mainTableOwnerID"] = "";
$tdataplano_discagem_regiao[".moveNext"] = 1;

$tdataplano_discagem_regiao[".listAjax"] = false;

	$tdataplano_discagem_regiao[".audit"] = true;

	$tdataplano_discagem_regiao[".locking"] = false;
	
$tdataplano_discagem_regiao[".listIcons"] = true;
$tdataplano_discagem_regiao[".edit"] = true;
$tdataplano_discagem_regiao[".inlineEdit"] = true;



$tdataplano_discagem_regiao[".delete"] = true;

$tdataplano_discagem_regiao[".showSimpleSearchOptions"] = false;

$tdataplano_discagem_regiao[".showSearchPanel"] = true;


$tdataplano_discagem_regiao[".isUseAjaxSuggest"] = true;

$tdataplano_discagem_regiao[".rowHighlite"] = true;

$tdataplano_discagem_regiao[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataplano_discagem_regiao[".arrKeyFields"][] = "id_regiao";

// use datepicker for search panel
$tdataplano_discagem_regiao[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataplano_discagem_regiao[".isUseTimeForSearch"] = false;




$tdataplano_discagem_regiao[".useDetailsPreview"] = true;	

$tdataplano_discagem_regiao[".isUseInlineAdd"] = true;

$tdataplano_discagem_regiao[".isUseInlineEdit"] = true;
$tdataplano_discagem_regiao[".isUseInlineJs"] = $tdataplano_discagem_regiao[".isUseInlineAdd"] || $tdataplano_discagem_regiao[".isUseInlineEdit"];

$tdataplano_discagem_regiao[".allSearchFields"] = array();



$tdataplano_discagem_regiao[".isDynamicPerm"] = true;

	

$tdataplano_discagem_regiao[".isDisplayLoading"] = true;

$tdataplano_discagem_regiao[".isResizeColumns"] = false;


$tdataplano_discagem_regiao[".createLoginPage"] = true;


 	
	$tdataplano_discagem_regiao[".subQueriesSupAccess"] = true;




$tdataplano_discagem_regiao[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataplano_discagem_regiao[".strOrderBy"] = $gstrOrderBy;
	
$tdataplano_discagem_regiao[".orderindexes"] = array();

$tdataplano_discagem_regiao[".sqlHead"] = "SELECT id_regiao,   regiao,   id_tronco,   tp_destino";

$tdataplano_discagem_regiao[".sqlFrom"] = "FROM plano_discagem_regiao";

$tdataplano_discagem_regiao[".sqlWhereExpr"] = "";

$tdataplano_discagem_regiao[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_regiao";
	$tdataplano_discagem_regiao[".Keys"]=$tableKeys;

	
//	id_regiao
	$fdata = array();
	$fdata["strName"] = "id_regiao";
	$fdata["ownerTable"] = "plano_discagem_regiao";
		$fdata["Label"]="Id Regiao"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_regiao";
		$fdata["FullName"]= "id_regiao";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataplano_discagem_regiao["id_regiao"]=$fdata;
	
//	regiao
	$fdata = array();
	$fdata["strName"] = "regiao";
	$fdata["ownerTable"] = "plano_discagem_regiao";
		$fdata["Label"]="Região"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="AC";
	$fdata["LookupValues"][]="AM";
	$fdata["LookupValues"][]="DF";
	$fdata["LookupValues"][]="MA";
	$fdata["LookupValues"][]="MG";
	$fdata["LookupValues"][]="PR";
	$fdata["LookupValues"][]="RJ";
	$fdata["LookupValues"][]="RO";
	$fdata["LookupValues"][]="SP";
	$fdata["LookupValues"][]="AL";
	$fdata["LookupValues"][]="BA";
	$fdata["LookupValues"][]="ES";
	$fdata["LookupValues"][]="MT";
	$fdata["LookupValues"][]="PA";
	$fdata["LookupValues"][]="PE";
	$fdata["LookupValues"][]="RN";
	$fdata["LookupValues"][]="RR";
	$fdata["LookupValues"][]="SE";
	$fdata["LookupValues"][]="AP";
	$fdata["LookupValues"][]="CE";
	$fdata["LookupValues"][]="GO";
	$fdata["LookupValues"][]="MT";
	$fdata["LookupValues"][]="PA";
	$fdata["LookupValues"][]="PI";
	$fdata["LookupValues"][]="RS";
	$fdata["LookupValues"][]="SC";
	$fdata["LookupValues"][]="TO";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "regiao";
		$fdata["FullName"]= "regiao";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataplano_discagem_regiao["regiao"]=$fdata;
	
//	id_tronco
	$fdata = array();
	$fdata["strName"] = "id_tronco";
	$fdata["ownerTable"] = "plano_discagem_regiao";
		$fdata["Label"]="Tronco de saída padrão"; 
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
			$tdataplano_discagem_regiao["id_tronco"]=$fdata;
	
//	tp_destino
	$fdata = array();
	$fdata["strName"] = "tp_destino";
	$fdata["ownerTable"] = "plano_discagem_regiao";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="LOCAL";
	$fdata["LookupValues"][]="CELULAR";
	$fdata["LookupValues"][]="DDD";
	$fdata["LookupValues"][]="DDI";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_destino";
		$fdata["FullName"]= "tp_destino";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataplano_discagem_regiao["tp_destino"]=$fdata;

	
$tables_data["plano_discagem_regiao"]=&$tdataplano_discagem_regiao;
$field_labels["plano_discagem_regiao"] = &$fieldLabelsplano_discagem_regiao;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["plano_discagem_regiao"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="planos_discagem";
	$detailsTablesData["plano_discagem_regiao"][$dIndex] = array(
		  "dDataSourceTable"=>"planos_discagem"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"planos_discagem"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_plano,   DDD,   id_tronco,   id_regiao"	
		, "sqlFrom"=>"FROM planos_discagem"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["plano_discagem_regiao"][$dIndex]["masterKeys"][]="id_regiao";
		$detailsTablesData["plano_discagem_regiao"][$dIndex]["detailKeys"][]="id_regiao";


	
// tables which are master tables for current table (detail)
$masterTablesData["plano_discagem_regiao"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1096=array();
$proto1096["m_strHead"] = "SELECT";
$proto1096["m_strFieldList"] = "id_regiao,   regiao,   id_tronco,   tp_destino";
$proto1096["m_strFrom"] = "FROM plano_discagem_regiao";
$proto1096["m_strWhere"] = "";
$proto1096["m_strOrderBy"] = "";
$proto1096["m_strTail"] = "";
$proto1097=array();
$proto1097["m_sql"] = "";
$proto1097["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1097["m_column"]=$obj;
$proto1097["m_contained"] = array();
$proto1097["m_strCase"] = "";
$proto1097["m_havingmode"] = "0";
$proto1097["m_inBrackets"] = "0";
$proto1097["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1097);

$proto1096["m_where"] = $obj;
$proto1099=array();
$proto1099["m_sql"] = "";
$proto1099["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1099["m_column"]=$obj;
$proto1099["m_contained"] = array();
$proto1099["m_strCase"] = "";
$proto1099["m_havingmode"] = "0";
$proto1099["m_inBrackets"] = "0";
$proto1099["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1099);

$proto1096["m_having"] = $obj;
$proto1096["m_fieldlist"] = array();
						$proto1101=array();
			$obj = new SQLField(array(
	"m_strName" => "id_regiao",
	"m_strTable" => "plano_discagem_regiao"
));

$proto1101["m_expr"]=$obj;
$proto1101["m_alias"] = "";
$obj = new SQLFieldListItem($proto1101);

$proto1096["m_fieldlist"][]=$obj;
						$proto1103=array();
			$obj = new SQLField(array(
	"m_strName" => "regiao",
	"m_strTable" => "plano_discagem_regiao"
));

$proto1103["m_expr"]=$obj;
$proto1103["m_alias"] = "";
$obj = new SQLFieldListItem($proto1103);

$proto1096["m_fieldlist"][]=$obj;
						$proto1105=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tronco",
	"m_strTable" => "plano_discagem_regiao"
));

$proto1105["m_expr"]=$obj;
$proto1105["m_alias"] = "";
$obj = new SQLFieldListItem($proto1105);

$proto1096["m_fieldlist"][]=$obj;
						$proto1107=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_destino",
	"m_strTable" => "plano_discagem_regiao"
));

$proto1107["m_expr"]=$obj;
$proto1107["m_alias"] = "";
$obj = new SQLFieldListItem($proto1107);

$proto1096["m_fieldlist"][]=$obj;
$proto1096["m_fromlist"] = array();
												$proto1109=array();
$proto1109["m_link"] = "SQLL_MAIN";
			$proto1110=array();
$proto1110["m_strName"] = "plano_discagem_regiao";
$proto1110["m_columns"] = array();
$proto1110["m_columns"][] = "id_regiao";
$proto1110["m_columns"][] = "regiao";
$proto1110["m_columns"][] = "id_tronco";
$proto1110["m_columns"][] = "tp_destino";
$obj = new SQLTable($proto1110);

$proto1109["m_table"] = $obj;
$proto1109["m_alias"] = "";
$proto1111=array();
$proto1111["m_sql"] = "";
$proto1111["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1111["m_column"]=$obj;
$proto1111["m_contained"] = array();
$proto1111["m_strCase"] = "";
$proto1111["m_havingmode"] = "0";
$proto1111["m_inBrackets"] = "0";
$proto1111["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1111);

$proto1109["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1109);

$proto1096["m_fromlist"][]=$obj;
$proto1096["m_groupby"] = array();
$proto1096["m_orderby"] = array();
$obj = new SQLQuery($proto1096);

$queryData_plano_discagem_regiao = $obj;
$tdataplano_discagem_regiao[".sqlquery"] = $queryData_plano_discagem_regiao;



?>
