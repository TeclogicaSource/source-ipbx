<?php

//	field labels
$fieldLabelsRel__Produtividade_Agentes = array();
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["fila"] = "Fila";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["agente"] = "Agente";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["tot_logado"] = "Total Disponível";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["qtd_atend"] = "Atendidas";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["tot_atend"] = "Total Atendendo";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["med_atend"] = "Média Atendimento";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["tot_pausa"] = "Total em Pausa";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["qtd_nao_atend"] = "Rejeitadas/Não Atendid";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["tot_recebida"] = "Recebidas";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["cntrb_indiv"] = "Contribuição Individual";
$fieldLabelsRel__Produtividade_Agentes["Portuguese(Brazil)"]["cntrb_tot"] = "Contribuicao Total";


$tdataRel__Produtividade_Agentes=array();
	$tdataRel__Produtividade_Agentes[".NumberOfChars"]=80; 
	$tdataRel__Produtividade_Agentes[".ShortName"]="Rel__Produtividade_Agentes";
	$tdataRel__Produtividade_Agentes[".OwnerID"]="";
	$tdataRel__Produtividade_Agentes[".OriginalTable"]="v_rel_prod_agentes";
	$tdataRel__Produtividade_Agentes[".NCSearch"]=true;
	

$tdataRel__Produtividade_Agentes[".shortTableName"] = "Rel__Produtividade_Agentes";
$tdataRel__Produtividade_Agentes[".dataSourceTable"] = "Rel. Produtividade Agentes";
$tdataRel__Produtividade_Agentes[".nSecOptions"] = 0;
$tdataRel__Produtividade_Agentes[".nLoginMethod"] = 1;
$tdataRel__Produtividade_Agentes[".recsPerRowList"] = 1;	
$tdataRel__Produtividade_Agentes[".tableGroupBy"] = "0";
$tdataRel__Produtividade_Agentes[".dbType"] = 0;
$tdataRel__Produtividade_Agentes[".mainTableOwnerID"] = "";
$tdataRel__Produtividade_Agentes[".moveNext"] = 1;

$tdataRel__Produtividade_Agentes[".listAjax"] = false;

	$tdataRel__Produtividade_Agentes[".audit"] = false;

	$tdataRel__Produtividade_Agentes[".locking"] = false;
	
$tdataRel__Produtividade_Agentes[".listIcons"] = true;

$tdataRel__Produtividade_Agentes[".exportTo"] = true;

$tdataRel__Produtividade_Agentes[".printFriendly"] = true;


$tdataRel__Produtividade_Agentes[".showSimpleSearchOptions"] = false;

$tdataRel__Produtividade_Agentes[".showSearchPanel"] = true;


$tdataRel__Produtividade_Agentes[".isUseAjaxSuggest"] = true;


$tdataRel__Produtividade_Agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Produtividade_Agentes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRel__Produtividade_Agentes[".isUseTimeForSearch"] = false;





$tdataRel__Produtividade_Agentes[".isUseInlineJs"] = $tdataRel__Produtividade_Agentes[".isUseInlineAdd"] || $tdataRel__Produtividade_Agentes[".isUseInlineEdit"];

$tdataRel__Produtividade_Agentes[".allSearchFields"] = array();

$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("fila", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "fila";	
}
$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("agente", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "agente";	
}
$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "tot_logado";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tot_logado", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "tot_logado";	
}
$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "tot_atend";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tot_atend", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "tot_atend";	
}
$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "med_atend";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("med_atend", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "med_atend";	
}
$tdataRel__Produtividade_Agentes[".globSearchFields"][] = "tot_pausa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tot_pausa", $tdataRel__Produtividade_Agentes[".allSearchFields"]))
{
	$tdataRel__Produtividade_Agentes[".allSearchFields"][] = "tot_pausa";	
}


$tdataRel__Produtividade_Agentes[".isDynamicPerm"] = true;

	

$tdataRel__Produtividade_Agentes[".isDisplayLoading"] = true;

$tdataRel__Produtividade_Agentes[".isResizeColumns"] = false;


$tdataRel__Produtividade_Agentes[".createLoginPage"] = true;


 	





$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Produtividade_Agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Produtividade_Agentes[".orderindexes"] = array();

$tdataRel__Produtividade_Agentes[".sqlHead"] = "SELECT fila,   agente,   tot_logado,   qtd_atend,   tot_atend,   med_atend,   tot_pausa,   qtd_nao_atend,   tot_recebida,   cntrb_indiv,   cntrb_tot";

$tdataRel__Produtividade_Agentes[".sqlFrom"] = "FROM v_rel_prod_agentes";

$tdataRel__Produtividade_Agentes[".sqlWhereExpr"] = "";

$tdataRel__Produtividade_Agentes[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Produtividade_Agentes[".Keys"]=$tableKeys;

	
//	fila
	$fdata = array();
	$fdata["strName"] = "fila";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Fila"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "fila";
		$fdata["FullName"]= "fila";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["fila"]=$fdata;
	
//	agente
	$fdata = array();
	$fdata["strName"] = "agente";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Agente"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "agente";
		$fdata["FullName"]= "agente";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=40";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["agente"]=$fdata;
	
//	tot_logado
	$fdata = array();
	$fdata["strName"] = "tot_logado";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Total Disponível"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_logado";
		$fdata["FullName"]= "tot_logado";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produtividade_Agentes["tot_logado"]=$fdata;
	
//	qtd_atend
	$fdata = array();
	$fdata["strName"] = "qtd_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Atendidas"; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "qtd_atend";
		$fdata["FullName"]= "qtd_atend";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["qtd_atend"]=$fdata;
	
//	tot_atend
	$fdata = array();
	$fdata["strName"] = "tot_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Total Atendendo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_atend";
		$fdata["FullName"]= "tot_atend";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produtividade_Agentes["tot_atend"]=$fdata;
	
//	med_atend
	$fdata = array();
	$fdata["strName"] = "med_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Média Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "med_atend";
		$fdata["FullName"]= "med_atend";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produtividade_Agentes["med_atend"]=$fdata;
	
//	tot_pausa
	$fdata = array();
	$fdata["strName"] = "tot_pausa";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Total em Pausa"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_pausa";
		$fdata["FullName"]= "tot_pausa";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Produtividade_Agentes["tot_pausa"]=$fdata;
	
//	qtd_nao_atend
	$fdata = array();
	$fdata["strName"] = "qtd_nao_atend";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Rejeitadas/Não Atendid"; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "qtd_nao_atend";
		$fdata["FullName"]= "qtd_nao_atend";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["qtd_nao_atend"]=$fdata;
	
//	tot_recebida
	$fdata = array();
	$fdata["strName"] = "tot_recebida";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Recebidas"; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tot_recebida";
		$fdata["FullName"]= "tot_recebida";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["tot_recebida"]=$fdata;
	
//	cntrb_indiv
	$fdata = array();
	$fdata["strName"] = "cntrb_indiv";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Contribuição Individual"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_indiv";
		$fdata["FullName"]= "cntrb_indiv";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["cntrb_indiv"]=$fdata;
	
//	cntrb_tot
	$fdata = array();
	$fdata["strName"] = "cntrb_tot";
	$fdata["ownerTable"] = "v_rel_prod_agentes";
		$fdata["Label"]="Contribuicao Total"; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cntrb_tot";
		$fdata["FullName"]= "cntrb_tot";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Produtividade_Agentes["cntrb_tot"]=$fdata;

	
$tables_data["Rel. Produtividade Agentes"]=&$tdataRel__Produtividade_Agentes;
$field_labels["Rel__Produtividade_Agentes"] = &$fieldLabelsRel__Produtividade_Agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Produtividade Agentes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Produtividade Agentes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto425=array();
$proto425["m_strHead"] = "SELECT";
$proto425["m_strFieldList"] = "fila,   agente,   tot_logado,   qtd_atend,   tot_atend,   med_atend,   tot_pausa,   qtd_nao_atend,   tot_recebida,   cntrb_indiv,   cntrb_tot";
$proto425["m_strFrom"] = "FROM v_rel_prod_agentes";
$proto425["m_strWhere"] = "";
$proto425["m_strOrderBy"] = "";
$proto425["m_strTail"] = "";
$proto426=array();
$proto426["m_sql"] = "";
$proto426["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto426["m_column"]=$obj;
$proto426["m_contained"] = array();
$proto426["m_strCase"] = "";
$proto426["m_havingmode"] = "0";
$proto426["m_inBrackets"] = "0";
$proto426["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto426);

$proto425["m_where"] = $obj;
$proto428=array();
$proto428["m_sql"] = "";
$proto428["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto428["m_column"]=$obj;
$proto428["m_contained"] = array();
$proto428["m_strCase"] = "";
$proto428["m_havingmode"] = "0";
$proto428["m_inBrackets"] = "0";
$proto428["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto428);

$proto425["m_having"] = $obj;
$proto425["m_fieldlist"] = array();
						$proto430=array();
			$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto430["m_expr"]=$obj;
$proto430["m_alias"] = "";
$obj = new SQLFieldListItem($proto430);

$proto425["m_fieldlist"][]=$obj;
						$proto432=array();
			$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto432["m_expr"]=$obj;
$proto432["m_alias"] = "";
$obj = new SQLFieldListItem($proto432);

$proto425["m_fieldlist"][]=$obj;
						$proto434=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_logado",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto434["m_expr"]=$obj;
$proto434["m_alias"] = "";
$obj = new SQLFieldListItem($proto434);

$proto425["m_fieldlist"][]=$obj;
						$proto436=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_atend",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto436["m_expr"]=$obj;
$proto436["m_alias"] = "";
$obj = new SQLFieldListItem($proto436);

$proto425["m_fieldlist"][]=$obj;
						$proto438=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_atend",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto438["m_expr"]=$obj;
$proto438["m_alias"] = "";
$obj = new SQLFieldListItem($proto438);

$proto425["m_fieldlist"][]=$obj;
						$proto440=array();
			$obj = new SQLField(array(
	"m_strName" => "med_atend",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto440["m_expr"]=$obj;
$proto440["m_alias"] = "";
$obj = new SQLFieldListItem($proto440);

$proto425["m_fieldlist"][]=$obj;
						$proto442=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_pausa",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto442["m_expr"]=$obj;
$proto442["m_alias"] = "";
$obj = new SQLFieldListItem($proto442);

$proto425["m_fieldlist"][]=$obj;
						$proto444=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_nao_atend",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto444["m_expr"]=$obj;
$proto444["m_alias"] = "";
$obj = new SQLFieldListItem($proto444);

$proto425["m_fieldlist"][]=$obj;
						$proto446=array();
			$obj = new SQLField(array(
	"m_strName" => "tot_recebida",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto446["m_expr"]=$obj;
$proto446["m_alias"] = "";
$obj = new SQLFieldListItem($proto446);

$proto425["m_fieldlist"][]=$obj;
						$proto448=array();
			$obj = new SQLField(array(
	"m_strName" => "cntrb_indiv",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto448["m_expr"]=$obj;
$proto448["m_alias"] = "";
$obj = new SQLFieldListItem($proto448);

$proto425["m_fieldlist"][]=$obj;
						$proto450=array();
			$obj = new SQLField(array(
	"m_strName" => "cntrb_tot",
	"m_strTable" => "v_rel_prod_agentes"
));

$proto450["m_expr"]=$obj;
$proto450["m_alias"] = "";
$obj = new SQLFieldListItem($proto450);

$proto425["m_fieldlist"][]=$obj;
$proto425["m_fromlist"] = array();
												$proto452=array();
$proto452["m_link"] = "SQLL_MAIN";
			$proto453=array();
$proto453["m_strName"] = "v_rel_prod_agentes";
$proto453["m_columns"] = array();
$proto453["m_columns"][] = "fila";
$proto453["m_columns"][] = "agente";
$proto453["m_columns"][] = "tot_logado";
$proto453["m_columns"][] = "qtd_atend";
$proto453["m_columns"][] = "tot_atend";
$proto453["m_columns"][] = "med_atend";
$proto453["m_columns"][] = "tot_pausa";
$proto453["m_columns"][] = "qtd_nao_atend";
$proto453["m_columns"][] = "tot_recebida";
$proto453["m_columns"][] = "cntrb_indiv";
$proto453["m_columns"][] = "cntrb_tot";
$obj = new SQLTable($proto453);

$proto452["m_table"] = $obj;
$proto452["m_alias"] = "";
$proto454=array();
$proto454["m_sql"] = "";
$proto454["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto454["m_column"]=$obj;
$proto454["m_contained"] = array();
$proto454["m_strCase"] = "";
$proto454["m_havingmode"] = "0";
$proto454["m_inBrackets"] = "0";
$proto454["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto454);

$proto452["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto452);

$proto425["m_fromlist"][]=$obj;
$proto425["m_groupby"] = array();
$proto425["m_orderby"] = array();
$obj = new SQLQuery($proto425);

$queryData_Rel__Produtividade_Agentes = $obj;
$tdataRel__Produtividade_Agentes[".sqlquery"] = $queryData_Rel__Produtividade_Agentes;



?>
