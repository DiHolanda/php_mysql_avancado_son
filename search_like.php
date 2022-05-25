<?php

$conn = require __DIR__.'/utils/connection.php';

// recebe valores via terminal e armazena a partir da posição 1, já que a posição corresponde ao nome do arquivo
$term = $argv[1] ?? null;

$stmt = $conn->prepare('SELECT * FROM posts WHERE title LIKE ?;');

$stmt->bind_param('s', $term);

$stmt->execute();

$result = $stmt->get_result();

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){

	// PHP_EOL adiciona uma quebra de linha
	echo $post['title'] . PHP_EOL;
	echo $post['body'] . PHP_EOL . PHP_EOL;
}