# Senac_PHP_HTML_com_API

#A ideia deste trabalho era fazer um site semelhante ao Brasileirão e utilizar a API dele. 
#Para isso foi utilizado os comandos abaixo: 

$ch = curl_init();

$urlApi = 'https://jsuol.com.br/c/monaco/utils/gestor/commons.js?file=commons.uol.com.br/sistemas/esporte/modalidades/futebol/campeonatos/dados/2023/30/dados.json';

curl_setopt($ch, CURLOPT_URL, $urlApi);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$resultApi = curl_exec($ch);

$arrayJsonApi = json_decode($resultApi, true);

#Com isso conseguimos coletar as infromações da API 
#Após isso segui com a criação das demais váriaves coletar as informações de outras dimenssões 

$arrayEquipes = $arrayJsonApi['equipes'];
$fase = $arrayJsonApi['ordem-fases'][0];
$arrayClassificacao = $arrayJsonApi['fases'][$fase]['classificacao']['grupo']['Único'];
$arrayPontos = $arrayJsonApi['fases'][$fase]['classificacao']['equipe'];

#Após segui com a criação do cabeçalho e do corpo da página. Após isso criei o Stely e fui realizando os ajustes conforme a necessidade 
