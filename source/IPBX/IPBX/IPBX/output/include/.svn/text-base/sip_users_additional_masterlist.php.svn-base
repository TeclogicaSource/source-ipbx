<?php
include(getabspath("include/sip_users_additional_settings.php"));

function DisplayMasterTableInfo_sip_users_additional($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="sip_users_additional";

//$strSQL = "SELECT  id_additional,  name,  trc_piloto,  mail,  call_forward,  flg_fax  FROM sip_users_additional  ";

$sqlHead="SELECT id_additional,  name,  trc_piloto,  mail,  call_forward,  flg_fax";
$sqlFrom="FROM sip_users_additional";
$sqlWhere="";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="sip_users")
{
		$where.= GetFullFieldName("name")."=".make_db_value("name",$keys[1-1]);
	$showKeys .= " Ramal: ".$keys[1-1];
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_additional"]));
	


//	trc_piloto - 
			$value="";
				$value=DisplayLookupWizard("trc_piloto",$data["trc_piloto"],$data,$keylink,MODE_LIST);
			$xt->assign("trc_piloto_mastervalue",$value);

//	mail - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink);
			$xt->assign("mail_mastervalue",$value);

//	call_forward - 
			$value="";
				$value=DisplayLookupWizard("call_forward",$data["call_forward"],$data,$keylink,MODE_LIST);
			$xt->assign("call_forward_mastervalue",$value);

//	flg_fax - Checkbox
			$value="";
				$value = GetData($data,"flg_fax", "Checkbox");
			$xt->assign("flg_fax_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("sip_users_additional_masterlist.htm");
}

// events

?>