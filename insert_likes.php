<?php

$conn = require __DIR__.'/utils/connection.php';

// elimina todo o conteúdo da tabela
// comando usado para ambiente de testes
$conn->query('TRUNCATE likes');

$sql = file_get_contents(__DIR__.'/insert_likes.sql');

//var_dump($sql);

// define que iniciará uma transaction, cujo comando feito no sql pode ser reversível caso aconteça algo
$conn->begin_transaction();

$conn->query($sql);

// o comando rollback avisa para desfazer o que foi executado numa transaction
//$conn->rollback();

// já o comando commit efetiva de vez tudo o que foi feito dentro de uma transaction
//$conn->commit();

// demonstração simples de como optar pela efetivação ou não de uma transaction
$confirm_save = true;

if($confirm_save){
	$conn->commit();
}
else{
	$conn->rollback();
}

echo "Start SELECT" . PHP_EOL;

$result = $conn->query("SELECT * FROM likes");

$comments = $result->fetch_all(MYSQLI_ASSOC);

foreach($comments as $comment){

	// PHP_EOL adiciona uma quebra de linha
	echo $comment['id'] . PHP_EOL;
	echo $comment['user_id'] . PHP_EOL;
	echo $comment['post_id'] . PHP_EOL . PHP_EOL;
	}

echo "End SELECT" . PHP_EOL;