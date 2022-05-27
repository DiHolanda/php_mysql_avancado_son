<?php

// define se deseja transparecer as mensagens de erro sql na aplicação não
// é interessante desabilitar tais mensagens quando a aplicação já estiver em ambiente de produção
$debug = true;

if($debug){
	/* OUTRO EXEMPLOS DE MSQLI_REPORT:
	* MYSQLI_REPORT_ERROR -> mostra os erros
	* MYSQLI_REPORT_OFF -> não mostra os erros
	* MYSQLI_REPORT_STRICT -> define os erros como exceptions - útil para programar try/catch
	* MYSQLI_REPORT_INDEX -> informa se foi usado algum índice errado
	* MYSQLI_REPORT_ALL -> junção de todas as funções acima, menos o OFF
	*/

	mysqli_report(MYSQLI_REPORT_ERROR);
}
else{
	mysqli_report(MYSQLI_REPORT_OFF);
}

$conn = new mysqli('localhost', 'root', 'R00t@senhachata', 'php_mysql_avancando');

if($conn->connect_errno){
	die('Falha de conexão no banco de dados: ' . $conn->connect_errno);
}

// boa prática para deixar claro que este script retorna uma conexão
return $conn;