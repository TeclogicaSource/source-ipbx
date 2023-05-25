<?php

//	field labels
$fieldLabelsipbx_ldap_conf = array();
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["id_ldap"] = "Identifica��o";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["tp_ldap"] = "Tipo LDAP";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["flg_ativo"] = "Ativo";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["dsc_conf"] = "Descri��o";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["port"] = "Porta";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["ip_server"] = "Endere�o IP";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["ou_usuarios"] = "Usu�rios (ou)";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["filtro"] = "Filtro";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["ad_usuario"] = "Usu�rio AD";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["ad_senha"] = "Senha AD";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["ad_dominio"] = "Dom�nio AD";
$fieldLabelsipbx_ldap_conf["Portuguese(Brazil)"]["flg_padrao"] = "Dom�nio Padr�o";


$tdataipbx_ldap_conf=array();
	$tdataipbx_ldap_conf[".NumberOfChars"]=80; 
	$tdataipbx_ldap_conf[".ShortName"]="ipbx_ldap_conf";
	$tdataipbx_ldap_conf[".OwnerID"]="";
	$tdataipbx_ldap_conf[".OriginalTable"]="ipbx_ldap_conf";
	$tdataipbx_ldap_conf[".NCSearch"]=true;
	

$tdataipbx_ldap_conf[".shortTableName"] = "ipbx_ldap_conf";
$tdataipbx_ldap_conf[".dataSourceTable"] = "ipbx_ldap_conf";
$tdataipbx_ldap_conf[".nSecOptions"] = 0;
$tdataipbx_ldap_conf[".nLoginMethod"] = 1;
$tdataipbx_ldap_conf[".recsPerRowList"] = 1;	
$tdataipbx_ldap_conf[".tableGroupBy"] = "0";
$tdataipbx_ldap_conf[".dbType"] = 0;
$tdataipbx_ldap_conf[".mainTableOwnerID"] = "";
$tdataipbx_ldap_conf[".moveNext"] = 1;

$tdataipbx_ldap_conf[".listAjax"] = false;

	$tdataipbx_ldap_conf[".audit"] = true;

	$tdataipbx_ldap_conf[".locking"] = false;
	
$tdataipbx_ldap_conf[".listIcons"] = true;
$tdataipbx_ldap_conf[".inlineEdit"] = true;




$tdataipbx_ldap_conf[".showSimpleSearchOptions"] = false;

$tdataipbx_ldap_conf[".showSearchPanel"] = true;


$tdataipbx_ldap_conf[".isUseAjaxSuggest"] = true;

$tdataipbx_ldap_conf[".rowHighlite"] = true;

$tdataipbx_ldap_conf[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_ldap_conf[".arrKeyFields"][] = "id_ldap";

// use datepicker for search panel
$tdataipbx_ldap_conf[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_ldap_conf[".isUseTimeForSearch"] = false;





$tdataipbx_ldap_conf[".isUseInlineAdd"] = true;

$tdataipbx_ldap_conf[".isUseInlineEdit"] = true;
$tdataipbx_ldap_conf[".isUseInlineJs"] = $tdataipbx_ldap_conf[".isUseInlineAdd"] || $tdataipbx_ldap_conf[".isUseInlineEdit"];

$tdataipbx_ldap_conf[".allSearchFields"] = array();

$tdataipbx_ldap_conf[".globSearchFields"][] = "flg_padrao";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("flg_padrao", $tdataipbx_ldap_conf[".allSearchFields"]))
{
	$tdataipbx_ldap_conf[".allSearchFields"][] = "flg_padrao";	
}


$tdataipbx_ldap_conf[".isDynamicPerm"] = true;

	
$tdataipbx_ldap_conf[".isVerLayout"] = true;

$tdataipbx_ldap_conf[".isDisplayLoading"] = true;

$tdataipbx_ldap_conf[".isResizeColumns"] = false;


$tdataipbx_ldap_conf[".createLoginPage"] = true;


 	




$tdataipbx_ldap_conf[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_ldap_conf[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_ldap_conf[".orderindexes"] = array();

$tdataipbx_ldap_conf[".sqlHead"] = "SELECT id_ldap,   tp_ldap,   flg_ativo,   dsc_conf,   port,   ip_server,   ou_usuarios,   filtro,   ad_usuario,   ad_senha,   ad_dominio,   flg_padrao";

$tdataipbx_ldap_conf[".sqlFrom"] = "FROM ipbx_ldap_conf";

$tdataipbx_ldap_conf[".sqlWhereExpr"] = "";

$tdataipbx_ldap_conf[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_ldap";
	$tdataipbx_ldap_conf[".Keys"]=$tableKeys;

	
//	id_ldap
	$fdata = array();
	$fdata["strName"] = "id_ldap";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Identifica��o"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_ldap";
		$fdata["FullName"]= "id_ldap";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_ldap_conf["id_ldap"]=$fdata;
	
//	tp_ldap
	$fdata = array();
	$fdata["strName"] = "tp_ldap";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Tipo LDAP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="AD";
	$fdata["LookupValues"][]="LDAP";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_ldap";
		$fdata["FullName"]= "tp_ldap";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["tp_ldap"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Ativo"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["flg_ativo"]=$fdata;
	
//	dsc_conf
	$fdata = array();
	$fdata["strName"] = "dsc_conf";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Descri��o"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_conf";
		$fdata["FullName"]= "dsc_conf";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["dsc_conf"]=$fdata;
	
//	port
	$fdata = array();
	$fdata["strName"] = "port";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Porta"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "port";
		$fdata["FullName"]= "port";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["port"]=$fdata;
	
//	ip_server
	$fdata = array();
	$fdata["strName"] = "ip_server";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Endere�o IP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_server";
		$fdata["FullName"]= "ip_server";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["ip_server"]=$fdata;
	
//	ou_usuarios
	$fdata = array();
	$fdata["strName"] = "ou_usuarios";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Usu�rios (ou)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ou_usuarios";
		$fdata["FullName"]= "ou_usuarios";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["ou_usuarios"]=$fdata;
	
//	filtro
	$fdata = array();
	$fdata["strName"] = "filtro";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Filtro"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "filtro";
		$fdata["FullName"]= "filtro";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["filtro"]=$fdata;
	
//	ad_usuario
	$fdata = array();
	$fdata["strName"] = "ad_usuario";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Usu�rio AD"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ad_usuario";
		$fdata["FullName"]= "ad_usuario";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["ad_usuario"]=$fdata;
	
//	ad_senha
	$fdata = array();
	$fdata["strName"] = "ad_senha";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Senha AD"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ad_senha";
		$fdata["FullName"]= "ad_senha";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["ad_senha"]=$fdata;
	
//	ad_dominio
	$fdata = array();
	$fdata["strName"] = "ad_dominio";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Dom�nio AD"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ad_dominio";
		$fdata["FullName"]= "ad_dominio";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["ad_dominio"]=$fdata;
	
//	flg_padrao
	$fdata = array();
	$fdata["strName"] = "flg_padrao";
	$fdata["ownerTable"] = "ipbx_ldap_conf";
		$fdata["Label"]="Dom�nio Padr�o"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_padrao";
		$fdata["FullName"]= "flg_padrao";
						$fdata["Index"]= 12;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ldap_conf["flg_padrao"]=$fdata;

	
$tables_data["ipbx_ldap_conf"]=&$tdataipbx_ldap_conf;
$field_labels["ipbx_ldap_conf"] = &$fieldLabelsipbx_ldap_conf;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ldap_conf"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ldap_conf"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1556=array();
$proto1556["m_strHead"] = "SELECT";
$proto1556["m_strFieldList"] = "id_ldap,   tp_ldap,   flg_ativo,   dsc_conf,   port,   ip_server,   ou_usuarios,   filtro,   ad_usuario,   ad_senha,   ad_dominio,   flg_padrao";
$proto1556["m_strFrom"] = "FROM ipbx_ldap_conf";
$proto1556["m_strWhere"] = "";
$proto1556["m_strOrderBy"] = "";
$proto1556["m_strTail"] = "";
$proto1557=array();
$proto1557["m_sql"] = "";
$proto1557["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1557["m_column"]=$obj;
$proto1557["m_contained"] = array();
$proto1557["m_strCase"] = "";
$proto1557["m_havingmode"] = "0";
$proto1557["m_inBrackets"] = "0";
$proto1557["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1557);

$proto1556["m_where"] = $obj;
$proto1559=array();
$proto1559["m_sql"] = "";
$proto1559["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1559["m_column"]=$obj;
$proto1559["m_contained"] = array();
$proto1559["m_strCase"] = "";
$proto1559["m_havingmode"] = "0";
$proto1559["m_inBrackets"] = "0";
$proto1559["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1559);

$proto1556["m_having"] = $obj;
$proto1556["m_fieldlist"] = array();
						$proto1561=array();
			$obj = new SQLField(array(
	"m_strName" => "id_ldap",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1561["m_expr"]=$obj;
$proto1561["m_alias"] = "";
$obj = new SQLFieldListItem($proto1561);

$proto1556["m_fieldlist"][]=$obj;
						$proto1563=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_ldap",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1563["m_expr"]=$obj;
$proto1563["m_alias"] = "";
$obj = new SQLFieldListItem($proto1563);

$proto1556["m_fieldlist"][]=$obj;
						$proto1565=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1565["m_expr"]=$obj;
$proto1565["m_alias"] = "";
$obj = new SQLFieldListItem($proto1565);

$proto1556["m_fieldlist"][]=$obj;
						$proto1567=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_conf",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1567["m_expr"]=$obj;
$proto1567["m_alias"] = "";
$obj = new SQLFieldListItem($proto1567);

$proto1556["m_fieldlist"][]=$obj;
						$proto1569=array();
			$obj = new SQLField(array(
	"m_strName" => "port",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1569["m_expr"]=$obj;
$proto1569["m_alias"] = "";
$obj = new SQLFieldListItem($proto1569);

$proto1556["m_fieldlist"][]=$obj;
						$proto1571=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_server",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1571["m_expr"]=$obj;
$proto1571["m_alias"] = "";
$obj = new SQLFieldListItem($proto1571);

$proto1556["m_fieldlist"][]=$obj;
						$proto1573=array();
			$obj = new SQLField(array(
	"m_strName" => "ou_usuarios",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1573["m_expr"]=$obj;
$proto1573["m_alias"] = "";
$obj = new SQLFieldListItem($proto1573);

$proto1556["m_fieldlist"][]=$obj;
						$proto1575=array();
			$obj = new SQLField(array(
	"m_strName" => "filtro",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1575["m_expr"]=$obj;
$proto1575["m_alias"] = "";
$obj = new SQLFieldListItem($proto1575);

$proto1556["m_fieldlist"][]=$obj;
						$proto1577=array();
			$obj = new SQLField(array(
	"m_strName" => "ad_usuario",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1577["m_expr"]=$obj;
$proto1577["m_alias"] = "";
$obj = new SQLFieldListItem($proto1577);

$proto1556["m_fieldlist"][]=$obj;
						$proto1579=array();
			$obj = new SQLField(array(
	"m_strName" => "ad_senha",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1579["m_expr"]=$obj;
$proto1579["m_alias"] = "";
$obj = new SQLFieldListItem($proto1579);

$proto1556["m_fieldlist"][]=$obj;
						$proto1581=array();
			$obj = new SQLField(array(
	"m_strName" => "ad_dominio",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1581["m_expr"]=$obj;
$proto1581["m_alias"] = "";
$obj = new SQLFieldListItem($proto1581);

$proto1556["m_fieldlist"][]=$obj;
						$proto1583=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_padrao",
	"m_strTable" => "ipbx_ldap_conf"
));

$proto1583["m_expr"]=$obj;
$proto1583["m_alias"] = "";
$obj = new SQLFieldListItem($proto1583);

$proto1556["m_fieldlist"][]=$obj;
$proto1556["m_fromlist"] = array();
												$proto1585=array();
$proto1585["m_link"] = "SQLL_MAIN";
			$proto1586=array();
$proto1586["m_strName"] = "ipbx_ldap_conf";
$proto1586["m_columns"] = array();
$proto1586["m_columns"][] = "id_ldap";
$proto1586["m_columns"][] = "tp_ldap";
$proto1586["m_columns"][] = "flg_ativo";
$proto1586["m_columns"][] = "dsc_conf";
$proto1586["m_columns"][] = "port";
$proto1586["m_columns"][] = "ip_server";
$proto1586["m_columns"][] = "ou_usuarios";
$proto1586["m_columns"][] = "filtro";
$proto1586["m_columns"][] = "ad_usuario";
$proto1586["m_columns"][] = "ad_senha";
$proto1586["m_columns"][] = "ad_dominio";
$proto1586["m_columns"][] = "flg_padrao";
$obj = new SQLTable($proto1586);

$proto1585["m_table"] = $obj;
$proto1585["m_alias"] = "";
$proto1587=array();
$proto1587["m_sql"] = "";
$proto1587["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1587["m_column"]=$obj;
$proto1587["m_contained"] = array();
$proto1587["m_strCase"] = "";
$proto1587["m_havingmode"] = "0";
$proto1587["m_inBrackets"] = "0";
$proto1587["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1587);

$proto1585["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1585);

$proto1556["m_fromlist"][]=$obj;
$proto1556["m_groupby"] = array();
$proto1556["m_orderby"] = array();
$obj = new SQLQuery($proto1556);

$queryData_ipbx_ldap_conf = $obj;
$tdataipbx_ldap_conf[".sqlquery"] = $queryData_ipbx_ldap_conf;



?>
