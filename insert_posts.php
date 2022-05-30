<?php

$conn = require __DIR__.'/utils/connection.php';

// elimina o conteúdo da tabela subordinada
$conn->query('TRUNCATE comments');

// elimina todo o conteúdo da tabela
// comando usado para ambiente de testes
// NÃO FUNCIONA COM TRUNCATE DEVIDO A RESTRIÇÃO DE CHAVE ESTRANGEIRA
// por isso executa comando DELETE
$conn->query('DELETE FROM posts');

// e reseta a numeração de id para começar do um
$conn->query('ALTER TABLE posts AUTO_INCREMENT = 1');

$sql = file_get_contents(__DIR__.'/insert_posts.sql');

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

$result = $conn->query("SELECT * FROM posts");

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){

	// PHP_EOL adiciona uma quebra de linha
	echo $post['id'] . PHP_EOL;
	echo $post['title'] . PHP_EOL;
	echo $post['body'] . PHP_EOL . PHP_EOL;
}

echo "End SELECT" . PHP_EOL;

require __DIR__.'/insert_comments.php';