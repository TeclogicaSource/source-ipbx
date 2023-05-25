<?php
include(getabspath("include/cc_menu_atend_settings.php"));

function DisplayMasterTableInfo_cc_menu_atend($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="cc_menu_atend";

//$strSQL = "SELECT  id_menu,  dsc_menu,  ramal_acesso,  arq_audio,  flg_dig_ramal,  nm_tentativas,  destino  FROM cc_menu_atend  ORDER BY dsc_menu  ";

$sqlHead="SELECT id_menu,  dsc_menu,  ramal_acesso,  arq_audio,  flg_dig_ramal,  nm_tentativas,  destino";
$sqlFrom="FROM cc_menu_atend";
$sqlWhere="";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="cc_menu_atend_item")
{
		$where.= GetFullFieldName("id_menu")."=".make_db_value("id_menu",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
	if(!$where)
	{
		$strTableName=$oldTableName;
		return;
	}
	$str = SecuritySQL("Search");
	if(strlen($str))
		$where.=" and ".$str;

	$strWhere=whereAdd($sqlWhere,$where);
	if(strlen($strWhere))
		$strWhere=" where ".$strWhere." ";
	$strSQL= $sqlHead.' '.$sqlFrom.$strWhere.$sqlTail;

//	$strSQL=AddWhere($strSQL,$where);
	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$data=db_fetch_array($rs);
	if(!$data)
	{
		$strTableName=$oldTableName;
		return;
	}
	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_menu"]));
	


//	dsc_menu - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dsc_menu", ""),"field=dsc%5Fmenu".$keylink);
			$xt->assign("dsc_menu_mastervalue",$value);

//	ramal_acesso - 
			$value="";
				$value=DisplayLookupWizard("ramal_acesso",$data["ramal_acesso"],$data,$keylink,MODE_LIST);
			$xt->assign("ramal_acesso_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("cc_menu_atend_masterlist.htm");
}

// events

?>