<?php

//	field labels
$fieldLabelsipbx_gravacoes = array();
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["id_grav"] = "Identificação";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["tp_gravacao"] = "Tipo de gravação";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["dt_gravacao"] = "Data Gravação";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["nm_arq"] = "Arquivo";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["num_destino"] = "Origem";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["num_final"] = "Destino";
$fieldLabelsipbx_gravacoes["Portuguese(Brazil)"]["Tempo"] = "Tempo";


$tdataipbx_gravacoes=array();
	$tdataipbx_gravacoes[".NumberOfChars"]=80; 
	$tdataipbx_gravacoes[".ShortName"]="ipbx_gravacoes";
	$tdataipbx_gravacoes[".OwnerID"]="";
	$tdataipbx_gravacoes[".OriginalTable"]="ipbx_gravacoes";
	$tdataipbx_gravacoes[".NCSearch"]=true;
	

$tdataipbx_gravacoes[".shortTableName"] = "ipbx_gravacoes";
$tdataipbx_gravacoes[".dataSourceTable"] = "ipbx_gravacoes";
$tdataipbx_gravacoes[".nSecOptions"] = 0;
$tdataipbx_gravacoes[".nLoginMethod"] = 1;
$tdataipbx_gravacoes[".recsPerRowList"] = 1;	
$tdataipbx_gravacoes[".tableGroupBy"] = "0";
$tdataipbx_gravacoes[".dbType"] = 0;
$tdataipbx_gravacoes[".mainTableOwnerID"] = "";
$tdataipbx_gravacoes[".moveNext"] = 1;

$tdataipbx_gravacoes[".listAjax"] = true;

	$tdataipbx_gravacoes[".audit"] = true;

	$tdataipbx_gravacoes[".locking"] = false;
	
$tdataipbx_gravacoes[".listIcons"] = true;



$tdataipbx_gravacoes[".delete"] = true;

$tdataipbx_gravacoes[".showSimpleSearchOptions"] = false;

$tdataipbx_gravacoes[".showSearchPanel"] = true;


$tdataipbx_gravacoes[".isUseAjaxSuggest"] = true;

$tdataipbx_gravacoes[".rowHighlite"] = true;

$tdataipbx_gravacoes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_gravacoes[".arrKeyFields"][] = "id_grav";

// use datepicker for search panel
$tdataipbx_gravacoes[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataipbx_gravacoes[".isUseTimeForSearch"] = false;






$tdataipbx_gravacoes[".isUseInlineJs"] = $tdataipbx_gravacoes[".isUseInlineAdd"] || $tdataipbx_gravacoes[".isUseInlineEdit"];

$tdataipbx_gravacoes[".allSearchFields"] = array();

$tdataipbx_gravacoes[".globSearchFields"][] = "dt_gravacao";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_gravacao", $tdataipbx_gravacoes[".allSearchFields"]))
{
	$tdataipbx_gravacoes[".allSearchFields"][] = "dt_gravacao";	
}
$tdataipbx_gravacoes[".globSearchFields"][] = "tp_gravacao";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tp_gravacao", $tdataipbx_gravacoes[".allSearchFields"]))
{
	$tdataipbx_gravacoes[".allSearchFields"][] = "tp_gravacao";	
}
$tdataipbx_gravacoes[".globSearchFields"][] = "num_destino";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("num_destino", $tdataipbx_gravacoes[".allSearchFields"]))
{
	$tdataipbx_gravacoes[".allSearchFields"][] = "num_destino";	
}
$tdataipbx_gravacoes[".globSearchFields"][] = "num_final";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("num_final", $tdataipbx_gravacoes[".allSearchFields"]))
{
	$tdataipbx_gravacoes[".allSearchFields"][] = "num_final";	
}


$tdataipbx_gravacoes[".isDynamicPerm"] = true;

	

$tdataipbx_gravacoes[".isDisplayLoading"] = true;

$tdataipbx_gravacoes[".isResizeColumns"] = false;


$tdataipbx_gravacoes[".createLoginPage"] = true;


 	




$tdataipbx_gravacoes[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY ipbx_gravacoes.dt_gravacao DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_gravacoes[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_gravacoes[".orderindexes"] = array();
$tdataipbx_gravacoes[".orderindexes"][] = array(3, (0 ? "ASC" : "DESC"), "ipbx_gravacoes.dt_gravacao");

$tdataipbx_gravacoes[".sqlHead"] = "SELECT ipbx_gravacoes.id_grav,  ipbx_gravacoes.tp_gravacao,  ipbx_gravacoes.dt_gravacao,  ipbx_gravacoes.nm_arq,  ipbx_gravacoes.num_destino,  ipbx_gravacoes.num_final,  case   when cdr.billsec > 2 then (SEC_TO_TIME(cdr.billsec))  else 'CHAMADA SEM AUDIO' end AS Tempo";

$tdataipbx_gravacoes[".sqlFrom"] = "FROM ipbx_gravacoes  , cdr";

$tdataipbx_gravacoes[".sqlWhereExpr"] = "(ipbx_gravacoes.uniqueid = cdr.uniqueid)";

$tdataipbx_gravacoes[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_grav";
	$tdataipbx_gravacoes[".Keys"]=$tableKeys;

	
//	id_grav
	$fdata = array();
	$fdata["strName"] = "id_grav";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_grav";
		$fdata["FullName"]= "ipbx_gravacoes.id_grav";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_gravacoes["id_grav"]=$fdata;
	
//	tp_gravacao
	$fdata = array();
	$fdata["strName"] = "tp_gravacao";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Tipo de gravação"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="tp_gravacao";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="tp_gravacao";
				$fdata["LookupTable"]="ipbx_gravacoes";
	$fdata["LookupOrderBy"]="tp_gravacao";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_gravacao";
		$fdata["FullName"]= "ipbx_gravacoes.tp_gravacao";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["tp_gravacao"]=$fdata;
	
//	dt_gravacao
	$fdata = array();
	$fdata["strName"] = "dt_gravacao";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Data Gravação"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	 $fdata["ShowTime"]=true; 
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_gravacao";
		$fdata["FullName"]= "ipbx_gravacoes.dt_gravacao";
						$fdata["Index"]= 3;
	 $fdata["DateEditType"]=11; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["dt_gravacao"]=$fdata;
	
//	nm_arq
	$fdata = array();
	$fdata["strName"] = "nm_arq";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Arquivo"; 
			$fdata["LinkPrefix"]="/var/record/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "nm_arq";
		$fdata["FullName"]= "ipbx_gravacoes.nm_arq";
						$fdata["Absolute"] = true;
	$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["nm_arq"]=$fdata;
	
//	num_destino
	$fdata = array();
	$fdata["strName"] = "num_destino";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "num_destino";
		$fdata["FullName"]= "ipbx_gravacoes.num_destino";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["num_destino"]=$fdata;
	
//	num_final
	$fdata = array();
	$fdata["strName"] = "num_final";
	$fdata["ownerTable"] = "ipbx_gravacoes";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "num_final";
		$fdata["FullName"]= "ipbx_gravacoes.num_final";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["num_final"]=$fdata;
	
//	Tempo
	$fdata = array();
	$fdata["strName"] = "Tempo";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo";
		$fdata["FullName"]= "case   when cdr.billsec > 2 then (SEC_TO_TIME(cdr.billsec))  else 'CHAMADA SEM AUDIO' end";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_gravacoes["Tempo"]=$fdata;

	
$tables_data["ipbx_gravacoes"]=&$tdataipbx_gravacoes;
$field_labels["ipbx_gravacoes"] = &$fieldLabelsipbx_gravacoes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_gravacoes"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_gravacoes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2986=array();
$proto2986["m_strHead"] = "SELECT";
$proto2986["m_strFieldList"] = "ipbx_gravacoes.id_grav,  ipbx_gravacoes.tp_gravacao,  ipbx_gravacoes.dt_gravacao,  ipbx_gravacoes.nm_arq,  ipbx_gravacoes.num_destino,  ipbx_gravacoes.num_final,  case   when cdr.billsec > 2 then (SEC_TO_TIME(cdr.billsec))  else 'CHAMADA SEM AUDIO' end AS Tempo";
$proto2986["m_strFrom"] = "FROM ipbx_gravacoes  , cdr";
$proto2986["m_strWhere"] = "(ipbx_gravacoes.uniqueid = cdr.uniqueid)";
$proto2986["m_strOrderBy"] = "ORDER BY ipbx_gravacoes.dt_gravacao DESC";
$proto2986["m_strTail"] = "";
$proto2987=array();
$proto2987["m_sql"] = "ipbx_gravacoes.uniqueid = cdr.uniqueid";
$proto2987["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2987["m_column"]=$obj;
$proto2987["m_contained"] = array();
$proto2987["m_strCase"] = "= cdr.uniqueid";
$proto2987["m_havingmode"] = "0";
$proto2987["m_inBrackets"] = "0";
$proto2987["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2987);

$proto2986["m_where"] = $obj;
$proto2989=array();
$proto2989["m_sql"] = "";
$proto2989["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2989["m_column"]=$obj;
$proto2989["m_contained"] = array();
$proto2989["m_strCase"] = "";
$proto2989["m_havingmode"] = "0";
$proto2989["m_inBrackets"] = "0";
$proto2989["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2989);

$proto2986["m_having"] = $obj;
$proto2986["m_fieldlist"] = array();
						$proto2991=array();
			$obj = new SQLField(array(
	"m_strName" => "id_grav",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2991["m_expr"]=$obj;
$proto2991["m_alias"] = "";
$obj = new SQLFieldListItem($proto2991);

$proto2986["m_fieldlist"][]=$obj;
						$proto2993=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_gravacao",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2993["m_expr"]=$obj;
$proto2993["m_alias"] = "";
$obj = new SQLFieldListItem($proto2993);

$proto2986["m_fieldlist"][]=$obj;
						$proto2995=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_gravacao",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2995["m_expr"]=$obj;
$proto2995["m_alias"] = "";
$obj = new SQLFieldListItem($proto2995);

$proto2986["m_fieldlist"][]=$obj;
						$proto2997=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_arq",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2997["m_expr"]=$obj;
$proto2997["m_alias"] = "";
$obj = new SQLFieldListItem($proto2997);

$proto2986["m_fieldlist"][]=$obj;
						$proto2999=array();
			$obj = new SQLField(array(
	"m_strName" => "num_destino",
	"m_strTable" => "ipbx_gravacoes"
));

$proto2999["m_expr"]=$obj;
$proto2999["m_alias"] = "";
$obj = new SQLFieldListItem($proto2999);

$proto2986["m_fieldlist"][]=$obj;
						$proto3001=array();
			$obj = new SQLField(array(
	"m_strName" => "num_final",
	"m_strTable" => "ipbx_gravacoes"
));

$proto3001["m_expr"]=$obj;
$proto3001["m_alias"] = "";
$obj = new SQLFieldListItem($proto3001);

$proto2986["m_fieldlist"][]=$obj;
						$proto3003=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case   when cdr.billsec > 2 then (SEC_TO_TIME(cdr.billsec))  else 'CHAMADA SEM AUDIO' end"
));

$proto3003["m_expr"]=$obj;
$proto3003["m_alias"] = "Tempo";
$obj = new SQLFieldListItem($proto3003);

$proto2986["m_fieldlist"][]=$obj;
$proto2986["m_fromlist"] = array();
												$proto3005=array();
$proto3005["m_link"] = "SQLL_MAIN";
			$proto3006=array();
$proto3006["m_strName"] = "ipbx_gravacoes";
$proto3006["m_columns"] = array();
$proto3006["m_columns"][] = "id_grav";
$proto3006["m_columns"][] = "tp_gravacao";
$proto3006["m_columns"][] = "dt_gravacao";
$proto3006["m_columns"][] = "nm_arq";
$proto3006["m_columns"][] = "num_destino";
$proto3006["m_columns"][] = "num_final";
$proto3006["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto3006);

$proto3005["m_table"] = $obj;
$proto3005["m_alias"] = "";
$proto3007=array();
$proto3007["m_sql"] = "";
$proto3007["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3007["m_column"]=$obj;
$proto3007["m_contained"] = array();
$proto3007["m_strCase"] = "";
$proto3007["m_havingmode"] = "0";
$proto3007["m_inBrackets"] = "0";
$proto3007["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3007);

$proto3005["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3005);

$proto2986["m_fromlist"][]=$obj;
												$proto3009=array();
$proto3009["m_link"] = "SQLL_CROSSJOIN";
			$proto3010=array();
$proto3010["m_strName"] = "cdr";
$proto3010["m_columns"] = array();
$proto3010["m_columns"][] = "calldate";
$proto3010["m_columns"][] = "clid";
$proto3010["m_columns"][] = "src";
$proto3010["m_columns"][] = "dst";
$proto3010["m_columns"][] = "dcontext";
$proto3010["m_columns"][] = "channel";
$proto3010["m_columns"][] = "dstchannel";
$proto3010["m_columns"][] = "lastapp";
$proto3010["m_columns"][] = "lastdata";
$proto3010["m_columns"][] = "duration";
$proto3010["m_columns"][] = "billsec";
$proto3010["m_columns"][] = "disposition";
$proto3010["m_columns"][] = "amaflags";
$proto3010["m_columns"][] = "accountcode";
$proto3010["m_columns"][] = "uniqueid";
$proto3010["m_columns"][] = "userfield";
$obj = new SQLTable($proto3010);

$proto3009["m_table"] = $obj;
$proto3009["m_alias"] = "";
$proto3011=array();
$proto3011["m_sql"] = "";
$proto3011["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3011["m_column"]=$obj;
$proto3011["m_contained"] = array();
$proto3011["m_strCase"] = "";
$proto3011["m_havingmode"] = "0";
$proto3011["m_inBrackets"] = "0";
$proto3011["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3011);

$proto3009["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3009);

$proto2986["m_fromlist"][]=$obj;
$proto2986["m_groupby"] = array();
$proto2986["m_orderby"] = array();
												$proto3013=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_gravacao",
	"m_strTable" => "ipbx_gravacoes"
));

$proto3013["m_column"]=$obj;
$proto3013["m_bAsc"] = 0;
$proto3013["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto3013);

$proto2986["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto2986);

$queryData_ipbx_gravacoes = $obj;
$tdataipbx_gravacoes[".sqlquery"] = $queryData_ipbx_gravacoes;



?>
