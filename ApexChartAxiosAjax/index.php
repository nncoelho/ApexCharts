<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexCharts - Axios - AJAX</title>
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
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-primary" onclick="verTrimestre(1)">1.º Trimestre</button>
                <button class="btn btn-primary" onclick="verTrimestre(2)">2.º Trimestre</button>
                <button class="btn btn-primary" onclick="verTrimestre(3)">3.º Trimestre</button>
                <button class="btn btn-primary" onclick="verTrimestre(4)">4.º Trimestre</button>
            </div>
        </div>
    </div>

    <script>
        let el = document.getElementById('grafico');
        let options = {
            chart: {
                type: 'bar',

            },
            series: [{
                name: 'Dados',
                data: []
            }],
            yaxis: {
                min: 0,
                max: 100
            }
        }

        let chart = new ApexCharts(el, options);
        chart.render();

        function verTrimestre(trimestre) {

            // AJAX
            axios.post('http://apexcharts.me/ApexChartAxiosAjax/ajax/script.php', {
                trimestre: trimestre
            }).
            then(function(response) {
                    chart.updateSeries(
                        [{
                            data: response.data
                        }]
                    );
                })
                .catch(function(error) {
                    console.log('Erro:' + error);
                });
        }

        verTrimestre(1);
    </script>
</body>

</html>