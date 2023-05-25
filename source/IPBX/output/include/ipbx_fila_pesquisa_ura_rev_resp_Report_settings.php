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










$proto1028=array();
$proto1028["m_strHead"] = "SELECT";
$proto1028["m_strFieldList"] = "id_resp_pesq,   dt_criado,   dsc_pesquisa,   dsc_mensagem,   nm_telefone,   id_cliente,   resp_usuario,   dt_resp,   id_pesquisa,   nr_ordem,   txt_resp";
$proto1028["m_strFrom"] = "FROM ipbx_fila_pesquisa_ura_rev_resp";
$proto1028["m_strWhere"] = "";
$proto1028["m_strOrderBy"] = "";
$proto1028["m_strTail"] = "";
$proto1029=array();
$proto1029["m_sql"] = "";
$proto1029["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1029["m_column"]=$obj;
$proto1029["m_contained"] = array();
$proto1029["m_strCase"] = "";
$proto1029["m_havingmode"] = "0";
$proto1029["m_inBrackets"] = "0";
$proto1029["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1029);

$proto1028["m_where"] = $obj;
$proto1031=array();
$proto1031["m_sql"] = "";
$proto1031["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1031["m_column"]=$obj;
$proto1031["m_contained"] = array();
$proto1031["m_strCase"] = "";
$proto1031["m_havingmode"] = "0";
$proto1031["m_inBrackets"] = "0";
$proto1031["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1031);

$proto1028["m_having"] = $obj;
$proto1028["m_fieldlist"] = array();
						$proto1033=array();
			$obj = new SQLField(array(
	"m_strName" => "id_resp_pesq",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1033["m_expr"]=$obj;
$proto1033["m_alias"] = "";
$obj = new SQLFieldListItem($proto1033);

$proto1028["m_fieldlist"][]=$obj;
						$proto1035=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_criado",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1035["m_expr"]=$obj;
$proto1035["m_alias"] = "";
$obj = new SQLFieldListItem($proto1035);

$proto1028["m_fieldlist"][]=$obj;
						$proto1037=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_pesquisa",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1037["m_expr"]=$obj;
$proto1037["m_alias"] = "";
$obj = new SQLFieldListItem($proto1037);

$proto1028["m_fieldlist"][]=$obj;
						$proto1039=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_mensagem",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1039["m_expr"]=$obj;
$proto1039["m_alias"] = "";
$obj = new SQLFieldListItem($proto1039);

$proto1028["m_fieldlist"][]=$obj;
						$proto1041=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_telefone",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1041["m_expr"]=$obj;
$proto1041["m_alias"] = "";
$obj = new SQLFieldListItem($proto1041);

$proto1028["m_fieldlist"][]=$obj;
						$proto1043=array();
			$obj = new SQLField(array(
	"m_strName" => "id_cliente",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1043["m_expr"]=$obj;
$proto1043["m_alias"] = "";
$obj = new SQLFieldListItem($proto1043);

$proto1028["m_fieldlist"][]=$obj;
						$proto1045=array();
			$obj = new SQLField(array(
	"m_strName" => "resp_usuario",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1045["m_expr"]=$obj;
$proto1045["m_alias"] = "";
$obj = new SQLFieldListItem($proto1045);

$proto1028["m_fieldlist"][]=$obj;
						$proto1047=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_resp",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1047["m_expr"]=$obj;
$proto1047["m_alias"] = "";
$obj = new SQLFieldListItem($proto1047);

$proto1028["m_fieldlist"][]=$obj;
						$proto1049=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1049["m_expr"]=$obj;
$proto1049["m_alias"] = "";
$obj = new SQLFieldListItem($proto1049);

$proto1028["m_fieldlist"][]=$obj;
						$proto1051=array();
			$obj = new SQLField(array(
	"m_strName" => "nr_ordem",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1051["m_expr"]=$obj;
$proto1051["m_alias"] = "";
$obj = new SQLFieldListItem($proto1051);

$proto1028["m_fieldlist"][]=$obj;
						$proto1053=array();
			$obj = new SQLField(array(
	"m_strName" => "txt_resp",
	"m_strTable" => "ipbx_fila_pesquisa_ura_rev_resp"
));

$proto1053["m_expr"]=$obj;
$proto1053["m_alias"] = "";
$obj = new SQLFieldListItem($proto1053);

$proto1028["m_fieldlist"][]=$obj;
$proto1028["m_fromlist"] = array();
												$proto1055=array();
$proto1055["m_link"] = "SQLL_MAIN";
			$proto1056=array();
$proto1056["m_strName"] = "ipbx_fila_pesquisa_ura_rev_resp";
$proto1056["m_columns"] = array();
$proto1056["m_columns"][] = "id_resp_pesq";
$proto1056["m_columns"][] = "dt_criado";
$proto1056["m_columns"][] = "dsc_pesquisa";
$proto1056["m_columns"][] = "dsc_mensagem";
$proto1056["m_columns"][] = "nm_telefone";
$proto1056["m_columns"][] = "id_cliente";
$proto1056["m_columns"][] = "resp_usuario";
$proto1056["m_columns"][] = "dt_resp";
$proto1056["m_columns"][] = "id_pesquisa";
$proto1056["m_columns"][] = "nr_ordem";
$proto1056["m_columns"][] = "txt_resp";
$obj = new SQLTable($proto1056);

$proto1055["m_table"] = $obj;
$proto1055["m_alias"] = "";
$proto1057=array();
$proto1057["m_sql"] = "";
$proto1057["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1057["m_column"]=$obj;
$proto1057["m_contained"] = array();
$proto1057["m_strCase"] = "";
$proto1057["m_havingmode"] = "0";
$proto1057["m_inBrackets"] = "0";
$proto1057["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1057);

$proto1055["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1055);

$proto1028["m_fromlist"][]=$obj;
$proto1028["m_groupby"] = array();
$proto1028["m_orderby"] = array();
$obj = new SQLQuery($proto1028);

$queryData_ipbx_fila_pesquisa_ura_rev_resp_Report = $obj;
$tdataipbx_fila_pesquisa_ura_rev_resp_Report[".sqlquery"] = $queryData_ipbx_fila_pesquisa_ura_rev_resp_Report;



?>
