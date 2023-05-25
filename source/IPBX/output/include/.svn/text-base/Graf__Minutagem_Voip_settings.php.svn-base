<?php

//	field labels
$fieldLabelsGraf__Minutagem_Voip = array();
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
$fieldLabelsGraf__Minutagem_Voip["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataGraf__Minutagem_Voip=array();
	$tdataGraf__Minutagem_Voip[".ShortName"]="Graf__Minutagem_Voip";
	$tdataGraf__Minutagem_Voip[".OwnerID"]="";
	$tdataGraf__Minutagem_Voip[".OriginalTable"]="cdr";
	$tdataGraf__Minutagem_Voip[".NCSearch"]=true;
	
	$tdataGraf__Minutagem_Voip[".ChartRefreshTime"] = 0;

$tdataGraf__Minutagem_Voip[".shortTableName"] = "Graf__Minutagem_Voip";
$tdataGraf__Minutagem_Voip[".dataSourceTable"] = "Graf. Minutagem Voip";
$tdataGraf__Minutagem_Voip[".nSecOptions"] = 0;
$tdataGraf__Minutagem_Voip[".nLoginMethod"] = 1;
$tdataGraf__Minutagem_Voip[".recsPerRowList"] = 1;	
$tdataGraf__Minutagem_Voip[".tableGroupBy"] = "1";
$tdataGraf__Minutagem_Voip[".dbType"] = 0;
$tdataGraf__Minutagem_Voip[".mainTableOwnerID"] = "";
$tdataGraf__Minutagem_Voip[".moveNext"] = 1;

$tdataGraf__Minutagem_Voip[".listAjax"] = true;

	$tdataGraf__Minutagem_Voip[".audit"] = false;

	$tdataGraf__Minutagem_Voip[".locking"] = false;
	
$tdataGraf__Minutagem_Voip[".listIcons"] = true;




$tdataGraf__Minutagem_Voip[".showSimpleSearchOptions"] = false;

$tdataGraf__Minutagem_Voip[".showSearchPanel"] = true;


$tdataGraf__Minutagem_Voip[".isUseAjaxSuggest"] = true;


$tdataGraf__Minutagem_Voip[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataGraf__Minutagem_Voip[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataGraf__Minutagem_Voip[".isUseTimeForSearch"] = false;





$tdataGraf__Minutagem_Voip[".isUseInlineJs"] = $tdataGraf__Minutagem_Voip[".isUseInlineAdd"] || $tdataGraf__Minutagem_Voip[".isUseInlineEdit"];

$tdataGraf__Minutagem_Voip[".allSearchFields"] = array();



$tdataGraf__Minutagem_Voip[".isDynamicPerm"] = true;

	

$tdataGraf__Minutagem_Voip[".isDisplayLoading"] = true;

$tdataGraf__Minutagem_Voip[".isResizeColumns"] = false;


$tdataGraf__Minutagem_Voip[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y') desc, DATE_FORMAT(ct.calldate,'%m') desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Minutagem_Voip[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Minutagem_Voip[".orderindexes"] = array();

$tdataGraf__Minutagem_Voip[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Minutagem_Voip[".sqlFrom"] = "FROM conta ct, ipbx_interf ii";

$tdataGraf__Minutagem_Voip[".sqlWhereExpr"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";

$tdataGraf__Minutagem_Voip[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



	$tableKeys=array();
	$tdataGraf__Minutagem_Voip[".Keys"]=$tableKeys;

	
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
			
									$tdataGraf__Minutagem_Voip["DATA"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo (R\$)"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(ct.custo))";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataGraf__Minutagem_Voip["custo"]=$fdata;
	
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
			
									$tdataGraf__Minutagem_Voip["Minutos"]=$fdata;
	
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
			
									$tdataGraf__Minutagem_Voip["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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
			
									$tdataGraf__Minutagem_Voip["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataGraf__Minutagem_Voip[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Minutagem Voip</attr>
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

<attr value="head">Minutagem linha VoIP</attr>

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
<attr value="short_table_name">Graf__Minutagem_Voip</attr>
</attr>

</chart>';
	
$tables_data["Graf. Minutagem Voip"]=&$tdataGraf__Minutagem_Voip;
$field_labels["Graf__Minutagem_Voip"] = &$fieldLabelsGraf__Minutagem_Voip;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Minutagem Voip"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Minutagem Voip"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto289=array();
$proto289["m_strHead"] = "select";
$proto289["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto289["m_strFrom"] = "FROM conta ct, ipbx_interf ii";
$proto289["m_strWhere"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";
$proto289["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y') desc, DATE_FORMAT(ct.calldate,'%m') desc";
$proto289["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto290=array();
$proto290["m_sql"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";
$proto290["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)"
));

$proto290["m_column"]=$obj;
$proto290["m_contained"] = array();
						$proto292=array();
$proto292["m_sql"] = "ct.id_interf = ii.id_interf";
$proto292["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto292["m_column"]=$obj;
$proto292["m_contained"] = array();
$proto292["m_strCase"] = "= ii.id_interf";
$proto292["m_havingmode"] = "0";
$proto292["m_inBrackets"] = "0";
$proto292["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto292);

			$proto290["m_contained"][]=$obj;
						$proto294=array();
$proto294["m_sql"] = "ii.id_tp_interf in (1)";
$proto294["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ii"
));

$proto294["m_column"]=$obj;
$proto294["m_contained"] = array();
$proto294["m_strCase"] = "in (1)";
$proto294["m_havingmode"] = "0";
$proto294["m_inBrackets"] = "0";
$proto294["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto294);

			$proto290["m_contained"][]=$obj;
$proto290["m_strCase"] = "";
$proto290["m_havingmode"] = "0";
$proto290["m_inBrackets"] = "0";
$proto290["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto290);

$proto289["m_where"] = $obj;
$proto296=array();
$proto296["m_sql"] = "";
$proto296["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto296["m_column"]=$obj;
$proto296["m_contained"] = array();
$proto296["m_strCase"] = "";
$proto296["m_havingmode"] = "0";
$proto296["m_inBrackets"] = "0";
$proto296["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto296);

$proto289["m_having"] = $obj;
$proto289["m_fieldlist"] = array();
						$proto298=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto298["m_expr"]=$obj;
$proto298["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto298);

$proto289["m_fieldlist"][]=$obj;
						$proto300=array();
			$proto301=array();
$proto301["m_functiontype"] = "SQLF_CUSTOM";
$proto301["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto301["m_arguments"][]=$obj;
$proto301["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto301);

$proto300["m_expr"]=$obj;
$proto300["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto300);

$proto289["m_fieldlist"][]=$obj;
						$proto303=array();
			$proto304=array();
$proto304["m_functiontype"] = "SQLF_CUSTOM";
$proto304["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto304["m_arguments"][]=$obj;
$proto304["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto304);

$proto303["m_expr"]=$obj;
$proto303["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto303);

$proto289["m_fieldlist"][]=$obj;
						$proto306=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto306["m_expr"]=$obj;
$proto306["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto306);

$proto289["m_fieldlist"][]=$obj;
						$proto308=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto308["m_expr"]=$obj;
$proto308["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto308);

$proto289["m_fieldlist"][]=$obj;
$proto289["m_fromlist"] = array();
												$proto310=array();
$proto310["m_link"] = "SQLL_MAIN";
			$proto311=array();
$proto311["m_strName"] = "conta";
$proto311["m_columns"] = array();
$proto311["m_columns"][] = "id_conta";
$proto311["m_columns"][] = "idt_custo";
$proto311["m_columns"][] = "origem";
$proto311["m_columns"][] = "destino";
$proto311["m_columns"][] = "duracao";
$proto311["m_columns"][] = "custo";
$proto311["m_columns"][] = "calldate";
$proto311["m_columns"][] = "uniqueid";
$proto311["m_columns"][] = "id_interf";
$proto311["m_columns"][] = "id_contrato";
$proto311["m_columns"][] = "mes_referencia";
$proto311["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto311);

$proto310["m_table"] = $obj;
$proto310["m_alias"] = "ct";
$proto312=array();
$proto312["m_sql"] = "";
$proto312["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto312["m_column"]=$obj;
$proto312["m_contained"] = array();
$proto312["m_strCase"] = "";
$proto312["m_havingmode"] = "0";
$proto312["m_inBrackets"] = "0";
$proto312["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto312);

$proto310["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto310);

$proto289["m_fromlist"][]=$obj;
												$proto314=array();
$proto314["m_link"] = "SQLL_CROSSJOIN";
			$proto315=array();
$proto315["m_strName"] = "ipbx_interf";
$proto315["m_columns"] = array();
$proto315["m_columns"][] = "id_interf";
$proto315["m_columns"][] = "dsc_interf";
$proto315["m_columns"][] = "id_contrato";
$proto315["m_columns"][] = "board";
$proto315["m_columns"][] = "link";
$proto315["m_columns"][] = "usuario";
$proto315["m_columns"][] = "senha";
$proto315["m_columns"][] = "ip_host";
$proto315["m_columns"][] = "id_central";
$proto315["m_columns"][] = "codec";
$proto315["m_columns"][] = "id_tp_interf";
$proto315["m_columns"][] = "tp_chamada";
$proto315["m_columns"][] = "piloto";
$proto315["m_columns"][] = "id_chamada";
$proto315["m_columns"][] = "flg_id_cham_parc";
$proto315["m_columns"][] = "dtmf";
$proto315["m_columns"][] = "ddd_localidade";
$proto315["m_columns"][] = "cd_operadora";
$proto315["m_columns"][] = "khomp_interf";
$proto315["m_columns"][] = "flg_logon_remoto";
$proto315["m_columns"][] = "pers_params";
$proto315["m_columns"][] = "registro";
$proto315["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto315);

$proto314["m_table"] = $obj;
$proto314["m_alias"] = "ii";
$proto316=array();
$proto316["m_sql"] = "";
$proto316["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto316["m_column"]=$obj;
$proto316["m_contained"] = array();
$proto316["m_strCase"] = "";
$proto316["m_havingmode"] = "0";
$proto316["m_inBrackets"] = "0";
$proto316["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto316);

$proto314["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto314);

$proto289["m_fromlist"][]=$obj;
$proto289["m_groupby"] = array();
												$proto318=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto318["m_column"]=$obj;
$obj = new SQLGroupByItem($proto318);

$proto289["m_groupby"][]=$obj;
$proto289["m_orderby"] = array();
												$proto320=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y') "
));

$proto320["m_column"]=$obj;
$proto320["m_bAsc"] = 0;
$proto320["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto320);

$proto289["m_orderby"][]=$obj;					
												$proto322=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m') "
));

$proto322["m_column"]=$obj;
$proto322["m_bAsc"] = 0;
$proto322["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto322);

$proto289["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto289);

$queryData_Graf__Minutagem_Voip = $obj;
$tdataGraf__Minutagem_Voip[".sqlquery"] = $queryData_Graf__Minutagem_Voip;



?>
