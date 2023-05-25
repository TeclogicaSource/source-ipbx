<?php

//	field labels
$fieldLabelspabx = array();
$fieldLabelspabx["Portuguese(Brazil)"]=array();
$fieldLabelspabx["Portuguese(Brazil)"]["idt_tronco"] = "Idt Tronco";
$fieldLabelspabx["Portuguese(Brazil)"]["ramal"] = "Ramal";
$fieldLabelspabx["Portuguese(Brazil)"]["Nome"] = "Nome";
$fieldLabelspabx["Portuguese(Brazil)"]["idt_custo"] = "Centro de Custo";
$fieldLabelspabx["Portuguese(Brazil)"]["context"] = "Contexto";
$fieldLabelspabx["Portuguese(Brazil)"]["id_horario"] = "Horário";
$fieldLabelspabx["Portuguese(Brazil)"]["tronco"] = "Tronco";


$tdatapabx=array();
	$tdatapabx[".NumberOfChars"]=80; 
	$tdatapabx[".ShortName"]="pabx";
	$tdatapabx[".OwnerID"]="";
	$tdatapabx[".OriginalTable"]="pabx";
	$tdatapabx[".NCSearch"]=true;
	

$tdatapabx[".shortTableName"] = "pabx";
$tdatapabx[".dataSourceTable"] = "pabx";
$tdatapabx[".nSecOptions"] = 0;
$tdatapabx[".nLoginMethod"] = 1;
$tdatapabx[".recsPerRowList"] = 1;	
$tdatapabx[".tableGroupBy"] = "0";
$tdatapabx[".dbType"] = 0;
$tdatapabx[".mainTableOwnerID"] = "";
$tdatapabx[".moveNext"] = 1;

$tdatapabx[".listAjax"] = false;

	$tdatapabx[".audit"] = true;

	$tdatapabx[".locking"] = false;
	
$tdatapabx[".listIcons"] = true;
$tdatapabx[".inlineEdit"] = true;


$tdatapabx[".printFriendly"] = true;

$tdatapabx[".delete"] = true;

$tdatapabx[".showSimpleSearchOptions"] = false;

$tdatapabx[".showSearchPanel"] = true;


$tdatapabx[".isUseAjaxSuggest"] = true;

$tdatapabx[".rowHighlite"] = true;

$tdatapabx[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatapabx[".arrKeyFields"][] = "idt_tronco";

// use datepicker for search panel
$tdatapabx[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatapabx[".isUseTimeForSearch"] = false;






$tdatapabx[".isUseInlineEdit"] = true;
$tdatapabx[".isUseInlineJs"] = $tdatapabx[".isUseInlineAdd"] || $tdatapabx[".isUseInlineEdit"];

$tdatapabx[".allSearchFields"] = array();

$tdatapabx[".globSearchFields"][] = "ramal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("ramal", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "ramal";	
}
$tdatapabx[".globSearchFields"][] = "Nome";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Nome", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "Nome";	
}
$tdatapabx[".globSearchFields"][] = "idt_custo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("idt_custo", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "idt_custo";	
}
$tdatapabx[".globSearchFields"][] = "context";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("context", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "context";	
}
$tdatapabx[".globSearchFields"][] = "id_horario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_horario", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "id_horario";	
}
$tdatapabx[".globSearchFields"][] = "tronco";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("tronco", $tdatapabx[".allSearchFields"]))
{
	$tdatapabx[".allSearchFields"][] = "tronco";	
}


$tdatapabx[".isDynamicPerm"] = true;

	

$tdatapabx[".isDisplayLoading"] = true;

$tdatapabx[".isResizeColumns"] = false;


$tdatapabx[".createLoginPage"] = true;


 	




$tdatapabx[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatapabx[".strOrderBy"] = $gstrOrderBy;
	
$tdatapabx[".orderindexes"] = array();

$tdatapabx[".sqlHead"] = "SELECT idt_tronco,   ramal,   Nome,   idt_custo,   context,   id_horario,   tronco";

$tdatapabx[".sqlFrom"] = "FROM pabx";

$tdatapabx[".sqlWhereExpr"] = "";

$tdatapabx[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_tronco";
	$tdatapabx[".Keys"]=$tableKeys;

	
//	idt_tronco
	$fdata = array();
	$fdata["strName"] = "idt_tronco";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Idt Tronco"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_tronco";
		$fdata["FullName"]= "idt_tronco";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatapabx["idt_tronco"]=$fdata;
	
//	ramal
	$fdata = array();
	$fdata["strName"] = "ramal";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="ramal";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="ramal";
				$fdata["LookupTable"]="ramal_pabx_autorizado";
	$fdata["LookupOrderBy"]="ramal";
							$fdata["LookupWhere"] = "flg_disp=1";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ramal";
		$fdata["FullName"]= "ramal";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapabx["ramal"]=$fdata;
	
//	Nome
	$fdata = array();
	$fdata["strName"] = "Nome";
	$fdata["ownerTable"] = "pabx";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Nome";
		$fdata["FullName"]= "Nome";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapabx["Nome"]=$fdata;
	
//	idt_custo
	$fdata = array();
	$fdata["strName"] = "idt_custo";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="idt_custo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="dsc_centro_cust";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_custo";
		$fdata["FullName"]= "idt_custo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapabx["idt_custo"]=$fdata;
	
//	context
	$fdata = array();
	$fdata["strName"] = "context";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Contexto"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="RAMAL";
	$fdata["LookupValues"][]="RAMAL+LOCAL";
	$fdata["LookupValues"][]="RAMAL+LOCAL+CELULAR";
	$fdata["LookupValues"][]="RAMAL+LOCAL+CELULAR+DDD";
	$fdata["LookupValues"][]="RAMAL+LOCAL+CELULAR+DDD+DDI";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "context";
		$fdata["FullName"]= "context";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapabx["context"]=$fdata;
	
//	id_horario
	$fdata = array();
	$fdata["strName"] = "id_horario";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Horário"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_horario";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_horario";
				$fdata["LookupTable"]="horario";
	$fdata["LookupOrderBy"]="dsc_horario";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_horario";
		$fdata["FullName"]= "id_horario";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapabx["id_horario"]=$fdata;
	
//	tronco
	$fdata = array();
	$fdata["strName"] = "tronco";
	$fdata["ownerTable"] = "pabx";
		$fdata["Label"]="Tronco"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_tronco";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_tronco";
				$fdata["LookupTable"]="troncos";
	$fdata["LookupOrderBy"]="dsc_tronco";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tronco";
		$fdata["FullName"]= "tronco";
						$fdata["Index"]= 7;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapabx["tronco"]=$fdata;

	
$tables_data["pabx"]=&$tdatapabx;
$field_labels["pabx"] = &$fieldLabelspabx;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pabx"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["pabx"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1610=array();
$proto1610["m_strHead"] = "SELECT";
$proto1610["m_strFieldList"] = "idt_tronco,   ramal,   Nome,   idt_custo,   context,   id_horario,   tronco";
$proto1610["m_strFrom"] = "FROM pabx";
$proto1610["m_strWhere"] = "";
$proto1610["m_strOrderBy"] = "";
$proto1610["m_strTail"] = "";
$proto1611=array();
$proto1611["m_sql"] = "";
$proto1611["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1611["m_column"]=$obj;
$proto1611["m_contained"] = array();
$proto1611["m_strCase"] = "";
$proto1611["m_havingmode"] = "0";
$proto1611["m_inBrackets"] = "0";
$proto1611["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1611);

$proto1610["m_where"] = $obj;
$proto1613=array();
$proto1613["m_sql"] = "";
$proto1613["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1613["m_column"]=$obj;
$proto1613["m_contained"] = array();
$proto1613["m_strCase"] = "";
$proto1613["m_havingmode"] = "0";
$proto1613["m_inBrackets"] = "0";
$proto1613["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1613);

$proto1610["m_having"] = $obj;
$proto1610["m_fieldlist"] = array();
						$proto1615=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_tronco",
	"m_strTable" => "pabx"
));

$proto1615["m_expr"]=$obj;
$proto1615["m_alias"] = "";
$obj = new SQLFieldListItem($proto1615);

$proto1610["m_fieldlist"][]=$obj;
						$proto1617=array();
			$obj = new SQLField(array(
	"m_strName" => "ramal",
	"m_strTable" => "pabx"
));

$proto1617["m_expr"]=$obj;
$proto1617["m_alias"] = "";
$obj = new SQLFieldListItem($proto1617);

$proto1610["m_fieldlist"][]=$obj;
						$proto1619=array();
			$obj = new SQLField(array(
	"m_strName" => "Nome",
	"m_strTable" => "pabx"
));

$proto1619["m_expr"]=$obj;
$proto1619["m_alias"] = "";
$obj = new SQLFieldListItem($proto1619);

$proto1610["m_fieldlist"][]=$obj;
						$proto1621=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_custo",
	"m_strTable" => "pabx"
));

$proto1621["m_expr"]=$obj;
$proto1621["m_alias"] = "";
$obj = new SQLFieldListItem($proto1621);

$proto1610["m_fieldlist"][]=$obj;
						$proto1623=array();
			$obj = new SQLField(array(
	"m_strName" => "context",
	"m_strTable" => "pabx"
));

$proto1623["m_expr"]=$obj;
$proto1623["m_alias"] = "";
$obj = new SQLFieldListItem($proto1623);

$proto1610["m_fieldlist"][]=$obj;
						$proto1625=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "pabx"
));

$proto1625["m_expr"]=$obj;
$proto1625["m_alias"] = "";
$obj = new SQLFieldListItem($proto1625);

$proto1610["m_fieldlist"][]=$obj;
						$proto1627=array();
			$obj = new SQLField(array(
	"m_strName" => "tronco",
	"m_strTable" => "pabx"
));

$proto1627["m_expr"]=$obj;
$proto1627["m_alias"] = "";
$obj = new SQLFieldListItem($proto1627);

$proto1610["m_fieldlist"][]=$obj;
$proto1610["m_fromlist"] = array();
												$proto1629=array();
$proto1629["m_link"] = "SQLL_MAIN";
			$proto1630=array();
$proto1630["m_strName"] = "pabx";
$proto1630["m_columns"] = array();
$proto1630["m_columns"][] = "idt_tronco";
$proto1630["m_columns"][] = "ramal";
$proto1630["m_columns"][] = "Nome";
$proto1630["m_columns"][] = "idt_custo";
$proto1630["m_columns"][] = "context";
$proto1630["m_columns"][] = "id_horario";
$proto1630["m_columns"][] = "tronco";
$obj = new SQLTable($proto1630);

$proto1629["m_table"] = $obj;
$proto1629["m_alias"] = "";
$proto1631=array();
$proto1631["m_sql"] = "";
$proto1631["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1631["m_column"]=$obj;
$proto1631["m_contained"] = array();
$proto1631["m_strCase"] = "";
$proto1631["m_havingmode"] = "0";
$proto1631["m_inBrackets"] = "0";
$proto1631["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1631);

$proto1629["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1629);

$proto1610["m_fromlist"][]=$obj;
$proto1610["m_groupby"] = array();
$proto1610["m_orderby"] = array();
$obj = new SQLQuery($proto1610);

$queryData_pabx = $obj;
$tdatapabx[".sqlquery"] = $queryData_pabx;



?>
