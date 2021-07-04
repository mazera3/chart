<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/FileSaver.min.js"></script>
    <script src="node_modules/chart.js/dist/chart.js"></script>
    <title>Chart JS Graficos</title>
</head>

<body>
    <div class="container" style="background-color: honeydew">
        <?php
        if (isset($_POST["n"])) {
            $n = $_POST["n"];
        }
        if (empty($_POST["n"])) {
            $n = 3;
        }
        // Professor
        if (isset($_POST["professor"])) {
            $professor = $_POST["professor"];
        }
        if (empty($_POST["professor"])) {
            $professor = "Professor";
        }
        // Série
        if (isset($_POST["serie"])) {
            $serie = $_POST["serie"];
        }
        if (empty($_POST["serie"])) {
            $serie = "Série";
        }
        // Equipe
        if (isset($_POST["equipe"])) {
            $equipe = $_POST["equipe"];
        }
        if (empty($_POST["equipe"])) {
            $equipe = "Equipe";
        }
        // Tipo de gráfico
        if (isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
        }
        if (empty($_POST["tipo"])) {
            $tipo = 'line';
        }
        // titulo
        if (isset($_POST["titulo"])) {
            $titulo = $_POST["titulo"];
        }
        if (empty($_POST["titulo"])) {
            $titulo = 'sem titulo';
        }
        // subtitulo
        if (isset($_POST["subtitulo"])) {
            $subtitulo = $_POST["subtitulo"];
        }
        if (empty($_POST["subtitulo"])) {
            $subtitulo = 'sem subtitulo';
        }
        // cor do titulo
        if (isset($_POST["cort"])) {
            $cort = $_POST["cort"];
        }
        if (empty($_POST["cort"])) {
            $cort = 'blue';
        }
        // cor do subtitulo
        if (isset($_POST["cors"])) {
            $cors = $_POST["cors"];
        }
        if (empty($_POST["cors"])) {
            $cors = 'blue';
        }
        // tamanho da fonte do titulo
        if (isset($_POST["fontesize"])) {
            $fontesize = $_POST["fontesize"];
        }
        if (empty($_POST["fontesize"])) {
            $fontesize = 16;
        }
        // legenda
        if (isset($_POST["legenda"])) {
            $legenda = $_POST["legenda"];
        }
        if (empty($_POST["legenda"])) {
            $legenda = 'sem legenda';
        }
        // posicao da legenda
        if (isset($_POST["posicao"])) {
            $posicao = $_POST["posicao"];
        }
        if (empty($_POST["posicao"])) {
            $posicao = 'top';
        }
        // estilo de ponto
        if (isset($_POST["pointstyle"])) {
            $pointstyle = $_POST["pointstyle"];
        }
        if (empty($_POST["pointstyle"])) {
            $pointstyle = 'circle';
        }
        // nome do arquivo de imagem
        if (isset($_POST["arquivo"])) {
            $arquivo = $_POST["arquivo"];
        }
        if (empty($_POST["arquivo"])) {
            $arquivo = 'arquivo';
        }
        // Eixo X
        for ($i = 1; $i <= $n; $i++) {
            if (isset($_POST["x{$i}"])) {
                $tempo[] = $_POST["x{$i}"];
            }
        }
        // titulo do eixo x
        if (isset($_POST["eixo_x"])) {
            $eixo_x = $_POST["eixo_x"];
        }
        if (empty($_POST["eixo_x"])) {
            $eixo_x = 'eixo_x';
        }
        // cor do eixo x
        if (isset($_POST["corx"])) {
            $corx = $_POST["corx"];
        }
        if (empty($_POST["corx"])) {
            $corx = 'black';
        }
        // Eixo Y
        for ($i = 1; $i <= $n; $i++) {
            if (isset($_POST["y{$i}"])) {
                $temperatura[] = $_POST["y{$i}"];
            }
        }
        // titulo do eixo y
        if (isset($_POST["eixo_y"])) {
            $eixo_y = $_POST["eixo_y"];
        }
        if (empty($_POST["eixo_y"])) {
            $eixo_y = 'eixo_y';
        }
        // cor do eixo y
        if (isset($_POST["cory"])) {
            $cory = $_POST["cory"];
        }
        if (empty($_POST["cory"])) {
            $cory = 'black';
        }

        $tempo = json_encode($tempo);
        $temperatura = json_encode($temperatura);
        $dados = 'Prof: ' . $professor . ', ' . $serie . ', Alunos: ' . $equipe;

        ?>
        <canvas id="lineChart" width="300" height="200"></canvas>
        <br />
        <button class="btn-info" id="save">Salvar Gráfico</button>
        <button class="btn-success" id="addData" onclick="addData()">Add Data</button>
        <button class="btn-danger" id="removeData" onclick="removeData()">Del Data</button>
    </div>
    <script>
        let tempo = <?php echo $tempo ?> //[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        let temperatura = <?php echo $temperatura ?> //[12, 15, 19, 21, 25, 32, 45, 56, 68, 79, 83, 89, 91, 95, 97, 99, 100, 100, 100, 100]
        let tipo = "<?php echo $tipo ?>"
        let titulo = "<?php echo $titulo ?>"
        let subtitulo = "<?php echo $dados . ' - ' . date('d-m-Y H:i:s'); ?>"
        let cors = "<?php echo $cors ?>"
        let cort = "<?php echo $cort ?>"
        let fontesize = <?php echo $fontesize ?>;
        let fontesizesub = fontesize - 10;
        let legenda = "<?php echo $legenda ?>"
        let posicao = "<?php echo $posicao ?>"
        let pointstyle = "<?php echo $pointstyle ?>"
        let arquivo = "<?php echo $arquivo ?>"
        let eixo_x = "<?php echo $eixo_x ?>"
        let eixo_y = "<?php echo $eixo_y ?>"
        let corx = "<?php echo $corx ?>"
        let cory = "<?php echo $cory ?>"

        const chartAreaBorder = {
            id: 'chartAreaBorder',
            beforeDraw(chart, args, options) {
                const {
                    ctx,
                    chartArea: {
                        left,
                        top,
                        width,
                        height
                    }
                } = chart;
                ctx.save();
                ctx.strokeStyle = options.borderColor;
                ctx.lineWidth = options.borderWidth;
                ctx.setLineDash(options.borderDash || []);
                ctx.lineDashOffset = options.borderDashOffset;
                ctx.strokeRect(left, top, width, height);
                ctx.restore();
            }
        };
        const plugin = {
            id: 'custom_canvas_background_color',
            beforeDraw: (chart) => {
                const ctx = chart.canvas.getContext('2d');
                ctx.save();
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fillStyle = 'rgb(255, 255, 255)',
                    ctx.fillRect(0, 0, chart.width, chart.height);
                ctx.restore();
            }
        };
        const COLORS = [
            '#4dc9f6',
            '#f67019',
            '#f53794',
            '#537bc4',
            '#acc236',
            '#166a8f',
            '#00a950',
            '#58595b',
            '#8549ba'
        ];
        const COLORS_BORD = [
            '#4dc9a1',
            '#c67019',
            '#f53194',
            '#537bf4',
            '#aff236',
            '#166f8f',
            '#00a95f',
            '#5f595b',
            '#8f49ba'
        ];
        let canvas = $('#lineChart').get(0);
        let ctx = document.getElementById("lineChart");

        let lineChart = new Chart(ctx, {
            type: tipo, // line, bar, bubble, pie, polarArea, radar
            data: {
                labels: tempo, //[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                datasets: [{
                    label: legenda, //'Água',
                    data: temperatura, //[12, 15, 19, 21, 25, 32, 45, 56, 68, 79, 83, 89, 91, 95, 97, 99, 100, 100, 100, 100],
                    borderWidth: 5,
                    borderColor: COLORS_BORD,
                    backgroundColor: COLORS,
                    pointStyle: pointstyle, //'circle', // triangle, circle, star, rectRot, diamond, square
                    pointRadius: 3,
                    pointBorderColor: 'rgb(0, 0, 55)'
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: posicao, //'top', // bottom, top, left, right
                        labels: {
                            usePointStyle: true,
                        },
                    },
                    title: {
                        display: true,
                        text: titulo, //"Curva de Aquecimento da Água",
                        color: cort, //'blue',
                        font: {
                            size: fontesize, //32,
                            family: 'tahoma',
                            weight: 'normal',
                            style: 'bold'
                        }
                    },
                    subtitle: {
                        display: true,
                        text: subtitulo, //'curva ascendente',
                        color: cors, //'blue',
                        font: {
                            size: fontesizesub, //20,
                            family: 'tahoma',
                            weight: 'normal',
                            style: 'italic'
                        },
                        padding: {
                            bottom: 5
                        }
                    },
                    chartAreaBorder: {
                        borderColor: 'black',
                        borderWidth: 2,
                        borderDash: [0, 0],
                        borderDashOffset: 2,
                    },
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: eixo_x, //'Tempo (min)',
                            color: corx, //'black',
                            font: {
                                size: 26
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.7)',
                            display: true,
                            drawBorder: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },

                        ticks: {
                            stepSize: 1
                        }

                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: eixo_y, //'Temperatura (ºC)',
                            color: cory, //'red',
                            font: {
                                size: 26
                            }
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.7)',
                            display: true,
                            drawBorder: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },

                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            },
            plugins: [chartAreaBorder, plugin],
        });

        // save as image
        $('#save').click(function() {
            canvas.toBlob(function(blob) {
                saveAs(blob, arquivo + ".png");
            });
        });

        const addData = () => {
            let sizeData = lineChart.data.datasets[0].data.length
            lineChart.data.datasets[0].data[sizeData] = Math.random() * 100
            lineChart.data.labels[sizeData] = `Valor_${sizeData + 1}`
            lineChart.update()
        }
        const removeData = () => {
            lineChart.data.datasets[0].data.pop()
            lineChart.data.labels.pop()
            lineChart.update()
        }
    </script>
</body>

</html>