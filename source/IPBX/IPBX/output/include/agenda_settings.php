<?php

//	field labels
$fieldLabelsagenda = array();
$fieldLabelsagenda["Portuguese(Brazil)"]=array();
$fieldLabelsagenda["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsagenda["Portuguese(Brazil)"]["Numero"] = "Número";
$fieldLabelsagenda["Portuguese(Brazil)"]["idt_custo"] = "Centro de Custo";
$fieldLabelsagenda["Portuguese(Brazil)"]["Discar"] = "Discar";
$fieldLabelsagenda["Portuguese(Brazil)"]["idt_agenda"] = "Número Identificação";
$fieldLabelsagenda["Portuguese(Brazil)"]["solicitante"] = "Solicitante";
$fieldLabelsagenda["Portuguese(Brazil)"]["empresa"] = "Empresa";


$tdataagenda=array();
	$tdataagenda[".NumberOfChars"]=80; 
	$tdataagenda[".ShortName"]="agenda";
	$tdataagenda[".OwnerID"]="";
	$tdataagenda[".OriginalTable"]="agenda";
	$tdataagenda[".NCSearch"]=true;
	

$tdataagenda[".shortTableName"] = "agenda";
$tdataagenda[".dataSourceTable"] = "agenda";
$tdataagenda[".nSecOptions"] = 0;
$tdataagenda[".nLoginMethod"] = 1;
$tdataagenda[".recsPerRowList"] = 1;	
$tdataagenda[".tableGroupBy"] = "0";
$tdataagenda[".dbType"] = 0;
$tdataagenda[".mainTableOwnerID"] = "";
$tdataagenda[".moveNext"] = 1;

$tdataagenda[".listAjax"] = true;

	$tdataagenda[".audit"] = true;

	$tdataagenda[".locking"] = false;
	
$tdataagenda[".listIcons"] = true;
$tdataagenda[".inlineEdit"] = true;

$tdataagenda[".exportTo"] = true;

$tdataagenda[".printFriendly"] = true;

$tdataagenda[".delete"] = true;

$tdataagenda[".showSimpleSearchOptions"] = false;

$tdataagenda[".showSearchPanel"] = true;


$tdataagenda[".isUseAjaxSuggest"] = true;

$tdataagenda[".rowHighlite"] = true;

$tdataagenda[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataagenda[".arrKeyFields"][] = "idt_agenda";

// use datepicker for search panel
$tdataagenda[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataagenda[".isUseTimeForSearch"] = false;





$tdataagenda[".isUseInlineAdd"] = true;

$tdataagenda[".isUseInlineEdit"] = true;
$tdataagenda[".isUseInlineJs"] = $tdataagenda[".isUseInlineAdd"] || $tdataagenda[".isUseInlineEdit"];

$tdataagenda[".allSearchFields"] = array();

$tdataagenda[".globSearchFields"][] = "empresa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("empresa", $tdataagenda[".allSearchFields"]))
{
	$tdataagenda[".allSearchFields"][] = "empresa";	
}
$tdataagenda[".globSearchFields"][] = "solicitante";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("solicitante", $tdataagenda[".allSearchFields"]))
{
	$tdataagenda[".allSearchFields"][] = "solicitante";	
}
$tdataagenda[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdataagenda[".allSearchFields"]))
{
	$tdataagenda[".allSearchFields"][] = "Nome";	
}
$tdataagenda[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdataagenda[".allSearchFields"]))
{
	$tdataagenda[".allSearchFields"][] = "Numero";	
}


$tdataagenda[".isDynamicPerm"] = true;

	

$tdataagenda[".isDisplayLoading"] = true;

$tdataagenda[".isResizeColumns"] = false;


$tdataagenda[".createLoginPage"] = true;


 	




$tdataagenda[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataagenda[".strOrderBy"] = $gstrOrderBy;
	
$tdataagenda[".orderindexes"] = array();

$tdataagenda[".sqlHead"] = "SELECT Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda,  solicitante,  empresa";

$tdataagenda[".sqlFrom"] = "FROM agenda";

$tdataagenda[".sqlWhereExpr"] = "";

$tdataagenda[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agenda";
	$tdataagenda[".Keys"]=$tableKeys;

	
//	Nome
	$fdata = array();
	$fdata["strName"] = "Nome";
	$fdata["ownerTable"] = "agenda";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Nome";
		$fdata["FullName"]= "Nome";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["Nome"]=$fdata;
	
//	Numero
	$fdata = array();
	$fdata["strName"] = "Numero";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Número"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Numero";
		$fdata["FullName"]= "Numero";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["Numero"]=$fdata;
	
//	Discar
	$fdata = array();
	$fdata["strName"] = "Discar";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Discar";
		$fdata["FullName"]= "Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>')";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["Discar"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="idt_custo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="dsc_centro_cust";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["idt_custo"]=$fdata;
	
//	idt_agenda
	$fdata = array();
	$fdata["strName"] = "idt_agenda";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Número Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agenda";
		$fdata["FullName"]= "idt_agenda";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["idt_agenda"]=$fdata;
	
//	solicitante
	$fdata = array();
	$fdata["strName"] = "solicitante";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Solicitante"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "solicitante";
		$fdata["FullName"]= "solicitante";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["solicitante"]=$fdata;
	
//	empresa
	$fdata = array();
	$fdata["strName"] = "empresa";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Empresa"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "empresa";
		$fdata["FullName"]= "empresa";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["empresa"]=$fdata;

	
$tables_data["agenda"]=&$tdataagenda;
$field_labels["agenda"] = &$fieldLabelsagenda;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["agenda"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["agenda"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3272=array();
$proto3272["m_strHead"] = "SELECT";
$proto3272["m_strFieldList"] = "Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda,  solicitante,  empresa";
$proto3272["m_strFrom"] = "FROM agenda";
$proto3272["m_strWhere"] = "";
$proto3272["m_strOrderBy"] = "";
$proto3272["m_strTail"] = "";
$proto3273=array();
$proto3273["m_sql"] = "";
$proto3273["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3273["m_column"]=$obj;
$proto3273["m_contained"] = array();
$proto3273["m_strCase"] = "";
$proto3273["m_havingmode"] = "0";
$proto3273["m_inBrackets"] = "0";
$proto3273["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3273);

$proto3272["m_where"] = $obj;
$proto3275=array();
$proto3275["m_sql"] = "";
$proto3275["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3275["m_column"]=$obj;
$proto3275["m_contained"] = array();
$proto3275["m_strCase"] = "";
$proto3275["m_havingmode"] = "0";
$proto3275["m_inBrackets"] = "0";
$proto3275["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3275);

$proto3272["m_having"] = $obj;
$proto3272["m_fieldlist"] = array();
						$proto3277=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto3277["m_expr"]=$obj;
$proto3277["m_alias"] = "";
$obj = new SQLFieldListItem($proto3277);

$proto3272["m_fieldlist"][]=$obj;
						$proto3279=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto3279["m_expr"]=$obj;
$proto3279["m_alias"] = "";
$obj = new SQLFieldListItem($proto3279);

$proto3272["m_fieldlist"][]=$obj;
						$proto3281=array();
			$proto3282=array();
$proto3282["m_functiontype"] = "SQLF_CUSTOM";
$proto3282["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>'"
));

$proto3282["m_arguments"][]=$obj;
$proto3282["m_strFunctionName"] = "Concat";
$obj = new SQLFunctionCall($proto3282);

$proto3281["m_expr"]=$obj;
$proto3281["m_alias"] = "Discar";
$obj = new SQLFieldListItem($proto3281);

$proto3272["m_fieldlist"][]=$obj;
						$proto3284=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto3284["m_expr"]=$obj;
$proto3284["m_alias"] = "";
$obj = new SQLFieldListItem($proto3284);

$proto3272["m_fieldlist"][]=$obj;
						$proto3286=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto3286["m_expr"]=$obj;
$proto3286["m_alias"] = "";
$obj = new SQLFieldListItem($proto3286);

$proto3272["m_fieldlist"][]=$obj;
						$proto3288=array();
			$obj = new SQLField(array(
	"m_strName" => "solicitante",
	"m_strTable" => "agenda"
));

$proto3288["m_expr"]=$obj;
$proto3288["m_alias"] = "";
$obj = new SQLFieldListItem($proto3288);

$proto3272["m_fieldlist"][]=$obj;
						$proto3290=array();
			$obj = new SQLField(array(
	"m_strName" => "empresa",
	"m_strTable" => "agenda"
));

$proto3290["m_expr"]=$obj;
$proto3290["m_alias"] = "";
$obj = new SQLFieldListItem($proto3290);

$proto3272["m_fieldlist"][]=$obj;
$proto3272["m_fromlist"] = array();
												$proto3292=array();
$proto3292["m_link"] = "SQLL_MAIN";
			$proto3293=array();
$proto3293["m_strName"] = "agenda";
$proto3293["m_columns"] = array();
$proto3293["m_columns"][] = "idt_agenda";
$proto3293["m_columns"][] = "Nome";
$proto3293["m_columns"][] = "Numero";
$proto3293["m_columns"][] = "idt_custo";
$proto3293["m_columns"][] = "tp_retorno";
$proto3293["m_columns"][] = "solicitante";
$proto3293["m_columns"][] = "empresa";
$obj = new SQLTable($proto3293);

$proto3292["m_table"] = $obj;
$proto3292["m_alias"] = "";
$proto3294=array();
$proto3294["m_sql"] = "";
$proto3294["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3294["m_column"]=$obj;
$proto3294["m_contained"] = array();
$proto3294["m_strCase"] = "";
$proto3294["m_havingmode"] = "0";
$proto3294["m_inBrackets"] = "0";
$proto3294["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3294);

$proto3292["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3292);

$proto3272["m_fromlist"][]=$obj;
$proto3272["m_groupby"] = array();
$proto3272["m_orderby"] = array();
$obj = new SQLQuery($proto3272);

$queryData_agenda = $obj;
$tdataagenda[".sqlquery"] = $queryData_agenda;



?>
