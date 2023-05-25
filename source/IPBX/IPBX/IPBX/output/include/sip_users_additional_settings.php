<?php

//	field labels
$fieldLabelssip_users_additional = array();
$fieldLabelssip_users_additional["Portuguese(Brazil)"]=array();
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["id_additional"] = "identificação";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["mail"] = "E-mail (Secretária Eletronica)";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["call_forward"] = "Ramal transbordo do usuário";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["flg_fax"] = "Ramal de Fax";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["trc_piloto"] = "Piloto do tronco";
$fieldLabelssip_users_additional["Portuguese(Brazil)"]["flg_grava"] = "Gravar ligações";


$tdatasip_users_additional=array();
	$tdatasip_users_additional[".NumberOfChars"]=80; 
	$tdatasip_users_additional[".ShortName"]="sip_users_additional";
	$tdatasip_users_additional[".OwnerID"]="";
	$tdatasip_users_additional[".OriginalTable"]="sip_users_additional";
	$tdatasip_users_additional[".NCSearch"]=true;
	

$tdatasip_users_additional[".shortTableName"] = "sip_users_additional";
$tdatasip_users_additional[".dataSourceTable"] = "sip_users_additional";
$tdatasip_users_additional[".nSecOptions"] = 0;
$tdatasip_users_additional[".nLoginMethod"] = 1;
$tdatasip_users_additional[".recsPerRowList"] = 1;	
$tdatasip_users_additional[".tableGroupBy"] = "0";
$tdatasip_users_additional[".dbType"] = 0;
$tdatasip_users_additional[".mainTableOwnerID"] = "";
$tdatasip_users_additional[".moveNext"] = 1;

$tdatasip_users_additional[".listAjax"] = false;

	$tdatasip_users_additional[".audit"] = true;

	$tdatasip_users_additional[".locking"] = false;
	
$tdatasip_users_additional[".listIcons"] = true;
$tdatasip_users_additional[".edit"] = true;
$tdatasip_users_additional[".inlineEdit"] = true;




$tdatasip_users_additional[".showSimpleSearchOptions"] = false;

$tdatasip_users_additional[".showSearchPanel"] = true;


$tdatasip_users_additional[".isUseAjaxSuggest"] = true;

$tdatasip_users_additional[".rowHighlite"] = true;

$tdatasip_users_additional[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasip_users_additional[".arrKeyFields"][] = "id_additional";

// use datepicker for search panel
$tdatasip_users_additional[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatasip_users_additional[".isUseTimeForSearch"] = false;






$tdatasip_users_additional[".isUseInlineEdit"] = true;
$tdatasip_users_additional[".isUseInlineJs"] = $tdatasip_users_additional[".isUseInlineAdd"] || $tdatasip_users_additional[".isUseInlineEdit"];

$tdatasip_users_additional[".allSearchFields"] = array();



$tdatasip_users_additional[".isDynamicPerm"] = true;

	

$tdatasip_users_additional[".isDisplayLoading"] = true;

$tdatasip_users_additional[".isResizeColumns"] = false;


$tdatasip_users_additional[".createLoginPage"] = true;


 	




$tdatasip_users_additional[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasip_users_additional[".strOrderBy"] = $gstrOrderBy;
	
$tdatasip_users_additional[".orderindexes"] = array();

$tdatasip_users_additional[".sqlHead"] = "SELECT id_additional,   name,   trc_piloto,   mail,   call_forward,   flg_fax,   flg_grava";

$tdatasip_users_additional[".sqlFrom"] = "FROM sip_users_additional";

$tdatasip_users_additional[".sqlWhereExpr"] = "";

$tdatasip_users_additional[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_additional";
	$tdatasip_users_additional[".Keys"]=$tableKeys;

	
//	id_additional
	$fdata = array();
	$fdata["strName"] = "id_additional";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_additional";
		$fdata["FullName"]= "id_additional";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatasip_users_additional["id_additional"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
								$tdatasip_users_additional["name"]=$fdata;
	
//	trc_piloto
	$fdata = array();
	$fdata["strName"] = "trc_piloto";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="Piloto do tronco"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
			$fdata["LCType"]= 3;
		
					
	$fdata["LinkField"]="id_tronco";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_tronco";
				$fdata["LookupTable"]="troncos";
	$fdata["LookupOrderBy"]="";
						
				
										
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 1;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "trc_piloto";
		$fdata["FullName"]= "trc_piloto";
						$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_additional["trc_piloto"]=$fdata;
	
//	mail
	$fdata = array();
	$fdata["strName"] = "mail";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="E-mail (Secretária Eletronica)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mail";
		$fdata["FullName"]= "mail";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=120";
			$fdata["EditParams"].= " size=60";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_additional["mail"]=$fdata;
	
//	call_forward
	$fdata = array();
	$fdata["strName"] = "call_forward";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="Ramal transbordo do usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="callerid";
				$fdata["LookupTable"]="sip_users";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "call_forward";
		$fdata["FullName"]= "call_forward";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_additional["call_forward"]=$fdata;
	
//	flg_fax
	$fdata = array();
	$fdata["strName"] = "flg_fax";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="Ramal de Fax"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_fax";
		$fdata["FullName"]= "flg_fax";
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_additional["flg_fax"]=$fdata;
	
//	flg_grava
	$fdata = array();
	$fdata["strName"] = "flg_grava";
	$fdata["ownerTable"] = "sip_users_additional";
		$fdata["Label"]="Gravar ligações"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_grava";
		$fdata["FullName"]= "flg_grava";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasip_users_additional["flg_grava"]=$fdata;

	
$tables_data["sip_users_additional"]=&$tdatasip_users_additional;
$field_labels["sip_users_additional"] = &$fieldLabelssip_users_additional;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sip_users_additional"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sip_users_additional"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="sip_users";
	$masterTablesData["sip_users_additional"][$mIndex] = array(
		  "mDataSourceTable"=>"sip_users"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "sip_users"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "0"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 2
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["sip_users_additional"][$mIndex]["masterKeys"][]="name";
		$masterTablesData["sip_users_additional"][$mIndex]["detailKeys"][]="name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1181=array();
$proto1181["m_strHead"] = "SELECT";
$proto1181["m_strFieldList"] = "id_additional,   name,   trc_piloto,   mail,   call_forward,   flg_fax,   flg_grava";
$proto1181["m_strFrom"] = "FROM sip_users_additional";
$proto1181["m_strWhere"] = "";
$proto1181["m_strOrderBy"] = "";
$proto1181["m_strTail"] = "";
$proto1182=array();
$proto1182["m_sql"] = "";
$proto1182["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1182["m_column"]=$obj;
$proto1182["m_contained"] = array();
$proto1182["m_strCase"] = "";
$proto1182["m_havingmode"] = "0";
$proto1182["m_inBrackets"] = "0";
$proto1182["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1182);

$proto1181["m_where"] = $obj;
$proto1184=array();
$proto1184["m_sql"] = "";
$proto1184["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1184["m_column"]=$obj;
$proto1184["m_contained"] = array();
$proto1184["m_strCase"] = "";
$proto1184["m_havingmode"] = "0";
$proto1184["m_inBrackets"] = "0";
$proto1184["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1184);

$proto1181["m_having"] = $obj;
$proto1181["m_fieldlist"] = array();
						$proto1186=array();
			$obj = new SQLField(array(
	"m_strName" => "id_additional",
	"m_strTable" => "sip_users_additional"
));

$proto1186["m_expr"]=$obj;
$proto1186["m_alias"] = "";
$obj = new SQLFieldListItem($proto1186);

$proto1181["m_fieldlist"][]=$obj;
						$proto1188=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "sip_users_additional"
));

$proto1188["m_expr"]=$obj;
$proto1188["m_alias"] = "";
$obj = new SQLFieldListItem($proto1188);

$proto1181["m_fieldlist"][]=$obj;
						$proto1190=array();
			$obj = new SQLField(array(
	"m_strName" => "trc_piloto",
	"m_strTable" => "sip_users_additional"
));

$proto1190["m_expr"]=$obj;
$proto1190["m_alias"] = "";
$obj = new SQLFieldListItem($proto1190);

$proto1181["m_fieldlist"][]=$obj;
						$proto1192=array();
			$obj = new SQLField(array(
	"m_strName" => "mail",
	"m_strTable" => "sip_users_additional"
));

$proto1192["m_expr"]=$obj;
$proto1192["m_alias"] = "";
$obj = new SQLFieldListItem($proto1192);

$proto1181["m_fieldlist"][]=$obj;
						$proto1194=array();
			$obj = new SQLField(array(
	"m_strName" => "call_forward",
	"m_strTable" => "sip_users_additional"
));

$proto1194["m_expr"]=$obj;
$proto1194["m_alias"] = "";
$obj = new SQLFieldListItem($proto1194);

$proto1181["m_fieldlist"][]=$obj;
						$proto1196=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_fax",
	"m_strTable" => "sip_users_additional"
));

$proto1196["m_expr"]=$obj;
$proto1196["m_alias"] = "";
$obj = new SQLFieldListItem($proto1196);

$proto1181["m_fieldlist"][]=$obj;
						$proto1198=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_grava",
	"m_strTable" => "sip_users_additional"
));

$proto1198["m_expr"]=$obj;
$proto1198["m_alias"] = "";
$obj = new SQLFieldListItem($proto1198);

$proto1181["m_fieldlist"][]=$obj;
$proto1181["m_fromlist"] = array();
												$proto1200=array();
$proto1200["m_link"] = "SQLL_MAIN";
			$proto1201=array();
$proto1201["m_strName"] = "sip_users_additional";
$proto1201["m_columns"] = array();
$proto1201["m_columns"][] = "id_additional";
$proto1201["m_columns"][] = "name";
$proto1201["m_columns"][] = "trc_piloto";
$proto1201["m_columns"][] = "mail";
$proto1201["m_columns"][] = "call_forward";
$proto1201["m_columns"][] = "flg_fax";
$proto1201["m_columns"][] = "flg_grava";
$obj = new SQLTable($proto1201);

$proto1200["m_table"] = $obj;
$proto1200["m_alias"] = "";
$proto1202=array();
$proto1202["m_sql"] = "";
$proto1202["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1202["m_column"]=$obj;
$proto1202["m_contained"] = array();
$proto1202["m_strCase"] = "";
$proto1202["m_havingmode"] = "0";
$proto1202["m_inBrackets"] = "0";
$proto1202["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1202);

$proto1200["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1200);

$proto1181["m_fromlist"][]=$obj;
$proto1181["m_groupby"] = array();
$proto1181["m_orderby"] = array();
$obj = new SQLQuery($proto1181);

$queryData_sip_users_additional = $obj;
$tdatasip_users_additional[".sqlquery"] = $queryData_sip_users_additional;



?>
