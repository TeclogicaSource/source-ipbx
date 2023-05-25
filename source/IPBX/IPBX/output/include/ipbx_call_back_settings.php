<?php

//	field labels
$fieldLabelsipbx_call_back = array();
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["id_call_back"] = "Identificação";
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["id_cod_gen"] = "Destino";
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["rdb_opcao"] = "Ação do item Call Back";
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["interface"] = "Interface";
$fieldLabelsipbx_call_back["Portuguese(Brazil)"]["nm_externo"] = "Numero Externo Autorizado";


$tdataipbx_call_back=array();
	$tdataipbx_call_back[".NumberOfChars"]=80; 
	$tdataipbx_call_back[".ShortName"]="ipbx_call_back";
	$tdataipbx_call_back[".OwnerID"]="";
	$tdataipbx_call_back[".OriginalTable"]="ipbx_call_back";
	$tdataipbx_call_back[".NCSearch"]=true;
	

$tdataipbx_call_back[".shortTableName"] = "ipbx_call_back";
$tdataipbx_call_back[".dataSourceTable"] = "ipbx_call_back";
$tdataipbx_call_back[".nSecOptions"] = 0;
$tdataipbx_call_back[".nLoginMethod"] = 1;
$tdataipbx_call_back[".recsPerRowList"] = 1;	
$tdataipbx_call_back[".tableGroupBy"] = "0";
$tdataipbx_call_back[".dbType"] = 0;
$tdataipbx_call_back[".mainTableOwnerID"] = "";
$tdataipbx_call_back[".moveNext"] = 1;

$tdataipbx_call_back[".listAjax"] = true;

	$tdataipbx_call_back[".audit"] = true;

	$tdataipbx_call_back[".locking"] = false;
	
$tdataipbx_call_back[".listIcons"] = true;
$tdataipbx_call_back[".inlineEdit"] = true;



$tdataipbx_call_back[".delete"] = true;

$tdataipbx_call_back[".showSimpleSearchOptions"] = false;

$tdataipbx_call_back[".showSearchPanel"] = true;


$tdataipbx_call_back[".isUseAjaxSuggest"] = true;

$tdataipbx_call_back[".rowHighlite"] = true;

$tdataipbx_call_back[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_call_back[".arrKeyFields"][] = "id_call_back";

// use datepicker for search panel
$tdataipbx_call_back[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_call_back[".isUseTimeForSearch"] = false;





$tdataipbx_call_back[".isUseInlineAdd"] = true;

$tdataipbx_call_back[".isUseInlineEdit"] = true;
$tdataipbx_call_back[".isUseInlineJs"] = $tdataipbx_call_back[".isUseInlineAdd"] || $tdataipbx_call_back[".isUseInlineEdit"];

$tdataipbx_call_back[".allSearchFields"] = array();



$tdataipbx_call_back[".isDynamicPerm"] = true;

	

$tdataipbx_call_back[".isDisplayLoading"] = true;

$tdataipbx_call_back[".isResizeColumns"] = false;


$tdataipbx_call_back[".createLoginPage"] = true;


 	




$tdataipbx_call_back[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_call_back[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_call_back[".orderindexes"] = array();

$tdataipbx_call_back[".sqlHead"] = "SELECT id_call_back,   name,   id_cod_gen,   rdb_opcao,   `interface`,   nm_externo";

$tdataipbx_call_back[".sqlFrom"] = "FROM ipbx_call_back";

$tdataipbx_call_back[".sqlWhereExpr"] = "";

$tdataipbx_call_back[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_call_back";
	$tdataipbx_call_back[".Keys"]=$tableKeys;

	
//	id_call_back
	$fdata = array();
	$fdata["strName"] = "id_call_back";
	$fdata["ownerTable"] = "ipbx_call_back";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_call_back";
		$fdata["FullName"]= "id_call_back";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_call_back["id_call_back"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "ipbx_call_back";
		$fdata["Label"]="Ramal"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="callerid";
				$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="callerid";
							$fdata["LookupWhere"] = "tp_ramal='CALLBACK'";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_call_back["name"]=$fdata;
	
//	id_cod_gen
	$fdata = array();
	$fdata["strName"] = "id_cod_gen";
	$fdata["ownerTable"] = "ipbx_call_back";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="valor";
	$fdata["LinkFieldType"]=13;
	$fdata["DisplayField"]="dsc_item";
				$fdata["LookupTable"]="v_cc_menu_atend_opcao";
	$fdata["LookupOrderBy"]="dsc_item";
							$fdata["LookupWhere"] = "dsc_item != ''";

				$fdata["UseCategory"]=true; 
	$fdata["CategoryControl"]="rdb_opcao"; 
	$fdata["CategoryFilter"]="item"; 
	
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_cod_gen";
		$fdata["FullName"]= "id_cod_gen";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_call_back["id_cod_gen"]=$fdata;
	
//	rdb_opcao
	$fdata = array();
	$fdata["strName"] = "rdb_opcao";
	$fdata["ownerTable"] = "ipbx_call_back";
		$fdata["Label"]="Ação do item Call Back"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="item";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="comentario";
				$fdata["LookupTable"]="v_cc_menu_atend_opcao";
	$fdata["LookupOrderBy"]="comentario";
							$fdata["LookupWhere"] = "item = 'Ramal'";

				
										$fdata["SimpleAdd"]=true;
	
				//	dependent dropdowns	
	$fdata["DependentLookups"]=array();
	$fdata["DependentLookups"][]="id_cod_gen";
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "rdb_opcao";
		$fdata["FullName"]= "rdb_opcao";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_call_back["rdb_opcao"]=$fdata;
	
//	interface
	$fdata = array();
	$fdata["strName"] = "interface";
	$fdata["ownerTable"] = "ipbx_call_back";
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
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "interface";
		$fdata["FullName"]= "`interface`";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_call_back["interface"]=$fdata;
	
//	nm_externo
	$fdata = array();
	$fdata["strName"] = "nm_externo";
	$fdata["ownerTable"] = "ipbx_call_back";
		$fdata["Label"]="Numero Externo Autorizado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_externo";
		$fdata["FullName"]= "nm_externo";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_call_back["nm_externo"]=$fdata;

	
$tables_data["ipbx_call_back"]=&$tdataipbx_call_back;
$field_labels["ipbx_call_back"] = &$fieldLabelsipbx_call_back;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_call_back"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_call_back"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2016=array();
$proto2016["m_strHead"] = "SELECT";
$proto2016["m_strFieldList"] = "id_call_back,   name,   id_cod_gen,   rdb_opcao,   `interface`,   nm_externo";
$proto2016["m_strFrom"] = "FROM ipbx_call_back";
$proto2016["m_strWhere"] = "";
$proto2016["m_strOrderBy"] = "";
$proto2016["m_strTail"] = "";
$proto2017=array();
$proto2017["m_sql"] = "";
$proto2017["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2017["m_column"]=$obj;
$proto2017["m_contained"] = array();
$proto2017["m_strCase"] = "";
$proto2017["m_havingmode"] = "0";
$proto2017["m_inBrackets"] = "0";
$proto2017["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2017);

$proto2016["m_where"] = $obj;
$proto2019=array();
$proto2019["m_sql"] = "";
$proto2019["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2019["m_column"]=$obj;
$proto2019["m_contained"] = array();
$proto2019["m_strCase"] = "";
$proto2019["m_havingmode"] = "0";
$proto2019["m_inBrackets"] = "0";
$proto2019["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2019);

$proto2016["m_having"] = $obj;
$proto2016["m_fieldlist"] = array();
						$proto2021=array();
			$obj = new SQLField(array(
	"m_strName" => "id_call_back",
	"m_strTable" => "ipbx_call_back"
));

$proto2021["m_expr"]=$obj;
$proto2021["m_alias"] = "";
$obj = new SQLFieldListItem($proto2021);

$proto2016["m_fieldlist"][]=$obj;
						$proto2023=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_call_back"
));

$proto2023["m_expr"]=$obj;
$proto2023["m_alias"] = "";
$obj = new SQLFieldListItem($proto2023);

$proto2016["m_fieldlist"][]=$obj;
						$proto2025=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cod_gen",
	"m_strTable" => "ipbx_call_back"
));

$proto2025["m_expr"]=$obj;
$proto2025["m_alias"] = "";
$obj = new SQLFieldListItem($proto2025);

$proto2016["m_fieldlist"][]=$obj;
						$proto2027=array();
			$obj = new SQLField(array(
	"m_strName" => "rdb_opcao",
	"m_strTable" => "ipbx_call_back"
));

$proto2027["m_expr"]=$obj;
$proto2027["m_alias"] = "";
$obj = new SQLFieldListItem($proto2027);

$proto2016["m_fieldlist"][]=$obj;
						$proto2029=array();
			$obj = new SQLField(array(
	"m_strName" => "interface",
	"m_strTable" => "ipbx_call_back"
));

$proto2029["m_expr"]=$obj;
$proto2029["m_alias"] = "";
$obj = new SQLFieldListItem($proto2029);

$proto2016["m_fieldlist"][]=$obj;
						$proto2031=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_externo",
	"m_strTable" => "ipbx_call_back"
));

$proto2031["m_expr"]=$obj;
$proto2031["m_alias"] = "";
$obj = new SQLFieldListItem($proto2031);

$proto2016["m_fieldlist"][]=$obj;
$proto2016["m_fromlist"] = array();
												$proto2033=array();
$proto2033["m_link"] = "SQLL_MAIN";
			$proto2034=array();
$proto2034["m_strName"] = "ipbx_call_back";
$proto2034["m_columns"] = array();
$proto2034["m_columns"][] = "id_call_back";
$proto2034["m_columns"][] = "name";
$proto2034["m_columns"][] = "id_cod_gen";
$proto2034["m_columns"][] = "rdb_opcao";
$proto2034["m_columns"][] = "interface";
$proto2034["m_columns"][] = "nm_externo";
$obj = new SQLTable($proto2034);

$proto2033["m_table"] = $obj;
$proto2033["m_alias"] = "";
$proto2035=array();
$proto2035["m_sql"] = "";
$proto2035["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2035["m_column"]=$obj;
$proto2035["m_contained"] = array();
$proto2035["m_strCase"] = "";
$proto2035["m_havingmode"] = "0";
$proto2035["m_inBrackets"] = "0";
$proto2035["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2035);

$proto2033["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2033);

$proto2016["m_fromlist"][]=$obj;
$proto2016["m_groupby"] = array();
$proto2016["m_orderby"] = array();
$obj = new SQLQuery($proto2016);

$queryData_ipbx_call_back = $obj;
$tdataipbx_call_back[".sqlquery"] = $queryData_ipbx_call_back;



?>
