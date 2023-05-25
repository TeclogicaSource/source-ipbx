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

$tdataDiscadas___Centro_de_custo[".sqlHead"] = "SELECT conta.idt_custo,  substr(conta.origem,-4) as Origem,  conta.destino,  SEC_TO_TIME(conta.duracao) AS duracao,  conta.custo,  centrocusto.dsc_centro_cust,  ipbx_interf.dsc_interf,  conta.calldate";

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
		$fdata["FullName"]= "substr(conta.origem,-4)";
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










$proto1120=array();
$proto1120["m_strHead"] = "SELECT";
$proto1120["m_strFieldList"] = "conta.idt_custo,  substr(conta.origem,-4) as Origem,  conta.destino,  SEC_TO_TIME(conta.duracao) AS duracao,  conta.custo,  centrocusto.dsc_centro_cust,  ipbx_interf.dsc_interf,  conta.calldate";
$proto1120["m_strFrom"] = "FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$proto1120["m_strWhere"] = "";
$proto1120["m_strOrderBy"] = "ORDER BY conta.calldate DESC, centrocusto.dsc_centro_cust";
$proto1120["m_strTail"] = "";
$proto1121=array();
$proto1121["m_sql"] = "";
$proto1121["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1121["m_column"]=$obj;
$proto1121["m_contained"] = array();
$proto1121["m_strCase"] = "";
$proto1121["m_havingmode"] = "0";
$proto1121["m_inBrackets"] = "0";
$proto1121["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1121);

$proto1120["m_where"] = $obj;
$proto1123=array();
$proto1123["m_sql"] = "";
$proto1123["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1123["m_column"]=$obj;
$proto1123["m_contained"] = array();
$proto1123["m_strCase"] = "";
$proto1123["m_havingmode"] = "0";
$proto1123["m_inBrackets"] = "0";
$proto1123["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1123);

$proto1120["m_having"] = $obj;
$proto1120["m_fieldlist"] = array();
						$proto1125=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1125["m_expr"]=$obj;
$proto1125["m_alias"] = "";
$obj = new SQLFieldListItem($proto1125);

$proto1120["m_fieldlist"][]=$obj;
						$proto1127=array();
			$proto1128=array();
$proto1128["m_functiontype"] = "SQLF_CUSTOM";
$proto1128["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "conta.origem"
));

$proto1128["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1128["m_arguments"][]=$obj;
$proto1128["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1128);

$proto1127["m_expr"]=$obj;
$proto1127["m_alias"] = "Origem";
$obj = new SQLFieldListItem($proto1127);

$proto1120["m_fieldlist"][]=$obj;
						$proto1131=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "conta"
));

$proto1131["m_expr"]=$obj;
$proto1131["m_alias"] = "";
$obj = new SQLFieldListItem($proto1131);

$proto1120["m_fieldlist"][]=$obj;
						$proto1133=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(conta.duracao)"
));

$proto1133["m_expr"]=$obj;
$proto1133["m_alias"] = "duracao";
$obj = new SQLFieldListItem($proto1133);

$proto1120["m_fieldlist"][]=$obj;
						$proto1135=array();
			$obj = new SQLField(array(
	"m_strName" => "custo",
	"m_strTable" => "conta"
));

$proto1135["m_expr"]=$obj;
$proto1135["m_alias"] = "";
$obj = new SQLFieldListItem($proto1135);

$proto1120["m_fieldlist"][]=$obj;
						$proto1137=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1137["m_expr"]=$obj;
$proto1137["m_alias"] = "";
$obj = new SQLFieldListItem($proto1137);

$proto1120["m_fieldlist"][]=$obj;
						$proto1139=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf"
));

$proto1139["m_expr"]=$obj;
$proto1139["m_alias"] = "";
$obj = new SQLFieldListItem($proto1139);

$proto1120["m_fieldlist"][]=$obj;
						$proto1141=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1141["m_expr"]=$obj;
$proto1141["m_alias"] = "";
$obj = new SQLFieldListItem($proto1141);

$proto1120["m_fieldlist"][]=$obj;
$proto1120["m_fromlist"] = array();
												$proto1143=array();
$proto1143["m_link"] = "SQLL_MAIN";
			$proto1144=array();
$proto1144["m_strName"] = "conta";
$proto1144["m_columns"] = array();
$proto1144["m_columns"][] = "id_conta";
$proto1144["m_columns"][] = "idt_custo";
$proto1144["m_columns"][] = "origem";
$proto1144["m_columns"][] = "destino";
$proto1144["m_columns"][] = "duracao";
$proto1144["m_columns"][] = "custo";
$proto1144["m_columns"][] = "calldate";
$proto1144["m_columns"][] = "uniqueid";
$proto1144["m_columns"][] = "id_interf";
$proto1144["m_columns"][] = "id_contrato";
$obj = new SQLTable($proto1144);

$proto1143["m_table"] = $obj;
$proto1143["m_alias"] = "";
$proto1145=array();
$proto1145["m_sql"] = "";
$proto1145["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1145["m_column"]=$obj;
$proto1145["m_contained"] = array();
$proto1145["m_strCase"] = "";
$proto1145["m_havingmode"] = "0";
$proto1145["m_inBrackets"] = "0";
$proto1145["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1145);

$proto1143["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1143);

$proto1120["m_fromlist"][]=$obj;
												$proto1147=array();
$proto1147["m_link"] = "SQLL_INNERJOIN";
			$proto1148=array();
$proto1148["m_strName"] = "centrocusto";
$proto1148["m_columns"] = array();
$proto1148["m_columns"][] = "idt_custo";
$proto1148["m_columns"][] = "dsc_centro_cust";
$proto1148["m_columns"][] = "idt_colab";
$proto1148["m_columns"][] = "flg_ativado";
$obj = new SQLTable($proto1148);

$proto1147["m_table"] = $obj;
$proto1147["m_alias"] = "";
$proto1149=array();
$proto1149["m_sql"] = "conta.idt_custo = centrocusto.idt_custo";
$proto1149["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "conta"
));

$proto1149["m_column"]=$obj;
$proto1149["m_contained"] = array();
$proto1149["m_strCase"] = "= centrocusto.idt_custo";
$proto1149["m_havingmode"] = "0";
$proto1149["m_inBrackets"] = "0";
$proto1149["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1149);

$proto1147["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1147);

$proto1120["m_fromlist"][]=$obj;
												$proto1151=array();
$proto1151["m_link"] = "SQLL_INNERJOIN";
			$proto1152=array();
$proto1152["m_strName"] = "ipbx_interf";
$proto1152["m_columns"] = array();
$proto1152["m_columns"][] = "id_interf";
$proto1152["m_columns"][] = "dsc_interf";
$proto1152["m_columns"][] = "id_contrato";
$proto1152["m_columns"][] = "board";
$proto1152["m_columns"][] = "link";
$proto1152["m_columns"][] = "usuario";
$proto1152["m_columns"][] = "senha";
$proto1152["m_columns"][] = "ip_host";
$proto1152["m_columns"][] = "id_central";
$proto1152["m_columns"][] = "codec";
$proto1152["m_columns"][] = "id_tp_interf";
$proto1152["m_columns"][] = "tp_chamada";
$proto1152["m_columns"][] = "piloto";
$proto1152["m_columns"][] = "id_chamada";
$proto1152["m_columns"][] = "flg_id_cham_parc";
$proto1152["m_columns"][] = "dtmf";
$proto1152["m_columns"][] = "ddd_localidade";
$proto1152["m_columns"][] = "cd_operadora";
$proto1152["m_columns"][] = "khomp_interf";
$proto1152["m_columns"][] = "flg_logon_remoto";
$proto1152["m_columns"][] = "pers_params";
$proto1152["m_columns"][] = "registro";
$obj = new SQLTable($proto1152);

$proto1151["m_table"] = $obj;
$proto1151["m_alias"] = "";
$proto1153=array();
$proto1153["m_sql"] = "conta.id_interf = ipbx_interf.id_interf";
$proto1153["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "conta"
));

$proto1153["m_column"]=$obj;
$proto1153["m_contained"] = array();
$proto1153["m_strCase"] = "= ipbx_interf.id_interf";
$proto1153["m_havingmode"] = "0";
$proto1153["m_inBrackets"] = "0";
$proto1153["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1153);

$proto1151["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1151);

$proto1120["m_fromlist"][]=$obj;
$proto1120["m_groupby"] = array();
$proto1120["m_orderby"] = array();
												$proto1155=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "conta"
));

$proto1155["m_column"]=$obj;
$proto1155["m_bAsc"] = 0;
$proto1155["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1155);

$proto1120["m_orderby"][]=$obj;					
												$proto1157=array();
						$obj = new SQLField(array(
	"m_strName" => "dsc_centro_cust",
	"m_strTable" => "centrocusto"
));

$proto1157["m_column"]=$obj;
$proto1157["m_bAsc"] = 1;
$proto1157["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1157);

$proto1120["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1120);

$queryData_Discadas___Centro_de_custo = $obj;
$tdataDiscadas___Centro_de_custo[".sqlquery"] = $queryData_Discadas___Centro_de_custo;



?>
