<?php

//	field labels
$fieldLabelsGraf__Custo = array();
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "Ano";
$fieldLabelsGraf__Custo["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "Mes";
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


 	



$gstrOrderBy = "ORDER BY ano_referencia desc, mes_referencia desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo[".orderindexes"] = array();

$tdataGraf__Custo[".sqlHead"] = "select concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo[".sqlWhereExpr"] = "id_interf in (select id_interf FROM ipbx_interf WHERE id_tp_interf in (2,8))";

$tdataGraf__Custo[".sqlTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";



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
		$fdata["FullName"]= "concat(mes_referencia,'-',ano_referencia)";
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
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Ano"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATE_FORMAT_conta_calldate___Y__";
		$fdata["FullName"]= "ano_referencia";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
//	DATE_FORMAT(conta.calldate,'%m')
	$fdata = array();
	$fdata["strName"] = "DATE_FORMAT(conta.calldate,'%m')";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Mes"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DATE_FORMAT_conta_calldate___m__";
		$fdata["FullName"]= "mes_referencia";
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
<attr value="maxbarscroll">24</attr>
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
		<attr value="label">Ano</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">DATE_FORMAT(conta.calldate,&apos;%m&apos;)</attr>
		<attr value="label">Mes</attr>
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










$proto392=array();
$proto392["m_strHead"] = "select";
$proto392["m_strFieldList"] = "concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto392["m_strFrom"] = "FROM conta AS ct";
$proto392["m_strWhere"] = "id_interf in (select id_interf FROM ipbx_interf WHERE id_tp_interf in (2,8))";
$proto392["m_strOrderBy"] = "ORDER BY ano_referencia desc, mes_referencia desc";
$proto392["m_strTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";
$proto393=array();
$proto393["m_sql"] = "id_interf in (select id_interf FROM ipbx_interf WHERE id_tp_interf in (2,8))";
$proto393["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto393["m_column"]=$obj;
$proto393["m_contained"] = array();
$proto393["m_strCase"] = "in (select id_interf FROM ipbx_interf WHERE id_tp_interf in (2,8))";
$proto393["m_havingmode"] = "0";
$proto393["m_inBrackets"] = "0";
$proto393["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto393);

$proto392["m_where"] = $obj;
$proto395=array();
$proto395["m_sql"] = "";
$proto395["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto395["m_column"]=$obj;
$proto395["m_contained"] = array();
$proto395["m_strCase"] = "";
$proto395["m_havingmode"] = "0";
$proto395["m_inBrackets"] = "0";
$proto395["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto395);

$proto392["m_having"] = $obj;
$proto392["m_fieldlist"] = array();
						$proto397=array();
			$proto398=array();
$proto398["m_functiontype"] = "SQLF_CUSTOM";
$proto398["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto398["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto398["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto398["m_arguments"][]=$obj;
$proto398["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto398);

$proto397["m_expr"]=$obj;
$proto397["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto397);

$proto392["m_fieldlist"][]=$obj;
						$proto402=array();
			$proto403=array();
$proto403["m_functiontype"] = "SQLF_CUSTOM";
$proto403["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto403["m_arguments"][]=$obj;
$proto403["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto403);

$proto402["m_expr"]=$obj;
$proto402["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto402);

$proto392["m_fieldlist"][]=$obj;
						$proto405=array();
			$proto406=array();
$proto406["m_functiontype"] = "SQLF_CUSTOM";
$proto406["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto406["m_arguments"][]=$obj;
$proto406["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto406);

$proto405["m_expr"]=$obj;
$proto405["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto405);

$proto392["m_fieldlist"][]=$obj;
						$proto408=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto408["m_expr"]=$obj;
$proto408["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto408);

$proto392["m_fieldlist"][]=$obj;
						$proto410=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto410["m_expr"]=$obj;
$proto410["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto410);

$proto392["m_fieldlist"][]=$obj;
$proto392["m_fromlist"] = array();
												$proto412=array();
$proto412["m_link"] = "SQLL_MAIN";
			$proto413=array();
$proto413["m_strName"] = "conta";
$proto413["m_columns"] = array();
$proto413["m_columns"][] = "id_conta";
$proto413["m_columns"][] = "idt_custo";
$proto413["m_columns"][] = "origem";
$proto413["m_columns"][] = "destino";
$proto413["m_columns"][] = "duracao";
$proto413["m_columns"][] = "custo";
$proto413["m_columns"][] = "calldate";
$proto413["m_columns"][] = "uniqueid";
$proto413["m_columns"][] = "id_interf";
$proto413["m_columns"][] = "id_contrato";
$proto413["m_columns"][] = "mes_referencia";
$proto413["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto413);

$proto412["m_table"] = $obj;
$proto412["m_alias"] = "ct";
$proto414=array();
$proto414["m_sql"] = "";
$proto414["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto414["m_column"]=$obj;
$proto414["m_contained"] = array();
$proto414["m_strCase"] = "";
$proto414["m_havingmode"] = "0";
$proto414["m_inBrackets"] = "0";
$proto414["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto414);

$proto412["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto412);

$proto392["m_fromlist"][]=$obj;
$proto392["m_groupby"] = array();
												$proto416=array();
						$proto417=array();
$proto417["m_functiontype"] = "SQLF_CUSTOM";
$proto417["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto417["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto417["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto417["m_arguments"][]=$obj;
$proto417["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto417);

$proto416["m_column"]=$obj;
$obj = new SQLGroupByItem($proto416);

$proto392["m_groupby"][]=$obj;
$proto392["m_orderby"] = array();
												$proto421=array();
						$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto421["m_column"]=$obj;
$proto421["m_bAsc"] = 0;
$proto421["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto421);

$proto392["m_orderby"][]=$obj;					
												$proto423=array();
						$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto423["m_column"]=$obj;
$proto423["m_bAsc"] = 0;
$proto423["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto423);

$proto392["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto392);

$queryData_Graf__Custo = $obj;
$tdataGraf__Custo[".sqlquery"] = $queryData_Graf__Custo;



?>
