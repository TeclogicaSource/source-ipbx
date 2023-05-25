<?php

//	field labels
$fieldLabelspersonal_info = array();
$fieldLabelspersonal_info["Portuguese(Brazil)"]=array();
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id"] = "Id";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["accountcode"] = "Centro de Custo";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["call_limit"] = "Call-limit";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["callgroup"] = "Callgroup";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["callerid"] = "Nome";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["context"] = "Contexto";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["secret"] = "Senha";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["allow"] = "Allow";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id_horario"] = "Horário Saída de Chamadas";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["mail"] = "E-mail";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["grava_chamada"] = "Grava Chamada";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["Transbordo"] = "Transbordo";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id_interf"] = "Id Interf";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["ident_interf"] = "Ident Interf";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["tp_ramal"] = "Tp Ramal";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["tp_chamada"] = "Toque (segundos)";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["pickupgroup"] = "Pickupgroup";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["flg_cadeado"] = "Trava de ramal (cadeado)";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["desvio"] = "Qualquer ligação desvia para:";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id_pesquisa"] = "Id Pesquisa";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["desvio_ddr"] = "Entrada no DDR desvia para:";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id_saida"] = "Id Saida";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["id_desvio"] = "Em horários e dias específicos desvia para:";
$fieldLabelspersonal_info["Portuguese(Brazil)"]["flg_info_centrocusto"] = "Informar centro de custo";


$tdatapersonal_info=array();
	$tdatapersonal_info[".NumberOfChars"]=80; 
	$tdatapersonal_info[".ShortName"]="personal_info";
	$tdatapersonal_info[".OwnerID"]="";
	$tdatapersonal_info[".OriginalTable"]="ipbx_ramais";
	$tdatapersonal_info[".NCSearch"]=true;
	

$tdatapersonal_info[".shortTableName"] = "personal_info";
$tdatapersonal_info[".dataSourceTable"] = "personal_info";
$tdatapersonal_info[".nSecOptions"] = 0;
$tdatapersonal_info[".nLoginMethod"] = 1;
$tdatapersonal_info[".recsPerRowList"] = 1;	
$tdatapersonal_info[".tableGroupBy"] = "0";
$tdatapersonal_info[".dbType"] = 0;
$tdatapersonal_info[".mainTableOwnerID"] = "";
$tdatapersonal_info[".moveNext"] = 1;

$tdatapersonal_info[".listAjax"] = true;

	$tdatapersonal_info[".audit"] = true;

	$tdatapersonal_info[".locking"] = false;
	
$tdatapersonal_info[".listIcons"] = true;
$tdatapersonal_info[".edit"] = true;




$tdatapersonal_info[".showSimpleSearchOptions"] = false;

$tdatapersonal_info[".showSearchPanel"] = true;


$tdatapersonal_info[".isUseAjaxSuggest"] = true;

$tdatapersonal_info[".rowHighlite"] = true;

$tdatapersonal_info[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatapersonal_info[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatapersonal_info[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatapersonal_info[".isUseTimeForSearch"] = false;






$tdatapersonal_info[".isUseInlineJs"] = $tdatapersonal_info[".isUseInlineAdd"] || $tdatapersonal_info[".isUseInlineEdit"];

$tdatapersonal_info[".allSearchFields"] = array();

$tdatapersonal_info[".globSearchFields"][] = "name";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("name", $tdatapersonal_info[".allSearchFields"]))
{
	$tdatapersonal_info[".allSearchFields"][] = "name";	
}
$tdatapersonal_info[".globSearchFields"][] = "callerid";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("callerid", $tdatapersonal_info[".allSearchFields"]))
{
	$tdatapersonal_info[".allSearchFields"][] = "callerid";	
}


$tdatapersonal_info[".isDynamicPerm"] = true;

	

$tdatapersonal_info[".isDisplayLoading"] = true;

$tdatapersonal_info[".isResizeColumns"] = false;


$tdatapersonal_info[".createLoginPage"] = true;


 	




$tdatapersonal_info[".pageSize"] = 20;

$gstrOrderBy = "ORDER BY name";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatapersonal_info[".strOrderBy"] = $gstrOrderBy;
	
$tdatapersonal_info[".orderindexes"] = array();
$tdatapersonal_info[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "name");

$tdatapersonal_info[".sqlHead"] = "SELECT id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto";

$tdatapersonal_info[".sqlFrom"] = "FROM ipbx_ramais";

$tdatapersonal_info[".sqlWhereExpr"] = "(name <> \"admin\")";

$tdatapersonal_info[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id";
	$tdatapersonal_info[".Keys"]=$tableKeys;

	
//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Id"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
		$fdata["FullName"]= "id";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatapersonal_info["id"]=$fdata;
	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Readonly";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapersonal_info["name"]=$fdata;
	
//	accountcode
	$fdata = array();
	$fdata["strName"] = "accountcode";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["LinkPrefix"]="files/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="idt_custo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="dsc_centro_cust";
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "accountcode";
		$fdata["FullName"]= "accountcode";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 3;
	
			
											$tdatapersonal_info["accountcode"]=$fdata;
	
//	call-limit
	$fdata = array();
	$fdata["strName"] = "call-limit";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Call-limit"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="10";
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="20";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "call_limit";
		$fdata["FullName"]= "`call-limit`";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			
											$tdatapersonal_info["call-limit"]=$fdata;
	
//	callgroup
	$fdata = array();
	$fdata["strName"] = "callgroup";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Callgroup"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "callgroup";
		$fdata["FullName"]= "callgroup";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=10";
		
											$tdatapersonal_info["callgroup"]=$fdata;
	
//	callerid
	$fdata = array();
	$fdata["strName"] = "callerid";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Nome"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "callerid";
		$fdata["FullName"]= "callerid";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
			$fdata["EditParams"].= " size=60";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapersonal_info["callerid"]=$fdata;
	
//	context
	$fdata = array();
	$fdata["strName"] = "context";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Contexto"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
			$fdata["LCType"]= 3;
		
					
	$fdata["LinkField"]="id_cont";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_context";
				$fdata["LookupTable"]="ipbx_contextos";
	$fdata["LookupOrderBy"]="id_cont";
						
				
										$fdata["SimpleAdd"]=true;
	
					$fdata["Multiselect"]=true; 
	$fdata["SelectSize"] = 1;
	
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "context";
		$fdata["FullName"]= "context";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 7;
	
			
											$tdatapersonal_info["context"]=$fdata;
	
//	secret
	$fdata = array();
	$fdata["strName"] = "secret";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "secret";
		$fdata["FullName"]= "secret";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["secret"]=$fdata;
	
//	allow
	$fdata = array();
	$fdata["strName"] = "allow";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Allow"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="g729";
	$fdata["LookupValues"][]="gsm";
	$fdata["LookupValues"][]="alaw";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "allow";
		$fdata["FullName"]= "allow";
						$fdata["Index"]= 9;
	
			
											$tdatapersonal_info["allow"]=$fdata;
	
//	id_horario
	$fdata = array();
	$fdata["strName"] = "id_horario";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Horário Saída de Chamadas"; 
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
						$fdata["Index"]= 10;
	
			
											$tdatapersonal_info["id_horario"]=$fdata;
	
//	mail
	$fdata = array();
	$fdata["strName"] = "mail";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="E-mail"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mail";
		$fdata["FullName"]= "mail";
						$fdata["Index"]= 11;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatapersonal_info["mail"]=$fdata;
	
//	grava_chamada
	$fdata = array();
	$fdata["strName"] = "grava_chamada";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Grava Chamada"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "grava_chamada";
		$fdata["FullName"]= "grava_chamada";
						$fdata["Index"]= 12;
	
			
											$tdatapersonal_info["grava_chamada"]=$fdata;
	
//	Transbordo
	$fdata = array();
	$fdata["strName"] = "Transbordo";
	$fdata["ownerTable"] = "ipbx_ramais";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Transbordo";
		$fdata["FullName"]= "Transbordo";
						$fdata["Index"]= 13;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["Transbordo"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Id Interf"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_interf";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_interf";
				$fdata["LookupTable"]="ipbx_interf";
	$fdata["LookupOrderBy"]="dsc_interf";
							$fdata["LookupWhere"] = "id_tp_interf in (2,4,5,6,7)";

				
										$fdata["SimpleAdd"]=true;
	
				//	dependent dropdowns	
	$fdata["DependentLookups"]=array();
	$fdata["DependentLookups"][]="ident_interf";
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
						$fdata["Index"]= 14;
	
			
											$tdatapersonal_info["id_interf"]=$fdata;
	
//	ident_interf
	$fdata = array();
	$fdata["strName"] = "ident_interf";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Ident Interf"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="canal";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="(round(canal) + 1)";
				$fdata["CustomDisplay"]="true";
	$fdata["LookupTable"]="ipbx_canais";
	$fdata["LookupOrderBy"]="id_canal";
						
				$fdata["UseCategory"]=true; 
	$fdata["CategoryControl"]="id_interf"; 
	$fdata["CategoryFilter"]="id_interf"; 
	
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ident_interf";
		$fdata["FullName"]= "ident_interf";
						$fdata["Index"]= 15;
	
			
											$tdatapersonal_info["ident_interf"]=$fdata;
	
//	tp_ramal
	$fdata = array();
	$fdata["strName"] = "tp_ramal";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Tp Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Radio button";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
					$fdata["HorizontalLookup"]= true;

					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="RAMAL";
	$fdata["LookupValues"][]="FAX";
	$fdata["LookupValues"][]="MENU";
	$fdata["LookupValues"][]="CALLBACK";
	$fdata["LookupValues"][]="CONFERENCIA";
	$fdata["LookupValues"][]="PESQUISA";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_ramal";
		$fdata["FullName"]= "tp_ramal";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 16;
	
			
											$tdatapersonal_info["tp_ramal"]=$fdata;
	
//	tp_chamada
	$fdata = array();
	$fdata["strName"] = "tp_chamada";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Toque (segundos)"; 
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
						$fdata["Index"]= 17;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["tp_chamada"]=$fdata;
	
//	pickupgroup
	$fdata = array();
	$fdata["strName"] = "pickupgroup";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Pickupgroup"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_captura";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_grupo";
				$fdata["LookupTable"]="ipbx_grupo_captura";
	$fdata["LookupOrderBy"]="dsc_grupo";
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "pickupgroup";
		$fdata["FullName"]= "pickupgroup";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 18;
	
			
											$tdatapersonal_info["pickupgroup"]=$fdata;
	
//	flg_cadeado
	$fdata = array();
	$fdata["strName"] = "flg_cadeado";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Trava de ramal (cadeado)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_cadeado";
		$fdata["FullName"]= "flg_cadeado";
						$fdata["Index"]= 19;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["flg_cadeado"]=$fdata;
	
//	desvio
	$fdata = array();
	$fdata["strName"] = "desvio";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Qualquer ligação desvia para:"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "desvio";
		$fdata["FullName"]= "desvio";
						$fdata["Index"]= 20;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=20";
			$fdata["EditParams"].= " size=20";
	
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["desvio"]=$fdata;
	
//	id_pesquisa
	$fdata = array();
	$fdata["strName"] = "id_pesquisa";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Id Pesquisa"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_pesquisa";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_pesquisa";
				$fdata["LookupTable"]="ipbx_pesquisa_ura_rev";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_pesquisa";
		$fdata["FullName"]= "id_pesquisa";
						$fdata["Index"]= 21;
	
			
											$tdatapersonal_info["id_pesquisa"]=$fdata;
	
//	desvio_ddr
	$fdata = array();
	$fdata["strName"] = "desvio_ddr";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Entrada no DDR desvia para:"; 
			$fdata["FieldType"]= 3;
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
							$fdata["LookupWhere"] = "callerid is not null";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "desvio_ddr";
		$fdata["FullName"]= "desvio_ddr";
						$fdata["Index"]= 22;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["desvio_ddr"]=$fdata;
	
//	id_saida
	$fdata = array();
	$fdata["strName"] = "id_saida";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Id Saida"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_saida";
		$fdata["FullName"]= "id_saida";
						$fdata["Index"]= 23;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=10";
			$fdata["EditParams"].= " size=10";
	
											$tdatapersonal_info["id_saida"]=$fdata;
	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Em horários e dias específicos desvia para:"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_desvio";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_desvio";
				$fdata["LookupTable"]="ipbx_horario_desv";
	$fdata["LookupOrderBy"]="id_desvio";
						
				
							$fdata["AllowToAdd"]=true; 
				
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desvio";
		$fdata["FullName"]= "id_desvio";
						$fdata["Index"]= 24;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["id_desvio"]=$fdata;
	
//	flg_info_centrocusto
	$fdata = array();
	$fdata["strName"] = "flg_info_centrocusto";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Informar centro de custo"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_info_centrocusto";
		$fdata["FullName"]= "flg_info_centrocusto";
						$fdata["Index"]= 25;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatapersonal_info["flg_info_centrocusto"]=$fdata;

	
$tables_data["personal_info"]=&$tdatapersonal_info;
$field_labels["personal_info"] = &$fieldLabelspersonal_info;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["personal_info"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["personal_info"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1495=array();
$proto1495["m_strHead"] = "SELECT";
$proto1495["m_strFieldList"] = "id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto";
$proto1495["m_strFrom"] = "FROM ipbx_ramais";
$proto1495["m_strWhere"] = "(name <> \"admin\")";
$proto1495["m_strOrderBy"] = "ORDER BY name";
$proto1495["m_strTail"] = "";
$proto1496=array();
$proto1496["m_sql"] = "name <> \"admin\"";
$proto1496["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto1496["m_column"]=$obj;
$proto1496["m_contained"] = array();
$proto1496["m_strCase"] = "<> \"admin\"";
$proto1496["m_havingmode"] = "0";
$proto1496["m_inBrackets"] = "0";
$proto1496["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1496);

$proto1495["m_where"] = $obj;
$proto1498=array();
$proto1498["m_sql"] = "";
$proto1498["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1498["m_column"]=$obj;
$proto1498["m_contained"] = array();
$proto1498["m_strCase"] = "";
$proto1498["m_havingmode"] = "0";
$proto1498["m_inBrackets"] = "0";
$proto1498["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1498);

$proto1495["m_having"] = $obj;
$proto1495["m_fieldlist"] = array();
						$proto1500=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "ipbx_ramais"
));

$proto1500["m_expr"]=$obj;
$proto1500["m_alias"] = "";
$obj = new SQLFieldListItem($proto1500);

$proto1495["m_fieldlist"][]=$obj;
						$proto1502=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto1502["m_expr"]=$obj;
$proto1502["m_alias"] = "";
$obj = new SQLFieldListItem($proto1502);

$proto1495["m_fieldlist"][]=$obj;
						$proto1504=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "ipbx_ramais"
));

$proto1504["m_expr"]=$obj;
$proto1504["m_alias"] = "";
$obj = new SQLFieldListItem($proto1504);

$proto1495["m_fieldlist"][]=$obj;
						$proto1506=array();
			$obj = new SQLField(array(
	"m_strName" => "call-limit",
	"m_strTable" => "ipbx_ramais"
));

$proto1506["m_expr"]=$obj;
$proto1506["m_alias"] = "";
$obj = new SQLFieldListItem($proto1506);

$proto1495["m_fieldlist"][]=$obj;
						$proto1508=array();
			$obj = new SQLField(array(
	"m_strName" => "callgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto1508["m_expr"]=$obj;
$proto1508["m_alias"] = "";
$obj = new SQLFieldListItem($proto1508);

$proto1495["m_fieldlist"][]=$obj;
						$proto1510=array();
			$obj = new SQLField(array(
	"m_strName" => "callerid",
	"m_strTable" => "ipbx_ramais"
));

$proto1510["m_expr"]=$obj;
$proto1510["m_alias"] = "";
$obj = new SQLFieldListItem($proto1510);

$proto1495["m_fieldlist"][]=$obj;
						$proto1512=array();
			$obj = new SQLField(array(
	"m_strName" => "context",
	"m_strTable" => "ipbx_ramais"
));

$proto1512["m_expr"]=$obj;
$proto1512["m_alias"] = "";
$obj = new SQLFieldListItem($proto1512);

$proto1495["m_fieldlist"][]=$obj;
						$proto1514=array();
			$obj = new SQLField(array(
	"m_strName" => "secret",
	"m_strTable" => "ipbx_ramais"
));

$proto1514["m_expr"]=$obj;
$proto1514["m_alias"] = "";
$obj = new SQLFieldListItem($proto1514);

$proto1495["m_fieldlist"][]=$obj;
						$proto1516=array();
			$obj = new SQLField(array(
	"m_strName" => "allow",
	"m_strTable" => "ipbx_ramais"
));

$proto1516["m_expr"]=$obj;
$proto1516["m_alias"] = "";
$obj = new SQLFieldListItem($proto1516);

$proto1495["m_fieldlist"][]=$obj;
						$proto1518=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "ipbx_ramais"
));

$proto1518["m_expr"]=$obj;
$proto1518["m_alias"] = "";
$obj = new SQLFieldListItem($proto1518);

$proto1495["m_fieldlist"][]=$obj;
						$proto1520=array();
			$obj = new SQLField(array(
	"m_strName" => "mail",
	"m_strTable" => "ipbx_ramais"
));

$proto1520["m_expr"]=$obj;
$proto1520["m_alias"] = "";
$obj = new SQLFieldListItem($proto1520);

$proto1495["m_fieldlist"][]=$obj;
						$proto1522=array();
			$obj = new SQLField(array(
	"m_strName" => "grava_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto1522["m_expr"]=$obj;
$proto1522["m_alias"] = "";
$obj = new SQLFieldListItem($proto1522);

$proto1495["m_fieldlist"][]=$obj;
						$proto1524=array();
			$obj = new SQLField(array(
	"m_strName" => "Transbordo",
	"m_strTable" => "ipbx_ramais"
));

$proto1524["m_expr"]=$obj;
$proto1524["m_alias"] = "";
$obj = new SQLFieldListItem($proto1524);

$proto1495["m_fieldlist"][]=$obj;
						$proto1526=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto1526["m_expr"]=$obj;
$proto1526["m_alias"] = "";
$obj = new SQLFieldListItem($proto1526);

$proto1495["m_fieldlist"][]=$obj;
						$proto1528=array();
			$obj = new SQLField(array(
	"m_strName" => "ident_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto1528["m_expr"]=$obj;
$proto1528["m_alias"] = "";
$obj = new SQLFieldListItem($proto1528);

$proto1495["m_fieldlist"][]=$obj;
						$proto1530=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_ramal",
	"m_strTable" => "ipbx_ramais"
));

$proto1530["m_expr"]=$obj;
$proto1530["m_alias"] = "";
$obj = new SQLFieldListItem($proto1530);

$proto1495["m_fieldlist"][]=$obj;
						$proto1532=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto1532["m_expr"]=$obj;
$proto1532["m_alias"] = "";
$obj = new SQLFieldListItem($proto1532);

$proto1495["m_fieldlist"][]=$obj;
						$proto1534=array();
			$obj = new SQLField(array(
	"m_strName" => "pickupgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto1534["m_expr"]=$obj;
$proto1534["m_alias"] = "";
$obj = new SQLFieldListItem($proto1534);

$proto1495["m_fieldlist"][]=$obj;
						$proto1536=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_cadeado",
	"m_strTable" => "ipbx_ramais"
));

$proto1536["m_expr"]=$obj;
$proto1536["m_alias"] = "";
$obj = new SQLFieldListItem($proto1536);

$proto1495["m_fieldlist"][]=$obj;
						$proto1538=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto1538["m_expr"]=$obj;
$proto1538["m_alias"] = "";
$obj = new SQLFieldListItem($proto1538);

$proto1495["m_fieldlist"][]=$obj;
						$proto1540=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipbx_ramais"
));

$proto1540["m_expr"]=$obj;
$proto1540["m_alias"] = "";
$obj = new SQLFieldListItem($proto1540);

$proto1495["m_fieldlist"][]=$obj;
						$proto1542=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio_ddr",
	"m_strTable" => "ipbx_ramais"
));

$proto1542["m_expr"]=$obj;
$proto1542["m_alias"] = "";
$obj = new SQLFieldListItem($proto1542);

$proto1495["m_fieldlist"][]=$obj;
						$proto1544=array();
			$obj = new SQLField(array(
	"m_strName" => "id_saida",
	"m_strTable" => "ipbx_ramais"
));

$proto1544["m_expr"]=$obj;
$proto1544["m_alias"] = "";
$obj = new SQLFieldListItem($proto1544);

$proto1495["m_fieldlist"][]=$obj;
						$proto1546=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto1546["m_expr"]=$obj;
$proto1546["m_alias"] = "";
$obj = new SQLFieldListItem($proto1546);

$proto1495["m_fieldlist"][]=$obj;
						$proto1548=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_info_centrocusto",
	"m_strTable" => "ipbx_ramais"
));

$proto1548["m_expr"]=$obj;
$proto1548["m_alias"] = "";
$obj = new SQLFieldListItem($proto1548);

$proto1495["m_fieldlist"][]=$obj;
$proto1495["m_fromlist"] = array();
												$proto1550=array();
$proto1550["m_link"] = "SQLL_MAIN";
			$proto1551=array();
$proto1551["m_strName"] = "ipbx_ramais";
$proto1551["m_columns"] = array();
$proto1551["m_columns"][] = "id";
$proto1551["m_columns"][] = "name";
$proto1551["m_columns"][] = "host";
$proto1551["m_columns"][] = "nat";
$proto1551["m_columns"][] = "type";
$proto1551["m_columns"][] = "accountcode";
$proto1551["m_columns"][] = "amaflags";
$proto1551["m_columns"][] = "call-limit";
$proto1551["m_columns"][] = "callgroup";
$proto1551["m_columns"][] = "callerid";
$proto1551["m_columns"][] = "cancallforward";
$proto1551["m_columns"][] = "canreinvite";
$proto1551["m_columns"][] = "context";
$proto1551["m_columns"][] = "defaultip";
$proto1551["m_columns"][] = "dtmfmode";
$proto1551["m_columns"][] = "fromuser";
$proto1551["m_columns"][] = "fromdomain";
$proto1551["m_columns"][] = "insecure";
$proto1551["m_columns"][] = "language";
$proto1551["m_columns"][] = "mailbox";
$proto1551["m_columns"][] = "md5secret";
$proto1551["m_columns"][] = "deny";
$proto1551["m_columns"][] = "permit";
$proto1551["m_columns"][] = "mask";
$proto1551["m_columns"][] = "musiconhold";
$proto1551["m_columns"][] = "pickupgroup";
$proto1551["m_columns"][] = "qualify";
$proto1551["m_columns"][] = "rtcachefriends";
$proto1551["m_columns"][] = "regexten";
$proto1551["m_columns"][] = "restrictcid";
$proto1551["m_columns"][] = "rtptimeout";
$proto1551["m_columns"][] = "rtpholdtimeout";
$proto1551["m_columns"][] = "secret";
$proto1551["m_columns"][] = "setvar";
$proto1551["m_columns"][] = "disallow";
$proto1551["m_columns"][] = "allow";
$proto1551["m_columns"][] = "fullcontact";
$proto1551["m_columns"][] = "ipaddr";
$proto1551["m_columns"][] = "port";
$proto1551["m_columns"][] = "regserver";
$proto1551["m_columns"][] = "regseconds";
$proto1551["m_columns"][] = "lastms";
$proto1551["m_columns"][] = "username";
$proto1551["m_columns"][] = "defaultuser";
$proto1551["m_columns"][] = "subscribecontext";
$proto1551["m_columns"][] = "useragent";
$proto1551["m_columns"][] = "gateway";
$proto1551["m_columns"][] = "id_horario";
$proto1551["m_columns"][] = "mail";
$proto1551["m_columns"][] = "grava_chamada";
$proto1551["m_columns"][] = "tp_ramal";
$proto1551["m_columns"][] = "Transbordo";
$proto1551["m_columns"][] = "id_interf";
$proto1551["m_columns"][] = "ident_interf";
$proto1551["m_columns"][] = "tp_chamada";
$proto1551["m_columns"][] = "flg_cadeado";
$proto1551["m_columns"][] = "desvio";
$proto1551["m_columns"][] = "id_pesquisa";
$proto1551["m_columns"][] = "desvio_ddr";
$proto1551["m_columns"][] = "id_saida";
$proto1551["m_columns"][] = "id_desvio";
$proto1551["m_columns"][] = "flg_info_centrocusto";
$proto1551["m_columns"][] = "id_painel_op";
$obj = new SQLTable($proto1551);

$proto1550["m_table"] = $obj;
$proto1550["m_alias"] = "";
$proto1552=array();
$proto1552["m_sql"] = "";
$proto1552["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1552["m_column"]=$obj;
$proto1552["m_contained"] = array();
$proto1552["m_strCase"] = "";
$proto1552["m_havingmode"] = "0";
$proto1552["m_inBrackets"] = "0";
$proto1552["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1552);

$proto1550["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1550);

$proto1495["m_fromlist"][]=$obj;
$proto1495["m_groupby"] = array();
$proto1495["m_orderby"] = array();
												$proto1554=array();
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto1554["m_column"]=$obj;
$proto1554["m_bAsc"] = 1;
$proto1554["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1554);

$proto1495["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1495);

$queryData_personal_info = $obj;
$tdatapersonal_info[".sqlquery"] = $queryData_personal_info;



?>
