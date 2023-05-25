<?php

//	field labels
$fieldLabelscc_receptivo_horario = array();
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]=array();
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["id_horario"] = "Identificação";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["dsc_horario"] = "Descrição Horario";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["hr_inicio"] = "Horário Inicio";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["hr_fim"] = "Horário Fim";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["seg"] = "Segunda-Feira";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["ter"] = "Terça-Feira";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["qua"] = "Quarta-Feira";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["qui"] = "Quinta-Feira";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["sex"] = "Sexta-Feira";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["sab"] = "Sábado";
$fieldLabelscc_receptivo_horario["Portuguese(Brazil)"]["dom"] = "Domingo";


$tdatacc_receptivo_horario=array();
	$tdatacc_receptivo_horario[".NumberOfChars"]=80; 
	$tdatacc_receptivo_horario[".ShortName"]="cc_receptivo_horario";
	$tdatacc_receptivo_horario[".OwnerID"]="";
	$tdatacc_receptivo_horario[".OriginalTable"]="cc_receptivo_horario";
	$tdatacc_receptivo_horario[".NCSearch"]=true;
	

$tdatacc_receptivo_horario[".shortTableName"] = "cc_receptivo_horario";
$tdatacc_receptivo_horario[".dataSourceTable"] = "cc_receptivo_horario";
$tdatacc_receptivo_horario[".nSecOptions"] = 0;
$tdatacc_receptivo_horario[".nLoginMethod"] = 1;
$tdatacc_receptivo_horario[".recsPerRowList"] = 1;	
$tdatacc_receptivo_horario[".tableGroupBy"] = "0";
$tdatacc_receptivo_horario[".dbType"] = 0;
$tdatacc_receptivo_horario[".mainTableOwnerID"] = "";
$tdatacc_receptivo_horario[".moveNext"] = 1;

$tdatacc_receptivo_horario[".listAjax"] = true;

	$tdatacc_receptivo_horario[".audit"] = true;

	$tdatacc_receptivo_horario[".locking"] = false;
	
$tdatacc_receptivo_horario[".listIcons"] = true;
$tdatacc_receptivo_horario[".inlineEdit"] = true;



$tdatacc_receptivo_horario[".delete"] = true;

$tdatacc_receptivo_horario[".showSimpleSearchOptions"] = false;

$tdatacc_receptivo_horario[".showSearchPanel"] = true;


$tdatacc_receptivo_horario[".isUseAjaxSuggest"] = true;

$tdatacc_receptivo_horario[".rowHighlite"] = true;

$tdatacc_receptivo_horario[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_receptivo_horario[".arrKeyFields"][] = "id_horario";

// use datepicker for search panel
$tdatacc_receptivo_horario[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_receptivo_horario[".isUseTimeForSearch"] = true;





$tdatacc_receptivo_horario[".isUseInlineAdd"] = true;

$tdatacc_receptivo_horario[".isUseInlineEdit"] = true;
$tdatacc_receptivo_horario[".isUseInlineJs"] = $tdatacc_receptivo_horario[".isUseInlineAdd"] || $tdatacc_receptivo_horario[".isUseInlineEdit"];

$tdatacc_receptivo_horario[".allSearchFields"] = array();

$tdatacc_receptivo_horario[".globSearchFields"][] = "dsc_horario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_horario", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "dsc_horario";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "hr_inicio";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_inicio", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "hr_inicio";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "hr_fim";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_fim", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "hr_fim";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "seg";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("seg", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "seg";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "ter";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ter", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "ter";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "qua";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("qua", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "qua";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "qui";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("qui", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "qui";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "sex";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("sex", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "sex";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "sab";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("sab", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "sab";	
}
$tdatacc_receptivo_horario[".globSearchFields"][] = "dom";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dom", $tdatacc_receptivo_horario[".allSearchFields"]))
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "dom";	
}

$tdatacc_receptivo_horario[".panelSearchFields"][] = "dsc_horario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_horario", $tdatacc_receptivo_horario[".allSearchFields"])) 
{
	$tdatacc_receptivo_horario[".allSearchFields"][] = "dsc_horario";	
}

$tdatacc_receptivo_horario[".isDynamicPerm"] = true;

	

$tdatacc_receptivo_horario[".isDisplayLoading"] = true;

$tdatacc_receptivo_horario[".isResizeColumns"] = false;


$tdatacc_receptivo_horario[".createLoginPage"] = true;


 	




$tdatacc_receptivo_horario[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_receptivo_horario[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_receptivo_horario[".orderindexes"] = array();

$tdatacc_receptivo_horario[".sqlHead"] = "SELECT id_horario,   dsc_horario,   hr_inicio,   hr_fim,   seg,   ter,   qua,   qui,   sex,   sab,   dom";

$tdatacc_receptivo_horario[".sqlFrom"] = "FROM cc_receptivo_horario";

$tdatacc_receptivo_horario[".sqlWhereExpr"] = "";

$tdatacc_receptivo_horario[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_horario";
	$tdatacc_receptivo_horario[".Keys"]=$tableKeys;

	
//	id_horario
	$fdata = array();
	$fdata["strName"] = "id_horario";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_horario";
		$fdata["FullName"]= "id_horario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_receptivo_horario["id_horario"]=$fdata;
	
//	dsc_horario
	$fdata = array();
	$fdata["strName"] = "dsc_horario";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Descrição Horario"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_horario";
		$fdata["FullName"]= "dsc_horario";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["dsc_horario"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Horário Inicio"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatacc_receptivo_horario["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Horário Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatacc_receptivo_horario["hr_fim"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Segunda-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "seg";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["seg"]=$fdata;
	
//	ter
	$fdata = array();
	$fdata["strName"] = "ter";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Terça-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "ter";
		$fdata["FullName"]= "ter";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["ter"]=$fdata;
	
//	qua
	$fdata = array();
	$fdata["strName"] = "qua";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Quarta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qua";
		$fdata["FullName"]= "qua";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["qua"]=$fdata;
	
//	qui
	$fdata = array();
	$fdata["strName"] = "qui";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Quinta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qui";
		$fdata["FullName"]= "qui";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["qui"]=$fdata;
	
//	sex
	$fdata = array();
	$fdata["strName"] = "sex";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Sexta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sex";
		$fdata["FullName"]= "sex";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["sex"]=$fdata;
	
//	sab
	$fdata = array();
	$fdata["strName"] = "sab";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Sábado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sab";
		$fdata["FullName"]= "sab";
						$fdata["Index"]= 10;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["sab"]=$fdata;
	
//	dom
	$fdata = array();
	$fdata["strName"] = "dom";
	$fdata["ownerTable"] = "cc_receptivo_horario";
		$fdata["Label"]="Domingo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "dom";
		$fdata["FullName"]= "dom";
						$fdata["Index"]= 11;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_horario["dom"]=$fdata;

	
$tables_data["cc_receptivo_horario"]=&$tdatacc_receptivo_horario;
$field_labels["cc_receptivo_horario"] = &$fieldLabelscc_receptivo_horario;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_receptivo_horario"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_receptivo_horario"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1989=array();
$proto1989["m_strHead"] = "SELECT";
$proto1989["m_strFieldList"] = "id_horario,   dsc_horario,   hr_inicio,   hr_fim,   seg,   ter,   qua,   qui,   sex,   sab,   dom";
$proto1989["m_strFrom"] = "FROM cc_receptivo_horario";
$proto1989["m_strWhere"] = "";
$proto1989["m_strOrderBy"] = "";
$proto1989["m_strTail"] = "";
$proto1990=array();
$proto1990["m_sql"] = "";
$proto1990["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1990["m_column"]=$obj;
$proto1990["m_contained"] = array();
$proto1990["m_strCase"] = "";
$proto1990["m_havingmode"] = "0";
$proto1990["m_inBrackets"] = "0";
$proto1990["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1990);

$proto1989["m_where"] = $obj;
$proto1992=array();
$proto1992["m_sql"] = "";
$proto1992["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1992["m_column"]=$obj;
$proto1992["m_contained"] = array();
$proto1992["m_strCase"] = "";
$proto1992["m_havingmode"] = "0";
$proto1992["m_inBrackets"] = "0";
$proto1992["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1992);

$proto1989["m_having"] = $obj;
$proto1989["m_fieldlist"] = array();
						$proto1994=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "cc_receptivo_horario"
));

$proto1994["m_expr"]=$obj;
$proto1994["m_alias"] = "";
$obj = new SQLFieldListItem($proto1994);

$proto1989["m_fieldlist"][]=$obj;
						$proto1996=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_horario",
	"m_strTable" => "cc_receptivo_horario"
));

$proto1996["m_expr"]=$obj;
$proto1996["m_alias"] = "";
$obj = new SQLFieldListItem($proto1996);

$proto1989["m_fieldlist"][]=$obj;
						$proto1998=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "cc_receptivo_horario"
));

$proto1998["m_expr"]=$obj;
$proto1998["m_alias"] = "";
$obj = new SQLFieldListItem($proto1998);

$proto1989["m_fieldlist"][]=$obj;
						$proto2000=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2000["m_expr"]=$obj;
$proto2000["m_alias"] = "";
$obj = new SQLFieldListItem($proto2000);

$proto1989["m_fieldlist"][]=$obj;
						$proto2002=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2002["m_expr"]=$obj;
$proto2002["m_alias"] = "";
$obj = new SQLFieldListItem($proto2002);

$proto1989["m_fieldlist"][]=$obj;
						$proto2004=array();
			$obj = new SQLField(array(
	"m_strName" => "ter",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2004["m_expr"]=$obj;
$proto2004["m_alias"] = "";
$obj = new SQLFieldListItem($proto2004);

$proto1989["m_fieldlist"][]=$obj;
						$proto2006=array();
			$obj = new SQLField(array(
	"m_strName" => "qua",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2006["m_expr"]=$obj;
$proto2006["m_alias"] = "";
$obj = new SQLFieldListItem($proto2006);

$proto1989["m_fieldlist"][]=$obj;
						$proto2008=array();
			$obj = new SQLField(array(
	"m_strName" => "qui",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2008["m_expr"]=$obj;
$proto2008["m_alias"] = "";
$obj = new SQLFieldListItem($proto2008);

$proto1989["m_fieldlist"][]=$obj;
						$proto2010=array();
			$obj = new SQLField(array(
	"m_strName" => "sex",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2010["m_expr"]=$obj;
$proto2010["m_alias"] = "";
$obj = new SQLFieldListItem($proto2010);

$proto1989["m_fieldlist"][]=$obj;
						$proto2012=array();
			$obj = new SQLField(array(
	"m_strName" => "sab",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2012["m_expr"]=$obj;
$proto2012["m_alias"] = "";
$obj = new SQLFieldListItem($proto2012);

$proto1989["m_fieldlist"][]=$obj;
						$proto2014=array();
			$obj = new SQLField(array(
	"m_strName" => "dom",
	"m_strTable" => "cc_receptivo_horario"
));

$proto2014["m_expr"]=$obj;
$proto2014["m_alias"] = "";
$obj = new SQLFieldListItem($proto2014);

$proto1989["m_fieldlist"][]=$obj;
$proto1989["m_fromlist"] = array();
												$proto2016=array();
$proto2016["m_link"] = "SQLL_MAIN";
			$proto2017=array();
$proto2017["m_strName"] = "cc_receptivo_horario";
$proto2017["m_columns"] = array();
$proto2017["m_columns"][] = "id_horario";
$proto2017["m_columns"][] = "dsc_horario";
$proto2017["m_columns"][] = "hr_inicio";
$proto2017["m_columns"][] = "hr_fim";
$proto2017["m_columns"][] = "seg";
$proto2017["m_columns"][] = "ter";
$proto2017["m_columns"][] = "qua";
$proto2017["m_columns"][] = "qui";
$proto2017["m_columns"][] = "sex";
$proto2017["m_columns"][] = "sab";
$proto2017["m_columns"][] = "dom";
$obj = new SQLTable($proto2017);

$proto2016["m_table"] = $obj;
$proto2016["m_alias"] = "";
$proto2018=array();
$proto2018["m_sql"] = "";
$proto2018["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2018["m_column"]=$obj;
$proto2018["m_contained"] = array();
$proto2018["m_strCase"] = "";
$proto2018["m_havingmode"] = "0";
$proto2018["m_inBrackets"] = "0";
$proto2018["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2018);

$proto2016["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2016);

$proto1989["m_fromlist"][]=$obj;
$proto1989["m_groupby"] = array();
$proto1989["m_orderby"] = array();
$obj = new SQLQuery($proto1989);

$queryData_cc_receptivo_horario = $obj;
$tdatacc_receptivo_horario[".sqlquery"] = $queryData_cc_receptivo_horario;



?>
