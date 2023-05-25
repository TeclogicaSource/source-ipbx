<?php

//	field labels
$fieldLabelsRel__Prod__Filas = array();
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["dt_entrada"] = "Data ";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["TME"] = "TME";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["TMA"] = "TMA";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["TMO"] = "TMO";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["NivelServicoContratado"] = "Nivel Servico Contratado";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Receb_"] = "Receb.";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Atend_"] = "Atend.";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Aband_"] = "Aband.";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Aband_Contr_"] = "Aband.Contr.";
$fieldLabelsRel__Prod__Filas["Portuguese(Brazil)"]["Aband_Real_"] = "Aband.Real.";


$tdataRel__Prod__Filas=array();
	$tdataRel__Prod__Filas[".NumberOfChars"]=80; 
	$tdataRel__Prod__Filas[".ShortName"]="Rel__Prod__Filas";
	$tdataRel__Prod__Filas[".OwnerID"]="";
	$tdataRel__Prod__Filas[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataRel__Prod__Filas[".NCSearch"]=true;
	

$tdataRel__Prod__Filas[".shortTableName"] = "Rel__Prod__Filas";
$tdataRel__Prod__Filas[".dataSourceTable"] = "Rel. Prod. Filas";
$tdataRel__Prod__Filas[".nSecOptions"] = 0;
$tdataRel__Prod__Filas[".nLoginMethod"] = 1;
$tdataRel__Prod__Filas[".recsPerRowList"] = 1;	
$tdataRel__Prod__Filas[".tableGroupBy"] = "1";
$tdataRel__Prod__Filas[".dbType"] = 0;
$tdataRel__Prod__Filas[".mainTableOwnerID"] = "";
$tdataRel__Prod__Filas[".moveNext"] = 1;

$tdataRel__Prod__Filas[".listAjax"] = false;

	$tdataRel__Prod__Filas[".audit"] = false;

	$tdataRel__Prod__Filas[".locking"] = false;
	
$tdataRel__Prod__Filas[".listIcons"] = true;

$tdataRel__Prod__Filas[".exportTo"] = true;

$tdataRel__Prod__Filas[".printFriendly"] = true;


$tdataRel__Prod__Filas[".showSimpleSearchOptions"] = false;

$tdataRel__Prod__Filas[".showSearchPanel"] = true;


$tdataRel__Prod__Filas[".isUseAjaxSuggest"] = true;


$tdataRel__Prod__Filas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Prod__Filas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Prod__Filas[".isUseTimeForSearch"] = false;





$tdataRel__Prod__Filas[".isUseInlineJs"] = $tdataRel__Prod__Filas[".isUseInlineAdd"] || $tdataRel__Prod__Filas[".isUseInlineEdit"];

$tdataRel__Prod__Filas[".allSearchFields"] = array();

$tdataRel__Prod__Filas[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel__Prod__Filas[".allSearchFields"]))
{
	$tdataRel__Prod__Filas[".allSearchFields"][] = "dt_entrada";	
}
$tdataRel__Prod__Filas[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Prod__Filas[".allSearchFields"]))
{
	$tdataRel__Prod__Filas[".allSearchFields"][] = "Fila";	
}


$tdataRel__Prod__Filas[".isDynamicPerm"] = true;

	

$tdataRel__Prod__Filas[".isDisplayLoading"] = true;

$tdataRel__Prod__Filas[".isResizeColumns"] = false;


$tdataRel__Prod__Filas[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Prod__Filas[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Prod__Filas[".orderindexes"] = array();

$tdataRel__Prod__Filas[".sqlHead"] = "select ccrfa.dt_entrada AS dt_entrada,  ccrfa.Fila,  COUNT(ccrfa.hr_entrada) AS `Receb.`,  COUNT(ccrfa.hr_atendimento) AS `Atend.`,  COUNT(ccrfa.hr_abandono) AS `Aband.`,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera))) AS TME,  sec_to_time(avg(time_to_sec(ccrfa.tp_atendimento))) AS TMA,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera)+(time_to_sec(ccrfa.tp_atendimento)))) AS TMO,  case   when ccrf.tx_abandono is NULL then \"N/A\"   else concat(\"< \",ccrf.tx_abandono) end AS `Aband.Contr.`,  ((count(ccrfa.hr_abandono)*100)/count(ccrfa.hr_entrada)) AS `Aband.Real.`,  concat(ccrf.perc_tme, \"% em \", seg_tme, \"S\") AS NivelServicoContratado";

$tdataRel__Prod__Filas[".sqlFrom"] = "FROM cc_receptivo_filas_atend AS ccrfa  , cc_receptivo_filas AS ccrf";

$tdataRel__Prod__Filas[".sqlWhereExpr"] = "(ccrfa.dt_entrada > 0000) AND (ccrfa.Fila = ccrf.nm_fila)";

$tdataRel__Prod__Filas[".sqlTail"] = "GROUP BY ccrfa.dt_entrada, ccrfa.Fila";



	$tableKeys=array();
	$tdataRel__Prod__Filas[".Keys"]=$tableKeys;

	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Data "; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "ccrfa.dt_entrada";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["dt_entrada"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["LinkPrefix"]="files/"; 
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
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "ccrfa.Fila";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Fila"]=$fdata;
	
//	Receb.
	$fdata = array();
	$fdata["strName"] = "Receb.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Receb_";
		$fdata["FullName"]= "COUNT(ccrfa.hr_entrada)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Receb."]=$fdata;
	
//	Atend.
	$fdata = array();
	$fdata["strName"] = "Atend.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Atend_";
		$fdata["FullName"]= "COUNT(ccrfa.hr_atendimento)";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Atend."]=$fdata;
	
//	Aband.
	$fdata = array();
	$fdata["strName"] = "Aband.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_";
		$fdata["FullName"]= "COUNT(ccrfa.hr_abandono)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Aband."]=$fdata;
	
//	TME
	$fdata = array();
	$fdata["strName"] = "TME";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TME";
		$fdata["FullName"]= "sec_to_time(avg(time_to_sec(ccrfa.tp_espera)))";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Prod__Filas["TME"]=$fdata;
	
//	TMA
	$fdata = array();
	$fdata["strName"] = "TMA";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TMA";
		$fdata["FullName"]= "sec_to_time(avg(time_to_sec(ccrfa.tp_atendimento)))";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Prod__Filas["TMA"]=$fdata;
	
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
		$fdata["FullName"]= "sec_to_time(avg(time_to_sec(ccrfa.tp_espera)+(time_to_sec(ccrfa.tp_atendimento))))";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Prod__Filas["TMO"]=$fdata;
	
//	Aband.Contr.
	$fdata = array();
	$fdata["strName"] = "Aband.Contr.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_Contr_";
		$fdata["FullName"]= "case   when ccrf.tx_abandono is NULL then \"N/A\"   else concat(\"< \",ccrf.tx_abandono) end";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Aband.Contr."]=$fdata;
	
//	Aband.Real.
	$fdata = array();
	$fdata["strName"] = "Aband.Real.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_Real_";
		$fdata["FullName"]= "((count(ccrfa.hr_abandono)*100)/count(ccrfa.hr_entrada))";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["Aband.Real."]=$fdata;
	
//	NivelServicoContratado
	$fdata = array();
	$fdata["strName"] = "NivelServicoContratado";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Nivel Servico Contratado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoContratado";
		$fdata["FullName"]= "concat(ccrf.perc_tme, \"% em \", seg_tme, \"S\")";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Prod__Filas["NivelServicoContratado"]=$fdata;

	
$tables_data["Rel. Prod. Filas"]=&$tdataRel__Prod__Filas;
$field_labels["Rel__Prod__Filas"] = &$fieldLabelsRel__Prod__Filas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Prod. Filas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Prod. Filas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto417=array();
$proto417["m_strHead"] = "select";
$proto417["m_strFieldList"] = "ccrfa.dt_entrada AS dt_entrada,  ccrfa.Fila,  COUNT(ccrfa.hr_entrada) AS `Receb.`,  COUNT(ccrfa.hr_atendimento) AS `Atend.`,  COUNT(ccrfa.hr_abandono) AS `Aband.`,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera))) AS TME,  sec_to_time(avg(time_to_sec(ccrfa.tp_atendimento))) AS TMA,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera)+(time_to_sec(ccrfa.tp_atendimento)))) AS TMO,  case   when ccrf.tx_abandono is NULL then \"N/A\"   else concat(\"< \",ccrf.tx_abandono) end AS `Aband.Contr.`,  ((count(ccrfa.hr_abandono)*100)/count(ccrfa.hr_entrada)) AS `Aband.Real.`,  concat(ccrf.perc_tme, \"% em \", seg_tme, \"S\") AS NivelServicoContratado";
$proto417["m_strFrom"] = "FROM cc_receptivo_filas_atend AS ccrfa  , cc_receptivo_filas AS ccrf";
$proto417["m_strWhere"] = "(ccrfa.dt_entrada > 0000) AND (ccrfa.Fila = ccrf.nm_fila)";
$proto417["m_strOrderBy"] = "";
$proto417["m_strTail"] = "GROUP BY ccrfa.dt_entrada, ccrfa.Fila";
$proto418=array();
$proto418["m_sql"] = "(ccrfa.dt_entrada > 0000) AND (ccrfa.Fila = ccrf.nm_fila)";
$proto418["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(ccrfa.dt_entrada > 0000) AND (ccrfa.Fila = ccrf.nm_fila)"
));

$proto418["m_column"]=$obj;
$proto418["m_contained"] = array();
						$proto420=array();
$proto420["m_sql"] = "ccrfa.dt_entrada > 0000";
$proto420["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "ccrfa"
));

$proto420["m_column"]=$obj;
$proto420["m_contained"] = array();
$proto420["m_strCase"] = "> 0000";
$proto420["m_havingmode"] = "0";
$proto420["m_inBrackets"] = "1";
$proto420["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto420);

			$proto418["m_contained"][]=$obj;
						$proto422=array();
$proto422["m_sql"] = "ccrfa.Fila = ccrf.nm_fila";
$proto422["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "ccrfa"
));

$proto422["m_column"]=$obj;
$proto422["m_contained"] = array();
$proto422["m_strCase"] = "= ccrf.nm_fila";
$proto422["m_havingmode"] = "0";
$proto422["m_inBrackets"] = "1";
$proto422["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto422);

			$proto418["m_contained"][]=$obj;
$proto418["m_strCase"] = "";
$proto418["m_havingmode"] = "0";
$proto418["m_inBrackets"] = "0";
$proto418["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto418);

$proto417["m_where"] = $obj;
$proto424=array();
$proto424["m_sql"] = "";
$proto424["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto424["m_column"]=$obj;
$proto424["m_contained"] = array();
$proto424["m_strCase"] = "";
$proto424["m_havingmode"] = "0";
$proto424["m_inBrackets"] = "0";
$proto424["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto424);

$proto417["m_having"] = $obj;
$proto417["m_fieldlist"] = array();
						$proto426=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "ccrfa"
));

$proto426["m_expr"]=$obj;
$proto426["m_alias"] = "dt_entrada";
$obj = new SQLFieldListItem($proto426);

$proto417["m_fieldlist"][]=$obj;
						$proto428=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "ccrfa"
));

$proto428["m_expr"]=$obj;
$proto428["m_alias"] = "";
$obj = new SQLFieldListItem($proto428);

$proto417["m_fieldlist"][]=$obj;
						$proto430=array();
			$proto431=array();
$proto431["m_functiontype"] = "SQLF_COUNT";
$proto431["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "ccrfa"
));

$proto431["m_arguments"][]=$obj;
$proto431["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto431);

$proto430["m_expr"]=$obj;
$proto430["m_alias"] = "Receb.";
$obj = new SQLFieldListItem($proto430);

$proto417["m_fieldlist"][]=$obj;
						$proto433=array();
			$proto434=array();
$proto434["m_functiontype"] = "SQLF_COUNT";
$proto434["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "ccrfa"
));

$proto434["m_arguments"][]=$obj;
$proto434["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto434);

$proto433["m_expr"]=$obj;
$proto433["m_alias"] = "Atend.";
$obj = new SQLFieldListItem($proto433);

$proto417["m_fieldlist"][]=$obj;
						$proto436=array();
			$proto437=array();
$proto437["m_functiontype"] = "SQLF_COUNT";
$proto437["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "ccrfa"
));

$proto437["m_arguments"][]=$obj;
$proto437["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto437);

$proto436["m_expr"]=$obj;
$proto436["m_alias"] = "Aband.";
$obj = new SQLFieldListItem($proto436);

$proto417["m_fieldlist"][]=$obj;
						$proto439=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(avg(time_to_sec(ccrfa.tp_espera)))"
));

$proto439["m_expr"]=$obj;
$proto439["m_alias"] = "TME";
$obj = new SQLFieldListItem($proto439);

$proto417["m_fieldlist"][]=$obj;
						$proto441=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(avg(time_to_sec(ccrfa.tp_atendimento)))"
));

$proto441["m_expr"]=$obj;
$proto441["m_alias"] = "TMA";
$obj = new SQLFieldListItem($proto441);

$proto417["m_fieldlist"][]=$obj;
						$proto443=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(avg(time_to_sec(ccrfa.tp_espera)+(time_to_sec(ccrfa.tp_atendimento))))"
));

$proto443["m_expr"]=$obj;
$proto443["m_alias"] = "TMO";
$obj = new SQLFieldListItem($proto443);

$proto417["m_fieldlist"][]=$obj;
						$proto445=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case   when ccrf.tx_abandono is NULL then \"N/A\"   else concat(\"< \",ccrf.tx_abandono) end"
));

$proto445["m_expr"]=$obj;
$proto445["m_alias"] = "Aband.Contr.";
$obj = new SQLFieldListItem($proto445);

$proto417["m_fieldlist"][]=$obj;
						$proto447=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "((count(ccrfa.hr_abandono)*100)/count(ccrfa.hr_entrada))"
));

$proto447["m_expr"]=$obj;
$proto447["m_alias"] = "Aband.Real.";
$obj = new SQLFieldListItem($proto447);

$proto417["m_fieldlist"][]=$obj;
						$proto449=array();
			$proto450=array();
$proto450["m_functiontype"] = "SQLF_CUSTOM";
$proto450["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "ccrf.perc_tme"
));

$proto450["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"% em \""
));

$proto450["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "seg_tme"
));

$proto450["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"S\""
));

$proto450["m_arguments"][]=$obj;
$proto450["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto450);

$proto449["m_expr"]=$obj;
$proto449["m_alias"] = "NivelServicoContratado";
$obj = new SQLFieldListItem($proto449);

$proto417["m_fieldlist"][]=$obj;
$proto417["m_fromlist"] = array();
												$proto455=array();
$proto455["m_link"] = "SQLL_MAIN";
			$proto456=array();
$proto456["m_strName"] = "cc_receptivo_filas_atend";
$proto456["m_columns"] = array();
$proto456["m_columns"][] = "chave";
$proto456["m_columns"][] = "dt_entrada";
$proto456["m_columns"][] = "hr_entrada";
$proto456["m_columns"][] = "Fila";
$proto456["m_columns"][] = "Agente";
$proto456["m_columns"][] = "hr_atendimento";
$proto456["m_columns"][] = "hr_abandono";
$proto456["m_columns"][] = "tp_espera";
$proto456["m_columns"][] = "tp_atendimento";
$proto456["m_columns"][] = "Telefone";
$proto456["m_columns"][] = "ps_entrada";
$proto456["m_columns"][] = "ps_abandono";
$proto456["m_columns"][] = "tel_trans";
$proto456["m_columns"][] = "dsl_motiv";
$proto456["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto456);

$proto455["m_table"] = $obj;
$proto455["m_alias"] = "ccrfa";
$proto457=array();
$proto457["m_sql"] = "";
$proto457["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto457["m_column"]=$obj;
$proto457["m_contained"] = array();
$proto457["m_strCase"] = "";
$proto457["m_havingmode"] = "0";
$proto457["m_inBrackets"] = "0";
$proto457["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto457);

$proto455["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto455);

$proto417["m_fromlist"][]=$obj;
												$proto459=array();
$proto459["m_link"] = "SQLL_CROSSJOIN";
			$proto460=array();
$proto460["m_strName"] = "cc_receptivo_filas";
$proto460["m_columns"] = array();
$proto460["m_columns"][] = "id_filas";
$proto460["m_columns"][] = "nm_fila";
$proto460["m_columns"][] = "estrategia";
$proto460["m_columns"][] = "gravacao";
$proto460["m_columns"][] = "id_horario";
$proto460["m_columns"][] = "arq_audio";
$proto460["m_columns"][] = "arq_mesg";
$proto460["m_columns"][] = "tp_toques";
$proto460["m_columns"][] = "id_desvio";
$proto460["m_columns"][] = "tp_excedido";
$proto460["m_columns"][] = "acao_falta_agente";
$proto460["m_columns"][] = "acao_tp_excedido";
$proto460["m_columns"][] = "acao_fr_horario";
$proto460["m_columns"][] = "ramal_remoto";
$proto460["m_columns"][] = "seg_tmo";
$proto460["m_columns"][] = "perc_tmo";
$proto460["m_columns"][] = "seg_tma";
$proto460["m_columns"][] = "perc_tma";
$proto460["m_columns"][] = "seg_tme";
$proto460["m_columns"][] = "perc_tme";
$proto460["m_columns"][] = "tx_abandono";
$proto460["m_columns"][] = "flg_estim_do_dia";
$proto460["m_columns"][] = "tp_estimativa";
$proto460["m_columns"][] = "id_name_gestor";
$proto460["m_columns"][] = "maxlen";
$proto460["m_columns"][] = "wrapuptime";
$obj = new SQLTable($proto460);

$proto459["m_table"] = $obj;
$proto459["m_alias"] = "ccrf";
$proto461=array();
$proto461["m_sql"] = "";
$proto461["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto461["m_column"]=$obj;
$proto461["m_contained"] = array();
$proto461["m_strCase"] = "";
$proto461["m_havingmode"] = "0";
$proto461["m_inBrackets"] = "0";
$proto461["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto461);

$proto459["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto459);

$proto417["m_fromlist"][]=$obj;
$proto417["m_groupby"] = array();
												$proto463=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "ccrfa"
));

$proto463["m_column"]=$obj;
$obj = new SQLGroupByItem($proto463);

$proto417["m_groupby"][]=$obj;
												$proto465=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "ccrfa"
));

$proto465["m_column"]=$obj;
$obj = new SQLGroupByItem($proto465);

$proto417["m_groupby"][]=$obj;
$proto417["m_orderby"] = array();
$obj = new SQLQuery($proto417);

$queryData_Rel__Prod__Filas = $obj;
$tdataRel__Prod__Filas[".sqlquery"] = $queryData_Rel__Prod__Filas;



?>
