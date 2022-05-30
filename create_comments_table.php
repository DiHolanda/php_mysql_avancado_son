<?php

$conn = require __DIR__.'/utils/connection.php';

$sql = '
	CREATE TABLE comments(
		id INT AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(100) NOT NULL,
		comment TEXT NOT NULL,
		post_id INT NOT NULL,
		FOREIGN KEY (post_id) REFERENCES posts(id)
		)
';

if(!$conn->query($sql)){
	die('erro: tabela já existe');
}

$result = $conn->query('DESCRIBE comments');

var_dump($result->fetch_all(MYSQLI_ASSOC));