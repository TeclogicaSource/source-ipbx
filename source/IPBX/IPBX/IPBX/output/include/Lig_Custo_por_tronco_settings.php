<?php

//	field labels
$fieldLabelsLig_Custo_por_tronco = array();
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]=array();
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Origem"] = "Origem";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Mes"] = "Mês";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Interface"] = "Interface";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Custo"] = "Custo";


$tdataLig_Custo_por_tronco=array();
	$tdataLig_Custo_por_tronco[".NumberOfChars"]=80; 
	$tdataLig_Custo_por_tronco[".ShortName"]="Lig_Custo_por_tronco";
	$tdataLig_Custo_por_tronco[".OwnerID"]="";
	$tdataLig_Custo_por_tronco[".OriginalTable"]="cdr";
	$tdataLig_Custo_por_tronco[".NCSearch"]=true;
	

$tdataLig_Custo_por_tronco[".shortTableName"] = "Lig_Custo_por_tronco";
$tdataLig_Custo_por_tronco[".dataSourceTable"] = "Rel. Lig Custo por tronco";
$tdataLig_Custo_por_tronco[".nSecOptions"] = 0;
$tdataLig_Custo_por_tronco[".nLoginMethod"] = 1;
$tdataLig_Custo_por_tronco[".recsPerRowList"] = 1;	
$tdataLig_Custo_por_tronco[".tableGroupBy"] = "1";
$tdataLig_Custo_por_tronco[".dbType"] = 0;
$tdataLig_Custo_por_tronco[".mainTableOwnerID"] = "";
$tdataLig_Custo_por_tronco[".moveNext"] = 1;

$tdataLig_Custo_por_tronco[".listAjax"] = true;

	$tdataLig_Custo_por_tronco[".audit"] = false;

	$tdataLig_Custo_por_tronco[".locking"] = false;
	
$tdataLig_Custo_por_tronco[".listIcons"] = true;

$tdataLig_Custo_por_tronco[".exportTo"] = true;

$tdataLig_Custo_por_tronco[".printFriendly"] = true;


$tdataLig_Custo_por_tronco[".showSimpleSearchOptions"] = false;

$tdataLig_Custo_por_tronco[".showSearchPanel"] = true;


$tdataLig_Custo_por_tronco[".isUseAjaxSuggest"] = true;


$tdataLig_Custo_por_tronco[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataLig_Custo_por_tronco[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataLig_Custo_por_tronco[".isUseTimeForSearch"] = false;





$tdataLig_Custo_por_tronco[".isUseInlineJs"] = $tdataLig_Custo_por_tronco[".isUseInlineAdd"] || $tdataLig_Custo_por_tronco[".isUseInlineEdit"];

$tdataLig_Custo_por_tronco[".allSearchFields"] = array();

$tdataLig_Custo_por_tronco[".globSearchFields"][] = "Origem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Origem", $tdataLig_Custo_por_tronco[".allSearchFields"]))
{
	$tdataLig_Custo_por_tronco[".allSearchFields"][] = "Origem";	
}
$tdataLig_Custo_por_tronco[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataLig_Custo_por_tronco[".allSearchFields"]))
{
	$tdataLig_Custo_por_tronco[".allSearchFields"][] = "Mes";	
}
$tdataLig_Custo_por_tronco[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataLig_Custo_por_tronco[".allSearchFields"]))
{
	$tdataLig_Custo_por_tronco[".allSearchFields"][] = "Ano";	
}


$tdataLig_Custo_por_tronco[".isDynamicPerm"] = true;

	

$tdataLig_Custo_por_tronco[".isDisplayLoading"] = true;

$tdataLig_Custo_por_tronco[".isResizeColumns"] = false;


$tdataLig_Custo_por_tronco[".createLoginPage"] = true;


 	

$tdataLig_Custo_por_tronco[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY substr(c.origem, -4)";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataLig_Custo_por_tronco[".strOrderBy"] = $gstrOrderBy;
	
$tdataLig_Custo_por_tronco[".orderindexes"] = array();
$tdataLig_Custo_por_tronco[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "substr(c.origem, -4)");

$tdataLig_Custo_por_tronco[".sqlHead"] = "select substr(c.origem, -4) AS Origem,  date_format(c.calldate,'%m') AS Mes,  date_format(c.calldate,'%Y') AS Ano,  ii.dsc_interf AS `Interface`,  SUM(c.custo) AS Custo";

$tdataLig_Custo_por_tronco[".sqlFrom"] = "FROM conta AS c  , ipbx_interf AS ii";

$tdataLig_Custo_por_tronco[".sqlWhereExpr"] = "(c.id_interf =ii.id_interf)";

$tdataLig_Custo_por_tronco[".sqlTail"] = "GROUP BY ii.dsc_interf, c.origem";



	$tableKeys=array();
	$tdataLig_Custo_por_tronco[".Keys"]=$tableKeys;

	
//	Origem
	$fdata = array();
	$fdata["strName"] = "Origem";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="origem";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="origem";
				$fdata["LookupTable"]="conta";
	$fdata["LookupOrderBy"]="origem";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Origem";
		$fdata["FullName"]= "substr(c.origem, -4)";
						$fdata["Index"]= 1;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Origem"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Mês"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "date_format(c.calldate,'%m')";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "date_format(c.calldate,'%Y')";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Ano"]=$fdata;
	
//	Interface
	$fdata = array();
	$fdata["strName"] = "Interface";
	$fdata["ownerTable"] = "ipbx_interf";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Interface";
		$fdata["FullName"]= "ii.dsc_interf";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Interface"]=$fdata;
	
//	Custo
	$fdata = array();
	$fdata["strName"] = "Custo";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Custo";
		$fdata["FullName"]= "SUM(c.custo)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Custo"]=$fdata;

	
$tables_data["Rel. Lig Custo por tronco"]=&$tdataLig_Custo_por_tronco;
$field_labels["Rel__Lig_Custo_por_tronco"] = &$fieldLabelsLig_Custo_por_tronco;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Lig Custo por tronco"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Lig Custo por tronco"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1086=array();
$proto1086["m_strHead"] = "select";
$proto1086["m_strFieldList"] = "substr(c.origem, -4) AS Origem,  date_format(c.calldate,'%m') AS Mes,  date_format(c.calldate,'%Y') AS Ano,  ii.dsc_interf AS `Interface`,  SUM(c.custo) AS Custo";
$proto1086["m_strFrom"] = "FROM conta AS c  , ipbx_interf AS ii";
$proto1086["m_strWhere"] = "(c.id_interf =ii.id_interf)";
$proto1086["m_strOrderBy"] = "ORDER BY substr(c.origem, -4)";
$proto1086["m_strTail"] = "GROUP BY ii.dsc_interf, c.origem";
$proto1087=array();
$proto1087["m_sql"] = "c.id_interf =ii.id_interf";
$proto1087["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "c"
));

$proto1087["m_column"]=$obj;
$proto1087["m_contained"] = array();
$proto1087["m_strCase"] = "=ii.id_interf";
$proto1087["m_havingmode"] = "0";
$proto1087["m_inBrackets"] = "0";
$proto1087["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1087);

$proto1086["m_where"] = $obj;
$proto1089=array();
$proto1089["m_sql"] = "";
$proto1089["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1089["m_column"]=$obj;
$proto1089["m_contained"] = array();
$proto1089["m_strCase"] = "";
$proto1089["m_havingmode"] = "0";
$proto1089["m_inBrackets"] = "0";
$proto1089["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1089);

$proto1086["m_having"] = $obj;
$proto1086["m_fieldlist"] = array();
						$proto1091=array();
			$proto1092=array();
$proto1092["m_functiontype"] = "SQLF_CUSTOM";
$proto1092["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "c.origem"
));

$proto1092["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1092["m_arguments"][]=$obj;
$proto1092["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1092);

$proto1091["m_expr"]=$obj;
$proto1091["m_alias"] = "Origem";
$obj = new SQLFieldListItem($proto1091);

$proto1086["m_fieldlist"][]=$obj;
						$proto1095=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(c.calldate,'%m')"
));

$proto1095["m_expr"]=$obj;
$proto1095["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto1095);

$proto1086["m_fieldlist"][]=$obj;
						$proto1097=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(c.calldate,'%Y')"
));

$proto1097["m_expr"]=$obj;
$proto1097["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto1097);

$proto1086["m_fieldlist"][]=$obj;
						$proto1099=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ii"
));

$proto1099["m_expr"]=$obj;
$proto1099["m_alias"] = "Interface";
$obj = new SQLFieldListItem($proto1099);

$proto1086["m_fieldlist"][]=$obj;
						$proto1101=array();
			$proto1102=array();
$proto1102["m_functiontype"] = "SQLF_SUM";
$proto1102["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "c"
));

$proto1102["m_arguments"][]=$obj;
$proto1102["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto1102);

$proto1101["m_expr"]=$obj;
$proto1101["m_alias"] = "Custo";
$obj = new SQLFieldListItem($proto1101);

$proto1086["m_fieldlist"][]=$obj;
$proto1086["m_fromlist"] = array();
												$proto1104=array();
$proto1104["m_link"] = "SQLL_MAIN";
			$proto1105=array();
$proto1105["m_strName"] = "conta";
$proto1105["m_columns"] = array();
$proto1105["m_columns"][] = "id_conta";
$proto1105["m_columns"][] = "idt_custo";
$proto1105["m_columns"][] = "origem";
$proto1105["m_columns"][] = "destino";
$proto1105["m_columns"][] = "duracao";
$proto1105["m_columns"][] = "custo";
$proto1105["m_columns"][] = "calldate";
$proto1105["m_columns"][] = "uniqueid";
$proto1105["m_columns"][] = "id_interf";
$proto1105["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto1105);

$proto1104["m_table"] = $obj;
$proto1104["m_alias"] = "c";
$proto1106=array();
$proto1106["m_sql"] = "";
$proto1106["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1106["m_column"]=$obj;
$proto1106["m_contained"] = array();
$proto1106["m_strCase"] = "";
$proto1106["m_havingmode"] = "0";
$proto1106["m_inBrackets"] = "0";
$proto1106["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1106);

$proto1104["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1104);

$proto1086["m_fromlist"][]=$obj;
												$proto1108=array();
$proto1108["m_link"] = "SQLL_CROSSJOIN";
			$proto1109=array();
$proto1109["m_strName"] = "ipbx_interf";
$proto1109["m_columns"] = array();
$proto1109["m_columns"][] = "id_interf";
$proto1109["m_columns"][] = "dsc_interf";
$proto1109["m_columns"][] = "id_contrato";
$proto1109["m_columns"][] = "board";
$proto1109["m_columns"][] = "link";
$proto1109["m_columns"][] = "usuario";
$proto1109["m_columns"][] = "senha";
$proto1109["m_columns"][] = "ip_host";
$proto1109["m_columns"][] = "id_central";
$proto1109["m_columns"][] = "codec";
$proto1109["m_columns"][] = "id_tp_interf";
$proto1109["m_columns"][] = "tp_chamada";
$proto1109["m_columns"][] = "piloto";
$proto1109["m_columns"][] = "id_chamada";
$proto1109["m_columns"][] = "flg_id_cham_parc";
$proto1109["m_columns"][] = "dtmf";
$proto1109["m_columns"][] = "ddd_localidade";
$proto1109["m_columns"][] = "cd_operadora";
$proto1109["m_columns"][] = "khomp_interf";
$proto1109["m_columns"][] = "flg_logon_remoto";
$proto1109["m_columns"][] = "pers_params";
$proto1109["m_columns"][] = "registro";
$obj = new SQLTable($proto1109);

$proto1108["m_table"] = $obj;
$proto1108["m_alias"] = "ii";
$proto1110=array();
$proto1110["m_sql"] = "";
$proto1110["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1110["m_column"]=$obj;
$proto1110["m_contained"] = array();
$proto1110["m_strCase"] = "";
$proto1110["m_havingmode"] = "0";
$proto1110["m_inBrackets"] = "0";
$proto1110["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1110);

$proto1108["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1108);

$proto1086["m_fromlist"][]=$obj;
$proto1086["m_groupby"] = array();
												$proto1112=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ii"
));

$proto1112["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1112);

$proto1086["m_groupby"][]=$obj;
												$proto1114=array();
						$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "c"
));

$proto1114["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1114);

$proto1086["m_groupby"][]=$obj;
$proto1086["m_orderby"] = array();
												$proto1116=array();
						$proto1117=array();
$proto1117["m_functiontype"] = "SQLF_CUSTOM";
$proto1117["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "c.origem"
));

$proto1117["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1117["m_arguments"][]=$obj;
$proto1117["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1117);

$proto1116["m_column"]=$obj;
$proto1116["m_bAsc"] = 1;
$proto1116["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1116);

$proto1086["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1086);

$queryData_Lig_Custo_por_tronco = $obj;
$tdataLig_Custo_por_tronco[".sqlquery"] = $queryData_Lig_Custo_por_tronco;



?>
