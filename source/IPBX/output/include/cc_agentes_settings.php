<?php

//	field labels
$fieldLabelscc_agentes = array();
$fieldLabelscc_agentes["Portuguese(Brazil)"]=array();
$fieldLabelscc_agentes["Portuguese(Brazil)"]["idt_agentes"] = "Identificação";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["nm_agente"] = "Nome de Agente ";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["tp_atendimento"] = "Tempo de trabalho diário (em minutos)";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["tp_max_atendimento"] = "Tempo máximo corrido de atendimento";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["acao_atendimento"] = "Acao Atendimento";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["interface"] = "Interface";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["codigo"] = "Codigo";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["idt_agentes_fila"] = "Filas";
$fieldLabelscc_agentes["Portuguese(Brazil)"]["flg_ativo"] = "Ativar Agente";


$tdatacc_agentes=array();
	$tdatacc_agentes[".NumberOfChars"]=80; 
	$tdatacc_agentes[".ShortName"]="cc_agentes";
	$tdatacc_agentes[".OwnerID"]="";
	$tdatacc_agentes[".OriginalTable"]="cc_agentes";
	$tdatacc_agentes[".NCSearch"]=true;
	

$tdatacc_agentes[".shortTableName"] = "cc_agentes";
$tdatacc_agentes[".dataSourceTable"] = "cc_agentes";
$tdatacc_agentes[".nSecOptions"] = 0;
$tdatacc_agentes[".nLoginMethod"] = 1;
$tdatacc_agentes[".recsPerRowList"] = 1;	
$tdatacc_agentes[".tableGroupBy"] = "0";
$tdatacc_agentes[".dbType"] = 0;
$tdatacc_agentes[".mainTableOwnerID"] = "";
$tdatacc_agentes[".moveNext"] = 1;

$tdatacc_agentes[".listAjax"] = false;

	$tdatacc_agentes[".audit"] = true;

	$tdatacc_agentes[".locking"] = false;
	
$tdatacc_agentes[".listIcons"] = true;
$tdatacc_agentes[".edit"] = true;



$tdatacc_agentes[".delete"] = true;

$tdatacc_agentes[".showSimpleSearchOptions"] = false;

$tdatacc_agentes[".showSearchPanel"] = true;


$tdatacc_agentes[".isUseAjaxSuggest"] = true;

$tdatacc_agentes[".rowHighlite"] = true;

$tdatacc_agentes[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_agentes[".arrKeyFields"][] = "idt_agentes";

// use datepicker for search panel
$tdatacc_agentes[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacc_agentes[".isUseTimeForSearch"] = false;




$tdatacc_agentes[".useDetailsPreview"] = true;	


$tdatacc_agentes[".isUseInlineJs"] = $tdatacc_agentes[".isUseInlineAdd"] || $tdatacc_agentes[".isUseInlineEdit"];

$tdatacc_agentes[".allSearchFields"] = array();



$tdatacc_agentes[".isDynamicPerm"] = true;

	

$tdatacc_agentes[".isDisplayLoading"] = true;

$tdatacc_agentes[".isResizeColumns"] = false;


$tdatacc_agentes[".createLoginPage"] = true;


 	
	$tdatacc_agentes[".subQueriesSupAccess"] = true;




$tdatacc_agentes[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_agentes[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_agentes[".orderindexes"] = array();

$tdatacc_agentes[".sqlHead"] = "SELECT idt_agentes,   nm_agente,   codigo,   tp_atendimento,   tp_max_atendimento,   acao_atendimento,   idt_agentes_fila,   name,   `interface`,   flg_ativo";

$tdatacc_agentes[".sqlFrom"] = "FROM cc_agentes";

$tdatacc_agentes[".sqlWhereExpr"] = "";

$tdatacc_agentes[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_agentes";
	$tdatacc_agentes[".Keys"]=$tableKeys;

	
//	idt_agentes
	$fdata = array();
	$fdata["strName"] = "idt_agentes";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agentes";
		$fdata["FullName"]= "idt_agentes";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes["idt_agentes"]=$fdata;
	
//	nm_agente
	$fdata = array();
	$fdata["strName"] = "nm_agente";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Nome de Agente "; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_agente";
		$fdata["FullName"]= "nm_agente";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=40";
			$fdata["EditParams"].= " size=40";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_agentes["nm_agente"]=$fdata;
	
//	codigo
	$fdata = array();
	$fdata["strName"] = "codigo";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Codigo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codigo";
		$fdata["FullName"]= "codigo";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes["codigo"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Tempo de trabalho diário (em minutos)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_atendimento";
		$fdata["FullName"]= "tp_atendimento";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_agentes["tp_atendimento"]=$fdata;
	
//	tp_max_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_max_atendimento";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Tempo máximo corrido de atendimento"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_max_atendimento";
		$fdata["FullName"]= "tp_max_atendimento";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes["tp_max_atendimento"]=$fdata;
	
//	acao_atendimento
	$fdata = array();
	$fdata["strName"] = "acao_atendimento";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Acao Atendimento"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "acao_atendimento";
		$fdata["FullName"]= "acao_atendimento";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=10";
		
											$tdatacc_agentes["acao_atendimento"]=$fdata;
	
//	idt_agentes_fila
	$fdata = array();
	$fdata["strName"] = "idt_agentes_fila";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Filas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_agentes_fila";
		$fdata["FullName"]= "idt_agentes_fila";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
											$tdatacc_agentes["idt_agentes_fila"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Ramal"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,'-',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="callerid";
							$fdata["LookupWhere"] = "callerid != ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 8;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_agentes["name"]=$fdata;
	
//	interface
	$fdata = array();
	$fdata["strName"] = "interface";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Interface"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "interface";
		$fdata["FullName"]= "`interface`";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		
											$tdatacc_agentes["interface"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "cc_agentes";
		$fdata["Label"]="Ativar Agente"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
						$fdata["Index"]= 10;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacc_agentes["flg_ativo"]=$fdata;

	
$tables_data["cc_agentes"]=&$tdatacc_agentes;
$field_labels["cc_agentes"] = &$fieldLabelscc_agentes;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_agentes"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="cc_agentes_fila";
	$detailsTablesData["cc_agentes"][$dIndex] = array(
		  "dDataSourceTable"=>"cc_agentes_fila"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"cc_agentes_fila"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT idt_agentes_fila,   idt_agentes,   id_filas,   penalidade,   flg_req_aux"	
		, "sqlFrom"=>"FROM cc_agentes_fila"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["cc_agentes"][$dIndex]["masterKeys"][]="idt_agentes";
		$detailsTablesData["cc_agentes"][$dIndex]["detailKeys"][]="idt_agentes";


	
// tables which are master tables for current table (detail)
$masterTablesData["cc_agentes"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1552=array();
$proto1552["m_strHead"] = "SELECT";
$proto1552["m_strFieldList"] = "idt_agentes,   nm_agente,   codigo,   tp_atendimento,   tp_max_atendimento,   acao_atendimento,   idt_agentes_fila,   name,   `interface`,   flg_ativo";
$proto1552["m_strFrom"] = "FROM cc_agentes";
$proto1552["m_strWhere"] = "";
$proto1552["m_strOrderBy"] = "";
$proto1552["m_strTail"] = "";
$proto1553=array();
$proto1553["m_sql"] = "";
$proto1553["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1553["m_column"]=$obj;
$proto1553["m_contained"] = array();
$proto1553["m_strCase"] = "";
$proto1553["m_havingmode"] = "0";
$proto1553["m_inBrackets"] = "0";
$proto1553["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1553);

$proto1552["m_where"] = $obj;
$proto1555=array();
$proto1555["m_sql"] = "";
$proto1555["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1555["m_column"]=$obj;
$proto1555["m_contained"] = array();
$proto1555["m_strCase"] = "";
$proto1555["m_havingmode"] = "0";
$proto1555["m_inBrackets"] = "0";
$proto1555["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1555);

$proto1552["m_having"] = $obj;
$proto1552["m_fieldlist"] = array();
						$proto1557=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agentes",
	"m_strTable" => "cc_agentes"
));

$proto1557["m_expr"]=$obj;
$proto1557["m_alias"] = "";
$obj = new SQLFieldListItem($proto1557);

$proto1552["m_fieldlist"][]=$obj;
						$proto1559=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_agente",
	"m_strTable" => "cc_agentes"
));

$proto1559["m_expr"]=$obj;
$proto1559["m_alias"] = "";
$obj = new SQLFieldListItem($proto1559);

$proto1552["m_fieldlist"][]=$obj;
						$proto1561=array();
			$obj = new SQLField(array(
	"m_strName" => "codigo",
	"m_strTable" => "cc_agentes"
));

$proto1561["m_expr"]=$obj;
$proto1561["m_alias"] = "";
$obj = new SQLFieldListItem($proto1561);

$proto1552["m_fieldlist"][]=$obj;
						$proto1563=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_agentes"
));

$proto1563["m_expr"]=$obj;
$proto1563["m_alias"] = "";
$obj = new SQLFieldListItem($proto1563);

$proto1552["m_fieldlist"][]=$obj;
						$proto1565=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_max_atendimento",
	"m_strTable" => "cc_agentes"
));

$proto1565["m_expr"]=$obj;
$proto1565["m_alias"] = "";
$obj = new SQLFieldListItem($proto1565);

$proto1552["m_fieldlist"][]=$obj;
						$proto1567=array();
			$obj = new SQLField(array(
	"m_strName" => "acao_atendimento",
	"m_strTable" => "cc_agentes"
));

$proto1567["m_expr"]=$obj;
$proto1567["m_alias"] = "";
$obj = new SQLFieldListItem($proto1567);

$proto1552["m_fieldlist"][]=$obj;
						$proto1569=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_agentes_fila",
	"m_strTable" => "cc_agentes"
));

$proto1569["m_expr"]=$obj;
$proto1569["m_alias"] = "";
$obj = new SQLFieldListItem($proto1569);

$proto1552["m_fieldlist"][]=$obj;
						$proto1571=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "cc_agentes"
));

$proto1571["m_expr"]=$obj;
$proto1571["m_alias"] = "";
$obj = new SQLFieldListItem($proto1571);

$proto1552["m_fieldlist"][]=$obj;
						$proto1573=array();
			$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "cc_agentes"
));

$proto1573["m_expr"]=$obj;
$proto1573["m_alias"] = "";
$obj = new SQLFieldListItem($proto1573);

$proto1552["m_fieldlist"][]=$obj;
						$proto1575=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "cc_agentes"
));

$proto1575["m_expr"]=$obj;
$proto1575["m_alias"] = "";
$obj = new SQLFieldListItem($proto1575);

$proto1552["m_fieldlist"][]=$obj;
$proto1552["m_fromlist"] = array();
												$proto1577=array();
$proto1577["m_link"] = "SQLL_MAIN";
			$proto1578=array();
$proto1578["m_strName"] = "cc_agentes";
$proto1578["m_columns"] = array();
$proto1578["m_columns"][] = "idt_agentes";
$proto1578["m_columns"][] = "nm_agente";
$proto1578["m_columns"][] = "codigo";
$proto1578["m_columns"][] = "tp_atendimento";
$proto1578["m_columns"][] = "tp_max_atendimento";
$proto1578["m_columns"][] = "acao_atendimento";
$proto1578["m_columns"][] = "idt_agentes_fila";
$proto1578["m_columns"][] = "name";
$proto1578["m_columns"][] = "interface";
$proto1578["m_columns"][] = "flg_ativo";
$obj = new SQLTable($proto1578);

$proto1577["m_table"] = $obj;
$proto1577["m_alias"] = "";
$proto1579=array();
$proto1579["m_sql"] = "";
$proto1579["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1579["m_column"]=$obj;
$proto1579["m_contained"] = array();
$proto1579["m_strCase"] = "";
$proto1579["m_havingmode"] = "0";
$proto1579["m_inBrackets"] = "0";
$proto1579["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1579);

$proto1577["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1577);

$proto1552["m_fromlist"][]=$obj;
$proto1552["m_groupby"] = array();
$proto1552["m_orderby"] = array();
$obj = new SQLQuery($proto1552);

$queryData_cc_agentes = $obj;
$tdatacc_agentes[".sqlquery"] = $queryData_cc_agentes;



?>
