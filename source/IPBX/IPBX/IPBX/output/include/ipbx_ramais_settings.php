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
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["desvio"] = "Desvio";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_pesquisa"] = "Pesquisa";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["desvio_ddr"] = "Desvio Externo (DDR)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_saida"] = "Identificação Chamada (callerid)";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_desvio"] = " Desvio pré-configurado";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["flg_info_centrocusto"] = " Informar centro de custo?";
$fieldLabelsipbx_ramais["Portuguese(Brazil)"]["id_painel_op"] = "Painel de Operações";


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
$tdataipbx_ramais[".buttonHandlers_list"][] = "buttonevent_Restaurar_Ramal";

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
$tdataipbx_ramais[".globSearchFields"][] = "mail";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("mail", $tdataipbx_ramais[".allSearchFields"]))
{
	$tdataipbx_ramais[".allSearchFields"][] = "mail";	
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

$tdataipbx_ramais[".sqlHead"] = "SELECT id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op";

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
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
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
		$fdata["Label"]="Desvio"; 
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
		$fdata["Label"]="Desvio Externo (DDR)"; 
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
		$fdata["Label"]=" Desvio pré-configurado"; 
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

	
$tables_data["ipbx_ramais"]=&$tdataipbx_ramais;
$field_labels["ipbx_ramais"] = &$fieldLabelsipbx_ramais;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ramais"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ramais"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2336=array();
$proto2336["m_strHead"] = "SELECT";
$proto2336["m_strFieldList"] = "id,  name,  accountcode,  `call-limit`,  callgroup,  callerid,  context,  secret,  allow,  id_horario,  mail,  grava_chamada,  Transbordo,  id_interf,  ident_interf,  tp_ramal,  tp_chamada,  pickupgroup,  flg_cadeado,  desvio,  id_pesquisa,  desvio_ddr,  id_saida,  id_desvio,  flg_info_centrocusto,  id_painel_op";
$proto2336["m_strFrom"] = "FROM ipbx_ramais";
$proto2336["m_strWhere"] = "(name <> \"admin\")";
$proto2336["m_strOrderBy"] = "ORDER BY name";
$proto2336["m_strTail"] = "";
$proto2337=array();
$proto2337["m_sql"] = "name <> \"admin\"";
$proto2337["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2337["m_column"]=$obj;
$proto2337["m_contained"] = array();
$proto2337["m_strCase"] = "<> \"admin\"";
$proto2337["m_havingmode"] = "0";
$proto2337["m_inBrackets"] = "0";
$proto2337["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2337);

$proto2336["m_where"] = $obj;
$proto2339=array();
$proto2339["m_sql"] = "";
$proto2339["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2339["m_column"]=$obj;
$proto2339["m_contained"] = array();
$proto2339["m_strCase"] = "";
$proto2339["m_havingmode"] = "0";
$proto2339["m_inBrackets"] = "0";
$proto2339["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2339);

$proto2336["m_having"] = $obj;
$proto2336["m_fieldlist"] = array();
						$proto2341=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "ipbx_ramais"
));

$proto2341["m_expr"]=$obj;
$proto2341["m_alias"] = "";
$obj = new SQLFieldListItem($proto2341);

$proto2336["m_fieldlist"][]=$obj;
						$proto2343=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2343["m_expr"]=$obj;
$proto2343["m_alias"] = "";
$obj = new SQLFieldListItem($proto2343);

$proto2336["m_fieldlist"][]=$obj;
						$proto2345=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "ipbx_ramais"
));

$proto2345["m_expr"]=$obj;
$proto2345["m_alias"] = "";
$obj = new SQLFieldListItem($proto2345);

$proto2336["m_fieldlist"][]=$obj;
						$proto2347=array();
			$obj = new SQLField(array(
	"m_strName" => "call-limit",
	"m_strTable" => "ipbx_ramais"
));

$proto2347["m_expr"]=$obj;
$proto2347["m_alias"] = "";
$obj = new SQLFieldListItem($proto2347);

$proto2336["m_fieldlist"][]=$obj;
						$proto2349=array();
			$obj = new SQLField(array(
	"m_strName" => "callgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto2349["m_expr"]=$obj;
$proto2349["m_alias"] = "";
$obj = new SQLFieldListItem($proto2349);

$proto2336["m_fieldlist"][]=$obj;
						$proto2351=array();
			$obj = new SQLField(array(
	"m_strName" => "callerid",
	"m_strTable" => "ipbx_ramais"
));

$proto2351["m_expr"]=$obj;
$proto2351["m_alias"] = "";
$obj = new SQLFieldListItem($proto2351);

$proto2336["m_fieldlist"][]=$obj;
						$proto2353=array();
			$obj = new SQLField(array(
	"m_strName" => "context",
	"m_strTable" => "ipbx_ramais"
));

$proto2353["m_expr"]=$obj;
$proto2353["m_alias"] = "";
$obj = new SQLFieldListItem($proto2353);

$proto2336["m_fieldlist"][]=$obj;
						$proto2355=array();
			$obj = new SQLField(array(
	"m_strName" => "secret",
	"m_strTable" => "ipbx_ramais"
));

$proto2355["m_expr"]=$obj;
$proto2355["m_alias"] = "";
$obj = new SQLFieldListItem($proto2355);

$proto2336["m_fieldlist"][]=$obj;
						$proto2357=array();
			$obj = new SQLField(array(
	"m_strName" => "allow",
	"m_strTable" => "ipbx_ramais"
));

$proto2357["m_expr"]=$obj;
$proto2357["m_alias"] = "";
$obj = new SQLFieldListItem($proto2357);

$proto2336["m_fieldlist"][]=$obj;
						$proto2359=array();
			$obj = new SQLField(array(
	"m_strName" => "id_horario",
	"m_strTable" => "ipbx_ramais"
));

$proto2359["m_expr"]=$obj;
$proto2359["m_alias"] = "";
$obj = new SQLFieldListItem($proto2359);

$proto2336["m_fieldlist"][]=$obj;
						$proto2361=array();
			$obj = new SQLField(array(
	"m_strName" => "mail",
	"m_strTable" => "ipbx_ramais"
));

$proto2361["m_expr"]=$obj;
$proto2361["m_alias"] = "";
$obj = new SQLFieldListItem($proto2361);

$proto2336["m_fieldlist"][]=$obj;
						$proto2363=array();
			$obj = new SQLField(array(
	"m_strName" => "grava_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto2363["m_expr"]=$obj;
$proto2363["m_alias"] = "";
$obj = new SQLFieldListItem($proto2363);

$proto2336["m_fieldlist"][]=$obj;
						$proto2365=array();
			$obj = new SQLField(array(
	"m_strName" => "Transbordo",
	"m_strTable" => "ipbx_ramais"
));

$proto2365["m_expr"]=$obj;
$proto2365["m_alias"] = "";
$obj = new SQLFieldListItem($proto2365);

$proto2336["m_fieldlist"][]=$obj;
						$proto2367=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto2367["m_expr"]=$obj;
$proto2367["m_alias"] = "";
$obj = new SQLFieldListItem($proto2367);

$proto2336["m_fieldlist"][]=$obj;
						$proto2369=array();
			$obj = new SQLField(array(
	"m_strName" => "ident_interf",
	"m_strTable" => "ipbx_ramais"
));

$proto2369["m_expr"]=$obj;
$proto2369["m_alias"] = "";
$obj = new SQLFieldListItem($proto2369);

$proto2336["m_fieldlist"][]=$obj;
						$proto2371=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_ramal",
	"m_strTable" => "ipbx_ramais"
));

$proto2371["m_expr"]=$obj;
$proto2371["m_alias"] = "";
$obj = new SQLFieldListItem($proto2371);

$proto2336["m_fieldlist"][]=$obj;
						$proto2373=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_chamada",
	"m_strTable" => "ipbx_ramais"
));

$proto2373["m_expr"]=$obj;
$proto2373["m_alias"] = "";
$obj = new SQLFieldListItem($proto2373);

$proto2336["m_fieldlist"][]=$obj;
						$proto2375=array();
			$obj = new SQLField(array(
	"m_strName" => "pickupgroup",
	"m_strTable" => "ipbx_ramais"
));

$proto2375["m_expr"]=$obj;
$proto2375["m_alias"] = "";
$obj = new SQLFieldListItem($proto2375);

$proto2336["m_fieldlist"][]=$obj;
						$proto2377=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_cadeado",
	"m_strTable" => "ipbx_ramais"
));

$proto2377["m_expr"]=$obj;
$proto2377["m_alias"] = "";
$obj = new SQLFieldListItem($proto2377);

$proto2336["m_fieldlist"][]=$obj;
						$proto2379=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto2379["m_expr"]=$obj;
$proto2379["m_alias"] = "";
$obj = new SQLFieldListItem($proto2379);

$proto2336["m_fieldlist"][]=$obj;
						$proto2381=array();
			$obj = new SQLField(array(
	"m_strName" => "id_pesquisa",
	"m_strTable" => "ipbx_ramais"
));

$proto2381["m_expr"]=$obj;
$proto2381["m_alias"] = "";
$obj = new SQLFieldListItem($proto2381);

$proto2336["m_fieldlist"][]=$obj;
						$proto2383=array();
			$obj = new SQLField(array(
	"m_strName" => "desvio_ddr",
	"m_strTable" => "ipbx_ramais"
));

$proto2383["m_expr"]=$obj;
$proto2383["m_alias"] = "";
$obj = new SQLFieldListItem($proto2383);

$proto2336["m_fieldlist"][]=$obj;
						$proto2385=array();
			$obj = new SQLField(array(
	"m_strName" => "id_saida",
	"m_strTable" => "ipbx_ramais"
));

$proto2385["m_expr"]=$obj;
$proto2385["m_alias"] = "";
$obj = new SQLFieldListItem($proto2385);

$proto2336["m_fieldlist"][]=$obj;
						$proto2387=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desvio",
	"m_strTable" => "ipbx_ramais"
));

$proto2387["m_expr"]=$obj;
$proto2387["m_alias"] = "";
$obj = new SQLFieldListItem($proto2387);

$proto2336["m_fieldlist"][]=$obj;
						$proto2389=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_info_centrocusto",
	"m_strTable" => "ipbx_ramais"
));

$proto2389["m_expr"]=$obj;
$proto2389["m_alias"] = "";
$obj = new SQLFieldListItem($proto2389);

$proto2336["m_fieldlist"][]=$obj;
						$proto2391=array();
			$obj = new SQLField(array(
	"m_strName" => "id_painel_op",
	"m_strTable" => "ipbx_ramais"
));

$proto2391["m_expr"]=$obj;
$proto2391["m_alias"] = "";
$obj = new SQLFieldListItem($proto2391);

$proto2336["m_fieldlist"][]=$obj;
$proto2336["m_fromlist"] = array();
												$proto2393=array();
$proto2393["m_link"] = "SQLL_MAIN";
			$proto2394=array();
$proto2394["m_strName"] = "ipbx_ramais";
$proto2394["m_columns"] = array();
$proto2394["m_columns"][] = "id";
$proto2394["m_columns"][] = "name";
$proto2394["m_columns"][] = "host";
$proto2394["m_columns"][] = "nat";
$proto2394["m_columns"][] = "type";
$proto2394["m_columns"][] = "accountcode";
$proto2394["m_columns"][] = "amaflags";
$proto2394["m_columns"][] = "call-limit";
$proto2394["m_columns"][] = "callgroup";
$proto2394["m_columns"][] = "callerid";
$proto2394["m_columns"][] = "cancallforward";
$proto2394["m_columns"][] = "canreinvite";
$proto2394["m_columns"][] = "context";
$proto2394["m_columns"][] = "defaultip";
$proto2394["m_columns"][] = "dtmfmode";
$proto2394["m_columns"][] = "fromuser";
$proto2394["m_columns"][] = "fromdomain";
$proto2394["m_columns"][] = "insecure";
$proto2394["m_columns"][] = "language";
$proto2394["m_columns"][] = "mailbox";
$proto2394["m_columns"][] = "md5secret";
$proto2394["m_columns"][] = "deny";
$proto2394["m_columns"][] = "permit";
$proto2394["m_columns"][] = "mask";
$proto2394["m_columns"][] = "musiconhold";
$proto2394["m_columns"][] = "pickupgroup";
$proto2394["m_columns"][] = "qualify";
$proto2394["m_columns"][] = "rtcachefriends";
$proto2394["m_columns"][] = "regexten";
$proto2394["m_columns"][] = "restrictcid";
$proto2394["m_columns"][] = "rtptimeout";
$proto2394["m_columns"][] = "rtpholdtimeout";
$proto2394["m_columns"][] = "secret";
$proto2394["m_columns"][] = "setvar";
$proto2394["m_columns"][] = "disallow";
$proto2394["m_columns"][] = "allow";
$proto2394["m_columns"][] = "fullcontact";
$proto2394["m_columns"][] = "ipaddr";
$proto2394["m_columns"][] = "port";
$proto2394["m_columns"][] = "regserver";
$proto2394["m_columns"][] = "regseconds";
$proto2394["m_columns"][] = "lastms";
$proto2394["m_columns"][] = "username";
$proto2394["m_columns"][] = "defaultuser";
$proto2394["m_columns"][] = "subscribecontext";
$proto2394["m_columns"][] = "useragent";
$proto2394["m_columns"][] = "gateway";
$proto2394["m_columns"][] = "id_horario";
$proto2394["m_columns"][] = "mail";
$proto2394["m_columns"][] = "grava_chamada";
$proto2394["m_columns"][] = "tp_ramal";
$proto2394["m_columns"][] = "Transbordo";
$proto2394["m_columns"][] = "id_interf";
$proto2394["m_columns"][] = "ident_interf";
$proto2394["m_columns"][] = "tp_chamada";
$proto2394["m_columns"][] = "flg_cadeado";
$proto2394["m_columns"][] = "desvio";
$proto2394["m_columns"][] = "id_pesquisa";
$proto2394["m_columns"][] = "desvio_ddr";
$proto2394["m_columns"][] = "id_saida";
$proto2394["m_columns"][] = "id_desvio";
$proto2394["m_columns"][] = "flg_info_centrocusto";
$proto2394["m_columns"][] = "id_painel_op";
$obj = new SQLTable($proto2394);

$proto2393["m_table"] = $obj;
$proto2393["m_alias"] = "";
$proto2395=array();
$proto2395["m_sql"] = "";
$proto2395["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2395["m_column"]=$obj;
$proto2395["m_contained"] = array();
$proto2395["m_strCase"] = "";
$proto2395["m_havingmode"] = "0";
$proto2395["m_inBrackets"] = "0";
$proto2395["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2395);

$proto2393["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2393);

$proto2336["m_fromlist"][]=$obj;
$proto2336["m_groupby"] = array();
$proto2336["m_orderby"] = array();
												$proto2397=array();
						$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_ramais"
));

$proto2397["m_column"]=$obj;
$proto2397["m_bAsc"] = 1;
$proto2397["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto2397);

$proto2336["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto2336);

$queryData_ipbx_ramais = $obj;
$tdataipbx_ramais[".sqlquery"] = $queryData_ipbx_ramais;



?>
