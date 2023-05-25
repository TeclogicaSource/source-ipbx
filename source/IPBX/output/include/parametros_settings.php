<?php

//	field labels
$fieldLabelsparametros = array();
$fieldLabelsparametros["Portuguese(Brazil)"]=array();
$fieldLabelsparametros["Portuguese(Brazil)"]["id_param"] = "Identificação";
$fieldLabelsparametros["Portuguese(Brazil)"]["nome"] = "Nome";
$fieldLabelsparametros["Portuguese(Brazil)"]["valor"] = "Valor";


$tdataparametros=array();
	$tdataparametros[".NumberOfChars"]=80; 
	$tdataparametros[".ShortName"]="parametros";
	$tdataparametros[".OwnerID"]="";
	$tdataparametros[".OriginalTable"]="parametros";
	$tdataparametros[".NCSearch"]=true;
	

$tdataparametros[".shortTableName"] = "parametros";
$tdataparametros[".dataSourceTable"] = "parametros";
$tdataparametros[".nSecOptions"] = 0;
$tdataparametros[".nLoginMethod"] = 1;
$tdataparametros[".recsPerRowList"] = 1;	
$tdataparametros[".tableGroupBy"] = "0";
$tdataparametros[".dbType"] = 0;
$tdataparametros[".mainTableOwnerID"] = "";
$tdataparametros[".moveNext"] = 1;

$tdataparametros[".listAjax"] = true;

	$tdataparametros[".audit"] = true;

	$tdataparametros[".locking"] = false;
	
$tdataparametros[".listIcons"] = true;
$tdataparametros[".inlineEdit"] = true;




$tdataparametros[".showSimpleSearchOptions"] = false;

$tdataparametros[".showSearchPanel"] = true;


$tdataparametros[".isUseAjaxSuggest"] = true;

$tdataparametros[".rowHighlite"] = true;

$tdataparametros[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataparametros[".arrKeyFields"][] = "id_param";

// use datepicker for search panel
$tdataparametros[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataparametros[".isUseTimeForSearch"] = false;






$tdataparametros[".isUseInlineEdit"] = true;
$tdataparametros[".isUseInlineJs"] = $tdataparametros[".isUseInlineAdd"] || $tdataparametros[".isUseInlineEdit"];

$tdataparametros[".allSearchFields"] = array();

$tdataparametros[".globSearchFields"][] = "nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nome", $tdataparametros[".allSearchFields"]))
{
	$tdataparametros[".allSearchFields"][] = "nome";	
}
$tdataparametros[".globSearchFields"][] = "valor";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("valor", $tdataparametros[".allSearchFields"]))
{
	$tdataparametros[".allSearchFields"][] = "valor";	
}


$tdataparametros[".isDynamicPerm"] = true;

	

$tdataparametros[".isDisplayLoading"] = true;

$tdataparametros[".isResizeColumns"] = false;


$tdataparametros[".createLoginPage"] = true;


 	




$tdataparametros[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY id_param";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataparametros[".strOrderBy"] = $gstrOrderBy;
	
$tdataparametros[".orderindexes"] = array();
$tdataparametros[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "id_param");

$tdataparametros[".sqlHead"] = "SELECT id_param,  nome,  valor";

$tdataparametros[".sqlFrom"] = "FROM parametros";

$tdataparametros[".sqlWhereExpr"] = "";

$tdataparametros[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_param";
	$tdataparametros[".Keys"]=$tableKeys;

	
//	id_param
	$fdata = array();
	$fdata["strName"] = "id_param";
	$fdata["ownerTable"] = "parametros";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_param";
		$fdata["FullName"]= "id_param";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataparametros["id_param"]=$fdata;
	
//	nome
	$fdata = array();
	$fdata["strName"] = "nome";
	$fdata["ownerTable"] = "parametros";
		$fdata["Label"]="Nome"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nome";
		$fdata["FullName"]= "nome";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataparametros["nome"]=$fdata;
	
//	valor
	$fdata = array();
	$fdata["strName"] = "valor";
	$fdata["ownerTable"] = "parametros";
		$fdata["Label"]="Valor"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "valor";
		$fdata["FullName"]= "valor";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=200";
			$fdata["EditParams"].= " size=120";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataparametros["valor"]=$fdata;

	
$tables_data["parametros"]=&$tdataparametros;
$field_labels["parametros"] = &$fieldLabelsparametros;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["parametros"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["parametros"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3065=array();
$proto3065["m_strHead"] = "SELECT";
$proto3065["m_strFieldList"] = "id_param,  nome,  valor";
$proto3065["m_strFrom"] = "FROM parametros";
$proto3065["m_strWhere"] = "";
$proto3065["m_strOrderBy"] = "ORDER BY id_param";
$proto3065["m_strTail"] = "";
$proto3066=array();
$proto3066["m_sql"] = "";
$proto3066["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3066["m_column"]=$obj;
$proto3066["m_contained"] = array();
$proto3066["m_strCase"] = "";
$proto3066["m_havingmode"] = "0";
$proto3066["m_inBrackets"] = "0";
$proto3066["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3066);

$proto3065["m_where"] = $obj;
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

$proto3065["m_having"] = $obj;
$proto3065["m_fieldlist"] = array();
						$proto3070=array();
			$obj = new SQLField(array(
	"m_strName" => "id_param",
	"m_strTable" => "parametros"
));

$proto3070["m_expr"]=$obj;
$proto3070["m_alias"] = "";
$obj = new SQLFieldListItem($proto3070);

$proto3065["m_fieldlist"][]=$obj;
						$proto3072=array();
			$obj = new SQLField(array(
	"m_strName" => "nome",
	"m_strTable" => "parametros"
));

$proto3072["m_expr"]=$obj;
$proto3072["m_alias"] = "";
$obj = new SQLFieldListItem($proto3072);

$proto3065["m_fieldlist"][]=$obj;
						$proto3074=array();
			$obj = new SQLField(array(
	"m_strName" => "valor",
	"m_strTable" => "parametros"
));

$proto3074["m_expr"]=$obj;
$proto3074["m_alias"] = "";
$obj = new SQLFieldListItem($proto3074);

$proto3065["m_fieldlist"][]=$obj;
$proto3065["m_fromlist"] = array();
												$proto3076=array();
$proto3076["m_link"] = "SQLL_MAIN";
			$proto3077=array();
$proto3077["m_strName"] = "parametros";
$proto3077["m_columns"] = array();
$proto3077["m_columns"][] = "id_param";
$proto3077["m_columns"][] = "nome";
$proto3077["m_columns"][] = "valor";
$obj = new SQLTable($proto3077);

$proto3076["m_table"] = $obj;
$proto3076["m_alias"] = "";
$proto3078=array();
$proto3078["m_sql"] = "";
$proto3078["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3078["m_column"]=$obj;
$proto3078["m_contained"] = array();
$proto3078["m_strCase"] = "";
$proto3078["m_havingmode"] = "0";
$proto3078["m_inBrackets"] = "0";
$proto3078["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3078);

$proto3076["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3076);

$proto3065["m_fromlist"][]=$obj;
$proto3065["m_groupby"] = array();
$proto3065["m_orderby"] = array();
												$proto3080=array();
						$obj = new SQLField(array(
	"m_strName" => "id_param",
	"m_strTable" => "parametros"
));

$proto3080["m_column"]=$obj;
$proto3080["m_bAsc"] = 1;
$proto3080["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto3080);

$proto3065["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto3065);

$queryData_parametros = $obj;
$tdataparametros[".sqlquery"] = $queryData_parametros;



?>
