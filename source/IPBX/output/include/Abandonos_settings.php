<?php

//	field labels
$fieldLabelsAbandonos = array();
$fieldLabelsAbandonos["Portuguese(Brazil)"]=array();
$fieldLabelsAbandonos["Portuguese(Brazil)"]["dt_entrada"] = "Data Entrada";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["hr_entrada"] = "Hora Entrada";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["tp_espera"] = "Tempo Espera";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["hr_abandono"] = "Hora Abandono";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsAbandonos["Portuguese(Brazil)"]["_Entrada_Saida_"] = "\"Entrada/Saida\"";


$tdataAbandonos=array();
	$tdataAbandonos[".NumberOfChars"]=80; 
	$tdataAbandonos[".ShortName"]="Abandonos";
	$tdataAbandonos[".OwnerID"]="";
	$tdataAbandonos[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataAbandonos[".NCSearch"]=true;
	

$tdataAbandonos[".shortTableName"] = "Abandonos";
$tdataAbandonos[".dataSourceTable"] = "Rel. Abandonos";
$tdataAbandonos[".nSecOptions"] = 0;
$tdataAbandonos[".nLoginMethod"] = 1;
$tdataAbandonos[".recsPerRowList"] = 1;	
$tdataAbandonos[".tableGroupBy"] = "0";
$tdataAbandonos[".dbType"] = 0;
$tdataAbandonos[".mainTableOwnerID"] = "";
$tdataAbandonos[".moveNext"] = 1;

$tdataAbandonos[".listAjax"] = true;

	$tdataAbandonos[".audit"] = false;

	$tdataAbandonos[".locking"] = false;
	
$tdataAbandonos[".listIcons"] = true;

$tdataAbandonos[".exportTo"] = true;

$tdataAbandonos[".printFriendly"] = true;


$tdataAbandonos[".showSimpleSearchOptions"] = false;

$tdataAbandonos[".showSearchPanel"] = true;


$tdataAbandonos[".isUseAjaxSuggest"] = true;


$tdataAbandonos[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataAbandonos[".arrKeyFields"][] = "dt_entrada";
$tdataAbandonos[".arrKeyFields"][] = "hr_entrada";

// use datepicker for search panel
$tdataAbandonos[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataAbandonos[".isUseTimeForSearch"] = false;





$tdataAbandonos[".isUseInlineJs"] = $tdataAbandonos[".isUseInlineAdd"] || $tdataAbandonos[".isUseInlineEdit"];

$tdataAbandonos[".allSearchFields"] = array();

$tdataAbandonos[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataAbandonos[".allSearchFields"]))
{
	$tdataAbandonos[".allSearchFields"][] = "dt_entrada";	
}
$tdataAbandonos[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataAbandonos[".allSearchFields"]))
{
	$tdataAbandonos[".allSearchFields"][] = "Fila";	
}
$tdataAbandonos[".globSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataAbandonos[".allSearchFields"]))
{
	$tdataAbandonos[".allSearchFields"][] = "Telefone";	
}

$tdataAbandonos[".panelSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataAbandonos[".allSearchFields"])) 
{
	$tdataAbandonos[".allSearchFields"][] = "Fila";	
}
$tdataAbandonos[".panelSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataAbandonos[".allSearchFields"])) 
{
	$tdataAbandonos[".allSearchFields"][] = "Telefone";	
}

$tdataAbandonos[".isDynamicPerm"] = true;

	

$tdataAbandonos[".isDisplayLoading"] = true;

$tdataAbandonos[".isResizeColumns"] = false;


$tdataAbandonos[".createLoginPage"] = true;


 	

$tdataAbandonos[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY dt_entrada, hr_entrada, Fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataAbandonos[".strOrderBy"] = $gstrOrderBy;
	
$tdataAbandonos[".orderindexes"] = array();
$tdataAbandonos[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$tdataAbandonos[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "hr_entrada");
$tdataAbandonos[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "Fila");

$tdataAbandonos[".sqlHead"] = "SELECT dt_entrada,  hr_entrada,  Fila,  tp_espera,  hr_abandono,  Telefone,  concat(ps_entrada, \"/\", ps_abandono) AS `\"Entrada/Saida\"`";

$tdataAbandonos[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdataAbandonos[".sqlWhereExpr"] = "(hr_abandono <> '')";

$tdataAbandonos[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="dt_entrada";
	$tableKeys[]="hr_entrada";
	$tdataAbandonos[".Keys"]=$tableKeys;

	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Data Entrada"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataAbandonos["dt_entrada"]=$fdata;
	
//	hr_entrada
	$fdata = array();
	$fdata["strName"] = "hr_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hora Entrada"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_entrada";
		$fdata["FullName"]= "hr_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAbandonos["hr_entrada"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Fila";
				$fdata["LookupTable"]="cc_receptivo_filas_atend";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "hr_abandono <>'' ";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataAbandonos["Fila"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tempo Espera"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAbandonos["tp_espera"]=$fdata;
	
//	hr_abandono
	$fdata = array();
	$fdata["strName"] = "hr_abandono";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hora Abandono"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_abandono";
		$fdata["FullName"]= "hr_abandono";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAbandonos["hr_abandono"]=$fdata;
	
//	Telefone
	$fdata = array();
	$fdata["strName"] = "Telefone";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone";
		$fdata["FullName"]= "Telefone";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataAbandonos["Telefone"]=$fdata;
	
//	"Entrada/Saida"
	$fdata = array();
	$fdata["strName"] = "\"Entrada/Saida\"";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "_Entrada_Saida_";
		$fdata["FullName"]= "concat(ps_entrada, \"/\", ps_abandono)";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
									$tdataAbandonos["\"Entrada/Saida\""]=$fdata;

	
$tables_data["Rel. Abandonos"]=&$tdataAbandonos;
$field_labels["Rel__Abandonos"] = &$fieldLabelsAbandonos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Abandonos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Abandonos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1432=array();
$proto1432["m_strHead"] = "SELECT";
$proto1432["m_strFieldList"] = "dt_entrada,  hr_entrada,  Fila,  tp_espera,  hr_abandono,  Telefone,  concat(ps_entrada, \"/\", ps_abandono) AS `\"Entrada/Saida\"`";
$proto1432["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto1432["m_strWhere"] = "(hr_abandono <> '')";
$proto1432["m_strOrderBy"] = "ORDER BY dt_entrada, hr_entrada, Fila";
$proto1432["m_strTail"] = "";
$proto1433=array();
$proto1433["m_sql"] = "hr_abandono <> ''";
$proto1433["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1433["m_column"]=$obj;
$proto1433["m_contained"] = array();
$proto1433["m_strCase"] = "<> ''";
$proto1433["m_havingmode"] = "0";
$proto1433["m_inBrackets"] = "0";
$proto1433["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1433);

$proto1432["m_where"] = $obj;
$proto1435=array();
$proto1435["m_sql"] = "";
$proto1435["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1435["m_column"]=$obj;
$proto1435["m_contained"] = array();
$proto1435["m_strCase"] = "";
$proto1435["m_havingmode"] = "0";
$proto1435["m_inBrackets"] = "0";
$proto1435["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1435);

$proto1432["m_having"] = $obj;
$proto1432["m_fieldlist"] = array();
						$proto1437=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1437["m_expr"]=$obj;
$proto1437["m_alias"] = "";
$obj = new SQLFieldListItem($proto1437);

$proto1432["m_fieldlist"][]=$obj;
						$proto1439=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1439["m_expr"]=$obj;
$proto1439["m_alias"] = "";
$obj = new SQLFieldListItem($proto1439);

$proto1432["m_fieldlist"][]=$obj;
						$proto1441=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1441["m_expr"]=$obj;
$proto1441["m_alias"] = "";
$obj = new SQLFieldListItem($proto1441);

$proto1432["m_fieldlist"][]=$obj;
						$proto1443=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1443["m_expr"]=$obj;
$proto1443["m_alias"] = "";
$obj = new SQLFieldListItem($proto1443);

$proto1432["m_fieldlist"][]=$obj;
						$proto1445=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1445["m_expr"]=$obj;
$proto1445["m_alias"] = "";
$obj = new SQLFieldListItem($proto1445);

$proto1432["m_fieldlist"][]=$obj;
						$proto1447=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1447["m_expr"]=$obj;
$proto1447["m_alias"] = "";
$obj = new SQLFieldListItem($proto1447);

$proto1432["m_fieldlist"][]=$obj;
						$proto1449=array();
			$proto1450=array();
$proto1450["m_functiontype"] = "SQLF_CUSTOM";
$proto1450["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "ps_entrada"
));

$proto1450["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"/\""
));

$proto1450["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ps_abandono"
));

$proto1450["m_arguments"][]=$obj;
$proto1450["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1450);

$proto1449["m_expr"]=$obj;
$proto1449["m_alias"] = "\"Entrada/Saida\"";
$obj = new SQLFieldListItem($proto1449);

$proto1432["m_fieldlist"][]=$obj;
$proto1432["m_fromlist"] = array();
												$proto1454=array();
$proto1454["m_link"] = "SQLL_MAIN";
			$proto1455=array();
$proto1455["m_strName"] = "cc_receptivo_filas_atend";
$proto1455["m_columns"] = array();
$proto1455["m_columns"][] = "chave";
$proto1455["m_columns"][] = "dt_entrada";
$proto1455["m_columns"][] = "hr_entrada";
$proto1455["m_columns"][] = "Fila";
$proto1455["m_columns"][] = "Agente";
$proto1455["m_columns"][] = "hr_atendimento";
$proto1455["m_columns"][] = "hr_abandono";
$proto1455["m_columns"][] = "tp_espera";
$proto1455["m_columns"][] = "tp_atendimento";
$proto1455["m_columns"][] = "Telefone";
$proto1455["m_columns"][] = "ps_entrada";
$proto1455["m_columns"][] = "ps_abandono";
$proto1455["m_columns"][] = "tel_trans";
$proto1455["m_columns"][] = "dsl_motiv";
$proto1455["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto1455);

$proto1454["m_table"] = $obj;
$proto1454["m_alias"] = "";
$proto1456=array();
$proto1456["m_sql"] = "";
$proto1456["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1456["m_column"]=$obj;
$proto1456["m_contained"] = array();
$proto1456["m_strCase"] = "";
$proto1456["m_havingmode"] = "0";
$proto1456["m_inBrackets"] = "0";
$proto1456["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1456);

$proto1454["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1454);

$proto1432["m_fromlist"][]=$obj;
$proto1432["m_groupby"] = array();
$proto1432["m_orderby"] = array();
												$proto1458=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1458["m_column"]=$obj;
$proto1458["m_bAsc"] = 1;
$proto1458["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1458);

$proto1432["m_orderby"][]=$obj;					
												$proto1460=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1460["m_column"]=$obj;
$proto1460["m_bAsc"] = 1;
$proto1460["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1460);

$proto1432["m_orderby"][]=$obj;					
												$proto1462=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1462["m_column"]=$obj;
$proto1462["m_bAsc"] = 1;
$proto1462["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1462);

$proto1432["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1432);

$queryData_Abandonos = $obj;
$tdataAbandonos[".sqlquery"] = $queryData_Abandonos;



?>
