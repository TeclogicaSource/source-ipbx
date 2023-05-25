<?php
include(getabspath("include/cc_agentes_settings.php"));

function DisplayMasterTableInfo_cc_agentes($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName=$strTableName;
	$strTableName="cc_agentes";

//$strSQL = "SELECT idt_agentes,   nm_agente,   codigo,   tp_atendimento,   tp_max_atendimento,   acao_atendimento,   idt_agentes_fila,   name,   `interface`,   flg_ativo  FROM cc_agentes ";

$sqlHead="SELECT idt_agentes,   nm_agente,   codigo,   tp_atendimento,   tp_max_atendimento,   acao_atendimento,   idt_agentes_fila,   name,   `interface`,   flg_ativo";
$sqlFrom="FROM cc_agentes";
$sqlWhere="";
$sqlTail="";

$where="";
$mKeys = array();
$showKeys = "";

if($detailtable=="cc_agentes_fila")
{
		$where.= GetFullFieldName("idt_agentes")."=".make_db_value("idt_agentes",$keys[1-1]);
	$showKeys .= " Identificação: ".$keys[1-1];
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["idt_agentes"]));
	


//	nm_agente - 
			$value="";
				$value = ProcessLargeText(GetData($data,"nm_agente", ""),"field=nm%5Fagente".$keylink);
			$xt->assign("nm_agente_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("cc_agentes_masterlist.htm");
}

// events

?>