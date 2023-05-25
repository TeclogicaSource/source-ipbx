<?php
include(getabspath("include/cc_receptivo_filas_horario_desv_settings.php"));

function DisplayMasterTableInfo_cc_receptivo_filas_horario_desv($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="cc_receptivo_filas_horario_desv";

//$strSQL = "SELECT id_desvio,   dsc_desvio  FROM cc_receptivo_filas_horario_desv ";

$sqlHead="SELECT id_desvio,   dsc_desvio";
$sqlFrom="FROM cc_receptivo_filas_horario_desv";
$sqlWhere="";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="cc_receptivo_filas_horario_desv_ramais")
{
		$where.= GetFullFieldName("id_desvio")."=".make_db_value("id_desvio",$keys[1-1]);
	$showKeys .= " Id Desvio: ".$keys[1-1];
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_desvio"]));
	


//	dsc_desvio - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dsc_desvio", ""),"field=dsc%5Fdesvio".$keylink);
			$xt->assign("dsc_desvio_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("cc_receptivo_filas_horario_desv_masterlist.htm");
}

// events

?>