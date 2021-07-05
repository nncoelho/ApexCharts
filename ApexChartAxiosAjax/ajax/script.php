<?php

$post = json_decode(file_get_contents('php://input', true));

switch ($post->trimestre) {
    case '1':
        $dados = [20, 30, 40];
        break;
    case '2':
        $dados = [30, 40, 50];
        break;
    case '3':
        $dados = [60, 30, 45];
        break;
    case '4':
        $dados = [35, 60, 75];
        break;
}
echo json_encode($dados);
