<?php

//	field labels
$fieldLabelscentral = array();
$fieldLabelscentral["Portuguese(Brazil)"]=array();
$fieldLabelscentral["Portuguese(Brazil)"]["id_central"] = "Identificação";
$fieldLabelscentral["Portuguese(Brazil)"]["dsc_conf_central"] = "";
$fieldLabelscentral["Portuguese(Brazil)"]["flg_ativa"] = "Ativa Configuração";
$fieldLabelscentral["Portuguese(Brazil)"]["pers_params"] = "Parametros SIP";


$tdatacentral=array();
	$tdatacentral[".NumberOfChars"]=80; 
	$tdatacentral[".ShortName"]="central";
	$tdatacentral[".OwnerID"]="";
	$tdatacentral[".OriginalTable"]="central";
	$tdatacentral[".NCSearch"]=true;
	

$tdatacentral[".shortTableName"] = "central";
$tdatacentral[".dataSourceTable"] = "central";
$tdatacentral[".nSecOptions"] = 0;
$tdatacentral[".nLoginMethod"] = 1;
$tdatacentral[".recsPerRowList"] = 1;	
$tdatacentral[".tableGroupBy"] = "0";
$tdatacentral[".dbType"] = 0;
$tdatacentral[".mainTableOwnerID"] = "";
$tdatacentral[".moveNext"] = 1;

$tdatacentral[".listAjax"] = true;

	$tdatacentral[".audit"] = true;

	$tdatacentral[".locking"] = false;
	
$tdatacentral[".listIcons"] = true;
$tdatacentral[".edit"] = true;



$tdatacentral[".delete"] = true;

$tdatacentral[".showSimpleSearchOptions"] = false;

$tdatacentral[".showSearchPanel"] = true;


$tdatacentral[".isUseAjaxSuggest"] = true;

$tdatacentral[".rowHighlite"] = true;

$tdatacentral[".delFile"] = true;

// button handlers file names
$tdatacentral[".buttonHandlers_add"][] = "buttonevent_New_Button8";
$tdatacentral[".buttonHandlers_add"][] = "buttonevent_New_Button9";

// start on load js handlers








// end on load js handlers



$tdatacentral[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdatacentral[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacentral[".isUseTimeForSearch"] = false;




$tdatacentral[".useDetailsPreview"] = true;	


$tdatacentral[".isUseInlineJs"] = $tdatacentral[".isUseInlineAdd"] || $tdatacentral[".isUseInlineEdit"];

$tdatacentral[".allSearchFields"] = array();



$tdatacentral[".isDynamicPerm"] = true;

	

$tdatacentral[".isDisplayLoading"] = true;

$tdatacentral[".isResizeColumns"] = false;


$tdatacentral[".createLoginPage"] = true;


 	
	$tdatacentral[".subQueriesSupAccess"] = true;




$tdatacentral[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacentral[".strOrderBy"] = $gstrOrderBy;
	
$tdatacentral[".orderindexes"] = array();

$tdatacentral[".sqlHead"] = "SELECT id_central,   dsc_conf_central,   flg_ativa,   pers_params";

$tdatacentral[".sqlFrom"] = "FROM central";

$tdatacentral[".sqlWhereExpr"] = "";

$tdatacentral[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_central";
	$tdatacentral[".Keys"]=$tableKeys;

	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "central";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacentral["id_central"]=$fdata;
	
//	dsc_conf_central
	$fdata = array();
	$fdata["strName"] = "dsc_conf_central";
	$fdata["ownerTable"] = "central";
		$fdata["Label"]=""; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_conf_central";
		$fdata["FullName"]= "dsc_conf_central";
						$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacentral["dsc_conf_central"]=$fdata;
	
//	flg_ativa
	$fdata = array();
	$fdata["strName"] = "flg_ativa";
	$fdata["ownerTable"] = "central";
		$fdata["Label"]="Ativa Configuração"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativa";
		$fdata["FullName"]= "flg_ativa";
						$fdata["Index"]= 3;
	
			
											$tdatacentral["flg_ativa"]=$fdata;
	
//	pers_params
	$fdata = array();
	$fdata["strName"] = "pers_params";
	$fdata["ownerTable"] = "central";
		$fdata["Label"]="Parametros SIP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "pers_params";
		$fdata["FullName"]= "pers_params";
						$fdata["Index"]= 4;
	
		$fdata["EditParams"]="";
			$fdata["EditParams"].= " rows=200";
		$fdata["nRows"] = 200;
			$fdata["EditParams"].= " cols=400";
		$fdata["nCols"] = 400;
		
				$fdata["FieldPermissions"]=true;
								$tdatacentral["pers_params"]=$fdata;

	
$tables_data["central"]=&$tdatacentral;
$field_labels["central"] = &$fieldLabelscentral;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["central"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_interf_vono";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_vono"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_vono"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   ddd_localidade,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_vono"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 2-1;
			$strOriginalDetailsTable="ipbx_interf_fxs";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_fxs"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_fxs"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   khomp_interf"	
		, "sqlFrom"=>"FROM ipbx_interf_fxs"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 3-1;
			$strOriginalDetailsTable="ipbx_interf_e1";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_e1"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_e1"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   link,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_e1"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 4-1;
			$strOriginalDetailsTable="ipbx_interf_gsm";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_gsm"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_gsm"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   id_tp_interf,   tp_chamada,   id_chamada,   piloto,   cd_operadora"	
		, "sqlFrom"=>"FROM ipbx_interf_gsm"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 5-1;
			$strOriginalDetailsTable="ipbx_interf_mslync";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_mslync"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_mslync"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_mslync"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 6-1;
			$strOriginalDetailsTable="ipbx_interf_sip";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_sip"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_sip"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_sip"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 7-1;
			$strOriginalDetailsTable="ipbx_interf_voxip";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_voxip"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_voxip"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_voxip"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 8-1;
			$strOriginalDetailsTable="ipbx_interf_callman";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_callman"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_callman"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   ip_host,   id_central,   codec,   dtmf,   id_tp_interf,   tp_chamada,   piloto,   flg_logon_remoto"	
		, "sqlFrom"=>"FROM ipbx_interf_callman"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 9-1;
			$strOriginalDetailsTable="ipbx_interf_fxo";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_fxo"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_fxo"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   piloto,   cd_operadora,   id_contrato,   id_chamada"	
		, "sqlFrom"=>"FROM ipbx_interf_fxo"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";

$dIndex = 10-1;
			$strOriginalDetailsTable="ipbx_interf_sip_generica";
	$detailsTablesData["central"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_interf_sip_generica"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_interf_sip_generica"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto,   registro,   pers_params"	
		, "sqlFrom"=>"FROM ipbx_interf_sip_generica"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["central"][$dIndex]["masterKeys"][]="id_central";
		$detailsTablesData["central"][$dIndex]["detailKeys"][]="id_central";


	
// tables which are master tables for current table (detail)
$masterTablesData["central"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2668=array();
$proto2668["m_strHead"] = "SELECT";
$proto2668["m_strFieldList"] = "id_central,   dsc_conf_central,   flg_ativa,   pers_params";
$proto2668["m_strFrom"] = "FROM central";
$proto2668["m_strWhere"] = "";
$proto2668["m_strOrderBy"] = "";
$proto2668["m_strTail"] = "";
$proto2669=array();
$proto2669["m_sql"] = "";
$proto2669["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2669["m_column"]=$obj;
$proto2669["m_contained"] = array();
$proto2669["m_strCase"] = "";
$proto2669["m_havingmode"] = "0";
$proto2669["m_inBrackets"] = "0";
$proto2669["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2669);

$proto2668["m_where"] = $obj;
$proto2671=array();
$proto2671["m_sql"] = "";
$proto2671["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2671["m_column"]=$obj;
$proto2671["m_contained"] = array();
$proto2671["m_strCase"] = "";
$proto2671["m_havingmode"] = "0";
$proto2671["m_inBrackets"] = "0";
$proto2671["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2671);

$proto2668["m_having"] = $obj;
$proto2668["m_fieldlist"] = array();
						$proto2673=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "central"
));

$proto2673["m_expr"]=$obj;
$proto2673["m_alias"] = "";
$obj = new SQLFieldListItem($proto2673);

$proto2668["m_fieldlist"][]=$obj;
						$proto2675=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_conf_central",
	"m_strTable" => "central"
));

$proto2675["m_expr"]=$obj;
$proto2675["m_alias"] = "";
$obj = new SQLFieldListItem($proto2675);

$proto2668["m_fieldlist"][]=$obj;
						$proto2677=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativa",
	"m_strTable" => "central"
));

$proto2677["m_expr"]=$obj;
$proto2677["m_alias"] = "";
$obj = new SQLFieldListItem($proto2677);

$proto2668["m_fieldlist"][]=$obj;
						$proto2679=array();
			$obj = new SQLField(array(
	"m_strName" => "pers_params",
	"m_strTable" => "central"
));

$proto2679["m_expr"]=$obj;
$proto2679["m_alias"] = "";
$obj = new SQLFieldListItem($proto2679);

$proto2668["m_fieldlist"][]=$obj;
$proto2668["m_fromlist"] = array();
												$proto2681=array();
$proto2681["m_link"] = "SQLL_MAIN";
			$proto2682=array();
$proto2682["m_strName"] = "central";
$proto2682["m_columns"] = array();
$proto2682["m_columns"][] = "id_central";
$proto2682["m_columns"][] = "dsc_conf_central";
$proto2682["m_columns"][] = "flg_ativa";
$proto2682["m_columns"][] = "pers_params";
$obj = new SQLTable($proto2682);

$proto2681["m_table"] = $obj;
$proto2681["m_alias"] = "";
$proto2683=array();
$proto2683["m_sql"] = "";
$proto2683["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2683["m_column"]=$obj;
$proto2683["m_contained"] = array();
$proto2683["m_strCase"] = "";
$proto2683["m_havingmode"] = "0";
$proto2683["m_inBrackets"] = "0";
$proto2683["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2683);

$proto2681["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2681);

$proto2668["m_fromlist"][]=$obj;
$proto2668["m_groupby"] = array();
$proto2668["m_orderby"] = array();
$obj = new SQLQuery($proto2668);

$queryData_central = $obj;
$tdatacentral[".sqlquery"] = $queryData_central;



?>
