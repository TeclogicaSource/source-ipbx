<?php

//	field labels
$fieldLabelsGraf__Custo = array();
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataGraf__Custo=array();
	$tdataGraf__Custo[".ShortName"]="Graf__Custo";
	$tdataGraf__Custo[".OwnerID"]="";
	$tdataGraf__Custo[".OriginalTable"]="conta";
	$tdataGraf__Custo[".NCSearch"]=true;
	
	$tdataGraf__Custo[".ChartRefreshTime"] = 0;

$tdataGraf__Custo[".shortTableName"] = "Graf__Custo";
$tdataGraf__Custo[".dataSourceTable"] = "Graf. Custo Trad";
$tdataGraf__Custo[".nSecOptions"] = 0;
$tdataGraf__Custo[".nLoginMethod"] = 1;
$tdataGraf__Custo[".recsPerRowList"] = 1;	
$tdataGraf__Custo[".tableGroupBy"] = "1";
$tdataGraf__Custo[".dbType"] = 0;
$tdataGraf__Custo[".mainTableOwnerID"] = "";
$tdataGraf__Custo[".moveNext"] = 1;

$tdataGraf__Custo[".listAjax"] = true;

	$tdataGraf__Custo[".audit"] = false;

	$tdataGraf__Custo[".locking"] = false;
	
$tdataGraf__Custo[".listIcons"] = true;




$tdataGraf__Custo[".showSimpleSearchOptions"] = false;

$tdataGraf__Custo[".showSearchPanel"] = true;


$tdataGraf__Custo[".isUseAjaxSuggest"] = true;


$tdataGraf__Custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Custo[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Custo[".isUseTimeForSearch"] = false;





$tdataGraf__Custo[".isUseInlineJs"] = $tdataGraf__Custo[".isUseInlineAdd"] || $tdataGraf__Custo[".isUseInlineEdit"];

$tdataGraf__Custo[".allSearchFields"] = array();



$tdataGraf__Custo[".isDynamicPerm"] = true;

	

$tdataGraf__Custo[".isDisplayLoading"] = true;

$tdataGraf__Custo[".isResizeColumns"] = false;


$tdataGraf__Custo[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo[".orderindexes"] = array();

$tdataGraf__Custo[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo[".sqlWhereExpr"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (2,8))";

$tdataGraf__Custo[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



	$tableKeys=array();
	$tdataGraf__Custo[".Keys"]=$tableKeys;

	
//	DATA
	$fdata = array();
	$fdata["strName"] = "DATA";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATA";
		$fdata["FullName"]= "DATE_FORMAT(ct.calldate,'%m-%Y')";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["DATA"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo (R\$)"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(ct.custo))";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["custo"]=$fdata;
	
//	Minutos
	$fdata = array();
	$fdata["strName"] = "Minutos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Minutos";
		$fdata["FullName"]= "round(sum(ct.duracao/60))";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["Minutos"]=$fdata;
	
//	DATE_FORMAT(conta.calldate,'%Y')
	$fdata = array();
	$fdata["strName"] = "DATE_FORMAT(conta.calldate,'%Y')";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="DATE FORMAT(conta.calldate, '%Y')"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATE_FORMAT_conta_calldate___Y__";
		$fdata["FullName"]= "DATE_FORMAT(ct.calldate,'%Y')";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
//	DATE_FORMAT(conta.calldate,'%m')
	$fdata = array();
	$fdata["strName"] = "DATE_FORMAT(conta.calldate,'%m')";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="DATE FORMAT(conta.calldate, '%m')"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATE_FORMAT_conta_calldate___m__";
		$fdata["FullName"]= "DATE_FORMAT(ct.calldate,'%m')";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataGraf__Custo[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Custo Trad</attr>
</attr>
<attr value="chart_type">
	<attr value="type">area</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">custo</attr>
<attr value="currencyFormat">1</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">DATA</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Custo linha tradicional</attr>

<attr value="foot">Custo Mensal</attr>

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
<attr value="autoupmin">1</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">DATA</attr>
		<attr value="label">DATA</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">custo</attr>
		<attr value="label">Custo (R$)</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Minutos</attr>
		<attr value="label">Minutos</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">DATE_FORMAT(conta.calldate,&apos;%Y&apos;)</attr>
		<attr value="label">DATE FORMAT(conta.calldate, &apos;%Y&apos;)</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">DATE_FORMAT(conta.calldate,&apos;%m&apos;)</attr>
		<attr value="label">DATE FORMAT(conta.calldate, &apos;%m&apos;)</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">DATA</attr>
<attr value="short_table_name">Graf__Custo</attr>
</attr>

</chart>';
	
$tables_data["Graf. Custo Trad"]=&$tdataGraf__Custo;
$field_labels["Graf__Custo_Trad"] = &$fieldLabelsGraf__Custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Custo Trad"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Custo Trad"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto356=array();
$proto356["m_strHead"] = "select";
$proto356["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto356["m_strFrom"] = "FROM conta AS ct";
$proto356["m_strWhere"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (2,8))";
$proto356["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto356["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto357=array();
$proto357["m_sql"] = "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (2,8)";
$proto357["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf"
));

$proto357["m_column"]=$obj;
$proto357["m_contained"] = array();
$proto357["m_strCase"] = "= ct.id_interf   in (2,8)";
$proto357["m_havingmode"] = "0";
$proto357["m_inBrackets"] = "0";
$proto357["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto357);

$proto356["m_where"] = $obj;
$proto359=array();
$proto359["m_sql"] = "";
$proto359["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto359["m_column"]=$obj;
$proto359["m_contained"] = array();
$proto359["m_strCase"] = "";
$proto359["m_havingmode"] = "0";
$proto359["m_inBrackets"] = "0";
$proto359["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto359);

$proto356["m_having"] = $obj;
$proto356["m_fieldlist"] = array();
						$proto361=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto361["m_expr"]=$obj;
$proto361["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto361);

$proto356["m_fieldlist"][]=$obj;
						$proto363=array();
			$proto364=array();
$proto364["m_functiontype"] = "SQLF_CUSTOM";
$proto364["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto364["m_arguments"][]=$obj;
$proto364["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto364);

$proto363["m_expr"]=$obj;
$proto363["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto363);

$proto356["m_fieldlist"][]=$obj;
						$proto366=array();
			$proto367=array();
$proto367["m_functiontype"] = "SQLF_CUSTOM";
$proto367["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto367["m_arguments"][]=$obj;
$proto367["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto367);

$proto366["m_expr"]=$obj;
$proto366["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto366);

$proto356["m_fieldlist"][]=$obj;
						$proto369=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto369["m_expr"]=$obj;
$proto369["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto369);

$proto356["m_fieldlist"][]=$obj;
						$proto371=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto371["m_expr"]=$obj;
$proto371["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto371);

$proto356["m_fieldlist"][]=$obj;
$proto356["m_fromlist"] = array();
												$proto373=array();
$proto373["m_link"] = "SQLL_MAIN";
			$proto374=array();
$proto374["m_strName"] = "conta";
$proto374["m_columns"] = array();
$proto374["m_columns"][] = "id_conta";
$proto374["m_columns"][] = "idt_custo";
$proto374["m_columns"][] = "origem";
$proto374["m_columns"][] = "destino";
$proto374["m_columns"][] = "duracao";
$proto374["m_columns"][] = "custo";
$proto374["m_columns"][] = "calldate";
$proto374["m_columns"][] = "uniqueid";
$proto374["m_columns"][] = "id_interf";
$proto374["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto374);

$proto373["m_table"] = $obj;
$proto373["m_alias"] = "ct";
$proto375=array();
$proto375["m_sql"] = "";
$proto375["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto375["m_column"]=$obj;
$proto375["m_contained"] = array();
$proto375["m_strCase"] = "";
$proto375["m_havingmode"] = "0";
$proto375["m_inBrackets"] = "0";
$proto375["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto375);

$proto373["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto373);

$proto356["m_fromlist"][]=$obj;
$proto356["m_groupby"] = array();
												$proto377=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto377["m_column"]=$obj;
$obj = new SQLGroupByItem($proto377);

$proto356["m_groupby"][]=$obj;
$proto356["m_orderby"] = array();
												$proto379=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto379["m_column"]=$obj;
$proto379["m_bAsc"] = 1;
$proto379["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto379);

$proto356["m_orderby"][]=$obj;					
												$proto381=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto381["m_column"]=$obj;
$proto381["m_bAsc"] = 1;
$proto381["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto381);

$proto356["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto356);

$queryData_Graf__Custo = $obj;
$tdataGraf__Custo[".sqlquery"] = $queryData_Graf__Custo;



?>
