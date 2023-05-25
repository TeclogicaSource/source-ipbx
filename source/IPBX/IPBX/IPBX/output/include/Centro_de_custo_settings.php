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

$tdataCentro_de_custo[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataCentro_de_custo[".allSearchFields"]))
{
	$tdataCentro_de_custo[".allSearchFields"][] = "Data";	
}
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

$tdataCentro_de_custo[".sqlHead"] = "select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  DATE_FORMAT(calldate ,'%T') AS Hora,  conta.calldate AS `conta.calldate`,  substr(conta.origem, -4) as origem,  case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end AS destino,  centrocusto.dsc_centro_cust AS `Centro de custos`,  SEC_TO_TIME(conta.duracao) AS Duracao,  conta.custo";

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
			
				$fdata["FieldPermissions"]=true;
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
			
				$fdata["FieldPermissions"]=true;
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

	
$tables_data["Rel. Bilhetagem"]=&$tdataCentro_de_custo;
$field_labels["Rel__Bilhetagem"] = &$fieldLabelsCentro_de_custo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Bilhetagem"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Bilhetagem"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1159=array();
$proto1159["m_strHead"] = "select";
$proto1159["m_strFieldList"] = "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  DATE_FORMAT(calldate ,'%T') AS Hora,  conta.calldate AS `conta.calldate`,  substr(conta.origem, -4) as origem,  case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end AS destino,  centrocusto.dsc_centro_cust AS `Centro de custos`,  SEC_TO_TIME(conta.duracao) AS Duracao,  conta.custo";
$proto1159["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$proto1159["m_strWhere"] = "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";
$proto1159["m_strOrderBy"] = "ORDER BY conta.calldate";
$proto1159["m_strTail"] = "";
$proto1160=array();
$proto1160["m_sql"] = "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";
$proto1160["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(conta.origem <> \"\") AND (conta.idt_custo is not NULL)"
));

$proto1160["m_column"]=$obj;
$proto1160["m_contained"] = array();
						$proto1162=array();
$proto1162["m_sql"] = "conta.origem <> \"\"";
$proto1162["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "origem",
	"m_strTable" => "conta"
));

$proto1162["m_column"]=$obj;
$proto1162["m_contained"] = array();
$proto1162["m_strCase"] = "<> \"\"";
$proto1162["m_havingmode"] = "0";
$proto1162["m_inBrackets"] = "1";
$proto1162["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1162);

			$proto1160["m_contained"][]=$obj;
						$proto1164=array();
$proto1164["m_sql"] = "conta.idt_custo is not NULL";
$proto1164["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1164["m_column"]=$obj;
$proto1164["m_contained"] = array();
$proto1164["m_strCase"] = "is not NULL";
$proto1164["m_havingmode"] = "0";
$proto1164["m_inBrackets"] = "1";
$proto1164["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1164);

			$proto1160["m_contained"][]=$obj;
$proto1160["m_strCase"] = "";
$proto1160["m_havingmode"] = "0";
$proto1160["m_inBrackets"] = "0";
$proto1160["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1160);

$proto1159["m_where"] = $obj;
$proto1166=array();
$proto1166["m_sql"] = "";
$proto1166["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1166["m_column"]=$obj;
$proto1166["m_contained"] = array();
$proto1166["m_strCase"] = "";
$proto1166["m_havingmode"] = "0";
$proto1166["m_inBrackets"] = "0";
$proto1166["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1166);

$proto1159["m_having"] = $obj;
$proto1159["m_fieldlist"] = array();
						$proto1168=array();
			$proto1169=array();
$proto1169["m_functiontype"] = "SQLF_CUSTOM";
$proto1169["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto1169["m_arguments"][]=$obj;
$proto1169["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1169);

$proto1168["m_expr"]=$obj;
$proto1168["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto1168);

$proto1159["m_fieldlist"][]=$obj;
						$proto1171=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%T')"
));

$proto1171["m_expr"]=$obj;
$proto1171["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto1171);

$proto1159["m_fieldlist"][]=$obj;
						$proto1173=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1173["m_expr"]=$obj;
$proto1173["m_alias"] = "conta.calldate";
$obj = new SQLFieldListItem($proto1173);

$proto1159["m_fieldlist"][]=$obj;
						$proto1175=array();
			$proto1176=array();
$proto1176["m_functiontype"] = "SQLF_CUSTOM";
$proto1176["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "conta.origem"
));

$proto1176["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1176["m_arguments"][]=$obj;
$proto1176["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1176);

$proto1175["m_expr"]=$obj;
$proto1175["m_alias"] = "origem";
$obj = new SQLFieldListItem($proto1175);

$proto1159["m_fieldlist"][]=$obj;
						$proto1179=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end"
));

$proto1179["m_expr"]=$obj;
$proto1179["m_alias"] = "destino";
$obj = new SQLFieldListItem($proto1179);

$proto1159["m_fieldlist"][]=$obj;
						$proto1181=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1181["m_expr"]=$obj;
$proto1181["m_alias"] = "Centro de custos";
$obj = new SQLFieldListItem($proto1181);

$proto1159["m_fieldlist"][]=$obj;
						$proto1183=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(conta.duracao)"
));

$proto1183["m_expr"]=$obj;
$proto1183["m_alias"] = "Duracao";
$obj = new SQLFieldListItem($proto1183);

$proto1159["m_fieldlist"][]=$obj;
						$proto1185=array();
			$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "conta"
));

$proto1185["m_expr"]=$obj;
$proto1185["m_alias"] = "";
$obj = new SQLFieldListItem($proto1185);

$proto1159["m_fieldlist"][]=$obj;
$proto1159["m_fromlist"] = array();
												$proto1187=array();
$proto1187["m_link"] = "SQLL_MAIN";
			$proto1188=array();
$proto1188["m_strName"] = "conta";
$proto1188["m_columns"] = array();
$proto1188["m_columns"][] = "id_conta";
$proto1188["m_columns"][] = "idt_custo";
$proto1188["m_columns"][] = "origem";
$proto1188["m_columns"][] = "destino";
$proto1188["m_columns"][] = "duracao";
$proto1188["m_columns"][] = "custo";
$proto1188["m_columns"][] = "calldate";
$proto1188["m_columns"][] = "uniqueid";
$proto1188["m_columns"][] = "id_interf";
$proto1188["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto1188);

$proto1187["m_table"] = $obj;
$proto1187["m_alias"] = "";
$proto1189=array();
$proto1189["m_sql"] = "";
$proto1189["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1189["m_column"]=$obj;
$proto1189["m_contained"] = array();
$proto1189["m_strCase"] = "";
$proto1189["m_havingmode"] = "0";
$proto1189["m_inBrackets"] = "0";
$proto1189["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1189);

$proto1187["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1187);

$proto1159["m_fromlist"][]=$obj;
												$proto1191=array();
$proto1191["m_link"] = "SQLL_INNERJOIN";
			$proto1192=array();
$proto1192["m_strName"] = "centrocusto";
$proto1192["m_columns"] = array();
$proto1192["m_columns"][] = "idt_custo";
$proto1192["m_columns"][] = "dsc_centro_cust";
$proto1192["m_columns"][] = "idt_colab";
$proto1192["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1192);

$proto1191["m_table"] = $obj;
$proto1191["m_alias"] = "";
$proto1193=array();
$proto1193["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1193["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1193["m_column"]=$obj;
$proto1193["m_contained"] = array();
$proto1193["m_strCase"] = "= centrocusto.idt_custo";
$proto1193["m_havingmode"] = "0";
$proto1193["m_inBrackets"] = "0";
$proto1193["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1193);

$proto1191["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1191);

$proto1159["m_fromlist"][]=$obj;
$proto1159["m_groupby"] = array();
$proto1159["m_orderby"] = array();
												$proto1195=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1195["m_column"]=$obj;
$proto1195["m_bAsc"] = 1;
$proto1195["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1195);

$proto1159["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1159);

$queryData_Centro_de_custo = $obj;
$tdataCentro_de_custo[".sqlquery"] = $queryData_Centro_de_custo;



?>
