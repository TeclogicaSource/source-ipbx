<?php
include(getabspath("include/sip_buddies_horario_settings.php"));

function DisplayMasterTableInfo_sip_buddies_horario($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="sip_buddies_horario";

//$strSQL = "SELECT  id_ramal_horario,  id,  id_horario  FROM sip_buddies_horario  ";

$sqlHead="SELECT id_ramal_horario,  id,  id_horario";
$sqlFrom="FROM sip_buddies_horario";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="sip_buddies")
{
		$where.= GetFullFieldName("id")."=".make_db_value("id",$keys[1-1]);
}
if($detailtable=="horario")
{
		$where.= GetFullFieldName("id_horario")."=".make_db_value("id_horario",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ramal_horario"]));
	

	$strTableName=$oldTableName;
	$xt->display("sip_buddies_horario_masterprint.htm");

}

// events

?>