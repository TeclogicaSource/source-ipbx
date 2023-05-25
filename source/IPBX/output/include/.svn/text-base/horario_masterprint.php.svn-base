<?php
include(getabspath("include/horario_settings.php"));

function DisplayMasterTableInfo_horario($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="horario";

//$strSQL = "SELECT  id_horario,  hr_inicio,  hr_fim,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  id  FROM horario  ";

$sqlHead="SELECT id_horario,  hr_inicio,  hr_fim,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  id";
$sqlFrom="FROM horario";
$sqlWhere="";
$sqlTail="";

$where="";

if($detailtable=="sip_users_horario")
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_horario"]));
	


//	hr_inicio - Time
			$value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio".$keylink,"",MODE_PRINT);
			$xt->assign("hr_inicio_mastervalue",$value);

//	hr_fim - Time
			$value="";
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim".$keylink,"",MODE_PRINT);
			$xt->assign("hr_fim_mastervalue",$value);

//	seg - Checkbox
			$value="";
				$value = GetData($data,"seg", "Checkbox");
			$xt->assign("seg_mastervalue",$value);

//	ter - Checkbox
			$value="";
				$value = GetData($data,"ter", "Checkbox");
			$xt->assign("ter_mastervalue",$value);

//	qua - Checkbox
			$value="";
				$value = GetData($data,"qua", "Checkbox");
			$xt->assign("qua_mastervalue",$value);

//	qui - Checkbox
			$value="";
				$value = GetData($data,"qui", "Checkbox");
			$xt->assign("qui_mastervalue",$value);

//	sex - Checkbox
			$value="";
				$value = GetData($data,"sex", "Checkbox");
			$xt->assign("sex_mastervalue",$value);

//	sab - Checkbox
			$value="";
				$value = GetData($data,"sab", "Checkbox");
			$xt->assign("sab_mastervalue",$value);

//	dom - Checkbox
			$value="";
				$value = GetData($data,"dom", "Checkbox");
			$xt->assign("dom_mastervalue",$value);

//	id - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_PRINT);
			$xt->assign("id_mastervalue",$value);
	$strTableName=$oldTableName;
	$xt->display("horario_masterprint.htm");

}

// events

?>