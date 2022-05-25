<?php

$conn = require __DIR__.'/utils/connection.php';

// elimina todo o conteúdo da tabela
// comando usado para ambiente de testes
$conn->query('TRUNCATE posts');

$sql = file_get_contents(__DIR__.'/insert_posts.sql');

//var_dump($sql);

$conn->query($sql);

$result = $conn->query("SELECT * FROM posts");

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){

	// PHP_EOL adiciona uma quebra de linha
	echo $post['title'] . PHP_EOL;
	echo $post['body'] . PHP_EOL . PHP_EOL;
}