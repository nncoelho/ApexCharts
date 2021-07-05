<?php

use EasyPDO\EasyPDO;

require "../libs/EasyPDO.php";

$bd = new EasyPDO();
$resultados = $bd->select("SELECT * FROM (SELECT * FROM medidas ORDER BY created_at DESC LIMIT 10) alias ORDER BY created_at");
$dados = [];

if ($bd->affectedRows < 10) {
    // Cria um array com um numero de dados para completar os 10
    $dados = array_fill(0, 10 - $bd->affectedRows, 0);
}

// Cria o array de dados
foreach ($resultados as $resultado) {
    $dados[] = intval($resultado->valor);
}

echo json_encode($dados);
