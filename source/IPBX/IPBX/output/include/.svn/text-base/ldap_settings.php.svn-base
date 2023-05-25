<?php

//	field labels
$fieldLabelsldap = array();
$fieldLabelsldap["Portuguese(Brazil)"]=array();
$fieldLabelsldap["Portuguese(Brazil)"]["id_ldap"] = "Identificação";
$fieldLabelsldap["Portuguese(Brazil)"]["nm_usuario"] = "Nome do usuario";
$fieldLabelsldap["Portuguese(Brazil)"]["email"] = "E-mail";
$fieldLabelsldap["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsldap["Portuguese(Brazil)"]["dt_atualizacao"] = "Data Atualização";
$fieldLabelsldap["Portuguese(Brazil)"]["chave"] = "Chave";
$fieldLabelsldap["Portuguese(Brazil)"]["name2"] = "Ramal Secundário";


$tdataldap=array();
	$tdataldap[".NumberOfChars"]=80; 
	$tdataldap[".ShortName"]="ldap";
	$tdataldap[".OwnerID"]="";
	$tdataldap[".OriginalTable"]="ldap";
	$tdataldap[".NCSearch"]=true;
	

$tdataldap[".shortTableName"] = "ldap";
$tdataldap[".dataSourceTable"] = "ldap";
$tdataldap[".nSecOptions"] = 0;
$tdataldap[".nLoginMethod"] = 1;
$tdataldap[".recsPerRowList"] = 1;	
$tdataldap[".tableGroupBy"] = "0";
$tdataldap[".dbType"] = 0;
$tdataldap[".mainTableOwnerID"] = "";
$tdataldap[".moveNext"] = 1;

$tdataldap[".listAjax"] = true;

	$tdataldap[".audit"] = true;

	$tdataldap[".locking"] = false;
	
$tdataldap[".listIcons"] = true;
$tdataldap[".inlineEdit"] = true;




$tdataldap[".showSimpleSearchOptions"] = false;

$tdataldap[".showSearchPanel"] = true;


$tdataldap[".isUseAjaxSuggest"] = true;

$tdataldap[".rowHighlite"] = true;

$tdataldap[".delFile"] = true;

// button handlers file names
$tdataldap[".buttonHandlers_list"][] = "buttonevent_Atualizar_Ramais1";

// start on load js handlers








// end on load js handlers



$tdataldap[".arrKeyFields"][] = "id_ldap";

// use datepicker for search panel
$tdataldap[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataldap[".isUseTimeForSearch"] = false;






$tdataldap[".isUseInlineEdit"] = true;
$tdataldap[".isUseInlineJs"] = $tdataldap[".isUseInlineAdd"] || $tdataldap[".isUseInlineEdit"];

$tdataldap[".allSearchFields"] = array();

$tdataldap[".globSearchFields"][] = "chave";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("chave", $tdataldap[".allSearchFields"]))
{
	$tdataldap[".allSearchFields"][] = "chave";	
}
$tdataldap[".globSearchFields"][] = "nm_usuario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_usuario", $tdataldap[".allSearchFields"]))
{
	$tdataldap[".allSearchFields"][] = "nm_usuario";	
}
$tdataldap[".globSearchFields"][] = "email";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("email", $tdataldap[".allSearchFields"]))
{
	$tdataldap[".allSearchFields"][] = "email";	
}
$tdataldap[".globSearchFields"][] = "name";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("name", $tdataldap[".allSearchFields"]))
{
	$tdataldap[".allSearchFields"][] = "name";	
}
$tdataldap[".globSearchFields"][] = "name2";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("name2", $tdataldap[".allSearchFields"]))
{
	$tdataldap[".allSearchFields"][] = "name2";	
}


$tdataldap[".isDynamicPerm"] = true;

	

$tdataldap[".isDisplayLoading"] = true;

$tdataldap[".isResizeColumns"] = false;


$tdataldap[".createLoginPage"] = true;


 	




$tdataldap[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataldap[".strOrderBy"] = $gstrOrderBy;
	
$tdataldap[".orderindexes"] = array();

$tdataldap[".sqlHead"] = "SELECT id_ldap,   nm_usuario,   email,   name,   dt_atualizacao,   chave,   name2";

$tdataldap[".sqlFrom"] = "FROM ldap";

$tdataldap[".sqlWhereExpr"] = "";

$tdataldap[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_ldap";
	$tdataldap[".Keys"]=$tableKeys;

	
//	id_ldap
	$fdata = array();
	$fdata["strName"] = "id_ldap";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Identificação"; 
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
			
											$tdataldap["id_ldap"]=$fdata;
	
//	nm_usuario
	$fdata = array();
	$fdata["strName"] = "nm_usuario";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Nome do usuario"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_usuario";
		$fdata["FullName"]= "nm_usuario";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["nm_usuario"]=$fdata;
	
//	email
	$fdata = array();
	$fdata["strName"] = "email";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="E-mail"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "email";
		$fdata["FullName"]= "email";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["email"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="name";
				$fdata["LookupTable"]="v_ldap_avaiable_names";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "name <> 'callcenter' and name <> 'admin'";

				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["name"]=$fdata;
	
//	dt_atualizacao
	$fdata = array();
	$fdata["strName"] = "dt_atualizacao";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Data Atualização"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_atualizacao";
		$fdata["FullName"]= "dt_atualizacao";
						$fdata["Index"]= 5;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["dt_atualizacao"]=$fdata;
	
//	chave
	$fdata = array();
	$fdata["strName"] = "chave";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Chave"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "chave";
		$fdata["FullName"]= "chave";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["chave"]=$fdata;
	
//	name2
	$fdata = array();
	$fdata["strName"] = "name2";
	$fdata["ownerTable"] = "ldap";
		$fdata["Label"]="Ramal Secundário"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="name";
				$fdata["LookupTable"]="v_ldap_avaiable_names";
	$fdata["LookupOrderBy"]="name";
							$fdata["LookupWhere"] = "name <> 'callcenter' and name <> 'admin'";

				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name2";
		$fdata["FullName"]= "name2";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataldap["name2"]=$fdata;

	
$tables_data["ldap"]=&$tdataldap;
$field_labels["ldap"] = &$fieldLabelsldap;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ldap"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ldap"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2700=array();
$proto2700["m_strHead"] = "SELECT";
$proto2700["m_strFieldList"] = "id_ldap,   nm_usuario,   email,   name,   dt_atualizacao,   chave,   name2";
$proto2700["m_strFrom"] = "FROM ldap";
$proto2700["m_strWhere"] = "";
$proto2700["m_strOrderBy"] = "";
$proto2700["m_strTail"] = "";
$proto2701=array();
$proto2701["m_sql"] = "";
$proto2701["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2701["m_column"]=$obj;
$proto2701["m_contained"] = array();
$proto2701["m_strCase"] = "";
$proto2701["m_havingmode"] = "0";
$proto2701["m_inBrackets"] = "0";
$proto2701["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2701);

$proto2700["m_where"] = $obj;
$proto2703=array();
$proto2703["m_sql"] = "";
$proto2703["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2703["m_column"]=$obj;
$proto2703["m_contained"] = array();
$proto2703["m_strCase"] = "";
$proto2703["m_havingmode"] = "0";
$proto2703["m_inBrackets"] = "0";
$proto2703["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2703);

$proto2700["m_having"] = $obj;
$proto2700["m_fieldlist"] = array();
						$proto2705=array();
			$obj = new SQLField(array(
	"m_strName" => "id_ldap",
	"m_strTable" => "ldap"
));

$proto2705["m_expr"]=$obj;
$proto2705["m_alias"] = "";
$obj = new SQLFieldListItem($proto2705);

$proto2700["m_fieldlist"][]=$obj;
						$proto2707=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_usuario",
	"m_strTable" => "ldap"
));

$proto2707["m_expr"]=$obj;
$proto2707["m_alias"] = "";
$obj = new SQLFieldListItem($proto2707);

$proto2700["m_fieldlist"][]=$obj;
						$proto2709=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "ldap"
));

$proto2709["m_expr"]=$obj;
$proto2709["m_alias"] = "";
$obj = new SQLFieldListItem($proto2709);

$proto2700["m_fieldlist"][]=$obj;
						$proto2711=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ldap"
));

$proto2711["m_expr"]=$obj;
$proto2711["m_alias"] = "";
$obj = new SQLFieldListItem($proto2711);

$proto2700["m_fieldlist"][]=$obj;
						$proto2713=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_atualizacao",
	"m_strTable" => "ldap"
));

$proto2713["m_expr"]=$obj;
$proto2713["m_alias"] = "";
$obj = new SQLFieldListItem($proto2713);

$proto2700["m_fieldlist"][]=$obj;
						$proto2715=array();
			$obj = new SQLField(array(
	"m_strName" => "chave",
	"m_strTable" => "ldap"
));

$proto2715["m_expr"]=$obj;
$proto2715["m_alias"] = "";
$obj = new SQLFieldListItem($proto2715);

$proto2700["m_fieldlist"][]=$obj;
						$proto2717=array();
			$obj = new SQLField(array(
	"m_strName" => "name2",
	"m_strTable" => "ldap"
));

$proto2717["m_expr"]=$obj;
$proto2717["m_alias"] = "";
$obj = new SQLFieldListItem($proto2717);

$proto2700["m_fieldlist"][]=$obj;
$proto2700["m_fromlist"] = array();
												$proto2719=array();
$proto2719["m_link"] = "SQLL_MAIN";
			$proto2720=array();
$proto2720["m_strName"] = "ldap";
$proto2720["m_columns"] = array();
$proto2720["m_columns"][] = "id_ldap";
$proto2720["m_columns"][] = "nm_usuario";
$proto2720["m_columns"][] = "email";
$proto2720["m_columns"][] = "name";
$proto2720["m_columns"][] = "dt_atualizacao";
$proto2720["m_columns"][] = "chave";
$proto2720["m_columns"][] = "name2";
$obj = new SQLTable($proto2720);

$proto2719["m_table"] = $obj;
$proto2719["m_alias"] = "";
$proto2721=array();
$proto2721["m_sql"] = "";
$proto2721["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2721["m_column"]=$obj;
$proto2721["m_contained"] = array();
$proto2721["m_strCase"] = "";
$proto2721["m_havingmode"] = "0";
$proto2721["m_inBrackets"] = "0";
$proto2721["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2721);

$proto2719["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2719);

$proto2700["m_fromlist"][]=$obj;
$proto2700["m_groupby"] = array();
$proto2700["m_orderby"] = array();
$obj = new SQLQuery($proto2700);

$queryData_ldap = $obj;
$tdataldap[".sqlquery"] = $queryData_ldap;



?>
