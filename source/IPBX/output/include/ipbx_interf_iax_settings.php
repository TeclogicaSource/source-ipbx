<?php

//	field labels
$fieldLabelsipbx_interf_iax = array();
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["dsc_interf"] = "Descrição da Interface";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["id_contrato"] = "Id Contrato";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["usuario"] = "Usuario";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["ip_host"] = "Ip Host";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["id_central"] = "Id Central";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsipbx_interf_iax["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";


$tdataipbx_interf_iax=array();
	$tdataipbx_interf_iax[".NumberOfChars"]=80; 
	$tdataipbx_interf_iax[".ShortName"]="ipbx_interf_iax";
	$tdataipbx_interf_iax[".OwnerID"]="";
	$tdataipbx_interf_iax[".OriginalTable"]="ipbx_interf_iax";
	$tdataipbx_interf_iax[".NCSearch"]=true;
	

$tdataipbx_interf_iax[".shortTableName"] = "ipbx_interf_iax";
$tdataipbx_interf_iax[".dataSourceTable"] = "ipbx_interf_iax";
$tdataipbx_interf_iax[".nSecOptions"] = 0;
$tdataipbx_interf_iax[".nLoginMethod"] = 1;
$tdataipbx_interf_iax[".recsPerRowList"] = 1;	
$tdataipbx_interf_iax[".tableGroupBy"] = "0";
$tdataipbx_interf_iax[".dbType"] = 0;
$tdataipbx_interf_iax[".mainTableOwnerID"] = "";
$tdataipbx_interf_iax[".moveNext"] = 1;

$tdataipbx_interf_iax[".listAjax"] = false;

	$tdataipbx_interf_iax[".audit"] = false;

	$tdataipbx_interf_iax[".locking"] = false;
	
$tdataipbx_interf_iax[".listIcons"] = true;

$tdataipbx_interf_iax[".exportTo"] = true;

$tdataipbx_interf_iax[".printFriendly"] = true;


$tdataipbx_interf_iax[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_iax[".showSearchPanel"] = true;


$tdataipbx_interf_iax[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_iax[".rowHighlite"] = true;

$tdataipbx_interf_iax[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataipbx_interf_iax[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_iax[".isUseTimeForSearch"] = false;






$tdataipbx_interf_iax[".isUseInlineJs"] = $tdataipbx_interf_iax[".isUseInlineAdd"] || $tdataipbx_interf_iax[".isUseInlineEdit"];

$tdataipbx_interf_iax[".allSearchFields"] = array();

$tdataipbx_interf_iax[".globSearchFields"][] = "id_interf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_interf", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "id_interf";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "dsc_interf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_interf", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "dsc_interf";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "id_contrato";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_contrato", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "id_contrato";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "usuario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("usuario", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "usuario";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "senha";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("senha", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "senha";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "ip_host";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ip_host", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "ip_host";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "id_central";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_central", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "id_central";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "codec";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("codec", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "codec";	
}
$tdataipbx_interf_iax[".globSearchFields"][] = "id_tp_interf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_tp_interf", $tdataipbx_interf_iax[".allSearchFields"]))
{
	$tdataipbx_interf_iax[".allSearchFields"][] = "id_tp_interf";	
}


$tdataipbx_interf_iax[".isDynamicPerm"] = true;

	

$tdataipbx_interf_iax[".isDisplayLoading"] = true;

$tdataipbx_interf_iax[".isResizeColumns"] = false;


$tdataipbx_interf_iax[".createLoginPage"] = true;


 	




$tdataipbx_interf_iax[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_iax[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_iax[".orderindexes"] = array();

$tdataipbx_interf_iax[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf";

$tdataipbx_interf_iax[".sqlFrom"] = "FROM ipbx_interf_iax";

$tdataipbx_interf_iax[".sqlWhereExpr"] = "";

$tdataipbx_interf_iax[".sqlTail"] = "";



	$tableKeys=array();
	$tdataipbx_interf_iax[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Descrição da Interface"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "dsc_interf";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["dsc_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Id Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["id_contrato"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Usuario"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["senha"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Ip Host"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_host";
		$fdata["FullName"]= "ip_host";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Id Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["id_central"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["codec"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_iax";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_iax["id_tp_interf"]=$fdata;

	
$tables_data["ipbx_interf_iax"]=&$tdataipbx_interf_iax;
$field_labels["ipbx_interf_iax"] = &$fieldLabelsipbx_interf_iax;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_iax"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_iax"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto599=array();
$proto599["m_strHead"] = "SELECT";
$proto599["m_strFieldList"] = "id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf";
$proto599["m_strFrom"] = "FROM ipbx_interf_iax";
$proto599["m_strWhere"] = "";
$proto599["m_strOrderBy"] = "";
$proto599["m_strTail"] = "";
$proto600=array();
$proto600["m_sql"] = "";
$proto600["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto600["m_column"]=$obj;
$proto600["m_contained"] = array();
$proto600["m_strCase"] = "";
$proto600["m_havingmode"] = "0";
$proto600["m_inBrackets"] = "0";
$proto600["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto600);

$proto599["m_where"] = $obj;
$proto602=array();
$proto602["m_sql"] = "";
$proto602["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto602["m_column"]=$obj;
$proto602["m_contained"] = array();
$proto602["m_strCase"] = "";
$proto602["m_havingmode"] = "0";
$proto602["m_inBrackets"] = "0";
$proto602["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto602);

$proto599["m_having"] = $obj;
$proto599["m_fieldlist"] = array();
						$proto604=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_iax"
));

$proto604["m_expr"]=$obj;
$proto604["m_alias"] = "";
$obj = new SQLFieldListItem($proto604);

$proto599["m_fieldlist"][]=$obj;
						$proto606=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_iax"
));

$proto606["m_expr"]=$obj;
$proto606["m_alias"] = "";
$obj = new SQLFieldListItem($proto606);

$proto599["m_fieldlist"][]=$obj;
						$proto608=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_iax"
));

$proto608["m_expr"]=$obj;
$proto608["m_alias"] = "";
$obj = new SQLFieldListItem($proto608);

$proto599["m_fieldlist"][]=$obj;
						$proto610=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "ipbx_interf_iax"
));

$proto610["m_expr"]=$obj;
$proto610["m_alias"] = "";
$obj = new SQLFieldListItem($proto610);

$proto599["m_fieldlist"][]=$obj;
						$proto612=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "ipbx_interf_iax"
));

$proto612["m_expr"]=$obj;
$proto612["m_alias"] = "";
$obj = new SQLFieldListItem($proto612);

$proto599["m_fieldlist"][]=$obj;
						$proto614=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "ipbx_interf_iax"
));

$proto614["m_expr"]=$obj;
$proto614["m_alias"] = "";
$obj = new SQLFieldListItem($proto614);

$proto599["m_fieldlist"][]=$obj;
						$proto616=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_iax"
));

$proto616["m_expr"]=$obj;
$proto616["m_alias"] = "";
$obj = new SQLFieldListItem($proto616);

$proto599["m_fieldlist"][]=$obj;
						$proto618=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "ipbx_interf_iax"
));

$proto618["m_expr"]=$obj;
$proto618["m_alias"] = "";
$obj = new SQLFieldListItem($proto618);

$proto599["m_fieldlist"][]=$obj;
						$proto620=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_iax"
));

$proto620["m_expr"]=$obj;
$proto620["m_alias"] = "";
$obj = new SQLFieldListItem($proto620);

$proto599["m_fieldlist"][]=$obj;
$proto599["m_fromlist"] = array();
												$proto622=array();
$proto622["m_link"] = "SQLL_MAIN";
			$proto623=array();
$proto623["m_strName"] = "ipbx_interf_iax";
$proto623["m_columns"] = array();
$proto623["m_columns"][] = "id_interf";
$proto623["m_columns"][] = "dsc_interf";
$proto623["m_columns"][] = "id_contrato";
$proto623["m_columns"][] = "usuario";
$proto623["m_columns"][] = "senha";
$proto623["m_columns"][] = "ip_host";
$proto623["m_columns"][] = "id_central";
$proto623["m_columns"][] = "codec";
$proto623["m_columns"][] = "id_tp_interf";
$obj = new SQLTable($proto623);

$proto622["m_table"] = $obj;
$proto622["m_alias"] = "";
$proto624=array();
$proto624["m_sql"] = "";
$proto624["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto624["m_column"]=$obj;
$proto624["m_contained"] = array();
$proto624["m_strCase"] = "";
$proto624["m_havingmode"] = "0";
$proto624["m_inBrackets"] = "0";
$proto624["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto624);

$proto622["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto622);

$proto599["m_fromlist"][]=$obj;
$proto599["m_groupby"] = array();
$proto599["m_orderby"] = array();
$obj = new SQLQuery($proto599);

$queryData_ipbx_interf_iax = $obj;
$tdataipbx_interf_iax[".sqlquery"] = $queryData_ipbx_interf_iax;



?>
