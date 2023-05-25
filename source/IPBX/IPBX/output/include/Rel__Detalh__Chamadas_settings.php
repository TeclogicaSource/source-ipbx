<?php

//	field labels
$fieldLabelsRel__Detalh__Chamadas = array();
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["dt_entrada"] = "Data ";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["hr_entrada"] = "Entrada";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Agente"] = "Agente";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["tp_espera"] = "Espera";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["tp_atendimento"] = "Atendimento";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["tptotal"] = "Total";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Entrada_Saida"] = "Entrada/Saida";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Terminado"] = "Terminado";
$fieldLabelsRel__Detalh__Chamadas["Portuguese(Brazil)"]["Obs_"] = "Obs.";


$tdataRel__Detalh__Chamadas=array();
	$tdataRel__Detalh__Chamadas[".NumberOfChars"]=80; 
	$tdataRel__Detalh__Chamadas[".ShortName"]="Rel__Detalh__Chamadas";
	$tdataRel__Detalh__Chamadas[".OwnerID"]="";
	$tdataRel__Detalh__Chamadas[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataRel__Detalh__Chamadas[".NCSearch"]=true;
	

$tdataRel__Detalh__Chamadas[".shortTableName"] = "Rel__Detalh__Chamadas";
$tdataRel__Detalh__Chamadas[".dataSourceTable"] = "Rel. Detalh. Chamadas";
$tdataRel__Detalh__Chamadas[".nSecOptions"] = 0;
$tdataRel__Detalh__Chamadas[".nLoginMethod"] = 1;
$tdataRel__Detalh__Chamadas[".recsPerRowList"] = 1;	
$tdataRel__Detalh__Chamadas[".tableGroupBy"] = "0";
$tdataRel__Detalh__Chamadas[".dbType"] = 0;
$tdataRel__Detalh__Chamadas[".mainTableOwnerID"] = "";
$tdataRel__Detalh__Chamadas[".moveNext"] = 1;

$tdataRel__Detalh__Chamadas[".listAjax"] = false;

	$tdataRel__Detalh__Chamadas[".audit"] = false;

	$tdataRel__Detalh__Chamadas[".locking"] = false;
	
$tdataRel__Detalh__Chamadas[".listIcons"] = true;

$tdataRel__Detalh__Chamadas[".exportTo"] = true;

$tdataRel__Detalh__Chamadas[".printFriendly"] = true;


$tdataRel__Detalh__Chamadas[".showSimpleSearchOptions"] = false;

$tdataRel__Detalh__Chamadas[".showSearchPanel"] = true;


$tdataRel__Detalh__Chamadas[".isUseAjaxSuggest"] = true;


$tdataRel__Detalh__Chamadas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataRel__Detalh__Chamadas[".arrKeyFields"][] = "dt_entrada";
$tdataRel__Detalh__Chamadas[".arrKeyFields"][] = "hr_entrada";

// use datepicker for search panel
$tdataRel__Detalh__Chamadas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Detalh__Chamadas[".isUseTimeForSearch"] = false;





$tdataRel__Detalh__Chamadas[".isUseInlineJs"] = $tdataRel__Detalh__Chamadas[".isUseInlineAdd"] || $tdataRel__Detalh__Chamadas[".isUseInlineEdit"];

$tdataRel__Detalh__Chamadas[".allSearchFields"] = array();

$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "Fila";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "Telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Telefone", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "Telefone";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "Agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agente", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "Agente";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "dt_entrada";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "hr_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hr_entrada", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "hr_entrada";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "tp_espera";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tp_espera", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "tp_espera";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "tp_atendimento";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tp_atendimento", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "tp_atendimento";	
}
$tdataRel__Detalh__Chamadas[".globSearchFields"][] = "tptotal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tptotal", $tdataRel__Detalh__Chamadas[".allSearchFields"]))
{
	$tdataRel__Detalh__Chamadas[".allSearchFields"][] = "tptotal";	
}


$tdataRel__Detalh__Chamadas[".isDynamicPerm"] = true;

	

$tdataRel__Detalh__Chamadas[".isDisplayLoading"] = true;

$tdataRel__Detalh__Chamadas[".isResizeColumns"] = false;


$tdataRel__Detalh__Chamadas[".createLoginPage"] = true;


 	

$tdataRel__Detalh__Chamadas[".noRecordsFirstPage"] = true;




$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Detalh__Chamadas[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Detalh__Chamadas[".orderindexes"] = array();

$tdataRel__Detalh__Chamadas[".sqlHead"] = "select Fila,  Telefone,  (case when ps_abandono is NULL then ps_entrada   else concat(ps_entrada,',',ps_abandono)   end) AS `Entrada/Saida`,  case when dsl_motiv is NULL then \" \"  when dsl_motiv = \"COMPLETECALLER\" then \"ORIGEM\"  when dsl_motiv = \"COMPLETEAGENT\" then \"AGENTE\"  else dsl_motiv  end AS Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  sec_to_time(time_to_sec(tp_espera)+time_to_sec(tp_atendimento)) AS tptotal,  case   when tp_atendimento is NULL then \"Abandono\"  when tel_trans is NULL then \" \"  else concat(\"Transf. \", tel_trans, \" \" ,(select substr(callerid,1,10) from ipbx_ramais where name = tel_trans)) end AS `Obs.`";

$tdataRel__Detalh__Chamadas[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdataRel__Detalh__Chamadas[".sqlWhereExpr"] = "";

$tdataRel__Detalh__Chamadas[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="dt_entrada";
	$tableKeys[]="hr_entrada";
	$tdataRel__Detalh__Chamadas[".Keys"]=$tableKeys;

	
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
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Detalh__Chamadas["Fila"]=$fdata;
	
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
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Detalh__Chamadas["Telefone"]=$fdata;
	
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
		$fdata["FullName"]= "(case when ps_abandono is NULL then ps_entrada   else concat(ps_entrada,',',ps_abandono)   end)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Detalh__Chamadas["Entrada/Saida"]=$fdata;
	
//	Terminado
	$fdata = array();
	$fdata["strName"] = "Terminado";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Terminado";
		$fdata["FullName"]= "case when dsl_motiv is NULL then \" \"  when dsl_motiv = \"COMPLETECALLER\" then \"ORIGEM\"  when dsl_motiv = \"COMPLETEAGENT\" then \"AGENTE\"  else dsl_motiv  end";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Detalh__Chamadas["Terminado"]=$fdata;
	
//	Agente
	$fdata = array();
	$fdata["strName"] = "Agente";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Detalh__Chamadas["Agente"]=$fdata;
	
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
		$fdata["FullName"]= "dt_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Detalh__Chamadas["dt_entrada"]=$fdata;
	
//	hr_entrada
	$fdata = array();
	$fdata["strName"] = "hr_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Entrada"; 
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
	$tdataRel__Detalh__Chamadas["hr_entrada"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
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
	$tdataRel__Detalh__Chamadas["tp_espera"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
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
	$tdataRel__Detalh__Chamadas["tp_atendimento"]=$fdata;
	
//	tptotal
	$fdata = array();
	$fdata["strName"] = "tptotal";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tptotal";
		$fdata["FullName"]= "sec_to_time(time_to_sec(tp_espera)+time_to_sec(tp_atendimento))";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Detalh__Chamadas["tptotal"]=$fdata;
	
//	Obs.
	$fdata = array();
	$fdata["strName"] = "Obs.";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Obs_";
		$fdata["FullName"]= "case   when tp_atendimento is NULL then \"Abandono\"  when tel_trans is NULL then \" \"  else concat(\"Transf. \", tel_trans, \" \" ,(select substr(callerid,1,10) from ipbx_ramais where name = tel_trans)) end";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Detalh__Chamadas["Obs."]=$fdata;

	
$tables_data["Rel. Detalh. Chamadas"]=&$tdataRel__Detalh__Chamadas;
$field_labels["Rel__Detalh__Chamadas"] = &$fieldLabelsRel__Detalh__Chamadas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Detalh. Chamadas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Detalh. Chamadas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto506=array();
$proto506["m_strHead"] = "select";
$proto506["m_strFieldList"] = "Fila,  Telefone,  (case when ps_abandono is NULL then ps_entrada   else concat(ps_entrada,',',ps_abandono)   end) AS `Entrada/Saida`,  case when dsl_motiv is NULL then \" \"  when dsl_motiv = \"COMPLETECALLER\" then \"ORIGEM\"  when dsl_motiv = \"COMPLETEAGENT\" then \"AGENTE\"  else dsl_motiv  end AS Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  sec_to_time(time_to_sec(tp_espera)+time_to_sec(tp_atendimento)) AS tptotal,  case   when tp_atendimento is NULL then \"Abandono\"  when tel_trans is NULL then \" \"  else concat(\"Transf. \", tel_trans, \" \" ,(select substr(callerid,1,10) from ipbx_ramais where name = tel_trans)) end AS `Obs.`";
$proto506["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto506["m_strWhere"] = "";
$proto506["m_strOrderBy"] = "";
$proto506["m_strTail"] = "";
$proto507=array();
$proto507["m_sql"] = "";
$proto507["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto507["m_column"]=$obj;
$proto507["m_contained"] = array();
$proto507["m_strCase"] = "";
$proto507["m_havingmode"] = "0";
$proto507["m_inBrackets"] = "0";
$proto507["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto507);

$proto506["m_where"] = $obj;
$proto509=array();
$proto509["m_sql"] = "";
$proto509["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto509["m_column"]=$obj;
$proto509["m_contained"] = array();
$proto509["m_strCase"] = "";
$proto509["m_havingmode"] = "0";
$proto509["m_inBrackets"] = "0";
$proto509["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto509);

$proto506["m_having"] = $obj;
$proto506["m_fieldlist"] = array();
						$proto511=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto511["m_expr"]=$obj;
$proto511["m_alias"] = "";
$obj = new SQLFieldListItem($proto511);

$proto506["m_fieldlist"][]=$obj;
						$proto513=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto513["m_expr"]=$obj;
$proto513["m_alias"] = "";
$obj = new SQLFieldListItem($proto513);

$proto506["m_fieldlist"][]=$obj;
						$proto515=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(case when ps_abandono is NULL then ps_entrada   else concat(ps_entrada,',',ps_abandono)   end)"
));

$proto515["m_expr"]=$obj;
$proto515["m_alias"] = "Entrada/Saida";
$obj = new SQLFieldListItem($proto515);

$proto506["m_fieldlist"][]=$obj;
						$proto517=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case when dsl_motiv is NULL then \" \"  when dsl_motiv = \"COMPLETECALLER\" then \"ORIGEM\"  when dsl_motiv = \"COMPLETEAGENT\" then \"AGENTE\"  else dsl_motiv  end"
));

$proto517["m_expr"]=$obj;
$proto517["m_alias"] = "Terminado";
$obj = new SQLFieldListItem($proto517);

$proto506["m_fieldlist"][]=$obj;
						$proto519=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto519["m_expr"]=$obj;
$proto519["m_alias"] = "";
$obj = new SQLFieldListItem($proto519);

$proto506["m_fieldlist"][]=$obj;
						$proto521=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto521["m_expr"]=$obj;
$proto521["m_alias"] = "";
$obj = new SQLFieldListItem($proto521);

$proto506["m_fieldlist"][]=$obj;
						$proto523=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto523["m_expr"]=$obj;
$proto523["m_alias"] = "";
$obj = new SQLFieldListItem($proto523);

$proto506["m_fieldlist"][]=$obj;
						$proto525=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto525["m_expr"]=$obj;
$proto525["m_alias"] = "";
$obj = new SQLFieldListItem($proto525);

$proto506["m_fieldlist"][]=$obj;
						$proto527=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto527["m_expr"]=$obj;
$proto527["m_alias"] = "";
$obj = new SQLFieldListItem($proto527);

$proto506["m_fieldlist"][]=$obj;
						$proto529=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(time_to_sec(tp_espera)+time_to_sec(tp_atendimento))"
));

$proto529["m_expr"]=$obj;
$proto529["m_alias"] = "tptotal";
$obj = new SQLFieldListItem($proto529);

$proto506["m_fieldlist"][]=$obj;
						$proto531=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case   when tp_atendimento is NULL then \"Abandono\"  when tel_trans is NULL then \" \"  else concat(\"Transf. \", tel_trans, \" \" ,(select substr(callerid,1,10) from ipbx_ramais where name = tel_trans)) end"
));

$proto531["m_expr"]=$obj;
$proto531["m_alias"] = "Obs.";
$obj = new SQLFieldListItem($proto531);

$proto506["m_fieldlist"][]=$obj;
$proto506["m_fromlist"] = array();
												$proto533=array();
$proto533["m_link"] = "SQLL_MAIN";
			$proto534=array();
$proto534["m_strName"] = "cc_receptivo_filas_atend";
$proto534["m_columns"] = array();
$proto534["m_columns"][] = "chave";
$proto534["m_columns"][] = "dt_entrada";
$proto534["m_columns"][] = "hr_entrada";
$proto534["m_columns"][] = "Fila";
$proto534["m_columns"][] = "Agente";
$proto534["m_columns"][] = "hr_atendimento";
$proto534["m_columns"][] = "hr_abandono";
$proto534["m_columns"][] = "tp_espera";
$proto534["m_columns"][] = "tp_atendimento";
$proto534["m_columns"][] = "Telefone";
$proto534["m_columns"][] = "ps_entrada";
$proto534["m_columns"][] = "ps_abandono";
$proto534["m_columns"][] = "tel_trans";
$proto534["m_columns"][] = "dsl_motiv";
$obj = new SQLTable($proto534);

$proto533["m_table"] = $obj;
$proto533["m_alias"] = "";
$proto535=array();
$proto535["m_sql"] = "";
$proto535["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto535["m_column"]=$obj;
$proto535["m_contained"] = array();
$proto535["m_strCase"] = "";
$proto535["m_havingmode"] = "0";
$proto535["m_inBrackets"] = "0";
$proto535["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto535);

$proto533["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto533);

$proto506["m_fromlist"][]=$obj;
$proto506["m_groupby"] = array();
$proto506["m_orderby"] = array();
$obj = new SQLQuery($proto506);

$queryData_Rel__Detalh__Chamadas = $obj;
$tdataRel__Detalh__Chamadas[".sqlquery"] = $queryData_Rel__Detalh__Chamadas;



?>
