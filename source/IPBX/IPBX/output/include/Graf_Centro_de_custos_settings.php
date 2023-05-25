<?php

//	field labels
$fieldLabelsGraf_Centro_de_custos = array();
$fieldLabelsGraf_Centro_de_custos["Portuguese(Brazil)"]=array();
$fieldLabelsGraf_Centro_de_custos["Portuguese(Brazil)"]["dsc_centro_cust"] = "Dsc Centro Cust";
$fieldLabelsGraf_Centro_de_custos["Portuguese(Brazil)"]["_Valor_Custo_"] = "\"Valor Custo\"";


$tdataGraf_Centro_de_custos=array();
	$tdataGraf_Centro_de_custos[".ShortName"]="Graf_Centro_de_custos";
	$tdataGraf_Centro_de_custos[".OwnerID"]="";
	$tdataGraf_Centro_de_custos[".OriginalTable"]="conta";
	$tdataGraf_Centro_de_custos[".NCSearch"]=true;
	
	$tdataGraf_Centro_de_custos[".ChartRefreshTime"] = 0;

$tdataGraf_Centro_de_custos[".shortTableName"] = "Graf_Centro_de_custos";
$tdataGraf_Centro_de_custos[".dataSourceTable"] = "Graf Centro de custos";
$tdataGraf_Centro_de_custos[".nSecOptions"] = 0;
$tdataGraf_Centro_de_custos[".nLoginMethod"] = 1;
$tdataGraf_Centro_de_custos[".recsPerRowList"] = 1;	
$tdataGraf_Centro_de_custos[".tableGroupBy"] = "1";
$tdataGraf_Centro_de_custos[".dbType"] = 0;
$tdataGraf_Centro_de_custos[".mainTableOwnerID"] = "";
$tdataGraf_Centro_de_custos[".moveNext"] = 1;

$tdataGraf_Centro_de_custos[".listAjax"] = false;

	$tdataGraf_Centro_de_custos[".audit"] = false;

	$tdataGraf_Centro_de_custos[".locking"] = false;
	
$tdataGraf_Centro_de_custos[".listIcons"] = true;




$tdataGraf_Centro_de_custos[".showSimpleSearchOptions"] = false;

$tdataGraf_Centro_de_custos[".showSearchPanel"] = true;


$tdataGraf_Centro_de_custos[".isUseAjaxSuggest"] = true;



// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf_Centro_de_custos[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf_Centro_de_custos[".isUseTimeForSearch"] = false;





$tdataGraf_Centro_de_custos[".isUseInlineJs"] = $tdataGraf_Centro_de_custos[".isUseInlineAdd"] || $tdataGraf_Centro_de_custos[".isUseInlineEdit"];

$tdataGraf_Centro_de_custos[".allSearchFields"] = array();



$tdataGraf_Centro_de_custos[".isDynamicPerm"] = true;

	

$tdataGraf_Centro_de_custos[".isDisplayLoading"] = true;

$tdataGraf_Centro_de_custos[".isResizeColumns"] = false;


$tdataGraf_Centro_de_custos[".createLoginPage"] = true;


 	



$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf_Centro_de_custos[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf_Centro_de_custos[".orderindexes"] = array();

$tdataGraf_Centro_de_custos[".sqlHead"] = "SELECT centrocusto.dsc_centro_cust,  round(sum(conta.custo)/60) AS `\"Valor Custo\"`";

$tdataGraf_Centro_de_custos[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataGraf_Centro_de_custos[".sqlWhereExpr"] = "";

$tdataGraf_Centro_de_custos[".sqlTail"] = "GROUP BY 1";



	$tableKeys=array();
	$tdataGraf_Centro_de_custos[".Keys"]=$tableKeys;

	
//	dsc_centro_cust
	$fdata = array();
	$fdata["strName"] = "dsc_centro_cust";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Dsc Centro Cust"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataGraf_Centro_de_custos["dsc_centro_cust"]=$fdata;
	
//	"Valor Custo"
	$fdata = array();
	$fdata["strName"] = "\"Valor Custo\"";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "_Valor_Custo_";
		$fdata["FullName"]= "round(sum(conta.custo)/60)";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGraf_Centro_de_custos["\"Valor Custo\""]=$fdata;

$tdataGraf_Centro_de_custos[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf Centro de custos</attr>
</attr>
<attr value="chart_type">
	<attr value="type">2d_doughnut</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">&quot;Valor Custo&quot;</attr>
<attr value="currencyFormat">1</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">dsc_centro_cust</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Centro de custo</attr>

<attr value="foot">Legendas</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">7FFFD4</attr>
<attr value="color82">7FFFD4</attr>
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
<attr value="sgrid">true</attr>
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
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">dsc_centro_cust</attr>
		<attr value="label">Dsc Centro Cust</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">&quot;Valor Custo&quot;</attr>
		<attr value="label">&quot;Valor Custo&quot;</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">dsc_centro_cust</attr>
<attr value="short_table_name">Graf_Centro_de_custos</attr>
</attr>

</chart>';
	
$tables_data["Graf Centro de custos"]=&$tdataGraf_Centro_de_custos;
$field_labels["Graf_Centro_de_custos"] = &$fieldLabelsGraf_Centro_de_custos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf Centro de custos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf Centro de custos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "centrocusto.dsc_centro_cust,  round(sum(conta.custo)/60) AS `\"Valor Custo\"`";
$proto0["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY 1";
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_functiontype"] = "SQLF_CUSTOM";
$proto8["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)/60"
));

$proto8["m_arguments"][]=$obj;
$proto8["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "\"Valor Custo\"";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto10=array();
$proto10["m_link"] = "SQLL_MAIN";
			$proto11=array();
$proto11["m_strName"] = "conta";
$proto11["m_columns"] = array();
$proto11["m_columns"][] = "id_conta";
$proto11["m_columns"][] = "idt_custo";
$proto11["m_columns"][] = "origem";
$proto11["m_columns"][] = "destino";
$proto11["m_columns"][] = "duracao";
$proto11["m_columns"][] = "custo";
$proto11["m_columns"][] = "calldate";
$proto11["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto11);

$proto10["m_table"] = $obj;
$proto10["m_alias"] = "";
$proto12=array();
$proto12["m_sql"] = "";
$proto12["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto12["m_column"]=$obj;
$proto12["m_contained"] = array();
$proto12["m_strCase"] = "";
$proto12["m_havingmode"] = "0";
$proto12["m_inBrackets"] = "0";
$proto12["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto12);

$proto10["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto10);

$proto0["m_fromlist"][]=$obj;
												$proto14=array();
$proto14["m_link"] = "SQLL_INNERJOIN";
			$proto15=array();
$proto15["m_strName"] = "centrocusto";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "idt_custo";
$proto15["m_columns"][] = "dsc_centro_cust";
$proto15["m_columns"][] = "idt_colab";
$proto15["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_alias"] = "";
$proto16=array();
$proto16["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "= centrocusto.idt_custo";
$proto16["m_havingmode"] = "0";
$proto16["m_inBrackets"] = "0";
$proto16["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto16);

$proto14["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto14);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto18=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "1"
));

$proto18["m_column"]=$obj;
$obj = new SQLGroupByItem($proto18);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

$queryData_Graf_Centro_de_custos = $obj;
$tdataGraf_Centro_de_custos[".sqlquery"] = $queryData_Graf_Centro_de_custos;



?>
