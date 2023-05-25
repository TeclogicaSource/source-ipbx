<?php

//	field labels
$fieldLabelsipbx_sincronismo = array();
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["id_sinc"] = "Id Sinc";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["usuario"] = "Usuario";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["trafego"] = "Trafego";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["ip_server"] = " IP Servidor";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["flg_ativo"] = " Ativa Sincronismo";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["flg_fax"] = " Sincroniza Fax";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["flg_gravacoes"] = " Sincroniza Gravações";
$fieldLabelsipbx_sincronismo["Portuguese(Brazil)"]["ult_sincronismo"] = " Ultimo Sincronismo";


$tdataipbx_sincronismo=array();
	$tdataipbx_sincronismo[".NumberOfChars"]=80; 
	$tdataipbx_sincronismo[".ShortName"]="ipbx_sincronismo";
	$tdataipbx_sincronismo[".OwnerID"]="";
	$tdataipbx_sincronismo[".OriginalTable"]="ipbx_sincronismo";
	$tdataipbx_sincronismo[".NCSearch"]=true;
	

$tdataipbx_sincronismo[".shortTableName"] = "ipbx_sincronismo";
$tdataipbx_sincronismo[".dataSourceTable"] = "ipbx_sincronismo";
$tdataipbx_sincronismo[".nSecOptions"] = 0;
$tdataipbx_sincronismo[".nLoginMethod"] = 1;
$tdataipbx_sincronismo[".recsPerRowList"] = 1;	
$tdataipbx_sincronismo[".tableGroupBy"] = "0";
$tdataipbx_sincronismo[".dbType"] = 0;
$tdataipbx_sincronismo[".mainTableOwnerID"] = "";
$tdataipbx_sincronismo[".moveNext"] = 1;

$tdataipbx_sincronismo[".listAjax"] = false;

	$tdataipbx_sincronismo[".audit"] = true;

	$tdataipbx_sincronismo[".locking"] = false;
	
$tdataipbx_sincronismo[".listIcons"] = true;
$tdataipbx_sincronismo[".edit"] = true;



$tdataipbx_sincronismo[".delete"] = true;

$tdataipbx_sincronismo[".showSimpleSearchOptions"] = false;

$tdataipbx_sincronismo[".showSearchPanel"] = true;


$tdataipbx_sincronismo[".isUseAjaxSuggest"] = true;

$tdataipbx_sincronismo[".rowHighlite"] = true;

$tdataipbx_sincronismo[".delFile"] = true;

// button handlers file names
$tdataipbx_sincronismo[".buttonHandlers_list"][] = "buttonevent_New_Button10";

// start on load js handlers








// end on load js handlers



$tdataipbx_sincronismo[".arrKeyFields"][] = "id_sinc";

// use datepicker for search panel
$tdataipbx_sincronismo[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_sincronismo[".isUseTimeForSearch"] = false;






$tdataipbx_sincronismo[".isUseInlineJs"] = $tdataipbx_sincronismo[".isUseInlineAdd"] || $tdataipbx_sincronismo[".isUseInlineEdit"];

$tdataipbx_sincronismo[".allSearchFields"] = array();



$tdataipbx_sincronismo[".isDynamicPerm"] = true;

	

$tdataipbx_sincronismo[".isDisplayLoading"] = true;

$tdataipbx_sincronismo[".isResizeColumns"] = false;


$tdataipbx_sincronismo[".createLoginPage"] = true;


 	




$tdataipbx_sincronismo[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_sincronismo[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_sincronismo[".orderindexes"] = array();

$tdataipbx_sincronismo[".sqlHead"] = "SELECT id_sinc,   usuario,   senha,   trafego,   ip_server,   flg_ativo,   flg_fax,   flg_gravacoes,   ult_sincronismo";

$tdataipbx_sincronismo[".sqlFrom"] = "FROM ipbx_sincronismo";

$tdataipbx_sincronismo[".sqlWhereExpr"] = "";

$tdataipbx_sincronismo[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_sinc";
	$tdataipbx_sincronismo[".Keys"]=$tableKeys;

	
//	id_sinc
	$fdata = array();
	$fdata["strName"] = "id_sinc";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]="Id Sinc"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_sinc";
		$fdata["FullName"]= "id_sinc";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_sincronismo["id_sinc"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]="Usuario"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
								$tdataipbx_sincronismo["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Password";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		
				$fdata["FieldPermissions"]=true;
								$tdataipbx_sincronismo["senha"]=$fdata;
	
//	trafego
	$fdata = array();
	$fdata["strName"] = "trafego";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]="Trafego"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="1024";
	$fdata["LookupValues"][]="2048";
	$fdata["LookupValues"][]="4096";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "trafego";
		$fdata["FullName"]= "trafego";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_sincronismo["trafego"]=$fdata;
	
//	ip_server
	$fdata = array();
	$fdata["strName"] = "ip_server";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]=" IP Servidor"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_server";
		$fdata["FullName"]= "ip_server";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=30";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_sincronismo["ip_server"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]=" Ativa Sincronismo"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_sincronismo["flg_ativo"]=$fdata;
	
//	flg_fax
	$fdata = array();
	$fdata["strName"] = "flg_fax";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]=" Sincroniza Fax"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_fax";
		$fdata["FullName"]= "flg_fax";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_sincronismo["flg_fax"]=$fdata;
	
//	flg_gravacoes
	$fdata = array();
	$fdata["strName"] = "flg_gravacoes";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]=" Sincroniza Gravações"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_gravacoes";
		$fdata["FullName"]= "flg_gravacoes";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_sincronismo["flg_gravacoes"]=$fdata;
	
//	ult_sincronismo
	$fdata = array();
	$fdata["strName"] = "ult_sincronismo";
	$fdata["ownerTable"] = "ipbx_sincronismo";
		$fdata["Label"]=" Ultimo Sincronismo"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ult_sincronismo";
		$fdata["FullName"]= "ult_sincronismo";
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_sincronismo["ult_sincronismo"]=$fdata;

	
$tables_data["ipbx_sincronismo"]=&$tdataipbx_sincronismo;
$field_labels["ipbx_sincronismo"] = &$fieldLabelsipbx_sincronismo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_sincronismo"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_sincronismo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1844=array();
$proto1844["m_strHead"] = "SELECT";
$proto1844["m_strFieldList"] = "id_sinc,   usuario,   senha,   trafego,   ip_server,   flg_ativo,   flg_fax,   flg_gravacoes,   ult_sincronismo";
$proto1844["m_strFrom"] = "FROM ipbx_sincronismo";
$proto1844["m_strWhere"] = "";
$proto1844["m_strOrderBy"] = "";
$proto1844["m_strTail"] = "";
$proto1845=array();
$proto1845["m_sql"] = "";
$proto1845["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1845["m_column"]=$obj;
$proto1845["m_contained"] = array();
$proto1845["m_strCase"] = "";
$proto1845["m_havingmode"] = "0";
$proto1845["m_inBrackets"] = "0";
$proto1845["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1845);

$proto1844["m_where"] = $obj;
$proto1847=array();
$proto1847["m_sql"] = "";
$proto1847["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1847["m_column"]=$obj;
$proto1847["m_contained"] = array();
$proto1847["m_strCase"] = "";
$proto1847["m_havingmode"] = "0";
$proto1847["m_inBrackets"] = "0";
$proto1847["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1847);

$proto1844["m_having"] = $obj;
$proto1844["m_fieldlist"] = array();
						$proto1849=array();
			$obj = new SQLField(array(
	"m_strName" => "id_sinc",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1849["m_expr"]=$obj;
$proto1849["m_alias"] = "";
$obj = new SQLFieldListItem($proto1849);

$proto1844["m_fieldlist"][]=$obj;
						$proto1851=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1851["m_expr"]=$obj;
$proto1851["m_alias"] = "";
$obj = new SQLFieldListItem($proto1851);

$proto1844["m_fieldlist"][]=$obj;
						$proto1853=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1853["m_expr"]=$obj;
$proto1853["m_alias"] = "";
$obj = new SQLFieldListItem($proto1853);

$proto1844["m_fieldlist"][]=$obj;
						$proto1855=array();
			$obj = new SQLField(array(
	"m_strName" => "trafego",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1855["m_expr"]=$obj;
$proto1855["m_alias"] = "";
$obj = new SQLFieldListItem($proto1855);

$proto1844["m_fieldlist"][]=$obj;
						$proto1857=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_server",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1857["m_expr"]=$obj;
$proto1857["m_alias"] = "";
$obj = new SQLFieldListItem($proto1857);

$proto1844["m_fieldlist"][]=$obj;
						$proto1859=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1859["m_expr"]=$obj;
$proto1859["m_alias"] = "";
$obj = new SQLFieldListItem($proto1859);

$proto1844["m_fieldlist"][]=$obj;
						$proto1861=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_fax",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1861["m_expr"]=$obj;
$proto1861["m_alias"] = "";
$obj = new SQLFieldListItem($proto1861);

$proto1844["m_fieldlist"][]=$obj;
						$proto1863=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_gravacoes",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1863["m_expr"]=$obj;
$proto1863["m_alias"] = "";
$obj = new SQLFieldListItem($proto1863);

$proto1844["m_fieldlist"][]=$obj;
						$proto1865=array();
			$obj = new SQLField(array(
	"m_strName" => "ult_sincronismo",
	"m_strTable" => "ipbx_sincronismo"
));

$proto1865["m_expr"]=$obj;
$proto1865["m_alias"] = "";
$obj = new SQLFieldListItem($proto1865);

$proto1844["m_fieldlist"][]=$obj;
$proto1844["m_fromlist"] = array();
												$proto1867=array();
$proto1867["m_link"] = "SQLL_MAIN";
			$proto1868=array();
$proto1868["m_strName"] = "ipbx_sincronismo";
$proto1868["m_columns"] = array();
$proto1868["m_columns"][] = "id_sinc";
$proto1868["m_columns"][] = "usuario";
$proto1868["m_columns"][] = "senha";
$proto1868["m_columns"][] = "trafego";
$proto1868["m_columns"][] = "ip_server";
$proto1868["m_columns"][] = "flg_ativo";
$proto1868["m_columns"][] = "flg_fax";
$proto1868["m_columns"][] = "flg_gravacoes";
$proto1868["m_columns"][] = "ult_sincronismo";
$obj = new SQLTable($proto1868);

$proto1867["m_table"] = $obj;
$proto1867["m_alias"] = "";
$proto1869=array();
$proto1869["m_sql"] = "";
$proto1869["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1869["m_column"]=$obj;
$proto1869["m_contained"] = array();
$proto1869["m_strCase"] = "";
$proto1869["m_havingmode"] = "0";
$proto1869["m_inBrackets"] = "0";
$proto1869["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1869);

$proto1867["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1867);

$proto1844["m_fromlist"][]=$obj;
$proto1844["m_groupby"] = array();
$proto1844["m_orderby"] = array();
$obj = new SQLQuery($proto1844);

$queryData_ipbx_sincronismo = $obj;
$tdataipbx_sincronismo[".sqlquery"] = $queryData_ipbx_sincronismo;



?>
