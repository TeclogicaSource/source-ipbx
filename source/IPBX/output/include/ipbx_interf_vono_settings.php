<?php

//	field labels
$fieldLabelsipbx_interf_vono = array();
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["usuario"] = "Usuário";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["ip_host"] = "Host";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["ddd_localidade"] = "DDD (LOCAL)";
$fieldLabelsipbx_interf_vono["Portuguese(Brazil)"]["flg_logon_remoto"] = "Logon Remoto";


$tdataipbx_interf_vono=array();
	$tdataipbx_interf_vono[".NumberOfChars"]=80; 
	$tdataipbx_interf_vono[".ShortName"]="ipbx_interf_vono";
	$tdataipbx_interf_vono[".OwnerID"]="";
	$tdataipbx_interf_vono[".OriginalTable"]="ipbx_interf_vono";
	$tdataipbx_interf_vono[".NCSearch"]=true;
	

$tdataipbx_interf_vono[".shortTableName"] = "ipbx_interf_vono";
$tdataipbx_interf_vono[".dataSourceTable"] = "ipbx_interf_vono";
$tdataipbx_interf_vono[".nSecOptions"] = 0;
$tdataipbx_interf_vono[".nLoginMethod"] = 1;
$tdataipbx_interf_vono[".recsPerRowList"] = 1;	
$tdataipbx_interf_vono[".tableGroupBy"] = "0";
$tdataipbx_interf_vono[".dbType"] = 0;
$tdataipbx_interf_vono[".mainTableOwnerID"] = "";
$tdataipbx_interf_vono[".moveNext"] = 1;

$tdataipbx_interf_vono[".listAjax"] = true;

	$tdataipbx_interf_vono[".audit"] = true;

	$tdataipbx_interf_vono[".locking"] = false;
	
$tdataipbx_interf_vono[".listIcons"] = true;
$tdataipbx_interf_vono[".inlineEdit"] = true;



$tdataipbx_interf_vono[".delete"] = true;

$tdataipbx_interf_vono[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_vono[".showSearchPanel"] = true;


$tdataipbx_interf_vono[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_vono[".rowHighlite"] = true;

$tdataipbx_interf_vono[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_vono[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_vono[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_vono[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_vono[".isUseTimeForSearch"] = false;





$tdataipbx_interf_vono[".isUseInlineAdd"] = true;

$tdataipbx_interf_vono[".isUseInlineEdit"] = true;
$tdataipbx_interf_vono[".isUseInlineJs"] = $tdataipbx_interf_vono[".isUseInlineAdd"] || $tdataipbx_interf_vono[".isUseInlineEdit"];

$tdataipbx_interf_vono[".allSearchFields"] = array();



$tdataipbx_interf_vono[".isDynamicPerm"] = true;

	
$tdataipbx_interf_vono[".isVerLayout"] = true;

$tdataipbx_interf_vono[".isDisplayLoading"] = true;

$tdataipbx_interf_vono[".isResizeColumns"] = false;


$tdataipbx_interf_vono[".createLoginPage"] = true;


 	




$tdataipbx_interf_vono[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_vono[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_vono[".orderindexes"] = array();

$tdataipbx_interf_vono[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   ddd_localidade,   flg_logon_remoto";

$tdataipbx_interf_vono[".sqlFrom"] = "FROM ipbx_interf_vono";

$tdataipbx_interf_vono[".sqlWhereExpr"] = "";

$tdataipbx_interf_vono[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_vono[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_interf_vono["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_vono";
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
			$tdataipbx_interf_vono["dsc_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_contrato";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_operadora";
				$fdata["LookupTable"]="contrato_voip";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["id_contrato"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "ipbx_interf_vono";
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
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["senha"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Host"; 
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
			$tdataipbx_interf_vono["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["id_central"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "ipbx_interf_vono";
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
					$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["codec"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Tipo Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_vono";
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
					$fdata["Index"]= 10;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_vono";
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
						$fdata["Index"]= 11;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["piloto"]=$fdata;
	
//	ddd_localidade
	$fdata = array();
	$fdata["strName"] = "ddd_localidade";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="DDD (LOCAL)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ddd_localidade";
		$fdata["FullName"]= "ddd_localidade";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=2";
			$fdata["EditParams"].= " size=2";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_vono["ddd_localidade"]=$fdata;
	
//	flg_logon_remoto
	$fdata = array();
	$fdata["strName"] = "flg_logon_remoto";
	$fdata["ownerTable"] = "ipbx_interf_vono";
		$fdata["Label"]="Logon Remoto"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "flg_logon_remoto";
		$fdata["FullName"]= "flg_logon_remoto";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_interf_vono["flg_logon_remoto"]=$fdata;

	
$tables_data["ipbx_interf_vono"]=&$tdataipbx_interf_vono;
$field_labels["ipbx_interf_vono"] = &$fieldLabelsipbx_interf_vono;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_vono"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_vono"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_vono"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_vono"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_vono"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2896=array();
$proto2896["m_strHead"] = "SELECT";
$proto2896["m_strFieldList"] = "id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   ddd_localidade,   flg_logon_remoto";
$proto2896["m_strFrom"] = "FROM ipbx_interf_vono";
$proto2896["m_strWhere"] = "";
$proto2896["m_strOrderBy"] = "";
$proto2896["m_strTail"] = "";
$proto2897=array();
$proto2897["m_sql"] = "";
$proto2897["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2897["m_column"]=$obj;
$proto2897["m_contained"] = array();
$proto2897["m_strCase"] = "";
$proto2897["m_havingmode"] = "0";
$proto2897["m_inBrackets"] = "0";
$proto2897["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2897);

$proto2896["m_where"] = $obj;
$proto2899=array();
$proto2899["m_sql"] = "";
$proto2899["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2899["m_column"]=$obj;
$proto2899["m_contained"] = array();
$proto2899["m_strCase"] = "";
$proto2899["m_havingmode"] = "0";
$proto2899["m_inBrackets"] = "0";
$proto2899["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2899);

$proto2896["m_having"] = $obj;
$proto2896["m_fieldlist"] = array();
						$proto2901=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2901["m_expr"]=$obj;
$proto2901["m_alias"] = "";
$obj = new SQLFieldListItem($proto2901);

$proto2896["m_fieldlist"][]=$obj;
						$proto2903=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2903["m_expr"]=$obj;
$proto2903["m_alias"] = "";
$obj = new SQLFieldListItem($proto2903);

$proto2896["m_fieldlist"][]=$obj;
						$proto2905=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2905["m_expr"]=$obj;
$proto2905["m_alias"] = "";
$obj = new SQLFieldListItem($proto2905);

$proto2896["m_fieldlist"][]=$obj;
						$proto2907=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2907["m_expr"]=$obj;
$proto2907["m_alias"] = "";
$obj = new SQLFieldListItem($proto2907);

$proto2896["m_fieldlist"][]=$obj;
						$proto2909=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2909["m_expr"]=$obj;
$proto2909["m_alias"] = "";
$obj = new SQLFieldListItem($proto2909);

$proto2896["m_fieldlist"][]=$obj;
						$proto2911=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2911["m_expr"]=$obj;
$proto2911["m_alias"] = "";
$obj = new SQLFieldListItem($proto2911);

$proto2896["m_fieldlist"][]=$obj;
						$proto2913=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2913["m_expr"]=$obj;
$proto2913["m_alias"] = "";
$obj = new SQLFieldListItem($proto2913);

$proto2896["m_fieldlist"][]=$obj;
						$proto2915=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2915["m_expr"]=$obj;
$proto2915["m_alias"] = "";
$obj = new SQLFieldListItem($proto2915);

$proto2896["m_fieldlist"][]=$obj;
						$proto2917=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2917["m_expr"]=$obj;
$proto2917["m_alias"] = "";
$obj = new SQLFieldListItem($proto2917);

$proto2896["m_fieldlist"][]=$obj;
						$proto2919=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2919["m_expr"]=$obj;
$proto2919["m_alias"] = "";
$obj = new SQLFieldListItem($proto2919);

$proto2896["m_fieldlist"][]=$obj;
						$proto2921=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2921["m_expr"]=$obj;
$proto2921["m_alias"] = "";
$obj = new SQLFieldListItem($proto2921);

$proto2896["m_fieldlist"][]=$obj;
						$proto2923=array();
			$obj = new SQLField(array(
	"m_strName" => "ddd_localidade",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2923["m_expr"]=$obj;
$proto2923["m_alias"] = "";
$obj = new SQLFieldListItem($proto2923);

$proto2896["m_fieldlist"][]=$obj;
						$proto2925=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_logon_remoto",
	"m_strTable" => "ipbx_interf_vono"
));

$proto2925["m_expr"]=$obj;
$proto2925["m_alias"] = "";
$obj = new SQLFieldListItem($proto2925);

$proto2896["m_fieldlist"][]=$obj;
$proto2896["m_fromlist"] = array();
												$proto2927=array();
$proto2927["m_link"] = "SQLL_MAIN";
			$proto2928=array();
$proto2928["m_strName"] = "ipbx_interf_vono";
$proto2928["m_columns"] = array();
$proto2928["m_columns"][] = "id_interf";
$proto2928["m_columns"][] = "dsc_interf";
$proto2928["m_columns"][] = "id_contrato";
$proto2928["m_columns"][] = "usuario";
$proto2928["m_columns"][] = "senha";
$proto2928["m_columns"][] = "ip_host";
$proto2928["m_columns"][] = "id_central";
$proto2928["m_columns"][] = "codec";
$proto2928["m_columns"][] = "id_tp_interf";
$proto2928["m_columns"][] = "tp_chamada";
$proto2928["m_columns"][] = "piloto";
$proto2928["m_columns"][] = "ddd_localidade";
$proto2928["m_columns"][] = "flg_logon_remoto";
$obj = new SQLTable($proto2928);

$proto2927["m_table"] = $obj;
$proto2927["m_alias"] = "";
$proto2929=array();
$proto2929["m_sql"] = "";
$proto2929["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2929["m_column"]=$obj;
$proto2929["m_contained"] = array();
$proto2929["m_strCase"] = "";
$proto2929["m_havingmode"] = "0";
$proto2929["m_inBrackets"] = "0";
$proto2929["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2929);

$proto2927["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2927);

$proto2896["m_fromlist"][]=$obj;
$proto2896["m_groupby"] = array();
$proto2896["m_orderby"] = array();
$obj = new SQLQuery($proto2896);

$queryData_ipbx_interf_vono = $obj;
$tdataipbx_interf_vono[".sqlquery"] = $queryData_ipbx_interf_vono;



?>
