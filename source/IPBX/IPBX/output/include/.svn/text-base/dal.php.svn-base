<?php

$dal_info=array();


function CustomQuery($dalSQL)
{
	global $conn;
	$rs = db_query($dalSQL,$conn);
	  return $rs;
}

function UsersTableName()
{
	return "`ipbx_ramais`";
}


class tDAL
{
	var $agenda;
	var $centrocusto;
	var $cdr;
	var $ipbx_ugrights;
	var $horario;
	var $contrato_trad;
	var $contrato_voip;
	var $contrato_gsm;
	var $cadencias;
	var $VONO;
	var $ipbx_audit;
	var $sms_celulares;
	var $sms_noticias;
	var $sms_grupo;
	var $cc_receptivo_filas;
	var $cc_menu_atend;
	var $cc_menu_atend_item;
	var $cc_receptivo_filas_atend;
	var $parametros;
	var $conta;
	var $ipbx_interf;
	var $conf_sala;
	var $conf_sala_convidado;
	var $ipbx_gravacoes;
	var $ldap;
	var $timeout;
	var $central;
	var $ipbx_interf_vono;
	var $ipbx_interf_fxs;
	var $ipbx_canais;
	var $ipbx_interf_e1;
	var $ipbx_interf_gsm;
	var $ipbx_interf_mslync;
	var $ipbx_interf_sip;
	var $ipbx_interf_voxip;
	var $ipbx_plano_disc;
	var $ipbx_ramais;
	var $ipbx_grupo_captura;
	var $ipbx_desv_prefix;
	var $ipbx_desv_prefix_item;
	var $ipbx_call_back;
	var $ipbx_conf_grav;
	var $ipbx_rcv_fax;
	var $ipbx_tx_fax;
	var $ipbx_send_fax;
	var $ipbx_conf_fax;
	var $ipbx_backup;
	var $ipbx_ura_rev_conf;
	var $ipbx_ura_rev_inbound;
	var $ipbx_ura_rev_outbound;
	var $ipbx_ura_rev_msg;
	var $ipbx_interf_callman;
	var $ipbx_tarifa_vc2;
	var $v_rel_detalhado_chamadas;
	var $cc_receptivo_n_atend;
	var $ipbx_pesquisa_ura_rev;
	var $ipbx_pesquisa_ura_rev_resp;
	var $ipbx_fila_ura_rev;
	var $ipbx_fila_pesquisa_ura_rev_resp;
	var $ipbx_horario_desv_ramais;
	var $ipbx_horario_desv;
	var $ipbx_dt_especifica_feriado;
	var $cc_receptivo_filas_horario_desv_ramais;
	var $cc_receptivo_filas_horario_desv;
	var $ipbx_sincronismo;
	var $ipbx_ldap_conf;
	var $ipbx_interf_fxo;
	var $ipbx_painel_op;
	var $v_contatos;
	var $ipbx_disp_mobile;
	var $cc_tipos_pausa;
	var $ipbx_interf_sip_generica;
	var $cc_agentes_fila;
	var $cc_agentes;
	var $v_rel_detalhado_agentes;
	var $v_produt_filas;
	var $v_graf_perf_temp_espera_dia;
	var $v_rel_hist_fila_data;
	var $v_rel_hist_fila_data_hora;
	var $v_graf_perf_temp_atendimento;
	var $v_produt_filas_grupo_data;
	var $v_produt_filas_grupo_mes;
	var $v_rel_prod_agentes;
	var $estrategia_fila;
	var $cc_receptivo_logout_estat;
	var $v_ldap_avaiable_names;
	var $v_cc_menu_atend_opcao;
	var $ipbx_contextos;
	var $ipbx_painel_op_privs;
	var $queue_table;
	var $codecs;
	var $ipbx_uggroups;
	var $ipbx_ugmembers;
	var $lstTables;
	var $Table=array();

	function FillTablesList()
	{
		if($this->lstTables)
			return;
	  $this->lstTables[]=array("name"=>"agenda","varname"=>"agenda");
	  $this->lstTables[]=array("name"=>"centrocusto","varname"=>"centrocusto");
	  $this->lstTables[]=array("name"=>"cdr","varname"=>"cdr");
	  $this->lstTables[]=array("name"=>"ipbx_ugrights","varname"=>"ipbx_ugrights");
	  $this->lstTables[]=array("name"=>"horario","varname"=>"horario");
	  $this->lstTables[]=array("name"=>"contrato_trad","varname"=>"contrato_trad");
	  $this->lstTables[]=array("name"=>"contrato_voip","varname"=>"contrato_voip");
	  $this->lstTables[]=array("name"=>"contrato_gsm","varname"=>"contrato_gsm");
	  $this->lstTables[]=array("name"=>"cadencias","varname"=>"cadencias");
	  $this->lstTables[]=array("name"=>"VONO","varname"=>"VONO");
	  $this->lstTables[]=array("name"=>"ipbx_audit","varname"=>"ipbx_audit");
	  $this->lstTables[]=array("name"=>"sms_celulares","varname"=>"sms_celulares");
	  $this->lstTables[]=array("name"=>"sms_noticias","varname"=>"sms_noticias");
	  $this->lstTables[]=array("name"=>"sms_grupo","varname"=>"sms_grupo");
	  $this->lstTables[]=array("name"=>"cc_receptivo_filas","varname"=>"cc_receptivo_filas");
	  $this->lstTables[]=array("name"=>"cc_menu_atend","varname"=>"cc_menu_atend");
	  $this->lstTables[]=array("name"=>"cc_menu_atend_item","varname"=>"cc_menu_atend_item");
	  $this->lstTables[]=array("name"=>"cc_receptivo_filas_atend","varname"=>"cc_receptivo_filas_atend");
	  $this->lstTables[]=array("name"=>"parametros","varname"=>"parametros");
	  $this->lstTables[]=array("name"=>"conta","varname"=>"conta");
	  $this->lstTables[]=array("name"=>"ipbx_interf","varname"=>"ipbx_interf");
	  $this->lstTables[]=array("name"=>"conf_sala","varname"=>"conf_sala");
	  $this->lstTables[]=array("name"=>"conf_sala_convidado","varname"=>"conf_sala_convidado");
	  $this->lstTables[]=array("name"=>"ipbx_gravacoes","varname"=>"ipbx_gravacoes");
	  $this->lstTables[]=array("name"=>"ldap","varname"=>"ldap");
	  $this->lstTables[]=array("name"=>"timeout","varname"=>"timeout");
	  $this->lstTables[]=array("name"=>"central","varname"=>"central");
	  $this->lstTables[]=array("name"=>"ipbx_interf_vono","varname"=>"ipbx_interf_vono");
	  $this->lstTables[]=array("name"=>"ipbx_interf_fxs","varname"=>"ipbx_interf_fxs");
	  $this->lstTables[]=array("name"=>"ipbx_canais","varname"=>"ipbx_canais");
	  $this->lstTables[]=array("name"=>"ipbx_interf_e1","varname"=>"ipbx_interf_e1");
	  $this->lstTables[]=array("name"=>"ipbx_interf_gsm","varname"=>"ipbx_interf_gsm");
	  $this->lstTables[]=array("name"=>"ipbx_interf_mslync","varname"=>"ipbx_interf_mslync");
	  $this->lstTables[]=array("name"=>"ipbx_interf_sip","varname"=>"ipbx_interf_sip");
	  $this->lstTables[]=array("name"=>"ipbx_interf_voxip","varname"=>"ipbx_interf_voxip");
	  $this->lstTables[]=array("name"=>"ipbx_plano_disc","varname"=>"ipbx_plano_disc");
	  $this->lstTables[]=array("name"=>"ipbx_ramais","varname"=>"ipbx_ramais");
	  $this->lstTables[]=array("name"=>"ipbx_grupo_captura","varname"=>"ipbx_grupo_captura");
	  $this->lstTables[]=array("name"=>"ipbx_desv_prefix","varname"=>"ipbx_desv_prefix");
	  $this->lstTables[]=array("name"=>"ipbx_desv_prefix_item","varname"=>"ipbx_desv_prefix_item");
	  $this->lstTables[]=array("name"=>"ipbx_call_back","varname"=>"ipbx_call_back");
	  $this->lstTables[]=array("name"=>"ipbx_conf_grav","varname"=>"ipbx_conf_grav");
	  $this->lstTables[]=array("name"=>"ipbx_rcv_fax","varname"=>"ipbx_rcv_fax");
	  $this->lstTables[]=array("name"=>"ipbx_tx_fax","varname"=>"ipbx_tx_fax");
	  $this->lstTables[]=array("name"=>"ipbx_send_fax","varname"=>"ipbx_send_fax");
	  $this->lstTables[]=array("name"=>"ipbx_conf_fax","varname"=>"ipbx_conf_fax");
	  $this->lstTables[]=array("name"=>"ipbx_backup","varname"=>"ipbx_backup");
	  $this->lstTables[]=array("name"=>"ipbx_ura_rev_conf","varname"=>"ipbx_ura_rev_conf");
	  $this->lstTables[]=array("name"=>"ipbx_ura_rev_inbound","varname"=>"ipbx_ura_rev_inbound");
	  $this->lstTables[]=array("name"=>"ipbx_ura_rev_outbound","varname"=>"ipbx_ura_rev_outbound");
	  $this->lstTables[]=array("name"=>"ipbx_ura_rev_msg","varname"=>"ipbx_ura_rev_msg");
	  $this->lstTables[]=array("name"=>"ipbx_interf_callman","varname"=>"ipbx_interf_callman");
	  $this->lstTables[]=array("name"=>"ipbx_tarifa_vc2","varname"=>"ipbx_tarifa_vc2");
	  $this->lstTables[]=array("name"=>"v_rel_detalhado_chamadas","varname"=>"v_rel_detalhado_chamadas");
	  $this->lstTables[]=array("name"=>"cc_receptivo_n_atend","varname"=>"cc_receptivo_n_atend");
	  $this->lstTables[]=array("name"=>"ipbx_pesquisa_ura_rev","varname"=>"ipbx_pesquisa_ura_rev");
	  $this->lstTables[]=array("name"=>"ipbx_pesquisa_ura_rev_resp","varname"=>"ipbx_pesquisa_ura_rev_resp");
	  $this->lstTables[]=array("name"=>"ipbx_fila_ura_rev","varname"=>"ipbx_fila_ura_rev");
	  $this->lstTables[]=array("name"=>"ipbx_fila_pesquisa_ura_rev_resp","varname"=>"ipbx_fila_pesquisa_ura_rev_resp");
	  $this->lstTables[]=array("name"=>"ipbx_horario_desv_ramais","varname"=>"ipbx_horario_desv_ramais");
	  $this->lstTables[]=array("name"=>"ipbx_horario_desv","varname"=>"ipbx_horario_desv");
	  $this->lstTables[]=array("name"=>"ipbx_dt_especifica_feriado","varname"=>"ipbx_dt_especifica_feriado");
	  $this->lstTables[]=array("name"=>"cc_receptivo_filas_horario_desv_ramais","varname"=>"cc_receptivo_filas_horario_desv_ramais");
	  $this->lstTables[]=array("name"=>"cc_receptivo_filas_horario_desv","varname"=>"cc_receptivo_filas_horario_desv");
	  $this->lstTables[]=array("name"=>"ipbx_sincronismo","varname"=>"ipbx_sincronismo");
	  $this->lstTables[]=array("name"=>"ipbx_ldap_conf","varname"=>"ipbx_ldap_conf");
	  $this->lstTables[]=array("name"=>"ipbx_interf_fxo","varname"=>"ipbx_interf_fxo");
	  $this->lstTables[]=array("name"=>"ipbx_painel_op","varname"=>"ipbx_painel_op");
	  $this->lstTables[]=array("name"=>"v_contatos","varname"=>"v_contatos");
	  $this->lstTables[]=array("name"=>"ipbx_disp_mobile","varname"=>"ipbx_disp_mobile");
	  $this->lstTables[]=array("name"=>"cc_tipos_pausa","varname"=>"cc_tipos_pausa");
	  $this->lstTables[]=array("name"=>"ipbx_interf_sip_generica","varname"=>"ipbx_interf_sip_generica");
	  $this->lstTables[]=array("name"=>"cc_agentes_fila","varname"=>"cc_agentes_fila");
	  $this->lstTables[]=array("name"=>"cc_agentes","varname"=>"cc_agentes");
	  $this->lstTables[]=array("name"=>"v_rel_detalhado_agentes","varname"=>"v_rel_detalhado_agentes");
	  $this->lstTables[]=array("name"=>"v_produt_filas","varname"=>"v_produt_filas");
	  $this->lstTables[]=array("name"=>"v_graf_perf_temp_espera_dia","varname"=>"v_graf_perf_temp_espera_dia");
	  $this->lstTables[]=array("name"=>"v_rel_hist_fila_data","varname"=>"v_rel_hist_fila_data");
	  $this->lstTables[]=array("name"=>"v_rel_hist_fila_data_hora","varname"=>"v_rel_hist_fila_data_hora");
	  $this->lstTables[]=array("name"=>"v_graf_perf_temp_atendimento","varname"=>"v_graf_perf_temp_atendimento");
	  $this->lstTables[]=array("name"=>"v_produt_filas_grupo_data","varname"=>"v_produt_filas_grupo_data");
	  $this->lstTables[]=array("name"=>"v_produt_filas_grupo_mes","varname"=>"v_produt_filas_grupo_mes");
	  $this->lstTables[]=array("name"=>"v_rel_prod_agentes","varname"=>"v_rel_prod_agentes");
	  $this->lstTables[]=array("name"=>"estrategia_fila","varname"=>"estrategia_fila");
	  $this->lstTables[]=array("name"=>"cc_receptivo_logout_estat","varname"=>"cc_receptivo_logout_estat");
	  $this->lstTables[]=array("name"=>"v_ldap_avaiable_names","varname"=>"v_ldap_avaiable_names");
	  $this->lstTables[]=array("name"=>"v_cc_menu_atend_opcao","varname"=>"v_cc_menu_atend_opcao");
	  $this->lstTables[]=array("name"=>"ipbx_contextos","varname"=>"ipbx_contextos");
	  $this->lstTables[]=array("name"=>"ipbx_painel_op_privs","varname"=>"ipbx_painel_op_privs");
	  $this->lstTables[]=array("name"=>"queue_table","varname"=>"queue_table");
	  $this->lstTables[]=array("name"=>"codecs","varname"=>"codecs");
	  $this->lstTables[]=array("name"=>"ipbx_uggroups","varname"=>"ipbx_uggroups");
	  $this->lstTables[]=array("name"=>"ipbx_ugmembers","varname"=>"ipbx_ugmembers");
	}
	function & Table($strTable)
	{
		$this->FillTablesList();
		foreach($this->lstTables as $tbl)
		{
			if(strtoupper($strTable)==strtoupper($tbl["name"]))
			{
				$this->CreateClass($tbl);
				return $this->{$tbl["varname"]};
			}
		}
//	check table names without dbo. and other prefixes
		foreach($this->lstTables as $tbl)
		{
			if(strtoupper(cutprefix($strTable))==strtoupper(cutprefix($tbl["name"])))
			{
				$this->CreateClass($tbl);
				return $this->{$tbl["varname"]};
			}
		}
		$dummy=null;
		return $dummy;
	}
	function CreateClass(&$tbl)
	{
		if($this->{$tbl["varname"]})
			return;
//	load table info
		global $dal_info;
		include(getabspath("include/dal/".GoodFieldName($tbl["name"]).".php"));
//	create class and object

		$str = "class class_".GoodFieldName($tbl["name"])." extends tDALTable  {";
		foreach($dal_info[$tbl["name"]] as $fld)
		{
			$str.=' var $'.$fld["varname"].'; ';
		}
		$str.=' function class_'.GoodFieldName($tbl["name"]).'()
			{
				$this->m_TableName = \''.escapesq($tbl["name"]).'\';
			}
		};';
		eval($str);
		$classname="class_".GoodFieldName($tbl["name"]);
		$this->{$tbl["varname"]} = new $classname;
		$this->Table[$tbl["name"]]=&$this->{$tbl["varname"]};
	}
	
	function GetTablesList()
	{
		$this->FillTablesList();
		$res=array();
		foreach($this->lstTables as $tbl)
			$res[]=$tbl["name"];
		return $res;
	}
	
	function GetFieldsList($table)
	{
		$tbl = $this->Table($table);
		return $tbl->GetFieldsList();
	}
	
	function GetFieldType($table,$field)
	{
		$tbl = $this->Table($table);
		return $tbl->GetFieldType($field);
	}
	function GetDBTableKeys($table)
	{
		$tbl = $this->Table($table);
		return $tbl->GetDBTableKeys();
	}
}

$dal = new tDAL;

class tDALTable
{
	var $m_TableName;
	var $Param = array();
	var $Value = array();

	function GetDBTableKeys()
	{
		global $dal_info;
		if(!array_key_exists($this->m_TableName,$dal_info) || !is_array($dal_info[$this->m_TableName]))
		{
			return array();
		}
		$ret=array();
		foreach($dal_info[$this->m_TableName] as $fname=>$f)
		{
			if(@$f["key"])
				$ret[]=$fname;
		}
		return $ret;
	}
	
	function GetFieldsList()
	{
		global $dal_info;
		return array_keys($dal_info[$this->m_TableName]);
	}
	function GetFieldType($field)
	{
		global $dal_info;
		if(!array_key_exists($field,$dal_info[$this->m_TableName]))
			return 200;
		return $dal_info[$this->m_TableName][$field]["type"];
	}
	
	function PrepareValue($value,$type)
	{
	
		if(IsDateFieldType($type))
			return db_datequotes($value);
		if (NeedQuotes($type))
			return "'".db_addslashes($value) . "'";
		else
			return (0+$value);
	}
	
	function TableName()
	{
		return AddTableWrappers($this->m_TableName);
	} 
	function Execute_Query($blobs,$dalSQL,$tableinfo)
	{
	global $conn;
				db_exec($dalSQL,$conn);
	}
	function Add() 
	{
		global $conn,$dal_info;
		$insertFields="";
		$insertValues="";
		$tableinfo = &$dal_info[$this->m_TableName];
		$blobs = array();
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			if(isset($this->{$fld['varname']}))
			{
				$this->Value[$fieldname] = $this->{$fld['varname']};
			}
			foreach($this->Value as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
					continue;
				$insertFields.= AddFieldWrappers($fieldname).",";
				$insertValues.= $this->PrepareValue($value,$fld["type"]) . ",";
				break;
			}
		}
//	prepare and exec SQL
		if ($insertFields!="" && $insertValues!="")		
		{
			$insertFields = substr($insertFields,0,-1);
			$insertValues = substr($insertValues,0,-1);
			$dalSQL = "insert into ".AddTableWrappers($this->m_TableName)." (".$insertFields.") values (".$insertValues.")";
			$this->Execute_Query($blobs,$dalSQL,$tableinfo);
		}
//	cleanup		
	    $this->Reset();
	}

	function QueryAll()
	{
		global $conn;
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName);
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}

	function Query($swhere="",$orderby="")
	{
		global $conn;
		if ($swhere)
			$swhere = " where ".$swhere;
		if ($orderby)
			$orderby = " order by ".$orderby;
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName).$swhere.$orderby;
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}

	function Delete()
	{
		global $conn,$dal_info;
		$deleteFields="";
		$tableinfo = &$dal_info[$this->m_TableName];
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			if(isset($this->{$fld['varname']}))
			{
				$this->Value[$fieldname] = $this->{$fld['varname']};
			}
			
			foreach($this->Value as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
					continue;
				$deleteFields.= AddFieldWrappers($fieldname)."=". $this->PrepareValue($value,$fld["type"]) . " and ";
				break;
			}
		}
//	do delete
		if ($deleteFields)
		{
			$deleteFields = substr($deleteFields,0,-5);
			$dalSQL = "delete from ".AddTableWrappers($this->m_TableName)." where ".$deleteFields;
			db_exec($dalSQL,$conn);
		}
	
//	cleanup
	    $this->Reset();
	}

	function Reset()
	{
		$this->Value=array();
		$this->Param=array();
		global $dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			unset($this->{$fld["varname"]});
		}
	}	

	function Update()
	{
		global $conn,$dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];
		$updateParam = "";
		$updateValue = "";
		$blobs = array();

		foreach($tableinfo as $fieldname=>$fld)
		{
			$command='if(isset($this->'.$fld['varname'].')) { ';
			if($fld["key"])
				$command.='$this->Param[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			else
				$command.='$this->Value[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			$command.=' }';
			eval($command);
			if(!$fld["key"] && !array_key_exists(strtoupper($fieldname),array_change_key_case($this->Param,CASE_UPPER)))
			{
				foreach($this->Value as $field=>$value)
				{
					if (strtoupper($field)!=strtoupper($fieldname))
						continue;
					$updateValue.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . ", ";
					break;
				}
			}
			else
			{
				foreach($this->Param as $field=>$value)
				{
					if (strtoupper($field)!=strtoupper($fieldname))
						continue;
					$updateParam.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . " and ";
					break;
				}
			}
		}

//	construct SQL and do update	
		if ($updateParam)
			$updateParam = substr($updateParam,0,-5);
		if ($updateValue)
			$updateValue = substr($updateValue,0,-2);
		if ($updateValue && $updateParam)
		{
			$dalSQL = "update ".AddTableWrappers($this->m_TableName)." set ".$updateValue." where ".$updateParam;
			$this->Execute_Query($blobs,$dalSQL,$tableinfo);
		}

//	cleanup
		$this->Reset();
	}

	function FetchByID()
	{
		global $conn,$dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];

		$dal_where="";
		foreach($tableinfo as $fieldname=>$fld)
		{
			$command='if(isset($this->'.$fld['varname'].')) { ';
			$command.='$this->Value[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			$command.=' }';
			eval($command);
			foreach($this->Value as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
					continue;
				$dal_where.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . " and ";
				break;
			}
		}
//	cleanup
		$this->Reset();
//	construct and run SQL
		if ($dal_where)
			$dal_where = " where ".substr($dal_where,0,-5);
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName).$dal_where;
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}
}


class DalRecordset
{
	
	var $m_rs;
	var $m_fields;
	var $m_eof;
	
	function Fields($field="")
	{
		if(!$field)
			return $this->m_fields;
		return $this->Field($field);
	}
	
	function Field($field)
	{
		if($this->m_eof)
			return false;
		foreach($this->m_fields as $name=>$value)
		{
			if(!strcasecmp($name,$field))
				return $value;
		}
		return false;
	}
	function DalRecordset($rs)
	{
		$this->m_rs=$rs;
		$this->MoveNext();
	}
	function EOF()
	{
		return $this->m_eof;
	}
	
	function MoveNext()
	{
		if(!$this->m_eof)
			$this->m_fields=db_fetch_array($this->m_rs);
		$this->m_eof = !$this->m_fields;
		return !$this->m_eof;
	}
}

function cutprefix($table)
{
	$pos=strpos($table,".");
	if($pos===false)
		return $table;
	return substr($table,$pos+1);
}

function escapesq($str)
{
	return str_replace(array("\\","'"),array("\\\\","\\'"),$str);
}

?>