<?php

//	field labels
$fieldLabelsRecebidas = array();
$fieldLabelsRecebidas["Portuguese(Brazil)"]=array();
$fieldLabelsRecebidas["Portuguese(Brazil)"]["calldate"] = "Data e Hora";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["clid"] = "Usuário";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["src"] = "Origem";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["dst"] = "Destino";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["duration"] = "Duração";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["billsec"] = "Segundos";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["accountcode"] = "Centro de custo";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["Per_odo"] = "Período";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["disposition"] = "Ultimo Estado";
$fieldLabelsRecebidas["Portuguese(Brazil)"]["Audio"] = "Audio";


$tdataRecebidas=array();
	$tdataRecebidas[".NumberOfChars"]=80; 
	$tdataRecebidas[".ShortName"]="Recebidas";
	$tdataRecebidas[".OwnerID"]="";
	$tdataRecebidas[".OriginalTable"]="cdr";
	$tdataRecebidas[".NCSearch"]=true;
	

$tdataRecebidas[".shortTableName"] = "Recebidas";
$tdataRecebidas[".dataSourceTable"] = "Rel. Recebidas";
$tdataRecebidas[".nSecOptions"] = 0;
$tdataRecebidas[".nLoginMethod"] = 1;
$tdataRecebidas[".recsPerRowList"] = 1;	
$tdataRecebidas[".tableGroupBy"] = "0";
$tdataRecebidas[".dbType"] = 0;
$tdataRecebidas[".mainTableOwnerID"] = "";
$tdataRecebidas[".moveNext"] = 1;

$tdataRecebidas[".listAjax"] = true;

	$tdataRecebidas[".audit"] = false;

	$tdataRecebidas[".locking"] = false;
	
$tdataRecebidas[".listIcons"] = true;

$tdataRecebidas[".exportTo"] = true;

$tdataRecebidas[".printFriendly"] = true;


$tdataRecebidas[".showSimpleSearchOptions"] = false;

$tdataRecebidas[".showSearchPanel"] = true;


$tdataRecebidas[".isUseAjaxSuggest"] = true;


$tdataRecebidas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRecebidas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRecebidas[".isUseTimeForSearch"] = false;





$tdataRecebidas[".isUseInlineJs"] = $tdataRecebidas[".isUseInlineAdd"] || $tdataRecebidas[".isUseInlineEdit"];

$tdataRecebidas[".allSearchFields"] = array();

$tdataRecebidas[".globSearchFields"][] = "Período";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Período", $tdataRecebidas[".allSearchFields"]))
{
	$tdataRecebidas[".allSearchFields"][] = "Período";	
}
$tdataRecebidas[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataRecebidas[".allSearchFields"]))
{
	$tdataRecebidas[".allSearchFields"][] = "src";	
}
$tdataRecebidas[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataRecebidas[".allSearchFields"]))
{
	$tdataRecebidas[".allSearchFields"][] = "dst";	
}


$tdataRecebidas[".isDynamicPerm"] = true;

	

$tdataRecebidas[".isDisplayLoading"] = true;

$tdataRecebidas[".isResizeColumns"] = false;


$tdataRecebidas[".createLoginPage"] = true;


 	

$tdataRecebidas[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRecebidas[".strOrderBy"] = $gstrOrderBy;
	
$tdataRecebidas[".orderindexes"] = array();
$tdataRecebidas[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "c.calldate");

$tdataRecebidas[".sqlHead"] = "SELECT DATE(DATE_FORMAT(c.calldate, '%Y-%m-%d')) AS `Período`,    c.calldate,    c.clid,    c.src,    c.dst,    SEC_TO_TIME(c.duration) AS duration,    SEC_TO_TIME(c.billsec) AS billsec,    c.accountcode,    CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END AS disposition,    concat('<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=', ig.id_grav, '>DOWNLOAD</a>') as Audio";

$tdataRecebidas[".sqlFrom"] = "FROM cdr c  LEFT OUTER JOIN ipbx_gravacoes ig    ON (c.uniqueid = ig.uniqueid)";

$tdataRecebidas[".sqlWhereExpr"] = "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";

$tdataRecebidas[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRecebidas[".Keys"]=$tableKeys;

	
//	Período
	$fdata = array();
	$fdata["strName"] = "Período";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Per_odo";
		$fdata["FullName"]= "DATE(DATE_FORMAT(c.calldate, '%Y-%m-%d'))";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
									$tdataRecebidas["Período"]=$fdata;
	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Data e Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "c.calldate";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["calldate"]=$fdata;
	
//	clid
	$fdata = array();
	$fdata["strName"] = "clid";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "clid";
		$fdata["FullName"]= "c.clid";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["clid"]=$fdata;
	
//	src
	$fdata = array();
	$fdata["strName"] = "src";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "src";
		$fdata["FullName"]= "c.src";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["src"]=$fdata;
	
//	dst
	$fdata = array();
	$fdata["strName"] = "dst";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dst";
		$fdata["FullName"]= "c.dst";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["dst"]=$fdata;
	
//	duration
	$fdata = array();
	$fdata["strName"] = "duration";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Duração"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "duration";
		$fdata["FullName"]= "SEC_TO_TIME(c.duration)";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRecebidas["duration"]=$fdata;
	
//	billsec
	$fdata = array();
	$fdata["strName"] = "billsec";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Segundos"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "billsec";
		$fdata["FullName"]= "SEC_TO_TIME(c.billsec)";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
										$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRecebidas["billsec"]=$fdata;
	
//	accountcode
	$fdata = array();
	$fdata["strName"] = "accountcode";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Centro de custo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "accountcode";
		$fdata["FullName"]= "c.accountcode";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
		
									$tdataRecebidas["accountcode"]=$fdata;
	
//	disposition
	$fdata = array();
	$fdata["strName"] = "disposition";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Ultimo Estado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "disposition";
		$fdata["FullName"]= "CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["disposition"]=$fdata;
	
//	Audio
	$fdata = array();
	$fdata["strName"] = "Audio";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Audio";
		$fdata["FullName"]= "concat('<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=', ig.id_grav, '>DOWNLOAD</a>')";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRecebidas["Audio"]=$fdata;

	
$tables_data["Rel. Recebidas"]=&$tdataRecebidas;
$field_labels["Rel__Recebidas"] = &$fieldLabelsRecebidas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Recebidas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Recebidas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1185=array();
$proto1185["m_strHead"] = "SELECT";
$proto1185["m_strFieldList"] = "DATE(DATE_FORMAT(c.calldate, '%Y-%m-%d')) AS `Período`,    c.calldate,    c.clid,    c.src,    c.dst,    SEC_TO_TIME(c.duration) AS duration,    SEC_TO_TIME(c.billsec) AS billsec,    c.accountcode,    CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END AS disposition,    concat('<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=', ig.id_grav, '>DOWNLOAD</a>') as Audio";
$proto1185["m_strFrom"] = "FROM cdr c  LEFT OUTER JOIN ipbx_gravacoes ig    ON (c.uniqueid = ig.uniqueid)";
$proto1185["m_strWhere"] = "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";
$proto1185["m_strOrderBy"] = "ORDER BY calldate";
$proto1185["m_strTail"] = "";
$proto1186=array();
$proto1186["m_sql"] = "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";
$proto1186["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)"
));

$proto1186["m_column"]=$obj;
$proto1186["m_contained"] = array();
						$proto1188=array();
$proto1188["m_sql"] = "src <> \"\"";
$proto1188["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "c"
));

$proto1188["m_column"]=$obj;
$proto1188["m_contained"] = array();
$proto1188["m_strCase"] = "<> \"\"";
$proto1188["m_havingmode"] = "0";
$proto1188["m_inBrackets"] = "1";
$proto1188["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1188);

			$proto1186["m_contained"][]=$obj;
						$proto1190=array();
$proto1190["m_sql"] = "dst <> \"\"";
$proto1190["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "c"
));

$proto1190["m_column"]=$obj;
$proto1190["m_contained"] = array();
$proto1190["m_strCase"] = "<> \"\"";
$proto1190["m_havingmode"] = "0";
$proto1190["m_inBrackets"] = "1";
$proto1190["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1190);

			$proto1186["m_contained"][]=$obj;
						$proto1192=array();
$proto1192["m_sql"] = "LENGTH(dst) < 5";
$proto1192["m_uniontype"] = "SQLL_UNKNOWN";
						$proto1193=array();
$proto1193["m_functiontype"] = "SQLF_CUSTOM";
$proto1193["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto1193["m_arguments"][]=$obj;
$proto1193["m_strFunctionName"] = "LENGTH";
$obj = new SQLFunctionCall($proto1193);

$proto1192["m_column"]=$obj;
$proto1192["m_contained"] = array();
$proto1192["m_strCase"] = "< 5";
$proto1192["m_havingmode"] = "0";
$proto1192["m_inBrackets"] = "1";
$proto1192["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1192);

			$proto1186["m_contained"][]=$obj;
						$proto1195=array();
$proto1195["m_sql"] = "LENGTH(dst) > 2";
$proto1195["m_uniontype"] = "SQLL_UNKNOWN";
						$proto1196=array();
$proto1196["m_functiontype"] = "SQLF_CUSTOM";
$proto1196["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto1196["m_arguments"][]=$obj;
$proto1196["m_strFunctionName"] = "LENGTH";
$obj = new SQLFunctionCall($proto1196);

$proto1195["m_column"]=$obj;
$proto1195["m_contained"] = array();
$proto1195["m_strCase"] = "> 2";
$proto1195["m_havingmode"] = "0";
$proto1195["m_inBrackets"] = "1";
$proto1195["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1195);

			$proto1186["m_contained"][]=$obj;
$proto1186["m_strCase"] = "";
$proto1186["m_havingmode"] = "0";
$proto1186["m_inBrackets"] = "0";
$proto1186["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1186);

$proto1185["m_where"] = $obj;
$proto1198=array();
$proto1198["m_sql"] = "";
$proto1198["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1198["m_column"]=$obj;
$proto1198["m_contained"] = array();
$proto1198["m_strCase"] = "";
$proto1198["m_havingmode"] = "0";
$proto1198["m_inBrackets"] = "0";
$proto1198["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1198);

$proto1185["m_having"] = $obj;
$proto1185["m_fieldlist"] = array();
						$proto1200=array();
			$proto1201=array();
$proto1201["m_functiontype"] = "SQLF_CUSTOM";
$proto1201["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(c.calldate, '%Y-%m-%d')"
));

$proto1201["m_arguments"][]=$obj;
$proto1201["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1201);

$proto1200["m_expr"]=$obj;
$proto1200["m_alias"] = "Período";
$obj = new SQLFieldListItem($proto1200);

$proto1185["m_fieldlist"][]=$obj;
						$proto1203=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "c"
));

$proto1203["m_expr"]=$obj;
$proto1203["m_alias"] = "";
$obj = new SQLFieldListItem($proto1203);

$proto1185["m_fieldlist"][]=$obj;
						$proto1205=array();
			$obj = new SQLField(array(
	"m_strName" => "clid",
	"m_strTable" => "c"
));

$proto1205["m_expr"]=$obj;
$proto1205["m_alias"] = "";
$obj = new SQLFieldListItem($proto1205);

$proto1185["m_fieldlist"][]=$obj;
						$proto1207=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "c"
));

$proto1207["m_expr"]=$obj;
$proto1207["m_alias"] = "";
$obj = new SQLFieldListItem($proto1207);

$proto1185["m_fieldlist"][]=$obj;
						$proto1209=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "c"
));

$proto1209["m_expr"]=$obj;
$proto1209["m_alias"] = "";
$obj = new SQLFieldListItem($proto1209);

$proto1185["m_fieldlist"][]=$obj;
						$proto1211=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(c.duration)"
));

$proto1211["m_expr"]=$obj;
$proto1211["m_alias"] = "duration";
$obj = new SQLFieldListItem($proto1211);

$proto1185["m_fieldlist"][]=$obj;
						$proto1213=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(c.billsec)"
));

$proto1213["m_expr"]=$obj;
$proto1213["m_alias"] = "billsec";
$obj = new SQLFieldListItem($proto1213);

$proto1185["m_fieldlist"][]=$obj;
						$proto1215=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "c"
));

$proto1215["m_expr"]=$obj;
$proto1215["m_alias"] = "";
$obj = new SQLFieldListItem($proto1215);

$proto1185["m_fieldlist"][]=$obj;
						$proto1217=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END"
));

$proto1217["m_expr"]=$obj;
$proto1217["m_alias"] = "disposition";
$obj = new SQLFieldListItem($proto1217);

$proto1185["m_fieldlist"][]=$obj;
						$proto1219=array();
			$proto1220=array();
$proto1220["m_functiontype"] = "SQLF_CUSTOM";
$proto1220["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1='"
));

$proto1220["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ig.id_grav"
));

$proto1220["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'>DOWNLOAD</a>'"
));

$proto1220["m_arguments"][]=$obj;
$proto1220["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1220);

$proto1219["m_expr"]=$obj;
$proto1219["m_alias"] = "Audio";
$obj = new SQLFieldListItem($proto1219);

$proto1185["m_fieldlist"][]=$obj;
$proto1185["m_fromlist"] = array();
												$proto1224=array();
$proto1224["m_link"] = "SQLL_MAIN";
			$proto1225=array();
$proto1225["m_strName"] = "cdr";
$proto1225["m_columns"] = array();
$proto1225["m_columns"][] = "calldate";
$proto1225["m_columns"][] = "clid";
$proto1225["m_columns"][] = "src";
$proto1225["m_columns"][] = "dst";
$proto1225["m_columns"][] = "dcontext";
$proto1225["m_columns"][] = "channel";
$proto1225["m_columns"][] = "dstchannel";
$proto1225["m_columns"][] = "lastapp";
$proto1225["m_columns"][] = "lastdata";
$proto1225["m_columns"][] = "duration";
$proto1225["m_columns"][] = "billsec";
$proto1225["m_columns"][] = "disposition";
$proto1225["m_columns"][] = "amaflags";
$proto1225["m_columns"][] = "accountcode";
$proto1225["m_columns"][] = "uniqueid";
$proto1225["m_columns"][] = "userfield";
$obj = new SQLTable($proto1225);

$proto1224["m_table"] = $obj;
$proto1224["m_alias"] = "c";
$proto1226=array();
$proto1226["m_sql"] = "";
$proto1226["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1226["m_column"]=$obj;
$proto1226["m_contained"] = array();
$proto1226["m_strCase"] = "";
$proto1226["m_havingmode"] = "0";
$proto1226["m_inBrackets"] = "0";
$proto1226["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1226);

$proto1224["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1224);

$proto1185["m_fromlist"][]=$obj;
												$proto1228=array();
$proto1228["m_link"] = "SQLL_LEFTJOIN";
			$proto1229=array();
$proto1229["m_strName"] = "ipbx_gravacoes";
$proto1229["m_columns"] = array();
$proto1229["m_columns"][] = "id_grav";
$proto1229["m_columns"][] = "tp_gravacao";
$proto1229["m_columns"][] = "dt_gravacao";
$proto1229["m_columns"][] = "nm_arq";
$proto1229["m_columns"][] = "num_destino";
$proto1229["m_columns"][] = "num_final";
$proto1229["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto1229);

$proto1228["m_table"] = $obj;
$proto1228["m_alias"] = "ig";
$proto1230=array();
$proto1230["m_sql"] = "c.uniqueid = ig.uniqueid";
$proto1230["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "c.uniqueid = ig.uniqueid"
));

$proto1230["m_column"]=$obj;
$proto1230["m_contained"] = array();
$proto1230["m_strCase"] = "= True";
$proto1230["m_havingmode"] = "0";
$proto1230["m_inBrackets"] = "1";
$proto1230["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1230);

$proto1228["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1228);

$proto1185["m_fromlist"][]=$obj;
$proto1185["m_groupby"] = array();
$proto1185["m_orderby"] = array();
												$proto1232=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "c"
));

$proto1232["m_column"]=$obj;
$proto1232["m_bAsc"] = 1;
$proto1232["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1232);

$proto1185["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1185);

$queryData_Recebidas = $obj;
$tdataRecebidas[".sqlquery"] = $queryData_Recebidas;



?>
