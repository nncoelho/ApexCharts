<?php

use EasyPDO\EasyPDO;

require "libs/EasyPDO.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new EasyPDO();
    $params = [
        ':valor' => $_POST['numero']
    ];
    $bd->insert("INSERT INTO medidas VALUES(0, :valor, NOW())", $params);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Temperature</title>
    <link rel="stylesheet" href="libs/bootstrap.min.css">
</head>

<body>

    <form action="enterData.php" method="post">
        <div class="row p-3">
            <div class="col">
                <h5 class="mb-3">Inserir Temperatura</h5>
                <label>Valor:</label>
                <input type="number" name="numero" min="0" max="100" required>
                <hr>
                <input class="btn btn-primary my-2" type="submit" value="Registar"><br>
                <?= empty($_POST['numero']) ? '' : 'Valor inserido com sucesso: ' . $_POST['numero'] ?>
            </div>
        </div>
    </form>

</body>

</html>