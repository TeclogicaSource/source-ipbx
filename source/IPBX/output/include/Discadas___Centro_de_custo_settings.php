<?php

//	field labels
$fieldLabelsDiscadas___Centro_de_custo = array();
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]=array();
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["idt_custo"] = "Idt Custo";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["destino"] = "Destino";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["duracao"] = "Duração";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de custo";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["dsc_interf"] = "Interface";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["calldate"] = "Data e Hora";
$fieldLabelsDiscadas___Centro_de_custo["Portuguese(Brazil)"]["Origem"] = "Origem";


$tdataDiscadas___Centro_de_custo=array();
	$tdataDiscadas___Centro_de_custo[".NumberOfChars"]=80; 
	$tdataDiscadas___Centro_de_custo[".ShortName"]="Discadas___Centro_de_custo";
	$tdataDiscadas___Centro_de_custo[".OwnerID"]="";
	$tdataDiscadas___Centro_de_custo[".OriginalTable"]="conta";
	$tdataDiscadas___Centro_de_custo[".NCSearch"]=true;
	

$tdataDiscadas___Centro_de_custo[".shortTableName"] = "Discadas___Centro_de_custo";
$tdataDiscadas___Centro_de_custo[".dataSourceTable"] = "Rel. Detalhado - Centro de custo";
$tdataDiscadas___Centro_de_custo[".nSecOptions"] = 0;
$tdataDiscadas___Centro_de_custo[".nLoginMethod"] = 1;
$tdataDiscadas___Centro_de_custo[".recsPerRowList"] = 1;	
$tdataDiscadas___Centro_de_custo[".tableGroupBy"] = "0";
$tdataDiscadas___Centro_de_custo[".dbType"] = 0;
$tdataDiscadas___Centro_de_custo[".mainTableOwnerID"] = "";
$tdataDiscadas___Centro_de_custo[".moveNext"] = 1;

$tdataDiscadas___Centro_de_custo[".listAjax"] = true;

	$tdataDiscadas___Centro_de_custo[".audit"] = false;

	$tdataDiscadas___Centro_de_custo[".locking"] = false;
	
$tdataDiscadas___Centro_de_custo[".listIcons"] = true;

$tdataDiscadas___Centro_de_custo[".exportTo"] = true;

$tdataDiscadas___Centro_de_custo[".printFriendly"] = true;


$tdataDiscadas___Centro_de_custo[".showSimpleSearchOptions"] = false;

$tdataDiscadas___Centro_de_custo[".showSearchPanel"] = true;


$tdataDiscadas___Centro_de_custo[".isUseAjaxSuggest"] = true;


$tdataDiscadas___Centro_de_custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataDiscadas___Centro_de_custo[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataDiscadas___Centro_de_custo[".isUseTimeForSearch"] = false;





$tdataDiscadas___Centro_de_custo[".isUseInlineJs"] = $tdataDiscadas___Centro_de_custo[".isUseInlineAdd"] || $tdataDiscadas___Centro_de_custo[".isUseInlineEdit"];

$tdataDiscadas___Centro_de_custo[".allSearchFields"] = array();

$tdataDiscadas___Centro_de_custo[".globSearchFields"][] = "Origem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Origem", $tdataDiscadas___Centro_de_custo[".allSearchFields"]))
{
	$tdataDiscadas___Centro_de_custo[".allSearchFields"][] = "Origem";	
}
$tdataDiscadas___Centro_de_custo[".globSearchFields"][] = "dsc_centro_cust";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_centro_cust", $tdataDiscadas___Centro_de_custo[".allSearchFields"]))
{
	$tdataDiscadas___Centro_de_custo[".allSearchFields"][] = "dsc_centro_cust";	
}
$tdataDiscadas___Centro_de_custo[".globSearchFields"][] = "calldate";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("calldate", $tdataDiscadas___Centro_de_custo[".allSearchFields"]))
{
	$tdataDiscadas___Centro_de_custo[".allSearchFields"][] = "calldate";	
}

$tdataDiscadas___Centro_de_custo[".panelSearchFields"][] = "dsc_centro_cust";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_centro_cust", $tdataDiscadas___Centro_de_custo[".allSearchFields"])) 
{
	$tdataDiscadas___Centro_de_custo[".allSearchFields"][] = "dsc_centro_cust";	
}

$tdataDiscadas___Centro_de_custo[".isDynamicPerm"] = true;

	

$tdataDiscadas___Centro_de_custo[".isDisplayLoading"] = true;

$tdataDiscadas___Centro_de_custo[".isResizeColumns"] = false;


$tdataDiscadas___Centro_de_custo[".createLoginPage"] = true;


 	

$tdataDiscadas___Centro_de_custo[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY conta.calldate DESC, centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataDiscadas___Centro_de_custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataDiscadas___Centro_de_custo[".orderindexes"] = array();
$tdataDiscadas___Centro_de_custo[".orderindexes"][] = array(8, (0 ? "ASC" : "DESC"), "conta.calldate");
$tdataDiscadas___Centro_de_custo[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataDiscadas___Centro_de_custo[".sqlHead"] = "SELECT conta.idt_custo,  substr(conta.origem, -4) AS Origem,  conta.destino,  SEC_TO_TIME(conta.duracao) AS duracao,  conta.custo,  centrocusto.dsc_centro_cust,  ipbx_interf.dsc_interf,  conta.calldate";

$tdataDiscadas___Centro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";

$tdataDiscadas___Centro_de_custo[".sqlWhereExpr"] = "";

$tdataDiscadas___Centro_de_custo[".sqlTail"] = "";



	$tableKeys=array();
	$tdataDiscadas___Centro_de_custo[".Keys"]=$tableKeys;

	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Idt Custo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "conta.idt_custo";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataDiscadas___Centro_de_custo["idt_custo"]=$fdata;
	
//	Origem
	$fdata = array();
	$fdata["strName"] = "Origem";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Origem";
		$fdata["FullName"]= "substr(conta.origem, -4)";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["Origem"]=$fdata;
	
//	destino
	$fdata = array();
	$fdata["strName"] = "destino";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "destino";
		$fdata["FullName"]= "conta.destino";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["destino"]=$fdata;
	
//	duracao
	$fdata = array();
	$fdata["strName"] = "duracao";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Duração"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "duracao";
		$fdata["FullName"]= "SEC_TO_TIME(conta.duracao)";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataDiscadas___Centro_de_custo["duracao"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Custo"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "conta.custo";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["custo"]=$fdata;
	
//	dsc_centro_cust
	$fdata = array();
	$fdata["strName"] = "dsc_centro_cust";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Centro de custo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="dsc_centro_cust";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = 'flg_ativado = 1';

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["dsc_centro_cust"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf";
		$fdata["Label"]="Interface"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "ipbx_interf.dsc_interf";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["dsc_interf"]=$fdata;
	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Data e Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "conta.calldate";
						$fdata["Index"]= 8;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataDiscadas___Centro_de_custo["calldate"]=$fdata;

	
$tables_data["Rel. Detalhado - Centro de custo"]=&$tdataDiscadas___Centro_de_custo;
$field_labels["Rel__Detalhado___Centro_de_custo"] = &$fieldLabelsDiscadas___Centro_de_custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Detalhado - Centro de custo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Detalhado - Centro de custo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1316=array();
$proto1316["m_strHead"] = "SELECT";
$proto1316["m_strFieldList"] = "conta.idt_custo,  substr(conta.origem, -4) AS Origem,  conta.destino,  SEC_TO_TIME(conta.duracao) AS duracao,  conta.custo,  centrocusto.dsc_centro_cust,  ipbx_interf.dsc_interf,  conta.calldate";
$proto1316["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$proto1316["m_strWhere"] = "";
$proto1316["m_strOrderBy"] = "ORDER BY conta.calldate DESC, centrocusto.dsc_centro_cust";
$proto1316["m_strTail"] = "";
$proto1317=array();
$proto1317["m_sql"] = "";
$proto1317["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1317["m_column"]=$obj;
$proto1317["m_contained"] = array();
$proto1317["m_strCase"] = "";
$proto1317["m_havingmode"] = "0";
$proto1317["m_inBrackets"] = "0";
$proto1317["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1317);

$proto1316["m_where"] = $obj;
$proto1319=array();
$proto1319["m_sql"] = "";
$proto1319["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1319["m_column"]=$obj;
$proto1319["m_contained"] = array();
$proto1319["m_strCase"] = "";
$proto1319["m_havingmode"] = "0";
$proto1319["m_inBrackets"] = "0";
$proto1319["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1319);

$proto1316["m_having"] = $obj;
$proto1316["m_fieldlist"] = array();
						$proto1321=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1321["m_expr"]=$obj;
$proto1321["m_alias"] = "";
$obj = new SQLFieldListItem($proto1321);

$proto1316["m_fieldlist"][]=$obj;
						$proto1323=array();
			$proto1324=array();
$proto1324["m_functiontype"] = "SQLF_CUSTOM";
$proto1324["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "conta.origem"
));

$proto1324["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1324["m_arguments"][]=$obj;
$proto1324["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1324);

$proto1323["m_expr"]=$obj;
$proto1323["m_alias"] = "Origem";
$obj = new SQLFieldListItem($proto1323);

$proto1316["m_fieldlist"][]=$obj;
						$proto1327=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "conta"
));

$proto1327["m_expr"]=$obj;
$proto1327["m_alias"] = "";
$obj = new SQLFieldListItem($proto1327);

$proto1316["m_fieldlist"][]=$obj;
						$proto1329=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(conta.duracao)"
));

$proto1329["m_expr"]=$obj;
$proto1329["m_alias"] = "duracao";
$obj = new SQLFieldListItem($proto1329);

$proto1316["m_fieldlist"][]=$obj;
						$proto1331=array();
			$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "conta"
));

$proto1331["m_expr"]=$obj;
$proto1331["m_alias"] = "";
$obj = new SQLFieldListItem($proto1331);

$proto1316["m_fieldlist"][]=$obj;
						$proto1333=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1333["m_expr"]=$obj;
$proto1333["m_alias"] = "";
$obj = new SQLFieldListItem($proto1333);

$proto1316["m_fieldlist"][]=$obj;
						$proto1335=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf"
));

$proto1335["m_expr"]=$obj;
$proto1335["m_alias"] = "";
$obj = new SQLFieldListItem($proto1335);

$proto1316["m_fieldlist"][]=$obj;
						$proto1337=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1337["m_expr"]=$obj;
$proto1337["m_alias"] = "";
$obj = new SQLFieldListItem($proto1337);

$proto1316["m_fieldlist"][]=$obj;
$proto1316["m_fromlist"] = array();
												$proto1339=array();
$proto1339["m_link"] = "SQLL_MAIN";
			$proto1340=array();
$proto1340["m_strName"] = "conta";
$proto1340["m_columns"] = array();
$proto1340["m_columns"][] = "id_conta";
$proto1340["m_columns"][] = "idt_custo";
$proto1340["m_columns"][] = "origem";
$proto1340["m_columns"][] = "destino";
$proto1340["m_columns"][] = "duracao";
$proto1340["m_columns"][] = "custo";
$proto1340["m_columns"][] = "calldate";
$proto1340["m_columns"][] = "uniqueid";
$proto1340["m_columns"][] = "id_interf";
$proto1340["m_columns"][] = "id_contrato";
$proto1340["m_columns"][] = "mes_referencia";
$proto1340["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto1340);

$proto1339["m_table"] = $obj;
$proto1339["m_alias"] = "";
$proto1341=array();
$proto1341["m_sql"] = "";
$proto1341["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1341["m_column"]=$obj;
$proto1341["m_contained"] = array();
$proto1341["m_strCase"] = "";
$proto1341["m_havingmode"] = "0";
$proto1341["m_inBrackets"] = "0";
$proto1341["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1341);

$proto1339["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1339);

$proto1316["m_fromlist"][]=$obj;
												$proto1343=array();
$proto1343["m_link"] = "SQLL_INNERJOIN";
			$proto1344=array();
$proto1344["m_strName"] = "centrocusto";
$proto1344["m_columns"] = array();
$proto1344["m_columns"][] = "idt_custo";
$proto1344["m_columns"][] = "dsc_centro_cust";
$proto1344["m_columns"][] = "idt_colab";
$proto1344["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1344);

$proto1343["m_table"] = $obj;
$proto1343["m_alias"] = "";
$proto1345=array();
$proto1345["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1345["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1345["m_column"]=$obj;
$proto1345["m_contained"] = array();
$proto1345["m_strCase"] = "= centrocusto.idt_custo";
$proto1345["m_havingmode"] = "0";
$proto1345["m_inBrackets"] = "0";
$proto1345["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1345);

$proto1343["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1343);

$proto1316["m_fromlist"][]=$obj;
												$proto1347=array();
$proto1347["m_link"] = "SQLL_INNERJOIN";
			$proto1348=array();
$proto1348["m_strName"] = "ipbx_interf";
$proto1348["m_columns"] = array();
$proto1348["m_columns"][] = "id_interf";
$proto1348["m_columns"][] = "dsc_interf";
$proto1348["m_columns"][] = "id_contrato";
$proto1348["m_columns"][] = "board";
$proto1348["m_columns"][] = "link";
$proto1348["m_columns"][] = "usuario";
$proto1348["m_columns"][] = "senha";
$proto1348["m_columns"][] = "ip_host";
$proto1348["m_columns"][] = "id_central";
$proto1348["m_columns"][] = "codec";
$proto1348["m_columns"][] = "id_tp_interf";
$proto1348["m_columns"][] = "tp_chamada";
$proto1348["m_columns"][] = "piloto";
$proto1348["m_columns"][] = "id_chamada";
$proto1348["m_columns"][] = "flg_id_cham_parc";
$proto1348["m_columns"][] = "dtmf";
$proto1348["m_columns"][] = "ddd_localidade";
$proto1348["m_columns"][] = "cd_operadora";
$proto1348["m_columns"][] = "khomp_interf";
$proto1348["m_columns"][] = "flg_logon_remoto";
$proto1348["m_columns"][] = "pers_params";
$proto1348["m_columns"][] = "registro";
$proto1348["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto1348);

$proto1347["m_table"] = $obj;
$proto1347["m_alias"] = "";
$proto1349=array();
$proto1349["m_sql"] = "conta.id_interf = ipbx_interf.id_interf";
$proto1349["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto1349["m_column"]=$obj;
$proto1349["m_contained"] = array();
$proto1349["m_strCase"] = "= ipbx_interf.id_interf";
$proto1349["m_havingmode"] = "0";
$proto1349["m_inBrackets"] = "0";
$proto1349["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1349);

$proto1347["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1347);

$proto1316["m_fromlist"][]=$obj;
$proto1316["m_groupby"] = array();
$proto1316["m_orderby"] = array();
												$proto1351=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1351["m_column"]=$obj;
$proto1351["m_bAsc"] = 0;
$proto1351["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1351);

$proto1316["m_orderby"][]=$obj;					
												$proto1353=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1353["m_column"]=$obj;
$proto1353["m_bAsc"] = 1;
$proto1353["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1353);

$proto1316["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1316);

$queryData_Discadas___Centro_de_custo = $obj;
$tdataDiscadas___Centro_de_custo[".sqlquery"] = $queryData_Discadas___Centro_de_custo;



?>
