<?php

//	field labels
$fieldLabelsRel__Disponibilidade_Agente = array();
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["Fila"] = "Fila";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["Logon"] = "Logon";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["Logout"] = "Logout";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoDisponivel"] = "Tempo Disponível";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoPausa"] = "Tempo Pausa";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoAtendimento"] = "Tempo Atendimento";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoLivre"] = "Tempo Livre";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoPausaNProdutiva"] = "Tempo Pausa Obrigatória";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["TempoPausaProdutiva"] = "Tempo Pausa Produtiva";
$fieldLabelsRel__Disponibilidade_Agente["Portuguese(Brazil)"]["agente"] = "Agente";


$tdataRel__Disponibilidade_Agente=array();
	$tdataRel__Disponibilidade_Agente[".NumberOfChars"]=80; 
	$tdataRel__Disponibilidade_Agente[".ShortName"]="Rel__Disponibilidade_Agente";
	$tdataRel__Disponibilidade_Agente[".OwnerID"]="";
	$tdataRel__Disponibilidade_Agente[".OriginalTable"]="v_rel_disp_agente";
	$tdataRel__Disponibilidade_Agente[".NCSearch"]=true;
	

$tdataRel__Disponibilidade_Agente[".shortTableName"] = "Rel__Disponibilidade_Agente";
$tdataRel__Disponibilidade_Agente[".dataSourceTable"] = "Rel. Disponibilidade Agente";
$tdataRel__Disponibilidade_Agente[".nSecOptions"] = 0;
$tdataRel__Disponibilidade_Agente[".nLoginMethod"] = 1;
$tdataRel__Disponibilidade_Agente[".recsPerRowList"] = 1;	
$tdataRel__Disponibilidade_Agente[".tableGroupBy"] = "0";
$tdataRel__Disponibilidade_Agente[".dbType"] = 0;
$tdataRel__Disponibilidade_Agente[".mainTableOwnerID"] = "";
$tdataRel__Disponibilidade_Agente[".moveNext"] = 1;

$tdataRel__Disponibilidade_Agente[".listAjax"] = false;

	$tdataRel__Disponibilidade_Agente[".audit"] = false;

	$tdataRel__Disponibilidade_Agente[".locking"] = false;
	
$tdataRel__Disponibilidade_Agente[".listIcons"] = true;

$tdataRel__Disponibilidade_Agente[".exportTo"] = true;

$tdataRel__Disponibilidade_Agente[".printFriendly"] = true;


$tdataRel__Disponibilidade_Agente[".showSimpleSearchOptions"] = false;

$tdataRel__Disponibilidade_Agente[".showSearchPanel"] = true;


$tdataRel__Disponibilidade_Agente[".isUseAjaxSuggest"] = true;


$tdataRel__Disponibilidade_Agente[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Disponibilidade_Agente[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Disponibilidade_Agente[".isUseTimeForSearch"] = false;





$tdataRel__Disponibilidade_Agente[".isUseInlineJs"] = $tdataRel__Disponibilidade_Agente[".isUseInlineAdd"] || $tdataRel__Disponibilidade_Agente[".isUseInlineEdit"];

$tdataRel__Disponibilidade_Agente[".allSearchFields"] = array();

$tdataRel__Disponibilidade_Agente[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataRel__Disponibilidade_Agente[".allSearchFields"]))
{
	$tdataRel__Disponibilidade_Agente[".allSearchFields"][] = "Data";	
}
$tdataRel__Disponibilidade_Agente[".globSearchFields"][] = "agente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("agente", $tdataRel__Disponibilidade_Agente[".allSearchFields"]))
{
	$tdataRel__Disponibilidade_Agente[".allSearchFields"][] = "agente";	
}
$tdataRel__Disponibilidade_Agente[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel__Disponibilidade_Agente[".allSearchFields"]))
{
	$tdataRel__Disponibilidade_Agente[".allSearchFields"][] = "Fila";	
}


$tdataRel__Disponibilidade_Agente[".isDynamicPerm"] = true;

	

$tdataRel__Disponibilidade_Agente[".isDisplayLoading"] = true;

$tdataRel__Disponibilidade_Agente[".isResizeColumns"] = false;


$tdataRel__Disponibilidade_Agente[".createLoginPage"] = true;


 	

$tdataRel__Disponibilidade_Agente[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY `Data`, Logon";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Disponibilidade_Agente[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Disponibilidade_Agente[".orderindexes"] = array();
$tdataRel__Disponibilidade_Agente[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "`Data`");
$tdataRel__Disponibilidade_Agente[".orderindexes"][] = array(4, (1 ? "ASC" : "DESC"), "Logon");

$tdataRel__Disponibilidade_Agente[".sqlHead"] = "SELECT Data,  agente,  Fila,  Logon,  Logout,  TempoDisponivel,  TempoPausaNProdutiva,  TempoPausaProdutiva,  TempoPausa,  TempoAtendimento,  TempoLivre";

$tdataRel__Disponibilidade_Agente[".sqlFrom"] = "FROM v_rel_disp_agente";

$tdataRel__Disponibilidade_Agente[".sqlWhereExpr"] = "(agente is not null)";

$tdataRel__Disponibilidade_Agente[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Disponibilidade_Agente[".Keys"]=$tableKeys;

	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "v_rel_disp_agente";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "Data";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Disponibilidade_Agente["Data"]=$fdata;
	
//	agente
	$fdata = array();
	$fdata["strName"] = "agente";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Agente"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="agente";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="agente";
				$fdata["LookupTable"]="v_rel_disp_agente";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "agente";
		$fdata["FullName"]= "agente";
					$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 2;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Disponibilidade_Agente["agente"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_rel_disp_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Fila";
				$fdata["LookupTable"]="cc_receptivo_filas_atend";
	$fdata["LookupOrderBy"]="Fila";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
						$fdata["Index"]= 3;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Disponibilidade_Agente["Fila"]=$fdata;
	
//	Logon
	$fdata = array();
	$fdata["strName"] = "Logon";
	$fdata["ownerTable"] = "v_rel_disp_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Logon";
		$fdata["FullName"]= "Logon";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=13";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Disponibilidade_Agente["Logon"]=$fdata;
	
//	Logout
	$fdata = array();
	$fdata["strName"] = "Logout";
	$fdata["ownerTable"] = "v_rel_disp_agente";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Logout";
		$fdata["FullName"]= "Logout";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=13";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Disponibilidade_Agente["Logout"]=$fdata;
	
//	TempoDisponivel
	$fdata = array();
	$fdata["strName"] = "TempoDisponivel";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Disponível"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoDisponivel";
		$fdata["FullName"]= "TempoDisponivel";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoDisponivel"]=$fdata;
	
//	TempoPausaNProdutiva
	$fdata = array();
	$fdata["strName"] = "TempoPausaNProdutiva";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Pausa Obrigatória"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoPausaNProdutiva";
		$fdata["FullName"]= "TempoPausaNProdutiva";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoPausaNProdutiva"]=$fdata;
	
//	TempoPausaProdutiva
	$fdata = array();
	$fdata["strName"] = "TempoPausaProdutiva";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Pausa Produtiva"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoPausaProdutiva";
		$fdata["FullName"]= "TempoPausaProdutiva";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoPausaProdutiva"]=$fdata;
	
//	TempoPausa
	$fdata = array();
	$fdata["strName"] = "TempoPausa";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Pausa"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoPausa";
		$fdata["FullName"]= "TempoPausa";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoPausa"]=$fdata;
	
//	TempoAtendimento
	$fdata = array();
	$fdata["strName"] = "TempoAtendimento";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Atendimento"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoAtendimento";
		$fdata["FullName"]= "TempoAtendimento";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoAtendimento"]=$fdata;
	
//	TempoLivre
	$fdata = array();
	$fdata["strName"] = "TempoLivre";
	$fdata["ownerTable"] = "v_rel_disp_agente";
		$fdata["Label"]="Tempo Livre"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TempoLivre";
		$fdata["FullName"]= "TempoLivre";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel__Disponibilidade_Agente["TempoLivre"]=$fdata;

	
$tables_data["Rel. Disponibilidade Agente"]=&$tdataRel__Disponibilidade_Agente;
$field_labels["Rel__Disponibilidade_Agente"] = &$fieldLabelsRel__Disponibilidade_Agente;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Disponibilidade Agente"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Disponibilidade Agente"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto504=array();
$proto504["m_strHead"] = "SELECT";
$proto504["m_strFieldList"] = "Data,  agente,  Fila,  Logon,  Logout,  TempoDisponivel,  TempoPausaNProdutiva,  TempoPausaProdutiva,  TempoPausa,  TempoAtendimento,  TempoLivre";
$proto504["m_strFrom"] = "FROM v_rel_disp_agente";
$proto504["m_strWhere"] = "(agente is not null)";
$proto504["m_strOrderBy"] = "ORDER BY `Data`, Logon";
$proto504["m_strTail"] = "";
$proto505=array();
$proto505["m_sql"] = "agente is not null";
$proto505["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_disp_agente"
));

$proto505["m_column"]=$obj;
$proto505["m_contained"] = array();
$proto505["m_strCase"] = "is not null";
$proto505["m_havingmode"] = "0";
$proto505["m_inBrackets"] = "0";
$proto505["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto505);

$proto504["m_where"] = $obj;
$proto507=array();
$proto507["m_sql"] = "";
$proto507["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto507["m_column"]=$obj;
$proto507["m_contained"] = array();
$proto507["m_strCase"] = "";
$proto507["m_havingmode"] = "0";
$proto507["m_inBrackets"] = "0";
$proto507["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto507);

$proto504["m_having"] = $obj;
$proto504["m_fieldlist"] = array();
						$proto509=array();
			$obj = new SQLField(array(
	"m_strName" => "Data",
	"m_strTable" => "v_rel_disp_agente"
));

$proto509["m_expr"]=$obj;
$proto509["m_alias"] = "";
$obj = new SQLFieldListItem($proto509);

$proto504["m_fieldlist"][]=$obj;
						$proto511=array();
			$obj = new SQLField(array(
	"m_strName" => "agente",
	"m_strTable" => "v_rel_disp_agente"
));

$proto511["m_expr"]=$obj;
$proto511["m_alias"] = "";
$obj = new SQLFieldListItem($proto511);

$proto504["m_fieldlist"][]=$obj;
						$proto513=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_rel_disp_agente"
));

$proto513["m_expr"]=$obj;
$proto513["m_alias"] = "";
$obj = new SQLFieldListItem($proto513);

$proto504["m_fieldlist"][]=$obj;
						$proto515=array();
			$obj = new SQLField(array(
	"m_strName" => "Logon",
	"m_strTable" => "v_rel_disp_agente"
));

$proto515["m_expr"]=$obj;
$proto515["m_alias"] = "";
$obj = new SQLFieldListItem($proto515);

$proto504["m_fieldlist"][]=$obj;
						$proto517=array();
			$obj = new SQLField(array(
	"m_strName" => "Logout",
	"m_strTable" => "v_rel_disp_agente"
));

$proto517["m_expr"]=$obj;
$proto517["m_alias"] = "";
$obj = new SQLFieldListItem($proto517);

$proto504["m_fieldlist"][]=$obj;
						$proto519=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoDisponivel",
	"m_strTable" => "v_rel_disp_agente"
));

$proto519["m_expr"]=$obj;
$proto519["m_alias"] = "";
$obj = new SQLFieldListItem($proto519);

$proto504["m_fieldlist"][]=$obj;
						$proto521=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoPausaNProdutiva",
	"m_strTable" => "v_rel_disp_agente"
));

$proto521["m_expr"]=$obj;
$proto521["m_alias"] = "";
$obj = new SQLFieldListItem($proto521);

$proto504["m_fieldlist"][]=$obj;
						$proto523=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoPausaProdutiva",
	"m_strTable" => "v_rel_disp_agente"
));

$proto523["m_expr"]=$obj;
$proto523["m_alias"] = "";
$obj = new SQLFieldListItem($proto523);

$proto504["m_fieldlist"][]=$obj;
						$proto525=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoPausa",
	"m_strTable" => "v_rel_disp_agente"
));

$proto525["m_expr"]=$obj;
$proto525["m_alias"] = "";
$obj = new SQLFieldListItem($proto525);

$proto504["m_fieldlist"][]=$obj;
						$proto527=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoAtendimento",
	"m_strTable" => "v_rel_disp_agente"
));

$proto527["m_expr"]=$obj;
$proto527["m_alias"] = "";
$obj = new SQLFieldListItem($proto527);

$proto504["m_fieldlist"][]=$obj;
						$proto529=array();
			$obj = new SQLField(array(
	"m_strName" => "TempoLivre",
	"m_strTable" => "v_rel_disp_agente"
));

$proto529["m_expr"]=$obj;
$proto529["m_alias"] = "";
$obj = new SQLFieldListItem($proto529);

$proto504["m_fieldlist"][]=$obj;
$proto504["m_fromlist"] = array();
												$proto531=array();
$proto531["m_link"] = "SQLL_MAIN";
			$proto532=array();
$proto532["m_strName"] = "v_rel_disp_agente";
$proto532["m_columns"] = array();
$proto532["m_columns"][] = "Data";
$proto532["m_columns"][] = "agente";
$proto532["m_columns"][] = "Fila";
$proto532["m_columns"][] = "Logon";
$proto532["m_columns"][] = "Logout";
$proto532["m_columns"][] = "TempoDisponivel";
$proto532["m_columns"][] = "TempoPausaNProdutiva";
$proto532["m_columns"][] = "TempoPausaProdutiva";
$proto532["m_columns"][] = "TempoPausa";
$proto532["m_columns"][] = "TempoAtendimento";
$proto532["m_columns"][] = "TempoLivre";
$obj = new SQLTable($proto532);

$proto531["m_table"] = $obj;
$proto531["m_alias"] = "";
$proto533=array();
$proto533["m_sql"] = "";
$proto533["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto533["m_column"]=$obj;
$proto533["m_contained"] = array();
$proto533["m_strCase"] = "";
$proto533["m_havingmode"] = "0";
$proto533["m_inBrackets"] = "0";
$proto533["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto533);

$proto531["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto531);

$proto504["m_fromlist"][]=$obj;
$proto504["m_groupby"] = array();
$proto504["m_orderby"] = array();
												$proto535=array();
						$obj = new SQLField(array(
	"m_strName" => "Data",
	"m_strTable" => "v_rel_disp_agente"
));

$proto535["m_column"]=$obj;
$proto535["m_bAsc"] = 1;
$proto535["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto535);

$proto504["m_orderby"][]=$obj;					
												$proto537=array();
						$obj = new SQLField(array(
	"m_strName" => "Logon",
	"m_strTable" => "v_rel_disp_agente"
));

$proto537["m_column"]=$obj;
$proto537["m_bAsc"] = 1;
$proto537["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto537);

$proto504["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto504);

$queryData_Rel__Disponibilidade_Agente = $obj;
$tdataRel__Disponibilidade_Agente[".sqlquery"] = $queryData_Rel__Disponibilidade_Agente;



?>
