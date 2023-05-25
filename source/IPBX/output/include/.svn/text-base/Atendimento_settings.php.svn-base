<?php

//	field labels
$fieldLabelsAtendimento = array();
$fieldLabelsAtendimento["Portuguese(Brazil)"]=array();
$fieldLabelsAtendimento["Portuguese(Brazil)"]["dt_entrada"] = "Data Entrada";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["hr_entrada"] = "Hora Entrada";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Agente"] = "Agente";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["tp_espera"] = "Tempo de Espera";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["tp_atendimento"] = "Tempo de Atendimento";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Entrada_Saida"] = "Entrada/Saida";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Terminado"] = "Terminado por";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["tptotal"] = "Tempo Total";
$fieldLabelsAtendimento["Portuguese(Brazil)"]["Obs_"] = "Observação";


$tdataAtendimento=array();
	$tdataAtendimento[".NumberOfChars"]=80; 
	$tdataAtendimento[".ShortName"]="Atendimento";
	$tdataAtendimento[".OwnerID"]="";
	$tdataAtendimento[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataAtendimento[".NCSearch"]=true;
	

$tdataAtendimento[".shortTableName"] = "Atendimento";
$tdataAtendimento[".dataSourceTable"] = "Rel. Atendimento";
$tdataAtendimento[".nSecOptions"] = 0;
$tdataAtendimento[".nLoginMethod"] = 1;
$tdataAtendimento[".recsPerRowList"] = 1;	
$tdataAtendimento[".tableGroupBy"] = "0";
$tdataAtendimento[".dbType"] = 0;
$tdataAtendimento[".mainTableOwnerID"] = "";
$tdataAtendimento[".moveNext"] = 1;

$tdataAtendimento[".listAjax"] = true;

	$tdataAtendimento[".audit"] = false;

	$tdataAtendimento[".locking"] = false;
	
$tdataAtendimento[".listIcons"] = true;

$tdataAtendimento[".exportTo"] = true;

$tdataAtendimento[".printFriendly"] = true;


$tdataAtendimento[".showSimpleSearchOptions"] = false;

$tdataAtendimento[".showSearchPanel"] = true;


$tdataAtendimento[".isUseAjaxSuggest"] = true;


$tdataAtendimento[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataAtendimento[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataAtendimento[".isUseTimeForSearch"] = false;





$tdataAtendimento[".isUseInlineJs"] = $tdataAtendimento[".isUseInlineAdd"] || $tdataAtendimento[".isUseInlineEdit"];

$tdataAtendimento[".allSearchFields"] = array();

$tdataAtendimento[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataAtendimento[".allSearchFields"]))
{
	$tdataAtendimento[".allSearchFields"][] = "Fila";	
}
$tdataAtendimento[".globSearchFields"][] = "Agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agente", $tdataAtendimento[".allSearchFields"]))
{
	$tdataAtendimento[".allSearchFields"][] = "Agente";	
}
$tdataAtendimento[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataAtendimento[".allSearchFields"]))
{
	$tdataAtendimento[".allSearchFields"][] = "dt_entrada";	
}


$tdataAtendimento[".isDynamicPerm"] = true;

	

$tdataAtendimento[".isDisplayLoading"] = true;

$tdataAtendimento[".isResizeColumns"] = false;


$tdataAtendimento[".createLoginPage"] = true;


 	

$tdataAtendimento[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY dt_entrada, hr_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataAtendimento[".strOrderBy"] = $gstrOrderBy;
	
$tdataAtendimento[".orderindexes"] = array();
$tdataAtendimento[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "dt_entrada");
$tdataAtendimento[".orderindexes"][] = array(7, (1 ? "ASC" : "DESC"), "hr_entrada");

$tdataAtendimento[".sqlHead"] = "SELECT Fila,  Telefone,  `Entrada/Saida`,  Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  tptotal,  `Obs.`";

$tdataAtendimento[".sqlFrom"] = "FROM v_rel_detalhado_chamadas";

$tdataAtendimento[".sqlWhereExpr"] = "";

$tdataAtendimento[".sqlTail"] = "";



	$tableKeys=array();
	$tdataAtendimento[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
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
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Fila"]=$fdata;
	
//	Telefone
	$fdata = array();
	$fdata["strName"] = "Telefone";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone";
		$fdata["FullName"]= "Telefone";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Telefone"]=$fdata;
	
//	Entrada/Saida
	$fdata = array();
	$fdata["strName"] = "Entrada/Saida";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
				$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Entrada_Saida";
		$fdata["FullName"]= "`Entrada/Saida`";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Entrada/Saida"]=$fdata;
	
//	Terminado
	$fdata = array();
	$fdata["strName"] = "Terminado";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Terminado por"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Terminado";
		$fdata["FullName"]= "Terminado";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Terminado"]=$fdata;
	
//	Agente
	$fdata = array();
	$fdata["strName"] = "Agente";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Agente";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Agente";
				$fdata["LookupTable"]="cc_receptivo_filas_atend";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Agente"]=$fdata;
	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Data Entrada"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["dt_entrada"]=$fdata;
	
//	hr_entrada
	$fdata = array();
	$fdata["strName"] = "hr_entrada";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Hora Entrada"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_entrada";
		$fdata["FullName"]= "hr_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAtendimento["hr_entrada"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Tempo de Espera"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAtendimento["tp_espera"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Tempo de Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_atendimento";
		$fdata["FullName"]= "tp_atendimento";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAtendimento["tp_atendimento"]=$fdata;
	
//	tptotal
	$fdata = array();
	$fdata["strName"] = "tptotal";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Tempo Total"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tptotal";
		$fdata["FullName"]= "tptotal";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAtendimento["tptotal"]=$fdata;
	
//	Obs.
	$fdata = array();
	$fdata["strName"] = "Obs.";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Observação"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Obs_";
		$fdata["FullName"]= "`Obs.`";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento["Obs."]=$fdata;

	
$tables_data["Rel. Atendimento"]=&$tdataAtendimento;
$field_labels["Rel__Atendimento"] = &$fieldLabelsAtendimento;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Atendimento"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Atendimento"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1397=array();
$proto1397["m_strHead"] = "SELECT";
$proto1397["m_strFieldList"] = "Fila,  Telefone,  `Entrada/Saida`,  Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  tptotal,  `Obs.`";
$proto1397["m_strFrom"] = "FROM v_rel_detalhado_chamadas";
$proto1397["m_strWhere"] = "";
$proto1397["m_strOrderBy"] = "ORDER BY dt_entrada, hr_entrada";
$proto1397["m_strTail"] = "";
$proto1398=array();
$proto1398["m_sql"] = "";
$proto1398["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1398["m_column"]=$obj;
$proto1398["m_contained"] = array();
$proto1398["m_strCase"] = "";
$proto1398["m_havingmode"] = "0";
$proto1398["m_inBrackets"] = "0";
$proto1398["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1398);

$proto1397["m_where"] = $obj;
$proto1400=array();
$proto1400["m_sql"] = "";
$proto1400["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1400["m_column"]=$obj;
$proto1400["m_contained"] = array();
$proto1400["m_strCase"] = "";
$proto1400["m_havingmode"] = "0";
$proto1400["m_inBrackets"] = "0";
$proto1400["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1400);

$proto1397["m_having"] = $obj;
$proto1397["m_fieldlist"] = array();
						$proto1402=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1402["m_expr"]=$obj;
$proto1402["m_alias"] = "";
$obj = new SQLFieldListItem($proto1402);

$proto1397["m_fieldlist"][]=$obj;
						$proto1404=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1404["m_expr"]=$obj;
$proto1404["m_alias"] = "";
$obj = new SQLFieldListItem($proto1404);

$proto1397["m_fieldlist"][]=$obj;
						$proto1406=array();
			$obj = new SQLField(array(
	"m_strName" => "Entrada/Saida",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1406["m_expr"]=$obj;
$proto1406["m_alias"] = "";
$obj = new SQLFieldListItem($proto1406);

$proto1397["m_fieldlist"][]=$obj;
						$proto1408=array();
			$obj = new SQLField(array(
	"m_strName" => "Terminado",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1408["m_expr"]=$obj;
$proto1408["m_alias"] = "";
$obj = new SQLFieldListItem($proto1408);

$proto1397["m_fieldlist"][]=$obj;
						$proto1410=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1410["m_expr"]=$obj;
$proto1410["m_alias"] = "";
$obj = new SQLFieldListItem($proto1410);

$proto1397["m_fieldlist"][]=$obj;
						$proto1412=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1412["m_expr"]=$obj;
$proto1412["m_alias"] = "";
$obj = new SQLFieldListItem($proto1412);

$proto1397["m_fieldlist"][]=$obj;
						$proto1414=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1414["m_expr"]=$obj;
$proto1414["m_alias"] = "";
$obj = new SQLFieldListItem($proto1414);

$proto1397["m_fieldlist"][]=$obj;
						$proto1416=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1416["m_expr"]=$obj;
$proto1416["m_alias"] = "";
$obj = new SQLFieldListItem($proto1416);

$proto1397["m_fieldlist"][]=$obj;
						$proto1418=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1418["m_expr"]=$obj;
$proto1418["m_alias"] = "";
$obj = new SQLFieldListItem($proto1418);

$proto1397["m_fieldlist"][]=$obj;
						$proto1420=array();
			$obj = new SQLField(array(
	"m_strName" => "tptotal",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1420["m_expr"]=$obj;
$proto1420["m_alias"] = "";
$obj = new SQLFieldListItem($proto1420);

$proto1397["m_fieldlist"][]=$obj;
						$proto1422=array();
			$obj = new SQLField(array(
	"m_strName" => "Obs.",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1422["m_expr"]=$obj;
$proto1422["m_alias"] = "";
$obj = new SQLFieldListItem($proto1422);

$proto1397["m_fieldlist"][]=$obj;
$proto1397["m_fromlist"] = array();
												$proto1424=array();
$proto1424["m_link"] = "SQLL_MAIN";
			$proto1425=array();
$proto1425["m_strName"] = "v_rel_detalhado_chamadas";
$proto1425["m_columns"] = array();
$proto1425["m_columns"][] = "Fila";
$proto1425["m_columns"][] = "Telefone";
$proto1425["m_columns"][] = "Entrada/Saida";
$proto1425["m_columns"][] = "Terminado";
$proto1425["m_columns"][] = "Agente";
$proto1425["m_columns"][] = "dt_entrada";
$proto1425["m_columns"][] = "hr_entrada";
$proto1425["m_columns"][] = "tp_espera";
$proto1425["m_columns"][] = "tp_atendimento";
$proto1425["m_columns"][] = "tptotal";
$proto1425["m_columns"][] = "Obs.";
$obj = new SQLTable($proto1425);

$proto1424["m_table"] = $obj;
$proto1424["m_alias"] = "";
$proto1426=array();
$proto1426["m_sql"] = "";
$proto1426["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1426["m_column"]=$obj;
$proto1426["m_contained"] = array();
$proto1426["m_strCase"] = "";
$proto1426["m_havingmode"] = "0";
$proto1426["m_inBrackets"] = "0";
$proto1426["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1426);

$proto1424["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1424);

$proto1397["m_fromlist"][]=$obj;
$proto1397["m_groupby"] = array();
$proto1397["m_orderby"] = array();
												$proto1428=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1428["m_column"]=$obj;
$proto1428["m_bAsc"] = 1;
$proto1428["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1428);

$proto1397["m_orderby"][]=$obj;					
												$proto1430=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto1430["m_column"]=$obj;
$proto1430["m_bAsc"] = 1;
$proto1430["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1430);

$proto1397["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1397);

$queryData_Atendimento = $obj;
$tdataAtendimento[".sqlquery"] = $queryData_Atendimento;



?>
