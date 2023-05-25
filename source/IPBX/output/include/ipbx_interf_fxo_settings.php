<?php

//	field labels
$fieldLabelsipbx_interf_fxo = array();
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["id_interf"] = "Id Interf";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["dsc_interf"] = "Descrição";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["id_central"] = "Central";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["board"] = "Board";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["id_tp_interf"] = "Tipo interface";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["tp_chamada"] = "Tempo chamada (s)";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["piloto"] = "Piloto";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["cd_operadora"] = "Código da Operadora";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelsipbx_interf_fxo["Portuguese(Brazil)"]["id_chamada"] = "Número identificador (saída)";


$tdataipbx_interf_fxo=array();
	$tdataipbx_interf_fxo[".NumberOfChars"]=80; 
	$tdataipbx_interf_fxo[".ShortName"]="ipbx_interf_fxo";
	$tdataipbx_interf_fxo[".OwnerID"]="";
	$tdataipbx_interf_fxo[".OriginalTable"]="ipbx_interf_fxo";
	$tdataipbx_interf_fxo[".NCSearch"]=true;
	

$tdataipbx_interf_fxo[".shortTableName"] = "ipbx_interf_fxo";
$tdataipbx_interf_fxo[".dataSourceTable"] = "ipbx_interf_fxo";
$tdataipbx_interf_fxo[".nSecOptions"] = 0;
$tdataipbx_interf_fxo[".nLoginMethod"] = 1;
$tdataipbx_interf_fxo[".recsPerRowList"] = 1;	
$tdataipbx_interf_fxo[".tableGroupBy"] = "0";
$tdataipbx_interf_fxo[".dbType"] = 0;
$tdataipbx_interf_fxo[".mainTableOwnerID"] = "";
$tdataipbx_interf_fxo[".moveNext"] = 1;

$tdataipbx_interf_fxo[".listAjax"] = false;

	$tdataipbx_interf_fxo[".audit"] = true;

	$tdataipbx_interf_fxo[".locking"] = false;
	
$tdataipbx_interf_fxo[".listIcons"] = true;
$tdataipbx_interf_fxo[".inlineEdit"] = true;



$tdataipbx_interf_fxo[".delete"] = true;

$tdataipbx_interf_fxo[".showSimpleSearchOptions"] = false;

$tdataipbx_interf_fxo[".showSearchPanel"] = true;


$tdataipbx_interf_fxo[".isUseAjaxSuggest"] = true;

$tdataipbx_interf_fxo[".rowHighlite"] = true;

$tdataipbx_interf_fxo[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_interf_fxo[".arrKeyFields"][] = "id_interf";
$tdataipbx_interf_fxo[".arrKeyFields"][] = "id_central";

// use datepicker for search panel
$tdataipbx_interf_fxo[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_interf_fxo[".isUseTimeForSearch"] = false;




$tdataipbx_interf_fxo[".useDetailsPreview"] = true;	

$tdataipbx_interf_fxo[".isUseInlineAdd"] = true;

$tdataipbx_interf_fxo[".isUseInlineEdit"] = true;
$tdataipbx_interf_fxo[".isUseInlineJs"] = $tdataipbx_interf_fxo[".isUseInlineAdd"] || $tdataipbx_interf_fxo[".isUseInlineEdit"];

$tdataipbx_interf_fxo[".allSearchFields"] = array();

$tdataipbx_interf_fxo[".globSearchFields"][] = "dsc_interf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_interf", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "dsc_interf";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "id_central";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_central", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "id_central";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "board";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("board", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "board";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "id_tp_interf";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_tp_interf", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "id_tp_interf";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "tp_chamada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tp_chamada", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "tp_chamada";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "piloto";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("piloto", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "piloto";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "cd_operadora";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cd_operadora", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "cd_operadora";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "id_contrato";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_contrato", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "id_contrato";	
}
$tdataipbx_interf_fxo[".globSearchFields"][] = "id_chamada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_chamada", $tdataipbx_interf_fxo[".allSearchFields"]))
{
	$tdataipbx_interf_fxo[".allSearchFields"][] = "id_chamada";	
}


$tdataipbx_interf_fxo[".isDynamicPerm"] = true;

	
$tdataipbx_interf_fxo[".isVerLayout"] = true;

$tdataipbx_interf_fxo[".isDisplayLoading"] = true;

$tdataipbx_interf_fxo[".isResizeColumns"] = false;


$tdataipbx_interf_fxo[".createLoginPage"] = true;


 	
	$tdataipbx_interf_fxo[".subQueriesSupAccess"] = true;




$tdataipbx_interf_fxo[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_interf_fxo[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_interf_fxo[".orderindexes"] = array();

$tdataipbx_interf_fxo[".sqlHead"] = "SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   piloto,   cd_operadora,   id_contrato,   id_chamada";

$tdataipbx_interf_fxo[".sqlFrom"] = "FROM ipbx_interf_fxo";

$tdataipbx_interf_fxo[".sqlWhereExpr"] = "";

$tdataipbx_interf_fxo[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_interf";
	$tableKeys[]="id_central";
	$tdataipbx_interf_fxo[".Keys"]=$tableKeys;

	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Id Interf"; 
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
			
											$tdataipbx_interf_fxo["id_interf"]=$fdata;
	
//	dsc_interf
	$fdata = array();
	$fdata["strName"] = "dsc_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
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
			$tdataipbx_interf_fxo["dsc_interf"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["id_central"]=$fdata;
	
//	board
	$fdata = array();
	$fdata["strName"] = "board";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Board"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="0";
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
	$fdata["LookupValues"][]="10";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "board";
		$fdata["FullName"]= "board";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["board"]=$fdata;
	
//	id_tp_interf
	$fdata = array();
	$fdata["strName"] = "id_tp_interf";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Tipo interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tp_interf";
		$fdata["FullName"]= "id_tp_interf";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["id_tp_interf"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Tempo chamada (s)"; 
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
						$fdata["Index"]= 6;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["tp_chamada"]=$fdata;
	
//	piloto
	$fdata = array();
	$fdata["strName"] = "piloto";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Piloto"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name, '-', callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "piloto";
		$fdata["FullName"]= "piloto";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["piloto"]=$fdata;
	
//	cd_operadora
	$fdata = array();
	$fdata["strName"] = "cd_operadora";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Código da Operadora"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cd_operadora";
		$fdata["FullName"]= "cd_operadora";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
				$fdata["EditParams"].= " size=2";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["cd_operadora"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
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
						$fdata["Index"]= 9;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["id_contrato"]=$fdata;
	
//	id_chamada
	$fdata = array();
	$fdata["strName"] = "id_chamada";
	$fdata["ownerTable"] = "ipbx_interf_fxo";
		$fdata["Label"]="Número identificador (saída)"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_chamada";
		$fdata["FullName"]= "id_chamada";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_interf_fxo["id_chamada"]=$fdata;

	
$tables_data["ipbx_interf_fxo"]=&$tdataipbx_interf_fxo;
$field_labels["ipbx_interf_fxo"] = &$fieldLabelsipbx_interf_fxo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_interf_fxo"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_canais";
	$detailsTablesData["ipbx_interf_fxo"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_canais"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_canais"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp"	
		, "sqlFrom"=>"FROM ipbx_canais"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 0
		, "previewOnEdit" => 0
		, "previewOnView" => 0
	);	
		$detailsTablesData["ipbx_interf_fxo"][$dIndex]["masterKeys"][]="id_interf";
		$detailsTablesData["ipbx_interf_fxo"][$dIndex]["detailKeys"][]="id_interf";


	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_interf_fxo"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["ipbx_interf_fxo"][$mIndex] = array(
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
		$masterTablesData["ipbx_interf_fxo"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["ipbx_interf_fxo"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1721=array();
$proto1721["m_strHead"] = "SELECT";
$proto1721["m_strFieldList"] = "id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   piloto,   cd_operadora,   id_contrato,   id_chamada";
$proto1721["m_strFrom"] = "FROM ipbx_interf_fxo";
$proto1721["m_strWhere"] = "";
$proto1721["m_strOrderBy"] = "";
$proto1721["m_strTail"] = "";
$proto1722=array();
$proto1722["m_sql"] = "";
$proto1722["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1722["m_column"]=$obj;
$proto1722["m_contained"] = array();
$proto1722["m_strCase"] = "";
$proto1722["m_havingmode"] = "0";
$proto1722["m_inBrackets"] = "0";
$proto1722["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1722);

$proto1721["m_where"] = $obj;
$proto1724=array();
$proto1724["m_sql"] = "";
$proto1724["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1724["m_column"]=$obj;
$proto1724["m_contained"] = array();
$proto1724["m_strCase"] = "";
$proto1724["m_havingmode"] = "0";
$proto1724["m_inBrackets"] = "0";
$proto1724["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1724);

$proto1721["m_having"] = $obj;
$proto1721["m_fieldlist"] = array();
						$proto1726=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1726["m_expr"]=$obj;
$proto1726["m_alias"] = "";
$obj = new SQLFieldListItem($proto1726);

$proto1721["m_fieldlist"][]=$obj;
						$proto1728=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_interf",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1728["m_expr"]=$obj;
$proto1728["m_alias"] = "";
$obj = new SQLFieldListItem($proto1728);

$proto1721["m_fieldlist"][]=$obj;
						$proto1730=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1730["m_expr"]=$obj;
$proto1730["m_alias"] = "";
$obj = new SQLFieldListItem($proto1730);

$proto1721["m_fieldlist"][]=$obj;
						$proto1732=array();
			$obj = new SQLField(array(
	"m_strName" => "board",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1732["m_expr"]=$obj;
$proto1732["m_alias"] = "";
$obj = new SQLFieldListItem($proto1732);

$proto1721["m_fieldlist"][]=$obj;
						$proto1734=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tp_interf",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1734["m_expr"]=$obj;
$proto1734["m_alias"] = "";
$obj = new SQLFieldListItem($proto1734);

$proto1721["m_fieldlist"][]=$obj;
						$proto1736=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1736["m_expr"]=$obj;
$proto1736["m_alias"] = "";
$obj = new SQLFieldListItem($proto1736);

$proto1721["m_fieldlist"][]=$obj;
						$proto1738=array();
			$obj = new SQLField(array(
	"m_strName" => "piloto",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1738["m_expr"]=$obj;
$proto1738["m_alias"] = "";
$obj = new SQLFieldListItem($proto1738);

$proto1721["m_fieldlist"][]=$obj;
						$proto1740=array();
			$obj = new SQLField(array(
	"m_strName" => "cd_operadora",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1740["m_expr"]=$obj;
$proto1740["m_alias"] = "";
$obj = new SQLFieldListItem($proto1740);

$proto1721["m_fieldlist"][]=$obj;
						$proto1742=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1742["m_expr"]=$obj;
$proto1742["m_alias"] = "";
$obj = new SQLFieldListItem($proto1742);

$proto1721["m_fieldlist"][]=$obj;
						$proto1744=array();
			$obj = new SQLField(array(
	"m_strName" => "id_chamada",
	"m_strTable" => "ipbx_interf_fxo"
));

$proto1744["m_expr"]=$obj;
$proto1744["m_alias"] = "";
$obj = new SQLFieldListItem($proto1744);

$proto1721["m_fieldlist"][]=$obj;
$proto1721["m_fromlist"] = array();
												$proto1746=array();
$proto1746["m_link"] = "SQLL_MAIN";
			$proto1747=array();
$proto1747["m_strName"] = "ipbx_interf_fxo";
$proto1747["m_columns"] = array();
$proto1747["m_columns"][] = "id_interf";
$proto1747["m_columns"][] = "dsc_interf";
$proto1747["m_columns"][] = "id_central";
$proto1747["m_columns"][] = "board";
$proto1747["m_columns"][] = "id_tp_interf";
$proto1747["m_columns"][] = "tp_chamada";
$proto1747["m_columns"][] = "piloto";
$proto1747["m_columns"][] = "cd_operadora";
$proto1747["m_columns"][] = "id_contrato";
$proto1747["m_columns"][] = "id_chamada";
$obj = new SQLTable($proto1747);

$proto1746["m_table"] = $obj;
$proto1746["m_alias"] = "";
$proto1748=array();
$proto1748["m_sql"] = "";
$proto1748["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1748["m_column"]=$obj;
$proto1748["m_contained"] = array();
$proto1748["m_strCase"] = "";
$proto1748["m_havingmode"] = "0";
$proto1748["m_inBrackets"] = "0";
$proto1748["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1748);

$proto1746["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1746);

$proto1721["m_fromlist"][]=$obj;
$proto1721["m_groupby"] = array();
$proto1721["m_orderby"] = array();
$obj = new SQLQuery($proto1721);

$queryData_ipbx_interf_fxo = $obj;
$tdataipbx_interf_fxo[".sqlquery"] = $queryData_ipbx_interf_fxo;



?>
