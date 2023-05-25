<?php

//	field labels
$fieldLabelsChamadas_sem_atendimento = array();
$fieldLabelsChamadas_sem_atendimento["Portuguese(Brazil)"]=array();
$fieldLabelsChamadas_sem_atendimento["Portuguese(Brazil)"]["Agentes"] = "Agentes";
$fieldLabelsChamadas_sem_atendimento["Portuguese(Brazil)"]["Perdidas"] = "Perdidas";
$fieldLabelsChamadas_sem_atendimento["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsChamadas_sem_atendimento["Portuguese(Brazil)"]["Fila"] = "Fila";


$tdataChamadas_sem_atendimento=array();
	$tdataChamadas_sem_atendimento[".ShortName"]="Chamadas_sem_atendimento";
	$tdataChamadas_sem_atendimento[".OwnerID"]="";
	$tdataChamadas_sem_atendimento[".OriginalTable"]="cc_receptivo_n_atend";
	$tdataChamadas_sem_atendimento[".NCSearch"]=true;
	
	$tdataChamadas_sem_atendimento[".ChartRefreshTime"] = 0;

$tdataChamadas_sem_atendimento[".shortTableName"] = "Chamadas_sem_atendimento";
$tdataChamadas_sem_atendimento[".dataSourceTable"] = "Graf. Chamadas sem atendimento";
$tdataChamadas_sem_atendimento[".nSecOptions"] = 0;
$tdataChamadas_sem_atendimento[".nLoginMethod"] = 1;
$tdataChamadas_sem_atendimento[".recsPerRowList"] = 1;	
$tdataChamadas_sem_atendimento[".tableGroupBy"] = "1";
$tdataChamadas_sem_atendimento[".dbType"] = 0;
$tdataChamadas_sem_atendimento[".mainTableOwnerID"] = "";
$tdataChamadas_sem_atendimento[".moveNext"] = 1;

$tdataChamadas_sem_atendimento[".listAjax"] = true;

	$tdataChamadas_sem_atendimento[".audit"] = false;

	$tdataChamadas_sem_atendimento[".locking"] = false;
	
$tdataChamadas_sem_atendimento[".listIcons"] = true;




$tdataChamadas_sem_atendimento[".showSimpleSearchOptions"] = false;

$tdataChamadas_sem_atendimento[".showSearchPanel"] = true;


$tdataChamadas_sem_atendimento[".isUseAjaxSuggest"] = true;


$tdataChamadas_sem_atendimento[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataChamadas_sem_atendimento[".arrKeyFields"][] = "agente";
$tdataChamadas_sem_atendimento[".arrKeyFields"][] = "dt_entrada";
$tdataChamadas_sem_atendimento[".arrKeyFields"][] = "Fila";

// use datepicker for search panel
$tdataChamadas_sem_atendimento[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataChamadas_sem_atendimento[".isUseTimeForSearch"] = false;





$tdataChamadas_sem_atendimento[".isUseInlineJs"] = $tdataChamadas_sem_atendimento[".isUseInlineAdd"] || $tdataChamadas_sem_atendimento[".isUseInlineEdit"];

$tdataChamadas_sem_atendimento[".allSearchFields"] = array();

$tdataChamadas_sem_atendimento[".globSearchFields"][] = "Agentes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Agentes", $tdataChamadas_sem_atendimento[".allSearchFields"]))
{
	$tdataChamadas_sem_atendimento[".allSearchFields"][] = "Agentes";	
}
$tdataChamadas_sem_atendimento[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataChamadas_sem_atendimento[".allSearchFields"]))
{
	$tdataChamadas_sem_atendimento[".allSearchFields"][] = "Data";	
}
$tdataChamadas_sem_atendimento[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataChamadas_sem_atendimento[".allSearchFields"]))
{
	$tdataChamadas_sem_atendimento[".allSearchFields"][] = "Fila";	
}


$tdataChamadas_sem_atendimento[".isDynamicPerm"] = true;

	

$tdataChamadas_sem_atendimento[".isDisplayLoading"] = true;

$tdataChamadas_sem_atendimento[".isResizeColumns"] = false;


$tdataChamadas_sem_atendimento[".createLoginPage"] = true;


 	



$gstrOrderBy = "order by dt_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataChamadas_sem_atendimento[".strOrderBy"] = $gstrOrderBy;
	
$tdataChamadas_sem_atendimento[".orderindexes"] = array();

$tdataChamadas_sem_atendimento[".sqlHead"] = "SELECT agente AS Agentes,  COUNT(*) AS Perdidas,  dt_entrada AS `Data`,  Fila";

$tdataChamadas_sem_atendimento[".sqlFrom"] = "FROM cc_receptivo_n_atend";

$tdataChamadas_sem_atendimento[".sqlWhereExpr"] = "";

$tdataChamadas_sem_atendimento[".sqlTail"] = "GROUP BY Fila, Agentes";



	$tableKeys=array();
	$tableKeys[]="agente";
	$tableKeys[]="dt_entrada";
	$tableKeys[]="Fila";
	$tdataChamadas_sem_atendimento[".Keys"]=$tableKeys;

	
//	Agentes
	$fdata = array();
	$fdata["strName"] = "Agentes";
	$fdata["ownerTable"] = "cc_receptivo_n_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Agente";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Agente";
				$fdata["LookupTable"]="cc_receptivo_filas_atend";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agentes";
		$fdata["FullName"]= "agente";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataChamadas_sem_atendimento["Agentes"]=$fdata;
	
//	Perdidas
	$fdata = array();
	$fdata["strName"] = "Perdidas";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Perdidas";
		$fdata["FullName"]= "COUNT(*)";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataChamadas_sem_atendimento["Perdidas"]=$fdata;
	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "cc_receptivo_n_atend";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "dt_entrada";
						$fdata["Index"]= 3;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataChamadas_sem_atendimento["Data"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_n_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="nm_fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="nm_fila";
				$fdata["LookupTable"]="cc_receptivo_filas";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataChamadas_sem_atendimento["Fila"]=$fdata;

$tdataChamadas_sem_atendimento[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Chamadas sem atendimento</attr>
</attr>
<attr value="chart_type">
	<attr value="type">2d_bar</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Perdidas</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">Agentes</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">Chamadas sem Atendimento</attr>

<attr value="foot">Legendas</attr>

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
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">Agentes</attr>
		<attr value="label">Agentes</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Perdidas</attr>
		<attr value="label">Perdidas</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">Data</attr>
		<attr value="label">Data</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">Fila</attr>
		<attr value="label">Fila</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">Agentes</attr>
<attr value="short_table_name">Chamadas_sem_atendimento</attr>
</attr>

</chart>';
	
$tables_data["Graf. Chamadas sem atendimento"]=&$tdataChamadas_sem_atendimento;
$field_labels["Graf__Chamadas_sem_atendimento"] = &$fieldLabelsChamadas_sem_atendimento;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Chamadas sem atendimento"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Chamadas sem atendimento"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto100=array();
$proto100["m_strHead"] = "SELECT";
$proto100["m_strFieldList"] = "agente AS Agentes,  COUNT(*) AS Perdidas,  dt_entrada AS `Data`,  Fila";
$proto100["m_strFrom"] = "FROM cc_receptivo_n_atend";
$proto100["m_strWhere"] = "";
$proto100["m_strOrderBy"] = "order by dt_entrada";
$proto100["m_strTail"] = "GROUP BY Fila, Agentes";
$proto101=array();
$proto101["m_sql"] = "";
$proto101["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto101["m_column"]=$obj;
$proto101["m_contained"] = array();
$proto101["m_strCase"] = "";
$proto101["m_havingmode"] = "0";
$proto101["m_inBrackets"] = "0";
$proto101["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto101);

$proto100["m_where"] = $obj;
$proto103=array();
$proto103["m_sql"] = "";
$proto103["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto103["m_column"]=$obj;
$proto103["m_contained"] = array();
$proto103["m_strCase"] = "";
$proto103["m_havingmode"] = "0";
$proto103["m_inBrackets"] = "0";
$proto103["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto103);

$proto100["m_having"] = $obj;
$proto100["m_fieldlist"] = array();
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "cc_receptivo_n_atend"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "Agentes";
$obj = new SQLFieldListItem($proto105);

$proto100["m_fieldlist"][]=$obj;
						$proto107=array();
			$proto108=array();
$proto108["m_functiontype"] = "SQLF_COUNT";
$proto108["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "*"
));

$proto108["m_arguments"][]=$obj;
$proto108["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto108);

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "Perdidas";
$obj = new SQLFieldListItem($proto107);

$proto100["m_fieldlist"][]=$obj;
						$proto110=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_n_atend"
));

$proto110["m_expr"]=$obj;
$proto110["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto110);

$proto100["m_fieldlist"][]=$obj;
						$proto112=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_n_atend"
));

$proto112["m_expr"]=$obj;
$proto112["m_alias"] = "";
$obj = new SQLFieldListItem($proto112);

$proto100["m_fieldlist"][]=$obj;
$proto100["m_fromlist"] = array();
												$proto114=array();
$proto114["m_link"] = "SQLL_MAIN";
			$proto115=array();
$proto115["m_strName"] = "cc_receptivo_n_atend";
$proto115["m_columns"] = array();
$proto115["m_columns"][] = "chave";
$proto115["m_columns"][] = "agente";
$proto115["m_columns"][] = "dt_entrada";
$proto115["m_columns"][] = "hr_entrada";
$proto115["m_columns"][] = "Fila";
$proto115["m_columns"][] = "tp_toque";
$obj = new SQLTable($proto115);

$proto114["m_table"] = $obj;
$proto114["m_alias"] = "";
$proto116=array();
$proto116["m_sql"] = "";
$proto116["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto116["m_column"]=$obj;
$proto116["m_contained"] = array();
$proto116["m_strCase"] = "";
$proto116["m_havingmode"] = "0";
$proto116["m_inBrackets"] = "0";
$proto116["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto116);

$proto114["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto114);

$proto100["m_fromlist"][]=$obj;
$proto100["m_groupby"] = array();
												$proto118=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_n_atend"
));

$proto118["m_column"]=$obj;
$obj = new SQLGroupByItem($proto118);

$proto100["m_groupby"][]=$obj;
												$proto120=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Agentes"
));

$proto120["m_column"]=$obj;
$obj = new SQLGroupByItem($proto120);

$proto100["m_groupby"][]=$obj;
$proto100["m_orderby"] = array();
												$proto122=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_n_atend"
));

$proto122["m_column"]=$obj;
$proto122["m_bAsc"] = 1;
$proto122["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto122);

$proto100["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto100);

$queryData_Chamadas_sem_atendimento = $obj;
$tdataChamadas_sem_atendimento[".sqlquery"] = $queryData_Chamadas_sem_atendimento;



?>
