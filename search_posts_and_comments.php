<?php 

$conn = require __DIR__.'/utils/connection.php';

// busca um registro de tabela e os relacionados em outra tabela
$one_to_many = 'SELECT * FROM posts LEFT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1';

// busca um registro de tabela e apenas o relacionado em outra tabela
$one_to_one = 'SELECT * FROM posts LEFT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1 GROUP BY posts.id';

// seleciona os registros se baseando na segunda tabela mencionada (a da direita)
$belongs_to_1 = 'SELECT * FROM posts RIGHT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1';

// na query a seguir, primeiro puxa os campos da tabela comments, para então trazer o conteúdo relacionado da tabela posts
$belongs_to_2 = 'SELECT * FROM comments RIGHT JOIN posts ON comments.post_id = posts.id WHERE comments.post_id = 1 GROUP BY posts.id';

$result = $conn->query($belongs_to_2);

$posts = $result->fetch_all(MYSQLI_ASSOC);

var_dump($posts);
exit;