<?php

//	field labels
$fieldLabelsdesvios_pabx = array();
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]=array();
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["id_desvio"] = "Id Desvio";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["ramal"] = "Ramal";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["destino"] = "Destino";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["seg"] = "Segunda-Feira";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["ter"] = "Terça-Feira";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["qua"] = "Quarta-Feira";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["qui"] = "Quinta-Feira";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["sex"] = "Sexta-Feira";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["sab"] = "Sábado";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["dom"] = "Domingo";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["hr_inicio"] = "Hora Início";
$fieldLabelsdesvios_pabx["Portuguese(Brazil)"]["hr_fim"] = "Hora Fim";


$tdatadesvios_pabx=array();
	$tdatadesvios_pabx[".NumberOfChars"]=80; 
	$tdatadesvios_pabx[".ShortName"]="desvios_pabx";
	$tdatadesvios_pabx[".OwnerID"]="";
	$tdatadesvios_pabx[".OriginalTable"]="desvios_pabx";
	$tdatadesvios_pabx[".NCSearch"]=true;
	

$tdatadesvios_pabx[".shortTableName"] = "desvios_pabx";
$tdatadesvios_pabx[".dataSourceTable"] = "desvios_pabx";
$tdatadesvios_pabx[".nSecOptions"] = 0;
$tdatadesvios_pabx[".nLoginMethod"] = 1;
$tdatadesvios_pabx[".recsPerRowList"] = 1;	
$tdatadesvios_pabx[".tableGroupBy"] = "0";
$tdatadesvios_pabx[".dbType"] = 0;
$tdatadesvios_pabx[".mainTableOwnerID"] = "";
$tdatadesvios_pabx[".moveNext"] = 1;

$tdatadesvios_pabx[".listAjax"] = false;

	$tdatadesvios_pabx[".audit"] = true;

	$tdatadesvios_pabx[".locking"] = false;
	
$tdatadesvios_pabx[".listIcons"] = true;
$tdatadesvios_pabx[".inlineEdit"] = true;



$tdatadesvios_pabx[".delete"] = true;

$tdatadesvios_pabx[".showSimpleSearchOptions"] = false;

$tdatadesvios_pabx[".showSearchPanel"] = true;


$tdatadesvios_pabx[".isUseAjaxSuggest"] = true;

$tdatadesvios_pabx[".rowHighlite"] = true;

$tdatadesvios_pabx[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatadesvios_pabx[".arrKeyFields"][] = "id_desvio";

// use datepicker for search panel
$tdatadesvios_pabx[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatadesvios_pabx[".isUseTimeForSearch"] = true;





$tdatadesvios_pabx[".isUseInlineAdd"] = true;

$tdatadesvios_pabx[".isUseInlineEdit"] = true;
$tdatadesvios_pabx[".isUseInlineJs"] = $tdatadesvios_pabx[".isUseInlineAdd"] || $tdatadesvios_pabx[".isUseInlineEdit"];

$tdatadesvios_pabx[".allSearchFields"] = array();

$tdatadesvios_pabx[".globSearchFields"][] = "ramal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ramal", $tdatadesvios_pabx[".allSearchFields"]))
{
	$tdatadesvios_pabx[".allSearchFields"][] = "ramal";	
}
$tdatadesvios_pabx[".globSearchFields"][] = "destino";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("destino", $tdatadesvios_pabx[".allSearchFields"]))
{
	$tdatadesvios_pabx[".allSearchFields"][] = "destino";	
}


$tdatadesvios_pabx[".isDynamicPerm"] = true;

	

$tdatadesvios_pabx[".isDisplayLoading"] = true;

$tdatadesvios_pabx[".isResizeColumns"] = false;


$tdatadesvios_pabx[".createLoginPage"] = true;


 	




$tdatadesvios_pabx[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatadesvios_pabx[".strOrderBy"] = $gstrOrderBy;
	
$tdatadesvios_pabx[".orderindexes"] = array();

$tdatadesvios_pabx[".sqlHead"] = "SELECT id_desvio,   ramal,   destino,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio,   hr_fim";

$tdatadesvios_pabx[".sqlFrom"] = "FROM desvios_pabx";

$tdatadesvios_pabx[".sqlWhereExpr"] = "";

$tdatadesvios_pabx[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_desvio";
	$tdatadesvios_pabx[".Keys"]=$tableKeys;

	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Id Desvio"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desvio";
		$fdata["FullName"]= "id_desvio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatadesvios_pabx["id_desvio"]=$fdata;
	
//	ramal
	$fdata = array();
	$fdata["strName"] = "ramal";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="ramal";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="Nome";
				$fdata["LookupTable"]="pabx";
	$fdata["LookupOrderBy"]="Nome";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ramal";
		$fdata["FullName"]= "ramal";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["ramal"]=$fdata;
	
//	destino
	$fdata = array();
	$fdata["strName"] = "destino";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "destino";
		$fdata["FullName"]= "destino";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=22";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["destino"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Segunda-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "seg";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["seg"]=$fdata;
	
//	ter
	$fdata = array();
	$fdata["strName"] = "ter";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Terça-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "ter";
		$fdata["FullName"]= "ter";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["ter"]=$fdata;
	
//	qua
	$fdata = array();
	$fdata["strName"] = "qua";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Quarta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qua";
		$fdata["FullName"]= "qua";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["qua"]=$fdata;
	
//	qui
	$fdata = array();
	$fdata["strName"] = "qui";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Quinta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qui";
		$fdata["FullName"]= "qui";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["qui"]=$fdata;
	
//	sex
	$fdata = array();
	$fdata["strName"] = "sex";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Sexta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sex";
		$fdata["FullName"]= "sex";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["sex"]=$fdata;
	
//	sab
	$fdata = array();
	$fdata["strName"] = "sab";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Sábado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sab";
		$fdata["FullName"]= "sab";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["sab"]=$fdata;
	
//	dom
	$fdata = array();
	$fdata["strName"] = "dom";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Domingo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "dom";
		$fdata["FullName"]= "dom";
						$fdata["Index"]= 10;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios_pabx["dom"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Hora Início"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatadesvios_pabx["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "desvios_pabx";
		$fdata["Label"]="Hora Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatadesvios_pabx["hr_fim"]=$fdata;

	
$tables_data["desvios_pabx"]=&$tdatadesvios_pabx;
$field_labels["desvios_pabx"] = &$fieldLabelsdesvios_pabx;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["desvios_pabx"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["desvios_pabx"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1593=array();
$proto1593["m_strHead"] = "SELECT";
$proto1593["m_strFieldList"] = "id_desvio,   ramal,   destino,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio,   hr_fim";
$proto1593["m_strFrom"] = "FROM desvios_pabx";
$proto1593["m_strWhere"] = "";
$proto1593["m_strOrderBy"] = "";
$proto1593["m_strTail"] = "";
$proto1594=array();
$proto1594["m_sql"] = "";
$proto1594["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1594["m_column"]=$obj;
$proto1594["m_contained"] = array();
$proto1594["m_strCase"] = "";
$proto1594["m_havingmode"] = "0";
$proto1594["m_inBrackets"] = "0";
$proto1594["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1594);

$proto1593["m_where"] = $obj;
$proto1596=array();
$proto1596["m_sql"] = "";
$proto1596["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1596["m_column"]=$obj;
$proto1596["m_contained"] = array();
$proto1596["m_strCase"] = "";
$proto1596["m_havingmode"] = "0";
$proto1596["m_inBrackets"] = "0";
$proto1596["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1596);

$proto1593["m_having"] = $obj;
$proto1593["m_fieldlist"] = array();
						$proto1598=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "desvios_pabx"
));

$proto1598["m_expr"]=$obj;
$proto1598["m_alias"] = "";
$obj = new SQLFieldListItem($proto1598);

$proto1593["m_fieldlist"][]=$obj;
						$proto1600=array();
			$obj = new SQLField(array(
	"m_strName" => "ramal",
	"m_strTable" => "desvios_pabx"
));

$proto1600["m_expr"]=$obj;
$proto1600["m_alias"] = "";
$obj = new SQLFieldListItem($proto1600);

$proto1593["m_fieldlist"][]=$obj;
						$proto1602=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "desvios_pabx"
));

$proto1602["m_expr"]=$obj;
$proto1602["m_alias"] = "";
$obj = new SQLFieldListItem($proto1602);

$proto1593["m_fieldlist"][]=$obj;
						$proto1604=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "desvios_pabx"
));

$proto1604["m_expr"]=$obj;
$proto1604["m_alias"] = "";
$obj = new SQLFieldListItem($proto1604);

$proto1593["m_fieldlist"][]=$obj;
						$proto1606=array();
			$obj = new SQLField(array(
	"m_strName" => "ter",
	"m_strTable" => "desvios_pabx"
));

$proto1606["m_expr"]=$obj;
$proto1606["m_alias"] = "";
$obj = new SQLFieldListItem($proto1606);

$proto1593["m_fieldlist"][]=$obj;
						$proto1608=array();
			$obj = new SQLField(array(
	"m_strName" => "qua",
	"m_strTable" => "desvios_pabx"
));

$proto1608["m_expr"]=$obj;
$proto1608["m_alias"] = "";
$obj = new SQLFieldListItem($proto1608);

$proto1593["m_fieldlist"][]=$obj;
						$proto1610=array();
			$obj = new SQLField(array(
	"m_strName" => "qui",
	"m_strTable" => "desvios_pabx"
));

$proto1610["m_expr"]=$obj;
$proto1610["m_alias"] = "";
$obj = new SQLFieldListItem($proto1610);

$proto1593["m_fieldlist"][]=$obj;
						$proto1612=array();
			$obj = new SQLField(array(
	"m_strName" => "sex",
	"m_strTable" => "desvios_pabx"
));

$proto1612["m_expr"]=$obj;
$proto1612["m_alias"] = "";
$obj = new SQLFieldListItem($proto1612);

$proto1593["m_fieldlist"][]=$obj;
						$proto1614=array();
			$obj = new SQLField(array(
	"m_strName" => "sab",
	"m_strTable" => "desvios_pabx"
));

$proto1614["m_expr"]=$obj;
$proto1614["m_alias"] = "";
$obj = new SQLFieldListItem($proto1614);

$proto1593["m_fieldlist"][]=$obj;
						$proto1616=array();
			$obj = new SQLField(array(
	"m_strName" => "dom",
	"m_strTable" => "desvios_pabx"
));

$proto1616["m_expr"]=$obj;
$proto1616["m_alias"] = "";
$obj = new SQLFieldListItem($proto1616);

$proto1593["m_fieldlist"][]=$obj;
						$proto1618=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "desvios_pabx"
));

$proto1618["m_expr"]=$obj;
$proto1618["m_alias"] = "";
$obj = new SQLFieldListItem($proto1618);

$proto1593["m_fieldlist"][]=$obj;
						$proto1620=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "desvios_pabx"
));

$proto1620["m_expr"]=$obj;
$proto1620["m_alias"] = "";
$obj = new SQLFieldListItem($proto1620);

$proto1593["m_fieldlist"][]=$obj;
$proto1593["m_fromlist"] = array();
												$proto1622=array();
$proto1622["m_link"] = "SQLL_MAIN";
			$proto1623=array();
$proto1623["m_strName"] = "desvios_pabx";
$proto1623["m_columns"] = array();
$proto1623["m_columns"][] = "id_desvio";
$proto1623["m_columns"][] = "ramal";
$proto1623["m_columns"][] = "destino";
$proto1623["m_columns"][] = "seg";
$proto1623["m_columns"][] = "ter";
$proto1623["m_columns"][] = "qua";
$proto1623["m_columns"][] = "qui";
$proto1623["m_columns"][] = "sex";
$proto1623["m_columns"][] = "sab";
$proto1623["m_columns"][] = "dom";
$proto1623["m_columns"][] = "hr_inicio";
$proto1623["m_columns"][] = "hr_fim";
$obj = new SQLTable($proto1623);

$proto1622["m_table"] = $obj;
$proto1622["m_alias"] = "";
$proto1624=array();
$proto1624["m_sql"] = "";
$proto1624["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1624["m_column"]=$obj;
$proto1624["m_contained"] = array();
$proto1624["m_strCase"] = "";
$proto1624["m_havingmode"] = "0";
$proto1624["m_inBrackets"] = "0";
$proto1624["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1624);

$proto1622["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1622);

$proto1593["m_fromlist"][]=$obj;
$proto1593["m_groupby"] = array();
$proto1593["m_orderby"] = array();
$obj = new SQLQuery($proto1593);

$queryData_desvios_pabx = $obj;
$tdatadesvios_pabx[".sqlquery"] = $queryData_desvios_pabx;



?>
