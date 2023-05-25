<?php

//	field labels
$fieldLabelsAcesso_de_agentes = array();
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]=array();
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]["data"] = "Data";
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]["hora"] = "Hora";
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]["ramal"] = "Ramal";
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]["acao"] = "Acao";
$fieldLabelsAcesso_de_agentes["Portuguese(Brazil)"]["agente"] = "Agente";


$tdataAcesso_de_agentes=array();
	$tdataAcesso_de_agentes[".NumberOfChars"]=80; 
	$tdataAcesso_de_agentes[".ShortName"]="Acesso_de_agentes";
	$tdataAcesso_de_agentes[".OwnerID"]="";
	$tdataAcesso_de_agentes[".OriginalTable"]="cc_receptivo_log_agentes";
	$tdataAcesso_de_agentes[".NCSearch"]=true;
	

$tdataAcesso_de_agentes[".shortTableName"] = "Acesso_de_agentes";
$tdataAcesso_de_agentes[".dataSourceTable"] = "Rel. Acesso de agentes";
$tdataAcesso_de_agentes[".nSecOptions"] = 0;
$tdataAcesso_de_agentes[".nLoginMethod"] = 1;
$tdataAcesso_de_agentes[".recsPerRowList"] = 1;	
$tdataAcesso_de_agentes[".tableGroupBy"] = "1";
$tdataAcesso_de_agentes[".dbType"] = 0;
$tdataAcesso_de_agentes[".mainTableOwnerID"] = "";
$tdataAcesso_de_agentes[".moveNext"] = 1;

$tdataAcesso_de_agentes[".listAjax"] = true;

	$tdataAcesso_de_agentes[".audit"] = false;

	$tdataAcesso_de_agentes[".locking"] = false;
	
$tdataAcesso_de_agentes[".listIcons"] = true;

$tdataAcesso_de_agentes[".exportTo"] = true;

$tdataAcesso_de_agentes[".printFriendly"] = true;


$tdataAcesso_de_agentes[".showSimpleSearchOptions"] = false;

$tdataAcesso_de_agentes[".showSearchPanel"] = true;


$tdataAcesso_de_agentes[".isUseAjaxSuggest"] = true;


$tdataAcesso_de_agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataAcesso_de_agentes[".arrKeyFields"][] = "data";
$tdataAcesso_de_agentes[".arrKeyFields"][] = "hora";
$tdataAcesso_de_agentes[".arrKeyFields"][] = "acao";

// use datepicker for search panel
$tdataAcesso_de_agentes[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataAcesso_de_agentes[".isUseTimeForSearch"] = false;





$tdataAcesso_de_agentes[".isUseInlineJs"] = $tdataAcesso_de_agentes[".isUseInlineAdd"] || $tdataAcesso_de_agentes[".isUseInlineEdit"];

$tdataAcesso_de_agentes[".allSearchFields"] = array();

$tdataAcesso_de_agentes[".globSearchFields"][] = "data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("data", $tdataAcesso_de_agentes[".allSearchFields"]))
{
	$tdataAcesso_de_agentes[".allSearchFields"][] = "data";	
}
$tdataAcesso_de_agentes[".globSearchFields"][] = "hora";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("hora", $tdataAcesso_de_agentes[".allSearchFields"]))
{
	$tdataAcesso_de_agentes[".allSearchFields"][] = "hora";	
}
$tdataAcesso_de_agentes[".globSearchFields"][] = "ramal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ramal", $tdataAcesso_de_agentes[".allSearchFields"]))
{
	$tdataAcesso_de_agentes[".allSearchFields"][] = "ramal";	
}
$tdataAcesso_de_agentes[".globSearchFields"][] = "agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("agente", $tdataAcesso_de_agentes[".allSearchFields"]))
{
	$tdataAcesso_de_agentes[".allSearchFields"][] = "agente";	
}

$tdataAcesso_de_agentes[".panelSearchFields"][] = "data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("data", $tdataAcesso_de_agentes[".allSearchFields"])) 
{
	$tdataAcesso_de_agentes[".allSearchFields"][] = "data";	
}

$tdataAcesso_de_agentes[".isDynamicPerm"] = true;

	

$tdataAcesso_de_agentes[".isDisplayLoading"] = true;

$tdataAcesso_de_agentes[".isResizeColumns"] = false;


$tdataAcesso_de_agentes[".createLoginPage"] = true;


 	

$tdataAcesso_de_agentes[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY cc.`data` DESC, cc.hora DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataAcesso_de_agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdataAcesso_de_agentes[".orderindexes"] = array();
$tdataAcesso_de_agentes[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "cc.`data`");
$tdataAcesso_de_agentes[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "cc.hora");

$tdataAcesso_de_agentes[".sqlHead"] = "SELECT cc.`data`,  cc.hora,  ir.name AS ramal,  cc.acao,  cc.agente";

$tdataAcesso_de_agentes[".sqlFrom"] = "FROM cc_receptivo_log_agentes AS cc  , ipbx_ramais AS ir  LEFT OUTER JOIN ipbx_interf AS ii ON ir.id_interf = ii.id_interf";

$tdataAcesso_de_agentes[".sqlWhereExpr"] = "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00' OR (cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00')";

$tdataAcesso_de_agentes[".sqlTail"] = "GROUP BY cc.`data`, cc.hora, cc.acao";



	$tableKeys=array();
	$tableKeys[]="data";
	$tableKeys[]="hora";
	$tableKeys[]="acao";
	$tdataAcesso_de_agentes[".Keys"]=$tableKeys;

	
//	data
	$fdata = array();
	$fdata["strName"] = "data";
	$fdata["ownerTable"] = "cc_receptivo_log_agentes";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "data";
		$fdata["FullName"]= "cc.`data`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataAcesso_de_agentes["data"]=$fdata;
	
//	hora
	$fdata = array();
	$fdata["strName"] = "hora";
	$fdata["ownerTable"] = "cc_receptivo_log_agentes";
		$fdata["Label"]="Hora"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	 $fdata["ShowTime"]=true; 
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hora";
		$fdata["FullName"]= "cc.hora";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataAcesso_de_agentes["hora"]=$fdata;
	
//	ramal
	$fdata = array();
	$fdata["strName"] = "ramal";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ramal";
		$fdata["FullName"]= "ir.name";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAcesso_de_agentes["ramal"]=$fdata;
	
//	acao
	$fdata = array();
	$fdata["strName"] = "acao";
	$fdata["ownerTable"] = "cc_receptivo_log_agentes";
		$fdata["Label"]="Acao"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "acao";
		$fdata["FullName"]= "cc.acao";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataAcesso_de_agentes["acao"]=$fdata;
	
//	agente
	$fdata = array();
	$fdata["strName"] = "agente";
	$fdata["ownerTable"] = "cc_receptivo_log_agentes";
		$fdata["Label"]="Agente"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "agente";
		$fdata["FullName"]= "cc.agente";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataAcesso_de_agentes["agente"]=$fdata;

	
$tables_data["Rel. Acesso de agentes"]=&$tdataAcesso_de_agentes;
$field_labels["Rel__Acesso_de_agentes"] = &$fieldLabelsAcesso_de_agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Acesso de agentes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Acesso de agentes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto534=array();
$proto534["m_strHead"] = "SELECT";
$proto534["m_strFieldList"] = "cc.`data`,  cc.hora,  ir.name AS ramal,  cc.acao,  cc.agente";
$proto534["m_strFrom"] = "FROM cc_receptivo_log_agentes AS cc  , ipbx_ramais AS ir  LEFT OUTER JOIN ipbx_interf AS ii ON ir.id_interf = ii.id_interf";
$proto534["m_strWhere"] = "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00' OR (cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00')";
$proto534["m_strOrderBy"] = "ORDER BY cc.`data` DESC, cc.hora DESC";
$proto534["m_strTail"] = "GROUP BY cc.`data`, cc.hora, cc.acao";
$proto535=array();
$proto535["m_sql"] = "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00' OR (cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00')";
$proto535["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00' OR (cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00')"
));

$proto535["m_column"]=$obj;
$proto535["m_contained"] = array();
						$proto537=array();
$proto537["m_sql"] = "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00'";
$proto537["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00'"
));

$proto537["m_column"]=$obj;
$proto537["m_contained"] = array();
						$proto539=array();
$proto539["m_sql"] = "4 = length(cc.`ramal`) AND ir.name = cc.ramal";
$proto539["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "4 = length(cc.`ramal`) AND ir.name = cc.ramal"
));

$proto539["m_column"]=$obj;
$proto539["m_contained"] = array();
						$proto541=array();
$proto541["m_sql"] = "4 = length(cc.`ramal`)";
$proto541["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "4"
));

$proto541["m_column"]=$obj;
$proto541["m_contained"] = array();
$proto541["m_strCase"] = "= length(cc.`ramal`)";
$proto541["m_havingmode"] = "0";
$proto541["m_inBrackets"] = "0";
$proto541["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto541);

			$proto539["m_contained"][]=$obj;
						$proto543=array();
$proto543["m_sql"] = "ir.name = cc.ramal";
$proto543["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ir"
));

$proto543["m_column"]=$obj;
$proto543["m_contained"] = array();
$proto543["m_strCase"] = "= cc.ramal";
$proto543["m_havingmode"] = "0";
$proto543["m_inBrackets"] = "0";
$proto543["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto543);

			$proto539["m_contained"][]=$obj;
$proto539["m_strCase"] = "";
$proto539["m_havingmode"] = "0";
$proto539["m_inBrackets"] = "1";
$proto539["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto539);

			$proto537["m_contained"][]=$obj;
						$proto545=array();
$proto545["m_sql"] = "cc.`data` <> '0000-00-00'";
$proto545["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "data",
	"m_strTable" => "cc"
));

$proto545["m_column"]=$obj;
$proto545["m_contained"] = array();
$proto545["m_strCase"] = "<> '0000-00-00'";
$proto545["m_havingmode"] = "0";
$proto545["m_inBrackets"] = "0";
$proto545["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto545);

			$proto537["m_contained"][]=$obj;
$proto537["m_strCase"] = "";
$proto537["m_havingmode"] = "0";
$proto537["m_inBrackets"] = "0";
$proto537["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto537);

			$proto535["m_contained"][]=$obj;
						$proto547=array();
$proto547["m_sql"] = "cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00'";
$proto547["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00'"
));

$proto547["m_column"]=$obj;
$proto547["m_contained"] = array();
						$proto549=array();
$proto549["m_sql"] = "cc.ramal = concat('b',ii.board,'c', ident_interf)";
$proto549["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ramal",
	"m_strTable" => "cc"
));

$proto549["m_column"]=$obj;
$proto549["m_contained"] = array();
$proto549["m_strCase"] = "= concat('b',ii.board,'c', ident_interf)";
$proto549["m_havingmode"] = "0";
$proto549["m_inBrackets"] = "0";
$proto549["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto549);

			$proto547["m_contained"][]=$obj;
						$proto551=array();
$proto551["m_sql"] = "length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00'";
$proto551["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00'"
));

$proto551["m_column"]=$obj;
$proto551["m_contained"] = array();
						$proto553=array();
$proto553["m_sql"] = "length(cc.ramal) > 5";
$proto553["m_uniontype"] = "SQLL_UNKNOWN";
						$proto554=array();
$proto554["m_functiontype"] = "SQLF_CUSTOM";
$proto554["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "cc.ramal"
));

$proto554["m_arguments"][]=$obj;
$proto554["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto554);

$proto553["m_column"]=$obj;
$proto553["m_contained"] = array();
$proto553["m_strCase"] = "> 5";
$proto553["m_havingmode"] = "0";
$proto553["m_inBrackets"] = "0";
$proto553["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto553);

			$proto551["m_contained"][]=$obj;
						$proto556=array();
$proto556["m_sql"] = "ir.id_interf = ii.id_interf";
$proto556["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ir"
));

$proto556["m_column"]=$obj;
$proto556["m_contained"] = array();
$proto556["m_strCase"] = "= ii.id_interf";
$proto556["m_havingmode"] = "0";
$proto556["m_inBrackets"] = "0";
$proto556["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto556);

			$proto551["m_contained"][]=$obj;
						$proto558=array();
$proto558["m_sql"] = "cc.`data` <> '0000-00-00'";
$proto558["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "data",
	"m_strTable" => "cc"
));

$proto558["m_column"]=$obj;
$proto558["m_contained"] = array();
$proto558["m_strCase"] = "<> '0000-00-00'";
$proto558["m_havingmode"] = "0";
$proto558["m_inBrackets"] = "0";
$proto558["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto558);

			$proto551["m_contained"][]=$obj;
$proto551["m_strCase"] = "";
$proto551["m_havingmode"] = "0";
$proto551["m_inBrackets"] = "0";
$proto551["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto551);

			$proto547["m_contained"][]=$obj;
$proto547["m_strCase"] = "";
$proto547["m_havingmode"] = "0";
$proto547["m_inBrackets"] = "1";
$proto547["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto547);

			$proto535["m_contained"][]=$obj;
$proto535["m_strCase"] = "";
$proto535["m_havingmode"] = "0";
$proto535["m_inBrackets"] = "0";
$proto535["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto535);

$proto534["m_where"] = $obj;
$proto560=array();
$proto560["m_sql"] = "";
$proto560["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto560["m_column"]=$obj;
$proto560["m_contained"] = array();
$proto560["m_strCase"] = "";
$proto560["m_havingmode"] = "0";
$proto560["m_inBrackets"] = "0";
$proto560["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto560);

$proto534["m_having"] = $obj;
$proto534["m_fieldlist"] = array();
						$proto562=array();
			$obj = new SQLField(array(
	"m_strName" => "data",
	"m_strTable" => "cc"
));

$proto562["m_expr"]=$obj;
$proto562["m_alias"] = "";
$obj = new SQLFieldListItem($proto562);

$proto534["m_fieldlist"][]=$obj;
						$proto564=array();
			$obj = new SQLField(array(
	"m_strName" => "hora",
	"m_strTable" => "cc"
));

$proto564["m_expr"]=$obj;
$proto564["m_alias"] = "";
$obj = new SQLFieldListItem($proto564);

$proto534["m_fieldlist"][]=$obj;
						$proto566=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ir"
));

$proto566["m_expr"]=$obj;
$proto566["m_alias"] = "ramal";
$obj = new SQLFieldListItem($proto566);

$proto534["m_fieldlist"][]=$obj;
						$proto568=array();
			$obj = new SQLField(array(
	"m_strName" => "acao",
	"m_strTable" => "cc"
));

$proto568["m_expr"]=$obj;
$proto568["m_alias"] = "";
$obj = new SQLFieldListItem($proto568);

$proto534["m_fieldlist"][]=$obj;
						$proto570=array();
			$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "cc"
));

$proto570["m_expr"]=$obj;
$proto570["m_alias"] = "";
$obj = new SQLFieldListItem($proto570);

$proto534["m_fieldlist"][]=$obj;
$proto534["m_fromlist"] = array();
												$proto572=array();
$proto572["m_link"] = "SQLL_MAIN";
			$proto573=array();
$proto573["m_strName"] = "cc_receptivo_log_agentes";
$proto573["m_columns"] = array();
$proto573["m_columns"][] = "data";
$proto573["m_columns"][] = "hora";
$proto573["m_columns"][] = "ramal";
$proto573["m_columns"][] = "acao";
$proto573["m_columns"][] = "agente";
$obj = new SQLTable($proto573);

$proto572["m_table"] = $obj;
$proto572["m_alias"] = "cc";
$proto574=array();
$proto574["m_sql"] = "";
$proto574["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto574["m_column"]=$obj;
$proto574["m_contained"] = array();
$proto574["m_strCase"] = "";
$proto574["m_havingmode"] = "0";
$proto574["m_inBrackets"] = "0";
$proto574["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto574);

$proto572["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto572);

$proto534["m_fromlist"][]=$obj;
												$proto576=array();
$proto576["m_link"] = "SQLL_CROSSJOIN";
			$proto577=array();
$proto577["m_strName"] = "ipbx_ramais";
$proto577["m_columns"] = array();
$proto577["m_columns"][] = "id";
$proto577["m_columns"][] = "name";
$proto577["m_columns"][] = "host";
$proto577["m_columns"][] = "nat";
$proto577["m_columns"][] = "type";
$proto577["m_columns"][] = "accountcode";
$proto577["m_columns"][] = "amaflags";
$proto577["m_columns"][] = "call-limit";
$proto577["m_columns"][] = "callgroup";
$proto577["m_columns"][] = "callerid";
$proto577["m_columns"][] = "cancallforward";
$proto577["m_columns"][] = "canreinvite";
$proto577["m_columns"][] = "context";
$proto577["m_columns"][] = "defaultip";
$proto577["m_columns"][] = "dtmfmode";
$proto577["m_columns"][] = "fromuser";
$proto577["m_columns"][] = "fromdomain";
$proto577["m_columns"][] = "insecure";
$proto577["m_columns"][] = "language";
$proto577["m_columns"][] = "mailbox";
$proto577["m_columns"][] = "md5secret";
$proto577["m_columns"][] = "deny";
$proto577["m_columns"][] = "permit";
$proto577["m_columns"][] = "mask";
$proto577["m_columns"][] = "musiconhold";
$proto577["m_columns"][] = "pickupgroup";
$proto577["m_columns"][] = "qualify";
$proto577["m_columns"][] = "rtcachefriends";
$proto577["m_columns"][] = "regexten";
$proto577["m_columns"][] = "restrictcid";
$proto577["m_columns"][] = "rtptimeout";
$proto577["m_columns"][] = "rtpholdtimeout";
$proto577["m_columns"][] = "secret";
$proto577["m_columns"][] = "setvar";
$proto577["m_columns"][] = "disallow";
$proto577["m_columns"][] = "allow";
$proto577["m_columns"][] = "fullcontact";
$proto577["m_columns"][] = "ipaddr";
$proto577["m_columns"][] = "port";
$proto577["m_columns"][] = "regserver";
$proto577["m_columns"][] = "regseconds";
$proto577["m_columns"][] = "lastms";
$proto577["m_columns"][] = "username";
$proto577["m_columns"][] = "defaultuser";
$proto577["m_columns"][] = "subscribecontext";
$proto577["m_columns"][] = "useragent";
$proto577["m_columns"][] = "gateway";
$proto577["m_columns"][] = "id_horario";
$proto577["m_columns"][] = "mail";
$proto577["m_columns"][] = "grava_chamada";
$proto577["m_columns"][] = "tp_ramal";
$proto577["m_columns"][] = "Transbordo";
$proto577["m_columns"][] = "id_interf";
$proto577["m_columns"][] = "ident_interf";
$proto577["m_columns"][] = "tp_chamada";
$proto577["m_columns"][] = "flg_cadeado";
$proto577["m_columns"][] = "desvio";
$proto577["m_columns"][] = "id_pesquisa";
$proto577["m_columns"][] = "desvio_ddr";
$proto577["m_columns"][] = "id_saida";
$proto577["m_columns"][] = "id_desvio";
$proto577["m_columns"][] = "flg_info_centrocusto";
$proto577["m_columns"][] = "id_painel_op";
$obj = new SQLTable($proto577);

$proto576["m_table"] = $obj;
$proto576["m_alias"] = "ir";
$proto578=array();
$proto578["m_sql"] = "";
$proto578["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto578["m_column"]=$obj;
$proto578["m_contained"] = array();
$proto578["m_strCase"] = "";
$proto578["m_havingmode"] = "0";
$proto578["m_inBrackets"] = "0";
$proto578["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto578);

$proto576["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto576);

$proto534["m_fromlist"][]=$obj;
												$proto580=array();
$proto580["m_link"] = "SQLL_LEFTJOIN";
			$proto581=array();
$proto581["m_strName"] = "ipbx_interf";
$proto581["m_columns"] = array();
$proto581["m_columns"][] = "id_interf";
$proto581["m_columns"][] = "dsc_interf";
$proto581["m_columns"][] = "id_contrato";
$proto581["m_columns"][] = "board";
$proto581["m_columns"][] = "link";
$proto581["m_columns"][] = "usuario";
$proto581["m_columns"][] = "senha";
$proto581["m_columns"][] = "ip_host";
$proto581["m_columns"][] = "id_central";
$proto581["m_columns"][] = "codec";
$proto581["m_columns"][] = "id_tp_interf";
$proto581["m_columns"][] = "tp_chamada";
$proto581["m_columns"][] = "piloto";
$proto581["m_columns"][] = "id_chamada";
$proto581["m_columns"][] = "flg_id_cham_parc";
$proto581["m_columns"][] = "dtmf";
$proto581["m_columns"][] = "ddd_localidade";
$proto581["m_columns"][] = "cd_operadora";
$proto581["m_columns"][] = "khomp_interf";
$proto581["m_columns"][] = "flg_logon_remoto";
$proto581["m_columns"][] = "pers_params";
$proto581["m_columns"][] = "registro";
$obj = new SQLTable($proto581);

$proto580["m_table"] = $obj;
$proto580["m_alias"] = "ii";
$proto582=array();
$proto582["m_sql"] = "ir.id_interf = ii.id_interf";
$proto582["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ir"
));

$proto582["m_column"]=$obj;
$proto582["m_contained"] = array();
$proto582["m_strCase"] = "= ii.id_interf";
$proto582["m_havingmode"] = "0";
$proto582["m_inBrackets"] = "0";
$proto582["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto582);

$proto580["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto580);

$proto534["m_fromlist"][]=$obj;
$proto534["m_groupby"] = array();
												$proto584=array();
						$obj = new SQLField(array(
	"m_strName" => "data",
	"m_strTable" => "cc"
));

$proto584["m_column"]=$obj;
$obj = new SQLGroupByItem($proto584);

$proto534["m_groupby"][]=$obj;
												$proto586=array();
						$obj = new SQLField(array(
	"m_strName" => "hora",
	"m_strTable" => "cc"
));

$proto586["m_column"]=$obj;
$obj = new SQLGroupByItem($proto586);

$proto534["m_groupby"][]=$obj;
												$proto588=array();
						$obj = new SQLField(array(
	"m_strName" => "acao",
	"m_strTable" => "cc"
));

$proto588["m_column"]=$obj;
$obj = new SQLGroupByItem($proto588);

$proto534["m_groupby"][]=$obj;
$proto534["m_orderby"] = array();
												$proto590=array();
						$obj = new SQLField(array(
	"m_strName" => "data",
	"m_strTable" => "cc"
));

$proto590["m_column"]=$obj;
$proto590["m_bAsc"] = 0;
$proto590["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto590);

$proto534["m_orderby"][]=$obj;					
												$proto592=array();
						$obj = new SQLField(array(
	"m_strName" => "hora",
	"m_strTable" => "cc"
));

$proto592["m_column"]=$obj;
$proto592["m_bAsc"] = 0;
$proto592["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto592);

$proto534["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto534);

$queryData_Acesso_de_agentes = $obj;
$tdataAcesso_de_agentes[".sqlquery"] = $queryData_Acesso_de_agentes;



?>
