<?php

//	field labels
$fieldLabelsTelefone_discado = array();
$fieldLabelsTelefone_discado["Portuguese(Brazil)"]=array();
$fieldLabelsTelefone_discado["Portuguese(Brazil)"]["idt_agenda"] = "Idt Agenda";
$fieldLabelsTelefone_discado["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsTelefone_discado["Portuguese(Brazil)"]["Numero"] = "Numero";
$fieldLabelsTelefone_discado["Portuguese(Brazil)"]["idt_custo"] = "Idt Custo";


$tdataTelefone_discado=array();
	$tdataTelefone_discado[".NumberOfChars"]=80; 
	$tdataTelefone_discado[".ShortName"]="Telefone_discado";
	$tdataTelefone_discado[".OwnerID"]="";
	$tdataTelefone_discado[".OriginalTable"]="agenda";
	$tdataTelefone_discado[".NCSearch"]=true;
	

$tdataTelefone_discado[".shortTableName"] = "Telefone_discado";
$tdataTelefone_discado[".dataSourceTable"] = "Telefones Discados";
$tdataTelefone_discado[".nSecOptions"] = 0;
$tdataTelefone_discado[".nLoginMethod"] = 1;
$tdataTelefone_discado[".recsPerRowList"] = 1;	
$tdataTelefone_discado[".tableGroupBy"] = "0";
$tdataTelefone_discado[".dbType"] = 0;
$tdataTelefone_discado[".mainTableOwnerID"] = "";
$tdataTelefone_discado[".moveNext"] = 1;

$tdataTelefone_discado[".listAjax"] = false;

	$tdataTelefone_discado[".audit"] = false;

	$tdataTelefone_discado[".locking"] = false;
	
$tdataTelefone_discado[".listIcons"] = true;

$tdataTelefone_discado[".exportTo"] = true;

$tdataTelefone_discado[".printFriendly"] = true;


$tdataTelefone_discado[".showSimpleSearchOptions"] = false;

$tdataTelefone_discado[".showSearchPanel"] = true;


$tdataTelefone_discado[".isUseAjaxSuggest"] = true;



// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataTelefone_discado[".arrKeyFields"][] = "idt_agenda";

// use datepicker for search panel
$tdataTelefone_discado[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataTelefone_discado[".isUseTimeForSearch"] = false;





$tdataTelefone_discado[".isUseInlineJs"] = $tdataTelefone_discado[".isUseInlineAdd"] || $tdataTelefone_discado[".isUseInlineEdit"];

$tdataTelefone_discado[".allSearchFields"] = array();

$tdataTelefone_discado[".globSearchFields"][] = "idt_agenda";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_agenda", $tdataTelefone_discado[".allSearchFields"]))
{
	$tdataTelefone_discado[".allSearchFields"][] = "idt_agenda";	
}
$tdataTelefone_discado[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdataTelefone_discado[".allSearchFields"]))
{
	$tdataTelefone_discado[".allSearchFields"][] = "Nome";	
}
$tdataTelefone_discado[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdataTelefone_discado[".allSearchFields"]))
{
	$tdataTelefone_discado[".allSearchFields"][] = "Numero";	
}
$tdataTelefone_discado[".globSearchFields"][] = "idt_custo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_custo", $tdataTelefone_discado[".allSearchFields"]))
{
	$tdataTelefone_discado[".allSearchFields"][] = "idt_custo";	
}


$tdataTelefone_discado[".isDynamicPerm"] = true;

	

$tdataTelefone_discado[".isDisplayLoading"] = true;

$tdataTelefone_discado[".isResizeColumns"] = false;


$tdataTelefone_discado[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataTelefone_discado[".strOrderBy"] = $gstrOrderBy;
	
$tdataTelefone_discado[".orderindexes"] = array();

$tdataTelefone_discado[".sqlHead"] = "SELECT idt_agenda,  Nome,  Numero,  idt_custo";

$tdataTelefone_discado[".sqlFrom"] = "FROM agenda";

$tdataTelefone_discado[".sqlWhereExpr"] = "";

$tdataTelefone_discado[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agenda";
	$tdataTelefone_discado[".Keys"]=$tableKeys;

	
//	idt_agenda
	$fdata = array();
	$fdata["strName"] = "idt_agenda";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Idt Agenda"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agenda";
		$fdata["FullName"]= "idt_agenda";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataTelefone_discado["idt_agenda"]=$fdata;
	
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
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataTelefone_discado["Nome"]=$fdata;
	
//	Numero
	$fdata = array();
	$fdata["strName"] = "Numero";
	$fdata["ownerTable"] = "agenda";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Numero";
		$fdata["FullName"]= "Numero";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataTelefone_discado["Numero"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "agenda";
		$fdata["Label"]="Idt Custo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataTelefone_discado["idt_custo"]=$fdata;

	
$tables_data["Telefones Discados"]=&$tdataTelefone_discado;
$field_labels["Telefones_Discados"] = &$fieldLabelsTelefone_discado;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Telefones Discados"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Telefones Discados"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto86=array();
$proto86["m_strHead"] = "SELECT";
$proto86["m_strFieldList"] = "idt_agenda,  Nome,  Numero,  idt_custo";
$proto86["m_strFrom"] = "FROM agenda";
$proto86["m_strWhere"] = "";
$proto86["m_strOrderBy"] = "";
$proto86["m_strTail"] = "";
$proto87=array();
$proto87["m_sql"] = "";
$proto87["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto87["m_column"]=$obj;
$proto87["m_contained"] = array();
$proto87["m_strCase"] = "";
$proto87["m_havingmode"] = "0";
$proto87["m_inBrackets"] = "0";
$proto87["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto87);

$proto86["m_where"] = $obj;
$proto89=array();
$proto89["m_sql"] = "";
$proto89["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto89["m_column"]=$obj;
$proto89["m_contained"] = array();
$proto89["m_strCase"] = "";
$proto89["m_havingmode"] = "0";
$proto89["m_inBrackets"] = "0";
$proto89["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto89);

$proto86["m_having"] = $obj;
$proto86["m_fieldlist"] = array();
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto86["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto86["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto86["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto86["m_fieldlist"][]=$obj;
$proto86["m_fromlist"] = array();
												$proto99=array();
$proto99["m_link"] = "SQLL_MAIN";
			$proto100=array();
$proto100["m_strName"] = "agenda";
$proto100["m_columns"] = array();
$proto100["m_columns"][] = "idt_agenda";
$proto100["m_columns"][] = "Nome";
$proto100["m_columns"][] = "Numero";
$proto100["m_columns"][] = "idt_custo";
$obj = new SQLTable($proto100);

$proto99["m_table"] = $obj;
$proto99["m_alias"] = "";
$proto101=array();
$proto101["m_sql"] = "";
$proto101["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto101["m_column"]=$obj;
$proto101["m_contained"] = array();
$proto101["m_strCase"] = "";
$proto101["m_havingmode"] = "0";
$proto101["m_inBrackets"] = "0";
$proto101["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto101);

$proto99["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto99);

$proto86["m_fromlist"][]=$obj;
$proto86["m_groupby"] = array();
$proto86["m_orderby"] = array();
$obj = new SQLQuery($proto86);

$queryData_Telefone_discado = $obj;
$tdataTelefone_discado[".sqlquery"] = $queryData_Telefone_discado;



?>
