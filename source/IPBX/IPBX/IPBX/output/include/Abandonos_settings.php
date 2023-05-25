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
$fieldLabelsAbandonos["Portuguese(Brazil)"]["Entrada_Saida"] = "Entrada/Saida";


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

$tdataAbandonos[".sqlHead"] = "SELECT dt_entrada,  hr_entrada,  Fila,  tp_espera,  hr_abandono,  Telefone,  concat(ps_entrada,\"/\",ps_abandono) as \"Entrada/Saida\"";

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
	
//	Entrada/Saida
	$fdata = array();
	$fdata["strName"] = "Entrada/Saida";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Entrada_Saida";
		$fdata["FullName"]= "concat(ps_entrada,\"/\",ps_abandono)";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAbandonos["Entrada/Saida"]=$fdata;

	
$tables_data["Rel. Abandonos"]=&$tdataAbandonos;
$field_labels["Rel__Abandonos"] = &$fieldLabelsAbandonos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Abandonos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Abandonos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1232=array();
$proto1232["m_strHead"] = "SELECT";
$proto1232["m_strFieldList"] = "dt_entrada,  hr_entrada,  Fila,  tp_espera,  hr_abandono,  Telefone,  concat(ps_entrada,\"/\",ps_abandono) as \"Entrada/Saida\"";
$proto1232["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto1232["m_strWhere"] = "(hr_abandono <> '')";
$proto1232["m_strOrderBy"] = "ORDER BY dt_entrada, hr_entrada, Fila";
$proto1232["m_strTail"] = "";
$proto1233=array();
$proto1233["m_sql"] = "hr_abandono <> ''";
$proto1233["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1233["m_column"]=$obj;
$proto1233["m_contained"] = array();
$proto1233["m_strCase"] = "<> ''";
$proto1233["m_havingmode"] = "0";
$proto1233["m_inBrackets"] = "0";
$proto1233["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1233);

$proto1232["m_where"] = $obj;
$proto1235=array();
$proto1235["m_sql"] = "";
$proto1235["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1235["m_column"]=$obj;
$proto1235["m_contained"] = array();
$proto1235["m_strCase"] = "";
$proto1235["m_havingmode"] = "0";
$proto1235["m_inBrackets"] = "0";
$proto1235["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1235);

$proto1232["m_having"] = $obj;
$proto1232["m_fieldlist"] = array();
						$proto1237=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1237["m_expr"]=$obj;
$proto1237["m_alias"] = "";
$obj = new SQLFieldListItem($proto1237);

$proto1232["m_fieldlist"][]=$obj;
						$proto1239=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1239["m_expr"]=$obj;
$proto1239["m_alias"] = "";
$obj = new SQLFieldListItem($proto1239);

$proto1232["m_fieldlist"][]=$obj;
						$proto1241=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1241["m_expr"]=$obj;
$proto1241["m_alias"] = "";
$obj = new SQLFieldListItem($proto1241);

$proto1232["m_fieldlist"][]=$obj;
						$proto1243=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1243["m_expr"]=$obj;
$proto1243["m_alias"] = "";
$obj = new SQLFieldListItem($proto1243);

$proto1232["m_fieldlist"][]=$obj;
						$proto1245=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1245["m_expr"]=$obj;
$proto1245["m_alias"] = "";
$obj = new SQLFieldListItem($proto1245);

$proto1232["m_fieldlist"][]=$obj;
						$proto1247=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1247["m_expr"]=$obj;
$proto1247["m_alias"] = "";
$obj = new SQLFieldListItem($proto1247);

$proto1232["m_fieldlist"][]=$obj;
						$proto1249=array();
			$proto1250=array();
$proto1250["m_functiontype"] = "SQLF_CUSTOM";
$proto1250["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "ps_entrada"
));

$proto1250["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"/\""
));

$proto1250["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ps_abandono"
));

$proto1250["m_arguments"][]=$obj;
$proto1250["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1250);

$proto1249["m_expr"]=$obj;
$proto1249["m_alias"] = "\"Entrada/Saida\"";
$obj = new SQLFieldListItem($proto1249);

$proto1232["m_fieldlist"][]=$obj;
$proto1232["m_fromlist"] = array();
												$proto1254=array();
$proto1254["m_link"] = "SQLL_MAIN";
			$proto1255=array();
$proto1255["m_strName"] = "cc_receptivo_filas_atend";
$proto1255["m_columns"] = array();
$proto1255["m_columns"][] = "chave";
$proto1255["m_columns"][] = "dt_entrada";
$proto1255["m_columns"][] = "hr_entrada";
$proto1255["m_columns"][] = "Fila";
$proto1255["m_columns"][] = "Agente";
$proto1255["m_columns"][] = "hr_atendimento";
$proto1255["m_columns"][] = "hr_abandono";
$proto1255["m_columns"][] = "tp_espera";
$proto1255["m_columns"][] = "tp_atendimento";
$proto1255["m_columns"][] = "Telefone";
$proto1255["m_columns"][] = "ps_entrada";
$proto1255["m_columns"][] = "ps_abandono";
$proto1255["m_columns"][] = "tel_trans";
$proto1255["m_columns"][] = "dsl_motiv";
$proto1255["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto1255);

$proto1254["m_table"] = $obj;
$proto1254["m_alias"] = "";
$proto1256=array();
$proto1256["m_sql"] = "";
$proto1256["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1256["m_column"]=$obj;
$proto1256["m_contained"] = array();
$proto1256["m_strCase"] = "";
$proto1256["m_havingmode"] = "0";
$proto1256["m_inBrackets"] = "0";
$proto1256["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1256);

$proto1254["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1254);

$proto1232["m_fromlist"][]=$obj;
$proto1232["m_groupby"] = array();
$proto1232["m_orderby"] = array();
												$proto1258=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1258["m_column"]=$obj;
$proto1258["m_bAsc"] = 1;
$proto1258["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1258);

$proto1232["m_orderby"][]=$obj;					
												$proto1260=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1260["m_column"]=$obj;
$proto1260["m_bAsc"] = 1;
$proto1260["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1260);

$proto1232["m_orderby"][]=$obj;					
												$proto1262=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1262["m_column"]=$obj;
$proto1262["m_bAsc"] = 1;
$proto1262["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1262);

$proto1232["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1232);

$queryData_Abandonos = $obj;
$tdataAbandonos[".sqlquery"] = $queryData_Abandonos;



?>
