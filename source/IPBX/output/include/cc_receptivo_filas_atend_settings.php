<?php

//	field labels
$fieldLabelscc_receptivo_filas_atend = array();
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]=array();
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["chave"] = "Chave";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["dt_entrada"] = "Dt Entrada";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["hr_entrada"] = "Hr Entrada";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["Agente"] = "Agente";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["hr_atendimento"] = "Hr Atendimento";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["hr_abandono"] = "Hr Abandono";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["tp_espera"] = "Tp Espera";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["tp_atendimento"] = "Tp Atendimento";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["Telefone"] = "Telefone";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["ps_entrada"] = "Ps Entrada";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["ps_abandono"] = "Ps Abandono";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["tel_trans"] = "Tel Trans";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["dsl_motiv"] = "Dsl Motiv";
$fieldLabelscc_receptivo_filas_atend["Portuguese(Brazil)"]["flg_timeout_fila"] = "Flg Timeout Fila";


$tdatacc_receptivo_filas_atend=array();
	$tdatacc_receptivo_filas_atend[".NumberOfChars"]=80; 
	$tdatacc_receptivo_filas_atend[".ShortName"]="cc_receptivo_filas_atend";
	$tdatacc_receptivo_filas_atend[".OwnerID"]="";
	$tdatacc_receptivo_filas_atend[".OriginalTable"]="cc_receptivo_filas_atend";
	$tdatacc_receptivo_filas_atend[".NCSearch"]=true;
	

$tdatacc_receptivo_filas_atend[".shortTableName"] = "cc_receptivo_filas_atend";
$tdatacc_receptivo_filas_atend[".dataSourceTable"] = "cc_receptivo_filas_atend";
$tdatacc_receptivo_filas_atend[".nSecOptions"] = 0;
$tdatacc_receptivo_filas_atend[".nLoginMethod"] = 1;
$tdatacc_receptivo_filas_atend[".recsPerRowList"] = 1;	
$tdatacc_receptivo_filas_atend[".tableGroupBy"] = "0";
$tdatacc_receptivo_filas_atend[".dbType"] = 0;
$tdatacc_receptivo_filas_atend[".mainTableOwnerID"] = "";
$tdatacc_receptivo_filas_atend[".moveNext"] = 1;

$tdatacc_receptivo_filas_atend[".listAjax"] = false;

	$tdatacc_receptivo_filas_atend[".audit"] = true;

	$tdatacc_receptivo_filas_atend[".locking"] = false;
	
$tdatacc_receptivo_filas_atend[".listIcons"] = true;
$tdatacc_receptivo_filas_atend[".inlineEdit"] = true;




$tdatacc_receptivo_filas_atend[".showSimpleSearchOptions"] = false;

$tdatacc_receptivo_filas_atend[".showSearchPanel"] = true;


$tdatacc_receptivo_filas_atend[".isUseAjaxSuggest"] = true;

$tdatacc_receptivo_filas_atend[".rowHighlite"] = true;

$tdatacc_receptivo_filas_atend[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacc_receptivo_filas_atend[".arrKeyFields"][] = "chave";
$tdatacc_receptivo_filas_atend[".arrKeyFields"][] = "dt_entrada";
$tdatacc_receptivo_filas_atend[".arrKeyFields"][] = "hr_entrada";

// use datepicker for search panel
$tdatacc_receptivo_filas_atend[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatacc_receptivo_filas_atend[".isUseTimeForSearch"] = false;






$tdatacc_receptivo_filas_atend[".isUseInlineEdit"] = true;
$tdatacc_receptivo_filas_atend[".isUseInlineJs"] = $tdatacc_receptivo_filas_atend[".isUseInlineAdd"] || $tdatacc_receptivo_filas_atend[".isUseInlineEdit"];

$tdatacc_receptivo_filas_atend[".allSearchFields"] = array();



$tdatacc_receptivo_filas_atend[".isDynamicPerm"] = true;

	

$tdatacc_receptivo_filas_atend[".isDisplayLoading"] = true;

$tdatacc_receptivo_filas_atend[".isResizeColumns"] = false;


$tdatacc_receptivo_filas_atend[".createLoginPage"] = true;


 	




$tdatacc_receptivo_filas_atend[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacc_receptivo_filas_atend[".strOrderBy"] = $gstrOrderBy;
	
$tdatacc_receptivo_filas_atend[".orderindexes"] = array();

$tdatacc_receptivo_filas_atend[".sqlHead"] = "SELECT chave,   dt_entrada,   hr_entrada,   Fila,   Agente,   hr_atendimento,   hr_abandono,   tp_espera,   tp_atendimento,   Telefone,   ps_entrada,   ps_abandono,   tel_trans,   dsl_motiv,   flg_timeout_fila";

$tdatacc_receptivo_filas_atend[".sqlFrom"] = "FROM cc_receptivo_filas_atend";

$tdatacc_receptivo_filas_atend[".sqlWhereExpr"] = "";

$tdatacc_receptivo_filas_atend[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="chave";
	$tableKeys[]="dt_entrada";
	$tableKeys[]="hr_entrada";
	$tdatacc_receptivo_filas_atend[".Keys"]=$tableKeys;

	
//	chave
	$fdata = array();
	$fdata["strName"] = "chave";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Chave"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "chave";
		$fdata["FullName"]= "chave";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["chave"]=$fdata;
	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Dt Entrada"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["dt_entrada"]=$fdata;
	
//	hr_entrada
	$fdata = array();
	$fdata["strName"] = "hr_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hr Entrada"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_entrada";
		$fdata["FullName"]= "hr_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatacc_receptivo_filas_atend["hr_entrada"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["Fila"]=$fdata;
	
//	Agente
	$fdata = array();
	$fdata["strName"] = "Agente";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Agente";
		$fdata["FullName"]= "Agente";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["Agente"]=$fdata;
	
//	hr_atendimento
	$fdata = array();
	$fdata["strName"] = "hr_atendimento";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hr Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_atendimento";
		$fdata["FullName"]= "hr_atendimento";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatacc_receptivo_filas_atend["hr_atendimento"]=$fdata;
	
//	hr_abandono
	$fdata = array();
	$fdata["strName"] = "hr_abandono";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Hr Abandono"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_abandono";
		$fdata["FullName"]= "hr_abandono";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatacc_receptivo_filas_atend["hr_abandono"]=$fdata;
	
//	tp_espera
	$fdata = array();
	$fdata["strName"] = "tp_espera";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tp Espera"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_espera";
		$fdata["FullName"]= "tp_espera";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatacc_receptivo_filas_atend["tp_espera"]=$fdata;
	
//	tp_atendimento
	$fdata = array();
	$fdata["strName"] = "tp_atendimento";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tp Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_atendimento";
		$fdata["FullName"]= "tp_atendimento";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdatacc_receptivo_filas_atend["tp_atendimento"]=$fdata;
	
//	Telefone
	$fdata = array();
	$fdata["strName"] = "Telefone";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Telefone";
		$fdata["FullName"]= "Telefone";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["Telefone"]=$fdata;
	
//	ps_entrada
	$fdata = array();
	$fdata["strName"] = "ps_entrada";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Ps Entrada"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ps_entrada";
		$fdata["FullName"]= "ps_entrada";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["ps_entrada"]=$fdata;
	
//	ps_abandono
	$fdata = array();
	$fdata["strName"] = "ps_abandono";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Ps Abandono"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ps_abandono";
		$fdata["FullName"]= "ps_abandono";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["ps_abandono"]=$fdata;
	
//	tel_trans
	$fdata = array();
	$fdata["strName"] = "tel_trans";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Tel Trans"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tel_trans";
		$fdata["FullName"]= "tel_trans";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["tel_trans"]=$fdata;
	
//	dsl_motiv
	$fdata = array();
	$fdata["strName"] = "dsl_motiv";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Dsl Motiv"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsl_motiv";
		$fdata["FullName"]= "dsl_motiv";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["dsl_motiv"]=$fdata;
	
//	flg_timeout_fila
	$fdata = array();
	$fdata["strName"] = "flg_timeout_fila";
	$fdata["ownerTable"] = "cc_receptivo_filas_atend";
		$fdata["Label"]="Flg Timeout Fila"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "flg_timeout_fila";
		$fdata["FullName"]= "flg_timeout_fila";
						$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacc_receptivo_filas_atend["flg_timeout_fila"]=$fdata;

	
$tables_data["cc_receptivo_filas_atend"]=&$tdatacc_receptivo_filas_atend;
$field_labels["cc_receptivo_filas_atend"] = &$fieldLabelscc_receptivo_filas_atend;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cc_receptivo_filas_atend"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["cc_receptivo_filas_atend"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1513=array();
$proto1513["m_strHead"] = "SELECT";
$proto1513["m_strFieldList"] = "chave,   dt_entrada,   hr_entrada,   Fila,   Agente,   hr_atendimento,   hr_abandono,   tp_espera,   tp_atendimento,   Telefone,   ps_entrada,   ps_abandono,   tel_trans,   dsl_motiv,   flg_timeout_fila";
$proto1513["m_strFrom"] = "FROM cc_receptivo_filas_atend";
$proto1513["m_strWhere"] = "";
$proto1513["m_strOrderBy"] = "";
$proto1513["m_strTail"] = "";
$proto1514=array();
$proto1514["m_sql"] = "";
$proto1514["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1514["m_column"]=$obj;
$proto1514["m_contained"] = array();
$proto1514["m_strCase"] = "";
$proto1514["m_havingmode"] = "0";
$proto1514["m_inBrackets"] = "0";
$proto1514["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1514);

$proto1513["m_where"] = $obj;
$proto1516=array();
$proto1516["m_sql"] = "";
$proto1516["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1516["m_column"]=$obj;
$proto1516["m_contained"] = array();
$proto1516["m_strCase"] = "";
$proto1516["m_havingmode"] = "0";
$proto1516["m_inBrackets"] = "0";
$proto1516["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1516);

$proto1513["m_having"] = $obj;
$proto1513["m_fieldlist"] = array();
						$proto1518=array();
			$obj = new SQLField(array(
	"m_strName" => "chave",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1518["m_expr"]=$obj;
$proto1518["m_alias"] = "";
$obj = new SQLFieldListItem($proto1518);

$proto1513["m_fieldlist"][]=$obj;
						$proto1520=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1520["m_expr"]=$obj;
$proto1520["m_alias"] = "";
$obj = new SQLFieldListItem($proto1520);

$proto1513["m_fieldlist"][]=$obj;
						$proto1522=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1522["m_expr"]=$obj;
$proto1522["m_alias"] = "";
$obj = new SQLFieldListItem($proto1522);

$proto1513["m_fieldlist"][]=$obj;
						$proto1524=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1524["m_expr"]=$obj;
$proto1524["m_alias"] = "";
$obj = new SQLFieldListItem($proto1524);

$proto1513["m_fieldlist"][]=$obj;
						$proto1526=array();
			$obj = new SQLField(array(
	"m_strName" => "Agente",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1526["m_expr"]=$obj;
$proto1526["m_alias"] = "";
$obj = new SQLFieldListItem($proto1526);

$proto1513["m_fieldlist"][]=$obj;
						$proto1528=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1528["m_expr"]=$obj;
$proto1528["m_alias"] = "";
$obj = new SQLFieldListItem($proto1528);

$proto1513["m_fieldlist"][]=$obj;
						$proto1530=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1530["m_expr"]=$obj;
$proto1530["m_alias"] = "";
$obj = new SQLFieldListItem($proto1530);

$proto1513["m_fieldlist"][]=$obj;
						$proto1532=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_espera",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1532["m_expr"]=$obj;
$proto1532["m_alias"] = "";
$obj = new SQLFieldListItem($proto1532);

$proto1513["m_fieldlist"][]=$obj;
						$proto1534=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_atendimento",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1534["m_expr"]=$obj;
$proto1534["m_alias"] = "";
$obj = new SQLFieldListItem($proto1534);

$proto1513["m_fieldlist"][]=$obj;
						$proto1536=array();
			$obj = new SQLField(array(
	"m_strName" => "Telefone",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1536["m_expr"]=$obj;
$proto1536["m_alias"] = "";
$obj = new SQLFieldListItem($proto1536);

$proto1513["m_fieldlist"][]=$obj;
						$proto1538=array();
			$obj = new SQLField(array(
	"m_strName" => "ps_entrada",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1538["m_expr"]=$obj;
$proto1538["m_alias"] = "";
$obj = new SQLFieldListItem($proto1538);

$proto1513["m_fieldlist"][]=$obj;
						$proto1540=array();
			$obj = new SQLField(array(
	"m_strName" => "ps_abandono",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1540["m_expr"]=$obj;
$proto1540["m_alias"] = "";
$obj = new SQLFieldListItem($proto1540);

$proto1513["m_fieldlist"][]=$obj;
						$proto1542=array();
			$obj = new SQLField(array(
	"m_strName" => "tel_trans",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1542["m_expr"]=$obj;
$proto1542["m_alias"] = "";
$obj = new SQLFieldListItem($proto1542);

$proto1513["m_fieldlist"][]=$obj;
						$proto1544=array();
			$obj = new SQLField(array(
	"m_strName" => "dsl_motiv",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1544["m_expr"]=$obj;
$proto1544["m_alias"] = "";
$obj = new SQLFieldListItem($proto1544);

$proto1513["m_fieldlist"][]=$obj;
						$proto1546=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_timeout_fila",
	"m_strTable" => "cc_receptivo_filas_atend"
));

$proto1546["m_expr"]=$obj;
$proto1546["m_alias"] = "";
$obj = new SQLFieldListItem($proto1546);

$proto1513["m_fieldlist"][]=$obj;
$proto1513["m_fromlist"] = array();
												$proto1548=array();
$proto1548["m_link"] = "SQLL_MAIN";
			$proto1549=array();
$proto1549["m_strName"] = "cc_receptivo_filas_atend";
$proto1549["m_columns"] = array();
$proto1549["m_columns"][] = "chave";
$proto1549["m_columns"][] = "dt_entrada";
$proto1549["m_columns"][] = "hr_entrada";
$proto1549["m_columns"][] = "Fila";
$proto1549["m_columns"][] = "Agente";
$proto1549["m_columns"][] = "hr_atendimento";
$proto1549["m_columns"][] = "hr_abandono";
$proto1549["m_columns"][] = "tp_espera";
$proto1549["m_columns"][] = "tp_atendimento";
$proto1549["m_columns"][] = "Telefone";
$proto1549["m_columns"][] = "ps_entrada";
$proto1549["m_columns"][] = "ps_abandono";
$proto1549["m_columns"][] = "tel_trans";
$proto1549["m_columns"][] = "dsl_motiv";
$proto1549["m_columns"][] = "flg_timeout_fila";
$obj = new SQLTable($proto1549);

$proto1548["m_table"] = $obj;
$proto1548["m_alias"] = "";
$proto1550=array();
$proto1550["m_sql"] = "";
$proto1550["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1550["m_column"]=$obj;
$proto1550["m_contained"] = array();
$proto1550["m_strCase"] = "";
$proto1550["m_havingmode"] = "0";
$proto1550["m_inBrackets"] = "0";
$proto1550["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1550);

$proto1548["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1548);

$proto1513["m_fromlist"][]=$obj;
$proto1513["m_groupby"] = array();
$proto1513["m_orderby"] = array();
$obj = new SQLQuery($proto1513);

$queryData_cc_receptivo_filas_atend = $obj;
$tdatacc_receptivo_filas_atend[".sqlquery"] = $queryData_cc_receptivo_filas_atend;



?>
