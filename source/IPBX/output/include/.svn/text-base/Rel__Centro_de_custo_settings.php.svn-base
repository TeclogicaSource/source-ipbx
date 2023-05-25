<?php

//	field labels
$fieldLabelsRel__Centro_de_custo = array();
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["dsc_centro_cust"] = "Centro de Custo";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Mes"] = "Mes de referência";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Minutos"] = "Minutos";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["dt"] = "Data";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Ano"] = "Ano de referência";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Total_MES"] = "Total MES";
$fieldLabelsRel__Centro_de_custo["Portuguese(Brazil)"]["Percentual"] = "Percentual (%)";


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
$tdataRel__Centro_de_custo[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataRel__Centro_de_custo[".isUseTimeForSearch"] = false;





$tdataRel__Centro_de_custo[".isUseInlineJs"] = $tdataRel__Centro_de_custo[".isUseInlineAdd"] || $tdataRel__Centro_de_custo[".isUseInlineEdit"];

$tdataRel__Centro_de_custo[".allSearchFields"] = array();

$tdataRel__Centro_de_custo[".globSearchFields"][] = "Mes";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Mes", $tdataRel__Centro_de_custo[".allSearchFields"]))
{
	$tdataRel__Centro_de_custo[".allSearchFields"][] = "Mes";	
}
$tdataRel__Centro_de_custo[".globSearchFields"][] = "Ano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Ano", $tdataRel__Centro_de_custo[".allSearchFields"]))
{
	$tdataRel__Centro_de_custo[".allSearchFields"][] = "Ano";	
}


$tdataRel__Centro_de_custo[".isDynamicPerm"] = true;

	

$tdataRel__Centro_de_custo[".isDisplayLoading"] = true;

$tdataRel__Centro_de_custo[".isResizeColumns"] = false;


$tdataRel__Centro_de_custo[".createLoginPage"] = true;


 	

$tdataRel__Centro_de_custo[".noRecordsFirstPage"] = true;




$gstrOrderBy = "order by concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Centro_de_custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Centro_de_custo[".orderindexes"] = array();
$tdataRel__Centro_de_custo[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "concat(mes_referencia, \"-\", ano_referencia)");
$tdataRel__Centro_de_custo[".orderindexes"][] = array(5, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");

$tdataRel__Centro_de_custo[".sqlHead"] = "SELECT round(sum(conta.duracao/60)) AS Minutos,  concat(mes_referencia,\"-\", ano_referencia) AS dt,  mes_referencia AS Mes,  ano_referencia AS Ano,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia) ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";

$tdataRel__Centro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataRel__Centro_de_custo[".sqlWhereExpr"] = "";

$tdataRel__Centro_de_custo[".sqlTail"] = "GROUP BY concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";



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
		$fdata["FullName"]= "concat(mes_referencia,\"-\", ano_referencia)";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Centro_de_custo["dt"]=$fdata;
	
//	Mes
	$fdata = array();
	$fdata["strName"] = "Mes";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Mes de referência"; 
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
		$fdata["FullName"]= "mes_referencia";
						$fdata["Index"]= 3;
	
			
									$tdataRel__Centro_de_custo["Mes"]=$fdata;
	
//	Ano
	$fdata = array();
	$fdata["strName"] = "Ano";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Ano de referência"; 
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
		$fdata["FullName"]= "ano_referencia";
						$fdata["Index"]= 4;
	
			
									$tdataRel__Centro_de_custo["Ano"]=$fdata;
	
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
						$fdata["Index"]= 5;
	
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
		$fdata["FullName"]= "(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia) )";
						$fdata["Index"]= 6;
	
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
		$fdata["FullName"]= "round((sum(conta.custo)*100/(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia))), 2)";
						$fdata["Index"]= 7;
	
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
						$fdata["Index"]= 8;
	
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










$proto964=array();
$proto964["m_strHead"] = "SELECT";
$proto964["m_strFieldList"] = "round(sum(conta.duracao/60)) AS Minutos,  concat(mes_referencia,\"-\", ano_referencia) AS dt,  mes_referencia AS Mes,  ano_referencia AS Ano,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia) ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";
$proto964["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto964["m_strWhere"] = "";
$proto964["m_strOrderBy"] = "order by concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";
$proto964["m_strTail"] = "GROUP BY concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";
$proto965=array();
$proto965["m_sql"] = "";
$proto965["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto965["m_column"]=$obj;
$proto965["m_contained"] = array();
$proto965["m_strCase"] = "";
$proto965["m_havingmode"] = "0";
$proto965["m_inBrackets"] = "0";
$proto965["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto965);

$proto964["m_where"] = $obj;
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

$proto964["m_having"] = $obj;
$proto964["m_fieldlist"] = array();
						$proto969=array();
			$proto970=array();
$proto970["m_functiontype"] = "SQLF_CUSTOM";
$proto970["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.duracao/60)"
));

$proto970["m_arguments"][]=$obj;
$proto970["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto970);

$proto969["m_expr"]=$obj;
$proto969["m_alias"] = "Minutos";
$obj = new SQLFieldListItem($proto969);

$proto964["m_fieldlist"][]=$obj;
						$proto972=array();
			$proto973=array();
$proto973["m_functiontype"] = "SQLF_CUSTOM";
$proto973["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto973["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"-\""
));

$proto973["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto973["m_arguments"][]=$obj;
$proto973["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto973);

$proto972["m_expr"]=$obj;
$proto972["m_alias"] = "dt";
$obj = new SQLFieldListItem($proto972);

$proto964["m_fieldlist"][]=$obj;
						$proto977=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "conta"
));

$proto977["m_expr"]=$obj;
$proto977["m_alias"] = "Mes";
$obj = new SQLFieldListItem($proto977);

$proto964["m_fieldlist"][]=$obj;
						$proto979=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "conta"
));

$proto979["m_expr"]=$obj;
$proto979["m_alias"] = "Ano";
$obj = new SQLFieldListItem($proto979);

$proto964["m_fieldlist"][]=$obj;
						$proto981=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto981["m_expr"]=$obj;
$proto981["m_alias"] = "";
$obj = new SQLFieldListItem($proto981);

$proto964["m_fieldlist"][]=$obj;
						$proto983=array();
			$proto984=array();
$proto984["m_strHead"] = "select";
$proto984["m_strFieldList"] = "sum(custo)";
$proto984["m_strFrom"] = "from conta ct";
$proto984["m_strWhere"] = "concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia)";
$proto984["m_strOrderBy"] = "";
$proto984["m_strTail"] = "";
$proto985=array();
$proto985["m_sql"] = "concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia)";
$proto985["m_uniontype"] = "SQLL_UNKNOWN";
						$proto986=array();
$proto986["m_functiontype"] = "SQLF_CUSTOM";
$proto986["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "ct.mes_referencia"
));

$proto986["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"-\""
));

$proto986["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ct.ano_referencia"
));

$proto986["m_arguments"][]=$obj;
$proto986["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto986);

$proto985["m_column"]=$obj;
$proto985["m_contained"] = array();
$proto985["m_strCase"] = "= concat(conta.mes_referencia,\"-\", conta.ano_referencia)";
$proto985["m_havingmode"] = "0";
$proto985["m_inBrackets"] = "0";
$proto985["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto985);

$proto984["m_where"] = $obj;
$proto990=array();
$proto990["m_sql"] = "";
$proto990["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto990["m_column"]=$obj;
$proto990["m_contained"] = array();
$proto990["m_strCase"] = "";
$proto990["m_havingmode"] = "0";
$proto990["m_inBrackets"] = "0";
$proto990["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto990);

$proto984["m_having"] = $obj;
$proto984["m_fieldlist"] = array();
						$proto992=array();
			$proto993=array();
$proto993["m_functiontype"] = "SQLF_SUM";
$proto993["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "ct"
));

$proto993["m_arguments"][]=$obj;
$proto993["m_strFunctionName"] = "sum";
$obj = new SQLFunctionCall($proto993);

$proto992["m_expr"]=$obj;
$proto992["m_alias"] = "";
$obj = new SQLFieldListItem($proto992);

$proto984["m_fieldlist"][]=$obj;
$proto984["m_fromlist"] = array();
												$proto995=array();
$proto995["m_link"] = "SQLL_MAIN";
			$proto996=array();
$proto996["m_strName"] = "conta";
$proto996["m_columns"] = array();
$proto996["m_columns"][] = "id_conta";
$proto996["m_columns"][] = "idt_custo";
$proto996["m_columns"][] = "origem";
$proto996["m_columns"][] = "destino";
$proto996["m_columns"][] = "duracao";
$proto996["m_columns"][] = "custo";
$proto996["m_columns"][] = "calldate";
$proto996["m_columns"][] = "uniqueid";
$proto996["m_columns"][] = "id_interf";
$proto996["m_columns"][] = "id_contrato";
$proto996["m_columns"][] = "mes_referencia";
$proto996["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto996);

$proto995["m_table"] = $obj;
$proto995["m_alias"] = "ct";
$proto997=array();
$proto997["m_sql"] = "";
$proto997["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto997["m_column"]=$obj;
$proto997["m_contained"] = array();
$proto997["m_strCase"] = "";
$proto997["m_havingmode"] = "0";
$proto997["m_inBrackets"] = "0";
$proto997["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto997);

$proto995["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto995);

$proto984["m_fromlist"][]=$obj;
$proto984["m_groupby"] = array();
$proto984["m_orderby"] = array();
$obj = new SQLQuery($proto984);

$proto983["m_expr"]=$obj;
$proto983["m_alias"] = "\"Total MES\"";
$obj = new SQLFieldListItem($proto983);

$proto964["m_fieldlist"][]=$obj;
						$proto999=array();
			$proto1000=array();
$proto1000["m_functiontype"] = "SQLF_CUSTOM";
$proto1000["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "(sum(conta.custo)*100/(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia)))"
));

$proto1000["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto1000["m_arguments"][]=$obj;
$proto1000["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto1000);

$proto999["m_expr"]=$obj;
$proto999["m_alias"] = "\"Percentual\"";
$obj = new SQLFieldListItem($proto999);

$proto964["m_fieldlist"][]=$obj;
						$proto1003=array();
			$proto1004=array();
$proto1004["m_functiontype"] = "SQLF_CUSTOM";
$proto1004["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(conta.custo)"
));

$proto1004["m_arguments"][]=$obj;
$proto1004["m_strFunctionName"] = "round";
$obj = new SQLFunctionCall($proto1004);

$proto1003["m_expr"]=$obj;
$proto1003["m_alias"] = "custo";
$obj = new SQLFieldListItem($proto1003);

$proto964["m_fieldlist"][]=$obj;
$proto964["m_fromlist"] = array();
												$proto1006=array();
$proto1006["m_link"] = "SQLL_MAIN";
			$proto1007=array();
$proto1007["m_strName"] = "conta";
$proto1007["m_columns"] = array();
$proto1007["m_columns"][] = "id_conta";
$proto1007["m_columns"][] = "idt_custo";
$proto1007["m_columns"][] = "origem";
$proto1007["m_columns"][] = "destino";
$proto1007["m_columns"][] = "duracao";
$proto1007["m_columns"][] = "custo";
$proto1007["m_columns"][] = "calldate";
$proto1007["m_columns"][] = "uniqueid";
$proto1007["m_columns"][] = "id_interf";
$proto1007["m_columns"][] = "id_contrato";
$proto1007["m_columns"][] = "mes_referencia";
$proto1007["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto1007);

$proto1006["m_table"] = $obj;
$proto1006["m_alias"] = "";
$proto1008=array();
$proto1008["m_sql"] = "";
$proto1008["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1008["m_column"]=$obj;
$proto1008["m_contained"] = array();
$proto1008["m_strCase"] = "";
$proto1008["m_havingmode"] = "0";
$proto1008["m_inBrackets"] = "0";
$proto1008["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1008);

$proto1006["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1006);

$proto964["m_fromlist"][]=$obj;
												$proto1010=array();
$proto1010["m_link"] = "SQLL_INNERJOIN";
			$proto1011=array();
$proto1011["m_strName"] = "centrocusto";
$proto1011["m_columns"] = array();
$proto1011["m_columns"][] = "idt_custo";
$proto1011["m_columns"][] = "dsc_centro_cust";
$proto1011["m_columns"][] = "idt_colab";
$proto1011["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1011);

$proto1010["m_table"] = $obj;
$proto1010["m_alias"] = "";
$proto1012=array();
$proto1012["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1012["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1012["m_column"]=$obj;
$proto1012["m_contained"] = array();
$proto1012["m_strCase"] = "= centrocusto.idt_custo";
$proto1012["m_havingmode"] = "0";
$proto1012["m_inBrackets"] = "0";
$proto1012["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1012);

$proto1010["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1010);

$proto964["m_fromlist"][]=$obj;
$proto964["m_groupby"] = array();
												$proto1014=array();
						$proto1015=array();
$proto1015["m_functiontype"] = "SQLF_CUSTOM";
$proto1015["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto1015["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"-\""
));

$proto1015["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto1015["m_arguments"][]=$obj;
$proto1015["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1015);

$proto1014["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1014);

$proto964["m_groupby"][]=$obj;
												$proto1019=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1019["m_column"]=$obj;
$obj = new SQLGroupByItem($proto1019);

$proto964["m_groupby"][]=$obj;
$proto964["m_orderby"] = array();
												$proto1021=array();
						$proto1022=array();
$proto1022["m_functiontype"] = "SQLF_CUSTOM";
$proto1022["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "mes_referencia"
));

$proto1022["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"-\""
));

$proto1022["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ano_referencia"
));

$proto1022["m_arguments"][]=$obj;
$proto1022["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1022);

$proto1021["m_column"]=$obj;
$proto1021["m_bAsc"] = 1;
$proto1021["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1021);

$proto964["m_orderby"][]=$obj;					
												$proto1026=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1026["m_column"]=$obj;
$proto1026["m_bAsc"] = 1;
$proto1026["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1026);

$proto964["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto964);

$queryData_Rel__Centro_de_custo = $obj;
$tdataRel__Centro_de_custo[".sqlquery"] = $queryData_Rel__Centro_de_custo;



?>
