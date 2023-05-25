<?php
require_once(getabspath("include/xml.php"));
function getReportArray($name)
{
	$xml = new xml();
	$rpt_strXML = LoadSelectedReport( $name);
	return $xml->xml_to_array( $rpt_strXML );
}

function getChartArray($name)
{
	$xml = new xml();
	$chrt_strXML = LoadSelectedChart($name);
	return $xml->xml_to_array($chrt_strXML);
}

function GetUserGroups() {
	global $conn;
	$arr = array(
		array(-1, "<Admin>"),
		array(-2, "<Default>"),
		array(-3, "<Guest>")
	);
	$rs=db_query("select GroupID,Label from `ipbx_uggroups` order by Label",$conn);
	while($data = db_fetch_numarray( $rs )) 
		$arr[]=array($data[0],$data[1]);
	return $arr;
}

function GetUserGroup() 
{
	global $conn;
	if(@$_SESSION["UserID"]!="Guest")
	{
		ReadUserPermissions();
		return $_SESSION["UserRights"][$_SESSION["UserID"]][".Groups"];
	}
	else 
		return array(-3);
	return array();
}

function CheckLastID($type) {
	global $conn;
	
	$strSQL = "SELECT rpt_id FROM webreports WHERE rpt_type = '".$type."'";
	$rs = db_query($strSQL,$conn);
	$maxID = 1;
	
	while( $row = db_fetch_numarray( $rs ) ) {
		if ( $maxID < $row[0] ) {
			$maxID = $row[0];
		}
	}
	
	return ++$maxID;
}

function GetNumberFieldsList($table) {
	$t = WRGetFieldsList($table);
	$arr=array();
	foreach($t as $f)
		if(IsNumberType(WRGetFieldType($table.".".$f)))
			$arr[]=$f;
	return $arr;
}

function WRGetNBFieldsList($table) {
	$t = WRGetFieldsList($table);
	$arr=array();
	foreach($t as $f)
		if(!IsBinaryType(WRGetFieldType($table.".".$f)))
			$arr[]=$f;
	return $arr;
}

function GetChartsList() {
	global $conn;

	$xml = new xml();
	$arr=array();
	$strSQL = "SELECT rpt_name, rpt_title, rpt_owner, rpt_status, rpt_content";
	$strSQL .= " FROM webreports WHERE rpt_type = 'chart' order by rpt_title";
	$rsChart = db_query($strSQL,$conn);
	$arrUserGroup = GetUserGroup();
	
	while( $row = db_fetch_numarray( $rsChart ) ) {
		$chart_arr = $xml->xml_to_array( $row[4] );
        $view = 0;
		$edit = 0;
        
		if ( isset($chart_arr['permissions']) ) {
			foreach ( $chart_arr['permissions'] as $arr_prm ) {
				if (in_array($arr_prm['id'], $arrUserGroup)) {
					$view = ( $arr_prm['view'] == "true" ) ? 1 : 0;
					$edit = ( $arr_prm['edit'] == "true" ) ? 1 : 0;
				}
			}
		}
		else
		{
			$view=1;
		}
		if(!$chart_arr["tmp_active"])
		{
		$arr[] = array(
			"name"		=> $row[0],
			"title"		=> $row[1],
			"owner"		=> $row[2],
			"status"	=> $row[3],
			"view"		=> $view,
			"edit"		=> $edit
		);
	}
	}

	return $arr;
}

function LoadSelectedChart($report) {
	global $conn;
	
	$strSQL = "SELECT rpt_content FROM webreports WHERE rpt_name='".db_addslashes($report)."' and rpt_type='chart'";
	$rsReport = db_query($strSQL,$conn);
	$rptContent = db_fetch_numarray($rsReport);

	return $rptContent[0];	
}

function SaveChart($reportname, $report, $rtitle, $rstatus, $strXML, $saveas) {
	global $conn;

	$reportname=GoodFieldName($reportname);
	$report=GoodFieldName($report);
	
	$strSQL = "SELECT rpt_id FROM webreports WHERE rpt_name='".db_addslashes($reportname)."' and rpt_type='chart'";
	$rsReport = db_query($strSQL,$conn);
	$data=db_fetch_array($rsReport);
	if ( $data && (!$saveas || $reportname==$report)) {
		$strSQL = "UPDATE webreports SET rpt_name='".db_addslashes($report)."',rpt_title='".db_addslashes($rtitle)."', rpt_content='".db_addslashes($strXML)."', rpt_status='".db_addslashes($rstatus)."', rpt_mdate='".now()."' WHERE rpt_name='".db_addslashes($reportname)."' and rpt_type='chart'";
		$rsReport = db_exec($strSQL,$conn);
	} else {
		$strSQL = "INSERT INTO webreports ( rpt_name, rpt_title, rpt_cdate, rpt_mdate, rpt_content, rpt_owner, rpt_status, rpt_type )";
		$strSQL .= " VALUES('".db_addslashes($report)."', '".db_addslashes($rtitle)."', '".now()."', '".now()."', '".db_addslashes($strXML)."', '".db_addslashes(@$_SESSION["UserID"])."', '".db_addslashes($rstatus)."', 'chart')";
		$rsReport = db_exec($strSQL,$conn);
	}
}

function DeleteChart($report) {
	global $conn;
	
	$strSQL = "DELETE FROM webreports WHERE rpt_name='".db_addslashes($report)."' and rpt_type='chart'";
	$rsReport = db_exec($strSQL,$conn);
}

function GetReportsList() {
	global $conn;

	$xml = new xml();
	$arr=array();
	$strSQL = "SELECT rpt_name, rpt_title, rpt_owner, rpt_status, rpt_content";
	$strSQL .= " FROM webreports WHERE rpt_type = 'report' order by rpt_title";
	$rsReport = db_query($strSQL,$conn);
	
	$arrUserGroup = GetUserGroup();
	while( $row = db_fetch_numarray( $rsReport ) ) {
		$report_arr = $xml->xml_to_array( $row[4] );
        $view = 0;
		$edit = 0;

		if ( isset($report_arr['permissions']) ) {
			foreach ( $report_arr['permissions'] as $arr_prm ) {
				if (in_array($arr_prm['id'], $arrUserGroup)) {
					$view = ( $arr_prm['view'] == "true" ) ? 1 : 0;
					$edit = ( $arr_prm['edit'] == "true" ) ? 1 : 0;
				}
			}
		}
		else
		{
			$view=1;
		}

		if(!$report_arr["tmp_active"])
		{
		$arr[] = array(
			"name"		=> $row[0],
			"title"		=> $row[1],
			"owner"		=> $row[2],
			"status"	=> $row[3],
			"view"		=> $view,
			"edit"		=> $edit
		);
	}
	}
	
	return $arr;
}

function LoadSelectedReport($report) {
	global $conn;
	
	$strSQL = "SELECT rpt_content FROM webreports WHERE rpt_name='".db_addslashes($report)."' and rpt_type='report'";
	$rsReport = db_query($strSQL,$conn);
	$rptContent = db_fetch_numarray($rsReport);

	return $rptContent[0];	
}

function SaveReport($reportname, $report, $rtitle, $rstatus, $strXML, $saveas) {
	global $conn;
	$reportname=GoodFieldName($reportname);
	$report=GoodFieldName($report);
		
	$strSQL = "SELECT rpt_id FROM webreports WHERE rpt_name='".db_addslashes($reportname)."' and rpt_type='report'";
	$rsReport = db_query($strSQL,$conn);
	$data=db_fetch_array($rsReport);
	if ( $data && (!$saveas || $reportname==$report)) {
		$strSQL = "UPDATE webreports SET rpt_name='".db_addslashes($report)."', rpt_title='".db_addslashes($rtitle)."', rpt_content=".PrepareString4DB($strXML).", rpt_status='".db_addslashes($rstatus)."', rpt_mdate='".now()."' WHERE rpt_name='".db_addslashes($reportname)."' and rpt_type='report'";
		$rsReport = db_exec($strSQL,$conn);
	} else {
		$strSQL = "INSERT INTO webreports ( rpt_name, rpt_title, rpt_cdate, rpt_mdate, rpt_content, rpt_owner, rpt_status, rpt_type )";
		$strSQL .= " VALUES('".db_addslashes($report)."', '".db_addslashes($rtitle)."', '".now()."', '".now()."', ".PrepareString4DB($strXML).", '".db_addslashes(@$_SESSION["UserID"])."', '".db_addslashes($rstatus)."', 'report')";		
		$rsReport = db_exec($strSQL,$conn);
	}
}

function DeleteReport($report) {
	global $conn;
	
	$strSQL = "DELETE FROM webreports WHERE rpt_name='".db_addslashes($report)."' and rpt_type='report'";
	$rsReport = db_exec($strSQL,$conn);
}

function testAdvSearch($table)
{
	if(!is_new_wrobject())
	{
		if($table=="tarifa")
		{
    			return 1;
		}
		if($table=="agenda")
		{
    			return 1;
		}
		if($table=="centrocusto")
		{
    			return 1;
		}
		if($table=="cdr")
		{
    			return 0;
		}
		if($table=="sigame")
		{
    			return 0;
		}
		if($table=="cadeado")
		{
    			return 1;
		}
		if($table=="codecs")
		{
    			return 0;
		}
		if($table=="ramal_autorizado")
		{
    			return 0;
		}
		if($table=="admin_rights")
		{
    			return 0;
		}
		if($table=="desvios")
		{
    			return 1;
		}
		if($table=="pabx")
		{
    			return 1;
		}
		if($table=="desvios_pabx")
		{
    			return 1;
		}
		if($table=="horario")
		{
    			return 1;
		}
		if($table=="ramal_pabx_autorizado")
		{
    			return 0;
		}
		if($table=="sip_users")
		{
    			return 1;
		}
		if($table=="admin_members")
		{
    			return 1;
		}
		if($table=="admin_users")
		{
    			return 1;
		}
		if($table=="contrato_trad")
		{
    			return 0;
		}
		if($table=="contrato_voip")
		{
    			return 0;
		}
		if($table=="contrato_gsm")
		{
    			return 0;
		}
		if($table=="cadencias")
		{
    			return 0;
		}
		if($table=="parametros")
		{
    			return 0;
		}
		if($table=="Horarios")
		{
    			return 1;
		}
		if($table=="Ramais")
		{
    			return 1;
		}
		if($table=="Telefones Discados")
		{
    			return 1;
		}
		if($table=="Telefones Recebidos")
		{
    			return 1;
		}
		if($table=="Centros de custo")
		{
    			return 1;
		}
		if($table=="Graf. Minutagem")
		{
    			return 0;
		}
		if($table=="Graf Centro de custos")
		{
    			return 0;
		}
	}
	else
	{
		global $dal;
		$table_list=WRGetTablesList();
		foreach($table_list as $key=>$value)
		{
			if($table==$value)
			{
				return 1;
			}
		}
	}
	return 0;
}

//	convert cars.Make to [cars].[Make]
function WRAddFieldWrappers($field)
{
	$t="";
	$f="";
	WRSplitFieldName($field,$t,$f);
	if(!$t)
	{
		return AddFieldWrappers($f);
	}
	return AddTableWrappers($t).".".AddFieldWrappers($f);
}

function WRSplitFieldName($str,&$table,&$field)
{
	$table="";
	$field=$str;
	$pos=strrpos($field,".");
	if($pos===false)
		return;
	$table=substr($str,0,$pos);
	$field=substr($str,$pos+1);
		
}


function is_groupby_chart()
{
	if(!count(@$_SESSION['webcharts']))
		return false;
	$root=&$_SESSION['webcharts'];
	if(!is_array($root["group_by_condition"]))
		return false;
	return ($root["group_by_condition"]["group_by_toggle"]=="true");
}

function WRChartLabel($str)
{
	$table="";
	$field="";
	WRSplitFieldName($str,$table,$field);
	return $field;
	if(!$table)
		return $field;
	return $table.".".$field;
}
function is_new_wrobject()
{
	return (bool)(@$_SESSION["webobject"]["db-based"]);
}

function WRGetTablesList()
{
	if(!isset($_SESSION["WRTableList"]))
		$_SESSION["WRTableList"] = db_gettablelist();
	return $_SESSION["WRTableList"];
}

function WRGetFieldsList($table)
{
	global $wr_is_standalone;
	if(!$wr_is_standalone)
	{
		if(!is_new_wrobject())
			return GetFieldsList($table);
		global $dal;
		if($dal->Table($table))
			return $dal->GetFieldsList($table);
		return dbinfoFieldsList($table);
	}
	else
	{
		return dbinfoFieldsList($table);
	}
}
function dbinfoFieldsList($table)
{
	$arr = array();
	$res = array();
	if(isset($_SESSION["WRFieldList"][$table]))
		return $_SESSION["WRFieldList"][$table];
	else
		$arr = db_getfieldslist($table);
	foreach($arr as $val)
		$res[]=$val["fieldname"];
	$_SESSION["WRFieldList"][$table]=$res;
	return $res;
}

function WRGetFieldType($fld)
{
	global $wr_is_standalone;
	$table="";
	$field="";
	WRSplitFieldName($fld,$table,$field);
	
	if(!$wr_is_standalone)
	{
		$type=GetFieldType($field,$table);
		if($type)
			return $type;
		global $dal;
		if($dal->Table($table))
			return $dal->GetFieldType($table,$field);
		return dbinfoFieldsType($table,$field);
	}
	else
	{
		return dbinfoFieldsType($table,$field);
	}	
}
function dbinfoFieldsType($table,$field)
{
	$arr=array();
	$res="";
	if(isset($_SESSION["WRFieldType"][$table][$field]))
		return $_SESSION["WRFieldType"][$table][$field];
	else
		$arr=db_getfieldslist($table);
	foreach($arr as $val)
	{
		if($val["fieldname"]==$field)
		{
			$res=$val["type"];
		}
		$_SESSION["WRFieldType"][$table][$val["fieldname"]]=$val["type"]   ;
	}
	return $res;
}
function WRUseTimepicker($table,$field)
{
	return false;
}

function WRUseListLookup($table,$field)
{
	return false;
}
function getCaptionTable($table)
{
	global $strTableName;
	if(!$table)
		$table=$strTableName;
	if($table=="tarifa")
	{
		return "Tarifa";
	}
	if($table=="agenda")
	{
		return "Contatos Externos";
	}
	if($table=="centrocusto")
	{
		return "Centro de Custo";
	}
	if($table=="cdr")
	{
		return "Ligações";
	}
	if($table=="sigame")
	{
		return "Remover Siga-Me";
	}
	if($table=="cadeado")
	{
		return "Remover cadeado";
	}
	if($table=="codecs")
	{
		return "Codecs";
	}
	if($table=="ramal_autorizado")
	{
		return "Ramal Autorizado";
	}
	if($table=="admin_rights")
	{
		return "Permissions";
	}
	if($table=="desvios")
	{
		return "Desvios";
	}
	if($table=="pabx")
	{
		return "Pabx";
	}
	if($table=="desvios_pabx")
	{
		return "Desvios PABX";
	}
	if($table=="horario")
	{
		return "Faixa de Horario";
	}
	if($table=="ramal_pabx_autorizado")
	{
		return "Ramal Pabx Autorizado";
	}
	if($table=="sip_users")
	{
		return "Cadastro";
	}
	if($table=="admin_members")
	{
		return "Assign users to groups";
	}
	if($table=="admin_users")
	{
		return "Add/Edit users";
	}
	if($table=="contrato_trad")
	{
		return "Linha Tradicional";
	}
	if($table=="contrato_voip")
	{
		return "Linha VOIP";
	}
	if($table=="contrato_gsm")
	{
		return "Linha GSM";
	}
	if($table=="cadencias")
	{
		return "Cadencias";
	}
	if($table=="parametros")
	{
		return "Parametros";
	}
	if($table=="Horarios")
	{
		return "Horarios";
	}
	if($table=="Ramais")
	{
		return "Ramais";
	}
	if($table=="Telefones Discados")
	{
		return "Telefones Discados";
	}
	if($table=="Telefones Recebidos")
	{
		return "Telefones Recebidos";
	}
	if($table=="Centros de custo")
	{
		return "Centros de custo";
	}
	if($table=="Graf. Minutagem")
	{
		return "Minutagem";
	}
	if($table=="Graf Centro de custos")
	{
		return "Graf Centro de custos";
	}
	return $table;
}


function getChartTablesList()
{
	return WRGetQueryTables('webcharts');
}

function getReportTablesList()
{
	return WRGetQueryTables('webreports');
}

function WRGetQueryTables($type)
{
	$root=&$_SESSION[$type];
	$ret=array($root['tables'][0]);
	if (strlen(@$root['table_relations']["relations"]) && strpos($root['table_relations']['join_tables'], ",") !== false) 
	{
		$joined = explode(",", $root['table_relations']['join_tables']);
		foreach($joined as $t)
		{
			if(strlen($t))
				$ret[]=$t;
		}
	}
	return $ret;
}

function GetDefaultViewFormat($type)
{
	if(IsBinaryType($type))
		return FORMAT_DATABASE_IMAGE;
	elseif(IsDateFieldType($type))
		return FORMAT_DATE_SHORT;
	else
		return FORMAT_NONE;
}

function GetDefaultEditFormat($type)
{
	if(IsBinaryType($type))
		return EDIT_FORMAT_DATABASE_IMAGE;
	elseif(IsDateFieldType($type))
		return EDIT_FORMAT_DATE;
	else
		return EDIT_FORMAT_TEXT_FIELD;
}

function GetGenericViewFormat($table,$field)
{
	return GetDefaultViewFormat(WRGetFieldType($table.".".$field));
}


function GetGenericEditFormat($table,$field)
{
	return GetDefaultEditFormat(WRGetFieldType($table.".".$field));
}

function GenericStrWhereAdv($strTable, $strField, $SearchFor, $strSearchOption, $SearchFor2, $etype)
{
	global $dal;
	$sfield="";
	$stable="";
	WRSplitFieldName($strField,$stable,$sfield);
	$type=WRGetFieldType($strField);

if(GetDatabaseType()!=2) //MSSQLServer
	$ismssql=false;
else
	$ismssql=true;
	
	$btexttype=IsTextType($type);
if(GetDatabaseType()==0) //MySQL
	$btexttype=false;

	if(IsBinaryType($type))
		return "";
if(GetDatabaseType()==2) //MSSQLServer
{
	if($btexttype && $strSearchOption!="Contains" && $strSearchOption!="Starts with ..." )
		return "";
}
	if($strSearchOption=='Empty')
	{
		if(IsCharType($type) && (!$ismssql || !$btexttype))
			return "(".WRAddFieldWrappers($strField)." is null or ".WRAddFieldWrappers($strField)."='')";			
		elseif ($ismssql && $btexttype)	
			return "(".WRAddFieldWrappers($strField)." is null or ".WRAddFieldWrappers($strField)." LIKE '')";
		else
			return WRAddFieldWrappers($strField)." is null";
	}
	if(GetDatabaseType()==4) //PostgreSQL
		$like="ilike";
	else
		$like="like";
	if(GetGenericEditFormat($strTable,$sfield)==EDIT_FORMAT_LOOKUP_WIZARD)
	{
		
		if(Multiselect($sfield, $strTable))
			$SearchFor=splitvalues($SearchFor);
		else
			$SearchFor=array($SearchFor);
		$ret="";
		foreach($SearchFor as $value)
		{
			if(!($value=="null" || $value=="Null" || $value==""))
			{
				if(strlen($ret))
					$ret.=" or ";
				if($strSearchOption=="Equals")
				{
					$value=WRmake_db_value($sfield,$value,$strTable);
					if(!($value=="null" || $value=="Null"))
						$ret.=WRAddFieldWrappers($strField).'='.$value;
				}
				else
				{
					if(strpos($value,",")!==false || strpos($value,'"')!==false)
						$value = '"'.str_replace('"','""',$value).'"';
					$value=db_addslashes($value);
					$ret.=WRAddFieldWrappers($strField)." = '".$value."'";
					$ret.=" or ".WRAddFieldWrappers($strField)." ".$like." '%,".$value.",%'";
					$ret.=" or ".WRAddFieldWrappers($strField)." ".$like." '%,".$value."'";
					$ret.=" or ".WRAddFieldWrappers($strField)." ".$like." '".$value.",%'";
				}
			}
		}
		if(strlen($ret))
			$ret="(".$ret.")";
		return $ret;
	}
	if(GetGenericEditFormat($strTable,$sfield)==EDIT_FORMAT_CHECKBOX)
	{
		if($SearchFor=="none")
			return "";
		if(NeedQuotes($type))
		{
			if($SearchFor=="on")
				return "(".WRAddFieldWrappers($strField)."<>'0' and ".WRAddFieldWrappers($strField)."<>'' and ".WRAddFieldWrappers($strField)." is not null)";
			else
				return "(".WRAddFieldWrappers($strField)."='0' or ".WRAddFieldWrappers($strField)."='' or ".WRAddFieldWrappers($strField)." is null)";
		}
		else
		{
			if($SearchFor=="on")
				return "(".WRAddFieldWrappers($strField)."<>0 and ".WRAddFieldWrappers($strField)." is not null)";
			else
				return "(".WRAddFieldWrappers($strField)."=0 or ".WRAddFieldWrappers($strField)." is null)";
		}
	}
	$value1=WRmake_db_value($sfield,$SearchFor,$strTable);
	$value2=false;
	if($strSearchOption=="Between")
		$value2=WRmake_db_value($sfield,$SearchFor2,$strTable);
	if($strSearchOption!="Contains" && $strSearchOption!="Starts with ..." && ($value1==="null" || $value2==="null" ))
		return "";

	if(IsCharType($type) && !$btexttype)
	{
		$value1=db_upper($value1);
		$value2=db_upper($value2);
		$strField=db_upper(WRAddFieldWrappers($strField));
	}
	elseif ($ismssql && !$btexttype && ($strSearchOption=="Contains" || $strSearchOption=="Starts with ..."))
		$strField="convert(varchar,".WRAddFieldWrappers($strField).")";
	else 
		$strField=WRAddFieldWrappers($strField);
	$ret="";
	if($strSearchOption=="Contains")
	{
		if(IsCharType($type) && !$btexttype)
			return $strField." ".$like." ".db_upper("'%".db_addslashes($SearchFor)."%'");
		else
			return $strField." ".$like." '%".db_addslashes($SearchFor)."%'";
	}
	else if($strSearchOption=="Equals")
	{
		return $strField."=".$value1;
	}
	else if($strSearchOption=="Starts with ...")
	{
		if(IsCharType($type) && !$btexttype)
			return $strField." ".$like." ".db_upper("'".db_addslashes($SearchFor)."%'");
		else
			return $strField." ".$like." '".db_addslashes($SearchFor)."%'";
	}
	else if($strSearchOption=="More than ...") return $strField.">".$value1;
	else if($strSearchOption=="Less than ...") return $strField."<".$value1;
	else if($strSearchOption=="Equal or more than ...") return $strField.">=".$value1;
	else if($strSearchOption=="Equal or less than ...") return $strField."<=".$value1;
	else if($strSearchOption=="Between")
	{
		$ret=$strField.">=".$value1;
		$ret.=" and ".$strField."<=".$value2;
		return $ret;
	}
	return "";
}



function GetAdvSearchOptions($table,$field)
{
	$format=GetGenericEditFormat($table,$field);
	$options=array();
	if($format==EDIT_FORMAT_DATE)
	{
		$options[]=array("type"=>"Equals","label"=>"Igual a");
		$options[]=array("type"=>"More than ...","label"=>"Maior que");
		$options[]=array("type"=>"Less than ...","label"=>"Menor  que");
		$options[]=array("type"=>"Equal or more than ...","label"=>"Igual ou maior que");
		$options[]=array("type"=>"Equal or less than ...","label"=>"Igual ou menor que");
		$options[]=array("type"=>"Between","label"=>"Entre");
		$options[]=array("type"=>"Empty","label"=>"Vazio");
	}
	elseif($format==EDIT_FORMAT_LOOKUP_WIZARD)
	{
		if(Multiselect($field,$table))
			$options[]=array("type"=>"Contains","label"=>"Contém");
		else
			$options[]=array("type"=>"Equals","label"=>"Igual a");
	}
	elseif($format==EDIT_FORMAT_TEXT_FIELD
	|| $format==EDIT_FORMAT_TEXT_AREA
	|| $format==EDIT_FORMAT_PASSWORD
	|| $format==EDIT_FORMAT_HIDDEN
	|| $format==EDIT_FORMAT_READONLY	)
	{
		$options[]=array("type"=>"Contains","label"=>"Contém");
		$options[]=array("type"=>"Equals","label"=>"Igual a");
		$options[]=array("type"=>"Starts with ...","label"=>"Inicia com");
		$options[]=array("type"=>"More than ...","label"=>"Maior que");
		$options[]=array("type"=>"Less than ...","label"=>"Menor  que");
		$options[]=array("type"=>"Equal or more than ...","label"=>"Igual ou maior que");
		$options[]=array("type"=>"Equal or less than ...","label"=>"Igual ou menor que");
		$options[]=array("type"=>"Between","label"=>"Entre");
		$options[]=array("type"=>"Empty","label"=>"Vazio");
	}
	else
	{
		$options[]=array("type"=>"Equals","label"=>"Igual a");
}
	return $options;
}

function CalcSearchParam($webreportsMode=false)
{
	global $sessPrefix, $strSQL;
	$sWhere="";
	if(@$_SESSION[$sessPrefix."_search"]==2)
//	 advanced search
	{
		foreach(@$_SESSION[$sessPrefix."_asearchfor"] as $f => $sfor)
		{
			$strSearchFor=trim($sfor);
			$strSearchFor2="";
			$type=@$_SESSION[$sessPrefix."_asearchfortype"][$f];
			if(array_key_exists($f,@$_SESSION[$sessPrefix."_asearchfor2"]))
				$strSearchFor2=trim(@$_SESSION[$sessPrefix."_asearchfor2"][$f]);
			if($strSearchFor!="" || true)
			{
				if (!$sWhere) 
				{
					if($_SESSION[$sessPrefix."_asearchtype"]=="and")
						$sWhere="1=1";
					else
						$sWhere="1=0";
				}
				$strSearchOption=trim($_SESSION[$sessPrefix."_asearchopt"][$f]);
				if($webreportsMode)
					$where = GenericStrWhereAdv(@$_SESSION[$sessPrefix."_asearchtable"][$f], $f, $strSearchFor, $strSearchOption, $strSearchFor2,$type);
				else
					$where = StrWhereAdv($f, $strSearchFor, $strSearchOption, $strSearchFor2,$type);
				if($where)
				{
					if($_SESSION[$sessPrefix."_asearchnot"][$f])
						$where="not (".$where.")";
					if($_SESSION[$sessPrefix."_asearchtype"]=="and")
	   					$sWhere .= " and ".$where;
					else
	   					$sWhere .= " or ".$where;
				}
			}
		}
	}
	return $sWhere;
}

function GetDatabaseType()
{
	global $nDBType;
	return $nDBType;
}

function WRViewFormat($field,$table="")
{
	return ViewFormat($field,$table);
}

function get_chart_series_fields(&$arr_data_series,&$arr_label_series)
{
	if(is_groupby_chart())
		return get_chart_groupbyseries_fields($arr_data_series,$arr_label_series);
	$root=&$_SESSION['webcharts'];
	$arr_data_series=array();
	$arr_label_series=array();

	$arr_join_tables = getChartTablesList();

	for ($i=0; $i < count($arr_join_tables); $i++ ) 
	{
		$t = $arr_join_tables[$i];
		$arr_fields = GetNumberFieldsList($t);
		for ($j=0; $j < count($arr_fields); $j++) 
		{
			$arr_data_series[] = array("field" => $t.".".$arr_fields[$j], "label" => WRChartLabel($t.".".$arr_fields[$j]));
		}
		$arr_fields = WRGetNBFieldsList($t);
		for ($j=0; $j < count($arr_fields); $j++) 
		{
			$arr_label_series[] = array("field" => $t.".".$arr_fields[$j], "label" => WRChartLabel($t.".".$arr_fields[$j]));
		}	
	}
	if(!count($arr_data_series))
		$arr_data_series = $arr_label_series;
}

function get_chart_groupbyseries_fields(&$arr_data_series,&$arr_label_series)
{
	$root=&$_SESSION['webcharts'];
	$arr_data_series=array();
	$arr_label_series=array();
	for ($i=0; $i < count($root['group_by_condition'])-1; $i++) 
	{
		$arr = &$root['group_by_condition'][$i];
		$field=$arr["field_opt"];
		$strLabel=WRChartLabel($field);
		$isLabel=false;
		$isData=false;
		if($arr["group_by_value"]!="-1" && $arr["group_by_value"]!="GROUP BY")
		{
			$field=$arr["group_by_value"]."(".$field.")";
			$isData=true;
			$isLabel=true;
		}
		else if($arr["group_by_value"]=="GROUP BY")
		{
			$type = WRGetFieldType($field);
			if(IsNumberType($type))
				$isData=true;
			$isLabel=true;
		}
		
		$ret = array("field"=>$field,"label"=>$strLabel);
		if($isLabel)
			$arr_label_series[]=$ret;
		if($isData)
			$arr_data_series[]=$ret;
	}
	if(!count($arr_data_series))
		$arr_data_series = $arr_label_series;
}

function WRProcessLargeText($text,$field,$recid,$chars,$mode,$strLabel)
{
	if(!$chars)
		return $text;
	if($mode!=MODE_LIST && $mode!=MODE_PRINT || strlen($text)<$chars+10)
		return $text;
	if($mode==MODE_PRINT)
	{
		return substr($text,0,$chars)."...";
	}
//	List page
	$id="textbox_".GoodFieldName($field).$recid;
	$textbox="<span style=\"display:none\" id=\"".$id."\">".htmlspecialchars($text)."</span>";
	$link="<a href=# onclick=\"
	
	var offset=$(this).offset();
	$('#".$id."').clone().dialog(
	{
title: '".jsreplace($strLabel)."',
		draggable: true,
		resizable: true,
		bgiframe: true,
		modal: false,
		minheight:400,
		position:[offset.left-50,offset.top-50]
	}
	);
	\">&nbsp;"."Mais"."...</a>";
	$out=substr($text,0,$chars);
	return $out.$link.$textbox;
}
function JumpTo()
{
	return "$(\"#jumpto\").mouseover(function(){
		if(closetimer) {
			window.clearTimeout(closetimer);
			closetimer = null;
		}
		if ($(\"#jumpto\").offset().top + $(\"#jumpto\").height() + $(\"#menujump\").height() + $(window).scrollTop() > $(window).height()) {
			if($(\"#menujump\").height()-$(\"#jumpto\").offset().top + $(window).scrollTop()>0)
			{
				$(\"#menujump\").css(\"top\", $(window).scrollTop()+\"px\");		
				$(\"#menujump\").css(\"left\", ($(this).offset().left - 6) + \"px\");					
				$(\"#framejump\").css(\"width\",$(\"#menujump\").width());
				$(\"#framejump\").css(\"height\",$(\"#menujump\").height());
				$(\"#framejump\").css(\"top\", $(window).scrollTop()+\"px\");		
				$(\"#framejump\").css(\"left\", ($(this).offset().left - 1) + \"px\");
			}
			else
			{
				$(\"#menujump\").css(\"top\", ($(this).offset().top - $(\"#menujump\").height()) + \"px\");		
				$(\"#menujump\").css(\"left\", ($(this).offset().left - 6) + \"px\");					
				$(\"#framejump\").css(\"width\",$(\"#menujump\").width());
				$(\"#framejump\").css(\"height\",$(\"#menujump\").height());
				$(\"#framejump\").css(\"top\", ($(this).offset().top - $(\"#framejump\").height()) + \"px\");		
				$(\"#framejump\").css(\"left\", ($(this).offset().left - 1) + \"px\");
			}
		} else {
			$(\"#menujump\").css(\"top\", ($(this).offset().top + $(this).height()) + \"px\");		
			$(\"#menujump\").css(\"left\", ($(this).offset().left - 6) + \"px\");			
			$(\"#framejump\").css(\"width\",$(\"#menujump\").width());
			$(\"#framejump\").css(\"height\",$(\"#menujump\").height());
			$(\"#framejump\").css(\"top\", ($(this).offset().top + $(this).height()) + \"px\");		
			$(\"#framejump\").css(\"left\", ($(this).offset().left - 1) + \"px\");		
		}
		$(\"#framejump\").show();
		$(\"#menujump\").show();
	});

	$(\"#jumpto\").mouseout(function(){
		closetimer = window.setTimeout(\"$('#menujump').hide();$('#framejump').hide();\", timeout);
	});
	
	$(\"#menujump td\").mouseover(function(){
		if(closetimer) {
			window.clearTimeout(closetimer);
			closetimer = null;
		}
	});
		
	$(\"#menujump td\").mouseout(function(){
		closetimer = window.setTimeout(\"$('#menujump').hide();$('#framejump').hide();\", timeout);
	});
	
	$(document.body).click(function(){
		$(\"#menujump\").hide();
		$(\"#framejump\").hide();
	});	";
}
function alertDialog()
{
return	"$(\"#alert\").dialog({
		open: function(event,ui){
			w=$(\"#alert\").parent(\".ui-dialog\").width();
			h=$(\"#alert\").parent(\".ui-dialog\").height();
			t=$(\"#alert\").parent(\".ui-dialog\").offset().top;
			l=$(\"#alert\").parent(\".ui-dialog\").offset().left;
			$(\"#aframe\").css(\"width\",w+6);
			$(\"#aframe\").css(\"height\",h+6);
			$(\"#aframe\").css(\"top\",t + \"px\");		
			$(\"#aframe\").css(\"left\",l + \"px\");	
			$(\"#aframe\").show();
		},
		beforeclose: function(event,ui){
			$(\"#aframe\").hide();
		},
		title: \"Message\",
		draggable: false,
		resizable: false,
		bgiframe: true,
		autoOpen: false,
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog(\"close\");
			}
		}
	});";
}

function DBGetTableKeys($table)
{
	global $dal,$wr_is_standalone;
	if(!$wr_is_standalone)
	{
		if($dal->Table($table))
			return $dal->GetDBTableKeys($table);
		return array();
	}
	else
		return array();
}

function colorPickerMouse()
{
return "

function GiveDec(Hex)
{
   if(Hex == \"A\")
	  Value = 10;
   else
   if(Hex == \"B\")
	  Value = 11;
   else
   if(Hex == \"C\")
	  Value = 12;
   else
   if(Hex == \"D\")
	  Value = 13;
   else
   if(Hex == \"E\")
	  Value = 14;
   else
   if(Hex == \"F\")
	  Value = 15;
   else
	  Value = eval(Hex);

   return Value;
}

function GiveHex(Dec)
{
   if(Dec == 10)
	  Value = \"A\";
   else
   if(Dec == 11)
	  Value = \"B\";
   else
   if(Dec == 12)
	  Value = \"C\";
   else
   if(Dec == 13)
	  Value = \"D\";
   else
   if(Dec == 14)
	  Value = \"E\";
   else
   if(Dec == 15)
	  Value = \"F\";
   else
	  Value = \"\" + Dec;

   return Value;
}

function HexToDec(value)
{
   Input = value.toUpperCase();

   a = GiveDec(Input.substring(0, 1));
   b = GiveDec(Input.substring(1, 2));
   c = GiveDec(Input.substring(2, 3));
   d = GiveDec(Input.substring(3, 4));
   e = GiveDec(Input.substring(4, 5));
   f = GiveDec(Input.substring(5, 6));

   x = (a * 16) + b; // Red
   y = (c * 16) + d; // Green
   z = (e * 16) + f; // Blue

	return [x,y,z]
}

function DecToHex(Red, Green, Blue)
{
   a = GiveHex(Math.floor(Red / 16));
   b = GiveHex(Red % 16);
   c = GiveHex(Math.floor(Green / 16));
   d = GiveHex(Green % 16);
   e = GiveHex(Math.floor(Blue / 16));
   f = GiveHex(Blue % 16);

   z = a + b + c + d + e + f;

	return z;
}

function rgbToHex(str)
{
	if(str==undefined)
		return \"\";
	str=str.substring(4);
	str=str.replace(\")\",\"\");
	arr = new Array();
	arr=str.split(\",\");
	return DecToHex(arr[0],arr[1],arr[2]);
}

	$(\".ColorPickerDivSample\").css(\"cursor\",\"pointer\");
	
	$(\"#colorPickerVtd td\").each(function(){
        $(this).css(\"border\",\"1px solid \" + $(this).css(\"backgroundColor\"));
    })
		.css(\"cursor\",\"pointer\");
	
	$(\".selector,.ColorPickerDivSample\").click(function(){
	    click_color_event(this);
	});
	
	$(\"#colorPickerVtd\").mouseover(function(){
		if(closetimerpicker) {
			window.clearTimeout(closetimerpicker);
			closetimerpicker = null;
		}
	}).mouseout(function(){
		closetimerpicker = window.setTimeout(\"$('#colorPickerVtd').hide();\", timeoutpicker);
	});
		
	$(\"#colorPickerVtd td\").mouseover(function(){
		if(closetimerpicker) {
			window.clearTimeout(closetimerpicker);
			closetimerpicker = null;
		}
		$(this).css(\"border\", \"1px dotted #fff\");
		$(\"div.ColorPickerDivSample.active\").css(\"background-color\", $(this).css(\"background-color\"));
	});
	
	$(\"#colorPickerVtd td\").mouseout(function(){
		$(this).css(\"border\", \"1px solid \"+$(\"div.ColorPickerDivSample.active\").css(\"background-color\"));
	});	
	
	$(\"#colorPickerVtd td\").click(function(){
		if ( this.id == \"nocolor\" ) {
			$(\"div.ColorPickerDivSample.active\").attr(\"color1\", \"\");
			$(\"div.ColorPickerDivSample.active\").attr(\"color2\", \"\");
		} else {
			bgcol=$(this).css(\"backgroundColor\");
			if(bgcol.substring(0,1)!=\"#\")
				bgcol=rgbToHex(bgcol);
			else
				bgcol=bgcol.substring(1);
			$(\"div.ColorPickerDivSample.active\").attr(\"color1\", bgcol);
			arr = HexToDec(bgcol);
			red = parseInt( arr[0] * 0.85 );
			green = parseInt( arr[1] * 0.85 );
			blue = parseInt( arr[2] * 0.85 );
			hex = DecToHex( red, green, blue );
			$(\"div.ColorPickerDivSample.active\").attr(\"color2\", hex);
		}
		$(\"#colorPickerVtd\").hide();
	});
	
	function click_color_event(th)
	{
		if($(th).css(\"cursor\")==\"pointer\")
	    {
			if(closetimerpicker) {
				window.clearTimeout(closetimerpicker);
				closetimerpicker = null;
		}
		if($(th).attr(\"class\")==\"selector\")
			bc=$(th).parents(\"td:first\").prev(\"td\").find(\"div.ColorPickerDivSample\").css(\"background-color\");
		else
			bc=$(th).parents(\"td:first\").find(\"div.ColorPickerDivSample\").css(\"background-color\");
		
		$(\"div.ColorPickerDivSample\").removeClass(\"active\");
		
		if($(th).attr(\"class\")==\"selector\")
			$(th).parents(\"td:first\").prev(\"td\").find(\"div.ColorPickerDivSample\").addClass(\"active\");
		else
			$(th).parents(\"td:first\").find(\"div.ColorPickerDivSample\").addClass(\"active\");
			
		$(\"#colorPickerVtd\").css(\"top\", $(th).offset().top + \"px\");
		$(\"#colorPickerVtd\").css(\"left\", $(th).offset().left + $(th).width() + 3 + \"px\");
		$(\"#colorPickerVtd\").show();
		$(\"#colorPickerVtd td\").each(function(){
			$(this).css(\"border\", \"1px solid \"+$(this).css(\"background-color\"));
			if(bc==$(this).css(\"background-color\"))
				$(this).css(\"border\", \"1px dotted #fff\");
		});
	    }
	}

	";
}

function MoveTdTotal()
{
return "
function total_td_move(th,direct)
{
	tr=$(th).parent().parent().parent();

	if(direct==\"up\")
		tr2=$(tr).prev();
	else
		tr2=$(tr).next();
		
	if(!$(tr2).find(\"td\").eq(3).find(\"input\").get(0))
		tr2=\"\";		
	else
		if($(tr2).find(\"td\").eq(3).find(\"input\").get(0).disabled)
			tr2=\"\";		
	if(tr2!=\"\")
	{
		if(direct==\"up\")
			$(tr).insertBefore(tr2);
		else
			$(tr).insertAfter(tr2);
	}
}";
}

function PrepareString4DB($str)
{
	if(GetDatabaseType()!=nDATABASE_Oracle)
	{
		return "'".db_addslashes($str)."'";
	}

	if(strlen($str)<4000)
		return "'".db_addslashes($str)."'";
	$chunklen = 3900;
	$chunks = floor(strlen($str)/$chunklen);
	if(strlen($str) % $chunklen)
		$chunks++;
	$out="";
	for($i=0;$i<$chunks;$i++)
	{
		if(strlen($out))
			$out.="||";
		$out.="to_clob('";
		$out.=db_addslashes(substr($str,$i*$chunklen,$chunklen));
		$out.="')";
	}
	return $out;
}
function WRmake_db_value($field,$value,$table="")
{	
	$ret=WRprepare_for_db($field,$value,$table);
	
	if($ret===false)
		return $ret;
	return WRadd_db_quotes($field,$ret,$table);
}

function WRadd_db_quotes($field,$value,$table="")
{
	$type = WRGetFieldType($table.".".$field);
	if(IsBinaryType($type))
		return db_addslashesbinary($value);
	if(($value==="" || $value===FALSE) && !IsCharType($type))
		return "null";
	if(NeedQuotes($type))
	{
		if(!IsDateFieldType($type))
			$value="'".db_addslashes($value)."'";
		else
			$value=db_datequotes($value);
	}
	else
	{
		$strvalue = (string)$value;
		$strvalue = str_replace(",",".",$strvalue);
		if(is_numeric($strvalue))
			$value=$strvalue;
		else
			$value=0;
	}
	return $value;
}

function WRprepare_for_db($field,$value,$table="")
{
	$type=WRGetFieldType($table.".".$field);
	if(is_array($value))
		$value=combinevalues($value);
	if(($value==="" || $value===FALSE) && !IsCharType($type))
		return "";
	if(IsDateFieldType($type))
		$value=localdatetime2db($value);
	return $value;
}

function DBGetTablesList()
{
	global $dal;
	$tables = WRGetTablesList();
	$ret=array();

	foreach($tables as $value)
	{
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" 
		&& substr($value,-15)!="webreport_admin" && substr($value,-18)!="webreport_settings")
			$ret[]=$value;
	}
	return $ret;
}




function WRGetTableListAdmin($db_type)
{
	global $conn;
	$ret=array();
	$rs=db_query("select tablename,group_name from webreport_admin where db_type='".$db_type."'",$conn);
	while($data = db_fetch_numarray( $rs )) 
		$ret[]=array("tablename"=>$data[0],"group"=>$data[1]);	
	return $ret;
}

function GetTablesListReport()
{
	$arr=array();
	$tables_admin_project=array();
	$tables_admin_project = WRGetTableListAdmin("project");
	$strPerm = GetUserPermissions("tarifa");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="tarifa";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="tarifa";
	}
	$strPerm = GetUserPermissions("agenda");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="agenda";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="agenda";
	}
	$strPerm = GetUserPermissions("centrocusto");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="centrocusto";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="centrocusto";
	}
	$strPerm = GetUserPermissions("cdr");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="cdr";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="cdr";
	}
	$strPerm = GetUserPermissions("sigame");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="sigame";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="sigame";
	}
	$strPerm = GetUserPermissions("cadeado");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="cadeado";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="cadeado";
	}
	$strPerm = GetUserPermissions("codecs");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="codecs";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="codecs";
	}
	$strPerm = GetUserPermissions("ramal_autorizado");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="ramal_autorizado";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="ramal_autorizado";
	}
	$strPerm = GetUserPermissions("admin_rights");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="admin_rights";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="admin_rights";
	}
	$strPerm = GetUserPermissions("desvios");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="desvios";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="desvios";
	}
	$strPerm = GetUserPermissions("pabx");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="pabx";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="pabx";
	}
	$strPerm = GetUserPermissions("desvios_pabx");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="desvios_pabx";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="desvios_pabx";
	}
	$strPerm = GetUserPermissions("horario");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="horario";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="horario";
	}
	$strPerm = GetUserPermissions("ramal_pabx_autorizado");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="ramal_pabx_autorizado";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="ramal_pabx_autorizado";
	}
	$strPerm = GetUserPermissions("sip_users");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="sip_users";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="sip_users";
	}
	$strPerm = GetUserPermissions("admin_members");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="admin_members";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="admin_members";
	}
	$strPerm = GetUserPermissions("admin_users");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="admin_users";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="admin_users";
	}
	$strPerm = GetUserPermissions("contrato_trad");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="contrato_trad";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="contrato_trad";
	}
	$strPerm = GetUserPermissions("contrato_voip");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="contrato_voip";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="contrato_voip";
	}
	$strPerm = GetUserPermissions("contrato_gsm");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="contrato_gsm";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="contrato_gsm";
	}
	$strPerm = GetUserPermissions("cadencias");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="cadencias";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="cadencias";
	}
	$strPerm = GetUserPermissions("parametros");
	if(strpos($strPerm, "P")!==false || strpos($strPerm, "S")!==false)
	{
		$value="parametros";
		if(substr($value,-6)!="_audit" && substr($value,-8)!="_locking" && substr($value,-9)!="_ugrights" && substr($value,-9)!="_uggroups" 
		&& substr($value,-10)!="_ugmembers" && substr($value,-7)!="_rights" && substr($value,-6)!="_users" 
		&& substr($value,-8)!="_members" && substr($value,-10)!="webreports" && substr($value,-15)!="webreport_style" && substr($value,-18)!="webreport_settings")
			$arr[]="parametros";
	}
	return $arr;
}


function DBGetTablesListByGroup($db=true)
{
	if($db)
		$tables = DBGetTablesList();
	else
		$tables = GetTablesListReport();
	
	$ret=array();
	if($db)
		$tables_admin = WRGetTableListAdmin("db");
	else
		$tables_admin = WRGetTableListAdmin("project");
	$userGroups = GetUserGroup();

//	all tables
	foreach($tables as $tablename)
	{
//	permissions
		foreach($tables_admin as $tablerights)
		{
			if($tablerights["tablename"]!=$tablename)
				continue;
//	user groups
			$found=false;
			if(!count($userGroups))
			{
//	no groups at all
				$found=true;
			}
			elseif($tablerights["group"]=="")
			{
//	initial table initialization
				$found=true;
			}
			else
			{
				foreach($userGroups as $group)
				{
					if((string)$group == $tablerights["group"])
					{
						$found=true;
						break;
					}
				}
			}
			if($found)
			{
				$ret[]=$tablename;
				break;
			}
		}
	}
	return $ret;
}


function isWRAdmin()
{
	$sUserGroup=@$_SESSION["GroupID"];
	return IsAdmin();
}
function sortUserGroup($a,$b)
{
	if($a[1]<$b[1])
		return -1;
	else
		return 1;
}
function Convert_Old_Chart($arr)
{
	switch($arr["chart_type"]["type"])
	{
		case "3d_column":
			$arr["chart_type"]["type"]="2d_column";
			$arr["appearance"]["is3d"]="true";
			$arr["appearance"]["isstacked"]="false";
			break;
		case "3d_bar":
			$arr["chart_type"]["type"]="2d_bar";
			$arr["appearance"]["is3d"]="true";
			$arr["appearance"]["isstacked"]="false";
			break;
		case "3d_column_stacked":
			$arr["chart_type"]["type"]="2d_column";
			$arr["appearance"]["is3d"]="true";
			$arr["appearance"]["isstacked"]="true";
			break;
		case "3d_bar_stacked":
			$arr["chart_type"]["type"]="2d_bar";
			$arr["appearance"]["is3d"]="true";
			$arr["appearance"]["isstacked"]="true";
			break;
		case "2d_column_stacked":
			$arr["chart_type"]["type"]="2d_column";
			$arr["appearance"]["isstacked"]="true";
			$arr["appearance"]["is3d"]="false";
			break;
		case "2d_column":
			$arr["chart_type"]["type"]="2d_column";
			if(!isset($arr["appearance"]["isstacked"]))
				$arr["appearance"]["isstacked"]="false";
			if(!isset($arr["appearance"]["is3d"]))
				$arr["appearance"]["is3d"]="false";
			break;
		case "2d_bar_stacked":
			$arr["chart_type"]["type"]="2d_bar";
			$arr["appearance"]["isstacked"]="true";
			$arr["appearance"]["is3d"]="false";
			break;
		case "2d_bar":
			$arr["chart_type"]["type"]="2d_bar";
			if(!isset($arr["appearance"]["isstacked"]))
				$arr["appearance"]["isstacked"]="false";
			if(!isset($arr["appearance"]["is3d"]))
				$arr["appearance"]["is3d"]="false";
			break;
		case "line":
			$arr["chart_type"]["type"]="line";
			if(!isset($arr["appearance"]["linestyle"]))
				$arr["appearance"]["linestyle"]=0;
			break;
		case "spline":
			$arr["chart_type"]["type"]="line";
			$arr["appearance"]["linestyle"]=1;
			break;
		case "step_line":
			$arr["chart_type"]["type"]="line";
			$arr["appearance"]["linestyle"]=2;
			break;
		case "area_stacked":
			$arr["chart_type"]["type"]="area";
			$arr["appearance"]["isstacked"]="true";
			break;
	}
	if(!isset($arr['appearance']["cscroll"]))
	{
		$arr['appearance']["cscroll"]="true";
		$arr['appearance']["autoupdate"]="false";
		$arr['appearance']["maxbarscroll"]="10";
		$arr['appearance']["update_interval"]="5";
	}

	for($i=0;$i<4;$i++)
	{
		if(isset($arr['appearance']['color'.($i+1).'1']))
			$arr['parameters'][$i]['series_color']=$arr['appearance']['color'.($i+1).'1'];
	}
	return $arr;
}
?>