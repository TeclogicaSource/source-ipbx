<?php

//	field labels
$fieldLabelsGraf__Custo_Voip = array();
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "Ano";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "Mes";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataGraf__Custo_Voip=array();
	$tdataGraf__Custo_Voip[".ShortName"]="Graf__Custo_Voip";
	$tdataGraf__Custo_Voip[".OwnerID"]="";
	$tdataGraf__Custo_Voip[".OriginalTable"]="cdr";
	$tdataGraf__Custo_Voip[".NCSearch"]=true;
	
	$tdataGraf__Custo_Voip[".ChartRefreshTime"] = 0;

$tdataGraf__Custo_Voip[".shortTableName"] = "Graf__Custo_Voip";
$tdataGraf__Custo_Voip[".dataSourceTable"] = "Graf. Custo Voip";
$tdataGraf__Custo_Voip[".nSecOptions"] = 0;
$tdataGraf__Custo_Voip[".nLoginMethod"] = 1;
$tdataGraf__Custo_Voip[".recsPerRowList"] = 1;	
$tdataGraf__Custo_Voip[".tableGroupBy"] = "1";
$tdataGraf__Custo_Voip[".dbType"] = 0;
$tdataGraf__Custo_Voip[".mainTableOwnerID"] = "";
$tdataGraf__Custo_Voip[".moveNext"] = 1;

$tdataGraf__Custo_Voip[".listAjax"] = true;

	$tdataGraf__Custo_Voip[".audit"] = false;

	$tdataGraf__Custo_Voip[".locking"] = false;
	
$tdataGraf__Custo_Voip[".listIcons"] = true;




$tdataGraf__Custo_Voip[".showSimpleSearchOptions"] = false;

$tdataGraf__Custo_Voip[".showSearchPanel"] = true;


$tdataGraf__Custo_Voip[".isUseAjaxSuggest"] = true;


$tdataGraf__Custo_Voip[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Custo_Voip[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Custo_Voip[".isUseTimeForSearch"] = false;





$tdataGraf__Custo_Voip[".isUseInlineJs"] = $tdataGraf__Custo_Voip[".isUseInlineAdd"] || $tdataGraf__Custo_Voip[".isUseInlineEdit"];

$tdataGraf__Custo_Voip[".allSearchFields"] = array();



$tdataGraf__Custo_Voip[".isDynamicPerm"] = true;

	

$tdataGraf__Custo_Voip[".isDisplayLoading"] = true;

$tdataGraf__Custo_Voip[".isResizeColumns"] = false;


$tdataGraf__Custo_Voip[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY ano_referencia desc, mes_referencia desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo_Voip[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo_Voip[".orderindexes"] = array();

$tdataGraf__Custo_Voip[".sqlHead"] = "select concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo_Voip[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo_Voip[".sqlWhereExpr"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1))";

$tdataGraf__Custo_Voip[".sqlTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";



	$tableKeys=array();
	$tdataGraf__Custo_Voip[".Keys"]=$tableKeys;

	
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
			
									$tdataGraf__Custo_Voip["DATA"]=$fdata;
	
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
			
									$tdataGraf__Custo_Voip["custo"]=$fdata;
	
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
			
									$tdataGraf__Custo_Voip["Minutos"]=$fdata;
	
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
			
									$tdataGraf__Custo_Voip["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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
			
									$tdataGraf__Custo_Voip["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataGraf__Custo_Voip[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Custo Voip</attr>
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

<attr value="head">Custo  linha VoIP</attr>

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
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
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
<attr value="short_table_name">Graf__Custo_Voip</attr>
</attr>

</chart>';
	
$tables_data["Graf. Custo Voip"]=&$tdataGraf__Custo_Voip;
$field_labels["Graf__Custo_Voip"] = &$fieldLabelsGraf__Custo_Voip;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Custo Voip"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Custo Voip"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto359=array();
$proto359["m_strHead"] = "select";
$proto359["m_strFieldList"] = "concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto359["m_strFrom"] = "FROM conta AS ct";
$proto359["m_strWhere"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1))";
$proto359["m_strOrderBy"] = "ORDER BY ano_referencia desc, mes_referencia desc";
$proto359["m_strTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";
$proto360=array();
$proto360["m_sql"] = "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1)";
$proto360["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf"
));

$proto360["m_column"]=$obj;
$proto360["m_contained"] = array();
$proto360["m_strCase"] = "= ct.id_interf   in (1)";
$proto360["m_havingmode"] = "0";
$proto360["m_inBrackets"] = "0";
$proto360["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto360);

$proto359["m_where"] = $obj;
$proto362=array();
$proto362["m_sql"] = "";
$proto362["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto362["m_column"]=$obj;
$proto362["m_contained"] = array();
$proto362["m_strCase"] = "";
$proto362["m_havingmode"] = "0";
$proto362["m_inBrackets"] = "0";
$proto362["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto362);

$proto359["m_having"] = $obj;
$proto359["m_fieldlist"] = array();
						$proto364=array();
			$proto365=array();
$proto365["m_functiontype"] = "SQLF_CUSTOM";
$proto365["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto365["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto365["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto365["m_arguments"][]=$obj;
$proto365["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto365);

$proto364["m_expr"]=$obj;
$proto364["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto364);

$proto359["m_fieldlist"][]=$obj;
						$proto369=array();
			$proto370=array();
$proto370["m_functiontype"] = "SQLF_CUSTOM";
$proto370["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto370["m_arguments"][]=$obj;
$proto370["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto370);

$proto369["m_expr"]=$obj;
$proto369["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto369);

$proto359["m_fieldlist"][]=$obj;
						$proto372=array();
			$proto373=array();
$proto373["m_functiontype"] = "SQLF_CUSTOM";
$proto373["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto373["m_arguments"][]=$obj;
$proto373["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto373);

$proto372["m_expr"]=$obj;
$proto372["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto372);

$proto359["m_fieldlist"][]=$obj;
						$proto375=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto375["m_expr"]=$obj;
$proto375["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto375);

$proto359["m_fieldlist"][]=$obj;
						$proto377=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto377["m_expr"]=$obj;
$proto377["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto377);

$proto359["m_fieldlist"][]=$obj;
$proto359["m_fromlist"] = array();
												$proto379=array();
$proto379["m_link"] = "SQLL_MAIN";
			$proto380=array();
$proto380["m_strName"] = "conta";
$proto380["m_columns"] = array();
$proto380["m_columns"][] = "id_conta";
$proto380["m_columns"][] = "idt_custo";
$proto380["m_columns"][] = "origem";
$proto380["m_columns"][] = "destino";
$proto380["m_columns"][] = "duracao";
$proto380["m_columns"][] = "custo";
$proto380["m_columns"][] = "calldate";
$proto380["m_columns"][] = "uniqueid";
$proto380["m_columns"][] = "id_interf";
$proto380["m_columns"][] = "id_contrato";
$proto380["m_columns"][] = "mes_referencia";
$proto380["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto380);

$proto379["m_table"] = $obj;
$proto379["m_alias"] = "ct";
$proto381=array();
$proto381["m_sql"] = "";
$proto381["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto381["m_column"]=$obj;
$proto381["m_contained"] = array();
$proto381["m_strCase"] = "";
$proto381["m_havingmode"] = "0";
$proto381["m_inBrackets"] = "0";
$proto381["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto381);

$proto379["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto379);

$proto359["m_fromlist"][]=$obj;
$proto359["m_groupby"] = array();
												$proto383=array();
						$proto384=array();
$proto384["m_functiontype"] = "SQLF_CUSTOM";
$proto384["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto384["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto384["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto384["m_arguments"][]=$obj;
$proto384["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto384);

$proto383["m_column"]=$obj;
$obj = new SQLGroupByItem($proto383);

$proto359["m_groupby"][]=$obj;
$proto359["m_orderby"] = array();
												$proto388=array();
						$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto388["m_column"]=$obj;
$proto388["m_bAsc"] = 0;
$proto388["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto388);

$proto359["m_orderby"][]=$obj;					
												$proto390=array();
						$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto390["m_column"]=$obj;
$proto390["m_bAsc"] = 0;
$proto390["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto390);

$proto359["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto359);

$queryData_Graf__Custo_Voip = $obj;
$tdataGraf__Custo_Voip[".sqlquery"] = $queryData_Graf__Custo_Voip;



?>
