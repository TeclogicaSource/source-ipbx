<?php

//	field labels
$fieldLabelsipbx_painel_op = array();
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]["id_painel_op"] = "Id Painel Op";
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]["dsc_painel"] = "Descrição";
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]["privilegios"] = "Privilégios";
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]["usuarios"] = "Usuários";
$fieldLabelsipbx_painel_op["Portuguese(Brazil)"]["fila"] = "Fila";


$tdataipbx_painel_op=array();
	$tdataipbx_painel_op[".NumberOfChars"]=80; 
	$tdataipbx_painel_op[".ShortName"]="ipbx_painel_op";
	$tdataipbx_painel_op[".OwnerID"]="";
	$tdataipbx_painel_op[".OriginalTable"]="ipbx_painel_op";
	$tdataipbx_painel_op[".NCSearch"]=true;
	

$tdataipbx_painel_op[".shortTableName"] = "ipbx_painel_op";
$tdataipbx_painel_op[".dataSourceTable"] = "ipbx_painel_op";
$tdataipbx_painel_op[".nSecOptions"] = 0;
$tdataipbx_painel_op[".nLoginMethod"] = 1;
$tdataipbx_painel_op[".recsPerRowList"] = 1;	
$tdataipbx_painel_op[".tableGroupBy"] = "0";
$tdataipbx_painel_op[".dbType"] = 0;
$tdataipbx_painel_op[".mainTableOwnerID"] = "";
$tdataipbx_painel_op[".moveNext"] = 1;

$tdataipbx_painel_op[".listAjax"] = false;

	$tdataipbx_painel_op[".audit"] = true;

	$tdataipbx_painel_op[".locking"] = false;
	
$tdataipbx_painel_op[".listIcons"] = true;
$tdataipbx_painel_op[".edit"] = true;



$tdataipbx_painel_op[".delete"] = true;

$tdataipbx_painel_op[".showSimpleSearchOptions"] = false;

$tdataipbx_painel_op[".showSearchPanel"] = true;


$tdataipbx_painel_op[".isUseAjaxSuggest"] = true;

$tdataipbx_painel_op[".rowHighlite"] = true;

$tdataipbx_painel_op[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_painel_op[".arrKeyFields"][] = "id_painel_op";

// use datepicker for search panel
$tdataipbx_painel_op[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_painel_op[".isUseTimeForSearch"] = false;






$tdataipbx_painel_op[".isUseInlineJs"] = $tdataipbx_painel_op[".isUseInlineAdd"] || $tdataipbx_painel_op[".isUseInlineEdit"];

$tdataipbx_painel_op[".allSearchFields"] = array();

$tdataipbx_painel_op[".globSearchFields"][] = "id_painel_op";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_painel_op", $tdataipbx_painel_op[".allSearchFields"]))
{
	$tdataipbx_painel_op[".allSearchFields"][] = "id_painel_op";	
}
$tdataipbx_painel_op[".globSearchFields"][] = "dsc_painel";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_painel", $tdataipbx_painel_op[".allSearchFields"]))
{
	$tdataipbx_painel_op[".allSearchFields"][] = "dsc_painel";	
}
$tdataipbx_painel_op[".globSearchFields"][] = "privilegios";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("privilegios", $tdataipbx_painel_op[".allSearchFields"]))
{
	$tdataipbx_painel_op[".allSearchFields"][] = "privilegios";	
}


$tdataipbx_painel_op[".isDynamicPerm"] = true;

	

$tdataipbx_painel_op[".isDisplayLoading"] = true;

$tdataipbx_painel_op[".isResizeColumns"] = false;


$tdataipbx_painel_op[".createLoginPage"] = true;


 	




$tdataipbx_painel_op[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_painel_op[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_painel_op[".orderindexes"] = array();

$tdataipbx_painel_op[".sqlHead"] = "SELECT id_painel_op,   dsc_painel,   privilegios,   usuarios,   fila";

$tdataipbx_painel_op[".sqlFrom"] = "FROM ipbx_painel_op";

$tdataipbx_painel_op[".sqlWhereExpr"] = "";

$tdataipbx_painel_op[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_painel_op";
	$tdataipbx_painel_op[".Keys"]=$tableKeys;

	
//	id_painel_op
	$fdata = array();
	$fdata["strName"] = "id_painel_op";
	$fdata["ownerTable"] = "ipbx_painel_op";
		$fdata["Label"]="Id Painel Op"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_painel_op";
		$fdata["FullName"]= "id_painel_op";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_painel_op["id_painel_op"]=$fdata;
	
//	dsc_painel
	$fdata = array();
	$fdata["strName"] = "dsc_painel";
	$fdata["ownerTable"] = "ipbx_painel_op";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_painel";
		$fdata["FullName"]= "dsc_painel";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_painel_op["dsc_painel"]=$fdata;
	
//	privilegios
	$fdata = array();
	$fdata["strName"] = "privilegios";
	$fdata["ownerTable"] = "ipbx_painel_op";
		$fdata["Label"]="Privilégios"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
			$fdata["LCType"]= 3;
		
					
	$fdata["LinkField"]="privilegio";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="dsc_priv";
				$fdata["LookupTable"]="ipbx_painel_op_privs";
	$fdata["LookupOrderBy"]="dsc_priv";
						
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 10;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "privilegios";
		$fdata["FullName"]= "privilegios";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_painel_op["privilegios"]=$fdata;
	
//	usuarios
	$fdata = array();
	$fdata["strName"] = "usuarios";
	$fdata["ownerTable"] = "ipbx_painel_op";
		$fdata["Label"]="Usuários"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name, '-', callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = " callerid IS NOT NULL";

				
										
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 20;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuarios";
		$fdata["FullName"]= "usuarios";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_painel_op["usuarios"]=$fdata;
	
//	fila
	$fdata = array();
	$fdata["strName"] = "fila";
	$fdata["ownerTable"] = "ipbx_painel_op";
		$fdata["Label"]="Fila"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="name";
				$fdata["LookupTable"]="queue_table";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 10;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "fila";
		$fdata["FullName"]= "fila";
						$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_painel_op["fila"]=$fdata;

	
$tables_data["ipbx_painel_op"]=&$tdataipbx_painel_op;
$field_labels["ipbx_painel_op"] = &$fieldLabelsipbx_painel_op;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_painel_op"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_painel_op"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1447=array();
$proto1447["m_strHead"] = "SELECT";
$proto1447["m_strFieldList"] = "id_painel_op,   dsc_painel,   privilegios,   usuarios,   fila";
$proto1447["m_strFrom"] = "FROM ipbx_painel_op";
$proto1447["m_strWhere"] = "";
$proto1447["m_strOrderBy"] = "";
$proto1447["m_strTail"] = "";
$proto1448=array();
$proto1448["m_sql"] = "";
$proto1448["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1448["m_column"]=$obj;
$proto1448["m_contained"] = array();
$proto1448["m_strCase"] = "";
$proto1448["m_havingmode"] = "0";
$proto1448["m_inBrackets"] = "0";
$proto1448["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1448);

$proto1447["m_where"] = $obj;
$proto1450=array();
$proto1450["m_sql"] = "";
$proto1450["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1450["m_column"]=$obj;
$proto1450["m_contained"] = array();
$proto1450["m_strCase"] = "";
$proto1450["m_havingmode"] = "0";
$proto1450["m_inBrackets"] = "0";
$proto1450["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1450);

$proto1447["m_having"] = $obj;
$proto1447["m_fieldlist"] = array();
						$proto1452=array();
			$obj = new SQLField(array(
	"m_strName" => "id_painel_op",
	"m_strTable" => "ipbx_painel_op"
));

$proto1452["m_expr"]=$obj;
$proto1452["m_alias"] = "";
$obj = new SQLFieldListItem($proto1452);

$proto1447["m_fieldlist"][]=$obj;
						$proto1454=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_painel",
	"m_strTable" => "ipbx_painel_op"
));

$proto1454["m_expr"]=$obj;
$proto1454["m_alias"] = "";
$obj = new SQLFieldListItem($proto1454);

$proto1447["m_fieldlist"][]=$obj;
						$proto1456=array();
			$obj = new SQLField(array(
	"m_strName" => "privilegios",
	"m_strTable" => "ipbx_painel_op"
));

$proto1456["m_expr"]=$obj;
$proto1456["m_alias"] = "";
$obj = new SQLFieldListItem($proto1456);

$proto1447["m_fieldlist"][]=$obj;
						$proto1458=array();
			$obj = new SQLField(array(
	"m_strName" => "usuarios",
	"m_strTable" => "ipbx_painel_op"
));

$proto1458["m_expr"]=$obj;
$proto1458["m_alias"] = "";
$obj = new SQLFieldListItem($proto1458);

$proto1447["m_fieldlist"][]=$obj;
						$proto1460=array();
			$obj = new SQLField(array(
	"m_strName" => "fila",
	"m_strTable" => "ipbx_painel_op"
));

$proto1460["m_expr"]=$obj;
$proto1460["m_alias"] = "";
$obj = new SQLFieldListItem($proto1460);

$proto1447["m_fieldlist"][]=$obj;
$proto1447["m_fromlist"] = array();
												$proto1462=array();
$proto1462["m_link"] = "SQLL_MAIN";
			$proto1463=array();
$proto1463["m_strName"] = "ipbx_painel_op";
$proto1463["m_columns"] = array();
$proto1463["m_columns"][] = "id_painel_op";
$proto1463["m_columns"][] = "dsc_painel";
$proto1463["m_columns"][] = "privilegios";
$proto1463["m_columns"][] = "usuarios";
$proto1463["m_columns"][] = "fila";
$obj = new SQLTable($proto1463);

$proto1462["m_table"] = $obj;
$proto1462["m_alias"] = "";
$proto1464=array();
$proto1464["m_sql"] = "";
$proto1464["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1464["m_column"]=$obj;
$proto1464["m_contained"] = array();
$proto1464["m_strCase"] = "";
$proto1464["m_havingmode"] = "0";
$proto1464["m_inBrackets"] = "0";
$proto1464["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1464);

$proto1462["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1462);

$proto1447["m_fromlist"][]=$obj;
$proto1447["m_groupby"] = array();
$proto1447["m_orderby"] = array();
$obj = new SQLQuery($proto1447);

$queryData_ipbx_painel_op = $obj;
$tdataipbx_painel_op[".sqlquery"] = $queryData_ipbx_painel_op;



?>
