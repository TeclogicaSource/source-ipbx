<?php

//	field labels
$fieldLabelsRelat_rio_FilaxAgente = array();
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]=array();
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Data_de_Entrada"] = "Data de Entrada";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Hora_de_Entrada"] = "Hora de Entrada";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Hora_Atendimento"] = "Hora Atendimento";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Evento"] = "Evento";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Agente"] = "Agente";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Tempo_de_Espera"] = "Tempo de Espera";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Tempo_de_Atendimento"] = "Tempo de Atendimento";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Hora_de_Abandono"] = "Hora de Abandono";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Telefone_Transferido"] = "Telefone Transferido";
$fieldLabelsRelat_rio_FilaxAgente["Portuguese(Brazil)"]["Chave__nica"] = "Chave Ãšnica";


$tdataRelat_rio_FilaxAgente=array();
	$tdataRelat_rio_FilaxAgente[".NumberOfChars"]=80; 
	$tdataRelat_rio_FilaxAgente[".ShortName"]="Relat_rio_FilaxAgente";
	$tdataRelat_rio_FilaxAgente[".OwnerID"]="";
	$tdataRelat_rio_FilaxAgente[".OriginalTable"]="v_fila_agente";
	$tdataRelat_rio_FilaxAgente[".NCSearch"]=true;
	

$tdataRelat_rio_FilaxAgente[".shortTableName"] = "Relat_rio_FilaxAgente";
$tdataRelat_rio_FilaxAgente[".dataSourceTable"] = "Rel. Fila x Agente";
$tdataRelat_rio_FilaxAgente[".nSecOptions"] = 0;
$tdataRelat_rio_FilaxAgente[".nLoginMethod"] = 1;
$tdataRelat_rio_FilaxAgente[".recsPerRowList"] = 1;	
$tdataRelat_rio_FilaxAgente[".tableGroupBy"] = "0";
$tdataRelat_rio_FilaxAgente[".dbType"] = 0;
$tdataRelat_rio_FilaxAgente[".mainTableOwnerID"] = "";
$tdataRelat_rio_FilaxAgente[".moveNext"] = 1;

$tdataRelat_rio_FilaxAgente[".listAjax"] = false;

	$tdataRelat_rio_FilaxAgente[".audit"] = false;

	$tdataRelat_rio_FilaxAgente[".locking"] = false;
	
$tdataRelat_rio_FilaxAgente[".listIcons"] = true;

$tdataRelat_rio_FilaxAgente[".exportTo"] = true;

$tdataRelat_rio_FilaxAgente[".printFriendly"] = true;


$tdataRelat_rio_FilaxAgente[".showSimpleSearchOptions"] = false;

$tdataRelat_rio_FilaxAgente[".showSearchPanel"] = true;


$tdataRelat_rio_FilaxAgente[".isUseAjaxSuggest"] = true;


$tdataRelat_rio_FilaxAgente[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRelat_rio_FilaxAgente[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRelat_rio_FilaxAgente[".isUseTimeForSearch"] = false;





$tdataRelat_rio_FilaxAgente[".isUseInlineJs"] = $tdataRelat_rio_FilaxAgente[".isUseInlineAdd"] || $tdataRelat_rio_FilaxAgente[".isUseInlineEdit"];

$tdataRelat_rio_FilaxAgente[".allSearchFields"] = array();

$tdataRelat_rio_FilaxAgente[".globSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataRelat_rio_FilaxAgente[".allSearchFields"]))
{
	$tdataRelat_rio_FilaxAgente[".allSearchFields"][] = "Telefone";	
}
$tdataRelat_rio_FilaxAgente[".globSearchFields"][] = "Evento";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Evento", $tdataRelat_rio_FilaxAgente[".allSearchFields"]))
{
	$tdataRelat_rio_FilaxAgente[".allSearchFields"][] = "Evento";	
}
$tdataRelat_rio_FilaxAgente[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRelat_rio_FilaxAgente[".allSearchFields"]))
{
	$tdataRelat_rio_FilaxAgente[".allSearchFields"][] = "Fila";	
}
$tdataRelat_rio_FilaxAgente[".globSearchFields"][] = "Agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agente", $tdataRelat_rio_FilaxAgente[".allSearchFields"]))
{
	$tdataRelat_rio_FilaxAgente[".allSearchFields"][] = "Agente";	
}


$tdataRelat_rio_FilaxAgente[".isDynamicPerm"] = true;

	

$tdataRelat_rio_FilaxAgente[".isDisplayLoading"] = true;

$tdataRelat_rio_FilaxAgente[".isResizeColumns"] = false;


$tdataRelat_rio_FilaxAgente[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRelat_rio_FilaxAgente[".strOrderBy"] = $gstrOrderBy;
	
$tdataRelat_rio_FilaxAgente[".orderindexes"] = array();

$tdataRelat_rio_FilaxAgente[".sqlHead"] = "SELECT dt_entrada AS `Data de Entrada`,  hr_entrada AS `Hora de Entrada`,  Telefone AS Telefone,  hr_atendimento AS `Hora Atendimento`,  evento AS Evento,  Fila AS Fila,  Agente AS Agente,  tp_espera AS `Tempo de Espera`,  tp_atendimento AS `Tempo de Atendimento`,  hr_abandono AS `Hora de Abandono`,  tel_trans AS `Telefone Transferido`,  chave AS `Chave Única`";

$tdataRelat_rio_FilaxAgente[".sqlFrom"] = "FROM v_fila_agente";

$tdataRelat_rio_FilaxAgente[".sqlWhereExpr"] = "";

$tdataRelat_rio_FilaxAgente[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRelat_rio_FilaxAgente[".Keys"]=$tableKeys;

	
//	Data de Entrada
	$fdata = array();
	$fdata["strName"] = "Data de Entrada";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data_de_Entrada";
		$fdata["FullName"]= "dt_entrada";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Data de Entrada"]=$fdata;
	
//	Hora de Entrada
	$fdata = array();
	$fdata["strName"] = "Hora de Entrada";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora_de_Entrada";
		$fdata["FullName"]= "hr_entrada";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRelat_rio_FilaxAgente["Hora de Entrada"]=$fdata;
	
//	Telefone
	$fdata = array();
	$fdata["strName"] = "Telefone";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone";
		$fdata["FullName"]= "Telefone";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Telefone"]=$fdata;
	
//	Hora Atendimento
	$fdata = array();
	$fdata["strName"] = "Hora Atendimento";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora_Atendimento";
		$fdata["FullName"]= "hr_atendimento";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRelat_rio_FilaxAgente["Hora Atendimento"]=$fdata;
	
//	Evento
	$fdata = array();
	$fdata["strName"] = "Evento";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Evento";
		$fdata["FullName"]= "evento";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=12";
		
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Evento"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Fila"]=$fdata;
	
//	Agente
	$fdata = array();
	$fdata["strName"] = "Agente";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Agente"]=$fdata;
	
//	Tempo de Espera
	$fdata = array();
	$fdata["strName"] = "Tempo de Espera";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo_de_Espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Tempo de Espera"]=$fdata;
	
//	Tempo de Atendimento
	$fdata = array();
	$fdata["strName"] = "Tempo de Atendimento";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo_de_Atendimento";
		$fdata["FullName"]= "tp_atendimento";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Tempo de Atendimento"]=$fdata;
	
//	Hora de Abandono
	$fdata = array();
	$fdata["strName"] = "Hora de Abandono";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora_de_Abandono";
		$fdata["FullName"]= "hr_abandono";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Hora de Abandono"]=$fdata;
	
//	Telefone Transferido
	$fdata = array();
	$fdata["strName"] = "Telefone Transferido";
	$fdata["ownerTable"] = "v_fila_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone_Transferido";
		$fdata["FullName"]= "tel_trans";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRelat_rio_FilaxAgente["Telefone Transferido"]=$fdata;
	
//	Chave Única
	$fdata = array();
	$fdata["strName"] = "Chave Única";
	$fdata["ownerTable"] = "v_fila_agente";
		$fdata["Label"]="Chave Ãšnica"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Chave__nica";
		$fdata["FullName"]= "chave";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
									$tdataRelat_rio_FilaxAgente["Chave Única"]=$fdata;

	
$tables_data["Rel. Fila x Agente"]=&$tdataRelat_rio_FilaxAgente;
$field_labels["Rel__Fila_x_Agente"] = &$fieldLabelsRelat_rio_FilaxAgente;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Fila x Agente"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Fila x Agente"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto594=array();
$proto594["m_strHead"] = "SELECT";
$proto594["m_strFieldList"] = "dt_entrada AS `Data de Entrada`,  hr_entrada AS `Hora de Entrada`,  Telefone AS Telefone,  hr_atendimento AS `Hora Atendimento`,  evento AS Evento,  Fila AS Fila,  Agente AS Agente,  tp_espera AS `Tempo de Espera`,  tp_atendimento AS `Tempo de Atendimento`,  hr_abandono AS `Hora de Abandono`,  tel_trans AS `Telefone Transferido`,  chave AS `Chave Única`";
$proto594["m_strFrom"] = "FROM v_fila_agente";
$proto594["m_strWhere"] = "";
$proto594["m_strOrderBy"] = "";
$proto594["m_strTail"] = "";
$proto595=array();
$proto595["m_sql"] = "";
$proto595["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto595["m_column"]=$obj;
$proto595["m_contained"] = array();
$proto595["m_strCase"] = "";
$proto595["m_havingmode"] = "0";
$proto595["m_inBrackets"] = "0";
$proto595["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto595);

$proto594["m_where"] = $obj;
$proto597=array();
$proto597["m_sql"] = "";
$proto597["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto597["m_column"]=$obj;
$proto597["m_contained"] = array();
$proto597["m_strCase"] = "";
$proto597["m_havingmode"] = "0";
$proto597["m_inBrackets"] = "0";
$proto597["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto597);

$proto594["m_having"] = $obj;
$proto594["m_fieldlist"] = array();
						$proto599=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_fila_agente"
));

$proto599["m_expr"]=$obj;
$proto599["m_alias"] = "Data de Entrada";
$obj = new SQLFieldListItem($proto599);

$proto594["m_fieldlist"][]=$obj;
						$proto601=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "v_fila_agente"
));

$proto601["m_expr"]=$obj;
$proto601["m_alias"] = "Hora de Entrada";
$obj = new SQLFieldListItem($proto601);

$proto594["m_fieldlist"][]=$obj;
						$proto603=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "v_fila_agente"
));

$proto603["m_expr"]=$obj;
$proto603["m_alias"] = "Telefone";
$obj = new SQLFieldListItem($proto603);

$proto594["m_fieldlist"][]=$obj;
						$proto605=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "v_fila_agente"
));

$proto605["m_expr"]=$obj;
$proto605["m_alias"] = "Hora Atendimento";
$obj = new SQLFieldListItem($proto605);

$proto594["m_fieldlist"][]=$obj;
						$proto607=array();
			$obj = new SQLField(array(
	"m_strName" => "evento",
	"m_strTable" => "v_fila_agente"
));

$proto607["m_expr"]=$obj;
$proto607["m_alias"] = "Evento";
$obj = new SQLFieldListItem($proto607);

$proto594["m_fieldlist"][]=$obj;
						$proto609=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_fila_agente"
));

$proto609["m_expr"]=$obj;
$proto609["m_alias"] = "Fila";
$obj = new SQLFieldListItem($proto609);

$proto594["m_fieldlist"][]=$obj;
						$proto611=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_fila_agente"
));

$proto611["m_expr"]=$obj;
$proto611["m_alias"] = "Agente";
$obj = new SQLFieldListItem($proto611);

$proto594["m_fieldlist"][]=$obj;
						$proto613=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "v_fila_agente"
));

$proto613["m_expr"]=$obj;
$proto613["m_alias"] = "Tempo de Espera";
$obj = new SQLFieldListItem($proto613);

$proto594["m_fieldlist"][]=$obj;
						$proto615=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "v_fila_agente"
));

$proto615["m_expr"]=$obj;
$proto615["m_alias"] = "Tempo de Atendimento";
$obj = new SQLFieldListItem($proto615);

$proto594["m_fieldlist"][]=$obj;
						$proto617=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "v_fila_agente"
));

$proto617["m_expr"]=$obj;
$proto617["m_alias"] = "Hora de Abandono";
$obj = new SQLFieldListItem($proto617);

$proto594["m_fieldlist"][]=$obj;
						$proto619=array();
			$obj = new SQLField(array(
	"m_strName" => "tel_trans",
	"m_strTable" => "v_fila_agente"
));

$proto619["m_expr"]=$obj;
$proto619["m_alias"] = "Telefone Transferido";
$obj = new SQLFieldListItem($proto619);

$proto594["m_fieldlist"][]=$obj;
						$proto621=array();
			$obj = new SQLField(array(
	"m_strName" => "chave",
	"m_strTable" => "v_fila_agente"
));

$proto621["m_expr"]=$obj;
$proto621["m_alias"] = "Chave Única";
$obj = new SQLFieldListItem($proto621);

$proto594["m_fieldlist"][]=$obj;
$proto594["m_fromlist"] = array();
												$proto623=array();
$proto623["m_link"] = "SQLL_MAIN";
			$proto624=array();
$proto624["m_strName"] = "v_fila_agente";
$proto624["m_columns"] = array();
$proto624["m_columns"][] = "dt_entrada";
$proto624["m_columns"][] = "hr_entrada";
$proto624["m_columns"][] = "Telefone";
$proto624["m_columns"][] = "hr_atendimento";
$proto624["m_columns"][] = "evento";
$proto624["m_columns"][] = "Fila";
$proto624["m_columns"][] = "Agente";
$proto624["m_columns"][] = "tp_espera";
$proto624["m_columns"][] = "tp_atendimento";
$proto624["m_columns"][] = "hr_abandono";
$proto624["m_columns"][] = "tel_trans";
$proto624["m_columns"][] = "chave";
$obj = new SQLTable($proto624);

$proto623["m_table"] = $obj;
$proto623["m_alias"] = "";
$proto625=array();
$proto625["m_sql"] = "";
$proto625["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto625["m_column"]=$obj;
$proto625["m_contained"] = array();
$proto625["m_strCase"] = "";
$proto625["m_havingmode"] = "0";
$proto625["m_inBrackets"] = "0";
$proto625["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto625);

$proto623["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto623);

$proto594["m_fromlist"][]=$obj;
$proto594["m_groupby"] = array();
$proto594["m_orderby"] = array();
$obj = new SQLQuery($proto594);

$queryData_Relat_rio_FilaxAgente = $obj;
$tdataRelat_rio_FilaxAgente[".sqlquery"] = $queryData_Relat_rio_FilaxAgente;



?>
