<?php

//	field labels
$fieldLabelssip_users_horario = array();
$fieldLabelssip_users_horario["Portuguese(Brazil)"]=array();
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["id"] = "Id";
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["id_horario"] = "Id Horario";
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["hr_inicio"] = "Hr Inicio";
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["hr_fim"] = "Hr Fim";
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["seg"] = "Seg";
$fieldLabelssip_users_horario["Portuguese(Brazil)"]["dsc_plano"] = "Dsc Plano";


$tdatasip_users_horario=array();
	$tdatasip_users_horario[".NumberOfChars"]=80; 
	$tdatasip_users_horario[".ShortName"]="sip_users_horario";
	$tdatasip_users_horario[".OwnerID"]="";
	$tdatasip_users_horario[".OriginalTable"]="sip_users_horario";
	$tdatasip_users_horario[".NCSearch"]=true;
	

$tdatasip_users_horario[".shortTableName"] = "sip_users_horario";
$tdatasip_users_horario[".dataSourceTable"] = "sip_users_horario";
$tdatasip_users_horario[".nSecOptions"] = 0;
$tdatasip_users_horario[".nLoginMethod"] = 1;
$tdatasip_users_horario[".recsPerRowList"] = 1;	
$tdatasip_users_horario[".tableGroupBy"] = "0";
$tdatasip_users_horario[".dbType"] = 0;
$tdatasip_users_horario[".mainTableOwnerID"] = "";
$tdatasip_users_horario[".moveNext"] = 1;

$tdatasip_users_horario[".listAjax"] = false;

	$tdatasip_users_horario[".audit"] = false;

	$tdatasip_users_horario[".locking"] = false;
	
$tdatasip_users_horario[".listIcons"] = true;
$tdatasip_users_horario[".edit"] = true;



$tdatasip_users_horario[".delete"] = true;

$tdatasip_users_horario[".showSimpleSearchOptions"] = false;

$tdatasip_users_horario[".showSearchPanel"] = true;


$tdatasip_users_horario[".isUseAjaxSuggest"] = true;

$tdatasip_users_horario[".rowHighlite"] = true;


// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasip_users_horario[".arrKeyFields"][] = "id";
$tdatasip_users_horario[".arrKeyFields"][] = "id_horario";

// use datepicker for search panel
$tdatasip_users_horario[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasip_users_horario[".isUseTimeForSearch"] = true;






$tdatasip_users_horario[".isUseInlineJs"] = $tdatasip_users_horario[".isUseInlineAdd"] || $tdatasip_users_horario[".isUseInlineEdit"];

$tdatasip_users_horario[".allSearchFields"] = array();

$tdatasip_users_horario[".globSearchFields"][] = "dsc_plano";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_plano", $tdatasip_users_horario[".allSearchFields"]))
{
	$tdatasip_users_horario[".allSearchFields"][] = "dsc_plano";	
}


$tdatasip_users_horario[".isDynamicPerm"] = true;

	

$tdatasip_users_horario[".isDisplayLoading"] = true;

$tdatasip_users_horario[".isResizeColumns"] = false;


$tdatasip_users_horario[".createLoginPage"] = true;


 	




$tdatasip_users_horario[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasip_users_horario[".strOrderBy"] = $gstrOrderBy;
	
$tdatasip_users_horario[".orderindexes"] = array();

$tdatasip_users_horario[".sqlHead"] = "SELECT sip_users_horario.id,  sip_users_horario.id_horario,  sip_users_horario.dsc_plano,  horario.hr_inicio,  horario.hr_fim,  horario.seg";

$tdatasip_users_horario[".sqlFrom"] = "FROM sip_users_horario  INNER JOIN horario ON sip_users_horario.id_horario = horario.id_horario";

$tdatasip_users_horario[".sqlWhereExpr"] = "";

$tdatasip_users_horario[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id";
	$tableKeys[]="id_horario";
	$tdatasip_users_horario[".Keys"]=$tableKeys;

	
//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "sip_users_horario";
		$fdata["Label"]="Id"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="callerid";
				$fdata["LookupTable"]="sip_users";
	$fdata["LookupOrderBy"]="callerid";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
		$fdata["FullName"]= "sip_users_horario.id";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_horario["id"]=$fdata;
	
//	id_horario
	$fdata = array();
	$fdata["strName"] = "id_horario";
	$fdata["ownerTable"] = "sip_users_horario";
		$fdata["Label"]="Id Horario"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_horario";
		$fdata["FullName"]= "sip_users_horario.id_horario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdatasip_users_horario["id_horario"]=$fdata;
	
//	dsc_plano
	$fdata = array();
	$fdata["strName"] = "dsc_plano";
	$fdata["ownerTable"] = "sip_users_horario";
		$fdata["Label"]="Dsc Plano"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_plano";
		$fdata["FullName"]= "sip_users_horario.dsc_plano";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_horario["dsc_plano"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Hr Inicio"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "horario.hr_inicio";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatasip_users_horario["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Hr Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "horario.hr_fim";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
				$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 30,
										  "showSeconds" => 0);
	$tdatasip_users_horario["hr_fim"]=$fdata;
	
//	seg
	$fdata = array();
	$fdata["strName"] = "seg";
	$fdata["ownerTable"] = "horario";
		$fdata["Label"]="Seg"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "seg";
		$fdata["FullName"]= "horario.seg";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_horario["seg"]=$fdata;

	
$tables_data["sip_users_horario"]=&$tdatasip_users_horario;
$field_labels["sip_users_horario"] = &$fieldLabelssip_users_horario;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sip_users_horario"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sip_users_horario"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="horario";
	$masterTablesData["sip_users_horario"][$mIndex] = array(
		  "mDataSourceTable"=>"horario"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "horario"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 1
	);	
		$masterTablesData["sip_users_horario"][$mIndex]["masterKeys"][]="id_horario";
		$masterTablesData["sip_users_horario"][$mIndex]["detailKeys"][]="id_horario";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "sip_users_horario.id,  sip_users_horario.id_horario,  sip_users_horario.dsc_plano,  horario.hr_inicio,  horario.hr_fim,  horario.seg";
$proto0["m_strFrom"] = "FROM sip_users_horario  INNER JOIN horario ON sip_users_horario.id_horario = horario.id_horario";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "sip_users_horario"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "sip_users_horario"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_plano",
	"m_strTable" => "sip_users_horario"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "horario"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "horario"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "seg",
	"m_strTable" => "horario"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "sip_users_horario";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "id";
$proto18["m_columns"][] = "id_horario";
$proto18["m_columns"][] = "dsc_plano";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
												$proto21=array();
$proto21["m_link"] = "SQLL_INNERJOIN";
			$proto22=array();
$proto22["m_strName"] = "horario";
$proto22["m_columns"] = array();
$proto22["m_columns"][] = "id_horario";
$proto22["m_columns"][] = "hr_inicio";
$proto22["m_columns"][] = "hr_fim";
$proto22["m_columns"][] = "seg";
$proto22["m_columns"][] = "ter";
$proto22["m_columns"][] = "qua";
$proto22["m_columns"][] = "qui";
$proto22["m_columns"][] = "sex";
$proto22["m_columns"][] = "sab";
$proto22["m_columns"][] = "dom";
$proto22["m_columns"][] = "id";
$obj = new SQLTable($proto22);

$proto21["m_table"] = $obj;
$proto21["m_alias"] = "";
$proto23=array();
$proto23["m_sql"] = "sip_users_horario.id_horario = horario.id_horario";
$proto23["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "sip_users_horario"
));

$proto23["m_column"]=$obj;
$proto23["m_contained"] = array();
$proto23["m_strCase"] = "= horario.id_horario";
$proto23["m_havingmode"] = "0";
$proto23["m_inBrackets"] = "0";
$proto23["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto23);

$proto21["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto21);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

$queryData_sip_users_horario = $obj;
$tdatasip_users_horario[".sqlquery"] = $queryData_sip_users_horario;



?>
