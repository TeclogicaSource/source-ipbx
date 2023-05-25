<?php

//	field labels
$fieldLabelsipbx_interf_gsm = array();
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["dsc_interf"] = "Descrição ";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["board"] = "Board";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["id_chamada"] = "Número Identificador (Saída)";
$fieldLabelsipbx_interf_gsm["Portuguese(Brazil)"]["cd_operadora"] = "Código da Operadora";


$tdataipbx_interf_gsm=array();
	$tdataipbx_interf_gsm[".NumberOfChars"]=80; 
	$tdataipbx_interf_gsm[".ShortName"]="ipbx_interf_gsm";
	$tdataipbx_interf_gsm[".OwnerID"]="";
	$tdataipbx_interf_gsm[".OriginalTable"]="ipbx_interf_gsm";
	$tdataipbx_interf_gsm[".NCSearch"]=true;
	

$tdataipbx_interf_gsm[".shortTableName"] = "ipbx_interf_gsm";
$tdataipbx_interf_gsm[".dataSourceTable"] = "ipbx_interf_gsm";
$tdataipbx_interf_gsm[".nSecOptions"] = 0;
$tdataipbx_interf_gsm[".nLoginMethod"] = 1;
$tdataipbx_interf_gsm[".recsPerRowList"] = 1;	
$tdataipbx_interf_gsm[".tableGroupBy"] = "0";
$tdataipbx_interf_gsm[".dbType"] = 0;
$tdataipbx_interf_gsm[".mainTableOwnerID"] = "";
$tdataipbx_interf_gsm[".moveNext"] = 1;

$tdataipbx_interf_gsm[".listAjax"] = true;

	$tdataipbx_interf_gsm[".audit"] = true;

	$tdataipbx_interf_gsm[".locking"] = false;
	
$tdataipbx_interf_gsm[".listIcons"] = true;
$tdataipbx_interf_gsm[".inlineEdit"] = true;



$tdataipbx_interf_gsm[".delete"] = true;

$tdataipbx_interf_gsm[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_gsm[".showSearchPanel"] = true;


$tdataipbx_interf_gsm[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_gsm[".rowHighlite"] = true;

$tdataipbx_interf_gsm[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_gsm[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_gsm[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_gsm[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_gsm[".isUseTimeForSearch"] = false;




$tdataipbx_interf_gsm[".useDetailsPreview"] = true;	

$tdataipbx_interf_gsm[".isUseInlineAdd"] = true;

$tdataipbx_interf_gsm[".isUseInlineEdit"] = true;
$tdataipbx_interf_gsm[".isUseInlineJs"] = $tdataipbx_interf_gsm[".isUseInlineAdd"] || $tdataipbx_interf_gsm[".isUseInlineEdit"];

$tdataipbx_interf_gsm[".allSearchFields"] = array();



$tdataipbx_interf_gsm[".isDynamicPerm"] = true;

	
$tdataipbx_interf_gsm[".isVerLayout"] = true;

$tdataipbx_interf_gsm[".isDisplayLoading"] = true;

$tdataipbx_interf_gsm[".isResizeColumns"] = false;


$tdataipbx_interf_gsm[".createLoginPage"] = true;


 	
	$tdataipbx_interf_gsm[".subQueriesSupAccess"] = true;




$tdataipbx_interf_gsm[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_gsm[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_gsm[".orderindexes"] = array();

$tdataipbx_interf_gsm[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   id_tp_interf,   tp_chamada,   id_chamada,   piloto,   cd_operadora";

$tdataipbx_interf_gsm[".sqlFrom"] = "FROM ipbx_interf_gsm";

$tdataipbx_interf_gsm[".sqlWhereExpr"] = "";

$tdataipbx_interf_gsm[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_gsm[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
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
			
											$tdataipbx_interf_gsm["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Descrição "; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "dsc_interf";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["dsc_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_contrato";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_operadora";
				$fdata["LookupTable"]="contrato_gsm";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["id_contrato"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["id_central"]=$fdata;
	
//	board
	$fdata = array();
	$fdata["strName"] = "board";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Board"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="0";
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
	$fdata["LookupValues"][]="10";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "board";
		$fdata["FullName"]= "board";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["board"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Tempo Chamada (s)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="30";
	$fdata["LookupValues"][]="45";
	$fdata["LookupValues"][]="60";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_chamada";
		$fdata["FullName"]= "tp_chamada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["tp_chamada"]=$fdata;
	
//	id_chamada
	$fdata = array();
	$fdata["strName"] = "id_chamada";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Número Identificador (Saída)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_chamada";
		$fdata["FullName"]= "id_chamada";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["id_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Piloto"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,'-',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="callerid";
							$fdata["LookupWhere"] = "callerid is not null";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "piloto";
		$fdata["FullName"]= "piloto";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["piloto"]=$fdata;
	
//	cd_operadora
	$fdata = array();
	$fdata["strName"] = "cd_operadora";
	$fdata["ownerTable"] = "ipbx_interf_gsm";
		$fdata["Label"]="Código da Operadora"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cd_operadora";
		$fdata["FullName"]= "cd_operadora";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=2";
			$fdata["EditParams"].= " size=2";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_gsm["cd_operadora"]=$fdata;

	
$tables_data["ipbx_interf_gsm"]=&$tdataipbx_interf_gsm;
$field_labels["ipbx_interf_gsm"] = &$fieldLabelsipbx_interf_gsm;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_gsm"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_canais";
	$detailsTablesData["ipbx_interf_gsm"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_canais"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_canais"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp"	
		, "sqlFrom"=>"FROM ipbx_canais"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["ipbx_interf_gsm"][$dIndex]["masterKeys"][]="id_interf";
		$detailsTablesData["ipbx_interf_gsm"][$dIndex]["detailKeys"][]="id_interf";


	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_gsm"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_gsm"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_gsm"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_gsm"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2788=array();
$proto2788["m_strHead"] = "SELECT";
$proto2788["m_strFieldList"] = "id_interf,   dsc_interf,   id_contrato,   id_central,   board,   id_tp_interf,   tp_chamada,   id_chamada,   piloto,   cd_operadora";
$proto2788["m_strFrom"] = "FROM ipbx_interf_gsm";
$proto2788["m_strWhere"] = "";
$proto2788["m_strOrderBy"] = "";
$proto2788["m_strTail"] = "";
$proto2789=array();
$proto2789["m_sql"] = "";
$proto2789["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2789["m_column"]=$obj;
$proto2789["m_contained"] = array();
$proto2789["m_strCase"] = "";
$proto2789["m_havingmode"] = "0";
$proto2789["m_inBrackets"] = "0";
$proto2789["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2789);

$proto2788["m_where"] = $obj;
$proto2791=array();
$proto2791["m_sql"] = "";
$proto2791["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2791["m_column"]=$obj;
$proto2791["m_contained"] = array();
$proto2791["m_strCase"] = "";
$proto2791["m_havingmode"] = "0";
$proto2791["m_inBrackets"] = "0";
$proto2791["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2791);

$proto2788["m_having"] = $obj;
$proto2788["m_fieldlist"] = array();
						$proto2793=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2793["m_expr"]=$obj;
$proto2793["m_alias"] = "";
$obj = new SQLFieldListItem($proto2793);

$proto2788["m_fieldlist"][]=$obj;
						$proto2795=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2795["m_expr"]=$obj;
$proto2795["m_alias"] = "";
$obj = new SQLFieldListItem($proto2795);

$proto2788["m_fieldlist"][]=$obj;
						$proto2797=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2797["m_expr"]=$obj;
$proto2797["m_alias"] = "";
$obj = new SQLFieldListItem($proto2797);

$proto2788["m_fieldlist"][]=$obj;
						$proto2799=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2799["m_expr"]=$obj;
$proto2799["m_alias"] = "";
$obj = new SQLFieldListItem($proto2799);

$proto2788["m_fieldlist"][]=$obj;
						$proto2801=array();
			$obj = new SQLField(array(
	"m_strName" => "board",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2801["m_expr"]=$obj;
$proto2801["m_alias"] = "";
$obj = new SQLFieldListItem($proto2801);

$proto2788["m_fieldlist"][]=$obj;
						$proto2803=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2803["m_expr"]=$obj;
$proto2803["m_alias"] = "";
$obj = new SQLFieldListItem($proto2803);

$proto2788["m_fieldlist"][]=$obj;
						$proto2805=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2805["m_expr"]=$obj;
$proto2805["m_alias"] = "";
$obj = new SQLFieldListItem($proto2805);

$proto2788["m_fieldlist"][]=$obj;
						$proto2807=array();
			$obj = new SQLField(array(
	"m_strName" => "id_chamada",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2807["m_expr"]=$obj;
$proto2807["m_alias"] = "";
$obj = new SQLFieldListItem($proto2807);

$proto2788["m_fieldlist"][]=$obj;
						$proto2809=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2809["m_expr"]=$obj;
$proto2809["m_alias"] = "";
$obj = new SQLFieldListItem($proto2809);

$proto2788["m_fieldlist"][]=$obj;
						$proto2811=array();
			$obj = new SQLField(array(
	"m_strName" => "cd_operadora",
	"m_strTable" => "ipbx_interf_gsm"
));

$proto2811["m_expr"]=$obj;
$proto2811["m_alias"] = "";
$obj = new SQLFieldListItem($proto2811);

$proto2788["m_fieldlist"][]=$obj;
$proto2788["m_fromlist"] = array();
												$proto2813=array();
$proto2813["m_link"] = "SQLL_MAIN";
			$proto2814=array();
$proto2814["m_strName"] = "ipbx_interf_gsm";
$proto2814["m_columns"] = array();
$proto2814["m_columns"][] = "id_interf";
$proto2814["m_columns"][] = "dsc_interf";
$proto2814["m_columns"][] = "id_contrato";
$proto2814["m_columns"][] = "id_central";
$proto2814["m_columns"][] = "board";
$proto2814["m_columns"][] = "id_tp_interf";
$proto2814["m_columns"][] = "tp_chamada";
$proto2814["m_columns"][] = "id_chamada";
$proto2814["m_columns"][] = "piloto";
$proto2814["m_columns"][] = "cd_operadora";
$obj = new SQLTable($proto2814);

$proto2813["m_table"] = $obj;
$proto2813["m_alias"] = "";
$proto2815=array();
$proto2815["m_sql"] = "";
$proto2815["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2815["m_column"]=$obj;
$proto2815["m_contained"] = array();
$proto2815["m_strCase"] = "";
$proto2815["m_havingmode"] = "0";
$proto2815["m_inBrackets"] = "0";
$proto2815["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2815);

$proto2813["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2813);

$proto2788["m_fromlist"][]=$obj;
$proto2788["m_groupby"] = array();
$proto2788["m_orderby"] = array();
$obj = new SQLQuery($proto2788);

$queryData_ipbx_interf_gsm = $obj;
$tdataipbx_interf_gsm[".sqlquery"] = $queryData_ipbx_interf_gsm;



?>
