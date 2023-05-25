<?php

//	field labels
$fieldLabelsAtendimento__Mensal_ = array();
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]=array();
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Data"] = "Mês/Ano";
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Atendimentos"] = "Atendimentos";
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Abandonos"] = "Abandonos";
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Mes"] = "Mês";
$fieldLabelsAtendimento__Mensal_["Portuguese(Brazil)"]["Ano"] = "Ano";


$tdataAtendimento__Mensal_=array();
	$tdataAtendimento__Mensal_[".ShortName"]="Atendimento__Mensal_";
	$tdataAtendimento__Mensal_[".OwnerID"]="";
	$tdataAtendimento__Mensal_[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataAtendimento__Mensal_[".NCSearch"]=true;
	
	$tdataAtendimento__Mensal_[".ChartRefreshTime"] = 0;

$tdataAtendimento__Mensal_[".shortTableName"] = "Atendimento__Mensal_";
$tdataAtendimento__Mensal_[".dataSourceTable"] = "Graf. Atendimento (Mensal)";
$tdataAtendimento__Mensal_[".nSecOptions"] = 0;
$tdataAtendimento__Mensal_[".nLoginMethod"] = 1;
$tdataAtendimento__Mensal_[".recsPerRowList"] = 1;	
$tdataAtendimento__Mensal_[".tableGroupBy"] = "1";
$tdataAtendimento__Mensal_[".dbType"] = 0;
$tdataAtendimento__Mensal_[".mainTableOwnerID"] = "";
$tdataAtendimento__Mensal_[".moveNext"] = 1;

$tdataAtendimento__Mensal_[".listAjax"] = true;

	$tdataAtendimento__Mensal_[".audit"] = false;

	$tdataAtendimento__Mensal_[".locking"] = false;
	
$tdataAtendimento__Mensal_[".listIcons"] = true;




$tdataAtendimento__Mensal_[".showSimpleSearchOptions"] = false;

$tdataAtendimento__Mensal_[".showSearchPanel"] = true;


$tdataAtendimento__Mensal_[".isUseAjaxSuggest"] = true;


$tdataAtendimento__Mensal_[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataAtendimento__Mensal_[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataAtendimento__Mensal_[".isUseTimeForSearch"] = false;





$tdataAtendimento__Mensal_[".isUseInlineJs"] = $tdataAtendimento__Mensal_[".isUseInlineAdd"] || $tdataAtendimento__Mensal_[".isUseInlineEdit"];

$tdataAtendimento__Mensal_[".allSearchFields"] = array();

$tdataAtendimento__Mensal_[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataAtendimento__Mensal_[".allSearchFields"]))
{
	$tdataAtendimento__Mensal_[".allSearchFields"][] = "Fila";	
}
$tdataAtendimento__Mensal_[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataAtendimento__Mensal_[".allSearchFields"]))
{
	$tdataAtendimento__Mensal_[".allSearchFields"][] = "Mes";	
}
$tdataAtendimento__Mensal_[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataAtendimento__Mensal_[".allSearchFields"]))
{
	$tdataAtendimento__Mensal_[".allSearchFields"][] = "Ano";	
}


$tdataAtendimento__Mensal_[".isDynamicPerm"] = true;

	

$tdataAtendimento__Mensal_[".isDisplayLoading"] = true;

$tdataAtendimento__Mensal_[".isResizeColumns"] = false;


$tdataAtendimento__Mensal_[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(dt_entrada,'%m-%Y') DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataAtendimento__Mensal_[".strOrderBy"] = $gstrOrderBy;
	
$tdataAtendimento__Mensal_[".orderindexes"] = array();

$tdataAtendimento__Mensal_[".sqlHead"] = "SELECT DATE_FORMAT(dt_entrada,'%m-%Y') AS `Data`,  Fila,  DATE_FORMAT(dt_entrada,'%m') AS Mes,  DATE_FORMAT(dt_entrada,'%Y') AS Ano,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";

$tdataAtendimento__Mensal_[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdataAtendimento__Mensal_[".sqlWhereExpr"] = "";

$tdataAtendimento__Mensal_[".sqlTail"] = "GROUP BY Data";



	$tableKeys=array();
	$tdataAtendimento__Mensal_[".Keys"]=$tableKeys;

	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Mês/Ano"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "DATE_FORMAT(dt_entrada,'%m-%Y')";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
									$tdataAtendimento__Mensal_["Data"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
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
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento__Mensal_["Fila"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Mês"; 
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
		$fdata["FullName"]= "DATE_FORMAT(dt_entrada,'%m')";
						$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento__Mensal_["Mes"]=$fdata;
	
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
		$fdata["FullName"]= "DATE_FORMAT(dt_entrada,'%Y')";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAtendimento__Mensal_["Ano"]=$fdata;
	
//	Atendimentos
	$fdata = array();
	$fdata["strName"] = "Atendimentos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Atendimentos";
		$fdata["FullName"]= "COUNT(hr_atendimento)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
									$tdataAtendimento__Mensal_["Atendimentos"]=$fdata;
	
//	Abandonos
	$fdata = array();
	$fdata["strName"] = "Abandonos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Abandonos";
		$fdata["FullName"]= "COUNT(hr_abandono)";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
									$tdataAtendimento__Mensal_["Abandonos"]=$fdata;

$tdataAtendimento__Mensal_[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Atendimento (Mensal)</attr>
</attr>
<attr value="chart_type">
	<attr value="type">2d_column</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Atendimentos</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">Abandonos</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="2">
<attr value="name">Data</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">005500</attr>
	<attr value="scolor12">005500</attr>
	<attr value="scolor21">FF0000</attr>
	<attr value="scolor22">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Atendimento Mensal</attr>

<attr value="foot">Chamadas</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">FFFFFF</attr>
<attr value="color72">FFFFFF</attr>
<attr value="color81">FFFFFF</attr>
<attr value="color82">FFFFFF</attr>
<attr value="color91">FFFFFF</attr>
<attr value="color92">FFFFFF</attr>
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
<attr value="isstacked">1</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">12</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">Data</attr>
		<attr value="label">Mês/Ano</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Fila</attr>
		<attr value="label">Fila</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Mes</attr>
		<attr value="label">Mês</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">Ano</attr>
		<attr value="label">Ano</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">Atendimentos</attr>
		<attr value="label">Atendimentos</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="5">
		<attr value="name">Abandonos</attr>
		<attr value="label">Abandonos</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">Data</attr>
<attr value="short_table_name">Atendimento__Mensal_</attr>
</attr>

</chart>';
	
$tables_data["Graf. Atendimento (Mensal)"]=&$tdataAtendimento__Mensal_;
$field_labels["Graf__Atendimento__Mensal_"] = &$fieldLabelsAtendimento__Mensal_;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Atendimento (Mensal)"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Atendimento (Mensal)"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto383=array();
$proto383["m_strHead"] = "SELECT";
$proto383["m_strFieldList"] = "DATE_FORMAT(dt_entrada,'%m-%Y') AS `Data`,  Fila,  DATE_FORMAT(dt_entrada,'%m') AS Mes,  DATE_FORMAT(dt_entrada,'%Y') AS Ano,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";
$proto383["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto383["m_strWhere"] = "";
$proto383["m_strOrderBy"] = "ORDER BY DATE_FORMAT(dt_entrada,'%m-%Y') DESC";
$proto383["m_strTail"] = "GROUP BY Data";
$proto384=array();
$proto384["m_sql"] = "";
$proto384["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto384["m_column"]=$obj;
$proto384["m_contained"] = array();
$proto384["m_strCase"] = "";
$proto384["m_havingmode"] = "0";
$proto384["m_inBrackets"] = "0";
$proto384["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto384);

$proto383["m_where"] = $obj;
$proto386=array();
$proto386["m_sql"] = "";
$proto386["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto386["m_column"]=$obj;
$proto386["m_contained"] = array();
$proto386["m_strCase"] = "";
$proto386["m_havingmode"] = "0";
$proto386["m_inBrackets"] = "0";
$proto386["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto386);

$proto383["m_having"] = $obj;
$proto383["m_fieldlist"] = array();
						$proto388=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,'%m-%Y')"
));

$proto388["m_expr"]=$obj;
$proto388["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto388);

$proto383["m_fieldlist"][]=$obj;
						$proto390=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto390["m_expr"]=$obj;
$proto390["m_alias"] = "";
$obj = new SQLFieldListItem($proto390);

$proto383["m_fieldlist"][]=$obj;
						$proto392=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,'%m')"
));

$proto392["m_expr"]=$obj;
$proto392["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto392);

$proto383["m_fieldlist"][]=$obj;
						$proto394=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,'%Y')"
));

$proto394["m_expr"]=$obj;
$proto394["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto394);

$proto383["m_fieldlist"][]=$obj;
						$proto396=array();
			$proto397=array();
$proto397["m_functiontype"] = "SQLF_COUNT";
$proto397["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto397["m_arguments"][]=$obj;
$proto397["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto397);

$proto396["m_expr"]=$obj;
$proto396["m_alias"] = "Atendimentos";
$obj = new SQLFieldListItem($proto396);

$proto383["m_fieldlist"][]=$obj;
						$proto399=array();
			$proto400=array();
$proto400["m_functiontype"] = "SQLF_COUNT";
$proto400["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto400["m_arguments"][]=$obj;
$proto400["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto400);

$proto399["m_expr"]=$obj;
$proto399["m_alias"] = "Abandonos";
$obj = new SQLFieldListItem($proto399);

$proto383["m_fieldlist"][]=$obj;
$proto383["m_fromlist"] = array();
												$proto402=array();
$proto402["m_link"] = "SQLL_MAIN";
			$proto403=array();
$proto403["m_strName"] = "cc_receptivo_filas_atend";
$proto403["m_columns"] = array();
$proto403["m_columns"][] = "chave";
$proto403["m_columns"][] = "dt_entrada";
$proto403["m_columns"][] = "hr_entrada";
$proto403["m_columns"][] = "Fila";
$proto403["m_columns"][] = "Agente";
$proto403["m_columns"][] = "hr_atendimento";
$proto403["m_columns"][] = "hr_abandono";
$proto403["m_columns"][] = "tp_espera";
$proto403["m_columns"][] = "tp_atendimento";
$proto403["m_columns"][] = "Telefone";
$proto403["m_columns"][] = "ps_entrada";
$proto403["m_columns"][] = "ps_abandono";
$proto403["m_columns"][] = "tel_trans";
$proto403["m_columns"][] = "dsl_motiv";
$proto403["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto403);

$proto402["m_table"] = $obj;
$proto402["m_alias"] = "";
$proto404=array();
$proto404["m_sql"] = "";
$proto404["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto404["m_column"]=$obj;
$proto404["m_contained"] = array();
$proto404["m_strCase"] = "";
$proto404["m_havingmode"] = "0";
$proto404["m_inBrackets"] = "0";
$proto404["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto404);

$proto402["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto402);

$proto383["m_fromlist"][]=$obj;
$proto383["m_groupby"] = array();
												$proto406=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Data"
));

$proto406["m_column"]=$obj;
$obj = new SQLGroupByItem($proto406);

$proto383["m_groupby"][]=$obj;
$proto383["m_orderby"] = array();
												$proto408=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(dt_entrada,'%m-%Y') "
));

$proto408["m_column"]=$obj;
$proto408["m_bAsc"] = 0;
$proto408["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto408);

$proto383["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto383);

$queryData_Atendimento__Mensal_ = $obj;
$tdataAtendimento__Mensal_[".sqlquery"] = $queryData_Atendimento__Mensal_;



?>
