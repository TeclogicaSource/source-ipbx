<?php

//	field labels
$fieldLabelsInforma__es_de_Fila = array();
$fieldLabelsInforma__es_de_Fila["Portuguese(Brazil)"]=array();
$fieldLabelsInforma__es_de_Fila["Portuguese(Brazil)"]["id_filas"] = "Identificação";


$tdataInforma__es_de_Fila=array();
	$tdataInforma__es_de_Fila[".NumberOfChars"]=80; 
	$tdataInforma__es_de_Fila[".ShortName"]="Informa__es_de_Fila";
	$tdataInforma__es_de_Fila[".OwnerID"]="";
	$tdataInforma__es_de_Fila[".OriginalTable"]="cc_receptivo_filas";
	$tdataInforma__es_de_Fila[".NCSearch"]=true;
	

$tdataInforma__es_de_Fila[".shortTableName"] = "Informa__es_de_Fila";
$tdataInforma__es_de_Fila[".dataSourceTable"] = "Informações de Fila";
$tdataInforma__es_de_Fila[".nSecOptions"] = 0;
$tdataInforma__es_de_Fila[".nLoginMethod"] = 1;
$tdataInforma__es_de_Fila[".recsPerRowList"] = 1;	
$tdataInforma__es_de_Fila[".tableGroupBy"] = "0";
$tdataInforma__es_de_Fila[".dbType"] = 0;
$tdataInforma__es_de_Fila[".mainTableOwnerID"] = "";
$tdataInforma__es_de_Fila[".moveNext"] = 1;

$tdataInforma__es_de_Fila[".listAjax"] = true;

	$tdataInforma__es_de_Fila[".audit"] = true;

	$tdataInforma__es_de_Fila[".locking"] = false;
	
$tdataInforma__es_de_Fila[".listIcons"] = true;




$tdataInforma__es_de_Fila[".showSimpleSearchOptions"] = false;

$tdataInforma__es_de_Fila[".showSearchPanel"] = true;


$tdataInforma__es_de_Fila[".isUseAjaxSuggest"] = true;

$tdataInforma__es_de_Fila[".rowHighlite"] = true;

$tdataInforma__es_de_Fila[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataInforma__es_de_Fila[".arrKeyFields"][] = "id_filas";

// use datepicker for search panel
$tdataInforma__es_de_Fila[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataInforma__es_de_Fila[".isUseTimeForSearch"] = false;






$tdataInforma__es_de_Fila[".isUseInlineJs"] = $tdataInforma__es_de_Fila[".isUseInlineAdd"] || $tdataInforma__es_de_Fila[".isUseInlineEdit"];

$tdataInforma__es_de_Fila[".allSearchFields"] = array();



$tdataInforma__es_de_Fila[".isDynamicPerm"] = true;

	

$tdataInforma__es_de_Fila[".isDisplayLoading"] = true;

$tdataInforma__es_de_Fila[".isResizeColumns"] = false;


$tdataInforma__es_de_Fila[".createLoginPage"] = true;


 	




$tdataInforma__es_de_Fila[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataInforma__es_de_Fila[".strOrderBy"] = $gstrOrderBy;
	
$tdataInforma__es_de_Fila[".orderindexes"] = array();

$tdataInforma__es_de_Fila[".sqlHead"] = "SELECT id_filas";

$tdataInforma__es_de_Fila[".sqlFrom"] = "FROM cc_receptivo_filas";

$tdataInforma__es_de_Fila[".sqlWhereExpr"] = "";

$tdataInforma__es_de_Fila[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_filas";
	$tdataInforma__es_de_Fila[".Keys"]=$tableKeys;

	
//	id_filas
	$fdata = array();
	$fdata["strName"] = "id_filas";
	$fdata["ownerTable"] = "cc_receptivo_filas";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_filas";
		$fdata["FullName"]= "id_filas";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataInforma__es_de_Fila["id_filas"]=$fdata;

	
$tables_data["Informações de Fila"]=&$tdataInforma__es_de_Fila;
$field_labels["Informa__es_de_Fila"] = &$fieldLabelsInforma__es_de_Fila;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Informações de Fila"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Informações de Fila"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1069=array();
$proto1069["m_strHead"] = "SELECT";
$proto1069["m_strFieldList"] = "id_filas";
$proto1069["m_strFrom"] = "FROM cc_receptivo_filas";
$proto1069["m_strWhere"] = "";
$proto1069["m_strOrderBy"] = "";
$proto1069["m_strTail"] = "";
$proto1070=array();
$proto1070["m_sql"] = "";
$proto1070["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1070["m_column"]=$obj;
$proto1070["m_contained"] = array();
$proto1070["m_strCase"] = "";
$proto1070["m_havingmode"] = "0";
$proto1070["m_inBrackets"] = "0";
$proto1070["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1070);

$proto1069["m_where"] = $obj;
$proto1072=array();
$proto1072["m_sql"] = "";
$proto1072["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1072["m_column"]=$obj;
$proto1072["m_contained"] = array();
$proto1072["m_strCase"] = "";
$proto1072["m_havingmode"] = "0";
$proto1072["m_inBrackets"] = "0";
$proto1072["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1072);

$proto1069["m_having"] = $obj;
$proto1069["m_fieldlist"] = array();
						$proto1074=array();
			$obj = new SQLField(array(
	"m_strName" => "id_filas",
	"m_strTable" => "cc_receptivo_filas"
));

$proto1074["m_expr"]=$obj;
$proto1074["m_alias"] = "";
$obj = new SQLFieldListItem($proto1074);

$proto1069["m_fieldlist"][]=$obj;
$proto1069["m_fromlist"] = array();
												$proto1076=array();
$proto1076["m_link"] = "SQLL_MAIN";
			$proto1077=array();
$proto1077["m_strName"] = "cc_receptivo_filas";
$proto1077["m_columns"] = array();
$proto1077["m_columns"][] = "id_filas";
$proto1077["m_columns"][] = "nm_fila";
$proto1077["m_columns"][] = "estrategia";
$proto1077["m_columns"][] = "gravacao";
$proto1077["m_columns"][] = "id_horario";
$proto1077["m_columns"][] = "arq_audio";
$proto1077["m_columns"][] = "arq_mesg";
$proto1077["m_columns"][] = "tp_toques";
$proto1077["m_columns"][] = "id_desvio";
$proto1077["m_columns"][] = "tp_excedido";
$proto1077["m_columns"][] = "acao_falta_agente";
$proto1077["m_columns"][] = "acao_tp_excedido";
$proto1077["m_columns"][] = "acao_fr_horario";
$proto1077["m_columns"][] = "ramal_remoto";
$proto1077["m_columns"][] = "seg_tmo";
$proto1077["m_columns"][] = "perc_tmo";
$proto1077["m_columns"][] = "seg_tma";
$proto1077["m_columns"][] = "perc_tma";
$proto1077["m_columns"][] = "seg_tme";
$proto1077["m_columns"][] = "perc_tme";
$proto1077["m_columns"][] = "tx_abandono";
$proto1077["m_columns"][] = "flg_estim_do_dia";
$proto1077["m_columns"][] = "tp_estimativa";
$proto1077["m_columns"][] = "id_name_gestor";
$obj = new SQLTable($proto1077);

$proto1076["m_table"] = $obj;
$proto1076["m_alias"] = "";
$proto1078=array();
$proto1078["m_sql"] = "";
$proto1078["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1078["m_column"]=$obj;
$proto1078["m_contained"] = array();
$proto1078["m_strCase"] = "";
$proto1078["m_havingmode"] = "0";
$proto1078["m_inBrackets"] = "0";
$proto1078["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1078);

$proto1076["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1076);

$proto1069["m_fromlist"][]=$obj;
$proto1069["m_groupby"] = array();
$proto1069["m_orderby"] = array();
$obj = new SQLQuery($proto1069);

$queryData_Informa__es_de_Fila = $obj;
$tdataInforma__es_de_Fila[".sqlquery"] = $queryData_Informa__es_de_Fila;



?>
