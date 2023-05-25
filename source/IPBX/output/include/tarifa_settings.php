<?php

//	field labels
$fieldLabelstarifa = array();
$fieldLabelstarifa["Portuguese(Brazil)"]=array();
$fieldLabelstarifa["Portuguese(Brazil)"]["hr_inicio"] = "Hora Inicio";
$fieldLabelstarifa["Portuguese(Brazil)"]["hr_fim"] = "Hora Fim";
$fieldLabelstarifa["Portuguese(Brazil)"]["vlr_unid"] = "Valor Unitário";
$fieldLabelstarifa["Portuguese(Brazil)"]["cad_inicial"] = "Cadencia Inicial";
$fieldLabelstarifa["Portuguese(Brazil)"]["cad_frac"] = "Cadencia Fracionaria";
$fieldLabelstarifa["Portuguese(Brazil)"]["seg"] = "Segunda Feira";
$fieldLabelstarifa["Portuguese(Brazil)"]["ter"] = "Terça Feira";
$fieldLabelstarifa["Portuguese(Brazil)"]["qua"] = "Quarta Feira";
$fieldLabelstarifa["Portuguese(Brazil)"]["qui"] = "Quinta Feira";
$fieldLabelstarifa["Portuguese(Brazil)"]["sex"] = "Sexta Feira";
$fieldLabelstarifa["Portuguese(Brazil)"]["sab"] = "Sabado";
$fieldLabelstarifa["Portuguese(Brazil)"]["dom"] = "Domingo";
$fieldLabelstarifa["Portuguese(Brazil)"]["IDT_TARIFA"] = "Tarifa";
$fieldLabelstarifa["Portuguese(Brazil)"]["dsc_tarifa"] = "Descrição";


$tdatatarifa=array();
	$tdatatarifa[".NumberOfChars"]=80; 
	$tdatatarifa[".ShortName"]="tarifa";
	$tdatatarifa[".OwnerID"]="";
	$tdatatarifa[".OriginalTable"]="tarifa";
	$tdatatarifa[".NCSearch"]=true;
	

$tdatatarifa[".shortTableName"] = "tarifa";
$tdatatarifa[".dataSourceTable"] = "tarifa";
$tdatatarifa[".nSecOptions"] = 0;
$tdatatarifa[".nLoginMethod"] = 1;
$tdatatarifa[".recsPerRowList"] = 1;	
$tdatatarifa[".tableGroupBy"] = "0";
$tdatatarifa[".dbType"] = 0;
$tdatatarifa[".mainTableOwnerID"] = "";
$tdatatarifa[".moveNext"] = 1;

$tdatatarifa[".listAjax"] = false;

	$tdatatarifa[".audit"] = false;

	$tdatatarifa[".locking"] = false;
	
$tdatatarifa[".listIcons"] = true;
$tdatatarifa[".inlineEdit"] = true;


$tdatatarifa[".printFriendly"] = true;

$tdatatarifa[".delete"] = true;

$tdatatarifa[".showSimpleSearchOptions"] = false;

$tdatatarifa[".showSearchPanel"] = true;


$tdatatarifa[".isUseAjaxSuggest"] = true;

$tdatatarifa[".rowHighlite"] = true;


// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatatarifa[".arrKeyFields"][] = "IDT_TARIFA";

// use datepicker for search panel
$tdatatarifa[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatatarifa[".isUseTimeForSearch"] = true;





$tdatatarifa[".isUseInlineAdd"] = true;

$tdatatarifa[".isUseInlineEdit"] = true;
$tdatatarifa[".isUseInlineJs"] = $tdatatarifa[".isUseInlineAdd"] || $tdatatarifa[".isUseInlineEdit"];

$tdatatarifa[".allSearchFields"] = array();

$tdatatarifa[".globSearchFields"][] = "dsc_tarifa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_tarifa", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "dsc_tarifa";	
}
$tdatatarifa[".globSearchFields"][] = "hr_inicio";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_inicio", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "hr_inicio";	
}
$tdatatarifa[".globSearchFields"][] = "hr_fim";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_fim", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "hr_fim";	
}
$tdatatarifa[".globSearchFields"][] = "vlr_unid";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("vlr_unid", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "vlr_unid";	
}
$tdatatarifa[".globSearchFields"][] = "cad_inicial";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cad_inicial", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "cad_inicial";	
}
$tdatatarifa[".globSearchFields"][] = "cad_frac";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cad_frac", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "cad_frac";	
}
$tdatatarifa[".globSearchFields"][] = "seg";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("seg", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "seg";	
}
$tdatatarifa[".globSearchFields"][] = "ter";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ter", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "ter";	
}
$tdatatarifa[".globSearchFields"][] = "qua";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("qua", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "qua";	
}
$tdatatarifa[".globSearchFields"][] = "qui";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("qui", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "qui";	
}
$tdatatarifa[".globSearchFields"][] = "sex";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("sex", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "sex";	
}
$tdatatarifa[".globSearchFields"][] = "sab";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("sab", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "sab";	
}
$tdatatarifa[".globSearchFields"][] = "dom";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dom", $tdatatarifa[".allSearchFields"]))
{
	$tdatatarifa[".allSearchFields"][] = "dom";	
}


$tdatatarifa[".isDynamicPerm"] = true;

	
$tdatatarifa[".isVerLayout"] = true;

$tdatatarifa[".isDisplayLoading"] = true;

$tdatatarifa[".isResizeColumns"] = false;


$tdatatarifa[".createLoginPage"] = true;


 	




$tdatatarifa[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatatarifa[".strOrderBy"] = $gstrOrderBy;
	
$tdatatarifa[".orderindexes"] = array();

$tdatatarifa[".sqlHead"] = "SELECT hr_inicio,  hr_fim,  vlr_unid,  cad_inicial,  cad_frac,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  IDT_TARIFA,  dsc_tarifa";

$tdatatarifa[".sqlFrom"] = "FROM tarifa";

$tdatatarifa[".sqlWhereExpr"] = "";

$tdatatarifa[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="IDT_TARIFA";
	$tdatatarifa[".Keys"]=$tableKeys;

	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Hora Inicio"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatatarifa["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Hora Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatatarifa["hr_fim"]=$fdata;
	
//	vlr_unid
	$fdata = array();
	$fdata["strName"] = "vlr_unid";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Valor Unitário"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "vlr_unid";
		$fdata["FullName"]= "vlr_unid";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["vlr_unid"]=$fdata;
	
//	cad_inicial
	$fdata = array();
	$fdata["strName"] = "cad_inicial";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Cadencia Inicial"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cad_inicial";
		$fdata["FullName"]= "cad_inicial";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["cad_inicial"]=$fdata;
	
//	cad_frac
	$fdata = array();
	$fdata["strName"] = "cad_frac";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Cadencia Fracionaria"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cad_frac";
		$fdata["FullName"]= "cad_frac";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["cad_frac"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Segunda Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "seg";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["seg"]=$fdata;
	
//	ter
	$fdata = array();
	$fdata["strName"] = "ter";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Terça Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "ter";
		$fdata["FullName"]= "ter";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["ter"]=$fdata;
	
//	qua
	$fdata = array();
	$fdata["strName"] = "qua";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Quarta Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qua";
		$fdata["FullName"]= "qua";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["qua"]=$fdata;
	
//	qui
	$fdata = array();
	$fdata["strName"] = "qui";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Quinta Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qui";
		$fdata["FullName"]= "qui";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["qui"]=$fdata;
	
//	sex
	$fdata = array();
	$fdata["strName"] = "sex";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Sexta Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sex";
		$fdata["FullName"]= "sex";
						$fdata["Index"]= 10;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["sex"]=$fdata;
	
//	sab
	$fdata = array();
	$fdata["strName"] = "sab";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Sabado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sab";
		$fdata["FullName"]= "sab";
						$fdata["Index"]= 11;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["sab"]=$fdata;
	
//	dom
	$fdata = array();
	$fdata["strName"] = "dom";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Domingo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "dom";
		$fdata["FullName"]= "dom";
						$fdata["Index"]= 12;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["dom"]=$fdata;
	
//	IDT_TARIFA
	$fdata = array();
	$fdata["strName"] = "IDT_TARIFA";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Tarifa"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "IDT_TARIFA";
		$fdata["FullName"]= "IDT_TARIFA";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatatarifa["IDT_TARIFA"]=$fdata;
	
//	dsc_tarifa
	$fdata = array();
	$fdata["strName"] = "dsc_tarifa";
	$fdata["ownerTable"] = "tarifa";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_tarifa";
		$fdata["FullName"]= "dsc_tarifa";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatarifa["dsc_tarifa"]=$fdata;

	
$tables_data["tarifa"]=&$tdatatarifa;
$field_labels["tarifa"] = &$fieldLabelstarifa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["tarifa"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["tarifa"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto742=array();
$proto742["m_strHead"] = "SELECT";
$proto742["m_strFieldList"] = "hr_inicio,  hr_fim,  vlr_unid,  cad_inicial,  cad_frac,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  IDT_TARIFA,  dsc_tarifa";
$proto742["m_strFrom"] = "FROM tarifa";
$proto742["m_strWhere"] = "";
$proto742["m_strOrderBy"] = "";
$proto742["m_strTail"] = "";
$proto743=array();
$proto743["m_sql"] = "";
$proto743["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto743["m_column"]=$obj;
$proto743["m_contained"] = array();
$proto743["m_strCase"] = "";
$proto743["m_havingmode"] = "0";
$proto743["m_inBrackets"] = "0";
$proto743["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto743);

$proto742["m_where"] = $obj;
$proto745=array();
$proto745["m_sql"] = "";
$proto745["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto745["m_column"]=$obj;
$proto745["m_contained"] = array();
$proto745["m_strCase"] = "";
$proto745["m_havingmode"] = "0";
$proto745["m_inBrackets"] = "0";
$proto745["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto745);

$proto742["m_having"] = $obj;
$proto742["m_fieldlist"] = array();
						$proto747=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "tarifa"
));

$proto747["m_expr"]=$obj;
$proto747["m_alias"] = "";
$obj = new SQLFieldListItem($proto747);

$proto742["m_fieldlist"][]=$obj;
						$proto749=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "tarifa"
));

$proto749["m_expr"]=$obj;
$proto749["m_alias"] = "";
$obj = new SQLFieldListItem($proto749);

$proto742["m_fieldlist"][]=$obj;
						$proto751=array();
			$obj = new SQLField(array(
	"m_strName" => "vlr_unid",
	"m_strTable" => "tarifa"
));

$proto751["m_expr"]=$obj;
$proto751["m_alias"] = "";
$obj = new SQLFieldListItem($proto751);

$proto742["m_fieldlist"][]=$obj;
						$proto753=array();
			$obj = new SQLField(array(
	"m_strName" => "cad_inicial",
	"m_strTable" => "tarifa"
));

$proto753["m_expr"]=$obj;
$proto753["m_alias"] = "";
$obj = new SQLFieldListItem($proto753);

$proto742["m_fieldlist"][]=$obj;
						$proto755=array();
			$obj = new SQLField(array(
	"m_strName" => "cad_frac",
	"m_strTable" => "tarifa"
));

$proto755["m_expr"]=$obj;
$proto755["m_alias"] = "";
$obj = new SQLFieldListItem($proto755);

$proto742["m_fieldlist"][]=$obj;
						$proto757=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "tarifa"
));

$proto757["m_expr"]=$obj;
$proto757["m_alias"] = "";
$obj = new SQLFieldListItem($proto757);

$proto742["m_fieldlist"][]=$obj;
						$proto759=array();
			$obj = new SQLField(array(
	"m_strName" => "ter",
	"m_strTable" => "tarifa"
));

$proto759["m_expr"]=$obj;
$proto759["m_alias"] = "";
$obj = new SQLFieldListItem($proto759);

$proto742["m_fieldlist"][]=$obj;
						$proto761=array();
			$obj = new SQLField(array(
	"m_strName" => "qua",
	"m_strTable" => "tarifa"
));

$proto761["m_expr"]=$obj;
$proto761["m_alias"] = "";
$obj = new SQLFieldListItem($proto761);

$proto742["m_fieldlist"][]=$obj;
						$proto763=array();
			$obj = new SQLField(array(
	"m_strName" => "qui",
	"m_strTable" => "tarifa"
));

$proto763["m_expr"]=$obj;
$proto763["m_alias"] = "";
$obj = new SQLFieldListItem($proto763);

$proto742["m_fieldlist"][]=$obj;
						$proto765=array();
			$obj = new SQLField(array(
	"m_strName" => "sex",
	"m_strTable" => "tarifa"
));

$proto765["m_expr"]=$obj;
$proto765["m_alias"] = "";
$obj = new SQLFieldListItem($proto765);

$proto742["m_fieldlist"][]=$obj;
						$proto767=array();
			$obj = new SQLField(array(
	"m_strName" => "sab",
	"m_strTable" => "tarifa"
));

$proto767["m_expr"]=$obj;
$proto767["m_alias"] = "";
$obj = new SQLFieldListItem($proto767);

$proto742["m_fieldlist"][]=$obj;
						$proto769=array();
			$obj = new SQLField(array(
	"m_strName" => "dom",
	"m_strTable" => "tarifa"
));

$proto769["m_expr"]=$obj;
$proto769["m_alias"] = "";
$obj = new SQLFieldListItem($proto769);

$proto742["m_fieldlist"][]=$obj;
						$proto771=array();
			$obj = new SQLField(array(
	"m_strName" => "IDT_TARIFA",
	"m_strTable" => "tarifa"
));

$proto771["m_expr"]=$obj;
$proto771["m_alias"] = "";
$obj = new SQLFieldListItem($proto771);

$proto742["m_fieldlist"][]=$obj;
						$proto773=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_tarifa",
	"m_strTable" => "tarifa"
));

$proto773["m_expr"]=$obj;
$proto773["m_alias"] = "";
$obj = new SQLFieldListItem($proto773);

$proto742["m_fieldlist"][]=$obj;
$proto742["m_fromlist"] = array();
												$proto775=array();
$proto775["m_link"] = "SQLL_MAIN";
			$proto776=array();
$proto776["m_strName"] = "tarifa";
$proto776["m_columns"] = array();
$proto776["m_columns"][] = "IDT_TARIFA";
$proto776["m_columns"][] = "hr_inicio";
$proto776["m_columns"][] = "hr_fim";
$proto776["m_columns"][] = "vlr_unid";
$proto776["m_columns"][] = "cad_inicial";
$proto776["m_columns"][] = "cad_frac";
$proto776["m_columns"][] = "seg";
$proto776["m_columns"][] = "ter";
$proto776["m_columns"][] = "qua";
$proto776["m_columns"][] = "qui";
$proto776["m_columns"][] = "sex";
$proto776["m_columns"][] = "sab";
$proto776["m_columns"][] = "dom";
$proto776["m_columns"][] = "dsc_tarifa";
$obj = new SQLTable($proto776);

$proto775["m_table"] = $obj;
$proto775["m_alias"] = "";
$proto777=array();
$proto777["m_sql"] = "";
$proto777["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto777["m_column"]=$obj;
$proto777["m_contained"] = array();
$proto777["m_strCase"] = "";
$proto777["m_havingmode"] = "0";
$proto777["m_inBrackets"] = "0";
$proto777["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto777);

$proto775["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto775);

$proto742["m_fromlist"][]=$obj;
$proto742["m_groupby"] = array();
$proto742["m_orderby"] = array();
$obj = new SQLQuery($proto742);

$queryData_tarifa = $obj;
$tdatatarifa[".sqlquery"] = $queryData_tarifa;



?>
