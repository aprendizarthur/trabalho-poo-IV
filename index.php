<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//require no arquivo autoload do composer
require("vendor/autoload.php");

//require nos arquivos de classes/interfaces/traits
use App\Classes\{Atleta, OrganizadorEvento, Evento};

//instanciando organizador do evento
$organizadorEvento = new OrganizadorEvento;

//instanciando eventos
$eventoCorrida = $organizadorEvento->criarCorrida(10, "10km Cerrito", "12/06/2025", "Avenida Flores da Cunha");
$eventoFutebol = $organizadorEvento->criarPartida("Grêmio x Internacional", "19/06/2025", "Arena do Grêmio");


//adicionando tempo do vencedor da corrida
$eventoCorrida->adicionarTempoVencedor("1:10:02.457");

//gerenciando estado do evento futebol
$organizadorEvento->iniciar($eventoFutebol);
$eventoFutebol->adicionarPlacar(2, 0);
$organizadorEvento->finalizar($eventoFutebol);

//exibindo resultados dos eventos
$organizadorEvento->exibirResultado($eventoCorrida);
$organizadorEvento->exibirResultado($eventoFutebol);


//exibindo o total de eventos
echo "Total de eventos criados :".Evento::getTotalEventos()."<br>";

//exibindo todos eventos de um organizador de eventos com a trait exibivel
$todosEventos = $organizadorEvento->exibirEventos();
foreach($todosEventos as $evento){
    echo $evento."<br>";
}

//criando instancias e propriedades de Atleta com método mágico __set
$atletaArthur = new Atleta();
$atletaArthur->nome = ("Arthur Borges Vieira");
$atletaArthur->idade = 16;

$atletaJoao = new Atleta();
$atletaJoao->nome = ("João Silva Silva");
$atletaJoao->idade = 32;

//exibindo dados de atleta usando trait exibivel
$dadosArthur = $atletaArthur->exibirDados();
echo $dadosArthur."<br>";

$dadosJoao = $atletaJoao->exibirDados();
echo $dadosJoao."<br>";

//inscrevendo atletas em eventos
$organizadorEvento->inscreverAtleta($eventoCorrida, $atletaArthur);
$organizadorEvento->inscreverAtleta($eventoCorrida, $atletaJoao);

//acessando propriedades de Atleta com método mágico __get
echo $atletaArthur->nome."<br>";
echo $atletaArthur->idade."<br>";

//logs das classes documentando o processo
$logsArthur = $atletaArthur->getLogs();
foreach($logsArthur as $log){
    echo $log."<br>";
}

$logsJoao = $atletaJoao->getLogs();
foreach($logsJoao as $log){
    echo $log."<br>";
}

$logsOrganizador = $organizadorEvento->getLogs();
foreach($logsOrganizador as $log){
    echo $log."<br>";
}
