<?php

$conn = require __DIR__.'/utils/connection.php';

// recebe valores via terminal e armazena a partir da posição 1, já que a posição corresponde ao nome do arquivo
$term = $argv[1] ?? null;

