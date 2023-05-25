<?php

//	field labels
$fieldLabelscontrato_gsm = array();
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]=array();
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["num_contrato"] = "Número do Contrato";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["nm_operadora"] = "Nome da Operadora";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["Vingencia"] = "Vingência";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["flg_ativo"] = "Contrato Ativo";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["VC1_CAD"] = "VC1 Cadência";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["VC1_VLR"] = "VC1 Valor";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["VC2VC3_CAD"] = "VC2VC3 Cadência";
$fieldLabelscontrato_gsm["Portuguese(Brazil)"]["VC2VC3_VLR"] = "VC2VC3 Valor";


$tdatacontrato_gsm=array();
	$tdatacontrato_gsm[".NumberOfChars"]=80; 
	$tdatacontrato_gsm[".ShortName"]="contrato_gsm";
	$tdatacontrato_gsm[".OwnerID"]="";
	$tdatacontrato_gsm[".OriginalTable"]="contrato_gsm";
	$tdatacontrato_gsm[".NCSearch"]=true;
	

$tdatacontrato_gsm[".shortTableName"] = "contrato_gsm";
$tdatacontrato_gsm[".dataSourceTable"] = "contrato_gsm";
$tdatacontrato_gsm[".nSecOptions"] = 0;
$tdatacontrato_gsm[".nLoginMethod"] = 1;
$tdatacontrato_gsm[".recsPerRowList"] = 1;	
$tdatacontrato_gsm[".tableGroupBy"] = "0";
$tdatacontrato_gsm[".dbType"] = 0;
$tdatacontrato_gsm[".mainTableOwnerID"] = "";
$tdatacontrato_gsm[".moveNext"] = 1;

$tdatacontrato_gsm[".listAjax"] = true;

	$tdatacontrato_gsm[".audit"] = true;

	$tdatacontrato_gsm[".locking"] = false;
	
$tdatacontrato_gsm[".listIcons"] = true;
$tdatacontrato_gsm[".edit"] = true;



$tdatacontrato_gsm[".delete"] = true;

$tdatacontrato_gsm[".showSimpleSearchOptions"] = false;

$tdatacontrato_gsm[".showSearchPanel"] = true;


$tdatacontrato_gsm[".isUseAjaxSuggest"] = true;

$tdatacontrato_gsm[".rowHighlite"] = true;

$tdatacontrato_gsm[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacontrato_gsm[".arrKeyFields"][] = "id_contrato";

// use datepicker for search panel
$tdatacontrato_gsm[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatacontrato_gsm[".isUseTimeForSearch"] = false;






$tdatacontrato_gsm[".isUseInlineJs"] = $tdatacontrato_gsm[".isUseInlineAdd"] || $tdatacontrato_gsm[".isUseInlineEdit"];

$tdatacontrato_gsm[".allSearchFields"] = array();



$tdatacontrato_gsm[".isDynamicPerm"] = true;

	

$tdatacontrato_gsm[".isDisplayLoading"] = true;

$tdatacontrato_gsm[".isResizeColumns"] = false;


$tdatacontrato_gsm[".createLoginPage"] = true;


 	




$tdatacontrato_gsm[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacontrato_gsm[".strOrderBy"] = $gstrOrderBy;
	
$tdatacontrato_gsm[".orderindexes"] = array();

$tdatacontrato_gsm[".sqlHead"] = "SELECT id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  VC1_CAD,  VC1_VLR,  VC2VC3_CAD,  VC2VC3_VLR";

$tdatacontrato_gsm[".sqlFrom"] = "FROM contrato_gsm";

$tdatacontrato_gsm[".sqlWhereExpr"] = "";

$tdatacontrato_gsm[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_contrato";
	$tdatacontrato_gsm[".Keys"]=$tableKeys;

	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacontrato_gsm["id_contrato"]=$fdata;
	
//	num_contrato
	$fdata = array();
	$fdata["strName"] = "num_contrato";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="Número do Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "num_contrato";
		$fdata["FullName"]= "num_contrato";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_gsm["num_contrato"]=$fdata;
	
//	nm_operadora
	$fdata = array();
	$fdata["strName"] = "nm_operadora";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="Nome da Operadora"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_operadora";
		$fdata["FullName"]= "nm_operadora";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=40";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_gsm["nm_operadora"]=$fdata;
	
//	Vingencia
	$fdata = array();
	$fdata["strName"] = "Vingencia";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="Vingência"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Vingencia";
		$fdata["FullName"]= "Vingencia";
						$fdata["Index"]= 4;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_gsm["Vingencia"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="Contrato Ativo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_gsm["flg_ativo"]=$fdata;
	
//	VC1_CAD
	$fdata = array();
	$fdata["strName"] = "VC1_CAD";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="VC1 Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "VC1_CAD";
		$fdata["FullName"]= "VC1_CAD";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_gsm["VC1_CAD"]=$fdata;
	
//	VC1_VLR
	$fdata = array();
	$fdata["strName"] = "VC1_VLR";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="VC1 Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "VC1_VLR";
		$fdata["FullName"]= "VC1_VLR";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_gsm["VC1_VLR"]=$fdata;
	
//	VC2VC3_CAD
	$fdata = array();
	$fdata["strName"] = "VC2VC3_CAD";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="VC2VC3 Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "VC2VC3_CAD";
		$fdata["FullName"]= "VC2VC3_CAD";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_gsm["VC2VC3_CAD"]=$fdata;
	
//	VC2VC3_VLR
	$fdata = array();
	$fdata["strName"] = "VC2VC3_VLR";
	$fdata["ownerTable"] = "contrato_gsm";
		$fdata["Label"]="VC2VC3 Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "VC2VC3_VLR";
		$fdata["FullName"]= "VC2VC3_VLR";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_gsm["VC2VC3_VLR"]=$fdata;

	
$tables_data["contrato_gsm"]=&$tdatacontrato_gsm;
$field_labels["contrato_gsm"] = &$fieldLabelscontrato_gsm;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["contrato_gsm"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["contrato_gsm"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3043=array();
$proto3043["m_strHead"] = "SELECT";
$proto3043["m_strFieldList"] = "id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  VC1_CAD,  VC1_VLR,  VC2VC3_CAD,  VC2VC3_VLR";
$proto3043["m_strFrom"] = "FROM contrato_gsm";
$proto3043["m_strWhere"] = "";
$proto3043["m_strOrderBy"] = "";
$proto3043["m_strTail"] = "";
$proto3044=array();
$proto3044["m_sql"] = "";
$proto3044["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3044["m_column"]=$obj;
$proto3044["m_contained"] = array();
$proto3044["m_strCase"] = "";
$proto3044["m_havingmode"] = "0";
$proto3044["m_inBrackets"] = "0";
$proto3044["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3044);

$proto3043["m_where"] = $obj;
$proto3046=array();
$proto3046["m_sql"] = "";
$proto3046["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3046["m_column"]=$obj;
$proto3046["m_contained"] = array();
$proto3046["m_strCase"] = "";
$proto3046["m_havingmode"] = "0";
$proto3046["m_inBrackets"] = "0";
$proto3046["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3046);

$proto3043["m_having"] = $obj;
$proto3043["m_fieldlist"] = array();
						$proto3048=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "contrato_gsm"
));

$proto3048["m_expr"]=$obj;
$proto3048["m_alias"] = "";
$obj = new SQLFieldListItem($proto3048);

$proto3043["m_fieldlist"][]=$obj;
						$proto3050=array();
			$obj = new SQLField(array(
	"m_strName" => "num_contrato",
	"m_strTable" => "contrato_gsm"
));

$proto3050["m_expr"]=$obj;
$proto3050["m_alias"] = "";
$obj = new SQLFieldListItem($proto3050);

$proto3043["m_fieldlist"][]=$obj;
						$proto3052=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_operadora",
	"m_strTable" => "contrato_gsm"
));

$proto3052["m_expr"]=$obj;
$proto3052["m_alias"] = "";
$obj = new SQLFieldListItem($proto3052);

$proto3043["m_fieldlist"][]=$obj;
						$proto3054=array();
			$obj = new SQLField(array(
	"m_strName" => "Vingencia",
	"m_strTable" => "contrato_gsm"
));

$proto3054["m_expr"]=$obj;
$proto3054["m_alias"] = "";
$obj = new SQLFieldListItem($proto3054);

$proto3043["m_fieldlist"][]=$obj;
						$proto3056=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "contrato_gsm"
));

$proto3056["m_expr"]=$obj;
$proto3056["m_alias"] = "";
$obj = new SQLFieldListItem($proto3056);

$proto3043["m_fieldlist"][]=$obj;
						$proto3058=array();
			$obj = new SQLField(array(
	"m_strName" => "VC1_CAD",
	"m_strTable" => "contrato_gsm"
));

$proto3058["m_expr"]=$obj;
$proto3058["m_alias"] = "";
$obj = new SQLFieldListItem($proto3058);

$proto3043["m_fieldlist"][]=$obj;
						$proto3060=array();
			$obj = new SQLField(array(
	"m_strName" => "VC1_VLR",
	"m_strTable" => "contrato_gsm"
));

$proto3060["m_expr"]=$obj;
$proto3060["m_alias"] = "";
$obj = new SQLFieldListItem($proto3060);

$proto3043["m_fieldlist"][]=$obj;
						$proto3062=array();
			$obj = new SQLField(array(
	"m_strName" => "VC2VC3_CAD",
	"m_strTable" => "contrato_gsm"
));

$proto3062["m_expr"]=$obj;
$proto3062["m_alias"] = "";
$obj = new SQLFieldListItem($proto3062);

$proto3043["m_fieldlist"][]=$obj;
						$proto3064=array();
			$obj = new SQLField(array(
	"m_strName" => "VC2VC3_VLR",
	"m_strTable" => "contrato_gsm"
));

$proto3064["m_expr"]=$obj;
$proto3064["m_alias"] = "";
$obj = new SQLFieldListItem($proto3064);

$proto3043["m_fieldlist"][]=$obj;
$proto3043["m_fromlist"] = array();
												$proto3066=array();
$proto3066["m_link"] = "SQLL_MAIN";
			$proto3067=array();
$proto3067["m_strName"] = "contrato_gsm";
$proto3067["m_columns"] = array();
$proto3067["m_columns"][] = "id_contrato";
$proto3067["m_columns"][] = "num_contrato";
$proto3067["m_columns"][] = "nm_operadora";
$proto3067["m_columns"][] = "Vingencia";
$proto3067["m_columns"][] = "flg_ativo";
$proto3067["m_columns"][] = "VC1_CAD";
$proto3067["m_columns"][] = "VC1_VLR";
$proto3067["m_columns"][] = "VC2VC3_CAD";
$proto3067["m_columns"][] = "VC2VC3_VLR";
$proto3067["m_columns"][] = "id_tronco";
$obj = new SQLTable($proto3067);

$proto3066["m_table"] = $obj;
$proto3066["m_alias"] = "";
$proto3068=array();
$proto3068["m_sql"] = "";
$proto3068["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3068["m_column"]=$obj;
$proto3068["m_contained"] = array();
$proto3068["m_strCase"] = "";
$proto3068["m_havingmode"] = "0";
$proto3068["m_inBrackets"] = "0";
$proto3068["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3068);

$proto3066["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3066);

$proto3043["m_fromlist"][]=$obj;
$proto3043["m_groupby"] = array();
$proto3043["m_orderby"] = array();
$obj = new SQLQuery($proto3043);

$queryData_contrato_gsm = $obj;
$tdatacontrato_gsm[".sqlquery"] = $queryData_contrato_gsm;



?>
