<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" href="./imagens/icone/favicon.ico">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/FileSaver.min.js"></script>
    <script src="node_modules/chart.js/dist/chart.js"></script>
    <title>Chart JS Graphics</title>
</head>

<body>
    <?php

    ?>
    <div class="container mt-3" style="background-color: #acfcfc">
        <form action="" method="POST">
            Digite o nº de pontos: <input type="text" placeholder="número de pontos" value="10" name="p">
            <?php $p = $_POST['p']; ?>
        </form>
        <form method="POST" action="./grafico.php">
            <input type='hidden' class='form-control' name='n' value="<?php echo $p ?>">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Titulo do Gráfico</label>
                        <input type='text' class='form-control' name='titulo' value="Curva de Aquecimento" placeholder="Curva de Aquecimento">
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Professor</label>
                                <input type='text' class='form-control' name='professor' value="Édio Mazera" placeholder="Nome do professor">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Série</label>
                            <select class="custom-select" name="serie">
                                <option value="outra" selected>Outra</option>
                                <option value="1º Série" selected>1ª Série</option>
                                <option value="2º Série" selected>2ª Série</option>
                                <option value="3º Série" selected>3ª Série</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Equipe / Alunos</label>
                        <input type='text' class='form-control' name='equipe' value="" placeholder="Digite o nome dos alunos ou equipe">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="custom-select" name="tipo">
                                    <option value="line" selected>linha</option>
                                    <option value="bar">barra</option>
                                    <option value="pie">pitzza</option>
                                    <option value="polarArea">Area polar</option>
                                    <option value="bubble">bolha</option>
                                    <option value="radar">radar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Cor</label>
                            <select class="custom-select" name="cort">
                                <option value="blue" selected>Azul</option>
                                <option value="red">Vermelho</option>
                                <option value="black">Preto</option>
                                <option value="green">Verde</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Fonte</label>
                                <input type='number' class='form-control' name='fontesize' min="10" max="40" value="28">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Cor do Subtítulo</label>
                            <select class="custom-select" name="cors">
                                <option value="blue">Azul</option>
                                <option value="red">Vermelho</option>
                                <option value="black" selected>Preto</option>
                                <option value="green">Verde</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Texto da Legenda</label>
                                <input type='text' class='form-control' name='legenda' value="água" placeholder="água">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Posição da Legenda</label>
                                <select class="custom-select" name="posicao">
                                    <option value="top" selected>a cima</option>
                                    <option value="bottom">a baixo</option>
                                    <option value="left">a esquerda</option>
                                    <option value="right">a direita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
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
                        </div>
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
                            <option value="green">Verde</option>
                        </select>
                        <br /><br />
                        <label>Valores (X)</label>
                        <?php
                        for ($i = 1; $i <= $p; $i++) {
                            echo "<input type='text' class='form-control' name='x{$i}'>";
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
                            <option value="red">Vermelho</option>
                            <option value="black" selected>Preto</option>
                            <option value="green">Verde</option>
                        </select>
                        <br /><br />
                        <label>Valores (Y)</label>
                        <?php
                        for ($i = 1; $i <= $p; $i++) {
                            echo "<input type='number' step='.01' class='form-control' name='y{$i}'>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <span>
                        <h3>Instruções</h3>
                        <ul>
                            <li>Digite o número de ponos e tecle ENTER</li>
                            <li>Digite o título do gráfico</li>
                            <li>Selecione a série</li>
                            <li>Digite o nome dos alunos da equipe</li>
                            <li>Escolha o tipo de gráfico</li>
                            <li>Opcionalmente prencha os outros campos</li>
                            <li>Colete os dados e complete a tabela</li>
                            <li>Ao terminar, clique em <b>Gerar Gráfico</b></li>
                            <li>Caso nescessário, limpe os dados antes clicando em Limpar</li>
                            <li>Uma nova janela será aberta. Confira os dados e salve a imagem (png) em um arquivo ou imprima a página</li>
                        </ul>
                    </span>
                    <h4>Exemplo de experimento</h4>
                    <h5>Curva de aquecimento da água</h5>
                    <ul>
                        <u>Materiais:</u>
                        <li>cronômetro (celular), termômetro de 0 a 100 ºc, manta de aquecimento, balão de fundo redondo de 250ml, suporte universal, garra e alça, álcool e água.</li>
                        <u>Procedimento:</u>
                        <li>Montar o equipamento: suporte universal, garra, termômetro, balão de fundo redondo de 250ml sobre o suporte universal;</li>
                        <li>Adicionar álcool ou água ao balão e anotar a temperatura numa tabela no tempo zero;</li>
                        <li>Iniciar o aquecimento ligando a manta de aquecimento e o cronômetro, fazer a leitura do termômetro a cada 30 segundos até que o álcool ou água ferva;</li>
                        <li>Continuar a anotar por mais 3 minutos após a fervura;</li>
                    </ul>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Gerar Gráfico</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>
    </div>
    <div class="mb-5"></div>
</body>

</html>