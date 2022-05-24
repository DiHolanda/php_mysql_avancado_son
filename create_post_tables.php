<?php

$conn = require __DIR__.'/utils/connection.php';

/*$sql = '
	CREATE TABLE posts(
		id INT AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(50) NOT NULL,
		body TEXT NOT NULL
		)
';

if(!$conn->query($sql)){
	die('erro: tabela já existe');
}*/

$result = $conn->query('DESCRIBE posts');

var_dump($result->fetch_all(MYSQLI_ASSOC));