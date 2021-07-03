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
    <title>Chart JS Graphics</title>
</head>

<body>
    <?php

    ?>
    <div class="container bg-secondary mt-3">
        <form method="POST" action="./grafico.php">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nº pontos</label>
                        <input type='text' class='form-control' name='n' value="3">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Gráfico</label>
                        <select class="custom-select" name="tipo">
                            <option value="line" selected>linha</option>
                            <option value="bar">barra</option>
                            <option value="pie">pitzza</option>
                            <option value="polarArea">Area polar</option>
                            <option value="bubble">bolha</option>
                            <option value="radar">radar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type='text' class='form-control' name='titulo' value="Curva de Aquecimento" placeholder="Curva de Aquecimento">
                    </div>
                    <label>Cor do Título</label>
                    <select class="custom-select" name="cort">
                        <option value="blue" selected>Azul</option>
                        <option value="red">Vermelho</option>
                        <option value="black">Preto</option>
                        <option value="green">Verde</option>
                    </select>
                    <div class="form-group">
                        <label>Tamanho da fonte do titulo</label>
                        <input type='number' class='form-control' name='fontesize' min="10" max="40" value="32">
                    </div>
                    <div class="form-group">
                        <label>Subtitulo</label>
                        <input type='text' class='form-control' name='subtitulo' value="curva ascendente" placeholder="curva ascendente">
                    </div>
                    <label>Cor do Subtítulo</label>
                    <select class="custom-select" name="cors">
                        <option value="blue" selected>Azul</option>
                        <option value="red">Vermelho</option>
                        <option value="black">Preto</option>
                        <option value="green">Verde</option>
                    </select>
                    <div class="form-group">
                        <label>Texto da Legenda</label>
                        <input type='text' class='form-control' name='legenda' value="água" placeholder="água">
                    </div>
                    <div class="form-group">
                        <label>Posição da Legenda</label>
                        <select class="custom-select" name="posicao">
                            <option value="top" selected>a cima do gráfico</option>
                            <option value="bottom">a baixo gráfico</option>
                            <option value="left">a esquerda gráfico</option>
                            <option value="right">a direita gráfico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estilo de Ponto</label>
                        <select class="custom-select" name="pointstyle">
                            <option value="circle" selected>circulo</option>
                            <option value="triangle">triangulo</option>
                            <option value="star">estrela</option>
                            <option value="diamond">diamante</option>
                            <option value="square">quadrado</option>
                            <option value="rectRot">retangulo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome do arquivo de imagem</label>
                        <input type='text' class='form-control' name='arquivo' value="grafico" placeholder="grafico">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Eixo X</label>
                        <input type='text' class='form-control' name='eixo_x' value="Tempo (min)">
                        <label>Cor do eixo X</label>
                        <select class="custom-select" name="corx">
                            <option value="blue">Azul</option>
                            <option value="red">Vermelho</option>
                            <option value="black" selected>Preto</option>
                            <option value="grenn">Verde</option>
                        </select>
                        <br /><br />
                        <label>Valores (X)</label>
                        <?php
                        for ($i = 1; $i <= 30; $i++) {
                            echo "<input type='text' class='form-control' name='tempo{$i}'>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Eixo Y</label>
                        <input type='text' class='form-control' name='eixo_y' value="Temperatura (ºC)">
                        <label>Cor do eixo Y</label>
                        <select class="custom-select" name="cory">
                            <option value="blue">Azul</option>
                            <option value="red" selected>Vermelho</option>
                            <option value="black">Preto</option>
                            <option value="grenn">Verde</option>
                        </select>
                        <br /><br />
                        <label>Valores (Y)</label>
                        <?php
                        for ($i = 1; $i <= 30; $i++) {
                            echo "<input type='text' class='form-control' name='temperatura{$i}'>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>