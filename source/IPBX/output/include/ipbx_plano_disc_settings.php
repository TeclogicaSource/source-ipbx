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










$proto2662=array();
$proto2662["m_strHead"] = "SELECT";
$proto2662["m_strFieldList"] = "id_plano,  padrao,  contexto,  rota,  id_interf_1,  add_rota_1,  id_interf_2,  add_rota_2";
$proto2662["m_strFrom"] = "FROM ipbx_plano_disc";
$proto2662["m_strWhere"] = "";
$proto2662["m_strOrderBy"] = "";
$proto2662["m_strTail"] = "";
$proto2663=array();
$proto2663["m_sql"] = "";
$proto2663["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2663["m_column"]=$obj;
$proto2663["m_contained"] = array();
$proto2663["m_strCase"] = "";
$proto2663["m_havingmode"] = "0";
$proto2663["m_inBrackets"] = "0";
$proto2663["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2663);

$proto2662["m_where"] = $obj;
$proto2665=array();
$proto2665["m_sql"] = "";
$proto2665["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2665["m_column"]=$obj;
$proto2665["m_contained"] = array();
$proto2665["m_strCase"] = "";
$proto2665["m_havingmode"] = "0";
$proto2665["m_inBrackets"] = "0";
$proto2665["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2665);

$proto2662["m_having"] = $obj;
$proto2662["m_fieldlist"] = array();
						$proto2667=array();
			$obj = new SQLField(array(
	"m_strName" => "id_plano",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2667["m_expr"]=$obj;
$proto2667["m_alias"] = "";
$obj = new SQLFieldListItem($proto2667);

$proto2662["m_fieldlist"][]=$obj;
						$proto2669=array();
			$obj = new SQLField(array(
	"m_strName" => "padrao",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2669["m_expr"]=$obj;
$proto2669["m_alias"] = "";
$obj = new SQLFieldListItem($proto2669);

$proto2662["m_fieldlist"][]=$obj;
						$proto2671=array();
			$obj = new SQLField(array(
	"m_strName" => "contexto",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2671["m_expr"]=$obj;
$proto2671["m_alias"] = "";
$obj = new SQLFieldListItem($proto2671);

$proto2662["m_fieldlist"][]=$obj;
						$proto2673=array();
			$obj = new SQLField(array(
	"m_strName" => "rota",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2673["m_expr"]=$obj;
$proto2673["m_alias"] = "";
$obj = new SQLFieldListItem($proto2673);

$proto2662["m_fieldlist"][]=$obj;
						$proto2675=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf_1",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2675["m_expr"]=$obj;
$proto2675["m_alias"] = "";
$obj = new SQLFieldListItem($proto2675);

$proto2662["m_fieldlist"][]=$obj;
						$proto2677=array();
			$obj = new SQLField(array(
	"m_strName" => "add_rota_1",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2677["m_expr"]=$obj;
$proto2677["m_alias"] = "";
$obj = new SQLFieldListItem($proto2677);

$proto2662["m_fieldlist"][]=$obj;
						$proto2679=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf_2",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2679["m_expr"]=$obj;
$proto2679["m_alias"] = "";
$obj = new SQLFieldListItem($proto2679);

$proto2662["m_fieldlist"][]=$obj;
						$proto2681=array();
			$obj = new SQLField(array(
	"m_strName" => "add_rota_2",
	"m_strTable" => "ipbx_plano_disc"
));

$proto2681["m_expr"]=$obj;
$proto2681["m_alias"] = "";
$obj = new SQLFieldListItem($proto2681);

$proto2662["m_fieldlist"][]=$obj;
$proto2662["m_fromlist"] = array();
												$proto2683=array();
$proto2683["m_link"] = "SQLL_MAIN";
			$proto2684=array();
$proto2684["m_strName"] = "ipbx_plano_disc";
$proto2684["m_columns"] = array();
$proto2684["m_columns"][] = "id_plano";
$proto2684["m_columns"][] = "padrao";
$proto2684["m_columns"][] = "contexto";
$proto2684["m_columns"][] = "rota";
$proto2684["m_columns"][] = "id_interf_1";
$proto2684["m_columns"][] = "add_rota_1";
$proto2684["m_columns"][] = "id_interf_2";
$proto2684["m_columns"][] = "add_rota_2";
$proto2684["m_columns"][] = "id_interf_3";
$proto2684["m_columns"][] = "add_rota_3";
$obj = new SQLTable($proto2684);

$proto2683["m_table"] = $obj;
$proto2683["m_alias"] = "";
$proto2685=array();
$proto2685["m_sql"] = "";
$proto2685["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2685["m_column"]=$obj;
$proto2685["m_contained"] = array();
$proto2685["m_strCase"] = "";
$proto2685["m_havingmode"] = "0";
$proto2685["m_inBrackets"] = "0";
$proto2685["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2685);

$proto2683["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2683);

$proto2662["m_fromlist"][]=$obj;
$proto2662["m_groupby"] = array();
$proto2662["m_orderby"] = array();
$obj = new SQLQuery($proto2662);

$queryData_ipbx_plano_disc = $obj;
$tdataipbx_plano_disc[".sqlquery"] = $queryData_ipbx_plano_disc;



?>
