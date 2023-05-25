<?php
include(getabspath("include/cc_receptivo_filas_settings.php"));

function DisplayMasterTableInfo_cc_receptivo_filas($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="cc_receptivo_filas";

//$strSQL = "SELECT  id_filas,  nm_fila,  estrategia,  gravacao,  arq_audio,  arq_mesg,  tp_toques,  id_desvio,  tp_excedido,  acao_falta_agente,  acao_tp_excedido,  acao_fr_horario,  seg_tmo,  perc_tmo,  seg_tma,  perc_tma,  seg_tme,  perc_tme,  tx_abandono,  flg_estim_do_dia,  tp_estimativa,  id_name_gestor  FROM cc_receptivo_filas  ";

$sqlHead="SELECT id_filas,  nm_fila,  estrategia,  gravacao,  arq_audio,  arq_mesg,  tp_toques,  id_desvio,  tp_excedido,  acao_falta_agente,  acao_tp_excedido,  acao_fr_horario,  seg_tmo,  perc_tmo,  seg_tma,  perc_tma,  seg_tme,  perc_tme,  tx_abandono,  flg_estim_do_dia,  tp_estimativa,  id_name_gestor";
$sqlFrom="FROM cc_receptivo_filas";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="cc_receptivo_agentes")
{
		$where.= GetFullFieldName("id_filas")."=".make_db_value("id_filas",$keys[1-1]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_filas"]));
	


//	nm_fila - 
			$value="";
				$value = ProcessLargeText(GetData($data,"nm_fila", ""),"field=nm%5Ffila".$keylink,"",MODE_PRINT);
			$xt->assign("nm_fila_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("cc_receptivo_filas_masterprint.htm");

}

// events

?>