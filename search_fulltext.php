<?php

$conn = require __DIR__.'/utils/connection.php';

// recebe valores via terminal e armazena a partir da posição 1, já que a posição corresponde ao nome do arquivo
$term = $argv[1] ?? null;

//concatena o operador que permite buscar conteúdo que tenha algo a mais escrito além do termo de busca
$term = '%' . $term . '%';

$stmt = $conn->prepare('SELECT *, MATCH(title, body) AGAINST(? IN BOOLEAN MODE) as score FROM posts ORDER BY score DESC;');

$stmt->bind_param('s', $term);

$stmt->execute();

$result = $stmt->get_result();

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){

	// PHP_EOL adiciona uma quebra de linha
	echo $post['title'] . PHP_EOL;
	echo $post['body'] . PHP_EOL;
	echo $post['score'] . PHP_EOL . PHP_EOL;
}