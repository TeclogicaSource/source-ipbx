<?php

//	field labels
$fieldLabelsRel__Pesquisa = array();
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["resp_usuario"] = "Resposta númerica";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["dt_resp"] = "Data e Hora";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["dsc_pesquisa"] = "Descrição";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["dsc_mensagem"] = "Pergunta";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["ipur_id_pesquisa"] = "Ipur.id Pesquisa";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["iurm_nr_ordem"] = "Iurm.nr Ordem";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["nm_telefone"] = "Telefone";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["nm_ramal"] = "Ramal";
$fieldLabelsRel__Pesquisa["Portuguese(Brazil)"]["Resposta"] = "Descrição da resposta";


$tdataRel__Pesquisa=array();
	$tdataRel__Pesquisa[".NumberOfChars"]=80; 
	$tdataRel__Pesquisa[".ShortName"]="Rel__Pesquisa";
	$tdataRel__Pesquisa[".OwnerID"]="";
	$tdataRel__Pesquisa[".OriginalTable"]="ipbx_ura_rev";
	$tdataRel__Pesquisa[".NCSearch"]=true;
	

$tdataRel__Pesquisa[".shortTableName"] = "Rel__Pesquisa";
$tdataRel__Pesquisa[".dataSourceTable"] = "Rel. Pesquisa";
$tdataRel__Pesquisa[".nSecOptions"] = 0;
$tdataRel__Pesquisa[".nLoginMethod"] = 1;
$tdataRel__Pesquisa[".recsPerRowList"] = 1;	
$tdataRel__Pesquisa[".tableGroupBy"] = "0";
$tdataRel__Pesquisa[".dbType"] = 0;
$tdataRel__Pesquisa[".mainTableOwnerID"] = "";
$tdataRel__Pesquisa[".moveNext"] = 1;

$tdataRel__Pesquisa[".listAjax"] = false;

	$tdataRel__Pesquisa[".audit"] = false;

	$tdataRel__Pesquisa[".locking"] = false;
	
$tdataRel__Pesquisa[".listIcons"] = true;

$tdataRel__Pesquisa[".exportTo"] = true;

$tdataRel__Pesquisa[".printFriendly"] = true;


$tdataRel__Pesquisa[".showSimpleSearchOptions"] = false;

$tdataRel__Pesquisa[".showSearchPanel"] = true;


$tdataRel__Pesquisa[".isUseAjaxSuggest"] = true;


$tdataRel__Pesquisa[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Pesquisa[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Pesquisa[".isUseTimeForSearch"] = false;





$tdataRel__Pesquisa[".isUseInlineJs"] = $tdataRel__Pesquisa[".isUseInlineAdd"] || $tdataRel__Pesquisa[".isUseInlineEdit"];

$tdataRel__Pesquisa[".allSearchFields"] = array();

$tdataRel__Pesquisa[".globSearchFields"][] = "dsc_pesquisa";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_pesquisa", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "dsc_pesquisa";	
}
$tdataRel__Pesquisa[".globSearchFields"][] = "dsc_mensagem";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dsc_mensagem", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "dsc_mensagem";	
}
$tdataRel__Pesquisa[".globSearchFields"][] = "nm_telefone";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_telefone", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "nm_telefone";	
}
$tdataRel__Pesquisa[".globSearchFields"][] = "nm_ramal";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("nm_ramal", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "nm_ramal";	
}
$tdataRel__Pesquisa[".globSearchFields"][] = "resp_usuario";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("resp_usuario", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "resp_usuario";	
}
$tdataRel__Pesquisa[".globSearchFields"][] = "dt_resp";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_resp", $tdataRel__Pesquisa[".allSearchFields"]))
{
	$tdataRel__Pesquisa[".allSearchFields"][] = "dt_resp";	
}


$tdataRel__Pesquisa[".isDynamicPerm"] = true;

	

$tdataRel__Pesquisa[".isDisplayLoading"] = true;

$tdataRel__Pesquisa[".isResizeColumns"] = false;


$tdataRel__Pesquisa[".createLoginPage"] = true;


 	





$gstrOrderBy = "ORDER BY ipur.id_pesquisa, iur.dt_resp, iurm.nr_ordem";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Pesquisa[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Pesquisa[".orderindexes"] = array();
$tdataRel__Pesquisa[".orderindexes"][] = array(7, (1 ? "ASC" : "DESC"), "ipur.id_pesquisa");
$tdataRel__Pesquisa[".orderindexes"][] = array(6, (1 ? "ASC" : "DESC"), "iur.dt_resp");
$tdataRel__Pesquisa[".orderindexes"][] = array(8, (1 ? "ASC" : "DESC"), "iurm.nr_ordem");

$tdataRel__Pesquisa[".sqlHead"] = "select ipur.dsc_pesquisa,  iurm.dsc_mensagem,  iur.nm_telefone,  iur.nm_ramal,  iur.resp_usuario,  iur.dt_resp,  ipur.id_pesquisa AS `ipur.id_pesquisa`,  iurm.nr_ordem AS `iurm.nr_ordem`,  case iur.resp_usuario  when 0 then iurm.ref0  when 1 then iurm.ref1  when 2 then iurm.ref2  when 3 then iurm.ref3  when 4 then iurm.ref4  when 5 then iurm.ref5  when 6 then iurm.ref6  when 7 then iurm.ref7  when 8 then iurm.ref8  when 9 then iurm.ref9  end as Resposta";

$tdataRel__Pesquisa[".sqlFrom"] = "FROM ipbx_ura_rev_msg AS iurm,  ipbx_pesquisa_ura_rev AS ipur,  ipbx_ura_rev AS iur";

$tdataRel__Pesquisa[".sqlWhereExpr"] = "(iurm.id_ipbx_ura_rev_msg = iur.id_msg) AND (iurm.id_pesquisa = ipur.id_pesquisa)";

$tdataRel__Pesquisa[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Pesquisa[".Keys"]=$tableKeys;

	
//	dsc_pesquisa
	$fdata = array();
	$fdata["strName"] = "dsc_pesquisa";
	$fdata["ownerTable"] = "ipbx_pesquisa_ura_rev";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_pesquisa";
		$fdata["FullName"]= "ipur.dsc_pesquisa";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["dsc_pesquisa"]=$fdata;
	
//	dsc_mensagem
	$fdata = array();
	$fdata["strName"] = "dsc_mensagem";
	$fdata["ownerTable"] = "ipbx_ura_rev_msg";
		$fdata["Label"]="Pergunta"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_mensagem";
		$fdata["FullName"]= "iurm.dsc_mensagem";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["dsc_mensagem"]=$fdata;
	
//	nm_telefone
	$fdata = array();
	$fdata["strName"] = "nm_telefone";
	$fdata["ownerTable"] = "ipbx_ura_rev";
		$fdata["Label"]="Telefone"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_telefone";
		$fdata["FullName"]= "iur.nm_telefone";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["nm_telefone"]=$fdata;
	
//	nm_ramal
	$fdata = array();
	$fdata["strName"] = "nm_ramal";
	$fdata["ownerTable"] = "ipbx_ura_rev";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="concat(name,'-',callerid)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="name";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_ramal";
		$fdata["FullName"]= "iur.nm_ramal";
						$fdata["Index"]= 4;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["nm_ramal"]=$fdata;
	
//	resp_usuario
	$fdata = array();
	$fdata["strName"] = "resp_usuario";
	$fdata["ownerTable"] = "ipbx_ura_rev";
		$fdata["Label"]="Resposta númerica"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "resp_usuario";
		$fdata["FullName"]= "iur.resp_usuario";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["resp_usuario"]=$fdata;
	
//	dt_resp
	$fdata = array();
	$fdata["strName"] = "dt_resp";
	$fdata["ownerTable"] = "ipbx_ura_rev";
		$fdata["Label"]="Data e Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_resp";
		$fdata["FullName"]= "iur.dt_resp";
						$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["dt_resp"]=$fdata;
	
//	ipur.id_pesquisa
	$fdata = array();
	$fdata["strName"] = "ipur.id_pesquisa";
	$fdata["ownerTable"] = "ipbx_pesquisa_ura_rev";
		$fdata["Label"]="Ipur.id Pesquisa"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ipur_id_pesquisa";
		$fdata["FullName"]= "ipur.id_pesquisa";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Pesquisa["ipur.id_pesquisa"]=$fdata;
	
//	iurm.nr_ordem
	$fdata = array();
	$fdata["strName"] = "iurm.nr_ordem";
	$fdata["ownerTable"] = "ipbx_ura_rev_msg";
		$fdata["Label"]="Iurm.nr Ordem"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "iurm_nr_ordem";
		$fdata["FullName"]= "iurm.nr_ordem";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
									$tdataRel__Pesquisa["iurm.nr_ordem"]=$fdata;
	
//	Resposta
	$fdata = array();
	$fdata["strName"] = "Resposta";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Descrição da resposta"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Resposta";
		$fdata["FullName"]= "case iur.resp_usuario  when 0 then iurm.ref0  when 1 then iurm.ref1  when 2 then iurm.ref2  when 3 then iurm.ref3  when 4 then iurm.ref4  when 5 then iurm.ref5  when 6 then iurm.ref6  when 7 then iurm.ref7  when 8 then iurm.ref8  when 9 then iurm.ref9  end";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Pesquisa["Resposta"]=$fdata;

	
$tables_data["Rel. Pesquisa"]=&$tdataRel__Pesquisa;
$field_labels["Rel__Pesquisa"] = &$fieldLabelsRel__Pesquisa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Pesquisa"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Pesquisa"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto396=array();
$proto396["m_strHead"] = "select";
$proto396["m_strFieldList"] = "ipur.dsc_pesquisa,  iurm.dsc_mensagem,  iur.nm_telefone,  iur.nm_ramal,  iur.resp_usuario,  iur.dt_resp,  ipur.id_pesquisa AS `ipur.id_pesquisa`,  iurm.nr_ordem AS `iurm.nr_ordem`,  case iur.resp_usuario  when 0 then iurm.ref0  when 1 then iurm.ref1  when 2 then iurm.ref2  when 3 then iurm.ref3  when 4 then iurm.ref4  when 5 then iurm.ref5  when 6 then iurm.ref6  when 7 then iurm.ref7  when 8 then iurm.ref8  when 9 then iurm.ref9  end as Resposta";
$proto396["m_strFrom"] = "FROM ipbx_ura_rev_msg AS iurm,  ipbx_pesquisa_ura_rev AS ipur,  ipbx_ura_rev AS iur";
$proto396["m_strWhere"] = "(iurm.id_ipbx_ura_rev_msg = iur.id_msg) AND (iurm.id_pesquisa = ipur.id_pesquisa)";
$proto396["m_strOrderBy"] = "ORDER BY ipur.id_pesquisa, iur.dt_resp, iurm.nr_ordem";
$proto396["m_strTail"] = "";
$proto397=array();
$proto397["m_sql"] = "(iurm.id_ipbx_ura_rev_msg = iur.id_msg) AND (iurm.id_pesquisa = ipur.id_pesquisa)";
$proto397["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(iurm.id_ipbx_ura_rev_msg = iur.id_msg) AND (iurm.id_pesquisa = ipur.id_pesquisa)"
));

$proto397["m_column"]=$obj;
$proto397["m_contained"] = array();
						$proto399=array();
$proto399["m_sql"] = "iurm.id_ipbx_ura_rev_msg = iur.id_msg";
$proto399["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_ipbx_ura_rev_msg",
	"m_strTable" => "iurm"
));

$proto399["m_column"]=$obj;
$proto399["m_contained"] = array();
$proto399["m_strCase"] = "= iur.id_msg";
$proto399["m_havingmode"] = "0";
$proto399["m_inBrackets"] = "1";
$proto399["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto399);

			$proto397["m_contained"][]=$obj;
						$proto401=array();
$proto401["m_sql"] = "iurm.id_pesquisa = ipur.id_pesquisa";
$proto401["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "iurm"
));

$proto401["m_column"]=$obj;
$proto401["m_contained"] = array();
$proto401["m_strCase"] = "= ipur.id_pesquisa";
$proto401["m_havingmode"] = "0";
$proto401["m_inBrackets"] = "1";
$proto401["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto401);

			$proto397["m_contained"][]=$obj;
$proto397["m_strCase"] = "";
$proto397["m_havingmode"] = "0";
$proto397["m_inBrackets"] = "0";
$proto397["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto397);

$proto396["m_where"] = $obj;
$proto403=array();
$proto403["m_sql"] = "";
$proto403["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto403["m_column"]=$obj;
$proto403["m_contained"] = array();
$proto403["m_strCase"] = "";
$proto403["m_havingmode"] = "0";
$proto403["m_inBrackets"] = "0";
$proto403["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto403);

$proto396["m_having"] = $obj;
$proto396["m_fieldlist"] = array();
						$proto405=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_pesquisa",
	"m_strTable" => "ipur"
));

$proto405["m_expr"]=$obj;
$proto405["m_alias"] = "";
$obj = new SQLFieldListItem($proto405);

$proto396["m_fieldlist"][]=$obj;
						$proto407=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_mensagem",
	"m_strTable" => "iurm"
));

$proto407["m_expr"]=$obj;
$proto407["m_alias"] = "";
$obj = new SQLFieldListItem($proto407);

$proto396["m_fieldlist"][]=$obj;
						$proto409=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_telefone",
	"m_strTable" => "iur"
));

$proto409["m_expr"]=$obj;
$proto409["m_alias"] = "";
$obj = new SQLFieldListItem($proto409);

$proto396["m_fieldlist"][]=$obj;
						$proto411=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_ramal",
	"m_strTable" => "iur"
));

$proto411["m_expr"]=$obj;
$proto411["m_alias"] = "";
$obj = new SQLFieldListItem($proto411);

$proto396["m_fieldlist"][]=$obj;
						$proto413=array();
			$obj = new SQLField(array(
	"m_strName" => "resp_usuario",
	"m_strTable" => "iur"
));

$proto413["m_expr"]=$obj;
$proto413["m_alias"] = "";
$obj = new SQLFieldListItem($proto413);

$proto396["m_fieldlist"][]=$obj;
						$proto415=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_resp",
	"m_strTable" => "iur"
));

$proto415["m_expr"]=$obj;
$proto415["m_alias"] = "";
$obj = new SQLFieldListItem($proto415);

$proto396["m_fieldlist"][]=$obj;
						$proto417=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipur"
));

$proto417["m_expr"]=$obj;
$proto417["m_alias"] = "ipur.id_pesquisa";
$obj = new SQLFieldListItem($proto417);

$proto396["m_fieldlist"][]=$obj;
						$proto419=array();
			$obj = new SQLField(array(
	"m_strName" => "nr_ordem",
	"m_strTable" => "iurm"
));

$proto419["m_expr"]=$obj;
$proto419["m_alias"] = "iurm.nr_ordem";
$obj = new SQLFieldListItem($proto419);

$proto396["m_fieldlist"][]=$obj;
						$proto421=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case iur.resp_usuario  when 0 then iurm.ref0  when 1 then iurm.ref1  when 2 then iurm.ref2  when 3 then iurm.ref3  when 4 then iurm.ref4  when 5 then iurm.ref5  when 6 then iurm.ref6  when 7 then iurm.ref7  when 8 then iurm.ref8  when 9 then iurm.ref9  end"
));

$proto421["m_expr"]=$obj;
$proto421["m_alias"] = "Resposta";
$obj = new SQLFieldListItem($proto421);

$proto396["m_fieldlist"][]=$obj;
$proto396["m_fromlist"] = array();
												$proto423=array();
$proto423["m_link"] = "SQLL_MAIN";
			$proto424=array();
$proto424["m_strName"] = "ipbx_ura_rev_msg";
$proto424["m_columns"] = array();
$proto424["m_columns"][] = "id_ipbx_ura_rev_msg";
$proto424["m_columns"][] = "arq_audio";
$proto424["m_columns"][] = "opc_resp";
$proto424["m_columns"][] = "dsc_mensagem";
$proto424["m_columns"][] = "id_pesquisa";
$proto424["m_columns"][] = "ref0";
$proto424["m_columns"][] = "ref1";
$proto424["m_columns"][] = "ref3";
$proto424["m_columns"][] = "ref4";
$proto424["m_columns"][] = "ref5";
$proto424["m_columns"][] = "ref6";
$proto424["m_columns"][] = "ref7";
$proto424["m_columns"][] = "ref8";
$proto424["m_columns"][] = "ref9";
$proto424["m_columns"][] = "ref2";
$proto424["m_columns"][] = "nr_ordem";
$obj = new SQLTable($proto424);

$proto423["m_table"] = $obj;
$proto423["m_alias"] = "iurm";
$proto425=array();
$proto425["m_sql"] = "";
$proto425["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto425["m_column"]=$obj;
$proto425["m_contained"] = array();
$proto425["m_strCase"] = "";
$proto425["m_havingmode"] = "0";
$proto425["m_inBrackets"] = "0";
$proto425["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto425);

$proto423["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto423);

$proto396["m_fromlist"][]=$obj;
												$proto427=array();
$proto427["m_link"] = "SQLL_CROSSJOIN";
			$proto428=array();
$proto428["m_strName"] = "ipbx_pesquisa_ura_rev";
$proto428["m_columns"] = array();
$proto428["m_columns"][] = "id_pesquisa";
$proto428["m_columns"][] = "dsc_pesquisa";
$proto428["m_columns"][] = "arq_audio";
$obj = new SQLTable($proto428);

$proto427["m_table"] = $obj;
$proto427["m_alias"] = "ipur";
$proto429=array();
$proto429["m_sql"] = "";
$proto429["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto429["m_column"]=$obj;
$proto429["m_contained"] = array();
$proto429["m_strCase"] = "";
$proto429["m_havingmode"] = "0";
$proto429["m_inBrackets"] = "0";
$proto429["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto429);

$proto427["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto427);

$proto396["m_fromlist"][]=$obj;
												$proto431=array();
$proto431["m_link"] = "SQLL_CROSSJOIN";
			$proto432=array();
$proto432["m_strName"] = "ipbx_ura_rev";
$proto432["m_columns"] = array();
$proto432["m_columns"][] = "id_ura_rev";
$proto432["m_columns"][] = "nm_telefone";
$proto432["m_columns"][] = "id_msg";
$proto432["m_columns"][] = "dt_criado";
$proto432["m_columns"][] = "nm_tentativas";
$proto432["m_columns"][] = "ult_status";
$proto432["m_columns"][] = "resp_usuario";
$proto432["m_columns"][] = "dt_resp";
$proto432["m_columns"][] = "id_cliente";
$proto432["m_columns"][] = "flg_proc";
$proto432["m_columns"][] = "nm_ramal";
$obj = new SQLTable($proto432);

$proto431["m_table"] = $obj;
$proto431["m_alias"] = "iur";
$proto433=array();
$proto433["m_sql"] = "";
$proto433["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto433["m_column"]=$obj;
$proto433["m_contained"] = array();
$proto433["m_strCase"] = "";
$proto433["m_havingmode"] = "0";
$proto433["m_inBrackets"] = "0";
$proto433["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto433);

$proto431["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto431);

$proto396["m_fromlist"][]=$obj;
$proto396["m_groupby"] = array();
$proto396["m_orderby"] = array();
												$proto435=array();
						$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipur"
));

$proto435["m_column"]=$obj;
$proto435["m_bAsc"] = 1;
$proto435["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto435);

$proto396["m_orderby"][]=$obj;					
												$proto437=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_resp",
	"m_strTable" => "iur"
));

$proto437["m_column"]=$obj;
$proto437["m_bAsc"] = 1;
$proto437["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto437);

$proto396["m_orderby"][]=$obj;					
												$proto439=array();
						$obj = new SQLField(array(
	"m_strName" => "nr_ordem",
	"m_strTable" => "iurm"
));

$proto439["m_column"]=$obj;
$proto439["m_bAsc"] = 1;
$proto439["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto439);

$proto396["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto396);

$queryData_Rel__Pesquisa = $obj;
$tdataRel__Pesquisa[".sqlquery"] = $queryData_Rel__Pesquisa;



?>
