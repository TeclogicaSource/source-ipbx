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
$fieldLabelsagenda["Portuguese(Brazil)"]["flg_show_mobile"] = "Adicionar a lista de contatos (iPBX Mobile)";


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

$tdataagenda[".sqlHead"] = "SELECT Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda,  solicitante,  empresa,  flg_show_mobile";

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
	
//	flg_show_mobile
	$fdata = array();
	$fdata["strName"] = "flg_show_mobile";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Adicionar a lista de contatos (iPBX Mobile)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_show_mobile";
		$fdata["FullName"]= "flg_show_mobile";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataagenda["flg_show_mobile"]=$fdata;

	
$tables_data["agenda"]=&$tdataagenda;
$field_labels["agenda"] = &$fieldLabelsagenda;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["agenda"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["agenda"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3560=array();
$proto3560["m_strHead"] = "SELECT";
$proto3560["m_strFieldList"] = "Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda,  solicitante,  empresa,  flg_show_mobile";
$proto3560["m_strFrom"] = "FROM agenda";
$proto3560["m_strWhere"] = "";
$proto3560["m_strOrderBy"] = "";
$proto3560["m_strTail"] = "";
$proto3561=array();
$proto3561["m_sql"] = "";
$proto3561["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3561["m_column"]=$obj;
$proto3561["m_contained"] = array();
$proto3561["m_strCase"] = "";
$proto3561["m_havingmode"] = "0";
$proto3561["m_inBrackets"] = "0";
$proto3561["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3561);

$proto3560["m_where"] = $obj;
$proto3563=array();
$proto3563["m_sql"] = "";
$proto3563["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3563["m_column"]=$obj;
$proto3563["m_contained"] = array();
$proto3563["m_strCase"] = "";
$proto3563["m_havingmode"] = "0";
$proto3563["m_inBrackets"] = "0";
$proto3563["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3563);

$proto3560["m_having"] = $obj;
$proto3560["m_fieldlist"] = array();
						$proto3565=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto3565["m_expr"]=$obj;
$proto3565["m_alias"] = "";
$obj = new SQLFieldListItem($proto3565);

$proto3560["m_fieldlist"][]=$obj;
						$proto3567=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto3567["m_expr"]=$obj;
$proto3567["m_alias"] = "";
$obj = new SQLFieldListItem($proto3567);

$proto3560["m_fieldlist"][]=$obj;
						$proto3569=array();
			$proto3570=array();
$proto3570["m_functiontype"] = "SQLF_CUSTOM";
$proto3570["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>'"
));

$proto3570["m_arguments"][]=$obj;
$proto3570["m_strFunctionName"] = "Concat";
$obj = new SQLFunctionCall($proto3570);

$proto3569["m_expr"]=$obj;
$proto3569["m_alias"] = "Discar";
$obj = new SQLFieldListItem($proto3569);

$proto3560["m_fieldlist"][]=$obj;
						$proto3572=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto3572["m_expr"]=$obj;
$proto3572["m_alias"] = "";
$obj = new SQLFieldListItem($proto3572);

$proto3560["m_fieldlist"][]=$obj;
						$proto3574=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto3574["m_expr"]=$obj;
$proto3574["m_alias"] = "";
$obj = new SQLFieldListItem($proto3574);

$proto3560["m_fieldlist"][]=$obj;
						$proto3576=array();
			$obj = new SQLField(array(
	"m_strName" => "solicitante",
	"m_strTable" => "agenda"
));

$proto3576["m_expr"]=$obj;
$proto3576["m_alias"] = "";
$obj = new SQLFieldListItem($proto3576);

$proto3560["m_fieldlist"][]=$obj;
						$proto3578=array();
			$obj = new SQLField(array(
	"m_strName" => "empresa",
	"m_strTable" => "agenda"
));

$proto3578["m_expr"]=$obj;
$proto3578["m_alias"] = "";
$obj = new SQLFieldListItem($proto3578);

$proto3560["m_fieldlist"][]=$obj;
						$proto3580=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_show_mobile",
	"m_strTable" => "agenda"
));

$proto3580["m_expr"]=$obj;
$proto3580["m_alias"] = "";
$obj = new SQLFieldListItem($proto3580);

$proto3560["m_fieldlist"][]=$obj;
$proto3560["m_fromlist"] = array();
												$proto3582=array();
$proto3582["m_link"] = "SQLL_MAIN";
			$proto3583=array();
$proto3583["m_strName"] = "agenda";
$proto3583["m_columns"] = array();
$proto3583["m_columns"][] = "idt_agenda";
$proto3583["m_columns"][] = "Nome";
$proto3583["m_columns"][] = "Numero";
$proto3583["m_columns"][] = "idt_custo";
$proto3583["m_columns"][] = "tp_retorno";
$proto3583["m_columns"][] = "solicitante";
$proto3583["m_columns"][] = "empresa";
$proto3583["m_columns"][] = "flg_show_mobile";
$obj = new SQLTable($proto3583);

$proto3582["m_table"] = $obj;
$proto3582["m_alias"] = "";
$proto3584=array();
$proto3584["m_sql"] = "";
$proto3584["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3584["m_column"]=$obj;
$proto3584["m_contained"] = array();
$proto3584["m_strCase"] = "";
$proto3584["m_havingmode"] = "0";
$proto3584["m_inBrackets"] = "0";
$proto3584["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3584);

$proto3582["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3582);

$proto3560["m_fromlist"][]=$obj;
$proto3560["m_groupby"] = array();
$proto3560["m_orderby"] = array();
$obj = new SQLQuery($proto3560);

$queryData_agenda = $obj;
$tdataagenda[".sqlquery"] = $queryData_agenda;



?>
