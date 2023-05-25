<?php

//	field labels
$fieldLabelsipbx_ura_rev_conf = array();
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["id_ipbx_ura_rev"] = "Identificação";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["mx_tent"] = "Máximo de tentativas";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["tp_entre_tent"] = "Tempo entre tentativas (Minutos)";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["hr_inicio"] = "Horário de inicio";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["hr_fim"] = "Horário de Fim";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["mx_chamada"] = "Número máximo de chamadas (simultâneas)";
$fieldLabelsipbx_ura_rev_conf["Portuguese(Brazil)"]["id_interf"] = "Interface";


$tdataipbx_ura_rev_conf=array();
	$tdataipbx_ura_rev_conf[".NumberOfChars"]=80; 
	$tdataipbx_ura_rev_conf[".ShortName"]="ipbx_ura_rev_conf";
	$tdataipbx_ura_rev_conf[".OwnerID"]="";
	$tdataipbx_ura_rev_conf[".OriginalTable"]="ipbx_ura_rev_conf";
	$tdataipbx_ura_rev_conf[".NCSearch"]=true;
	

$tdataipbx_ura_rev_conf[".shortTableName"] = "ipbx_ura_rev_conf";
$tdataipbx_ura_rev_conf[".dataSourceTable"] = "ipbx_ura_rev_conf";
$tdataipbx_ura_rev_conf[".nSecOptions"] = 0;
$tdataipbx_ura_rev_conf[".nLoginMethod"] = 1;
$tdataipbx_ura_rev_conf[".recsPerRowList"] = 1;	
$tdataipbx_ura_rev_conf[".tableGroupBy"] = "0";
$tdataipbx_ura_rev_conf[".dbType"] = 0;
$tdataipbx_ura_rev_conf[".mainTableOwnerID"] = "";
$tdataipbx_ura_rev_conf[".moveNext"] = 1;

$tdataipbx_ura_rev_conf[".listAjax"] = true;

	$tdataipbx_ura_rev_conf[".audit"] = true;

	$tdataipbx_ura_rev_conf[".locking"] = false;
	
$tdataipbx_ura_rev_conf[".listIcons"] = true;
$tdataipbx_ura_rev_conf[".inlineEdit"] = true;




$tdataipbx_ura_rev_conf[".showSimpleSearchOptions"] = false;

$tdataipbx_ura_rev_conf[".showSearchPanel"] = true;


$tdataipbx_ura_rev_conf[".isUseAjaxSuggest"] = true;

$tdataipbx_ura_rev_conf[".rowHighlite"] = true;

$tdataipbx_ura_rev_conf[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_ura_rev_conf[".arrKeyFields"][] = "id_ipbx_ura_rev";

// use datepicker for search panel
$tdataipbx_ura_rev_conf[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_ura_rev_conf[".isUseTimeForSearch"] = true;






$tdataipbx_ura_rev_conf[".isUseInlineEdit"] = true;
$tdataipbx_ura_rev_conf[".isUseInlineJs"] = $tdataipbx_ura_rev_conf[".isUseInlineAdd"] || $tdataipbx_ura_rev_conf[".isUseInlineEdit"];

$tdataipbx_ura_rev_conf[".allSearchFields"] = array();



$tdataipbx_ura_rev_conf[".isDynamicPerm"] = true;

	
$tdataipbx_ura_rev_conf[".isVerLayout"] = true;

$tdataipbx_ura_rev_conf[".isDisplayLoading"] = true;

$tdataipbx_ura_rev_conf[".isResizeColumns"] = false;


$tdataipbx_ura_rev_conf[".createLoginPage"] = true;


 	




$tdataipbx_ura_rev_conf[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_ura_rev_conf[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_ura_rev_conf[".orderindexes"] = array();

$tdataipbx_ura_rev_conf[".sqlHead"] = "SELECT id_ipbx_ura_rev,   mx_tent,   tp_entre_tent,   hr_inicio,   hr_fim,   mx_chamada,   id_interf";

$tdataipbx_ura_rev_conf[".sqlFrom"] = "FROM ipbx_ura_rev_conf";

$tdataipbx_ura_rev_conf[".sqlWhereExpr"] = "";

$tdataipbx_ura_rev_conf[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_ipbx_ura_rev";
	$tdataipbx_ura_rev_conf[".Keys"]=$tableKeys;

	
//	id_ipbx_ura_rev
	$fdata = array();
	$fdata["strName"] = "id_ipbx_ura_rev";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_ipbx_ura_rev";
		$fdata["FullName"]= "id_ipbx_ura_rev";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_ura_rev_conf["id_ipbx_ura_rev"]=$fdata;
	
//	mx_tent
	$fdata = array();
	$fdata["strName"] = "mx_tent";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Máximo de tentativas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mx_tent";
		$fdata["FullName"]= "mx_tent";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ura_rev_conf["mx_tent"]=$fdata;
	
//	tp_entre_tent
	$fdata = array();
	$fdata["strName"] = "tp_entre_tent";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Tempo entre tentativas (Minutos)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_entre_tent";
		$fdata["FullName"]= "tp_entre_tent";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ura_rev_conf["tp_entre_tent"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Horário de inicio"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdataipbx_ura_rev_conf["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Horário de Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdataipbx_ura_rev_conf["hr_fim"]=$fdata;
	
//	mx_chamada
	$fdata = array();
	$fdata["strName"] = "mx_chamada";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Número máximo de chamadas (simultâneas)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mx_chamada";
		$fdata["FullName"]= "mx_chamada";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ura_rev_conf["mx_chamada"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_ura_rev_conf";
		$fdata["Label"]="Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_interf";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_interf";
				$fdata["LookupTable"]="ipbx_interf";
	$fdata["LookupOrderBy"]="dsc_interf";
							$fdata["LookupWhere"] = "id_tp_interf NOT IN (3, 4, 5)";

				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ura_rev_conf["id_interf"]=$fdata;

	
$tables_data["ipbx_ura_rev_conf"]=&$tdataipbx_ura_rev_conf;
$field_labels["ipbx_ura_rev_conf"] = &$fieldLabelsipbx_ura_rev_conf;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ura_rev_conf"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ura_rev_conf"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2127=array();
$proto2127["m_strHead"] = "SELECT";
$proto2127["m_strFieldList"] = "id_ipbx_ura_rev,   mx_tent,   tp_entre_tent,   hr_inicio,   hr_fim,   mx_chamada,   id_interf";
$proto2127["m_strFrom"] = "FROM ipbx_ura_rev_conf";
$proto2127["m_strWhere"] = "";
$proto2127["m_strOrderBy"] = "";
$proto2127["m_strTail"] = "";
$proto2128=array();
$proto2128["m_sql"] = "";
$proto2128["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2128["m_column"]=$obj;
$proto2128["m_contained"] = array();
$proto2128["m_strCase"] = "";
$proto2128["m_havingmode"] = "0";
$proto2128["m_inBrackets"] = "0";
$proto2128["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2128);

$proto2127["m_where"] = $obj;
$proto2130=array();
$proto2130["m_sql"] = "";
$proto2130["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2130["m_column"]=$obj;
$proto2130["m_contained"] = array();
$proto2130["m_strCase"] = "";
$proto2130["m_havingmode"] = "0";
$proto2130["m_inBrackets"] = "0";
$proto2130["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2130);

$proto2127["m_having"] = $obj;
$proto2127["m_fieldlist"] = array();
						$proto2132=array();
			$obj = new SQLField(array(
	"m_strName" => "id_ipbx_ura_rev",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2132["m_expr"]=$obj;
$proto2132["m_alias"] = "";
$obj = new SQLFieldListItem($proto2132);

$proto2127["m_fieldlist"][]=$obj;
						$proto2134=array();
			$obj = new SQLField(array(
	"m_strName" => "mx_tent",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2134["m_expr"]=$obj;
$proto2134["m_alias"] = "";
$obj = new SQLFieldListItem($proto2134);

$proto2127["m_fieldlist"][]=$obj;
						$proto2136=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_entre_tent",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2136["m_expr"]=$obj;
$proto2136["m_alias"] = "";
$obj = new SQLFieldListItem($proto2136);

$proto2127["m_fieldlist"][]=$obj;
						$proto2138=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2138["m_expr"]=$obj;
$proto2138["m_alias"] = "";
$obj = new SQLFieldListItem($proto2138);

$proto2127["m_fieldlist"][]=$obj;
						$proto2140=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2140["m_expr"]=$obj;
$proto2140["m_alias"] = "";
$obj = new SQLFieldListItem($proto2140);

$proto2127["m_fieldlist"][]=$obj;
						$proto2142=array();
			$obj = new SQLField(array(
	"m_strName" => "mx_chamada",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2142["m_expr"]=$obj;
$proto2142["m_alias"] = "";
$obj = new SQLFieldListItem($proto2142);

$proto2127["m_fieldlist"][]=$obj;
						$proto2144=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_ura_rev_conf"
));

$proto2144["m_expr"]=$obj;
$proto2144["m_alias"] = "";
$obj = new SQLFieldListItem($proto2144);

$proto2127["m_fieldlist"][]=$obj;
$proto2127["m_fromlist"] = array();
												$proto2146=array();
$proto2146["m_link"] = "SQLL_MAIN";
			$proto2147=array();
$proto2147["m_strName"] = "ipbx_ura_rev_conf";
$proto2147["m_columns"] = array();
$proto2147["m_columns"][] = "id_ipbx_ura_rev";
$proto2147["m_columns"][] = "mx_tent";
$proto2147["m_columns"][] = "tp_entre_tent";
$proto2147["m_columns"][] = "hr_inicio";
$proto2147["m_columns"][] = "hr_fim";
$proto2147["m_columns"][] = "mx_chamada";
$proto2147["m_columns"][] = "id_interf";
$obj = new SQLTable($proto2147);

$proto2146["m_table"] = $obj;
$proto2146["m_alias"] = "";
$proto2148=array();
$proto2148["m_sql"] = "";
$proto2148["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2148["m_column"]=$obj;
$proto2148["m_contained"] = array();
$proto2148["m_strCase"] = "";
$proto2148["m_havingmode"] = "0";
$proto2148["m_inBrackets"] = "0";
$proto2148["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2148);

$proto2146["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2146);

$proto2127["m_fromlist"][]=$obj;
$proto2127["m_groupby"] = array();
$proto2127["m_orderby"] = array();
$obj = new SQLQuery($proto2127);

$queryData_ipbx_ura_rev_conf = $obj;
$tdataipbx_ura_rev_conf[".sqlquery"] = $queryData_ipbx_ura_rev_conf;



?>
