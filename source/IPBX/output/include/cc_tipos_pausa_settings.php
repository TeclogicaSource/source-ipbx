<?php

//	field labels
$fieldLabelscc_tipos_pausa = array();
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]=array();
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]["idt_pausa"] = "Identificação";
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]["dsc_pausa"] = "Descrição do tipo de pausa";
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]["flg_ativo"] = "Ativar pausa";
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]["abreviado"] = "Abreviação";
$fieldLabelscc_tipos_pausa["Portuguese(Brazil)"]["flg_produtiva"] = "Pausa Produtiva";


$tdatacc_tipos_pausa=array();
	$tdatacc_tipos_pausa[".NumberOfChars"]=80; 
	$tdatacc_tipos_pausa[".ShortName"]="cc_tipos_pausa";
	$tdatacc_tipos_pausa[".OwnerID"]="";
	$tdatacc_tipos_pausa[".OriginalTable"]="cc_tipos_pausa";
	$tdatacc_tipos_pausa[".NCSearch"]=true;
	

$tdatacc_tipos_pausa[".shortTableName"] = "cc_tipos_pausa";
$tdatacc_tipos_pausa[".dataSourceTable"] = "cc_tipos_pausa";
$tdatacc_tipos_pausa[".nSecOptions"] = 0;
$tdatacc_tipos_pausa[".nLoginMethod"] = 1;
$tdatacc_tipos_pausa[".recsPerRowList"] = 1;	
$tdatacc_tipos_pausa[".tableGroupBy"] = "0";
$tdatacc_tipos_pausa[".dbType"] = 0;
$tdatacc_tipos_pausa[".mainTableOwnerID"] = "";
$tdatacc_tipos_pausa[".moveNext"] = 1;

$tdatacc_tipos_pausa[".listAjax"] = false;

	$tdatacc_tipos_pausa[".audit"] = true;

	$tdatacc_tipos_pausa[".locking"] = false;
	
$tdatacc_tipos_pausa[".listIcons"] = true;
$tdatacc_tipos_pausa[".inlineEdit"] = true;




$tdatacc_tipos_pausa[".showSimpleSearchOptions"] = false;

$tdatacc_tipos_pausa[".showSearchPanel"] = true;


$tdatacc_tipos_pausa[".isUseAjaxSuggest"] = true;

$tdatacc_tipos_pausa[".rowHighlite"] = true;

$tdatacc_tipos_pausa[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_tipos_pausa[".arrKeyFields"][] = "idt_pausa";

// use datepicker for search panel
$tdatacc_tipos_pausa[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_tipos_pausa[".isUseTimeForSearch"] = false;





$tdatacc_tipos_pausa[".isUseInlineAdd"] = true;

$tdatacc_tipos_pausa[".isUseInlineEdit"] = true;
$tdatacc_tipos_pausa[".isUseInlineJs"] = $tdatacc_tipos_pausa[".isUseInlineAdd"] || $tdatacc_tipos_pausa[".isUseInlineEdit"];

$tdatacc_tipos_pausa[".allSearchFields"] = array();



$tdatacc_tipos_pausa[".isDynamicPerm"] = true;

	

$tdatacc_tipos_pausa[".isDisplayLoading"] = true;

$tdatacc_tipos_pausa[".isResizeColumns"] = false;


$tdatacc_tipos_pausa[".createLoginPage"] = true;


 	




$tdatacc_tipos_pausa[".pageSize"] = 100;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_tipos_pausa[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_tipos_pausa[".orderindexes"] = array();

$tdatacc_tipos_pausa[".sqlHead"] = "SELECT idt_pausa,   dsc_pausa,   flg_ativo,   abreviado,   flg_produtiva";

$tdatacc_tipos_pausa[".sqlFrom"] = "FROM cc_tipos_pausa";

$tdatacc_tipos_pausa[".sqlWhereExpr"] = "";

$tdatacc_tipos_pausa[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_pausa";
	$tdatacc_tipos_pausa[".Keys"]=$tableKeys;

	
//	idt_pausa
	$fdata = array();
	$fdata["strName"] = "idt_pausa";
	$fdata["ownerTable"] = "cc_tipos_pausa";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_pausa";
		$fdata["FullName"]= "idt_pausa";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_tipos_pausa["idt_pausa"]=$fdata;
	
//	dsc_pausa
	$fdata = array();
	$fdata["strName"] = "dsc_pausa";
	$fdata["ownerTable"] = "cc_tipos_pausa";
		$fdata["Label"]="Descrição do tipo de pausa"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_pausa";
		$fdata["FullName"]= "dsc_pausa";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_tipos_pausa["dsc_pausa"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "cc_tipos_pausa";
		$fdata["Label"]="Ativar pausa"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_tipos_pausa["flg_ativo"]=$fdata;
	
//	abreviado
	$fdata = array();
	$fdata["strName"] = "abreviado";
	$fdata["ownerTable"] = "cc_tipos_pausa";
		$fdata["Label"]="Abreviação"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "abreviado";
		$fdata["FullName"]= "abreviado";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=7";
			$fdata["EditParams"].= " size=7";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_tipos_pausa["abreviado"]=$fdata;
	
//	flg_produtiva
	$fdata = array();
	$fdata["strName"] = "flg_produtiva";
	$fdata["ownerTable"] = "cc_tipos_pausa";
		$fdata["Label"]="Pausa Produtiva"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_produtiva";
		$fdata["FullName"]= "flg_produtiva";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_tipos_pausa["flg_produtiva"]=$fdata;

	
$tables_data["cc_tipos_pausa"]=&$tdatacc_tipos_pausa;
$field_labels["cc_tipos_pausa"] = &$fieldLabelscc_tipos_pausa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_tipos_pausa"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_tipos_pausa"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1643=array();
$proto1643["m_strHead"] = "SELECT";
$proto1643["m_strFieldList"] = "idt_pausa,   dsc_pausa,   flg_ativo,   abreviado,   flg_produtiva";
$proto1643["m_strFrom"] = "FROM cc_tipos_pausa";
$proto1643["m_strWhere"] = "";
$proto1643["m_strOrderBy"] = "";
$proto1643["m_strTail"] = "";
$proto1644=array();
$proto1644["m_sql"] = "";
$proto1644["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1644["m_column"]=$obj;
$proto1644["m_contained"] = array();
$proto1644["m_strCase"] = "";
$proto1644["m_havingmode"] = "0";
$proto1644["m_inBrackets"] = "0";
$proto1644["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1644);

$proto1643["m_where"] = $obj;
$proto1646=array();
$proto1646["m_sql"] = "";
$proto1646["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1646["m_column"]=$obj;
$proto1646["m_contained"] = array();
$proto1646["m_strCase"] = "";
$proto1646["m_havingmode"] = "0";
$proto1646["m_inBrackets"] = "0";
$proto1646["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1646);

$proto1643["m_having"] = $obj;
$proto1643["m_fieldlist"] = array();
						$proto1648=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_pausa",
	"m_strTable" => "cc_tipos_pausa"
));

$proto1648["m_expr"]=$obj;
$proto1648["m_alias"] = "";
$obj = new SQLFieldListItem($proto1648);

$proto1643["m_fieldlist"][]=$obj;
						$proto1650=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_pausa",
	"m_strTable" => "cc_tipos_pausa"
));

$proto1650["m_expr"]=$obj;
$proto1650["m_alias"] = "";
$obj = new SQLFieldListItem($proto1650);

$proto1643["m_fieldlist"][]=$obj;
						$proto1652=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "cc_tipos_pausa"
));

$proto1652["m_expr"]=$obj;
$proto1652["m_alias"] = "";
$obj = new SQLFieldListItem($proto1652);

$proto1643["m_fieldlist"][]=$obj;
						$proto1654=array();
			$obj = new SQLField(array(
	"m_strName" => "abreviado",
	"m_strTable" => "cc_tipos_pausa"
));

$proto1654["m_expr"]=$obj;
$proto1654["m_alias"] = "";
$obj = new SQLFieldListItem($proto1654);

$proto1643["m_fieldlist"][]=$obj;
						$proto1656=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_produtiva",
	"m_strTable" => "cc_tipos_pausa"
));

$proto1656["m_expr"]=$obj;
$proto1656["m_alias"] = "";
$obj = new SQLFieldListItem($proto1656);

$proto1643["m_fieldlist"][]=$obj;
$proto1643["m_fromlist"] = array();
												$proto1658=array();
$proto1658["m_link"] = "SQLL_MAIN";
			$proto1659=array();
$proto1659["m_strName"] = "cc_tipos_pausa";
$proto1659["m_columns"] = array();
$proto1659["m_columns"][] = "idt_pausa";
$proto1659["m_columns"][] = "dsc_pausa";
$proto1659["m_columns"][] = "flg_ativo";
$proto1659["m_columns"][] = "abreviado";
$proto1659["m_columns"][] = "flg_produtiva";
$obj = new SQLTable($proto1659);

$proto1658["m_table"] = $obj;
$proto1658["m_alias"] = "";
$proto1660=array();
$proto1660["m_sql"] = "";
$proto1660["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1660["m_column"]=$obj;
$proto1660["m_contained"] = array();
$proto1660["m_strCase"] = "";
$proto1660["m_havingmode"] = "0";
$proto1660["m_inBrackets"] = "0";
$proto1660["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1660);

$proto1658["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1658);

$proto1643["m_fromlist"][]=$obj;
$proto1643["m_groupby"] = array();
$proto1643["m_orderby"] = array();
$obj = new SQLQuery($proto1643);

$queryData_cc_tipos_pausa = $obj;
$tdatacc_tipos_pausa[".sqlquery"] = $queryData_cc_tipos_pausa;



?>
