<?php

//	field labels
$fieldLabelsGraf__Custo_GSM = array();
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "Ano";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "Mes";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataGraf__Custo_GSM=array();
	$tdataGraf__Custo_GSM[".ShortName"]="Graf__Custo_GSM";
	$tdataGraf__Custo_GSM[".OwnerID"]="";
	$tdataGraf__Custo_GSM[".OriginalTable"]="conta";
	$tdataGraf__Custo_GSM[".NCSearch"]=true;
	
	$tdataGraf__Custo_GSM[".ChartRefreshTime"] = 0;

$tdataGraf__Custo_GSM[".shortTableName"] = "Graf__Custo_GSM";
$tdataGraf__Custo_GSM[".dataSourceTable"] = "Graf. Custo GSM";
$tdataGraf__Custo_GSM[".nSecOptions"] = 0;
$tdataGraf__Custo_GSM[".nLoginMethod"] = 1;
$tdataGraf__Custo_GSM[".recsPerRowList"] = 1;	
$tdataGraf__Custo_GSM[".tableGroupBy"] = "1";
$tdataGraf__Custo_GSM[".dbType"] = 0;
$tdataGraf__Custo_GSM[".mainTableOwnerID"] = "";
$tdataGraf__Custo_GSM[".moveNext"] = 1;

$tdataGraf__Custo_GSM[".listAjax"] = true;

	$tdataGraf__Custo_GSM[".audit"] = false;

	$tdataGraf__Custo_GSM[".locking"] = false;
	
$tdataGraf__Custo_GSM[".listIcons"] = true;




$tdataGraf__Custo_GSM[".showSimpleSearchOptions"] = false;

$tdataGraf__Custo_GSM[".showSearchPanel"] = true;


$tdataGraf__Custo_GSM[".isUseAjaxSuggest"] = true;


$tdataGraf__Custo_GSM[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Custo_GSM[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Custo_GSM[".isUseTimeForSearch"] = false;





$tdataGraf__Custo_GSM[".isUseInlineJs"] = $tdataGraf__Custo_GSM[".isUseInlineAdd"] || $tdataGraf__Custo_GSM[".isUseInlineEdit"];

$tdataGraf__Custo_GSM[".allSearchFields"] = array();



$tdataGraf__Custo_GSM[".isDynamicPerm"] = true;

	

$tdataGraf__Custo_GSM[".isDisplayLoading"] = true;

$tdataGraf__Custo_GSM[".isResizeColumns"] = false;


$tdataGraf__Custo_GSM[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY ano_referencia desc, mes_referencia desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo_GSM[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo_GSM[".orderindexes"] = array();

$tdataGraf__Custo_GSM[".sqlHead"] = "select concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo_GSM[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo_GSM[".sqlWhereExpr"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";

$tdataGraf__Custo_GSM[".sqlTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";



	$tableKeys=array();
	$tdataGraf__Custo_GSM[".Keys"]=$tableKeys;

	
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
			
									$tdataGraf__Custo_GSM["DATA"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(ct.custo))";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Custo_GSM["custo"]=$fdata;
	
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
			
									$tdataGraf__Custo_GSM["Minutos"]=$fdata;
	
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
			
									$tdataGraf__Custo_GSM["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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
			
									$tdataGraf__Custo_GSM["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataGraf__Custo_GSM[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Custo GSM</attr>
</attr>
<attr value="chart_type">
	<attr value="type">area</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">custo</attr>
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

<attr value="head">Custo linha GSM</attr>

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
<attr value="short_table_name">Graf__Custo_GSM</attr>
</attr>

</chart>';
	
$tables_data["Graf. Custo GSM"]=&$tdataGraf__Custo_GSM;
$field_labels["Graf__Custo_GSM"] = &$fieldLabelsGraf__Custo_GSM;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Custo GSM"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Custo GSM"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto159=array();
$proto159["m_strHead"] = "select";
$proto159["m_strFieldList"] = "concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto159["m_strFrom"] = "FROM conta AS ct";
$proto159["m_strWhere"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";
$proto159["m_strOrderBy"] = "ORDER BY ano_referencia desc, mes_referencia desc";
$proto159["m_strTail"] = "GROUP BY concat(mes_referencia,'-',ano_referencia)";
$proto160=array();
$proto160["m_sql"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";
$proto160["m_uniontype"] = "SQLL_UNKNOWN";
						$proto161=array();
$proto161["m_strHead"] = "select";
$proto161["m_strFieldList"] = "id_tp_interf";
$proto161["m_strFrom"] = "FROM ipbx_interf";
$proto161["m_strWhere"] = "id_interf = ct.id_interf";
$proto161["m_strOrderBy"] = "";
$proto161["m_strTail"] = "";
$proto162=array();
$proto162["m_sql"] = "id_interf = ct.id_interf";
$proto162["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf"
));

$proto162["m_column"]=$obj;
$proto162["m_contained"] = array();
$proto162["m_strCase"] = "= ct.id_interf";
$proto162["m_havingmode"] = "0";
$proto162["m_inBrackets"] = "0";
$proto162["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto162);

$proto161["m_where"] = $obj;
$proto164=array();
$proto164["m_sql"] = "";
$proto164["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto164["m_column"]=$obj;
$proto164["m_contained"] = array();
$proto164["m_strCase"] = "";
$proto164["m_havingmode"] = "0";
$proto164["m_inBrackets"] = "0";
$proto164["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto164);

$proto161["m_having"] = $obj;
$proto161["m_fieldlist"] = array();
						$proto166=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf"
));

$proto166["m_expr"]=$obj;
$proto166["m_alias"] = "";
$obj = new SQLFieldListItem($proto166);

$proto161["m_fieldlist"][]=$obj;
$proto161["m_fromlist"] = array();
												$proto168=array();
$proto168["m_link"] = "SQLL_MAIN";
			$proto169=array();
$proto169["m_strName"] = "ipbx_interf";
$proto169["m_columns"] = array();
$proto169["m_columns"][] = "id_interf";
$proto169["m_columns"][] = "dsc_interf";
$proto169["m_columns"][] = "id_contrato";
$proto169["m_columns"][] = "board";
$proto169["m_columns"][] = "link";
$proto169["m_columns"][] = "usuario";
$proto169["m_columns"][] = "senha";
$proto169["m_columns"][] = "ip_host";
$proto169["m_columns"][] = "id_central";
$proto169["m_columns"][] = "codec";
$proto169["m_columns"][] = "id_tp_interf";
$proto169["m_columns"][] = "tp_chamada";
$proto169["m_columns"][] = "piloto";
$proto169["m_columns"][] = "id_chamada";
$proto169["m_columns"][] = "flg_id_cham_parc";
$proto169["m_columns"][] = "dtmf";
$proto169["m_columns"][] = "ddd_localidade";
$proto169["m_columns"][] = "cd_operadora";
$proto169["m_columns"][] = "khomp_interf";
$proto169["m_columns"][] = "flg_logon_remoto";
$proto169["m_columns"][] = "pers_params";
$proto169["m_columns"][] = "registro";
$proto169["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto169);

$proto168["m_table"] = $obj;
$proto168["m_alias"] = "";
$proto170=array();
$proto170["m_sql"] = "";
$proto170["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto170["m_column"]=$obj;
$proto170["m_contained"] = array();
$proto170["m_strCase"] = "";
$proto170["m_havingmode"] = "0";
$proto170["m_inBrackets"] = "0";
$proto170["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto170);

$proto168["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto168);

$proto161["m_fromlist"][]=$obj;
$proto161["m_groupby"] = array();
$proto161["m_orderby"] = array();
$obj = new SQLQuery($proto161);

$proto160["m_column"]=$obj;
$proto160["m_contained"] = array();
$proto160["m_strCase"] = "in (3)";
$proto160["m_havingmode"] = "0";
$proto160["m_inBrackets"] = "0";
$proto160["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto160);

$proto159["m_where"] = $obj;
$proto172=array();
$proto172["m_sql"] = "";
$proto172["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto172["m_column"]=$obj;
$proto172["m_contained"] = array();
$proto172["m_strCase"] = "";
$proto172["m_havingmode"] = "0";
$proto172["m_inBrackets"] = "0";
$proto172["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto172);

$proto159["m_having"] = $obj;
$proto159["m_fieldlist"] = array();
						$proto174=array();
			$proto175=array();
$proto175["m_functiontype"] = "SQLF_CUSTOM";
$proto175["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto175["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto175["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto175["m_arguments"][]=$obj;
$proto175["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto175);

$proto174["m_expr"]=$obj;
$proto174["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto174);

$proto159["m_fieldlist"][]=$obj;
						$proto179=array();
			$proto180=array();
$proto180["m_functiontype"] = "SQLF_CUSTOM";
$proto180["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto180["m_arguments"][]=$obj;
$proto180["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto180);

$proto179["m_expr"]=$obj;
$proto179["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto179);

$proto159["m_fieldlist"][]=$obj;
						$proto182=array();
			$proto183=array();
$proto183["m_functiontype"] = "SQLF_CUSTOM";
$proto183["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto183["m_arguments"][]=$obj;
$proto183["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto183);

$proto182["m_expr"]=$obj;
$proto182["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto182);

$proto159["m_fieldlist"][]=$obj;
						$proto185=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto185["m_expr"]=$obj;
$proto185["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto185);

$proto159["m_fieldlist"][]=$obj;
						$proto187=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto187["m_expr"]=$obj;
$proto187["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto187);

$proto159["m_fieldlist"][]=$obj;
$proto159["m_fromlist"] = array();
												$proto189=array();
$proto189["m_link"] = "SQLL_MAIN";
			$proto190=array();
$proto190["m_strName"] = "conta";
$proto190["m_columns"] = array();
$proto190["m_columns"][] = "id_conta";
$proto190["m_columns"][] = "idt_custo";
$proto190["m_columns"][] = "origem";
$proto190["m_columns"][] = "destino";
$proto190["m_columns"][] = "duracao";
$proto190["m_columns"][] = "custo";
$proto190["m_columns"][] = "calldate";
$proto190["m_columns"][] = "uniqueid";
$proto190["m_columns"][] = "id_interf";
$proto190["m_columns"][] = "id_contrato";
$proto190["m_columns"][] = "mes_referencia";
$proto190["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto190);

$proto189["m_table"] = $obj;
$proto189["m_alias"] = "ct";
$proto191=array();
$proto191["m_sql"] = "";
$proto191["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto191["m_column"]=$obj;
$proto191["m_contained"] = array();
$proto191["m_strCase"] = "";
$proto191["m_havingmode"] = "0";
$proto191["m_inBrackets"] = "0";
$proto191["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto191);

$proto189["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto189);

$proto159["m_fromlist"][]=$obj;
$proto159["m_groupby"] = array();
												$proto193=array();
						$proto194=array();
$proto194["m_functiontype"] = "SQLF_CUSTOM";
$proto194["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto194["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'-'"
));

$proto194["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto194["m_arguments"][]=$obj;
$proto194["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto194);

$proto193["m_column"]=$obj;
$obj = new SQLGroupByItem($proto193);

$proto159["m_groupby"][]=$obj;
$proto159["m_orderby"] = array();
												$proto198=array();
						$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "ct"
));

$proto198["m_column"]=$obj;
$proto198["m_bAsc"] = 0;
$proto198["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto198);

$proto159["m_orderby"][]=$obj;					
												$proto200=array();
						$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "ct"
));

$proto200["m_column"]=$obj;
$proto200["m_bAsc"] = 0;
$proto200["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto200);

$proto159["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto159);

$queryData_Graf__Custo_GSM = $obj;
$tdataGraf__Custo_GSM[".sqlquery"] = $queryData_Graf__Custo_GSM;



?>
