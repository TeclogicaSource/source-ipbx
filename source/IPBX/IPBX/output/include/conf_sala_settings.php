<?php

//	field labels
$fieldLabelsconf_sala = array();
$fieldLabelsconf_sala["Portuguese(Brazil)"]=array();
$fieldLabelsconf_sala["Portuguese(Brazil)"]["id_conf"] = "Identificação";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["nm_sala"] = "Sala";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["dsc_sala"] = "Descrição";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["flg_pass"] = "Requer Senha";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["flg_rec"] = "Gravação";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["dt_conferencia"] = "Data da conferência";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["hr_inicio"] = "Hora Início";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["hr_fim"] = "Hora Fim";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["dt_expiracao"] = "Data Expiração";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelsconf_sala["Portuguese(Brazil)"]["Status"] = "Status";


$tdataconf_sala=array();
	$tdataconf_sala[".NumberOfChars"]=80; 
	$tdataconf_sala[".ShortName"]="conf_sala";
	$tdataconf_sala[".OwnerID"]="";
	$tdataconf_sala[".OriginalTable"]="conf_sala";
	$tdataconf_sala[".NCSearch"]=true;
	

$tdataconf_sala[".shortTableName"] = "conf_sala";
$tdataconf_sala[".dataSourceTable"] = "conf_sala";
$tdataconf_sala[".nSecOptions"] = 0;
$tdataconf_sala[".nLoginMethod"] = 1;
$tdataconf_sala[".recsPerRowList"] = 1;	
$tdataconf_sala[".tableGroupBy"] = "0";
$tdataconf_sala[".dbType"] = 0;
$tdataconf_sala[".mainTableOwnerID"] = "";
$tdataconf_sala[".moveNext"] = 1;

$tdataconf_sala[".listAjax"] = true;

	$tdataconf_sala[".audit"] = true;

	$tdataconf_sala[".locking"] = false;
	
$tdataconf_sala[".listIcons"] = true;
$tdataconf_sala[".edit"] = true;



$tdataconf_sala[".delete"] = true;

$tdataconf_sala[".showSimpleSearchOptions"] = false;

$tdataconf_sala[".showSearchPanel"] = true;


$tdataconf_sala[".isUseAjaxSuggest"] = true;

$tdataconf_sala[".rowHighlite"] = true;

$tdataconf_sala[".delFile"] = true;

// button handlers file names
$tdataconf_sala[".buttonHandlers_list"][] = "buttonevent_New_Button";

// start on load js handlers








// end on load js handlers



$tdataconf_sala[".arrKeyFields"][] = "id_conf";

// use datepicker for search panel
$tdataconf_sala[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataconf_sala[".isUseTimeForSearch"] = true;






$tdataconf_sala[".isUseInlineJs"] = $tdataconf_sala[".isUseInlineAdd"] || $tdataconf_sala[".isUseInlineEdit"];

$tdataconf_sala[".allSearchFields"] = array();



$tdataconf_sala[".isDynamicPerm"] = true;

	

$tdataconf_sala[".isDisplayLoading"] = true;

$tdataconf_sala[".isResizeColumns"] = false;


$tdataconf_sala[".createLoginPage"] = true;


 	
	$tdataconf_sala[".subQueriesSupAccess"] = true;




$tdataconf_sala[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataconf_sala[".strOrderBy"] = $gstrOrderBy;
	
$tdataconf_sala[".orderindexes"] = array();

$tdataconf_sala[".sqlHead"] = "SELECT id_conf,  nm_sala,  dsc_sala,  dt_conferencia,  flg_pass,  flg_rec,  hr_inicio,  hr_fim,  dt_expiracao,  senha,  Status";

$tdataconf_sala[".sqlFrom"] = "FROM conf_sala";

$tdataconf_sala[".sqlWhereExpr"] = "(Status <> 'Sala Expirada')";

$tdataconf_sala[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_conf";
	$tdataconf_sala[".Keys"]=$tableKeys;

	
//	id_conf
	$fdata = array();
	$fdata["strName"] = "id_conf";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_conf";
		$fdata["FullName"]= "id_conf";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala["id_conf"]=$fdata;
	
//	nm_sala
	$fdata = array();
	$fdata["strName"] = "nm_sala";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Sala"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_sala";
		$fdata["FullName"]= "nm_sala";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala["nm_sala"]=$fdata;
	
//	dsc_sala
	$fdata = array();
	$fdata["strName"] = "dsc_sala";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text area";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_sala";
		$fdata["FullName"]= "dsc_sala";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
		$fdata["EditParams"]="";
			$fdata["EditParams"].= " rows=100";
		$fdata["nRows"] = 100;
			$fdata["EditParams"].= " cols=600";
		$fdata["nCols"] = 600;
		
				$fdata["FieldPermissions"]=true;
								$tdataconf_sala["dsc_sala"]=$fdata;
	
//	dt_conferencia
	$fdata = array();
	$fdata["strName"] = "dt_conferencia";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Data da conferência"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_conferencia";
		$fdata["FullName"]= "dt_conferencia";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala["dt_conferencia"]=$fdata;
	
//	flg_pass
	$fdata = array();
	$fdata["strName"] = "flg_pass";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Requer Senha"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_pass";
		$fdata["FullName"]= "flg_pass";
						$fdata["Index"]= 5;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataconf_sala["flg_pass"]=$fdata;
	
//	flg_rec
	$fdata = array();
	$fdata["strName"] = "flg_rec";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Gravação"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_rec";
		$fdata["FullName"]= "flg_rec";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataconf_sala["flg_rec"]=$fdata;
	
//	hr_inicio
	$fdata = array();
	$fdata["strName"] = "hr_inicio";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Hora Início"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_inicio";
		$fdata["FullName"]= "hr_inicio";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 15,
										  "showSeconds" => 0);
	$tdataconf_sala["hr_inicio"]=$fdata;
	
//	hr_fim
	$fdata = array();
	$fdata["strName"] = "hr_fim";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Hora Fim"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "hr_fim";
		$fdata["FullName"]= "hr_fim";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
									$fdata["FormatTimeAttrs"] = array("useTimePicker" => 1,
										  "hours" => 24,
										  "minutes" => 15,
										  "showSeconds" => 0);
	$tdataconf_sala["hr_fim"]=$fdata;
	
//	dt_expiracao
	$fdata = array();
	$fdata["strName"] = "dt_expiracao";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Data Expiração"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_expiracao";
		$fdata["FullName"]= "dt_expiracao";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 9;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
								$tdataconf_sala["dt_expiracao"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "conf_sala";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala["senha"]=$fdata;
	
//	Status
	$fdata = array();
	$fdata["strName"] = "Status";
	$fdata["ownerTable"] = "conf_sala";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Status";
		$fdata["FullName"]= "Status";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataconf_sala["Status"]=$fdata;

	
$tables_data["conf_sala"]=&$tdataconf_sala;
$field_labels["conf_sala"] = &$fieldLabelsconf_sala;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["conf_sala"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="conf_sala_convidado";
	$detailsTablesData["conf_sala"][$dIndex] = array(
		  "dDataSourceTable"=>"conf_sala_convidado"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"conf_sala_convidado"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "0"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_convidado,   id_conf,   nm_convidado,   `e-mail`,   nm_convidado_interno"	
		, "sqlFrom"=>"FROM conf_sala_convidado"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 2
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$detailsTablesData["conf_sala"][$dIndex]["masterKeys"][]="id_conf";
		$detailsTablesData["conf_sala"][$dIndex]["detailKeys"][]="id_conf";


	
// tables which are master tables for current table (detail)
$masterTablesData["conf_sala"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2771=array();
$proto2771["m_strHead"] = "SELECT";
$proto2771["m_strFieldList"] = "id_conf,  nm_sala,  dsc_sala,  dt_conferencia,  flg_pass,  flg_rec,  hr_inicio,  hr_fim,  dt_expiracao,  senha,  Status";
$proto2771["m_strFrom"] = "FROM conf_sala";
$proto2771["m_strWhere"] = "(Status <> 'Sala Expirada')";
$proto2771["m_strOrderBy"] = "";
$proto2771["m_strTail"] = "";
$proto2772=array();
$proto2772["m_sql"] = "Status <> 'Sala Expirada'";
$proto2772["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "conf_sala"
));

$proto2772["m_column"]=$obj;
$proto2772["m_contained"] = array();
$proto2772["m_strCase"] = "<> 'Sala Expirada'";
$proto2772["m_havingmode"] = "0";
$proto2772["m_inBrackets"] = "0";
$proto2772["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2772);

$proto2771["m_where"] = $obj;
$proto2774=array();
$proto2774["m_sql"] = "";
$proto2774["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2774["m_column"]=$obj;
$proto2774["m_contained"] = array();
$proto2774["m_strCase"] = "";
$proto2774["m_havingmode"] = "0";
$proto2774["m_inBrackets"] = "0";
$proto2774["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2774);

$proto2771["m_having"] = $obj;
$proto2771["m_fieldlist"] = array();
						$proto2776=array();
			$obj = new SQLField(array(
	"m_strName" => "id_conf",
	"m_strTable" => "conf_sala"
));

$proto2776["m_expr"]=$obj;
$proto2776["m_alias"] = "";
$obj = new SQLFieldListItem($proto2776);

$proto2771["m_fieldlist"][]=$obj;
						$proto2778=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_sala",
	"m_strTable" => "conf_sala"
));

$proto2778["m_expr"]=$obj;
$proto2778["m_alias"] = "";
$obj = new SQLFieldListItem($proto2778);

$proto2771["m_fieldlist"][]=$obj;
						$proto2780=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_sala",
	"m_strTable" => "conf_sala"
));

$proto2780["m_expr"]=$obj;
$proto2780["m_alias"] = "";
$obj = new SQLFieldListItem($proto2780);

$proto2771["m_fieldlist"][]=$obj;
						$proto2782=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_conferencia",
	"m_strTable" => "conf_sala"
));

$proto2782["m_expr"]=$obj;
$proto2782["m_alias"] = "";
$obj = new SQLFieldListItem($proto2782);

$proto2771["m_fieldlist"][]=$obj;
						$proto2784=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_pass",
	"m_strTable" => "conf_sala"
));

$proto2784["m_expr"]=$obj;
$proto2784["m_alias"] = "";
$obj = new SQLFieldListItem($proto2784);

$proto2771["m_fieldlist"][]=$obj;
						$proto2786=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_rec",
	"m_strTable" => "conf_sala"
));

$proto2786["m_expr"]=$obj;
$proto2786["m_alias"] = "";
$obj = new SQLFieldListItem($proto2786);

$proto2771["m_fieldlist"][]=$obj;
						$proto2788=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_inicio",
	"m_strTable" => "conf_sala"
));

$proto2788["m_expr"]=$obj;
$proto2788["m_alias"] = "";
$obj = new SQLFieldListItem($proto2788);

$proto2771["m_fieldlist"][]=$obj;
						$proto2790=array();
			$obj = new SQLField(array(
	"m_strName" => "hr_fim",
	"m_strTable" => "conf_sala"
));

$proto2790["m_expr"]=$obj;
$proto2790["m_alias"] = "";
$obj = new SQLFieldListItem($proto2790);

$proto2771["m_fieldlist"][]=$obj;
						$proto2792=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_expiracao",
	"m_strTable" => "conf_sala"
));

$proto2792["m_expr"]=$obj;
$proto2792["m_alias"] = "";
$obj = new SQLFieldListItem($proto2792);

$proto2771["m_fieldlist"][]=$obj;
						$proto2794=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "conf_sala"
));

$proto2794["m_expr"]=$obj;
$proto2794["m_alias"] = "";
$obj = new SQLFieldListItem($proto2794);

$proto2771["m_fieldlist"][]=$obj;
						$proto2796=array();
			$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "conf_sala"
));

$proto2796["m_expr"]=$obj;
$proto2796["m_alias"] = "";
$obj = new SQLFieldListItem($proto2796);

$proto2771["m_fieldlist"][]=$obj;
$proto2771["m_fromlist"] = array();
												$proto2798=array();
$proto2798["m_link"] = "SQLL_MAIN";
			$proto2799=array();
$proto2799["m_strName"] = "conf_sala";
$proto2799["m_columns"] = array();
$proto2799["m_columns"][] = "id_conf";
$proto2799["m_columns"][] = "nm_sala";
$proto2799["m_columns"][] = "dsc_sala";
$proto2799["m_columns"][] = "dt_conferencia";
$proto2799["m_columns"][] = "flg_pass";
$proto2799["m_columns"][] = "flg_rec";
$proto2799["m_columns"][] = "hr_inicio";
$proto2799["m_columns"][] = "hr_fim";
$proto2799["m_columns"][] = "dt_expiracao";
$proto2799["m_columns"][] = "arq_grav";
$proto2799["m_columns"][] = "senha";
$proto2799["m_columns"][] = "name";
$proto2799["m_columns"][] = "Status";
$obj = new SQLTable($proto2799);

$proto2798["m_table"] = $obj;
$proto2798["m_alias"] = "";
$proto2800=array();
$proto2800["m_sql"] = "";
$proto2800["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2800["m_column"]=$obj;
$proto2800["m_contained"] = array();
$proto2800["m_strCase"] = "";
$proto2800["m_havingmode"] = "0";
$proto2800["m_inBrackets"] = "0";
$proto2800["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2800);

$proto2798["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2798);

$proto2771["m_fromlist"][]=$obj;
$proto2771["m_groupby"] = array();
$proto2771["m_orderby"] = array();
$obj = new SQLQuery($proto2771);

$queryData_conf_sala = $obj;
$tdataconf_sala[".sqlquery"] = $queryData_conf_sala;



?>
