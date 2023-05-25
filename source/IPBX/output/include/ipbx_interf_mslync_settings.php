<?php

//	field labels
$fieldLabelsipbx_interf_mslync = array();
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["dsc_interf"] = "Descrição ";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["ip_host"] = "Host";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["id_chamada"] = "Número Identificador (Saída)";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["flg_id_cham_parc"] = "Fixar identificador (Saída)";
$fieldLabelsipbx_interf_mslync["Portuguese(Brazil)"]["flg_logon_remoto"] = "Logon Remoto";


$tdataipbx_interf_mslync=array();
	$tdataipbx_interf_mslync[".NumberOfChars"]=80; 
	$tdataipbx_interf_mslync[".ShortName"]="ipbx_interf_mslync";
	$tdataipbx_interf_mslync[".OwnerID"]="";
	$tdataipbx_interf_mslync[".OriginalTable"]="ipbx_interf_mslync";
	$tdataipbx_interf_mslync[".NCSearch"]=true;
	

$tdataipbx_interf_mslync[".shortTableName"] = "ipbx_interf_mslync";
$tdataipbx_interf_mslync[".dataSourceTable"] = "ipbx_interf_mslync";
$tdataipbx_interf_mslync[".nSecOptions"] = 0;
$tdataipbx_interf_mslync[".nLoginMethod"] = 1;
$tdataipbx_interf_mslync[".recsPerRowList"] = 1;	
$tdataipbx_interf_mslync[".tableGroupBy"] = "0";
$tdataipbx_interf_mslync[".dbType"] = 0;
$tdataipbx_interf_mslync[".mainTableOwnerID"] = "";
$tdataipbx_interf_mslync[".moveNext"] = 1;

$tdataipbx_interf_mslync[".listAjax"] = true;

	$tdataipbx_interf_mslync[".audit"] = true;

	$tdataipbx_interf_mslync[".locking"] = false;
	
$tdataipbx_interf_mslync[".listIcons"] = true;
$tdataipbx_interf_mslync[".inlineEdit"] = true;



$tdataipbx_interf_mslync[".delete"] = true;

$tdataipbx_interf_mslync[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_mslync[".showSearchPanel"] = true;


$tdataipbx_interf_mslync[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_mslync[".rowHighlite"] = true;

$tdataipbx_interf_mslync[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_mslync[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_mslync[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_mslync[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_mslync[".isUseTimeForSearch"] = false;





$tdataipbx_interf_mslync[".isUseInlineAdd"] = true;

$tdataipbx_interf_mslync[".isUseInlineEdit"] = true;
$tdataipbx_interf_mslync[".isUseInlineJs"] = $tdataipbx_interf_mslync[".isUseInlineAdd"] || $tdataipbx_interf_mslync[".isUseInlineEdit"];

$tdataipbx_interf_mslync[".allSearchFields"] = array();



$tdataipbx_interf_mslync[".isDynamicPerm"] = true;

	
$tdataipbx_interf_mslync[".isVerLayout"] = true;

$tdataipbx_interf_mslync[".isDisplayLoading"] = true;

$tdataipbx_interf_mslync[".isResizeColumns"] = false;


$tdataipbx_interf_mslync[".createLoginPage"] = true;


 	




$tdataipbx_interf_mslync[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_mslync[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_mslync[".orderindexes"] = array();

$tdataipbx_interf_mslync[".sqlHead"] = "SELECT id_interf,   dsc_interf,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   flg_logon_remoto";

$tdataipbx_interf_mslync[".sqlFrom"] = "FROM ipbx_interf_mslync";

$tdataipbx_interf_mslync[".sqlWhereExpr"] = "";

$tdataipbx_interf_mslync[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_mslync[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
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
			
											$tdataipbx_interf_mslync["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Descrição "; 
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
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_mslync["dsc_interf"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Host"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_host";
		$fdata["FullName"]= "ip_host";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_mslync["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
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
			$tdataipbx_interf_mslync["id_central"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
			$fdata["LCType"]= 3;
		
					
	$fdata["LinkField"]="codec";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="dsc_codec";
				$fdata["LookupTable"]="codecs";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 1;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_mslync["codec"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
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
			$tdataipbx_interf_mslync["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
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
			$tdataipbx_interf_mslync["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
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
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_mslync["piloto"]=$fdata;
	
//	id_chamada
	$fdata = array();
	$fdata["strName"] = "id_chamada";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Número Identificador (Saída)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_chamada";
		$fdata["FullName"]= "id_chamada";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_interf_mslync["id_chamada"]=$fdata;
	
//	flg_id_cham_parc
	$fdata = array();
	$fdata["strName"] = "flg_id_cham_parc";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Fixar identificador (Saída)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "flg_id_cham_parc";
		$fdata["FullName"]= "flg_id_cham_parc";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_interf_mslync["flg_id_cham_parc"]=$fdata;
	
//	flg_logon_remoto
	$fdata = array();
	$fdata["strName"] = "flg_logon_remoto";
	$fdata["ownerTable"] = "ipbx_interf_mslync";
		$fdata["Label"]="Logon Remoto"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_logon_remoto";
		$fdata["FullName"]= "flg_logon_remoto";
						$fdata["Index"]= 11;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_mslync["flg_logon_remoto"]=$fdata;

	
$tables_data["ipbx_interf_mslync"]=&$tdataipbx_interf_mslync;
$field_labels["ipbx_interf_mslync"] = &$fieldLabelsipbx_interf_mslync;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_mslync"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_mslync"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_mslync"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_mslync"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_mslync"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2757=array();
$proto2757["m_strHead"] = "SELECT";
$proto2757["m_strFieldList"] = "id_interf,   dsc_interf,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   flg_logon_remoto";
$proto2757["m_strFrom"] = "FROM ipbx_interf_mslync";
$proto2757["m_strWhere"] = "";
$proto2757["m_strOrderBy"] = "";
$proto2757["m_strTail"] = "";
$proto2758=array();
$proto2758["m_sql"] = "";
$proto2758["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2758["m_column"]=$obj;
$proto2758["m_contained"] = array();
$proto2758["m_strCase"] = "";
$proto2758["m_havingmode"] = "0";
$proto2758["m_inBrackets"] = "0";
$proto2758["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2758);

$proto2757["m_where"] = $obj;
$proto2760=array();
$proto2760["m_sql"] = "";
$proto2760["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2760["m_column"]=$obj;
$proto2760["m_contained"] = array();
$proto2760["m_strCase"] = "";
$proto2760["m_havingmode"] = "0";
$proto2760["m_inBrackets"] = "0";
$proto2760["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2760);

$proto2757["m_having"] = $obj;
$proto2757["m_fieldlist"] = array();
						$proto2762=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2762["m_expr"]=$obj;
$proto2762["m_alias"] = "";
$obj = new SQLFieldListItem($proto2762);

$proto2757["m_fieldlist"][]=$obj;
						$proto2764=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2764["m_expr"]=$obj;
$proto2764["m_alias"] = "";
$obj = new SQLFieldListItem($proto2764);

$proto2757["m_fieldlist"][]=$obj;
						$proto2766=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2766["m_expr"]=$obj;
$proto2766["m_alias"] = "";
$obj = new SQLFieldListItem($proto2766);

$proto2757["m_fieldlist"][]=$obj;
						$proto2768=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2768["m_expr"]=$obj;
$proto2768["m_alias"] = "";
$obj = new SQLFieldListItem($proto2768);

$proto2757["m_fieldlist"][]=$obj;
						$proto2770=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2770["m_expr"]=$obj;
$proto2770["m_alias"] = "";
$obj = new SQLFieldListItem($proto2770);

$proto2757["m_fieldlist"][]=$obj;
						$proto2772=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2772["m_expr"]=$obj;
$proto2772["m_alias"] = "";
$obj = new SQLFieldListItem($proto2772);

$proto2757["m_fieldlist"][]=$obj;
						$proto2774=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2774["m_expr"]=$obj;
$proto2774["m_alias"] = "";
$obj = new SQLFieldListItem($proto2774);

$proto2757["m_fieldlist"][]=$obj;
						$proto2776=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2776["m_expr"]=$obj;
$proto2776["m_alias"] = "";
$obj = new SQLFieldListItem($proto2776);

$proto2757["m_fieldlist"][]=$obj;
						$proto2778=array();
			$obj = new SQLField(array(
	"m_strName" => "id_chamada",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2778["m_expr"]=$obj;
$proto2778["m_alias"] = "";
$obj = new SQLFieldListItem($proto2778);

$proto2757["m_fieldlist"][]=$obj;
						$proto2780=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_id_cham_parc",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2780["m_expr"]=$obj;
$proto2780["m_alias"] = "";
$obj = new SQLFieldListItem($proto2780);

$proto2757["m_fieldlist"][]=$obj;
						$proto2782=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_logon_remoto",
	"m_strTable" => "ipbx_interf_mslync"
));

$proto2782["m_expr"]=$obj;
$proto2782["m_alias"] = "";
$obj = new SQLFieldListItem($proto2782);

$proto2757["m_fieldlist"][]=$obj;
$proto2757["m_fromlist"] = array();
												$proto2784=array();
$proto2784["m_link"] = "SQLL_MAIN";
			$proto2785=array();
$proto2785["m_strName"] = "ipbx_interf_mslync";
$proto2785["m_columns"] = array();
$proto2785["m_columns"][] = "id_interf";
$proto2785["m_columns"][] = "dsc_interf";
$proto2785["m_columns"][] = "ip_host";
$proto2785["m_columns"][] = "id_central";
$proto2785["m_columns"][] = "codec";
$proto2785["m_columns"][] = "id_tp_interf";
$proto2785["m_columns"][] = "tp_chamada";
$proto2785["m_columns"][] = "piloto";
$proto2785["m_columns"][] = "id_chamada";
$proto2785["m_columns"][] = "flg_id_cham_parc";
$proto2785["m_columns"][] = "flg_logon_remoto";
$obj = new SQLTable($proto2785);

$proto2784["m_table"] = $obj;
$proto2784["m_alias"] = "";
$proto2786=array();
$proto2786["m_sql"] = "";
$proto2786["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2786["m_column"]=$obj;
$proto2786["m_contained"] = array();
$proto2786["m_strCase"] = "";
$proto2786["m_havingmode"] = "0";
$proto2786["m_inBrackets"] = "0";
$proto2786["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2786);

$proto2784["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2784);

$proto2757["m_fromlist"][]=$obj;
$proto2757["m_groupby"] = array();
$proto2757["m_orderby"] = array();
$obj = new SQLQuery($proto2757);

$queryData_ipbx_interf_mslync = $obj;
$tdataipbx_interf_mslync[".sqlquery"] = $queryData_ipbx_interf_mslync;



?>
