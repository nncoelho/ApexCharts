<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexCharts - AJAX - AutoTimeUpdate</title>
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/apexcharts.min.js"></script>
    <script src="libs/axios.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-6 offset-3">
                <div id="grafico"></div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" onclick="start()">Start</button>
            <button class="btn btn-secondary" onclick="stop()">Stop</button>
        </div>
    </div>

    <script>
        let dados = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        let interval = null;
        let el = document.getElementById('grafico');
        let options = {
            chart: {
                type: 'bar',
                animations: {
                    enabled: false
                },
            },
            series: [{
                name: 'Dados',
                data: dados
            }],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']
            },
            yaxis: {
                min: 0,
                max: 100
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();

        // =============================================
        function start() {
            interval = setInterval(myFunction, 1000);
        }

        // =============================================
        function stop() {
            clearInterval(interval);
        }

        // =============================================
        function myFunction() {
            axios.post('http://apexcharts.me/ApexChartAjaxAutoUpdate/ajax/script.php', {
                    info: dados
                })
                .then(function(response) {
                    dados = response.data;
                    chart.updateSeries(
                        [{
                            data: response.data
                        }]
                    );
                })
                .catch(function(error) {
                    console.log('Erro: ' + error);
                })
        }
    </script>
</body>

</html>