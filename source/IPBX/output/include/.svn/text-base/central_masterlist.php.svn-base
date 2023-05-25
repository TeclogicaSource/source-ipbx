<?php
include(getabspath("include/central_settings.php"));

function DisplayMasterTableInfo_central($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="central";

//$strSQL = "SELECT id_central,   dsc_conf_central,   flg_ativa,   pers_params  FROM central ";

$sqlHead="SELECT id_central,   dsc_conf_central,   flg_ativa,   pers_params";
$sqlFrom="FROM central";
$sqlWhere="";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="ipbx_interf_vono")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_fxs")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_e1")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_gsm")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_mslync")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_sip")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_voxip")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_callman")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_fxo")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
	$showKeys .= " Identificaчуo: ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable=="ipbx_interf_sip_generica")
{
		$where.= GetFullFieldName("id_central")."=".make_db_value("id_central",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_central"]));
	

	$strTableName=$oldTableName;
	$xt->display("central_masterlist.htm");
}

// events

?>