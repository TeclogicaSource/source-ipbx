<?php

//	field labels
$fieldLabelsipbx_interf_sip = array();
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["usuario"] = "Usuário";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["ip_host"] = "Host";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_sip["Portuguese(Brazil)"]["flg_logon_remoto"] = "Logon Remoto";


$tdataipbx_interf_sip=array();
	$tdataipbx_interf_sip[".NumberOfChars"]=80; 
	$tdataipbx_interf_sip[".ShortName"]="ipbx_interf_sip";
	$tdataipbx_interf_sip[".OwnerID"]="";
	$tdataipbx_interf_sip[".OriginalTable"]="ipbx_interf_sip";
	$tdataipbx_interf_sip[".NCSearch"]=true;
	

$tdataipbx_interf_sip[".shortTableName"] = "ipbx_interf_sip";
$tdataipbx_interf_sip[".dataSourceTable"] = "ipbx_interf_sip";
$tdataipbx_interf_sip[".nSecOptions"] = 0;
$tdataipbx_interf_sip[".nLoginMethod"] = 1;
$tdataipbx_interf_sip[".recsPerRowList"] = 1;	
$tdataipbx_interf_sip[".tableGroupBy"] = "0";
$tdataipbx_interf_sip[".dbType"] = 0;
$tdataipbx_interf_sip[".mainTableOwnerID"] = "";
$tdataipbx_interf_sip[".moveNext"] = 1;

$tdataipbx_interf_sip[".listAjax"] = true;

	$tdataipbx_interf_sip[".audit"] = true;

	$tdataipbx_interf_sip[".locking"] = false;
	
$tdataipbx_interf_sip[".listIcons"] = true;
$tdataipbx_interf_sip[".inlineEdit"] = true;



$tdataipbx_interf_sip[".delete"] = true;

$tdataipbx_interf_sip[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_sip[".showSearchPanel"] = true;


$tdataipbx_interf_sip[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_sip[".rowHighlite"] = true;

$tdataipbx_interf_sip[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_sip[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_sip[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_sip[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_sip[".isUseTimeForSearch"] = false;





$tdataipbx_interf_sip[".isUseInlineAdd"] = true;

$tdataipbx_interf_sip[".isUseInlineEdit"] = true;
$tdataipbx_interf_sip[".isUseInlineJs"] = $tdataipbx_interf_sip[".isUseInlineAdd"] || $tdataipbx_interf_sip[".isUseInlineEdit"];

$tdataipbx_interf_sip[".allSearchFields"] = array();



$tdataipbx_interf_sip[".isDynamicPerm"] = true;

	
$tdataipbx_interf_sip[".isVerLayout"] = true;

$tdataipbx_interf_sip[".isDisplayLoading"] = true;

$tdataipbx_interf_sip[".isResizeColumns"] = false;


$tdataipbx_interf_sip[".createLoginPage"] = true;


 	




$tdataipbx_interf_sip[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_sip[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_sip[".orderindexes"] = array();

$tdataipbx_interf_sip[".sqlHead"] = "SELECT id_interf,   dsc_interf,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   flg_logon_remoto";

$tdataipbx_interf_sip[".sqlFrom"] = "FROM ipbx_interf_sip";

$tdataipbx_interf_sip[".sqlWhereExpr"] = "";

$tdataipbx_interf_sip[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_sip[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
			
											$tdataipbx_interf_sip["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
			$tdataipbx_interf_sip["dsc_interf"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "ipbx_interf_sip";
		$fdata["Label"]="Usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "ipbx_interf_sip";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["senha"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "ipbx_interf_sip";
		$fdata["Label"]="Host"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_host";
		$fdata["FullName"]= "ip_host";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_sip";
		$fdata["Label"]="Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["id_central"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
	$fdata["LookupOrderBy"]="codec";
				$fdata["LookupDesc"]=true;
			
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 1;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["codec"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_sip";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
					$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
						$fdata["Index"]= 10;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_sip["piloto"]=$fdata;
	
//	flg_logon_remoto
	$fdata = array();
	$fdata["strName"] = "flg_logon_remoto";
	$fdata["ownerTable"] = "ipbx_interf_sip";
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
			$tdataipbx_interf_sip["flg_logon_remoto"]=$fdata;

	
$tables_data["ipbx_interf_sip"]=&$tdataipbx_interf_sip;
$field_labels["ipbx_interf_sip"] = &$fieldLabelsipbx_interf_sip;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_sip"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_sip"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_sip"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_sip"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_sip"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2726=array();
$proto2726["m_strHead"] = "SELECT";
$proto2726["m_strFieldList"] = "id_interf,   dsc_interf,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   flg_logon_remoto";
$proto2726["m_strFrom"] = "FROM ipbx_interf_sip";
$proto2726["m_strWhere"] = "";
$proto2726["m_strOrderBy"] = "";
$proto2726["m_strTail"] = "";
$proto2727=array();
$proto2727["m_sql"] = "";
$proto2727["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2727["m_column"]=$obj;
$proto2727["m_contained"] = array();
$proto2727["m_strCase"] = "";
$proto2727["m_havingmode"] = "0";
$proto2727["m_inBrackets"] = "0";
$proto2727["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2727);

$proto2726["m_where"] = $obj;
$proto2729=array();
$proto2729["m_sql"] = "";
$proto2729["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2729["m_column"]=$obj;
$proto2729["m_contained"] = array();
$proto2729["m_strCase"] = "";
$proto2729["m_havingmode"] = "0";
$proto2729["m_inBrackets"] = "0";
$proto2729["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2729);

$proto2726["m_having"] = $obj;
$proto2726["m_fieldlist"] = array();
						$proto2731=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2731["m_expr"]=$obj;
$proto2731["m_alias"] = "";
$obj = new SQLFieldListItem($proto2731);

$proto2726["m_fieldlist"][]=$obj;
						$proto2733=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2733["m_expr"]=$obj;
$proto2733["m_alias"] = "";
$obj = new SQLFieldListItem($proto2733);

$proto2726["m_fieldlist"][]=$obj;
						$proto2735=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2735["m_expr"]=$obj;
$proto2735["m_alias"] = "";
$obj = new SQLFieldListItem($proto2735);

$proto2726["m_fieldlist"][]=$obj;
						$proto2737=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2737["m_expr"]=$obj;
$proto2737["m_alias"] = "";
$obj = new SQLFieldListItem($proto2737);

$proto2726["m_fieldlist"][]=$obj;
						$proto2739=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2739["m_expr"]=$obj;
$proto2739["m_alias"] = "";
$obj = new SQLFieldListItem($proto2739);

$proto2726["m_fieldlist"][]=$obj;
						$proto2741=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2741["m_expr"]=$obj;
$proto2741["m_alias"] = "";
$obj = new SQLFieldListItem($proto2741);

$proto2726["m_fieldlist"][]=$obj;
						$proto2743=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2743["m_expr"]=$obj;
$proto2743["m_alias"] = "";
$obj = new SQLFieldListItem($proto2743);

$proto2726["m_fieldlist"][]=$obj;
						$proto2745=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2745["m_expr"]=$obj;
$proto2745["m_alias"] = "";
$obj = new SQLFieldListItem($proto2745);

$proto2726["m_fieldlist"][]=$obj;
						$proto2747=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2747["m_expr"]=$obj;
$proto2747["m_alias"] = "";
$obj = new SQLFieldListItem($proto2747);

$proto2726["m_fieldlist"][]=$obj;
						$proto2749=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2749["m_expr"]=$obj;
$proto2749["m_alias"] = "";
$obj = new SQLFieldListItem($proto2749);

$proto2726["m_fieldlist"][]=$obj;
						$proto2751=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_logon_remoto",
	"m_strTable" => "ipbx_interf_sip"
));

$proto2751["m_expr"]=$obj;
$proto2751["m_alias"] = "";
$obj = new SQLFieldListItem($proto2751);

$proto2726["m_fieldlist"][]=$obj;
$proto2726["m_fromlist"] = array();
												$proto2753=array();
$proto2753["m_link"] = "SQLL_MAIN";
			$proto2754=array();
$proto2754["m_strName"] = "ipbx_interf_sip";
$proto2754["m_columns"] = array();
$proto2754["m_columns"][] = "id_interf";
$proto2754["m_columns"][] = "dsc_interf";
$proto2754["m_columns"][] = "usuario";
$proto2754["m_columns"][] = "senha";
$proto2754["m_columns"][] = "ip_host";
$proto2754["m_columns"][] = "id_central";
$proto2754["m_columns"][] = "codec";
$proto2754["m_columns"][] = "id_tp_interf";
$proto2754["m_columns"][] = "tp_chamada";
$proto2754["m_columns"][] = "piloto";
$proto2754["m_columns"][] = "flg_logon_remoto";
$obj = new SQLTable($proto2754);

$proto2753["m_table"] = $obj;
$proto2753["m_alias"] = "";
$proto2755=array();
$proto2755["m_sql"] = "";
$proto2755["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2755["m_column"]=$obj;
$proto2755["m_contained"] = array();
$proto2755["m_strCase"] = "";
$proto2755["m_havingmode"] = "0";
$proto2755["m_inBrackets"] = "0";
$proto2755["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2755);

$proto2753["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2753);

$proto2726["m_fromlist"][]=$obj;
$proto2726["m_groupby"] = array();
$proto2726["m_orderby"] = array();
$obj = new SQLQuery($proto2726);

$queryData_ipbx_interf_sip = $obj;
$tdataipbx_interf_sip[".sqlquery"] = $queryData_ipbx_interf_sip;



?>
