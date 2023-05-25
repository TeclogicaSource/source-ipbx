<?php

//	field labels
$fieldLabelsRel__Atendimento_por_Fila = array();
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["dt_entrada"] = "Data Entrada";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["hr_entrada"] = "Hora Entrada";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["hr_atendimento"] = "Hora Atendimento";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["tp_espera"] = "Tempo de Espera";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["tp_atendimento"] = "Tempo de Atendimento";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsRel__Atendimento_por_Fila["Portuguese(Brazil)"]["TMO"] = "TMO";


$tdataRel__Atendimento_por_Fila=array();
	$tdataRel__Atendimento_por_Fila[".NumberOfChars"]=80; 
	$tdataRel__Atendimento_por_Fila[".ShortName"]="Rel__Atendimento_por_Fila";
	$tdataRel__Atendimento_por_Fila[".OwnerID"]="";
	$tdataRel__Atendimento_por_Fila[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataRel__Atendimento_por_Fila[".NCSearch"]=true;
	

$tdataRel__Atendimento_por_Fila[".shortTableName"] = "Rel__Atendimento_por_Fila";
$tdataRel__Atendimento_por_Fila[".dataSourceTable"] = "Rel. Atendimento por Fila";
$tdataRel__Atendimento_por_Fila[".nSecOptions"] = 0;
$tdataRel__Atendimento_por_Fila[".nLoginMethod"] = 1;
$tdataRel__Atendimento_por_Fila[".recsPerRowList"] = 1;	
$tdataRel__Atendimento_por_Fila[".tableGroupBy"] = "0";
$tdataRel__Atendimento_por_Fila[".dbType"] = 0;
$tdataRel__Atendimento_por_Fila[".mainTableOwnerID"] = "";
$tdataRel__Atendimento_por_Fila[".moveNext"] = 1;

$tdataRel__Atendimento_por_Fila[".listAjax"] = false;

	$tdataRel__Atendimento_por_Fila[".audit"] = false;

	$tdataRel__Atendimento_por_Fila[".locking"] = false;
	
$tdataRel__Atendimento_por_Fila[".listIcons"] = true;

$tdataRel__Atendimento_por_Fila[".exportTo"] = true;

$tdataRel__Atendimento_por_Fila[".printFriendly"] = true;


$tdataRel__Atendimento_por_Fila[".showSimpleSearchOptions"] = false;

$tdataRel__Atendimento_por_Fila[".showSearchPanel"] = true;


$tdataRel__Atendimento_por_Fila[".isUseAjaxSuggest"] = true;


$tdataRel__Atendimento_por_Fila[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataRel__Atendimento_por_Fila[".arrKeyFields"][] = "dt_entrada";
$tdataRel__Atendimento_por_Fila[".arrKeyFields"][] = "hr_entrada";

// use datepicker for search panel
$tdataRel__Atendimento_por_Fila[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Atendimento_por_Fila[".isUseTimeForSearch"] = false;





$tdataRel__Atendimento_por_Fila[".isUseInlineJs"] = $tdataRel__Atendimento_por_Fila[".isUseInlineAdd"] || $tdataRel__Atendimento_por_Fila[".isUseInlineEdit"];

$tdataRel__Atendimento_por_Fila[".allSearchFields"] = array();

$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "dt_entrada";	
}
$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "hr_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_entrada", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "hr_entrada";	
}
$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "Fila";	
}
$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "hr_atendimento";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_atendimento", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "hr_atendimento";	
}
$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "tp_espera";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tp_espera", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "tp_espera";	
}
$tdataRel__Atendimento_por_Fila[".globSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataRel__Atendimento_por_Fila[".allSearchFields"]))
{
	$tdataRel__Atendimento_por_Fila[".allSearchFields"][] = "Telefone";	
}


$tdataRel__Atendimento_por_Fila[".isDynamicPerm"] = true;

	

$tdataRel__Atendimento_por_Fila[".isDisplayLoading"] = true;

$tdataRel__Atendimento_por_Fila[".isResizeColumns"] = false;


$tdataRel__Atendimento_por_Fila[".createLoginPage"] = true;


 	

$tdataRel__Atendimento_por_Fila[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY dt_entrada, hr_entrada, Fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Atendimento_por_Fila[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Atendimento_por_Fila[".orderindexes"] = array();
$tdataRel__Atendimento_por_Fila[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$tdataRel__Atendimento_por_Fila[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "hr_entrada");
$tdataRel__Atendimento_por_Fila[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "Fila");

$tdataRel__Atendimento_por_Fila[".sqlHead"] = "SELECT dt_entrada,  hr_entrada,  Fila,  hr_atendimento,  tp_espera,  tp_atendimento,  Telefone,  TIME(tp_espera + tp_atendimento) AS TMO";

$tdataRel__Atendimento_por_Fila[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdataRel__Atendimento_por_Fila[".sqlWhereExpr"] = "(dt_entrada > '0000-00-00') AND (hr_atendimento <> '')";

$tdataRel__Atendimento_por_Fila[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="dt_entrada";
	$tableKeys[]="hr_entrada";
	$tdataRel__Atendimento_por_Fila[".Keys"]=$tableKeys;

	
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
						$tdataRel__Atendimento_por_Fila["dt_entrada"]=$fdata;
	
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
	$tdataRel__Atendimento_por_Fila["hr_entrada"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Atendimento_por_Fila["Fila"]=$fdata;
	
//	hr_atendimento
	$fdata = array();
	$fdata["strName"] = "hr_atendimento";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hora Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_atendimento";
		$fdata["FullName"]= "hr_atendimento";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Atendimento_por_Fila["hr_atendimento"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tempo de Espera"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Atendimento_por_Fila["tp_espera"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tempo de Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_atendimento";
		$fdata["FullName"]= "tp_atendimento";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Atendimento_por_Fila["tp_atendimento"]=$fdata;
	
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
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Atendimento_por_Fila["Telefone"]=$fdata;
	
//	TMO
	$fdata = array();
	$fdata["strName"] = "TMO";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TMO";
		$fdata["FullName"]= "TIME(tp_espera + tp_atendimento)";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Atendimento_por_Fila["TMO"]=$fdata;

	
$tables_data["Rel. Atendimento por Fila"]=&$tdataRel__Atendimento_por_Fila;
$field_labels["Rel__Atendimento_por_Fila"] = &$fieldLabelsRel__Atendimento_por_Fila;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Atendimento por Fila"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Atendimento por Fila"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto681=array();
$proto681["m_strHead"] = "SELECT";
$proto681["m_strFieldList"] = "dt_entrada,  hr_entrada,  Fila,  hr_atendimento,  tp_espera,  tp_atendimento,  Telefone,  TIME(tp_espera + tp_atendimento) AS TMO";
$proto681["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto681["m_strWhere"] = "(dt_entrada > '0000-00-00') AND (hr_atendimento <> '')";
$proto681["m_strOrderBy"] = "ORDER BY dt_entrada, hr_entrada, Fila";
$proto681["m_strTail"] = "";
$proto682=array();
$proto682["m_sql"] = "(dt_entrada > '0000-00-00') AND (hr_atendimento <> '')";
$proto682["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(dt_entrada > '0000-00-00') AND (hr_atendimento <> '')"
));

$proto682["m_column"]=$obj;
$proto682["m_contained"] = array();
						$proto684=array();
$proto684["m_sql"] = "dt_entrada > '0000-00-00'";
$proto684["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto684["m_column"]=$obj;
$proto684["m_contained"] = array();
$proto684["m_strCase"] = "> '0000-00-00'";
$proto684["m_havingmode"] = "0";
$proto684["m_inBrackets"] = "1";
$proto684["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto684);

			$proto682["m_contained"][]=$obj;
						$proto686=array();
$proto686["m_sql"] = "hr_atendimento <> ''";
$proto686["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto686["m_column"]=$obj;
$proto686["m_contained"] = array();
$proto686["m_strCase"] = "<> ''";
$proto686["m_havingmode"] = "0";
$proto686["m_inBrackets"] = "1";
$proto686["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto686);

			$proto682["m_contained"][]=$obj;
$proto682["m_strCase"] = "";
$proto682["m_havingmode"] = "0";
$proto682["m_inBrackets"] = "0";
$proto682["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto682);

$proto681["m_where"] = $obj;
$proto688=array();
$proto688["m_sql"] = "";
$proto688["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto688["m_column"]=$obj;
$proto688["m_contained"] = array();
$proto688["m_strCase"] = "";
$proto688["m_havingmode"] = "0";
$proto688["m_inBrackets"] = "0";
$proto688["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto688);

$proto681["m_having"] = $obj;
$proto681["m_fieldlist"] = array();
						$proto690=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto690["m_expr"]=$obj;
$proto690["m_alias"] = "";
$obj = new SQLFieldListItem($proto690);

$proto681["m_fieldlist"][]=$obj;
						$proto692=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto692["m_expr"]=$obj;
$proto692["m_alias"] = "";
$obj = new SQLFieldListItem($proto692);

$proto681["m_fieldlist"][]=$obj;
						$proto694=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto694["m_expr"]=$obj;
$proto694["m_alias"] = "";
$obj = new SQLFieldListItem($proto694);

$proto681["m_fieldlist"][]=$obj;
						$proto696=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto696["m_expr"]=$obj;
$proto696["m_alias"] = "";
$obj = new SQLFieldListItem($proto696);

$proto681["m_fieldlist"][]=$obj;
						$proto698=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto698["m_expr"]=$obj;
$proto698["m_alias"] = "";
$obj = new SQLFieldListItem($proto698);

$proto681["m_fieldlist"][]=$obj;
						$proto700=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto700["m_expr"]=$obj;
$proto700["m_alias"] = "";
$obj = new SQLFieldListItem($proto700);

$proto681["m_fieldlist"][]=$obj;
						$proto702=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto702["m_expr"]=$obj;
$proto702["m_alias"] = "";
$obj = new SQLFieldListItem($proto702);

$proto681["m_fieldlist"][]=$obj;
						$proto704=array();
			$proto705=array();
$proto705["m_functiontype"] = "SQLF_CUSTOM";
$proto705["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "tp_espera + tp_atendimento"
));

$proto705["m_arguments"][]=$obj;
$proto705["m_strFunctionName"] = "TIME";
$obj = new SQLFunctionCall($proto705);

$proto704["m_expr"]=$obj;
$proto704["m_alias"] = "TMO";
$obj = new SQLFieldListItem($proto704);

$proto681["m_fieldlist"][]=$obj;
$proto681["m_fromlist"] = array();
												$proto707=array();
$proto707["m_link"] = "SQLL_MAIN";
			$proto708=array();
$proto708["m_strName"] = "cc_receptivo_filas_atend";
$proto708["m_columns"] = array();
$proto708["m_columns"][] = "chave";
$proto708["m_columns"][] = "dt_entrada";
$proto708["m_columns"][] = "hr_entrada";
$proto708["m_columns"][] = "Fila";
$proto708["m_columns"][] = "Agente";
$proto708["m_columns"][] = "hr_atendimento";
$proto708["m_columns"][] = "hr_abandono";
$proto708["m_columns"][] = "tp_espera";
$proto708["m_columns"][] = "tp_atendimento";
$proto708["m_columns"][] = "Telefone";
$proto708["m_columns"][] = "ps_entrada";
$proto708["m_columns"][] = "ps_abandono";
$proto708["m_columns"][] = "tel_trans";
$proto708["m_columns"][] = "dsl_motiv";
$proto708["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto708);

$proto707["m_table"] = $obj;
$proto707["m_alias"] = "";
$proto709=array();
$proto709["m_sql"] = "";
$proto709["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto709["m_column"]=$obj;
$proto709["m_contained"] = array();
$proto709["m_strCase"] = "";
$proto709["m_havingmode"] = "0";
$proto709["m_inBrackets"] = "0";
$proto709["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto709);

$proto707["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto707);

$proto681["m_fromlist"][]=$obj;
$proto681["m_groupby"] = array();
$proto681["m_orderby"] = array();
												$proto711=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto711["m_column"]=$obj;
$proto711["m_bAsc"] = 1;
$proto711["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto711);

$proto681["m_orderby"][]=$obj;					
												$proto713=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto713["m_column"]=$obj;
$proto713["m_bAsc"] = 1;
$proto713["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto713);

$proto681["m_orderby"][]=$obj;					
												$proto715=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto715["m_column"]=$obj;
$proto715["m_bAsc"] = 1;
$proto715["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto715);

$proto681["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto681);

$queryData_Rel__Atendimento_por_Fila = $obj;
$tdataRel__Atendimento_por_Fila[".sqlquery"] = $queryData_Rel__Atendimento_por_Fila;



?>
