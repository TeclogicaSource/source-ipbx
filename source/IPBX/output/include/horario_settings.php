<?php

//	field labels
$fieldLabelshorario = array();
$fieldLabelshorario["Portuguese(Brazil)"]=array();
$fieldLabelshorario["Portuguese(Brazil)"]["id_horario"] = "Horário";
$fieldLabelshorario["Portuguese(Brazil)"]["seg"] = "Segunda-Feira";
$fieldLabelshorario["Portuguese(Brazil)"]["ter"] = "Terça-Feira";
$fieldLabelshorario["Portuguese(Brazil)"]["qua"] = "Quarta-Feira";
$fieldLabelshorario["Portuguese(Brazil)"]["qui"] = "Quinta-Feira";
$fieldLabelshorario["Portuguese(Brazil)"]["sex"] = "Sexta-Feira";
$fieldLabelshorario["Portuguese(Brazil)"]["sab"] = "Sábado";
$fieldLabelshorario["Portuguese(Brazil)"]["dom"] = "Domingo";
$fieldLabelshorario["Portuguese(Brazil)"]["hr_inicio_01"] = "Início Primeiro Intervalo";
$fieldLabelshorario["Portuguese(Brazil)"]["hr_fim_01"] = "Fim Primeiro Intervalo";
$fieldLabelshorario["Portuguese(Brazil)"]["hr_inicio_02"] = "Início Segundo Intervalo";
$fieldLabelshorario["Portuguese(Brazil)"]["hr_fim_02"] = "Fim Segundo Intervalo";
$fieldLabelshorario["Portuguese(Brazil)"]["dsc_horario"] = "Descrição";


$tdatahorario=array();
	$tdatahorario[".NumberOfChars"]=80; 
	$tdatahorario[".ShortName"]="horario";
	$tdatahorario[".OwnerID"]="";
	$tdatahorario[".OriginalTable"]="horario";
	$tdatahorario[".NCSearch"]=true;
	

$tdatahorario[".shortTableName"] = "horario";
$tdatahorario[".dataSourceTable"] = "horario";
$tdatahorario[".nSecOptions"] = 0;
$tdatahorario[".nLoginMethod"] = 1;
$tdatahorario[".recsPerRowList"] = 1;	
$tdatahorario[".tableGroupBy"] = "0";
$tdatahorario[".dbType"] = 0;
$tdatahorario[".mainTableOwnerID"] = "";
$tdatahorario[".moveNext"] = 1;

$tdatahorario[".listAjax"] = true;

	$tdatahorario[".audit"] = true;

	$tdatahorario[".locking"] = false;
	
$tdatahorario[".listIcons"] = true;
$tdatahorario[".edit"] = true;



$tdatahorario[".delete"] = true;

$tdatahorario[".showSimpleSearchOptions"] = false;

$tdatahorario[".showSearchPanel"] = true;


$tdatahorario[".isUseAjaxSuggest"] = true;

$tdatahorario[".rowHighlite"] = true;

$tdatahorario[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatahorario[".arrKeyFields"][] = "id_horario";

// use datepicker for search panel
$tdatahorario[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatahorario[".isUseTimeForSearch"] = true;






$tdatahorario[".isUseInlineJs"] = $tdatahorario[".isUseInlineAdd"] || $tdatahorario[".isUseInlineEdit"];

$tdatahorario[".allSearchFields"] = array();



$tdatahorario[".isDynamicPerm"] = true;

	

$tdatahorario[".isDisplayLoading"] = true;

$tdatahorario[".isResizeColumns"] = false;


$tdatahorario[".createLoginPage"] = true;


 	




$tdatahorario[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatahorario[".strOrderBy"] = $gstrOrderBy;
	
$tdatahorario[".orderindexes"] = array();

$tdatahorario[".sqlHead"] = "SELECT id_horario,   hr_inicio_01,   hr_fim_01,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio_02,   hr_fim_02,   dsc_horario";

$tdatahorario[".sqlFrom"] = "FROM horario";

$tdatahorario[".sqlWhereExpr"] = "";

$tdatahorario[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_horario";
	$tdatahorario[".Keys"]=$tableKeys;

	
//	id_horario
	$fdata = array();
	$fdata["strName"] = "id_horario";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Horário"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_horario";
		$fdata["FullName"]= "id_horario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatahorario["id_horario"]=$fdata;
	
//	hr_inicio_01
	$fdata = array();
	$fdata["strName"] = "hr_inicio_01";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Início Primeiro Intervalo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio_01";
		$fdata["FullName"]= "hr_inicio_01";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatahorario["hr_inicio_01"]=$fdata;
	
//	hr_fim_01
	$fdata = array();
	$fdata["strName"] = "hr_fim_01";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Fim Primeiro Intervalo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim_01";
		$fdata["FullName"]= "hr_fim_01";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatahorario["hr_fim_01"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Segunda-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "seg";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["seg"]=$fdata;
	
//	ter
	$fdata = array();
	$fdata["strName"] = "ter";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Terça-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "ter";
		$fdata["FullName"]= "ter";
						$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["ter"]=$fdata;
	
//	qua
	$fdata = array();
	$fdata["strName"] = "qua";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Quarta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qua";
		$fdata["FullName"]= "qua";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["qua"]=$fdata;
	
//	qui
	$fdata = array();
	$fdata["strName"] = "qui";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Quinta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qui";
		$fdata["FullName"]= "qui";
						$fdata["Index"]= 7;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["qui"]=$fdata;
	
//	sex
	$fdata = array();
	$fdata["strName"] = "sex";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Sexta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sex";
		$fdata["FullName"]= "sex";
						$fdata["Index"]= 8;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["sex"]=$fdata;
	
//	sab
	$fdata = array();
	$fdata["strName"] = "sab";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Sábado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sab";
		$fdata["FullName"]= "sab";
						$fdata["Index"]= 9;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["sab"]=$fdata;
	
//	dom
	$fdata = array();
	$fdata["strName"] = "dom";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Domingo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "dom";
		$fdata["FullName"]= "dom";
						$fdata["Index"]= 10;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatahorario["dom"]=$fdata;
	
//	hr_inicio_02
	$fdata = array();
	$fdata["strName"] = "hr_inicio_02";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Início Segundo Intervalo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio_02";
		$fdata["FullName"]= "hr_inicio_02";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatahorario["hr_inicio_02"]=$fdata;
	
//	hr_fim_02
	$fdata = array();
	$fdata["strName"] = "hr_fim_02";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Fim Segundo Intervalo"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim_02";
		$fdata["FullName"]= "hr_fim_02";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatahorario["hr_fim_02"]=$fdata;
	
//	dsc_horario
	$fdata = array();
	$fdata["strName"] = "dsc_horario";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_horario";
		$fdata["FullName"]= "dsc_horario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatahorario["dsc_horario"]=$fdata;

	
$tables_data["horario"]=&$tdatahorario;
$field_labels["horario"] = &$fieldLabelshorario;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["horario"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["horario"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3448=array();
$proto3448["m_strHead"] = "SELECT";
$proto3448["m_strFieldList"] = "id_horario,   hr_inicio_01,   hr_fim_01,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio_02,   hr_fim_02,   dsc_horario";
$proto3448["m_strFrom"] = "FROM horario";
$proto3448["m_strWhere"] = "";
$proto3448["m_strOrderBy"] = "";
$proto3448["m_strTail"] = "";
$proto3449=array();
$proto3449["m_sql"] = "";
$proto3449["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3449["m_column"]=$obj;
$proto3449["m_contained"] = array();
$proto3449["m_strCase"] = "";
$proto3449["m_havingmode"] = "0";
$proto3449["m_inBrackets"] = "0";
$proto3449["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3449);

$proto3448["m_where"] = $obj;
$proto3451=array();
$proto3451["m_sql"] = "";
$proto3451["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3451["m_column"]=$obj;
$proto3451["m_contained"] = array();
$proto3451["m_strCase"] = "";
$proto3451["m_havingmode"] = "0";
$proto3451["m_inBrackets"] = "0";
$proto3451["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3451);

$proto3448["m_having"] = $obj;
$proto3448["m_fieldlist"] = array();
						$proto3453=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "horario"
));

$proto3453["m_expr"]=$obj;
$proto3453["m_alias"] = "";
$obj = new SQLFieldListItem($proto3453);

$proto3448["m_fieldlist"][]=$obj;
						$proto3455=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio_01",
	"m_strTable" => "horario"
));

$proto3455["m_expr"]=$obj;
$proto3455["m_alias"] = "";
$obj = new SQLFieldListItem($proto3455);

$proto3448["m_fieldlist"][]=$obj;
						$proto3457=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim_01",
	"m_strTable" => "horario"
));

$proto3457["m_expr"]=$obj;
$proto3457["m_alias"] = "";
$obj = new SQLFieldListItem($proto3457);

$proto3448["m_fieldlist"][]=$obj;
						$proto3459=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "horario"
));

$proto3459["m_expr"]=$obj;
$proto3459["m_alias"] = "";
$obj = new SQLFieldListItem($proto3459);

$proto3448["m_fieldlist"][]=$obj;
						$proto3461=array();
			$obj = new SQLField(array(
	"m_strName" => "ter",
	"m_strTable" => "horario"
));

$proto3461["m_expr"]=$obj;
$proto3461["m_alias"] = "";
$obj = new SQLFieldListItem($proto3461);

$proto3448["m_fieldlist"][]=$obj;
						$proto3463=array();
			$obj = new SQLField(array(
	"m_strName" => "qua",
	"m_strTable" => "horario"
));

$proto3463["m_expr"]=$obj;
$proto3463["m_alias"] = "";
$obj = new SQLFieldListItem($proto3463);

$proto3448["m_fieldlist"][]=$obj;
						$proto3465=array();
			$obj = new SQLField(array(
	"m_strName" => "qui",
	"m_strTable" => "horario"
));

$proto3465["m_expr"]=$obj;
$proto3465["m_alias"] = "";
$obj = new SQLFieldListItem($proto3465);

$proto3448["m_fieldlist"][]=$obj;
						$proto3467=array();
			$obj = new SQLField(array(
	"m_strName" => "sex",
	"m_strTable" => "horario"
));

$proto3467["m_expr"]=$obj;
$proto3467["m_alias"] = "";
$obj = new SQLFieldListItem($proto3467);

$proto3448["m_fieldlist"][]=$obj;
						$proto3469=array();
			$obj = new SQLField(array(
	"m_strName" => "sab",
	"m_strTable" => "horario"
));

$proto3469["m_expr"]=$obj;
$proto3469["m_alias"] = "";
$obj = new SQLFieldListItem($proto3469);

$proto3448["m_fieldlist"][]=$obj;
						$proto3471=array();
			$obj = new SQLField(array(
	"m_strName" => "dom",
	"m_strTable" => "horario"
));

$proto3471["m_expr"]=$obj;
$proto3471["m_alias"] = "";
$obj = new SQLFieldListItem($proto3471);

$proto3448["m_fieldlist"][]=$obj;
						$proto3473=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio_02",
	"m_strTable" => "horario"
));

$proto3473["m_expr"]=$obj;
$proto3473["m_alias"] = "";
$obj = new SQLFieldListItem($proto3473);

$proto3448["m_fieldlist"][]=$obj;
						$proto3475=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim_02",
	"m_strTable" => "horario"
));

$proto3475["m_expr"]=$obj;
$proto3475["m_alias"] = "";
$obj = new SQLFieldListItem($proto3475);

$proto3448["m_fieldlist"][]=$obj;
						$proto3477=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_horario",
	"m_strTable" => "horario"
));

$proto3477["m_expr"]=$obj;
$proto3477["m_alias"] = "";
$obj = new SQLFieldListItem($proto3477);

$proto3448["m_fieldlist"][]=$obj;
$proto3448["m_fromlist"] = array();
												$proto3479=array();
$proto3479["m_link"] = "SQLL_MAIN";
			$proto3480=array();
$proto3480["m_strName"] = "horario";
$proto3480["m_columns"] = array();
$proto3480["m_columns"][] = "id_horario";
$proto3480["m_columns"][] = "hr_inicio_01";
$proto3480["m_columns"][] = "hr_fim_01";
$proto3480["m_columns"][] = "seg";
$proto3480["m_columns"][] = "ter";
$proto3480["m_columns"][] = "qua";
$proto3480["m_columns"][] = "qui";
$proto3480["m_columns"][] = "sex";
$proto3480["m_columns"][] = "sab";
$proto3480["m_columns"][] = "dom";
$proto3480["m_columns"][] = "hr_inicio_02";
$proto3480["m_columns"][] = "hr_fim_02";
$proto3480["m_columns"][] = "dsc_horario";
$obj = new SQLTable($proto3480);

$proto3479["m_table"] = $obj;
$proto3479["m_alias"] = "";
$proto3481=array();
$proto3481["m_sql"] = "";
$proto3481["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3481["m_column"]=$obj;
$proto3481["m_contained"] = array();
$proto3481["m_strCase"] = "";
$proto3481["m_havingmode"] = "0";
$proto3481["m_inBrackets"] = "0";
$proto3481["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3481);

$proto3479["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3479);

$proto3448["m_fromlist"][]=$obj;
$proto3448["m_groupby"] = array();
$proto3448["m_orderby"] = array();
$obj = new SQLQuery($proto3448);

$queryData_horario = $obj;
$tdatahorario[".sqlquery"] = $queryData_horario;



?>
