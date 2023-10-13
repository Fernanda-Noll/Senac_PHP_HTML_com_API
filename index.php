<html>

<head>
    <meta charset="utf-8">
    <title>Pagina no Futebol</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
$ch = curl_init();

$urlApi = 'https://jsuol.com.br/c/monaco/utils/gestor/commons.js?file=commons.uol.com.br/sistemas/esporte/modalidades/futebol/campeonatos/dados/2023/30/dados.json';

curl_setopt($ch, CURLOPT_URL, $urlApi);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$resultApi = curl_exec($ch);

$arrayJsonApi = json_decode($resultApi, true);

$arrayEquipes = $arrayJsonApi['equipes'];
$fase = $arrayJsonApi['ordem-fases'][0];
$arrayClassificacao = $arrayJsonApi['fases'][$fase]['classificacao']['grupo']['Único'];
$arrayPontos = $arrayJsonApi['fases'][$fase]['classificacao']['equipe'];
?>

<body>
    <div class="cabecalhoInicio">
        <label class="brasileirao">Brasileirão Série A</label>
    </div>
    <div class="cabecalho">
        <a href="https://www.google.com/search?q=brasileirao&rlz=1C1RXQR_pt-PTBR1073BR1073&oq=br&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxiKBTIJCAAQIxgnGIoFMg0IARAuGIMBGLEDGIAEMgwIAhAuGEMY1AIYigUyBggDEEUYQTIGCAQQRRhBMgYIBRBFGEEyBggGEEUYPDIGCAcQRRg80gEHNzIzajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#sie=lg;/g/11jspy1hvm;2;/m/0fnk7q;mt;fp;1;;;">Partidas</a>
        <a href="https://www.google.com/search?q=brasileirao&rlz=1C1RXQR_pt-PTBR1073BR1073&oq=br&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxiKBTIJCAAQIxgnGIoFMg0IARAuGIMBGLEDGIAEMgwIAhAuGEMY1AIYigUyBggDEEUYQTIGCAQQRRhBMgYIBRBFGEEyBggGEEUYPDIGCAcQRRg80gEHNzIzajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#sie=lg;/g/11jspy1hvm;2;/m/0fnk7q;nw;fp;1;;;">Notícias</a>
        <a href="">Classificação</a>
        <a href="https://www.google.com/search?q=brasileirao&rlz=1C1RXQR_pt-PTBR1073BR1073&oq=br&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxiKBTIJCAAQIxgnGIoFMg0IARAuGIMBGLEDGIAEMgwIAhAuGEMY1AIYigUyBggDEEUYQTIGCAQQRRhBMgYIBRBFGEEyBggGEEUYPDIGCAcQRRg80gEHNzIzajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#sie=lg;/g/11jspy1hvm;2;/m/0fnk7q;lb;fp;1;;;">Estatísticas</a>
        <a href="https://www.google.com/search?q=brasileirao&rlz=1C1RXQR_pt-PTBR1073BR1073&oq=br&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxiKBTIJCAAQIxgnGIoFMg0IARAuGIMBGLEDGIAEMgwIAhAuGEMY1AIYigUyBggDEEUYQTIGCAQQRRhBMgYIBRBFGEEyBggGEEUYPDIGCAcQRRg80gEHNzIzajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#sie=lg;/g/11jspy1hvm;2;/m/0fnk7q;pl;fp;1;;;">Jogadores</a>
    </div>
    <div class="temporada">
        <label id="temporada_texto">Temporada</label>
        <select id="temporada_ano">
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
        </select>
    </div>
    <table class="tabela">
        <div id="tituloTabela">
            <thead>
                <tr class="titulo">
                    <th width="5%"></th>
                    <th width="5%"></th>
                    <th width="50%">Clube</th>
                    <th width="5%">Pts</th>
                    <th width="5%">Pj</th>
                    <th width="5%">V</th>
                    <th width="5%">E</th>
                    <th width="5%">D</th>
                    <th width="5%">Gm</th>
                    <th width="5%">Gc</th>
                    <th width="5%">Sg</th>
                </tr>
            </thead>
        </div>
        <?php
        $i = 0;
        foreach ($arrayClassificacao as $keyClassificacao => $valueClassificacao) {
            $i++;
        ?>
            <div class="infoTabela">
                <tr>
                    <?php
                    if ($i > 0 && $i < 5) {
                        $corPosicao = '#3295a8';
                    } else if ($i >= 5 && $i <= 6) {
                        $corPosicao = '#de7921';
                    } else if ($i >= 7 && $i <= 12) {
                        $corPosicao = '#3db83d';
                    } else if ($i >= 13 && $i <= 16) {
                        $corPosicao = '#ffffff';
                    } else if ($i >= 17 && $i <= 20) {
                        $corPosicao = '#cc0808';
                    } else {
                        $corPosicao = '#000000';
                    }
                    ?>
                    <td style="background:<?= $corPosicao; ?>">
                        <?= $i; ?>
                    </td>
                    <td>
                        <img style="width=20px height=20px" src=" <?= $arrayEquipes[$valueClassificacao]['brasao'] ?>">
                    </td>
                    <td>
                        <?= $arrayEquipes[$valueClassificacao]['nome-comum'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['pg']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['j']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['v']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['e']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['d']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['gp']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['gc']['total'] ?>
                    </td>
                    <td>
                        <?= $arrayPontos[$valueClassificacao]['sg']['total'] ?>
                    </td>
                </tr>
            <?php
        }
            ?>
            </div>
    </table>
    <div class="rodape">
        <label class="tituloRodape">Qualificação/Rebaixamento:</label>
        <label class="infoRodape">Posição: 1 ao 4: Fase de grupos da Copa Libertadores</label>
        <label class="infoRodape">Posição: 5 ao 6: Qualificatórias da Copa Libertadores</label>
        <label class="infoRodape">Posição: 7 ao 12: Fase de grupos da Copa Sul-Americana</label>
        <label class="infoRodape">Posição: 13 ao 16: Sem direito a disputa de outros campeonatos</label>
        <label class="infoRodape">Posição: 17 ao 20: Rebaixamento</label>
    </div>
</body>

</html>