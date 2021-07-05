<?php

    // Ligação a base de dados
    $ligacao = mysqli_connect('localhost', 'root', '', 'apexcharts');
    $ligacao->set_charset('utf8');

    // Vai buscar dados da base de dados
    $resultados = mysqli_query($ligacao, "SELECT * FROM produtos");
    $nomes = [];
    $quantidades = [];

    while($linha = mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
        $nomes[] = "'{$linha['nome']}'";
        $quantidades[] = $linha['quantidade'];
    }

    $nomes = implode(',', $nomes);
    $quantidades = implode(',', $quantidades);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexCharts - PHP and MySQL</title>
    <script src="../apexcharts.min.js"></script>
</head>
<body>
    <div id="grafico"></div>

    <script>
        let el = document.getElementById('grafico');
        let options = {
            chart: {
                type: 'bar',
                width: 700,
                height: 500
            },
            series: [
                {
                    name: "Produtos da minha loja",
                    data: [<?= $quantidades ?>]
                }
            ],
            xaxis: {
                categories:[<?= $nomes ?>]
            },
            title: {
                text: 'Os produtos da minha loja'
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
   </script>

</body>
</html>