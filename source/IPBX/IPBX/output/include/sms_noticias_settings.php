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










$proto2941=array();
$proto2941["m_strHead"] = "SELECT";
$proto2941["m_strFieldList"] = "id_noticia,  dsc_noticia,  id_grupo,  status,  dt_enviado,  Concat('<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>') AS `Envio de notícias`";
$proto2941["m_strFrom"] = "FROM sms_noticias";
$proto2941["m_strWhere"] = "";
$proto2941["m_strOrderBy"] = "";
$proto2941["m_strTail"] = "";
$proto2942=array();
$proto2942["m_sql"] = "";
$proto2942["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2942["m_column"]=$obj;
$proto2942["m_contained"] = array();
$proto2942["m_strCase"] = "";
$proto2942["m_havingmode"] = "0";
$proto2942["m_inBrackets"] = "0";
$proto2942["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2942);

$proto2941["m_where"] = $obj;
$proto2944=array();
$proto2944["m_sql"] = "";
$proto2944["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2944["m_column"]=$obj;
$proto2944["m_contained"] = array();
$proto2944["m_strCase"] = "";
$proto2944["m_havingmode"] = "0";
$proto2944["m_inBrackets"] = "0";
$proto2944["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2944);

$proto2941["m_having"] = $obj;
$proto2941["m_fieldlist"] = array();
						$proto2946=array();
			$obj = new SQLField(array(
	"m_strName" => "id_noticia",
	"m_strTable" => "sms_noticias"
));

$proto2946["m_expr"]=$obj;
$proto2946["m_alias"] = "";
$obj = new SQLFieldListItem($proto2946);

$proto2941["m_fieldlist"][]=$obj;
						$proto2948=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_noticia",
	"m_strTable" => "sms_noticias"
));

$proto2948["m_expr"]=$obj;
$proto2948["m_alias"] = "";
$obj = new SQLFieldListItem($proto2948);

$proto2941["m_fieldlist"][]=$obj;
						$proto2950=array();
			$obj = new SQLField(array(
	"m_strName" => "id_grupo",
	"m_strTable" => "sms_noticias"
));

$proto2950["m_expr"]=$obj;
$proto2950["m_alias"] = "";
$obj = new SQLFieldListItem($proto2950);

$proto2941["m_fieldlist"][]=$obj;
						$proto2952=array();
			$obj = new SQLField(array(
	"m_strName" => "status",
	"m_strTable" => "sms_noticias"
));

$proto2952["m_expr"]=$obj;
$proto2952["m_alias"] = "";
$obj = new SQLFieldListItem($proto2952);

$proto2941["m_fieldlist"][]=$obj;
						$proto2954=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_enviado",
	"m_strTable" => "sms_noticias"
));

$proto2954["m_expr"]=$obj;
$proto2954["m_alias"] = "";
$obj = new SQLFieldListItem($proto2954);

$proto2941["m_fieldlist"][]=$obj;
						$proto2956=array();
			$proto2957=array();
$proto2957["m_functiontype"] = "SQLF_CUSTOM";
$proto2957["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "'<button type=\"button\" onclick=\"sms(\\'',id_grupo,'\\',\\'',id_noticia,'\\')\"> Enviar </button>'"
));

$proto2957["m_arguments"][]=$obj;
$proto2957["m_strFunctionName"] = "Concat";
$obj = new SQLFunctionCall($proto2957);

$proto2956["m_expr"]=$obj;
$proto2956["m_alias"] = "Envio de notícias";
$obj = new SQLFieldListItem($proto2956);

$proto2941["m_fieldlist"][]=$obj;
$proto2941["m_fromlist"] = array();
												$proto2959=array();
$proto2959["m_link"] = "SQLL_MAIN";
			$proto2960=array();
$proto2960["m_strName"] = "sms_noticias";
$proto2960["m_columns"] = array();
$proto2960["m_columns"][] = "id_noticia";
$proto2960["m_columns"][] = "dsc_noticia";
$proto2960["m_columns"][] = "id_grupo";
$proto2960["m_columns"][] = "status";
$proto2960["m_columns"][] = "dt_enviado";
$obj = new SQLTable($proto2960);

$proto2959["m_table"] = $obj;
$proto2959["m_alias"] = "";
$proto2961=array();
$proto2961["m_sql"] = "";
$proto2961["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2961["m_column"]=$obj;
$proto2961["m_contained"] = array();
$proto2961["m_strCase"] = "";
$proto2961["m_havingmode"] = "0";
$proto2961["m_inBrackets"] = "0";
$proto2961["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2961);

$proto2959["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2959);

$proto2941["m_fromlist"][]=$obj;
$proto2941["m_groupby"] = array();
$proto2941["m_orderby"] = array();
$obj = new SQLQuery($proto2941);

$queryData_sms_noticias = $obj;
$tdatasms_noticias[".sqlquery"] = $queryData_sms_noticias;



?>
