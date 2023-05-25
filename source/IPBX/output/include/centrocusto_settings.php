<?php

//	field labels
$fieldLabelscentrocusto = array();
$fieldLabelscentrocusto["Portuguese(Brazil)"]=array();
$fieldLabelscentrocusto["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de Custo";
$fieldLabelscentrocusto["Portuguese(Brazil)"]["idt_colab"] = "Identificação Colaborador";
$fieldLabelscentrocusto["Portuguese(Brazil)"]["idt_custo"] = "Identificação Custo";
$fieldLabelscentrocusto["Portuguese(Brazil)"]["flg_ativado"] = "Ativado";


$tdatacentrocusto=array();
	$tdatacentrocusto[".NumberOfChars"]=80; 
	$tdatacentrocusto[".ShortName"]="centrocusto";
	$tdatacentrocusto[".OwnerID"]="";
	$tdatacentrocusto[".OriginalTable"]="centrocusto";
	$tdatacentrocusto[".NCSearch"]=true;
	

$tdatacentrocusto[".shortTableName"] = "centrocusto";
$tdatacentrocusto[".dataSourceTable"] = "centrocusto";
$tdatacentrocusto[".nSecOptions"] = 0;
$tdatacentrocusto[".nLoginMethod"] = 1;
$tdatacentrocusto[".recsPerRowList"] = 1;	
$tdatacentrocusto[".tableGroupBy"] = "0";
$tdatacentrocusto[".dbType"] = 0;
$tdatacentrocusto[".mainTableOwnerID"] = "";
$tdatacentrocusto[".moveNext"] = 1;

$tdatacentrocusto[".listAjax"] = true;

	$tdatacentrocusto[".audit"] = true;

	$tdatacentrocusto[".locking"] = false;
	
$tdatacentrocusto[".listIcons"] = true;
$tdatacentrocusto[".edit"] = true;




$tdatacentrocusto[".showSimpleSearchOptions"] = false;

$tdatacentrocusto[".showSearchPanel"] = true;


$tdatacentrocusto[".isUseAjaxSuggest"] = true;

$tdatacentrocusto[".rowHighlite"] = true;

$tdatacentrocusto[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacentrocusto[".arrKeyFields"][] = "idt_custo";

// use datepicker for search panel
$tdatacentrocusto[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacentrocusto[".isUseTimeForSearch"] = false;






$tdatacentrocusto[".isUseInlineJs"] = $tdatacentrocusto[".isUseInlineAdd"] || $tdatacentrocusto[".isUseInlineEdit"];

$tdatacentrocusto[".allSearchFields"] = array();



$tdatacentrocusto[".isDynamicPerm"] = true;

	

$tdatacentrocusto[".isDisplayLoading"] = true;

$tdatacentrocusto[".isResizeColumns"] = false;


$tdatacentrocusto[".createLoginPage"] = true;


 	




$tdatacentrocusto[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY flg_ativado DESC, dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacentrocusto[".strOrderBy"] = $gstrOrderBy;
	
$tdatacentrocusto[".orderindexes"] = array();
$tdatacentrocusto[".orderindexes"][] = array(4, (0 ? "ASC" : "DESC"), "flg_ativado");
$tdatacentrocusto[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "dsc_centro_cust");

$tdatacentrocusto[".sqlHead"] = "SELECT dsc_centro_cust,  idt_colab,  idt_custo,  flg_ativado";

$tdatacentrocusto[".sqlFrom"] = "FROM centrocusto";

$tdatacentrocusto[".sqlWhereExpr"] = "";

$tdatacentrocusto[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_custo";
	$tdatacentrocusto[".Keys"]=$tableKeys;

	
//	dsc_centro_cust
	$fdata = array();
	$fdata["strName"] = "dsc_centro_cust";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "dsc_centro_cust";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacentrocusto["dsc_centro_cust"]=$fdata;
	
//	idt_colab
	$fdata = array();
	$fdata["strName"] = "idt_colab";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Identificação Colaborador"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_colab";
		$fdata["FullName"]= "idt_colab";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdatacentrocusto["idt_colab"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Identificação Custo"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacentrocusto["idt_custo"]=$fdata;
	
//	flg_ativado
	$fdata = array();
	$fdata["strName"] = "flg_ativado";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Ativado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativado";
		$fdata["FullName"]= "flg_ativado";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacentrocusto["flg_ativado"]=$fdata;

	
$tables_data["centrocusto"]=&$tdatacentrocusto;
$field_labels["centrocusto"] = &$fieldLabelscentrocusto;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["centrocusto"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["centrocusto"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3539=array();
$proto3539["m_strHead"] = "SELECT";
$proto3539["m_strFieldList"] = "dsc_centro_cust,  idt_colab,  idt_custo,  flg_ativado";
$proto3539["m_strFrom"] = "FROM centrocusto";
$proto3539["m_strWhere"] = "";
$proto3539["m_strOrderBy"] = "ORDER BY flg_ativado DESC, dsc_centro_cust";
$proto3539["m_strTail"] = "";
$proto3540=array();
$proto3540["m_sql"] = "";
$proto3540["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3540["m_column"]=$obj;
$proto3540["m_contained"] = array();
$proto3540["m_strCase"] = "";
$proto3540["m_havingmode"] = "0";
$proto3540["m_inBrackets"] = "0";
$proto3540["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3540);

$proto3539["m_where"] = $obj;
$proto3542=array();
$proto3542["m_sql"] = "";
$proto3542["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3542["m_column"]=$obj;
$proto3542["m_contained"] = array();
$proto3542["m_strCase"] = "";
$proto3542["m_havingmode"] = "0";
$proto3542["m_inBrackets"] = "0";
$proto3542["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3542);

$proto3539["m_having"] = $obj;
$proto3539["m_fieldlist"] = array();
						$proto3544=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto3544["m_expr"]=$obj;
$proto3544["m_alias"] = "";
$obj = new SQLFieldListItem($proto3544);

$proto3539["m_fieldlist"][]=$obj;
						$proto3546=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_colab",
	"m_strTable" => "centrocusto"
));

$proto3546["m_expr"]=$obj;
$proto3546["m_alias"] = "";
$obj = new SQLFieldListItem($proto3546);

$proto3539["m_fieldlist"][]=$obj;
						$proto3548=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "centrocusto"
));

$proto3548["m_expr"]=$obj;
$proto3548["m_alias"] = "";
$obj = new SQLFieldListItem($proto3548);

$proto3539["m_fieldlist"][]=$obj;
						$proto3550=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativado",
	"m_strTable" => "centrocusto"
));

$proto3550["m_expr"]=$obj;
$proto3550["m_alias"] = "";
$obj = new SQLFieldListItem($proto3550);

$proto3539["m_fieldlist"][]=$obj;
$proto3539["m_fromlist"] = array();
												$proto3552=array();
$proto3552["m_link"] = "SQLL_MAIN";
			$proto3553=array();
$proto3553["m_strName"] = "centrocusto";
$proto3553["m_columns"] = array();
$proto3553["m_columns"][] = "idt_custo";
$proto3553["m_columns"][] = "dsc_centro_cust";
$proto3553["m_columns"][] = "idt_colab";
$proto3553["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto3553);

$proto3552["m_table"] = $obj;
$proto3552["m_alias"] = "";
$proto3554=array();
$proto3554["m_sql"] = "";
$proto3554["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3554["m_column"]=$obj;
$proto3554["m_contained"] = array();
$proto3554["m_strCase"] = "";
$proto3554["m_havingmode"] = "0";
$proto3554["m_inBrackets"] = "0";
$proto3554["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3554);

$proto3552["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3552);

$proto3539["m_fromlist"][]=$obj;
$proto3539["m_groupby"] = array();
$proto3539["m_orderby"] = array();
												$proto3556=array();
						$obj = new SQLField(array(
	"m_strName" => "flg_ativado",
	"m_strTable" => "centrocusto"
));

$proto3556["m_column"]=$obj;
$proto3556["m_bAsc"] = 0;
$proto3556["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto3556);

$proto3539["m_orderby"][]=$obj;					
												$proto3558=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto3558["m_column"]=$obj;
$proto3558["m_bAsc"] = 1;
$proto3558["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto3558);

$proto3539["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto3539);

$queryData_centrocusto = $obj;
$tdatacentrocusto[".sqlquery"] = $queryData_centrocusto;



?>
