<?php

//	field labels
$fieldLabelsSimplificado = array();
$fieldLabelsSimplificado["Portuguese(Brazil)"]=array();
$fieldLabelsSimplificado["Portuguese(Brazil)"]["idt_custo"] = "Idt Custo";
$fieldLabelsSimplificado["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de custo";
$fieldLabelsSimplificado["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsSimplificado["Portuguese(Brazil)"]["Mes"] = "Mês";
$fieldLabelsSimplificado["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsSimplificado["Portuguese(Brazil)"]["dsc_interf"] = "Interface de saída";


$tdataSimplificado=array();
	$tdataSimplificado[".NumberOfChars"]=80; 
	$tdataSimplificado[".ShortName"]="Simplificado";
	$tdataSimplificado[".OwnerID"]="";
	$tdataSimplificado[".OriginalTable"]="conta";
	$tdataSimplificado[".NCSearch"]=true;
	

$tdataSimplificado[".shortTableName"] = "Simplificado";
$tdataSimplificado[".dataSourceTable"] = "Rel. Simplificado - Centro de custo";
$tdataSimplificado[".nSecOptions"] = 0;
$tdataSimplificado[".nLoginMethod"] = 1;
$tdataSimplificado[".recsPerRowList"] = 1;	
$tdataSimplificado[".tableGroupBy"] = "1";
$tdataSimplificado[".dbType"] = 0;
$tdataSimplificado[".mainTableOwnerID"] = "";
$tdataSimplificado[".moveNext"] = 1;

$tdataSimplificado[".listAjax"] = true;

	$tdataSimplificado[".audit"] = false;

	$tdataSimplificado[".locking"] = false;
	
$tdataSimplificado[".listIcons"] = true;

$tdataSimplificado[".exportTo"] = true;

$tdataSimplificado[".printFriendly"] = true;


$tdataSimplificado[".showSimpleSearchOptions"] = false;

$tdataSimplificado[".showSearchPanel"] = true;


$tdataSimplificado[".isUseAjaxSuggest"] = true;


$tdataSimplificado[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataSimplificado[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataSimplificado[".isUseTimeForSearch"] = false;





$tdataSimplificado[".isUseInlineJs"] = $tdataSimplificado[".isUseInlineAdd"] || $tdataSimplificado[".isUseInlineEdit"];

$tdataSimplificado[".allSearchFields"] = array();

$tdataSimplificado[".globSearchFields"][] = "dsc_centro_cust";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_centro_cust", $tdataSimplificado[".allSearchFields"]))
{
	$tdataSimplificado[".allSearchFields"][] = "dsc_centro_cust";	
}
$tdataSimplificado[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataSimplificado[".allSearchFields"]))
{
	$tdataSimplificado[".allSearchFields"][] = "Mes";	
}
$tdataSimplificado[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataSimplificado[".allSearchFields"]))
{
	$tdataSimplificado[".allSearchFields"][] = "Ano";	
}


$tdataSimplificado[".isDynamicPerm"] = true;

	

$tdataSimplificado[".isDisplayLoading"] = true;

$tdataSimplificado[".isResizeColumns"] = false;


$tdataSimplificado[".createLoginPage"] = true;


 	

$tdataSimplificado[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY conta.ano_referencia DESC, conta.mes_referencia, centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataSimplificado[".strOrderBy"] = $gstrOrderBy;
	
$tdataSimplificado[".orderindexes"] = array();
$tdataSimplificado[".orderindexes"][] = array(5, (0 ? "ASC" : "DESC"), "conta.ano_referencia");
$tdataSimplificado[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "conta.mes_referencia");
$tdataSimplificado[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataSimplificado[".sqlHead"] = "SELECT conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  conta.mes_referencia AS Mes,  conta.ano_referencia AS Ano,  ipbx_interf.dsc_interf";

$tdataSimplificado[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";

$tdataSimplificado[".sqlWhereExpr"] = "";

$tdataSimplificado[".sqlTail"] = "GROUP BY centrocusto.dsc_centro_cust, dsc_interf, Ano, Mes";



	$tableKeys=array();
	$tdataSimplificado[".Keys"]=$tableKeys;

	
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
			
									$tdataSimplificado["idt_custo"]=$fdata;
	
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
	$fdata["LookupOrderBy"]="dsc_centro_cust";
							$fdata["LookupWhere"] = 'flg_ativado = 1';

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["dsc_centro_cust"]=$fdata;
	
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
		$fdata["FullName"]= "round(sum(conta.custo), 2)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["custo"]=$fdata;
	
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
		$fdata["FullName"]= "conta.mes_referencia";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "conta";
				$fdata["LinkPrefix"]="files/"; 
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
		$fdata["FullName"]= "conta.ano_referencia";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["Ano"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf";
		$fdata["Label"]="Interface de saída"; 
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
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "ipbx_interf.dsc_interf";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["dsc_interf"]=$fdata;

	
$tables_data["Rel. Simplificado - Centro de custo"]=&$tdataSimplificado;
$field_labels["Rel__Simplificado___Centro_de_custo"] = &$fieldLabelsSimplificado;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Simplificado - Centro de custo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Simplificado - Centro de custo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1140=array();
$proto1140["m_strHead"] = "SELECT";
$proto1140["m_strFieldList"] = "conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  conta.mes_referencia AS Mes,  conta.ano_referencia AS Ano,  ipbx_interf.dsc_interf";
$proto1140["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$proto1140["m_strWhere"] = "";
$proto1140["m_strOrderBy"] = "ORDER BY conta.ano_referencia DESC, conta.mes_referencia, centrocusto.dsc_centro_cust";
$proto1140["m_strTail"] = "GROUP BY centrocusto.dsc_centro_cust, dsc_interf, Ano, Mes";
$proto1141=array();
$proto1141["m_sql"] = "";
$proto1141["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1141["m_column"]=$obj;
$proto1141["m_contained"] = array();
$proto1141["m_strCase"] = "";
$proto1141["m_havingmode"] = "0";
$proto1141["m_inBrackets"] = "0";
$proto1141["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1141);

$proto1140["m_where"] = $obj;
$proto1143=array();
$proto1143["m_sql"] = "";
$proto1143["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1143["m_column"]=$obj;
$proto1143["m_contained"] = array();
$proto1143["m_strCase"] = "";
$proto1143["m_havingmode"] = "0";
$proto1143["m_inBrackets"] = "0";
$proto1143["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1143);

$proto1140["m_having"] = $obj;
$proto1140["m_fieldlist"] = array();
						$proto1145=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1145["m_expr"]=$obj;
$proto1145["m_alias"] = "";
$obj = new SQLFieldListItem($proto1145);

$proto1140["m_fieldlist"][]=$obj;
						$proto1147=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1147["m_expr"]=$obj;
$proto1147["m_alias"] = "";
$obj = new SQLFieldListItem($proto1147);

$proto1140["m_fieldlist"][]=$obj;
						$proto1149=array();
			$proto1150=array();
$proto1150["m_functiontype"] = "SQLF_CUSTOM";
$proto1150["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)"
));

$proto1150["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto1150["m_arguments"][]=$obj;
$proto1150["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto1150);

$proto1149["m_expr"]=$obj;
$proto1149["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto1149);

$proto1140["m_fieldlist"][]=$obj;
						$proto1153=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "conta"
));

$proto1153["m_expr"]=$obj;
$proto1153["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto1153);

$proto1140["m_fieldlist"][]=$obj;
						$proto1155=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "conta"
));

$proto1155["m_expr"]=$obj;
$proto1155["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto1155);

$proto1140["m_fieldlist"][]=$obj;
						$proto1157=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf"
));

$proto1157["m_expr"]=$obj;
$proto1157["m_alias"] = "";
$obj = new SQLFieldListItem($proto1157);

$proto1140["m_fieldlist"][]=$obj;
$proto1140["m_fromlist"] = array();
												$proto1159=array();
$proto1159["m_link"] = "SQLL_MAIN";
			$proto1160=array();
$proto1160["m_strName"] = "conta";
$proto1160["m_columns"] = array();
$proto1160["m_columns"][] = "id_conta";
$proto1160["m_columns"][] = "idt_custo";
$proto1160["m_columns"][] = "origem";
$proto1160["m_columns"][] = "destino";
$proto1160["m_columns"][] = "duracao";
$proto1160["m_columns"][] = "custo";
$proto1160["m_columns"][] = "calldate";
$proto1160["m_columns"][] = "uniqueid";
$proto1160["m_columns"][] = "id_interf";
$proto1160["m_columns"][] = "id_contrato";
$proto1160["m_columns"][] = "mes_referencia";
$proto1160["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto1160);

$proto1159["m_table"] = $obj;
$proto1159["m_alias"] = "";
$proto1161=array();
$proto1161["m_sql"] = "";
$proto1161["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1161["m_column"]=$obj;
$proto1161["m_contained"] = array();
$proto1161["m_strCase"] = "";
$proto1161["m_havingmode"] = "0";
$proto1161["m_inBrackets"] = "0";
$proto1161["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1161);

$proto1159["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1159);

$proto1140["m_fromlist"][]=$obj;
												$proto1163=array();
$proto1163["m_link"] = "SQLL_INNERJOIN";
			$proto1164=array();
$proto1164["m_strName"] = "centrocusto";
$proto1164["m_columns"] = array();
$proto1164["m_columns"][] = "idt_custo";
$proto1164["m_columns"][] = "dsc_centro_cust";
$proto1164["m_columns"][] = "idt_colab";
$proto1164["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1164);

$proto1163["m_table"] = $obj;
$proto1163["m_alias"] = "";
$proto1165=array();
$proto1165["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1165["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1165["m_column"]=$obj;
$proto1165["m_contained"] = array();
$proto1165["m_strCase"] = "= centrocusto.idt_custo";
$proto1165["m_havingmode"] = "0";
$proto1165["m_inBrackets"] = "0";
$proto1165["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1165);

$proto1163["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1163);

$proto1140["m_fromlist"][]=$obj;
												$proto1167=array();
$proto1167["m_link"] = "SQLL_INNERJOIN";
			$proto1168=array();
$proto1168["m_strName"] = "ipbx_interf";
$proto1168["m_columns"] = array();
$proto1168["m_columns"][] = "id_interf";
$proto1168["m_columns"][] = "dsc_interf";
$proto1168["m_columns"][] = "id_contrato";
$proto1168["m_columns"][] = "board";
$proto1168["m_columns"][] = "link";
$proto1168["m_columns"][] = "usuario";
$proto1168["m_columns"][] = "senha";
$proto1168["m_columns"][] = "ip_host";
$proto1168["m_columns"][] = "id_central";
$proto1168["m_columns"][] = "codec";
$proto1168["m_columns"][] = "id_tp_interf";
$proto1168["m_columns"][] = "tp_chamada";
$proto1168["m_columns"][] = "piloto";
$proto1168["m_columns"][] = "id_chamada";
$proto1168["m_columns"][] = "flg_id_cham_parc";
$proto1168["m_columns"][] = "dtmf";
$proto1168["m_columns"][] = "ddd_localidade";
$proto1168["m_columns"][] = "cd_operadora";
$proto1168["m_columns"][] = "khomp_interf";
$proto1168["m_columns"][] = "flg_logon_remoto";
$proto1168["m_columns"][] = "pers_params";
$proto1168["m_columns"][] = "registro";
$proto1168["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto1168);

$proto1167["m_table"] = $obj;
$proto1167["m_alias"] = "";
$proto1169=array();
$proto1169["m_sql"] = "conta.id_interf = ipbx_interf.id_interf";
$proto1169["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto1169["m_column"]=$obj;
$proto1169["m_contained"] = array();
$proto1169["m_strCase"] = "= ipbx_interf.id_interf";
$proto1169["m_havingmode"] = "0";
$proto1169["m_inBrackets"] = "0";
$proto1169["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1169);

$proto1167["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1167);

$proto1140["m_fromlist"][]=$obj;
$proto1140["m_groupby"] = array();
												$proto1171=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1171["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1171);

$proto1140["m_groupby"][]=$obj;
												$proto1173=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dsc_interf"
));

$proto1173["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1173);

$proto1140["m_groupby"][]=$obj;
												$proto1175=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Ano"
));

$proto1175["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1175);

$proto1140["m_groupby"][]=$obj;
												$proto1177=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Mes"
));

$proto1177["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1177);

$proto1140["m_groupby"][]=$obj;
$proto1140["m_orderby"] = array();
												$proto1179=array();
						$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "conta"
));

$proto1179["m_column"]=$obj;
$proto1179["m_bAsc"] = 0;
$proto1179["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1179);

$proto1140["m_orderby"][]=$obj;					
												$proto1181=array();
						$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "conta"
));

$proto1181["m_column"]=$obj;
$proto1181["m_bAsc"] = 1;
$proto1181["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1181);

$proto1140["m_orderby"][]=$obj;					
												$proto1183=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1183["m_column"]=$obj;
$proto1183["m_bAsc"] = 1;
$proto1183["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1183);

$proto1140["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1140);

$queryData_Simplificado = $obj;
$tdataSimplificado[".sqlquery"] = $queryData_Simplificado;



?>
