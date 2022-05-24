<?php

$conn = new mysqli('localhost', 'root', 'R00t@senhachata', 'php_mysql_avancando');

if($conn->connect_errno){
	die('Falha de conexão no banco de dados: ' . $conn->connect_errno);
}

// boa prática para deixar claro que este script retorna uma conexão
return $conn;