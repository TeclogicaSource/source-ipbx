<?php

//	field labels
$fieldLabelstroncos = array();
$fieldLabelstroncos["Portuguese(Brazil)"]=array();
$fieldLabelstroncos["Portuguese(Brazil)"]["id_tronco"] = "Id Tronco";
$fieldLabelstroncos["Portuguese(Brazil)"]["dsc_tronco"] = "Descrição do Tronco";
$fieldLabelstroncos["Portuguese(Brazil)"]["channel"] = "Channel";
$fieldLabelstroncos["Portuguese(Brazil)"]["id_interf"] = "Interface";
$fieldLabelstroncos["Portuguese(Brazil)"]["usuario"] = "Usuario";
$fieldLabelstroncos["Portuguese(Brazil)"]["senha"] = "Senha";
$fieldLabelstroncos["Portuguese(Brazil)"]["ip_interf"] = "HOST ou IP";
$fieldLabelstroncos["Portuguese(Brazil)"]["mcdu_inicio"] = "Faixa ramais início";
$fieldLabelstroncos["Portuguese(Brazil)"]["mcdu_fim"] = "Faixa ramais final";
$fieldLabelstroncos["Portuguese(Brazil)"]["tp_toques"] = "Tempo de Toques (Segundos)";
$fieldLabelstroncos["Portuguese(Brazil)"]["dig_rota"] = "Digito de Rota";
$fieldLabelstroncos["Portuguese(Brazil)"]["id_contrato"] = "Contrato";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_grava_ent"] = "Gravar ligações entrantes";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_grava_sai"] = "Gravar ligações saintes";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_pabx_remoto"] = "Discagem Pabx Remoto";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_cel_local"] = "Discagem Celular Local";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_local"] = "Discagem Local";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_fixo_ddd"] = "Discagem Fixo DDD";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_cel_ddd"] = "Discagem Celular DDD";
$fieldLabelstroncos["Portuguese(Brazil)"]["flg_ddi"] = "Discagem DDI";
$fieldLabelstroncos["Portuguese(Brazil)"]["dig_operadora"] = "Digito da Operadora";


$tdatatroncos=array();
	$tdatatroncos[".NumberOfChars"]=80; 
	$tdatatroncos[".ShortName"]="troncos";
	$tdatatroncos[".OwnerID"]="";
	$tdatatroncos[".OriginalTable"]="troncos";
	$tdatatroncos[".NCSearch"]=true;
	

$tdatatroncos[".shortTableName"] = "troncos";
$tdatatroncos[".dataSourceTable"] = "troncos";
$tdatatroncos[".nSecOptions"] = 0;
$tdatatroncos[".nLoginMethod"] = 1;
$tdatatroncos[".recsPerRowList"] = 1;	
$tdatatroncos[".tableGroupBy"] = "0";
$tdatatroncos[".dbType"] = 0;
$tdatatroncos[".mainTableOwnerID"] = "";
$tdatatroncos[".moveNext"] = 1;

$tdatatroncos[".listAjax"] = false;

	$tdatatroncos[".audit"] = true;

	$tdatatroncos[".locking"] = false;
	
$tdatatroncos[".listIcons"] = true;
$tdatatroncos[".edit"] = true;
$tdatatroncos[".copy"] = true;



$tdatatroncos[".delete"] = true;

$tdatatroncos[".showSimpleSearchOptions"] = false;

$tdatatroncos[".showSearchPanel"] = true;


$tdatatroncos[".isUseAjaxSuggest"] = true;

$tdatatroncos[".rowHighlite"] = true;

$tdatatroncos[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatatroncos[".arrKeyFields"][] = "id_tronco";

// use datepicker for search panel
$tdatatroncos[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatatroncos[".isUseTimeForSearch"] = false;






$tdatatroncos[".isUseInlineJs"] = $tdatatroncos[".isUseInlineAdd"] || $tdatatroncos[".isUseInlineEdit"];

$tdatatroncos[".allSearchFields"] = array();



$tdatatroncos[".isDynamicPerm"] = true;

	

$tdatatroncos[".isDisplayLoading"] = true;

$tdatatroncos[".isResizeColumns"] = false;


$tdatatroncos[".createLoginPage"] = true;


 	




$tdatatroncos[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatatroncos[".strOrderBy"] = $gstrOrderBy;
	
$tdatatroncos[".orderindexes"] = array();

$tdatatroncos[".sqlHead"] = "SELECT id_tronco,   dsc_tronco,   channel,   id_interf,   usuario,   senha,   ip_interf,   mcdu_inicio,   mcdu_fim,   tp_toques,   dig_rota,   id_contrato,   flg_grava_ent,   flg_grava_sai,   flg_pabx_remoto,   flg_cel_local,   flg_local,   flg_fixo_ddd,   flg_cel_ddd,   flg_ddi,   dig_operadora";

$tdatatroncos[".sqlFrom"] = "FROM troncos";

$tdatatroncos[".sqlWhereExpr"] = "";

$tdatatroncos[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_tronco";
	$tdatatroncos[".Keys"]=$tableKeys;

	
//	id_tronco
	$fdata = array();
	$fdata["strName"] = "id_tronco";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Id Tronco"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_tronco";
		$fdata["FullName"]= "id_tronco";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatatroncos["id_tronco"]=$fdata;
	
//	dsc_tronco
	$fdata = array();
	$fdata["strName"] = "dsc_tronco";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Descrição do Tronco"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_tronco";
		$fdata["FullName"]= "dsc_tronco";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatroncos["dsc_tronco"]=$fdata;
	
//	channel
	$fdata = array();
	$fdata["strName"] = "channel";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Channel"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "channel";
		$fdata["FullName"]= "channel";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
											$tdatatroncos["channel"]=$fdata;
	
//	id_interf
	$fdata = array();
	$fdata["strName"] = "id_interf";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Interface"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_interf";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_interf";
				$fdata["LookupTable"]="interface";
	$fdata["LookupOrderBy"]="dsc_interf";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_interf";
		$fdata["FullName"]= "id_interf";
						$fdata["Index"]= 4;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatroncos["id_interf"]=$fdata;
	
//	usuario
	$fdata = array();
	$fdata["strName"] = "usuario";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Usuario"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "usuario";
		$fdata["FullName"]= "usuario";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=50";
	
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["usuario"]=$fdata;
	
//	senha
	$fdata = array();
	$fdata["strName"] = "senha";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Senha"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "senha";
		$fdata["FullName"]= "senha";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=30";
	
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["senha"]=$fdata;
	
//	ip_interf
	$fdata = array();
	$fdata["strName"] = "ip_interf";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="HOST ou IP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_interf";
		$fdata["FullName"]= "ip_interf";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["ip_interf"]=$fdata;
	
//	mcdu_inicio
	$fdata = array();
	$fdata["strName"] = "mcdu_inicio";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Faixa ramais início"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mcdu_inicio";
		$fdata["FullName"]= "mcdu_inicio";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=4";
			$fdata["EditParams"].= " size=4";
	
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["mcdu_inicio"]=$fdata;
	
//	mcdu_fim
	$fdata = array();
	$fdata["strName"] = "mcdu_fim";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Faixa ramais final"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "mcdu_fim";
		$fdata["FullName"]= "mcdu_fim";
						$fdata["Index"]= 9;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=4";
			$fdata["EditParams"].= " size=4";
	
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["mcdu_fim"]=$fdata;
	
//	tp_toques
	$fdata = array();
	$fdata["strName"] = "tp_toques";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Tempo de Toques (Segundos)"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="15";
	$fdata["LookupValues"][]="20";
	$fdata["LookupValues"][]="25";
	$fdata["LookupValues"][]="30";
	$fdata["LookupValues"][]="35";
	$fdata["LookupValues"][]="40";
	$fdata["LookupValues"][]="45";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "tp_toques";
		$fdata["FullName"]= "tp_toques";
						$fdata["Index"]= 10;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["tp_toques"]=$fdata;
	
//	dig_rota
	$fdata = array();
	$fdata["strName"] = "dig_rota";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Digito de Rota"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=0;
	
				
					$fdata["LookupValues"]=array();
	$fdata["LookupValues"][]="0";
	$fdata["LookupValues"][]="1";
	$fdata["LookupValues"][]="2";
	$fdata["LookupValues"][]="3";
	$fdata["LookupValues"][]="4";
	$fdata["LookupValues"][]="5";
	$fdata["LookupValues"][]="6";
	$fdata["LookupValues"][]="7";
	$fdata["LookupValues"][]="8";
	$fdata["LookupValues"][]="9";
			
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dig_rota";
		$fdata["FullName"]= "dig_rota";
						$fdata["Index"]= 11;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["dig_rota"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Contrato"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="id_contrato";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="nm_operadora";
				$fdata["LookupTable"]="contrato_trad";
	$fdata["LookupOrderBy"]="nm_operadora";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 12;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatatroncos["id_contrato"]=$fdata;
	
//	flg_grava_ent
	$fdata = array();
	$fdata["strName"] = "flg_grava_ent";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Gravar ligações entrantes"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_grava_ent";
		$fdata["FullName"]= "flg_grava_ent";
						$fdata["Index"]= 13;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_grava_ent"]=$fdata;
	
//	flg_grava_sai
	$fdata = array();
	$fdata["strName"] = "flg_grava_sai";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Gravar ligações saintes"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_grava_sai";
		$fdata["FullName"]= "flg_grava_sai";
						$fdata["Index"]= 14;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_grava_sai"]=$fdata;
	
//	flg_pabx_remoto
	$fdata = array();
	$fdata["strName"] = "flg_pabx_remoto";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem Pabx Remoto"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_pabx_remoto";
		$fdata["FullName"]= "flg_pabx_remoto";
						$fdata["Index"]= 15;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_pabx_remoto"]=$fdata;
	
//	flg_cel_local
	$fdata = array();
	$fdata["strName"] = "flg_cel_local";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem Celular Local"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_cel_local";
		$fdata["FullName"]= "flg_cel_local";
						$fdata["Index"]= 16;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_cel_local"]=$fdata;
	
//	flg_local
	$fdata = array();
	$fdata["strName"] = "flg_local";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem Local"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_local";
		$fdata["FullName"]= "flg_local";
						$fdata["Index"]= 17;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_local"]=$fdata;
	
//	flg_fixo_ddd
	$fdata = array();
	$fdata["strName"] = "flg_fixo_ddd";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem Fixo DDD"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_fixo_ddd";
		$fdata["FullName"]= "flg_fixo_ddd";
						$fdata["Index"]= 18;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_fixo_ddd"]=$fdata;
	
//	flg_cel_ddd
	$fdata = array();
	$fdata["strName"] = "flg_cel_ddd";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem Celular DDD"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_cel_ddd";
		$fdata["FullName"]= "flg_cel_ddd";
						$fdata["Index"]= 19;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_cel_ddd"]=$fdata;
	
//	flg_ddi
	$fdata = array();
	$fdata["strName"] = "flg_ddi";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Discagem DDI"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Checkbox";
	$fdata["ViewFormat"]= "Checkbox";
	
	

		
			
	$fdata["GoodName"]= "flg_ddi";
		$fdata["FullName"]= "flg_ddi";
						$fdata["Index"]= 20;
	
			
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["flg_ddi"]=$fdata;
	
//	dig_operadora
	$fdata = array();
	$fdata["strName"] = "dig_operadora";
	$fdata["ownerTable"] = "troncos";
		$fdata["Label"]="Digito da Operadora"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dig_operadora";
		$fdata["FullName"]= "dig_operadora";
						$fdata["Index"]= 21;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=3";
			$fdata["EditParams"].= " size=2";
	
				$fdata["FieldPermissions"]=true;
								$tdatatroncos["dig_operadora"]=$fdata;

	
$tables_data["troncos"]=&$tdatatroncos;
$field_labels["troncos"] = &$fieldLabelstroncos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["troncos"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["troncos"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1220=array();
$proto1220["m_strHead"] = "SELECT";
$proto1220["m_strFieldList"] = "id_tronco,   dsc_tronco,   channel,   id_interf,   usuario,   senha,   ip_interf,   mcdu_inicio,   mcdu_fim,   tp_toques,   dig_rota,   id_contrato,   flg_grava_ent,   flg_grava_sai,   flg_pabx_remoto,   flg_cel_local,   flg_local,   flg_fixo_ddd,   flg_cel_ddd,   flg_ddi,   dig_operadora";
$proto1220["m_strFrom"] = "FROM troncos";
$proto1220["m_strWhere"] = "";
$proto1220["m_strOrderBy"] = "";
$proto1220["m_strTail"] = "";
$proto1221=array();
$proto1221["m_sql"] = "";
$proto1221["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1221["m_column"]=$obj;
$proto1221["m_contained"] = array();
$proto1221["m_strCase"] = "";
$proto1221["m_havingmode"] = "0";
$proto1221["m_inBrackets"] = "0";
$proto1221["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1221);

$proto1220["m_where"] = $obj;
$proto1223=array();
$proto1223["m_sql"] = "";
$proto1223["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1223["m_column"]=$obj;
$proto1223["m_contained"] = array();
$proto1223["m_strCase"] = "";
$proto1223["m_havingmode"] = "0";
$proto1223["m_inBrackets"] = "0";
$proto1223["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1223);

$proto1220["m_having"] = $obj;
$proto1220["m_fieldlist"] = array();
						$proto1225=array();
			$obj = new SQLField(array(
	"m_strName" => "id_tronco",
	"m_strTable" => "troncos"
));

$proto1225["m_expr"]=$obj;
$proto1225["m_alias"] = "";
$obj = new SQLFieldListItem($proto1225);

$proto1220["m_fieldlist"][]=$obj;
						$proto1227=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_tronco",
	"m_strTable" => "troncos"
));

$proto1227["m_expr"]=$obj;
$proto1227["m_alias"] = "";
$obj = new SQLFieldListItem($proto1227);

$proto1220["m_fieldlist"][]=$obj;
						$proto1229=array();
			$obj = new SQLField(array(
	"m_strName" => "channel",
	"m_strTable" => "troncos"
));

$proto1229["m_expr"]=$obj;
$proto1229["m_alias"] = "";
$obj = new SQLFieldListItem($proto1229);

$proto1220["m_fieldlist"][]=$obj;
						$proto1231=array();
			$obj = new SQLField(array(
	"m_strName" => "id_interf",
	"m_strTable" => "troncos"
));

$proto1231["m_expr"]=$obj;
$proto1231["m_alias"] = "";
$obj = new SQLFieldListItem($proto1231);

$proto1220["m_fieldlist"][]=$obj;
						$proto1233=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "troncos"
));

$proto1233["m_expr"]=$obj;
$proto1233["m_alias"] = "";
$obj = new SQLFieldListItem($proto1233);

$proto1220["m_fieldlist"][]=$obj;
						$proto1235=array();
			$obj = new SQLField(array(
	"m_strName" => "senha",
	"m_strTable" => "troncos"
));

$proto1235["m_expr"]=$obj;
$proto1235["m_alias"] = "";
$obj = new SQLFieldListItem($proto1235);

$proto1220["m_fieldlist"][]=$obj;
						$proto1237=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_interf",
	"m_strTable" => "troncos"
));

$proto1237["m_expr"]=$obj;
$proto1237["m_alias"] = "";
$obj = new SQLFieldListItem($proto1237);

$proto1220["m_fieldlist"][]=$obj;
						$proto1239=array();
			$obj = new SQLField(array(
	"m_strName" => "mcdu_inicio",
	"m_strTable" => "troncos"
));

$proto1239["m_expr"]=$obj;
$proto1239["m_alias"] = "";
$obj = new SQLFieldListItem($proto1239);

$proto1220["m_fieldlist"][]=$obj;
						$proto1241=array();
			$obj = new SQLField(array(
	"m_strName" => "mcdu_fim",
	"m_strTable" => "troncos"
));

$proto1241["m_expr"]=$obj;
$proto1241["m_alias"] = "";
$obj = new SQLFieldListItem($proto1241);

$proto1220["m_fieldlist"][]=$obj;
						$proto1243=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_toques",
	"m_strTable" => "troncos"
));

$proto1243["m_expr"]=$obj;
$proto1243["m_alias"] = "";
$obj = new SQLFieldListItem($proto1243);

$proto1220["m_fieldlist"][]=$obj;
						$proto1245=array();
			$obj = new SQLField(array(
	"m_strName" => "dig_rota",
	"m_strTable" => "troncos"
));

$proto1245["m_expr"]=$obj;
$proto1245["m_alias"] = "";
$obj = new SQLFieldListItem($proto1245);

$proto1220["m_fieldlist"][]=$obj;
						$proto1247=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "troncos"
));

$proto1247["m_expr"]=$obj;
$proto1247["m_alias"] = "";
$obj = new SQLFieldListItem($proto1247);

$proto1220["m_fieldlist"][]=$obj;
						$proto1249=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_grava_ent",
	"m_strTable" => "troncos"
));

$proto1249["m_expr"]=$obj;
$proto1249["m_alias"] = "";
$obj = new SQLFieldListItem($proto1249);

$proto1220["m_fieldlist"][]=$obj;
						$proto1251=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_grava_sai",
	"m_strTable" => "troncos"
));

$proto1251["m_expr"]=$obj;
$proto1251["m_alias"] = "";
$obj = new SQLFieldListItem($proto1251);

$proto1220["m_fieldlist"][]=$obj;
						$proto1253=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_pabx_remoto",
	"m_strTable" => "troncos"
));

$proto1253["m_expr"]=$obj;
$proto1253["m_alias"] = "";
$obj = new SQLFieldListItem($proto1253);

$proto1220["m_fieldlist"][]=$obj;
						$proto1255=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_cel_local",
	"m_strTable" => "troncos"
));

$proto1255["m_expr"]=$obj;
$proto1255["m_alias"] = "";
$obj = new SQLFieldListItem($proto1255);

$proto1220["m_fieldlist"][]=$obj;
						$proto1257=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_local",
	"m_strTable" => "troncos"
));

$proto1257["m_expr"]=$obj;
$proto1257["m_alias"] = "";
$obj = new SQLFieldListItem($proto1257);

$proto1220["m_fieldlist"][]=$obj;
						$proto1259=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_fixo_ddd",
	"m_strTable" => "troncos"
));

$proto1259["m_expr"]=$obj;
$proto1259["m_alias"] = "";
$obj = new SQLFieldListItem($proto1259);

$proto1220["m_fieldlist"][]=$obj;
						$proto1261=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_cel_ddd",
	"m_strTable" => "troncos"
));

$proto1261["m_expr"]=$obj;
$proto1261["m_alias"] = "";
$obj = new SQLFieldListItem($proto1261);

$proto1220["m_fieldlist"][]=$obj;
						$proto1263=array();
			$obj = new SQLField(array(
	"m_strName" => "flg_ddi",
	"m_strTable" => "troncos"
));

$proto1263["m_expr"]=$obj;
$proto1263["m_alias"] = "";
$obj = new SQLFieldListItem($proto1263);

$proto1220["m_fieldlist"][]=$obj;
						$proto1265=array();
			$obj = new SQLField(array(
	"m_strName" => "dig_operadora",
	"m_strTable" => "troncos"
));

$proto1265["m_expr"]=$obj;
$proto1265["m_alias"] = "";
$obj = new SQLFieldListItem($proto1265);

$proto1220["m_fieldlist"][]=$obj;
$proto1220["m_fromlist"] = array();
												$proto1267=array();
$proto1267["m_link"] = "SQLL_MAIN";
			$proto1268=array();
$proto1268["m_strName"] = "troncos";
$proto1268["m_columns"] = array();
$proto1268["m_columns"][] = "id_tronco";
$proto1268["m_columns"][] = "dsc_tronco";
$proto1268["m_columns"][] = "channel";
$proto1268["m_columns"][] = "id_interf";
$proto1268["m_columns"][] = "usuario";
$proto1268["m_columns"][] = "senha";
$proto1268["m_columns"][] = "ip_interf";
$proto1268["m_columns"][] = "mcdu_inicio";
$proto1268["m_columns"][] = "mcdu_fim";
$proto1268["m_columns"][] = "tp_toques";
$proto1268["m_columns"][] = "dig_rota";
$proto1268["m_columns"][] = "id_contrato";
$proto1268["m_columns"][] = "flg_grava_ent";
$proto1268["m_columns"][] = "flg_grava_sai";
$proto1268["m_columns"][] = "flg_pabx_remoto";
$proto1268["m_columns"][] = "flg_cel_local";
$proto1268["m_columns"][] = "flg_local";
$proto1268["m_columns"][] = "flg_fixo_ddd";
$proto1268["m_columns"][] = "flg_cel_ddd";
$proto1268["m_columns"][] = "flg_ddi";
$proto1268["m_columns"][] = "dig_operadora";
$proto1268["m_columns"][] = "prioridade";
$proto1268["m_columns"][] = "id_tp_interf";
$obj = new SQLTable($proto1268);

$proto1267["m_table"] = $obj;
$proto1267["m_alias"] = "";
$proto1269=array();
$proto1269["m_sql"] = "";
$proto1269["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1269["m_column"]=$obj;
$proto1269["m_contained"] = array();
$proto1269["m_strCase"] = "";
$proto1269["m_havingmode"] = "0";
$proto1269["m_inBrackets"] = "0";
$proto1269["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1269);

$proto1267["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1267);

$proto1220["m_fromlist"][]=$obj;
$proto1220["m_groupby"] = array();
$proto1220["m_orderby"] = array();
$obj = new SQLQuery($proto1220);

$queryData_troncos = $obj;
$tdatatroncos[".sqlquery"] = $queryData_troncos;



?>
