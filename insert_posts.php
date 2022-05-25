<?php

$conn = require __DIR__.'/utils/connection.php';

// elimina todo o conteúdo da tabela
// comando usado para ambiente de testes
$conn->query('TRUNCATE posts');

$sql = file_get_contents(__DIR__.'/insert_posts.sql');

var_dump($sql);