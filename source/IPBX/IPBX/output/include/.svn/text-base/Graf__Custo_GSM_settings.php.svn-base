<?php

//	field labels
$fieldLabelsGraf__Custo_GSM = array();
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]=array();
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___Y__"] = "DATE FORMAT(conta.calldate, '%Y')";
$fieldLabelsGraf__Custo_GSM["Portuguese(Brazil)"]["DATE_FORMAT_conta_calldate___m__"] = "DATE FORMAT(conta.calldate, '%m')";
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


 	



$gstrOrderBy = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataGraf__Custo_GSM[".strOrderBy"] = $gstrOrderBy;
	
$tdataGraf__Custo_GSM[".orderindexes"] = array();

$tdataGraf__Custo_GSM[".sqlHead"] = "select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";

$tdataGraf__Custo_GSM[".sqlFrom"] = "FROM conta AS ct";

$tdataGraf__Custo_GSM[".sqlWhereExpr"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";

$tdataGraf__Custo_GSM[".sqlTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";



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
		$fdata["FullName"]= "DATE_FORMAT(ct.calldate,'%m-%Y')";
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
			
									$tdataGraf__Custo_GSM["DATE_FORMAT(conta.calldate,'%Y')"]=$fdata;
	
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










$proto145=array();
$proto145["m_strHead"] = "select";
$proto145["m_strFieldList"] = "DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$proto145["m_strFrom"] = "FROM conta AS ct";
$proto145["m_strWhere"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";
$proto145["m_strOrderBy"] = "ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
$proto145["m_strTail"] = "GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";
$proto146=array();
$proto146["m_sql"] = "(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";
$proto146["m_uniontype"] = "SQLL_UNKNOWN";
						$proto147=array();
$proto147["m_strHead"] = "select";
$proto147["m_strFieldList"] = "id_tp_interf";
$proto147["m_strFrom"] = "FROM ipbx_interf";
$proto147["m_strWhere"] = "id_interf = ct.id_interf";
$proto147["m_strOrderBy"] = "";
$proto147["m_strTail"] = "";
$proto148=array();
$proto148["m_sql"] = "id_interf = ct.id_interf";
$proto148["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf"
));

$proto148["m_column"]=$obj;
$proto148["m_contained"] = array();
$proto148["m_strCase"] = "= ct.id_interf";
$proto148["m_havingmode"] = "0";
$proto148["m_inBrackets"] = "0";
$proto148["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto148);

$proto147["m_where"] = $obj;
$proto150=array();
$proto150["m_sql"] = "";
$proto150["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto150["m_column"]=$obj;
$proto150["m_contained"] = array();
$proto150["m_strCase"] = "";
$proto150["m_havingmode"] = "0";
$proto150["m_inBrackets"] = "0";
$proto150["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto150);

$proto147["m_having"] = $obj;
$proto147["m_fieldlist"] = array();
						$proto152=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf"
));

$proto152["m_expr"]=$obj;
$proto152["m_alias"] = "";
$obj = new SQLFieldListItem($proto152);

$proto147["m_fieldlist"][]=$obj;
$proto147["m_fromlist"] = array();
												$proto154=array();
$proto154["m_link"] = "SQLL_MAIN";
			$proto155=array();
$proto155["m_strName"] = "ipbx_interf";
$proto155["m_columns"] = array();
$proto155["m_columns"][] = "id_interf";
$proto155["m_columns"][] = "dsc_interf";
$proto155["m_columns"][] = "id_contrato";
$proto155["m_columns"][] = "board";
$proto155["m_columns"][] = "link";
$proto155["m_columns"][] = "usuario";
$proto155["m_columns"][] = "senha";
$proto155["m_columns"][] = "ip_host";
$proto155["m_columns"][] = "id_central";
$proto155["m_columns"][] = "codec";
$proto155["m_columns"][] = "id_tp_interf";
$proto155["m_columns"][] = "tp_chamada";
$proto155["m_columns"][] = "piloto";
$proto155["m_columns"][] = "id_chamada";
$proto155["m_columns"][] = "flg_id_cham_parc";
$proto155["m_columns"][] = "dtmf";
$proto155["m_columns"][] = "ddd_localidade";
$proto155["m_columns"][] = "cd_operadora";
$proto155["m_columns"][] = "khomp_interf";
$proto155["m_columns"][] = "flg_logon_remoto";
$proto155["m_columns"][] = "pers_params";
$proto155["m_columns"][] = "registro";
$obj = new SQLTable($proto155);

$proto154["m_table"] = $obj;
$proto154["m_alias"] = "";
$proto156=array();
$proto156["m_sql"] = "";
$proto156["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto156["m_column"]=$obj;
$proto156["m_contained"] = array();
$proto156["m_strCase"] = "";
$proto156["m_havingmode"] = "0";
$proto156["m_inBrackets"] = "0";
$proto156["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto156);

$proto154["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto154);

$proto147["m_fromlist"][]=$obj;
$proto147["m_groupby"] = array();
$proto147["m_orderby"] = array();
$obj = new SQLQuery($proto147);

$proto146["m_column"]=$obj;
$proto146["m_contained"] = array();
$proto146["m_strCase"] = "in (3)";
$proto146["m_havingmode"] = "0";
$proto146["m_inBrackets"] = "0";
$proto146["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto146);

$proto145["m_where"] = $obj;
$proto158=array();
$proto158["m_sql"] = "";
$proto158["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto158["m_column"]=$obj;
$proto158["m_contained"] = array();
$proto158["m_strCase"] = "";
$proto158["m_havingmode"] = "0";
$proto158["m_inBrackets"] = "0";
$proto158["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto158);

$proto145["m_having"] = $obj;
$proto145["m_fieldlist"] = array();
						$proto160=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto160["m_expr"]=$obj;
$proto160["m_alias"] = "DATA";
$obj = new SQLFieldListItem($proto160);

$proto145["m_fieldlist"][]=$obj;
						$proto162=array();
			$proto163=array();
$proto163["m_functiontype"] = "SQLF_CUSTOM";
$proto163["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.custo)"
));

$proto163["m_arguments"][]=$obj;
$proto163["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto163);

$proto162["m_expr"]=$obj;
$proto162["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto162);

$proto145["m_fieldlist"][]=$obj;
						$proto165=array();
			$proto166=array();
$proto166["m_functiontype"] = "SQLF_CUSTOM";
$proto166["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(ct.duracao/60)"
));

$proto166["m_arguments"][]=$obj;
$proto166["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto166);

$proto165["m_expr"]=$obj;
$proto165["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto165);

$proto145["m_fieldlist"][]=$obj;
						$proto168=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto168["m_expr"]=$obj;
$proto168["m_alias"] = "DATE_FORMAT(conta.calldate,'%Y')";
$obj = new SQLFieldListItem($proto168);

$proto145["m_fieldlist"][]=$obj;
						$proto170=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto170["m_expr"]=$obj;
$proto170["m_alias"] = "DATE_FORMAT(conta.calldate,'%m')";
$obj = new SQLFieldListItem($proto170);

$proto145["m_fieldlist"][]=$obj;
$proto145["m_fromlist"] = array();
												$proto172=array();
$proto172["m_link"] = "SQLL_MAIN";
			$proto173=array();
$proto173["m_strName"] = "conta";
$proto173["m_columns"] = array();
$proto173["m_columns"][] = "id_conta";
$proto173["m_columns"][] = "idt_custo";
$proto173["m_columns"][] = "origem";
$proto173["m_columns"][] = "destino";
$proto173["m_columns"][] = "duracao";
$proto173["m_columns"][] = "custo";
$proto173["m_columns"][] = "calldate";
$proto173["m_columns"][] = "uniqueid";
$proto173["m_columns"][] = "id_interf";
$proto173["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto173);

$proto172["m_table"] = $obj;
$proto172["m_alias"] = "ct";
$proto174=array();
$proto174["m_sql"] = "";
$proto174["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto174["m_column"]=$obj;
$proto174["m_contained"] = array();
$proto174["m_strCase"] = "";
$proto174["m_havingmode"] = "0";
$proto174["m_inBrackets"] = "0";
$proto174["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto174);

$proto172["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto172);

$proto145["m_fromlist"][]=$obj;
$proto145["m_groupby"] = array();
												$proto176=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto176["m_column"]=$obj;
$obj = new SQLGroupByItem($proto176);

$proto145["m_groupby"][]=$obj;
$proto145["m_orderby"] = array();
												$proto178=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%Y')"
));

$proto178["m_column"]=$obj;
$proto178["m_bAsc"] = 1;
$proto178["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto178);

$proto145["m_orderby"][]=$obj;					
												$proto180=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m')"
));

$proto180["m_column"]=$obj;
$proto180["m_bAsc"] = 1;
$proto180["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto180);

$proto145["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto145);

$queryData_Graf__Custo_GSM = $obj;
$tdataGraf__Custo_GSM[".sqlquery"] = $queryData_Graf__Custo_GSM;



?>
