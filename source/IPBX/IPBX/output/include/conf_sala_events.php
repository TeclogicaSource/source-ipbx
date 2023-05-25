<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include './include/teclogica/funcoes_gerais.php';

//Inicializa a variavel com a senha em branco
$senha="";

// Verifica se a senha precisa ser gerada
if ($values["flg_pass"] == 1 ){
   // Gera nova senha
	$senha=geradorSenha(6);
}

//Update do registro para a nova senha.
global $conn;
$strSQLInsert="update conf_sala set senha='".$senha."', name='".$_SESSION["UserID"]."', status='Sala Aberta' where id_conf = ".$values["id_conf"];
db_exec($strSQLInsert,$conn);

// Informa para enviar a pagina para listagem.
$_SESSION["CONF_SALA_LISTA"]=1;

// Chamada externa para popular tela da secret�ria.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="conf_sala";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include './include/teclogica/funcoes_gerais.php';

// Caso alterada a op��o de password, regera a senha nova.
if ( $values["flg_pass"] != $oldvalues["flg_pass"]){

	//Inicializa a variavel com a senha em branco
	$senha="";

	// Verifica se a senha precisa ser gerada
	if ($values["flg_pass"] == 1 ){
		// Gera nova senha
		$senha=geradorSenha(6);
	}


	//Update do registro para a nova senha.
	global $conn;
	$strSQLInsert="update conf_sala set senha='".$senha."', name='".$_SESSION["UserID"]."' where id_conf = ".$values["id_conf"];
	db_exec($strSQLInsert,$conn);

}


// Informa para enviar a pagina para listagem.
$_SESSION["CONF_SALA_LISTA"]=1;

// Chamada externa para popular tela da secret�ria.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="conf_sala";


























































// List page: Before display
function BeforeShowList(&$xt,&$templatefile)
{


;
} // function BeforeShowList
$arrEventTables["BeforeShowList"]="conf_sala";




































// List page: Before SQL query
function BeforeQueryList(&$strSQL,&$strWhereClause,&$strOrderBy)
{


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "update conf_sala set status='Sala Expirada' where dt_expiracao < subdate(current_date, 1);";
db_exec($strSQLInsert,$conn);

// Verifica se o usu�rio logado � o administrador, caso n�o seja informa a query para trazer as reuni�es somente do usu�rio.
if ($_SESSION["UserID"] != 'admin' ){
  $strWhereClause = "name='".$_SESSION["UserID"]."' OR name = 'admin'";
}
;
} // function BeforeQueryList
$arrEventTables["BeforeQueryList"]="conf_sala";









































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Deleta convidados da sala
global $conn;
$strSQLInsert = "delete from conf_sala_convidado where id_conf=".$deleted_values["id_conf"];
db_exec($strSQLInsert,$conn);

// Deleta grava��es da sala
global $conn;
$strSQLInsert = "delete from conf_sala_rec where id_conf=".$deleted_values["id_conf"];
db_exec($strSQLInsert,$conn);


// Chamada externa para popular tela da secret�ria.
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /usr/bin/gen_button.sh > /dev/null &');
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="conf_sala";














































































function conf_sala_Snippet12(&$params)
{

global $conn;
$result = mysql_query("select date_format(dt_gravacao, '%d-%m-%Y %H-%i-%s') as dt_gravacao, nm_arquivo from conf_sala_rec where id_conf = ".$_SESSION["conf_sala_convidado_masterkey1"]);

// Requer as informa��es da sala de conferencia
while ($linha = mysql_fetch_assoc($result)){

	// Define os usu�rios que receber�o correio.
	echo "Grava��o do arquivo: ".$linha['nm_arquivo']."  -- Download -->  <a href=".$linha['nm_arquivo']." target='_blank'>"."<img src='images/krec_record.png' height='15' width='15'>"."</a><br>";

}
;
}











// Before record added
function BeforeAdd(&$values,&$message,$inline)
{


/*
// Caso houver data de expira��o informa quando for menor que a data da conferencia
if ($values["dt_expiracao"] != "" ){
	if (Date($values["dt_conferencia"]) >= Date($values["dt_expiracao"])){
		$message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
		return false;
	}else{
		return true;
	}
}else{
	return true;
}
*/

// Caso houver data de expira��o informa quando for menor que a data da conferencia
if ($values["dt_expiracao"] != "" ){
	if ($values["dt_conferencia"] >= $values["dt_expiracao"]){
		if ($values["dt_conferencia"] == $values["dt_expiracao"]){
			if (strtotime($values["hr_inicio"]) < strtotime($values["hr_fim"])){
				return true;
			}else{
            $message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
				return false;
			}
			$message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
			return false;
		}
	}else{
		return true;
	}
}else{
	return true;
}

$message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
return false;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="conf_sala";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

if (($values['name'] !== $_SESSION['UserId']) && ($_SESSION['UserId'] !== 'admin')) {
		$message = "N�o � poss�vel alterar confer�ncia de outra pessoa.";
		return false;
}

// Verifica se a conferencia expirou.
if (Date($oldvalues["dt_expiracao"]) < Date("Y-m-d") ){
   $message = "Sala de confer�ncia ja esta expirada, n�o � poss�vel realizar altera��es.";
	return false;
}

//echo "<script language='javascript'> alert('".."') </script>";


// Caso houver data de expira��o informa quando for menor que a data da conferencia
if ($values["dt_expiracao"] != "" ){
	if ($values["dt_conferencia"] >= $values["dt_expiracao"]){
		if ($values["dt_conferencia"] == $values["dt_expiracao"]){
			if (strtotime($values["hr_inicio"]) < strtotime($values["hr_fim"])){
				return true;
			}else{
            $message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
				return false;
			}
			$message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
			return false;
		}
	}else{
		return true;
	}
}else{
	return true;
}

$message = "Data de inicio da conferencia, n�o pode ser maior que data de expira��o da sala";
return false;
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="conf_sala";












































































function conf_sala_Snippet1(&$params)
{

// Busca existencia de correios para enviar.
global $conn;
$result_acesso = mysql_query("select * from parametros where nome = 'Duracao_grav_conference'");

// Requisita informa��o para a constru��o do correio (numero de acesso)
while ($linha_acesso = mysql_fetch_assoc($result_acesso)){
   if ( $linha_acesso['nome'] == 'Duracao_grav_conference' ){
      $Duracao_grav_conference = $linha_acesso['valor'];}
}


// Informar a quantidade de messes que aparecer� configurada na tabela de parametros
echo "A grava��o da sala de confer�ncia ficar� disponivel no sistema durante <strong>".$Duracao_grav_conference."</strong> meses.";
echo "<br>N�o esque�a de enviar os convites de sua reuni�o, o campo de status mostra se os convites j� foram enviados !";

;
}


// List page: Before process
function BeforeProcessList(&$conn)
{

// Variavel de controle de inser��o
$_SESSION["CONF_SALA_LISTA"]=0;
;
} // function BeforeProcessList
$arrEventTables["BeforeProcessList"]="conf_sala";
















































// Add page: Before process
function BeforeProcessAdd(&$conn)
{



if ($_SESSION["CONF_SALA_LISTA"] != 0){
	// Redirecionar para listagem
	header("Location: conf_sala_list.php");
}
;
} // function BeforeProcessAdd
$arrEventTables["BeforeProcessAdd"]="conf_sala";















































// Edit page: Before process
function BeforeProcessEdit(&$conn)
{


if ($_SESSION["CONF_SALA_LISTA"] != 0){
	// Redirecionar para listagem
	header("Location: conf_sala_list.php");
}
/*
// inicializa a variavel de conex�o
global $conn;
// pega o endere�o do diret�rio
$diretorio = "/var/www/html/meetme/"; 
// abre o diret�rio
$ponteiro  = opendir($diretorio);

// monta os vetores com os itens encontrados na pasta
while ($nome_itens = readdir($ponteiro)) {

	// Desconsidera os arquivos que nao sao de gravacoes
	if ( $nome_itens != '.' && $nome_itens != '..' && $nome_itens != 'login.html' ){
		//Pega o segundo campo
		$campos=explode("-",$nome_itens);
		$result=mysql_query("select id_conf from conf_sala_rec where nm_arquivo='meetme/".$nome_itens."'");
		// Requer as informa��es da sala de conferencia

		if (!mysql_fetch_assoc($result)){
			//Insere as informa��es na base de dados
			$strSQLInsert = "insert into conf_sala_rec (id_conf, nm_arquivo, dt_gravacao) values (".$campos[1].",'meetme/".$nome_itens."',now())";
			//Insere o dado na base
			db_exec($strSQLInsert,$conn);
		}
	}
}
*/
;
} // function BeforeProcessEdit
$arrEventTables["BeforeProcessEdit"]="conf_sala";

































































// Edit page: Before SQL query
function BeforeQueryEdit(&$strSQL,&$strWhereClause)
{


;
} // function BeforeQueryEdit
$arrEventTables["BeforeQueryEdit"]="conf_sala";



































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{

global $conn;
$strSQLExists = "select * from conf_sala where name='{$_SESSION['UserID']}'";

$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
$canDelete = mysql_num_rows($rsExists) > 0 || $_SESSION['UserID'] == 'admin';
if($canDelete)
{	
	return true;
}

echo '<script type="text/javascript">alert("Usu�rio n�o autorizado para excluir esta confer�ncia.");</script>';
return false;
;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="conf_sala";















































































function conf_sala_Snippet11(&$params)
{
global $conn;
$query = mysql_query("SELECT valor FROM parametros WHERE nome = 'Acesso_Conference';");
$result = mysql_fetch_assoc($query);

echo $result['valor'];
;
}














































function conf_sala_Snippet13(&$params)
{
global $conn;
$query = mysql_query("SELECT valor FROM parametros WHERE nome = 'Acesso_Conference';");
$result = mysql_fetch_assoc($query);

echo '<em> Para acesso a sala, utilize: ' . $result['valor'] . '</em>';
;
}

?>