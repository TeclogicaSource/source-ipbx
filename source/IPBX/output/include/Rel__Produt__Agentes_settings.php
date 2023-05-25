<?php

//	field labels
$fieldLabelsRel__Produt__Agentes = array();
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["fila"] = "Fila";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_logado"] = "Total Disponível";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["qtd_atend"] = "Atendidas";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_atend"] = "Total Atendimento";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["med_atend"] = "Média Atendimento";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_pausa"] = "Total Pausa";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["qtd_nao_atend"] = "Rejeitadas/N Atendidas";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_recebida"] = "Recebidas";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["cntrb_indiv"] = "Contribuição Individual";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["cntrb_tot"] = "Cntrb Tot";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_parado"] = "Total Livre";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["Mes"] = "Mes";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_pausa_n_produtiva"] = "Total Pausa não Produt.";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["tot_pausa_produtiva"] = "Total Pausa Produt.";
$fieldLabelsRel__Produt__Agentes["Portuguese(Brazil)"]["Agente"] = "Agente";


$tdataRel__Produt__Agentes=array();
	$tdataRel__Produt__Agentes[".NumberOfChars"]=80; 
	$tdataRel__Produt__Agentes[".ShortName"]="Rel__Produt__Agentes";
	$tdataRel__Produt__Agentes[".OwnerID"]="";
	$tdataRel__Produt__Agentes[".OriginalTable"]="v_rel_produt_agente_dia";
	$tdataRel__Produt__Agentes[".NCSearch"]=true;
	

$tdataRel__Produt__Agentes[".shortTableName"] = "Rel__Produt__Agentes";
$tdataRel__Produt__Agentes[".dataSourceTable"] = "Rel. Produt. Agentes";
$tdataRel__Produt__Agentes[".nSecOptions"] = 0;
$tdataRel__Produt__Agentes[".nLoginMethod"] = 1;
$tdataRel__Produt__Agentes[".recsPerRowList"] = 1;	
$tdataRel__Produt__Agentes[".tableGroupBy"] = "1";
$tdataRel__Produt__Agentes[".dbType"] = 0;
$tdataRel__Produt__Agentes[".mainTableOwnerID"] = "";
$tdataRel__Produt__Agentes[".moveNext"] = 1;

$tdataRel__Produt__Agentes[".listAjax"] = false;

	$tdataRel__Produt__Agentes[".audit"] = false;

	$tdataRel__Produt__Agentes[".locking"] = false;
	
$tdataRel__Produt__Agentes[".listIcons"] = true;

$tdataRel__Produt__Agentes[".exportTo"] = true;

$tdataRel__Produt__Agentes[".printFriendly"] = true;


$tdataRel__Produt__Agentes[".showSimpleSearchOptions"] = false;

$tdataRel__Produt__Agentes[".showSearchPanel"] = true;


$tdataRel__Produt__Agentes[".isUseAjaxSuggest"] = true;


$tdataRel__Produt__Agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Produt__Agentes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRel__Produt__Agentes[".isUseTimeForSearch"] = false;





$tdataRel__Produt__Agentes[".isUseInlineJs"] = $tdataRel__Produt__Agentes[".isUseInlineAdd"] || $tdataRel__Produt__Agentes[".isUseInlineEdit"];

$tdataRel__Produt__Agentes[".allSearchFields"] = array();

$tdataRel__Produt__Agentes[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataRel__Produt__Agentes[".allSearchFields"]))
{
	$tdataRel__Produt__Agentes[".allSearchFields"][] = "Mes";	
}
$tdataRel__Produt__Agentes[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataRel__Produt__Agentes[".allSearchFields"]))
{
	$tdataRel__Produt__Agentes[".allSearchFields"][] = "Ano";	
}
$tdataRel__Produt__Agentes[".globSearchFields"][] = "fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("fila", $tdataRel__Produt__Agentes[".allSearchFields"]))
{
	$tdataRel__Produt__Agentes[".allSearchFields"][] = "fila";	
}
$tdataRel__Produt__Agentes[".globSearchFields"][] = "Agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agente", $tdataRel__Produt__Agentes[".allSearchFields"]))
{
	$tdataRel__Produt__Agentes[".allSearchFields"][] = "Agente";	
}


$tdataRel__Produt__Agentes[".isDynamicPerm"] = true;

	

$tdataRel__Produt__Agentes[".isDisplayLoading"] = true;

$tdataRel__Produt__Agentes[".isResizeColumns"] = false;


$tdataRel__Produt__Agentes[".createLoginPage"] = true;


 	

$tdataRel__Produt__Agentes[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY fila, Agente, DATE_FORMAT(dt_entrada,\"%m\"), DATE_FORMAT(dt_entrada,\"%Y\")";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Produt__Agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Produt__Agentes[".orderindexes"] = array();
$tdataRel__Produt__Agentes[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "fila");
$tdataRel__Produt__Agentes[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "Agente");
$tdataRel__Produt__Agentes[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "DATE_FORMAT(dt_entrada,\"%m\")");
$tdataRel__Produt__Agentes[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "DATE_FORMAT(dt_entrada,\"%Y\")");

$tdataRel__Produt__Agentes[".sqlHead"] = "select DATE_FORMAT(dt_entrada,\"%m\") AS Mes,  DATE_FORMAT(dt_entrada,\"%Y\") AS Ano,  fila,  Agente,  sec_to_time(sum(time_to_sec(tot_logado))) AS tot_logado,  SUM(qtd_atend) AS qtd_atend,  sec_to_time(sum(time_to_sec(tot_atend))) AS tot_atend,  sec_to_time(sum(time_to_sec(med_atend))) AS med_atend,  sec_to_time(sum(time_to_sec(tot_pausa_n_produtiva))) AS tot_pausa_n_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa_produtiva))) AS tot_pausa_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa))) AS tot_pausa,  sec_to_time(sum(time_to_sec(tot_parado))) AS tot_parado,  SUM(qtd_nao_atend) AS qtd_nao_atend,  SUM(tot_recebida) AS tot_recebida,  ((sum(qtd_atend)*100)/sum(tot_recebida)) AS cntrb_indiv,  '0' AS cntrb_tot";

$tdataRel__Produt__Agentes[".sqlFrom"] = "FROM v_rel_produt_agente_dia";

$tdataRel__Produt__Agentes[".sqlWhereExpr"] = "";

$tdataRel__Produt__Agentes[".sqlTail"] = "GROUP BY fila, Agente, 1, 2";



	$tableKeys=array();
	$tdataRel__Produt__Agentes[".Keys"]=$tableKeys;

	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "DATE_FORMAT(dt_entrada,\"%m\")";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "DATE_FORMAT(dt_entrada,\"%Y\")";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["Ano"]=$fdata;
	
//	fila
	$fdata = array();
	$fdata["strName"] = "fila";
	$fdata["ownerTable"] = "v_rel_produt_agente_dia";
		$fdata["Label"]="Fila"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="fila";
				$fdata["LookupTable"]="v_rel_produt_agente_dia";
	$fdata["LookupOrderBy"]="fila";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "fila";
		$fdata["FullName"]= "fila";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["fila"]=$fdata;
	
//	Agente
	$fdata = array();
	$fdata["strName"] = "Agente";
	$fdata["ownerTable"] = "v_rel_produt_agente_dia";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Agente";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Agente";
				$fdata["LookupTable"]="v_rel_produt_agente_dia";
	$fdata["LookupOrderBy"]="Agente";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["Agente"]=$fdata;
	
//	tot_logado
	$fdata = array();
	$fdata["strName"] = "tot_logado";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Disponível"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_logado";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_logado)))";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_logado"]=$fdata;
	
//	qtd_atend
	$fdata = array();
	$fdata["strName"] = "qtd_atend";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Atendidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "qtd_atend";
		$fdata["FullName"]= "SUM(qtd_atend)";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["qtd_atend"]=$fdata;
	
//	tot_atend
	$fdata = array();
	$fdata["strName"] = "tot_atend";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_atend";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_atend)))";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_atend"]=$fdata;
	
//	med_atend
	$fdata = array();
	$fdata["strName"] = "med_atend";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Média Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "med_atend";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(med_atend)))";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["med_atend"]=$fdata;
	
//	tot_pausa_n_produtiva
	$fdata = array();
	$fdata["strName"] = "tot_pausa_n_produtiva";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Pausa não Produt."; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_pausa_n_produtiva";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_pausa_n_produtiva)))";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_pausa_n_produtiva"]=$fdata;
	
//	tot_pausa_produtiva
	$fdata = array();
	$fdata["strName"] = "tot_pausa_produtiva";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Pausa Produt."; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_pausa_produtiva";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_pausa_produtiva)))";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_pausa_produtiva"]=$fdata;
	
//	tot_pausa
	$fdata = array();
	$fdata["strName"] = "tot_pausa";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Pausa"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_pausa";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_pausa)))";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_pausa"]=$fdata;
	
//	tot_parado
	$fdata = array();
	$fdata["strName"] = "tot_parado";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Total Livre"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_parado";
		$fdata["FullName"]= "sec_to_time(sum(time_to_sec(tot_parado)))";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produt__Agentes["tot_parado"]=$fdata;
	
//	qtd_nao_atend
	$fdata = array();
	$fdata["strName"] = "qtd_nao_atend";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Rejeitadas/N Atendidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "qtd_nao_atend";
		$fdata["FullName"]= "SUM(qtd_nao_atend)";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["qtd_nao_atend"]=$fdata;
	
//	tot_recebida
	$fdata = array();
	$fdata["strName"] = "tot_recebida";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Recebidas"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_recebida";
		$fdata["FullName"]= "SUM(tot_recebida)";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["tot_recebida"]=$fdata;
	
//	cntrb_indiv
	$fdata = array();
	$fdata["strName"] = "cntrb_indiv";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Contribuição Individual"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_indiv";
		$fdata["FullName"]= "((sum(qtd_atend)*100)/sum(tot_recebida))";
						$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produt__Agentes["cntrb_indiv"]=$fdata;
	
//	cntrb_tot
	$fdata = array();
	$fdata["strName"] = "cntrb_tot";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Cntrb Tot"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_tot";
		$fdata["FullName"]= "'0'";
						$fdata["Index"]= 16;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=4";
		
									$tdataRel__Produt__Agentes["cntrb_tot"]=$fdata;

	
$tables_data["Rel. Produt. Agentes"]=&$tdataRel__Produt__Agentes;
$field_labels["Rel__Produt__Agentes"] = &$fieldLabelsRel__Produt__Agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Produt. Agentes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Produt. Agentes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto480=array();
$proto480["m_strHead"] = "select";
$proto480["m_strFieldList"] = "DATE_FORMAT(dt_entrada,\"%m\") AS Mes,  DATE_FORMAT(dt_entrada,\"%Y\") AS Ano,  fila,  Agente,  sec_to_time(sum(time_to_sec(tot_logado))) AS tot_logado,  SUM(qtd_atend) AS qtd_atend,  sec_to_time(sum(time_to_sec(tot_atend))) AS tot_atend,  sec_to_time(sum(time_to_sec(med_atend))) AS med_atend,  sec_to_time(sum(time_to_sec(tot_pausa_n_produtiva))) AS tot_pausa_n_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa_produtiva))) AS tot_pausa_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa))) AS tot_pausa,  sec_to_time(sum(time_to_sec(tot_parado))) AS tot_parado,  SUM(qtd_nao_atend) AS qtd_nao_atend,  SUM(tot_recebida) AS tot_recebida,  ((sum(qtd_atend)*100)/sum(tot_recebida)) AS cntrb_indiv,  '0' AS cntrb_tot";
$proto480["m_strFrom"] = "FROM v_rel_produt_agente_dia";
$proto480["m_strWhere"] = "";
$proto480["m_strOrderBy"] = "ORDER BY fila, Agente, DATE_FORMAT(dt_entrada,\"%m\"), DATE_FORMAT(dt_entrada,\"%Y\")";
$proto480["m_strTail"] = "GROUP BY fila, Agente, 1, 2";
$proto481=array();
$proto481["m_sql"] = "";
$proto481["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto481["m_column"]=$obj;
$proto481["m_contained"] = array();
$proto481["m_strCase"] = "";
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
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,\"%m\")"
));

$proto485["m_expr"]=$obj;
$proto485["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto485);

$proto480["m_fieldlist"][]=$obj;
						$proto487=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,\"%Y\")"
));

$proto487["m_expr"]=$obj;
$proto487["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto487);

$proto480["m_fieldlist"][]=$obj;
						$proto489=array();
			$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto489["m_expr"]=$obj;
$proto489["m_alias"] = "";
$obj = new SQLFieldListItem($proto489);

$proto480["m_fieldlist"][]=$obj;
						$proto491=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto491["m_expr"]=$obj;
$proto491["m_alias"] = "";
$obj = new SQLFieldListItem($proto491);

$proto480["m_fieldlist"][]=$obj;
						$proto493=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_logado)))"
));

$proto493["m_expr"]=$obj;
$proto493["m_alias"] = "tot_logado";
$obj = new SQLFieldListItem($proto493);

$proto480["m_fieldlist"][]=$obj;
						$proto495=array();
			$proto496=array();
$proto496["m_functiontype"] = "SQLF_SUM";
$proto496["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "qtd_atend",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto496["m_arguments"][]=$obj;
$proto496["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto496);

$proto495["m_expr"]=$obj;
$proto495["m_alias"] = "qtd_atend";
$obj = new SQLFieldListItem($proto495);

$proto480["m_fieldlist"][]=$obj;
						$proto498=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_atend)))"
));

$proto498["m_expr"]=$obj;
$proto498["m_alias"] = "tot_atend";
$obj = new SQLFieldListItem($proto498);

$proto480["m_fieldlist"][]=$obj;
						$proto500=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(med_atend)))"
));

$proto500["m_expr"]=$obj;
$proto500["m_alias"] = "med_atend";
$obj = new SQLFieldListItem($proto500);

$proto480["m_fieldlist"][]=$obj;
						$proto502=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_pausa_n_produtiva)))"
));

$proto502["m_expr"]=$obj;
$proto502["m_alias"] = "tot_pausa_n_produtiva";
$obj = new SQLFieldListItem($proto502);

$proto480["m_fieldlist"][]=$obj;
						$proto504=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_pausa_produtiva)))"
));

$proto504["m_expr"]=$obj;
$proto504["m_alias"] = "tot_pausa_produtiva";
$obj = new SQLFieldListItem($proto504);

$proto480["m_fieldlist"][]=$obj;
						$proto506=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_pausa)))"
));

$proto506["m_expr"]=$obj;
$proto506["m_alias"] = "tot_pausa";
$obj = new SQLFieldListItem($proto506);

$proto480["m_fieldlist"][]=$obj;
						$proto508=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(sum(time_to_sec(tot_parado)))"
));

$proto508["m_expr"]=$obj;
$proto508["m_alias"] = "tot_parado";
$obj = new SQLFieldListItem($proto508);

$proto480["m_fieldlist"][]=$obj;
						$proto510=array();
			$proto511=array();
$proto511["m_functiontype"] = "SQLF_SUM";
$proto511["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "qtd_nao_atend",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto511["m_arguments"][]=$obj;
$proto511["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto511);

$proto510["m_expr"]=$obj;
$proto510["m_alias"] = "qtd_nao_atend";
$obj = new SQLFieldListItem($proto510);

$proto480["m_fieldlist"][]=$obj;
						$proto513=array();
			$proto514=array();
$proto514["m_functiontype"] = "SQLF_SUM";
$proto514["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "tot_recebida",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto514["m_arguments"][]=$obj;
$proto514["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto514);

$proto513["m_expr"]=$obj;
$proto513["m_alias"] = "tot_recebida";
$obj = new SQLFieldListItem($proto513);

$proto480["m_fieldlist"][]=$obj;
						$proto516=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "((sum(qtd_atend)*100)/sum(tot_recebida))"
));

$proto516["m_expr"]=$obj;
$proto516["m_alias"] = "cntrb_indiv";
$obj = new SQLFieldListItem($proto516);

$proto480["m_fieldlist"][]=$obj;
						$proto518=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "'0'"
));

$proto518["m_expr"]=$obj;
$proto518["m_alias"] = "cntrb_tot";
$obj = new SQLFieldListItem($proto518);

$proto480["m_fieldlist"][]=$obj;
$proto480["m_fromlist"] = array();
												$proto520=array();
$proto520["m_link"] = "SQLL_MAIN";
			$proto521=array();
$proto521["m_strName"] = "v_rel_produt_agente_dia";
$proto521["m_columns"] = array();
$proto521["m_columns"][] = "dt_entrada";
$proto521["m_columns"][] = "fila";
$proto521["m_columns"][] = "Agente";
$proto521["m_columns"][] = "tot_logado";
$proto521["m_columns"][] = "qtd_atend";
$proto521["m_columns"][] = "tot_atend";
$proto521["m_columns"][] = "med_atend";
$proto521["m_columns"][] = "tot_pausa_n_produtiva";
$proto521["m_columns"][] = "tot_pausa_produtiva";
$proto521["m_columns"][] = "tot_pausa";
$proto521["m_columns"][] = "tot_parado";
$proto521["m_columns"][] = "qtd_nao_atend";
$proto521["m_columns"][] = "tot_recebida";
$proto521["m_columns"][] = "cntrb_indiv";
$proto521["m_columns"][] = "cntrb_tot";
$obj = new SQLTable($proto521);

$proto520["m_table"] = $obj;
$proto520["m_alias"] = "";
$proto522=array();
$proto522["m_sql"] = "";
$proto522["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto522["m_column"]=$obj;
$proto522["m_contained"] = array();
$proto522["m_strCase"] = "";
$proto522["m_havingmode"] = "0";
$proto522["m_inBrackets"] = "0";
$proto522["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto522);

$proto520["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto520);

$proto480["m_fromlist"][]=$obj;
$proto480["m_groupby"] = array();
												$proto524=array();
						$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto524["m_column"]=$obj;
$obj = new SQLGroupByItem($proto524);

$proto480["m_groupby"][]=$obj;
												$proto526=array();
						$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto526["m_column"]=$obj;
$obj = new SQLGroupByItem($proto526);

$proto480["m_groupby"][]=$obj;
												$proto528=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "1"
));

$proto528["m_column"]=$obj;
$obj = new SQLGroupByItem($proto528);

$proto480["m_groupby"][]=$obj;
												$proto530=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto530["m_column"]=$obj;
$obj = new SQLGroupByItem($proto530);

$proto480["m_groupby"][]=$obj;
$proto480["m_orderby"] = array();
												$proto532=array();
						$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto532["m_column"]=$obj;
$proto532["m_bAsc"] = 1;
$proto532["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto532);

$proto480["m_orderby"][]=$obj;					
												$proto534=array();
						$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "v_rel_produt_agente_dia"
));

$proto534["m_column"]=$obj;
$proto534["m_bAsc"] = 1;
$proto534["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto534);

$proto480["m_orderby"][]=$obj;					
												$proto536=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,\"%m\")"
));

$proto536["m_column"]=$obj;
$proto536["m_bAsc"] = 1;
$proto536["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto536);

$proto480["m_orderby"][]=$obj;					
												$proto538=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,\"%Y\")"
));

$proto538["m_column"]=$obj;
$proto538["m_bAsc"] = 1;
$proto538["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto538);

$proto480["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto480);

$queryData_Rel__Produt__Agentes = $obj;
$tdataRel__Produt__Agentes[".sqlquery"] = $queryData_Rel__Produt__Agentes;



?>
