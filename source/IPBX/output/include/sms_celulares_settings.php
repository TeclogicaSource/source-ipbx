<?php

//	field labels
$fieldLabelssms_celulares = array();
$fieldLabelssms_celulares["Portuguese(Brazil)"]=array();
$fieldLabelssms_celulares["Portuguese(Brazil)"]["id_celular"] = "Identificação";
$fieldLabelssms_celulares["Portuguese(Brazil)"]["dsc_nome"] = "Nome do Proprietário";
$fieldLabelssms_celulares["Portuguese(Brazil)"]["telefone"] = "Telefone";
$fieldLabelssms_celulares["Portuguese(Brazil)"]["id_grupo"] = "Grupo";


$tdatasms_celulares=array();
	$tdatasms_celulares[".NumberOfChars"]=80; 
	$tdatasms_celulares[".ShortName"]="sms_celulares";
	$tdatasms_celulares[".OwnerID"]="";
	$tdatasms_celulares[".OriginalTable"]="sms_celulares";
	$tdatasms_celulares[".NCSearch"]=true;
	

$tdatasms_celulares[".shortTableName"] = "sms_celulares";
$tdatasms_celulares[".dataSourceTable"] = "sms_celulares";
$tdatasms_celulares[".nSecOptions"] = 0;
$tdatasms_celulares[".nLoginMethod"] = 1;
$tdatasms_celulares[".recsPerRowList"] = 1;	
$tdatasms_celulares[".tableGroupBy"] = "0";
$tdatasms_celulares[".dbType"] = 0;
$tdatasms_celulares[".mainTableOwnerID"] = "";
$tdatasms_celulares[".moveNext"] = 1;

$tdatasms_celulares[".listAjax"] = true;

	$tdatasms_celulares[".audit"] = true;

	$tdatasms_celulares[".locking"] = false;
	
$tdatasms_celulares[".listIcons"] = true;
$tdatasms_celulares[".inlineEdit"] = true;

$tdatasms_celulares[".exportTo"] = true;


$tdatasms_celulares[".delete"] = true;

$tdatasms_celulares[".showSimpleSearchOptions"] = false;

$tdatasms_celulares[".showSearchPanel"] = true;


$tdatasms_celulares[".isUseAjaxSuggest"] = true;

$tdatasms_celulares[".rowHighlite"] = true;

$tdatasms_celulares[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasms_celulares[".arrKeyFields"][] = "id_celular";

// use datepicker for search panel
$tdatasms_celulares[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasms_celulares[".isUseTimeForSearch"] = false;





$tdatasms_celulares[".isUseInlineAdd"] = true;

$tdatasms_celulares[".isUseInlineEdit"] = true;
$tdatasms_celulares[".isUseInlineJs"] = $tdatasms_celulares[".isUseInlineAdd"] || $tdatasms_celulares[".isUseInlineEdit"];

$tdatasms_celulares[".allSearchFields"] = array();

$tdatasms_celulares[".globSearchFields"][] = "id_grupo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_grupo", $tdatasms_celulares[".allSearchFields"]))
{
	$tdatasms_celulares[".allSearchFields"][] = "id_grupo";	
}
$tdatasms_celulares[".globSearchFields"][] = "dsc_nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_nome", $tdatasms_celulares[".allSearchFields"]))
{
	$tdatasms_celulares[".allSearchFields"][] = "dsc_nome";	
}
$tdatasms_celulares[".globSearchFields"][] = "telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("telefone", $tdatasms_celulares[".allSearchFields"]))
{
	$tdatasms_celulares[".allSearchFields"][] = "telefone";	
}


$tdatasms_celulares[".isDynamicPerm"] = true;

	

$tdatasms_celulares[".isDisplayLoading"] = true;

$tdatasms_celulares[".isResizeColumns"] = false;


$tdatasms_celulares[".createLoginPage"] = true;


 	




$tdatasms_celulares[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasms_celulares[".strOrderBy"] = $gstrOrderBy;
	
$tdatasms_celulares[".orderindexes"] = array();

$tdatasms_celulares[".sqlHead"] = "SELECT id_celular,   dsc_nome,   telefone,   id_grupo";

$tdatasms_celulares[".sqlFrom"] = "FROM sms_celulares";

$tdatasms_celulares[".sqlWhereExpr"] = "";

$tdatasms_celulares[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_celular";
	$tdatasms_celulares[".Keys"]=$tableKeys;

	
//	id_celular
	$fdata = array();
	$fdata["strName"] = "id_celular";
	$fdata["ownerTable"] = "sms_celulares";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_celular";
		$fdata["FullName"]= "id_celular";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatasms_celulares["id_celular"]=$fdata;
	
//	dsc_nome
	$fdata = array();
	$fdata["strName"] = "dsc_nome";
	$fdata["ownerTable"] = "sms_celulares";
		$fdata["Label"]="Nome do Proprietário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_nome";
		$fdata["FullName"]= "dsc_nome";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_celulares["dsc_nome"]=$fdata;
	
//	telefone
	$fdata = array();
	$fdata["strName"] = "telefone";
	$fdata["ownerTable"] = "sms_celulares";
		$fdata["Label"]="Telefone"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "telefone";
		$fdata["FullName"]= "telefone";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_celulares["telefone"]=$fdata;
	
//	id_grupo
	$fdata = array();
	$fdata["strName"] = "id_grupo";
	$fdata["ownerTable"] = "sms_celulares";
		$fdata["Label"]="Grupo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_grupo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nome";
				$fdata["LookupTable"]="sms_grupo";
	$fdata["LookupOrderBy"]="nome";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_grupo";
		$fdata["FullName"]= "id_grupo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_celulares["id_grupo"]=$fdata;

	
$tables_data["sms_celulares"]=&$tdatasms_celulares;
$field_labels["sms_celulares"] = &$fieldLabelssms_celulares;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sms_celulares"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sms_celulares"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3233=array();
$proto3233["m_strHead"] = "SELECT";
$proto3233["m_strFieldList"] = "id_celular,   dsc_nome,   telefone,   id_grupo";
$proto3233["m_strFrom"] = "FROM sms_celulares";
$proto3233["m_strWhere"] = "";
$proto3233["m_strOrderBy"] = "";
$proto3233["m_strTail"] = "";
$proto3234=array();
$proto3234["m_sql"] = "";
$proto3234["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3234["m_column"]=$obj;
$proto3234["m_contained"] = array();
$proto3234["m_strCase"] = "";
$proto3234["m_havingmode"] = "0";
$proto3234["m_inBrackets"] = "0";
$proto3234["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3234);

$proto3233["m_where"] = $obj;
$proto3236=array();
$proto3236["m_sql"] = "";
$proto3236["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3236["m_column"]=$obj;
$proto3236["m_contained"] = array();
$proto3236["m_strCase"] = "";
$proto3236["m_havingmode"] = "0";
$proto3236["m_inBrackets"] = "0";
$proto3236["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3236);

$proto3233["m_having"] = $obj;
$proto3233["m_fieldlist"] = array();
						$proto3238=array();
			$obj = new SQLField(array(
	"m_strName" => "id_celular",
	"m_strTable" => "sms_celulares"
));

$proto3238["m_expr"]=$obj;
$proto3238["m_alias"] = "";
$obj = new SQLFieldListItem($proto3238);

$proto3233["m_fieldlist"][]=$obj;
						$proto3240=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_nome",
	"m_strTable" => "sms_celulares"
));

$proto3240["m_expr"]=$obj;
$proto3240["m_alias"] = "";
$obj = new SQLFieldListItem($proto3240);

$proto3233["m_fieldlist"][]=$obj;
						$proto3242=array();
			$obj = new SQLField(array(
	"m_strName" => "telefone",
	"m_strTable" => "sms_celulares"
));

$proto3242["m_expr"]=$obj;
$proto3242["m_alias"] = "";
$obj = new SQLFieldListItem($proto3242);

$proto3233["m_fieldlist"][]=$obj;
						$proto3244=array();
			$obj = new SQLField(array(
	"m_strName" => "id_grupo",
	"m_strTable" => "sms_celulares"
));

$proto3244["m_expr"]=$obj;
$proto3244["m_alias"] = "";
$obj = new SQLFieldListItem($proto3244);

$proto3233["m_fieldlist"][]=$obj;
$proto3233["m_fromlist"] = array();
												$proto3246=array();
$proto3246["m_link"] = "SQLL_MAIN";
			$proto3247=array();
$proto3247["m_strName"] = "sms_celulares";
$proto3247["m_columns"] = array();
$proto3247["m_columns"][] = "id_celular";
$proto3247["m_columns"][] = "dsc_nome";
$proto3247["m_columns"][] = "telefone";
$proto3247["m_columns"][] = "id_grupo";
$obj = new SQLTable($proto3247);

$proto3246["m_table"] = $obj;
$proto3246["m_alias"] = "";
$proto3248=array();
$proto3248["m_sql"] = "";
$proto3248["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3248["m_column"]=$obj;
$proto3248["m_contained"] = array();
$proto3248["m_strCase"] = "";
$proto3248["m_havingmode"] = "0";
$proto3248["m_inBrackets"] = "0";
$proto3248["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3248);

$proto3246["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3246);

$proto3233["m_fromlist"][]=$obj;
$proto3233["m_groupby"] = array();
$proto3233["m_orderby"] = array();
$obj = new SQLQuery($proto3233);

$queryData_sms_celulares = $obj;
$tdatasms_celulares[".sqlquery"] = $queryData_sms_celulares;



?>
