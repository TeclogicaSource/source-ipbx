<?php

//	field labels
$fieldLabelsRel__Perf__Tempo_Espera = array();
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Mes"] = "Mes";
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Tempo_em_faixas"] = "Tempo em faixas";
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Quantidade"] = "Quantidade";
$fieldLabelsRel__Perf__Tempo_Espera["Portuguese(Brazil)"]["Percentual"] = "Percentual";


$tdataRel__Perf__Tempo_Espera=array();
	$tdataRel__Perf__Tempo_Espera[".NumberOfChars"]=80; 
	$tdataRel__Perf__Tempo_Espera[".ShortName"]="Rel__Perf__Tempo_Espera";
	$tdataRel__Perf__Tempo_Espera[".OwnerID"]="";
	$tdataRel__Perf__Tempo_Espera[".OriginalTable"]="v_graf_perf_temp_atendimento";
	$tdataRel__Perf__Tempo_Espera[".NCSearch"]=true;
	

$tdataRel__Perf__Tempo_Espera[".shortTableName"] = "Rel__Perf__Tempo_Espera";
$tdataRel__Perf__Tempo_Espera[".dataSourceTable"] = "Rel. Perf. Tempo Espera";
$tdataRel__Perf__Tempo_Espera[".nSecOptions"] = 0;
$tdataRel__Perf__Tempo_Espera[".nLoginMethod"] = 1;
$tdataRel__Perf__Tempo_Espera[".recsPerRowList"] = 1;	
$tdataRel__Perf__Tempo_Espera[".tableGroupBy"] = "0";
$tdataRel__Perf__Tempo_Espera[".dbType"] = 0;
$tdataRel__Perf__Tempo_Espera[".mainTableOwnerID"] = "";
$tdataRel__Perf__Tempo_Espera[".moveNext"] = 1;

$tdataRel__Perf__Tempo_Espera[".listAjax"] = false;

	$tdataRel__Perf__Tempo_Espera[".audit"] = false;

	$tdataRel__Perf__Tempo_Espera[".locking"] = false;
	
$tdataRel__Perf__Tempo_Espera[".listIcons"] = true;

$tdataRel__Perf__Tempo_Espera[".exportTo"] = true;

$tdataRel__Perf__Tempo_Espera[".printFriendly"] = true;


$tdataRel__Perf__Tempo_Espera[".showSimpleSearchOptions"] = false;

$tdataRel__Perf__Tempo_Espera[".showSearchPanel"] = true;


$tdataRel__Perf__Tempo_Espera[".isUseAjaxSuggest"] = true;


$tdataRel__Perf__Tempo_Espera[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Perf__Tempo_Espera[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRel__Perf__Tempo_Espera[".isUseTimeForSearch"] = false;





$tdataRel__Perf__Tempo_Espera[".isUseInlineJs"] = $tdataRel__Perf__Tempo_Espera[".isUseInlineAdd"] || $tdataRel__Perf__Tempo_Espera[".isUseInlineEdit"];

$tdataRel__Perf__Tempo_Espera[".allSearchFields"] = array();

$tdataRel__Perf__Tempo_Espera[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Perf__Tempo_Espera[".allSearchFields"]))
{
	$tdataRel__Perf__Tempo_Espera[".allSearchFields"][] = "Fila";	
}
$tdataRel__Perf__Tempo_Espera[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataRel__Perf__Tempo_Espera[".allSearchFields"]))
{
	$tdataRel__Perf__Tempo_Espera[".allSearchFields"][] = "Mes";	
}
$tdataRel__Perf__Tempo_Espera[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataRel__Perf__Tempo_Espera[".allSearchFields"]))
{
	$tdataRel__Perf__Tempo_Espera[".allSearchFields"][] = "Ano";	
}


$tdataRel__Perf__Tempo_Espera[".isDynamicPerm"] = true;

	

$tdataRel__Perf__Tempo_Espera[".isDisplayLoading"] = true;

$tdataRel__Perf__Tempo_Espera[".isResizeColumns"] = false;


$tdataRel__Perf__Tempo_Espera[".createLoginPage"] = true;


 	

$tdataRel__Perf__Tempo_Espera[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY Fila, Espera";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Perf__Tempo_Espera[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Perf__Tempo_Espera[".orderindexes"] = array();
$tdataRel__Perf__Tempo_Espera[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$tdataRel__Perf__Tempo_Espera[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "Espera");

$tdataRel__Perf__Tempo_Espera[".sqlHead"] = "SELECT Fila,  Mes AS Mes,  Ano AS Ano,  Espera AS `Tempo em faixas`,  qtd_atend AS Quantidade,  round((qtd_atend/(f_atendidos_fila(Fila,Mes,Ano))*100), 2) AS Percentual";

$tdataRel__Perf__Tempo_Espera[".sqlFrom"] = "FROM v_graf_perf_temp_espera_dia";

$tdataRel__Perf__Tempo_Espera[".sqlWhereExpr"] = "";

$tdataRel__Perf__Tempo_Espera[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Perf__Tempo_Espera[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera_dia";
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
						$tdataRel__Perf__Tempo_Espera["Fila"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera_dia";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="01";
	$fdata["LookupValues"][]="02";
	$fdata["LookupValues"][]="03";
	$fdata["LookupValues"][]="04";
	$fdata["LookupValues"][]="05";
	$fdata["LookupValues"][]="06";
	$fdata["LookupValues"][]="07";
	$fdata["LookupValues"][]="08";
	$fdata["LookupValues"][]="09";
	$fdata["LookupValues"][]="10";
	$fdata["LookupValues"][]="11";
	$fdata["LookupValues"][]="12";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "Mes";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Perf__Tempo_Espera["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera_dia";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "Ano";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=4";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Perf__Tempo_Espera["Ano"]=$fdata;
	
//	Tempo em faixas
	$fdata = array();
	$fdata["strName"] = "Tempo em faixas";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera_dia";
				$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo_em_faixas";
		$fdata["FullName"]= "Espera";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Perf__Tempo_Espera["Tempo em faixas"]=$fdata;
	
//	Quantidade
	$fdata = array();
	$fdata["strName"] = "Quantidade";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera_dia";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Quantidade";
		$fdata["FullName"]= "qtd_atend";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Perf__Tempo_Espera["Quantidade"]=$fdata;
	
//	Percentual
	$fdata = array();
	$fdata["strName"] = "Percentual";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Percentual";
		$fdata["FullName"]= "round((qtd_atend/(f_atendidos_fila(Fila,Mes,Ano))*100), 2)";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Perf__Tempo_Espera["Percentual"]=$fdata;

	
$tables_data["Rel. Perf. Tempo Espera"]=&$tdataRel__Perf__Tempo_Espera;
$field_labels["Rel__Perf__Tempo_Espera"] = &$fieldLabelsRel__Perf__Tempo_Espera;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Perf. Tempo Espera"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Perf. Tempo Espera"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto433=array();
$proto433["m_strHead"] = "SELECT";
$proto433["m_strFieldList"] = "Fila,  Mes AS Mes,  Ano AS Ano,  Espera AS `Tempo em faixas`,  qtd_atend AS Quantidade,  round((qtd_atend/(f_atendidos_fila(Fila,Mes,Ano))*100), 2) AS Percentual";
$proto433["m_strFrom"] = "FROM v_graf_perf_temp_espera_dia";
$proto433["m_strWhere"] = "";
$proto433["m_strOrderBy"] = "ORDER BY Fila, Espera";
$proto433["m_strTail"] = "";
$proto434=array();
$proto434["m_sql"] = "";
$proto434["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto434["m_column"]=$obj;
$proto434["m_contained"] = array();
$proto434["m_strCase"] = "";
$proto434["m_havingmode"] = "0";
$proto434["m_inBrackets"] = "0";
$proto434["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto434);

$proto433["m_where"] = $obj;
$proto436=array();
$proto436["m_sql"] = "";
$proto436["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto436["m_column"]=$obj;
$proto436["m_contained"] = array();
$proto436["m_strCase"] = "";
$proto436["m_havingmode"] = "0";
$proto436["m_inBrackets"] = "0";
$proto436["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto436);

$proto433["m_having"] = $obj;
$proto433["m_fieldlist"] = array();
						$proto438=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto438["m_expr"]=$obj;
$proto438["m_alias"] = "";
$obj = new SQLFieldListItem($proto438);

$proto433["m_fieldlist"][]=$obj;
						$proto440=array();
			$obj = new SQLField(array(
	"m_strName" => "Mes",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto440["m_expr"]=$obj;
$proto440["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto440);

$proto433["m_fieldlist"][]=$obj;
						$proto442=array();
			$obj = new SQLField(array(
	"m_strName" => "Ano",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto442["m_expr"]=$obj;
$proto442["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto442);

$proto433["m_fieldlist"][]=$obj;
						$proto444=array();
			$obj = new SQLField(array(
	"m_strName" => "Espera",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto444["m_expr"]=$obj;
$proto444["m_alias"] = "Tempo em faixas";
$obj = new SQLFieldListItem($proto444);

$proto433["m_fieldlist"][]=$obj;
						$proto446=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_atend",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto446["m_expr"]=$obj;
$proto446["m_alias"] = "Quantidade";
$obj = new SQLFieldListItem($proto446);

$proto433["m_fieldlist"][]=$obj;
						$proto448=array();
			$proto449=array();
$proto449["m_functiontype"] = "SQLF_CUSTOM";
$proto449["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "(qtd_atend/(f_atendidos_fila(Fila,Mes,Ano))*100)"
));

$proto449["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto449["m_arguments"][]=$obj;
$proto449["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto449);

$proto448["m_expr"]=$obj;
$proto448["m_alias"] = "Percentual";
$obj = new SQLFieldListItem($proto448);

$proto433["m_fieldlist"][]=$obj;
$proto433["m_fromlist"] = array();
												$proto452=array();
$proto452["m_link"] = "SQLL_MAIN";
			$proto453=array();
$proto453["m_strName"] = "v_graf_perf_temp_espera_dia";
$proto453["m_columns"] = array();
$proto453["m_columns"][] = "Fila";
$proto453["m_columns"][] = "Mes";
$proto453["m_columns"][] = "Ano";
$proto453["m_columns"][] = "Espera";
$proto453["m_columns"][] = "qtd_atend";
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

$proto433["m_fromlist"][]=$obj;
$proto433["m_groupby"] = array();
$proto433["m_orderby"] = array();
												$proto456=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto456["m_column"]=$obj;
$proto456["m_bAsc"] = 1;
$proto456["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto456);

$proto433["m_orderby"][]=$obj;					
												$proto458=array();
						$obj = new SQLField(array(
	"m_strName" => "Espera",
	"m_strTable" => "v_graf_perf_temp_espera_dia"
));

$proto458["m_column"]=$obj;
$proto458["m_bAsc"] = 1;
$proto458["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto458);

$proto433["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto433);

$queryData_Rel__Perf__Tempo_Espera = $obj;
$tdataRel__Perf__Tempo_Espera[".sqlquery"] = $queryData_Rel__Perf__Tempo_Espera;



?>
