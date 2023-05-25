<?php

//	field labels
$fieldLabelsRel__Produt_Agentes_Dia = array();
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["dt_entrada"] = "Dia Entrada";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["fila"] = "Fila";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["agente"] = "Agente";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["tot_logado"] = "Total Disponível";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["qtd_atend"] = "Atendidas";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["tot_atend"] = "Total Atendendo";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["med_atend"] = "Média Atendimento";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["tot_pausa"] = "Total em Pausa";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["tot_parado"] = "Total Parado";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["qtd_nao_atend"] = "Rejeitadas/N Atendidas";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["tot_recebida"] = "Recebida";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["cntrb_indiv"] = "Contribuição Individual";
$fieldLabelsRel__Produt_Agentes_Dia["Portuguese(Brazil)"]["cntrb_tot"] = "Contribuição Total";


$tdataRel__Produt_Agentes_Dia=array();
	$tdataRel__Produt_Agentes_Dia[".NumberOfChars"]=80; 
	$tdataRel__Produt_Agentes_Dia[".ShortName"]="Rel__Produt_Agentes_Dia";
	$tdataRel__Produt_Agentes_Dia[".OwnerID"]="";
	$tdataRel__Produt_Agentes_Dia[".OriginalTable"]="v_rel_prod_agentes_dia";
	$tdataRel__Produt_Agentes_Dia[".NCSearch"]=true;
	

$tdataRel__Produt_Agentes_Dia[".shortTableName"] = "Rel__Produt_Agentes_Dia";
$tdataRel__Produt_Agentes_Dia[".dataSourceTable"] = "Rel. Produt. Agentes Dia";
$tdataRel__Produt_Agentes_Dia[".nSecOptions"] = 0;
$tdataRel__Produt_Agentes_Dia[".nLoginMethod"] = 1;
$tdataRel__Produt_Agentes_Dia[".recsPerRowList"] = 1;	
$tdataRel__Produt_Agentes_Dia[".tableGroupBy"] = "0";
$tdataRel__Produt_Agentes_Dia[".dbType"] = 0;
$tdataRel__Produt_Agentes_Dia[".mainTableOwnerID"] = "";
$tdataRel__Produt_Agentes_Dia[".moveNext"] = 1;

$tdataRel__Produt_Agentes_Dia[".listAjax"] = false;

	$tdataRel__Produt_Agentes_Dia[".audit"] = false;

	$tdataRel__Produt_Agentes_Dia[".locking"] = false;
	
$tdataRel__Produt_Agentes_Dia[".listIcons"] = true;

$tdataRel__Produt_Agentes_Dia[".exportTo"] = true;

$tdataRel__Produt_Agentes_Dia[".printFriendly"] = true;


$tdataRel__Produt_Agentes_Dia[".showSimpleSearchOptions"] = false;

$tdataRel__Produt_Agentes_Dia[".showSearchPanel"] = true;


$tdataRel__Produt_Agentes_Dia[".isUseAjaxSuggest"] = true;


$tdataRel__Produt_Agentes_Dia[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Produt_Agentes_Dia[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Produt_Agentes_Dia[".isUseTimeForSearch"] = false;





$tdataRel__Produt_Agentes_Dia[".isUseInlineJs"] = $tdataRel__Produt_Agentes_Dia[".isUseInlineAdd"] || $tdataRel__Produt_Agentes_Dia[".isUseInlineEdit"];

$tdataRel__Produt_Agentes_Dia[".allSearchFields"] = array();

$tdataRel__Produt_Agentes_Dia[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel__Produt_Agentes_Dia[".allSearchFields"]))
{
	$tdataRel__Produt_Agentes_Dia[".allSearchFields"][] = "dt_entrada";	
}
$tdataRel__Produt_Agentes_Dia[".globSearchFields"][] = "fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("fila", $tdataRel__Produt_Agentes_Dia[".allSearchFields"]))
{
	$tdataRel__Produt_Agentes_Dia[".allSearchFields"][] = "fila";	
}
$tdataRel__Produt_Agentes_Dia[".globSearchFields"][] = "agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("agente", $tdataRel__Produt_Agentes_Dia[".allSearchFields"]))
{
	$tdataRel__Produt_Agentes_Dia[".allSearchFields"][] = "agente";	
}


$tdataRel__Produt_Agentes_Dia[".isDynamicPerm"] = true;

	

$tdataRel__Produt_Agentes_Dia[".isDisplayLoading"] = true;

$tdataRel__Produt_Agentes_Dia[".isResizeColumns"] = false;


$tdataRel__Produt_Agentes_Dia[".createLoginPage"] = true;


 	

$tdataRel__Produt_Agentes_Dia[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY fila, agente, dt_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Produt_Agentes_Dia[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Produt_Agentes_Dia[".orderindexes"] = array();
$tdataRel__Produt_Agentes_Dia[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "fila");
$tdataRel__Produt_Agentes_Dia[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "agente");
$tdataRel__Produt_Agentes_Dia[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");

$tdataRel__Produt_Agentes_Dia[".sqlHead"] = "SELECT dt_entrada,  fila,  agente,  tot_logado,  qtd_atend,  tot_atend,  med_atend,  tot_pausa,  tot_parado,  qtd_nao_atend,  tot_recebida,  cntrb_indiv,  cntrb_tot";

$tdataRel__Produt_Agentes_Dia[".sqlFrom"] = "FROM v_rel_prod_agentes_dia";

$tdataRel__Produt_Agentes_Dia[".sqlWhereExpr"] = "(agente is not null)";

$tdataRel__Produt_Agentes_Dia[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Produt_Agentes_Dia[".Keys"]=$tableKeys;

	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Dia Entrada"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=11; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["dt_entrada"]=$fdata;
	
//	fila
	$fdata = array();
	$fdata["strName"] = "fila";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Fila"; 
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
	
	$fdata["GoodName"]= "fila";
		$fdata["FullName"]= "fila";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["fila"]=$fdata;
	
//	agente
	$fdata = array();
	$fdata["strName"] = "agente";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Agente"; 
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
	
	$fdata["GoodName"]= "agente";
		$fdata["FullName"]= "agente";
						$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["agente"]=$fdata;
	
//	tot_logado
	$fdata = array();
	$fdata["strName"] = "tot_logado";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Total Disponível"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_logado";
		$fdata["FullName"]= "tot_logado";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt_Agentes_Dia["tot_logado"]=$fdata;
	
//	qtd_atend
	$fdata = array();
	$fdata["strName"] = "qtd_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Atendidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "qtd_atend";
		$fdata["FullName"]= "qtd_atend";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["qtd_atend"]=$fdata;
	
//	tot_atend
	$fdata = array();
	$fdata["strName"] = "tot_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Total Atendendo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_atend";
		$fdata["FullName"]= "tot_atend";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt_Agentes_Dia["tot_atend"]=$fdata;
	
//	med_atend
	$fdata = array();
	$fdata["strName"] = "med_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Média Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "med_atend";
		$fdata["FullName"]= "med_atend";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt_Agentes_Dia["med_atend"]=$fdata;
	
//	tot_pausa
	$fdata = array();
	$fdata["strName"] = "tot_pausa";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Total em Pausa"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_pausa";
		$fdata["FullName"]= "tot_pausa";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt_Agentes_Dia["tot_pausa"]=$fdata;
	
//	tot_parado
	$fdata = array();
	$fdata["strName"] = "tot_parado";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Total Parado"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_parado";
		$fdata["FullName"]= "tot_parado";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt_Agentes_Dia["tot_parado"]=$fdata;
	
//	qtd_nao_atend
	$fdata = array();
	$fdata["strName"] = "qtd_nao_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Rejeitadas/N Atendidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "qtd_nao_atend";
		$fdata["FullName"]= "qtd_nao_atend";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["qtd_nao_atend"]=$fdata;
	
//	tot_recebida
	$fdata = array();
	$fdata["strName"] = "tot_recebida";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Recebida"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "tot_recebida";
		$fdata["FullName"]= "tot_recebida";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["tot_recebida"]=$fdata;
	
//	cntrb_indiv
	$fdata = array();
	$fdata["strName"] = "cntrb_indiv";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Contribuição Individual"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_indiv";
		$fdata["FullName"]= "cntrb_indiv";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["cntrb_indiv"]=$fdata;
	
//	cntrb_tot
	$fdata = array();
	$fdata["strName"] = "cntrb_tot";
	$fdata["ownerTable"] = "v_rel_prod_agentes_dia";
		$fdata["Label"]="Contribuição Total"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_tot";
		$fdata["FullName"]= "cntrb_tot";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt_Agentes_Dia["cntrb_tot"]=$fdata;

	
$tables_data["Rel. Produt. Agentes Dia"]=&$tdataRel__Produt_Agentes_Dia;
$field_labels["Rel__Produt__Agentes_Dia"] = &$fieldLabelsRel__Produt_Agentes_Dia;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Produt. Agentes Dia"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Produt. Agentes Dia"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto480=array();
$proto480["m_strHead"] = "SELECT";
$proto480["m_strFieldList"] = "dt_entrada,  fila,  agente,  tot_logado,  qtd_atend,  tot_atend,  med_atend,  tot_pausa,  tot_parado,  qtd_nao_atend,  tot_recebida,  cntrb_indiv,  cntrb_tot";
$proto480["m_strFrom"] = "FROM v_rel_prod_agentes_dia";
$proto480["m_strWhere"] = "(agente is not null)";
$proto480["m_strOrderBy"] = "ORDER BY fila, agente, dt_entrada";
$proto480["m_strTail"] = "";
$proto481=array();
$proto481["m_sql"] = "agente is not null";
$proto481["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto481["m_column"]=$obj;
$proto481["m_contained"] = array();
$proto481["m_strCase"] = "is not null";
$proto481["m_havingmode"] = "0";
$proto481["m_inBrackets"] = "0";
$proto481["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto481);

$proto480["m_where"] = $obj;
$proto483=array();
$proto483["m_sql"] = "";
$proto483["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto483["m_column"]=$obj;
$proto483["m_contained"] = array();
$proto483["m_strCase"] = "";
$proto483["m_havingmode"] = "0";
$proto483["m_inBrackets"] = "0";
$proto483["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto483);

$proto480["m_having"] = $obj;
$proto480["m_fieldlist"] = array();
						$proto485=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto485["m_expr"]=$obj;
$proto485["m_alias"] = "";
$obj = new SQLFieldListItem($proto485);

$proto480["m_fieldlist"][]=$obj;
						$proto487=array();
			$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto487["m_expr"]=$obj;
$proto487["m_alias"] = "";
$obj = new SQLFieldListItem($proto487);

$proto480["m_fieldlist"][]=$obj;
						$proto489=array();
			$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto489["m_expr"]=$obj;
$proto489["m_alias"] = "";
$obj = new SQLFieldListItem($proto489);

$proto480["m_fieldlist"][]=$obj;
						$proto491=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_logado",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto491["m_expr"]=$obj;
$proto491["m_alias"] = "";
$obj = new SQLFieldListItem($proto491);

$proto480["m_fieldlist"][]=$obj;
						$proto493=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_atend",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto493["m_expr"]=$obj;
$proto493["m_alias"] = "";
$obj = new SQLFieldListItem($proto493);

$proto480["m_fieldlist"][]=$obj;
						$proto495=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_atend",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto495["m_expr"]=$obj;
$proto495["m_alias"] = "";
$obj = new SQLFieldListItem($proto495);

$proto480["m_fieldlist"][]=$obj;
						$proto497=array();
			$obj = new SQLField(array(
	"m_strName" => "med_atend",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto497["m_expr"]=$obj;
$proto497["m_alias"] = "";
$obj = new SQLFieldListItem($proto497);

$proto480["m_fieldlist"][]=$obj;
						$proto499=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_pausa",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto499["m_expr"]=$obj;
$proto499["m_alias"] = "";
$obj = new SQLFieldListItem($proto499);

$proto480["m_fieldlist"][]=$obj;
						$proto501=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_parado",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto501["m_expr"]=$obj;
$proto501["m_alias"] = "";
$obj = new SQLFieldListItem($proto501);

$proto480["m_fieldlist"][]=$obj;
						$proto503=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_nao_atend",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto503["m_expr"]=$obj;
$proto503["m_alias"] = "";
$obj = new SQLFieldListItem($proto503);

$proto480["m_fieldlist"][]=$obj;
						$proto505=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_recebida",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto505["m_expr"]=$obj;
$proto505["m_alias"] = "";
$obj = new SQLFieldListItem($proto505);

$proto480["m_fieldlist"][]=$obj;
						$proto507=array();
			$obj = new SQLField(array(
	"m_strName" => "cntrb_indiv",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto507["m_expr"]=$obj;
$proto507["m_alias"] = "";
$obj = new SQLFieldListItem($proto507);

$proto480["m_fieldlist"][]=$obj;
						$proto509=array();
			$obj = new SQLField(array(
	"m_strName" => "cntrb_tot",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto509["m_expr"]=$obj;
$proto509["m_alias"] = "";
$obj = new SQLFieldListItem($proto509);

$proto480["m_fieldlist"][]=$obj;
$proto480["m_fromlist"] = array();
												$proto511=array();
$proto511["m_link"] = "SQLL_MAIN";
			$proto512=array();
$proto512["m_strName"] = "v_rel_prod_agentes_dia";
$proto512["m_columns"] = array();
$proto512["m_columns"][] = "dt_entrada";
$proto512["m_columns"][] = "fila";
$proto512["m_columns"][] = "agente";
$proto512["m_columns"][] = "tot_logado";
$proto512["m_columns"][] = "qtd_atend";
$proto512["m_columns"][] = "tot_atend";
$proto512["m_columns"][] = "med_atend";
$proto512["m_columns"][] = "tot_pausa";
$proto512["m_columns"][] = "tot_parado";
$proto512["m_columns"][] = "qtd_nao_atend";
$proto512["m_columns"][] = "tot_recebida";
$proto512["m_columns"][] = "cntrb_indiv";
$proto512["m_columns"][] = "cntrb_tot";
$obj = new SQLTable($proto512);

$proto511["m_table"] = $obj;
$proto511["m_alias"] = "";
$proto513=array();
$proto513["m_sql"] = "";
$proto513["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto513["m_column"]=$obj;
$proto513["m_contained"] = array();
$proto513["m_strCase"] = "";
$proto513["m_havingmode"] = "0";
$proto513["m_inBrackets"] = "0";
$proto513["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto513);

$proto511["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto511);

$proto480["m_fromlist"][]=$obj;
$proto480["m_groupby"] = array();
$proto480["m_orderby"] = array();
												$proto515=array();
						$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto515["m_column"]=$obj;
$proto515["m_bAsc"] = 1;
$proto515["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto515);

$proto480["m_orderby"][]=$obj;					
												$proto517=array();
						$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto517["m_column"]=$obj;
$proto517["m_bAsc"] = 1;
$proto517["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto517);

$proto480["m_orderby"][]=$obj;					
												$proto519=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_rel_prod_agentes_dia"
));

$proto519["m_column"]=$obj;
$proto519["m_bAsc"] = 1;
$proto519["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto519);

$proto480["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto480);

$queryData_Rel__Produt_Agentes_Dia = $obj;
$tdataRel__Produt_Agentes_Dia[".sqlquery"] = $queryData_Rel__Produt_Agentes_Dia;



?>
