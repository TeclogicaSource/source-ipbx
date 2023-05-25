<?php

//	field labels
$fieldLabelsconf_sala_convidado = array();
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]=array();
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]["id_convidado"] = "Identificação";
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]["id_conf"] = "Sala de Conferência";
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]["nm_convidado"] = "Convidado Externo";
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]["e_mail"] = "E-mail";
$fieldLabelsconf_sala_convidado["Portuguese(Brazil)"]["nm_convidado_interno"] = "Convidado";


$tdataconf_sala_convidado=array();
	$tdataconf_sala_convidado[".NumberOfChars"]=80; 
	$tdataconf_sala_convidado[".ShortName"]="conf_sala_convidado";
	$tdataconf_sala_convidado[".OwnerID"]="";
	$tdataconf_sala_convidado[".OriginalTable"]="conf_sala_convidado";
	$tdataconf_sala_convidado[".NCSearch"]=true;
	

$tdataconf_sala_convidado[".shortTableName"] = "conf_sala_convidado";
$tdataconf_sala_convidado[".dataSourceTable"] = "conf_sala_convidado";
$tdataconf_sala_convidado[".nSecOptions"] = 0;
$tdataconf_sala_convidado[".nLoginMethod"] = 1;
$tdataconf_sala_convidado[".recsPerRowList"] = 1;	
$tdataconf_sala_convidado[".tableGroupBy"] = "0";
$tdataconf_sala_convidado[".dbType"] = 0;
$tdataconf_sala_convidado[".mainTableOwnerID"] = "";
$tdataconf_sala_convidado[".moveNext"] = 1;

$tdataconf_sala_convidado[".listAjax"] = true;

	$tdataconf_sala_convidado[".audit"] = true;

	$tdataconf_sala_convidado[".locking"] = false;
	
$tdataconf_sala_convidado[".listIcons"] = true;



$tdataconf_sala_convidado[".delete"] = true;

$tdataconf_sala_convidado[".showSimpleSearchOptions"] = false;

$tdataconf_sala_convidado[".showSearchPanel"] = true;


$tdataconf_sala_convidado[".isUseAjaxSuggest"] = true;

$tdataconf_sala_convidado[".rowHighlite"] = true;

$tdataconf_sala_convidado[".delFile"] = true;

// button handlers file names

// start on load js handlers

$tdataconf_sala_convidado[".jsOnloadAdd"] = "// Definição de variaveis.
var ctrlnm_convidado_interno = Runner.getControl(pageid, 'nm_convidado_interno');
var ctrlnm_convidado = Runner.getControl(pageid, 'nm_convidado');
var ctrlemail = Runner.getControl(pageid, 'e-mail');

//Alteração do campo convidado.
ctrlnm_convidado_interno.on('change', function(e){
	if (this.getValue() == ''){
		ctrlnm_convidado.show();
		ctrlemail.show();
	}else{
		ctrlnm_convidado.hide();
		ctrlemail.hide();
	}
});";







// end on load js handlers



$tdataconf_sala_convidado[".arrKeyFields"][] = "id_convidado";

// use datepicker for search panel
$tdataconf_sala_convidado[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataconf_sala_convidado[".isUseTimeForSearch"] = false;





$tdataconf_sala_convidado[".isUseInlineAdd"] = true;

$tdataconf_sala_convidado[".isUseInlineJs"] = $tdataconf_sala_convidado[".isUseInlineAdd"] || $tdataconf_sala_convidado[".isUseInlineEdit"];

$tdataconf_sala_convidado[".allSearchFields"] = array();



$tdataconf_sala_convidado[".isDynamicPerm"] = true;

	

$tdataconf_sala_convidado[".isDisplayLoading"] = true;

$tdataconf_sala_convidado[".isResizeColumns"] = false;


$tdataconf_sala_convidado[".createLoginPage"] = true;


 	




$tdataconf_sala_convidado[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataconf_sala_convidado[".strOrderBy"] = $gstrOrderBy;
	
$tdataconf_sala_convidado[".orderindexes"] = array();

$tdataconf_sala_convidado[".sqlHead"] = "SELECT id_convidado,   id_conf,   nm_convidado,   `e-mail`,   nm_convidado_interno";

$tdataconf_sala_convidado[".sqlFrom"] = "FROM conf_sala_convidado";

$tdataconf_sala_convidado[".sqlWhereExpr"] = "";

$tdataconf_sala_convidado[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_convidado";
	$tdataconf_sala_convidado[".Keys"]=$tableKeys;

	
//	id_convidado
	$fdata = array();
	$fdata["strName"] = "id_convidado";
	$fdata["ownerTable"] = "conf_sala_convidado";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_convidado";
		$fdata["FullName"]= "id_convidado";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataconf_sala_convidado["id_convidado"]=$fdata;
	
//	id_conf
	$fdata = array();
	$fdata["strName"] = "id_conf";
	$fdata["ownerTable"] = "conf_sala_convidado";
		$fdata["Label"]="Sala de Conferência"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_conf";
		$fdata["FullName"]= "id_conf";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
											$tdataconf_sala_convidado["id_conf"]=$fdata;
	
//	nm_convidado
	$fdata = array();
	$fdata["strName"] = "nm_convidado";
	$fdata["ownerTable"] = "conf_sala_convidado";
		$fdata["Label"]="Convidado Externo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_convidado";
		$fdata["FullName"]= "nm_convidado";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=20";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala_convidado["nm_convidado"]=$fdata;
	
//	e-mail
	$fdata = array();
	$fdata["strName"] = "e-mail";
	$fdata["ownerTable"] = "conf_sala_convidado";
		$fdata["Label"]="E-mail"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "e_mail";
		$fdata["FullName"]= "`e-mail`";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala_convidado["e-mail"]=$fdata;
	
//	nm_convidado_interno
	$fdata = array();
	$fdata["strName"] = "nm_convidado_interno";
	$fdata["ownerTable"] = "conf_sala_convidado";
		$fdata["Label"]="Convidado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="email";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="nm_usuario";
				$fdata["LookupTable"]="ldap";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_convidado_interno";
		$fdata["FullName"]= "nm_convidado_interno";
						$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala_convidado["nm_convidado_interno"]=$fdata;

	
$tables_data["conf_sala_convidado"]=&$tdataconf_sala_convidado;
$field_labels["conf_sala_convidado"] = &$fieldLabelsconf_sala_convidado;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["conf_sala_convidado"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["conf_sala_convidado"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="conf_sala";
	$masterTablesData["conf_sala_convidado"][$mIndex] = array(
		  "mDataSourceTable"=>"conf_sala"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "conf_sala"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "0"
		, "hideChild" => "0"	
		, "dispInfo" => "0"								
		, "previewOnList" => 2
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["conf_sala_convidado"][$mIndex]["masterKeys"][]="id_conf";
		$masterTablesData["conf_sala_convidado"][$mIndex]["detailKeys"][]="id_conf";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2752=array();
$proto2752["m_strHead"] = "SELECT";
$proto2752["m_strFieldList"] = "id_convidado,   id_conf,   nm_convidado,   `e-mail`,   nm_convidado_interno";
$proto2752["m_strFrom"] = "FROM conf_sala_convidado";
$proto2752["m_strWhere"] = "";
$proto2752["m_strOrderBy"] = "";
$proto2752["m_strTail"] = "";
$proto2753=array();
$proto2753["m_sql"] = "";
$proto2753["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2753["m_column"]=$obj;
$proto2753["m_contained"] = array();
$proto2753["m_strCase"] = "";
$proto2753["m_havingmode"] = "0";
$proto2753["m_inBrackets"] = "0";
$proto2753["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2753);

$proto2752["m_where"] = $obj;
$proto2755=array();
$proto2755["m_sql"] = "";
$proto2755["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2755["m_column"]=$obj;
$proto2755["m_contained"] = array();
$proto2755["m_strCase"] = "";
$proto2755["m_havingmode"] = "0";
$proto2755["m_inBrackets"] = "0";
$proto2755["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2755);

$proto2752["m_having"] = $obj;
$proto2752["m_fieldlist"] = array();
						$proto2757=array();
			$obj = new SQLField(array(
	"m_strName" => "id_convidado",
	"m_strTable" => "conf_sala_convidado"
));

$proto2757["m_expr"]=$obj;
$proto2757["m_alias"] = "";
$obj = new SQLFieldListItem($proto2757);

$proto2752["m_fieldlist"][]=$obj;
						$proto2759=array();
			$obj = new SQLField(array(
	"m_strName" => "id_conf",
	"m_strTable" => "conf_sala_convidado"
));

$proto2759["m_expr"]=$obj;
$proto2759["m_alias"] = "";
$obj = new SQLFieldListItem($proto2759);

$proto2752["m_fieldlist"][]=$obj;
						$proto2761=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_convidado",
	"m_strTable" => "conf_sala_convidado"
));

$proto2761["m_expr"]=$obj;
$proto2761["m_alias"] = "";
$obj = new SQLFieldListItem($proto2761);

$proto2752["m_fieldlist"][]=$obj;
						$proto2763=array();
			$obj = new SQLField(array(
	"m_strName" => "e-mail",
	"m_strTable" => "conf_sala_convidado"
));

$proto2763["m_expr"]=$obj;
$proto2763["m_alias"] = "";
$obj = new SQLFieldListItem($proto2763);

$proto2752["m_fieldlist"][]=$obj;
						$proto2765=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_convidado_interno",
	"m_strTable" => "conf_sala_convidado"
));

$proto2765["m_expr"]=$obj;
$proto2765["m_alias"] = "";
$obj = new SQLFieldListItem($proto2765);

$proto2752["m_fieldlist"][]=$obj;
$proto2752["m_fromlist"] = array();
												$proto2767=array();
$proto2767["m_link"] = "SQLL_MAIN";
			$proto2768=array();
$proto2768["m_strName"] = "conf_sala_convidado";
$proto2768["m_columns"] = array();
$proto2768["m_columns"][] = "id_convidado";
$proto2768["m_columns"][] = "id_conf";
$proto2768["m_columns"][] = "nm_convidado";
$proto2768["m_columns"][] = "e-mail";
$proto2768["m_columns"][] = "nm_convidado_interno";
$obj = new SQLTable($proto2768);

$proto2767["m_table"] = $obj;
$proto2767["m_alias"] = "";
$proto2769=array();
$proto2769["m_sql"] = "";
$proto2769["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2769["m_column"]=$obj;
$proto2769["m_contained"] = array();
$proto2769["m_strCase"] = "";
$proto2769["m_havingmode"] = "0";
$proto2769["m_inBrackets"] = "0";
$proto2769["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2769);

$proto2767["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2767);

$proto2752["m_fromlist"][]=$obj;
$proto2752["m_groupby"] = array();
$proto2752["m_orderby"] = array();
$obj = new SQLQuery($proto2752);

$queryData_conf_sala_convidado = $obj;
$tdataconf_sala_convidado[".sqlquery"] = $queryData_conf_sala_convidado;



?>
