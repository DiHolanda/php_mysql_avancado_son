<?php

$conn = require __DIR__.'/utils/connection.php';

// apaga a tabela subordinada primeiro
$conn->query('DROP TABLE users');
$conn->query('DROP TABLE likes');



$sql = '
	CREATE TABLE users(
		id INT AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL
		)
';

if(!$conn->query($sql)){
	die('erro: tabela já existe');
}

$sql = '
	CREATE TABLE likes(
		id INT AUTO_INCREMENT PRIMARY KEY,
		user_id INT NOT NULL,
		post_id INT NOT NULL
		)
';

if(!$conn->query($sql)){
	die('erro: tabela já existe');
}

$result = $conn->query('DESCRIBE users');

var_dump($result->fetch_all(MYSQLI_ASSOC));

$result = $conn->query('DESCRIBE likes');

var_dump($result->fetch_all(MYSQLI_ASSOC));