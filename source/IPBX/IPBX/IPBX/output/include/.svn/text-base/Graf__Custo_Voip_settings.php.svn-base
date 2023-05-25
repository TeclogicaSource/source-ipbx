<?php

//	field labels
$fieldLabelsGraf__Custo_Voip = array();
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsGraf__Custo_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
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


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo_Voip[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo_Voip[".orderindexes"] = array();

$tdataGraf__Custo_Voip[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo_Voip[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo_Voip[".sqlWhereExpr"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1))";

$tdataGraf__Custo_Voip[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



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
		$fdata["FullName"]= "DATE_FORMAT(ct.calldate,'%m-%Y')";
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
			
									$tdataGraf__Custo_Voip["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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










$proto329=array();
$proto329["m_strHead"] = "select";
$proto329["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto329["m_strFrom"] = "FROM conta AS ct";
$proto329["m_strWhere"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1))";
$proto329["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto329["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto330=array();
$proto330["m_sql"] = "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (1)";
$proto330["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "select  id_tp_interf  FROM ipbx_interf  WHERE id_interf"
));

$proto330["m_column"]=$obj;
$proto330["m_contained"] = array();
$proto330["m_strCase"] = "= ct.id_interf   in (1)";
$proto330["m_havingmode"] = "0";
$proto330["m_inBrackets"] = "0";
$proto330["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto330);

$proto329["m_where"] = $obj;
$proto332=array();
$proto332["m_sql"] = "";
$proto332["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto332["m_column"]=$obj;
$proto332["m_contained"] = array();
$proto332["m_strCase"] = "";
$proto332["m_havingmode"] = "0";
$proto332["m_inBrackets"] = "0";
$proto332["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto332);

$proto329["m_having"] = $obj;
$proto329["m_fieldlist"] = array();
						$proto334=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto334["m_expr"]=$obj;
$proto334["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto334);

$proto329["m_fieldlist"][]=$obj;
						$proto336=array();
			$proto337=array();
$proto337["m_functiontype"] = "SQLF_CUSTOM";
$proto337["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto337["m_arguments"][]=$obj;
$proto337["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto337);

$proto336["m_expr"]=$obj;
$proto336["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto336);

$proto329["m_fieldlist"][]=$obj;
						$proto339=array();
			$proto340=array();
$proto340["m_functiontype"] = "SQLF_CUSTOM";
$proto340["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto340["m_arguments"][]=$obj;
$proto340["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto340);

$proto339["m_expr"]=$obj;
$proto339["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto339);

$proto329["m_fieldlist"][]=$obj;
						$proto342=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto342["m_expr"]=$obj;
$proto342["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto342);

$proto329["m_fieldlist"][]=$obj;
						$proto344=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto344["m_expr"]=$obj;
$proto344["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto344);

$proto329["m_fieldlist"][]=$obj;
$proto329["m_fromlist"] = array();
												$proto346=array();
$proto346["m_link"] = "SQLL_MAIN";
			$proto347=array();
$proto347["m_strName"] = "conta";
$proto347["m_columns"] = array();
$proto347["m_columns"][] = "id_conta";
$proto347["m_columns"][] = "idt_custo";
$proto347["m_columns"][] = "origem";
$proto347["m_columns"][] = "destino";
$proto347["m_columns"][] = "duracao";
$proto347["m_columns"][] = "custo";
$proto347["m_columns"][] = "calldate";
$proto347["m_columns"][] = "uniqueid";
$proto347["m_columns"][] = "id_interf";
$proto347["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto347);

$proto346["m_table"] = $obj;
$proto346["m_alias"] = "ct";
$proto348=array();
$proto348["m_sql"] = "";
$proto348["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto348["m_column"]=$obj;
$proto348["m_contained"] = array();
$proto348["m_strCase"] = "";
$proto348["m_havingmode"] = "0";
$proto348["m_inBrackets"] = "0";
$proto348["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto348);

$proto346["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto346);

$proto329["m_fromlist"][]=$obj;
$proto329["m_groupby"] = array();
												$proto350=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto350["m_column"]=$obj;
$obj = new SQLGroupByItem($proto350);

$proto329["m_groupby"][]=$obj;
$proto329["m_orderby"] = array();
												$proto352=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto352["m_column"]=$obj;
$proto352["m_bAsc"] = 1;
$proto352["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto352);

$proto329["m_orderby"][]=$obj;					
												$proto354=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto354["m_column"]=$obj;
$proto354["m_bAsc"] = 1;
$proto354["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto354);

$proto329["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto329);

$queryData_Graf__Custo_Voip = $obj;
$tdataGraf__Custo_Voip[".sqlquery"] = $queryData_Graf__Custo_Voip;



?>
