<?php

//	field labels
$fieldLabelsv_contatos = array();
$fieldLabelsv_contatos["Portuguese(Brazil)"]=array();
$fieldLabelsv_contatos["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelsv_contatos["Portuguese(Brazil)"]["Numero"] = "Número";
$fieldLabelsv_contatos["Portuguese(Brazil)"]["Discar"] = "Discar";
$fieldLabelsv_contatos["Portuguese(Brazil)"]["idt_custo"] = "Centro de custo";
$fieldLabelsv_contatos["Portuguese(Brazil)"]["idt_agenda"] = "Atalho Agenda";


$tdatav_contatos=array();
	$tdatav_contatos[".NumberOfChars"]=80; 
	$tdatav_contatos[".ShortName"]="v_contatos";
	$tdatav_contatos[".OwnerID"]="";
	$tdatav_contatos[".OriginalTable"]="v_contatos";
	$tdatav_contatos[".NCSearch"]=true;
	

$tdatav_contatos[".shortTableName"] = "v_contatos";
$tdatav_contatos[".dataSourceTable"] = "v_contatos";
$tdatav_contatos[".nSecOptions"] = 0;
$tdatav_contatos[".nLoginMethod"] = 1;
$tdatav_contatos[".recsPerRowList"] = 1;	
$tdatav_contatos[".tableGroupBy"] = "0";
$tdatav_contatos[".dbType"] = 0;
$tdatav_contatos[".mainTableOwnerID"] = "";
$tdatav_contatos[".moveNext"] = 1;

$tdatav_contatos[".listAjax"] = false;

	$tdatav_contatos[".audit"] = true;

	$tdatav_contatos[".locking"] = false;
	
$tdatav_contatos[".listIcons"] = true;


$tdatav_contatos[".printFriendly"] = true;


$tdatav_contatos[".showSimpleSearchOptions"] = false;

$tdatav_contatos[".showSearchPanel"] = true;


$tdatav_contatos[".isUseAjaxSuggest"] = true;

$tdatav_contatos[".rowHighlite"] = true;

$tdatav_contatos[".delFile"] = true;

// button handlers file names

// start on load js handlers
$tdatav_contatos[".jsOnloadList"] = "

// put your code here





        ";








// end on load js handlers




// use datepicker for search panel
$tdatav_contatos[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatav_contatos[".isUseTimeForSearch"] = false;






$tdatav_contatos[".isUseInlineJs"] = $tdatav_contatos[".isUseInlineAdd"] || $tdatav_contatos[".isUseInlineEdit"];

$tdatav_contatos[".allSearchFields"] = array();

$tdatav_contatos[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdatav_contatos[".allSearchFields"]))
{
	$tdatav_contatos[".allSearchFields"][] = "Nome";	
}
$tdatav_contatos[".globSearchFields"][] = "Numero";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Numero", $tdatav_contatos[".allSearchFields"]))
{
	$tdatav_contatos[".allSearchFields"][] = "Numero";	
}
$tdatav_contatos[".globSearchFields"][] = "Discar";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Discar", $tdatav_contatos[".allSearchFields"]))
{
	$tdatav_contatos[".allSearchFields"][] = "Discar";	
}
$tdatav_contatos[".globSearchFields"][] = "idt_agenda";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_agenda", $tdatav_contatos[".allSearchFields"]))
{
	$tdatav_contatos[".allSearchFields"][] = "idt_agenda";	
}


$tdatav_contatos[".isDynamicPerm"] = true;

	

$tdatav_contatos[".isDisplayLoading"] = true;

$tdatav_contatos[".isResizeColumns"] = false;


$tdatav_contatos[".createLoginPage"] = true;


 	




$tdatav_contatos[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY Nome";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatav_contatos[".strOrderBy"] = $gstrOrderBy;
	
$tdatav_contatos[".orderindexes"] = array();
$tdatav_contatos[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Nome");

$tdatav_contatos[".sqlHead"] = "SELECT Nome,  Numero,  Discar,  idt_custo,  idt_agenda";

$tdatav_contatos[".sqlFrom"] = "FROM v_contatos";

$tdatav_contatos[".sqlWhereExpr"] = "";

$tdatav_contatos[".sqlTail"] = "";



	$tableKeys=array();
	$tdatav_contatos[".Keys"]=$tableKeys;

	
//	Nome
	$fdata = array();
	$fdata["strName"] = "Nome";
	$fdata["ownerTable"] = "v_contatos";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Nome";
		$fdata["FullName"]= "Nome";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatav_contatos["Nome"]=$fdata;
	
//	Numero
	$fdata = array();
	$fdata["strName"] = "Numero";
	$fdata["ownerTable"] = "v_contatos";
		$fdata["Label"]="Número"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Numero";
		$fdata["FullName"]= "Numero";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatav_contatos["Numero"]=$fdata;
	
//	Discar
	$fdata = array();
	$fdata["strName"] = "Discar";
	$fdata["ownerTable"] = "v_contatos";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Discar";
		$fdata["FullName"]= "Discar";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=140";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatav_contatos["Discar"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "v_contatos";
		$fdata["Label"]="Centro de custo"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="idt_custo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatav_contatos["idt_custo"]=$fdata;
	
//	idt_agenda
	$fdata = array();
	$fdata["strName"] = "idt_agenda";
	$fdata["ownerTable"] = "v_contatos";
		$fdata["Label"]="Atalho Agenda"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agenda";
		$fdata["FullName"]= "idt_agenda";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatav_contatos["idt_agenda"]=$fdata;

	
$tables_data["v_contatos"]=&$tdatav_contatos;
$field_labels["v_contatos"] = &$fieldLabelsv_contatos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["v_contatos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["v_contatos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1681=array();
$proto1681["m_strHead"] = "SELECT";
$proto1681["m_strFieldList"] = "Nome,  Numero,  Discar,  idt_custo,  idt_agenda";
$proto1681["m_strFrom"] = "FROM v_contatos";
$proto1681["m_strWhere"] = "";
$proto1681["m_strOrderBy"] = "ORDER BY Nome";
$proto1681["m_strTail"] = "";
$proto1682=array();
$proto1682["m_sql"] = "";
$proto1682["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1682["m_column"]=$obj;
$proto1682["m_contained"] = array();
$proto1682["m_strCase"] = "";
$proto1682["m_havingmode"] = "0";
$proto1682["m_inBrackets"] = "0";
$proto1682["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1682);

$proto1681["m_where"] = $obj;
$proto1684=array();
$proto1684["m_sql"] = "";
$proto1684["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1684["m_column"]=$obj;
$proto1684["m_contained"] = array();
$proto1684["m_strCase"] = "";
$proto1684["m_havingmode"] = "0";
$proto1684["m_inBrackets"] = "0";
$proto1684["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1684);

$proto1681["m_having"] = $obj;
$proto1681["m_fieldlist"] = array();
						$proto1686=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "v_contatos"
));

$proto1686["m_expr"]=$obj;
$proto1686["m_alias"] = "";
$obj = new SQLFieldListItem($proto1686);

$proto1681["m_fieldlist"][]=$obj;
						$proto1688=array();
			$obj = new SQLField(array(
	"m_strName" => "Numero",
	"m_strTable" => "v_contatos"
));

$proto1688["m_expr"]=$obj;
$proto1688["m_alias"] = "";
$obj = new SQLFieldListItem($proto1688);

$proto1681["m_fieldlist"][]=$obj;
						$proto1690=array();
			$obj = new SQLField(array(
	"m_strName" => "Discar",
	"m_strTable" => "v_contatos"
));

$proto1690["m_expr"]=$obj;
$proto1690["m_alias"] = "";
$obj = new SQLFieldListItem($proto1690);

$proto1681["m_fieldlist"][]=$obj;
						$proto1692=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "v_contatos"
));

$proto1692["m_expr"]=$obj;
$proto1692["m_alias"] = "";
$obj = new SQLFieldListItem($proto1692);

$proto1681["m_fieldlist"][]=$obj;
						$proto1694=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agenda",
	"m_strTable" => "v_contatos"
));

$proto1694["m_expr"]=$obj;
$proto1694["m_alias"] = "";
$obj = new SQLFieldListItem($proto1694);

$proto1681["m_fieldlist"][]=$obj;
$proto1681["m_fromlist"] = array();
												$proto1696=array();
$proto1696["m_link"] = "SQLL_MAIN";
			$proto1697=array();
$proto1697["m_strName"] = "v_contatos";
$proto1697["m_columns"] = array();
$proto1697["m_columns"][] = "Nome";
$proto1697["m_columns"][] = "Numero";
$proto1697["m_columns"][] = "Discar";
$proto1697["m_columns"][] = "idt_custo";
$proto1697["m_columns"][] = "idt_agenda";
$obj = new SQLTable($proto1697);

$proto1696["m_table"] = $obj;
$proto1696["m_alias"] = "";
$proto1698=array();
$proto1698["m_sql"] = "";
$proto1698["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1698["m_column"]=$obj;
$proto1698["m_contained"] = array();
$proto1698["m_strCase"] = "";
$proto1698["m_havingmode"] = "0";
$proto1698["m_inBrackets"] = "0";
$proto1698["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1698);

$proto1696["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1696);

$proto1681["m_fromlist"][]=$obj;
$proto1681["m_groupby"] = array();
$proto1681["m_orderby"] = array();
												$proto1700=array();
						$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "v_contatos"
));

$proto1700["m_column"]=$obj;
$proto1700["m_bAsc"] = 1;
$proto1700["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1700);

$proto1681["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1681);

$queryData_v_contatos = $obj;
$tdatav_contatos[".sqlquery"] = $queryData_v_contatos;



?>
