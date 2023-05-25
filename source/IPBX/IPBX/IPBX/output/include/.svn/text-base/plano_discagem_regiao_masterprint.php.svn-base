<?php
include(getabspath("include/plano_discagem_regiao_settings.php"));

function DisplayMasterTableInfo_plano_discagem_regiao($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="plano_discagem_regiao";

//$strSQL = "SELECT id_regiao,   regiao,   id_tronco,   tp_destino  FROM plano_discagem_regiao ";

$sqlHead="SELECT id_regiao,   regiao,   id_tronco,   tp_destino";
$sqlFrom="FROM plano_discagem_regiao";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="planos_discagem")
{
		$where.= GetFullFieldName("id_regiao")."=".make_db_value("id_regiao",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_regiao"]));
	


//	regiao - 
			$value="";
				$value = ProcessLargeText(GetData($data,"regiao", ""),"field=regiao".$keylink,"",MODE_PRINT);
			$xt->assign("regiao_mastervalue",$value);

//	id_tronco - 
			$value="";
				$value=DisplayLookupWizard("id_tronco",$data["id_tronco"],$data,$keylink,MODE_PRINT);
			$xt->assign("id_tronco_mastervalue",$value);

//	tp_destino - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_destino", ""),"field=tp%5Fdestino".$keylink,"",MODE_PRINT);
			$xt->assign("tp_destino_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("plano_discagem_regiao_masterprint.htm");

}

// events

?>