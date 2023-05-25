<?php







// After successful login
function AfterSuccessfulLogin($username,$password,&$data)
{

//Pagina padrão do servidor
//header("Location: agenda_list.php");
header("Location: v_contatos_list.php");
exit();


;
} // function AfterSuccessfulLogin
























// After unsuccessful login
function AfterUnsuccessfulLogin($username,$password,&$message)
{

// Inclusão das interfaces de geração

	include './include/teclogica/autenticador.php';



// Chamada que popula a tabela de autenticação remota

	acessoAutRemoto();



// Busca existencia de configuração LDAP.

	global $conn;



	$query = mysql_query("SELECT * FROM ipbx_ldap_conf WHERE id_ldap = {$_POST['ldap']};");


	if ($query) {
	$result = mysql_fetch_assoc($query);

	$connection = ldap_connect($result['ip_server'], $result['port']);



	if ($connection) {

		switch ($result['tp_ldap']) {

			case 'LDAP':

				$bind = ldap_bind( $connection, "uid={$username},{$result['ou_usuarios']}", $password);

				break;

			case 'AD':

				$bind= ldap_bind( $connection, "{$result['ad_dominio']}\\{$username}", $password );

				break;

			default:

				break;

		}



		if (!$bind) {

			$message = '<font color=red> Falha na autenticação. </font>';

			return false;

		}



		$query = mysql_query("select name from ldap where chave='".$username."'");

        $result = mysql_fetch_assoc($query);



        if (! $result['name']) {

        	$message = '<font color=red> Usuário não possui ramal associado a conta LDAP/AD. </font>';

			return false;	

        }

        

		$_SESSION['UserID'] = $result['name'];		

		//header("Location: agenda_list.php");
		header("Location: v_contatos_list.php");

		return true;

	}
}

;
} // function AfterUnsuccessfulLogin





















// Before login
function BeforeLogin($username,$password,&$message)
{

return true;
;
} // function BeforeLogin







































function ipbx_ramais_Snippet1(&$params)
{
global $conn;

$query = mysql_query('SELECT id_ldap, dsc_conf FROM ipbx_ldap_conf WHERE flg_ativo <> 0;');

echo '<select name="ldap">';
echo '<option>Selecionar</option>';
while($result = mysql_fetch_assoc($query)) {
	echo '<option value='.$result['id_ldap'].'>' . $result['dsc_conf'] . '</option>';
}
echo '</select>';
;
}























function ipbx_ramais_Snippet11(&$params)
{
global $conn;

$query = mysql_query('SELECT id_ldap, dsc_conf, flg_padrao FROM ipbx_ldap_conf WHERE flg_ativo <> 0;');

echo '<select name="ldap">';
echo '<option>Selecionar</option>';
while($result = mysql_fetch_assoc($query)) {
	if ((int) $result['flg_padrao'] == 1) {
		echo '<option value='.$result['id_ldap'].' selected>' . $result['dsc_conf'] . '</option>';
   } else {
		echo '<option value='.$result['id_ldap'].'>' . $result['dsc_conf'] . '</option>';
	}
}
echo '</select>';
;
}

?>