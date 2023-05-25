<?php

//	field labels
$fieldLabelsTelefone_Recebido = array();
$fieldLabelsTelefone_Recebido["Portuguese(Brazil)"]=array();
$fieldLabelsTelefone_Recebido["Portuguese(Brazil)"]["idt_agenda"] = "Idt Agenda";
$fieldLabelsTelefone_Recebido["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsTelefone_Recebido["Portuguese(Brazil)"]["Numero"] = "Numero";
$fieldLabelsTelefone_Recebido["Portuguese(Brazil)"]["idt_custo"] = "Idt Custo";


$tdataTelefone_Recebido=array();
	$tdataTelefone_Recebido[".NumberOfChars"]=80; 
	$tdataTelefone_Recebido[".ShortName"]="Telefone_Recebido";
	$tdataTelefone_Recebido[".OwnerID"]="";
	$tdataTelefone_Recebido[".OriginalTable"]="agenda";
	$tdataTelefone_Recebido[".NCSearch"]=true;
	

$tdataTelefone_Recebido[".shortTableName"] = "Telefone_Recebido";
$tdataTelefone_Recebido[".dataSourceTable"] = "Telefones Recebidos";
$tdataTelefone_Recebido[".nSecOptions"] = 0;
$tdataTelefone_Recebido[".nLoginMethod"] = 1;
$tdataTelefone_Recebido[".recsPerRowList"] = 1;	
$tdataTelefone_Recebido[".tableGroupBy"] = "0";
$tdataTelefone_Recebido[".dbType"] = 0;
$tdataTelefone_Recebido[".mainTableOwnerID"] = "";
$tdataTelefone_Recebido[".moveNext"] = 1;

$tdataTelefone_Recebido[".listAjax"] = false;

	$tdataTelefone_Recebido[".audit"] = false;

	$tdataTelefone_Recebido[".locking"] = false;
	
$tdataTelefone_Recebido[".listIcons"] = true;

$tdataTelefone_Recebido[".exportTo"] = true;

$tdataTelefone_Recebido[".printFriendly"] = true;


$tdataTelefone_Recebido[".showSimpleSearchOptions"] = false;

$tdataTelefone_Recebido[".showSearchPanel"] = true;


$tdataTelefone_Recebido[".isUseAjaxSuggest"] = true;



// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataTelefone_Recebido[".arrKeyFields"][] = "idt_agenda";

// use datepicker for search panel
$tdataTelefone_Recebido[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataTelefone_Recebido[".isUseTimeForSearch"] = false;





$tdataTelefone_Recebido[".isUseInlineJs"] = $tdataTelefone_Recebido[".isUseInlineAdd"] || $tdataTelefone_Recebido[".isUseInlineEdit"];

$tdataTelefone_Recebido[".allSearchFields"] = array();

$tdataTelefone_Recebido[".globSearchFields"][] = "idt_agenda";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_agenda", $tdataTelefone_Recebido[".allSearchFields"]))
{
	$tdataTelefone_Recebido[".allSearchFields"][] = "idt_agenda";	
}
$tdataTelefone_Recebido[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdataTelefone_Recebido[".allSearchFields"]))
{
	$tdataTelefone_Recebido[".allSearchFields"][] = "Nome";	
}
$tdataTelefone_Recebido[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdataTelefone_Recebido[".allSearchFields"]))
{
	$tdataTelefone_Recebido[".allSearchFields"][] = "Numero";	
}
$tdataTelefone_Recebido[".globSearchFields"][] = "idt_custo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_custo", $tdataTelefone_Recebido[".allSearchFields"]))
{
	$tdataTelefone_Recebido[".allSearchFields"][] = "idt_custo";	
}


$tdataTelefone_Recebido[".isDynamicPerm"] = true;

	

$tdataTelefone_Recebido[".isDisplayLoading"] = true;

$tdataTelefone_Recebido[".isResizeColumns"] = false;


$tdataTelefone_Recebido[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataTelefone_Recebido[".strOrderBy"] = $gstrOrderBy;
	
$tdataTelefone_Recebido[".orderindexes"] = array();

$tdataTelefone_Recebido[".sqlHead"] = "SELECT idt_agenda,   Nome,   Numero,   idt_custo";

$tdataTelefone_Recebido[".sqlFrom"] = "FROM agenda";

$tdataTelefone_Recebido[".sqlWhereExpr"] = "";

$tdataTelefone_Recebido[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agenda";
	$tdataTelefone_Recebido[".Keys"]=$tableKeys;

	
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
						$tdataTelefone_Recebido["idt_agenda"]=$fdata;
	
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
						$tdataTelefone_Recebido["Nome"]=$fdata;
	
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
						$tdataTelefone_Recebido["Numero"]=$fdata;
	
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
						$tdataTelefone_Recebido["idt_custo"]=$fdata;

	
$tables_data["Telefones Recebidos"]=&$tdataTelefone_Recebido;
$field_labels["Telefones_Recebidos"] = &$fieldLabelsTelefone_Recebido;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Telefones Recebidos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Telefones Recebidos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto69=array();
$proto69["m_strHead"] = "SELECT";
$proto69["m_strFieldList"] = "idt_agenda,   Nome,   Numero,   idt_custo";
$proto69["m_strFrom"] = "FROM agenda";
$proto69["m_strWhere"] = "";
$proto69["m_strOrderBy"] = "";
$proto69["m_strTail"] = "";
$proto70=array();
$proto70["m_sql"] = "";
$proto70["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto70["m_column"]=$obj;
$proto70["m_contained"] = array();
$proto70["m_strCase"] = "";
$proto70["m_havingmode"] = "0";
$proto70["m_inBrackets"] = "0";
$proto70["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto70);

$proto69["m_where"] = $obj;
$proto72=array();
$proto72["m_sql"] = "";
$proto72["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto72["m_column"]=$obj;
$proto72["m_contained"] = array();
$proto72["m_strCase"] = "";
$proto72["m_havingmode"] = "0";
$proto72["m_inBrackets"] = "0";
$proto72["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto72);

$proto69["m_having"] = $obj;
$proto69["m_fieldlist"] = array();
						$proto74=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "agenda"
));

$proto74["m_expr"]=$obj;
$proto74["m_alias"] = "";
$obj = new SQLFieldListItem($proto74);

$proto69["m_fieldlist"][]=$obj;
						$proto76=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "agenda"
));

$proto76["m_expr"]=$obj;
$proto76["m_alias"] = "";
$obj = new SQLFieldListItem($proto76);

$proto69["m_fieldlist"][]=$obj;
						$proto78=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "agenda"
));

$proto78["m_expr"]=$obj;
$proto78["m_alias"] = "";
$obj = new SQLFieldListItem($proto78);

$proto69["m_fieldlist"][]=$obj;
						$proto80=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "agenda"
));

$proto80["m_expr"]=$obj;
$proto80["m_alias"] = "";
$obj = new SQLFieldListItem($proto80);

$proto69["m_fieldlist"][]=$obj;
$proto69["m_fromlist"] = array();
												$proto82=array();
$proto82["m_link"] = "SQLL_MAIN";
			$proto83=array();
$proto83["m_strName"] = "agenda";
$proto83["m_columns"] = array();
$proto83["m_columns"][] = "idt_agenda";
$proto83["m_columns"][] = "Nome";
$proto83["m_columns"][] = "Numero";
$proto83["m_columns"][] = "idt_custo";
$obj = new SQLTable($proto83);

$proto82["m_table"] = $obj;
$proto82["m_alias"] = "";
$proto84=array();
$proto84["m_sql"] = "";
$proto84["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto84["m_column"]=$obj;
$proto84["m_contained"] = array();
$proto84["m_strCase"] = "";
$proto84["m_havingmode"] = "0";
$proto84["m_inBrackets"] = "0";
$proto84["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto84);

$proto82["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto82);

$proto69["m_fromlist"][]=$obj;
$proto69["m_groupby"] = array();
$proto69["m_orderby"] = array();
$obj = new SQLQuery($proto69);

$queryData_Telefone_Recebido = $obj;
$tdataTelefone_Recebido[".sqlquery"] = $queryData_Telefone_Recebido;



?>
