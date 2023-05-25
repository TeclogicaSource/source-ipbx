<?php

//	field labels
$fieldLabelsGraf__Perfil_Tempo_de_espera = array();
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]["Periodo"] = "Periodo";
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]["Tempo_de_Espera"] = "Tempo de Espera";
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]["Atendidas"] = "Atendidas";
$fieldLabelsGraf__Perfil_Tempo_de_espera["Portuguese(Brazil)"]["tp_espera"] = "Tp Espera";


$tdataGraf__Perfil_Tempo_de_espera=array();
	$tdataGraf__Perfil_Tempo_de_espera[".ShortName"]="Graf__Perfil_Tempo_de_espera";
	$tdataGraf__Perfil_Tempo_de_espera[".OwnerID"]="";
	$tdataGraf__Perfil_Tempo_de_espera[".OriginalTable"]="v_graf_perf_temp_espera";
	$tdataGraf__Perfil_Tempo_de_espera[".NCSearch"]=true;
	
	$tdataGraf__Perfil_Tempo_de_espera[".ChartRefreshTime"] = 0;

$tdataGraf__Perfil_Tempo_de_espera[".shortTableName"] = "Graf__Perfil_Tempo_de_espera";
$tdataGraf__Perfil_Tempo_de_espera[".dataSourceTable"] = "Graf. Perfil Tempo de espera";
$tdataGraf__Perfil_Tempo_de_espera[".nSecOptions"] = 0;
$tdataGraf__Perfil_Tempo_de_espera[".nLoginMethod"] = 1;
$tdataGraf__Perfil_Tempo_de_espera[".recsPerRowList"] = 1;	
$tdataGraf__Perfil_Tempo_de_espera[".tableGroupBy"] = "0";
$tdataGraf__Perfil_Tempo_de_espera[".dbType"] = 0;
$tdataGraf__Perfil_Tempo_de_espera[".mainTableOwnerID"] = "";
$tdataGraf__Perfil_Tempo_de_espera[".moveNext"] = 1;

$tdataGraf__Perfil_Tempo_de_espera[".listAjax"] = false;

	$tdataGraf__Perfil_Tempo_de_espera[".audit"] = false;

	$tdataGraf__Perfil_Tempo_de_espera[".locking"] = false;
	
$tdataGraf__Perfil_Tempo_de_espera[".listIcons"] = true;




$tdataGraf__Perfil_Tempo_de_espera[".showSimpleSearchOptions"] = false;

$tdataGraf__Perfil_Tempo_de_espera[".showSearchPanel"] = true;


$tdataGraf__Perfil_Tempo_de_espera[".isUseAjaxSuggest"] = true;


$tdataGraf__Perfil_Tempo_de_espera[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Perfil_Tempo_de_espera[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Perfil_Tempo_de_espera[".isUseTimeForSearch"] = false;





$tdataGraf__Perfil_Tempo_de_espera[".isUseInlineJs"] = $tdataGraf__Perfil_Tempo_de_espera[".isUseInlineAdd"] || $tdataGraf__Perfil_Tempo_de_espera[".isUseInlineEdit"];

$tdataGraf__Perfil_Tempo_de_espera[".allSearchFields"] = array();

$tdataGraf__Perfil_Tempo_de_espera[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataGraf__Perfil_Tempo_de_espera[".allSearchFields"]))
{
	$tdataGraf__Perfil_Tempo_de_espera[".allSearchFields"][] = "Fila";	
}
$tdataGraf__Perfil_Tempo_de_espera[".globSearchFields"][] = "Periodo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Periodo", $tdataGraf__Perfil_Tempo_de_espera[".allSearchFields"]))
{
	$tdataGraf__Perfil_Tempo_de_espera[".allSearchFields"][] = "Periodo";	
}


$tdataGraf__Perfil_Tempo_de_espera[".isDynamicPerm"] = true;

	

$tdataGraf__Perfil_Tempo_de_espera[".isDisplayLoading"] = true;

$tdataGraf__Perfil_Tempo_de_espera[".isResizeColumns"] = false;


$tdataGraf__Perfil_Tempo_de_espera[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY tp_espera";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Perfil_Tempo_de_espera[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Perfil_Tempo_de_espera[".orderindexes"] = array();

$tdataGraf__Perfil_Tempo_de_espera[".sqlHead"] = "SELECT Fila AS Fila,  `Mes/Ano` AS Periodo,  time_to_sec(tp_espera) AS `Tempo de Espera`,  qtd_atend AS Atendidas,  tp_espera AS tp_espera";

$tdataGraf__Perfil_Tempo_de_espera[".sqlFrom"] = "FROM v_graf_perf_temp_espera";

$tdataGraf__Perfil_Tempo_de_espera[".sqlWhereExpr"] = "";

$tdataGraf__Perfil_Tempo_de_espera[".sqlTail"] = "";



	$tableKeys=array();
	$tdataGraf__Perfil_Tempo_de_espera[".Keys"]=$tableKeys;

	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera";
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
	$fdata["LookupOrderBy"]="Fila";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Perfil_Tempo_de_espera["Fila"]=$fdata;
	
//	Periodo
	$fdata = array();
	$fdata["strName"] = "Periodo";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Periodo";
		$fdata["FullName"]= "`Mes/Ano`";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Perfil_Tempo_de_espera["Periodo"]=$fdata;
	
//	Tempo de Espera
	$fdata = array();
	$fdata["strName"] = "Tempo de Espera";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo_de_Espera";
		$fdata["FullName"]= "time_to_sec(tp_espera)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Perfil_Tempo_de_espera["Tempo de Espera"]=$fdata;
	
//	Atendidas
	$fdata = array();
	$fdata["strName"] = "Atendidas";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera";
				$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Atendidas";
		$fdata["FullName"]= "qtd_atend";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Perfil_Tempo_de_espera["Atendidas"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "v_graf_perf_temp_espera";
		$fdata["Label"]="Tp Espera"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
										$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataGraf__Perfil_Tempo_de_espera["tp_espera"]=$fdata;

$tdataGraf__Perfil_Tempo_de_espera[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Perfil Tempo de espera</attr>
</attr>
<attr value="chart_type">
	<attr value="type">line</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Atendidas</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">Tempo de Espera</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Quantidade Atendimento x Tempo de Espera por mes</attr>

<attr value="foot"></attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">true</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">1</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">20</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">Fila</attr>
		<attr value="label">Fila</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Periodo</attr>
		<attr value="label">Periodo</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Tempo de Espera</attr>
		<attr value="label">Tempo de Espera</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">Atendidas</attr>
		<attr value="label">Atendidas</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">tp_espera</attr>
		<attr value="label">Tp Espera</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">Fila</attr>
<attr value="short_table_name">Graf__Perfil_Tempo_de_espera</attr>
</attr>

</chart>';
	
$tables_data["Graf. Perfil Tempo de espera"]=&$tdataGraf__Perfil_Tempo_de_espera;
$field_labels["Graf__Perfil_Tempo_de_espera"] = &$fieldLabelsGraf__Perfil_Tempo_de_espera;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Perfil Tempo de espera"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Perfil Tempo de espera"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto65=array();
$proto65["m_strHead"] = "SELECT";
$proto65["m_strFieldList"] = "Fila AS Fila,  `Mes/Ano` AS Periodo,  time_to_sec(tp_espera) AS `Tempo de Espera`,  qtd_atend AS Atendidas,  tp_espera AS tp_espera";
$proto65["m_strFrom"] = "FROM v_graf_perf_temp_espera";
$proto65["m_strWhere"] = "";
$proto65["m_strOrderBy"] = "ORDER BY tp_espera";
$proto65["m_strTail"] = "";
$proto66=array();
$proto66["m_sql"] = "";
$proto66["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto66["m_column"]=$obj;
$proto66["m_contained"] = array();
$proto66["m_strCase"] = "";
$proto66["m_havingmode"] = "0";
$proto66["m_inBrackets"] = "0";
$proto66["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto66);

$proto65["m_where"] = $obj;
$proto68=array();
$proto68["m_sql"] = "";
$proto68["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto68["m_column"]=$obj;
$proto68["m_contained"] = array();
$proto68["m_strCase"] = "";
$proto68["m_havingmode"] = "0";
$proto68["m_inBrackets"] = "0";
$proto68["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto68);

$proto65["m_having"] = $obj;
$proto65["m_fieldlist"] = array();
						$proto70=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_graf_perf_temp_espera"
));

$proto70["m_expr"]=$obj;
$proto70["m_alias"] = "Fila";
$obj = new SQLFieldListItem($proto70);

$proto65["m_fieldlist"][]=$obj;
						$proto72=array();
			$obj = new SQLField(array(
	"m_strName" => "Mes/Ano",
	"m_strTable" => "v_graf_perf_temp_espera"
));

$proto72["m_expr"]=$obj;
$proto72["m_alias"] = "Periodo";
$obj = new SQLFieldListItem($proto72);

$proto65["m_fieldlist"][]=$obj;
						$proto74=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "time_to_sec(tp_espera)"
));

$proto74["m_expr"]=$obj;
$proto74["m_alias"] = "Tempo de Espera";
$obj = new SQLFieldListItem($proto74);

$proto65["m_fieldlist"][]=$obj;
						$proto76=array();
			$obj = new SQLField(array(
	"m_strName" => "qtd_atend",
	"m_strTable" => "v_graf_perf_temp_espera"
));

$proto76["m_expr"]=$obj;
$proto76["m_alias"] = "Atendidas";
$obj = new SQLFieldListItem($proto76);

$proto65["m_fieldlist"][]=$obj;
						$proto78=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "v_graf_perf_temp_espera"
));

$proto78["m_expr"]=$obj;
$proto78["m_alias"] = "tp_espera";
$obj = new SQLFieldListItem($proto78);

$proto65["m_fieldlist"][]=$obj;
$proto65["m_fromlist"] = array();
												$proto80=array();
$proto80["m_link"] = "SQLL_MAIN";
			$proto81=array();
$proto81["m_strName"] = "v_graf_perf_temp_espera";
$proto81["m_columns"] = array();
$proto81["m_columns"][] = "Fila";
$proto81["m_columns"][] = "Mes/Ano";
$proto81["m_columns"][] = "tp_espera";
$proto81["m_columns"][] = "qtd_atend";
$obj = new SQLTable($proto81);

$proto80["m_table"] = $obj;
$proto80["m_alias"] = "";
$proto82=array();
$proto82["m_sql"] = "";
$proto82["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto82["m_column"]=$obj;
$proto82["m_contained"] = array();
$proto82["m_strCase"] = "";
$proto82["m_havingmode"] = "0";
$proto82["m_inBrackets"] = "0";
$proto82["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto82);

$proto80["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto80);

$proto65["m_fromlist"][]=$obj;
$proto65["m_groupby"] = array();
$proto65["m_orderby"] = array();
												$proto84=array();
						$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "v_graf_perf_temp_espera"
));

$proto84["m_column"]=$obj;
$proto84["m_bAsc"] = 1;
$proto84["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto84);

$proto65["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto65);

$queryData_Graf__Perfil_Tempo_de_espera = $obj;
$tdataGraf__Perfil_Tempo_de_espera[".sqlquery"] = $queryData_Graf__Perfil_Tempo_de_espera;



?>
