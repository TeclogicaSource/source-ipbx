<?php

//	field labels
$fieldLabelsContatos = array();
$fieldLabelsContatos["Portuguese(Brazil)"]=array();
$fieldLabelsContatos["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsContatos["Portuguese(Brazil)"]["Numero"] = "Número";
$fieldLabelsContatos["Portuguese(Brazil)"]["idt_custo"] = "Centro de Custo";
$fieldLabelsContatos["Portuguese(Brazil)"]["Discar"] = "Discar";
$fieldLabelsContatos["Portuguese(Brazil)"]["idt_agenda"] = "Número Identificação";


$tdataContatos=array();
	$tdataContatos[".NumberOfChars"]=80; 
	$tdataContatos[".ShortName"]="Contatos";
	$tdataContatos[".OwnerID"]="";
	$tdataContatos[".OriginalTable"]="agenda";
	$tdataContatos[".NCSearch"]=true;
	

$tdataContatos[".shortTableName"] = "Contatos";
$tdataContatos[".dataSourceTable"] = "Contatos";
$tdataContatos[".nSecOptions"] = 0;
$tdataContatos[".nLoginMethod"] = 1;
$tdataContatos[".recsPerRowList"] = 1;	
$tdataContatos[".tableGroupBy"] = "0";
$tdataContatos[".dbType"] = 0;
$tdataContatos[".mainTableOwnerID"] = "";
$tdataContatos[".moveNext"] = 1;

$tdataContatos[".listAjax"] = true;

	$tdataContatos[".audit"] = true;

	$tdataContatos[".locking"] = false;
	
$tdataContatos[".listIcons"] = true;


$tdataContatos[".printFriendly"] = true;


$tdataContatos[".showSimpleSearchOptions"] = false;

$tdataContatos[".showSearchPanel"] = true;


$tdataContatos[".isUseAjaxSuggest"] = true;

$tdataContatos[".rowHighlite"] = true;

$tdataContatos[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataContatos[".arrKeyFields"][] = "Numero";

// use datepicker for search panel
$tdataContatos[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataContatos[".isUseTimeForSearch"] = false;






$tdataContatos[".isUseInlineJs"] = $tdataContatos[".isUseInlineAdd"] || $tdataContatos[".isUseInlineEdit"];

$tdataContatos[".allSearchFields"] = array();

$tdataContatos[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdataContatos[".allSearchFields"]))
{
	$tdataContatos[".allSearchFields"][] = "Nome";	
}
$tdataContatos[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdataContatos[".allSearchFields"]))
{
	$tdataContatos[".allSearchFields"][] = "Numero";	
}


$tdataContatos[".isDynamicPerm"] = true;

	

$tdataContatos[".isDisplayLoading"] = true;

$tdataContatos[".isResizeColumns"] = false;


$tdataContatos[".createLoginPage"] = true;


 	




$tdataContatos[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataContatos[".strOrderBy"] = $gstrOrderBy;
	
$tdataContatos[".orderindexes"] = array();

$tdataContatos[".sqlHead"] = "SELECT Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda";

$tdataContatos[".sqlFrom"] = "FROM agenda";

$tdataContatos[".sqlWhereExpr"] = "";

$tdataContatos[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="Numero";
	$tdataContatos[".Keys"]=$tableKeys;

	
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
			$tdataContatos["Nome"]=$fdata;
	
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
			$tdataContatos["Numero"]=$fdata;
	
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
			$tdataContatos["Discar"]=$fdata;
	
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
			$tdataContatos["idt_custo"]=$fdata;
	
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
			$tdataContatos["idt_agenda"]=$fdata;

	
$tables_data["Contatos"]=&$tdataContatos;
$field_labels["Contatos"] = &$fieldLabelsContatos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Contatos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Contatos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto949=array();
$proto949["m_strHead"] = "SELECT";
$proto949["m_strFieldList"] = "Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda";
$proto949["m_strFrom"] = "FROM agenda";
$proto949["m_strWhere"] = "";
$proto949["m_strOrderBy"] = "";
$proto949["m_strTail"] = "";
$proto950=array();
$proto950["m_sql"] = "";
$proto950["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto950["m_column"]=$obj;
$proto950["m_contained"] = array();
$proto950["m_strCase"] = "";
$proto950["m_havingmode"] = "0";
$proto950["m_inBrackets"] = "0";
$proto950["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto950);

$proto949["m_where"] = $obj;
$proto952=array();
$proto952["m_sql"] = "";
$proto952["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto952["m_column"]=$obj;
$proto952["m_contained"] = array();
$proto952["m_strCase"] = "";
$proto952["m_havingmode"] = "0";
$proto952["m_inBrackets"] = "0";
$proto952["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto952);

$proto949["m_having"] = $obj;
$proto949["m_fieldlist"] = array();
						$proto954=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto954["m_expr"]=$obj;
$proto954["m_alias"] = "";
$obj = new SQLFieldListItem($proto954);

$proto949["m_fieldlist"][]=$obj;
						$proto956=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto956["m_expr"]=$obj;
$proto956["m_alias"] = "";
$obj = new SQLFieldListItem($proto956);

$proto949["m_fieldlist"][]=$obj;
						$proto958=array();
			$proto959=array();
$proto959["m_functiontype"] = "SQLF_CUSTOM";
$proto959["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>'"
));

$proto959["m_arguments"][]=$obj;
$proto959["m_strFunctionName"] = "Concat";
$obj = new SQLFunctionCall($proto959);

$proto958["m_expr"]=$obj;
$proto958["m_alias"] = "Discar";
$obj = new SQLFieldListItem($proto958);

$proto949["m_fieldlist"][]=$obj;
						$proto961=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto961["m_expr"]=$obj;
$proto961["m_alias"] = "";
$obj = new SQLFieldListItem($proto961);

$proto949["m_fieldlist"][]=$obj;
						$proto963=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto963["m_expr"]=$obj;
$proto963["m_alias"] = "";
$obj = new SQLFieldListItem($proto963);

$proto949["m_fieldlist"][]=$obj;
$proto949["m_fromlist"] = array();
												$proto965=array();
$proto965["m_link"] = "SQLL_MAIN";
			$proto966=array();
$proto966["m_strName"] = "agenda";
$proto966["m_columns"] = array();
$proto966["m_columns"][] = "idt_agenda";
$proto966["m_columns"][] = "Nome";
$proto966["m_columns"][] = "Numero";
$proto966["m_columns"][] = "idt_custo";
$proto966["m_columns"][] = "tp_retorno";
$proto966["m_columns"][] = "solicitante";
$proto966["m_columns"][] = "empresa";
$obj = new SQLTable($proto966);

$proto965["m_table"] = $obj;
$proto965["m_alias"] = "";
$proto967=array();
$proto967["m_sql"] = "";
$proto967["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto967["m_column"]=$obj;
$proto967["m_contained"] = array();
$proto967["m_strCase"] = "";
$proto967["m_havingmode"] = "0";
$proto967["m_inBrackets"] = "0";
$proto967["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto967);

$proto965["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto965);

$proto949["m_fromlist"][]=$obj;
$proto949["m_groupby"] = array();
$proto949["m_orderby"] = array();
$obj = new SQLQuery($proto949);

$queryData_Contatos = $obj;
$tdataContatos[".sqlquery"] = $queryData_Contatos;



?>
