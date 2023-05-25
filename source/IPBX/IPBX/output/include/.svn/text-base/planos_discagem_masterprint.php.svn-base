<?php
include(getabspath("include/planos_discagem_settings.php"));

function DisplayMasterTableInfo_planos_discagem($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="planos_discagem";

//$strSQL = "SELECT id_plano,   DDD,   id_tronco  FROM planos_discagem ";

$sqlHead="SELECT id_plano,   DDD,   id_tronco";
$sqlFrom="FROM planos_discagem";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="plano_discagem_regiao")
{
		$where.= GetFullFieldName("id_plano")."=".make_db_value("id_plano",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_plano"]));
	


//	id_plano - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_plano", ""),"field=id%5Fplano".$keylink,"",MODE_PRINT);
			$xt->assign("id_plano_mastervalue",$value);

//	DDD - 
			$value="";
				$value = ProcessLargeText(GetData($data,"DDD", ""),"field=DDD".$keylink,"",MODE_PRINT);
			$xt->assign("DDD_mastervalue",$value);

//	id_tronco - 
			$value="";
				$value=DisplayLookupWizard("id_tronco",$data["id_tronco"],$data,$keylink,MODE_PRINT);
			$xt->assign("id_tronco_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("planos_discagem_masterprint.htm");

}

// events

?>