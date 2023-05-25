<?php

//	field labels
$fieldLabelsipbx_interf_e1 = array();
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["board"] = "Board";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["link"] = "Link";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["id_chamada"] = "Número Identificador (Saída)";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["flg_id_cham_parc"] = "Fixar identificador (Saída)";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["cd_operadora"] = "Código da Operadora";
$fieldLabelsipbx_interf_e1["Portuguese(Brazil)"]["flg_logon_remoto"] = "Logon Remoto";


$tdataipbx_interf_e1=array();
	$tdataipbx_interf_e1[".NumberOfChars"]=80; 
	$tdataipbx_interf_e1[".ShortName"]="ipbx_interf_e1";
	$tdataipbx_interf_e1[".OwnerID"]="";
	$tdataipbx_interf_e1[".OriginalTable"]="ipbx_interf_e1";
	$tdataipbx_interf_e1[".NCSearch"]=true;
	

$tdataipbx_interf_e1[".shortTableName"] = "ipbx_interf_e1";
$tdataipbx_interf_e1[".dataSourceTable"] = "ipbx_interf_e1";
$tdataipbx_interf_e1[".nSecOptions"] = 0;
$tdataipbx_interf_e1[".nLoginMethod"] = 1;
$tdataipbx_interf_e1[".recsPerRowList"] = 1;	
$tdataipbx_interf_e1[".tableGroupBy"] = "0";
$tdataipbx_interf_e1[".dbType"] = 0;
$tdataipbx_interf_e1[".mainTableOwnerID"] = "";
$tdataipbx_interf_e1[".moveNext"] = 1;

$tdataipbx_interf_e1[".listAjax"] = true;

	$tdataipbx_interf_e1[".audit"] = true;

	$tdataipbx_interf_e1[".locking"] = false;
	
$tdataipbx_interf_e1[".listIcons"] = true;
$tdataipbx_interf_e1[".inlineEdit"] = true;



$tdataipbx_interf_e1[".delete"] = true;

$tdataipbx_interf_e1[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_e1[".showSearchPanel"] = true;


$tdataipbx_interf_e1[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_e1[".rowHighlite"] = true;

$tdataipbx_interf_e1[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_e1[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_e1[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_e1[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_e1[".isUseTimeForSearch"] = false;





$tdataipbx_interf_e1[".isUseInlineAdd"] = true;

$tdataipbx_interf_e1[".isUseInlineEdit"] = true;
$tdataipbx_interf_e1[".isUseInlineJs"] = $tdataipbx_interf_e1[".isUseInlineAdd"] || $tdataipbx_interf_e1[".isUseInlineEdit"];

$tdataipbx_interf_e1[".allSearchFields"] = array();



$tdataipbx_interf_e1[".isDynamicPerm"] = true;

	
$tdataipbx_interf_e1[".isVerLayout"] = true;

$tdataipbx_interf_e1[".isDisplayLoading"] = true;

$tdataipbx_interf_e1[".isResizeColumns"] = false;


$tdataipbx_interf_e1[".createLoginPage"] = true;


 	




$tdataipbx_interf_e1[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_e1[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_e1[".orderindexes"] = array();

$tdataipbx_interf_e1[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   link,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto";

$tdataipbx_interf_e1[".sqlFrom"] = "FROM ipbx_interf_e1";

$tdataipbx_interf_e1[".sqlWhereExpr"] = "";

$tdataipbx_interf_e1[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_e1[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_e1";
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
			
											$tdataipbx_interf_e1["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_interf";
		$fdata["FullName"]= "dsc_interf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["dsc_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_contrato";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_operadora";
				$fdata["LookupTable"]="contrato_trad";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["id_contrato"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_e1";
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
			$tdataipbx_interf_e1["id_central"]=$fdata;
	
//	board
	$fdata = array();
	$fdata["strName"] = "board";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Board"; 
			$fdata["LinkPrefix"]="files/"; 
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
				$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["board"]=$fdata;
	
//	link
	$fdata = array();
	$fdata["strName"] = "link";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Link"; 
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
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "link";
		$fdata["FullName"]= "link";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["link"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_e1";
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
					$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_e1";
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
			$tdataipbx_interf_e1["piloto"]=$fdata;
	
//	id_chamada
	$fdata = array();
	$fdata["strName"] = "id_chamada";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Número Identificador (Saída)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_chamada";
		$fdata["FullName"]= "id_chamada";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=11";
			$fdata["EditParams"].= " size=11";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["id_chamada"]=$fdata;
	
//	flg_id_cham_parc
	$fdata = array();
	$fdata["strName"] = "flg_id_cham_parc";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Fixar identificador (Saída)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_id_cham_parc";
		$fdata["FullName"]= "flg_id_cham_parc";
						$fdata["Index"]= 11;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["flg_id_cham_parc"]=$fdata;
	
//	cd_operadora
	$fdata = array();
	$fdata["strName"] = "cd_operadora";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Código da Operadora"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cd_operadora";
		$fdata["FullName"]= "cd_operadora";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=2";
			$fdata["EditParams"].= " size=2";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["cd_operadora"]=$fdata;
	
//	flg_logon_remoto
	$fdata = array();
	$fdata["strName"] = "flg_logon_remoto";
	$fdata["ownerTable"] = "ipbx_interf_e1";
		$fdata["Label"]="Logon Remoto"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_logon_remoto";
		$fdata["FullName"]= "flg_logon_remoto";
						$fdata["Index"]= 13;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_e1["flg_logon_remoto"]=$fdata;

	
$tables_data["ipbx_interf_e1"]=&$tdataipbx_interf_e1;
$field_labels["ipbx_interf_e1"] = &$fieldLabelsipbx_interf_e1;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_e1"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_e1"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_e1"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_e1"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_e1"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2554=array();
$proto2554["m_strHead"] = "SELECT";
$proto2554["m_strFieldList"] = "id_interf,   dsc_interf,   id_contrato,   id_central,   board,   link,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto";
$proto2554["m_strFrom"] = "FROM ipbx_interf_e1";
$proto2554["m_strWhere"] = "";
$proto2554["m_strOrderBy"] = "";
$proto2554["m_strTail"] = "";
$proto2555=array();
$proto2555["m_sql"] = "";
$proto2555["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2555["m_column"]=$obj;
$proto2555["m_contained"] = array();
$proto2555["m_strCase"] = "";
$proto2555["m_havingmode"] = "0";
$proto2555["m_inBrackets"] = "0";
$proto2555["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2555);

$proto2554["m_where"] = $obj;
$proto2557=array();
$proto2557["m_sql"] = "";
$proto2557["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2557["m_column"]=$obj;
$proto2557["m_contained"] = array();
$proto2557["m_strCase"] = "";
$proto2557["m_havingmode"] = "0";
$proto2557["m_inBrackets"] = "0";
$proto2557["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2557);

$proto2554["m_having"] = $obj;
$proto2554["m_fieldlist"] = array();
						$proto2559=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2559["m_expr"]=$obj;
$proto2559["m_alias"] = "";
$obj = new SQLFieldListItem($proto2559);

$proto2554["m_fieldlist"][]=$obj;
						$proto2561=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2561["m_expr"]=$obj;
$proto2561["m_alias"] = "";
$obj = new SQLFieldListItem($proto2561);

$proto2554["m_fieldlist"][]=$obj;
						$proto2563=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2563["m_expr"]=$obj;
$proto2563["m_alias"] = "";
$obj = new SQLFieldListItem($proto2563);

$proto2554["m_fieldlist"][]=$obj;
						$proto2565=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2565["m_expr"]=$obj;
$proto2565["m_alias"] = "";
$obj = new SQLFieldListItem($proto2565);

$proto2554["m_fieldlist"][]=$obj;
						$proto2567=array();
			$obj = new SQLField(array(
	"m_strName" => "board",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2567["m_expr"]=$obj;
$proto2567["m_alias"] = "";
$obj = new SQLFieldListItem($proto2567);

$proto2554["m_fieldlist"][]=$obj;
						$proto2569=array();
			$obj = new SQLField(array(
	"m_strName" => "link",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2569["m_expr"]=$obj;
$proto2569["m_alias"] = "";
$obj = new SQLFieldListItem($proto2569);

$proto2554["m_fieldlist"][]=$obj;
						$proto2571=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2571["m_expr"]=$obj;
$proto2571["m_alias"] = "";
$obj = new SQLFieldListItem($proto2571);

$proto2554["m_fieldlist"][]=$obj;
						$proto2573=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2573["m_expr"]=$obj;
$proto2573["m_alias"] = "";
$obj = new SQLFieldListItem($proto2573);

$proto2554["m_fieldlist"][]=$obj;
						$proto2575=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2575["m_expr"]=$obj;
$proto2575["m_alias"] = "";
$obj = new SQLFieldListItem($proto2575);

$proto2554["m_fieldlist"][]=$obj;
						$proto2577=array();
			$obj = new SQLField(array(
	"m_strName" => "id_chamada",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2577["m_expr"]=$obj;
$proto2577["m_alias"] = "";
$obj = new SQLFieldListItem($proto2577);

$proto2554["m_fieldlist"][]=$obj;
						$proto2579=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_id_cham_parc",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2579["m_expr"]=$obj;
$proto2579["m_alias"] = "";
$obj = new SQLFieldListItem($proto2579);

$proto2554["m_fieldlist"][]=$obj;
						$proto2581=array();
			$obj = new SQLField(array(
	"m_strName" => "cd_operadora",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2581["m_expr"]=$obj;
$proto2581["m_alias"] = "";
$obj = new SQLFieldListItem($proto2581);

$proto2554["m_fieldlist"][]=$obj;
						$proto2583=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_logon_remoto",
	"m_strTable" => "ipbx_interf_e1"
));

$proto2583["m_expr"]=$obj;
$proto2583["m_alias"] = "";
$obj = new SQLFieldListItem($proto2583);

$proto2554["m_fieldlist"][]=$obj;
$proto2554["m_fromlist"] = array();
												$proto2585=array();
$proto2585["m_link"] = "SQLL_MAIN";
			$proto2586=array();
$proto2586["m_strName"] = "ipbx_interf_e1";
$proto2586["m_columns"] = array();
$proto2586["m_columns"][] = "id_interf";
$proto2586["m_columns"][] = "dsc_interf";
$proto2586["m_columns"][] = "id_contrato";
$proto2586["m_columns"][] = "id_central";
$proto2586["m_columns"][] = "board";
$proto2586["m_columns"][] = "link";
$proto2586["m_columns"][] = "id_tp_interf";
$proto2586["m_columns"][] = "tp_chamada";
$proto2586["m_columns"][] = "piloto";
$proto2586["m_columns"][] = "id_chamada";
$proto2586["m_columns"][] = "flg_id_cham_parc";
$proto2586["m_columns"][] = "cd_operadora";
$proto2586["m_columns"][] = "flg_logon_remoto";
$obj = new SQLTable($proto2586);

$proto2585["m_table"] = $obj;
$proto2585["m_alias"] = "";
$proto2587=array();
$proto2587["m_sql"] = "";
$proto2587["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2587["m_column"]=$obj;
$proto2587["m_contained"] = array();
$proto2587["m_strCase"] = "";
$proto2587["m_havingmode"] = "0";
$proto2587["m_inBrackets"] = "0";
$proto2587["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2587);

$proto2585["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2585);

$proto2554["m_fromlist"][]=$obj;
$proto2554["m_groupby"] = array();
$proto2554["m_orderby"] = array();
$obj = new SQLQuery($proto2554);

$queryData_ipbx_interf_e1 = $obj;
$tdataipbx_interf_e1[".sqlquery"] = $queryData_ipbx_interf_e1;



?>
