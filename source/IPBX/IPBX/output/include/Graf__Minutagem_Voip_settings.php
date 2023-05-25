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


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
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










$proto259=array();
$proto259["m_strHead"] = "select";
$proto259["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto259["m_strFrom"] = "FROM conta ct, ipbx_interf ii";
$proto259["m_strWhere"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";
$proto259["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto259["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto260=array();
$proto260["m_sql"] = "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";
$proto260["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)"
));

$proto260["m_column"]=$obj;
$proto260["m_contained"] = array();
						$proto262=array();
$proto262["m_sql"] = "ct.id_interf = ii.id_interf";
$proto262["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ct"
));

$proto262["m_column"]=$obj;
$proto262["m_contained"] = array();
$proto262["m_strCase"] = "= ii.id_interf";
$proto262["m_havingmode"] = "0";
$proto262["m_inBrackets"] = "0";
$proto262["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto262);

			$proto260["m_contained"][]=$obj;
						$proto264=array();
$proto264["m_sql"] = "ii.id_tp_interf in (1)";
$proto264["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ii"
));

$proto264["m_column"]=$obj;
$proto264["m_contained"] = array();
$proto264["m_strCase"] = "in (1)";
$proto264["m_havingmode"] = "0";
$proto264["m_inBrackets"] = "0";
$proto264["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto264);

			$proto260["m_contained"][]=$obj;
$proto260["m_strCase"] = "";
$proto260["m_havingmode"] = "0";
$proto260["m_inBrackets"] = "0";
$proto260["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto260);

$proto259["m_where"] = $obj;
$proto266=array();
$proto266["m_sql"] = "";
$proto266["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto266["m_column"]=$obj;
$proto266["m_contained"] = array();
$proto266["m_strCase"] = "";
$proto266["m_havingmode"] = "0";
$proto266["m_inBrackets"] = "0";
$proto266["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto266);

$proto259["m_having"] = $obj;
$proto259["m_fieldlist"] = array();
						$proto268=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto268["m_expr"]=$obj;
$proto268["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto268);

$proto259["m_fieldlist"][]=$obj;
						$proto270=array();
			$proto271=array();
$proto271["m_functiontype"] = "SQLF_CUSTOM";
$proto271["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto271["m_arguments"][]=$obj;
$proto271["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto271);

$proto270["m_expr"]=$obj;
$proto270["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto270);

$proto259["m_fieldlist"][]=$obj;
						$proto273=array();
			$proto274=array();
$proto274["m_functiontype"] = "SQLF_CUSTOM";
$proto274["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto274["m_arguments"][]=$obj;
$proto274["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto274);

$proto273["m_expr"]=$obj;
$proto273["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto273);

$proto259["m_fieldlist"][]=$obj;
						$proto276=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto276["m_expr"]=$obj;
$proto276["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto276);

$proto259["m_fieldlist"][]=$obj;
						$proto278=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto278["m_expr"]=$obj;
$proto278["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto278);

$proto259["m_fieldlist"][]=$obj;
$proto259["m_fromlist"] = array();
												$proto280=array();
$proto280["m_link"] = "SQLL_MAIN";
			$proto281=array();
$proto281["m_strName"] = "conta";
$proto281["m_columns"] = array();
$proto281["m_columns"][] = "id_conta";
$proto281["m_columns"][] = "idt_custo";
$proto281["m_columns"][] = "origem";
$proto281["m_columns"][] = "destino";
$proto281["m_columns"][] = "duracao";
$proto281["m_columns"][] = "custo";
$proto281["m_columns"][] = "calldate";
$proto281["m_columns"][] = "uniqueid";
$proto281["m_columns"][] = "id_interf";
$proto281["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto281);

$proto280["m_table"] = $obj;
$proto280["m_alias"] = "ct";
$proto282=array();
$proto282["m_sql"] = "";
$proto282["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto282["m_column"]=$obj;
$proto282["m_contained"] = array();
$proto282["m_strCase"] = "";
$proto282["m_havingmode"] = "0";
$proto282["m_inBrackets"] = "0";
$proto282["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto282);

$proto280["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto280);

$proto259["m_fromlist"][]=$obj;
												$proto284=array();
$proto284["m_link"] = "SQLL_CROSSJOIN";
			$proto285=array();
$proto285["m_strName"] = "ipbx_interf";
$proto285["m_columns"] = array();
$proto285["m_columns"][] = "id_interf";
$proto285["m_columns"][] = "dsc_interf";
$proto285["m_columns"][] = "id_contrato";
$proto285["m_columns"][] = "board";
$proto285["m_columns"][] = "link";
$proto285["m_columns"][] = "usuario";
$proto285["m_columns"][] = "senha";
$proto285["m_columns"][] = "ip_host";
$proto285["m_columns"][] = "id_central";
$proto285["m_columns"][] = "codec";
$proto285["m_columns"][] = "id_tp_interf";
$proto285["m_columns"][] = "tp_chamada";
$proto285["m_columns"][] = "piloto";
$proto285["m_columns"][] = "id_chamada";
$proto285["m_columns"][] = "flg_id_cham_parc";
$proto285["m_columns"][] = "dtmf";
$proto285["m_columns"][] = "ddd_localidade";
$proto285["m_columns"][] = "cd_operadora";
$proto285["m_columns"][] = "khomp_interf";
$proto285["m_columns"][] = "flg_logon_remoto";
$proto285["m_columns"][] = "pers_params";
$proto285["m_columns"][] = "registro";
$obj = new SQLTable($proto285);

$proto284["m_table"] = $obj;
$proto284["m_alias"] = "ii";
$proto286=array();
$proto286["m_sql"] = "";
$proto286["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto286["m_column"]=$obj;
$proto286["m_contained"] = array();
$proto286["m_strCase"] = "";
$proto286["m_havingmode"] = "0";
$proto286["m_inBrackets"] = "0";
$proto286["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto286);

$proto284["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto284);

$proto259["m_fromlist"][]=$obj;
$proto259["m_groupby"] = array();
												$proto288=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto288["m_column"]=$obj;
$obj = new SQLGroupByItem($proto288);

$proto259["m_groupby"][]=$obj;
$proto259["m_orderby"] = array();
												$proto290=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto290["m_column"]=$obj;
$proto290["m_bAsc"] = 1;
$proto290["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto290);

$proto259["m_orderby"][]=$obj;					
												$proto292=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto292["m_column"]=$obj;
$proto292["m_bAsc"] = 1;
$proto292["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto292);

$proto259["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto259);

$queryData_Graf__Minutagem_Voip = $obj;
$tdataGraf__Minutagem_Voip[".sqlquery"] = $queryData_Graf__Minutagem_Voip;



?>
