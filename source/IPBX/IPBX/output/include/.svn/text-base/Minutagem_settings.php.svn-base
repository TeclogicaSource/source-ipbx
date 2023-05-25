<?php

//	field labels
$fieldLabelsMinutagem = array();
$fieldLabelsMinutagem["Portuguese(Brazil)"]=array();
$fieldLabelsMinutagem["Portuguese(Brazil)"]["custo"] = "Custo (R\$)";
$fieldLabelsMinutagem["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsMinutagem["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsMinutagem["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
$fieldLabelsMinutagem["Portuguese(Brazil)"]["DATA"] = "DATA";


$tdataMinutagem=array();
	$tdataMinutagem[".ShortName"]="Minutagem";
	$tdataMinutagem[".OwnerID"]="";
	$tdataMinutagem[".OriginalTable"]="conta";
	$tdataMinutagem[".NCSearch"]=true;
	
	$tdataMinutagem[".ChartRefreshTime"] = 0;

$tdataMinutagem[".shortTableName"] = "Minutagem";
$tdataMinutagem[".dataSourceTable"] = "Graf. Minutagem Trad";
$tdataMinutagem[".nSecOptions"] = 0;
$tdataMinutagem[".nLoginMethod"] = 1;
$tdataMinutagem[".recsPerRowList"] = 1;	
$tdataMinutagem[".tableGroupBy"] = "1";
$tdataMinutagem[".dbType"] = 0;
$tdataMinutagem[".mainTableOwnerID"] = "";
$tdataMinutagem[".moveNext"] = 1;

$tdataMinutagem[".listAjax"] = true;

	$tdataMinutagem[".audit"] = false;

	$tdataMinutagem[".locking"] = false;
	
$tdataMinutagem[".listIcons"] = true;




$tdataMinutagem[".showSimpleSearchOptions"] = false;

$tdataMinutagem[".showSearchPanel"] = true;


$tdataMinutagem[".isUseAjaxSuggest"] = true;


$tdataMinutagem[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataMinutagem[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataMinutagem[".isUseTimeForSearch"] = false;





$tdataMinutagem[".isUseInlineJs"] = $tdataMinutagem[".isUseInlineAdd"] || $tdataMinutagem[".isUseInlineEdit"];

$tdataMinutagem[".allSearchFields"] = array();



$tdataMinutagem[".isDynamicPerm"] = true;

	

$tdataMinutagem[".isDisplayLoading"] = true;

$tdataMinutagem[".isResizeColumns"] = false;


$tdataMinutagem[".createLoginPage"] = true;


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataMinutagem[".strOrderBy"] = $gstrOrderBy;
	
$tdataMinutagem[".orderindexes"] = array();

$tdataMinutagem[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataMinutagem[".sqlFrom"] = "FROM conta ct, ipbx_interf ii";

$tdataMinutagem[".sqlWhereExpr"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (2,4,8)";

$tdataMinutagem[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



	$tableKeys=array();
	$tdataMinutagem[".Keys"]=$tableKeys;

	
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
			
									$tdataMinutagem["DATA"]=$fdata;
	
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
			
									$tdataMinutagem["custo"]=$fdata;
	
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
			
									$tdataMinutagem["Minutos"]=$fdata;
	
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
			
									$tdataMinutagem["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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
			
									$tdataMinutagem["DATE_FORMAT(conta.calldate,'%m')"]=$fdata;

$tdataMinutagem[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Minutagem Trad</attr>
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

<attr value="head">Minutagem linha tradicional</attr>

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
<attr value="short_table_name">Minutagem</attr>
</attr>

</chart>';
	
$tables_data["Graf. Minutagem Trad"]=&$tdataMinutagem;
$field_labels["Graf__Minutagem_Trad"] = &$fieldLabelsMinutagem;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Minutagem Trad"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Minutagem Trad"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto294=array();
$proto294["m_strHead"] = "select";
$proto294["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto294["m_strFrom"] = "FROM conta ct, ipbx_interf ii";
$proto294["m_strWhere"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (2,4,8)";
$proto294["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto294["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto295=array();
$proto295["m_sql"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (2,4,8)";
$proto295["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (2,4,8)"
));

$proto295["m_column"]=$obj;
$proto295["m_contained"] = array();
						$proto297=array();
$proto297["m_sql"] = "ct.id_interf = ii.id_interf";
$proto297["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto297["m_column"]=$obj;
$proto297["m_contained"] = array();
$proto297["m_strCase"] = "= ii.id_interf";
$proto297["m_havingmode"] = "0";
$proto297["m_inBrackets"] = "0";
$proto297["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto297);

			$proto295["m_contained"][]=$obj;
						$proto299=array();
$proto299["m_sql"] = "ii.id_tp_interf in (2,4,8)";
$proto299["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ii"
));

$proto299["m_column"]=$obj;
$proto299["m_contained"] = array();
$proto299["m_strCase"] = "in (2,4,8)";
$proto299["m_havingmode"] = "0";
$proto299["m_inBrackets"] = "0";
$proto299["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto299);

			$proto295["m_contained"][]=$obj;
$proto295["m_strCase"] = "";
$proto295["m_havingmode"] = "0";
$proto295["m_inBrackets"] = "0";
$proto295["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto295);

$proto294["m_where"] = $obj;
$proto301=array();
$proto301["m_sql"] = "";
$proto301["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto301["m_column"]=$obj;
$proto301["m_contained"] = array();
$proto301["m_strCase"] = "";
$proto301["m_havingmode"] = "0";
$proto301["m_inBrackets"] = "0";
$proto301["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto301);

$proto294["m_having"] = $obj;
$proto294["m_fieldlist"] = array();
						$proto303=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto303["m_expr"]=$obj;
$proto303["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto303);

$proto294["m_fieldlist"][]=$obj;
						$proto305=array();
			$proto306=array();
$proto306["m_functiontype"] = "SQLF_CUSTOM";
$proto306["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto306["m_arguments"][]=$obj;
$proto306["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto306);

$proto305["m_expr"]=$obj;
$proto305["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto305);

$proto294["m_fieldlist"][]=$obj;
						$proto308=array();
			$proto309=array();
$proto309["m_functiontype"] = "SQLF_CUSTOM";
$proto309["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto309["m_arguments"][]=$obj;
$proto309["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto309);

$proto308["m_expr"]=$obj;
$proto308["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto308);

$proto294["m_fieldlist"][]=$obj;
						$proto311=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto311["m_expr"]=$obj;
$proto311["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto311);

$proto294["m_fieldlist"][]=$obj;
						$proto313=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto313["m_expr"]=$obj;
$proto313["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto313);

$proto294["m_fieldlist"][]=$obj;
$proto294["m_fromlist"] = array();
												$proto315=array();
$proto315["m_link"] = "SQLL_MAIN";
			$proto316=array();
$proto316["m_strName"] = "conta";
$proto316["m_columns"] = array();
$proto316["m_columns"][] = "id_conta";
$proto316["m_columns"][] = "idt_custo";
$proto316["m_columns"][] = "origem";
$proto316["m_columns"][] = "destino";
$proto316["m_columns"][] = "duracao";
$proto316["m_columns"][] = "custo";
$proto316["m_columns"][] = "calldate";
$proto316["m_columns"][] = "uniqueid";
$proto316["m_columns"][] = "id_interf";
$proto316["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto316);

$proto315["m_table"] = $obj;
$proto315["m_alias"] = "ct";
$proto317=array();
$proto317["m_sql"] = "";
$proto317["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto317["m_column"]=$obj;
$proto317["m_contained"] = array();
$proto317["m_strCase"] = "";
$proto317["m_havingmode"] = "0";
$proto317["m_inBrackets"] = "0";
$proto317["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto317);

$proto315["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto315);

$proto294["m_fromlist"][]=$obj;
												$proto319=array();
$proto319["m_link"] = "SQLL_CROSSJOIN";
			$proto320=array();
$proto320["m_strName"] = "ipbx_interf";
$proto320["m_columns"] = array();
$proto320["m_columns"][] = "id_interf";
$proto320["m_columns"][] = "dsc_interf";
$proto320["m_columns"][] = "id_contrato";
$proto320["m_columns"][] = "board";
$proto320["m_columns"][] = "link";
$proto320["m_columns"][] = "usuario";
$proto320["m_columns"][] = "senha";
$proto320["m_columns"][] = "ip_host";
$proto320["m_columns"][] = "id_central";
$proto320["m_columns"][] = "codec";
$proto320["m_columns"][] = "id_tp_interf";
$proto320["m_columns"][] = "tp_chamada";
$proto320["m_columns"][] = "piloto";
$proto320["m_columns"][] = "id_chamada";
$proto320["m_columns"][] = "flg_id_cham_parc";
$proto320["m_columns"][] = "dtmf";
$proto320["m_columns"][] = "ddd_localidade";
$proto320["m_columns"][] = "cd_operadora";
$proto320["m_columns"][] = "khomp_interf";
$proto320["m_columns"][] = "flg_logon_remoto";
$proto320["m_columns"][] = "pers_params";
$proto320["m_columns"][] = "registro";
$obj = new SQLTable($proto320);

$proto319["m_table"] = $obj;
$proto319["m_alias"] = "ii";
$proto321=array();
$proto321["m_sql"] = "";
$proto321["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto321["m_column"]=$obj;
$proto321["m_contained"] = array();
$proto321["m_strCase"] = "";
$proto321["m_havingmode"] = "0";
$proto321["m_inBrackets"] = "0";
$proto321["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto321);

$proto319["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto319);

$proto294["m_fromlist"][]=$obj;
$proto294["m_groupby"] = array();
												$proto323=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto323["m_column"]=$obj;
$obj = new SQLGroupByItem($proto323);

$proto294["m_groupby"][]=$obj;
$proto294["m_orderby"] = array();
												$proto325=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto325["m_column"]=$obj;
$proto325["m_bAsc"] = 1;
$proto325["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto325);

$proto294["m_orderby"][]=$obj;					
												$proto327=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto327["m_column"]=$obj;
$proto327["m_bAsc"] = 1;
$proto327["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto327);

$proto294["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto294);

$queryData_Minutagem = $obj;
$tdataMinutagem[".sqlquery"] = $queryData_Minutagem;



?>
