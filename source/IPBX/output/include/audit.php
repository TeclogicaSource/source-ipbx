<?php
class AuditTrailTable
{
	var $logTableName="ipbx_audit";
	var $TableObj;
	
	var $strLogin="login";
	var $strFailLogin="failed login";
	var $strLogout="logout";
	var $strChPass="�hange password";
	var $strAdd="add";
	var $strEdit="edit";
	var $strDelete="delete";
	var $strAccess="access";
	var $strKeysHeader="---Keys";
	var $strFieldsHeader="---Fields";
	var $columnDate="Date";
	var $columnTime="Time";
	var $columnIP="IP";
	var $columnUser="User";
	var $columnTable="Table";
	var $columnAction="Action";
	var $columnKey="Key field";
	var $columnField="Field";
	var $columnOldValue="Old value";
	var $columnNewValue="New value";
	var $attLogin=0;
	var $timeLogin=0;

	function AuditTrailTable()
	{
		global $dal;
		$this->TableObj = &$dal->Table($this->logTableName);
	}
    function LogLogin()
    {
    }
    function LogLoginFailed($pUsername)
    {
    }
    function LogLogout()
    {
    }
    function LogChPassword()
    {
    }
    function LogAdd($str_table,$values,$keys)
    {
		$str="";
	
		if(count($keys)>0)
		{
			$str.=$this->strKeysHeader."\r\n";
			foreach($keys as $idx=>$val)
				$str.=$idx." : ".$val."\r\n";
		}
		$strFields="";
		if($this->logValueEnable($str_table))
		{
			foreach($values as $idx=>$val)
			{
				if($val!="" && !array_key_exists($idx,$keys))
				{
					$strFields.=$idx." [new]: ";
					if(IsBinaryType(GetFieldType($idx,$str_table)))
						$v="<binary value>";
					else
					{
						$v=str_replace(array("\r\n","\n","\t")," ",$val);
						if(strlen($v)>300)
							$v=substr($val,0,300);
					}
					$strFields.=$v."\r\n";
				}
			}
		}
		if($strFields!="")
			$str.=$this->strFieldsHeader."\r\n".$strFields;
		$this->TableObj->datetime=now();
		$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
		$this->TableObj->user=$_SESSION["UserID"];
		$this->TableObj->table=$str_table;
		$this->TableObj->action=$this->strAdd;
		$this->TableObj->description=$str;
		$this->TableObj->Add();
    }
    function LogEdit($str_table,$newvalues,$oldvalues,$keys)
    {
		$str="";
	
		if(count($keys)>0)
		{
			$str.=$this->strKeysHeader."\r\n";
			foreach($newvalues as $idx=>$val)
			{
				if(array_key_exists($idx,$keys))
				{
					if($val!=$oldvalues[$idx])
					{
						$str.=$idx." [old]: ".$oldvalues[$idx]."\r\n";
						$str.=$idx." [new]: ".$val."\r\n";
					}
					else
						$str.=$idx." : ".$val."\r\n";
				}
			}
		}
		$strFields="";
		if($this->logValueEnable($str_table))
		{
			$v="";
			foreach($newvalues as $idx=>$val)
			{
				$type=GetFieldType($idx,$str_table);
				if(IsBinaryType($type))
					continue;
				if(IsDateFieldType($type))
				{
					$newvalue=format_datetime_custom(db2time($newvalues[$idx]),"yyyy-MM-dd HH:mm:ss");
					$oldvalue=format_datetime_custom(db2time($oldvalues[$idx]),"yyyy-MM-dd HH:mm:ss");
				}
				else
				{
					$newvalue=$newvalues[$idx];
					$oldvalue=$oldvalues[$idx];
				}
				if($newvalue!=$oldvalue && !array_key_exists($idx,$keys))
				{
					$strFields.=$idx." [old]: ";
					if(IsBinaryType($type))
						$v="<binary value>";
					else
					{
						$v=str_replace(array("\r\n","\n","\t")," ",$oldvalue);
						if(strlen($v)>300)
							$v=substr($v,0,300);
					}
					$strFields.=$v."\r\n";
											
					$strFields.=$idx." [new]: ";
					if(IsBinaryType($type))
						$v="<binary value>";
					else
					{
						$v=str_replace(array("\r\n","\n","\t")," ",$newvalue);
						if(strlen($v)>300)
							$v=substr($v,0,300);
					}
					$strFields.=$v."\r\n";
				}
			}
			$v="";
		}
		if($strFields!="")
			$str.=$this->strFieldsHeader."\r\n".$strFields;
		$this->TableObj->datetime=now();
		$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
		$this->TableObj->user=$_SESSION["UserID"];
		$this->TableObj->table=$str_table;
		$this->TableObj->action=$this->strEdit;
		$this->TableObj->description=$str;
		$this->TableObj->Add();
    }
    function LogDelete($str_table,$values,$keys)
    {
		$str="";
		if(count($keys)>0)
		{
			$str.=$this->strKeysHeader."\r\n";
			foreach($keys as $idx=>$val)
				$str.=$idx." : ".$val."\r\n";
		}
		$strFields="";
		if($this->logValueEnable($str_table))
		{
			$v="";
			foreach($values as $idx=>$val)
			{
				if($val!="" && !array_key_exists($idx,$keys))
				{
					$strFields.=$idx." [old]: ";
					if(IsBinaryType(GetFieldType($idx,$str_table)))
						$v="<binary value>";
					else
					{	
						$v=str_replace(array("\r\n","\n","\t")," ",$val);
						if(strlen($v)>300)
							$v=substr($v,0,300);
					}
					$strFields.=$v."\r\n";
				}
			}
		}
		if($strFields!="")
			$str.=$this->strFieldsHeader."\r\n".$strFields;
		$this->TableObj->datetime=now();
		$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
		$this->TableObj->user=$_SESSION["UserID"];
		$this->TableObj->table=$str_table;
		$this->TableObj->action=$this->strDelete;
		$this->TableObj->description=$str;
		$this->TableObj->Add();
    }
    
    function LogAddEvent($message,$description="",$stable="")
    {
		$this->TableObj->datetime=now();
		$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
		$this->TableObj->user=$_SESSION["UserID"];
		$this->TableObj->table=$stable;
		$this->TableObj->action=$message;
		$this->TableObj->description=$description;
		$this->TableObj->Add();
    }
    function LoginSuccessful()
    {
		if($this->attLogin>0 && $this->timeLogin>0)
		{
			$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
			$this->TableObj->action=$this->strAccess;
			$this->TableObj->Delete();
		}
		
    }
    function LoginUnsuccessful($pUsername)
    {
		if($this->attLogin>0 && $this->timeLogin>0)
		{
			$this->TableObj->datetime=now();
			$this->TableObj->ip=$_SERVER["REMOTE_ADDR"];
			$this->TableObj->user=$pUsername;
			$this->TableObj->table="";
			$this->TableObj->action=$this->strAccess;
			$this->TableObj->description="";
			$this->TableObj->Add();
		}
    }
    
	function LoginAccess()
	{
		if($this->attLogin>0 && $this->timeLogin>0)
		{
			$rstmp=$this->TableObj->Query(AddFieldWrappers("ip")."='".$_SERVER["REMOTE_ADDR"]."' and ".AddFieldWrappers("action")."='access'",AddFieldWrappers("id")." asc");
			$i=0;
			while($data = db_fetch_array($rstmp))
			{
				if(secondsPassedFrom($data["datetime"])/60<=$this->timeLogin)
				{
					if($i==0)
					{
						$firstAccess=$data["datetime"];
					}
					$i+=1;
				}
			}
			if($i>=$this->attLogin)
				return ceil($this->timeLogin-secondsPassedFrom($firstAccess)/60);
			else
				return false;
		}
		else
			return false;
	}
	function logValueEnable($table)
	{
		if($table=="agenda")
		{
			return true;
		}
		if($table=="centrocusto")
		{
			return true;
		}
		if($table=="cdr")
		{
			return true;
		}
		if($table=="admin_rights")
		{
			return true;
		}
		if($table=="horario")
		{
			return true;
		}
		if($table=="contrato_trad")
		{
			return true;
		}
		if($table=="contrato_voip")
		{
			return true;
		}
		if($table=="contrato_gsm")
		{
			return true;
		}
		if($table=="cadencias")
		{
			return true;
		}
		if($table=="VONO")
		{
			return true;
		}
		if($table=="ipbx_audit")
		{
			return true;
		}
		if($table=="sms_celulares")
		{
			return true;
		}
		if($table=="sms_noticias")
		{
			return true;
		}
		if($table=="sms_grupo")
		{
			return true;
		}
		if($table=="cc_receptivo_filas")
		{
			return true;
		}
		if($table=="cc_menu_atend")
		{
			return true;
		}
		if($table=="cc_menu_atend_item")
		{
			return true;
		}
		if($table=="Graf. Atendimento")
		{
			return false;
		}
		if($table=="Graf. Atendimento (Mensal)")
		{
			return false;
		}
		if($table=="parametros")
		{
			return true;
		}
		if($table=="Graf. Custo Trad")
		{
			return false;
		}
		if($table=="Graf. Custo Voip")
		{
			return false;
		}
		if($table=="Graf. Minutagem Trad")
		{
			return false;
		}
		if($table=="Graf. Minutagem Voip")
		{
			return false;
		}
		if($table=="conf_sala")
		{
			return true;
		}
		if($table=="conf_sala_convidado")
		{
			return true;
		}
		if($table=="ipbx_gravacoes")
		{
			return true;
		}
		if($table=="Graf. Lig. Discadas")
		{
			return false;
		}
		if($table=="ldap")
		{
			return true;
		}
		if($table=="timeout")
		{
			return true;
		}
		if($table=="central")
		{
			return true;
		}
		if($table=="ipbx_interf_vono")
		{
			return true;
		}
		if($table=="ipbx_interf_fxs")
		{
			return true;
		}
		if($table=="ipbx_canais")
		{
			return true;
		}
		if($table=="ipbx_interf_e1")
		{
			return true;
		}
		if($table=="ipbx_interf_gsm")
		{
			return true;
		}
		if($table=="ipbx_interf_mslync")
		{
			return true;
		}
		if($table=="ipbx_interf_sip")
		{
			return true;
		}
		if($table=="ipbx_interf_voxip")
		{
			return true;
		}
		if($table=="ipbx_plano_disc")
		{
			return true;
		}
		if($table=="ipbx_ramais")
		{
			return true;
		}
		if($table=="ipbx_grupo_captura")
		{
			return true;
		}
		if($table=="ipbx_desv_prefix")
		{
			return true;
		}
		if($table=="ipbx_desv_prefix_item")
		{
			return true;
		}
		if($table=="admin_members")
		{
			return true;
		}
		if($table=="admin_users")
		{
			return true;
		}
		if($table=="ipbx_call_back")
		{
			return true;
		}
		if($table=="ipbx_conf_grav")
		{
			return true;
		}
		if($table=="ipbx_rcv_fax")
		{
			return true;
		}
		if($table=="ipbx_tx_fax")
		{
			return true;
		}
		if($table=="ipbx_send_fax")
		{
			return true;
		}
		if($table=="ipbx_conf_fax")
		{
			return true;
		}
		if($table=="ipbx_backup")
		{
			return true;
		}
		if($table=="Restore")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_conf")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_inbound")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_outbound")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_msg")
		{
			return true;
		}
		if($table=="ipbx_interf_callman")
		{
			return true;
		}
		if($table=="ipbx_tarifa_vc2")
		{
			return true;
		}
		if($table=="Graf. Centro de custo")
		{
			return false;
		}
		if($table=="Graf. Custo GSM")
		{
			return false;
		}
		if($table=="Graf. Minutagem GSM")
		{
			return false;
		}
		if($table=="Rel. Abandonos")
		{
			return false;
		}
		if($table=="Rel. Atendimento")
		{
			return false;
		}
		if($table=="Rel. Bilhetagem")
		{
			return false;
		}
		if($table=="Rel. Detalhado - Centro de custo")
		{
			return false;
		}
		if($table=="Rel. Lig Custo por tronco")
		{
			return false;
		}
		if($table=="Rel. Lig. Discadas")
		{
			return false;
		}
		if($table=="Rel. Recebidas")
		{
			return false;
		}
		if($table=="Rel. Simplificado - Centro de custo")
		{
			return false;
		}
		if($table=="Graf. Chamadas sem atendimento")
		{
			return false;
		}
		if($table=="ipbx_pesquisa_ura_rev")
		{
			return true;
		}
		if($table=="Rel. Pesquisa")
		{
			return false;
		}
		if($table=="Rel. Ura Reversa - Enfileiramento")
		{
			return false;
		}
		if($table=="Rel. Pesquisa Reversa")
		{
			return false;
		}
		if($table=="diag_ipbx")
		{
			return true;
		}
		if($table=="ipbx_horario_desv_ramais")
		{
			return true;
		}
		if($table=="ipbx_horario_desv")
		{
			return true;
		}
		if($table=="ipbx_dt_especifica_feriado")
		{
			return true;
		}
		if($table=="cc_receptivo_filas_horario_desv_ramais")
		{
			return true;
		}
		if($table=="cc_receptivo_filas_horario_desv")
		{
			return true;
		}
		if($table=="ipbx_sincronismo")
		{
			return true;
		}
		if($table=="ipbx_ldap_conf")
		{
			return true;
		}
		if($table=="personal_info")
		{
			return true;
		}
		if($table=="ipbx_interf_fxo")
		{
			return true;
		}
		if($table=="ipbx_painel_op")
		{
			return true;
		}
		if($table=="Rel. Centro de custo")
		{
			return false;
		}
		if($table=="v_contatos")
		{
			return true;
		}
		if($table=="ipbx_disp_mobile")
		{
			return true;
		}
		if($table=="cc_tipos_pausa")
		{
			return true;
		}
		if($table=="ipbx_interf_sip_generica")
		{
			return true;
		}
		if($table=="cc_agentes_fila")
		{
			return true;
		}
		if($table=="cc_agentes")
		{
			return true;
		}
		if($table=="Rel. Cham Detalhada")
		{
			return false;
		}
		if($table=="Rel Produtividade da Fila")
		{
			return false;
		}
		if($table=="Rel. Detalhamento Agente")
		{
			return false;
		}
		if($table=="Graf. Perfil Tempo de espera por dia")
		{
			return false;
		}
		if($table=="Graf. Historico fila data")
		{
			return false;
		}
		if($table=="Graf. Historico fila hora")
		{
			return false;
		}
		if($table=="Rel. Historico Fila Data")
		{
			return false;
		}
		if($table=="Rel. Historico Fila Hora")
		{
			return false;
		}
		if($table=="cc_receptivo_filas_atend")
		{
			return true;
		}
		if($table=="Graf. perfil atendimento")
		{
			return false;
		}
		if($table=="Rel. Produt filas grupo por data")
		{
			return false;
		}
		if($table=="Rel. Produt filas grupo por mes")
		{
			return false;
		}
		if($table=="Rel. Perf. Tempo Espera")
		{
			return false;
		}
		if($table=="Rel. Produt. Agentes Dia")
		{
			return false;
		}
		if($table=="Rel. Disponibilidade Agente")
		{
			return false;
		}
		if($table=="ipbx_provisionamento")
		{
			return true;
		}
		if($table=="blacklist")
		{
			return true;
		}
		if($table=="Rel. Desvios Chamadas")
		{
			return false;
		}
		if($table=="ipbx_ugmembers")
		{
			return true;
		}
	}
}

class AuditTrailFile
{
	var $logfile="audit.log";
	var $strLogin="login";
	var $strFailLogin="failed login";
	var $strLogout="logout";
	var $strChPass="�hange password";
	var $strAdd="add";
	var $strEdit="edit";
	var $strDelete="delete";
	var $strAccess="access";
	var $strKeysHeader="---Keys";
	var $strFieldsHeader="---Fields";
	var $columnDate="Date";
	var $columnTime="Time";
	var $columnIP="IP";
	var $columnUser="User";
	var $columnTable="Table";
	var $columnAction="Action";
	var $columnKey="Key field";
	var $columnField="Field";
	var $columnOldValue="Old value";
	var $columnNewValue="New value";
    function LogLogin()
    {
		    }
    function LogLoginFailed($pUsername)
    {
		    }
    function LogLogout()
    {
		    }
    function LogChPassword()
    {
		    }
    function LogAdd($str_table,$values,$keys)
    {
		if(count($keys)>0)
		{
			$key="";
			foreach($keys as $idx=>$val)
			{
				if($key!="")
					$key.=",";
				$key.=$val;
			}
		}

		$fp=$this->CreateLogFile();
		$str=format_datetime_custom(db2time(now()),"MMM dd,yyyy").chr(9).format_datetime_custom(db2time(now()),"HH:mm:ss").chr(9).$_SERVER["REMOTE_ADDR"].chr(9).$_SESSION["UserID"].chr(9).$str_table.chr(9).$this->strAdd.chr(9).$key;
		if($this->logValueEnable($str_table))
		{
			foreach($values as $idx=>$val)
			{
				if($val!="" && !array_key_exists($idx,$keys))
				{
					$v="";
					if(IsBinaryType(GetFieldType($idx,$str_table)))
						$v="<binary value>"."\r\n";
					else
					{
						$v=str_replace(array("\r\n","\n","\t")," ",$val);
						if(strlen($v)>300)
							$v=substr($v,0,300);
					}
					if($fp)
						fputs($fp,$str.chr(9).$idx.chr(9).$v."\r\n");
				}
			}
		}
		elseif($fp)
		{
			fputs($fp,$str."\r\n");
			fclose($fp);
		}
    }
    function LogEdit($str_table,$newvalues,$oldvalues,$keys)
    {
		if(count($keys)>0)
		{
			$key="";
			foreach($keys as $idx=>$val)
			{
				if($key!="")
					$key.=",";
				$key.=$val;
			}
		}

		$fp=$this->CreateLogFile();
		$str=format_datetime_custom(db2time(now()),"MMM dd,yyyy").chr(9).format_datetime_custom(db2time(now()),"HH:mm:ss").chr(9).$_SERVER["REMOTE_ADDR"].chr(9).$_SESSION["UserID"].chr(9).$str_table.chr(9).$this->strEdit.chr(9).$key;
		$putsValue=true;
		if($this->logValueEnable($str_table))
		{
			foreach($newvalues as $idx=>$val)
			{
				$type=GetFieldType($idx,$str_table);
				if(IsBinaryType($type))
					continue;
				if(IsDateFieldType($type))
				{
					$newvalue=format_datetime_custom(db2time($newvalues[$idx]),"yyyy-MM-dd HH:mm:ss");
					$oldvalue=format_datetime_custom(db2time($oldvalues[$idx]),"yyyy-MM-dd HH:mm:ss");
				}
				else
				{
					$newvalue=$newvalues[$idx];
					$oldvalue=$oldvalues[$idx];
				}
				if($newvalue!=$oldvalue)
				{
					$v1="";
					if(IsBinaryType($type))
						$v1="<binary value>";
					else
					{
						$v1=str_replace(array("\r\n","\n","\t")," ",$oldvalue);
						if(strlen($v1)>300)
							$v1=substr($v1,0,300);
					}
					
					$v2="";
					if(IsBinaryType($type))
						$v2="<binary value>";
					else
					{
						$v2=str_replace(array("\r\n","\n","\t")," ",$newvalue);
						if(strlen($v2)>300)
							$v2=substr($v2,0,300);
					}
					if($fp)
						fputs($fp,$str.chr(9).$idx.chr(9).$v1.chr(9).$v2."\r\n");
					$putsValue=false;				
				}
			}
		}
		if($putsValue && $fp)
		{
			fputs($fp,$str."\r\n");
			fclose($fp);
		}
    }
    function LogDelete($str_table,$values,$keys)
    {
		if(count($keys)>0)
		{
			$key="";
			foreach($keys as $idx=>$val)
			{
				if($key!="")
					$key.=",";
				$key.=$val;
			}
		}
		$fp=$this->CreateLogFile();
		$str=format_datetime_custom(db2time(now()),"MMM dd,yyyy").chr(9).format_datetime_custom(db2time(now()),"HH:mm:ss").chr(9).$_SERVER["REMOTE_ADDR"].chr(9).$_SESSION["UserID"].chr(9).$str_table.chr(9).$this->strDelete.chr(9).$key;
		if($this->logValueEnable($str_table))
		{
			foreach($values as $idx=>$val)
			{
				$v="";
				if(IsBinaryType(GetFieldType($idx,$str_table)))
					$v="<binary value>";
				else
				{
					$v=str_replace(array("\r\n","\n","\t")," ",$val);
					if(strlen($v)>300)
						$v=substr($v,0,300);
				}
				if($fp)
					fputs($fp,$str.chr(9).$idx.chr(9).$v."\r\n");
			}
		}
		elseif($fp)
		{
			fputs($fp,$str."\r\n");
			fclose($fp);
		}
    }
	function CreateLogFile()
	{
		$p=strrpos($this->logfile,".");
		$logfileName=substr($this->logfile,0,$p);
		$logfileExt=substr($this->logfile,$p+1);
		$tn=$logfileName."_".format_datetime_custom(db2time(now()),"yyyyMMdd").".".$logfileExt;
		$fp=@fopen($tn,"a");
		if($fp)
		{
			if(!filesize($tn))
			{
				$str=$this->columnDate.chr(9).$this->columnTime.chr(9).$this->columnIP.chr(9).$this->columnUser.chr(9).$this->columnTable.chr(9).$this->columnAction.chr(9).$this->columnKey.chr(9).$this->columnField.chr(9).$this->columnOldValue.chr(9).$this->columnNewValue."\r\n";
				if($fp)
					fputs($fp,$str);
			}			
		}
		return $fp;
	}
	function LogAddEvent($message,$description="",$table="")
    {
		$fp=$this->CreateLogFile();
		$str=format_datetime_custom(db2time(now()),"MMM dd,yyyy").chr(9).format_datetime_custom(db2time(now()),"HH:mm:ss").chr(9).$_SERVER["REMOTE_ADDR"].chr(9).$_SESSION["UserID"].chr(9).$table.chr(9).$message.chr(9).$description."\r\n";
		if($fp)
		{
			fputs($fp,$str);
			fclose($fp);
		}
    }
    
    function LoginAccess()
	{
		return false;
	}
	function LoginSuccessful()
    {
		return true;
    }
    function LoginUnsuccessful($pUsername)
    {	
		return true;
	}
	function logValueEnable($table)
	{
		if($table=="agenda")
		{
			return true;
		}
		if($table=="centrocusto")
		{
			return true;
		}
		if($table=="cdr")
		{
			return true;
		}
		if($table=="admin_rights")
		{
			return true;
		}
		if($table=="horario")
		{
			return true;
		}
		if($table=="contrato_trad")
		{
			return true;
		}
		if($table=="contrato_voip")
		{
			return true;
		}
		if($table=="contrato_gsm")
		{
			return true;
		}
		if($table=="cadencias")
		{
			return true;
		}
		if($table=="VONO")
		{
			return true;
		}
		if($table=="ipbx_audit")
		{
			return true;
		}
		if($table=="sms_celulares")
		{
			return true;
		}
		if($table=="sms_noticias")
		{
			return true;
		}
		if($table=="sms_grupo")
		{
			return true;
		}
		if($table=="cc_receptivo_filas")
		{
			return true;
		}
		if($table=="cc_menu_atend")
		{
			return true;
		}
		if($table=="cc_menu_atend_item")
		{
			return true;
		}
		if($table=="Graf. Atendimento")
		{
			return false;
		}
		if($table=="Graf. Atendimento (Mensal)")
		{
			return false;
		}
		if($table=="parametros")
		{
			return true;
		}
		if($table=="Graf. Custo Trad")
		{
			return false;
		}
		if($table=="Graf. Custo Voip")
		{
			return false;
		}
		if($table=="Graf. Minutagem Trad")
		{
			return false;
		}
		if($table=="Graf. Minutagem Voip")
		{
			return false;
		}
		if($table=="conf_sala")
		{
			return true;
		}
		if($table=="conf_sala_convidado")
		{
			return true;
		}
		if($table=="ipbx_gravacoes")
		{
			return true;
		}
		if($table=="Graf. Lig. Discadas")
		{
			return false;
		}
		if($table=="ldap")
		{
			return true;
		}
		if($table=="timeout")
		{
			return true;
		}
		if($table=="central")
		{
			return true;
		}
		if($table=="ipbx_interf_vono")
		{
			return true;
		}
		if($table=="ipbx_interf_fxs")
		{
			return true;
		}
		if($table=="ipbx_canais")
		{
			return true;
		}
		if($table=="ipbx_interf_e1")
		{
			return true;
		}
		if($table=="ipbx_interf_gsm")
		{
			return true;
		}
		if($table=="ipbx_interf_mslync")
		{
			return true;
		}
		if($table=="ipbx_interf_sip")
		{
			return true;
		}
		if($table=="ipbx_interf_voxip")
		{
			return true;
		}
		if($table=="ipbx_plano_disc")
		{
			return true;
		}
		if($table=="ipbx_ramais")
		{
			return true;
		}
		if($table=="ipbx_grupo_captura")
		{
			return true;
		}
		if($table=="ipbx_desv_prefix")
		{
			return true;
		}
		if($table=="ipbx_desv_prefix_item")
		{
			return true;
		}
		if($table=="admin_members")
		{
			return true;
		}
		if($table=="admin_users")
		{
			return true;
		}
		if($table=="ipbx_call_back")
		{
			return true;
		}
		if($table=="ipbx_conf_grav")
		{
			return true;
		}
		if($table=="ipbx_rcv_fax")
		{
			return true;
		}
		if($table=="ipbx_tx_fax")
		{
			return true;
		}
		if($table=="ipbx_send_fax")
		{
			return true;
		}
		if($table=="ipbx_conf_fax")
		{
			return true;
		}
		if($table=="ipbx_backup")
		{
			return true;
		}
		if($table=="Restore")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_conf")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_inbound")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_outbound")
		{
			return true;
		}
		if($table=="ipbx_ura_rev_msg")
		{
			return true;
		}
		if($table=="ipbx_interf_callman")
		{
			return true;
		}
		if($table=="ipbx_tarifa_vc2")
		{
			return true;
		}
		if($table=="Graf. Centro de custo")
		{
			return false;
		}
		if($table=="Graf. Custo GSM")
		{
			return false;
		}
		if($table=="Graf. Minutagem GSM")
		{
			return false;
		}
		if($table=="Rel. Abandonos")
		{
			return false;
		}
		if($table=="Rel. Atendimento")
		{
			return false;
		}
		if($table=="Rel. Bilhetagem")
		{
			return false;
		}
		if($table=="Rel. Detalhado - Centro de custo")
		{
			return false;
		}
		if($table=="Rel. Lig Custo por tronco")
		{
			return false;
		}
		if($table=="Rel. Lig. Discadas")
		{
			return false;
		}
		if($table=="Rel. Recebidas")
		{
			return false;
		}
		if($table=="Rel. Simplificado - Centro de custo")
		{
			return false;
		}
		if($table=="Graf. Chamadas sem atendimento")
		{
			return false;
		}
		if($table=="ipbx_pesquisa_ura_rev")
		{
			return true;
		}
		if($table=="Rel. Pesquisa")
		{
			return false;
		}
		if($table=="Rel. Ura Reversa - Enfileiramento")
		{
			return false;
		}
		if($table=="Rel. Pesquisa Reversa")
		{
			return false;
		}
		if($table=="diag_ipbx")
		{
			return true;
		}
		if($table=="ipbx_horario_desv_ramais")
		{
			return true;
		}
		if($table=="ipbx_horario_desv")
		{
			return true;
		}
		if($table=="ipbx_dt_especifica_feriado")
		{
			return true;
		}
		if($table=="cc_receptivo_filas_horario_desv_ramais")
		{
			return true;
		}
		if($table=="cc_receptivo_filas_horario_desv")
		{
			return true;
		}
		if($table=="ipbx_sincronismo")
		{
			return true;
		}
		if($table=="ipbx_ldap_conf")
		{
			return true;
		}
		if($table=="personal_info")
		{
			return true;
		}
		if($table=="ipbx_interf_fxo")
		{
			return true;
		}
		if($table=="ipbx_painel_op")
		{
			return true;
		}
		if($table=="Rel. Centro de custo")
		{
			return false;
		}
		if($table=="v_contatos")
		{
			return true;
		}
		if($table=="ipbx_disp_mobile")
		{
			return true;
		}
		if($table=="cc_tipos_pausa")
		{
			return true;
		}
		if($table=="ipbx_interf_sip_generica")
		{
			return true;
		}
		if($table=="cc_agentes_fila")
		{
			return true;
		}
		if($table=="cc_agentes")
		{
			return true;
		}
		if($table=="Rel. Cham Detalhada")
		{
			return false;
		}
		if($table=="Rel Produtividade da Fila")
		{
			return false;
		}
		if($table=="Rel. Detalhamento Agente")
		{
			return false;
		}
		if($table=="Graf. Perfil Tempo de espera por dia")
		{
			return false;
		}
		if($table=="Graf. Historico fila data")
		{
			return false;
		}
		if($table=="Graf. Historico fila hora")
		{
			return false;
		}
		if($table=="Rel. Historico Fila Data")
		{
			return false;
		}
		if($table=="Rel. Historico Fila Hora")
		{
			return false;
		}
		if($table=="cc_receptivo_filas_atend")
		{
			return true;
		}
		if($table=="Graf. perfil atendimento")
		{
			return false;
		}
		if($table=="Rel. Produt filas grupo por data")
		{
			return false;
		}
		if($table=="Rel. Produt filas grupo por mes")
		{
			return false;
		}
		if($table=="Rel. Perf. Tempo Espera")
		{
			return false;
		}
		if($table=="Rel. Produt. Agentes Dia")
		{
			return false;
		}
		if($table=="Rel. Disponibilidade Agente")
		{
			return false;
		}
		if($table=="ipbx_provisionamento")
		{
			return true;
		}
		if($table=="blacklist")
		{
			return true;
		}
		if($table=="Rel. Desvios Chamadas")
		{
			return false;
		}
		if($table=="ipbx_ugmembers")
		{
			return true;
		}
	}
}
?>