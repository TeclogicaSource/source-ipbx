<?php

//	field labels
$fieldLabelsipbx_plano_disc = array();
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["id_plano"] = "Identificação";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["padrao"] = "Padrão";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["contexto"] = "Contexto";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["rota"] = "Rota";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["id_interf_1"] = "Interface Saída";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["add_rota_1"] = "Adiciona na Rota";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["id_interf_2"] = "Interface Contingência";
$fieldLabelsipbx_plano_disc["Portuguese(Brazil)"]["add_rota_2"] = "Adiciona na Rota";


$tdataipbx_plano_disc=array();
	$tdataipbx_plano_disc[".NumberOfChars"]=80; 
	$tdataipbx_plano_disc[".ShortName"]="ipbx_plano_disc";
	$tdataipbx_plano_disc[".OwnerID"]="";
	$tdataipbx_plano_disc[".OriginalTable"]="ipbx_plano_disc";
	$tdataipbx_plano_disc[".NCSearch"]=true;
	

$tdataipbx_plano_disc[".shortTableName"] = "ipbx_plano_disc";
$tdataipbx_plano_disc[".dataSourceTable"] = "ipbx_plano_disc";
$tdataipbx_plano_disc[".nSecOptions"] = 0;
$tdataipbx_plano_disc[".nLoginMethod"] = 1;
$tdataipbx_plano_disc[".recsPerRowList"] = 1;	
$tdataipbx_plano_disc[".tableGroupBy"] = "0";
$tdataipbx_plano_disc[".dbType"] = 0;
$tdataipbx_plano_disc[".mainTableOwnerID"] = "";
$tdataipbx_plano_disc[".moveNext"] = 1;

$tdataipbx_plano_disc[".listAjax"] = true;

	$tdataipbx_plano_disc[".audit"] = true;

	$tdataipbx_plano_disc[".locking"] = false;
	
$tdataipbx_plano_disc[".listIcons"] = true;
$tdataipbx_plano_disc[".inlineEdit"] = true;



$tdataipbx_plano_disc[".delete"] = true;

$tdataipbx_plano_disc[".showSimpleSearchOptions"] = false;

$tdataipbx_plano_disc[".showSearchPanel"] = true;


$tdataipbx_plano_disc[".isUseAjaxSuggest"] = true;

$tdataipbx_plano_disc[".rowHighlite"] = true;

$tdataipbx_plano_disc[".delFile"] = true;

// button handlers file names
$tdataipbx_plano_disc[".buttonHandlers_list"][] = "buttonevent_New_Button2";

// start on load js handlers








// end on load js handlers



$tdataipbx_plano_disc[".arrKeyFields"][] = "id_plano";

// use datepicker for search panel
$tdataipbx_plano_disc[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_plano_disc[".isUseTimeForSearch"] = false;





$tdataipbx_plano_disc[".isUseInlineAdd"] = true;

$tdataipbx_plano_disc[".isUseInlineEdit"] = true;
$tdataipbx_plano_disc[".isUseInlineJs"] = $tdataipbx_plano_disc[".isUseInlineAdd"] || $tdataipbx_plano_disc[".isUseInlineEdit"];

$tdataipbx_plano_disc[".allSearchFields"] = array();



$tdataipbx_plano_disc[".isDynamicPerm"] = true;

	

$tdataipbx_plano_disc[".isDisplayLoading"] = true;

$tdataipbx_plano_disc[".isResizeColumns"] = false;


$tdataipbx_plano_disc[".createLoginPage"] = true;


 	




$tdataipbx_plano_disc[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_plano_disc[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_plano_disc[".orderindexes"] = array();

$tdataipbx_plano_disc[".sqlHead"] = "SELECT id_plano,  padrao,  contexto,  rota,  id_interf_1,  add_rota_1,  id_interf_2,  add_rota_2";

$tdataipbx_plano_disc[".sqlFrom"] = "FROM ipbx_plano_disc";

$tdataipbx_plano_disc[".sqlWhereExpr"] = "";

$tdataipbx_plano_disc[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_plano";
	$tdataipbx_plano_disc[".Keys"]=$tableKeys;

	
//	id_plano
	$fdata = array();
	$fdata["strName"] = "id_plano";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_plano";
		$fdata["FullName"]= "id_plano";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_plano_disc["id_plano"]=$fdata;
	
//	padrao
	$fdata = array();
	$fdata["strName"] = "padrao";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Padrão"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "padrao";
		$fdata["FullName"]= "padrao";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["padrao"]=$fdata;
	
//	contexto
	$fdata = array();
	$fdata["strName"] = "contexto";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Contexto"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="FIXO-LOCAL";
	$fdata["LookupValues"][]="CELULAR-LOCAL";
	$fdata["LookupValues"][]="FIXO-DDD";
	$fdata["LookupValues"][]="CELULAR-DDD";
	$fdata["LookupValues"][]="DDI";
	$fdata["LookupValues"][]="PBX-RAMAL";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "contexto";
		$fdata["FullName"]= "contexto";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["contexto"]=$fdata;
	
//	rota
	$fdata = array();
	$fdata["strName"] = "rota";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Rota"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "rota";
		$fdata["FullName"]= "rota";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=4";
			$fdata["EditParams"].= " size=4";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["rota"]=$fdata;
	
//	id_interf_1
	$fdata = array();
	$fdata["strName"] = "id_interf_1";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Interface Saída"; 
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
							$fdata["LookupWhere"] = "id_tp_interf not in (5)";

				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf_1";
		$fdata["FullName"]= "id_interf_1";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["id_interf_1"]=$fdata;
	
//	add_rota_1
	$fdata = array();
	$fdata["strName"] = "add_rota_1";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Adiciona na Rota"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "add_rota_1";
		$fdata["FullName"]= "add_rota_1";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=5";
			$fdata["EditParams"].= " size=5";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["add_rota_1"]=$fdata;
	
//	id_interf_2
	$fdata = array();
	$fdata["strName"] = "id_interf_2";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Interface Contingência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_interf";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_interf";
				$fdata["LookupTable"]="ipbx_interf";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "id_tp_interf not in (5)";

				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf_2";
		$fdata["FullName"]= "id_interf_2";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["id_interf_2"]=$fdata;
	
//	add_rota_2
	$fdata = array();
	$fdata["strName"] = "add_rota_2";
	$fdata["ownerTable"] = "ipbx_plano_disc";
		$fdata["Label"]="Adiciona na Rota"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "add_rota_2";
		$fdata["FullName"]= "add_rota_2";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=5";
			$fdata["EditParams"].= " size=5";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_plano_disc["add_rota_2"]=$fdata;

	
$tables_data["ipbx_plano_disc"]=&$tdataipbx_plano_disc;
$field_labels["ipbx_plano_disc"] = &$fieldLabelsipbx_plano_disc;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_plano_disc"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_plano_disc"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2399=array();
$proto2399["m_strHead"] = "SELECT";
$proto2399["m_strFieldList"] = "id_plano,  padrao,  contexto,  rota,  id_interf_1,  add_rota_1,  id_interf_2,  add_rota_2";
$proto2399["m_strFrom"] = "FROM ipbx_plano_disc";
$proto2399["m_strWhere"] = "";
$proto2399["m_strOrderBy"] = "";
$proto2399["m_strTail"] = "";
$proto2400=array();
$proto2400["m_sql"] = "";
$proto2400["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2400["m_column"]=$obj;
$proto2400["m_contained"] = array();
$proto2400["m_strCase"] = "";
$proto2400["m_havingmode"] = "0";
$proto2400["m_inBrackets"] = "0";
$proto2400["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2400);

$proto2399["m_where"] = $obj;
$proto2402=array();
$proto2402["m_sql"] = "";
$proto2402["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2402["m_column"]=$obj;
$proto2402["m_contained"] = array();
$proto2402["m_strCase"] = "";
$proto2402["m_havingmode"] = "0";
$proto2402["m_inBrackets"] = "0";
$proto2402["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2402);

$proto2399["m_having"] = $obj;
$proto2399["m_fieldlist"] = array();
						$proto2404=array();
			$obj = new SQLField(array(
	"m_strName" => "id_plano",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2404["m_expr"]=$obj;
$proto2404["m_alias"] = "";
$obj = new SQLFieldListItem($proto2404);

$proto2399["m_fieldlist"][]=$obj;
						$proto2406=array();
			$obj = new SQLField(array(
	"m_strName" => "padrao",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2406["m_expr"]=$obj;
$proto2406["m_alias"] = "";
$obj = new SQLFieldListItem($proto2406);

$proto2399["m_fieldlist"][]=$obj;
						$proto2408=array();
			$obj = new SQLField(array(
	"m_strName" => "contexto",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2408["m_expr"]=$obj;
$proto2408["m_alias"] = "";
$obj = new SQLFieldListItem($proto2408);

$proto2399["m_fieldlist"][]=$obj;
						$proto2410=array();
			$obj = new SQLField(array(
	"m_strName" => "rota",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2410["m_expr"]=$obj;
$proto2410["m_alias"] = "";
$obj = new SQLFieldListItem($proto2410);

$proto2399["m_fieldlist"][]=$obj;
						$proto2412=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf_1",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2412["m_expr"]=$obj;
$proto2412["m_alias"] = "";
$obj = new SQLFieldListItem($proto2412);

$proto2399["m_fieldlist"][]=$obj;
						$proto2414=array();
			$obj = new SQLField(array(
	"m_strName" => "add_rota_1",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2414["m_expr"]=$obj;
$proto2414["m_alias"] = "";
$obj = new SQLFieldListItem($proto2414);

$proto2399["m_fieldlist"][]=$obj;
						$proto2416=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf_2",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2416["m_expr"]=$obj;
$proto2416["m_alias"] = "";
$obj = new SQLFieldListItem($proto2416);

$proto2399["m_fieldlist"][]=$obj;
						$proto2418=array();
			$obj = new SQLField(array(
	"m_strName" => "add_rota_2",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2418["m_expr"]=$obj;
$proto2418["m_alias"] = "";
$obj = new SQLFieldListItem($proto2418);

$proto2399["m_fieldlist"][]=$obj;
$proto2399["m_fromlist"] = array();
												$proto2420=array();
$proto2420["m_link"] = "SQLL_MAIN";
			$proto2421=array();
$proto2421["m_strName"] = "ipbx_plano_disc";
$proto2421["m_columns"] = array();
$proto2421["m_columns"][] = "id_plano";
$proto2421["m_columns"][] = "padrao";
$proto2421["m_columns"][] = "contexto";
$proto2421["m_columns"][] = "rota";
$proto2421["m_columns"][] = "id_interf_1";
$proto2421["m_columns"][] = "add_rota_1";
$proto2421["m_columns"][] = "id_interf_2";
$proto2421["m_columns"][] = "add_rota_2";
$proto2421["m_columns"][] = "id_interf_3";
$proto2421["m_columns"][] = "add_rota_3";
$obj = new SQLTable($proto2421);

$proto2420["m_table"] = $obj;
$proto2420["m_alias"] = "";
$proto2422=array();
$proto2422["m_sql"] = "";
$proto2422["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2422["m_column"]=$obj;
$proto2422["m_contained"] = array();
$proto2422["m_strCase"] = "";
$proto2422["m_havingmode"] = "0";
$proto2422["m_inBrackets"] = "0";
$proto2422["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2422);

$proto2420["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2420);

$proto2399["m_fromlist"][]=$obj;
$proto2399["m_groupby"] = array();
$proto2399["m_orderby"] = array();
$obj = new SQLQuery($proto2399);

$queryData_ipbx_plano_disc = $obj;
$tdataipbx_plano_disc[".sqlquery"] = $queryData_ipbx_plano_disc;



?>
