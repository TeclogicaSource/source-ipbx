<?php

//	field labels
$fieldLabelsipbx_ramais = array();
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id"] = "Identificação";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["accountcode"] = "Centro de custo";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["call_limit"] = "Ligações simultâneas";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["callgroup"] = "Callgroup";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["callerid"] = "Nome";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["context"] = "Privilégio";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["secret"] = "Senha";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["allow"] = "Codec";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_horario"] = "Horário Saída de Chamadas";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["mail"] = "E-Mail (secretária eletrônica)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["grava_chamada"] = "Gravar Chamadas";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["Transbordo"] = "Ramal de Transbordo";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_interf"] = "Interface";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["ident_interf"] = "Canal de saída";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["tp_ramal"] = " Tipo de ramal";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["tp_chamada"] = "Toque (segundos)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["pickupgroup"] = "Grupo de captura";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["flg_cadeado"] = "Trava de ramal (cadeado)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["desvio"] = "2º - Qualquer ligação desvia para:";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_pesquisa"] = "Pesquisa";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["desvio_ddr"] = "1º - Entrada no DDR desvia para:";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_saida"] = "Identificação Chamada (callerid)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_desvio"] = "3º - Em horários e dias específicos desvia para:";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["flg_info_centrocusto"] = " Informar centro de custo?";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_painel_op"] = "Painel de Operações";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["flg_show_mobile"] = "Adicionar a lista de contatos (iPBX Mobile)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_provis"] = "Template Provisionamento";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["mc_addr"] = "MAC";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_lang"] = "Linguagem";


$tdataipbx_ramais=array();
	$tdataipbx_ramais[".NumberOfChars"]=80; 
	$tdataipbx_ramais[".ShortName"]="ipbx_ramais";
	$tdataipbx_ramais[".OwnerID"]="";
	$tdataipbx_ramais[".OriginalTable"]="ipbx_ramais";
	$tdataipbx_ramais[".NCSearch"]=true;
	

$tdataipbx_ramais[".shortTableName"] = "ipbx_ramais";
$tdataipbx_ramais[".dataSourceTable"] = "ipbx_ramais";
$tdataipbx_ramais[".nSecOptions"] = 0;
$tdataipbx_ramais[".nLoginMethod"] = 1;
$tdataipbx_ramais[".recsPerRowList"] = 1;	
$tdataipbx_ramais[".tableGroupBy"] = "0";
$tdataipbx_ramais[".dbType"] = 0;
$tdataipbx_ramais[".mainTableOwnerID"] = "";
$tdataipbx_ramais[".moveNext"] = 1;

$tdataipbx_ramais[".listAjax"] = true;

	$tdataipbx_ramais[".audit"] = true;

	$tdataipbx_ramais[".locking"] = false;
	
$tdataipbx_ramais[".listIcons"] = true;
$tdataipbx_ramais[".edit"] = true;


$tdataipbx_ramais[".printFriendly"] = true;


$tdataipbx_ramais[".showSimpleSearchOptions"] = false;

$tdataipbx_ramais[".showSearchPanel"] = true;


$tdataipbx_ramais[".isUseAjaxSuggest"] = true;

$tdataipbx_ramais[".rowHighlite"] = true;

$tdataipbx_ramais[".delFile"] = true;

// button handlers file names
$tdataipbx_ramais[".buttonHandlers_edit"][] = "buttonevent_REMOVER_RAMAL";
$tdataipbx_ramais[".buttonHandlers_list"][] = "buttonevent_New_Button11";

// start on load js handlers


$tdataipbx_ramais[".jsOnloadEdit"] = "";






// end on load js handlers



$tdataipbx_ramais[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdataipbx_ramais[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_ramais[".isUseTimeForSearch"] = false;






$tdataipbx_ramais[".isUseInlineJs"] = $tdataipbx_ramais[".isUseInlineAdd"] || $tdataipbx_ramais[".isUseInlineEdit"];

$tdataipbx_ramais[".allSearchFields"] = array();

$tdataipbx_ramais[".globSearchFields"][] = "name";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("name", $tdataipbx_ramais[".allSearchFields"]))
{
	$tdataipbx_ramais[".allSearchFields"][] = "name";	
}
$tdataipbx_ramais[".globSearchFields"][] = "callerid";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("callerid", $tdataipbx_ramais[".allSearchFields"]))
{
	$tdataipbx_ramais[".allSearchFields"][] = "callerid";	
}


$tdataipbx_ramais[".isDynamicPerm"] = true;

	

$tdataipbx_ramais[".isDisplayLoading"] = true;

$tdataipbx_ramais[".isResizeColumns"] = false;


$tdataipbx_ramais[".createLoginPage"] = true;


 	




$tdataipbx_ramais[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY name";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_ramais[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_ramais[".orderindexes"] = array();
$tdataipbx_ramais[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "name");

$tdataipbx_ramais[".sqlHead"] = "SELECT id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op,  flg_show_mobile,  id_provis,  mc_addr,  id_lang";

$tdataipbx_ramais[".sqlFrom"] = "FROM ipbx_ramais";

$tdataipbx_ramais[".sqlWhereExpr"] = "(name <> \"admin\")";

$tdataipbx_ramais[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id";
	$tdataipbx_ramais[".Keys"]=$tableKeys;

	
//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Identificação"; 
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
			
											$tdataipbx_ramais["id"]=$fdata;
	
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
			$tdataipbx_ramais["name"]=$fdata;
	
//	accountcode
	$fdata = array();
	$fdata["strName"] = "accountcode";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Centro de custo"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["accountcode"]=$fdata;
	
//	call-limit
	$fdata = array();
	$fdata["strName"] = "call-limit";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Ligações simultâneas"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["call-limit"]=$fdata;
	
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
		
											$tdataipbx_ramais["callgroup"]=$fdata;
	
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
			$tdataipbx_ramais["callerid"]=$fdata;
	
//	context
	$fdata = array();
	$fdata["strName"] = "context";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Privilégio"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["context"]=$fdata;
	
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
								$tdataipbx_ramais["secret"]=$fdata;
	
//	allow
	$fdata = array();
	$fdata["strName"] = "allow";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="g729";
	$fdata["LookupValues"][]="gsm";
	$fdata["LookupValues"][]="alaw";
	$fdata["LookupValues"][]="all";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "allow";
		$fdata["FullName"]= "allow";
						$fdata["Index"]= 9;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["allow"]=$fdata;
	
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_horario"]=$fdata;
	
//	mail
	$fdata = array();
	$fdata["strName"] = "mail";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="E-Mail (secretária eletrônica)"; 
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
	
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["mail"]=$fdata;
	
//	grava_chamada
	$fdata = array();
	$fdata["strName"] = "grava_chamada";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Gravar Chamadas"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "grava_chamada";
		$fdata["FullName"]= "grava_chamada";
						$fdata["Index"]= 12;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["grava_chamada"]=$fdata;
	
//	Transbordo
	$fdata = array();
	$fdata["strName"] = "Transbordo";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Ramal de Transbordo"; 
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
								$tdataipbx_ramais["Transbordo"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Interface"; 
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
							$fdata["LookupWhere"] = "id_tp_interf in (2,4,5,6,7,11)";

				
										$fdata["SimpleAdd"]=true;
	
				//	dependent dropdowns	
	$fdata["DependentLookups"]=array();
	$fdata["DependentLookups"][]="ident_interf";
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
						$fdata["Index"]= 14;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_interf"]=$fdata;
	
//	ident_interf
	$fdata = array();
	$fdata["strName"] = "ident_interf";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Canal de saída"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["ident_interf"]=$fdata;
	
//	tp_ramal
	$fdata = array();
	$fdata["strName"] = "tp_ramal";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]=" Tipo de ramal"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["tp_ramal"]=$fdata;
	
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
								$tdataipbx_ramais["tp_chamada"]=$fdata;
	
//	pickupgroup
	$fdata = array();
	$fdata["strName"] = "pickupgroup";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Grupo de captura"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["pickupgroup"]=$fdata;
	
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
								$tdataipbx_ramais["flg_cadeado"]=$fdata;
	
//	desvio
	$fdata = array();
	$fdata["strName"] = "desvio";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="2º - Qualquer ligação desvia para:"; 
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
								$tdataipbx_ramais["desvio"]=$fdata;
	
//	id_pesquisa
	$fdata = array();
	$fdata["strName"] = "id_pesquisa";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Pesquisa"; 
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
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_pesquisa"]=$fdata;
	
//	desvio_ddr
	$fdata = array();
	$fdata["strName"] = "desvio_ddr";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="1º - Entrada no DDR desvia para:"; 
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
								$tdataipbx_ramais["desvio_ddr"]=$fdata;
	
//	id_saida
	$fdata = array();
	$fdata["strName"] = "id_saida";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Identificação Chamada (callerid)"; 
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
	
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_saida"]=$fdata;
	
//	id_desvio
	$fdata = array();
	$fdata["strName"] = "id_desvio";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="3º - Em horários e dias específicos desvia para:"; 
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
								$tdataipbx_ramais["id_desvio"]=$fdata;
	
//	flg_info_centrocusto
	$fdata = array();
	$fdata["strName"] = "flg_info_centrocusto";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]=" Informar centro de custo?"; 
			$fdata["FieldType"]= 2;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_info_centrocusto";
		$fdata["FullName"]= "flg_info_centrocusto";
						$fdata["Index"]= 25;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["flg_info_centrocusto"]=$fdata;
	
//	id_painel_op
	$fdata = array();
	$fdata["strName"] = "id_painel_op";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Painel de Operações"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_painel_op";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_painel";
				$fdata["LookupTable"]="ipbx_painel_op";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_painel_op";
		$fdata["FullName"]= "id_painel_op";
						$fdata["Index"]= 26;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_painel_op"]=$fdata;
	
//	flg_show_mobile
	$fdata = array();
	$fdata["strName"] = "flg_show_mobile";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Adicionar a lista de contatos (iPBX Mobile)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_show_mobile";
		$fdata["FullName"]= "flg_show_mobile";
						$fdata["Index"]= 27;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["flg_show_mobile"]=$fdata;
	
//	id_provis
	$fdata = array();
	$fdata["strName"] = "id_provis";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Template Provisionamento"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_provis";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_aparelho";
				$fdata["LookupTable"]="ipbx_provisionamento";
	$fdata["LookupOrderBy"]="dsc_aparelho";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_provis";
		$fdata["FullName"]= "id_provis";
						$fdata["Index"]= 28;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_provis"]=$fdata;
	
//	mc_addr
	$fdata = array();
	$fdata["strName"] = "mc_addr";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="MAC"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mc_addr";
		$fdata["FullName"]= "mc_addr";
						$fdata["Index"]= 29;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["mc_addr"]=$fdata;
	
//	id_lang
	$fdata = array();
	$fdata["strName"] = "id_lang";
	$fdata["ownerTable"] = "ipbx_ramais";
		$fdata["Label"]="Linguagem"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="id_lang";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_lang";
				$fdata["LookupTable"]="ipbx_lang";
	$fdata["LookupOrderBy"]="dsc_lang";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_lang";
		$fdata["FullName"]= "id_lang";
						$fdata["Index"]= 30;
	
			
				$fdata["FieldPermissions"]=true;
								$tdataipbx_ramais["id_lang"]=$fdata;

	
$tables_data["ipbx_ramais"]=&$tdataipbx_ramais;
$field_labels["ipbx_ramais"] = &$fieldLabelsipbx_ramais;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ramais"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ramais"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2591=array();
$proto2591["m_strHead"] = "SELECT";
$proto2591["m_strFieldList"] = "id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op,  flg_show_mobile,  id_provis,  mc_addr,  id_lang";
$proto2591["m_strFrom"] = "FROM ipbx_ramais";
$proto2591["m_strWhere"] = "(name <> \"admin\")";
$proto2591["m_strOrderBy"] = "ORDER BY name";
$proto2591["m_strTail"] = "";
$proto2592=array();
$proto2592["m_sql"] = "name <> \"admin\"";
$proto2592["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2592["m_column"]=$obj;
$proto2592["m_contained"] = array();
$proto2592["m_strCase"] = "<> \"admin\"";
$proto2592["m_havingmode"] = "0";
$proto2592["m_inBrackets"] = "0";
$proto2592["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2592);

$proto2591["m_where"] = $obj;
$proto2594=array();
$proto2594["m_sql"] = "";
$proto2594["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2594["m_column"]=$obj;
$proto2594["m_contained"] = array();
$proto2594["m_strCase"] = "";
$proto2594["m_havingmode"] = "0";
$proto2594["m_inBrackets"] = "0";
$proto2594["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2594);

$proto2591["m_having"] = $obj;
$proto2591["m_fieldlist"] = array();
						$proto2596=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "ipbx_ramais"
));

$proto2596["m_expr"]=$obj;
$proto2596["m_alias"] = "";
$obj = new SQLFieldListItem($proto2596);

$proto2591["m_fieldlist"][]=$obj;
						$proto2598=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2598["m_expr"]=$obj;
$proto2598["m_alias"] = "";
$obj = new SQLFieldListItem($proto2598);

$proto2591["m_fieldlist"][]=$obj;
						$proto2600=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "ipbx_ramais"
));

$proto2600["m_expr"]=$obj;
$proto2600["m_alias"] = "";
$obj = new SQLFieldListItem($proto2600);

$proto2591["m_fieldlist"][]=$obj;
						$proto2602=array();
			$obj = new SQLField(array(
	"m_strName" => "call-limit",
	"m_strTable" => "ipbx_ramais"
));

$proto2602["m_expr"]=$obj;
$proto2602["m_alias"] = "";
$obj = new SQLFieldListItem($proto2602);

$proto2591["m_fieldlist"][]=$obj;
						$proto2604=array();
			$obj = new SQLField(array(
	"m_strName" => "callgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto2604["m_expr"]=$obj;
$proto2604["m_alias"] = "";
$obj = new SQLFieldListItem($proto2604);

$proto2591["m_fieldlist"][]=$obj;
						$proto2606=array();
			$obj = new SQLField(array(
	"m_strName" => "callerid",
	"m_strTable" => "ipbx_ramais"
));

$proto2606["m_expr"]=$obj;
$proto2606["m_alias"] = "";
$obj = new SQLFieldListItem($proto2606);

$proto2591["m_fieldlist"][]=$obj;
						$proto2608=array();
			$obj = new SQLField(array(
	"m_strName" => "context",
	"m_strTable" => "ipbx_ramais"
));

$proto2608["m_expr"]=$obj;
$proto2608["m_alias"] = "";
$obj = new SQLFieldListItem($proto2608);

$proto2591["m_fieldlist"][]=$obj;
						$proto2610=array();
			$obj = new SQLField(array(
	"m_strName" => "secret",
	"m_strTable" => "ipbx_ramais"
));

$proto2610["m_expr"]=$obj;
$proto2610["m_alias"] = "";
$obj = new SQLFieldListItem($proto2610);

$proto2591["m_fieldlist"][]=$obj;
						$proto2612=array();
			$obj = new SQLField(array(
	"m_strName" => "allow",
	"m_strTable" => "ipbx_ramais"
));

$proto2612["m_expr"]=$obj;
$proto2612["m_alias"] = "";
$obj = new SQLFieldListItem($proto2612);

$proto2591["m_fieldlist"][]=$obj;
						$proto2614=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "ipbx_ramais"
));

$proto2614["m_expr"]=$obj;
$proto2614["m_alias"] = "";
$obj = new SQLFieldListItem($proto2614);

$proto2591["m_fieldlist"][]=$obj;
						$proto2616=array();
			$obj = new SQLField(array(
	"m_strName" => "mail",
	"m_strTable" => "ipbx_ramais"
));

$proto2616["m_expr"]=$obj;
$proto2616["m_alias"] = "";
$obj = new SQLFieldListItem($proto2616);

$proto2591["m_fieldlist"][]=$obj;
						$proto2618=array();
			$obj = new SQLField(array(
	"m_strName" => "grava_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto2618["m_expr"]=$obj;
$proto2618["m_alias"] = "";
$obj = new SQLFieldListItem($proto2618);

$proto2591["m_fieldlist"][]=$obj;
						$proto2620=array();
			$obj = new SQLField(array(
	"m_strName" => "Transbordo",
	"m_strTable" => "ipbx_ramais"
));

$proto2620["m_expr"]=$obj;
$proto2620["m_alias"] = "";
$obj = new SQLFieldListItem($proto2620);

$proto2591["m_fieldlist"][]=$obj;
						$proto2622=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto2622["m_expr"]=$obj;
$proto2622["m_alias"] = "";
$obj = new SQLFieldListItem($proto2622);

$proto2591["m_fieldlist"][]=$obj;
						$proto2624=array();
			$obj = new SQLField(array(
	"m_strName" => "ident_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto2624["m_expr"]=$obj;
$proto2624["m_alias"] = "";
$obj = new SQLFieldListItem($proto2624);

$proto2591["m_fieldlist"][]=$obj;
						$proto2626=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_ramal",
	"m_strTable" => "ipbx_ramais"
));

$proto2626["m_expr"]=$obj;
$proto2626["m_alias"] = "";
$obj = new SQLFieldListItem($proto2626);

$proto2591["m_fieldlist"][]=$obj;
						$proto2628=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto2628["m_expr"]=$obj;
$proto2628["m_alias"] = "";
$obj = new SQLFieldListItem($proto2628);

$proto2591["m_fieldlist"][]=$obj;
						$proto2630=array();
			$obj = new SQLField(array(
	"m_strName" => "pickupgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto2630["m_expr"]=$obj;
$proto2630["m_alias"] = "";
$obj = new SQLFieldListItem($proto2630);

$proto2591["m_fieldlist"][]=$obj;
						$proto2632=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_cadeado",
	"m_strTable" => "ipbx_ramais"
));

$proto2632["m_expr"]=$obj;
$proto2632["m_alias"] = "";
$obj = new SQLFieldListItem($proto2632);

$proto2591["m_fieldlist"][]=$obj;
						$proto2634=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto2634["m_expr"]=$obj;
$proto2634["m_alias"] = "";
$obj = new SQLFieldListItem($proto2634);

$proto2591["m_fieldlist"][]=$obj;
						$proto2636=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipbx_ramais"
));

$proto2636["m_expr"]=$obj;
$proto2636["m_alias"] = "";
$obj = new SQLFieldListItem($proto2636);

$proto2591["m_fieldlist"][]=$obj;
						$proto2638=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio_ddr",
	"m_strTable" => "ipbx_ramais"
));

$proto2638["m_expr"]=$obj;
$proto2638["m_alias"] = "";
$obj = new SQLFieldListItem($proto2638);

$proto2591["m_fieldlist"][]=$obj;
						$proto2640=array();
			$obj = new SQLField(array(
	"m_strName" => "id_saida",
	"m_strTable" => "ipbx_ramais"
));

$proto2640["m_expr"]=$obj;
$proto2640["m_alias"] = "";
$obj = new SQLFieldListItem($proto2640);

$proto2591["m_fieldlist"][]=$obj;
						$proto2642=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto2642["m_expr"]=$obj;
$proto2642["m_alias"] = "";
$obj = new SQLFieldListItem($proto2642);

$proto2591["m_fieldlist"][]=$obj;
						$proto2644=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_info_centrocusto",
	"m_strTable" => "ipbx_ramais"
));

$proto2644["m_expr"]=$obj;
$proto2644["m_alias"] = "";
$obj = new SQLFieldListItem($proto2644);

$proto2591["m_fieldlist"][]=$obj;
						$proto2646=array();
			$obj = new SQLField(array(
	"m_strName" => "id_painel_op",
	"m_strTable" => "ipbx_ramais"
));

$proto2646["m_expr"]=$obj;
$proto2646["m_alias"] = "";
$obj = new SQLFieldListItem($proto2646);

$proto2591["m_fieldlist"][]=$obj;
						$proto2648=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_show_mobile",
	"m_strTable" => "ipbx_ramais"
));

$proto2648["m_expr"]=$obj;
$proto2648["m_alias"] = "";
$obj = new SQLFieldListItem($proto2648);

$proto2591["m_fieldlist"][]=$obj;
						$proto2650=array();
			$obj = new SQLField(array(
	"m_strName" => "id_provis",
	"m_strTable" => "ipbx_ramais"
));

$proto2650["m_expr"]=$obj;
$proto2650["m_alias"] = "";
$obj = new SQLFieldListItem($proto2650);

$proto2591["m_fieldlist"][]=$obj;
						$proto2652=array();
			$obj = new SQLField(array(
	"m_strName" => "mc_addr",
	"m_strTable" => "ipbx_ramais"
));

$proto2652["m_expr"]=$obj;
$proto2652["m_alias"] = "";
$obj = new SQLFieldListItem($proto2652);

$proto2591["m_fieldlist"][]=$obj;
						$proto2654=array();
			$obj = new SQLField(array(
	"m_strName" => "id_lang",
	"m_strTable" => "ipbx_ramais"
));

$proto2654["m_expr"]=$obj;
$proto2654["m_alias"] = "";
$obj = new SQLFieldListItem($proto2654);

$proto2591["m_fieldlist"][]=$obj;
$proto2591["m_fromlist"] = array();
												$proto2656=array();
$proto2656["m_link"] = "SQLL_MAIN";
			$proto2657=array();
$proto2657["m_strName"] = "ipbx_ramais";
$proto2657["m_columns"] = array();
$proto2657["m_columns"][] = "id";
$proto2657["m_columns"][] = "name";
$proto2657["m_columns"][] = "host";
$proto2657["m_columns"][] = "nat";
$proto2657["m_columns"][] = "type";
$proto2657["m_columns"][] = "accountcode";
$proto2657["m_columns"][] = "amaflags";
$proto2657["m_columns"][] = "call-limit";
$proto2657["m_columns"][] = "callgroup";
$proto2657["m_columns"][] = "callerid";
$proto2657["m_columns"][] = "cancallforward";
$proto2657["m_columns"][] = "canreinvite";
$proto2657["m_columns"][] = "context";
$proto2657["m_columns"][] = "defaultip";
$proto2657["m_columns"][] = "dtmfmode";
$proto2657["m_columns"][] = "fromuser";
$proto2657["m_columns"][] = "fromdomain";
$proto2657["m_columns"][] = "insecure";
$proto2657["m_columns"][] = "language";
$proto2657["m_columns"][] = "mailbox";
$proto2657["m_columns"][] = "md5secret";
$proto2657["m_columns"][] = "deny";
$proto2657["m_columns"][] = "permit";
$proto2657["m_columns"][] = "mask";
$proto2657["m_columns"][] = "musiconhold";
$proto2657["m_columns"][] = "pickupgroup";
$proto2657["m_columns"][] = "qualify";
$proto2657["m_columns"][] = "rtcachefriends";
$proto2657["m_columns"][] = "regexten";
$proto2657["m_columns"][] = "restrictcid";
$proto2657["m_columns"][] = "rtptimeout";
$proto2657["m_columns"][] = "rtpholdtimeout";
$proto2657["m_columns"][] = "secret";
$proto2657["m_columns"][] = "setvar";
$proto2657["m_columns"][] = "disallow";
$proto2657["m_columns"][] = "allow";
$proto2657["m_columns"][] = "fullcontact";
$proto2657["m_columns"][] = "ipaddr";
$proto2657["m_columns"][] = "port";
$proto2657["m_columns"][] = "regserver";
$proto2657["m_columns"][] = "regseconds";
$proto2657["m_columns"][] = "lastms";
$proto2657["m_columns"][] = "username";
$proto2657["m_columns"][] = "defaultuser";
$proto2657["m_columns"][] = "subscribecontext";
$proto2657["m_columns"][] = "useragent";
$proto2657["m_columns"][] = "gateway";
$proto2657["m_columns"][] = "id_horario";
$proto2657["m_columns"][] = "mail";
$proto2657["m_columns"][] = "grava_chamada";
$proto2657["m_columns"][] = "tp_ramal";
$proto2657["m_columns"][] = "Transbordo";
$proto2657["m_columns"][] = "id_interf";
$proto2657["m_columns"][] = "ident_interf";
$proto2657["m_columns"][] = "tp_chamada";
$proto2657["m_columns"][] = "flg_cadeado";
$proto2657["m_columns"][] = "desvio";
$proto2657["m_columns"][] = "id_pesquisa";
$proto2657["m_columns"][] = "desvio_ddr";
$proto2657["m_columns"][] = "id_saida";
$proto2657["m_columns"][] = "id_desvio";
$proto2657["m_columns"][] = "flg_info_centrocusto";
$proto2657["m_columns"][] = "id_painel_op";
$proto2657["m_columns"][] = "flg_show_mobile";
$proto2657["m_columns"][] = "id_provis";
$proto2657["m_columns"][] = "mc_addr";
$proto2657["m_columns"][] = "id_lang";
$obj = new SQLTable($proto2657);

$proto2656["m_table"] = $obj;
$proto2656["m_alias"] = "";
$proto2658=array();
$proto2658["m_sql"] = "";
$proto2658["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2658["m_column"]=$obj;
$proto2658["m_contained"] = array();
$proto2658["m_strCase"] = "";
$proto2658["m_havingmode"] = "0";
$proto2658["m_inBrackets"] = "0";
$proto2658["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2658);

$proto2656["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2656);

$proto2591["m_fromlist"][]=$obj;
$proto2591["m_groupby"] = array();
$proto2591["m_orderby"] = array();
												$proto2660=array();
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2660["m_column"]=$obj;
$proto2660["m_bAsc"] = 1;
$proto2660["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto2660);

$proto2591["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto2591);

$queryData_ipbx_ramais = $obj;
$tdataipbx_ramais[".sqlquery"] = $queryData_ipbx_ramais;



?>
