<?php

//	field labels
$fieldLabelsdesvios = array();
$fieldLabelsdesvios["Portuguese(Brazil)"]=array();
$fieldLabelsdesvios["Portuguese(Brazil)"]["id_desvio"] = "Desvio";
$fieldLabelsdesvios["Portuguese(Brazil)"]["ramal"] = "Ramal";
$fieldLabelsdesvios["Portuguese(Brazil)"]["destino"] = "Destino";
$fieldLabelsdesvios["Portuguese(Brazil)"]["seg"] = "Segunda-Feira";
$fieldLabelsdesvios["Portuguese(Brazil)"]["ter"] = "Terça-Feira";
$fieldLabelsdesvios["Portuguese(Brazil)"]["qua"] = "Quarta-Feira";
$fieldLabelsdesvios["Portuguese(Brazil)"]["qui"] = "Quinta-Feira";
$fieldLabelsdesvios["Portuguese(Brazil)"]["sex"] = "Sexta-Feira";
$fieldLabelsdesvios["Portuguese(Brazil)"]["sab"] = "Sábado";
$fieldLabelsdesvios["Portuguese(Brazil)"]["dom"] = "Domingo";
$fieldLabelsdesvios["Portuguese(Brazil)"]["hr_inicio"] = "Hora Início";
$fieldLabelsdesvios["Portuguese(Brazil)"]["hr_fim"] = "Hora Fim";


$tdatadesvios=array();
	$tdatadesvios[".NumberOfChars"]=80; 
	$tdatadesvios[".ShortName"]="desvios";
	$tdatadesvios[".OwnerID"]="";
	$tdatadesvios[".OriginalTable"]="desvios";
	$tdatadesvios[".NCSearch"]=true;
	

$tdatadesvios[".shortTableName"] = "desvios";
$tdatadesvios[".dataSourceTable"] = "desvios";
$tdatadesvios[".nSecOptions"] = 0;
$tdatadesvios[".nLoginMethod"] = 1;
$tdatadesvios[".recsPerRowList"] = 1;	
$tdatadesvios[".tableGroupBy"] = "0";
$tdatadesvios[".dbType"] = 0;
$tdatadesvios[".mainTableOwnerID"] = "";
$tdatadesvios[".moveNext"] = 1;

$tdatadesvios[".listAjax"] = false;

	$tdatadesvios[".audit"] = true;

	$tdatadesvios[".locking"] = false;
	
$tdatadesvios[".listIcons"] = true;
$tdatadesvios[".edit"] = true;




$tdatadesvios[".showSimpleSearchOptions"] = false;

$tdatadesvios[".showSearchPanel"] = true;


$tdatadesvios[".isUseAjaxSuggest"] = true;

$tdatadesvios[".rowHighlite"] = true;

$tdatadesvios[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatadesvios[".arrKeyFields"][] = "id_desvio";

// use datepicker for search panel
$tdatadesvios[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatadesvios[".isUseTimeForSearch"] = true;






$tdatadesvios[".isUseInlineJs"] = $tdatadesvios[".isUseInlineAdd"] || $tdatadesvios[".isUseInlineEdit"];

$tdatadesvios[".allSearchFields"] = array();

$tdatadesvios[".globSearchFields"][] = "ramal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ramal", $tdatadesvios[".allSearchFields"]))
{
	$tdatadesvios[".allSearchFields"][] = "ramal";	
}
$tdatadesvios[".globSearchFields"][] = "destino";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("destino", $tdatadesvios[".allSearchFields"]))
{
	$tdatadesvios[".allSearchFields"][] = "destino";	
}


$tdatadesvios[".isDynamicPerm"] = true;

	

$tdatadesvios[".isDisplayLoading"] = true;

$tdatadesvios[".isResizeColumns"] = false;


$tdatadesvios[".createLoginPage"] = true;


 	




$tdatadesvios[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatadesvios[".strOrderBy"] = $gstrOrderBy;
	
$tdatadesvios[".orderindexes"] = array();

$tdatadesvios[".sqlHead"] = "SELECT ramal,  destino,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  hr_inicio,  hr_fim,  id_desvio";

$tdatadesvios[".sqlFrom"] = "FROM desvios";

$tdatadesvios[".sqlWhereExpr"] = "";

$tdatadesvios[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_desvio";
	$tdatadesvios[".Keys"]=$tableKeys;

	
//	ramal
	$fdata = array();
	$fdata["strName"] = "ramal";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ramal";
		$fdata["FullName"]= "ramal";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["ramal"]=$fdata;
	
//	destino
	$fdata = array();
	$fdata["strName"] = "destino";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "destino";
		$fdata["FullName"]= "destino";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["destino"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Segunda-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "seg";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["seg"]=$fdata;
	
//	ter
	$fdata = array();
	$fdata["strName"] = "ter";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Terça-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "ter";
		$fdata["FullName"]= "ter";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["ter"]=$fdata;
	
//	qua
	$fdata = array();
	$fdata["strName"] = "qua";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Quarta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qua";
		$fdata["FullName"]= "qua";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["qua"]=$fdata;
	
//	qui
	$fdata = array();
	$fdata["strName"] = "qui";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Quinta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "qui";
		$fdata["FullName"]= "qui";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["qui"]=$fdata;
	
//	sex
	$fdata = array();
	$fdata["strName"] = "sex";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Sexta-Feira"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sex";
		$fdata["FullName"]= "sex";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["sex"]=$fdata;
	
//	sab
	$fdata = array();
	$fdata["strName"] = "sab";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Sábado"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "sab";
		$fdata["FullName"]= "sab";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["sab"]=$fdata;
	
//	dom
	$fdata = array();
	$fdata["strName"] = "dom";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Domingo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "dom";
		$fdata["FullName"]= "dom";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadesvios["dom"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Hora Início"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatadesvios["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Hora Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatadesvios["hr_fim"]=$fdata;
	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "desvios";
		$fdata["Label"]="Desvio"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desvio";
		$fdata["FullName"]= "id_desvio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
											$tdatadesvios["id_desvio"]=$fdata;

	
$tables_data["desvios"]=&$tdatadesvios;
$field_labels["desvios"] = &$fieldLabelsdesvios;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["desvios"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["desvios"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1839=array();
$proto1839["m_strHead"] = "SELECT";
$proto1839["m_strFieldList"] = "ramal,  destino,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  hr_inicio,  hr_fim,  id_desvio";
$proto1839["m_strFrom"] = "FROM desvios";
$proto1839["m_strWhere"] = "";
$proto1839["m_strOrderBy"] = "";
$proto1839["m_strTail"] = "";
$proto1840=array();
$proto1840["m_sql"] = "";
$proto1840["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1840["m_column"]=$obj;
$proto1840["m_contained"] = array();
$proto1840["m_strCase"] = "";
$proto1840["m_havingmode"] = "0";
$proto1840["m_inBrackets"] = "0";
$proto1840["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1840);

$proto1839["m_where"] = $obj;
$proto1842=array();
$proto1842["m_sql"] = "";
$proto1842["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1842["m_column"]=$obj;
$proto1842["m_contained"] = array();
$proto1842["m_strCase"] = "";
$proto1842["m_havingmode"] = "0";
$proto1842["m_inBrackets"] = "0";
$proto1842["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1842);

$proto1839["m_having"] = $obj;
$proto1839["m_fieldlist"] = array();
						$proto1844=array();
			$obj = new SQLField(array(
	"m_strName" => "ramal",
	"m_strTable" => "desvios"
));

$proto1844["m_expr"]=$obj;
$proto1844["m_alias"] = "";
$obj = new SQLFieldListItem($proto1844);

$proto1839["m_fieldlist"][]=$obj;
						$proto1846=array();
			$obj = new SQLField(array(
	"m_strName" => "destino",
	"m_strTable" => "desvios"
));

$proto1846["m_expr"]=$obj;
$proto1846["m_alias"] = "";
$obj = new SQLFieldListItem($proto1846);

$proto1839["m_fieldlist"][]=$obj;
						$proto1848=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "desvios"
));

$proto1848["m_expr"]=$obj;
$proto1848["m_alias"] = "";
$obj = new SQLFieldListItem($proto1848);

$proto1839["m_fieldlist"][]=$obj;
						$proto1850=array();
			$obj = new SQLField(array(
	"m_strName" => "ter",
	"m_strTable" => "desvios"
));

$proto1850["m_expr"]=$obj;
$proto1850["m_alias"] = "";
$obj = new SQLFieldListItem($proto1850);

$proto1839["m_fieldlist"][]=$obj;
						$proto1852=array();
			$obj = new SQLField(array(
	"m_strName" => "qua",
	"m_strTable" => "desvios"
));

$proto1852["m_expr"]=$obj;
$proto1852["m_alias"] = "";
$obj = new SQLFieldListItem($proto1852);

$proto1839["m_fieldlist"][]=$obj;
						$proto1854=array();
			$obj = new SQLField(array(
	"m_strName" => "qui",
	"m_strTable" => "desvios"
));

$proto1854["m_expr"]=$obj;
$proto1854["m_alias"] = "";
$obj = new SQLFieldListItem($proto1854);

$proto1839["m_fieldlist"][]=$obj;
						$proto1856=array();
			$obj = new SQLField(array(
	"m_strName" => "sex",
	"m_strTable" => "desvios"
));

$proto1856["m_expr"]=$obj;
$proto1856["m_alias"] = "";
$obj = new SQLFieldListItem($proto1856);

$proto1839["m_fieldlist"][]=$obj;
						$proto1858=array();
			$obj = new SQLField(array(
	"m_strName" => "sab",
	"m_strTable" => "desvios"
));

$proto1858["m_expr"]=$obj;
$proto1858["m_alias"] = "";
$obj = new SQLFieldListItem($proto1858);

$proto1839["m_fieldlist"][]=$obj;
						$proto1860=array();
			$obj = new SQLField(array(
	"m_strName" => "dom",
	"m_strTable" => "desvios"
));

$proto1860["m_expr"]=$obj;
$proto1860["m_alias"] = "";
$obj = new SQLFieldListItem($proto1860);

$proto1839["m_fieldlist"][]=$obj;
						$proto1862=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "desvios"
));

$proto1862["m_expr"]=$obj;
$proto1862["m_alias"] = "";
$obj = new SQLFieldListItem($proto1862);

$proto1839["m_fieldlist"][]=$obj;
						$proto1864=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "desvios"
));

$proto1864["m_expr"]=$obj;
$proto1864["m_alias"] = "";
$obj = new SQLFieldListItem($proto1864);

$proto1839["m_fieldlist"][]=$obj;
						$proto1866=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "desvios"
));

$proto1866["m_expr"]=$obj;
$proto1866["m_alias"] = "";
$obj = new SQLFieldListItem($proto1866);

$proto1839["m_fieldlist"][]=$obj;
$proto1839["m_fromlist"] = array();
												$proto1868=array();
$proto1868["m_link"] = "SQLL_MAIN";
			$proto1869=array();
$proto1869["m_strName"] = "desvios";
$proto1869["m_columns"] = array();
$proto1869["m_columns"][] = "id_desvio";
$proto1869["m_columns"][] = "ramal";
$proto1869["m_columns"][] = "destino";
$proto1869["m_columns"][] = "seg";
$proto1869["m_columns"][] = "ter";
$proto1869["m_columns"][] = "qua";
$proto1869["m_columns"][] = "qui";
$proto1869["m_columns"][] = "sex";
$proto1869["m_columns"][] = "sab";
$proto1869["m_columns"][] = "dom";
$proto1869["m_columns"][] = "hr_inicio";
$proto1869["m_columns"][] = "hr_fim";
$obj = new SQLTable($proto1869);

$proto1868["m_table"] = $obj;
$proto1868["m_alias"] = "";
$proto1870=array();
$proto1870["m_sql"] = "";
$proto1870["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1870["m_column"]=$obj;
$proto1870["m_contained"] = array();
$proto1870["m_strCase"] = "";
$proto1870["m_havingmode"] = "0";
$proto1870["m_inBrackets"] = "0";
$proto1870["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1870);

$proto1868["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1868);

$proto1839["m_fromlist"][]=$obj;
$proto1839["m_groupby"] = array();
$proto1839["m_orderby"] = array();
$obj = new SQLQuery($proto1839);

$queryData_desvios = $obj;
$tdatadesvios[".sqlquery"] = $queryData_desvios;



?>
