<?php

//	field labels
$fieldLabelsRel__Simplificado___Centro_Custo = array();
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]["idt_custo"] = "Identificação";
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de Custo";
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]["dsc_interf"] = "Desc. Interface";
$fieldLabelsRel__Simplificado___Centro_Custo["Portuguese(Brazil)"]["DataHora"] = "Data Hora";


$tdataRel__Simplificado___Centro_Custo=array();
	$tdataRel__Simplificado___Centro_Custo[".NumberOfChars"]=80; 
	$tdataRel__Simplificado___Centro_Custo[".ShortName"]="Rel__Simplificado___Centro_Custo";
	$tdataRel__Simplificado___Centro_Custo[".OwnerID"]="";
	$tdataRel__Simplificado___Centro_Custo[".OriginalTable"]="conta";
	$tdataRel__Simplificado___Centro_Custo[".NCSearch"]=true;
	

$tdataRel__Simplificado___Centro_Custo[".shortTableName"] = "Rel__Simplificado___Centro_Custo";
$tdataRel__Simplificado___Centro_Custo[".dataSourceTable"] = "Rel. Simplificado - Centro Custo";
$tdataRel__Simplificado___Centro_Custo[".nSecOptions"] = 0;
$tdataRel__Simplificado___Centro_Custo[".nLoginMethod"] = 1;
$tdataRel__Simplificado___Centro_Custo[".recsPerRowList"] = 1;	
$tdataRel__Simplificado___Centro_Custo[".tableGroupBy"] = "1";
$tdataRel__Simplificado___Centro_Custo[".dbType"] = 0;
$tdataRel__Simplificado___Centro_Custo[".mainTableOwnerID"] = "";
$tdataRel__Simplificado___Centro_Custo[".moveNext"] = 1;

$tdataRel__Simplificado___Centro_Custo[".listAjax"] = false;

	$tdataRel__Simplificado___Centro_Custo[".audit"] = false;

	$tdataRel__Simplificado___Centro_Custo[".locking"] = false;
	
$tdataRel__Simplificado___Centro_Custo[".listIcons"] = true;

$tdataRel__Simplificado___Centro_Custo[".exportTo"] = true;

$tdataRel__Simplificado___Centro_Custo[".printFriendly"] = true;


$tdataRel__Simplificado___Centro_Custo[".showSimpleSearchOptions"] = false;

$tdataRel__Simplificado___Centro_Custo[".showSearchPanel"] = true;


$tdataRel__Simplificado___Centro_Custo[".isUseAjaxSuggest"] = true;


$tdataRel__Simplificado___Centro_Custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Simplificado___Centro_Custo[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Simplificado___Centro_Custo[".isUseTimeForSearch"] = false;





$tdataRel__Simplificado___Centro_Custo[".isUseInlineJs"] = $tdataRel__Simplificado___Centro_Custo[".isUseInlineAdd"] || $tdataRel__Simplificado___Centro_Custo[".isUseInlineEdit"];

$tdataRel__Simplificado___Centro_Custo[".allSearchFields"] = array();

$tdataRel__Simplificado___Centro_Custo[".globSearchFields"][] = "dsc_centro_cust";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_centro_cust", $tdataRel__Simplificado___Centro_Custo[".allSearchFields"]))
{
	$tdataRel__Simplificado___Centro_Custo[".allSearchFields"][] = "dsc_centro_cust";	
}


$tdataRel__Simplificado___Centro_Custo[".isDynamicPerm"] = true;

	

$tdataRel__Simplificado___Centro_Custo[".isDisplayLoading"] = true;

$tdataRel__Simplificado___Centro_Custo[".isResizeColumns"] = false;


$tdataRel__Simplificado___Centro_Custo[".createLoginPage"] = true;


 	

$tdataRel__Simplificado___Centro_Custo[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY 4, centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Simplificado___Centro_Custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Simplificado___Centro_Custo[".orderindexes"] = array();
$tdataRel__Simplificado___Centro_Custo[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "conta.calldate");
$tdataRel__Simplificado___Centro_Custo[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataRel__Simplificado___Centro_Custo[".sqlHead"] = "SELECT conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  conta.calldate as DataHora,  ipbx_interf.dsc_interf";

$tdataRel__Simplificado___Centro_Custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";

$tdataRel__Simplificado___Centro_Custo[".sqlWhereExpr"] = "";

$tdataRel__Simplificado___Centro_Custo[".sqlTail"] = "GROUP BY centrocusto.dsc_centro_cust, dsc_interf, 4";



	$tableKeys=array();
	$tdataRel__Simplificado___Centro_Custo[".Keys"]=$tableKeys;

	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "conta.idt_custo";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Simplificado___Centro_Custo["idt_custo"]=$fdata;
	
//	dsc_centro_cust
	$fdata = array();
	$fdata["strName"] = "dsc_centro_cust";
	$fdata["ownerTable"] = "centrocusto";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_centro_cust";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Simplificado___Centro_Custo["dsc_centro_cust"]=$fdata;
	
//	custo
	$fdata = array();
	$fdata["strName"] = "custo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Custo"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "custo";
		$fdata["FullName"]= "round(sum(conta.custo), 2)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Simplificado___Centro_Custo["custo"]=$fdata;
	
//	DataHora
	$fdata = array();
	$fdata["strName"] = "DataHora";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Data Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "DataHora";
		$fdata["FullName"]= "conta.calldate";
						$fdata["Index"]= 4;
	 $fdata["DateEditType"]=13; 
			
									$tdataRel__Simplificado___Centro_Custo["DataHora"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf";
		$fdata["Label"]="Desc. Interface"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "ipbx_interf.dsc_interf";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Simplificado___Centro_Custo["dsc_interf"]=$fdata;

	
$tables_data["Rel. Simplificado - Centro Custo"]=&$tdataRel__Simplificado___Centro_Custo;
$field_labels["Rel__Simplificado___Centro_Custo"] = &$fieldLabelsRel__Simplificado___Centro_Custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Simplificado - Centro Custo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Simplificado - Centro Custo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto451=array();
$proto451["m_strHead"] = "SELECT";
$proto451["m_strFieldList"] = "conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  conta.calldate as DataHora,  ipbx_interf.dsc_interf";
$proto451["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$proto451["m_strWhere"] = "";
$proto451["m_strOrderBy"] = "ORDER BY 4, centrocusto.dsc_centro_cust";
$proto451["m_strTail"] = "GROUP BY centrocusto.dsc_centro_cust, dsc_interf, 4";
$proto452=array();
$proto452["m_sql"] = "";
$proto452["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto452["m_column"]=$obj;
$proto452["m_contained"] = array();
$proto452["m_strCase"] = "";
$proto452["m_havingmode"] = "0";
$proto452["m_inBrackets"] = "0";
$proto452["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto452);

$proto451["m_where"] = $obj;
$proto454=array();
$proto454["m_sql"] = "";
$proto454["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto454["m_column"]=$obj;
$proto454["m_contained"] = array();
$proto454["m_strCase"] = "";
$proto454["m_havingmode"] = "0";
$proto454["m_inBrackets"] = "0";
$proto454["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto454);

$proto451["m_having"] = $obj;
$proto451["m_fieldlist"] = array();
						$proto456=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto456["m_expr"]=$obj;
$proto456["m_alias"] = "";
$obj = new SQLFieldListItem($proto456);

$proto451["m_fieldlist"][]=$obj;
						$proto458=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto458["m_expr"]=$obj;
$proto458["m_alias"] = "";
$obj = new SQLFieldListItem($proto458);

$proto451["m_fieldlist"][]=$obj;
						$proto460=array();
			$proto461=array();
$proto461["m_functiontype"] = "SQLF_CUSTOM";
$proto461["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)"
));

$proto461["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto461["m_arguments"][]=$obj;
$proto461["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto461);

$proto460["m_expr"]=$obj;
$proto460["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto460);

$proto451["m_fieldlist"][]=$obj;
						$proto464=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto464["m_expr"]=$obj;
$proto464["m_alias"] = "DataHora";
$obj = new SQLFieldListItem($proto464);

$proto451["m_fieldlist"][]=$obj;
						$proto466=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf"
));

$proto466["m_expr"]=$obj;
$proto466["m_alias"] = "";
$obj = new SQLFieldListItem($proto466);

$proto451["m_fieldlist"][]=$obj;
$proto451["m_fromlist"] = array();
												$proto468=array();
$proto468["m_link"] = "SQLL_MAIN";
			$proto469=array();
$proto469["m_strName"] = "conta";
$proto469["m_columns"] = array();
$proto469["m_columns"][] = "id_conta";
$proto469["m_columns"][] = "idt_custo";
$proto469["m_columns"][] = "origem";
$proto469["m_columns"][] = "destino";
$proto469["m_columns"][] = "duracao";
$proto469["m_columns"][] = "custo";
$proto469["m_columns"][] = "calldate";
$proto469["m_columns"][] = "uniqueid";
$proto469["m_columns"][] = "id_interf";
$proto469["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto469);

$proto468["m_table"] = $obj;
$proto468["m_alias"] = "";
$proto470=array();
$proto470["m_sql"] = "";
$proto470["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto470["m_column"]=$obj;
$proto470["m_contained"] = array();
$proto470["m_strCase"] = "";
$proto470["m_havingmode"] = "0";
$proto470["m_inBrackets"] = "0";
$proto470["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto470);

$proto468["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto468);

$proto451["m_fromlist"][]=$obj;
												$proto472=array();
$proto472["m_link"] = "SQLL_INNERJOIN";
			$proto473=array();
$proto473["m_strName"] = "centrocusto";
$proto473["m_columns"] = array();
$proto473["m_columns"][] = "idt_custo";
$proto473["m_columns"][] = "dsc_centro_cust";
$proto473["m_columns"][] = "idt_colab";
$proto473["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto473);

$proto472["m_table"] = $obj;
$proto472["m_alias"] = "";
$proto474=array();
$proto474["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto474["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto474["m_column"]=$obj;
$proto474["m_contained"] = array();
$proto474["m_strCase"] = "= centrocusto.idt_custo";
$proto474["m_havingmode"] = "0";
$proto474["m_inBrackets"] = "0";
$proto474["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto474);

$proto472["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto472);

$proto451["m_fromlist"][]=$obj;
												$proto476=array();
$proto476["m_link"] = "SQLL_INNERJOIN";
			$proto477=array();
$proto477["m_strName"] = "ipbx_interf";
$proto477["m_columns"] = array();
$proto477["m_columns"][] = "id_interf";
$proto477["m_columns"][] = "dsc_interf";
$proto477["m_columns"][] = "id_contrato";
$proto477["m_columns"][] = "board";
$proto477["m_columns"][] = "link";
$proto477["m_columns"][] = "usuario";
$proto477["m_columns"][] = "senha";
$proto477["m_columns"][] = "ip_host";
$proto477["m_columns"][] = "id_central";
$proto477["m_columns"][] = "codec";
$proto477["m_columns"][] = "id_tp_interf";
$proto477["m_columns"][] = "tp_chamada";
$proto477["m_columns"][] = "piloto";
$proto477["m_columns"][] = "id_chamada";
$proto477["m_columns"][] = "flg_id_cham_parc";
$proto477["m_columns"][] = "dtmf";
$proto477["m_columns"][] = "ddd_localidade";
$proto477["m_columns"][] = "cd_operadora";
$proto477["m_columns"][] = "khomp_interf";
$proto477["m_columns"][] = "flg_logon_remoto";
$proto477["m_columns"][] = "pers_params";
$proto477["m_columns"][] = "registro";
$proto477["m_columns"][] = "qtd_cham_por_ramal";
$obj = new SQLTable($proto477);

$proto476["m_table"] = $obj;
$proto476["m_alias"] = "";
$proto478=array();
$proto478["m_sql"] = "conta.id_interf = ipbx_interf.id_interf";
$proto478["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto478["m_column"]=$obj;
$proto478["m_contained"] = array();
$proto478["m_strCase"] = "= ipbx_interf.id_interf";
$proto478["m_havingmode"] = "0";
$proto478["m_inBrackets"] = "0";
$proto478["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto478);

$proto476["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto476);

$proto451["m_fromlist"][]=$obj;
$proto451["m_groupby"] = array();
												$proto480=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto480["m_column"]=$obj;
$obj = new SQLGroupByItem($proto480);

$proto451["m_groupby"][]=$obj;
												$proto482=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dsc_interf"
));

$proto482["m_column"]=$obj;
$obj = new SQLGroupByItem($proto482);

$proto451["m_groupby"][]=$obj;
												$proto484=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "4"
));

$proto484["m_column"]=$obj;
$obj = new SQLGroupByItem($proto484);

$proto451["m_groupby"][]=$obj;
$proto451["m_orderby"] = array();
												$proto486=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "4"
));

$proto486["m_column"]=$obj;
$proto486["m_bAsc"] = 1;
$proto486["m_nColumn"] = 4;
$obj = new SQLOrderByItem($proto486);

$proto451["m_orderby"][]=$obj;					
												$proto488=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto488["m_column"]=$obj;
$proto488["m_bAsc"] = 1;
$proto488["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto488);

$proto451["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto451);

$queryData_Rel__Simplificado___Centro_Custo = $obj;
$tdataRel__Simplificado___Centro_Custo[".sqlquery"] = $queryData_Rel__Simplificado___Centro_Custo;



?>
