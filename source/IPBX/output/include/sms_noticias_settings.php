<?php

//	field labels
$fieldLabelssms_noticias = array();
$fieldLabelssms_noticias["Portuguese(Brazil)"]=array();
$fieldLabelssms_noticias["Portuguese(Brazil)"]["id_noticia"] = "Identificação";
$fieldLabelssms_noticias["Portuguese(Brazil)"]["dsc_noticia"] = "Notícia";
$fieldLabelssms_noticias["Portuguese(Brazil)"]["status"] = "Estado de envio";
$fieldLabelssms_noticias["Portuguese(Brazil)"]["dt_enviado"] = "Data do Envio";
$fieldLabelssms_noticias["Portuguese(Brazil)"]["id_grupo"] = "Grupo";
$fieldLabelssms_noticias["Portuguese(Brazil)"]["Envio_de_not_cias"] = "Envio de notícias";


$tdatasms_noticias=array();
	$tdatasms_noticias[".NumberOfChars"]=80; 
	$tdatasms_noticias[".ShortName"]="sms_noticias";
	$tdatasms_noticias[".OwnerID"]="";
	$tdatasms_noticias[".OriginalTable"]="sms_noticias";
	$tdatasms_noticias[".NCSearch"]=true;
	

$tdatasms_noticias[".shortTableName"] = "sms_noticias";
$tdatasms_noticias[".dataSourceTable"] = "sms_noticias";
$tdatasms_noticias[".nSecOptions"] = 0;
$tdatasms_noticias[".nLoginMethod"] = 1;
$tdatasms_noticias[".recsPerRowList"] = 1;	
$tdatasms_noticias[".tableGroupBy"] = "0";
$tdatasms_noticias[".dbType"] = 0;
$tdatasms_noticias[".mainTableOwnerID"] = "";
$tdatasms_noticias[".moveNext"] = 1;

$tdatasms_noticias[".listAjax"] = true;

	$tdatasms_noticias[".audit"] = true;

	$tdatasms_noticias[".locking"] = false;
	
$tdatasms_noticias[".listIcons"] = true;
$tdatasms_noticias[".edit"] = true;



$tdatasms_noticias[".delete"] = true;

$tdatasms_noticias[".showSimpleSearchOptions"] = false;

$tdatasms_noticias[".showSearchPanel"] = true;


$tdatasms_noticias[".isUseAjaxSuggest"] = true;

$tdatasms_noticias[".rowHighlite"] = true;

$tdatasms_noticias[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatasms_noticias[".arrKeyFields"][] = "id_noticia";

// use datepicker for search panel
$tdatasms_noticias[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatasms_noticias[".isUseTimeForSearch"] = false;






$tdatasms_noticias[".isUseInlineJs"] = $tdatasms_noticias[".isUseInlineAdd"] || $tdatasms_noticias[".isUseInlineEdit"];

$tdatasms_noticias[".allSearchFields"] = array();

$tdatasms_noticias[".globSearchFields"][] = "dsc_noticia";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_noticia", $tdatasms_noticias[".allSearchFields"]))
{
	$tdatasms_noticias[".allSearchFields"][] = "dsc_noticia";	
}


$tdatasms_noticias[".isDynamicPerm"] = true;

	

$tdatasms_noticias[".isDisplayLoading"] = true;

$tdatasms_noticias[".isResizeColumns"] = false;


$tdatasms_noticias[".createLoginPage"] = true;


 	




$tdatasms_noticias[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatasms_noticias[".strOrderBy"] = $gstrOrderBy;
	
$tdatasms_noticias[".orderindexes"] = array();

$tdatasms_noticias[".sqlHead"] = "SELECT id_noticia,  dsc_noticia,  id_grupo,  status,  dt_enviado,  Concat('<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>') AS `Envio de notícias`";

$tdatasms_noticias[".sqlFrom"] = "FROM sms_noticias";

$tdatasms_noticias[".sqlWhereExpr"] = "";

$tdatasms_noticias[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_noticia";
	$tdatasms_noticias[".Keys"]=$tableKeys;

	
//	id_noticia
	$fdata = array();
	$fdata["strName"] = "id_noticia";
	$fdata["ownerTable"] = "sms_noticias";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_noticia";
		$fdata["FullName"]= "id_noticia";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatasms_noticias["id_noticia"]=$fdata;
	
//	dsc_noticia
	$fdata = array();
	$fdata["strName"] = "dsc_noticia";
	$fdata["ownerTable"] = "sms_noticias";
		$fdata["Label"]="Notícia"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_noticia";
		$fdata["FullName"]= "dsc_noticia";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
		$fdata["EditParams"]="";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=200";
		$fdata["nCols"] = 200;
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_noticias["dsc_noticia"]=$fdata;
	
//	id_grupo
	$fdata = array();
	$fdata["strName"] = "id_grupo";
	$fdata["ownerTable"] = "sms_noticias";
		$fdata["Label"]="Grupo"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_grupo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nome";
				$fdata["LookupTable"]="sms_grupo";
	$fdata["LookupOrderBy"]="nome";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_grupo";
		$fdata["FullName"]= "id_grupo";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 3;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_noticias["id_grupo"]=$fdata;
	
//	status
	$fdata = array();
	$fdata["strName"] = "status";
	$fdata["ownerTable"] = "sms_noticias";
		$fdata["Label"]="Estado de envio"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "status";
		$fdata["FullName"]= "status";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_noticias["status"]=$fdata;
	
//	dt_enviado
	$fdata = array();
	$fdata["strName"] = "dt_enviado";
	$fdata["ownerTable"] = "sms_noticias";
		$fdata["Label"]="Data do Envio"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_enviado";
		$fdata["FullName"]= "dt_enviado";
						$fdata["Index"]= 5;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_noticias["dt_enviado"]=$fdata;
	
//	Envio de notícias
	$fdata = array();
	$fdata["strName"] = "Envio de notícias";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "HTML";
	
	

		
			
	$fdata["GoodName"]= "Envio_de_not_cias";
		$fdata["FullName"]= "Concat('<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>')";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatasms_noticias["Envio de notícias"]=$fdata;

	
$tables_data["sms_noticias"]=&$tdatasms_noticias;
$field_labels["sms_noticias"] = &$fieldLabelssms_noticias;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["sms_noticias"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["sms_noticias"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3211=array();
$proto3211["m_strHead"] = "SELECT";
$proto3211["m_strFieldList"] = "id_noticia,  dsc_noticia,  id_grupo,  status,  dt_enviado,  Concat('<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>') AS `Envio de notícias`";
$proto3211["m_strFrom"] = "FROM sms_noticias";
$proto3211["m_strWhere"] = "";
$proto3211["m_strOrderBy"] = "";
$proto3211["m_strTail"] = "";
$proto3212=array();
$proto3212["m_sql"] = "";
$proto3212["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3212["m_column"]=$obj;
$proto3212["m_contained"] = array();
$proto3212["m_strCase"] = "";
$proto3212["m_havingmode"] = "0";
$proto3212["m_inBrackets"] = "0";
$proto3212["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3212);

$proto3211["m_where"] = $obj;
$proto3214=array();
$proto3214["m_sql"] = "";
$proto3214["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3214["m_column"]=$obj;
$proto3214["m_contained"] = array();
$proto3214["m_strCase"] = "";
$proto3214["m_havingmode"] = "0";
$proto3214["m_inBrackets"] = "0";
$proto3214["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3214);

$proto3211["m_having"] = $obj;
$proto3211["m_fieldlist"] = array();
						$proto3216=array();
			$obj = new SQLField(array(
	"m_strName" => "id_noticia",
	"m_strTable" => "sms_noticias"
));

$proto3216["m_expr"]=$obj;
$proto3216["m_alias"] = "";
$obj = new SQLFieldListItem($proto3216);

$proto3211["m_fieldlist"][]=$obj;
						$proto3218=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_noticia",
	"m_strTable" => "sms_noticias"
));

$proto3218["m_expr"]=$obj;
$proto3218["m_alias"] = "";
$obj = new SQLFieldListItem($proto3218);

$proto3211["m_fieldlist"][]=$obj;
						$proto3220=array();
			$obj = new SQLField(array(
	"m_strName" => "id_grupo",
	"m_strTable" => "sms_noticias"
));

$proto3220["m_expr"]=$obj;
$proto3220["m_alias"] = "";
$obj = new SQLFieldListItem($proto3220);

$proto3211["m_fieldlist"][]=$obj;
						$proto3222=array();
			$obj = new SQLField(array(
	"m_strName" => "status",
	"m_strTable" => "sms_noticias"
));

$proto3222["m_expr"]=$obj;
$proto3222["m_alias"] = "";
$obj = new SQLFieldListItem($proto3222);

$proto3211["m_fieldlist"][]=$obj;
						$proto3224=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_enviado",
	"m_strTable" => "sms_noticias"
));

$proto3224["m_expr"]=$obj;
$proto3224["m_alias"] = "";
$obj = new SQLFieldListItem($proto3224);

$proto3211["m_fieldlist"][]=$obj;
						$proto3226=array();
			$proto3227=array();
$proto3227["m_functiontype"] = "SQLF_CUSTOM";
$proto3227["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>'"
));

$proto3227["m_arguments"][]=$obj;
$proto3227["m_strFunctionName"] = "Concat";
$obj = new SQLFunctionCall($proto3227);

$proto3226["m_expr"]=$obj;
$proto3226["m_alias"] = "Envio de notícias";
$obj = new SQLFieldListItem($proto3226);

$proto3211["m_fieldlist"][]=$obj;
$proto3211["m_fromlist"] = array();
												$proto3229=array();
$proto3229["m_link"] = "SQLL_MAIN";
			$proto3230=array();
$proto3230["m_strName"] = "sms_noticias";
$proto3230["m_columns"] = array();
$proto3230["m_columns"][] = "id_noticia";
$proto3230["m_columns"][] = "dsc_noticia";
$proto3230["m_columns"][] = "id_grupo";
$proto3230["m_columns"][] = "status";
$proto3230["m_columns"][] = "dt_enviado";
$obj = new SQLTable($proto3230);

$proto3229["m_table"] = $obj;
$proto3229["m_alias"] = "";
$proto3231=array();
$proto3231["m_sql"] = "";
$proto3231["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3231["m_column"]=$obj;
$proto3231["m_contained"] = array();
$proto3231["m_strCase"] = "";
$proto3231["m_havingmode"] = "0";
$proto3231["m_inBrackets"] = "0";
$proto3231["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3231);

$proto3229["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3229);

$proto3211["m_fromlist"][]=$obj;
$proto3211["m_groupby"] = array();
$proto3211["m_orderby"] = array();
$obj = new SQLQuery($proto3211);

$queryData_sms_noticias = $obj;
$tdatasms_noticias[".sqlquery"] = $queryData_sms_noticias;



?>
