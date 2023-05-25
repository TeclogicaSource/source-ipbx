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










$proto991=array();
$proto991["m_strHead"] = "SELECT";
$proto991["m_strFieldList"] = "DATE(DATE_FORMAT(c.calldate, '%Y-%m-%d')) AS `Período`,    c.calldate,    c.clid,    c.src,    c.dst,    SEC_TO_TIME(c.duration) AS duration,    SEC_TO_TIME(c.billsec) AS billsec,    c.accountcode,    CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END AS disposition,    concat('<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=', ig.id_grav, '>DOWNLOAD</a>') as Audio";
$proto991["m_strFrom"] = "FROM cdr c  LEFT OUTER JOIN ipbx_gravacoes ig    ON (c.uniqueid = ig.uniqueid)";
$proto991["m_strWhere"] = "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";
$proto991["m_strOrderBy"] = "ORDER BY calldate";
$proto991["m_strTail"] = "";
$proto992=array();
$proto992["m_sql"] = "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";
$proto992["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)"
));

$proto992["m_column"]=$obj;
$proto992["m_contained"] = array();
						$proto994=array();
$proto994["m_sql"] = "src <> \"\"";
$proto994["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "c"
));

$proto994["m_column"]=$obj;
$proto994["m_contained"] = array();
$proto994["m_strCase"] = "<> \"\"";
$proto994["m_havingmode"] = "0";
$proto994["m_inBrackets"] = "1";
$proto994["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto994);

			$proto992["m_contained"][]=$obj;
						$proto996=array();
$proto996["m_sql"] = "dst <> \"\"";
$proto996["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "c"
));

$proto996["m_column"]=$obj;
$proto996["m_contained"] = array();
$proto996["m_strCase"] = "<> \"\"";
$proto996["m_havingmode"] = "0";
$proto996["m_inBrackets"] = "1";
$proto996["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto996);

			$proto992["m_contained"][]=$obj;
						$proto998=array();
$proto998["m_sql"] = "LENGTH(dst) < 5";
$proto998["m_uniontype"] = "SQLL_UNKNOWN";
						$proto999=array();
$proto999["m_functiontype"] = "SQLF_CUSTOM";
$proto999["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto999["m_arguments"][]=$obj;
$proto999["m_strFunctionName"] = "LENGTH";
$obj = new SQLFunctionCall($proto999);

$proto998["m_column"]=$obj;
$proto998["m_contained"] = array();
$proto998["m_strCase"] = "< 5";
$proto998["m_havingmode"] = "0";
$proto998["m_inBrackets"] = "1";
$proto998["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto998);

			$proto992["m_contained"][]=$obj;
						$proto1001=array();
$proto1001["m_sql"] = "LENGTH(dst) > 2";
$proto1001["m_uniontype"] = "SQLL_UNKNOWN";
						$proto1002=array();
$proto1002["m_functiontype"] = "SQLF_CUSTOM";
$proto1002["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto1002["m_arguments"][]=$obj;
$proto1002["m_strFunctionName"] = "LENGTH";
$obj = new SQLFunctionCall($proto1002);

$proto1001["m_column"]=$obj;
$proto1001["m_contained"] = array();
$proto1001["m_strCase"] = "> 2";
$proto1001["m_havingmode"] = "0";
$proto1001["m_inBrackets"] = "1";
$proto1001["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1001);

			$proto992["m_contained"][]=$obj;
$proto992["m_strCase"] = "";
$proto992["m_havingmode"] = "0";
$proto992["m_inBrackets"] = "0";
$proto992["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto992);

$proto991["m_where"] = $obj;
$proto1004=array();
$proto1004["m_sql"] = "";
$proto1004["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1004["m_column"]=$obj;
$proto1004["m_contained"] = array();
$proto1004["m_strCase"] = "";
$proto1004["m_havingmode"] = "0";
$proto1004["m_inBrackets"] = "0";
$proto1004["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1004);

$proto991["m_having"] = $obj;
$proto991["m_fieldlist"] = array();
						$proto1006=array();
			$proto1007=array();
$proto1007["m_functiontype"] = "SQLF_CUSTOM";
$proto1007["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(c.calldate, '%Y-%m-%d')"
));

$proto1007["m_arguments"][]=$obj;
$proto1007["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1007);

$proto1006["m_expr"]=$obj;
$proto1006["m_alias"] = "Período";
$obj = new SQLFieldListItem($proto1006);

$proto991["m_fieldlist"][]=$obj;
						$proto1009=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "c"
));

$proto1009["m_expr"]=$obj;
$proto1009["m_alias"] = "";
$obj = new SQLFieldListItem($proto1009);

$proto991["m_fieldlist"][]=$obj;
						$proto1011=array();
			$obj = new SQLField(array(
	"m_strName" => "clid",
	"m_strTable" => "c"
));

$proto1011["m_expr"]=$obj;
$proto1011["m_alias"] = "";
$obj = new SQLFieldListItem($proto1011);

$proto991["m_fieldlist"][]=$obj;
						$proto1013=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "c"
));

$proto1013["m_expr"]=$obj;
$proto1013["m_alias"] = "";
$obj = new SQLFieldListItem($proto1013);

$proto991["m_fieldlist"][]=$obj;
						$proto1015=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "c"
));

$proto1015["m_expr"]=$obj;
$proto1015["m_alias"] = "";
$obj = new SQLFieldListItem($proto1015);

$proto991["m_fieldlist"][]=$obj;
						$proto1017=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(c.duration)"
));

$proto1017["m_expr"]=$obj;
$proto1017["m_alias"] = "duration";
$obj = new SQLFieldListItem($proto1017);

$proto991["m_fieldlist"][]=$obj;
						$proto1019=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(c.billsec)"
));

$proto1019["m_expr"]=$obj;
$proto1019["m_alias"] = "billsec";
$obj = new SQLFieldListItem($proto1019);

$proto991["m_fieldlist"][]=$obj;
						$proto1021=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "c"
));

$proto1021["m_expr"]=$obj;
$proto1021["m_alias"] = "";
$obj = new SQLFieldListItem($proto1021);

$proto991["m_fieldlist"][]=$obj;
						$proto1023=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END"
));

$proto1023["m_expr"]=$obj;
$proto1023["m_alias"] = "disposition";
$obj = new SQLFieldListItem($proto1023);

$proto991["m_fieldlist"][]=$obj;
						$proto1025=array();
			$proto1026=array();
$proto1026["m_functiontype"] = "SQLF_CUSTOM";
$proto1026["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1='"
));

$proto1026["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ig.id_grav"
));

$proto1026["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "'>DOWNLOAD</a>'"
));

$proto1026["m_arguments"][]=$obj;
$proto1026["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1026);

$proto1025["m_expr"]=$obj;
$proto1025["m_alias"] = "Audio";
$obj = new SQLFieldListItem($proto1025);

$proto991["m_fieldlist"][]=$obj;
$proto991["m_fromlist"] = array();
												$proto1030=array();
$proto1030["m_link"] = "SQLL_MAIN";
			$proto1031=array();
$proto1031["m_strName"] = "cdr";
$proto1031["m_columns"] = array();
$proto1031["m_columns"][] = "calldate";
$proto1031["m_columns"][] = "clid";
$proto1031["m_columns"][] = "src";
$proto1031["m_columns"][] = "dst";
$proto1031["m_columns"][] = "dcontext";
$proto1031["m_columns"][] = "channel";
$proto1031["m_columns"][] = "dstchannel";
$proto1031["m_columns"][] = "lastapp";
$proto1031["m_columns"][] = "lastdata";
$proto1031["m_columns"][] = "duration";
$proto1031["m_columns"][] = "billsec";
$proto1031["m_columns"][] = "disposition";
$proto1031["m_columns"][] = "amaflags";
$proto1031["m_columns"][] = "accountcode";
$proto1031["m_columns"][] = "uniqueid";
$proto1031["m_columns"][] = "userfield";
$obj = new SQLTable($proto1031);

$proto1030["m_table"] = $obj;
$proto1030["m_alias"] = "c";
$proto1032=array();
$proto1032["m_sql"] = "";
$proto1032["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1032["m_column"]=$obj;
$proto1032["m_contained"] = array();
$proto1032["m_strCase"] = "";
$proto1032["m_havingmode"] = "0";
$proto1032["m_inBrackets"] = "0";
$proto1032["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1032);

$proto1030["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1030);

$proto991["m_fromlist"][]=$obj;
												$proto1034=array();
$proto1034["m_link"] = "SQLL_LEFTJOIN";
			$proto1035=array();
$proto1035["m_strName"] = "ipbx_gravacoes";
$proto1035["m_columns"] = array();
$proto1035["m_columns"][] = "id_grav";
$proto1035["m_columns"][] = "tp_gravacao";
$proto1035["m_columns"][] = "dt_gravacao";
$proto1035["m_columns"][] = "nm_arq";
$proto1035["m_columns"][] = "num_destino";
$proto1035["m_columns"][] = "num_final";
$proto1035["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto1035);

$proto1034["m_table"] = $obj;
$proto1034["m_alias"] = "ig";
$proto1036=array();
$proto1036["m_sql"] = "c.uniqueid = ig.uniqueid";
$proto1036["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "c.uniqueid = ig.uniqueid"
));

$proto1036["m_column"]=$obj;
$proto1036["m_contained"] = array();
$proto1036["m_strCase"] = "= True";
$proto1036["m_havingmode"] = "0";
$proto1036["m_inBrackets"] = "1";
$proto1036["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1036);

$proto1034["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1034);

$proto991["m_fromlist"][]=$obj;
$proto991["m_groupby"] = array();
$proto991["m_orderby"] = array();
												$proto1038=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "c"
));

$proto1038["m_column"]=$obj;
$proto1038["m_bAsc"] = 1;
$proto1038["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1038);

$proto991["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto991);

$queryData_Recebidas = $obj;
$tdataRecebidas[".sqlquery"] = $queryData_Recebidas;



?>
