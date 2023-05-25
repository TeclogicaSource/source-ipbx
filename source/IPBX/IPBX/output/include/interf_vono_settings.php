<?php

//	field labels
$fieldLabelsinterf_vono = array();
$fieldLabelsinterf_vono["Portuguese(Brazil)"]=array();
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["id_interf_vono"] = "Id Interf Vono";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["id_contrato"] = "Id Contrato";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["usuario"] = "Usuario";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["ip_host"] = "Ip Host";
$fieldLabelsinterf_vono["Portuguese(Brazil)"]["id_central"] = "Id Central";


$tdatainterf_vono=array();
	$tdatainterf_vono[".NumberOfChars"]=80; 
	$tdatainterf_vono[".ShortName"]="interf_vono";
	$tdatainterf_vono[".OwnerID"]="";
	$tdatainterf_vono[".OriginalTable"]="interf_vono";
	$tdatainterf_vono[".NCSearch"]=true;
	

$tdatainterf_vono[".shortTableName"] = "interf_vono";
$tdatainterf_vono[".dataSourceTable"] = "interf_vono";
$tdatainterf_vono[".nSecOptions"] = 0;
$tdatainterf_vono[".nLoginMethod"] = 1;
$tdatainterf_vono[".recsPerRowList"] = 1;	
$tdatainterf_vono[".tableGroupBy"] = "0";
$tdatainterf_vono[".dbType"] = 0;
$tdatainterf_vono[".mainTableOwnerID"] = "";
$tdatainterf_vono[".moveNext"] = 1;

$tdatainterf_vono[".listAjax"] = false;

	$tdatainterf_vono[".audit"] = false;

	$tdatainterf_vono[".locking"] = false;
	
$tdatainterf_vono[".listIcons"] = true;
$tdatainterf_vono[".inlineEdit"] = true;



$tdatainterf_vono[".delete"] = true;

$tdatainterf_vono[".showSimpleSearchOptions"] = false;

$tdatainterf_vono[".showSearchPanel"] = true;


$tdatainterf_vono[".isUseAjaxSuggest"] = true;

$tdatainterf_vono[".rowHighlite"] = true;

$tdatainterf_vono[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatainterf_vono[".arrKeyFields"][] = "id_interf_vono";

// use datepicker for search panel
$tdatainterf_vono[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatainterf_vono[".isUseTimeForSearch"] = false;





$tdatainterf_vono[".isUseInlineAdd"] = true;

$tdatainterf_vono[".isUseInlineEdit"] = true;
$tdatainterf_vono[".isUseInlineJs"] = $tdatainterf_vono[".isUseInlineAdd"] || $tdatainterf_vono[".isUseInlineEdit"];

$tdatainterf_vono[".allSearchFields"] = array();



$tdatainterf_vono[".isDynamicPerm"] = true;

	

$tdatainterf_vono[".isDisplayLoading"] = true;

$tdatainterf_vono[".isResizeColumns"] = false;


$tdatainterf_vono[".createLoginPage"] = true;


 	




$tdatainterf_vono[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatainterf_vono[".strOrderBy"] = $gstrOrderBy;
	
$tdatainterf_vono[".orderindexes"] = array();

$tdatainterf_vono[".sqlHead"] = "SELECT id_interf_vono,   id_contrato,   codec,   usuario,   senha,   ip_host,   id_central";

$tdatainterf_vono[".sqlFrom"] = "FROM interf_vono";

$tdatainterf_vono[".sqlWhereExpr"] = "";

$tdatainterf_vono[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf_vono";
	$tdatainterf_vono[".Keys"]=$tableKeys;

	
//	id_interf_vono
	$fdata = array();
	$fdata["strName"] = "id_interf_vono";
	$fdata["ownerTable"] = "interf_vono";
		$fdata["Label"]="Id Interf Vono"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf_vono";
		$fdata["FullName"]= "id_interf_vono";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatainterf_vono["id_interf_vono"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "interf_vono";
		$fdata["Label"]="Id Contrato"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatainterf_vono["id_contrato"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "interf_vono";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatainterf_vono["codec"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "interf_vono";
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
			$tdatainterf_vono["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "interf_vono";
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
			$tdatainterf_vono["senha"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "interf_vono";
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
			$tdatainterf_vono["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "interf_vono";
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
			
											$tdatainterf_vono["id_central"]=$fdata;

	
$tables_data["interf_vono"]=&$tdatainterf_vono;
$field_labels["interf_vono"] = &$fieldLabelsinterf_vono;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["interf_vono"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["interf_vono"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["interf_vono"][$mIndex] = array(
		  "mDataSourceTable"=>"central"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "central"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["interf_vono"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["interf_vono"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto526=array();
$proto526["m_strHead"] = "SELECT";
$proto526["m_strFieldList"] = "id_interf_vono,   id_contrato,   codec,   usuario,   senha,   ip_host,   id_central";
$proto526["m_strFrom"] = "FROM interf_vono";
$proto526["m_strWhere"] = "";
$proto526["m_strOrderBy"] = "";
$proto526["m_strTail"] = "";
$proto527=array();
$proto527["m_sql"] = "";
$proto527["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto527["m_column"]=$obj;
$proto527["m_contained"] = array();
$proto527["m_strCase"] = "";
$proto527["m_havingmode"] = "0";
$proto527["m_inBrackets"] = "0";
$proto527["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto527);

$proto526["m_where"] = $obj;
$proto529=array();
$proto529["m_sql"] = "";
$proto529["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto529["m_column"]=$obj;
$proto529["m_contained"] = array();
$proto529["m_strCase"] = "";
$proto529["m_havingmode"] = "0";
$proto529["m_inBrackets"] = "0";
$proto529["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto529);

$proto526["m_having"] = $obj;
$proto526["m_fieldlist"] = array();
						$proto531=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf_vono",
	"m_strTable" => "interf_vono"
));

$proto531["m_expr"]=$obj;
$proto531["m_alias"] = "";
$obj = new SQLFieldListItem($proto531);

$proto526["m_fieldlist"][]=$obj;
						$proto533=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "interf_vono"
));

$proto533["m_expr"]=$obj;
$proto533["m_alias"] = "";
$obj = new SQLFieldListItem($proto533);

$proto526["m_fieldlist"][]=$obj;
						$proto535=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "interf_vono"
));

$proto535["m_expr"]=$obj;
$proto535["m_alias"] = "";
$obj = new SQLFieldListItem($proto535);

$proto526["m_fieldlist"][]=$obj;
						$proto537=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "interf_vono"
));

$proto537["m_expr"]=$obj;
$proto537["m_alias"] = "";
$obj = new SQLFieldListItem($proto537);

$proto526["m_fieldlist"][]=$obj;
						$proto539=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "interf_vono"
));

$proto539["m_expr"]=$obj;
$proto539["m_alias"] = "";
$obj = new SQLFieldListItem($proto539);

$proto526["m_fieldlist"][]=$obj;
						$proto541=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "interf_vono"
));

$proto541["m_expr"]=$obj;
$proto541["m_alias"] = "";
$obj = new SQLFieldListItem($proto541);

$proto526["m_fieldlist"][]=$obj;
						$proto543=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "interf_vono"
));

$proto543["m_expr"]=$obj;
$proto543["m_alias"] = "";
$obj = new SQLFieldListItem($proto543);

$proto526["m_fieldlist"][]=$obj;
$proto526["m_fromlist"] = array();
												$proto545=array();
$proto545["m_link"] = "SQLL_MAIN";
			$proto546=array();
$proto546["m_strName"] = "interf_vono";
$proto546["m_columns"] = array();
$proto546["m_columns"][] = "id_interf_vono";
$proto546["m_columns"][] = "id_contrato";
$proto546["m_columns"][] = "codec";
$proto546["m_columns"][] = "usuario";
$proto546["m_columns"][] = "senha";
$proto546["m_columns"][] = "ip_host";
$proto546["m_columns"][] = "id_central";
$obj = new SQLTable($proto546);

$proto545["m_table"] = $obj;
$proto545["m_alias"] = "";
$proto547=array();
$proto547["m_sql"] = "";
$proto547["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto547["m_column"]=$obj;
$proto547["m_contained"] = array();
$proto547["m_strCase"] = "";
$proto547["m_havingmode"] = "0";
$proto547["m_inBrackets"] = "0";
$proto547["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto547);

$proto545["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto545);

$proto526["m_fromlist"][]=$obj;
$proto526["m_groupby"] = array();
$proto526["m_orderby"] = array();
$obj = new SQLQuery($proto526);

$queryData_interf_vono = $obj;
$tdatainterf_vono[".sqlquery"] = $queryData_interf_vono;



?>
