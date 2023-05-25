<?php

//	field labels
$fieldLabelsLig_Custo_por_tronco = array();
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]=array();
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Origem"] = "Origem";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Mes"] = "Mês";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Interface"] = "Interface";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["Custo"] = "Custo";
$fieldLabelsLig_Custo_por_tronco["Portuguese(Brazil)"]["c_origem"] = "C.origem";


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




$gstrOrderBy = "ORDER BY ii.dsc_interf, c.origem";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataLig_Custo_por_tronco[".strOrderBy"] = $gstrOrderBy;
	
$tdataLig_Custo_por_tronco[".orderindexes"] = array();
$tdataLig_Custo_por_tronco[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "ii.dsc_interf");
$tdataLig_Custo_por_tronco[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "c.origem");

$tdataLig_Custo_por_tronco[".sqlHead"] = "select substr(c.origem, -4) AS Origem,  c.mes_referencia AS Mes,  c.ano_referencia AS Ano,  ii.dsc_interf AS `Interface`,  SUM(c.custo) AS Custo,  c.origem AS `c.origem`";

$tdataLig_Custo_por_tronco[".sqlFrom"] = "FROM conta AS c  , ipbx_interf AS ii";

$tdataLig_Custo_por_tronco[".sqlWhereExpr"] = "c.id_interf =ii.id_interf";

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
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Mês"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="mes_referencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="mes_referencia";
				$fdata["LookupTable"]="conta";
	$fdata["LookupOrderBy"]="mes_referencia";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "c.mes_referencia";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "conta";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="ano_referencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="ano_referencia";
				$fdata["LookupTable"]="conta";
	$fdata["LookupOrderBy"]="ano_referencia";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Ano";
		$fdata["FullName"]= "c.ano_referencia";
						$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataLig_Custo_por_tronco["Ano"]=$fdata;
	
//	Interface
	$fdata = array();
	$fdata["strName"] = "Interface";
	$fdata["ownerTable"] = "ipbx_interf";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="dsc_interf";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="dsc_interf";
				$fdata["LookupTable"]="ipbx_interf";
	$fdata["LookupOrderBy"]="dsc_interf";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Interface";
		$fdata["FullName"]= "ii.dsc_interf";
						$fdata["Index"]= 4;
	
			
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
	
//	c.origem
	$fdata = array();
	$fdata["strName"] = "c.origem";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="C.origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "c_origem";
		$fdata["FullName"]= "c.origem";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
									$tdataLig_Custo_por_tronco["c.origem"]=$fdata;

	
$tables_data["Rel. Lig Custo por tronco"]=&$tdataLig_Custo_por_tronco;
$field_labels["Rel__Lig_Custo_por_tronco"] = &$fieldLabelsLig_Custo_por_tronco;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Lig Custo por tronco"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Lig Custo por tronco"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1280=array();
$proto1280["m_strHead"] = "select";
$proto1280["m_strFieldList"] = "substr(c.origem, -4) AS Origem,  c.mes_referencia AS Mes,  c.ano_referencia AS Ano,  ii.dsc_interf AS `Interface`,  SUM(c.custo) AS Custo,  c.origem AS `c.origem`";
$proto1280["m_strFrom"] = "FROM conta AS c  , ipbx_interf AS ii";
$proto1280["m_strWhere"] = "c.id_interf =ii.id_interf";
$proto1280["m_strOrderBy"] = "ORDER BY ii.dsc_interf, c.origem";
$proto1280["m_strTail"] = "GROUP BY ii.dsc_interf, c.origem";
$proto1281=array();
$proto1281["m_sql"] = "c.id_interf =ii.id_interf";
$proto1281["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "c"
));

$proto1281["m_column"]=$obj;
$proto1281["m_contained"] = array();
$proto1281["m_strCase"] = "=ii.id_interf";
$proto1281["m_havingmode"] = "0";
$proto1281["m_inBrackets"] = "0";
$proto1281["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1281);

$proto1280["m_where"] = $obj;
$proto1283=array();
$proto1283["m_sql"] = "";
$proto1283["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1283["m_column"]=$obj;
$proto1283["m_contained"] = array();
$proto1283["m_strCase"] = "";
$proto1283["m_havingmode"] = "0";
$proto1283["m_inBrackets"] = "0";
$proto1283["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1283);

$proto1280["m_having"] = $obj;
$proto1280["m_fieldlist"] = array();
						$proto1285=array();
			$proto1286=array();
$proto1286["m_functiontype"] = "SQLF_CUSTOM";
$proto1286["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "c.origem"
));

$proto1286["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1286["m_arguments"][]=$obj;
$proto1286["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1286);

$proto1285["m_expr"]=$obj;
$proto1285["m_alias"] = "Origem";
$obj = new SQLFieldListItem($proto1285);

$proto1280["m_fieldlist"][]=$obj;
						$proto1289=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "c"
));

$proto1289["m_expr"]=$obj;
$proto1289["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto1289);

$proto1280["m_fieldlist"][]=$obj;
						$proto1291=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "c"
));

$proto1291["m_expr"]=$obj;
$proto1291["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto1291);

$proto1280["m_fieldlist"][]=$obj;
						$proto1293=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ii"
));

$proto1293["m_expr"]=$obj;
$proto1293["m_alias"] = "Interface";
$obj = new SQLFieldListItem($proto1293);

$proto1280["m_fieldlist"][]=$obj;
						$proto1295=array();
			$proto1296=array();
$proto1296["m_functiontype"] = "SQLF_SUM";
$proto1296["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "c"
));

$proto1296["m_arguments"][]=$obj;
$proto1296["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto1296);

$proto1295["m_expr"]=$obj;
$proto1295["m_alias"] = "Custo";
$obj = new SQLFieldListItem($proto1295);

$proto1280["m_fieldlist"][]=$obj;
						$proto1298=array();
			$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "c"
));

$proto1298["m_expr"]=$obj;
$proto1298["m_alias"] = "c.origem";
$obj = new SQLFieldListItem($proto1298);

$proto1280["m_fieldlist"][]=$obj;
$proto1280["m_fromlist"] = array();
												$proto1300=array();
$proto1300["m_link"] = "SQLL_MAIN";
			$proto1301=array();
$proto1301["m_strName"] = "conta";
$proto1301["m_columns"] = array();
$proto1301["m_columns"][] = "id_conta";
$proto1301["m_columns"][] = "idt_custo";
$proto1301["m_columns"][] = "origem";
$proto1301["m_columns"][] = "destino";
$proto1301["m_columns"][] = "duracao";
$proto1301["m_columns"][] = "custo";
$proto1301["m_columns"][] = "calldate";
$proto1301["m_columns"][] = "uniqueid";
$proto1301["m_columns"][] = "id_interf";
$proto1301["m_columns"][] = "id_contrato";
$proto1301["m_columns"][] = "mes_referencia";
$proto1301["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto1301);

$proto1300["m_table"] = $obj;
$proto1300["m_alias"] = "c";
$proto1302=array();
$proto1302["m_sql"] = "";
$proto1302["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1302["m_column"]=$obj;
$proto1302["m_contained"] = array();
$proto1302["m_strCase"] = "";
$proto1302["m_havingmode"] = "0";
$proto1302["m_inBrackets"] = "0";
$proto1302["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1302);

$proto1300["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1300);

$proto1280["m_fromlist"][]=$obj;
												$proto1304=array();
$proto1304["m_link"] = "SQLL_CROSSJOIN";
			$proto1305=array();
$proto1305["m_strName"] = "ipbx_interf";
$proto1305["m_columns"] = array();
$proto1305["m_columns"][] = "id_interf";
$proto1305["m_columns"][] = "dsc_interf";
$proto1305["m_columns"][] = "id_contrato";
$proto1305["m_columns"][] = "board";
$proto1305["m_columns"][] = "link";
$proto1305["m_columns"][] = "usuario";
$proto1305["m_columns"][] = "senha";
$proto1305["m_columns"][] = "ip_host";
$proto1305["m_columns"][] = "id_central";
$proto1305["m_columns"][] = "codec";
$proto1305["m_columns"][] = "id_tp_interf";
$proto1305["m_columns"][] = "tp_chamada";
$proto1305["m_columns"][] = "piloto";
$proto1305["m_columns"][] = "id_chamada";
$proto1305["m_columns"][] = "flg_id_cham_parc";
$proto1305["m_columns"][] = "dtmf";
$proto1305["m_columns"][] = "ddd_localidade";
$proto1305["m_columns"][] = "cd_operadora";
$proto1305["m_columns"][] = "khomp_interf";
$proto1305["m_columns"][] = "flg_logon_remoto";
$proto1305["m_columns"][] = "pers_params";
$proto1305["m_columns"][] = "registro";
$proto1305["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto1305);

$proto1304["m_table"] = $obj;
$proto1304["m_alias"] = "ii";
$proto1306=array();
$proto1306["m_sql"] = "";
$proto1306["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1306["m_column"]=$obj;
$proto1306["m_contained"] = array();
$proto1306["m_strCase"] = "";
$proto1306["m_havingmode"] = "0";
$proto1306["m_inBrackets"] = "0";
$proto1306["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1306);

$proto1304["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1304);

$proto1280["m_fromlist"][]=$obj;
$proto1280["m_groupby"] = array();
												$proto1308=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ii"
));

$proto1308["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1308);

$proto1280["m_groupby"][]=$obj;
												$proto1310=array();
						$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "c"
));

$proto1310["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1310);

$proto1280["m_groupby"][]=$obj;
$proto1280["m_orderby"] = array();
												$proto1312=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ii"
));

$proto1312["m_column"]=$obj;
$proto1312["m_bAsc"] = 1;
$proto1312["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1312);

$proto1280["m_orderby"][]=$obj;					
												$proto1314=array();
						$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "c"
));

$proto1314["m_column"]=$obj;
$proto1314["m_bAsc"] = 1;
$proto1314["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1314);

$proto1280["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1280);

$queryData_Lig_Custo_por_tronco = $obj;
$tdataLig_Custo_por_tronco[".sqlquery"] = $queryData_Lig_Custo_por_tronco;



?>
