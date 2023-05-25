<?php
include(getabspath("include/ipbx_pesquisa_ura_rev_settings.php"));

function DisplayMasterTableInfo_ipbx_pesquisa_ura_rev($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="ipbx_pesquisa_ura_rev";

//$strSQL = "SELECT id_pesquisa,   dsc_pesquisa,   arq_audio  FROM ipbx_pesquisa_ura_rev ";

$sqlHead="SELECT id_pesquisa,   dsc_pesquisa,   arq_audio";
$sqlFrom="FROM ipbx_pesquisa_ura_rev";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="ipbx_ura_rev_msg")
{
		$where.= GetFullFieldName("id_pesquisa")."=".make_db_value("id_pesquisa",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_pesquisa"]));
	

	$strTableName=$oldTableName;
	$xt->display("ipbx_pesquisa_ura_rev_masterprint.htm");

}

// events

?>