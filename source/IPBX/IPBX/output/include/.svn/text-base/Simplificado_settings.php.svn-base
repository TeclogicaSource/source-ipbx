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

$tdataSimplificado[".panelSearchFields"][] = "dsc_centro_cust";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_centro_cust", $tdataSimplificado[".allSearchFields"])) 
{
	$tdataSimplificado[".allSearchFields"][] = "dsc_centro_cust";	
}

$tdataSimplificado[".isDynamicPerm"] = true;

	

$tdataSimplificado[".isDisplayLoading"] = true;

$tdataSimplificado[".isResizeColumns"] = false;


$tdataSimplificado[".createLoginPage"] = true;


 	

$tdataSimplificado[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY date_format(conta.calldate,'%Y') DESC, date_format(conta.calldate,'%m'), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataSimplificado[".strOrderBy"] = $gstrOrderBy;
	
$tdataSimplificado[".orderindexes"] = array();
$tdataSimplificado[".orderindexes"][] = array(5, (0 ? "ASC" : "DESC"), "date_format(conta.calldate,'%Y') ");
$tdataSimplificado[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "date_format(conta.calldate,'%m')");
$tdataSimplificado[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataSimplificado[".sqlHead"] = "SELECT conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  date_format(conta.calldate,'%m') AS Mes,  date_format(conta.calldate,'%Y') AS Ano,  ipbx_interf.dsc_interf";

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
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Mês"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "date_format(conta.calldate,'%m')";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["Mes"]=$fdata;
	
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
		$fdata["FullName"]= "date_format(conta.calldate,'%Y')";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataSimplificado["Ano"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf";
		$fdata["Label"]="Interface de saída"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "ipbx_interf.dsc_interf";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
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










$proto946=array();
$proto946["m_strHead"] = "SELECT";
$proto946["m_strFieldList"] = "conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  date_format(conta.calldate,'%m') AS Mes,  date_format(conta.calldate,'%Y') AS Ano,  ipbx_interf.dsc_interf";
$proto946["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$proto946["m_strWhere"] = "";
$proto946["m_strOrderBy"] = "ORDER BY date_format(conta.calldate,'%Y') DESC, date_format(conta.calldate,'%m'), centrocusto.dsc_centro_cust";
$proto946["m_strTail"] = "GROUP BY centrocusto.dsc_centro_cust, dsc_interf, Ano, Mes";
$proto947=array();
$proto947["m_sql"] = "";
$proto947["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto947["m_column"]=$obj;
$proto947["m_contained"] = array();
$proto947["m_strCase"] = "";
$proto947["m_havingmode"] = "0";
$proto947["m_inBrackets"] = "0";
$proto947["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto947);

$proto946["m_where"] = $obj;
$proto949=array();
$proto949["m_sql"] = "";
$proto949["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto949["m_column"]=$obj;
$proto949["m_contained"] = array();
$proto949["m_strCase"] = "";
$proto949["m_havingmode"] = "0";
$proto949["m_inBrackets"] = "0";
$proto949["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto949);

$proto946["m_having"] = $obj;
$proto946["m_fieldlist"] = array();
						$proto951=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto951["m_expr"]=$obj;
$proto951["m_alias"] = "";
$obj = new SQLFieldListItem($proto951);

$proto946["m_fieldlist"][]=$obj;
						$proto953=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto953["m_expr"]=$obj;
$proto953["m_alias"] = "";
$obj = new SQLFieldListItem($proto953);

$proto946["m_fieldlist"][]=$obj;
						$proto955=array();
			$proto956=array();
$proto956["m_functiontype"] = "SQLF_CUSTOM";
$proto956["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)"
));

$proto956["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto956["m_arguments"][]=$obj;
$proto956["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto956);

$proto955["m_expr"]=$obj;
$proto955["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto955);

$proto946["m_fieldlist"][]=$obj;
						$proto959=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(conta.calldate,'%m')"
));

$proto959["m_expr"]=$obj;
$proto959["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto959);

$proto946["m_fieldlist"][]=$obj;
						$proto961=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(conta.calldate,'%Y')"
));

$proto961["m_expr"]=$obj;
$proto961["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto961);

$proto946["m_fieldlist"][]=$obj;
						$proto963=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf"
));

$proto963["m_expr"]=$obj;
$proto963["m_alias"] = "";
$obj = new SQLFieldListItem($proto963);

$proto946["m_fieldlist"][]=$obj;
$proto946["m_fromlist"] = array();
												$proto965=array();
$proto965["m_link"] = "SQLL_MAIN";
			$proto966=array();
$proto966["m_strName"] = "conta";
$proto966["m_columns"] = array();
$proto966["m_columns"][] = "id_conta";
$proto966["m_columns"][] = "idt_custo";
$proto966["m_columns"][] = "origem";
$proto966["m_columns"][] = "destino";
$proto966["m_columns"][] = "duracao";
$proto966["m_columns"][] = "custo";
$proto966["m_columns"][] = "calldate";
$proto966["m_columns"][] = "uniqueid";
$proto966["m_columns"][] = "id_interf";
$proto966["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto966);

$proto965["m_table"] = $obj;
$proto965["m_alias"] = "";
$proto967=array();
$proto967["m_sql"] = "";
$proto967["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto967["m_column"]=$obj;
$proto967["m_contained"] = array();
$proto967["m_strCase"] = "";
$proto967["m_havingmode"] = "0";
$proto967["m_inBrackets"] = "0";
$proto967["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto967);

$proto965["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto965);

$proto946["m_fromlist"][]=$obj;
												$proto969=array();
$proto969["m_link"] = "SQLL_INNERJOIN";
			$proto970=array();
$proto970["m_strName"] = "centrocusto";
$proto970["m_columns"] = array();
$proto970["m_columns"][] = "idt_custo";
$proto970["m_columns"][] = "dsc_centro_cust";
$proto970["m_columns"][] = "idt_colab";
$proto970["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto970);

$proto969["m_table"] = $obj;
$proto969["m_alias"] = "";
$proto971=array();
$proto971["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto971["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto971["m_column"]=$obj;
$proto971["m_contained"] = array();
$proto971["m_strCase"] = "= centrocusto.idt_custo";
$proto971["m_havingmode"] = "0";
$proto971["m_inBrackets"] = "0";
$proto971["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto971);

$proto969["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto969);

$proto946["m_fromlist"][]=$obj;
												$proto973=array();
$proto973["m_link"] = "SQLL_INNERJOIN";
			$proto974=array();
$proto974["m_strName"] = "ipbx_interf";
$proto974["m_columns"] = array();
$proto974["m_columns"][] = "id_interf";
$proto974["m_columns"][] = "dsc_interf";
$proto974["m_columns"][] = "id_contrato";
$proto974["m_columns"][] = "board";
$proto974["m_columns"][] = "link";
$proto974["m_columns"][] = "usuario";
$proto974["m_columns"][] = "senha";
$proto974["m_columns"][] = "ip_host";
$proto974["m_columns"][] = "id_central";
$proto974["m_columns"][] = "codec";
$proto974["m_columns"][] = "id_tp_interf";
$proto974["m_columns"][] = "tp_chamada";
$proto974["m_columns"][] = "piloto";
$proto974["m_columns"][] = "id_chamada";
$proto974["m_columns"][] = "flg_id_cham_parc";
$proto974["m_columns"][] = "dtmf";
$proto974["m_columns"][] = "ddd_localidade";
$proto974["m_columns"][] = "cd_operadora";
$proto974["m_columns"][] = "khomp_interf";
$proto974["m_columns"][] = "flg_logon_remoto";
$proto974["m_columns"][] = "pers_params";
$proto974["m_columns"][] = "registro";
$obj = new SQLTable($proto974);

$proto973["m_table"] = $obj;
$proto973["m_alias"] = "";
$proto975=array();
$proto975["m_sql"] = "conta.id_interf = ipbx_interf.id_interf";
$proto975["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto975["m_column"]=$obj;
$proto975["m_contained"] = array();
$proto975["m_strCase"] = "= ipbx_interf.id_interf";
$proto975["m_havingmode"] = "0";
$proto975["m_inBrackets"] = "0";
$proto975["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto975);

$proto973["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto973);

$proto946["m_fromlist"][]=$obj;
$proto946["m_groupby"] = array();
												$proto977=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto977["m_column"]=$obj;
$obj = new SQLGroupByItem($proto977);

$proto946["m_groupby"][]=$obj;
												$proto979=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dsc_interf"
));

$proto979["m_column"]=$obj;
$obj = new SQLGroupByItem($proto979);

$proto946["m_groupby"][]=$obj;
												$proto981=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Ano"
));

$proto981["m_column"]=$obj;
$obj = new SQLGroupByItem($proto981);

$proto946["m_groupby"][]=$obj;
												$proto983=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "Mes"
));

$proto983["m_column"]=$obj;
$obj = new SQLGroupByItem($proto983);

$proto946["m_groupby"][]=$obj;
$proto946["m_orderby"] = array();
												$proto985=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(conta.calldate,'%Y') "
));

$proto985["m_column"]=$obj;
$proto985["m_bAsc"] = 0;
$proto985["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto985);

$proto946["m_orderby"][]=$obj;					
												$proto987=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "date_format(conta.calldate,'%m')"
));

$proto987["m_column"]=$obj;
$proto987["m_bAsc"] = 1;
$proto987["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto987);

$proto946["m_orderby"][]=$obj;					
												$proto989=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto989["m_column"]=$obj;
$proto989["m_bAsc"] = 1;
$proto989["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto989);

$proto946["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto946);

$queryData_Simplificado = $obj;
$tdataSimplificado[".sqlquery"] = $queryData_Simplificado;



?>
