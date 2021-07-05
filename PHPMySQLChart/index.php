<?php

// BASE DE DADOS INEXISTENTE

// Liga a base de bados
$ligacao = mysqli_connect('localhost', 'root', '', 'apexcharts');
// Vai buscar os dados dos homens e mulheres
$resultados = mysqli_query($ligacao, "SELECT * FROM dados");
$dados = mysqli_fetch_array($resultados, MYSQLI_ASSOC);

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
        options = {
            chart: {
                type: 'bar',
                width: 700,
                height: 500
            },
            series: [{
                name: 'Funcionários',
                data: [<?= $dados['homens'] ?>, <?= $dados['mulheres'] ?>]
            }],
            xaxis: {
                categories: ['Homens', 'Mulheres']
            },
            title: {
                text: "Funcionários da minha empresa"
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>

</body>

</html>