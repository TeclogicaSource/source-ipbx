<?php

//	field labels
$fieldLabelsRel__Centro_de_custo = array();
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de Custo";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Mes"] = "Mes";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["dt"] = "Data";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Ano"] = "Ano";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Total_MES"] = "Total MES";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Percentual"] = "Percentual (%)";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["periodo"] = "Periodo";


$tdataRel__Centro_de_custo=array();
	$tdataRel__Centro_de_custo[".NumberOfChars"]=80; 
	$tdataRel__Centro_de_custo[".ShortName"]="Rel__Centro_de_custo";
	$tdataRel__Centro_de_custo[".OwnerID"]="";
	$tdataRel__Centro_de_custo[".OriginalTable"]="centrocusto";
	$tdataRel__Centro_de_custo[".NCSearch"]=true;
	

$tdataRel__Centro_de_custo[".shortTableName"] = "Rel__Centro_de_custo";
$tdataRel__Centro_de_custo[".dataSourceTable"] = "Rel. Centro de custo";
$tdataRel__Centro_de_custo[".nSecOptions"] = 0;
$tdataRel__Centro_de_custo[".nLoginMethod"] = 1;
$tdataRel__Centro_de_custo[".recsPerRowList"] = 1;	
$tdataRel__Centro_de_custo[".tableGroupBy"] = "1";
$tdataRel__Centro_de_custo[".dbType"] = 0;
$tdataRel__Centro_de_custo[".mainTableOwnerID"] = "";
$tdataRel__Centro_de_custo[".moveNext"] = 1;

$tdataRel__Centro_de_custo[".listAjax"] = false;

	$tdataRel__Centro_de_custo[".audit"] = false;

	$tdataRel__Centro_de_custo[".locking"] = false;
	
$tdataRel__Centro_de_custo[".listIcons"] = true;

$tdataRel__Centro_de_custo[".exportTo"] = true;

$tdataRel__Centro_de_custo[".printFriendly"] = true;


$tdataRel__Centro_de_custo[".showSimpleSearchOptions"] = false;

$tdataRel__Centro_de_custo[".showSearchPanel"] = true;


$tdataRel__Centro_de_custo[".isUseAjaxSuggest"] = true;


$tdataRel__Centro_de_custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Centro_de_custo[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Centro_de_custo[".isUseTimeForSearch"] = false;





$tdataRel__Centro_de_custo[".isUseInlineJs"] = $tdataRel__Centro_de_custo[".isUseInlineAdd"] || $tdataRel__Centro_de_custo[".isUseInlineEdit"];

$tdataRel__Centro_de_custo[".allSearchFields"] = array();

$tdataRel__Centro_de_custo[".globSearchFields"][] = "periodo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("periodo", $tdataRel__Centro_de_custo[".allSearchFields"]))
{
	$tdataRel__Centro_de_custo[".allSearchFields"][] = "periodo";	
}


$tdataRel__Centro_de_custo[".isDynamicPerm"] = true;

	

$tdataRel__Centro_de_custo[".isDisplayLoading"] = true;

$tdataRel__Centro_de_custo[".isResizeColumns"] = false;


$tdataRel__Centro_de_custo[".createLoginPage"] = true;


 	

$tdataRel__Centro_de_custo[".noRecordsFirstPage"] = true;




$gstrOrderBy = "order by DATE_FORMAT(conta.calldate,'%m-%Y'), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Centro_de_custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Centro_de_custo[".orderindexes"] = array();
$tdataRel__Centro_de_custo[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "DATE_FORMAT(conta.calldate,'%m-%Y')");
$tdataRel__Centro_de_custo[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataRel__Centro_de_custo[".sqlHead"] = "SELECT round(sum(conta.duracao/60)) AS Minutos,  DATE_FORMAT(conta.calldate,'%m-%Y') AS dt,  DATE_FORMAT(conta.calldate,'%m') AS Mes,  DATE_FORMAT(conta.calldate,'%Y') AS Ano,  conta.calldate as periodo,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y') ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y'))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";

$tdataRel__Centro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataRel__Centro_de_custo[".sqlWhereExpr"] = "";

$tdataRel__Centro_de_custo[".sqlTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";



	$tableKeys=array();
	$tdataRel__Centro_de_custo[".Keys"]=$tableKeys;

	
//	Minutos
	$fdata = array();
	$fdata["strName"] = "Minutos";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Minutos";
		$fdata["FullName"]= "round(sum(conta.duracao/60))";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Centro_de_custo["Minutos"]=$fdata;
	
//	dt
	$fdata = array();
	$fdata["strName"] = "dt";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt";
		$fdata["FullName"]= "DATE_FORMAT(conta.calldate,'%m-%Y')";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Centro_de_custo["dt"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Mes";
		$fdata["FullName"]= "DATE_FORMAT(conta.calldate,'%m')";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Centro_de_custo["Mes"]=$fdata;
	
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
		$fdata["FullName"]= "DATE_FORMAT(conta.calldate,'%Y')";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Centro_de_custo["Ano"]=$fdata;
	
//	periodo
	$fdata = array();
	$fdata["strName"] = "periodo";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Periodo"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "periodo";
		$fdata["FullName"]= "conta.calldate";
						$fdata["Index"]= 5;
	 $fdata["DateEditType"]=13; 
			
									$tdataRel__Centro_de_custo["periodo"]=$fdata;
	
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
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Centro_de_custo["dsc_centro_cust"]=$fdata;
	
//	Total MES
	$fdata = array();
	$fdata["strName"] = "Total MES";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Total_MES";
		$fdata["FullName"]= "(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y') )";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Centro_de_custo["Total MES"]=$fdata;
	
//	Percentual
	$fdata = array();
	$fdata["strName"] = "Percentual";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Percentual (%)"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Percentual";
		$fdata["FullName"]= "round((sum(conta.custo)*100/(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y'))), 2)";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Centro_de_custo["Percentual"]=$fdata;
	
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
		$fdata["FullName"]= "round(sum(conta.custo))";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Centro_de_custo["custo"]=$fdata;

	
$tables_data["Rel. Centro de custo"]=&$tdataRel__Centro_de_custo;
$field_labels["Rel__Centro_de_custo"] = &$fieldLabelsRel__Centro_de_custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Centro de custo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Centro de custo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto780=array();
$proto780["m_strHead"] = "SELECT";
$proto780["m_strFieldList"] = "round(sum(conta.duracao/60)) AS Minutos,  DATE_FORMAT(conta.calldate,'%m-%Y') AS dt,  DATE_FORMAT(conta.calldate,'%m') AS Mes,  DATE_FORMAT(conta.calldate,'%Y') AS Ano,  conta.calldate as periodo,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y') ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y'))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";
$proto780["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto780["m_strWhere"] = "";
$proto780["m_strOrderBy"] = "order by DATE_FORMAT(conta.calldate,'%m-%Y'), centrocusto.dsc_centro_cust";
$proto780["m_strTail"] = "GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";
$proto781=array();
$proto781["m_sql"] = "";
$proto781["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto781["m_column"]=$obj;
$proto781["m_contained"] = array();
$proto781["m_strCase"] = "";
$proto781["m_havingmode"] = "0";
$proto781["m_inBrackets"] = "0";
$proto781["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto781);

$proto780["m_where"] = $obj;
$proto783=array();
$proto783["m_sql"] = "";
$proto783["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto783["m_column"]=$obj;
$proto783["m_contained"] = array();
$proto783["m_strCase"] = "";
$proto783["m_havingmode"] = "0";
$proto783["m_inBrackets"] = "0";
$proto783["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto783);

$proto780["m_having"] = $obj;
$proto780["m_fieldlist"] = array();
						$proto785=array();
			$proto786=array();
$proto786["m_functiontype"] = "SQLF_CUSTOM";
$proto786["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.duracao/60)"
));

$proto786["m_arguments"][]=$obj;
$proto786["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto786);

$proto785["m_expr"]=$obj;
$proto785["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto785);

$proto780["m_fieldlist"][]=$obj;
						$proto788=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(conta.calldate,'%m-%Y')"
));

$proto788["m_expr"]=$obj;
$proto788["m_alias"] = "dt";
$obj = new SQLFieldListItem($proto788);

$proto780["m_fieldlist"][]=$obj;
						$proto790=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(conta.calldate,'%m')"
));

$proto790["m_expr"]=$obj;
$proto790["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto790);

$proto780["m_fieldlist"][]=$obj;
						$proto792=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(conta.calldate,'%Y')"
));

$proto792["m_expr"]=$obj;
$proto792["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto792);

$proto780["m_fieldlist"][]=$obj;
						$proto794=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto794["m_expr"]=$obj;
$proto794["m_alias"] = "periodo";
$obj = new SQLFieldListItem($proto794);

$proto780["m_fieldlist"][]=$obj;
						$proto796=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto796["m_expr"]=$obj;
$proto796["m_alias"] = "";
$obj = new SQLFieldListItem($proto796);

$proto780["m_fieldlist"][]=$obj;
						$proto798=array();
			$proto799=array();
$proto799["m_strHead"] = "select";
$proto799["m_strFieldList"] = "sum(custo)";
$proto799["m_strFrom"] = "from conta ct";
$proto799["m_strWhere"] = "DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y')";
$proto799["m_strOrderBy"] = "";
$proto799["m_strTail"] = "";
$proto800=array();
$proto800["m_sql"] = "DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y')";
$proto800["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(ct.calldate,'%m-%Y')"
));

$proto800["m_column"]=$obj;
$proto800["m_contained"] = array();
$proto800["m_strCase"] = "= DATE_FORMAT(conta.calldate,'%m-%Y')";
$proto800["m_havingmode"] = "0";
$proto800["m_inBrackets"] = "0";
$proto800["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto800);

$proto799["m_where"] = $obj;
$proto802=array();
$proto802["m_sql"] = "";
$proto802["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto802["m_column"]=$obj;
$proto802["m_contained"] = array();
$proto802["m_strCase"] = "";
$proto802["m_havingmode"] = "0";
$proto802["m_inBrackets"] = "0";
$proto802["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto802);

$proto799["m_having"] = $obj;
$proto799["m_fieldlist"] = array();
						$proto804=array();
			$proto805=array();
$proto805["m_functiontype"] = "SQLF_SUM";
$proto805["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "ct"
));

$proto805["m_arguments"][]=$obj;
$proto805["m_strFunctionName"] = "sum";
$obj = new SQLFunctionCall($proto805);

$proto804["m_expr"]=$obj;
$proto804["m_alias"] = "";
$obj = new SQLFieldListItem($proto804);

$proto799["m_fieldlist"][]=$obj;
$proto799["m_fromlist"] = array();
												$proto807=array();
$proto807["m_link"] = "SQLL_MAIN";
			$proto808=array();
$proto808["m_strName"] = "conta";
$proto808["m_columns"] = array();
$proto808["m_columns"][] = "id_conta";
$proto808["m_columns"][] = "idt_custo";
$proto808["m_columns"][] = "origem";
$proto808["m_columns"][] = "destino";
$proto808["m_columns"][] = "duracao";
$proto808["m_columns"][] = "custo";
$proto808["m_columns"][] = "calldate";
$proto808["m_columns"][] = "uniqueid";
$proto808["m_columns"][] = "id_interf";
$proto808["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto808);

$proto807["m_table"] = $obj;
$proto807["m_alias"] = "ct";
$proto809=array();
$proto809["m_sql"] = "";
$proto809["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto809["m_column"]=$obj;
$proto809["m_contained"] = array();
$proto809["m_strCase"] = "";
$proto809["m_havingmode"] = "0";
$proto809["m_inBrackets"] = "0";
$proto809["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto809);

$proto807["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto807);

$proto799["m_fromlist"][]=$obj;
$proto799["m_groupby"] = array();
$proto799["m_orderby"] = array();
$obj = new SQLQuery($proto799);

$proto798["m_expr"]=$obj;
$proto798["m_alias"] = "\"Total MES\"";
$obj = new SQLFieldListItem($proto798);

$proto780["m_fieldlist"][]=$obj;
						$proto811=array();
			$proto812=array();
$proto812["m_functiontype"] = "SQLF_CUSTOM";
$proto812["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "(sum(conta.custo)*100/(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y')))"
));

$proto812["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto812["m_arguments"][]=$obj;
$proto812["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto812);

$proto811["m_expr"]=$obj;
$proto811["m_alias"] = "\"Percentual\"";
$obj = new SQLFieldListItem($proto811);

$proto780["m_fieldlist"][]=$obj;
						$proto815=array();
			$proto816=array();
$proto816["m_functiontype"] = "SQLF_CUSTOM";
$proto816["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)"
));

$proto816["m_arguments"][]=$obj;
$proto816["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto816);

$proto815["m_expr"]=$obj;
$proto815["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto815);

$proto780["m_fieldlist"][]=$obj;
$proto780["m_fromlist"] = array();
												$proto818=array();
$proto818["m_link"] = "SQLL_MAIN";
			$proto819=array();
$proto819["m_strName"] = "conta";
$proto819["m_columns"] = array();
$proto819["m_columns"][] = "id_conta";
$proto819["m_columns"][] = "idt_custo";
$proto819["m_columns"][] = "origem";
$proto819["m_columns"][] = "destino";
$proto819["m_columns"][] = "duracao";
$proto819["m_columns"][] = "custo";
$proto819["m_columns"][] = "calldate";
$proto819["m_columns"][] = "uniqueid";
$proto819["m_columns"][] = "id_interf";
$proto819["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto819);

$proto818["m_table"] = $obj;
$proto818["m_alias"] = "";
$proto820=array();
$proto820["m_sql"] = "";
$proto820["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto820["m_column"]=$obj;
$proto820["m_contained"] = array();
$proto820["m_strCase"] = "";
$proto820["m_havingmode"] = "0";
$proto820["m_inBrackets"] = "0";
$proto820["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto820);

$proto818["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto818);

$proto780["m_fromlist"][]=$obj;
												$proto822=array();
$proto822["m_link"] = "SQLL_INNERJOIN";
			$proto823=array();
$proto823["m_strName"] = "centrocusto";
$proto823["m_columns"] = array();
$proto823["m_columns"][] = "idt_custo";
$proto823["m_columns"][] = "dsc_centro_cust";
$proto823["m_columns"][] = "idt_colab";
$proto823["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto823);

$proto822["m_table"] = $obj;
$proto822["m_alias"] = "";
$proto824=array();
$proto824["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto824["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto824["m_column"]=$obj;
$proto824["m_contained"] = array();
$proto824["m_strCase"] = "= centrocusto.idt_custo";
$proto824["m_havingmode"] = "0";
$proto824["m_inBrackets"] = "0";
$proto824["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto824);

$proto822["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto822);

$proto780["m_fromlist"][]=$obj;
$proto780["m_groupby"] = array();
												$proto826=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate,'%m-%Y')"
));

$proto826["m_column"]=$obj;
$obj = new SQLGroupByItem($proto826);

$proto780["m_groupby"][]=$obj;
												$proto828=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto828["m_column"]=$obj;
$obj = new SQLGroupByItem($proto828);

$proto780["m_groupby"][]=$obj;
$proto780["m_orderby"] = array();
												$proto830=array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(conta.calldate,'%m-%Y')"
));

$proto830["m_column"]=$obj;
$proto830["m_bAsc"] = 1;
$proto830["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto830);

$proto780["m_orderby"][]=$obj;					
												$proto832=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto832["m_column"]=$obj;
$proto832["m_bAsc"] = 1;
$proto832["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto832);

$proto780["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto780);

$queryData_Rel__Centro_de_custo = $obj;
$tdataRel__Centro_de_custo[".sqlquery"] = $queryData_Rel__Centro_de_custo;



?>
