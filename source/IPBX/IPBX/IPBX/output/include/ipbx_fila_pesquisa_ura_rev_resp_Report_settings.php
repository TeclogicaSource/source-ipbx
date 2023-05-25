<?php

//	field labels
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report = array();
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["id_resp_pesq"] = "Id Resp Pesq";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["dsc_pesquisa"] = "Nome Pesquisa";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["dsc_mensagem"] = "Pergunta";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["nm_telefone"] = "Telefone";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["id_cliente"] = "Ticket do Cliente";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["resp_usuario"] = "Resposta Numérica";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["dt_resp"] = "Data da Resposta";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["id_pesquisa"] = "Id Pesquisa";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["nr_ordem"] = "Nr Ordem";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["txt_resp"] = "Texto da Resposta ";
$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report["Portuguese(Brazil)"]["dt_criado"] = "Data Ocorrencia";


$tdataipbx_fila_pesquisa_ura_rev_resp_Report=array();
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".NumberOfChars"]=80; 
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".ShortName"]="ipbx_fila_pesquisa_ura_rev_resp_Report";
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".OwnerID"]="";
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".OriginalTable"]="ipbx_fila_pesquisa_ura_rev_resp";
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".NCSearch"]=true;
	

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".shortTableName"] = "ipbx_fila_pesquisa_ura_rev_resp_Report";
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".dataSourceTable"] = "Rel. Pesquisa Reversa";
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".nSecOptions"] = 0;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".nLoginMethod"] = 1;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".recsPerRowList"] = 1;	
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".tableGroupBy"] = "0";
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".dbType"] = 0;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".mainTableOwnerID"] = "";
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".moveNext"] = 1;

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".listAjax"] = false;

	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".audit"] = false;

	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".locking"] = false;
	
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".listIcons"] = true;

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".exportTo"] = true;

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".printFriendly"] = true;


$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".showSimpleSearchOptions"] = false;

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".showSearchPanel"] = true;


$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseAjaxSuggest"] = true;


$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".arrKeyFields"][] = "id_resp_pesq";

// use datepicker for search panel
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseTimeForSearch"] = false;





$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseInlineJs"] = $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseInlineAdd"] || $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isUseInlineEdit"];

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"] = array();

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "dsc_pesquisa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_pesquisa", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "dsc_pesquisa";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "dsc_mensagem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_mensagem", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "dsc_mensagem";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "nm_telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_telefone", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "nm_telefone";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "id_cliente";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id_cliente", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "id_cliente";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "resp_usuario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("resp_usuario", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "resp_usuario";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "dt_resp";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_resp", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "dt_resp";	
}
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".globSearchFields"][] = "txt_resp";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("txt_resp", $tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"]))
{
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".allSearchFields"][] = "txt_resp";	
}


$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isDynamicPerm"] = true;

	

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isDisplayLoading"] = true;

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".isResizeColumns"] = false;


$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".createLoginPage"] = true;


 	

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".noRecordsFirstPage"] = true;




$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".orderindexes"] = array();

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlHead"] = "SELECT id_resp_pesq,   dt_criado,   dsc_pesquisa,   dsc_mensagem,   nm_telefone,   id_cliente,   resp_usuario,   dt_resp,   id_pesquisa,   nr_ordem,   txt_resp";

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlFrom"] = "FROM ipbx_fila_pesquisa_ura_rev_resp";

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlWhereExpr"] = "";

$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_resp_pesq";
	$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".Keys"]=$tableKeys;

	
//	id_resp_pesq
	$fdata = array();
	$fdata["strName"] = "id_resp_pesq";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Id Resp Pesq"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_resp_pesq";
		$fdata["FullName"]= "id_resp_pesq";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
									$tdataipbx_fila_pesquisa_ura_rev_resp_Report["id_resp_pesq"]=$fdata;
	
//	dt_criado
	$fdata = array();
	$fdata["strName"] = "dt_criado";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Data Ocorrencia"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_criado";
		$fdata["FullName"]= "dt_criado";
						$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["dt_criado"]=$fdata;
	
//	dsc_pesquisa
	$fdata = array();
	$fdata["strName"] = "dsc_pesquisa";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Nome Pesquisa"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_pesquisa";
		$fdata["FullName"]= "dsc_pesquisa";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["dsc_pesquisa"]=$fdata;
	
//	dsc_mensagem
	$fdata = array();
	$fdata["strName"] = "dsc_mensagem";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Pergunta"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_mensagem";
		$fdata["FullName"]= "dsc_mensagem";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["dsc_mensagem"]=$fdata;
	
//	nm_telefone
	$fdata = array();
	$fdata["strName"] = "nm_telefone";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Telefone"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_telefone";
		$fdata["FullName"]= "nm_telefone";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["nm_telefone"]=$fdata;
	
//	id_cliente
	$fdata = array();
	$fdata["strName"] = "id_cliente";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Ticket do Cliente"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_cliente";
		$fdata["FullName"]= "id_cliente";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["id_cliente"]=$fdata;
	
//	resp_usuario
	$fdata = array();
	$fdata["strName"] = "resp_usuario";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Resposta Numérica"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "resp_usuario";
		$fdata["FullName"]= "resp_usuario";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["resp_usuario"]=$fdata;
	
//	dt_resp
	$fdata = array();
	$fdata["strName"] = "dt_resp";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Data da Resposta"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_resp";
		$fdata["FullName"]= "dt_resp";
						$fdata["Index"]= 8;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["dt_resp"]=$fdata;
	
//	id_pesquisa
	$fdata = array();
	$fdata["strName"] = "id_pesquisa";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Id Pesquisa"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_pesquisa";
		$fdata["FullName"]= "id_pesquisa";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
									$tdataipbx_fila_pesquisa_ura_rev_resp_Report["id_pesquisa"]=$fdata;
	
//	nr_ordem
	$fdata = array();
	$fdata["strName"] = "nr_ordem";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Nr Ordem"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nr_ordem";
		$fdata["FullName"]= "nr_ordem";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
									$tdataipbx_fila_pesquisa_ura_rev_resp_Report["nr_ordem"]=$fdata;
	
//	txt_resp
	$fdata = array();
	$fdata["strName"] = "txt_resp";
	$fdata["ownerTable"] = "ipbx_fila_pesquisa_ura_rev_resp";
		$fdata["Label"]="Texto da Resposta "; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "txt_resp";
		$fdata["FullName"]= "txt_resp";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=100";
		
				$fdata["FieldPermissions"]=true;
						$tdataipbx_fila_pesquisa_ura_rev_resp_Report["txt_resp"]=$fdata;

	
$tables_data["Rel. Pesquisa Reversa"]=&$tdataipbx_fila_pesquisa_ura_rev_resp_Report;
$field_labels["Rel__Pesquisa_Reversa"] = &$fieldLabelsipbx_fila_pesquisa_ura_rev_resp_Report;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Pesquisa Reversa"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Pesquisa Reversa"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto834=array();
$proto834["m_strHead"] = "SELECT";
$proto834["m_strFieldList"] = "id_resp_pesq,   dt_criado,   dsc_pesquisa,   dsc_mensagem,   nm_telefone,   id_cliente,   resp_usuario,   dt_resp,   id_pesquisa,   nr_ordem,   txt_resp";
$proto834["m_strFrom"] = "FROM ipbx_fila_pesquisa_ura_rev_resp";
$proto834["m_strWhere"] = "";
$proto834["m_strOrderBy"] = "";
$proto834["m_strTail"] = "";
$proto835=array();
$proto835["m_sql"] = "";
$proto835["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto835["m_column"]=$obj;
$proto835["m_contained"] = array();
$proto835["m_strCase"] = "";
$proto835["m_havingmode"] = "0";
$proto835["m_inBrackets"] = "0";
$proto835["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto835);

$proto834["m_where"] = $obj;
$proto837=array();
$proto837["m_sql"] = "";
$proto837["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto837["m_column"]=$obj;
$proto837["m_contained"] = array();
$proto837["m_strCase"] = "";
$proto837["m_havingmode"] = "0";
$proto837["m_inBrackets"] = "0";
$proto837["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto837);

$proto834["m_having"] = $obj;
$proto834["m_fieldlist"] = array();
						$proto839=array();
			$obj = new SQLField(array(
	"m_strName" => "id_resp_pesq",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto839["m_expr"]=$obj;
$proto839["m_alias"] = "";
$obj = new SQLFieldListItem($proto839);

$proto834["m_fieldlist"][]=$obj;
						$proto841=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_criado",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto841["m_expr"]=$obj;
$proto841["m_alias"] = "";
$obj = new SQLFieldListItem($proto841);

$proto834["m_fieldlist"][]=$obj;
						$proto843=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_pesquisa",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto843["m_expr"]=$obj;
$proto843["m_alias"] = "";
$obj = new SQLFieldListItem($proto843);

$proto834["m_fieldlist"][]=$obj;
						$proto845=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_mensagem",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto845["m_expr"]=$obj;
$proto845["m_alias"] = "";
$obj = new SQLFieldListItem($proto845);

$proto834["m_fieldlist"][]=$obj;
						$proto847=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_telefone",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto847["m_expr"]=$obj;
$proto847["m_alias"] = "";
$obj = new SQLFieldListItem($proto847);

$proto834["m_fieldlist"][]=$obj;
						$proto849=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cliente",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto849["m_expr"]=$obj;
$proto849["m_alias"] = "";
$obj = new SQLFieldListItem($proto849);

$proto834["m_fieldlist"][]=$obj;
						$proto851=array();
			$obj = new SQLField(array(
	"m_strName" => "resp_usuario",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto851["m_expr"]=$obj;
$proto851["m_alias"] = "";
$obj = new SQLFieldListItem($proto851);

$proto834["m_fieldlist"][]=$obj;
						$proto853=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_resp",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto853["m_expr"]=$obj;
$proto853["m_alias"] = "";
$obj = new SQLFieldListItem($proto853);

$proto834["m_fieldlist"][]=$obj;
						$proto855=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto855["m_expr"]=$obj;
$proto855["m_alias"] = "";
$obj = new SQLFieldListItem($proto855);

$proto834["m_fieldlist"][]=$obj;
						$proto857=array();
			$obj = new SQLField(array(
	"m_strName" => "nr_ordem",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto857["m_expr"]=$obj;
$proto857["m_alias"] = "";
$obj = new SQLFieldListItem($proto857);

$proto834["m_fieldlist"][]=$obj;
						$proto859=array();
			$obj = new SQLField(array(
	"m_strName" => "txt_resp",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto859["m_expr"]=$obj;
$proto859["m_alias"] = "";
$obj = new SQLFieldListItem($proto859);

$proto834["m_fieldlist"][]=$obj;
$proto834["m_fromlist"] = array();
												$proto861=array();
$proto861["m_link"] = "SQLL_MAIN";
			$proto862=array();
$proto862["m_strName"] = "ipbx_fila_pesquisa_ura_rev_resp";
$proto862["m_columns"] = array();
$proto862["m_columns"][] = "id_resp_pesq";
$proto862["m_columns"][] = "dt_criado";
$proto862["m_columns"][] = "dsc_pesquisa";
$proto862["m_columns"][] = "dsc_mensagem";
$proto862["m_columns"][] = "nm_telefone";
$proto862["m_columns"][] = "id_cliente";
$proto862["m_columns"][] = "resp_usuario";
$proto862["m_columns"][] = "dt_resp";
$proto862["m_columns"][] = "id_pesquisa";
$proto862["m_columns"][] = "nr_ordem";
$proto862["m_columns"][] = "txt_resp";
$obj = new SQLTable($proto862);

$proto861["m_table"] = $obj;
$proto861["m_alias"] = "";
$proto863=array();
$proto863["m_sql"] = "";
$proto863["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto863["m_column"]=$obj;
$proto863["m_contained"] = array();
$proto863["m_strCase"] = "";
$proto863["m_havingmode"] = "0";
$proto863["m_inBrackets"] = "0";
$proto863["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto863);

$proto861["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto861);

$proto834["m_fromlist"][]=$obj;
$proto834["m_groupby"] = array();
$proto834["m_orderby"] = array();
$obj = new SQLQuery($proto834);

$queryData_ipbx_fila_pesquisa_ura_rev_resp_Report = $obj;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlquery"] = $queryData_ipbx_fila_pesquisa_ura_rev_resp_Report;



?>
