<?php
class ConnectionManager
{
	/**
	 * Cached Connection objects
	 * @type Array
	 */
	protected $cache = array();

	/**
	 * Project connections data
	 * @type Array
	 */
	protected $_connectionsData;

	/**
	 * Project connections data
	 * @type Array
	 */
	protected $_connectionsIdByName = array();

	
	/**
	 * An array storing the correspondence between project
	 * datasource tables names and connections ids
	 * @type Array
	 */	
	protected $_tablesConnectionIds;
	
	
	/**
	 * @constructor
	 */
	function ConnectionManager()
	{
		$this->_setConnectionsData();
		$this->_setTablesConnectionIds();
	}
	
	/**
	 * Get connection object by the table name
	 * @param String tName
	 * @return Connection
	 */
	public function byTable( $tName )
	{
		$connId = $this->_tablesConnectionIds[ $tName ];
		if( !$connId )
			return $this->getDefault();
		return $this->byId( $connId );
	}

	/**
	 * Get connection object by the connection name
	 * @param String connName
	 * @return Connection
	 */	
	public function byName( $connName )
	{
		$connId = $this->getIdByName( $connName );
		if( !$connId )
			return $this->getDefault();
		return $this->byId( $connId );
	}
	
	/**
	 * Get connection id by the connection name
	 * @param String connName
	 * @return String
	 */	
	protected function getIdByName( $connName )
	{
		return $this->_connectionsIdByName[ $connName ];
	}
	
	/**
	 * Get connection object by the connection id 
	 * @param String connId
	 * @return Connection
	 */	
	public function byId( $connId )
	{
		if( !isset( $this->cache[ $connId ] ) )
			$this->cache[ $connId ] = $this->getConnection( $connId );

		return $this->cache[ $connId ];
	}
	
	/**
	 * Get the default db connection class
	 * @return Connection
	 */
	public function getDefault()
	{
		return $this->byId( "Tables" );
	}

	/**
	 * Get the users table db connection 
	 * @return Connection
	 */	
	public function getForLogin()
	{
		return $this->byId( "Tables" );
	}
	
	/**
	 * Get the log table db connection 
	 * @return Connection
	 */	
	public function getForAudit()
	{
		return $this->byId( "Tables" );
	}
	
	/**
	 * Get the locking table db connection 
	 * @return Connection
	 */		
	public function getForLocking()
	{
		return $this->byId( "Tables" );
	}	
	
	/**
	 * Get the 'ug_groups' table db connection 
	 * @return Connection
	 */	
	public function getForUserGroups()
	{
		return $this->byId( "Tables" );
	}		

	/**
	 * Get the saved searches table db connection 
	 * @return Connection
	 */	
	public function getForSavedSearches()
	{
		return $this->byId( "Tables" );
	}

	/**
	 * Get the webreports tables db connection 
	 * @return Connection
	 */		
	public function getForWebReports()
	{
		return $this->getDefault();
	}
	
	/**
	 * @param String connId
	 * @return Connection
	 */
	protected function getConnection( $connId )
	{
		include_once getabspath("connections/Connection.php");
		
		$data = $this->_connectionsData[ $connId ];	
		switch( $data["connStringType"] )
		{
			case "mysql":
				if( useMySQLiLib() )
				{
					include_once getabspath("connections/MySQLiConnection.php");
					return new MySQLiConnection( $data );
				}
				
				include_once getabspath("connections/MySQLConnection.php");	
				return new MySQLConnection( $data );	

			case "mssql":
			case "compact":
				if( useMSSQLWinConnect() )
				{
					include_once getabspath("connections/MSSQLWinConnection.php");
					return new MSSQLWinConnection( $data );
				}
				if( isSqlsrvExtLoaded() )
				{
					include_once getabspath("connections/MSSQLSrvConnection.php");	
					return new MSSQLSrvConnection( $data );
				}
				
				include_once getabspath("connections/MSSQLUnixConnection.php");
				return new MSSQLUnixConnection( $data );			

			case "msaccess":
			case "odbc":
			case "odbcdsn":
			case "custom":
			case "file":
				if( stripos($data["ODBCString"], 'Provider=') !== false )
				{
					include_once getabspath("connections/ADOConnection.php");
					return new ADOConnection( $data );
				}
				
				include_once getabspath("connections/ODBCConnection.php");
				return new ODBCConnection( $data );
			
			case "oracle":
				include_once getabspath("connections/OracleConnection.php");
				return new OracleConnection( $data );

			case "postgre":
				include_once getabspath("connections/PostgreConnection.php");
				return new PostgreConnection( $data );

			case "db2":
				include_once getabspath("connections/DB2Connection.php");
				return new DB2Connection( $data );

			case "informix":
				include_once getabspath("connections/InformixConnection.php");
				return new InformixConnection( $data );

			case "sqlite":
				include_once getabspath("connections/SQLite3Connection.php");
				return new SQLite3Connection( $data );
		}
	}
	
	/**
	 * Set the data representing the project's 
	 * db connection properties
	 */	 
	protected function _setConnectionsData()
	{
		// content of this function can be modified on demo account
		// variable names $data and $connectionsData are important

		$connectionsData = array();
		
		$data = array();
		$data["dbType"] = 0;
		$data["connId"] = "Tables";
		$data["connName"] = "asteriskcdrdb at 164.164.164.135";
		$data["connStringType"] = "mysql";
		$data["connectionString"] = "mysql;164.164.164.135;root;remote_mysql_access;3306;asteriskcdrdb;;1"; //currently unused
		
		$this->_connectionsIdByName["asteriskcdrdb at 164.164.164.135"] = "Tables";
		
		$data["connInfo"] = array();
		$data["ODBCUID"] = "root";
		$data["ODBCPWD"] = "remote_mysql_access";
		$data["leftWrap"] = "`";
		$data["rightWrap"] = "`";
		
		$data["DBPath"] = "db"; //currently unused	
		$data["useServerMapPath"] = 1; //currently unused
		
		$data["connInfo"][0] = "164.164.164.135";
		$data["connInfo"][1] = "root";
		$data["connInfo"][2] = "remote_mysql_access";
		$data["connInfo"][3] = "3306";
		$data["connInfo"][4] = "asteriskcdrdb";
		$data["connInfo"][5] = ""; //currently unused
		$data["connInfo"][6] = "1"; //currently unused
		$data["ODBCString"] = "DRIVER={MySQL ODBC 3.51 Driver};Server=164.164.164.135;Uid=root;Pwd=remote_mysql_access;Port=3306;Database=asteriskcdrdb;OPTION=3";
		$connectionsData["Tables"] = $data;
		$this->_connectionsData = $connectionsData;
	}
	
	/**
	 * Set the data representing the correspondence between 
	 * the project's table names and db connections
	 */	 
	protected function _setTablesConnectionIds()
	{
		$connectionsIds = array();
		$connectionsIds["agenda"] = "Tables";
		$connectionsIds["centrocusto"] = "Tables";
		$connectionsIds["cdr"] = "Tables";
		$connectionsIds["admin_rights"] = "Tables";
		$connectionsIds["horario"] = "Tables";
		$connectionsIds["contrato_trad"] = "Tables";
		$connectionsIds["contrato_voip"] = "Tables";
		$connectionsIds["contrato_gsm"] = "Tables";
		$connectionsIds["cadencias"] = "Tables";
		$connectionsIds["VONO"] = "Tables";
		$connectionsIds["ipbx_audit"] = "Tables";
		$connectionsIds["sms_celulares"] = "Tables";
		$connectionsIds["sms_noticias"] = "Tables";
		$connectionsIds["sms_grupo"] = "Tables";
		$connectionsIds["cc_receptivo_filas"] = "Tables";
		$connectionsIds["cc_menu_atend"] = "Tables";
		$connectionsIds["cc_menu_atend_item"] = "Tables";
		$connectionsIds["Graf. Atendimento"] = "Tables";
		$connectionsIds["Graf. Atendimento (Mensal)"] = "Tables";
		$connectionsIds["parametros"] = "Tables";
		$connectionsIds["Graf. Custo Trad"] = "Tables";
		$connectionsIds["Graf. Custo Voip"] = "Tables";
		$connectionsIds["Graf. Minutagem Trad"] = "Tables";
		$connectionsIds["Graf. Minutagem Voip"] = "Tables";
		$connectionsIds["conf_sala"] = "Tables";
		$connectionsIds["conf_sala_convidado"] = "Tables";
		$connectionsIds["ipbx_gravacoes"] = "Tables";
		$connectionsIds["Graf. Lig. Discadas"] = "Tables";
		$connectionsIds["ldap"] = "Tables";
		$connectionsIds["timeout"] = "Tables";
		$connectionsIds["central"] = "Tables";
		$connectionsIds["ipbx_interf_vono"] = "Tables";
		$connectionsIds["ipbx_interf_fxs"] = "Tables";
		$connectionsIds["ipbx_canais"] = "Tables";
		$connectionsIds["ipbx_interf_e1"] = "Tables";
		$connectionsIds["ipbx_interf_gsm"] = "Tables";
		$connectionsIds["ipbx_interf_mslync"] = "Tables";
		$connectionsIds["ipbx_interf_sip"] = "Tables";
		$connectionsIds["ipbx_interf_voxip"] = "Tables";
		$connectionsIds["ipbx_plano_disc"] = "Tables";
		$connectionsIds["ipbx_ramais"] = "Tables";
		$connectionsIds["ipbx_grupo_captura"] = "Tables";
		$connectionsIds["ipbx_desv_prefix"] = "Tables";
		$connectionsIds["ipbx_desv_prefix_item"] = "Tables";
		$connectionsIds["admin_members"] = "Tables";
		$connectionsIds["admin_users"] = "Tables";
		$connectionsIds["ipbx_call_back"] = "Tables";
		$connectionsIds["ipbx_conf_grav"] = "Tables";
		$connectionsIds["ipbx_rcv_fax"] = "Tables";
		$connectionsIds["ipbx_tx_fax"] = "Tables";
		$connectionsIds["ipbx_send_fax"] = "Tables";
		$connectionsIds["ipbx_conf_fax"] = "Tables";
		$connectionsIds["ipbx_backup"] = "Tables";
		$connectionsIds["Restore"] = "Tables";
		$connectionsIds["ipbx_ura_rev_conf"] = "Tables";
		$connectionsIds["ipbx_ura_rev_inbound"] = "Tables";
		$connectionsIds["ipbx_ura_rev_outbound"] = "Tables";
		$connectionsIds["ipbx_ura_rev_msg"] = "Tables";
		$connectionsIds["ipbx_interf_callman"] = "Tables";
		$connectionsIds["ipbx_tarifa_vc2"] = "Tables";
		$connectionsIds["Graf. Centro de custo"] = "Tables";
		$connectionsIds["Graf. Custo GSM"] = "Tables";
		$connectionsIds["Graf. Minutagem GSM"] = "Tables";
		$connectionsIds["Rel. Abandonos"] = "Tables";
		$connectionsIds["Rel. Atendimento"] = "Tables";
		$connectionsIds["Rel. Bilhetagem"] = "Tables";
		$connectionsIds["Rel. Detalhado - Centro de custo"] = "Tables";
		$connectionsIds["Rel. Lig Custo por tronco"] = "Tables";
		$connectionsIds["Rel. Lig. Discadas"] = "Tables";
		$connectionsIds["Rel. Recebidas"] = "Tables";
		$connectionsIds["Rel. Simplificado - Centro de custo"] = "Tables";
		$connectionsIds["Graf. Chamadas sem atendimento"] = "Tables";
		$connectionsIds["ipbx_pesquisa_ura_rev"] = "Tables";
		$connectionsIds["Rel. Pesquisa"] = "Tables";
		$connectionsIds["Rel. Ura Reversa - Enfileiramento"] = "Tables";
		$connectionsIds["Rel. Pesquisa Reversa"] = "Tables";
		$connectionsIds["diag_ipbx"] = "Tables";
		$connectionsIds["ipbx_horario_desv_ramais"] = "Tables";
		$connectionsIds["ipbx_horario_desv"] = "Tables";
		$connectionsIds["ipbx_dt_especifica_feriado"] = "Tables";
		$connectionsIds["cc_receptivo_filas_horario_desv_ramais"] = "Tables";
		$connectionsIds["cc_receptivo_filas_horario_desv"] = "Tables";
		$connectionsIds["ipbx_sincronismo"] = "Tables";
		$connectionsIds["ipbx_ldap_conf"] = "Tables";
		$connectionsIds["personal_info"] = "Tables";
		$connectionsIds["ipbx_interf_fxo"] = "Tables";
		$connectionsIds["ipbx_painel_op"] = "Tables";
		$connectionsIds["Rel. Centro de custo"] = "Tables";
		$connectionsIds["v_contatos"] = "Tables";
		$connectionsIds["ipbx_disp_mobile"] = "Tables";
		$connectionsIds["cc_tipos_pausa"] = "Tables";
		$connectionsIds["ipbx_interf_sip_generica"] = "Tables";
		$connectionsIds["cc_agentes_fila"] = "Tables";
		$connectionsIds["cc_agentes"] = "Tables";
		$connectionsIds["Rel. Cham Detalhada"] = "Tables";
		$connectionsIds["Rel Produtividade da Fila"] = "Tables";
		$connectionsIds["Rel. Detalhamento Agente"] = "Tables";
		$connectionsIds["Graf. Perfil Tempo de espera por dia"] = "Tables";
		$connectionsIds["Graf. Historico fila data"] = "Tables";
		$connectionsIds["Graf. Historico fila hora"] = "Tables";
		$connectionsIds["Rel. Historico Fila Data"] = "Tables";
		$connectionsIds["Rel. Historico Fila Hora"] = "Tables";
		$connectionsIds["cc_receptivo_filas_atend"] = "Tables";
		$connectionsIds["Graf. perfil atendimento"] = "Tables";
		$connectionsIds["Rel. Produt filas grupo por data"] = "Tables";
		$connectionsIds["Rel. Produt filas grupo por mes"] = "Tables";
		$connectionsIds["Rel. Perf. Tempo Espera"] = "Tables";
		$connectionsIds["Rel. Produt. Agentes Dia"] = "Tables";
		$connectionsIds["Rel. Disponibilidade Agente"] = "Tables";
		$connectionsIds["ipbx_provisionamento"] = "Tables";
		$connectionsIds["blacklist"] = "Tables";
		$connectionsIds["Rel. Desvios Chamadas"] = "Tables";
		$connectionsIds["ipbx_ugmembers"] = "Tables";
		$connectionsIds["quadro_aviso_versao"] = "Tables";
		$this->_tablesConnectionIds = $connectionsIds;
	}
	
	/**
	 * Check if It's possible to add to one table's sql query 
	 * an sql subquery to another table.
	 * Access doesn't support subqueries from the same table as main.
	 * @param String dataSourceTName1
	 * @param String dataSourceTName2
	 * @return Boolean
	 */
	public function checkTablesSubqueriesSupport( $dataSourceTName1, $dataSourceTName2 )
	{
		$connId1 = $this->_tablesConnectionIds[ $dataSourceTName1 ];
		$connId2 = $this->_tablesConnectionIds[ $dataSourceTName2 ];
		
		if( $connId1 != $connId2 )
			return false;

		if( $this->_connectionsData[ $connId1 ]["dbType"] == nDATABASE_Access && $dataSourceTName1 == $dataSourceTName2 )
			return false;
			
		return true;	
	}
	
	/**
	 * Close db connections
	 * @destructor
	 */
	function __desctruct() 
	{
		foreach( $this->cache as $connection )
		{
			$connection->close();
		}
	}
}
?>