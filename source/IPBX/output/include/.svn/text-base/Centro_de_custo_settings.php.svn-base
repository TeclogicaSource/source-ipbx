<?php

//	field labels
$fieldLabelsCentro_de_custo = array();
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]=array();
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["Hora"] = "Hora";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["conta_calldate"] = "Data e Hora";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["origem"] = "Origem";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["destino"] = "Destino";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["Centro_de_custos"] = "Centro de custos";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["Duracao"] = "Duração";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["custo"] = "Custo";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["mes_referencia"] = "Mês Referência";
$fieldLabelsCentro_de_custo["Portuguese(Brazil)"]["ano_referencia"] = "Ano Referência";


$tdataCentro_de_custo=array();
	$tdataCentro_de_custo[".NumberOfChars"]=80; 
	$tdataCentro_de_custo[".ShortName"]="Centro_de_custo";
	$tdataCentro_de_custo[".OwnerID"]="";
	$tdataCentro_de_custo[".OriginalTable"]="conta";
	$tdataCentro_de_custo[".NCSearch"]=true;
	

$tdataCentro_de_custo[".shortTableName"] = "Centro_de_custo";
$tdataCentro_de_custo[".dataSourceTable"] = "Rel. Bilhetagem";
$tdataCentro_de_custo[".nSecOptions"] = 0;
$tdataCentro_de_custo[".nLoginMethod"] = 1;
$tdataCentro_de_custo[".recsPerRowList"] = 1;	
$tdataCentro_de_custo[".tableGroupBy"] = "0";
$tdataCentro_de_custo[".dbType"] = 0;
$tdataCentro_de_custo[".mainTableOwnerID"] = "";
$tdataCentro_de_custo[".moveNext"] = 1;

$tdataCentro_de_custo[".listAjax"] = true;

	$tdataCentro_de_custo[".audit"] = false;

	$tdataCentro_de_custo[".locking"] = false;
	
$tdataCentro_de_custo[".listIcons"] = true;

$tdataCentro_de_custo[".exportTo"] = true;

$tdataCentro_de_custo[".printFriendly"] = true;


$tdataCentro_de_custo[".showSimpleSearchOptions"] = false;

$tdataCentro_de_custo[".showSearchPanel"] = true;


$tdataCentro_de_custo[".isUseAjaxSuggest"] = true;


$tdataCentro_de_custo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataCentro_de_custo[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataCentro_de_custo[".isUseTimeForSearch"] = false;





$tdataCentro_de_custo[".isUseInlineJs"] = $tdataCentro_de_custo[".isUseInlineAdd"] || $tdataCentro_de_custo[".isUseInlineEdit"];

$tdataCentro_de_custo[".allSearchFields"] = array();

$tdataCentro_de_custo[".globSearchFields"][] = "origem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("origem", $tdataCentro_de_custo[".allSearchFields"]))
{
	$tdataCentro_de_custo[".allSearchFields"][] = "origem";	
}
$tdataCentro_de_custo[".globSearchFields"][] = "Centro de custos";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Centro de custos", $tdataCentro_de_custo[".allSearchFields"]))
{
	$tdataCentro_de_custo[".allSearchFields"][] = "Centro de custos";	
}
$tdataCentro_de_custo[".globSearchFields"][] = "mes_referencia";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("mes_referencia", $tdataCentro_de_custo[".allSearchFields"]))
{
	$tdataCentro_de_custo[".allSearchFields"][] = "mes_referencia";	
}
$tdataCentro_de_custo[".globSearchFields"][] = "ano_referencia";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ano_referencia", $tdataCentro_de_custo[".allSearchFields"]))
{
	$tdataCentro_de_custo[".allSearchFields"][] = "ano_referencia";	
}

$tdataCentro_de_custo[".panelSearchFields"][] = "origem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("origem", $tdataCentro_de_custo[".allSearchFields"])) 
{
	$tdataCentro_de_custo[".allSearchFields"][] = "origem";	
}

$tdataCentro_de_custo[".isDynamicPerm"] = true;

	

$tdataCentro_de_custo[".isDisplayLoading"] = true;

$tdataCentro_de_custo[".isResizeColumns"] = false;


$tdataCentro_de_custo[".createLoginPage"] = true;


 	

$tdataCentro_de_custo[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY conta.calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataCentro_de_custo[".strOrderBy"] = $gstrOrderBy;
	
$tdataCentro_de_custo[".orderindexes"] = array();
$tdataCentro_de_custo[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "conta.calldate");

$tdataCentro_de_custo[".sqlHead"] = "select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  DATE_FORMAT(calldate ,'%T') AS Hora,  conta.calldate AS `conta.calldate`,  substr(conta.origem, -4) AS origem,  case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end AS destino,  centrocusto.dsc_centro_cust AS `Centro de custos`,  SEC_TO_TIME(conta.duracao) AS Duracao,  conta.custo,  conta.mes_referencia,  conta.ano_referencia";

$tdataCentro_de_custo[".sqlFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";

$tdataCentro_de_custo[".sqlWhereExpr"] = "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";

$tdataCentro_de_custo[".sqlTail"] = "";



	$tableKeys=array();
	$tdataCentro_de_custo[".Keys"]=$tableKeys;

	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d'))";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
									$tdataCentro_de_custo["Data"]=$fdata;
	
//	Hora
	$fdata = array();
	$fdata["strName"] = "Hora";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora";
		$fdata["FullName"]= "DATE_FORMAT(calldate ,'%T')";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataCentro_de_custo["Hora"]=$fdata;
	
//	conta.calldate
	$fdata = array();
	$fdata["strName"] = "conta.calldate";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Data e Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "conta_calldate";
		$fdata["FullName"]= "conta.calldate";
						$fdata["Index"]= 3;
	 $fdata["DateEditType"]=11; 
			
				$fdata["FieldPermissions"]=true;
						$tdataCentro_de_custo["conta.calldate"]=$fdata;
	
//	origem
	$fdata = array();
	$fdata["strName"] = "origem";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "origem";
		$fdata["FullName"]= "substr(conta.origem, -4)";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataCentro_de_custo["origem"]=$fdata;
	
//	destino
	$fdata = array();
	$fdata["strName"] = "destino";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "destino";
		$fdata["FullName"]= "case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataCentro_de_custo["destino"]=$fdata;
	
//	Centro de custos
	$fdata = array();
	$fdata["strName"] = "Centro de custos";
	$fdata["ownerTable"] = "centrocusto";
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
	$fdata["LookupOrderBy"]="idt_custo";
							$fdata["LookupWhere"] = 'flg_ativado = 1';

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Centro_de_custos";
		$fdata["FullName"]= "centrocusto.dsc_centro_cust";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataCentro_de_custo["Centro de custos"]=$fdata;
	
//	Duracao
	$fdata = array();
	$fdata["strName"] = "Duracao";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Duração"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Duracao";
		$fdata["FullName"]= "SEC_TO_TIME(conta.duracao)";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataCentro_de_custo["Duracao"]=$fdata;
	
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
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataCentro_de_custo["custo"]=$fdata;
	
//	mes_referencia
	$fdata = array();
	$fdata["strName"] = "mes_referencia";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Mês Referência"; 
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
	
	$fdata["GoodName"]= "mes_referencia";
		$fdata["FullName"]= "conta.mes_referencia";
						$fdata["Index"]= 9;
	
			
									$tdataCentro_de_custo["mes_referencia"]=$fdata;
	
//	ano_referencia
	$fdata = array();
	$fdata["strName"] = "ano_referencia";
	$fdata["ownerTable"] = "conta";
		$fdata["Label"]="Ano Referência"; 
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
	
	$fdata["GoodName"]= "ano_referencia";
		$fdata["FullName"]= "conta.ano_referencia";
						$fdata["Index"]= 10;
	
			
									$tdataCentro_de_custo["ano_referencia"]=$fdata;

	
$tables_data["Rel. Bilhetagem"]=&$tdataCentro_de_custo;
$field_labels["Rel__Bilhetagem"] = &$fieldLabelsCentro_de_custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Bilhetagem"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Bilhetagem"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1355=array();
$proto1355["m_strHead"] = "select";
$proto1355["m_strFieldList"] = "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  DATE_FORMAT(calldate ,'%T') AS Hora,  conta.calldate AS `conta.calldate`,  substr(conta.origem, -4) AS origem,  case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end AS destino,  centrocusto.dsc_centro_cust AS `Centro de custos`,  SEC_TO_TIME(conta.duracao) AS Duracao,  conta.custo,  conta.mes_referencia,  conta.ano_referencia";
$proto1355["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto1355["m_strWhere"] = "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";
$proto1355["m_strOrderBy"] = "ORDER BY conta.calldate";
$proto1355["m_strTail"] = "";
$proto1356=array();
$proto1356["m_sql"] = "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";
$proto1356["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)"
));

$proto1356["m_column"]=$obj;
$proto1356["m_contained"] = array();
						$proto1358=array();
$proto1358["m_sql"] = "conta.origem <> \"\"";
$proto1358["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "conta"
));

$proto1358["m_column"]=$obj;
$proto1358["m_contained"] = array();
$proto1358["m_strCase"] = "<> \"\"";
$proto1358["m_havingmode"] = "0";
$proto1358["m_inBrackets"] = "1";
$proto1358["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1358);

			$proto1356["m_contained"][]=$obj;
						$proto1360=array();
$proto1360["m_sql"] = "conta.idt_custo is not NULL";
$proto1360["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1360["m_column"]=$obj;
$proto1360["m_contained"] = array();
$proto1360["m_strCase"] = "is not NULL";
$proto1360["m_havingmode"] = "0";
$proto1360["m_inBrackets"] = "1";
$proto1360["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1360);

			$proto1356["m_contained"][]=$obj;
$proto1356["m_strCase"] = "";
$proto1356["m_havingmode"] = "0";
$proto1356["m_inBrackets"] = "0";
$proto1356["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1356);

$proto1355["m_where"] = $obj;
$proto1362=array();
$proto1362["m_sql"] = "";
$proto1362["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1362["m_column"]=$obj;
$proto1362["m_contained"] = array();
$proto1362["m_strCase"] = "";
$proto1362["m_havingmode"] = "0";
$proto1362["m_inBrackets"] = "0";
$proto1362["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1362);

$proto1355["m_having"] = $obj;
$proto1355["m_fieldlist"] = array();
						$proto1364=array();
			$proto1365=array();
$proto1365["m_functiontype"] = "SQLF_CUSTOM";
$proto1365["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto1365["m_arguments"][]=$obj;
$proto1365["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1365);

$proto1364["m_expr"]=$obj;
$proto1364["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto1364);

$proto1355["m_fieldlist"][]=$obj;
						$proto1367=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%T')"
));

$proto1367["m_expr"]=$obj;
$proto1367["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto1367);

$proto1355["m_fieldlist"][]=$obj;
						$proto1369=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1369["m_expr"]=$obj;
$proto1369["m_alias"] = "conta.calldate";
$obj = new SQLFieldListItem($proto1369);

$proto1355["m_fieldlist"][]=$obj;
						$proto1371=array();
			$proto1372=array();
$proto1372["m_functiontype"] = "SQLF_CUSTOM";
$proto1372["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "conta.origem"
));

$proto1372["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1372["m_arguments"][]=$obj;
$proto1372["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1372);

$proto1371["m_expr"]=$obj;
$proto1371["m_alias"] = "origem";
$obj = new SQLFieldListItem($proto1371);

$proto1355["m_fieldlist"][]=$obj;
						$proto1375=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end"
));

$proto1375["m_expr"]=$obj;
$proto1375["m_alias"] = "destino";
$obj = new SQLFieldListItem($proto1375);

$proto1355["m_fieldlist"][]=$obj;
						$proto1377=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1377["m_expr"]=$obj;
$proto1377["m_alias"] = "Centro de custos";
$obj = new SQLFieldListItem($proto1377);

$proto1355["m_fieldlist"][]=$obj;
						$proto1379=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(conta.duracao)"
));

$proto1379["m_expr"]=$obj;
$proto1379["m_alias"] = "Duracao";
$obj = new SQLFieldListItem($proto1379);

$proto1355["m_fieldlist"][]=$obj;
						$proto1381=array();
			$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "conta"
));

$proto1381["m_expr"]=$obj;
$proto1381["m_alias"] = "";
$obj = new SQLFieldListItem($proto1381);

$proto1355["m_fieldlist"][]=$obj;
						$proto1383=array();
			$obj = new SQLField(array(
	"m_strName" => "mes_referencia",
	"m_strTable" => "conta"
));

$proto1383["m_expr"]=$obj;
$proto1383["m_alias"] = "";
$obj = new SQLFieldListItem($proto1383);

$proto1355["m_fieldlist"][]=$obj;
						$proto1385=array();
			$obj = new SQLField(array(
	"m_strName" => "ano_referencia",
	"m_strTable" => "conta"
));

$proto1385["m_expr"]=$obj;
$proto1385["m_alias"] = "";
$obj = new SQLFieldListItem($proto1385);

$proto1355["m_fieldlist"][]=$obj;
$proto1355["m_fromlist"] = array();
												$proto1387=array();
$proto1387["m_link"] = "SQLL_MAIN";
			$proto1388=array();
$proto1388["m_strName"] = "conta";
$proto1388["m_columns"] = array();
$proto1388["m_columns"][] = "id_conta";
$proto1388["m_columns"][] = "idt_custo";
$proto1388["m_columns"][] = "origem";
$proto1388["m_columns"][] = "destino";
$proto1388["m_columns"][] = "duracao";
$proto1388["m_columns"][] = "custo";
$proto1388["m_columns"][] = "calldate";
$proto1388["m_columns"][] = "uniqueid";
$proto1388["m_columns"][] = "id_interf";
$proto1388["m_columns"][] = "id_contrato";
$proto1388["m_columns"][] = "mes_referencia";
$proto1388["m_columns"][] = "ano_referencia";
$obj = new SQLTable($proto1388);

$proto1387["m_table"] = $obj;
$proto1387["m_alias"] = "";
$proto1389=array();
$proto1389["m_sql"] = "";
$proto1389["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1389["m_column"]=$obj;
$proto1389["m_contained"] = array();
$proto1389["m_strCase"] = "";
$proto1389["m_havingmode"] = "0";
$proto1389["m_inBrackets"] = "0";
$proto1389["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1389);

$proto1387["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1387);

$proto1355["m_fromlist"][]=$obj;
												$proto1391=array();
$proto1391["m_link"] = "SQLL_INNERJOIN";
			$proto1392=array();
$proto1392["m_strName"] = "centrocusto";
$proto1392["m_columns"] = array();
$proto1392["m_columns"][] = "idt_custo";
$proto1392["m_columns"][] = "dsc_centro_cust";
$proto1392["m_columns"][] = "idt_colab";
$proto1392["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1392);

$proto1391["m_table"] = $obj;
$proto1391["m_alias"] = "";
$proto1393=array();
$proto1393["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1393["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1393["m_column"]=$obj;
$proto1393["m_contained"] = array();
$proto1393["m_strCase"] = "= centrocusto.idt_custo";
$proto1393["m_havingmode"] = "0";
$proto1393["m_inBrackets"] = "0";
$proto1393["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1393);

$proto1391["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1391);

$proto1355["m_fromlist"][]=$obj;
$proto1355["m_groupby"] = array();
$proto1355["m_orderby"] = array();
												$proto1395=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1395["m_column"]=$obj;
$proto1395["m_bAsc"] = 1;
$proto1395["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1395);

$proto1355["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1355);

$queryData_Centro_de_custo = $obj;
$tdataCentro_de_custo[".sqlquery"] = $queryData_Centro_de_custo;



?>
