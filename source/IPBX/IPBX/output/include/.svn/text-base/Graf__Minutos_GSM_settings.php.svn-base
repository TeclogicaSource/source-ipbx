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


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Minutos_GSM[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Minutos_GSM[".orderindexes"] = array();

$tdataGraf__Minutos_GSM[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Minutos_GSM[".sqlFrom"] = "FROM conta ct, ipbx_interf ii";

$tdataGraf__Minutos_GSM[".sqlWhereExpr"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (3)";

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










$proto110=array();
$proto110["m_strHead"] = "select";
$proto110["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto110["m_strFrom"] = "FROM conta ct, ipbx_interf ii";
$proto110["m_strWhere"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (3)";
$proto110["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto110["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto111=array();
$proto111["m_sql"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (3)";
$proto111["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (3)"
));

$proto111["m_column"]=$obj;
$proto111["m_contained"] = array();
						$proto113=array();
$proto113["m_sql"] = "ct.id_interf = ii.id_interf";
$proto113["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto113["m_column"]=$obj;
$proto113["m_contained"] = array();
$proto113["m_strCase"] = "= ii.id_interf";
$proto113["m_havingmode"] = "0";
$proto113["m_inBrackets"] = "0";
$proto113["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto113);

			$proto111["m_contained"][]=$obj;
						$proto115=array();
$proto115["m_sql"] = "ii.id_tp_interf in (3)";
$proto115["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ii"
));

$proto115["m_column"]=$obj;
$proto115["m_contained"] = array();
$proto115["m_strCase"] = "in (3)";
$proto115["m_havingmode"] = "0";
$proto115["m_inBrackets"] = "0";
$proto115["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto115);

			$proto111["m_contained"][]=$obj;
$proto111["m_strCase"] = "";
$proto111["m_havingmode"] = "0";
$proto111["m_inBrackets"] = "0";
$proto111["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto111);

$proto110["m_where"] = $obj;
$proto117=array();
$proto117["m_sql"] = "";
$proto117["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto117["m_column"]=$obj;
$proto117["m_contained"] = array();
$proto117["m_strCase"] = "";
$proto117["m_havingmode"] = "0";
$proto117["m_inBrackets"] = "0";
$proto117["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto117);

$proto110["m_having"] = $obj;
$proto110["m_fieldlist"] = array();
						$proto119=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto119);

$proto110["m_fieldlist"][]=$obj;
						$proto121=array();
			$proto122=array();
$proto122["m_functiontype"] = "SQLF_CUSTOM";
$proto122["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto122["m_arguments"][]=$obj;
$proto122["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto122);

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto121);

$proto110["m_fieldlist"][]=$obj;
						$proto124=array();
			$proto125=array();
$proto125["m_functiontype"] = "SQLF_CUSTOM";
$proto125["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto125["m_arguments"][]=$obj;
$proto125["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto125);

$proto124["m_expr"]=$obj;
$proto124["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto124);

$proto110["m_fieldlist"][]=$obj;
						$proto127=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto127["m_expr"]=$obj;
$proto127["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto127);

$proto110["m_fieldlist"][]=$obj;
						$proto129=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto129["m_expr"]=$obj;
$proto129["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto129);

$proto110["m_fieldlist"][]=$obj;
$proto110["m_fromlist"] = array();
												$proto131=array();
$proto131["m_link"] = "SQLL_MAIN";
			$proto132=array();
$proto132["m_strName"] = "conta";
$proto132["m_columns"] = array();
$proto132["m_columns"][] = "id_conta";
$proto132["m_columns"][] = "idt_custo";
$proto132["m_columns"][] = "origem";
$proto132["m_columns"][] = "destino";
$proto132["m_columns"][] = "duracao";
$proto132["m_columns"][] = "custo";
$proto132["m_columns"][] = "calldate";
$proto132["m_columns"][] = "uniqueid";
$proto132["m_columns"][] = "id_interf";
$proto132["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto132);

$proto131["m_table"] = $obj;
$proto131["m_alias"] = "ct";
$proto133=array();
$proto133["m_sql"] = "";
$proto133["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto133["m_column"]=$obj;
$proto133["m_contained"] = array();
$proto133["m_strCase"] = "";
$proto133["m_havingmode"] = "0";
$proto133["m_inBrackets"] = "0";
$proto133["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto133);

$proto131["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto131);

$proto110["m_fromlist"][]=$obj;
												$proto135=array();
$proto135["m_link"] = "SQLL_CROSSJOIN";
			$proto136=array();
$proto136["m_strName"] = "ipbx_interf";
$proto136["m_columns"] = array();
$proto136["m_columns"][] = "id_interf";
$proto136["m_columns"][] = "dsc_interf";
$proto136["m_columns"][] = "id_contrato";
$proto136["m_columns"][] = "board";
$proto136["m_columns"][] = "link";
$proto136["m_columns"][] = "usuario";
$proto136["m_columns"][] = "senha";
$proto136["m_columns"][] = "ip_host";
$proto136["m_columns"][] = "id_central";
$proto136["m_columns"][] = "codec";
$proto136["m_columns"][] = "id_tp_interf";
$proto136["m_columns"][] = "tp_chamada";
$proto136["m_columns"][] = "piloto";
$proto136["m_columns"][] = "id_chamada";
$proto136["m_columns"][] = "flg_id_cham_parc";
$proto136["m_columns"][] = "dtmf";
$proto136["m_columns"][] = "ddd_localidade";
$proto136["m_columns"][] = "cd_operadora";
$proto136["m_columns"][] = "khomp_interf";
$proto136["m_columns"][] = "flg_logon_remoto";
$proto136["m_columns"][] = "pers_params";
$proto136["m_columns"][] = "registro";
$obj = new SQLTable($proto136);

$proto135["m_table"] = $obj;
$proto135["m_alias"] = "ii";
$proto137=array();
$proto137["m_sql"] = "";
$proto137["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto137["m_column"]=$obj;
$proto137["m_contained"] = array();
$proto137["m_strCase"] = "";
$proto137["m_havingmode"] = "0";
$proto137["m_inBrackets"] = "0";
$proto137["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto137);

$proto135["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto135);

$proto110["m_fromlist"][]=$obj;
$proto110["m_groupby"] = array();
												$proto139=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto139["m_column"]=$obj;
$obj = new SQLGroupByItem($proto139);

$proto110["m_groupby"][]=$obj;
$proto110["m_orderby"] = array();
												$proto141=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto141["m_column"]=$obj;
$proto141["m_bAsc"] = 1;
$proto141["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto141);

$proto110["m_orderby"][]=$obj;					
												$proto143=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto143["m_column"]=$obj;
$proto143["m_bAsc"] = 1;
$proto143["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto143);

$proto110["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto110);

$queryData_Graf__Minutos_GSM = $obj;
$tdataGraf__Minutos_GSM[".sqlquery"] = $queryData_Graf__Minutos_GSM;



?>
