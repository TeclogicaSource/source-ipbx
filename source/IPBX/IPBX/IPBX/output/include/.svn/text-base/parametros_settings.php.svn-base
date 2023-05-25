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










$proto2802=array();
$proto2802["m_strHead"] = "SELECT";
$proto2802["m_strFieldList"] = "id_param,  nome,  valor";
$proto2802["m_strFrom"] = "FROM parametros";
$proto2802["m_strWhere"] = "";
$proto2802["m_strOrderBy"] = "ORDER BY id_param";
$proto2802["m_strTail"] = "";
$proto2803=array();
$proto2803["m_sql"] = "";
$proto2803["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2803["m_column"]=$obj;
$proto2803["m_contained"] = array();
$proto2803["m_strCase"] = "";
$proto2803["m_havingmode"] = "0";
$proto2803["m_inBrackets"] = "0";
$proto2803["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2803);

$proto2802["m_where"] = $obj;
$proto2805=array();
$proto2805["m_sql"] = "";
$proto2805["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2805["m_column"]=$obj;
$proto2805["m_contained"] = array();
$proto2805["m_strCase"] = "";
$proto2805["m_havingmode"] = "0";
$proto2805["m_inBrackets"] = "0";
$proto2805["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2805);

$proto2802["m_having"] = $obj;
$proto2802["m_fieldlist"] = array();
						$proto2807=array();
			$obj = new SQLField(array(
	"m_strName" => "id_param",
	"m_strTable" => "parametros"
));

$proto2807["m_expr"]=$obj;
$proto2807["m_alias"] = "";
$obj = new SQLFieldListItem($proto2807);

$proto2802["m_fieldlist"][]=$obj;
						$proto2809=array();
			$obj = new SQLField(array(
	"m_strName" => "nome",
	"m_strTable" => "parametros"
));

$proto2809["m_expr"]=$obj;
$proto2809["m_alias"] = "";
$obj = new SQLFieldListItem($proto2809);

$proto2802["m_fieldlist"][]=$obj;
						$proto2811=array();
			$obj = new SQLField(array(
	"m_strName" => "valor",
	"m_strTable" => "parametros"
));

$proto2811["m_expr"]=$obj;
$proto2811["m_alias"] = "";
$obj = new SQLFieldListItem($proto2811);

$proto2802["m_fieldlist"][]=$obj;
$proto2802["m_fromlist"] = array();
												$proto2813=array();
$proto2813["m_link"] = "SQLL_MAIN";
			$proto2814=array();
$proto2814["m_strName"] = "parametros";
$proto2814["m_columns"] = array();
$proto2814["m_columns"][] = "id_param";
$proto2814["m_columns"][] = "nome";
$proto2814["m_columns"][] = "valor";
$obj = new SQLTable($proto2814);

$proto2813["m_table"] = $obj;
$proto2813["m_alias"] = "";
$proto2815=array();
$proto2815["m_sql"] = "";
$proto2815["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2815["m_column"]=$obj;
$proto2815["m_contained"] = array();
$proto2815["m_strCase"] = "";
$proto2815["m_havingmode"] = "0";
$proto2815["m_inBrackets"] = "0";
$proto2815["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2815);

$proto2813["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2813);

$proto2802["m_fromlist"][]=$obj;
$proto2802["m_groupby"] = array();
$proto2802["m_orderby"] = array();
												$proto2817=array();
						$obj = new SQLField(array(
	"m_strName" => "id_param",
	"m_strTable" => "parametros"
));

$proto2817["m_column"]=$obj;
$proto2817["m_bAsc"] = 1;
$proto2817["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto2817);

$proto2802["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto2802);

$queryData_parametros = $obj;
$tdataparametros[".sqlquery"] = $queryData_parametros;



?>
