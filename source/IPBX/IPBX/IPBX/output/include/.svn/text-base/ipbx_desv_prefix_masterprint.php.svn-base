<?php
include(getabspath("include/ipbx_desv_prefix_settings.php"));

function DisplayMasterTableInfo_ipbx_desv_prefix($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="ipbx_desv_prefix";

//$strSQL = "SELECT id_desv_prefix,   dsc_grp_pref  FROM ipbx_desv_prefix ";

$sqlHead="SELECT id_desv_prefix,   dsc_grp_pref";
$sqlFrom="FROM ipbx_desv_prefix";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="ipbx_desv_prefix_item")
{
		$where.= GetFullFieldName("id_desv_prefix")."=".make_db_value("id_desv_prefix",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_desv_prefix"]));
	


//	dsc_grp_pref - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dsc_grp_pref", ""),"field=dsc%5Fgrp%5Fpref".$keylink,"",MODE_PRINT);
			$xt->assign("dsc_grp_pref_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("ipbx_desv_prefix_masterprint.htm");

}

// events

?>