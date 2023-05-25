<?php

//	field labels
$fieldLabelscc_menu_atend_item = array();
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]=array();
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["id_item"] = "Identificação do Item";
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["id_menu"] = "Identificação do Menu";
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["opc_dig"] = "Digito";
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["prefixo"] = "Prefixo";
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["id_cod_gen"] = "Destino";
$fieldLabelscc_menu_atend_item["Portuguese(Brazil)"]["rdb_opcao"] = "Ação do item de menu";


$tdatacc_menu_atend_item=array();
	$tdatacc_menu_atend_item[".NumberOfChars"]=80; 
	$tdatacc_menu_atend_item[".ShortName"]="cc_menu_atend_item";
	$tdatacc_menu_atend_item[".OwnerID"]="";
	$tdatacc_menu_atend_item[".OriginalTable"]="cc_menu_atend_item";
	$tdatacc_menu_atend_item[".NCSearch"]=true;
	

$tdatacc_menu_atend_item[".shortTableName"] = "cc_menu_atend_item";
$tdatacc_menu_atend_item[".dataSourceTable"] = "cc_menu_atend_item";
$tdatacc_menu_atend_item[".nSecOptions"] = 0;
$tdatacc_menu_atend_item[".nLoginMethod"] = 1;
$tdatacc_menu_atend_item[".recsPerRowList"] = 1;	
$tdatacc_menu_atend_item[".tableGroupBy"] = "0";
$tdatacc_menu_atend_item[".dbType"] = 0;
$tdatacc_menu_atend_item[".mainTableOwnerID"] = "";
$tdatacc_menu_atend_item[".moveNext"] = 1;

$tdatacc_menu_atend_item[".listAjax"] = true;

	$tdatacc_menu_atend_item[".audit"] = true;

	$tdatacc_menu_atend_item[".locking"] = false;
	
$tdatacc_menu_atend_item[".listIcons"] = true;
$tdatacc_menu_atend_item[".inlineEdit"] = true;




$tdatacc_menu_atend_item[".showSimpleSearchOptions"] = false;

$tdatacc_menu_atend_item[".showSearchPanel"] = true;


$tdatacc_menu_atend_item[".isUseAjaxSuggest"] = true;

$tdatacc_menu_atend_item[".rowHighlite"] = true;

$tdatacc_menu_atend_item[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_menu_atend_item[".arrKeyFields"][] = "id_item";

// use datepicker for search panel
$tdatacc_menu_atend_item[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_menu_atend_item[".isUseTimeForSearch"] = false;






$tdatacc_menu_atend_item[".isUseInlineEdit"] = true;
$tdatacc_menu_atend_item[".isUseInlineJs"] = $tdatacc_menu_atend_item[".isUseInlineAdd"] || $tdatacc_menu_atend_item[".isUseInlineEdit"];

$tdatacc_menu_atend_item[".allSearchFields"] = array();



$tdatacc_menu_atend_item[".isDynamicPerm"] = true;

	

$tdatacc_menu_atend_item[".isDisplayLoading"] = true;

$tdatacc_menu_atend_item[".isResizeColumns"] = false;


$tdatacc_menu_atend_item[".createLoginPage"] = true;


 	




$tdatacc_menu_atend_item[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY opc_dig";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_menu_atend_item[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_menu_atend_item[".orderindexes"] = array();
$tdatacc_menu_atend_item[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "opc_dig");

$tdatacc_menu_atend_item[".sqlHead"] = "SELECT id_item,  id_menu,  opc_dig,  id_cod_gen,  prefixo,  rdb_opcao";

$tdatacc_menu_atend_item[".sqlFrom"] = "FROM cc_menu_atend_item";

$tdatacc_menu_atend_item[".sqlWhereExpr"] = "";

$tdatacc_menu_atend_item[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_item";
	$tdatacc_menu_atend_item[".Keys"]=$tableKeys;

	
//	id_item
	$fdata = array();
	$fdata["strName"] = "id_item";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Identificação do Item"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_item";
		$fdata["FullName"]= "id_item";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_menu_atend_item["id_item"]=$fdata;
	
//	id_menu
	$fdata = array();
	$fdata["strName"] = "id_menu";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Identificação do Menu"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_menu";
		$fdata["FullName"]= "id_menu";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdatacc_menu_atend_item["id_menu"]=$fdata;
	
//	opc_dig
	$fdata = array();
	$fdata["strName"] = "opc_dig";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Digito"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
	$fdata["LookupValues"][]="0";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "opc_dig";
		$fdata["FullName"]= "opc_dig";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_menu_atend_item["opc_dig"]=$fdata;
	
//	id_cod_gen
	$fdata = array();
	$fdata["strName"] = "id_cod_gen";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="Identificador";
	$fdata["LinkFieldType"]=13;
	$fdata["DisplayField"]="dsc_item";
				$fdata["LookupTable"]="v_cc_menu_atend_opcao";
	$fdata["LookupOrderBy"]="dsc_item";
							$fdata["LookupWhere"] = "dsc_item is not null";

				$fdata["UseCategory"]=true; 
	$fdata["CategoryControl"]="rdb_opcao"; 
	$fdata["CategoryFilter"]="item"; 
	
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_cod_gen";
		$fdata["FullName"]= "id_cod_gen";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_menu_atend_item["id_cod_gen"]=$fdata;
	
//	prefixo
	$fdata = array();
	$fdata["strName"] = "prefixo";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Prefixo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_desv_prefix";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_grp_pref";
				$fdata["LookupTable"]="ipbx_desv_prefix";
	$fdata["LookupOrderBy"]="dsc_grp_pref";
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "prefixo";
		$fdata["FullName"]= "prefixo";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_menu_atend_item["prefixo"]=$fdata;
	
//	rdb_opcao
	$fdata = array();
	$fdata["strName"] = "rdb_opcao";
	$fdata["ownerTable"] = "cc_menu_atend_item";
		$fdata["Label"]="Ação do item de menu"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="item";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="comentario";
				$fdata["LookupTable"]="v_cc_menu_atend_opcao";
	$fdata["LookupOrderBy"]="comentario";
						
				
										$fdata["SimpleAdd"]=true;
	
				//	dependent dropdowns	
	$fdata["DependentLookups"]=array();
	$fdata["DependentLookups"][]="id_cod_gen";
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "rdb_opcao";
		$fdata["FullName"]= "rdb_opcao";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_menu_atend_item["rdb_opcao"]=$fdata;

	
$tables_data["cc_menu_atend_item"]=&$tdatacc_menu_atend_item;
$field_labels["cc_menu_atend_item"] = &$fieldLabelscc_menu_atend_item;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_menu_atend_item"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_menu_atend_item"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="cc_menu_atend";
	$masterTablesData["cc_menu_atend_item"][$mIndex] = array(
		  "mDataSourceTable"=>"cc_menu_atend"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "cc_menu_atend"
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
		$masterTablesData["cc_menu_atend_item"][$mIndex]["masterKeys"][]="id_menu";
		$masterTablesData["cc_menu_atend_item"][$mIndex]["detailKeys"][]="id_menu";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3082=array();
$proto3082["m_strHead"] = "SELECT";
$proto3082["m_strFieldList"] = "id_item,  id_menu,  opc_dig,  id_cod_gen,  prefixo,  rdb_opcao";
$proto3082["m_strFrom"] = "FROM cc_menu_atend_item";
$proto3082["m_strWhere"] = "";
$proto3082["m_strOrderBy"] = "ORDER BY opc_dig";
$proto3082["m_strTail"] = "";
$proto3083=array();
$proto3083["m_sql"] = "";
$proto3083["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3083["m_column"]=$obj;
$proto3083["m_contained"] = array();
$proto3083["m_strCase"] = "";
$proto3083["m_havingmode"] = "0";
$proto3083["m_inBrackets"] = "0";
$proto3083["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3083);

$proto3082["m_where"] = $obj;
$proto3085=array();
$proto3085["m_sql"] = "";
$proto3085["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3085["m_column"]=$obj;
$proto3085["m_contained"] = array();
$proto3085["m_strCase"] = "";
$proto3085["m_havingmode"] = "0";
$proto3085["m_inBrackets"] = "0";
$proto3085["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3085);

$proto3082["m_having"] = $obj;
$proto3082["m_fieldlist"] = array();
						$proto3087=array();
			$obj = new SQLField(array(
	"m_strName" => "id_item",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3087["m_expr"]=$obj;
$proto3087["m_alias"] = "";
$obj = new SQLFieldListItem($proto3087);

$proto3082["m_fieldlist"][]=$obj;
						$proto3089=array();
			$obj = new SQLField(array(
	"m_strName" => "id_menu",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3089["m_expr"]=$obj;
$proto3089["m_alias"] = "";
$obj = new SQLFieldListItem($proto3089);

$proto3082["m_fieldlist"][]=$obj;
						$proto3091=array();
			$obj = new SQLField(array(
	"m_strName" => "opc_dig",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3091["m_expr"]=$obj;
$proto3091["m_alias"] = "";
$obj = new SQLFieldListItem($proto3091);

$proto3082["m_fieldlist"][]=$obj;
						$proto3093=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cod_gen",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3093["m_expr"]=$obj;
$proto3093["m_alias"] = "";
$obj = new SQLFieldListItem($proto3093);

$proto3082["m_fieldlist"][]=$obj;
						$proto3095=array();
			$obj = new SQLField(array(
	"m_strName" => "prefixo",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3095["m_expr"]=$obj;
$proto3095["m_alias"] = "";
$obj = new SQLFieldListItem($proto3095);

$proto3082["m_fieldlist"][]=$obj;
						$proto3097=array();
			$obj = new SQLField(array(
	"m_strName" => "rdb_opcao",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3097["m_expr"]=$obj;
$proto3097["m_alias"] = "";
$obj = new SQLFieldListItem($proto3097);

$proto3082["m_fieldlist"][]=$obj;
$proto3082["m_fromlist"] = array();
												$proto3099=array();
$proto3099["m_link"] = "SQLL_MAIN";
			$proto3100=array();
$proto3100["m_strName"] = "cc_menu_atend_item";
$proto3100["m_columns"] = array();
$proto3100["m_columns"][] = "id_item";
$proto3100["m_columns"][] = "id_menu";
$proto3100["m_columns"][] = "opc_dig";
$proto3100["m_columns"][] = "id_cod_gen";
$proto3100["m_columns"][] = "prefixo";
$proto3100["m_columns"][] = "rdb_opcao";
$obj = new SQLTable($proto3100);

$proto3099["m_table"] = $obj;
$proto3099["m_alias"] = "";
$proto3101=array();
$proto3101["m_sql"] = "";
$proto3101["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3101["m_column"]=$obj;
$proto3101["m_contained"] = array();
$proto3101["m_strCase"] = "";
$proto3101["m_havingmode"] = "0";
$proto3101["m_inBrackets"] = "0";
$proto3101["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3101);

$proto3099["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3099);

$proto3082["m_fromlist"][]=$obj;
$proto3082["m_groupby"] = array();
$proto3082["m_orderby"] = array();
												$proto3103=array();
						$obj = new SQLField(array(
	"m_strName" => "opc_dig",
	"m_strTable" => "cc_menu_atend_item"
));

$proto3103["m_column"]=$obj;
$proto3103["m_bAsc"] = 1;
$proto3103["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto3103);

$proto3082["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto3082);

$queryData_cc_menu_atend_item = $obj;
$tdatacc_menu_atend_item[".sqlquery"] = $queryData_cc_menu_atend_item;



?>
