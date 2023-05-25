<?php

//	field labels
$fieldLabelsRel_Chamada_Detalhada = array();
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]=array();
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Entrada_Saida"] = "Entrada/Saida";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Terminado"] = "Terminado";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Agente"] = "Agente";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["dt_entrada"] = "Data Entrada";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["hr_entrada"] = "Hora Entrada";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["tp_espera"] = "Espera";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["tp_atendimento"] = "Atendimento";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["tptotal"] = "Total";
$fieldLabelsRel_Chamada_Detalhada["Portuguese(Brazil)"]["Obs_"] = "Observação";


$tdataRel_Chamada_Detalhada=array();
	$tdataRel_Chamada_Detalhada[".NumberOfChars"]=80; 
	$tdataRel_Chamada_Detalhada[".ShortName"]="Rel_Chamada_Detalhada";
	$tdataRel_Chamada_Detalhada[".OwnerID"]="";
	$tdataRel_Chamada_Detalhada[".OriginalTable"]="v_rel_detalhado_agentes";
	$tdataRel_Chamada_Detalhada[".NCSearch"]=true;
	

$tdataRel_Chamada_Detalhada[".shortTableName"] = "Rel_Chamada_Detalhada";
$tdataRel_Chamada_Detalhada[".dataSourceTable"] = "Rel. Cham Detalhada";
$tdataRel_Chamada_Detalhada[".nSecOptions"] = 0;
$tdataRel_Chamada_Detalhada[".nLoginMethod"] = 1;
$tdataRel_Chamada_Detalhada[".recsPerRowList"] = 1;	
$tdataRel_Chamada_Detalhada[".tableGroupBy"] = "0";
$tdataRel_Chamada_Detalhada[".dbType"] = 0;
$tdataRel_Chamada_Detalhada[".mainTableOwnerID"] = "";
$tdataRel_Chamada_Detalhada[".moveNext"] = 1;

$tdataRel_Chamada_Detalhada[".listAjax"] = false;

	$tdataRel_Chamada_Detalhada[".audit"] = false;

	$tdataRel_Chamada_Detalhada[".locking"] = false;
	
$tdataRel_Chamada_Detalhada[".listIcons"] = true;

$tdataRel_Chamada_Detalhada[".exportTo"] = true;

$tdataRel_Chamada_Detalhada[".printFriendly"] = true;


$tdataRel_Chamada_Detalhada[".showSimpleSearchOptions"] = false;

$tdataRel_Chamada_Detalhada[".showSearchPanel"] = true;


$tdataRel_Chamada_Detalhada[".isUseAjaxSuggest"] = true;


$tdataRel_Chamada_Detalhada[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel_Chamada_Detalhada[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel_Chamada_Detalhada[".isUseTimeForSearch"] = false;





$tdataRel_Chamada_Detalhada[".isUseInlineJs"] = $tdataRel_Chamada_Detalhada[".isUseInlineAdd"] || $tdataRel_Chamada_Detalhada[".isUseInlineEdit"];

$tdataRel_Chamada_Detalhada[".allSearchFields"] = array();

$tdataRel_Chamada_Detalhada[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel_Chamada_Detalhada[".allSearchFields"]))
{
	$tdataRel_Chamada_Detalhada[".allSearchFields"][] = "Fila";	
}
$tdataRel_Chamada_Detalhada[".globSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataRel_Chamada_Detalhada[".allSearchFields"]))
{
	$tdataRel_Chamada_Detalhada[".allSearchFields"][] = "Telefone";	
}
$tdataRel_Chamada_Detalhada[".globSearchFields"][] = "Terminado";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Terminado", $tdataRel_Chamada_Detalhada[".allSearchFields"]))
{
	$tdataRel_Chamada_Detalhada[".allSearchFields"][] = "Terminado";	
}
$tdataRel_Chamada_Detalhada[".globSearchFields"][] = "Agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agente", $tdataRel_Chamada_Detalhada[".allSearchFields"]))
{
	$tdataRel_Chamada_Detalhada[".allSearchFields"][] = "Agente";	
}
$tdataRel_Chamada_Detalhada[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel_Chamada_Detalhada[".allSearchFields"]))
{
	$tdataRel_Chamada_Detalhada[".allSearchFields"][] = "dt_entrada";	
}


$tdataRel_Chamada_Detalhada[".isDynamicPerm"] = true;

	

$tdataRel_Chamada_Detalhada[".isDisplayLoading"] = true;

$tdataRel_Chamada_Detalhada[".isResizeColumns"] = false;


$tdataRel_Chamada_Detalhada[".createLoginPage"] = true;


 	

$tdataRel_Chamada_Detalhada[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY dt_entrada, hr_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel_Chamada_Detalhada[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel_Chamada_Detalhada[".orderindexes"] = array();
$tdataRel_Chamada_Detalhada[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "dt_entrada");
$tdataRel_Chamada_Detalhada[".orderindexes"][] = array(7, (1 ? "ASC" : "DESC"), "hr_entrada");

$tdataRel_Chamada_Detalhada[".sqlHead"] = "SELECT Fila,  Telefone,  `Entrada/Saida`,  Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  tptotal,  `Obs.`";

$tdataRel_Chamada_Detalhada[".sqlFrom"] = "FROM v_rel_detalhado_chamadas";

$tdataRel_Chamada_Detalhada[".sqlWhereExpr"] = "";

$tdataRel_Chamada_Detalhada[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel_Chamada_Detalhada[".Keys"]=$tableKeys;

	
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
				$fdata["LookupTable"]="v_rel_detalhado_chamadas";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["Fila"]=$fdata;
	
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
			$fdata["EditParams"].= " maxlength=40";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["Telefone"]=$fdata;
	
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
						$tdataRel_Chamada_Detalhada["Entrada/Saida"]=$fdata;
	
//	Terminado
	$fdata = array();
	$fdata["strName"] = "Terminado";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Terminado";
		$fdata["FullName"]= "Terminado";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["Terminado"]=$fdata;
	
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
				$fdata["LookupTable"]="v_rel_detalhado_chamadas";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["Agente"]=$fdata;
	
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
						$fdata["Index"]= 6;
	 $fdata["DateEditType"]=11; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["dt_entrada"]=$fdata;
	
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
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel_Chamada_Detalhada["hr_entrada"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Espera"; 
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
	$tdataRel_Chamada_Detalhada["tp_espera"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Atendimento"; 
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
	$tdataRel_Chamada_Detalhada["tp_atendimento"]=$fdata;
	
//	tptotal
	$fdata = array();
	$fdata["strName"] = "tptotal";
	$fdata["ownerTable"] = "v_rel_detalhado_chamadas";
		$fdata["Label"]="Total"; 
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
	$tdataRel_Chamada_Detalhada["tptotal"]=$fdata;
	
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
			$fdata["EditParams"].= " maxlength=49";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel_Chamada_Detalhada["Obs."]=$fdata;

	
$tables_data["Rel. Cham Detalhada"]=&$tdataRel_Chamada_Detalhada;
$field_labels["Rel__Cham_Detalhada"] = &$fieldLabelsRel_Chamada_Detalhada;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Cham Detalhada"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Cham Detalhada"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto929=array();
$proto929["m_strHead"] = "SELECT";
$proto929["m_strFieldList"] = "Fila,  Telefone,  `Entrada/Saida`,  Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  tptotal,  `Obs.`";
$proto929["m_strFrom"] = "FROM v_rel_detalhado_chamadas";
$proto929["m_strWhere"] = "";
$proto929["m_strOrderBy"] = "ORDER BY dt_entrada, hr_entrada";
$proto929["m_strTail"] = "";
$proto930=array();
$proto930["m_sql"] = "";
$proto930["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto930["m_column"]=$obj;
$proto930["m_contained"] = array();
$proto930["m_strCase"] = "";
$proto930["m_havingmode"] = "0";
$proto930["m_inBrackets"] = "0";
$proto930["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto930);

$proto929["m_where"] = $obj;
$proto932=array();
$proto932["m_sql"] = "";
$proto932["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto932["m_column"]=$obj;
$proto932["m_contained"] = array();
$proto932["m_strCase"] = "";
$proto932["m_havingmode"] = "0";
$proto932["m_inBrackets"] = "0";
$proto932["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto932);

$proto929["m_having"] = $obj;
$proto929["m_fieldlist"] = array();
						$proto934=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto934["m_expr"]=$obj;
$proto934["m_alias"] = "";
$obj = new SQLFieldListItem($proto934);

$proto929["m_fieldlist"][]=$obj;
						$proto936=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto936["m_expr"]=$obj;
$proto936["m_alias"] = "";
$obj = new SQLFieldListItem($proto936);

$proto929["m_fieldlist"][]=$obj;
						$proto938=array();
			$obj = new SQLField(array(
	"m_strName" => "Entrada/Saida",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto938["m_expr"]=$obj;
$proto938["m_alias"] = "";
$obj = new SQLFieldListItem($proto938);

$proto929["m_fieldlist"][]=$obj;
						$proto940=array();
			$obj = new SQLField(array(
	"m_strName" => "Terminado",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto940["m_expr"]=$obj;
$proto940["m_alias"] = "";
$obj = new SQLFieldListItem($proto940);

$proto929["m_fieldlist"][]=$obj;
						$proto942=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto942["m_expr"]=$obj;
$proto942["m_alias"] = "";
$obj = new SQLFieldListItem($proto942);

$proto929["m_fieldlist"][]=$obj;
						$proto944=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto944["m_expr"]=$obj;
$proto944["m_alias"] = "";
$obj = new SQLFieldListItem($proto944);

$proto929["m_fieldlist"][]=$obj;
						$proto946=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto946["m_expr"]=$obj;
$proto946["m_alias"] = "";
$obj = new SQLFieldListItem($proto946);

$proto929["m_fieldlist"][]=$obj;
						$proto948=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto948["m_expr"]=$obj;
$proto948["m_alias"] = "";
$obj = new SQLFieldListItem($proto948);

$proto929["m_fieldlist"][]=$obj;
						$proto950=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto950["m_expr"]=$obj;
$proto950["m_alias"] = "";
$obj = new SQLFieldListItem($proto950);

$proto929["m_fieldlist"][]=$obj;
						$proto952=array();
			$obj = new SQLField(array(
	"m_strName" => "tptotal",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto952["m_expr"]=$obj;
$proto952["m_alias"] = "";
$obj = new SQLFieldListItem($proto952);

$proto929["m_fieldlist"][]=$obj;
						$proto954=array();
			$obj = new SQLField(array(
	"m_strName" => "Obs.",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto954["m_expr"]=$obj;
$proto954["m_alias"] = "";
$obj = new SQLFieldListItem($proto954);

$proto929["m_fieldlist"][]=$obj;
$proto929["m_fromlist"] = array();
												$proto956=array();
$proto956["m_link"] = "SQLL_MAIN";
			$proto957=array();
$proto957["m_strName"] = "v_rel_detalhado_chamadas";
$proto957["m_columns"] = array();
$proto957["m_columns"][] = "Fila";
$proto957["m_columns"][] = "Telefone";
$proto957["m_columns"][] = "Entrada/Saida";
$proto957["m_columns"][] = "Terminado";
$proto957["m_columns"][] = "Agente";
$proto957["m_columns"][] = "dt_entrada";
$proto957["m_columns"][] = "hr_entrada";
$proto957["m_columns"][] = "tp_espera";
$proto957["m_columns"][] = "tp_atendimento";
$proto957["m_columns"][] = "tptotal";
$proto957["m_columns"][] = "Obs.";
$obj = new SQLTable($proto957);

$proto956["m_table"] = $obj;
$proto956["m_alias"] = "";
$proto958=array();
$proto958["m_sql"] = "";
$proto958["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto958["m_column"]=$obj;
$proto958["m_contained"] = array();
$proto958["m_strCase"] = "";
$proto958["m_havingmode"] = "0";
$proto958["m_inBrackets"] = "0";
$proto958["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto958);

$proto956["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto956);

$proto929["m_fromlist"][]=$obj;
$proto929["m_groupby"] = array();
$proto929["m_orderby"] = array();
												$proto960=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto960["m_column"]=$obj;
$proto960["m_bAsc"] = 1;
$proto960["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto960);

$proto929["m_orderby"][]=$obj;					
												$proto962=array();
						$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "v_rel_detalhado_chamadas"
));

$proto962["m_column"]=$obj;
$proto962["m_bAsc"] = 1;
$proto962["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto962);

$proto929["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto929);

$queryData_Rel_Chamada_Detalhada = $obj;
$tdataRel_Chamada_Detalhada[".sqlquery"] = $queryData_Rel_Chamada_Detalhada;



?>
