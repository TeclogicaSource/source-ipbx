<?php

//	field labels
$fieldLabelsRel_Produtividade_da_Fila = array();
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]=array();
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["dt_entrada"] = "Data";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Receb_"] = "Qtd. Receb.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Atend_"] = "Qtd. Atentend.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Aband_"] = "Qtd. Aband.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["TME"] = "TME";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["TMA"] = "TMA";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["TMO"] = "TMO";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Aband_Contr_"] = "Abd.Cont.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Aband_Real_"] = "Abd.Real(%)";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoEsperaContratado"] = "Esp.Cont.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoEsperaRealizado"] = "Nív.Serv.Esp.(%)";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoAtendimentoContratado"] = "Atd.Cont.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoAtendimentoRealizado"] = "Nív.Serv.Atend.(%)";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoOperacaoContratado"] = "Oper.Cont.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoOperacaoRealizado"] = "Nív.Serv.Oper.(%)";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoEsperaQuantidade"] = "Esp.Quant.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoAtendimentoQuantidade"] = "Atd.Quant.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["NivelServicoOperacaoQuantidade"] = "Oper.Quant.";
$fieldLabelsRel_Produtividade_da_Fila["Portuguese(Brazil)"]["Fila"] = "Fila";


$tdataRel_Produtividade_da_Fila=array();
	$tdataRel_Produtividade_da_Fila[".NumberOfChars"]=80; 
	$tdataRel_Produtividade_da_Fila[".ShortName"]="Rel_Produtividade_da_Fila";
	$tdataRel_Produtividade_da_Fila[".OwnerID"]="";
	$tdataRel_Produtividade_da_Fila[".OriginalTable"]="v_produt_filas";
	$tdataRel_Produtividade_da_Fila[".NCSearch"]=true;
	

$tdataRel_Produtividade_da_Fila[".shortTableName"] = "Rel_Produtividade_da_Fila";
$tdataRel_Produtividade_da_Fila[".dataSourceTable"] = "Rel Produtividade da Fila";
$tdataRel_Produtividade_da_Fila[".nSecOptions"] = 0;
$tdataRel_Produtividade_da_Fila[".nLoginMethod"] = 1;
$tdataRel_Produtividade_da_Fila[".recsPerRowList"] = 1;	
$tdataRel_Produtividade_da_Fila[".tableGroupBy"] = "0";
$tdataRel_Produtividade_da_Fila[".dbType"] = 0;
$tdataRel_Produtividade_da_Fila[".mainTableOwnerID"] = "";
$tdataRel_Produtividade_da_Fila[".moveNext"] = 1;

$tdataRel_Produtividade_da_Fila[".listAjax"] = false;

	$tdataRel_Produtividade_da_Fila[".audit"] = false;

	$tdataRel_Produtividade_da_Fila[".locking"] = false;
	
$tdataRel_Produtividade_da_Fila[".listIcons"] = true;

$tdataRel_Produtividade_da_Fila[".exportTo"] = true;

$tdataRel_Produtividade_da_Fila[".printFriendly"] = true;


$tdataRel_Produtividade_da_Fila[".showSimpleSearchOptions"] = false;

$tdataRel_Produtividade_da_Fila[".showSearchPanel"] = true;


$tdataRel_Produtividade_da_Fila[".isUseAjaxSuggest"] = true;


$tdataRel_Produtividade_da_Fila[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel_Produtividade_da_Fila[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel_Produtividade_da_Fila[".isUseTimeForSearch"] = false;





$tdataRel_Produtividade_da_Fila[".isUseInlineJs"] = $tdataRel_Produtividade_da_Fila[".isUseInlineAdd"] || $tdataRel_Produtividade_da_Fila[".isUseInlineEdit"];

$tdataRel_Produtividade_da_Fila[".allSearchFields"] = array();

$tdataRel_Produtividade_da_Fila[".globSearchFields"][] = "dt_entrada";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dt_entrada", $tdataRel_Produtividade_da_Fila[".allSearchFields"]))
{
	$tdataRel_Produtividade_da_Fila[".allSearchFields"][] = "dt_entrada";	
}
$tdataRel_Produtividade_da_Fila[".globSearchFields"][] = "Fila";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Fila", $tdataRel_Produtividade_da_Fila[".allSearchFields"]))
{
	$tdataRel_Produtividade_da_Fila[".allSearchFields"][] = "Fila";	
}


$tdataRel_Produtividade_da_Fila[".isDynamicPerm"] = true;

	

$tdataRel_Produtividade_da_Fila[".isDisplayLoading"] = true;

$tdataRel_Produtividade_da_Fila[".isResizeColumns"] = false;


$tdataRel_Produtividade_da_Fila[".createLoginPage"] = true;


 	

$tdataRel_Produtividade_da_Fila[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY dt_entrada, Fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel_Produtividade_da_Fila[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel_Produtividade_da_Fila[".orderindexes"] = array();
$tdataRel_Produtividade_da_Fila[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$tdataRel_Produtividade_da_Fila[".orderindexes"][] = array(19, (1 ? "ASC" : "DESC"), "Fila");

$tdataRel_Produtividade_da_Fila[".sqlHead"] = "SELECT dt_entrada,  `Receb.`,  `Atend.`,  `Aband.`,  TME,  TMA,  TMO,  `Aband.Contr.`,  `Aband.Real.`,  NivelServicoEsperaContratado,  NivelServicoEsperaRealizado,  NivelServicoEsperaQuantidade,  NivelServicoAtendimentoContratado,  NivelServicoAtendimentoRealizado,  NivelServicoAtendimentoQuantidade,  NivelServicoOperacaoContratado,  NivelServicoOperacaoRealizado,  NivelServicoOperacaoQuantidade,  Fila";

$tdataRel_Produtividade_da_Fila[".sqlFrom"] = "FROM v_produt_filas";

$tdataRel_Produtividade_da_Fila[".sqlWhereExpr"] = "";

$tdataRel_Produtividade_da_Fila[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel_Produtividade_da_Fila[".Keys"]=$tableKeys;

	
//	dt_entrada
	$fdata = array();
	$fdata["strName"] = "dt_entrada";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Data"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_entrada";
		$fdata["FullName"]= "dt_entrada";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["dt_entrada"]=$fdata;
	
//	Receb.
	$fdata = array();
	$fdata["strName"] = "Receb.";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Qtd. Receb."; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Receb_";
		$fdata["FullName"]= "`Receb.`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Receb."]=$fdata;
	
//	Atend.
	$fdata = array();
	$fdata["strName"] = "Atend.";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Qtd. Atentend."; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Atend_";
		$fdata["FullName"]= "`Atend.`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Atend."]=$fdata;
	
//	Aband.
	$fdata = array();
	$fdata["strName"] = "Aband.";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Qtd. Aband."; 
			$fdata["FieldType"]= 20;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_";
		$fdata["FullName"]= "`Aband.`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Aband."]=$fdata;
	
//	TME
	$fdata = array();
	$fdata["strName"] = "TME";
	$fdata["ownerTable"] = "v_produt_filas";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TME";
		$fdata["FullName"]= "TME";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel_Produtividade_da_Fila["TME"]=$fdata;
	
//	TMA
	$fdata = array();
	$fdata["strName"] = "TMA";
	$fdata["ownerTable"] = "v_produt_filas";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TMA";
		$fdata["FullName"]= "TMA";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel_Produtividade_da_Fila["TMA"]=$fdata;
	
//	TMO
	$fdata = array();
	$fdata["strName"] = "TMO";
	$fdata["ownerTable"] = "v_produt_filas";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TMO";
		$fdata["FullName"]= "TMO";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataRel_Produtividade_da_Fila["TMO"]=$fdata;
	
//	Aband.Contr.
	$fdata = array();
	$fdata["strName"] = "Aband.Contr.";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Abd.Cont."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_Contr_";
		$fdata["FullName"]= "`Aband.Contr.`";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Aband.Contr."]=$fdata;
	
//	Aband.Real.
	$fdata = array();
	$fdata["strName"] = "Aband.Real.";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Abd.Real(%)"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Aband_Real_";
		$fdata["FullName"]= "`Aband.Real.`";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Aband.Real."]=$fdata;
	
//	NivelServicoEsperaContratado
	$fdata = array();
	$fdata["strName"] = "NivelServicoEsperaContratado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Esp.Cont."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoEsperaContratado";
		$fdata["FullName"]= "NivelServicoEsperaContratado";
						$fdata["Index"]= 10;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoEsperaContratado"]=$fdata;
	
//	NivelServicoEsperaRealizado
	$fdata = array();
	$fdata["strName"] = "NivelServicoEsperaRealizado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Nív.Serv.Esp.(%)"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoEsperaRealizado";
		$fdata["FullName"]= "NivelServicoEsperaRealizado";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoEsperaRealizado"]=$fdata;
	
//	NivelServicoEsperaQuantidade
	$fdata = array();
	$fdata["strName"] = "NivelServicoEsperaQuantidade";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Esp.Quant."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoEsperaQuantidade";
		$fdata["FullName"]= "NivelServicoEsperaQuantidade";
						$fdata["Index"]= 12;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoEsperaQuantidade"]=$fdata;
	
//	NivelServicoAtendimentoContratado
	$fdata = array();
	$fdata["strName"] = "NivelServicoAtendimentoContratado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Atd.Cont."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoAtendimentoContratado";
		$fdata["FullName"]= "NivelServicoAtendimentoContratado";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoAtendimentoContratado"]=$fdata;
	
//	NivelServicoAtendimentoRealizado
	$fdata = array();
	$fdata["strName"] = "NivelServicoAtendimentoRealizado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Nív.Serv.Atend.(%)"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoAtendimentoRealizado";
		$fdata["FullName"]= "NivelServicoAtendimentoRealizado";
						$fdata["Index"]= 14;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoAtendimentoRealizado"]=$fdata;
	
//	NivelServicoAtendimentoQuantidade
	$fdata = array();
	$fdata["strName"] = "NivelServicoAtendimentoQuantidade";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Atd.Quant."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoAtendimentoQuantidade";
		$fdata["FullName"]= "NivelServicoAtendimentoQuantidade";
						$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoAtendimentoQuantidade"]=$fdata;
	
//	NivelServicoOperacaoContratado
	$fdata = array();
	$fdata["strName"] = "NivelServicoOperacaoContratado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Oper.Cont."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoOperacaoContratado";
		$fdata["FullName"]= "NivelServicoOperacaoContratado";
						$fdata["Index"]= 16;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoOperacaoContratado"]=$fdata;
	
//	NivelServicoOperacaoRealizado
	$fdata = array();
	$fdata["strName"] = "NivelServicoOperacaoRealizado";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Nív.Serv.Oper.(%)"; 
			$fdata["FieldType"]= 14;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Number";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoOperacaoRealizado";
		$fdata["FullName"]= "NivelServicoOperacaoRealizado";
						$fdata["Index"]= 17;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoOperacaoRealizado"]=$fdata;
	
//	NivelServicoOperacaoQuantidade
	$fdata = array();
	$fdata["strName"] = "NivelServicoOperacaoQuantidade";
	$fdata["ownerTable"] = "v_produt_filas";
		$fdata["Label"]="Oper.Quant."; 
			$fdata["FieldType"]= 13;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "NivelServicoOperacaoQuantidade";
		$fdata["FullName"]= "NivelServicoOperacaoQuantidade";
						$fdata["Index"]= 18;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["NivelServicoOperacaoQuantidade"]=$fdata;
	
//	Fila
	$fdata = array();
	$fdata["strName"] = "Fila";
	$fdata["ownerTable"] = "v_produt_filas";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="Fila";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="Fila";
				$fdata["LookupTable"]="v_produt_filas";
	$fdata["LookupOrderBy"]="";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Fila";
		$fdata["FullName"]= "Fila";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 19;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel_Produtividade_da_Fila["Fila"]=$fdata;

	
$tables_data["Rel Produtividade da Fila"]=&$tdataRel_Produtividade_da_Fila;
$field_labels["Rel_Produtividade_da_Fila"] = &$fieldLabelsRel_Produtividade_da_Fila;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel Produtividade da Fila"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel Produtividade da Fila"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto878=array();
$proto878["m_strHead"] = "SELECT";
$proto878["m_strFieldList"] = "dt_entrada,  `Receb.`,  `Atend.`,  `Aband.`,  TME,  TMA,  TMO,  `Aband.Contr.`,  `Aband.Real.`,  NivelServicoEsperaContratado,  NivelServicoEsperaRealizado,  NivelServicoEsperaQuantidade,  NivelServicoAtendimentoContratado,  NivelServicoAtendimentoRealizado,  NivelServicoAtendimentoQuantidade,  NivelServicoOperacaoContratado,  NivelServicoOperacaoRealizado,  NivelServicoOperacaoQuantidade,  Fila";
$proto878["m_strFrom"] = "FROM v_produt_filas";
$proto878["m_strWhere"] = "";
$proto878["m_strOrderBy"] = "ORDER BY dt_entrada, Fila";
$proto878["m_strTail"] = "";
$proto879=array();
$proto879["m_sql"] = "";
$proto879["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto879["m_column"]=$obj;
$proto879["m_contained"] = array();
$proto879["m_strCase"] = "";
$proto879["m_havingmode"] = "0";
$proto879["m_inBrackets"] = "0";
$proto879["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto879);

$proto878["m_where"] = $obj;
$proto881=array();
$proto881["m_sql"] = "";
$proto881["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto881["m_column"]=$obj;
$proto881["m_contained"] = array();
$proto881["m_strCase"] = "";
$proto881["m_havingmode"] = "0";
$proto881["m_inBrackets"] = "0";
$proto881["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto881);

$proto878["m_having"] = $obj;
$proto878["m_fieldlist"] = array();
						$proto883=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_produt_filas"
));

$proto883["m_expr"]=$obj;
$proto883["m_alias"] = "";
$obj = new SQLFieldListItem($proto883);

$proto878["m_fieldlist"][]=$obj;
						$proto885=array();
			$obj = new SQLField(array(
	"m_strName" => "Receb.",
	"m_strTable" => "v_produt_filas"
));

$proto885["m_expr"]=$obj;
$proto885["m_alias"] = "";
$obj = new SQLFieldListItem($proto885);

$proto878["m_fieldlist"][]=$obj;
						$proto887=array();
			$obj = new SQLField(array(
	"m_strName" => "Atend.",
	"m_strTable" => "v_produt_filas"
));

$proto887["m_expr"]=$obj;
$proto887["m_alias"] = "";
$obj = new SQLFieldListItem($proto887);

$proto878["m_fieldlist"][]=$obj;
						$proto889=array();
			$obj = new SQLField(array(
	"m_strName" => "Aband.",
	"m_strTable" => "v_produt_filas"
));

$proto889["m_expr"]=$obj;
$proto889["m_alias"] = "";
$obj = new SQLFieldListItem($proto889);

$proto878["m_fieldlist"][]=$obj;
						$proto891=array();
			$obj = new SQLField(array(
	"m_strName" => "TME",
	"m_strTable" => "v_produt_filas"
));

$proto891["m_expr"]=$obj;
$proto891["m_alias"] = "";
$obj = new SQLFieldListItem($proto891);

$proto878["m_fieldlist"][]=$obj;
						$proto893=array();
			$obj = new SQLField(array(
	"m_strName" => "TMA",
	"m_strTable" => "v_produt_filas"
));

$proto893["m_expr"]=$obj;
$proto893["m_alias"] = "";
$obj = new SQLFieldListItem($proto893);

$proto878["m_fieldlist"][]=$obj;
						$proto895=array();
			$obj = new SQLField(array(
	"m_strName" => "TMO",
	"m_strTable" => "v_produt_filas"
));

$proto895["m_expr"]=$obj;
$proto895["m_alias"] = "";
$obj = new SQLFieldListItem($proto895);

$proto878["m_fieldlist"][]=$obj;
						$proto897=array();
			$obj = new SQLField(array(
	"m_strName" => "Aband.Contr.",
	"m_strTable" => "v_produt_filas"
));

$proto897["m_expr"]=$obj;
$proto897["m_alias"] = "";
$obj = new SQLFieldListItem($proto897);

$proto878["m_fieldlist"][]=$obj;
						$proto899=array();
			$obj = new SQLField(array(
	"m_strName" => "Aband.Real.",
	"m_strTable" => "v_produt_filas"
));

$proto899["m_expr"]=$obj;
$proto899["m_alias"] = "";
$obj = new SQLFieldListItem($proto899);

$proto878["m_fieldlist"][]=$obj;
						$proto901=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoEsperaContratado",
	"m_strTable" => "v_produt_filas"
));

$proto901["m_expr"]=$obj;
$proto901["m_alias"] = "";
$obj = new SQLFieldListItem($proto901);

$proto878["m_fieldlist"][]=$obj;
						$proto903=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoEsperaRealizado",
	"m_strTable" => "v_produt_filas"
));

$proto903["m_expr"]=$obj;
$proto903["m_alias"] = "";
$obj = new SQLFieldListItem($proto903);

$proto878["m_fieldlist"][]=$obj;
						$proto905=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoEsperaQuantidade",
	"m_strTable" => "v_produt_filas"
));

$proto905["m_expr"]=$obj;
$proto905["m_alias"] = "";
$obj = new SQLFieldListItem($proto905);

$proto878["m_fieldlist"][]=$obj;
						$proto907=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoAtendimentoContratado",
	"m_strTable" => "v_produt_filas"
));

$proto907["m_expr"]=$obj;
$proto907["m_alias"] = "";
$obj = new SQLFieldListItem($proto907);

$proto878["m_fieldlist"][]=$obj;
						$proto909=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoAtendimentoRealizado",
	"m_strTable" => "v_produt_filas"
));

$proto909["m_expr"]=$obj;
$proto909["m_alias"] = "";
$obj = new SQLFieldListItem($proto909);

$proto878["m_fieldlist"][]=$obj;
						$proto911=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoAtendimentoQuantidade",
	"m_strTable" => "v_produt_filas"
));

$proto911["m_expr"]=$obj;
$proto911["m_alias"] = "";
$obj = new SQLFieldListItem($proto911);

$proto878["m_fieldlist"][]=$obj;
						$proto913=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoOperacaoContratado",
	"m_strTable" => "v_produt_filas"
));

$proto913["m_expr"]=$obj;
$proto913["m_alias"] = "";
$obj = new SQLFieldListItem($proto913);

$proto878["m_fieldlist"][]=$obj;
						$proto915=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoOperacaoRealizado",
	"m_strTable" => "v_produt_filas"
));

$proto915["m_expr"]=$obj;
$proto915["m_alias"] = "";
$obj = new SQLFieldListItem($proto915);

$proto878["m_fieldlist"][]=$obj;
						$proto917=array();
			$obj = new SQLField(array(
	"m_strName" => "NivelServicoOperacaoQuantidade",
	"m_strTable" => "v_produt_filas"
));

$proto917["m_expr"]=$obj;
$proto917["m_alias"] = "";
$obj = new SQLFieldListItem($proto917);

$proto878["m_fieldlist"][]=$obj;
						$proto919=array();
			$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_produt_filas"
));

$proto919["m_expr"]=$obj;
$proto919["m_alias"] = "";
$obj = new SQLFieldListItem($proto919);

$proto878["m_fieldlist"][]=$obj;
$proto878["m_fromlist"] = array();
												$proto921=array();
$proto921["m_link"] = "SQLL_MAIN";
			$proto922=array();
$proto922["m_strName"] = "v_produt_filas";
$proto922["m_columns"] = array();
$proto922["m_columns"][] = "dt_entrada";
$proto922["m_columns"][] = "Fila";
$proto922["m_columns"][] = "Receb.";
$proto922["m_columns"][] = "Atend.";
$proto922["m_columns"][] = "Aband.";
$proto922["m_columns"][] = "TME";
$proto922["m_columns"][] = "TMA";
$proto922["m_columns"][] = "TMO";
$proto922["m_columns"][] = "Aband.Contr.";
$proto922["m_columns"][] = "Aband.Real.";
$proto922["m_columns"][] = "NivelServicoEsperaContratado";
$proto922["m_columns"][] = "NivelServicoEsperaRealizado";
$proto922["m_columns"][] = "NivelServicoEsperaQuantidade";
$proto922["m_columns"][] = "NivelServicoAtendimentoContratado";
$proto922["m_columns"][] = "NivelServicoAtendimentoRealizado";
$proto922["m_columns"][] = "NivelServicoAtendimentoQuantidade";
$proto922["m_columns"][] = "NivelServicoOperacaoContratado";
$proto922["m_columns"][] = "NivelServicoOperacaoRealizado";
$proto922["m_columns"][] = "NivelServicoOperacaoQuantidade";
$obj = new SQLTable($proto922);

$proto921["m_table"] = $obj;
$proto921["m_alias"] = "";
$proto923=array();
$proto923["m_sql"] = "";
$proto923["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto923["m_column"]=$obj;
$proto923["m_contained"] = array();
$proto923["m_strCase"] = "";
$proto923["m_havingmode"] = "0";
$proto923["m_inBrackets"] = "0";
$proto923["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto923);

$proto921["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto921);

$proto878["m_fromlist"][]=$obj;
$proto878["m_groupby"] = array();
$proto878["m_orderby"] = array();
												$proto925=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_entrada",
	"m_strTable" => "v_produt_filas"
));

$proto925["m_column"]=$obj;
$proto925["m_bAsc"] = 1;
$proto925["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto925);

$proto878["m_orderby"][]=$obj;					
												$proto927=array();
						$obj = new SQLField(array(
	"m_strName" => "Fila",
	"m_strTable" => "v_produt_filas"
));

$proto927["m_column"]=$obj;
$proto927["m_bAsc"] = 1;
$proto927["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto927);

$proto878["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto878);

$queryData_Rel_Produtividade_da_Fila = $obj;
$tdataRel_Produtividade_da_Fila[".sqlquery"] = $queryData_Rel_Produtividade_da_Fila;



?>
