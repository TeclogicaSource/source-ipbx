<?php

//	field labels
$fieldLabelsGraf__Atendimento = array();
$fieldLabelsGraf__Atendimento["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Atendimento["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsGraf__Atendimento["Portuguese(Brazil)"]["dt_entrada"] = "Data";
$fieldLabelsGraf__Atendimento["Portuguese(Brazil)"]["Atendimentos"] = "Atendimentos";
$fieldLabelsGraf__Atendimento["Portuguese(Brazil)"]["Abandonos"] = "Abandonos";


$tdataGraf__Atendimento=array();
	$tdataGraf__Atendimento[".ShortName"]="Graf__Atendimento";
	$tdataGraf__Atendimento[".OwnerID"]="";
	$tdataGraf__Atendimento[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdataGraf__Atendimento[".NCSearch"]=true;
	
	$tdataGraf__Atendimento[".ChartRefreshTime"] = 0;

$tdataGraf__Atendimento[".shortTableName"] = "Graf__Atendimento";
$tdataGraf__Atendimento[".dataSourceTable"] = "Graf. Atendimento";
$tdataGraf__Atendimento[".nSecOptions"] = 0;
$tdataGraf__Atendimento[".nLoginMethod"] = 1;
$tdataGraf__Atendimento[".recsPerRowList"] = 1;	
$tdataGraf__Atendimento[".tableGroupBy"] = "1";
$tdataGraf__Atendimento[".dbType"] = 0;
$tdataGraf__Atendimento[".mainTableOwnerID"] = "";
$tdataGraf__Atendimento[".moveNext"] = 1;

$tdataGraf__Atendimento[".listAjax"] = true;

	$tdataGraf__Atendimento[".audit"] = false;

	$tdataGraf__Atendimento[".locking"] = false;
	
$tdataGraf__Atendimento[".listIcons"] = true;




$tdataGraf__Atendimento[".showSimpleSearchOptions"] = false;

$tdataGraf__Atendimento[".showSearchPanel"] = true;


$tdataGraf__Atendimento[".isUseAjaxSuggest"] = true;


$tdataGraf__Atendimento[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Atendimento[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataGraf__Atendimento[".isUseTimeForSearch"] = false;





$tdataGraf__Atendimento[".isUseInlineJs"] = $tdataGraf__Atendimento[".isUseInlineAdd"] || $tdataGraf__Atendimento[".isUseInlineEdit"];

$tdataGraf__Atendimento[".allSearchFields"] = array();

$tdataGraf__Atendimento[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataGraf__Atendimento[".allSearchFields"]))
{
	$tdataGraf__Atendimento[".allSearchFields"][] = "dt_entrada";	
}
$tdataGraf__Atendimento[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataGraf__Atendimento[".allSearchFields"]))
{
	$tdataGraf__Atendimento[".allSearchFields"][] = "Fila";	
}
$tdataGraf__Atendimento[".globSearchFields"][] = "Atendimentos";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Atendimentos", $tdataGraf__Atendimento[".allSearchFields"]))
{
	$tdataGraf__Atendimento[".allSearchFields"][] = "Atendimentos";	
}
$tdataGraf__Atendimento[".globSearchFields"][] = "Abandonos";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Abandonos", $tdataGraf__Atendimento[".allSearchFields"]))
{
	$tdataGraf__Atendimento[".allSearchFields"][] = "Abandonos";	
}


$tdataGraf__Atendimento[".isDynamicPerm"] = true;

	

$tdataGraf__Atendimento[".isDisplayLoading"] = true;

$tdataGraf__Atendimento[".isResizeColumns"] = false;


$tdataGraf__Atendimento[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY dt_entrada DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Atendimento[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Atendimento[".orderindexes"] = array();

$tdataGraf__Atendimento[".sqlHead"] = "SELECT dt_entrada,  Fila,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";

$tdataGraf__Atendimento[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdataGraf__Atendimento[".sqlWhereExpr"] = "";

$tdataGraf__Atendimento[".sqlTail"] = "GROUP BY dt_entrada";



	$tableKeys=array();
	$tdataGraf__Atendimento[".Keys"]=$tableKeys;

	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Atendimento["dt_entrada"]=$fdata;
	
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
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Atendimento["Fila"]=$fdata;
	
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
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Atendimento["Atendimentos"]=$fdata;
	
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
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataGraf__Atendimento["Abandonos"]=$fdata;

$tdataGraf__Atendimento[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Atendimento</attr>
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
<attr value="name">dt_entrada</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">005500</attr>
	<attr value="scolor12">005500</attr>
	<attr value="scolor21">FF0000</attr>
	<attr value="scolor22">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Atendimento diário</attr>

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
<attr value="color101">000000</attr>
<attr value="color102">000000</attr>
<attr value="color111">000000</attr>
<attr value="color112">000000</attr>
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
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">dt_entrada</attr>
		<attr value="label">Data</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Fila</attr>
		<attr value="label">Fila</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Atendimentos</attr>
		<attr value="label">Atendimentos</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">Abandonos</attr>
		<attr value="label">Abandonos</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">dt_entrada</attr>
<attr value="short_table_name">Graf__Atendimento</attr>
</attr>

</chart>';
	
$tables_data["Graf. Atendimento"]=&$tdataGraf__Atendimento;
$field_labels["Graf__Atendimento"] = &$fieldLabelsGraf__Atendimento;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Atendimento"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Atendimento"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto452=array();
$proto452["m_strHead"] = "SELECT";
$proto452["m_strFieldList"] = "dt_entrada,  Fila,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";
$proto452["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto452["m_strWhere"] = "";
$proto452["m_strOrderBy"] = "ORDER BY dt_entrada DESC";
$proto452["m_strTail"] = "GROUP BY dt_entrada";
$proto453=array();
$proto453["m_sql"] = "";
$proto453["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto453["m_column"]=$obj;
$proto453["m_contained"] = array();
$proto453["m_strCase"] = "";
$proto453["m_havingmode"] = "0";
$proto453["m_inBrackets"] = "0";
$proto453["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto453);

$proto452["m_where"] = $obj;
$proto455=array();
$proto455["m_sql"] = "";
$proto455["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto455["m_column"]=$obj;
$proto455["m_contained"] = array();
$proto455["m_strCase"] = "";
$proto455["m_havingmode"] = "0";
$proto455["m_inBrackets"] = "0";
$proto455["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto455);

$proto452["m_having"] = $obj;
$proto452["m_fieldlist"] = array();
						$proto457=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto457["m_expr"]=$obj;
$proto457["m_alias"] = "";
$obj = new SQLFieldListItem($proto457);

$proto452["m_fieldlist"][]=$obj;
						$proto459=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto459["m_expr"]=$obj;
$proto459["m_alias"] = "";
$obj = new SQLFieldListItem($proto459);

$proto452["m_fieldlist"][]=$obj;
						$proto461=array();
			$proto462=array();
$proto462["m_functiontype"] = "SQLF_COUNT";
$proto462["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto462["m_arguments"][]=$obj;
$proto462["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto462);

$proto461["m_expr"]=$obj;
$proto461["m_alias"] = "Atendimentos";
$obj = new SQLFieldListItem($proto461);

$proto452["m_fieldlist"][]=$obj;
						$proto464=array();
			$proto465=array();
$proto465["m_functiontype"] = "SQLF_COUNT";
$proto465["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto465["m_arguments"][]=$obj;
$proto465["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto465);

$proto464["m_expr"]=$obj;
$proto464["m_alias"] = "Abandonos";
$obj = new SQLFieldListItem($proto464);

$proto452["m_fieldlist"][]=$obj;
$proto452["m_fromlist"] = array();
												$proto467=array();
$proto467["m_link"] = "SQLL_MAIN";
			$proto468=array();
$proto468["m_strName"] = "cc_receptivo_filas_atend";
$proto468["m_columns"] = array();
$proto468["m_columns"][] = "chave";
$proto468["m_columns"][] = "dt_entrada";
$proto468["m_columns"][] = "hr_entrada";
$proto468["m_columns"][] = "Fila";
$proto468["m_columns"][] = "Agente";
$proto468["m_columns"][] = "hr_atendimento";
$proto468["m_columns"][] = "hr_abandono";
$proto468["m_columns"][] = "tp_espera";
$proto468["m_columns"][] = "tp_atendimento";
$proto468["m_columns"][] = "Telefone";
$proto468["m_columns"][] = "ps_entrada";
$proto468["m_columns"][] = "ps_abandono";
$proto468["m_columns"][] = "tel_trans";
$proto468["m_columns"][] = "dsl_motiv";
$proto468["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto468);

$proto467["m_table"] = $obj;
$proto467["m_alias"] = "";
$proto469=array();
$proto469["m_sql"] = "";
$proto469["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto469["m_column"]=$obj;
$proto469["m_contained"] = array();
$proto469["m_strCase"] = "";
$proto469["m_havingmode"] = "0";
$proto469["m_inBrackets"] = "0";
$proto469["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto469);

$proto467["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto467);

$proto452["m_fromlist"][]=$obj;
$proto452["m_groupby"] = array();
												$proto471=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto471["m_column"]=$obj;
$obj = new SQLGroupByItem($proto471);

$proto452["m_groupby"][]=$obj;
$proto452["m_orderby"] = array();
												$proto473=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto473["m_column"]=$obj;
$proto473["m_bAsc"] = 0;
$proto473["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto473);

$proto452["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto452);

$queryData_Graf__Atendimento = $obj;
$tdataGraf__Atendimento[".sqlquery"] = $queryData_Graf__Atendimento;



?>
