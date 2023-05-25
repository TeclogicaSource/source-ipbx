<?php
include(getabspath("include/ipbx_interf_fxs_settings.php"));

function DisplayMasterTableInfo_ipbx_interf_fxs($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="ipbx_interf_fxs";

//$strSQL = "SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   khomp_interf  FROM ipbx_interf_fxs ";

$sqlHead="SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   khomp_interf";
$sqlFrom="FROM ipbx_interf_fxs";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="ipbx_canais")
{
		$where.= GetFullFieldName("id_interf")."=".make_db_value("id_interf",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_interf"]));
	$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["id_central"]));
	


//	dsc_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf".$keylink,"",MODE_PRINT);
			$xt->assign("dsc_interf_mastervalue",$value);

//	id_central - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral".$keylink,"",MODE_PRINT);
			$xt->assign("id_central_mastervalue",$value);

//	board - 
			$value="";
				$value = ProcessLargeText(GetData($data,"board", ""),"field=board".$keylink,"",MODE_PRINT);
			$xt->assign("board_mastervalue",$value);

//	id_tp_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_tp_interf", ""),"field=id%5Ftp%5Finterf".$keylink,"",MODE_PRINT);
			$xt->assign("id_tp_interf_mastervalue",$value);

//	tp_chamada - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_PRINT);
			$xt->assign("tp_chamada_mastervalue",$value);

//	khomp_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"khomp_interf", ""),"field=khomp%5Finterf".$keylink,"",MODE_PRINT);
			$xt->assign("khomp_interf_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("ipbx_interf_fxs_masterprint.htm");

}

// events

?>