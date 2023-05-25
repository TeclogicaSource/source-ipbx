<?php

//	field labels
$fieldLabelsipbx_interf_voxip = array();
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["id_interf"] = "Identificação";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["usuario"] = "Usuário";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["ip_host"] = "Host";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo Interface";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["tp_chamada"] = "Tempo Chamada (s)";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["id_chamada"] = "Número Identificador (Saída)";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["flg_id_cham_parc"] = "Fixar identificador (Saída)";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["cd_operadora"] = "Código Operadora";
$fieldLabelsipbx_interf_voxip["Portuguese(Brazil)"]["flg_logon_remoto"] = "Logon Remoto";


$tdataipbx_interf_voxip=array();
	$tdataipbx_interf_voxip[".NumberOfChars"]=80; 
	$tdataipbx_interf_voxip[".ShortName"]="ipbx_interf_voxip";
	$tdataipbx_interf_voxip[".OwnerID"]="";
	$tdataipbx_interf_voxip[".OriginalTable"]="ipbx_interf_voxip";
	$tdataipbx_interf_voxip[".NCSearch"]=true;
	

$tdataipbx_interf_voxip[".shortTableName"] = "ipbx_interf_voxip";
$tdataipbx_interf_voxip[".dataSourceTable"] = "ipbx_interf_voxip";
$tdataipbx_interf_voxip[".nSecOptions"] = 0;
$tdataipbx_interf_voxip[".nLoginMethod"] = 1;
$tdataipbx_interf_voxip[".recsPerRowList"] = 1;	
$tdataipbx_interf_voxip[".tableGroupBy"] = "0";
$tdataipbx_interf_voxip[".dbType"] = 0;
$tdataipbx_interf_voxip[".mainTableOwnerID"] = "";
$tdataipbx_interf_voxip[".moveNext"] = 1;

$tdataipbx_interf_voxip[".listAjax"] = true;

	$tdataipbx_interf_voxip[".audit"] = true;

	$tdataipbx_interf_voxip[".locking"] = false;
	
$tdataipbx_interf_voxip[".listIcons"] = true;
$tdataipbx_interf_voxip[".inlineEdit"] = true;



$tdataipbx_interf_voxip[".delete"] = true;

$tdataipbx_interf_voxip[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_voxip[".showSearchPanel"] = true;


$tdataipbx_interf_voxip[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_voxip[".rowHighlite"] = true;

$tdataipbx_interf_voxip[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_voxip[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_voxip[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_voxip[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_voxip[".isUseTimeForSearch"] = false;





$tdataipbx_interf_voxip[".isUseInlineAdd"] = true;

$tdataipbx_interf_voxip[".isUseInlineEdit"] = true;
$tdataipbx_interf_voxip[".isUseInlineJs"] = $tdataipbx_interf_voxip[".isUseInlineAdd"] || $tdataipbx_interf_voxip[".isUseInlineEdit"];

$tdataipbx_interf_voxip[".allSearchFields"] = array();



$tdataipbx_interf_voxip[".isDynamicPerm"] = true;

	
$tdataipbx_interf_voxip[".isVerLayout"] = true;

$tdataipbx_interf_voxip[".isDisplayLoading"] = true;

$tdataipbx_interf_voxip[".isResizeColumns"] = false;


$tdataipbx_interf_voxip[".createLoginPage"] = true;


 	




$tdataipbx_interf_voxip[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_voxip[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_voxip[".orderindexes"] = array();

$tdataipbx_interf_voxip[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto";

$tdataipbx_interf_voxip[".sqlFrom"] = "FROM ipbx_interf_voxip";

$tdataipbx_interf_voxip[".sqlWhereExpr"] = "";

$tdataipbx_interf_voxip[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_voxip[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			
											$tdataipbx_interf_voxip["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["dsc_interf"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["id_contrato"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["senha"]=$fdata;
	
//	ip_host
	$fdata = array();
	$fdata["strName"] = "ip_host";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["ip_host"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["id_central"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
	$fdata["LookupOrderBy"]="idt_codec";
						
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 1;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
						$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["codec"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
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
			$tdataipbx_interf_voxip["piloto"]=$fdata;
	
//	id_chamada
	$fdata = array();
	$fdata["strName"] = "id_chamada";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Número Identificador (Saída)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_chamada";
		$fdata["FullName"]= "id_chamada";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["id_chamada"]=$fdata;
	
//	flg_id_cham_parc
	$fdata = array();
	$fdata["strName"] = "flg_id_cham_parc";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Fixar identificador (Saída)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_id_cham_parc";
		$fdata["FullName"]= "flg_id_cham_parc";
						$fdata["Index"]= 13;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["flg_id_cham_parc"]=$fdata;
	
//	cd_operadora
	$fdata = array();
	$fdata["strName"] = "cd_operadora";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Código Operadora"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cd_operadora";
		$fdata["FullName"]= "cd_operadora";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=2";
			$fdata["EditParams"].= " size=2";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["cd_operadora"]=$fdata;
	
//	flg_logon_remoto
	$fdata = array();
	$fdata["strName"] = "flg_logon_remoto";
	$fdata["ownerTable"] = "ipbx_interf_voxip";
		$fdata["Label"]="Logon Remoto"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_logon_remoto";
		$fdata["FullName"]= "flg_logon_remoto";
						$fdata["Index"]= 15;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_voxip["flg_logon_remoto"]=$fdata;

	
$tables_data["ipbx_interf_voxip"]=&$tdataipbx_interf_voxip;
$field_labels["ipbx_interf_voxip"] = &$fieldLabelsipbx_interf_voxip;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_voxip"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_voxip"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_voxip"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_voxip"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_voxip"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2424=array();
$proto2424["m_strHead"] = "SELECT";
$proto2424["m_strFieldList"] = "id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto";
$proto2424["m_strFrom"] = "FROM ipbx_interf_voxip";
$proto2424["m_strWhere"] = "";
$proto2424["m_strOrderBy"] = "";
$proto2424["m_strTail"] = "";
$proto2425=array();
$proto2425["m_sql"] = "";
$proto2425["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2425["m_column"]=$obj;
$proto2425["m_contained"] = array();
$proto2425["m_strCase"] = "";
$proto2425["m_havingmode"] = "0";
$proto2425["m_inBrackets"] = "0";
$proto2425["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2425);

$proto2424["m_where"] = $obj;
$proto2427=array();
$proto2427["m_sql"] = "";
$proto2427["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2427["m_column"]=$obj;
$proto2427["m_contained"] = array();
$proto2427["m_strCase"] = "";
$proto2427["m_havingmode"] = "0";
$proto2427["m_inBrackets"] = "0";
$proto2427["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2427);

$proto2424["m_having"] = $obj;
$proto2424["m_fieldlist"] = array();
						$proto2429=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2429["m_expr"]=$obj;
$proto2429["m_alias"] = "";
$obj = new SQLFieldListItem($proto2429);

$proto2424["m_fieldlist"][]=$obj;
						$proto2431=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2431["m_expr"]=$obj;
$proto2431["m_alias"] = "";
$obj = new SQLFieldListItem($proto2431);

$proto2424["m_fieldlist"][]=$obj;
						$proto2433=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2433["m_expr"]=$obj;
$proto2433["m_alias"] = "";
$obj = new SQLFieldListItem($proto2433);

$proto2424["m_fieldlist"][]=$obj;
						$proto2435=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2435["m_expr"]=$obj;
$proto2435["m_alias"] = "";
$obj = new SQLFieldListItem($proto2435);

$proto2424["m_fieldlist"][]=$obj;
						$proto2437=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2437["m_expr"]=$obj;
$proto2437["m_alias"] = "";
$obj = new SQLFieldListItem($proto2437);

$proto2424["m_fieldlist"][]=$obj;
						$proto2439=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_host",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2439["m_expr"]=$obj;
$proto2439["m_alias"] = "";
$obj = new SQLFieldListItem($proto2439);

$proto2424["m_fieldlist"][]=$obj;
						$proto2441=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2441["m_expr"]=$obj;
$proto2441["m_alias"] = "";
$obj = new SQLFieldListItem($proto2441);

$proto2424["m_fieldlist"][]=$obj;
						$proto2443=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2443["m_expr"]=$obj;
$proto2443["m_alias"] = "";
$obj = new SQLFieldListItem($proto2443);

$proto2424["m_fieldlist"][]=$obj;
						$proto2445=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2445["m_expr"]=$obj;
$proto2445["m_alias"] = "";
$obj = new SQLFieldListItem($proto2445);

$proto2424["m_fieldlist"][]=$obj;
						$proto2447=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2447["m_expr"]=$obj;
$proto2447["m_alias"] = "";
$obj = new SQLFieldListItem($proto2447);

$proto2424["m_fieldlist"][]=$obj;
						$proto2449=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2449["m_expr"]=$obj;
$proto2449["m_alias"] = "";
$obj = new SQLFieldListItem($proto2449);

$proto2424["m_fieldlist"][]=$obj;
						$proto2451=array();
			$obj = new SQLField(array(
	"m_strName" => "id_chamada",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2451["m_expr"]=$obj;
$proto2451["m_alias"] = "";
$obj = new SQLFieldListItem($proto2451);

$proto2424["m_fieldlist"][]=$obj;
						$proto2453=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_id_cham_parc",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2453["m_expr"]=$obj;
$proto2453["m_alias"] = "";
$obj = new SQLFieldListItem($proto2453);

$proto2424["m_fieldlist"][]=$obj;
						$proto2455=array();
			$obj = new SQLField(array(
	"m_strName" => "cd_operadora",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2455["m_expr"]=$obj;
$proto2455["m_alias"] = "";
$obj = new SQLFieldListItem($proto2455);

$proto2424["m_fieldlist"][]=$obj;
						$proto2457=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_logon_remoto",
	"m_strTable" => "ipbx_interf_voxip"
));

$proto2457["m_expr"]=$obj;
$proto2457["m_alias"] = "";
$obj = new SQLFieldListItem($proto2457);

$proto2424["m_fieldlist"][]=$obj;
$proto2424["m_fromlist"] = array();
												$proto2459=array();
$proto2459["m_link"] = "SQLL_MAIN";
			$proto2460=array();
$proto2460["m_strName"] = "ipbx_interf_voxip";
$proto2460["m_columns"] = array();
$proto2460["m_columns"][] = "id_interf";
$proto2460["m_columns"][] = "dsc_interf";
$proto2460["m_columns"][] = "id_contrato";
$proto2460["m_columns"][] = "usuario";
$proto2460["m_columns"][] = "senha";
$proto2460["m_columns"][] = "ip_host";
$proto2460["m_columns"][] = "id_central";
$proto2460["m_columns"][] = "codec";
$proto2460["m_columns"][] = "id_tp_interf";
$proto2460["m_columns"][] = "tp_chamada";
$proto2460["m_columns"][] = "piloto";
$proto2460["m_columns"][] = "id_chamada";
$proto2460["m_columns"][] = "flg_id_cham_parc";
$proto2460["m_columns"][] = "cd_operadora";
$proto2460["m_columns"][] = "flg_logon_remoto";
$obj = new SQLTable($proto2460);

$proto2459["m_table"] = $obj;
$proto2459["m_alias"] = "";
$proto2461=array();
$proto2461["m_sql"] = "";
$proto2461["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2461["m_column"]=$obj;
$proto2461["m_contained"] = array();
$proto2461["m_strCase"] = "";
$proto2461["m_havingmode"] = "0";
$proto2461["m_inBrackets"] = "0";
$proto2461["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2461);

$proto2459["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2459);

$proto2424["m_fromlist"][]=$obj;
$proto2424["m_groupby"] = array();
$proto2424["m_orderby"] = array();
$obj = new SQLQuery($proto2424);

$queryData_ipbx_interf_voxip = $obj;
$tdataipbx_interf_voxip[".sqlquery"] = $queryData_ipbx_interf_voxip;



?>
