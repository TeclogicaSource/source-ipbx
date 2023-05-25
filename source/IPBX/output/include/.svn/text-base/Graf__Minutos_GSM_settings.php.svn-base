<?php

//	field labels
$fieldLabelsGraf__Minutos_GSM = array();
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
$fieldLabelsGraf__Minutos_GSM["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataGraf__Minutos_GSM=array();
	$tdataGraf__Minutos_GSM[".ShortName"]="Graf__Minutos_GSM";
	$tdataGraf__Minutos_GSM[".OwnerID"]="";
	$tdataGraf__Minutos_GSM[".OriginalTable"]="conta";
	$tdataGraf__Minutos_GSM[".NCSearch"]=true;
	
	$tdataGraf__Minutos_GSM[".ChartRefreshTime"] = 0;

$tdataGraf__Minutos_GSM[".shortTableName"] = "Graf__Minutos_GSM";
$tdataGraf__Minutos_GSM[".dataSourceTable"] = "Graf. Minutagem GSM";
$tdataGraf__Minutos_GSM[".nSecOptions"] = 0;
$tdataGraf__Minutos_GSM[".nLoginMethod"] = 1;
$tdataGraf__Minutos_GSM[".recsPerRowList"] = 1;	
$tdataGraf__Minutos_GSM[".tableGroupBy"] = "1";
$tdataGraf__Minutos_GSM[".dbType"] = 0;
$tdataGraf__Minutos_GSM[".mainTableOwnerID"] = "";
$tdataGraf__Minutos_GSM[".moveNext"] = 1;

$tdataGraf__Minutos_GSM[".listAjax"] = true;

	$tdataGraf__Minutos_GSM[".audit"] = false;

	$tdataGraf__Minutos_GSM[".locking"] = false;
	
$tdataGraf__Minutos_GSM[".listIcons"] = true;




$tdataGraf__Minutos_GSM[".showSimpleSearchOptions"] = false;

$tdataGraf__Minutos_GSM[".showSearchPanel"] = true;


$tdataGraf__Minutos_GSM[".isUseAjaxSuggest"] = true;


$tdataGraf__Minutos_GSM[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Minutos_GSM[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Minutos_GSM[".isUseTimeForSearch"] = false;





$tdataGraf__Minutos_GSM[".isUseInlineJs"] = $tdataGraf__Minutos_GSM[".isUseInlineAdd"] || $tdataGraf__Minutos_GSM[".isUseInlineEdit"];

$tdataGraf__Minutos_GSM[".allSearchFields"] = array();



$tdataGraf__Minutos_GSM[".isDynamicPerm"] = true;

	

$tdataGraf__Minutos_GSM[".isDisplayLoading"] = true;

$tdataGraf__Minutos_GSM[".isResizeColumns"] = false;


$tdataGraf__Minutos_GSM[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y') desc, DATE_FORMAT(ct.calldate,'%m') desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Minutos_GSM[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Minutos_GSM[".orderindexes"] = array();

$tdataGraf__Minutos_GSM[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Minutos_GSM[".sqlFrom"] = "FROM conta AS ct  , ipbx_interf AS ii";

$tdataGraf__Minutos_GSM[".sqlWhereExpr"] = "(ct.id_interf = ii.id_interf) AND (ii.id_tp_interf in (3))";

$tdataGraf__Minutos_GSM[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



	$tableKeys=array();
	$tdataGraf__Minutos_GSM[".Keys"]=$tableKeys;

	
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
			
									$tdataGraf__Minutos_GSM["DATA"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(ct.custo))";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Minutos_GSM["custo"]=$fdata;
	
//	Minutos
	$fdata = array();
	$fdata["strName"] = "Minutos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Minutos";
		$fdata["FullName"]= "round(sum(ct.duracao/60))";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Minutos_GSM["Minutos"]=$fdata;
	
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
			
									$tdataGraf__Minutos_GSM["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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
			
									$tdataGraf__Minutos_GSM["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataGraf__Minutos_GSM[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Minutagem GSM</attr>
</attr>
<attr value="chart_type">
	<attr value="type">area</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Minutos</attr>
<attr value="currencyFormat">0</attr>
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

<attr value="head">Minutagem linha GSM</attr>

<attr value="foot">Minutos Mensais</attr>

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
		<attr value="label">Custo</attr>
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
<attr value="short_table_name">Graf__Minutos_GSM</attr>
</attr>

</chart>';
	
$tables_data["Graf. Minutagem GSM"]=&$tdataGraf__Minutos_GSM;
$field_labels["Graf__Minutagem_GSM"] = &$fieldLabelsGraf__Minutos_GSM;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Minutagem GSM"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Minutagem GSM"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto124=array();
$proto124["m_strHead"] = "select";
$proto124["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto124["m_strFrom"] = "FROM conta AS ct  , ipbx_interf AS ii";
$proto124["m_strWhere"] = "(ct.id_interf = ii.id_interf) AND (ii.id_tp_interf in (3))";
$proto124["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y') desc, DATE_FORMAT(ct.calldate,'%m') desc";
$proto124["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto125=array();
$proto125["m_sql"] = "(ct.id_interf = ii.id_interf) AND (ii.id_tp_interf in (3))";
$proto125["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(ct.id_interf = ii.id_interf) AND (ii.id_tp_interf in (3))"
));

$proto125["m_column"]=$obj;
$proto125["m_contained"] = array();
						$proto127=array();
$proto127["m_sql"] = "ct.id_interf = ii.id_interf";
$proto127["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto127["m_column"]=$obj;
$proto127["m_contained"] = array();
$proto127["m_strCase"] = "= ii.id_interf";
$proto127["m_havingmode"] = "0";
$proto127["m_inBrackets"] = "1";
$proto127["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto127);

			$proto125["m_contained"][]=$obj;
						$proto129=array();
$proto129["m_sql"] = "ii.id_tp_interf in (3)";
$proto129["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ii"
));

$proto129["m_column"]=$obj;
$proto129["m_contained"] = array();
$proto129["m_strCase"] = "in (3)";
$proto129["m_havingmode"] = "0";
$proto129["m_inBrackets"] = "1";
$proto129["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto129);

			$proto125["m_contained"][]=$obj;
$proto125["m_strCase"] = "";
$proto125["m_havingmode"] = "0";
$proto125["m_inBrackets"] = "0";
$proto125["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto125);

$proto124["m_where"] = $obj;
$proto131=array();
$proto131["m_sql"] = "";
$proto131["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto131["m_column"]=$obj;
$proto131["m_contained"] = array();
$proto131["m_strCase"] = "";
$proto131["m_havingmode"] = "0";
$proto131["m_inBrackets"] = "0";
$proto131["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto131);

$proto124["m_having"] = $obj;
$proto124["m_fieldlist"] = array();
						$proto133=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto133["m_expr"]=$obj;
$proto133["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto133);

$proto124["m_fieldlist"][]=$obj;
						$proto135=array();
			$proto136=array();
$proto136["m_functiontype"] = "SQLF_CUSTOM";
$proto136["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto136["m_arguments"][]=$obj;
$proto136["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto136);

$proto135["m_expr"]=$obj;
$proto135["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto135);

$proto124["m_fieldlist"][]=$obj;
						$proto138=array();
			$proto139=array();
$proto139["m_functiontype"] = "SQLF_CUSTOM";
$proto139["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto139["m_arguments"][]=$obj;
$proto139["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto139);

$proto138["m_expr"]=$obj;
$proto138["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto138);

$proto124["m_fieldlist"][]=$obj;
						$proto141=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto141["m_expr"]=$obj;
$proto141["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto141);

$proto124["m_fieldlist"][]=$obj;
						$proto143=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto143["m_expr"]=$obj;
$proto143["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto143);

$proto124["m_fieldlist"][]=$obj;
$proto124["m_fromlist"] = array();
												$proto145=array();
$proto145["m_link"] = "SQLL_MAIN";
			$proto146=array();
$proto146["m_strName"] = "conta";
$proto146["m_columns"] = array();
$proto146["m_columns"][] = "id_conta";
$proto146["m_columns"][] = "idt_custo";
$proto146["m_columns"][] = "origem";
$proto146["m_columns"][] = "destino";
$proto146["m_columns"][] = "duracao";
$proto146["m_columns"][] = "custo";
$proto146["m_columns"][] = "calldate";
$proto146["m_columns"][] = "uniqueid";
$proto146["m_columns"][] = "id_interf";
$proto146["m_columns"][] = "id_contrato";
$proto146["m_columns"][] = "mes_referencia";
$proto146["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto146);

$proto145["m_table"] = $obj;
$proto145["m_alias"] = "ct";
$proto147=array();
$proto147["m_sql"] = "";
$proto147["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto147["m_column"]=$obj;
$proto147["m_contained"] = array();
$proto147["m_strCase"] = "";
$proto147["m_havingmode"] = "0";
$proto147["m_inBrackets"] = "0";
$proto147["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto147);

$proto145["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto145);

$proto124["m_fromlist"][]=$obj;
												$proto149=array();
$proto149["m_link"] = "SQLL_CROSSJOIN";
			$proto150=array();
$proto150["m_strName"] = "ipbx_interf";
$proto150["m_columns"] = array();
$proto150["m_columns"][] = "id_interf";
$proto150["m_columns"][] = "dsc_interf";
$proto150["m_columns"][] = "id_contrato";
$proto150["m_columns"][] = "board";
$proto150["m_columns"][] = "link";
$proto150["m_columns"][] = "usuario";
$proto150["m_columns"][] = "senha";
$proto150["m_columns"][] = "ip_host";
$proto150["m_columns"][] = "id_central";
$proto150["m_columns"][] = "codec";
$proto150["m_columns"][] = "id_tp_interf";
$proto150["m_columns"][] = "tp_chamada";
$proto150["m_columns"][] = "piloto";
$proto150["m_columns"][] = "id_chamada";
$proto150["m_columns"][] = "flg_id_cham_parc";
$proto150["m_columns"][] = "dtmf";
$proto150["m_columns"][] = "ddd_localidade";
$proto150["m_columns"][] = "cd_operadora";
$proto150["m_columns"][] = "khomp_interf";
$proto150["m_columns"][] = "flg_logon_remoto";
$proto150["m_columns"][] = "pers_params";
$proto150["m_columns"][] = "registro";
$proto150["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto150);

$proto149["m_table"] = $obj;
$proto149["m_alias"] = "ii";
$proto151=array();
$proto151["m_sql"] = "";
$proto151["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto151["m_column"]=$obj;
$proto151["m_contained"] = array();
$proto151["m_strCase"] = "";
$proto151["m_havingmode"] = "0";
$proto151["m_inBrackets"] = "0";
$proto151["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto151);

$proto149["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto149);

$proto124["m_fromlist"][]=$obj;
$proto124["m_groupby"] = array();
												$proto153=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto153["m_column"]=$obj;
$obj = new SQLGroupByItem($proto153);

$proto124["m_groupby"][]=$obj;
$proto124["m_orderby"] = array();
												$proto155=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y') "
));

$proto155["m_column"]=$obj;
$proto155["m_bAsc"] = 0;
$proto155["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto155);

$proto124["m_orderby"][]=$obj;					
												$proto157=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m') "
));

$proto157["m_column"]=$obj;
$proto157["m_bAsc"] = 0;
$proto157["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto157);

$proto124["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto124);

$queryData_Graf__Minutos_GSM = $obj;
$tdataGraf__Minutos_GSM[".sqlquery"] = $queryData_Graf__Minutos_GSM;



?>
