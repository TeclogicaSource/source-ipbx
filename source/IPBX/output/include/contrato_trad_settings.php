<?php

//	field labels
$fieldLabelscontrato_trad = array();
$fieldLabelscontrato_trad["Portuguese(Brazil)"]=array();
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["num_contrato"] = "Numero do Contrato";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["nm_operadora"] = "Nome da Operadora";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["Vingencia"] = "Vingência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["flg_ativo"] = "Contrato Ativo";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LOCAL_CAD"] = "Fixo-Fixo Local Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LOCAL_VLR"] = "Fixo-Fixo Local Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_LOCAL_VC1_CAD"] = "Fixo-Móvel Local VC1 Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_LOCAL_VC1_VLR"] = "Fixo-Móvel Local VC1 Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_VC2_CAD"] = "Fixo-Móvel VC2 Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LDN_CAD"] = "Fixo-Fixo LDN Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LDN_VLR"] = "Fixo-Fixo LDN Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LDI_CAD"] = "Fixo-Fixo LDI Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_F_LDI_VLR"] = "Fixo-Fixo LDI Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_LDI_CAD"] = "Fixo-Móvel LDI Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_LDI_VLR"] = "Fixo-Móvel LDI Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_VC3_CAD"] = "Fixo-Móvel VC3 Cadência";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_VC3_VLR"] = "Fixo-Móvel VC3 Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["F_M_VC2_VLR"] = "Fixo-Móvel VC2 Valor";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["dia_ini"] = "Dia referente Início do Mes da fatura";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["dia_fim"] = "Dia referente ao término do mes da fatura";
$fieldLabelscontrato_trad["Portuguese(Brazil)"]["posicao_mes"] = "Posição do mês de referencia";


$tdatacontrato_trad=array();
	$tdatacontrato_trad[".NumberOfChars"]=80; 
	$tdatacontrato_trad[".ShortName"]="contrato_trad";
	$tdatacontrato_trad[".OwnerID"]="";
	$tdatacontrato_trad[".OriginalTable"]="contrato_trad";
	$tdatacontrato_trad[".NCSearch"]=true;
	

$tdatacontrato_trad[".shortTableName"] = "contrato_trad";
$tdatacontrato_trad[".dataSourceTable"] = "contrato_trad";
$tdatacontrato_trad[".nSecOptions"] = 0;
$tdatacontrato_trad[".nLoginMethod"] = 1;
$tdatacontrato_trad[".recsPerRowList"] = 1;	
$tdatacontrato_trad[".tableGroupBy"] = "0";
$tdatacontrato_trad[".dbType"] = 0;
$tdatacontrato_trad[".mainTableOwnerID"] = "";
$tdatacontrato_trad[".moveNext"] = 1;

$tdatacontrato_trad[".listAjax"] = true;

	$tdatacontrato_trad[".audit"] = true;

	$tdatacontrato_trad[".locking"] = false;
	
$tdatacontrato_trad[".listIcons"] = true;
$tdatacontrato_trad[".edit"] = true;



$tdatacontrato_trad[".delete"] = true;

$tdatacontrato_trad[".showSimpleSearchOptions"] = false;

$tdatacontrato_trad[".showSearchPanel"] = true;


$tdatacontrato_trad[".isUseAjaxSuggest"] = true;

$tdatacontrato_trad[".rowHighlite"] = true;

$tdatacontrato_trad[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacontrato_trad[".arrKeyFields"][] = "id_contrato";

// use datepicker for search panel
$tdatacontrato_trad[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatacontrato_trad[".isUseTimeForSearch"] = false;






$tdatacontrato_trad[".isUseInlineJs"] = $tdatacontrato_trad[".isUseInlineAdd"] || $tdatacontrato_trad[".isUseInlineEdit"];

$tdatacontrato_trad[".allSearchFields"] = array();



$tdatacontrato_trad[".isDynamicPerm"] = true;

	

$tdatacontrato_trad[".isDisplayLoading"] = true;

$tdatacontrato_trad[".isResizeColumns"] = false;


$tdatacontrato_trad[".createLoginPage"] = true;


 	




$tdatacontrato_trad[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacontrato_trad[".strOrderBy"] = $gstrOrderBy;
	
$tdatacontrato_trad[".orderindexes"] = array();

$tdatacontrato_trad[".sqlHead"] = "SELECT id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  `F-F_LOCAL_CAD`,  `F-F_LOCAL_VLR`,  `F-M_LOCAL_VC1_CAD`,  `F-M_LOCAL_VC1_VLR`,  `F-M_VC2_CAD`,  `F-M_VC2_VLR`,  `F-F_LDN_CAD`,  `F-F_LDN_VLR`,  `F-F_LDI_CAD`,  `F-F_LDI_VLR`,  `F-M_LDI_CAD`,  `F-M_LDI_VLR`,  `F-M_VC3_CAD`,  `F-M_VC3_VLR`,  dia_ini,  dia_fim,  posicao_mes";

$tdatacontrato_trad[".sqlFrom"] = "FROM contrato_trad";

$tdatacontrato_trad[".sqlWhereExpr"] = "";

$tdatacontrato_trad[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_contrato";
	$tdatacontrato_trad[".Keys"]=$tableKeys;

	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacontrato_trad["id_contrato"]=$fdata;
	
//	num_contrato
	$fdata = array();
	$fdata["strName"] = "num_contrato";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Numero do Contrato"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "num_contrato";
		$fdata["FullName"]= "num_contrato";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_trad["num_contrato"]=$fdata;
	
//	nm_operadora
	$fdata = array();
	$fdata["strName"] = "nm_operadora";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Nome da Operadora"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "nm_operadora";
		$fdata["FullName"]= "nm_operadora";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_trad["nm_operadora"]=$fdata;
	
//	Vingencia
	$fdata = array();
	$fdata["strName"] = "Vingencia";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Vingência"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Vingencia";
		$fdata["FullName"]= "Vingencia";
						$fdata["Index"]= 4;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_trad["Vingencia"]=$fdata;
	
//	flg_ativo
	$fdata = array();
	$fdata["strName"] = "flg_ativo";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Contrato Ativo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ativo";
		$fdata["FullName"]= "flg_ativo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatacontrato_trad["flg_ativo"]=$fdata;
	
//	F-F_LOCAL_CAD
	$fdata = array();
	$fdata["strName"] = "F-F_LOCAL_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo Local Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LOCAL_CAD";
		$fdata["FullName"]= "`F-F_LOCAL_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LOCAL_CAD"]=$fdata;
	
//	F-F_LOCAL_VLR
	$fdata = array();
	$fdata["strName"] = "F-F_LOCAL_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo Local Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LOCAL_VLR";
		$fdata["FullName"]= "`F-F_LOCAL_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LOCAL_VLR"]=$fdata;
	
//	F-M_LOCAL_VC1_CAD
	$fdata = array();
	$fdata["strName"] = "F-M_LOCAL_VC1_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel Local VC1 Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_LOCAL_VC1_CAD";
		$fdata["FullName"]= "`F-M_LOCAL_VC1_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_LOCAL_VC1_CAD"]=$fdata;
	
//	F-M_LOCAL_VC1_VLR
	$fdata = array();
	$fdata["strName"] = "F-M_LOCAL_VC1_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel Local VC1 Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_LOCAL_VC1_VLR";
		$fdata["FullName"]= "`F-M_LOCAL_VC1_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_LOCAL_VC1_VLR"]=$fdata;
	
//	F-M_VC2_CAD
	$fdata = array();
	$fdata["strName"] = "F-M_VC2_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel VC2 Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_VC2_CAD";
		$fdata["FullName"]= "`F-M_VC2_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 10;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_VC2_CAD"]=$fdata;
	
//	F-M_VC2_VLR
	$fdata = array();
	$fdata["strName"] = "F-M_VC2_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel VC2 Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_VC2_VLR";
		$fdata["FullName"]= "`F-M_VC2_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_VC2_VLR"]=$fdata;
	
//	F-F_LDN_CAD
	$fdata = array();
	$fdata["strName"] = "F-F_LDN_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo LDN Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LDN_CAD";
		$fdata["FullName"]= "`F-F_LDN_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 12;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LDN_CAD"]=$fdata;
	
//	F-F_LDN_VLR
	$fdata = array();
	$fdata["strName"] = "F-F_LDN_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo LDN Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LDN_VLR";
		$fdata["FullName"]= "`F-F_LDN_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LDN_VLR"]=$fdata;
	
//	F-F_LDI_CAD
	$fdata = array();
	$fdata["strName"] = "F-F_LDI_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo LDI Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LDI_CAD";
		$fdata["FullName"]= "`F-F_LDI_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 14;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LDI_CAD"]=$fdata;
	
//	F-F_LDI_VLR
	$fdata = array();
	$fdata["strName"] = "F-F_LDI_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Fixo LDI Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_F_LDI_VLR";
		$fdata["FullName"]= "`F-F_LDI_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 15;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-F_LDI_VLR"]=$fdata;
	
//	F-M_LDI_CAD
	$fdata = array();
	$fdata["strName"] = "F-M_LDI_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel LDI Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_LDI_CAD";
		$fdata["FullName"]= "`F-M_LDI_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 16;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_LDI_CAD"]=$fdata;
	
//	F-M_LDI_VLR
	$fdata = array();
	$fdata["strName"] = "F-M_LDI_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel LDI Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_LDI_VLR";
		$fdata["FullName"]= "`F-M_LDI_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 17;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_LDI_VLR"]=$fdata;
	
//	F-M_VC3_CAD
	$fdata = array();
	$fdata["strName"] = "F-M_VC3_CAD";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel VC3 Cadência"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_cadencia";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_cadencia";
				$fdata["LookupTable"]="cadencias";
	$fdata["LookupOrderBy"]="dsc_cadencia";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_VC3_CAD";
		$fdata["FullName"]= "`F-M_VC3_CAD`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 18;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_VC3_CAD"]=$fdata;
	
//	F-M_VC3_VLR
	$fdata = array();
	$fdata["strName"] = "F-M_VC3_VLR";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Fixo-Móvel VC3 Valor"; 
			$fdata["FieldType"]= 5;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "F_M_VC3_VLR";
		$fdata["FullName"]= "`F-M_VC3_VLR`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 19;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["F-M_VC3_VLR"]=$fdata;
	
//	dia_ini
	$fdata = array();
	$fdata["strName"] = "dia_ini";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Dia referente Início do Mes da fatura"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dia_ini";
		$fdata["FullName"]= "dia_ini";
						$fdata["Index"]= 20;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["dia_ini"]=$fdata;
	
//	dia_fim
	$fdata = array();
	$fdata["strName"] = "dia_fim";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Dia referente ao término do mes da fatura"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dia_fim";
		$fdata["FullName"]= "dia_fim";
						$fdata["Index"]= 21;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["dia_fim"]=$fdata;
	
//	posicao_mes
	$fdata = array();
	$fdata["strName"] = "posicao_mes";
	$fdata["ownerTable"] = "contrato_trad";
		$fdata["Label"]="Posição do mês de referencia"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "posicao_mes";
		$fdata["FullName"]= "posicao_mes";
						$fdata["Index"]= 22;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatacontrato_trad["posicao_mes"]=$fdata;

	
$tables_data["contrato_trad"]=&$tdatacontrato_trad;
$field_labels["contrato_trad"] = &$fieldLabelscontrato_trad;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["contrato_trad"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["contrato_trad"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3395=array();
$proto3395["m_strHead"] = "SELECT";
$proto3395["m_strFieldList"] = "id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  `F-F_LOCAL_CAD`,  `F-F_LOCAL_VLR`,  `F-M_LOCAL_VC1_CAD`,  `F-M_LOCAL_VC1_VLR`,  `F-M_VC2_CAD`,  `F-M_VC2_VLR`,  `F-F_LDN_CAD`,  `F-F_LDN_VLR`,  `F-F_LDI_CAD`,  `F-F_LDI_VLR`,  `F-M_LDI_CAD`,  `F-M_LDI_VLR`,  `F-M_VC3_CAD`,  `F-M_VC3_VLR`,  dia_ini,  dia_fim,  posicao_mes";
$proto3395["m_strFrom"] = "FROM contrato_trad";
$proto3395["m_strWhere"] = "";
$proto3395["m_strOrderBy"] = "";
$proto3395["m_strTail"] = "";
$proto3396=array();
$proto3396["m_sql"] = "";
$proto3396["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3396["m_column"]=$obj;
$proto3396["m_contained"] = array();
$proto3396["m_strCase"] = "";
$proto3396["m_havingmode"] = "0";
$proto3396["m_inBrackets"] = "0";
$proto3396["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3396);

$proto3395["m_where"] = $obj;
$proto3398=array();
$proto3398["m_sql"] = "";
$proto3398["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3398["m_column"]=$obj;
$proto3398["m_contained"] = array();
$proto3398["m_strCase"] = "";
$proto3398["m_havingmode"] = "0";
$proto3398["m_inBrackets"] = "0";
$proto3398["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3398);

$proto3395["m_having"] = $obj;
$proto3395["m_fieldlist"] = array();
						$proto3400=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "contrato_trad"
));

$proto3400["m_expr"]=$obj;
$proto3400["m_alias"] = "";
$obj = new SQLFieldListItem($proto3400);

$proto3395["m_fieldlist"][]=$obj;
						$proto3402=array();
			$obj = new SQLField(array(
	"m_strName" => "num_contrato",
	"m_strTable" => "contrato_trad"
));

$proto3402["m_expr"]=$obj;
$proto3402["m_alias"] = "";
$obj = new SQLFieldListItem($proto3402);

$proto3395["m_fieldlist"][]=$obj;
						$proto3404=array();
			$obj = new SQLField(array(
	"m_strName" => "nm_operadora",
	"m_strTable" => "contrato_trad"
));

$proto3404["m_expr"]=$obj;
$proto3404["m_alias"] = "";
$obj = new SQLFieldListItem($proto3404);

$proto3395["m_fieldlist"][]=$obj;
						$proto3406=array();
			$obj = new SQLField(array(
	"m_strName" => "Vingencia",
	"m_strTable" => "contrato_trad"
));

$proto3406["m_expr"]=$obj;
$proto3406["m_alias"] = "";
$obj = new SQLFieldListItem($proto3406);

$proto3395["m_fieldlist"][]=$obj;
						$proto3408=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ativo",
	"m_strTable" => "contrato_trad"
));

$proto3408["m_expr"]=$obj;
$proto3408["m_alias"] = "";
$obj = new SQLFieldListItem($proto3408);

$proto3395["m_fieldlist"][]=$obj;
						$proto3410=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LOCAL_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3410["m_expr"]=$obj;
$proto3410["m_alias"] = "";
$obj = new SQLFieldListItem($proto3410);

$proto3395["m_fieldlist"][]=$obj;
						$proto3412=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LOCAL_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3412["m_expr"]=$obj;
$proto3412["m_alias"] = "";
$obj = new SQLFieldListItem($proto3412);

$proto3395["m_fieldlist"][]=$obj;
						$proto3414=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_LOCAL_VC1_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3414["m_expr"]=$obj;
$proto3414["m_alias"] = "";
$obj = new SQLFieldListItem($proto3414);

$proto3395["m_fieldlist"][]=$obj;
						$proto3416=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_LOCAL_VC1_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3416["m_expr"]=$obj;
$proto3416["m_alias"] = "";
$obj = new SQLFieldListItem($proto3416);

$proto3395["m_fieldlist"][]=$obj;
						$proto3418=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_VC2_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3418["m_expr"]=$obj;
$proto3418["m_alias"] = "";
$obj = new SQLFieldListItem($proto3418);

$proto3395["m_fieldlist"][]=$obj;
						$proto3420=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_VC2_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3420["m_expr"]=$obj;
$proto3420["m_alias"] = "";
$obj = new SQLFieldListItem($proto3420);

$proto3395["m_fieldlist"][]=$obj;
						$proto3422=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LDN_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3422["m_expr"]=$obj;
$proto3422["m_alias"] = "";
$obj = new SQLFieldListItem($proto3422);

$proto3395["m_fieldlist"][]=$obj;
						$proto3424=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LDN_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3424["m_expr"]=$obj;
$proto3424["m_alias"] = "";
$obj = new SQLFieldListItem($proto3424);

$proto3395["m_fieldlist"][]=$obj;
						$proto3426=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LDI_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3426["m_expr"]=$obj;
$proto3426["m_alias"] = "";
$obj = new SQLFieldListItem($proto3426);

$proto3395["m_fieldlist"][]=$obj;
						$proto3428=array();
			$obj = new SQLField(array(
	"m_strName" => "F-F_LDI_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3428["m_expr"]=$obj;
$proto3428["m_alias"] = "";
$obj = new SQLFieldListItem($proto3428);

$proto3395["m_fieldlist"][]=$obj;
						$proto3430=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_LDI_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3430["m_expr"]=$obj;
$proto3430["m_alias"] = "";
$obj = new SQLFieldListItem($proto3430);

$proto3395["m_fieldlist"][]=$obj;
						$proto3432=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_LDI_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3432["m_expr"]=$obj;
$proto3432["m_alias"] = "";
$obj = new SQLFieldListItem($proto3432);

$proto3395["m_fieldlist"][]=$obj;
						$proto3434=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_VC3_CAD",
	"m_strTable" => "contrato_trad"
));

$proto3434["m_expr"]=$obj;
$proto3434["m_alias"] = "";
$obj = new SQLFieldListItem($proto3434);

$proto3395["m_fieldlist"][]=$obj;
						$proto3436=array();
			$obj = new SQLField(array(
	"m_strName" => "F-M_VC3_VLR",
	"m_strTable" => "contrato_trad"
));

$proto3436["m_expr"]=$obj;
$proto3436["m_alias"] = "";
$obj = new SQLFieldListItem($proto3436);

$proto3395["m_fieldlist"][]=$obj;
						$proto3438=array();
			$obj = new SQLField(array(
	"m_strName" => "dia_ini",
	"m_strTable" => "contrato_trad"
));

$proto3438["m_expr"]=$obj;
$proto3438["m_alias"] = "";
$obj = new SQLFieldListItem($proto3438);

$proto3395["m_fieldlist"][]=$obj;
						$proto3440=array();
			$obj = new SQLField(array(
	"m_strName" => "dia_fim",
	"m_strTable" => "contrato_trad"
));

$proto3440["m_expr"]=$obj;
$proto3440["m_alias"] = "";
$obj = new SQLFieldListItem($proto3440);

$proto3395["m_fieldlist"][]=$obj;
						$proto3442=array();
			$obj = new SQLField(array(
	"m_strName" => "posicao_mes",
	"m_strTable" => "contrato_trad"
));

$proto3442["m_expr"]=$obj;
$proto3442["m_alias"] = "";
$obj = new SQLFieldListItem($proto3442);

$proto3395["m_fieldlist"][]=$obj;
$proto3395["m_fromlist"] = array();
												$proto3444=array();
$proto3444["m_link"] = "SQLL_MAIN";
			$proto3445=array();
$proto3445["m_strName"] = "contrato_trad";
$proto3445["m_columns"] = array();
$proto3445["m_columns"][] = "id_contrato";
$proto3445["m_columns"][] = "num_contrato";
$proto3445["m_columns"][] = "nm_operadora";
$proto3445["m_columns"][] = "Vingencia";
$proto3445["m_columns"][] = "flg_ativo";
$proto3445["m_columns"][] = "F-F_LOCAL_CAD";
$proto3445["m_columns"][] = "F-F_LOCAL_VLR";
$proto3445["m_columns"][] = "F-M_LOCAL_VC1_CAD";
$proto3445["m_columns"][] = "F-M_LOCAL_VC1_VLR";
$proto3445["m_columns"][] = "F-M_VC2_CAD";
$proto3445["m_columns"][] = "F-M_VC2_VLR";
$proto3445["m_columns"][] = "F-F_LDN_CAD";
$proto3445["m_columns"][] = "F-F_LDN_VLR";
$proto3445["m_columns"][] = "F-F_LDI_CAD";
$proto3445["m_columns"][] = "F-F_LDI_VLR";
$proto3445["m_columns"][] = "F-M_LDI_CAD";
$proto3445["m_columns"][] = "F-M_LDI_VLR";
$proto3445["m_columns"][] = "F-M_VC3_CAD";
$proto3445["m_columns"][] = "F-M_VC3_VLR";
$proto3445["m_columns"][] = "id_tronco";
$proto3445["m_columns"][] = "dia_ini";
$proto3445["m_columns"][] = "dia_fim";
$proto3445["m_columns"][] = "posicao_mes";
$obj = new SQLTable($proto3445);

$proto3444["m_table"] = $obj;
$proto3444["m_alias"] = "";
$proto3446=array();
$proto3446["m_sql"] = "";
$proto3446["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3446["m_column"]=$obj;
$proto3446["m_contained"] = array();
$proto3446["m_strCase"] = "";
$proto3446["m_havingmode"] = "0";
$proto3446["m_inBrackets"] = "0";
$proto3446["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3446);

$proto3444["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3444);

$proto3395["m_fromlist"][]=$obj;
$proto3395["m_groupby"] = array();
$proto3395["m_orderby"] = array();
$obj = new SQLQuery($proto3395);

$queryData_contrato_trad = $obj;
$tdatacontrato_trad[".sqlquery"] = $queryData_contrato_trad;



?>
