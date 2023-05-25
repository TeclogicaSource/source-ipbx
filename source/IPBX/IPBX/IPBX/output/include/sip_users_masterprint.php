<?php
include(getabspath("include/sip_users_settings.php"));

function DisplayMasterTableInfo_sip_users($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="sip_users";

//$strSQL = "SELECT  id,  name,  `host`,  nat,  `type`,  accountcode,  amaflags,  `call-limit`,  callgroup,  callerid,  cancallforward,  canreinvite,  context,  defaultip,  dtmfmode,  fromuser,  fromdomain,  insecure,  `language`,  mailbox,  md5secret,  `deny`,  permit,  mask,  musiconhold,  pickupgroup,  qualify,  regexten,  restrictcid,  rtptimeout,  rtpholdtimeout,  secret,  setvar,  disallow,  allow,  fullcontact,  ipaddr,  port,  regserver,  regseconds,  lastms,  username,  defaultuser,  subscribecontext,  useragent  FROM sip_users  WHERE (name <> \"admin\")  ";

$sqlHead="SELECT id,  name,  `host`,  nat,  `type`,  accountcode,  amaflags,  `call-limit`,  callgroup,  callerid,  cancallforward,  canreinvite,  context,  defaultip,  dtmfmode,  fromuser,  fromdomain,  insecure,  `language`,  mailbox,  md5secret,  `deny`,  permit,  mask,  musiconhold,  pickupgroup,  qualify,  regexten,  restrictcid,  rtptimeout,  rtpholdtimeout,  secret,  setvar,  disallow,  allow,  fullcontact,  ipaddr,  port,  regserver,  regseconds,  lastms,  username,  defaultuser,  subscribecontext,  useragent";
$sqlFrom="FROM sip_users";
$sqlWhere="(name <> \"admin\")";
$sqlTail="";

$where="";

if($detailtable=="desvios_pabx")
{
		$where.= GetFullFieldName("name")."=".make_db_value("name",$keys[1-1]);
}
if($detailtable=="sip_users_additional")
{
		$where.= GetFullFieldName("name")."=".make_db_value("name",$keys[1-1]);
}
if(!$where)
{
	$strTableName=$oldTableName;
	return;
}
	$str = SecuritySQL("Export");
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	


//	id - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_PRINT);
			$xt->assign("id_mastervalue",$value);

//	name - 
			$value="";
				$value=DisplayLookupWizard("name",$data["name"],$data,$keylink,MODE_PRINT);
			$xt->assign("name_mastervalue",$value);

//	accountcode - 
			$value="";
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,$keylink,MODE_PRINT);
			$xt->assign("accountcode_mastervalue",$value);

//	call-limit - 
			$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_PRINT);
			$xt->assign("call_limit_mastervalue",$value);

//	callerid - 
			$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_PRINT);
			$xt->assign("callerid_mastervalue",$value);

//	context - 
			$value="";
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context".$keylink,"",MODE_PRINT);
			$xt->assign("context_mastervalue",$value);

//	pickupgroup - 
			$value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_PRINT);
			$xt->assign("pickupgroup_mastervalue",$value);

//	regexten - 
			$value="";
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten".$keylink,"",MODE_PRINT);
			$xt->assign("regexten_mastervalue",$value);

//	allow - 
			$value="";
				$value=DisplayLookupWizard("allow",$data["allow"],$data,$keylink,MODE_PRINT);
			$xt->assign("allow_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("sip_users_masterprint.htm");

}

// events

?>